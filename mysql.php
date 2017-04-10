<?php
class Mysql{

	# Stock la connexion à la bdd
	private $bdd;

	# Parametres de la bdd
	private $bddHost = 'localhost';
	private $bddName = 'alteretgo';
	private $bddPassword = 'root';
	private $bddPrefixe = 'chg_man_';
	private $bddUser = '';

	private $sql;

	public function __construct() {

		try {
			$this->bdd = new PDO( 'mysql:host=' . $this->bddHost . ';dbname=' . $this->bddName, $this->bddUser, $this->bddPassword );
			$this->bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch( PDOException $e ) {
			echo'<pre>';
			var_dump($e);
			echo'</pre>';
			die( 'Unable to connect to database' );
		}
		catch( Exception $e ) {
			die( 'An unknown error occurred' );
		}
	}

	public function lastID() {
		try{
			$result = $this->bdd->lastInsertId();
		}
		catch( PDOException $e ) {
			die( 'Unable to query lastId' );
		}
		catch( Exception $e ) {
			die( 'An unknown error occurred' );
		}
		return $result;
	}

	private function prefixed( $sql ){
		return str_replace('{pre_}', $this->bddPrefixe, $sql);
	}

	public function queryOne( $querySQL, $params = [] ) {
		try {
			$sql = $this->bdd->prepare( $this->prefixed( $querySQL ) );
			$sql->execute( $params );
			if ( !preg_match( '#INSERT(.*)#', $querySQL ) ) {
				$results = $sql->fetch( PDO::FETCH_ASSOC );
			}
			$sql->closeCursor();
		}
		catch( PDOException $e ) {
			echo'<pre><code>';
			var_dump( $e );
			echo'</code></pre>';
			die( 'Unable to execute the query' );
		}
		catch( Exception $e ) {
			die( 'An unknown error occurred' );
		}
		return $results;
	}

	public function query( $querySQL, $params = [] ) {
		try {
			$sql = $this->bdd->prepare( $this->prefixed( $querySQL ) );
			$sql->execute( $params );
			if ( !preg_match( '#INSERT(.*)#', $querySQL ) ) {
				$results = $sql->fetchAll( PDO::FETCH_ASSOC );
			}
			$sql->closeCursor();
		}
		catch( PDOException $e ) {
			die( 'Unable to execute those query' . $e->GetMessage() );
		}
		catch( Exception $e ) {
			die( 'An unknown error occurred' );
		}
		return $results;
	}

	public function update( $querySQL, $params = [] ) {
		try {
			$sql = $this->bdd->prepare( $this->prefixed( $querySQL ) );
			$sql->execute( $params );
			//$sql->closeCursor();
		}
		catch( PDOException $e ) {
			var_dump( $querySQL );
			var_dump( $params );
			var_dump( $e );
			die( 'Unable to execute the update' );
		}
		catch( Exception $e ) {
			die( 'An unknown error occurred' );
		}
	}

	public function __destruct() {
		# Fermeture de la connexion
		$this->bdd = null;
	}
}
?>
