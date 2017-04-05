<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://projecteur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/projecteur.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				Illustrez le changement
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">Illustrez le changement</h1>
						<p class="txt-center">En groupe, choisissez 6 images que vous associez respectivement au mot de votre choix.</p>
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
						<div class="col-4">
							<div class="card" id="slc1">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="slc2">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="slc3">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<div class="card" id="slc4">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="slc5">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="slc6">
								<img src="http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg" alt="">
								<span class="wordSelected"></span>
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
				recoverySave( 'getQuizzGrp.php', { "ssid":getLocalData( 'ssid' ), "quizz":_msg.quizz, "uuid":_msg.uuid }, retriveAnswer );
			}
			else if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		function retriveAnswer( _answers ) {
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.grp;
			$( '#appSelect #apprennantId' )
				.attr( 'style', '-webkit-box-shadow: 0 0 0 4px #' + grps[ _answers.grp ].color + ' inset;box-shadow: 0 0 0 4px #' + grps[ _answers.grp ].color + ' inset;')
				.html( '<h4 class="txt-center">Groupe: ' + grps[ _answers.grp ].name + '</h4>' );
			$( '#appSelect img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg' );
			$( '#appSelect span').html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				tmp = tmp.result.response.split( '[.]' );
				cible = $( '#slc' + ( i + 1 ) );
				cible.find( 'img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/photolangage/' + _srcImg[ tmp[ 0 ] ] + '.jpg' );
				cible.find( 'span').html( _srcWrd[ tmp[ 1 ] ] );
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIO,
			appSeek = null,
			grps = {
				"626f686f7274": {
					"name": "A",
					"color": "d2b654"
				},
				"63616c6f6772": {
					"name": "B",
					"color": "106524"
				},
				"63617261646f": {
					"name": "C",
					"color": "950d0d"
				},
				"676175766169": {
					"name": "D",
					"color": "2f4c63"
				},
				"6c656f646167": {
					"name": "E",
					"color": "4cc3a9"
				},
				"706572636576": {
					"name": "F",
					"color": "4297cc"
				}
			},
			_srcImg = {
				"img01" :"img-step-01",
				"img02" :"img-step-02",
				"img03" :"img-step-03",
				"img04" :"img-step-04",
				"img05" :"img-step-05",
				"img06" :"img-step-06",
				"img07" :"img-step-07",
				"img08" :"img-step-08",
				"img09" :"img-step-09",
				"img10" :"img-step-10",
				"img11" :"img-step-11",
				"img12" :"img-step-12",
				"img13" :"img-step-13",
				"img14" :"img-step-14",
				"img15" :"img-step-15",
				"img16" :"img-step-16",
				"img17" :"img-step-17",
				"img18" :"img-step-18",
				"img19" :"img-step-19",
				"img20" :"img-step-20"
			},
			_srcWrd = {
				"word11" :"Action",
				"word12" :"Emotion",
				"word13" :"Aventure",
				"word14" :"Extraordinaire",
				"word21" :"Enthousiasme",
				"word22" :"Rupture",
				"word23" :"Contrainte",
				"word24" :"Opportunité",
				"word31" :"Incontournable",
				"word32" :"Logique",
				"word33" :"Méthode",
				"word34" :"Irrationnel",
				"word41" :"Imposé",
				"word42" :"Inévitable",
				"word43" :"Management",
				"word44" :"Transformation",
				"word51" :"Pérennité",
				"word52" :"Quotidien",
				"word53" :"Difficile",
				"word54" :"Long"
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
