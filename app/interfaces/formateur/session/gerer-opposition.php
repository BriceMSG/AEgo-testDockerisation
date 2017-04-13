<!DOCTYPE html>
<html>
<?php
	include '../include/head.inc.php';
?>
<body>
	<?php
		$_menu_title = "Gérer l'opposition";
		$_extra_button = '';
		include '../include/topMenu.inc.php';
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
					<div class="w768 card block center synteseQuizz">
						<div id="q1">
							<h3 class="alter-btn-text">Le nouveau plan d’action ne convient absolument pas à Fabrice qui réagit fermement contre...</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q2">
							<h3 class="alter-btn-text">Laura poursuit le débat par une proposition pleine de bonne volonté mais peu pertinente…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q3">
							<h3 class="alter-btn-text">Séverine se montre particulièrement active contre cette annonce. Vous l’auriez manipulée en lui demandant de travailler avec Sébastien sans lui avoir précisé les nouveaux délais...</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q4">
							<h3 class="alter-btn-text">Marc n’arrive pas à se positionner. Votre plan est très ambitieux mais si c’est pour sauver Dreamask…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q5">
							<h3 class="alter-btn-text">Marc semble être d’accord avec les propos de Laura et Sébastien…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q6">
							<h3 class="alter-btn-text">Fabrice monopolise la parole avec virulence</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q7">
							<h3 class="alter-btn-text">Laura s’efface progressivement face à la prestation de Fabrice…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
						<div id="q8">
							<h3 class="alter-btn-text">Fabrice ne s’arrête pas et répète en boucle des arguments que vous avez déjà écartés…</h3>
							<p><span class="answered"></span> <span class="correctif"></span></p>
						</div>
					</div>
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
				_html += '<i class="material-icons txt-center center block ' + ( ( uQ == 8 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 8 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
				_html += '<span class="txt-center block">' + uQ + '/8</span>';
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
			if ( _msg.msg == 'gerer-opposition-part' ) {
				if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
					quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
				}
				else {
					quizz[ _msg.id ] = 1;
				}

				setLocalData( _idQuizz, quizz );
				_elem = $( '#idTab-' + _msg.id );
				_elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/8' );
			}
			else if ( _msg.msg == 'gerer-opposition' ) {
				datas.apps[ _msg.id ].quizz = _msg;
				localStorage.setItem( 'datas', JSON.stringify( datas ) );
				_elem = $( '#idTab-' + _msg.id );
				_elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
				_elem.find( 'span' ).html( '8/8' );
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
			console.log( _answers );
			_nbrAnswer = Object.keys( _answers.answer ).length;
			appSeek = _answers.app;
			$( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
			$( '#appSelect span').removeClass('orange-text green-text').html( '' );
			for ( var i = 0; i < _nbrAnswer; i++ ) {
				tmp = JSON.parse( _answers.answer[ i ].data );
				cible = $( '#q' + ( i + 1 ) );
				console.log( tmp.object.definition.correctResponsesPattern[0] );
				console.log( tmp.result.response );
				if ( tmp.object.definition.correctResponsesPattern[0] != tmp.result.response ) {
					cible.find( '.answered' ).addClass( 'orange-text' ).html( answers[ tmp.result.response ] );
					cible.find( '.correctif' ).addClass( 'green-text' ).html( answers[ tmp.object.definition.correctResponsesPattern[0] ] );
				}
				else{
					cible.find( '.answered' ).addClass( 'green-text' ).html( answers[ tmp.result.response ] );
				}
			}
			$( '#everybody' ).addClass( 'hide' );
			$( '#appSelect' ).addClass( 'show' );
		};


		var lcIo,
			_idQuizz = '0xf736974696',
			datas,
			quizz,
			appSeek = null,
			answers = {
				'a01': 'Vous répondez à son argument',
				'a02': 'Vous poursuivez sur le rôle indispensable de votre équipe sur cette période',
					'a04': 'Vous écoutez sa proposition avec attention, en prenez note pour y réfléchir plus tard',
					'a05': 'Vous la remerciez mais vous lui faites comprendre avec tact que ce n’est pas l’objet de la réunion',
				'a07': 'Vous lui expliquez que c’est une raison supplémentaire pour avoir son aide',
				'a08': 'Vous cherchez à donner la parole à quelqu’un plus positif vis-à-vis du projet',
					'a10': 'Vous allez chercher auprès de l’équipe des arguments pour le rassurer',
					'a11': 'Vous questionnez l’équipe avec un tour de table',
				'a13': 'Vous continuez le dialogue avec Laura et Sébastien pour les valoriser',
				'a14': 'Vous proposez à Marc de s’associer à eux pour une partie du travail',
					'a16': 'Vous lui demander d\'adopter une posture plus constructive',
					'a17': 'Vous sollicitez des solutions auprès des autres membres de l\'équipe, au risque de vous mettre Fabrice à dos.',
				'a19': 'Vous maintenez le dialogue avec elle en valorisant ses propositions et les perspectives de développement',
				'a20': 'Vous essayez de vous appuyer sur les autres',
					'a22': 'Vous arrêtez les échanges avec lui et définissez le plan d’action avec les autres collaborateurs',
					'a23': 'Dans l\'élaboration du plan d\'action, vous attribuez des tâches à Fabrice ainsi qu’aux autres membres de l’équipe'
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
