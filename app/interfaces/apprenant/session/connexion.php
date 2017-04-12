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
				Change Management
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="w768 center block card">
				<h1 class="txt-center">Bienvenue sur votre session de formation au Change Management</h1>
				<p>Veuillez ne pas utiliser :</p>
				<ul>
					<li class="olul">Les boutons avant-arrière,</li>
					<li class="olul">La barre d'adresse,</li>
					<li class="olul">Le bouton de rechargement,</li>
					<li class="olul">Et plus généralement, la barre supérieure grise visible sur votre écran.</li>
				</ul>
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
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); initialized(); $( '#content, #jingle' ).addClass( 'show' ); setTimeout( function() { $( '#jingle' ).css( 'display', 'none' ); }, 3000 ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}

		function initialized () {
			_declaration = _courseInitialization;
			_declaration = _declaration.replace( /__uriCourse__/g , formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g , localStorage.getItem( "uuid" ) );
			_declaration = _declaration.replace( /__courseName__/g , _courseName );
			_declaration = _declaration.replace( /__courseNameDesc__/g , _courseNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g , formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g , _instructor);
			_declaration = _declaration.replace( /__timeStamp__/g , _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sayhi();
		};

		function sayhi() {
			_msg = {
				"cible": "former",
				"msg": "tabLoad",
				"idTab": _uuid
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
			_courseInitialization = `{
				"actor": {
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/initialized",
					"display": {
						"en-US": "initialized"
					}
				},
				"object": {
					"objectType": "Activity",
					"id": "__uriCourse__",
					"definition": {
						"name": {
							"fr": "__courseName__"
						},
						"description": {
							"fr": "__courseNameDesc__"
						},
						"type": "http://adlnet.gov/expapi/activities/course"
					}
				},
				"context": {
					"instructor": {
						"objectType": "Agent",
						"account":{
							"homePage": "__uriCourseFormator__",
							"name": "__uuidFormator__"
						}
					}
				},
				"timestamp": "__timeStamp__"
			}`,
			_courseName = "Change Management - Session ",
			_courseNameDesc = "Change Management - Session ";
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
			if ( hasLocalData( 'prenom' ) ) {
				goTo( 'pause.php' );
			}

			_dtBegin = new Date();

			_uuid = getLocalData( "uuid" );
			_instructor= getLocalData( "instructor" );

			_courseName += getLocalData( "ssid" );
			_courseNameDesc += getLocalData( "ssid" ) + " - " + _dtBegin.toISOString();
		} );
	</script>
</body>
</html>
