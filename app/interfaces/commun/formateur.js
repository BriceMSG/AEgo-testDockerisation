var _ssid = localStorage.getItem( 'ssid' ),
	_uri = 'http://formateur.alteretgo.my-workflow.fr/session/',
	_uriCourse = 'http://formateur.alteretgo.my-workflow.fr/' + _ssid + '/';
var hitEvent = 'ontouchstart' in document.documentElement
  ? 'touchstart'
  : 'click';

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

var testDebit = {
	image: 'http://commun.alteretgo.my-workflow.fr/speedtest.png',
	size: 671445,
	time1: 0,
	time2: 0,
	ms: 0,
	vitesse: 0,
	begin: function() {
		this.beginSwitch();
		$( "#networkSpeed" ).html( 'Test en cours' );
		this.time1 = new Date();
		this.time1 = this.time1.getTime();
		var img = new Image();
		img.src = this.image + '?' + this.time1;
		img.onload = this.end;
	},
	end: function() {
		testDebit.time2 = new Date();
		testDebit.ime2 = testDebit.time2.getTime();
		testDebit.ms = testDebit.time2 - testDebit.time1;
		testDebit.vitesse = Math.round( testDebit.size / testDebit.ms * 100 ) / 100;
		$( "#networkSpeed" ).html( testDebit.vitesse.toLocaleString() + ' ko/s' );
		window.setTimeout( testDebit.endSwitch, 1500 );
	},
	beginOne: function() {
		$( ".networkSpeed" ).html( 'Test en cours' );
		this.time1 = new Date();
		this.time1 = this.time1.getTime();
		var img = new Image();
		img.src = this.image + '?' + this.time1;
		img.onload = this.endOne;
	},
	endOne: function() {
		testDebit.time2 = new Date();
		testDebit.ime2 = testDebit.time2.getTime();
		testDebit.ms = testDebit.time2 - testDebit.time1;
		testDebit.vitesse = Math.round( testDebit.size / testDebit.ms * 100 ) / 100;
		$( ".networkSpeed" ).html( testDebit.vitesse.toLocaleString() + ' ko/s' );
	},
	beginSwitch: function() {
		$( "#checkNetwork" ).fadeOut( 150, function(){
			$( "#networkSpeed" ).fadeIn( 150 );
		} );
	},
	endSwitch: function() {
		$( "#networkSpeed" ).fadeOut( 150, function() {
			$( "#checkNetwork" ).fadeIn( 150 );
		} );
	}
};

var _menuStat = false;
function toggleMenu() {

	if( _menuStat === false ) {
		if( $( '#appSelect' ).hasClass( 'show' ) ) { _menuStat = null; }
		else { _menuStat = true; }
		$( '#appSelect' ).removeClass( 'show' )
		$( '#everybody' ).addClass( 'hide' );
		$( '#menu' ).addClass( 'show' );
	}
	else if ( _menuStat === true ) {
		$( '#appSelect' ).removeClass( 'show' )
		$( '#everybody' ).removeClass( 'hide' );
		$( '#menu' ).removeClass( 'show' );
		 _menuStat = false;
	}
	else {
		$( '#appSelect' ).addClass( 'show' )
		$( '#everybody' ).addClass( 'hide' );
		$( '#menu' ).removeClass( 'show' );
		 _menuStat = false;
	}
};

function byGroup ( _page ) {
	if( _moving === true ) { return false; }
	_moving = true;
	_tmp = getLocalData( 'grps' );
	_key = Object.keys( _tmp );
	$.each( _tmp, function( index, el ) {
		console.log( 'index', index );
		console.log( 'el', el );
		var i = 0;
		$.each( el, function( rrr, elr ) {
			console.log( 'rrr', rrr );
			console.log( 'elr', elr );
			_pageSwitch = ( ( i == 0 ) ? _page : 'grouping.php' );
			_msg = {
				'cible': elr,
				'msg': 'goto',
				'data': _pageSwitch
			};
			console.log( _msg );
			_msg = JSON.stringify( _msg );
			my_lcs.LCS_sndData( _msg );
			i++;
		} );
	} );
	_msg = {
		'cible': 'projo',
		'msg': 'goto',
		'data': _page
	};
	_msg = JSON.stringify( _msg );
	my_lcs.LCS_sndData( _msg );
	setLocalData( 'pathname', '/session/' + _page );
	window.location = _uri + _page + '?_session=' + _ssid;
};

function cached() {
	$.post(
		_uri + 'cached.php',
		{ "ssid": getLocalData( 'ssid' ), "quizz": _idQuizz }
	)
	.done( function( e ) {
		cachedRecreate( e );
	} )
	.fail( function( e ) {
		cached()
	} );
};

function cachedRecreate( e ) {
	setLocalData( _idQuizz, e )
	window.location = window.location;
}

function goTo( _page, _cible, _move ) {
	if( _moving === true ) { return false; }
	_moving = true;
	_cible = _cible || 'apps';
	_move = _move || true;
	_msg = {
		'cible': _cible,
		'msg': 'goto',
		'data': _page
	};
	if ( _move ){
		_msg = JSON.stringify( _msg );
		my_lcs.LCS_sndData( _msg );
		_msg = {
			'cible': 'projo',
			'msg': 'goto',
			'data': _page
		};
		_msg = JSON.stringify( _msg );
		my_lcs.LCS_sndData( _msg );
	}
	setLocalData( 'pathname', '/session/' + _page );
	if( _page == 'close-session.php' ) {
		_tmp = getLocalData( 'instructor' );
		window.location = _uri + _page + '?_session=' + _ssid + '&formateur=' + _tmp ;
	}
	else{
		window.location = _uri + _page + '?_session=' + _ssid;
	}
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
		window.location = _uri + page + '?_session=' + _ssid;
	}
} );
