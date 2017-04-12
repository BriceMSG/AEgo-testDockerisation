function API_GAIA_LCS (params) {
	this.infos={running:false,initialized:true,callBackFunc:{lrs:null,lcs:null},session:null,params:params};
	/**callback*/
	if ( (params.CALLBACKFUNC.lrs!=undefined) && (params.CALLBACKFUNC.lrs!=null) ) this.infos.callBackFunc.lrs=params.CALLBACKFUNC.lrs;
	if ( (params.CALLBACKFUNC.lcs!=undefined) && (params.CALLBACKFUNC.lcs!=null) ) this.infos.callBackFunc.lcs=params.CALLBACKFUNC.lcs;
	/**objet LRSTracking*/
	this.lrs_helper=null;
	/**Objet LCS*/
	this.my_io;
	/**recuperation session id*/
	(params.SESSION!=undefined) ? this.infos.session = params.KEY+params.SESSION : this.infos.session=params.KEY+this.getQuerystring("_session","wheel_ms1302");
	//protocol
	this.my_potocol="http://";
	try {
		this.my_potocol = ('https:' == document.location.protocol ? 'https://' : 'http://');
	} catch(e) {}
	if (this.infos.session!=""){
		var that=this;
		$(document).ready(function() {
			$('head')[0].appendChild(
				//$('<script />').attr('src', that.my_potocol+'192.168.1.2/php/libxlcs.php?KEY='+params.KEY).on('load', function() {
				$('<script />').attr('src', that.my_potocol+'192.168.1.2:3000/lcsjs').on('load', function() {
						//init LRS
						that.lrs_helper = _lrs_tracking;
						that.lrs_helper.xapi_lrs_init(_prefs.lrs_prefs.endPoint,_prefs.lrs_prefs.acc_id,_prefs.lrs_prefs.acc_pwd);
						//that.lrs_helper.xapi_lrs_init(that.my_potocol+'192.168.1.2/data/xAPI/statements','b2b8654234bc97f6f9f55b4fdcf23020d6656a7f','5aeac059230e9bef4c5d69674d1590b452662722');
						//callback LRS
						try {
							if (that.infos.callBackFunc.lrs!=null) that.lrs_helper.callbackFunk=that.infos.callBackFunc.lrs;
						}catch(e){}

						$('head')[0].appendChild(
							$('<script />').attr('src', that.my_potocol+'192.168.1.2:3000?session='+that.infos.session).on('load', function() {

								//init objet gess event avec session transmise
								that.LCS_init(that.infos.session);

							})[0]
						);

				})[0]
			);
		});
	}
}
/**LRS/XAPI*/
API_GAIA_LCS.prototype.xAPI_Set_Tracking = function(xAPIObjJson) {
	console.log(JSON.stringify(xAPIObjJson))
	this.lrs_helper.xapi_lrs_set(xAPIObjJson);
}
API_GAIA_LCS.prototype.xAPI_Get_Tracking = function(request) {
	this.lrs_helper.xapi_lrs_get(request);
}
API_GAIA_LCS.prototype.xapi_set_request = function(requestObj) {
	return this.lrs_helper.xapi_set_request(requestObj);
}
/**LCS*/
API_GAIA_LCS.prototype.LCS_init = function(sess) {
	//creation objet
	this.my_io=new io_data_xch(sess);
	//creation ecouteur
	var that=this;
	//redirection
	try {
		if (this.infos.callBackFunc.lcs!=null) this.my_io.io_get=this.infos.callBackFunc.lcs;//=>({msg:"initdone",sess:sess});
	}catch(e) {console.log("error on LCS callback:"+e)}
	//
	this.my_io.socket.on('contextchange', function(msg){
		that.my_io.io_get(msg);//=>callbackMsg(msg);
	});
	//ajout code projet
	this.infos.running=true;
	//tells everything is done
	try {
		if (this.infos.callBackFunc.lcs!=null) {
			this.infos.callBackFunc.lcs(JSON.stringify({msg:"initdone",sess:sess}));
			//
		}
	}catch(e) {console.log("error on LCS_init:"+e)}
}
API_GAIA_LCS.prototype.LCS_sndData = function(data) {
	this.my_io.io_send(data);
}
API_GAIA_LCS.prototype.LCS_listen = function(data) {

}
/**helpers*/
API_GAIA_LCS.prototype.getQuerystring = function (key, default_) {
	if (default_==null) default_="";
	key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
	var qs = regex.exec(window.location.href);
	if (qs == null) {
		return default_;
	} else {
		return qs[1];
	}
}
