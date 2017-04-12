<?php
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
    <div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>
    <script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
    <script type="text/javascript">
        function goto(){
            window.location = "http://projecteur.alteretgo.my-workflow.fr/";
        };
        $( document ).ready( function () {
            $( '#content' ).addClass( 'show' );
            localStorage.clear();
            setTimeout( 'goto()', 1000 );
        } );
    </script>
</body>
</html>
