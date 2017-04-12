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
				Quelle est l’humeur du jour ?
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div class="">
			<div class="w768 center block card txt-left">
				<form id="quizz" autocomplete="off">
					<div class="slide show">
						<div class="row">
							<div class="col-4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso01.png" alt="" class="photoAvatar">
							</div>
							<div class="col-8">
								<input type="text" placeholder="Entrez ici un adjectif" data-perso="perso01" style="height: 167px;">
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="row">
							<div class="col-4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso02.png" alt="" class="photoAvatar">
							</div>
							<div class="col-8">
								<input type="text" placeholder="Entrez ici un adjectif" data-perso="perso02" style="height: 167px;">
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="row">
							<div class="col-4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso03.png" alt="" class="photoAvatar">
							</div>
							<div class="col-8">
								<input type="text" placeholder="Entrez ici un adjectif" data-perso="perso03" style="height: 167px;">
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="row">
							<div class="col-4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso04.png" alt="" class="photoAvatar">
							</div>
							<div class="col-8">
								<input type="text" placeholder="Entrez ici un adjectif" data-perso="perso04" style="height: 167px;">
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="row">
							<div class="col-4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso05.png" alt="" class="photoAvatar">
							</div>
							<div class="col-8">
								<input type="text" placeholder="Entrez ici un adjectif" data-perso="perso05" style="height: 167px;">
							</div>
						</div>
					</div>
				</form>
				<div class="txt-right">
					<a href="#!" id="next" class="btn alter-btn white-text">
						<i class="material-icons left">save</i>
						<i class="material-icons right">chevron_right</i>
						Personne suivante
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
			if ( _tmp.nbr == 5 ){
				goTo( 'synthese-nuage-mots.php' );
				return null;
			}
			else {
				_iterate = Object.keys( _tmp ).length;
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
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'nuage-mots' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			setLocalData( _idQuizz, {"nbr":0} );
		};

		function segment ( _n, _reponses, _finit ) {
			_finit = _finit || false;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'nuage-mots', _n ) );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'nuage-mots' ) );
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
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr.nbr++;
			_slideNbr[ _n ] = _reponses;
			setLocalData( '0x269616c657', _slideNbr );
			setLocalData( _idQuizz, _slideNbr );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step ) {
			_msg = {
				"cible": "former",
				"msg": "nuage-mots-part",
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

			_declaration = _LRSend;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'nuage-mots' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__durationQuizz__/g, finite[ 'duration' ] );
			_declaration = _declaration.replace( /__groupeDeclaration__/g, finite[ 'groupe' ] );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtEnd.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sayFinish( finite[ 'score' ] );
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr[ "score" ] = finite[ 'score' ];
			setLocalData( _idQuizz, _slideNbr );
		};

		function sayFinish( _status ) {
			_msg = {
				"cible": "former",
				"msg": "nuage-mots",
				"id": _uuid,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-nuage-mots.php' );
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
			_idQuizz = '0x269616c657',
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
						"interactionType": "fill-in"
					}
				},
				"result": {
					"response": "__reponses__"
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
						"type": "http://adlnet.gov/expapi/activities/lesson"
					}
				},
				"result": {
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
			_quizzName = 'Nuage de Mots',
			_quizzNameDesc = 'Attribuez un adjectif à chacun des intervenants.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			}
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			_dtBegin = new Date();

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
				_chk = _tmp.find( 'input' );

				if ( _chk.val().trim() == '' ) {
					notif( 'warning', 'Veuillez entrer un adjectif.' );
					_working = false;
					return null;
				}

				/* Désactivation des inputs */
				$.each( _inputs, function( index, val ) {
					val.disabled = true;
				} );

				/* Récupération des infos */
				segment_n = _iterate;

				segment_reponses = _chk.val().trim();

				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'nuage-mots', segment_n ) + `",
					"definition":{
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;

				_finited = false;
				if ( _tmp.next().length == 0 ) {
					_finited = true;
				}
				segment ( segment_n, segment_reponses, _finited );
				if( _finited ){
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
