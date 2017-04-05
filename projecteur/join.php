<?php
    header( 'HTTP/1.0 200 Ok' );
    header( 'Location: http://projecteur.alteretgo.my-workflow.fr/session.php?formateur=' . $_GET[ 'uuid' ] );
?>
