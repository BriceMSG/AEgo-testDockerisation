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
				Dynamisez une transformation
			</div>
			<div id="star" class="col-2 blw txt-center"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w768 block center synteseQuizz">
				<div id="q1">
							<h3 class="alter-btn-text">Je pense que le projet est trop ambitieux, et que les moyens ne sont pas adaptés.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Je construis de nouvelles pratiques, je change mes habitudes.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Je pense que le changement est évitable.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">J’ai intégré le fait que le projet allait réellement être mené.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q5">
							<h3 class="alter-btn-text">J’insuffle de l’énergie sur le projet auprès des équipes, de mes pairs.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q6">
							<h3 class="alter-btn-text">Je prends part aux groupes de travail pour voir plus concrètement à quoi ressemble le projet.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q7">
							<h3 class="alter-btn-text">Je me pose des questions concernant la mise en place du projet de changement.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
						<div id="q8">
							<h3 class="alter-btn-text">J’identifie les opportunités que le projet peut apporter à mon niveau et tente de les saisir.</h3>
							<p><span class="answer"></span> <span class="correctif"></span></p>
						</div>
				<div id="comment"></div>
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
			answers = {
				'z1': 'Déni',
				'z2': 'Intégration',
				'z3': 'Résistance',
				'z4': 'Expérimentation'
			};

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			selection = getLocalData( '0x636f757262' );

			$.each( selection, function( index, el ) {

				cible = $( '#q' + ( index ) );
				if ( el[ '_correctAnswer' ] != el[ '_reponses' ] ) {
					cible.find( '.answer' ).addClass( 'orange-text' ).html( answers[ el[ '_reponses' ] ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( answers[ el[ '_correctAnswer' ] ] );
				}
				else{
					cible.find( '.answer' ).addClass( 'green-text' ).html( answers[ el[ '_reponses' ] ] );
				}
			} );

			if ( parseFloat( selection.score ) >= 0.75 ) {
				_stars = getLocalData( 'stars' );
				$( '#star' ).html( '<i class="material-icons">star</i>' );
				$( '#comment' ).html( 'Félicitations, vous avez déjà de bonnes connaissances du changement !' ).addClass( 'visible' );
				notif( 'valid', '<i class="material-icons left">star</i> Félicitations, vous avez déjà de bonnes connaissances du changement !<br>Vous gagnez une étoile.', 8 );
				if( typeof _stars[ '0x636f757262' ] === "undefined" ) { addStar( '0x636f757262' ); }
			}
		} );
	</script>
</body>
</html>
