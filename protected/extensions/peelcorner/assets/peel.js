var jaaspeel = {

		putObjects : function () 
		{
			// <jcornerSmall>
			document.write('<div id="jcornerSmall" style="position:absolute;width:'+ jaaspeel.small_width +'px;height:'+ jaaspeel.small_height +'px;z-index:9999;right:0px;top:0px;">');
			// object
			document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
			document.write(' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"');
			document.write(' id="jcornerSmallObject" width="'+jaaspeel.small_width+'" height="'+jaaspeel.small_height+'">');
			// object params
			document.write(' <param name="allowScriptAccess" value="always"/> ');
			document.write(' <param name="movie" value="'+ jaaspeel.small_path +'?'+ jaaspeel.small_params +'"/>');
			document.write(' <param name="wmode" value="transparent" />');
			document.write(' <param name="quality" value="high" /> ');
			document.write(' <param name="FlashVars" value="'+jaaspeel.small_params+'"/>');
			// embed
			document.write('<embed src="'+ jaaspeel.small_path + '?' + jaaspeel.small_params +'" name="jcornerSmallObject" wmode="transparent" quality="high" width="'+ jaaspeel.small_width +'" height="'+ jaaspeel.small_height +'" flashvars="'+ jaaspeel.small_params +'" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>');
			document.write('</object></div>');
			document.write('</script>');
			// </jcornerSmall>
			// <jcornerBig>
			document.write('<div id="jcornerBig" style="position:absolute;width:'+ jaaspeel.big_width +'px;height:'+ jaaspeel.big_height +'px;z-index:9999;right:0px;top:0px;">');
			// object
			document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
			document.write(' codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"');
			document.write(' id="jcornerBigObject" width="'+ jaaspeel.big_width +'" height="'+ jaaspeel.big_height +'">');
			// object params
			document.write(' <param name="allowScriptAccess" value="always"/> ');
			document.write(' <param name="movie" value="'+ jaaspeel.big_path +'?'+ jaaspeel.big_params +'"/>');
			document.write(' <param name="wmode" value="transparent"/>');
			document.write(' <param name="quality" value="high" /> ');
			document.write(' <param name="FlashVars" value="'+ jaaspeel.big_params +'"/>');
			// embed
			document.write('<embed src="'+ jaaspeel.big_path + '?' + jaaspeel.big_params +'" id="jcornerBigEmbed" name="jcornerBigObject" wmode="transparent" quality="high" width="'+ jaaspeel.big_width +'" height="'+ jaaspeel.big_height +'" flashvars="'+ jaaspeel.big_params +'" swliveconnect="true" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>');
			document.write('</object></div>');
			// </jcornerBig>
			setTimeout('document.getElementById("jcornerBig").style.top = "-1000px";',1000);
		}		
}



function sizeup987(){
	document.getElementById('jcornerBig').style.top = '0px';
	document.getElementById('jcornerSmall').style.top = '-1000px';
}

function sizedown987(){
	document.getElementById("jcornerSmall").style.top = "0px";
	document.getElementById("jcornerBig").style.top = "-1000px";
}