var _ssid = localStorage.getItem( 'ssid' ),
	_uri = 'http://projecteur.alteretgo.my-workflow.fr/session/',
	_uriCourse = 'http://projecteur.alteretgo.my-workflow.fr/' + _ssid + '/';

if ( typeof String.prototype.trimLeft !== "function" ) {
	String.prototype.trimLeft = function() {
		return this.replace( /^\s+/, '' );
	};
}
if ( typeof String.prototype.trimRight !== "function" ) {
	String.prototype.trimRight = function() {
		return this.replace( /\s+$/ , '' );
	};
}
if ( typeof Array.prototype.map !== "function" ) {
	Array.prototype.map = function( callback, thisArg ) {
		for ( var i=0, n = this.length, a = []; i < n; i++ ) {
			if ( i in this ) {
				a[ i ] = callback.call( thisArg, this[ i ] );
			}
		}
		return a;
	};
};
function notif( _style, _msg, _duration ) {
	_duration = ( _duration * 1000 ) || 3600;
	$( '#notif' ).html( _msg ).addClass( _style + ' show' );
	window.setTimeout( function() { $( '#notif' ).removeClass( 'show' ); }, _duration );
};

function goTo( _page, _go ) {
	if( _moving === true ) { return false; }
	_moving = true;
	_go = _go || false;
	setLocalData( 'pathname', '/session/' + _page );
	if ( _go ) {
		window.location = _uri + _page + '?_session=' + _ssid;
	}
	else{
		jingle();

		setTimeout( function() {
			window.location = _uri + _page + '?_session=' + _ssid;
		}, 2050 );
	}
};

function jingle() {
	$( '#jingle' ).css( 'display', 'block' );
	setTimeout( function() {
		$( '#jingle' ).addClass( 'unshow' );
	}, 50 );
}

function checkSave( _page, _data, _callback ) {
	$.post(
		_uri + _page,
		_data
	)
	.done( function( e ) {
		_callback();
	} )
	.fail( function( e ) {
		checkSave( _page, _data, _callback )
	} );
};

function recoverySave( _page, _data, _callback ) {
	$.post(
		_uri + _page,
		_data
	)
	.done( function( e ) {
		_callback( e );
	} )
	.fail( function( e ) {
		recoverySave( _page, _data, _callback )
	} );
};

function delLocalData( _key ) {
	localStorage.removeItem( _key );
};

function setLocalData( _key, _data ) {
	if ( typeof _data === 'object' ) {
		_data = JSON.stringify( _data );
	}
	localStorage.setItem( _key, _data );
};

function getLocalData( _key ) {
	tmp = localStorage.getItem( _key );
	try {
		tmp = JSON.parse( tmp );
	}
	catch( e ) {
		tmp = tmp;
	}
	return tmp;
};

function hasLocalData( _key ) {
	if ( localStorage.getItem( _key ) === null ) {
		return false;
	}
	else {
		return true;
	}
};
my_lcs = {
	my_io: null,
	init: function() {
		this.my_io = io( 'http://node.alteretgo.my-workflow.fr:3000' );
		my_lcs.my_io.on( 'msg', function( msg ) {
			callbackMsg( msg );
		} );
	},
	xAPI_Set_Tracking: function( _null ){},
	LCS_sndData: function( _msg ){
		if( typeof _msg === "object" ) {
			_msg = JSON.stringify( _msg );
		}
		my_lcs.my_io.emit( 'msg', _msg );
	}
};
_moving = false;
$( document ).ready( function () {
	my_lcs.init();
	page = getLocalData( 'pathname' );
	if( page != window.location.pathname ) {
		page = page.replace( '/session/', '' );
		goTo( page, true );
	}
} );
