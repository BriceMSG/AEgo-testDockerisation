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
				Dynamisez une transformation
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">

		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">Dynamisez une transformation</h1>
						<p class="txt-center">Individuellement, positionnez chaque phrase dans la zone qui lui correspond.</p>
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
					<div class="w768 card block center synteseQuizz">
						<div id="q1">
							<h3 class="alter-btn-text">Je pense que le projet est trop ambitieux, et que les moyens ne sont pas adaptés.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Je construis de nouvelles pratiques, je change mes habitudes.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Je pense que le changement est évitable.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">J’ai intégré le fait que le projet allait réellement être mené.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q5">
							<h3 class="alter-btn-text">J’insuffle de l’énergie sur le projet auprès des équipes, de mes pairs.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q6">
							<h3 class="alter-btn-text">Je prends part aux groupes de travail pour voir plus concrètement à quoi ressemble le projet.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q7">
							<h3 class="alter-btn-text">Je me pose des questions concernant la mise en place du projet de changement.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q8">
							<h3 class="alter-btn-text">J’identifie les opportunités que le projet peut apporter à mon niveau et tente de les saisir.</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
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
				_nom = _msg.nom;
				_prenom = _msg.prenom;
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
				.html( '<h4 class="txt-center">' + _nom + ' ' + _prenom + '</h4>' );
			$( '#appSelect span').removeClass('orange-text green-text').html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				cible = $( '#q' + ( i + 1 ) );
				spl = ( tmp.object.definition.correctResponsesPattern[0] ).split( '[.]' );
				correct = spl[ 1 ];
				spl = ( tmp.result.response ).split( '[.]' );
				reponse = spl[ 1 ];
				if ( correct != reponse ) {
					cible.find( '.answered' ).addClass( 'orange-text' ).html( answers[ reponse ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( answers[ correct ] );
				}
				else{
					cible.find( '.answered' ).addClass( 'green-text' ).html( answers[ reponse ] );
				}
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIO,
			_idQuizz = '0x636f757262',
			appSeek = null,
			_nom,
			_prenom,
			answers = {
				'z1': 'Déni',
				'z2': 'Intégration',
				'z3': 'Résistance',
				'z4': 'Expérimentation'
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
