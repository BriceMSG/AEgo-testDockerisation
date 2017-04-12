<?php if ( !isset( $_GET[ 'uuid' ] ) ) { ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://projecteur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/projecteur.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				Formation au "Change Management"
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card block center w768">
				<h1 class="display2 alter-btn-text txt-center">Questionnaires</h1>
				<p class="txt-center" style="font-size:1.75rem !important;">Souhaitez-vous imprimer les questionnaires ?</p>
				<img src="http://commun.alteretgo.my-workflow.fr/alteretgo_formation.svg" alt="" class="center block w256">
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

	<script src="http://commun.alteretgo.my-workflow.fr/projecteur.js"></script>
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
			if ( _msg.cible != 'projo' ) {
				_msg = null;
				return null;
			}

			if ( _msg.msg == 'show' ) {
				window.location = _uri + 'satisfaction.php?_session=' + _ssid + '&uuid=' + _msg.uuid;
			}

			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		var lcIo;
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
<?php exit(); }
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	$sqlQuery = 'SELECT lastName, firstName FROM {pre_}apprenant WHERE ssid=? AND uuid=?';
	$sqlParam = [
		$_GET[ '_session' ],
		$_GET[ 'uuid' ]
	];
	$_sqlRet = $bdd->queryOne( $sqlQuery, $sqlParam );
	$nom = $_sqlRet[ 'lastName' ];
	$prenom = $_sqlRet[ 'firstName' ];

	$sqlQuery = 'SELECT data FROM {pre_}satisfaction WHERE ssid=? AND uuid=?';
	$sqlParam = [
		$_GET[ '_session' ],
		$_GET[ 'uuid' ]
	];
	$_sqlRet = $bdd->queryOne( $sqlQuery, $sqlParam );
	$list = json_decode( $_sqlRet[ 'data' ], true );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://projecteur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/projecteur.css" rel="stylesheet" type="text/css">
	<style>
		html, body{
			height: auto;
		}
		body {
			background: #fff !important;
		}
		body:after,
		body::after{
			display: none;
		}
		#content {
			padding-top: 64px;
		}
		table {
			width: 100%;
		}
		table thead tr {
			font-weight: bold;
			background-color: rgba(110, 201, 241, 0.25);
		}
		table tr {
			height: 52px;
			vertical-align: middle;
		}
		table tr:nth-child(even), table td:nth-child(even) {
			background-color: rgba(110, 201, 241, 0.25);
		}
		table td:first-child {
			padding-left: .75rem;
		}
		table td:nth-child(2), table td:nth-child(3) {
			width: 128px;
		}
	</style>
	<style type="text/css" media="print">
		#content {
			padding-top: 0 !important;
		}
		#title{
			width: 100% !important;
		}
		.print{
			display: none;
			visibility: hidden;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Formation au "Change Management"
			</div>
			<div class="col-2 blw print txt-center" onclick="window.print();">
				<i class="material-icons">print</i>
			</div>
		</div>
	</div>
	<div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-5">
				<h3 class="display1 alter-fonce-text"><?php echo $nom . ' ' . $prenom; ?></h3>
			</div>
			<div class="col-1"></div>
			<div class="col-4 alter-sombre-text"></div>
		</div>
		<div style="padding: 0 .75rem .75rem;">
			<h3 class="alter-btn-text">1) Les sujets abordés correspondent-ils à vos attentes ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 0 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 0 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 0 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 0 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">2) Avez-vous le sentiment d'avoir découvert de nouvelles méthodes d'accompagnement du changement ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 1 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 1 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 1 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 1 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">3) Comment estimez-vous l'ambiance de travail (plaisir / apprentissage ) durant cette formation ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 3 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 3 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 3 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 3 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">4) Les animateurs ont-ils maîtrisé leur sujet ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 4 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 4 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 4 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 4 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">5) La durée de la formation était-elle satisfaisante ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 6 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 6 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 6 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 6 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">6) Comment estimez-vous votre compréhension des outils et méthodes à l'issue de cette formation ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 7 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 7 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 7 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 7 ][ 'comm' ] . '</p>'; } ?>


			<h3 class="alter-btn-text">7) Vous sentez-vous capable de réutiliser dans votre quotidien les outils et méthodes vus en formation ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 8 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 8 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 8 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 8 ][ 'comm' ] . '</p>'; } ?>



			<h3 class="alter-btn-text">8) Comment évaluez-vous globalement la formation ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 9 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 9 ][ 'comm' ] . '</p>'; } ?>



			<h3 class="alter-btn-text">9) L’immersion dans l’environnement de Dreamask a-t-elle facilité votre projection dans le monde professionnel ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 9 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 9 ][ 'comm' ] . '</p>'; } ?>



			<h3 class="alter-btn-text">10) Comment évaluez-vous globalement la formation ?</h3>
			<div class="alter-clair white-text txt-right" style="width:<?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%;"><?php echo ( $list[ 9 ][ 'note' ] * 10 ); ?>%</div>
			<?php if( trim( $list[ 9 ][ 'comm' ] ) != '' ) { echo '<p>' . $list[ 9 ][ 'comm' ] . '</p>'; } ?>
		</div>
		<img src="http://commun.alteretgo.my-workflow.fr/alteretgo_formation.svg" alt="" class="center block w256">
	</div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/projecteur.js"></script>
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
			console.log( _msg );
			if ( _msg.cible != 'projo' ) {
				_msg = null;
				return null;
			}

			if ( _msg.msg == 'show' ) {
				window.location = _uri + 'certificat.php?_session=' + _ssid + '&uuid=' + _msg.uuid;
			}

			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		var lcIo;
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
		} );
	</script>
</body>
</html>
