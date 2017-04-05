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
			<div id="title" class="col-12 title">
				Dans la peau d'Armand
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">
		<div id="actionnement">
			<form>
				<p class="hide" style="font-style: italic; padding: 1rem 1rem 0 1rem;">
					Armand continue l'échange et identifie les conditions d'adhésion de Séverine, c'est-à-dire, la charge de travail et la responsabilité en cas d'échec.<br>
					Il peut maintenant passer à la phase de recherche commune.
				</p>
				<div class="row">
					<div class="col-6">
						<div class="input-field">
							<input id="one" type="radio" name="actionnement" value="0">
							<label for="one">Séverine ! Bonjour, tu vas bien ? Justement, je voulais te voir par rapport aux masques connectés, tu as 2 minutes ?</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-field">
							<input id="two" type="radio" name="actionnement" value="1">
							<label for="two">Séverine ! Justement, je voulais te parler. Je peux te voir maintenant s'il te plaît ?</label>
						</div>
					</div>
				</div>
				<div class="txt-center">
					<a href="" id="next" class="btn alter-btn white-text">
						<i class="material-icons left">polymer</i>
						Actionner Séverine
					</a>
					<div class="italic">Votre choix est définitif.</div>
				</div>
			</form>
			<img id="actio" src="http://commun.alteretgo.my-workflow.fr/actionnement/poster.jpg" alt="">
			<video id="" poster="http://commun.alteretgo.my-workflow.fr/actionnement/poster.jpg" src="http://commun.alteretgo.my-workflow.fr/actionnement/act-00.mp4"></video>
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
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); if ( hasLocalData( _idQuizz ) ) { recovery(); } else { initialized(); } $( '#content, #jingle' ).addClass( 'show' ); setTimeout( function() { $( '#jingle' ).css( 'display', 'none' ); }, 3000 ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}

		function recovery () {
			_tmp = getLocalData( _idQuizz );
			if ( _tmp.nbr >= 6 ){
				goTo( 'auto-evaluation-actionnement.php' );
				return null;
			}
			else {
				_iterate = _tmp.nbr + 1;
				_stepIng = _tmp.stepIng;
				finite = JSON.parse( _tmp[ 'finite' ] );

				if( _tmp[ _tmp.nbr ] == undefined) {
					return;
				}

				_tmp = _tmp[ _tmp.nbr ]._reponses.split( '[,]');
				_stepIng = _actioning[ _stepIng ][ _tmp[ 1 ] ].to;

				if( _stepIng == 4 ) { $( _form ).find( 'p' ).removeClass( 'hide' ); }
				else { $( _form ).find( 'p' ).addClass( 'hide' ); }

				$( _inpG ).prop( 'checked', false );
				$( _inpB ).prop( 'checked', false );

				$.each( $( _form ).find( 'label' ), function( index, val ) {
					$( val ).html( _actioning[ _stepIng ][ index ].t );
				} );
			}
		};

		function initialized () {
			_declaration = _LRSbegin;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'actionnement' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
		};

		function segment ( _n, _correctAnswer, _choices, _reponses, _success, _score, _finit ) {
			_finit = _finit || false;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'actionnement', _n ) );
			_declaration = _declaration.replace( /__correctAnswer__/g, _correctAnswer );
			_declaration = _declaration.replace( /__choices__/g, _choices );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__success__/g, _success );
			_declaration = _declaration.replace( /__score__/g, _score );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'actionnement' ) );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtPart.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sendToSave(
				'save-solo.php',
				{
					'ssid': _ssid,
					'uuid': _uuid,
					'quizz': _idQuizz,
					'data': JSON.stringify( _declaration )
				}
			);
			sayPart( _n, _success );
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr.nbr = _iterate;
			_slideNbr.stepIng = _stepIng;
			_slideNbr[ _n ] = {};
			_slideNbr[ _n ][ "_reponses" ] = _reponses;
			_slideNbr[ _n ][ "_correctAnswer" ] = _correctAnswer;
			_slideNbr[ 'finite' ] = JSON.stringify( finite );
			setLocalData( _idQuizz, _slideNbr );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step, _status ) {
			_msg = {
				"cible": "former",
				"msg": "actionnement-part",
				"id": _uuid,
				"step": _step,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
		};

		function finished () {
			_dtEnd = new Date();
			finite[ 'duration' ] = getDuration( _dtBegin, _dtEnd );
			finite[ 'groupe' ] = finite[ 'groupe' ].slice( 0, -1 );

			_declaration = _LRSend;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__stateEndVerb__/g, finite[ 'verb' ] );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'actionnement' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__durationQuizz__/g, finite[ 'duration' ] );
			_declaration = _declaration.replace( /__successQuizz__/g, finite[ 'success' ] );
			_declaration = _declaration.replace( /__scoreQuizz__/g, finite[ 'score' ] );
			_declaration = _declaration.replace( /__groupeDeclaration__/g, finite[ 'groupe' ] );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtEnd.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sendToSave(
				'save-results.php',
				{
					'ssid': _ssid,
					'uuid': _uuid,
					'quizz': _idQuizz,
					'duration': finite[ 'duration' ],
					'score': finite[ 'score' ]
				}
			);
			sayFinish( finite[ 'score' ] );
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr[ "score" ] = finite[ 'score' ];
			setLocalData( _idQuizz, _slideNbr );
		};

		function sayFinish( _status ) {
			_msg = {
				"cible": "former",
				"msg": "actionnement",
				"id": _uuid,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
		};

		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );

			_cibles = [ _uuid, "apps" ];

			if ( $.inArray( _msg.cible, _cibles ) == -1 ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == "goto" ) {
				goTo( _msg.data );
			}
		};
		function callbackLRSMsg( _msg ) {};

		var lcIo,
			_idQuizz = '0x6e6e656d65',
			_LRSbegin = `{
				"actor": {
					"objectType": "Agent",
					"name": "__nom__,__prenom__",
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/initialized",
					"display" : {
						"en-US" : "initialized"
					}
				},
				"object": {
					"objectType": "Activity",
					"id": "__uriQuizz__",
					"definition": {
						"name": {
							"fr": "__quizzName__"
						},
						"description": {
							"fr": "__quizzNameDesc__"
						},
						"type": "http://adlnet.gov/expapi/activities/lesson"
					}
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ]
					},
					"instructor": {
						"objectType": "Agent",
						"account":{
							"homePage": "__uriCourseFormator__",
							"name": "__uuidFormator__"
						}
					}
				},
				"timestamp":"__timeStamp__"
			}`,
			_LRSsegment = `{
				"actor": {
					"objectType": "Agent",
					"name": "__nom__,__prenom__",
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/answered",
					"display" : {
						"en-US" : "answered"
					}
				},
				"object": {
					"objectType": "Activity",
					"id": "__uriQuizzInc__",
					"definition": {
						"type": "http://adlnet.gov/expapi/activities/interaction",
						"interactionType": "choice",
						"correctResponsesPattern": [
							"__correctAnswer__"
						],
						"choices": [__choices__]
					}
				},
				"result": {
					"response": "__reponses__",
					"success": __success__,
					"score": {
						"scaled" : __score__
					}
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriQuizz__"
						} ]
					},
					"instructor": {
						"objectType": "Agent",
						"account":{
							"homePage": "__uriCourseFormator__",
							"name": "__uuidFormator__"
						}
					}
				},
				"timestamp":"__timeStamp__"
			}`,
			_LRSend = `{
				"actor": {
					"objectType": "Agent",
					"name": "__nom__,__prenom__",
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/__stateEndVerb__",
					"display" : {
						"en-US" : "__stateEndVerb__"
					}
				},
				"object": {
					"objectType": "Activity",
					"id": "__uriQuizz__",
					"definition": {
						"name": {
							"fr": "__quizzName__"
						},
						"description": {
							"fr": "__quizzNameDesc__"
						},
						"type": "http://adlnet.gov/expapi/activities/lesson"
					}
				},
				"result": {
					"duration":"__durationQuizz__",
					"success": __successQuizz__,
					"score": {
						"scaled" : __scoreQuizz__
					}
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ],
						"grouping": [__groupeDeclaration__]
					},
					"instructor": {
						"objectType": "Agent",
						"account":{
							"homePage": "__uriCourseFormator__",
							"name": "__uuidFormator__"
						}
					}
				},
				"timestamp":"__timeStamp__"
			}`,
			_inputs,
			_iterate = 1,
			_working = false,
			_dtBegin,
			__uuidFormator,
			_dtEnd,
			__duration,
			_quizzName = 'Actionnement',
			_quizzNameDesc = 'Aider Armand à choisir les meilleures phrases pour actionner Séverine.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			},
			_state = {
				0:{ 'g': 0 },
				1:{ 'g': 1 },
				2:{ 'g': 1 },
				3:{},
				4:{ 'g': 0 },
				5:{ 'g': 1 },
				6:{ 'g': 0 },
				7:{ 'g': 0 },
				8:{ 'g': 1 }
			},
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
						't': 'Séverine ! Justement, je voulais te parler. Je peux te voir maintenant s\'il te plaît ?',
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
			},
			_stepIng = 0,
			_endSend = false;
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			_reload = getLocalData( _idQuizz );

			if( _reload[ 'dtBegin' ] == undefined ) {
				_dtBegin = new Date();
				_reload[ 'dtBegin' ] = _dtBegin.toISOString();
			}
			else {
				_dtBegin = new Date( parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) );
			}

			if( _reload[ 'nbr' ] == undefined ) {
				_reload[ 'finite' ] = JSON.stringify( finite );
				_reload[ 'nbr' ] = 1;
				_reload[ 'stepIng' ] = 0;
			}

			setLocalData( _idQuizz, _reload );

			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );

			_actionnement = $( '#actionnement' );
			_form =  _actionnement.find( 'form' );
			_inpG = _form.find( 'input#one' );
			_inpB = _form.find( 'input#two' );
			_img = _actionnement.find( 'img' );
			_video = _actionnement.find( 'video' );

			$( '#next' ).click( function( event ) {
				event.preventDefault();

				if( _inpG.is( ':checked' ) === false ) {
					if( _inpB.is( ':checked' ) === false ) {
						notif( 'warning', 'Veuillez séléctionner une action.' );
						_return = false;
						return false;
					}
					else { _chk = _inpB; }
				}
				else { _chk = _inpG; }

				if( _actioning[ _stepIng ][ _chk.val() ].to == 9 ) {
					_endSend = true;
				}

				$( _video ).attr( 'src', 'http://commun.alteretgo.my-workflow.fr/actionnement/act-' + _actioning[ _stepIng ][ _chk.val() ].me + '.mp4' );

				$( _form ).addClass( 'hide' );
				$( _img ).addClass( 'hide' );

				_video.get( 0 ).play();
				_video.bind( "ended", function () {
					if( _endSend ) {
						goTo( 'auto-evaluation-actionnement.php' );
					}
					else {
						$(this).unbind( "ended" );
						$( _form ).removeClass( 'hide' );
						$( _img ).removeClass( 'hide' );
					}
				} );

				_n = _iterate;
				_correctAnswer = _stepIng + '[,]' + _state[ _stepIng ].g;
				_choices = '';
				$.each(  _actioning[ _stepIng ], function( index, val ) {
					_choices += `{
						"id":"` + _stepIng + `[,]` + index + `",
						"description":{
							"fr": "` + val.t + `"
						}
					},`
				} );

				_choices = _choices.slice( 0, -1 );

				_reponses = _stepIng + `[,]` + _chk.val();

				_success = false;
				_score = 0;

				if ( _reponses == _correctAnswer ) {
					_success = true;
					_score = 1;
					finite[ 'score' ]++;
				}

				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'actionnement', _n ) + `",
					"definition":{
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;

				console.log( '_iterate', _iterate );
				if( _endSend ) {
					if ( finite[ 'score' ] == 0 ) {
						finite[ 'verb' ] = "failed";
						finite[ 'success' ] = false;
					}
					else if ( finite[ 'score' ] == 6 ) {
						finite[ 'verb' ] = "mastered";
						finite[ 'success' ] = true;
					}
					else {
						finite[ 'verb' ] = "completed";
						finite[ 'success' ] = true;
					}

					finite[ 'score' ] = ( finite[ 'score' ] / 6 ).toFixed( 2 );
				}
				segment ( _n, _correctAnswer, _choices, _reponses, _success, _score , _endSend );
				_iterate++;
				_stepIng = _actioning[ _stepIng ][ _chk.val() ].to;
				if( _endSend === false ) {
					if( _stepIng == 4 ) { $( _form ).find( 'p' ).removeClass( 'hide' ); }
					else { $( _form ).find( 'p' ).addClass( 'hide' ); }

					$( _inpG ).prop( 'checked', false );
					$( _inpB ).prop( 'checked', false );

					$.each( $( _form ).find( 'label' ), function( index, val ) {
						$( val ).html( _actioning[ _stepIng ][ index ].t );
					} );
				}
			} );

		} );
	</script>
</body>
</html>
