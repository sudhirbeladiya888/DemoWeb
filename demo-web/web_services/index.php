<!DOCTYPE>
<HTML>
	<HEAD>
		<title>Please wait...</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">

		<script type="text/javascript" src="jquery-1.10.1.min.js"></script>

		<script type="text/javascript">
			
			var _domain = "";
			var _title = "Demo Web Services";
			var methods = [];

			// --------------------------------------------------------------------------------------- //
			methods.push({
				title : ''
				, url : 'service.php?op='
				, params : ''
			});
			
			//-----------------------------------------------------------------------------------//
			var tokenPos=window.location.search.indexOf('access_token');
			if(tokenPos>-1)
				token=window.location.search.substr(tokenPos+13,40);
			else
				token="";

			function format(e,t){var n=e||"";var r=n+"";var i=null;try{for(var s in t){i=new RegExp("\\{"+s+"\\}","g");r=r.replace(i,t[s]==null?"":t[s].toString())}}catch(o){}return r}function loadMethods(){var e="",t="<li>{title} - <label>{params}</label><a target='_blank' href='{url}' ><span>Test</span></a>";e+="<ol>";for(var n in methods){e+=format(t,methods[n])}e+="</ol>";e+="<a id='last' href='javascript:;'></a>";document.getElementById("body").innerHTML=e;document.title=_title;document.getElementById("header").innerHTML="<hr /><b>"+_title+"<hr />";document.getElementById("footer").innerHTML="";document.onkeydown=function(e){e=e||window.event;if(e.keyCode==27){_doClose()}}}var popup=document.getElementById("popup");window.onload=function(){window.setTimeout(function(){loadMethods();window.scrollTo(0,document.body.scrollHeight)},10)};
		</script>
	</HEAD>
	
	<BODY>
		<div id="popup"></div><header id="header"></header>
		<div id="body"></div>
		<footer id="footer"></footer>
		<style type="text/css">
			#close {
				background: none repeat scroll 0 0 #FFFFFF; border: 0 none; color: #FF0000; font-size: 25px; font-weight: bold; height: 50px; position: absolute; right: 3px; top: 7px; width: 100px; cursor: pointer;
			}
			#popup {
				background-color: #FFFFFF; border: 1px solid #FCFCFC; bottom: 70px !important; position: absolute; top: 70px; width: 97%; z-index: 1000; display: none; padding-bottom: 20px;
			}
			body {
				font-size: 20px; padding-top: 40px; min-height: 500px;
			}
			div {
				position: absolute; border-width: 0px; overflow: visible; overflow-x: hidden; padding: 15px; padding-bottom: 60px;
			}
			li {
				font-weight: normal;
			}
			li label {
				font-size: 14px; color: gray; padding-left: 15px;
			}
			li span {
				font-size: 11px; font-weight: bold; padding-left: 15px;
			}
			header, footer {
				text-align: center;
				width: 100%;
				margin: 0px auto;
				position: fixed;
				z-index: 1000;
				left: 0px !important;
				border: 1px solid rgb(51, 51, 51);
				background: rgb(17, 17, 17);
				color: rgb(255, 255, 255);
				font-weight: bold;
				text-shadow: 0 -1px 1px rgb(0, 0, 0);
				background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(60, 60, 60) ), to(rgb(17, 17, 17) ) );
				background-image: -webkit-linear-gradient(rgb(60, 60, 60), rgb(17, 17, 17) );
				background-image: -moz-linear-gradient(rgb(60, 60, 60), rgb(17, 17, 17) );
				background-image: -ms-linear-gradient(rgb(60, 60, 60), rgb(17, 17, 17) );
				background-image: -o-linear-gradient(rgb(60, 60, 60), rgb(17, 17, 17) );
				background-image: linear-gradient(rgb(60, 60, 60), rgb(17, 17, 17) );
			}
			header {
				top: 0px !important;
			}
			footer {
				bottom: 0px !important;
			}
			b {
				color: #000;
			}
			header b {
				color: #FFF;
			}
		</style>
	</BODY>
</HTML>