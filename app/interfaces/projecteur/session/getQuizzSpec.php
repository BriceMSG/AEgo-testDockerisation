<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

		# Preparation requet
		$sqlQuery = 'SELECT data FROM {pre_}quizzs WHERE ssid=? AND quizz=? AND uuid=?';
		$sqlParam = [
			$_POST[ 'ssid' ],
			$_POST[ 'quizz' ],
			$_POST[ 'uuid' ]
		];

		# Requete
		$_sqlRet = $bdd->query( $sqlQuery, $sqlParam );
		$_return = [
			'app' => $_POST[ 'uuid' ],
			'answer' => $_sqlRet
		];
		$_return = (object) $_return;

	header( 'Content-Type: application/json' );
	echo json_encode( $_return );
?>
