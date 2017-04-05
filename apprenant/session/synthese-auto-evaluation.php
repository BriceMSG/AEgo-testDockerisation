<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Change Management | Alter&Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<base href="http://apprenant.alteretgo.my-workflow.fr/">

	<link href="http://commun.alteretgo.my-workflow.fr/normalize.css" rel="stylesheet" type="text/css">
	<link href="http://commun.alteretgo.my-workflow.fr/apprenant.css" rel="stylesheet" type="text/css">
	<style>
		div[id^=q] {
			margin-bottom: .75rem;
		}
		div[id^=q] div {
			display: block;
			height: 2rem;
			line-height: 2rem;
			text-align: right;
			padding-right: 1.5rem;
			color: #fff;
		}
		.answer {
			background-color: #507c9a;
		}
		.correctif {
			background-color: #6ec9f1;
		}
		span.answer,
		span.correctif {
			display: inline-block;
			vertical-align: middle;
			width: 1rem;
			height: 1rem;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="title" class="col-10 title">
				Auto-évaluation
			</div>
			<div id="star" class="col-2 blw txt-center"></div>
		</div>
	</div>
	<div id="noServ"><div class="vwrap"><div class="valign"><p>Le serveur de communication ne répond pas.</p><a href="#" class="btn alter-btn white-text txt-center block center" onclick="retryIo();return false;" style="width: 30%;"><i class="material-icons right">autorenew</i> Relancer la connexion.</a></div></div></div>
	<div id="content" class="vwrap">
		<div class="valign">
			<div class="card w768 block center synteseQuizz">
				<div id="q1">
					<h3 class="alter-btn-text">Synchronisation</h3>
					<div class="answer"></div><div class="correctif"></div>
				</div>
				<div id="q2">
					<h3 class="alter-btn-text">Ecoute active</h3>
					<div class="answer"></div><div class="correctif"></div>
				</div>
				<div id="q3">
					<h3 class="alter-btn-text">Recherche commune</h3>
					<div class="answer"></div><div class="correctif"></div>
				</div>
				<div id="q4">
					<h3 class="alter-btn-text">Bouclage</h3>
					<div class="answer"></div><div class="correctif"></div>
				</div>
				<hr>
				<div class="row">
					<div class="col-6">
						<span class="answer"></span> Actionnement de Séverine
					</div>
					<div class="col-6">
						<span class="correctif"></span> Auto-évaluation
					</div>
				</div>
				<div id="comment"></div>
			</div>
		</div>
	</div>
	<div id="notif" class=""></div>
	<div id="jingle" class=""><div class="masque"></div></div>
	<div id="forceLandscape"><div class="valign"><i class="material-icons">screen_rotation</i> Veuillez mettre la tablette à l'horizontale.</div></div>

	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/jquery.min.js"></script>
	<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/socket.io-1.2.0.js"></script>

	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs.js"></script>-->
	<!--<script type="text/javascript" src="http://commun.alteretgo.my-workflow.fr/js/gaia_lcs_func.js"></script>-->

	<script src="http://commun.alteretgo.my-workflow.fr/apprenant.js"></script>
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
			_star = '',
			_comm = '',
			_txt = '';
		$( document ).ready( function () {
			lcIo = setInterval( checkIo, 300 );

			selection = getLocalData( '0x6e6e656d65' );
			_first = {1:0,2:0,3:0,4:0};
			if( selection[ 2 ][ '_reponses' ] == selection[ 2 ][ '_correctAnswer' ] ) {
				_first[ 1 ] = ( 1 ).toFixed( 2 );
			}

			_sc = 0;
			if( selection[ 3 ][ '_reponses' ] == selection[ 3 ][ '_correctAnswer' ] ) {
				_sc++;
			}
			if( selection[ 4 ][ '_reponses' ] == selection[ 4 ][ '_correctAnswer' ] ) {
				_sc++;
			}
			_first[ 2 ] = ( _sc / 2 ).toFixed( 2 );

			_sc = 0;
			if( selection[ 5 ][ '_reponses' ] == selection[ 5 ][ '_correctAnswer' ] ) {
				_sc++;
			}
			if( selection[ 6 ][ '_reponses' ] == selection[ 6 ][ '_correctAnswer' ] ) {
				_sc++;
			}
			_first[ 3 ] = ( _sc / 2 ).toFixed( 2 );

			if( selection[ 7 ][ '_reponses' ] == selection[ 7 ][ '_correctAnswer' ] ) {
				_first[ 4 ] = ( 1 ).toFixed( 2 );
			}

			if( parseFloat( selection.score ) == 1 ) {
				_stars = getLocalData( 'stars' );
				_star += '<i class="material-icons">star</i>';
				_comm += 'Félicitations, vous avez actionné Séverine avec succès !';
				_txt += '<i class="material-icons left">star</i> Félicitations, vous avez actionné Séverine avec succès !<br>Vous gagnez une étoile.';
				if( typeof _stars[ '0x6e6e656d65' ] === "undefined" ) { addStar( '0x6e6e656d65' ); }
			}

			$.each( _first, function( index, el ) {
				_val = parseFloat( el ) * 100;
				if( _val < 50 ) { _val = 50; }
				$( '#q' + ( index ) + ' .answer' ).css('width', _val + '%' ).html( _val + '%' );
			} );

			selection = getLocalData( '0xa977516c75' );

			for (var i = 0; i < selection.nbr; i++) {
				_dim = 50;
				if( i == 0 ) {
					if( selection[ i ][ '_reponses' ] == 'a01' ) { _dim = 50; }
					if( selection[ i ][ '_reponses' ] == 'a02' ) { _dim = 75; }
					if( selection[ i ][ '_reponses' ] == 'a03' ) { _dim = 100; }
				}
				if( i == 1 ) {
					if( selection[ i ][ '_reponses' ] == 'b01' ) { _dim = 50; }
					if( selection[ i ][ '_reponses' ] == 'b02' ) { _dim = 75; }
					if( selection[ i ][ '_reponses' ] == 'b03' ) { _dim = 100; }
				}
				if( i == 2 ) {
					if( selection[ i ][ '_reponses' ] == 'c01' ) { _dim = 50; }
					if( selection[ i ][ '_reponses' ] == 'c02' ) { _dim = 75; }
					if( selection[ i ][ '_reponses' ] == 'c03' ) { _dim = 100; }
				}
				if( i == 3 ) {
					if( selection[ i ][ '_reponses' ] == 'd01' ) { _dim = 50; }
					if( selection[ i ][ '_reponses' ] == 'd02' ) { _dim = 75; }
					if( selection[ i ][ '_reponses' ] == 'd03' ) { _dim = 100; }
				}

				$( '#q' + ( i + 1 ) + ' .correctif' ).css('width', _dim + '%' ).html( _dim + '%' );
			};

			if( parseFloat( selection.score ) == 1 ) {
				_stars = getLocalData( 'stars' );
				_star += '<i class="material-icons">star</i>';
				if( _comm != '' ){ _comm += '<br>'; }
				_comm += 'Félicitations, vous avez bien évalué votre actionnement !';
				if( _txt != '' ){ _txt += '<br>'; }
				_txt += '<i class="material-icons left">star</i> Félicitations, vous avez bien évalué votre actionnement !<br>Vous gagnez une étoile.';
				if( typeof _stars[ '0xa976616c75' ] === "undefined" ) { addStar( '0xa976616c75' ); }
			}

			if ( _txt != '' ) {
				$( '#star' ).html( _star );
				$( '#comment' ).html( _comm ).addClass( 'visible' );
				notif( 'valid', _txt, 8 );
			}
		} );
	</script>
</body>
</html>
