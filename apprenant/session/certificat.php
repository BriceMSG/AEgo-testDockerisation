<?php
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

	if( $total[ 'nbr' ] == 0 ) { $totalScaled = 0;}
	else { $totalScaled = round( $total[ 'score' ] / $total[ 'nbr' ], 2 ); }
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
	<style>
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
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-7 title">
				Permis de Changer
			</div>
			<div class="col-5 blw" onclick="verifTosend();">
				<i class="material-icons left">sentiment_very_satisfied</i>
				Questionnaire de satisfaction
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="">
		<div class="card block center w768">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<h3 class="display1 alter-fonce-text"><?php echo $nom; ?></h3>
					<h3 class="display1 alter-fonce-text"><?php echo $prenom; ?></h3>
				</div>
				<div class="col-1"></div>
				<div id="star" class="col-3 alter-clair-text" style="font-size: 6rem; line-height: 6rem;">
					<i class="material-icons large left">star</i>
					<?php echo $stars; ?>
				</div>
				<div class="col-1"></div>
			</div>
			<?php echo $list; ?>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-6">
					<p>Félicitations, vous avez terminé la formation.<br>Merci pour votre participation.</p>
				</div>
				<div class="col-1"></div>
				<div class="col-3">
					<h3 class="display2 alter-clair-text"><?php echo str_replace( '.', ',', ( $totalScaled * 100 ) ); ?> %</h3>
				</div>
				<div class="col-1"></div>
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

	<script src="http://commun.alteretgo.my-workflow.fr/apprenant.js"></script>
	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); if ( hasLocalData( 'courseTerminated' ) ) { } else { ended(); } $( '#content, #jingle' ).addClass( 'show' ); setTimeout( function() { $( '#jingle' ).css( 'display', 'none' ); }, 3000 ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}
		function verifTosend () {
			_tmp = getLocalData( 'satisfaction' );
			if( _tmp === true ) {
				notif( 'warning', 'Vous avez déja rempli le questionnaire.', 5 );
				return false;
			}
			else {
				setLocalData( 'pathname', '/session/satisfaction.php' );
				window.location = _uri + 'satisfaction.php?_session=' + _ssid;
			}
		};
		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );
			_cibles = [ getLocalData( 'uuid' ), 'apps' ];
			if ( $.inArray( _msg.cible, _cibles ) === -1 ) {
				_msg = null;
				return null;
			}

			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		function ended () {
			_declaration = _courseInitialization;
			_declaration = _declaration.replace( /__nom__/g, getLocalData( "nom" ) );
			_declaration = _declaration.replace( /__prenom__/g, getLocalData( "prenom" ) );
			_declaration = _declaration.replace( /__uriCourse__/g , formatURICourse() );
			_declaration = _declaration.replace( /__uuidSSID__/g , _uuid );
			_declaration = _declaration.replace( /__courseName__/g , _courseName );
			_declaration = _declaration.replace( /__courseNameDesc__/g , _courseNameDesc );
			_declaration = _declaration.replace( /__scoreQuizz__/g , '<?php echo $totalScaled; ?>' );
			_declaration = _declaration.replace( /__uriCourseFormator__/g , formatURIFormator() );
			_declaration = _declaration.replace( /__uuidFormator__/g , _instructor);
			_declaration = _declaration.replace( /__timeStamp__/g , _dtBegin.toISOString() );
			_declaration = JSON.parse( _declaration );
			tmp = my_lcs.xAPI_Set_Tracking( _declaration );
			setLocalData( 'courseTerminated', 'true' );
		};

		var lcIo,
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
					"id": "http://adlnet.gov/expapi/verbs/terminated",
					"display": {
						"en-US": "terminated"
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
				"result": {
					"score": {
						"scaled" : __scoreQuizz__
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
			lcIo = setInterval( checkIo, 300 );
			_dtBegin = new Date();
			_uuid = getLocalData( "uuid" );
			_instructor = getLocalData( "instructor" );
		} );
	</script>
</body>
</html>
