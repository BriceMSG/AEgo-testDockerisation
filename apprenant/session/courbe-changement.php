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
				Dynamisez une transformation
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="w512 center block card txt-left">
				<h3 class="alter-sombre-text txt-center title"></h3>
				<div class="zonage">
					<div class="row">
						<div class="col-6">
							<div id="z1" class="zone"></div>
						</div>
						<div class="col-6">
							<div id="z2" class="zone"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div id="z3" class="zone"></div>
						</div>
						<div class="col-6">
							<div id="z4" class="zone"></div>
						</div>
					</div>
				</div>
				<p class="italic txt-center">Sélectionnez la bonne zone</p>
				<div class="italic">Votre choix est définitif.</div>
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
			if ( _tmp.nbr == 8 ){
				goTo( 'synthese-courbe-changement.php' );
				return null;
			}
			else {
				nbr = _tmp.nbr;
				finite = JSON.parse( _tmp[ 'finite' ] );
				_qZone.html( _affirm[ 'ch' + ( nbr + 1 ) ].q );
				$( '.zone' ).removeClass( 'good wrong attempted' );
				sniffer = false;
			}
		};

		function initialized () {
			_declaration = _LRSbegin;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'courbe-changement' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
		};

		function segment ( _n, _quizzQuestion, _correctAnswer, _choices, _reponses, _success, _score, _finit ) {
			_finit = _finit || false;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'courbe-changement', _n ) );
			_declaration = _declaration.replace( /__quizzQuestion__/g, _quizzQuestion );
			_declaration = _declaration.replace( /__correctAnswer__/g, _correctAnswer );
			_declaration = _declaration.replace( /__choices__/g, _choices );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__success__/g, _success );
			_declaration = _declaration.replace( /__score__/g, _score );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'courbe-changement' ) );
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
			_selection = getLocalData( _idQuizz );
			_selection.nbr++;
			_selection[ _n ] = {};
			_tmp = _correctAnswer.split( '[.]' );
			_selection[ _n ][ '_correctAnswer' ] = _tmp[ 1 ];
			_tmp = _reponses.split( '[.]' );
			_selection[ _n ][ '_reponses' ] = _tmp[ 1 ];
			_selection[ 'finite' ] = JSON.stringify( finite );
			setLocalData( _idQuizz, _selection );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step ) {
			_msg = {
				"cible": "former",
				"msg": "courbe-changement-part",
				"id": _uuid,
				"step": _step
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
		};

		function finished () {
			_dtEnd = new Date();
			finite[ 'duration' ] = getDuration( _dtBegin, _dtEnd );
			finite[ 'groupe' ] = finite[ 'groupe' ].slice( 0, -1 );
			_reponsesGlobal = _reponsesGlobal.slice( 0, -3 );

			_declaration = _LRSend;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__stateEndVerb__/g, finite[ 'verb' ] );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'courbe-changement' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__reponsesGlobal__/g, _reponsesGlobal );
			_declaration = _declaration.replace( /__durationQuizz__/g, finite[ 'duration' ] );
			_declaration = _declaration.replace( /__successQuizz__/g, finite[ 'success' ] );
			_declaration = _declaration.replace( /__scoreQuizz__/g, finite[ 'score' ] );
			_declaration = _declaration.replace( /__groupeDeclaration__/g, finite[ 'groupe' ] );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtEnd.toISOString() );
			_declaration = JSON.parse( _declaration );
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
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sayFinish( finite[ 'score' ] );
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr[ "score" ] = finite[ 'score' ];
			setLocalData( _idQuizz, _slideNbr );
		};

		function sayFinish( _status ) {
			_msg = {
				"cible": "former",
				"msg": "courbe-changement",
				"id": _uuid,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-courbe-changement.php' );
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
			_idQuizz = '0x636f757262',
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
						"description": {
							"fr": "__quizzQuestion__"
						},
						"type": "http://adlnet.gov/expapi/activities/interaction",
						"interactionType": "matching",
						"correctResponsesPattern": [
							"__correctAnswer__"
						],
						"source":[__choices__],
						"target":[
							{ "id":"z1", "description":{ "fr":"Déni" } },
							{ "id":"z2", "description":{ "fr":"Engagement" } },
							{ "id":"z3", "description":{ "fr":"Résistance" } },
							{ "id":"z4", "description":{ "fr":"Exploration" } }
						]
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
						"type":"http://adlnet.gov/expapi/activities/interaction",
						"interactionType":"matching",
						"source":[
							{ "id":"q1", "description":{ "fr":"Je pense que le changement est évitable." } },
							{ "id":"q2", "description":{ "fr":"Je me pose des questions concernant la mise en place du projet de changement." } },
							{ "id":"q3", "description":{ "fr":"Je pense que le projet est trop ambitieux, et que les moyens ne sont pas adaptés." } },
							{ "id":"q4", "description":{ "fr":"J’ai intégré le fait que le projet allait réellement être mené." } },
							{ "id":"q5", "description":{ "fr":"Je construis de nouvelles pratiques, je change mes habitudes." } },
							{ "id":"q6", "description":{ "fr":"Je prends part aux groupes de travail pour voir plus concrètement à quoi ressemble le projet." } },
							{ "id":"q7", "description":{ "fr":"J’identifie les opportunités que le projet peut apporter à mon niveau et tente de les saisir." } },
							{ "id":"q8", "description":{ "fr":"J’insuffle de l’énergie sur le projet auprès des équipes, de mes pairs." } }
						],
						"target":[
							{ "id":"z1", "description":{ "fr":"Déni" } },
							{ "id":"z2", "description":{ "fr":"Engagement" } },
							{ "id":"z3", "description":{ "fr":"Résistance" } },
							{ "id":"z4", "description":{ "fr":"Exploration" } }
						]
					}
				},
				"result": {
					"response":"__reponsesGlobal__",
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
			_quizzName = 'Courbe du changement',
			_quizzNameDesc = 'Positionnez les réactions citées dans la zone qui leur correspond.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			}
			_reponsesGlobal = '',
			nbr = 0,
			selection = {},
			_i = 1,
			_affirm = {
				"ch1" :{
					"q": "Je pense que le projet est trop ambitieux, et que les moyens ne sont pas adaptés.",
					"c": "z3"
				},
				"ch2" :{
					"q": "Je construis de nouvelles pratiques, je change mes habitudes.",
					"c": "z4"
				},
				"ch3" :{
					"q": "Je pense que le changement est évitable.",
					"c": "z1"
				},
				"ch4" :{
					"q": "J’ai intégré le fait que le projet allait réellement être mené.",
					"c": "z3"
				},
				"ch5" :{
					"q": "J’insuffle de l’énergie sur le projet auprès des équipes, de mes pairs.",
					"c": "z2"
				},
				"ch6" :{
					"q": "Je prends part aux groupes de travail pour voir plus concrètement à quoi ressemble le projet.",
					"c": "z4"
				},
				"ch7" :{
					"q": "Je me pose des questions concernant la mise en place du projet de changement.",
					"c": "z3"
				},
				"ch8" :{
					"q": "J’identifie les opportunités que le projet peut apporter à mon niveau et tente de les saisir.",
					"c": "z4"
				}
			},
			sniffer = false;

		function showNext() {
			_qZone.html( _affirm[ 'ch' + ( nbr + 1 ) ].q );
			$( '.zone' ).removeClass( 'good wrong attempted' );
			sniffer = false;
		}

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			_reload = getLocalData( _idQuizz );
			console.log( _reload );

			if( _reload[ 'dtBegin' ] == undefined ) {
				_dtBegin = new Date();
				_reload[ 'dtBegin' ] = _dtBegin.toISOString();
			}
			else {
				console.log( "_reload[ 'dtBegin' ]", _reload[ 'dtBegin' ] );
				console.log( "Date.parse( _reload[ 'dtBegin' ] )", Date.parse( _reload[ 'dtBegin' ] ) );
				console.log( "parseInt( Date.parse( _reload[ 'dtBegin' ] ) )", parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) );
				console.log( "new Date( parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) )", new Date( parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) ) );
				_dtBegin = new Date( parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) );
			}

			if( _reload[ 'nbr' ] == undefined ) {
				_reload[ 'finite' ] = JSON.stringify( finite );
				_reload[ 'nbr' ] = 0;
			}
			setLocalData( _idQuizz, _reload );

			_ssid = getLocalData( "ssid" );
			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );

			_qZone = $( 'h3' );

			_qZone.html( _affirm[ 'ch' + ( nbr + 1 ) ].q );

			$( '.zone' ).click( function( event ) {
				event.preventDefault();

				if ( sniffer === true ) { return null; }
				sniffer = true;

				segment_n = nbr + 1;

				segment_quizzQuestion = _affirm[ 'ch' + ( nbr + 1 ) ].q;

				segment_correctAnswer = 'q' + ( nbr + 1 ) + '[.]' + _affirm[ 'ch' + ( nbr + 1 ) ].c;
				segment_choices = '{ "id":"q' + ( nbr + 1 ) + '", "description":{ "fr":"' + _affirm[ 'ch' + ( nbr + 1 ) ].q + '" } }';

				segment_reponses = 'q' + ( nbr + 1 ) + '[.]' + $( this ).attr( 'id' );
				_reponsesGlobal += segment_reponses + '[,]';


				segment_success = false;
				segment_score = 0;

				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'courbe-changement', segment_n ) + `",
					"definition":{
						"description":{
							"fr":"` + segment_quizzQuestion + `"
						},
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;

				if ( $( this ).attr( 'id' ) == _affirm[ 'ch' + ( nbr + 1 ) ].c ) {
					$( this ).addClass( 'good' );
					segment_success = true;
					segment_score = 1;
					finite[ 'score' ]++;
				}
				else {
					$( this ).addClass( 'wrong' );
					$( '#' + _affirm[ 'ch' + ( nbr + 1 ) ].c ).addClass( 'attempted' );
				}


				if ( segment_n != 8 ) {
					segment ( segment_n, segment_quizzQuestion, segment_correctAnswer, segment_choices, segment_reponses, segment_success, segment_score );
				}
				else{
					if ( finite[ 'score' ] == 0 ) {
						finite[ 'verb' ] = "failed";
						finite[ 'success' ] = false;
					}
					else if ( finite[ 'score' ] < 6 ) {
						finite[ 'verb' ] = "passed";
						finite[ 'success' ] = true;
					}
					else if ( finite[ 'score' ] == 8 ) {
						finite[ 'verb' ] = "mastered";
						finite[ 'success' ] = true;
					}
					else {
						finite[ 'verb' ] = "completed";
						finite[ 'success' ] = true;
					}

					finite[ 'score' ] = ( finite[ 'score' ] / 8 ).toFixed( 2 );

					segment ( segment_n, segment_quizzQuestion, segment_correctAnswer, segment_choices, segment_reponses, segment_success, segment_score, true );
					return false;
				}
				nbr++;

				setTimeout( showNext, 800 );
			} );
		} );
	</script>
</body>
</html>
