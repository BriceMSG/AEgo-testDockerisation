<!DOCTYPE html>
<html>
<?php
	include '../include/head.inc.php';
?>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Personnalisation des tablettes
			</div>
			<div class="col-2 blw" onclick="testDebit.begin();">
				<i class="material-icons right">network_check</i>
				<span id="checkNetwork" class="right">Tester le débit</span>
				<span id="networkSpeed" class="right" style="display:none;">Test en cours</span>
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content">
		<div id="menu"></div>
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
				</div>
			</div>
		</div>
	</div>
	
	<?php
		include '../include/notification.inc.php';
		include '../include/screenRotation.inc.php';
	?>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/formateur.js"></script>
	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); $( '#content' ).addClass( 'show' ); }
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

			if ( _msg.cible != 'former' ) {
				_msg = null;
				return null;
			}

			if ( _msg.msg == 'perso' ) {

				datas.apps[ _msg.id ].nom = _msg.data.nom;
				datas.apps[ _msg.id ].prenom = _msg.data.prenom;

				localStorage.setItem( 'datas', JSON.stringify( datas ) );

				_elem = $( '#idTab-' + _msg.id );
				_elem.find( '.nom span' ).html( '<b>' + datas.apps[ _msg.id ].nom + '</b>' );
				_elem.find( '.prenom span' ).html( '<b>' + datas.apps[ _msg.id ].prenom + '</b>' );
				_elem.addClass( 'check' );

				_nbrToGrp--;
				if ( _nbrToGrp == 0 ) {
					attribGrp();
				}
			}
		};

		function callbackLRSMsg( _msg ) {
			alert( _msg );
		};

		// Switch Case attribution des groupes
		function attribGrp ( _nbr ) {
			var _appNbr = _nbr || Object.keys( datas.apps ).length;
console.log( '_appNbr', _appNbr );

			switch( _appNbr ) {
				case 26:
					parcGrp( { 0: { 'grp': 4, 'nbr': 5 }, 1: { 'grp': 2, 'nbr': 3 } } );
					break;
				case 25:
					parcGrp( { 0: { 'grp': 5, 'nbr': 5 } } );
					break;
				case 24:
					parcGrp( { 0: { 'grp': 4, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 4 } } );
					break;
				case 23:
					parcGrp( { 0: { 'grp': 4, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 22:
					parcGrp( { 0: { 'grp': 3, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 4 }, 2: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 21:
					parcGrp( { 0: { 'grp': 1, 'nbr': 5 }, 1: { 'grp': 4, 'nbr': 4 } } );
					break;
				case 20:
					parcGrp( { 0: { 'grp': 4, 'nbr': 5 } } );
					break;
				case 19:
					parcGrp( { 0: { 'grp': 3, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 4 } } );
					break;
				case 18:
					parcGrp( { 0: { 'grp': 3, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 17:
					parcGrp( { 0: { 'grp': 2, 'nbr': 5 }, 1: { 'grp': 1, 'nbr': 4 }, 2: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 16:
					parcGrp( { 0: { 'grp': 4, 'nbr': 4 } } );
					break;
				case 15:
					parcGrp( { 0: { 'grp': 3, 'nbr': 4 }, 1: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 14:
					parcGrp( { 0: { 'grp': 2, 'nbr': 4 }, 1: { 'grp': 2, 'nbr': 3 } } );
					break;
				case 13:
					parcGrp( { 0: { 'grp': 1, 'nbr': 4 }, 1: { 'grp': 3, 'nbr': 3 } } );
					break;
				case 12:
					parcGrp( { 0: { 'grp': 3, 'nbr': 4 } } );
					break;
				case 11:
					parcGrp( { 0: { 'grp': 2, 'nbr': 4 }, 1: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 10:
					parcGrp( { 0: { 'grp': 1, 'nbr': 4 }, 1: { 'grp': 2, 'nbr': 3 } } );
					break;
				case 9:
					parcGrp( { 0: { 'grp': 3, 'nbr': 3 } } );
					break;
				case 8:
					parcGrp( { 0: { 'grp': 2, 'nbr': 4 } } );
					break;
				case 7:
					parcGrp( { 0: { 'grp': 1, 'nbr': 4 }, 1: { 'grp': 1, 'nbr': 3 } } );
					break;
				case 6:
					parcGrp( { 0: { 'grp': 2, 'nbr': 3 } } );
					break;
				case 5:
					parcGrp( { 0: { 'grp': 1, 'nbr': 3 }, 1: { 'grp': 1, 'nbr': 2 } } );
					break;
				case 4:
					parcGrp( { 0: { 'grp': 2, 'nbr': 2 } } );
					break;
				case 3:
					parcGrp( { 0: { 'grp': 3, 'nbr': 1 } } );
					break;
				case 2:
					parcGrp( { 0: { 'grp': 2, 'nbr': 1 } } );
					break;
				case 1:
					parcGrp( { 0: { 'grp': 1, 'nbr': 1 } } );
					break;
			}
		};

		function parcGrp ( _compo ) {
			console.log( '_compo', _compo );
			var _grpsKey = Object.keys( grps ),
				_uriCourse = formatURICourse();
				_iterator = 0,
				_iterate = 0,
				_localGrp = {};

			// On parcourt la composition
			$.each( _compo, function( index, val ) {

				console.log( 'val.grp', val.grp );
				// On parcourt les groupes
				for ( i = 0; i < val.grp; i++ ) {

					// Definition du groupe
					_grp = _grpsKey[ _iterator ];
					console.log( '_iterator', _iterator );
					console.log( '_grpsKey', _grpsKey );
					console.log( '_grpsKey[ _iterator ]', _grpsKey[ _iterator ] );
					_whos = [];
					_member = [];
					_localGrp[ grps[ _grp ].key ] = [];

					// On parcourt le nombre d'apprenant par groupe
					for ( j = 0; j < val.nbr; j++ ) {

						console.log( _iterate );
						console.log( _appsKey[ _iterate ] );
						console.log( datas.apps );
						console.log( datas.apps[ _appsKey[ _iterate ] ] );
						datas.apps[ _appsKey[ _iterate ] ][ "grp" ] = JSON.stringify( grps[ _grp ] );

						_whos.push( _appsKey[ _iterate ] );

						_localGrp[ grps[ _grp ].key ].push( _appsKey[ _iterate ] );

						_member.push( {
							"objectType": "Agent",
							"name": datas.apps[ _appsKey[ _iterate ] ].nom + "," + datas.apps[ _appsKey[ _iterate ] ].prenom,
							"account":{
								"homePage": _uriCourse,
								"name": _appsKey[ _iterate ]
							}
						} );
						_iterate++;
					}
					console.log( '_whos', _whos );

					$.each( _whos, function( ubszw, bzm ) {
						console.log( 'bzm', bzm );
						console.log( 'bzm', datas.apps[ bzm ].nom + ' ' + datas.apps[ bzm ].prenom );
						console.log( 'grps[ _grp ]', grps[ _grp ] );
						_msg = {
							'cible': bzm,
							'msg': 'grpAttrib',
							'data': JSON.stringify( grps[ _grp ] ),
							'member': JSON.stringify( _member )
						};
						_msg = JSON.stringify( _msg );
						my_lcs.LCS_sndData( _msg );
					} );

					_dtNow = new Date();

					// On envoit au LRS
					_declaration = _groupeDeclaration;
					_declaration = _declaration.replace( /__grpName__/g, grps[ _grp ].name );
					_declaration = _declaration.replace( /__grpUuid__/g, grps[ _grp ].key );
					_declaration = _declaration.replace( /__grpUri__/g, formatURIGrp() );
					_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
					_declaration = _declaration.replace( /__member__/g, JSON.stringify( _member ) );
					_declaration = _declaration.replace( /__uriGenerateGrp__/g, formatURILesson( 'generate-groupes' ) );
					_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
					_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
					_declaration = _declaration.replace( /__timeStamp__/g, _dtNow.toISOString() );
					_declaration = JSON.parse( _declaration );
					tmp = my_lcs.xAPI_Set_Tracking( _declaration );

					_iterator++;
				}
			} );

			setLocalData( 'datas', datas );
			setLocalData( 'grps', _localGrp );

			// On goto
			_msg = {
				'cible': 'apps',
				'msg': 'goto',
				'data': 'pause.php'
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			_msg = {
				'cible': 'projo',
				'msg': 'goto',
				'data': 'pause.php'
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			setLocalData( 'pathname', '/session/pause.php' );
			window.location = _uri + 'pause.php?_session=' + _ssid;
		};

		var lcIo,
			datas,
			_appsKey,
			_nbrToGrp,
			grps = {
				0: {
					"name": "A",
					"color": "d2b654",
					"key": "626f686f7274"
				},
				1: {
					"name": "B",
					"color": "106524",
					"key": "63616c6f6772"
				},
				2: {
					"name": "C",
					"color": "950d0d",
					"key": "63617261646f"
				},
				3: {
					"name": "D",
					"color": "2f4c63",
					"key": "676175766169"
				},
				4: {
					"name": "E",
					"color": "4cc3a9",
					"key": "6c656f646167"
				},
				5: {
					"name": "F",
					"color": "4297cc",
					"key": "706572636576"
				}
			},
			_groupeDeclaration = `{
				"actor": {
					"objectType": "Group",
					"name": "__grpName__",
					"account": {
						"name": "__grpUuid__",
						"homePage": "__grpUri__"
					},
					"member":__member__
				},
				"verb": {
					"id": "http://adlnet.gov/expapi/verbs/attended",
					"display": {
						"en-US": "attended"
					}
				},
				"object": {
					"id": "__uriGenerateGrp__"
				},
				"context": {
					"contextActivities": {
						"parent": [ {
							"objectType": "Activity",
							"id": "__uriCourse__"
						} ]
					},
					"team": {
						"objectType": "Group",
						"name": "__grpName__",
						"account": {
							"name": "__grpUuid__",
							"homePage": "__uriCourse__"
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
				"timestamp": "__timeStamp__"
			}`;
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			datas = getLocalData( 'datas' );
			_appsKey = Object.keys( datas.apps );
			_nbrToGrp = _appsKey.length;

			_instructor = getLocalData( 'instructor' );

			var _content = $( '#everybody .valign' ),
				_col = 1,
				tmp = _appsKey,
				j = tmp.length,
				_html = '';

			for (var i = 0; i < j; i++) {
				if ( _col == 5 ) {
					_col = 1;
					_html += '</div>';
				}

				if ( _col == 1) {
					_html += '<div class="row">';
				}

				_html += '<div class="col-3">';
				_html += '<div id="idTab-' + tmp[ i ] + '" class="card' + ( ( typeof datas.apps[ tmp[ i ] ].nom !== 'undefined' ) ? ' check' : '' ) + '">';
				_html += '<p class="prenom">Prénom : <span>' + ( ( typeof datas.apps[ tmp[ i ] ].prenom !== 'undefined' ) ? '<b>'+ datas.apps[ tmp[ i ] ].prenom + '</b>' : '' ) + '</span></p>';
				_html += '<p class="nom">Nom : <span>' + ( ( typeof datas.apps[ tmp[ i ] ].nom !== 'undefined' ) ? '<b>'+ datas.apps[ tmp[ i ] ].nom + '</b>' : '' ) + '</span></p>';
				_html += '</div></div>';

				if ( i == j-1 ) {
					_html += '</div>';
				}

				_col++;
			}

			_content.html( _html );
		} );
	</script>
</body>
</html>
