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
				Auto-évaluation
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="w512 center block card txt-left">
				<p>Veuillez évaluer votre performance dans l'actionnement de Séverine par rapport aux différentes parties du SEARCH.</p>
				<form id="quizz" autocomplete="off">
					<div class="slide show">
						<h3>Synchronisation</h3>
						<div class="input-field">
							<input type="radio" id="a01" name="q1" value="50">
							<label for="a01">De 0% à 50%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="a02" name="q1" value="75">
							<label for="a02">De 50% à 75%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="a03" name="q1" value="100">
							<label for="a03">De 75% à 100%</label>
						</div>
					</div>
					<div class="slide">
						<h3>Ecoute active</h3>
						<div class="input-field">
							<input type="radio" id="b01" name="q2" value="50">
							<label for="b01">De 0% à 50%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="b02" name="q2" value="75">
							<label for="b02">De 50% à 75%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="b03" name="q2" value="100">
							<label for="b03">De 75% à 100%</label>
						</div>
					</div>
					<div class="slide">
						<h3>Recherche commune</h3>
						<div class="input-field">
							<input type="radio" id="c01" name="q3" value="50">
							<label for="c01">De 0% à 50%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="c02" name="q3" value="75">
							<label for="c02">De 50% à 75%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="c03" name="q3" value="100">
							<label for="c03">De 75% à 100%</label>
						</div>
					</div>
					<div class="slide">
						<h3>Bouclage</h3>
						<div class="input-field">
							<input type="radio" id="d01" name="q4" value="50">
							<label for="d01">De 0% à 50%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="d02" name="q4" value="75">
							<label for="d02">De 50% à 75%</label>
						</div>
						<div class="input-field">
							<input type="radio" id="d03" name="q4" value="100">
							<label for="d03">De 75% à 100%</label>
						</div>
					</div>
				</form>
				<div class="txt-right">
					<a href="#!" id="next" class="btn alter-btn white-text">
						<i class="material-icons left">save</i>
						<i class="material-icons right">chevron_right</i>
						Partie suivante
					</a>
					<div class="italic">Votre choix est définitif.</div>
				</div>
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
			if ( _tmp.nbr == 4 ){
				goTo( 'synthese-actionnement.php' );
				return null;
			}
			else {
				_iterate = _tmp.nbr;
				finite = JSON.parse( _tmp[ 'finite' ] );
				$( '.slide.show' ).removeClass( 'show' );
				$( '.slide:eq(' + _tmp.nbr + ')' ).addClass( 'show' );
			}
		};

		function initialized () {
			_declaration = _LRSbegin;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'auto-evaluation' ) );
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
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'auto-evaluation', _n ) );
			_declaration = _declaration.replace( /__quizzQuestion__/g, _quizzQuestion );
			_declaration = _declaration.replace( /__correctAnswer__/g, _correctAnswer );
			_declaration = _declaration.replace( /__choices__/g, _choices );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__success__/g, _success );
			_declaration = _declaration.replace( /__score__/g, _score );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'auto-evaluation' ) );
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
			_slideNbr.nbr++;
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
				"msg": "auto-evaluation-part",
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
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'auto-evaluation' ) );
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
				"msg": "auto-evaluation",
				"id": _uuid,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-auto-evaluation.php' );
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
			_idQuizz = '0xa977516c75',
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
			_instructor,
			_dtEnd,
			_duration,
			_quizzName = 'Auto évaluation sur l\'actionnement de Séverine',
			_quizzNameDesc = 'Veuillez évaluer votre performance dans l\'actionnement de Séverine par rapport aux différentes parties du SEARCH.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			}
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
				_reload[ 'nbr' ] = 0;
			}
			setLocalData( _idQuizz, _reload );

			_ssid = getLocalData( "ssid" );
			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );

			$( '#next' ).click( function( event ) {
				event.preventDefault();

				/* Si pas déja en train de travailler */
				if ( _working ) { return null; }
				_working = true;

				/* Recuperation des éléments */
				_tmp = $( '.slide.show' ),
				_chk = _tmp.find( 'input:checked' );

				if ( _chk.length == 0 ) {
					notif( 'warning', 'Veuillez sélectionner une réponse.' );
					_working = false;
					return null;
				}

				/* Désactivation des inputs */
				$.each( _inputs, function( index, val ) {
					val.disabled = true;
				} );

				_actionnement = getLocalData( '0x6e6e656d65' );
				_scoreActio = 0;
				if( _iterate == 1 ) {
					if( _actionnement[ 2 ][ '_reponses' ] == _actionnement[ 2 ][ '_correctAnswer' ] ) {
						_scoreActio = ( 1 ).toFixed( 2 );
					}
				}
				if( _iterate == 2 ) {
					if( _actionnement[ 3 ][ '_reponses' ] == _actionnement[ 3 ][ '_correctAnswer' ] ) {
						_scoreActio++;
					}
					if( _actionnement[ 4 ][ '_reponses' ] == _actionnement[ 4 ][ '_correctAnswer' ] ) {
						_scoreActio++;
					}
					_scoreActio = ( _scoreActio / 2 ).toFixed( 2 );
				}
				if( _iterate == 3 ) {
					if( _actionnement[ 5 ][ '_reponses' ] == _actionnement[ 5 ][ '_correctAnswer' ] ) {
						_scoreActio++;
					}
					if( _actionnement[ 6 ][ '_reponses' ] == _actionnement[ 6 ][ '_correctAnswer' ] ) {
						_scoreActio++;
					}
					_scoreActio = ( _scoreActio / 2 ).toFixed( 2 );
				}
				else {
					if( _actionnement[ 7 ][ '_reponses' ] == _actionnement[ 7 ][ '_correctAnswer' ] ) {
						_scoreActio = ( 1 ).toFixed( 2 );
					}
				}

				/* Récupération des infos */
				segment_n = _iterate;
				segment_quizzQuestion = _tmp.find( 'h3' ).html();
				segment_correctAnswer = '';
				segment_choices = '';

				_chkVal = _chk.val();

				_tmpInpt = _tmp.find( 'input' );
				$.each( _tmpInpt, function( index, val ) {
					val = $( val );
					_vI = val.attr( 'id' );
					_label = val.next().html();

					if( _chkVal == 50 && _scoreActio == 0 ) { segment_correctAnswer = _vI; }
					else if( _chkVal == 75 && _scoreActio == 0.75 ) { segment_correctAnswer = _vI; }
					else { segment_correctAnswer = _vI; }

					segment_choices += `{
						"id":"` + _vI + `",
						"description":{
							"fr": "` + _label + `"
						}
					},`
				} );

				segment_choices = segment_choices.slice( 0, -1 );

				segment_reponses = _chk.attr( 'id' );

				segment_success = false;
				segment_score = 0;

				if ( segment_reponses == segment_correctAnswer ) {
					segment_success = true;
					segment_score = 1;
					finite[ 'score' ]++;
				}


				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'quizz', segment_n ) + `",
					"definition":{
						"description":{
							"fr":"` + segment_quizzQuestion + `"
						},
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;

				if ( _tmp.next().length != 0 ) {
					segment ( segment_n, segment_quizzQuestion, segment_correctAnswer, segment_choices, segment_reponses, segment_success, segment_score );
				}
				else{
					if ( finite[ 'score' ] == 0 ) {
						finite[ 'verb' ] = "failed";
						finite[ 'success' ] = false;
					}
					else if ( finite[ 'score' ] == 4 ) {
						finite[ 'verb' ] = "mastered";
						finite[ 'success' ] = true;
					}
					else {
						finite[ 'verb' ] = "completed";
						finite[ 'success' ] = true;
					}

					finite[ 'score' ] = ( finite[ 'score' ] / 4 ).toFixed( 2 );

					segment ( segment_n, segment_quizzQuestion, segment_correctAnswer, segment_choices, segment_reponses, segment_success, segment_score, true );
					return false;
				}

				/* Changement de slide */
				_iterate++;
				_tmp.removeClass( 'show' );
				_tmp = _tmp.next();
				_tmp.addClass( 'show' );

				/* Si le slide est le dernier */
				if ( _tmp.next().length == 0 ) {
					$( '#next' ).html( '<i class="material-icons left">save</i><i class="material-icons right">exit_to_app</i>Enregistrer | Résultat' );
				}

				/* Réactivation des inputs */
				$.each( _inputs, function( index, val ) {
					val.disabled = false;
				} );

				_working = false;

				return null;
			} );
		} );
	</script>
</body>
</html>
