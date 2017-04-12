var _ssid = localStorage.getItem( "ssid" ),
	_uri = 'http://apprenant.alteretgo.my-workflow.fr/session/',
	_uriCourse = 'http://apprenant.alteretgo.my-workflow.fr/' + _ssid + '/';

function roundDecimal( _nombre, _precision ) {
	_precision = _precision || 2;
	_tmp = Math.pow( 10, _precision );
	return Math.round( _nombre * _tmp ) / _tmp;
};

function addStar( _quizz, _i ) {
	_i = _i || 1;
	_tmp = getLocalData( 'stars' );
	_tmp[ 'nbr' ]++;
	_tmp[ _quizz ] = {};
	_tmp[ _quizz ][ _i ] = true;
	setLocalData( 'stars', _tmp );
}

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

function notif( _style, _msg, _duration ) {
	_duration = ( _duration * 1000 ) || 3600;
	$( '#notif' ).html( _msg ).addClass( _style + ' show' );
	window.setTimeout( function() { $( '#notif' ).removeClass( 'show' ); }, _duration );
};

function sendToSave( _page, _data, _callback ) {
	_callback = _callback || null;
	$.post(
		_uri + _page,
		_data
	)
	.done( function( e ) {
		if ( e.status === 'executed' ) {
			if ( _callback != null ){ _callback(); }
		}
		else{ sendToSave( _page, _data, _callback ); }
	} )
	.fail( function( e ) {
		sendToSave( _page, _data, _callback )
	} );
};

function checkSave( _page, _data, _callback ) {
	$.post(
		_uri + _page,
		_data
	)
	.done( function( e ) {
		_callback();
	} )
	.fail( function( e ) {
		sendToSave( _page, _data, _callback )
	} );
};

function formatURIFormator () {
	return ( _uri ).replace( 'apprenant', 'formateur' ).replace( 'session/', '' );
};

function formatURICourse () {
	return ( _uri ).replace( 'session', _ssid );
};

function formatURIGrp () {
	return formatURICourse() + "groupe/";
};

function formatURILesson ( _page, _n ) {
	_n = typeof _n !== 'undefined' ? '/' + _n + '/' : '/';
	return ( _uri ).replace( 'session', _ssid ) + _page + _n;
};

function getDuration ( _dtBegin, _dtEnd ) {
	var _diff = {},
		_tmp = _dtEnd - _dtBegin,
		_comp = _tmp.toString();
	_tmp = Math.floor( _tmp / 1000 );//secondes
	_diff.s = _tmp % 60;
	_tmp = Math.floor( ( _tmp - _diff.s ) / 60 );//minutes
	_diff.m = _tmp % 60;
	_tmp = Math.floor( ( _tmp - _diff.m ) / 60 );//heures
	_diff.h = _tmp % 24;
	_diff.ms = parseInt( _comp.replace( ( ( _diff.h * 60 * 60 ) + ( _diff.m * 60 ) + _diff.s ), '' ) );
	_r = "PT";
	if ( _diff.h != 0 ) { _r += _diff.h + "H"; }
	if ( _diff.m != 0 ) { _r += _diff.m + "M"; }
	if ( _diff.s != 0 ) { _r += _diff.s; }
	if ( _diff.ms != 0 ) { _r += "." + _diff.ms + "S"; }
	else { _r += "S"; }
	return _r;
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
	tmp = localStorage.getItem( _key ) || {};
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
