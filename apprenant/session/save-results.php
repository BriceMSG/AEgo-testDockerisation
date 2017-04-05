<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'INSERT INTO {pre_}results ( ssid, uuid, quizz, duration, score ) VALUES ( ?, ?, ?, ?, ? )';
	$sqlParam = [
		$_POST[ 'ssid' ],
		$_POST[ 'uuid' ],
		$_POST[ 'quizz' ],
		$_POST[ 'duration' ],
		$_POST[ 'score' ]
	];

	# Requete
	$bdd->queryOne( $sqlQuery, $sqlParam );
	$_return = new stdClass();
	$_return->status = 'executed';
	header( 'Content-Type: application/json' );
	echo json_encode( $_return );
?>
