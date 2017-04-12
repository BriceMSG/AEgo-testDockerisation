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
		#player{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: #fff;
			opacity: 0;
			-webkit-transform: translateX(-100%);
			transform: translateX(-100%);
			-webkit-transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
			transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
			z-index: 1;
		}
		#player.show{
			opacity: 1;
			-webkit-transform: translateX(0);
			transform: translateX(0);
		}
		#player video {
			position: absolute;
			top: 0;
			left: 0;
			width: 1024px;
			height: 640px;
			z-index: 100;
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
		#wordselector .vwrap{
			height: 128px;
		}
		#wordselector .card{
			font-size: 1rem;
			text-align: center;
		}
		#imgMind {
			height: 128px;
			display: block !important;
			margin-right: auto !important;
			margin-left: auto !important;
		}
		.bubbleTitle {
			font-weight: bold;
			font-size: 1.25rem;
		}
		.bubble{
			width: 44px;
			height: 44px;
			line-height: 14px;
			display: block;
			margin-right: auto;
			margin-left: auto;
			font-size: 22px;
		}
		#imagesSelector {
			background-color: transparent;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="video" class="col-3 brw">
				<i class="material-icons left">local_movies</i>
				Revoir la vidéo
			</div>
			<div id="title" class="col-6 title">
				Ça réagit chez Armand
			</div>
			<div id="groupe" class="col-3"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div id="player">
			<video src="http://commun.alteretgo.my-workflow.fr/decryptage/decryptage.mp4" controls></video>
		</div>
		<div id="imagesSelector" class="vwrap">
			<div class="valign">
				<div class="row no-after">
				<div class="col-3 stepImg" data-img="perso01" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso01.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso02" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso02.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso03" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso03.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso04" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso04.png" alt="" class="">
					</div>
				</div>
				</div>
				<div class="row no-after">
				<div class="col-3 stepImg" data-img="perso05" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso05.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso06" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso06.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso07" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso07.png" alt="" class="">
					</div>
				</div>
				<div class="col-3 stepImg" data-img="perso08" data-word="">
					<div class="card">
						<img src="http://commun.alteretgo.my-workflow.fr/decryptage/perso08.png" alt="" class="">
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
				<div class="alter-btn-text">
					<div class="row">
						<div class="col-1"></div>
						<div class="col-2 txt-center bubbleTitle">Synergie</div>
						<div class="col-9"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">+4</div>
					</div>
					<div class="col-2">
						<div data-pos="1" class="card word green-lighten-1 white-text">Militant</div>
					</div>
					<div class="col-2">
						<div data-pos="2" class="card word green-lighten-1 white-text">Triangle d'Or</div>
					</div>
					<div class="col-2">
						<div data-pos="2" class="card word green-lighten-1 white-text">Triangle d'Or</div>
					</div>
					<div class="col-2">
						<div data-pos="3" class="card word red-lighten-1 white-text">Déchiré</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">+3</div>
					</div>
					<div class="col-2">
						<div data-pos="1" class="card word green-lighten-1 white-text">Militant</div>
					</div>
					<div class="col-2">
						<div data-pos="2" class="card word green-lighten-1 white-text">Triangle d'Or</div>
					</div>
					<div class="col-2">
						<div data-pos="5" class="card word orange-lighten-1 white-text">Hésitant</div>
					</div>
					<div class="col-2">
						<div data-pos="4" class="card word red-lighten-1 white-text">Révolté</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">+2</div>
					</div>
					<div class="col-2">
						<div data-pos="7" class="card word green-lighten-1 white-text">Suiveur</div>
					</div>
					<div class="col-2">
						<div data-pos="5" class="card word orange-lighten-1 white-text">Hésitant</div>
					</div>
					<div class="col-2">
						<div data-pos="6" class="card word red-lighten-1 white-text">Opposant</div>
					</div>
					<div class="col-2">
						<div data-pos="4" class="card word red-lighten-1 white-text">Révolté</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">+1</div>
					</div>
					<div class="col-2">
						<div data-pos="9" class="card word orange-lighten-1 white-text">Passif</div>
					</div>
					<div class="col-2">
						<div data-pos="8" class="card word red-lighten-1 white-text">Grognon</div>
					</div>
					<div class="col-2">
						<div data-pos="6" class="card word red-lighten-1 white-text">Opposant</div>
					</div>
					<div class="col-2">
						<div data-pos="4" class="card word red-lighten-1 white-text">Révolté</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-2"></div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">-1</div>
					</div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">-2</div>
					</div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">-3</div>
					</div>
					<div class="col-2">
						<div class="white circle alter-btn-text alter-btn-border bubble">-4</div>
					</div>
					<div class="col-1"></div>
				</div>
				<div class="alter-btn-text txt-right">
					<div class="row">
						<div class="col-9"></div>
						<div class="col-2 txt-center bubbleTitle">Antagonisme</div>
						<div class="col-1"></div>
					</div>
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
				goTo( 'synthese-decryptage.php' );
				return null;
			}
			else {
				nbr = _tmp.nbr;
				$.each( _tmp, function( index, val ) {
					$( 'div.stepImg[data-img="' + val.img + '"]' ).addClass( 'selected' ).attr( 'data-word', _srcWrd[ val.word ] );
					$( '#' + val.word ).addClass( 'selected' );
				} );
			}
		};

		function initialized () {
			_declaration = _LRSbegin;
			_declaration = _declaration.replace( /__grpName__/g, _grp.name );
			_declaration = _declaration.replace( /__grpKey__/g, _grp.key );
			_declaration = _declaration.replace( /__grpUri__/g, formatURIGrp() );
			_declaration = _declaration.replace( /__member__/g, JSON.stringify( _grpMember ) );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'decryptage' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			console.log( _declaration );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			setLocalData( _idQuizz, {"nbr":0} );
		};

		function segment ( _n, _reponses, _finit ) {
			_finit = _finit || false;
			finite[ 'groupe' ] += `{
				"id":"` + formatURILesson( 'decryptage', _n ) + `",
				"definition":{
					"type":"http://adlnet.gov/expapi/activities/interaction"
				}
			},`;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__grpName__/g, _grp.name );
			_declaration = _declaration.replace( /__grpKey__/g, _grp.key );
			_declaration = _declaration.replace( /__grpUri__/g, formatURIGrp() );
			_declaration = _declaration.replace( /__member__/g, JSON.stringify( _grpMember ) );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'decryptage', _n ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'decryptage' ) );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtPart.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sendToSave(
				'save-solo.php',
				{
					'ssid': _ssid,
					'uuid': _grp.key,
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
			setLocalData( _idQuizz, _selection );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step ) {
			_msg = {
				"cible": "former",
				"msg": "decryptage-part",
				"id": _grp.key,
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
			_declaration = _declaration.replace( /__grpName__/g, _grp.name );
			_declaration = _declaration.replace( /__grpKey__/g, _grp.key );
			_declaration = _declaration.replace( /__grpUri__/g, formatURIGrp() );
			_declaration = _declaration.replace( /__member__/g, JSON.stringify( _grpMember ) );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'decryptage' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__reponsesGlobal__/g, _reponsesGlobal );
			_declaration = _declaration.replace( /__durationQuizz__/g, finite[ 'duration' ] );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__groupeDeclaration__/g, finite[ 'groupe' ] );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtEnd.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sayFinish();
		};

		function sayFinish() {
			_msg = {
				"cible": "former",
				"msg": "decryptage",
				"id": _grp.key
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-decryptage.php' );
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
			_idQuizz = '0x7279707461',
			_LRSbegin = `{
				"actor": {
					"objectType":"Group",
					"name":"__grpName__",
					"account":{
						"name":"___grpKey__",
						"homePage":"__grpUri__"
					},
					"member":__member__
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
						"type": "http://adlnet.gov/expapi/activities/interaction",
						"interactionType":"matching"
					}
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ]
					},
					"team":{
						"objectType":"Group",
						"name":"__grpName__",
						"account":{
							"name":"___grpKey__",
							"homePage":"__grpUri__"
						}
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
					"objectType":"Group",
					"name":"__grpName__",
					"account":{
						"name":"___grpKey__",
						"homePage":"__grpUri__"
					},
					"member":__member__
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
							{ "id":"1", "description":{ "fr":"Militant" } },
							{ "id":"2", "description":{ "fr":"Triangle d'Or" } },
							{ "id":"3", "description":{ "fr":"Déchiré" } },
							{ "id":"4", "description":{ "fr":"Révolté" } },
							{ "id":"5", "description":{ "fr":"Hésitant" } },
							{ "id":"6", "description":{ "fr":"Opposant" } },
							{ "id":"7", "description":{ "fr":"Suiveur" } },
							{ "id":"8", "description":{ "fr":"Grognon" } },
							{ "id":"9", "description":{ "fr":"Passif" } }
						]
					}
				},
				"result": {
					"response": "__reponses__"
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ]
					},
					"team":{
						"objectType":"Group",
						"name":"__grpName__",
						"account":{
							"name":"___grpKey__",
							"homePage":"__grpUri__"
						}
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
					"objectType":"Group",
					"name":"__grpName__",
					"account":{
						"name":"___grpKey__",
						"homePage":"__grpUri__"
					},
					"member":__member__
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/terminated",
					"display" : {
						"en-US" : "terminated"
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
							{ "id":"1", "description":{ "fr":"Militant" } },
							{ "id":"2", "description":{ "fr":"Triangle d'Or" } },
							{ "id":"3", "description":{ "fr":"Déchiré" } },
							{ "id":"4", "description":{ "fr":"Révolté" } },
							{ "id":"5", "description":{ "fr":"Hésitant" } },
							{ "id":"6", "description":{ "fr":"Opposant" } },
							{ "id":"7", "description":{ "fr":"Suiveur" } },
							{ "id":"8", "description":{ "fr":"Grognon" } },
							{ "id":"9", "description":{ "fr":"Passif" } }
						]
					}
				},
				"result": {
					"response":"__reponsesGlobal__",
					"duration":"__durationQuizz__"
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ],
						"grouping": [__groupeDeclaration__]
					},
					"team":{
						"name":"__grpName__",
						"account":{
							"name":"___grpKey__",
							"homePage":"__grpUri__"
						}
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
			_quizzName = 'Décryptage',
			_quizzNameDesc = 'En groupe, analyser les réactions des personnages de la cinématique, puis définissez la position de chaque collaborateur.',
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
			_srcWrd = {
				"1": "Militant",
				"2": "Triangle d'Or",
				"3": "Déchiré",
				"4": "Révolté",
				"5": "Hésitant",
				"6": "Opposant",
				"7": "Suiveur",
				"8": "Grognon",
				"9": "Passif"
			},
			_video,
			_menuStat = false;

			function togglePlay() {
				if( _menuStat === false ) {
					if( $( '#wordselector' ).hasClass( 'show' ) ) { _menuStat = null; }
					else { _menuStat = true; }
					$( '#wordselector' ).removeClass( 'show' )
					$( '#imagesSelector' ).addClass( 'hide' );
					$( '#player' ).addClass( 'show' );
					_video.get( 0 ).play();
					_video.bind( "ended", function () {
						$(this).unbind( "ended" );
						togglePlay();
					} );
				}
				else if ( _menuStat === true ) {
					 _video.get( 0 ).pause();
					$( '#wordselector' ).removeClass( 'show' )
					$( '#imagesSelector' ).removeClass( 'hide' );
					$( '#player' ).removeClass( 'show' );
					 _menuStat = false;
				}
				else {
					 _video.get( 0 ).pause();
					$( '#wordselector' ).addClass( 'show' )
					$( '#imagesSelector' ).addClass( 'hide' );
					$( '#player' ).removeClass( 'show' );
					 _menuStat = false;
				}
			};

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			_dtBegin = new Date();

			_ssid = getLocalData( "ssid" );
			_grp = getLocalData( "grp" );
			_grpMember = getLocalData( "grpMember" );
			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );

			_video = $( '#player video' );

			$( '#groupe' ).css('background-color', '#' + _grp.color ).html( _grp.name );

			$( '#video' ).on( 'click', function(){
				togglePlay();
			} );

			$( '.stepImg:not(.selected)' ).on( 'click', function() {
				if ( nbr == 8 ) { return null; }
				if ( img !== false ) { return null; }
				if ( $( this ).hasClass('selected') ) { return null; }
				img = $( this );
				$( '#imgMind ').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/decryptage/' + img.attr('data-img') + '.png' );
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
				_reponse = img.attr( 'data-img' ) + '[.]' + word.attr( 'data-pos' );
				_reponsesGlobal += _reponse + '[,]';
				_finit = false;
				if ( nbr == 7 ) {
					_finit = true;
				}
				segment ( ( nbr + 1 ), _reponse, _finit );
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
