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
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 4 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 4 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/4</span>';
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
  if ( _msg.msg == 'auto-evaluation-part' ) {
    if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
      quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
    }
    else {
      quizz[ _msg.id ] = 1;
    }

    setLocalData( _idQuizz, quizz );
    _elem = $( '#idTab-' + _msg.id );
    _elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/4' );
    _elem.find( 'span' ).html( quizz[ _msg.id ] + '/4' );
  }
  else if ( _msg.msg == 'auto-evaluation' ) {
    datas.apps[ _msg.id ].quizz = _msg;
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '4/4' );
  }
  if ( appSeek !== null && appSeek == _msg.id ) {
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":appAsk }, retriveAnswerOne );
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0xa977516c75', "uuid":appAsk }, retriveAnswerTwo );
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

function retriveAnswerOne( _answers ) {
  console.log( _answers.answer );
  _nbrAnswer = Object.keys( _answers.answer ).length;
  appSeek = _answers.app;
  $( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
  $( '#appSelect .answered').css('width', '50%').html( '' );

  _first = {1:0,2:0,3:0,4:0};
  _tmp = JSON.parse( _answers.answer[ 0 ].data );
  if( _tmp.result.success ) {
    _first[ 1 ] = ( 1 ).toFixed( 2 );
  }

  _sc = 0;
  _tmp = JSON.parse( _answers.answer[ 1 ].data );
  if( _tmp.result.success ) {
    _sc++;
  }
  _tmp = JSON.parse( _answers.answer[ 2 ].data );
  if( _tmp.result.success ) {
    _sc++;
  }
  _first[ 2 ] = ( _sc / 2 ).toFixed( 2 );

  _sc = 0;
  _tmp = JSON.parse( _answers.answer[ 3 ].data );
  if( _tmp.result.success ) {
    _sc++;
  }
  _tmp = JSON.parse( _answers.answer[ 4 ].data );
  if( _tmp.result.success ) {
    _sc++;
  }
  _first[ 3 ] = ( _sc / 2 ).toFixed( 2 );

  _tmp = JSON.parse( _answers.answer[ 5 ].data );
  if( _tmp.result.success ) {
    _first[ 4 ] = ( 1 ).toFixed( 2 );
  }

  $.each( _first, function( index, el ) {
    _val = parseFloat( el ) * 100;
    if( _val < 50 ) { _val = 50; }
    $( '#q' + ( index ) + ' .answered' ).css('width', _val + '%' ).html( _val + '%' );
  } );

  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};

function retriveAnswerTwo( _answers ) {
  console.log( _answers.answer );
  _nbrAnswer = Object.keys( _answers.answer ).length;
  appSeek = _answers.app;
  $( '#appSelect .correctif').css('width', '50%').html( '' );
  _i = 1;
  $.each( _answers.answer, function( index, el ) {
    if( typeof el === 'object' ) {
      el = JSON.parse( el.data );
      _dim = 50;
      if( _i == 1 ) {
        if( el.result.response == 'a01' ) { _dim = 50; }
        if( el.result.response == 'a02' ) { _dim = 75; }
        if( el.result.response == 'a03' ) { _dim = 100; }
      }
      if( _i == 2 ) {
        if( el.result.response == 'b01' ) { _dim = 50; }
        if( el.result.response == 'b02' ) { _dim = 75; }
        if( el.result.response == 'b03' ) { _dim = 100; }
      }
      if( _i == 3 ) {
        if( el.result.response == 'c01' ) { _dim = 50; }
        if( el.result.response == 'c02' ) { _dim = 75; }
        if( el.result.response == 'c03' ) { _dim = 100; }
      }
      if( _i == 4 ) {
        if( el.result.response == 'd01' ) { _dim = 50; }
        if( el.result.response == 'd02' ) { _dim = 75; }
        if( el.result.response == 'd03' ) { _dim = 100; }
      }

      $( '#q' + ( _i ) + ' .correctif' ).css('width', _dim + '%' ).html( _dim + '%' );

      _i++;
    }
  } );
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};


var lcIo,
  _idQuizz = '0xa977516c75',
  datas,
  quizz,
  appSeek = null,
  answers = {
    'a01': 'De 0% à 50%',
    'a02': 'De 50% à 75%',
    'a03': 'De 75% à 100%',
      'b01': 'De 0% à 50%',
      'b02': 'De 50% à 75%',
      'b03': 'De 75% à 100%',
    'c01': 'De 0% à 50%',
    'c02': 'De 50% à 75%',
    'c03': 'De 75% à 100%',
      'd01': 'De 0% à 50%',
      'd02': 'De 50% à 75%',
      'd03': 'De 75% à 100%'
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
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0x6e6e656d65', "uuid":appAsk }, retriveAnswerOne );
    recoverySave( 'getQuizz.php', { "ssid":getLocalData( 'ssid' ), "quizz":'0xa977516c75', "uuid":appAsk }, retriveAnswerTwo );
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
