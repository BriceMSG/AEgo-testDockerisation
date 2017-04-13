var it_io = 0, io_try = 5;
function checkIo() {
  if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo );
    if ( !hasLocalData( _idQuizz ) ) { recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz }, recovery ); }
    else{ recovery( getLocalData( _idQuizz ) ); }
  }
  else{ it_io++; }
  if ( it_io == io_try ) { clearInterval( lcIo ); $( '#noServ' ).addClass( 'show' ); }
};

function retryIo() {
  $( '#noServ' ).removeClass( 'show' );
  it_io = 0;
  lcIo = setInterval( checkIo, 300 );
}

function recovery ( dataBack ) {
  dataBack = dataBack || {};
  _data = {},
  key = Object.keys( dataBack );
  nbr = key.length;
  for (var i = 0; i < nbr; i++) {
    _data[ key[ i ] ] = dataBack[ key[ i ] ];
  }
  setLocalData( _idQuizz, _data );

  quizz = JSON.parse( localStorage.getItem( _idQuizz ) );

  var _content = $( '#everybody .valign' ),
    _col = 1,
    tmp = Object.keys( datas.apps ),
    j = tmp.length,
    _html = '';

  for (var i = 0; i < j; i++) {
    if ( _col == 5 ) {
      _col = 1;
      _html += '</div>';
    }

    if ( _col == 1) {
      _html += '<div class="row">';
    }

    uQ = quizz[ tmp[ i ] ] || 0;

    _html += '<div class="col-3">';
    _html += '<div id="idTab-' + tmp[ i ] + '" class="selectorApp card' + ( ( uQ != 0 ) ? ' readyToSee' : '' ) + '">';
    _html += '<h4>' + datas.apps[ tmp[ i ] ].prenom + ' ' + datas.apps[ tmp[ i ] ].nom + '</h4>';
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 3 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 3 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/3</span>';
    _html += '</div></div>';

    if ( i == j-1 ) {
      _html += '</div>';
    }

    _col++;
  }
  _content.html( _html );
  $( '#content' ).addClass( 'show' );
};

function callbackMsg( _msg ) {
  _msg = JSON.parse( _msg );
  console.log( _msg );

  if ( _msg.cible != 'former' ) {
    _msg = null;
    return null;
  }
  if ( _msg.msg == 'noeud-papillon-part' ) {
    if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
      quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
    }
    else {
      quizz[ _msg.id ] = 1;
    }

    setLocalData( _idQuizz, quizz );
    _elem = $( '#idTab-' + _msg.id );
    _elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/3' );

  }
  else if ( _msg.msg == 'noeud-papillon' ) {
    datas.apps[ _msg.id ].quizz = _msg;
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '3/3' );
  }
  if ( appSeek !== null && appSeek == _msg.id ) {
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appSeek }, retriveAnswer );
  }
  if( _casting !== false && appSeek == _casting ) {
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz,
      'uuid': appSeek,
      'nom': datas.apps[ appSeek ].nom,
      'prenom': datas.apps[ appSeek ].prenom
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  }
};

function callbackLRSMsg( _msg ) {
  alert( _msg );
};

function retriveAnswer( _answers ) {
  _nbrAnswer = Object.keys( _answers.answer ).length;
  appSeek = _answers.app;
  $( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
  $( 'div[id^=chp] p').html( '' );
  for ( var i = 0; i < _nbrAnswer; i++ ) {
    tmp = JSON.parse( _answers.answer[ i ].data );
    _cbl = $( '#chp' + ( i + 1 ) + ' p' );
    _cbl.html( answers[ ( i + 1 ) ][ tmp.result.response ] );
    if( tmp.result.response == _correct[ ( i + 1 ) ] ){ _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'green-text' ); }
    else if( tmp.result.response == _bof[ ( i + 1 ) ] ){ _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'orange-text' ); }
    else { _cbl.removeClass( 'green-text orange-text red-text' ).addClass( 'red-text' ); }
  }
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};


var lcIo,
  _idQuizz = '0x706170696c',
  datas,
  quizz,
  appSeek = null,
  _correct = {
    '1': 's11',
    '2': 's21',
    '3': 's31'
  },
  _bof = {
    '1': 's12',
    '2': 's22',
    '3': 's32'
  },
  answers = {
    '1': {
      's11':'L’entreprise n’est pas dans ses meilleurs jours. La concurrence nous fait mal, les clients achètent de moins en moins de masques. Le chiffre d’affaires a d’ailleurs  baissé de 15% dans les 6 derniers mois. Nous devons changer pour éviter de mettre la clé sous la porte dans 2 ans.',
      's12':'L’entreprise n’est pas au mieux ces derniers temps. On le voit tous les jours dans nos stats. On n’arrive plus à vendre nos masques, le chiffre d’affaires a baissé de 5,15% l’année dernière, 4,79% il y a 2 ans, 5,04% il y a 3 ans, etc...',
      's13':'On est en difficulté depuis plusieurs mois maintenant. On connaît tous les raisons de cette situation, je ne vais pas revenir dessus. Donc on doit évoluer'
    },
    '2': {
      's21':'C‘est pourquoi plus que jamais, il nous faut ré-enchanter les rêves de demain. Cela signifie un positionnement premium, de nouveaux clients et un nouveau business model. Cette ambition nous la porterons sous le nom de Dreamium. En quoi ça consiste pour notre direction ? Nous devons porter une innovation en rupture qui garantisse l’atteinte de cette ambition. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.',
      's22':'L’entreprise a besoin de changer de stratégie, c’est pourquoi il a été décidé d’adopter un positionnement premium, en ciblant de nouveaux clients et en développant un nouveau business model. En quoi ça consiste pour notre direction ? Nous devons veiller à développer de nouveaux produits premium qui permettent d’atteindre ces nouveaux objectifs. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.',
      's23':'L’entreprise a besoin de changer de stratégie, donc on va tenter un positionnement premium pour toucher de nouveaux clients et développer un nouveau business model. L‘objectif serait de relancer nos ventes de 15% dès l‘année prochaine. En quoi ça consiste pour notre direction ? En tant que production créative, c’est notre travail de sortir des nouveaux produits et de les mettre sur le marché. On attend de nous de développer un produit premium. En parallèle, les autres équipes sont aussi mobilisées : La com travaille sur le plan stratégique et la DSI travaille à la mise en place de nouveaux réseaux.'
    },
    '3': {
      's31':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination. Le nouveau concept le voici : faire rêver de façon unique !<br>Nous allons tout d’abord moderniser nos lignes de production et augmenter notre budget développement. Pour être efficaces nous devons aussi reprioriser nos projets pour ne garder que ceux qui tendent vers le Premium.<br>Je vais avoir besoin de 3 d’entre vous pour travailler sur des innovations en rupture. Je souhaiterais que tout le monde contribue à la réflexion.  Je compte sur vous pour donner le meilleur de vous-même et mobiliser vos équipes, comme vous avez toujours su le faire.',
      's32':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination.<br>Nous allons tout d’abord moderniser nos lignes de production et augmenter notre budget développement. Pour être efficaces nous devons aussi reprioriser nos projets pour ne garder que ceux qui tendent vers le Premium.<br>J’ai déjà des idées à vous proposer sur de nouveaux produits mais vos idées sont les bienvenues. J’ai besoin de 3 d’entre vous sur ce chantier, Séverine, Sébastien, Laura, j’ai pensé à vous, qu’en pensez-vous ?',
      's33':'Pour développer ce nouveau produit, il va nous falloir redoubler d’efforts et d’imagination. Le nouveau concept le voici : faire rêver de façon unique !<br>J’ai déjà des idées à vous proposer mais vos idées sont les bienvenues. J’ai besoin de 3 d’entre vous sur ce chantier, Séverine, Sébastien, Laura, j’ai pensé à vous. Par ailleurs voici l’agenda qui court jusqu’au prochain trimestre et qui détaille les actions à mener. Je compte sur vous.'
    }
  },
  _casting = false;

$( document ).ready( function () {
  lcIo = setInterval( checkIo, 300 );

  datas = getLocalData( 'datas' );

  $( '#everybody' ).on( 'click', '.selectorApp', function( event ) {
    if ( $( this ).hasClass( 'readyToSee' ) === false ) {
      return null;
    }
    appAsk = $( this ).attr( 'id' );
    appAsk = appAsk.replace( 'idTab-', '' );
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appAsk }, retriveAnswer );
  } );

  $( '#prev' ).click( function( event ) {
    event.preventDefault();
    $( '#everybody' ).removeClass( 'hide' );
    $( '#appSelect' ).removeClass( 'show' );
    appSeek = null;
  } );

  $( '#cast' ).click( function( event ) {
    _casting = appSeek;
    event.preventDefault();
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz,
      'uuid': appSeek,
      'nom': datas.apps[ appSeek ].nom,
      'prenom': datas.apps[ appSeek ].prenom
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  } );
} );
