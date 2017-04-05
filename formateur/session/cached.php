<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	if ( isset( $_POST[ 'quizz' ] ) ) {
		$sqlQuery = 'SELECT uuid, COUNT(id) AS nbr FROM {pre_}quizzs WHERE ssid=? AND quizz=? GROUP BY uuid';
		$sqlParam = [
			$_POST[ 'ssid' ],
			$_POST[ 'quizz' ]
		];

		# Requete
		$_sqlRet = $bdd->query( $sqlQuery, $sqlParam );
		$_return = [];

		# Mise en forme
		foreach( $_sqlRet as $v ) {
			$_return[ $v[ 'uuid' ] ] = $v[ 'nbr' ];
		}
		$_return = (object) $_return;
	}

	header( 'Content-Type: application/json' );
	echo json_encode( $_return );
?>
