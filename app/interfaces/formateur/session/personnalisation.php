<?php
	include '../include/head.inc.php';
	$_menu_title = "Personnalisation des tablettes";
	$_extra_button = '';
	include '../include/topMenu.inc.php';
	include '../include/noServ.inc.php';
?>
	<div id="content">
		<div id="menu"></div>
		<div id="everybody">
			<div class="vwrap">
				<div class="valign">
				</div>
			</div>
		</div>
	</div>

	<?php
		include '../include/notification.inc.php';
		include '../include/screenRotation.inc.php';
		include '../include/jsScripts.inc.php';
	?>

</body>
</html>
