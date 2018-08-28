<?php

	error_reporting(0);
	error_reporting(E_ALL);

	date_default_timezone_set('UTC');


	
		define("db_host","192.168.0.100");
		define("db_user","root");
		define("db_name","db_demo");
		define("db_pass","weenggs");
		define("DOMAIN","http://".$_SERVER['HTTP_HOST']."/");
		define("BASE_URL","http://".$_SERVER['HTTP_HOST']."/Demo/demo-web/web_admin/");
		define("WEB_SERVICE_PATH","http://".$_SERVER['HTTP_HOST']."/Demo/demo-web/web_services/");

	define("UPLOAD","upload/");

	$path = "upload/";
	if(!is_dir($path)) mkdir($path, 0777, true);

	$path = "upload/thumb/";
	if(!is_dir($path)) mkdir($path, 0777, true);

	$path = "upload/large/";
	if(!is_dir($path)) mkdir($path, 0777, true);
?>