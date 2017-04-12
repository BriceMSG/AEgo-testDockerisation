<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'UPDATE {pre_}apprenant SET lastName=?, firstName=? WHERE ssid=? AND uuid=?';
	$sqlParam = [
		$_POST[ 'lastName' ],
		$_POST[ 'firstName' ],
		$_POST[ 'ssid' ],
		$_POST[ 'uuid' ]
	];

	# Requete
	$bdd->update( $sqlQuery, $sqlParam );
	$_return = new stdClass();
	$_return->status = 'executed';
	header( 'Content-Type: application/json' );
	echo json_encode( $_return );
?>
