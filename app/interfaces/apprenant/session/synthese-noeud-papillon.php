<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://apprenant.alteretgo.my-workflow.fr/">


	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/apprenant.css" rel="stylesheet" type="text/css">

	<style>
		.blocNote h3, .blocNote p, .blocNote label {
			font-family: 'annieuseyourtelescope', cursive;
			font-size: 1.3rem !important;
		}
		.blocNote .card {
			margin-top: 1rem;
			margin-bottom: 1rem;
			padding-top: 6rem;
			background-image: url("http://commun.alteretgo.my-workflow.fr/bloc0.png");
			background-repeat: no-repeat;
			background-position: 50% -1px;
		}
		.blocNote .card .hide{
			display: none;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Mobilisez vos équipes
			</div>
			<div id="star" class="col-2 blw txt-center"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div class="blocNote">
			<div class="w768 center block card txt-left">
				<p>Bonjour, merci d’être venus.<br>
				Aujourd’hui on prend quelques minutes pour échanger sur un sujet important. Vous avez entendu beaucoup de choses dans les couloirs et il est temps de mettre fin à vos interrogations. En tant que responsable, je vais donc vous parler en toute transparence des orientations stratégiques de Dreamask.</p>
				<div id="chp1" class="">
					<hr>
					<h3 class="alter-btn-text">Pourquoi ?</h3>
					<p></p>
				</div>
				<div id="chp2" class="">
					<hr>
					<h3 class="alter-btn-text">Quoi ?</h3>
					<p></p>
				</div>
				<div id="chp3" class="">
					<hr>
					<h3 class="alter-btn-text">Comment ?</h3>
					<p></p>
				</div>
				<div id="comment" class=""></div>
			</div>
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
			selection = {},
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
					's13':'On est en difficulté depuis plusieurs mois maintenant. On connaît tous les raisons de cette situation, je ne vais pas revenir dessus. Donc on doit évoluer.'
				},
				'2': {
					's21':'C‘est pourquoi plus que jamais, il nous faut ré-enchanter les rêves de demain. Cela signifie un positionnement premium, de nouveaux clients et un nouveau business model. Cette ambition, nous la porterons sous le nom de Dreamium. En quoi ça consiste pour notre direction ? Nous devons porter une innovation en rupture qui garantisse l’atteinte de cette ambition. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.',
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

			selection = getLocalData( '0x706170696c' );

			$.each( selection, function( index, el ) {
				if( typeof el === 'object' ){
					_cbl = $( '#chp' + ( index ) + ' p' );
					_cbl.html( answers[ index ][ el[ '_reponses' ] ] );
					if( el[ '_reponses' ] == _correct[ index ] ){ _cbl.addClass( 'green-text' ); }
					else if( el[ '_reponses' ] == _bof[ index ] ){ _cbl.addClass( 'orange-text' ); }
					else { _cbl.addClass( 'red-text' ); }
				}
			} );

			if ( parseFloat( selection.score ) <= 0.6 ) {
				notif( 'warning', 'Ce n’est pas tout à fait ça ! L’annonce d’Armand aurait mérité un peu plus d’explications et d’enthousiasme !', 8 );
				$( '#comment' ).html( 'Ce n’est pas tout à fait ça ! L’annonce d’Armand aurait mérité un peu plus d’explications et d’enthousiasme !' ).addClass( 'visible' );
			}
			else if ( parseFloat( selection.score ) <= 0.99 ) {
				notif( 'warning', 'Vous n’avez pas rédigé l’annonce idéale d’Armand mais vous êtes en bonne voie !', 8 );
				$( '#comment' ).html( 'Vous n’avez pas rédigé l’annonce idéale d’Armand mais vous êtes en bonne voie !' ).addClass( 'visible' );
			}
			else {
				_stars = getLocalData( 'stars' );
				$( '#star' ).html( '<i class="material-icons">star</i>' );
				$( '#comment' ).html( 'Félicitations, vous avez parfaitement su aider Armand dans la rédaction de son annonce !' ).addClass( 'visible' );
				notif( 'valid', '<i class="material-icons left">star</i> Félicitations, vous avez parfaitement su aider Armand dans la rédaction de son annonce !<br>Vous gagnez une étoile.', 8 );
				if( typeof _stars[ '0x706170696c' ] === "undefined" ) { addStar( '0x706170696c' ); }
			}
		} );
	</script>
</body>
</html>
