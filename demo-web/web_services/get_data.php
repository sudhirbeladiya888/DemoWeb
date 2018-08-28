<?php	
	require_once("conn.php");

	global  $gh, $db;
	$sql = "SELECT * FROM tbl_users ";
	$get_data = $db->execute($sql);
	if($get_data > 0)
	{	
		$outputjson['success'] = '1';
		$outputjson['message'] = count($get_data).' Record found.';
		$outputjson['data'] = $get_data;
		$outputjson['qry'] = $sql;
	}
	else
	{
		$outputjson['success'] = '0';
		$outputjson['message'] = 'Fail !!!';
	}
	echo  json_encode($outputjson, JSON_PRETTY_PRINT);
?>