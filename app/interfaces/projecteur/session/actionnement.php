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
		.hide{
			display: none !important;
		}
		.card {
			margin-bottom: 1.75rem !important;
		}
		div[id^=q] {
			margin-bottom: .75rem;
		}
		div[id^=q] div {
			display: block;
			height: 2rem;
			line-height: 2rem;
			text-align: right;
			padding-right: 1.5rem;
			color: #fff;
		}
		.answered {
			background-color: #507c9a;
		}
		.correctif {
			background-color: #6ec9f1;
		}
		span.answered,
		span.correctif {
			display: inline-block;
			vertical-align: middle;
			width: 1rem !important;
			height: 1rem !important;
		}
		.armand {
			background-color: #4caf50;
			color: #000;
			font-size: 1.25rem;
		}
		.armand.bad {
			background-color: #ff9800;
			color: #000;
		}
		.severine {
			background-color: #6ec9f1;
			color: #000;
			font-size: 1.25rem;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				Dans la peau d'Armand
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
					<div class="card notice w768 block center">
						<h1 class="display3 alter-btn-text">Dans la peau d'Armand</h1>
						<p class="txt-center">Individuellement, actionnez Séverine pour l’amener à épauler Sébastien dans la création de masques premium interconnectés.</p>
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
					<div id="actio" class="card w768 block center synteseQuizz hide"></div>
					<div id="eval" class="card w768 block center synteseQuizz hide">
						<div id="q1">
							<h3 class="alter-btn-text">Synchronisation</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Ecoute active</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Recherche commune</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">Bouclage</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<span class="answered"></span> Actionnement de Séverine
							</div>
							<div class="col-6">
								<span class="correctif"></span> Auto-évaluation
							</div>
						</div>
						<div id="comment"></div>
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
				recoverySave( 'getQuizzSpec.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":_msg.uuid }, retriveAnswer );
				if ( _msg.quizz == '0xa977516c75' ) {
					recoverySave( 'getQuizzSpec.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":_msg.uuid }, retriveAnswerOne );
					recoverySave( 'getQuizzSpec.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0xa977516c75', "uuid":_msg.uuid }, retriveAnswerTwo );
				}
			}
			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		function retriveAnswer( _answers ) {
			console.log( _answers.answer );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + _nom + ' ' + _prenom + '</h4>' );
			$( '#appSelect #actio').html( '' );
			_html = '';
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				spl = ( tmp.object.definition.correctResponsesPattern[0] ).split( '[,]' );
				console.log( spl );
				correctg = spl[ 0 ];
				correctt = spl[ 1 ];
				spl = ( tmp.result.response ).split( '[,]' );
				console.log( spl );
				reponseg = spl[ 0 ];
				reponset = spl[ 1 ];
				if ( correctt != reponset ) {
					_html += `<div><div class="row"><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/armand.png" alt="" class="center block"></div><div class="col-9"><div class="card armand bad">` + _actioning[ reponseg ][ reponset ].t + `</div></div><div class="col-1"></div></div></div><div><div class="row"><div class="col-1"></div><div class="col-9"><div class="card severine">` + _actioning[ reponseg ][ reponset ].a + `</div></div><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/severine.png" alt="" class="center block"></div></div></div>`;
				}
				else{
					_html += `<div><div class="row"><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/armand.png" alt="" class="center block"></div><div class="col-9"><div class="card armand">` + _actioning[ reponseg ][ reponset ].t + `</div></div><div class="col-1"></div></div></div><div><div class="row"><div class="col-1"></div><div class="col-9"><div class="card severine">` + _actioning[ reponseg ][ reponset ].a + `</div></div><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/severine.png" alt="" class="center block"></div></div></div>`;
				}
				console.log( _html );
			}
			$( '#appSelect #actio').html( _html );

			$( '#actio' ).removeClass( 'hide' );
			$( '#eval' ).addClass( 'hide' );
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		function retriveAnswerOne( _answers ) {
			console.log( _answers.answer );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + _nom + ' ' + _prenom + '</h4>' );
			$( '#appSelect #eval .answered').css('width', '50%').html( '' );

			_first = {1:0,2:0,3:0,4:0};
			_tmp = JSON.parse( _answers.answer[ 0 ].data );
			if( _tmp.result.success ) {
				_first[ 1 ] = ( 1 ).toFixed( 2 );
			}

			_sc = 0;
			_tmp = JSON.parse( _answers.answer[ 1 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_tmp = JSON.parse( _answers.answer[ 2 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_first[ 2 ] = ( _sc / 2 ).toFixed( 2 );

			_sc = 0;
			_tmp = JSON.parse( _answers.answer[ 3 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_tmp = JSON.parse( _answers.answer[ 4 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_first[ 3 ] = ( _sc / 2 ).toFixed( 2 );

			_tmp = JSON.parse( _answers.answer[ 5 ].data );
			if( _tmp.result.success ) {
				_first[ 4 ] = ( 1 ).toFixed( 2 );
			}

			$.each( _first, function( index, el ) {
				_val = parseFloat( el ) * 100;
				if( _val < 50 ) { _val = 50; }
				$( '#eval #q' + ( index ) + ' .answered' ).css('width', _val + '%' ).html( _val + '%' );
			} );
		};

		function retriveAnswerTwo( _answers ) {
			console.log( _answers.answer );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #eval .correctif').css('width', '50%').html( '' );
			_i = 1;
			$.each( _answers.answer, function( index, el ) {
				if( typeof el === 'object' ) {
					el = JSON.parse( el.data );
					console.log( el );
					_dim = 50;
					if( _i == 1 ) {
						if( el.result.response == 'a01' ) { _dim = 50; }
						if( el.result.response == 'a02' ) { _dim = 75; }
						if( el.result.response == 'a03' ) { _dim = 100; }
					}
					if( _i == 2 ) {
						if( el.result.response == 'b01' ) { _dim = 50; }
						if( el.result.response == 'b02' ) { _dim = 75; }
						if( el.result.response == 'b03' ) { _dim = 100; }
					}
					if( _i == 3 ) {
						if( el.result.response == 'c01' ) { _dim = 50; }
						if( el.result.response == 'c02' ) { _dim = 75; }
						if( el.result.response == 'c03' ) { _dim = 100; }
					}
					if( _i == 4 ) {
						if( el.result.response == 'd01' ) { _dim = 50; }
						if( el.result.response == 'd02' ) { _dim = 75; }
						if( el.result.response == 'd03' ) { _dim = 100; }
					}

					$( '#eval #q' + ( _i ) + ' .correctif' ).css('width', _dim + '%' ).html( _dim + '%' );

					_i++;
				}
			} );

			$( '#eval' ).removeClass( 'hide' );
		};

		var lcIO,
			appSeek = null,
			_nom,
			_prenom,
			_actioning = {
				0: {
					0: {
						'to': '1',
						'me': '01',
						't': 'Séverine ! Bonjour, tu vas bien ? Justement, je voulais te voir par rapport aux masques connectés, tu as 2 minutes ?',
						'a': 'Bonjour Armand ! Oui, dis-moi ? Que se passe-t-il ?'
					},
					1: {
						'to': '1',
						'me': '02',
						't': 'Séverine ! Justement, je voulais te parler. Je peux te voir maintenant s\'il te plaît ? ',
						'a': 'Armand, bonjour déjà. J\'ai que 2 minutes.'
					}
				},
				1: {
					0: {
						'to': '2',
						'me': '04',
						't': 'Voilà, Sébastien est chef de projet sur les masques interconnectés. Tout seul, il n\'y arrivera pas. Il me faut quelqu\'un pour travailler avec lui au moins à 50 % dessus. J\'aimerais que ce soit toi. Qu\'est-ce que t\'en penses ?',
						'a': '50 % ! C\'est énorme ! Et pourquoi moi ? Ça m\'intéresse, mais pas dans ces conditions.'
					},
					1: {
						'to': '2',
						'me': '03',
						't': 'Voilà, Sébastien est chef de projet sur les masques connectés. Ça consiste à développer des masques opérationnels. Tu as déjà travaillé sur ce type de recherches par le passé. J\'aimerais que tu épaules Sébastien avec ton expertise en y consacrant 50 % de ton temps. Qu\'est-ce que tu en penses ?',
						'a': 'Merci de me faire confiance. C\'est gratifiant d\'entendre ça, mais je ne peux pas passer autant de temps sur ce projet. Je ne saurais pas comment faire pour le reste.'
					}
				},
				2: {
					0: {
						'to': '4',
						'me': '06',
						't': 'Oui, je comprends tes craintes, néanmoins cela reste un projet stratégique et on doit s\'organiser pour que tu puisses pleinement t\'impliquer sur le sujet.',
						'a': 'Armand continue l\'échange et identifie les conditions d\'adhésion de Séverine, c\'est-à-dire, la charge de travail et la responsabilité en cas d\'échec.'
					},
					1: {
						'to': '4',
						'me': '05',
						't': 'Oui, je comprends tes craintes. Pourrais-tu m\'en dire un peu plus sur la charge de travail, qu\'est-ce qui bloque ?',
						'a': 'Armand continue l\'échange et identifie les conditions d\'adhésion de Séverine, c\'est-à-dire, la charge de travail et la responsabilité en cas d\'échec.'
					}
				},
				3: {},
				4: {
					0: {
						'to': '5',
						'me': '09',
						't': 'Je te propose que l\'on mette à plat tous tes projets et que l\'on revoie ensemble les priorités afin que tu puisses te dégager du temps sur Dreamium.',
						'a': 'Bon, dans ces conditions, je veux bien. Mais je ne suis pas prête à assumer la responsabilité d\'un projet aussi stratégique.'
					},
					1: {
						'to': '6',
						'me': '10',
						't': 'Je comprends qu\'il y a un problème d\'organisation, je pense que tu dois prendre le sujet en main et en profiter pour progresser. Essaie de déléguer un peu plus.',
						'a': 'D\'accord… Mais sincèrement, tu devrais trouver quelqu\'un d\'autre, je n\'ai pas envie de rajouter du travail aux collègues.'
					}
				},
				5: {
					0: {
						'to': '7',
						'me': '12',
						't': 'Justement, ce projet peut te faire grandir, te donner de la visibilité. Les responsabilités sont valorisées, je ne pense pas que tu doives raisonner de cette manière.',
						'a': 'D\'accord, je veux bien aider Sébastien'
					},
					1: {
						'to': '7',
						'me': '11',
						't': 'Je te rassure là-dessus, personne ne te demande d\'assumer les responsabilités du projet, je reste le responsable du service et des actions qui sont menées au sein de mon service.',
						'a': 'D\'accord, je veux bien aider Sébastien'
					}
				},
				6: {
					0: {
						'to': '8',
						'me': '13',
						't': 'J\'ai entièrement confiance en toi et je pense que tu es la plus à même à aider Sébastien efficacement. Tu ne rajoutes pas du travail aux équipes, il s\'agit d\'une réorganisation de la charge. Je l\'expliquerai à tes collègues, ne t\'inquiète pas là-dessus.',
						'a': 'Si tu veux…'
					},
					1: {
						'to': '8',
						'me': '14',
						't': 'Tu ne rajoutes pas du travail aux équipes, il s\'agit d\'une réorganisation de la charge. On est tous le même bateau, ils comprendront.',
						'a': 'Si tu veux…'
					}
				},
				7: {
					0: {
						'to': '9',
						'me': '15',
						't': 'Super ! Merci Séverine ! RDV demain à 14 h pour faire l\'évaluation de la charge de travail. Je vais prévenir Sébastien et je te laisse te rapprocher de lui pour que tu commences à t\'imprégner du sujet.',
						'a': 'Parfait, on fait comme ça. Merci.'
					},
					1: {
						'to': '9',
						'me': '16',
						't': 'Super ! Merci Séverine ! Je te laisse aller voir Sébastien et tu reviendras vers moi, si besoin.',
						'a': 'Parfait, on fait comme ça. Merci.'
					}
				},
				8: {
					0: {
						'to': '9',
						'me': '18',
						't': 'Merci Séverine ! Je te laisse aller voir Sébastien et tu reviendras vers moi si besoin.',
						'a': 'OK, mais je ne te promets rien.'
					},
					1: {
						'to': '9',
						'me': '17',
						't': 'Merci, je te propose que l\'on se voie demain pour mettre les choses à plat et on pourra reparler de tes craintes concernant la charge.',
						'a': 'OK, mais je ne te promets rien.'
					}
				}
			};
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
