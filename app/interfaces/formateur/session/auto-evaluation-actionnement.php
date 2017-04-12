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
				Auto-évaluation sur l'actionnement
			</div>
			<div class="col-3 blw" onclick="setLocalData( 'pathname', '/session/actionnement.php' ); window.location = _uri + 'actionnement.php?_session=' + _ssid;">
				<i class="material-icons right">equalizer</i>
				Actionnement
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
					<div class="card w768 block center synteseQuizz">
						<div id="q1">
							<h3 class="alter-btn-text">Synchronisation</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Ecoute active</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Recherche commune</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">Bouclage</h3>
							<div class="answered"></div><div class="correctif"></div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<span class="answered"></span> Actionnement de Séverine
							</div>
							<div class="col-6">
								<span class="correctif"></span> Auto-évaluation
							</div>
						</div>
						<div id="comment"></div>
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
				_html += '<i class="material-icons txt-center center block ' + ( ( uQ == 4 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 4 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
				_html += '<span class="txt-center block">' + uQ + '/4</span>';
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
			if ( _msg.msg == 'auto-evaluation-part' ) {
				if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
					quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
				}
				else {
					quizz[ _msg.id ] = 1;
				}

				setLocalData( _idQuizz, quizz );
				_elem = $( '#idTab-' + _msg.id );
				_elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/4' );
				_elem.find( 'span' ).html( quizz[ _msg.id ] + '/4' );
			}
			else if ( _msg.msg == 'auto-evaluation' ) {
				datas.apps[ _msg.id ].quizz = _msg;
				localStorage.setItem( 'datas', JSON.stringify( datas ) );
				_elem = $( '#idTab-' + _msg.id );
				_elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
				_elem.find( 'span' ).html( '4/4' );
			}
			if ( appSeek !== null && appSeek == _msg.id ) {
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":appAsk }, retriveAnswerOne );
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0xa977516c75', "uuid":appAsk }, retriveAnswerTwo );
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

		function retriveAnswerOne( _answers ) {
			console.log( _answers.answer );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
			$( '#appSelect .answered').css('width', '50%').html( '' );

			_first = {1:0,2:0,3:0,4:0};
			_tmp = JSON.parse( _answers.answer[ 0 ].data );
			if( _tmp.result.success ) {
				_first[ 1 ] = ( 1 ).toFixed( 2 );
			}

			_sc = 0;
			_tmp = JSON.parse( _answers.answer[ 1 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_tmp = JSON.parse( _answers.answer[ 2 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_first[ 2 ] = ( _sc / 2 ).toFixed( 2 );

			_sc = 0;
			_tmp = JSON.parse( _answers.answer[ 3 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_tmp = JSON.parse( _answers.answer[ 4 ].data );
			if( _tmp.result.success ) {
				_sc++;
			}
			_first[ 3 ] = ( _sc / 2 ).toFixed( 2 );

			_tmp = JSON.parse( _answers.answer[ 5 ].data );
			if( _tmp.result.success ) {
				_first[ 4 ] = ( 1 ).toFixed( 2 );
			}

			$.each( _first, function( index, el ) {
				_val = parseFloat( el ) * 100;
				if( _val < 50 ) { _val = 50; }
				$( '#q' + ( index ) + ' .answered' ).css('width', _val + '%' ).html( _val + '%' );
			} );

			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};

		function retriveAnswerTwo( _answers ) {
			console.log( _answers.answer );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect .correctif').css('width', '50%').html( '' );
			_i = 1;
			$.each( _answers.answer, function( index, el ) {
				if( typeof el === 'object' ) {
					el = JSON.parse( el.data );
					_dim = 50;
					if( _i == 1 ) {
						if( el.result.response == 'a01' ) { _dim = 50; }
						if( el.result.response == 'a02' ) { _dim = 75; }
						if( el.result.response == 'a03' ) { _dim = 100; }
					}
					if( _i == 2 ) {
						if( el.result.response == 'b01' ) { _dim = 50; }
						if( el.result.response == 'b02' ) { _dim = 75; }
						if( el.result.response == 'b03' ) { _dim = 100; }
					}
					if( _i == 3 ) {
						if( el.result.response == 'c01' ) { _dim = 50; }
						if( el.result.response == 'c02' ) { _dim = 75; }
						if( el.result.response == 'c03' ) { _dim = 100; }
					}
					if( _i == 4 ) {
						if( el.result.response == 'd01' ) { _dim = 50; }
						if( el.result.response == 'd02' ) { _dim = 75; }
						if( el.result.response == 'd03' ) { _dim = 100; }
					}

					$( '#q' + ( _i ) + ' .correctif' ).css('width', _dim + '%' ).html( _dim + '%' );

					_i++;
				}
			} );
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};


		var lcIo,
			_idQuizz = '0xa977516c75',
			datas,
			quizz,
			appSeek = null,
			answers = {
				'a01': 'De 0% à 50%',
				'a02': 'De 50% à 75%',
				'a03': 'De 75% à 100%',
					'b01': 'De 0% à 50%',
					'b02': 'De 50% à 75%',
					'b03': 'De 75% à 100%',
				'c01': 'De 0% à 50%',
				'c02': 'De 50% à 75%',
				'c03': 'De 75% à 100%',
					'd01': 'De 0% à 50%',
					'd02': 'De 50% à 75%',
					'd03': 'De 75% à 100%'
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
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":appAsk }, retriveAnswerOne );
				recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0xa977516c75', "uuid":appAsk }, retriveAnswerTwo );
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
