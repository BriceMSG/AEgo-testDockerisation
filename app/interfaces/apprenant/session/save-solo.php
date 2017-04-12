<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'INSERT INTO {pre_}quizzs ( ssid, uuid, stamp, quizz, data ) VALUES ( ?, ?, ?, ?, ? )';
	$sqlParam = [
		$_POST[ 'ssid' ],
		$_POST[ 'uuid' ],
		date( 'Y-m-d H:i:s' ),
		$_POST[ 'quizz' ],
		$_POST[ 'data' ]
	];

	# Requete
	$bdd->queryOne( $sqlQuery, $sqlParam );
	$_return = new stdClass();
	$_return->status = 'executed';
	header( 'Content-Type: application/json' );
	echo json_encode( $_return );
?>
