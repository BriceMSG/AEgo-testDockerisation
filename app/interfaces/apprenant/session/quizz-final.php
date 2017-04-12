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
		.mt15 {
			margin-top: 1.5rem;
		}
		#quizz, .slide {
			height: auto !important;
		}
		table {
			display: block;
			width: 100%;
			margin-right: auto;
			margin-left: auto;
		}
		table td {
			width: 148px;
		}
		table tr {
			height: 52px;
			vertical-align: middle;
		}
		table tr:nth-child(even), table td:nth-child(even) {
			background-color: rgba(110, 201, 241, 0.25);
		}
		table td:first-child {
			width: 300px;
			padding-left: 6px;
		}
		table.t2 td {
			width: 148px;
		}
		table.t2 td:first-child {
			width: 444px;
		}
		table.t4 td {
			width: 148px;
		}
		table.t4 td:first-child {
			width: 152px;
		}
		.liberty {
			overflow: hidden;
		}
		.liberty label {
			margin: 0;
			width: 100%;
			height: 52px;
		}
		.liberty label:before,
		.liberty label::before {
			top: 50% !important;
			left: 50% !important;
			margin-top: -10px !important;
			margin-left: -.5rem !important;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				Relevez le défi
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div class="">
			<div class="w768 center block card txt-left">
				<form id="quizz" autocomplete="off">
					<div class="slide show">
						<img src="http://commun.alteretgo.my-workflow.fr/noeud-papillon.png" alt="" class="center block">
						<h3 class="alter-btn-text">Indiquez la phase correspondant à chaque élément donné.</h3>
						<table>
							<tr class="txt-center">
								<td></td>
								<td class="alter-btn-text bold">Pourquoi</td>
								<td class="alter-btn-text bold">Quoi</td>
								<td class="alter-btn-text bold">Comment</td>
							</tr>
							<tr>
								<td>Solution proposée</td>
								<td class="input-field liberty">
									<input type="radio" id="qz11" name="qz1" value="0">
									<label for="qz11"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz12" name="qz1" value="0">
									<label for="qz12"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz13" name="qz1" value="1">
									<label for="qz13"></label>
								</td>
							</tr>
							<tr>
								<td>Ambition</td>
								<td class="input-field liberty">
									<input type="radio" id="qz271" name="qz27" value="0">
									<label for="qz271"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz272" name="qz27" value="1">
									<label for="qz272"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz273" name="qz27" value="0">
									<label for="qz273"></label>
								</td>
							</tr>
							<tr>
								<td>Contexte</td>
								<td class="input-field liberty">
									<input type="radio" id="qz21" name="qz2" value="1">
									<label for="qz21"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz22" name="qz2" value="0">
									<label for="qz22"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz23" name="qz2" value="0">
									<label for="qz23"></label>
								</td>
							</tr>
							<tr>
								<td>Piste de travail ouvert</td>
								<td class="input-field liberty">
									<input type="radio" id="qz31" name="qz3" value="0">
									<label for="qz31"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz32" name="qz3" value="0">
									<label for="qz32"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz33" name="qz3" value="1">
									<label for="qz33"></label>
								</td>
							</tr>
							<tr>
								<td>Conviction</td>
								<td class="input-field liberty">
									<input type="radio" id="qz281" name="qz28" value="0">
									<label for="qz281"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz282" name="qz28" value="1">
									<label for="qz282"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz283" name="qz28" value="0">
									<label for="qz283"></label>
								</td>
							</tr>
							<tr>
								<td>Constat</td>
								<td class="input-field liberty">
									<input type="radio" id="qz41" name="qz4" value="1">
									<label for="qz41"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz42" name="qz4" value="0">
									<label for="qz42"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz43" name="qz4" value="0">
									<label for="qz43"></label>
								</td>
							</tr>
							<tr>
								<td>Calendrier de travail</td>
								<td class="input-field liberty">
									<input type="radio" id="qz51" name="qz5" value="0">
									<label for="qz51"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz52" name="qz5" value="0">
									<label for="qz52"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz53" name="qz5" value="1">
									<label for="qz53"></label>
								</td>
							</tr>
							<tr>
								<td>Menace</td>
								<td class="input-field liberty">
									<input type="radio" id="qz61" name="qz6" value="1">
									<label for="qz61"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz62" name="qz6" value="0">
									<label for="qz62"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz63" name="qz6" value="0">
									<label for="qz63"></label>
								</td>
							</tr>
							<tr>
								<td>Vision</td>
								<td class="input-field liberty">
									<input type="radio" id="qz291" name="qz29" value="0">
									<label for="qz291"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz292" name="qz29" value="1">
									<label for="qz292"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz293" name="qz29" value="0">
									<label for="qz293"></label>
								</td>
							</tr>
							<tr>
								<td>Commande</td>
								<td class="input-field liberty">
									<input type="radio" id="qz71" name="qz7" value="0">
									<label for="qz71"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz72" name="qz7" value="0">
									<label for="qz72"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz73" name="qz7" value="1">
									<label for="qz73"></label>
								</td>
							</tr>
						</table>
					</div>
					<div class="slide">
						<img src="http://commun.alteretgo.my-workflow.fr/triangle-engagement.png" alt="" class="center block">
						<h3 class="alter-btn-text">Indiquez, pour chaque élément, le côté du triangle auquel il correspond.</h3>
						<table>
							<tr class="txt-center">
								<td></td>
								<td class="alter-btn-text bold">Liberté</td>
								<td class="alter-btn-text bold">Coût</td>
								<td class="alter-btn-text bold">Prise de décision</td>
							</tr>
							<tr>
								<td>Toute action a une valeur</td>
								<td class="input-field liberty">
									<input type="radio" id="qz81" name="qz8" value="0">
									<label for="qz81"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz82" name="qz8" value="1">
									<label for="qz82"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz83" name="qz8" value="0">
									<label for="qz83"></label>
								</td>
							</tr>
							<tr>
								<td>Pouvoir dire oui ou non</td>
								<td class="input-field liberty">
									<input type="radio" id="qz91" name="qz9" value="1">
									<label for="qz91"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz92" name="qz9" value="0">
									<label for="qz92"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz93" name="qz9" value="0">
									<label for="qz93"></label>
								</td>
							</tr>
							<tr>
								<td>Partager son engagement</td>
								<td class="input-field liberty">
									<input type="radio" id="qz101" name="qz10" value="0">
									<label for="qz101"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz102" name="qz10" value="0">
									<label for="qz102"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz103" name="qz10" value="1">
									<label for="qz103"></label>
								</td>
							</tr>
						</table>
					</div>
					<div class="slide">
						<h3 class="alter-btn-text">Indiquez, la phase de l'actionnement qui lui correspond.</h3>
						<table class="t4">
							<tr class="txt-center">
								<td></td>
								<td class="alter-btn-text bold">Synchronisation</td>
								<td class="alter-btn-text bold">Ecoute active</td>
								<td class="alter-btn-text bold">Recherche commune</td>
								<td class="alter-btn-text bold">Rebouclage</td>
							</tr>
							<tr>
								<td>Qu’en pensez-vous…</td>
								<td class="input-field liberty">
									<input type="radio" id="qz111" name="qz11" value="0">
									<label for="qz111"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz112" name="qz11" value="1">
									<label for="qz112"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz113" name="qz11" value="0">
									<label for="qz113"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz114" name="qz11" value="0">
									<label for="qz114"></label>
								</td>
							</tr>
							<tr>
								<td>J’aimerais vous parler de…</td>
								<td class="input-field liberty">
									<input type="radio" id="qz121" name="qz12" value="1">
									<label for="qz121"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz122" name="qz12" value="0">
									<label for="qz122"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz123" name="qz12" value="0">
									<label for="qz123"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz124" name="qz12" value="0">
									<label for="qz124"></label>
								</td>
							</tr>
							<tr>
								<td>Qui fait quoi ?</td>
								<td class="input-field liberty">
									<input type="radio" id="qz131" name="qz13" value="0">
									<label for="qz131"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz132" name="qz13" value="0">
									<label for="qz132"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz133" name="qz13" value="0">
									<label for="qz133"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz134" name="qz13" value="1">
									<label for="qz134"></label>
								</td>
							</tr>
							<tr>
								<td>Que proposez-vous pour faire avancer ce projet ?</td>
								<td class="input-field liberty">
									<input type="radio" id="qz141" name="qz14" value="0">
									<label for="qz141"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz142" name="qz14" value="0">
									<label for="qz142"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz143" name="qz14" value="1">
									<label for="qz143"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz144" name="qz14" value="0">
									<label for="qz144"></label>
								</td>
							</tr>
						</table>
					</div>
					<div class="slide">
						<h3 class="alter-btn-text">Sélectionnez la bonne réponse.</h3>
						<div class="quest">
							<h3 class="alter-btn-text bold">En quoi consiste la technique du chevalier blanc ?</h3>
							<div class="input-field">
								<input type="radio" id="qz151" name="qz15" value="0">
								<label for="qz151">Faire comme si on n’avait pas entendu la question.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz152" name="qz15" value="1">
								<label for="qz152">Faire intervenir les alliés.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz153" name="qz15" value="0">
								<label for="qz153">Répondre à une question par une question.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz154" name="qz15" value="0">
								<label for="qz154">Secourir les opprimés et rétablir le bon droit.</label>
							</div>
						</div>
						<div class="quest">
							<h3 class="alter-btn-text bold">Qu’est-ce qu’un triangle d’or ?</h3>
							<div class="input-field">
								<input type="radio" id="qz161" name="qz16" value="1">
								<label for="qz161">Un acteur constructif sur lequel s’appuyer pour faire avancer un projet.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz162" name="qz16" value="0">
								<label for="qz162">Un groupe d’opposants organisé contre un projet.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz163" name="qz16" value="0">
								<label for="qz163">Un triangle à la fois isocèle rectangle et équilatéral.</label>
							</div>
						</div>
						<div class="quest">
							<h3 class="alter-btn-text bold">Un intrus s’est glissé dans ces profils types, lequel ?</h3>
							<div class="input-field">
								<input type="radio" id="qz171" name="qz17" value="0">
								<label for="qz171">Grognon</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz172" name="qz17" value="0">
								<label for="qz172">Suiveur</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz173" name="qz17" value="1">
								<label for="qz173">Réactif</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz174" name="qz17" value="0">
								<label for="qz174">Militant</label>
							</div>
						</div>
						<div class="quest">
							<h3 class="alter-btn-text bold">Un intrus s’est glissé dans les principes de l’animation collective durable, lequel ?</h3>
							<div class="input-field">
								<input type="radio" id="qz181" name="qz18" value="0">
								<label for="qz181">Ambition</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz182" name="qz18" value="1">
								<label for="qz182">Synchronisation</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz183" name="qz18" value="0">
								<label for="qz183">Rythme</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz184" name="qz18" value="0">
								<label for="qz184">Responsabilisation</label>
							</div>
						</div>
						<div class="quest">
							<h3 class="alter-btn-text bold">Un intrus s’est glissé dans les questions à avoir en tête pour évaluer la synergie des acteurs, lequel ?</h3>
							<div class="input-field">
								<input type="radio" id="qz191" name="qz19" value="0">
								<label for="qz191">Agit-il en faveur du projet ?</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz192" name="qz19" value="0">
								<label for="qz192">Prend-il des initiatives ?</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz193" name="qz19" value="1">
								<label for="qz193">Exerce-t-il une influence sur les autres acteurs ?</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz194" name="qz19" value="0">
								<label for="qz194">Prend-il des initiatives dans un intérêt collectif, altruiste ?</label>
							</div>
						</div>
						<div class="quest">
							<h3 class="alter-btn-text bold">Un intrus s’est glissé dans les 3 règles d’or de la gestion de l’opposition, lequel ?</h3>
							<div class="input-field">
								<input type="radio" id="qz201" name="qz20" value="0">
								<label for="qz201">Ne jamais laisser l’attaque d’un opposant sans réponse.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz202" name="qz20" value="0">
								<label for="qz202">Ne jamais  répondre à une attaque en se justifiant sur le fond.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz203" name="qz20" value="0">
								<label for="qz203">Ne jamais prendre les attaques pour soi.</label>
							</div>
							<div class="input-field">
								<input type="radio" id="qz204" name="qz20" value="1">
								<label for="qz204">Ne jamais reformuler les propos d’un opposant.</label>
							</div>
						</div>
					</div>
					<div class="slide">
						<h3 class="alter-btn-text">Sélectionnez la bonne réponse.</h3>
						<table class="t2">
							<tr class="txt-center">
								<td></td>
								<td>Vrai</td>
								<td>Faux</td>
							</tr>
							<tr>
								<td>Les alliés s’expriment peu ou de façon désorganisée.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz211" name="qz21" value="1">
									<label for="qz211"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz212" name="qz21" value="0">
									<label for="qz212"></label>
								</td>
							</tr>
							<tr>
								<td>Les hésitants sont souvent les moins nombreux au démarrage.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz221" name="qz22" value="0">
									<label for="qz221"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz222" name="qz22" value="1">
									<label for="qz222"></label>
								</td>
							</tr>
							<tr>
								<td>Les opposants sont mieux organisés et ne s’expriment que très rarement.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz231" name="qz23" value="0">
									<label for="qz231"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz232" name="qz23" value="1">
									<label for="qz232"></label>
								</td>
							</tr>
							<tr>
								<td>Il est important de laisser l’opportunité aux opposants de rejoindre le projet.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz241" name="qz24" value="1">
									<label for="qz241"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz242" name="qz24" value="0">
									<label for="qz242"></label>
								</td>
							</tr>
							<tr>
								<td>Il convient de soutenir et valoriser l’action des opposants.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz251" name="qz25" value="0">
									<label for="qz251"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz252" name="qz25" value="1">
									<label for="qz252"></label>
								</td>
							</tr>
							<tr>
								<td>Il est nécessaire de favoriser la communication entre les alliés et les opposants.</td>
								<td class="input-field liberty">
									<input type="radio" id="qz261" name="qz26" value="0">
									<label for="qz261"></label>
								</td>
								<td class="input-field liberty">
									<input type="radio" id="qz262" name="qz26" value="1">
									<label for="qz262"></label>
								</td>
							</tr>
						</table>
					</div>
				</form>
				<div class="txt-right mt15">
					<a href="#!" id="next" class="btn alter-btn white-text">
						<i class="material-icons left">save</i>
						<i class="material-icons right">chevron_right</i>
						Enregistrer
					</a>
					<div class="italic">Vos choix sont définitifs.</div>
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
				goTo( 'synthese-quizz-final.php' );
				return null;
			}
			else {
				_iterate = _tmp.nbr;
				finite = JSON.parse( _tmp[ 'finite' ] );
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
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'quizz-final' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
		};

		function segment ( _n, _correctResponsesPattern, _source, _target, _reponses, _success, _score, _finit ) {
			_finit = _finit || false;
			_dtPart = new Date();
			_declaration = _LRSsegment;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g, formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g, _uuid );
			_declaration = _declaration.replace( /__uriQuizzInc__/g, formatURILesson( 'quizz-final', _n ) );
			_declaration = _declaration.replace( /__correctResponsesPattern__/g, _correctResponsesPattern );
			_declaration = _declaration.replace( /__source__/g, _source );
			_declaration = _declaration.replace( /__target__/g, _target );
			_declaration = _declaration.replace( /__reponses__/g, _reponses );
			_declaration = _declaration.replace( /__success__/g, _success );
			_declaration = _declaration.replace( /__score__/g, _score );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'quizz-final' ) );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtPart.toISOString() );
			console.log( _declaration);
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
			_slideNbr = getLocalData( _idQuizz );
			_slideNbr.nbr++;
			_slideNbr[ _n ] = _reponses;
			_slideNbr[ 'finite' ] = JSON.stringify( finite );
			setLocalData( _idQuizz, _slideNbr );
			sayPart( _n );
			if ( _finit === true ) {
				finished();
			}
		};

		function sayPart( _step ) {
			_msg = {
				"cible": "former",
				"msg": "quizz-final-part",
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
			_declaration = _declaration.replace( /__stateEndVerb__/g, finite[ 'verb' ] );
			_declaration = _declaration.replace( /__uriQuizz__/g, formatURILesson( 'quizz-final' ) );
			_declaration = _declaration.replace( /__quizzName__/g, _quizzName );
			_declaration = _declaration.replace( /__quizzNameDesc__/g, _quizzNameDesc );
			_declaration = _declaration.replace( /__durationQuizz__/g, finite[ 'duration' ] );
			_declaration = _declaration.replace( /__successQuizz__/g, finite[ 'success' ] );
			_declaration = _declaration.replace( /__scoreQuizz__/g, finite[ 'score' ] );
			_declaration = _declaration.replace( /__groupeDeclaration__/g, finite[ 'groupe' ] );
			_declaration = _declaration.replace( /__uriCourseFormator__/g, formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g, _instructor );
			_declaration = _declaration.replace( /__timeStamp__/g, _dtEnd.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			sendToSave(
				'save-results.php',
				{
					'ssid': _ssid,
					'uuid': _uuid,
					'quizz': _idQuizz,
					'duration': finite[ 'duration' ],
					'score': finite[ 'score' ]
				}
			);
			sayFinish( finite[ 'score' ] );
		};

		function sayFinish( _status ) {
			_msg = {
				"cible": "former",
				"msg": "quizz-final",
				"id": _uuid,
				"status": _status
			};
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			goTo( 'synthese-quizz-final.php' );
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
			_idQuizz = '0x66696e616c',
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
						"interactionType": "matching",
						"correctResponsesPattern": [
							"__correctResponsesPattern__"
						],
						"source": [__source__],
						"target": [__target__]
					}
				},
				"result": {
					"response": "__reponses__",
					"success": __success__,
					"score": {
						"scaled" : __score__
					}
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
					"id": "http://adlnet.gov/expapi/verbs/__stateEndVerb__",
					"display" : {
						"en-US" : "__stateEndVerb__"
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
					"duration":"__durationQuizz__",
					"success": __successQuizz__,
					"score": {
						"scaled" : __scoreQuizz__
					}
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
			_quizzName = 'Quizz final',
			_quizzNameDesc = 'Quizz final de validation des acquis reprenant l’ensemble des concepts abordés.',
			finite = {
				"verb": '',
				"duration": '',
				"success": false,
				"score": 0,
				"groupe": ''
			},
			_correct = {
				1: {
					'qz11': 'Pourquoi', 'qz12': 'Quoi', 'qz13': 'Comment',
						'qz271': 'Pourquoi', 'qz272': 'Quoi', 'qz273': 'Comment',
					'qz21': 'Pourquoi', 'qz22': 'Quoi', 'qz23': 'Comment',
						'qz31': 'Pourquoi', 'qz32': 'Quoi', 'qz33': 'Comment',
					'qz281': 'Pourquoi', 'qz282': 'Quoi', 'qz283': 'Comment',
						'qz41': 'Pourquoi', 'qz42': 'Quoi', 'qz43': 'Comment',
					'qz51': 'Pourquoi', 'qz52': 'Quoi', 'qz53': 'Comment',
						'qz61': 'Pourquoi', 'qz62': 'Quoi', 'qz63': 'Comment',
					'qz291': 'Pourquoi', 'qz292': 'Quoi', 'qz293': 'Comment',
						'qz71': 'Pourquoi', 'qz72': 'Quoi', 'qz73': 'Comment'
				},
				2: {
					'qz81': 'Liberté', 'qz82': 'Coût', 'qz83': 'Prise de décision',
						'qz91': 'Liberté', 'qz92': 'Coût', 'qz93': 'Prise de décision',
					'qz101': 'Liberté', 'qz102': 'Coût', 'qz103': 'Prise de décision'
				},
				3: {
					'qz111': 'Liberté', 'qz112': 'Coût', 'qz113': 'Prise de décision', 'qz114': 'Prise de décision',
						'qz121': 'Liberté', 'qz122': 'Coût', 'qz123': 'Prise de décision', 'qz124': 'Prise de décision',
					'qz131': 'Liberté', 'qz132': 'Coût', 'qz133': 'Prise de décision', 'qz134': 'Prise de décision',
					'qz141': 'Liberté', 'qz142': 'Coût', 'qz143': 'Prise de décision', 'qz144': 'Prise de décision'
				},
				4: {
					'qz151': 'Faire comme si on n’avait pas entendu la question', 'qz152': 'Faire intervenir les alliés', 'qz153': 'Répondre à une question par une question', 'qz154': 'Secourir les opprimés et rétablir le bon droit',
						'qz161': 'Un acteur constructif sur lequel s’appuyer pour faire avancer un projet', 'qz162': 'Un groupe d’opposants organisé contre un projet', 'qz163': 'Un triangle à la fois isocèle rectangle et équilatéral',
					'qz171': 'Grognon', 'qz172': 'Suiveur', 'qz173': 'Réactif', 'qz174': 'Militant',
						'qz181': 'Ambition', 'qz182': 'Synchronisation', 'qz183': 'Rythme', 'qz184': 'Responsabilisation',
					'qz191': 'Agit-il en faveur du projet', 'qz192': 'Prend-il des initiatives ?', 'qz193': 'Exerce-t-il une influence sur les autres acteurs ?', 'qz194': 'Prend-il des initiatives dans un intérêt collectif, altruiste ?',
						'qz201': 'Ne jamais laisser l’attaque d’un opposant sans réponse', 'qz202': 'Ne jamais  répondre à une attaque en se justifiant sur le fond', 'qz203': 'Ne jamais prendre les attaques pour soi', 'qz204': 'Ne jamais reformuler les propos d’un opposant'
				},
				5: {
					'qz211': 'Vrai', 'qz212': 'Faux',
						'qz221': 'Vrai', 'qz222': 'Faux',
					'qz231': 'Vrai', 'qz232': 'Faux',
						'qz241': 'Vrai', 'qz242': 'Faux',
					'qz251': 'Vrai', 'qz252': 'Faux',
						'qz261': 'Vrai', 'qz262': 'Faux'
				}
			},
			_reponsesGlobal;

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			_reload = getLocalData( _idQuizz );

			if( _reload[ 'dtBegin' ] == undefined ) {
				_dtBegin = new Date();
				_reload[ 'dtBegin' ] = _dtBegin.toISOString();
			}
			else {
				_dtBegin = new Date( parseInt( Date.parse( _reload[ 'dtBegin' ] ) ) );
			}

			if( _reload[ 'nbr' ] == undefined ) {
				_reload[ 'finite' ] = JSON.stringify( finite );
				_reload[ 'nbr' ] = 0;
			}
			setLocalData( _idQuizz, _reload );

			_ssid = getLocalData( "ssid" );
			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );

			_inputs = $( 'input' );

			$( '#next' ).click( function( event ) {
				event.preventDefault();

				/* Si pas déja en train de travailler */
				if ( _working ) { return null; }
				_working = true;

				/* Recuperation des éléments */
				_tmp = $( '.slide.show' ),
				_chk = _tmp.find( 'input:checked' );
				if( _iterate == 3 ) {
					_tr = _tmp.find( '.quest');
				}
				else {
					_tr = _tmp.find( 'tr:not(.txt-center)');
				}

				if ( _chk.length != _tr.length ) {
					notif( 'warning', 'Veuillez répondre à toutes les questions.' );
					_working = false;
					return null;
				}

				/* Récupération des infos */
				segment_n = _iterate;
				segment_sources = '';
				segment_target = '';
				segment_choices = '';
				segment_correctAnswer = '';

				_score = 0;

				for (var i = 0; i < _tr.length; i++) {
					if( _iterate == 3 ) {
						segment_sources += '{ "id":"' + $( _tr[ i ] ).find( 'input[value=1]' ).attr( 'id' ).slice( 0, -1 ) + '", "description":{ "fr":"' + $( _tr[ i ] ).find( 'h3' ).html() + '" } },';
					}
					else{
						segment_sources += '{ "id":"' + $( _tr[ i ] ).find( 'input[value=1]' ).attr( 'id' ).slice( 0, -1 ) + '", "description":{ "fr":"' + $( _tr[ i ] ).find( 'td:first-child' ).html() + '" } },';
					}
					sg_ch = $( _tr[ i ] ).find( 'input[value=1]' ).attr( 'id' ).slice( 0, -1 ) + '[.]' + $( _chk[ i ] ).attr( 'id' ) + '[,]';
					sg_ca = $( _tr[ i ] ).find( 'input[value=1]' ).attr( 'id' ).slice( 0, -1 ) + '[.]' + $( _tr[ i ] ).find( 'input[value=1]' ).attr( 'id' ) + '[,]';

					segment_choices += sg_ch;
					segment_correctAnswer += sg_ca;

					if ( sg_ca == sg_ch ) {
						_score++;
						finite[ 'score' ]++;
					}
				}
				$.each( _correct[ _iterate ] , function( index, val ) {
					segment_target += '{ "id":"' + index + '", "description":{ "fr":"' + val + '"} },';
				});
				segment_target = segment_target.slice( 0, -1 );
				segment_sources = segment_sources.slice( 0, -1 );
				segment_choices = segment_choices.slice( 0, -3 );
				segment_correctAnswer = segment_correctAnswer.slice( 0, -3 );

				_reponsesGlobal += segment_choices + '[,]';

				_success = false;
				if ( segment_correctAnswer == segment_choices ) {
					_success = true;
				}
				_score = ( _score / _tr.length ).toFixed( 2 );

				finite[ 'groupe' ] += `{
					"id":"` + formatURILesson( 'quizz-final', segment_n ) + `",
					"definition":{
						"type":"http://adlnet.gov/expapi/activities/interaction"
					}
				},`;

				_finited = false;
				if ( _tmp.next().length == 0 ) {
					_finited = true;
					if ( finite[ 'score' ] == 0 ) {
						finite[ 'verb' ] = "failed";
						finite[ 'success' ] = false;
					}
					else if ( finite[ 'score' ] >= 22 ) {
						finite[ 'verb' ] = "passed";
						finite[ 'success' ] = true;
					}
					else if ( finite[ 'score' ] == 29 ) {
						finite[ 'verb' ] = "mastered";
						finite[ 'success' ] = true;
					}
					else {
						finite[ 'verb' ] = "completed";
						finite[ 'success' ] = true;
					}
					finite[ 'score' ] = ( finite[ 'score' ] / 29 ).toFixed( 2 );
				}

				segment ( segment_n, segment_correctAnswer, segment_sources, segment_target, segment_choices, _success, _score, _finited );

				if ( _finited ) {
					return false;
				}

				/* Changement de slide */
				_iterate++;
				_tmp.removeClass( 'show' );
				_tmp = _tmp.next();
				_tmp.addClass( 'show' );

				_working = false;

				return null;
			} );
		} );
	</script>
</body>
</html>
