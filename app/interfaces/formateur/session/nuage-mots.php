<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<base href="http://formateur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/formateur.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div class="row">
			<div class="col-2 brw" onclick="toggleMenu();">
				<i class="material-icons left">menu</i>
				Menu
			</div>
			<div id="title" class="col-6 title">
				Nuage de mots
			</div>
			<div class="col-2 blw" id="projoNow">
				<i class="material-icons right">screen_share</i>
				<span>Projeter</span>
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
						<div class="col-4"></div>
					</div>
					<div class="row">
						<div class="col-4">
							<div class="card" id="perso1">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso01.png" alt="">
								<span class="answer"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="perso2">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso02.png" alt="">
								<span class="answer"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="perso3">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso03.png" alt="">
								<span class="answer"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4">
							<div class="card" id="perso4">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso04.png" alt="">
								<span class="answer"></span>
							</div>
						</div>
						<div class="col-4">
							<div class="card" id="perso5">
								<img src="http://commun.alteretgo.my-workflow.fr/nuage/perso05.png" alt="">
								<span class="answer"></span>
							</div>
						</div>
						<div class="col-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="notif" class=""></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

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

			appsNbr = j;

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
				_html += '<i class="material-icons txt-center center block ' + ( ( uQ == 5 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 5 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
				_html += '<span class="txt-center block">' + uQ + '/5</span>';
				_html += '</div></div>';

				if ( uQ == 5 ) {
					appsNbr--;
				}

				if ( i == j-1 ) {
					_html += '</div>';
				}
				_col++;
			}
			_content.html( _html );
			$( '#content' ).addClass( 'show' );
			if ( appsNbr == 0 ) {
				_msg = {
					'cible': 'projo',
					'msg': 'show',
					'quizz': _idQuizz
				};
				_msg = JSON.stringify( _msg );
				my_lcs.LCS_sndData( _msg );
			}
		};

		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );
			console.log( _msg );

			if ( _msg.cible != 'former' ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'nuage-mots-part' ) {
				if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
					quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
				}
				else {
					quizz[ _msg.id ] = 1;
				}

				setLocalData( _idQuizz, quizz );
				_elem = $( '#idTab-' + _msg.id );
				_elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/5' );
			}
			else if ( _msg.msg == 'nuage-mots' ) {
				datas.apps[ _msg.id ].quizz = _msg;
				localStorage.setItem( 'datas', JSON.stringify( datas ) );
				_elem = $( '#idTab-' + _msg.id );
				_elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
				_elem.find( 'span' ).html( '5/5' );
				appsNbr--;
			}
			if ( appSeek !== null && appSeek == _msg.id ) {
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appSeek }, retriveAnswer );
			}
			if ( appsNbr == 0 ) {
				_msg = {
					'cible': 'projo',
					'msg': 'show',
					'quizz': _idQuizz
				};
				_msg = JSON.stringify( _msg );
				my_lcs.LCS_sndData( _msg );
			}
		};

		function callbackLRSMsg( _msg ) {
			alert( _msg );
		};

		function retriveAnswer( _answers ) {
			console.log( _answers );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
			$( '#appSelect span').removeClass('orange-text green-text').html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				console.log( tmp );
				cible = $( '#perso' + ( i + 1 ) );
				console.log( i + 1 );
				cible.find( '.answer' ).html( tmp.result.response );
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		var lcIo,
			_idQuizz = '0x269616c657',
			datas,
			quizz,
			appSeek = null,
			appsNbr = null;

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			datas = getLocalData( 'datas' );

			if ( appsNbr === null ) {
				appsNbr = Object.keys( datas.apps ).length;
			}

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

			$( '#projoNow' ).click( function( event ) {
				_msg = {
					'cible': 'projo',
					'msg': 'show',
					'quizz': _idQuizz
				};
				_msg = JSON.stringify( _msg );
				my_lcs.LCS_sndData( _msg );
			} );
		} );
	</script>
</body>
</html>
