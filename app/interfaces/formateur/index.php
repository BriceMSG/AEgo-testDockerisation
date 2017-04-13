<!DOCTYPE html>
<html>
<?php
	include './include/head.inc.php';
?>
<body>
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
			<form action="login.php" method="post" autocomplete="off" id="identification" class="w512 card center txt-left">
				<div>
					<h1 class="title txt-center">Connectez-vous</h1>
				</div>
				<div class="inputField" data-iconValide="done" data-iconRequired="block">
					<label for="identifiant"><i class="material-icons left">email</i>E-mail</label>
					<input type="email" required id="identifiant" name="identifiant">
				</div>
				<div class="inputField" data-iconValide="done" data-iconRequired="block">
					<label for="motdepasse"><i class="material-icons left">vpn_key</i>Mot de passe</label>
					<input type="password" required id="motdepasse" name="motdepasse">
				</div>
				<div class="row">
					<div class="col-5 inputField" data-iconValide="done" data-iconRequired="block">
						<button type="reset" class="btn">
							<i class="material-icons right">clear_all</i>
							Effacer
						</button>
					</div>
					<div class="col-7 inputField" data-iconValide="done" data-iconRequired="block">
						<button type="submit" class="btn">
							<i class="material-icons right">send</i>
							Connexion
						</button>
					</div>
				</div>
				<div>
					<p class="txt-center italic red-text">Tous les champs sont requis</p>
				</div>
			</form>
		</div>
	</div>

	<?php
		include './include/notification.inc.php';
		include './include/screenRotation.inc.php';
	?>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>-->

	<!--<script src="http://commun.alteretgo.my-workflow.fr/formateur.js"></script>-->
	<script type="text/javascript">
		$( document ).ready( function () {
			$( '#content' ).addClass( 'show' );
			//alert( navigator.appVersion );
		} );
	</script>
</body>
</html>
