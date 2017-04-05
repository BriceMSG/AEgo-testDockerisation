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
				<h1 class="display2 alter-btn-text txt-center">Certificats</h1>
				<p class="txt-center" style="font-size:1.75rem !important;">Souhaitez-vous imprimer votre récapitulatif ?</p>
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

	$sqlQuery = 'SELECT quizz, score FROM {pre_}results WHERE ssid=? AND uuid=? ORDER BY id ASC';
	$sqlParam = [
		$_GET[ '_session' ],
		$_GET[ 'uuid' ]
	];
	$_sqlRet = $bdd->query( $sqlQuery, $sqlParam );
	$quizzs = [
		'0x5175697a7a' => [
			'name' => 'Quizz',
			'star' => 0.8
		],
		'0x636f757262' => [
			'name' => 'Courbe du changement',
			'star' => 0.75
		],
		'0x706170696c' => [
			'name' => 'Noeud papillon',
			'star' => 1
		],
		'0x616374696f' => [
			'name' => 'Actions managériales',
			'star' => 5
		],
		'0x6e6e656d65' => [
			'name' => 'Actionnement de Séverine',
			'star' => 1
		],
		'0xa977516c75' => [
			'name' => 'Auto évaluation sur l\'actionnement de Séverine',
			'star' => 1
		],
		'0xf736974696' => [
			'name' => 'Gérer l\'opposition',
			'star' => 0.88
		],
		'0x6176656e74' => [
			'name' => 'Modèle de l\'aventure',
			'star' => 1
		],
		'0x66696e616c' => [
			'name' => 'Quizz final',
			'star' => 0.75
		]
	];
	$total = [
		'score' => 0,
		'nbr' => 0
	];
	$stars = 0;
	$list = '<table>
		<thead>
			<tr>
				<td>Nom de l\'exercice</td>
				<td class="txt-center">Score</td>
				<td class="txt-center">Etoile</td>
			</tr>
		</thead>
		<tbody>';
	foreach ( $_sqlRet as $value) {
		$list .= '<tr>
			<td>' . $quizzs[ $value[ 'quizz' ] ][ 'name' ] . '</td>
			<td class="txt-center">';
		if ( $value[ 'quizz' ] == '0x616374696f') {
			$list .= ( $value[ 'score' ] * 100 ) / 5;
			$total[ 'score' ] += $value[ 'score' ] / 5;
		}
		else {
			$list .= $value[ 'score' ] * 100;
			$total[ 'score' ] += $value[ 'score' ];
		}
		$list .= ' %</td>
			<td class="txt-center">';
		if ( $value[ 'score' ] >= $quizzs[ $value[ 'quizz' ] ][ 'star' ] ) {
			$stars++;
			$list .= '<i class="material-icons alter-fonce-text">star</i>';
		}
		$list .= '</td>
		</tr>';
		$total[ 'nbr' ]++;
	}
	$list .= '</tbody></table>';
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
		html, body {
			height: 100%;
			overflow: hidden;
		}
		#title{
			width: 100% !important;
			overflow: hidden;
		}
		.print{
			display: none;
			visibility: hidden;
		}
		.card{
			position: absolute;
			top: 64px;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 99999;
			overflow: hidden;
		}
		table{
			width: 100%;
		}
		tr{width: auto !important;}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Permis de Changer
			</div>
			<div class="col-2 blw print txt-center" onclick="window.print();">
				<i class="material-icons">print</i>
			</div>
		</div>
	</div>
	<div id="content" class="">
		<div class="card block center w768">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<h3 class="display1 alter-fonce-text"><?php echo $nom; ?></h3>
					<h3 class="display1 alter-fonce-text"><?php echo $prenom; ?></h3>
				</div>
				<div class="col-1"></div>
				<div id="star" class="col-4 alter-clair-text" style="font-size: 6rem; line-height: 6rem;">
					<i class="material-icons large left">star</i> <?php echo $stars; ?>
				</div>
			</div>
			<?php echo $list; ?>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-7">
					<p>Félicitations, vous avez terminé la formation.<br>Merci pour votre participation.</p>
				</div>
				<div class="col-4">
					<h3 class="display2 alter-clair-text"><?php echo str_replace( '.', ',', round( ( ( $total[ 'score' ] / $total[ 'nbr' ] ) * 100 ), 2 ) ); ?> %</h3>
				</div>
			</div>
			<img src="http://commun.alteretgo.my-workflow.fr/alteretgo_formation_valide.svg" alt="" class="center block w512">
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
