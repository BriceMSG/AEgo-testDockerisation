<!DOCTYPE html>
<html>
<?php
	include '../include/head.inc.php';
?>
<body>
	<?php
		$_menu_title = 'Formation au "Change Management"';
		$_extra_button = '';
		include '../include/topMenu.inc.php';
		include '../include/noServ.inc.php';
	?>
	<div id="content">
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="row">
					<div class="col-7">
						<div class="card">
							<h3 class="subhead">
								<i class="material-icons green-text left small">group_work</i>
								Votre session de formation "Change Management" est prête
							</h3>
							<p class="txt-left">Veuillez maintenant prendre les tablettes des apprenants et les faire rejoindre la session par l'URI apprenant.</p>
							<p class="txt-left">Des consignes quant à l'utilisation de leurs tablettes seront alors affichées.</p>
							<div class="txt-center">
								<a href="#!" onclick="goTo( 'personnalisation.php', 'apps', false );return false;" class="btn alter-btn white-text">
									<i class="material-icons right">play_for_work</i>
									Lancer la personnalisation des tablettes
								</a>
							</div>
						</div>
					</div>
					<div class="col-5">
						<div class="card sup-card">
							<h3 class="subhead">
								<i class="material-icons alter-sombre-text left small">tablet</i>
								Tablettes apprenants connectées
							</h3>
							<p id="nbrApprCon" class="txt-center display1">0</p>
						</div>
						<div class="card">
							<h3 class="subhead">
								<i class="material-icons amber-text-lighten-2 left small">network_check</i>
								Le débit nécessaire par apprenant
							</h3>
							<div class="row txt-center">
								<div class="col-6">Minimum<br>187 Ko/s</div>
								<div class="col-6">Recommandé<br>312 Ko/s</div>
							</div>
							<p>Vous pouvez tester votre connexion internet via le bouton "tester votre débit" en haut à droite de votre écran.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include '../include/notification.inc.php';
		include '../include/screenRotation.inc.php';
		include '../include/jsScripts.inc.php';
	?>

	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); $( '#content' ).addClass( 'show' ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}

		connected = {
			nbr: 0,
			add: function() {
				this.nbr++;
				return this;
			},
			wrote: function() {
				$( '#nbrApprCon' ).html( this.nbr );
			}
		};

		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );
			console.log( _msg );

			if ( _msg.cible != 'former' ) {
				_msg = null;
				return null;
			}

			if ( _msg.msg == 'tabLoad' ) {
				if ( typeof datas.apps === 'undefined' ) {
					datas.apps = {};
				}

				if ( typeof datas.apps[ _msg.idTab ] === 'undefined' ) {
					connected.add().wrote();
				}

				datas.apps[ _msg.idTab ] = {};
				setLocalData( 'datas', datas );
			}
		};

		function callbackLRSMsg( _msg ) {
			alert( _msg );
		};

		var lcIo,
			datas;
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			datas = getLocalData( 'datas' );

			$( '#nbrApprCon' ).html( Object.keys(datas.apps).length );
		} );
	</script>
</body>
</html>
