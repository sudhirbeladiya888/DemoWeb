<?php
include("_CONFIG.php");
include("_HELPER.php");
require_once('_DB.php');
header("Content-type: application/json; charset=utf-8");
$db = new MysqliDB(db_host, db_user, db_pass, db_name);
$gh = new HELPER();
?>