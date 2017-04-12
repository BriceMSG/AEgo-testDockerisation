<?php
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header( 'HTTP/1.0 200 Ok' );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<base href="http://apprenant.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/apprenant.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	.hide{display:none;}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				<i class="material-icons">https</i>
				Déconnexion en cours
			</div>
		</div>
	</div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w512 center block">
				Disconnect session - 0x00000006
			</div>
		</div>
	</div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->
	<script type="text/javascript">
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) {
				clearInterval( lcIo );
				ended();
				$( '#content' ).addClass( 'show' );
			}
		};
		function ended () {
			_declaration = _courseInitialization;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g , formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g , _uuid );
			_declaration = _declaration.replace( /__courseName__/g , _courseName );
			_declaration = _declaration.replace( /__courseNameDesc__/g , _courseNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g , formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g , _instructor);
			_declaration = _declaration.replace( /__timeStamp__/g , _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			setTimeout( 'goto()', 1000 );
		};
		function goto(){
			localStorage.clear();
			window.location = "http://apprenant.alteretgo.my-workflow.fr/";
		}
		function getLocalData( _key ) {
			tmp = localStorage.getItem( _key ) || {};
			try {
				tmp = JSON.parse( tmp );
			}
			catch( e ) {
				tmp = tmp;
			}
			return tmp;
		};
		function formatURICourse () {
			return ( _uri ).replace( 'session', _ssid );
		};
		function formatURIFormator () {
			return ( _uri ).replace( 'apprenant', 'formateur' ).replace( 'session/', '' );
		};

		var _ssid = localStorage.getItem( "ssid" ),
			_uri = 'http://apprenant.alteretgo.my-workflow.fr/session/',
			lcIo,
			_courseInitialization = `{
				"actor": {
					"objectType": "Agent",
					"name": "__nom__,__prenom__",
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/logged-out",
					"display": {
						"en-US": "logged-out"
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
			_uuid = getLocalData( "uuid" );
			if( _uuid === null ) {
				lcIo = setInterval( checkIo, 300 );
				_dtBegin = new Date();
				_instructor = getLocalData( "instructor" );
			}
			else{
				setTimeout( 'goto()', 1000 );
			}
		} );
	</script>
</body>
</html>
