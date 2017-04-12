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
			<div class="w512 center block card txt-left">
				<form id="personalisation" autocomplete="off">
					<div>
						<h1 class="title txt-center">Qui êtes-vous ?</h1>
						<p class="txt-center">Indiquez votre prénom et nom sur la tablette.</p>
					</div>
					<div class="row">
						<div class="col-6 inputField" data-iconValide="done" data-iconRequired="block">
							<label for="prenom">Votre prénom</label>
							<input type="text" required id="prenom" name="prenom">
						</div>
						<div class="col-6 inputField" data-iconValide="done" data-iconRequired="block">
							<label for="nom">Votre nom</label>
							<input type="text" required id="nom" name="nom">
						</div>
					</div>
					<div class="row">
						<div class="col-5 inputField" data-iconValide="done" data-iconRequired="block">
							<button type="reset" class="btn">
								<i class="material-icons right">clear_all</i>
								Effacer
							</button>
						</div>
						<div class="col-7 inputField" data-iconValide="done" data-iconRequired="block">
							<button type="submit" class="btn">
								<i class="material-icons right">send</i>
								Enregistrer
							</button>
						</div>
					</div>
					<p class="txt-center italic red-text">Tous les champs sont requis</p>
				</form>
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
			_msg = JSON.parse( _msg );

			_cibles = [ _uuid, "apps" ];

			if ( $.inArray( _msg.cible, _cibles ) === -1 ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'grpAttrib' ) {
				setLocalData( 'grp', _msg.data );
				setLocalData( 'grpMember', _msg.member );
			}
			if ( _msg.msg == "goto" ) {
				goTo( _msg.data );
			}
		};

		function callbackLRSMsg( _msg ) {};

		function initialized () {
			_declaration = _begin;
			_declaration = _declaration.replace( /__nom__/g , localStorage.getItem( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g , localStorage.getItem( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g , formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g , localStorage.getItem( "idTab" ) );
			_declaration = _declaration.replace( /__uriPerso__/g , formatURICourse( 'perso' ) );
			_declaration = _declaration.replace( /__courseName__/g , _courseName );
			_declaration = _declaration.replace( /__uriCourseFormator__/g , formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g , _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g , _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sayFinish();
		};

		function sayFinish() {
			_msg = {
				'cible': 'former',
				'msg': 'perso',
				'id': getLocalData( 'uuid' ),
				'data': {
					'nom': getLocalData( 'nom' ),
					'prenom': getLocalData( 'prenom' )
				}
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			jingle();
		};

		var lcIo,
			_begin = `{
				"actor": {
					"objectType": "Agent",
					"name": "__nom__,__prenom__",
					"account":{
						"homePage": "__uriCourse__",
						"name": "__uuidSSID__"
					}
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/logged-in",
					"display" : {
						"en-US" : "logged-in"
					}
				},
				"object": {
					"objectType": "Activity",
					"id": "__uriPerso__",
					"definition": {
						"name": {
							"fr": "__courseName__"
						}
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
			_courseName = "Change Management - Session ";
		$( document ).ready( function () {
			if ( hasLocalData( 'grp' ) ) {
				goTo( 'pause.php' );
			}
			if ( !hasLocalData( 'prenom' ) ) {
				lcIo = setInterval( checkIo, 300 );
			}


			_dtBegin = new Date();

			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );
			_courseName += getLocalData( "ssid" );

			$( "#personalisation" ).submit( function( event ) {
				_elems = $( this ).find( 'input[required]' );
				_return = true;

				for ( var i = 0; i < _elems.length; i++ ) {
					_tmp = _elems[ i ].value;
					_tmp = _tmp.trim();

					if ( _tmp == '' ) {
						_return = false;
						$( _elems[ i ] ).addClass( 'required' );
					}
				}

				if ( _return === false ) {
					notif( 'warning', 'Les champs colorisés sont requis pour le formulaire.' );
					return false;
				}
				else {
					setLocalData( 'prenom', $( '#prenom' ).val().trim() );
					setLocalData( 'nom', $( '#nom' ).val().trim() );
					sendToSave(
						'save-personnalisation.php',
						{
							'ssid': getLocalData( 'ssid' ),
							'uuid': getLocalData( 'uuid' ),
							'lastName': localStorage.getItem( 'nom' ),
							'firstName': localStorage.getItem( 'prenom' )
						},
						initialized
					);
					return false;
				}
			} );
		} );
	</script>
</body>
</html>
