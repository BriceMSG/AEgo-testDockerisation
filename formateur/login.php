<?php
	require_once( '../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'SELECT uuid, mdp, lvl FROM {pre_}formateurs WHERE mail=? AND actif=1';
	$sqlParam = [ $_POST[ 'identifiant' ] ];

	# Requête
	$return = $bdd->queryOne( $sqlQuery, $sqlParam );

	# Pas de retour d'enregistrement
	if( $return == false ) {
		header( 'HTTP/1.0 403 Forbidden' );
		header( 'Location: http://formateur.alteretgo.my-workflow.fr/' );
		die( 'Connection refused - 0x00000001' );
	}

	# Enregistrement retourner
	# Mot de passe ne correspondent pas
	if( !password_verify( $_POST[ 'motdepasse' ], $return[ 'mdp' ] ) ) {
		header( 'HTTP/1.0 403 Forbidden' );
		header( 'Location: http://formateur.alteretgo.my-workflow.fr/' );
		die( 'Connection refused - 0x00000002' );
	}

	# Couple "identifiant / Mot de passe" autoriser
	# Envoie vers detection session en cours
    header( 'HTTP/1.0 200 Ok' );
    header( 'Location: http://formateur.alteretgo.my-workflow.fr/session.php?formateur=' . $return[ 'uuid' ] );
?>
