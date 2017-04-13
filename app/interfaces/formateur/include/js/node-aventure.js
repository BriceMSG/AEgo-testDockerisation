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
    _html += '<div id="idTab-' + tmp[ i ] + '" onclick="void(0)" class="selectorApp card' + ( ( uQ != 0 ) ? ' readyToSee' : '' ) + '">';
    _html += '<h4 class="txt-center">' + datas.apps[ tmp[ i ] ].prenom + ' ' + datas.apps[ tmp[ i ] ].nom + '</h4>';
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 8 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 8 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/8</span>';
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
  if ( _msg.msg == 'modele-aventure-part' ) {
    if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
      quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
    }
    else {
      quizz[ _msg.id ] = 1;
    }

    setLocalData( _idQuizz, quizz );
    _elem = $( '#idTab-' + _msg.id );
    _elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/8' );
  }
  else if ( _msg.msg == 'modele-aventure' ) {
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '8/8' );
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
  $( '#appSelect #apprennantId' )
    .html( '<h4 class="txt-center">' + datas.apps[ appSeek ].nom + ' ' + datas.apps[ appSeek ].prenom + '</h4>' );
  $( '#appSelect img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/aventure/wait.jpg' );
  $( '#appSelect span').removeClass( 'orange-text green-text' ).html( '' );
  for ( var i = 0; i < _nbrAnswer; i++ ) {
    tmp = JSON.parse( _answers.answer[ i ].data );
    cible = $( '#slc' + ( i + 1 ) );
    spl = ( tmp.object.definition.correctResponsesPattern[0] ).split( '[.]' );
    console.log( spl );
    img = spl[ 0 ];
    console.log( img );
    console.log( _srcImg[ img ] );
    correct = spl[ 1 ];
    console.log( correct );
    spl = ( tmp.result.response ).split( '[.]' );
    reponse = spl[ 1 ];
    cible.find( 'img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/aventure/' + _srcImg[ img ] + '.png' );
    if ( correct != reponse ) {
      cible.find( '.answered' ).addClass( 'orange-text' ).html( _srcWrd[ reponse ] );
      cible.find( '.correctif' ).addClass( 'green-text' ).html( _srcWrd[ correct ] );
    }
    else{
      cible.find( '.answered' ).addClass( 'green-text' ).html( _srcWrd[ reponse ] );
    }
  }
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};


var lcIo,
  _idQuizz = '0x6176656e74',
  datas,
  quizz,
  appSeek = null,
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
    "1": "Roi",
    "2": "Magicien",
    "3": "Dragon",
    "4": "Héros",
    "5": "Communauté",
    "6": "Menace",
    "7": "Graal"
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
