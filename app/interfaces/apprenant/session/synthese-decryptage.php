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
			<div id="title" class="col-9 title">
				Ça réagit chez Armand
			</div>
			<div id="groupe" class="col-3"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
		</div>
	</div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/apprenant.js"></script>

	<script type="text/javascript">
		var it_io = 0, io_try = 5;
		function checkIo() {
			if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo ); $( '#content, #jingle' ).addClass( 'show' ); setTimeout( function() { $( '#jingle' ).css( 'display', 'none' ); }, 3000 ); }
			else{ it_io++; }
			if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
		};

		function retryIo() {
			$( '#noServ' ).removeClass( 'show' );
			it_io = 0;
			lcIo = setInterval( checkIo, 300 );
		}
		function callbackMsg( _msg ) {
			console.log( _msg );
			_msg = JSON.parse( _msg );
			_cibles = [ getLocalData( 'uuid' ), 'apps' ];
			if ( $.inArray( _msg.cible, _cibles ) == -1 ) {
				_msg = null;
				return null;
			}
			if ( _msg.msg == 'goto' ) {
				goTo( _msg.data );
			}
		};
		function callbackLRSMsg( _msg ) {};

		var lcIo,
			selection = {},
			_srcImg = {
				"perso01" :"perso01",
				"perso02" :"perso02",
				"perso03" :"perso03",
				"perso04" :"perso04",
				"perso05" :"perso05",
				"perso06" :"perso06",
				"perso07" :"perso07",
				"perso08" :"perso08"
			},
			_srcWrd = {
				"1": "Militant",
				"2": "Triangle d'Or",
				"3": "Déchiré",
				"4": "Révolté",
				"5": "Hésitant",
				"6": "Opposant",
				"7": "Suiveur",
				"8": "Grognon",
				"9": "Passif"
			};

		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			selection = getLocalData( '0x7279707461' );
			_grp = getLocalData( "grp" );
			$( '#groupe' ).css('background-color', '#' + _grp.color ).html( _grp.name );

			var _content = $( '#content .valign' ),
				_col = 1,
				j = Object.keys( selection ).length,
				_html = '',
				i = 0;
			$.each( selection, function( index, val ) {
				if ( typeof val !== 'object' ) {
					return false;
				}
				if ( _col == 5 ) {
					_col = 1;
					_html += '</div>';
				}
				if ( _col == 1) {
					_html += '<div class="row">';
				}
				_html += '<div class="col-3"><div class="card"><img src="http://commun.alteretgo.my-workflow.fr/decryptage/' + _srcImg[ val.img ] + '.png"><span class="wordSelected">' + _srcWrd[ val.word ] + '</span></div></div>';
				if ( i == j-1 ) {
					_html += '</div>';
				}
				_col++;
				i++;
			} );
			_content.html( _html );
		} );
	</script>
</body>
</html>
