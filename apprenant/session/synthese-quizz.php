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
				Quizz
			</div>
			<div id="star" class="col-2 blw txt-center"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w768 block center synteseQuizz">
				<div id="q1">
					<h3 class="alter-btn-text">1) Quel est le taux de réussite des projets de transformation en entreprise ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q2">
					<h3 class="alter-btn-text">2) Quels sont les premiers facteurs de risque identifiés sur la mise en place d’un projet de transformation?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q3">
					<h3 class="alter-btn-text">3) Combien de chefs d’entreprise estiment que le changement doit être accompagné ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q4">
					<h3 class="alter-btn-text">4) Quel est le principal facteur qui amène les entreprises à se transformer ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q5">
					<h3 class="alter-btn-text">5) La mise en œuvre d’une conduite du changement améliore les chances de réussir une transformation dans les délais, de :</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q6">
					<h3 class="alter-btn-text">6) Quel facteur fait en général échouer un projet ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q7">
					<h3 class="alter-btn-text">7) Dans quelle proportion les dirigeants considèrent les managers de proximité comme des acteurs à impliquer prioritairement ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q8">
					<h3 class="alter-btn-text">8) Combien de dirigeants jugent que leur entreprise a besoin de changer plus vite et plus souvent qu’il y a 5 ans ?</h3>
					<p><span class="answer"></span> <span class="correctif"></span></p>
				</div>
				<div id="q9">
					<h3 class="alter-btn-text">9) Quel est le principal effet qu’attendent les chefs d’entreprise d’un projet de changement ?</h3>
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
				'a01': '40%',
				'a02': '60%',
				'a03': '75%',
					'a04': 'Mise en œuvre',
					'a05': 'Climat social',
					'a06': 'Enveloppe budgétaire',
				'a07': '90%',
				'a08': '70%',
				'a09': '55%',
					'a10': 'L’évolution des modes de management',
					'a11': 'Les évolutions technologiques',
					'a12': 'La pression économique',
				'a13': '45%',
				'a14': '50%',
				'a15': '30%',
					'a16': 'La complexité technique',
					'a17': 'Le faible soutien des acteurs',
					'a18': 'La résistance des acteurs',
				'a19': '78%',
				'a20': '92%',
				'a21': '61%',
					'a22': '86%',
					'a23': '72%',
					'a24': '58%',
				'a25': 'La motivation des salariés',
				'a26': 'La satisfaction client',
				'a27': 'L’ambiance dans les équipes'
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			selection = getLocalData( '0x5175697a7a' );

			$.each( selection, function( index, el ) {

				console.log( index );
				console.log( $( '#q' + ( parseInt( index ) + 1 ) ) );

				cible = $( '#q' + ( parseInt( index ) + 1 ) );
				if ( el._correctAnswer != el._reponses ) {
					cible.find( '.answer' ).addClass( 'orange-text' ).html( answers[ el._reponses ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( answers[ el._correctAnswer ] );
				}
				else{
					cible.find( '.answer' ).addClass( 'green-text' ).html( answers[ el._reponses ] );
				}
			} );

			if ( parseFloat( selection.score ) >= 0.8 ) {
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
