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
		.preSelectedZone{
			-webkit-box-shadow: 0 2px 10px 0 rgba(0,0,0,0.25),0 2px 15px 0 rgba(0,0,0,0.40);
			box-shadow: 0 2px 10px 0 rgba(0,0,0,0.25),0 2px 15px 0 rgba(0,0,0,0.40);
		}
		.stepImg img{
			display: block !important;
			margin: 0 auto !important;
			height: auto !important;
		}
		.stepImg.selected img{
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
		}
		#wordselector .card{
			font-size: 1rem;
			text-align: center;
		}
		#imgMind {
			display: block !important;
			margin-right: auto !important;
			margin-left: auto !important;
		}
		.col-1-7{
			width: 6.25%;
		}
		.col-2-7{
			width: 12.5%;
		}
		.roi{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/roi.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		.magicien{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/magicien.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		.dragon{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/dragon.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		.chevalier{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/chevalier.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		.peuple{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/peuple.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
			padding-left: 0;
			padding-right: 0;
		}
		.menace{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/menace.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		.graal{
			background-image: url("http://commun.alteretgo.my-workflow.fr/aventure/graal.png");
			background-repeat: no-repeat;
			background-position: 50% .75rem;
			padding-top: 200px;
			-webkit-background-size: 90% auto;
			background-size: 90% auto;
		}
		#imagesSelector {
			background-color: transparent;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				L'aventure Dreamask
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div id="imagesSelector" class="vwrap">
			<div class="valign">
				<div class="row no-after">
				<div class="col-3 stepImg" data-img="perso01" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso01.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso02" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso02.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso03" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso03.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso04" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso04.png" alt="" class="">
					</div>
				</div>
				</div>
				<div class="row no-after">
				<div class="col-3 stepImg" data-img="perso05" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso05.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso06" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso06.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso07" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso07.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso08" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/aventure/perso08.png" alt="" class="">
					</div>
				</div>
				</div>
			</div>
		</div>
		<div id="wordselector" class="txt-center">
			<div class="row">
				<div class="col-3">
					<div class="vwrap">
						<div class="valign">
							<a href="#!" id="prev" class="btn alter-btn white-text">
								<i class="material-icons left">chevron_left</i>
								Précédent
							</a>
						</div>
					</div>
				</div>
				<div class="col-6">
					<img id="imgMind" src="" alt="" class="block center">
				</div>
				<div class="col-3">
					<div class="vwrap">
						<div class="valign">
							<div class="italic">Votre choix est définitif.</div>
							<a href="#!" id="valid" class="btn alter-btn white-text op0">
								<i class="material-icons right">check</i>
								Valider
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="block center 512">
				<div class="row">
					<div class="col-1 col-1-7"></div>
					<div class="col-1 col-2-7">
						<div data-pos="1" class="card word alter-clair white-text txt-center roi">
							Roi
						</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="2" class="card word alter-clair white-text txt-center magicien">
							Magicien
						</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="3" class="card word alter-clair white-text txt-center dragon">
							Dragon
						</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="4" class="card word alter-clair white-text txt-center chevalier">
							Héros
						</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="5" class="card word alter-clair white-text txt-center peuple">Communauté</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="6" class="card word alter-clair white-text txt-center menace">Menace</div>
					</div>
					<div class="col-1 col-2-7">
						<div data-pos="7" class="card word alter-clair white-text txt-center graal">Graal</div>
					</div>
					<div class="col-1 col-1-7"></div>
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
			if ( _tmp.nbr == 8 ){
				goTo( 'synthese-modele-aventure.php' );
				return null;
			}
			else {
				nbr = _tmp.nbr;
				finite = JSON.parse( _tmp[ 'finite' ] );
				$.each( _tmp, function( index, val ) {
					$( 'div.stepImg[data-img="' + val.img + '"]' ).addClass( 'selected' ).attr( 'data-word', _srcWrd[ val.word ] );
					$( '#' + val.word ).addClass( 'selected' );
				} );
			}
		};

		function initialized () {
			_declaration = _LRSbegin;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'modele-aventure' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			console.log( _declaration );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
		};

		function segment ( _n, _correctAnswer, _reponses, _success, _score, _finit ) {
			_finit = _finit || false;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'modele-aventure', _n ) );
			_declaration = _declaration.replace( /__correctAnswer__/g, _correctAnswer );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__success__/g, _success );
			_declaration = _declaration.replace( /__score__/g, _score );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'modele-aventure' ) );
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
			sayPart( _n );
			_selection = getLocalData( _idQuizz );
			_selection.nbr++;
			_selection[ _n ] = {};
			_tmp = _reponses.split( '[.]' );
			_selection[ _n ][ 'img' ] = _tmp[ 0 ];
			_selection[ _n ][ 'word' ] = _tmp[ 1 ];
			_selection[ 'finite' ] = JSON.stringify( finite );
			setLocalData( _idQuizz, _selection );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step ) {
			_msg = {
				"cible": "former",
				"msg": "modele-aventure-part",
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
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'modele-aventure' ) );
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
			console.log( _declaration );
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
				"msg": "modele-aventure",
				"id": _uuid,
				"status": _status,
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-modele-aventure.php' );
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
			_idQuizz = '0x6176656e74',
			_LRSbegin = `{
				"actor": {
					"objectType":"Agent",
					"name":"__nom__,__prenom__",
					"account":{
						"homePage":"__uriCourse__",
						"name":"__uuidSSID__"
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
					"objectType":"Agent",
					"name":"__nom__,__prenom__",
					"account":{
						"homePage":"__uriCourse__",
						"name":"__uuidSSID__"
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
						"interactionType": "matching",
						"correctResponsesPattern": [
							"__correctAnswer__"
						],
						"source":[
							{ "id":"img01", "description":{ "fr":"perso01" } },
							{ "id":"img02", "description":{ "fr":"perso02" } },
							{ "id":"img03", "description":{ "fr":"perso03" } },
							{ "id":"img04", "description":{ "fr":"perso04" } },
							{ "id":"img05", "description":{ "fr":"perso05" } },
							{ "id":"img06", "description":{ "fr":"perso06" } },
							{ "id":"img07", "description":{ "fr":"perso07" } },
							{ "id":"img08", "description":{ "fr":"perso08" } }
						],
						"target":[
							{ "id":"1", "description":{ "fr":"Roi" } },
							{ "id":"2", "description":{ "fr":"Magicien" } },
							{ "id":"3", "description":{ "fr":"Dragon" } },
							{ "id":"4", "description":{ "fr":"Héros" } },
							{ "id":"5", "description":{ "fr":"Communauté" } }
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
			_LRSend = `{
				"actor": {
					"objectType":"Agent",
					"name":"__nom__,__prenom__",
					"account":{
						"homePage":"__uriCourse__",
						"name":"__uuidSSID__"
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
							{ "id":"img01", "description":{ "fr":"perso01" } },
							{ "id":"img02", "description":{ "fr":"perso02" } },
							{ "id":"img03", "description":{ "fr":"perso03" } },
							{ "id":"img04", "description":{ "fr":"perso04" } },
							{ "id":"img05", "description":{ "fr":"perso05" } },
							{ "id":"img06", "description":{ "fr":"perso06" } },
							{ "id":"img07", "description":{ "fr":"perso07" } },
							{ "id":"img08", "description":{ "fr":"perso08" } }
						],
						"target":[
							{ "id":"1", "description":{ "fr":"Roi" } },
							{ "id":"2", "description":{ "fr":"Magicien" } },
							{ "id":"3", "description":{ "fr":"Dragon" } },
							{ "id":"4", "description":{ "fr":"Héros" } },
							{ "id":"5", "description":{ "fr":"Communauté" } }
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
			_quizzName = 'Modèle de l\'aventure',
			_quizzNameDesc = 'Individuellement, positionnez les personnages sur le schéma.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			},
			_reponsesGlobal = '',
			nbr = 0,
			img = false,
			word = false,
			selection = {},
			_i = 1,
			_quizz,
			_correct = {
				"perso01": "4",
				"perso02": "1",
				"perso03": "7",
				"perso04": "4",
				"perso05": "2",
				"perso06": "6",
				"perso07": "5",
				"perso08": "3"
			},
			_srcWrd = {
				"1": "Roi",
				"2": "Magicien",
				"3": "Dragon",
				"4": "Héros",
				"5": "Communauté",
				"6": "Menace",
				"7": "Graal"
			};

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

			$( '.stepImg:not(.selected)' ).on( 'click', function() {
				if ( nbr == 8 ) { return null; }
				if ( img !== false ) { return null; }
				if ( $( this ).hasClass('selected') ) { return null; }
				img = $( this );
				$( '#imgMind ').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/aventure/' + img.attr('data-img') + '.png' );
				$( '#imagesSelector' ).addClass( 'hide' );
				$( '#wordselector' ).addClass( 'show' );
			} );
			$( '#prev' ).click( function( event ) {
				console.log( event );
				event.preventDefault();
				$( word ).removeClass( 'preSelectedZone' );
				$( '#imagesSelector' ).removeClass( 'hide' );
				$( '#wordselector' ).removeClass( 'show' );
				$( '#valid' ).addClass( 'op0' );
				img = false;
				word = false;
			} );

			$( '#valid' ).click( function( event ) {
				event.preventDefault();
				_correctAnswer = img.attr( 'data-img' ) + '[.]' + _correct[ img.attr( 'data-img' ) ];
				_reponse = img.attr( 'data-img' ) + '[.]' + word.attr( 'data-pos' );
				_reponsesGlobal += _reponse + '[,]';
				_success = false;
				_score = 0;
				if ( _correctAnswer == _reponse ) {
					_success = true;
					_score = 1;
					finite[ 'score' ]++;
				}
				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'modele-aventure', ( nbr + 1 ) ) + `",
					"definition":{
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;
				_finit = false;
				if ( nbr == 7 ) {
					_finit = true;
					if ( finite[ 'score' ] == 0 ) {
						finite[ 'verb' ] = "failed";
						finite[ 'success' ] = false;
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
				}
				segment ( ( nbr + 1 ), _correctAnswer, _reponse, _success, _score, _finit );
				_i++;
				nbr++;

				img.attr( 'data-word', word.html().trim() ).addClass( 'selected' );
				word.removeClass( 'preSelectedZone' );
				$( '#imagesSelector' ).removeClass( 'hide' );
				$( '#wordselector' ).removeClass( 'show' );
				$( this ).addClass( 'op0' );
				img = false;
				word = false;
			} );

			$( '#wordselector .word:not(.preSelectedZone)' ).on( 'click', function( event ) {
				event.preventDefault();
				//if ( word !== false ) { return null; }
				if ( $( this ).hasClass('preSelectedZone') ) { return null; }
				$( '#wordselector .word' ).removeClass( 'preSelectedZone' );
				word = $( this );
				word.addClass( 'preSelectedZone' );
				$( '#wordselector a.btn.op0' ).removeClass( 'op0' );
			} );
		} );
	</script>
</body>
</html>
