<?php	
require_once("conn.php");
global $gh, $db;

$user_id  = $gh->read("user_id");

$delete_data = $db->delete("tbl_users" , "user_id=$user_id");

if($delete_data > 0)
{	
	$outputjson['success'] = '1';
	$outputjson['message'] = 'Success';
}
else
{
	$outputjson['success'] = '0';
	$outputjson['message'] = 'Fail !!!';
}
echo json_encode($outputjson, JSON_PRETTY_PRINT);
?>