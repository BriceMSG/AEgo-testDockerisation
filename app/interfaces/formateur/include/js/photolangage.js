var it_io = 0, io_try = 5;
function checkIo() {
  if ( my_lcs.my_io != null && typeof my_lcs.my_io !== 'undefined' ) { clearInterval( lcIo );
    if ( !hasLocalData( _idQuizz ) ) { recoverySave( 'getQuizzGrp.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz }, recovery ); }
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
    tmp = Object.keys( getLocalData( 'grps' ) ),
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
    _html += '<div id="idTab-' + tmp[ i ] + '" onclick="void(0)" class="selectorApp card' + ( ( uQ != 0 ) ? ' readyToSee' : '' ) + '" style="-webkit-box-shadow: 0 0 0 4px #' + grps[ tmp[ i ] ].color + ' inset;box-shadow: 0 0 0 4px #' + grps[ tmp[ i ] ].color + ' inset;">';
    _html += '<h4 class="txt-center">Groupe: ' + grps[ tmp[ i ] ].name + '</h4>';
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 6 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 6 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/6</span>';
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
  if ( _msg.msg == 'photolangage-part' ) {
    if ( quizz[ _msg.id ] != null && typeof quizz[ _msg.id ] !== 'undefined' ) {
      quizz[ _msg.id ] = parseInt( quizz[ _msg.id ] ) + 1;
    }
    else {
      quizz[ _msg.id ] = 1;
    }

    setLocalData( _idQuizz, quizz );
    _elem = $( '#idTab-' + _msg.id );
    _elem.addClass( 'readyToSee' ).find( 'span' ).html( quizz[ _msg.id ] + '/6' );
  }
  else if ( _msg.msg == 'photolangage' ) {
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '6/6' );
  }
  if ( appSeek !== null && appSeek == _msg.id ) {
    recoverySave( 'getQuizzGrp.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appSeek }, retriveAnswer );
  }
  if( _casting !== false && appSeek == _casting ) {
    _msg = {
      'cible': 'projo',
      'msg': 'show',
      'quizz': _idQuizz,
      'uuid': appSeek
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
  appSeek = _answers.grp;
  $( '#appSelect #apprennantId' )
    .attr( 'style', '-webkit-box-shadow: 0 0 0 4px #' + grps[ _answers.grp ].color + ' inset;box-shadow: 0 0 0 4px #' + grps[ _answers.grp ].color + ' inset;')
    .html( '<h4 class="txt-center">Groupe: ' + grps[ _answers.grp ].name + '</h4>' );
  $( '#appSelect img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/photolangage/img-step-wait.jpg' );
  $( '#appSelect span').html( '' );
  for ( var i = 0; i < _nbrAnswer; i++ ) {
    tmp = JSON.parse( _answers.answer[ i ].data );
    tmp = tmp.result.response.split( '[.]' );
    cible = $( '#slc' + ( i + 1 ) );
    cible.find( 'img').attr( 'src', 'http://commun.alteretgo.my-workflow.fr/photolangage/' + _srcImg[ tmp[ 0 ] ] + '.jpg' );
    cible.find( 'span').html( _srcWrd[ tmp[ 1 ] ] );
  }
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};


var lcIo,
  _idQuizz = '0x50686f746f',
  datas,
  quizz,
  appSeek = null,
  grps = {
    "626f686f7274": {
      "name": "A",
      "color": "d2b654"
    },
    "63616c6f6772": {
      "name": "B",
      "color": "106524"
    },
    "63617261646f": {
      "name": "C",
      "color": "950d0d"
    },
    "676175766169": {
      "name": "D",
      "color": "2f4c63"
    },
    "6c656f646167": {
      "name": "E",
      "color": "4cc3a9"
    },
    "706572636576": {
      "name": "F",
      "color": "4297cc"
    }
  },
  _srcImg = {
    "img01" :"img-step-01",
    "img02" :"img-step-02",
    "img03" :"img-step-03",
    "img04" :"img-step-04",
    "img05" :"img-step-05",
    "img06" :"img-step-06",
    "img07" :"img-step-07",
    "img08" :"img-step-08",
    "img09" :"img-step-09",
    "img10" :"img-step-10",
    "img11" :"img-step-11",
    "img12" :"img-step-12",
    "img13" :"img-step-13",
    "img14" :"img-step-14",
    "img15" :"img-step-15",
    "img16" :"img-step-16",
    "img17" :"img-step-17",
    "img18" :"img-step-18",
    "img19" :"img-step-19",
    "img20" :"img-step-20"
  },
  _srcWrd = {
    "word11" :"Action",
    "word12" :"Emotion",
    "word13" :"Aventure",
    "word14" :"Extraordinaire",
    "word21" :"Enthousiasme",
    "word22" :"Rupture",
    "word23" :"Contrainte",
    "word24" :"Opportunité",
    "word31" :"Incontournable",
    "word32" :"Logique",
    "word33" :"Méthode",
    "word34" :"Irrationnel",
    "word41" :"Imposé",
    "word42" :"Inévitable",
    "word43" :"Management",
    "word44" :"Transformation",
    "word51" :"Pérennité",
    "word52" :"Quotidien",
    "word53" :"Difficile",
    "word54" :"Long"
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
    recoverySave( 'getQuizzGrp.php', { "ssid":getLocalData( 'ssid' ), "quizz":_idQuizz, "uuid":appAsk }, retriveAnswer );
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
      'uuid': appSeek
    };
    _msg = JSON.stringify( _msg );
    my_lcs.LCS_sndData( _msg );
  } );
} );
