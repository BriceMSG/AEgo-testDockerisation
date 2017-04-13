<?php
if($_extra_button != '') $nb_col = 5;
else $nb_col = 8;
?>
<div id="header">
  <div class="row">
    <div class="col-2 brw" onclick="toggleMenu();">
      <i class="material-icons left">menu</i>
    </div>
    <div id="title" class="col-<?php echo $nb_col;?> title">
      <?php echo $_menu_title;?>
    </div>
    <?php echo $_extra_button;?>
    <div class="col-2 blw" onclick="testDebit.begin();">
      <i class="material-icons right">network_check</i>
      <span id="checkNetwork" class="right">Tester le débit</span>
      <span id="networkSpeed" class="right" style="display:none;">Test en cours</span>
    </div>
  </div>
</div>
