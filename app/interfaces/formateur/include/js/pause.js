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
  console.log( _msg );
};

function callbackLRSMsg( _msg ) {
  alert( _msg );
};



var lcIo,
  datas;
$( document ).ready( function () {
  lcIo = setInterval( checkIo, 300 );

  datas = getLocalData( 'datas' );
  _appsKey = Object.keys( datas.apps );
  _instructor = getLocalData( 'instructor' );

  var _content = $( '#everybody .valign' ),
    _col = 1,
    tmp = _appsKey,
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

    _html += '<div class="col-3">';
    _html += '<div id="idTab-' + tmp[ i ] + '" class="card">';
    _html += '<p class="prenom">Prénom : <span>' + ( ( typeof datas.apps[ tmp[ i ] ].prenom !== 'undefined' ) ? '<b>'+ datas.apps[ tmp[ i ] ].prenom + '</b>' : '' ) + '</span></p>';
    _html += '<p class="nom">Nom : <span>' + ( ( typeof datas.apps[ tmp[ i ] ].nom !== 'undefined' ) ? '<b>'+ datas.apps[ tmp[ i ] ].nom + '</b>' : '' ) + '</span></p>';
    _html += '</div></div>';

    if ( i == j-1 ) {
      _html += '</div>';
    }

    _col++;
  }

  _content.html( _html );
} );
