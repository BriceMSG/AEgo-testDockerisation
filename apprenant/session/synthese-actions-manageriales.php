<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://apprenant.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/apprenant.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Prenez le lead
			</div>
			<div id="star" class="col-2 blw txt-center"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
		</div>
	</div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/apprenant.js"></script>
	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); $( '#content, #jingle' ).addClass( 'show' ); setTimeout( function() { $( '#jingle' ).css( 'display', 'none' ); }, 3000 ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}
		function callbackMsg( _msg ) {
			console.log( _msg );
			_msg = JSON.parse( _msg );
			_cibles = [ getLocalData( 'uuid' ), 'apps' ];
			if ( $.inArray( _msg.cible, _cibles ) == -1 ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data );
			}
		};
		function callbackLRSMsg( _msg ) {};

		var lcIo,
			selection = {};

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			selection = getLocalData( '0x616374696f' );
			console.log( selection );

			var _content = $( '#content .valign' ),
				_col = 1,
				_html = '';
			for (var j = 1; j < selection[ 'nbr' ]; j++) {

				if ( _col == 4 ) {
					_col = 1;
					_html += '</div>';
				}
				if ( _col == 1) {
					_html += '<div class="row">';
				}

				tmp = selection[ j ].replace( /\\"/g, '"' );
				tmp = tmp.replace( /\\'/g, "'" );
				_html += '<div class="col-4"><div class="card">' + tmp + '</div></div>';
				if ( j == selection[ 'nbr' ] ) {
					_html += '</div>';
				}
				_col++;
			};
			_html += '<div class="row"><div class="col-2"></div><div class="col-8"><div id="comment" class="card"></div></div><div class="col-2"></div></div>';
			_content.html( _html );


			if ( j == 6 ) {
				_stars = getLocalData( 'stars' );
				$( '#star' ).html( '<i class="material-icons">star</i>' );
				$( '#comment' ).html( 'Félicitations, vous avez déjà de bonnes connaissances du changement !' ).addClass( 'visible' );
				notif( 'valid', '<i class="material-icons left">star</i> Félicitations, vous avez déjà de bonnes connaissances du changement !<br>Vous gagnez une étoile.', 8 );
				if( typeof _stars[ '0x5175697a7a' ] === "undefined" ) { addStar( '0x5175697a7a' ); }
			}
		} );
	</script>
</body>
</html>
