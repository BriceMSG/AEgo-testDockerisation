<?php
	require_once( '../../mysql.php' );
	$bdd = new Mysql();

	# Preparation requet
	$sqlQuery = 'UPDATE {pre_}session SET state=0 WHERE formateur=? AND state=1';
	$sqlParam = [ $_GET[ 'formateur' ] ];

	# Requête
	$bdd->update( $sqlQuery, $sqlParam );

	header('Cache-Control: no-cache');
	header('Pragma: no-cache');
	header( 'HTTP/1.0 200 Ok' );
?>
<!DOCTYPE html>
<html>
<?php
	include '../include/head.inc.php';
?>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				<i class="material-icons">https</i>
				Déconnexion en cours
			</div>
		</div>
	</div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w512 center block">
				Disconnect session - 0x00000006
			</div>
		</div>
	</div>
	<?php
		include '../include/screenRotation.inc.php';
	?>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript">
		function goto(){
			window.location = "http://formateur.alteretgo.my-workflow.fr/";
		};
		$( document ).ready( function () {
			$( '#content' ).addClass( 'show' );
			localStorage.clear();
			setTimeout( 'goto()', 1000 );
		} );
	</script>
</body>
</html>
