<?php
	# Creation acces MySQL
	require_once( '../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'UPDATE {pre_}session SET state=0 WHERE formateur=? AND state=1';
	$sqlParam = [
		$_GET[ 'formateur' ]
	];

	# Requete
	$bdd->update( $sqlQuery, $sqlParam );
	# Jonction d'une session en cours
	header( 'HTTP/1.0 200 Ok' );
	header( 'Location: http://formateur.alteretgo.my-workflow.fr/' );
	die( 'Connection session - 0x00000007' );
?>
