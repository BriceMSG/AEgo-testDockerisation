<?php
	# Creation acces MySQL
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	if ( isset( $_POST[ 'ssid' ] ) && isset( $_POST[ 'quizz' ] ) ) {
		# Preparation requet
		$sqlQuery = 'SELECT data FROM {pre_}quizzs WHERE ssid=? AND quizz=?';
		$sqlParam = [
			$_POST[ 'ssid' ],
			$_POST[ 'quizz' ]
		];

		# Requete
		$_sqlRet = $bdd->query( $sqlQuery, $sqlParam );
		$_return = $_sqlRet;
		/*echo'<code>';
		var_dump( $_re*turn );
		echo'</code>';*/
		$temp = [];
		foreach ($_return as $key => $value) {
			$tmp = json_decode( $value[ 'data' ] );
			//echo $tmp->result->response . '<br>';
			$temp[ $tmp->result->response ]++;
		}
		$_return = '';
		foreach ($temp as $key => $value) {
			$_return[] = array( 'txt' => $key, 'nbr' => $value );
		}
		shuffle( $_return );
		$_return = (object) $_return;
	}
	elseif ( isset( $_POST[ 'ssid' ] ) ) {
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
	}
	else {
		# Preparation requet
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
