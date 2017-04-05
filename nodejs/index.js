var express = require( 'express' ),
	app = express(),
	http = require( 'http' ).Server( app ),
	io = require( 'socket.io' )( http );

io.on( 'connection', function( socket ) {
  socket.on( 'msg', function( msg ){
    io.emit( 'msg', msg );
  } );
} );

http.listen( 3000, function() {
  console.log( 'listening on *:3000' );
} );
