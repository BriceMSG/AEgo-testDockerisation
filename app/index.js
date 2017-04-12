var express = require( 'express' );
var	app = express();
var	http = require( 'http' ).Server( app );
var	io = require( 'socket.io' )( http );

io.on( 'connection', function( socket ) {
	console.log(socket);
  socket.on( 'msg', function( msg ){
    io.emit( 'msg', msg );
  } );
} );

http.listen( 3000, function() {
  console.log( 'listening on *:3000' );
} );
