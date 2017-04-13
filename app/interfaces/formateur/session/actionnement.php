<!DOCTYPE html>
<html>
<?php
	include '../include/head.inc.php';
?>
<body>
	<div id="header">
		<div class="row">
			<div class="col-2 brw" onclick="toggleMenu();">
				<i class="material-icons left">menu</i>
				Menu
			</div>
			<div id="title" class="col-5 title">
				Actionnement de Séverine
			</div>
			<div class="col-3 blw" onclick="setLocalData( 'pathname', '/session/auto-evaluation-actionnement.php' ); window.location = _uri + 'auto-evaluation-actionnement.php?_session=' + _ssid;">
				<i class="material-icons right">equalizer</i>
				Auto-évaluation
			</div>
			<div class="col-2 blw" onclick="testDebit.begin();">
				<i class="material-icons right">network_check</i>
				<span id="checkNetwork" class="right">Tester le débit</span>
				<span id="networkSpeed" class="right" style="display:none;">Test en cours</span>
			</div>
		</div>
	</div>
	<?php
		include '../include/noServ.inc.php';
	?>
	<div id="content">
		<div id="menu">
			<div class="vwrap">
				<div class="valign">
					<div class="row">
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'quizz.php' );"><i class="material-icons left m0">person</i>Quizz</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="byGroup( 'photolangage.php' );"><i class="material-icons left m0">group</i>Photolangage</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'nuage-mots.php' );"><i class="material-icons left m0">person</i>Nuage de mots</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'courbe-changement.php' );"><i class="material-icons left m0">person</i>Courbe du changement</div></div>
					</div>
					<div class="row">
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'noeud-papillon.php' );"><i class="material-icons left m0">person</i>Noeud papillon</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="byGroup( 'decryptage.php' );"><i class="material-icons left m0">group</i>Décryptage</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'actions-manageriales.php' );"><i class="material-icons left m0">person</i>Actions managériales</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'actionnement.php' );"><i class="material-icons left m0">person</i>Actionnement</div></div>
					</div>
					<div class="row">
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'gerer-opposition.php' );"><i class="material-icons left m0">person</i>Gérer l'opposition</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'celebration-catherine.php' );"><i class="material-icons left m0">person</i>Célébration de Catherine</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'modele-aventure.php' );"><i class="material-icons left m0">person</i>Modèle de l'aventure</div></div>
						<div class="col-3"><div class="card alter-clair white-text" onclick="goTo( 'quizz-final.php' );"><i class="material-icons left m0">person</i>Quizz final</div></div>
					</div>
					<div class="row"></div>
					<div class="row"></div>
					<div class="row">
						<div class="col-1"></div>
						<div class="col-4"><div class="card indigo-lighten-3 white-text" onclick="goTo( 'pause.php' );"><i class="material-icons left m0">pause</i>Mise en pause</div></div>
						<div class="col-2"></div>
						<div class="col-4"><div class="card indigo-lighten-3 white-text" onclick="cached();"><i class="material-icons left m0">cached</i>Recharger l'état</div></div>
						<div class="col-1"></div>
					</div>
					<div class="row"></div>
					<div class="row"></div>
					<div class="row">
						<div class="col-4"></div>
						<div class="col-4"><div class="card red-lighten-2 white-text" onclick="goTo( 'close-session.php' );"><i class="material-icons left m0">close</i>Finir la session</div></div>
						<div class="col-4"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
				</div>
			</div>
		</div>
		<div id="appSelect">
			<div class="vwrap">
				<div class="valign-left">
					<div class="row">
						<div class="col-4">
							<div class="vwrap">
								<div class="valign">
									<a href="#!" id="prev" class="btn alter-btn white-text">
										<i class="material-icons left">chevron_left</i>
										Précédent
									</a>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="apprennantId"></div>
						</div>
						<div class="col-4">
							<div class="vwrap">
								<div class="valign">
									<a href="#!" id="cast" class="btn alter-btn white-text">
										<i class="material-icons right">screen_share</i>
										Projeter
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="w768 card block center synteseQuizz"></div>
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
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo );
				if ( !hasLocalData( _idQuizz ) ) { recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz }, recovery ); }
				else{ recovery( getLocalData( _idQuizz ) ); }
			}
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}

		function recovery ( dataBack ) {
			dataBack = dataBack || {};
			_data = {},
			key = Object.keys( dataBack );
			nbr = key.length;
			for (var i = 0; i < nbr; i++) {
				_data[ key[ i ] ] = dataBack[ key[ i ] ];
			}
			setLocalData( _idQuizz, _data );

			quizz = JSON.parse( localStorage.getItem( _idQuizz ) );

			var _content = $( '#everybody .valign' ),
				_col = 1,
				tmp = Object.keys( datas.apps ),
				j = tmp.length,
				_html = '';

			_nbrRest = tmp.length;

			for (var i = 0; i < j; i++) {
				if ( _col == 5 ) {
					_col = 1;
					_html += '</div>';
				}

				if ( _col == 1) {
					_html += '<div class="row">';
				}

				uQ = quizz[ tmp[ i ] ] || 0;

				_html += '<div class="col-3">';
				_html += '<div id="idTab-' + tmp[ i ] + '" class="selectorApp card' + ( ( uQ != 0 ) ? ' readyToSee' : '' ) + '">';
				_html += '<h4>' + datas.apps[ tmp[ i ] ].prenom + ' ' + datas.apps[ tmp[ i ] ].nom + '</h4>';
				_html += '<i class="material-icons txt-center center block ' + ( ( uQ == 6 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 6 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
				_html += '<span class="txt-center block">' + uQ + '/6</span>';
				_html += '</div></div>';

				if ( i == j-1 ) {
					_html += '</div>';
				}

				_col++;
			}
			_content.html( _html );
			$( '#content' ).addClass( 'show' );
		};

		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );
			console.log( _msg );

			if ( _msg.cible != 'former' ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'actionnement-part' ) {
				if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
					quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
				}
				else {
					quizz[ _msg.id ] = 1;
				}

				setLocalData( _idQuizz, quizz );
				_elem = $( '#idTab-' + _msg.id );
				_elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/6' );
			}
			else if ( _msg.msg == 'actionnement' ) {
				datas.apps[ _msg.id ].quizz = _msg;
				localStorage.setItem( 'datas', JSON.stringify( datas ) );
				_elem = $( '#idTab-' + _msg.id );
				_elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
				_elem.find( 'span' ).html( '6/6' );
				_nbrRest--;
				if ( _nbrRest == 0 ) {
					setLocalData( "pathname", "/session/auto-evaluation-actionnement.php" );
					window.location = _uri + 'auto-evaluation-actionnement.php?_session=' + _ssid;
				}
			}
			if ( appSeek !== null && appSeek == _msg.id ) {
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appSeek }, retriveAnswer );
			}
			if( _casting !== false && appSeek == _casting ) {
				_msg = {
					'cible': 'projo',
					'msg': 'show',
					'quizz': _idQuizz,
					'uuid': appSeek,
					'nom': datas.apps[ appSeek ].nom,
					'prenom': datas.apps[ appSeek ].prenom
				};
				_msg = JSON.stringify( _msg );
				my_lcs.LCS_sndData( _msg );
			}
		};

		function callbackLRSMsg( _msg ) {
			alert( _msg );
		};

		function retriveAnswer( _answers ) {
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
			$( '#appSelect .synteseQuizz').html( '' );
			_html = '';
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				spl = ( tmp.object.definition.correctResponsesPattern[0] ).split( '[,]' );
				correctg = spl[ 0 ];
				correctt = spl[ 1 ];
				spl = ( tmp.result.response ).split( '[,]' );
				reponseg = spl[ 0 ];
				reponset = spl[ 1 ];
				if ( correctt != reponset ) {
					_html += `<div><div class="row"><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/armand.png" alt="" class="center block"></div><div class="col-9"><div class="card armand bad">` + _actioning[ reponseg ][ reponset ].t + `</div></div><div class="col-1"></div></div></div><div><div class="row"><div class="col-1"></div><div class="col-9"><div class="card severine">` + _actioning[ reponseg ][ reponset ].a + `</div></div><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/severine.png" alt="" class="center block"></div></div></div>`;
				}
				else{
					_html += `<div><div class="row"><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/armand.png" alt="" class="center block"></div><div class="col-9"><div class="card armand">` + _actioning[ reponseg ][ reponset ].t + `</div></div><div class="col-1"></div></div></div><div><div class="row"><div class="col-1"></div><div class="col-9"><div class="card severine">` + _actioning[ reponseg ][ reponset ].a + `</div></div><div class="col-2"><img src="http://commun.alteretgo.my-workflow.fr/actionnement/severine.png" alt="" class="center block"></div></div></div>`;
				}
			}
			$( '#appSelect .synteseQuizz').html( _html );
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIo,
			_idQuizz = '0x6e6e656d65',
			datas,
			quizz,
			_nbrRest,
			appSeek = null,
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
						't': 'Séverine ! Justement, je voulais te parler. Je peux te voir maintenant s\'il te plaît ? ',
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
			_casting = false;

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			datas = getLocalData( 'datas' );

			$( '#everybody' ).on( 'click', '.selectorApp', function( event ) {
				if ( $( this ).hasClass( 'readyToSee' ) === false ) {
					return null;
				}
				appAsk = $( this ).attr( 'id' );
				appAsk = appAsk.replace( 'idTab-', '' );
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appAsk }, retriveAnswer );
			} );

			$( '#prev' ).click( function( event ) {
				event.preventDefault();
				$( '#everybody' ).removeClass( 'hide' );
				$( '#appSelect' ).removeClass( 'show' );
				appSeek = null;
			} );

			$( '#cast' ).click( function( event ) {
				_casting = appSeek;
				event.preventDefault();
				_msg = {
					'cible': 'projo',
					'msg': 'show',
					'quizz': _idQuizz,
					'uuid': appSeek,
					'nom': datas.apps[ appSeek ].nom,
					'prenom': datas.apps[ appSeek ].prenom
				};
				_msg = JSON.stringify( _msg );
				my_lcs.LCS_sndData( _msg );
			} );
		} );
	</script>
</body>
</html>
