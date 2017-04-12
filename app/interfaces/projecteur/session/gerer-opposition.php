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
				C'est la crise ?
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">

		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">C'est la crise ?</h1>
						<p class="txt-center">Individuellement, gérez au mieux les réactions difficiles.</p>
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
							<h3 class="alter-btn-text">Le nouveau plan d’action ne convient absolument pas à Fabrice qui réagit fermement contre...</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Laura poursuit le débat par une proposition pleine de bonne volonté mais peu pertinente…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Séverine se montre particulièrement active contre cette annonce. Vous l’auriez manipulée en lui demandant de travailler avec Sébastien sans lui avoir précisé les nouveaux délais...</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">Marc n’arrive pas à se positionner. Votre plan est très ambitieux mais si c’est pour sauver Dreamask…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q5">
							<h3 class="alter-btn-text">Marc semble être d’accord avec les propos de Laura et Sébastien…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q6">
							<h3 class="alter-btn-text">Fabrice monopolise la parole avec virulence</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q7">
							<h3 class="alter-btn-text">Laura s’efface progressivement face à la prestation de Fabrice…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q8">
							<h3 class="alter-btn-text">Fabrice ne s’arrête pas et répète en boucle des arguments que vous avez déjà écartés…</h3>
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
				if ( tmp.object.definition.correctResponsesPattern[0] != tmp.result.response ) {
					cible.find( '.answered' ).addClass( 'orange-text' ).html( answers[ tmp.result.response ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( answers[ tmp.object.definition.correctResponsesPattern[0] ] );
				}
				else{
					cible.find( '.answered' ).addClass( 'green-text' ).html( answers[ tmp.result.response ] );
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
				'a01': 'Vous répondez à son argument',
				'a02': 'Vous poursuivez sur le rôle indispensable de votre équipe sur cette période',
					'a04': 'Vous écoutez sa proposition avec attention, en prenez note pour y réfléchir plus tard',
					'a05': 'Vous la remerciez mais vous lui faites comprendre avec tact que ce n’est pas l’objet de la réunion',
				'a07': 'Vous lui expliquez que c’est une raison supplémentaire pour avoir son aide',
				'a08': 'Vous cherchez à donner la parole à quelqu’un plus positif vis-à-vis du projet',
					'a10': 'Vous allez chercher auprès de l’équipe des arguments pour le rassurer',
					'a11': 'Vous questionnez l’équipe avec un tour de table',
				'a13': 'Vous continuez le dialogue avec Laura et Sébastien pour les valoriser',
				'a14': 'Vous proposez à Marc de s’associer à eux pour une partie du travail',
					'a16': 'Vous lui demander d\'adopter une posture plus constructive',
					'a17': 'Vous sollicitez des solutions auprès des autres membres de l\'équipe, au risque de vous mettre Fabrice à dos.',
				'a19': 'Vous maintenez le dialogue avec elle en valorisant ses propositions et les perspectives de développement',
				'a20': 'Vous essayez de vous appuyer sur les autres',
					'a22': 'Vous arrêtez les échanges avec lui et définissez le plan d’action avec les autres collaborateurs',
					'a23': 'Dans l\'élaboration du plan d\'action, vous attribuez des tâches à Fabrice ainsi qu’aux autres membres de l’équipe'
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
