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

  appsNbr = j;

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
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 5 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 5 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/5</span>';
    _html += '</div></div>';

    if ( uQ == 5 ) {
      appsNbr--;
    }

    if ( i == j-1 ) {
      _html += '</div>';
    }
    _col++;
  }
  _content.html( _html );
  $( '#content' ).addClass( 'show' );
  if ( appsNbr == 0 ) {
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  }
};

function callbackMsg( _msg ) {
  _msg = JSON.parse( _msg );
  console.log( _msg );

  if ( _msg.cible != 'former' ) {
    _msg = null;
    return null;
  }
  if ( _msg.msg == 'nuage-mots-part' ) {
    if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
      quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
    }
    else {
      quizz[ _msg.id ] = 1;
    }

    setLocalData( _idQuizz, quizz );
    _elem = $( '#idTab-' + _msg.id );
    _elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/5' );
  }
  else if ( _msg.msg == 'nuage-mots' ) {
    datas.apps[ _msg.id ].quizz = _msg;
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '5/5' );
    appsNbr--;
  }
  if ( appSeek !== null && appSeek == _msg.id ) {
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appSeek }, retriveAnswer );
  }
  if ( appsNbr == 0 ) {
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  }
};

function callbackLRSMsg( _msg ) {
  alert( _msg );
};

function retriveAnswer( _answers ) {
  console.log( _answers );
  _nbrAnswer = Object.keys( _answers.answer ).length;
  appSeek = _answers.app;
  $( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
  $( '#appSelect span').removeClass('orange-text green-text').html( '' );
  for ( var i = 0; i < _nbrAnswer; i++ ) {
    tmp = JSON.parse( _answers.answer[ i ].data );
    console.log( tmp );
    cible = $( '#perso' + ( i + 1 ) );
    console.log( i + 1 );
    cible.find( '.answer' ).html( tmp.result.response );
  }
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};

var lcIo,
  _idQuizz = '0x269616c657',
  datas,
  quizz,
  appSeek = null,
  appsNbr = null;

$( document ).ready( function () {
  lcIo = setInterval( checkIo, 300 );

  datas = getLocalData( 'datas' );

  if ( appsNbr === null ) {
    appsNbr = Object.keys( datas.apps ).length;
  }

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

  $( '#projoNow' ).click( function( event ) {
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  } );
} );
