<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://projecteur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/projecteur.css" rel="stylesheet" type="text/css">
	<style>
		.wordSelected {
			background-color: rgba(255,255,255,.9) !important;
			background-color: #fff;
		}
		.wordSelected span {
			display: inline-block;
			vertical-align: middle;
			margin: 0 4px;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				L'aventure Dreamask
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">L'aventure Dreamask</h1>
						<p class="txt-center">Individuellement, positionnez les personnages.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="appSelect">
			<div class="vwrap">
				<div class="valign-left">
					<div class="row">
						<div class="col-4"></div>
						<div class="col-4">
							<div class="card" id="apprennantId"></div>
						</div>
						<div class="col-4"></div>
					</div>
					<div class="row">
						<div class="col-3">
							<div class="card" id="slc1">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc2">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc3">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc4">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<div class="card" id="slc5">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc6">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc7">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
						<div class="col-3">
							<div class="card" id="slc8">
								<img src="http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg" alt="">
								<div class="wordSelected"><span class="answered"></span><span class="correctif"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div></div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/projecteur.js"></script>
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
			_msg = JSON.parse( _msg );
			console.log( _msg );
			if ( _msg.cible != 'projo' ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'show' ) {
				console.log( _msg );
				_nom = _msg.nom;
				_prenom = _msg.prenom;
				recoverySave( 'getQuizzSpec.php', { "ssid":getLocalData( 'ssid' ), "quizz":_msg.quizz, "uuid":_msg.uuid }, retriveAnswer );
			}
			else if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		function retriveAnswer( _answers ) {
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' )
				.html( '<h4 class="txt-center">' + _nom + ' ' + _prenom + '</h4>' );
			$( '#appSelect img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg' );
			$( '#appSelect span').removeClass( 'orange-text green-text' ).html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				cible = $( '#slc' + ( i + 1 ) );
				spl = ( tmp.object.definition.correctResponsesPattern[0] ).split( '[.]' );
				img = spl[ 0 ];
				correct = spl[ 1 ];
				spl = ( tmp.result.response ).split( '[.]' );
				reponse = spl[ 1 ];
				cible.find( 'img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/aventure/' + _srcImg[ img ] + '.png' );
				if ( correct != reponse ) {
					cible.find( '.answered' ).addClass( 'orange-text' ).html( _srcWrd[ reponse ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( _srcWrd[ correct ] );
				}
				else{
					cible.find( '.answered' ).addClass( 'green-text' ).html( _srcWrd[ reponse ] );
				}
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIO,
			appSeek = null,
			_srcImg = {
				"perso01" :"perso01",
				"perso02" :"perso02",
				"perso03" :"perso03",
				"perso04" :"perso04",
				"perso05" :"perso05",
				"perso06" :"perso06",
				"perso07" :"perso07",
				"perso08" :"perso08"
			},
			_correct = {
				"perso01": "4",
				"perso02": "1",
				"perso03": "7",
				"perso04": "4",
				"perso05": "2",
				"perso06": "6",
				"perso07": "5",
				"perso08": "3"
			},
			_srcWrd = {
				"1": "Roi",
				"2": "Magicien",
				"3": "Dragon",
				"4": "Héros",
				"5": "Communauté",
				"6": "Menace",
				"7": "Graal"
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
