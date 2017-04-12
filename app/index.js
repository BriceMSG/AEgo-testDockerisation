const express = require( 'express' );
const	app = express();
const	http = require( 'http' ).Server( app );
const	io = require( 'socket.io' )( http );
const	fs = require( 'fs' );
var exec = require('child_process').exec;

// Test if the application has been installed before on the device
var isItInstalledAlReady = '/data/.installed'
if (!fs.existsSync(isItInstalledAlReady)) {
	console.log('creating log folder if needed');
	if(!fs.existsSync('/data/log')) fs.mkdirSync('/data/log');
	console.log('Moving / creating mysql db if needed');
	exec('/etc/init.d/mysql stop'function(err, stdout, stderr) {
		exec('sed -i -e "s@^datadir.*@datadir = /data/mysql@" /etc/mysql/my.cnf');
	});
	if(!fs.existsSync('/data/mysql')){
		fs.mkdirSync('/data/mysql');
		exec('cp -r /var/lib/mysql/* /data/mysql', function(err, stdout, stderr) {
			exec('rm -rf /var/lib/mysql', function(err, stdout, stderr) {
				exec('chown -R mysql:mysql /data/mysql', function(err, stdout, stderr) {
					exec('/etc/init.d/mysql start', function(err, stdout, stderr) {
						exec('mysql -u root < /home/alteretgo/alter.sql');
					});
				});
			});
		});
	}
	exec('touch /data/.installed')
}

io.on( 'connection', function( socket ) {
	console.log(socket);
  socket.on( 'msg', function( msg ){
    io.emit( 'msg', msg );
  } );
} );

http.listen( 3000, function() {
  console.log( 'listening on *:3000' );
} );
