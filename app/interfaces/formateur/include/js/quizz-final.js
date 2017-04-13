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
    _html += '<i class="material-icons txt-center center block ' + ( ( uQ == 5 ) ? 'green-text': 'amber-text' ) + '">' + ( ( uQ == 5 ) ? 'check_circle': 'hourglass_full' ) + '</i>';
    _html += '<span class="txt-center block">' + uQ + '/5</span>';
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
  if ( _msg.msg == 'quizz-final-part' ) {
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
  else if ( _msg.msg == 'quizz-final' ) {
    datas.apps[ _msg.id ].quizz = _msg;
    localStorage.setItem( 'datas', JSON.stringify( datas ) );
    _elem = $( '#idTab-' + _msg.id );
    _elem.find( 'i.material-icons' ).html( 'check_circle' ).removeClass( 'amber-text' ).addClass( 'green-text' );
    _elem.find( 'span' ).html( '5/5' );
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
  _html = '';
  $( '#appSelect #apprennantId' ).html( '<h4>' + datas.apps[ _answers.app ].nom + ' ' + datas.apps[ _answers.app ].prenom + '</h4>' );
  $( '.quizzFinal input')
    .prop( 'checked', false )
    .prop( 'disabled', true )
    .next( 'label' )
    .removeClass( 'orange-text green-text' );
  for ( var i = 0; i < _nbrAnswer; i++ ) {
    tmp = JSON.parse( _answers.answer[ i ].data );
    _correctResponsesPattern = tmp.object.definition.correctResponsesPattern[0].split( '[,]' );
    _responses = tmp.result.response.split( '[,]' );
    for ( var j = 0; j < _responses.length; j++ ) {
      _tmp = _correctResponsesPattern[ j ].split( '[.]' );
      _ba = _tmp[ 1 ];
      _tmp = _responses[ j ].split( '[.]' );
      _ma = _tmp[ 1 ];
      if( _ba == _ma ) {
        $( '#' + _ma )
          .prop( 'checked', false )
          .next( 'label' )
          .addClass( 'green-text' );
      }
      else {
        $( '#' + _ba )
          .prop( 'checked', false )
          .next( 'label' )
          .addClass( 'green-text' );
        $( '#' + _ma )
          .prop( 'checked', false )
          .next( 'label' )
          .addClass( 'orange-text' );
      }
    }
  }
  $( '#everybody' ).addClass( 'hide' );
  $( '#appSelect' ).addClass( 'show' );
};

var lcIo,
  _idQuizz = '0x66696e616c',
  datas,
  quizz,
  appSeek = null,
  _casting = false,
  _questions = {
    "qz1": "Solution proposée",
    "qz27": "Ambition",
    "qz2": "Contexte",
    "qz3": "Piste de travail ouvert",
    "qz28": "Conviction",
    "qz4": "Constat",
    "qz5": "Calendrier de travail",
    "qz6": "Menace",
    "qz29": "Vision",
    "qz7": "Commande",
    "qz8": "Toute action a une valeur",
    "qz9": "Pouvoir dire oui ou non",
    "qz10": "Partager son engagement",
    "qz11": "Qu’en pensez-vous…",
    "qz12": "J’aimerais vous parler de…",
    "qz13": "Qui fait quoi ?",
    "qz14": "Que proposez-vous pour faire avancer ce projet ?",
    "qz15": "En quoi consiste la technique du chevalier blanc ?",
    "qz16": "Qu’est-ce qu’un triangle d’or ?",
    "qz17": "Un intrus s’est glissé dans ces profils types, lequel ?",
    "qz18": "Un intrus s’est glissé dans les principes de l’animation collective durable, lequel ?",
    "qz19": "Un intrus s’est glissé dans les questions à avoir en tête pour évaluer la synergie des acteurs, lequel ?",
    "qz20": "Un intrus s’est glissé dans les 3 règles d’or de la gestion de l’opposition, lequel ?",
    "qz21": "Les alliés s’expriment peu ou de façon désorganisée.",
    "qz22": "Les hésitants sont souvent les moins nombreux au démarrage.",
    "qz23": "Les opposants sont mieux organisés et ne s’expriment que très rarement.",
    "qz24": "Il est important de laisser l’opportunité aux opposants de rejoindre le projet.",
    "qz25": "Il convient de soutenir et valoriser l’action des opposants.",
    "qz26": "Il est nécessaire de favoriser la communication entre les alliés et les opposants."
  },
  _reponses = {
    1: {
      'qz11': 'Pourquoi', 'qz12': 'Quoi', 'qz13': 'Comment',
        'qz271': 'Pourquoi', 'qz272': 'Quoi', 'qz273': 'Comment',
      'qz21': 'Pourquoi', 'qz22': 'Quoi', 'qz23': 'Comment',
        'qz31': 'Pourquoi', 'qz32': 'Quoi', 'qz33': 'Comment',
      'qz281': 'Pourquoi', 'qz282': 'Quoi', 'qz283': 'Comment',
        'qz41': 'Pourquoi', 'qz42': 'Quoi', 'qz43': 'Comment',
      'qz51': 'Pourquoi', 'qz52': 'Quoi', 'qz53': 'Comment',
        'qz61': 'Pourquoi', 'qz62': 'Quoi', 'qz63': 'Comment',
      'qz291': 'Pourquoi', 'qz292': 'Quoi', 'qz293': 'Comment',
        'qz71': 'Pourquoi', 'qz72': 'Quoi', 'qz73': 'Comment'
    },
    2: {
      'qz81': 'Liberté', 'qz82': 'Coût', 'qz83': 'Prise de décision',
        'qz91': 'Liberté', 'qz92': 'Coût', 'qz93': 'Prise de décision',
      'qz101': 'Liberté', 'qz102': 'Coût', 'qz103': 'Prise de décision'
    },
    3: {
      'qz111': 'Liberté', 'qz112': 'Coût', 'qz113': 'Prise de décision', 'qz114': 'Prise de décision',
        'qz121': 'Liberté', 'qz122': 'Coût', 'qz123': 'Prise de décision', 'qz124': 'Prise de décision',
      'qz131': 'Liberté', 'qz132': 'Coût', 'qz133': 'Prise de décision', 'qz134': 'Prise de décision',
      'qz141': 'Liberté', 'qz142': 'Coût', 'qz143': 'Prise de décision', 'qz144': 'Prise de décision'
    },
    4: {
      'qz151': 'Faire comme si on n’avait pas entendu la question', 'qz152': 'Faire intervenir les alliés', 'qz153': 'Répondre à une question par une question', 'qz154': 'Secourir les opprimés et rétablir le bon droit',
        'qz161': 'Un acteur constructif sur lequel s’appuyer pour faire avancer un projet', 'qz162': 'Un groupe d’opposants organisé contre un projet', 'qz163': 'Un triangle à la fois isocèle rectangle et équilatéral',
      'qz171': 'Grognon', 'qz172': 'Suiveur', 'qz173': 'Réactif', 'qz174': 'Militant',
        'qz181': 'Ambition', 'qz182': 'Synchronisation', 'qz183': 'Rythme', 'qz184': 'Responsabilisation',
      'qz191': 'Agit-il en faveur du projet', 'qz192': 'Prend-il des initiatives ?', 'qz193': 'Exerce-t-il une influence sur les autres acteurs ?', 'qz194': 'Prend-il des initiatives dans un intérêt collectif, altruiste ?',
        'qz201': 'Ne jamais laisser l’attaque d’un opposant sans réponse', 'qz202': 'Ne jamais  répondre à une attaque en se justifiant sur le fond', 'qz203': 'Ne jamais prendre les attaques pour soi', 'qz204': 'Ne jamais reformuler les propos d’un opposant'
    },
    5: {
      'qz211': 'Vrai', 'qz212': 'Faux',
        'qz221': 'Vrai', 'qz222': 'Faux',
      'qz231': 'Vrai', 'qz232': 'Faux',
        'qz241': 'Vrai', 'qz242': 'Faux',
      'qz251': 'Vrai', 'qz252': 'Faux',
        'qz261': 'Vrai', 'qz262': 'Faux'
    }
  };

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
