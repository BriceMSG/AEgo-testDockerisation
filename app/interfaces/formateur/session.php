<?php
	require_once( '../mysql.php' );
    $bdd = new Mysql();

    $formateur = $_GET[ 'formateur' ];

	# Preparation requet
	$sqlQuery = 'SELECT ssid FROM {pre_}session WHERE formateur=? AND state=1';
	$sqlParam = [ $formateur ];

	# Requête
	$return = $bdd->queryOne( $sqlQuery, $sqlParam );

	if( $return === false ) {
		$new = true;
		# Création session de formation
		$ssid = uniqid();

		# Preparation requet
		$sqlQuery = 'INSERT INTO {pre_}session ( ssid, formateur ) VALUES ( ?, ? )';
		$sqlParam = [ $ssid, $formateur ];

		# Requête
		$bdd->queryOne( $sqlQuery, $sqlParam );
	}
	else{
		$new = false;
		$ssid = $return[ 'ssid' ];
	}

	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header( 'HTTP/1.0 200 Ok' );
?>
<?php
	include '../include/head.inc.php';
?>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				<i class="material-icons">https</i>
				Connexion requise
			</div>
		</div>
	</div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w512 center block">
				<div id="ok" class="hide">
					Creation and connection session - 0x00000006
				</div>
				<div id="bug">
					<h1 class="alter-btn-text txt-center">Problèmes détectés</h1>
					<p>Votre navigateur refuse l'enregistrement d'informations nécessaires pour le bon fonctionnement de la formation. Veuillez vérifier les éléments suivants :</p>
					<ul>
						<li>- Votre navigateur ne doit pas être en navigation privé.</li>
						<li>- Votre navigateur doit avoir JavaScript d'activé.</li>
						<li>- Votre navigateur doit autoriser le localStorage.
						<li>- La version de votre navigateur doit être compatible avec le localStorage (<a href="http://caniuse.com/#feat=namevalue-storage">Vérifiez sa présence dans la liste des navigateurs compatibles.</a>)</li>
					</ul>
					<a href="http://formateur.alteretgo.my-workflow.fr/join.php?uuid=<?php echo $formateur; ?>" class="btn alter-btn white-text txt-center center block">
						<i class="material-icons right">cached</i>Réessayer la connexion
					</a>
				</div>
			</div>
		</div>
	</div>

	<?php
		include '../include/screenRotation.inc.php';
	?>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript">
		function goto(){
			<?php
				if( $new ) {
					echo'window.location = "http://formateur.alteretgo.my-workflow.fr/session/index.php?_session=' . $ssid . '";';
				}
				else{
					echo'window.location = "http://formateur.alteretgo.my-workflow.fr/session/pause.php?_session=' . $ssid . '";';
				}
			?>
		};
		function hasStorage() {
			try {
				<?php
					if( $new ) { ?>
						localStorage.setItem( "ssid", "<?php echo $ssid; ?>" );
						localStorage.setItem( "instructor", "<?php echo $formateur; ?>" );
						localStorage.setItem( "datas", '{"apps":{}}' );
						localStorage.setItem( "pathname", "/session/index.php" );
						setTimeout( "goto()", 1000 );
					<?php }
					else{ ?>
						if ( localStorage.getItem( "ssid" ) === null ) { localStorage.setItem( "ssid", "<?php echo $ssid; ?>" ); }
						if ( localStorage.getItem( "instructor" ) === null ) { localStorage.setItem( "instructor", "<?php echo $formateur; ?>" ); }
						localStorage.setItem( "pathname", "/session/pause.php" );
						setTimeout( "goto()", 1000 );
					<?php }
				?>
			} catch ( e ) {
				$( '#bug' ).removeClass( 'hide' );
				$( '#ok' ).addClass( 'hide' );
			}
		};
		$( document ).ready( function () {
			$( '#bug' ).addClass( 'hide' );
			$( '#ok' ).removeClass( 'hide' );
			$( '#content' ).addClass( 'show' );
			hasStorage();
		} );
	</script>
</body>
</html>
