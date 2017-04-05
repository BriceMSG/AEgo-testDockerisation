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
		$content = '<h1 class="title txt-center">Aucune session disponible</h1>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<a href="http://projecteur.alteretgo.my-workflow.fr/session.php?formateur=' . $formateur . '" class="btn alter-btn white-text txt-center block center">
					<i class="material-icons right">autorenew</i>
					Rechercher à nouveau.
				</a>
			</div>
			<div class="col-2"></div>
		</div>';
	}
	else{
		$content = 'Connection session - 0x00000006';
		$ssid = $return[ 'ssid' ];
	}

	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header( 'HTTP/1.0 200 Ok' );
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<base href="http://projecteur.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/projecteur.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	.hide{display:none;}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				<i class="material-icons">https</i>
				Connexion requise
			</div>
		</div>
	</div>
	<div id="content" class="vwrap<?php if( $return === false ) { echo' show'; } ?>">
		<div class="valign">
			<div class="card w512 center block">
				<div id="ok" class="<?php if( $return !== false ) { echo'hide'; } ?>">
					<?php echo $content; ?>
				</div>
				<?php if( $return !== false ) { ?>
				<div id="bug">
					<h1 class="alter-btn-text txt-center">Problèmes détectés</h1>
					<p>Votre navigateur refuse l'enregistrement d'informations nécessaires pour le bon fonctionnement de la formation. Veuillez vérifier les éléments suivants :</p>
					<ul>
						<li>- Votre navigateur ne doit pas être en navigation privé.</li>
						<li>- Votre navigateur doit avoir JavaScript d'activé.</li>
						<li>- Votre navigateur doit autoriser le localStorage.
						<li>- La version de votre navigateur doit être compatible avec le localStorage (<a href="http://caniuse.com/#feat=namevalue-storage">Vérifiez sa présence dans la liste des navigateurs compatibles.</a>)</li>
					</ul>
					<a href="http://projecteur.alteretgo.my-workflow.fr/session.php?formateur=<?php echo $formateur; ?>" class="btn alter-btn white-text txt-center center block">
						<i class="material-icons right">cached</i>Réessayer la connexion
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
<?php if( $return !== false ) { ?>
	<script type="text/javascript">
		function goto(){
			window.location = "http://projecteur.alteretgo.my-workflow.fr/session/index.php?_session=<?php echo $ssid; ?>";
		};
		function hasStorage() {
			try {
				if ( localStorage.getItem( 'ssid' ) === null ) { localStorage.setItem( 'ssid', '<?php echo $ssid; ?>' ); }
				if ( localStorage.getItem( 'pathname' ) === null ) { localStorage.setItem( 'pathname', '/session/index.php' ); }
				setTimeout( 'goto()', 1000 );
			} catch ( e ) {
				$( '#bug' ).removeClass( 'hide' );
				$( '#ok' ).addClass( 'hide' );
			}
		};
		$( document ).ready( function () {
			$( "#bug" ).addClass( "hide" );
			$( "#ok" ).removeClass( "hide" );
			$( "#content" ).addClass( "show" );
			hasStorage();
		} );
	</script>
<?php } ?>
</body>
</html>
