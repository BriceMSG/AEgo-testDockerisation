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

connected = {
  nbr: 0,
  add: function() {
    this.nbr++;
    return this;
  },
  wrote: function() {
    $( '#nbrApprCon' ).html( this.nbr );
  }
};

function callbackMsg( _msg ) {
  _msg = JSON.parse( _msg );
  console.log( _msg );

  if ( _msg.cible != 'former' ) {
    _msg = null;
    return null;
  }

  if ( _msg.msg == 'tabLoad' ) {
    if ( typeof datas.apps === 'undefined' ) {
      datas.apps = {};
    }

    if ( typeof datas.apps[ _msg.idTab ] === 'undefined' ) {
      connected.add().wrote();
    }

    datas.apps[ _msg.idTab ] = {};
    setLocalData( 'datas', datas );
  }
};

function callbackLRSMsg( _msg ) {
  alert( _msg );
};

var lcIo,
  datas;
$( document ).ready( function () {
  lcIo = setInterval( checkIo, 300 );

  datas = getLocalData( 'datas' );

  $( '#nbrApprCon' ).html( Object.keys(datas.apps).length );
} );
