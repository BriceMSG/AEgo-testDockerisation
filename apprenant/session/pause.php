<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://apprenant.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/apprenant.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-12 title">
				Change Management
			</div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content"></div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div><div class="consigne">
		<h3 class="alter-btn-text display1">Tablette en pause <span id="names"></span></h3>
		<ul>
			<li>Mettez votre tablette en charge sur l'une des prises disponibles.</li>
			<li>Fin de journée, éteignez la tablette via le bouton on/off sur la tranche de la tablette.</li>
		</ul>
	</div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/apprenant.js"></script>
	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); $( '#content' ).addClass( 'show' ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}
		function callbackMsg( _msg ) {
			_msg = JSON.parse( _msg );
			_cibles = [ getLocalData( 'uuid' ), 'apps' ];
			if ( $.inArray( _msg.cible, _cibles ) === -1 ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'grpAttrib' ) {
				setLocalData( 'grp', _msg.data );
				setLocalData( 'grpMember', _msg.member );
			}
			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data, true );
			}
		};

		function callbackLRSMsg( _msg ) {};

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );
			$( '#names' ).html(
				getLocalData( 'nom' ) + ' ' + getLocalData( 'prenom' )
			);
			/*$( '#content' ).addClass( 'show' );*/
		} );
	</script>
</body>
</html>
