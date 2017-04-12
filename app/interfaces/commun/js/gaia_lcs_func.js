//pour mettre une session : url_contenu.html/_session={session}
var my_lcs = new API_GAIA_LCS( {
	KEY: "4d0d4046-6fd5-468f-aae1-3471a6169566",
	SESSION: undefined,
	CALLBACKFUNC: {
		lrs: callbackLRSMsg,
		lcs: callbackLCSMsg
	}
} );
//document.getElementById( "infos" ).innerHTML = JSON.stringify( my_lcs.infos );

/**a modifier function actuellement en place*/
function callbackLCSMsg( msg ) {
	//=> API_GAIA_LCS.prototype.LCS_LCS_listen
	//console.log( "callbackMsg loc:" + msg );
	callbackMsg(msg);
	//document.getElementById( "LCSGET" ).value = msg;
}
/**a modifier function actuellement en place*/
function callbackLRSMsg( msg ) {
	//=> API_GAIA_LCS.prototype.LCS_LRS_listen
	console.log( "callbackLRSMsg:" + msg );
	//document.getElementById( "xapirecieved" ).value = msg;
}
//function
function LRSSET() {
	var statement_obj = JSON.parse( document.getElementById( "LRSSET" ).value );
	my_lcs.xAPI_Set_Tracking( statement_obj );//statement
}
function LRSGET() {
	var my_agent = {
		mbox: "mailto:" + document.getElementById( "LRSGET" ).value
	};
	var lrs_request = my_lcs.xapi_set_request( {
		actor: my_agent,
		verb: {
			id: "http://adlnet.gov/expapi/verbs/completed"
		},
		object: {
			id: "http://openbadges.tumblr.com/post/115135719509/an-open-can-of-tin-badges-tin-can-api"
		},
		prefs: {
			registration: undefined,
			limit: 3
		}
	} );
	//alert( "lrs_request:" + lrs_request );
	my_lcs.xAPI_Get_Tracking( lrs_request );//LRS request
}
function LCSSET( msg ) {
	my_lcs.LCS_sndData( msg );//whatever
}
function LCSGET( msg ) {
	//alert( msg );
	document.getElementById( "LCSGET" ).value = msg;
}
