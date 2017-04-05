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
				Mobilisez vos équipes
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">

		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">Mobilisez vos équipes</h1>
						<p class="txt-center">Individuellement, aidez Armand à faire son annonce.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="appSelect">
			<div class="vwrap p0">
				<div class="valign-left p0">
					<div class="center block card txt-left">
						<div class="txt-center" id="apprennantId"></div>
						<p>Bonjour, merci d’être venus.<br>
						Aujourd’hui on prend quelques minutes pour échanger sur un sujet important. Vous avez entendu beaucoup de choses dans les couloirs et il est temps de mettre fin à vos interrogations. En tant que responsable, je vais donc vous parler en toute transparence des orientations stratégiques de Dreamask.</p>
						<div id="chp1" class="">
							<hr>
							<h3>Pourquoi ?</h3>
							<p></p>
						</div>
						<div id="chp2" class="">
							<hr>
							<h3>Quoi ?</h3>
							<p></p>
						</div>
						<div id="chp3" class="">
							<hr>
							<h3>Comment ?</h3>
							<p></p>
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
			$( 'div[id^=chp] p').html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				_cbl = $( '#chp' + ( i + 1 ) + ' p' );
				_cbl.html( answers[ ( i + 1 ) ][ tmp.result.response ] );
				if( tmp.result.response == _correct[ ( i + 1 ) ] ){ _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'green-text' ); }
				else if( tmp.result.response == _bof[ ( i + 1 ) ] ){ _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'orange-text' ); }
				else { _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'red-text' ); }
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIO,
			_idQuizz = '0x706170696c',
			appSeek = null,
			_nom,
			_prenom,
			_correct = {
				'1': 's11',
				'2': 's21',
				'3': 's31'
			},
			_bof = {
				'1': 's12',
				'2': 's22',
				'3': 's32'
			},
			answers = {
				'1': {
					's11':'L’entreprise n’est pas dans ses meilleurs jours. La concurrence nous fait mal, les clients achètent de moins en moins de masques. Le chiffre d’affaires a d’ailleurs  baissé de 15% dans les 6 derniers mois. Nous devons changer pour éviter de mettre la clé sous la porte dans 2 ans.',
					's12':'L’entreprise n’est pas au mieux ces derniers temps. On le voit tous les jours dans nos stats. On n’arrive plus à vendre nos masques, le chiffre d’affaires a baissé de 5,15% l’année dernière, 4,79% il y a 2 ans, 5,04% il y a 3 ans, etc...',
					's13':'On est en difficulté depuis plusieurs mois maintenant. On connaît tous les raisons de cette situation, je ne vais pas revenir dessus. Donc on doit évoluer'
				},
				'2': {
					's21':'C‘est pourquoi plus que jamais, il nous faut ré-enchanter les rêves de demain. Cela signifie un positionnement premium, de nouveaux clients et un nouveau business model. Cette ambition nous la porterons sous le nom de Dreamium. En quoi ça consiste pour notre direction ? Nous devons porter une innovation en rupture qui garantisse l’atteinte de cette ambition. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.',
					's22':'L’entreprise a besoin de changer de stratégie, c’est pourquoi il a été décidé d’adopter un positionnement premium, en ciblant de nouveaux clients et en développant un nouveau business model. En quoi ça consiste pour notre direction ? Nous devons veiller à développer de nouveaux produits premium qui permettent d’atteindre ces nouveaux objectifs. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.',
					's23':'L’entreprise a besoin de changer de stratégie, donc on va tenter un positionnement premium pour toucher de nouveaux clients et développer un nouveau business model. L‘objectif serait de relancer nos ventes de 15% dès l‘année prochaine. En quoi ça consiste pour notre direction ? En tant que production créative, c’est notre travail de sortir des nouveaux produits et de les mettre sur le marché. On attend de nous de développer un produit premium. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.'
				},
				'3': {
					's31':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination. Le nouveau concept le voici : faire rêver de façon unique !<br>Nous allons tout d’abord moderniser nos lignes de production et augmenter notre budget développement. Pour être efficaces nous devons aussi reprioriser nos projets pour ne garder que ceux qui tendent vers le Premium.<br>Je vais avoir besoin de 3 d’entre vous pour travailler sur des innovations en rupture. Je souhaiterais que tout le monde contribue à la réflexion.  Je compte sur vous pour donner le meilleur de vous-même et mobiliser vos équipes, comme vous avez toujours su le faire.',
					's32':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination.<br>Nous allons tout d’abord moderniser nos lignes de production et augmenter notre budget développement. Pour être efficaces nous devons aussi reprioriser nos projets pour ne garder que ceux qui tendent vers le Premium.<br>J’ai déjà des idées à vous proposer sur de nouveaux produits mais vos idées sont les bienvenues. J’ai besoin de 3 d’entre vous sur ce chantier, Séverine, Sébastien, Laura, j’ai pensé à vous, qu’en pensez-vous ?',
					's33':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination. Le nouveau concept le voici : faire rêver de façon unique !<br>J’ai déjà des idées à vous proposer mais vos idées sont les bienvenues. J’ai besoin de 3 d’entre vous sur ce chantier, Séverine, Sébastien, Laura, j’ai pensé à vous. Par ailleurs voici l’agenda qui court jusqu’au prochain trimestre et qui détaille les actions à mener. Je compte sur vous.'
				}
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
