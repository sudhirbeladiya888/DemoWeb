<?php
require_once("conn.php");
	// function edit_data($param=array())
	{
		global  $gh, $db;

		$user_id  = $gh->read("user_id");
					
		$data['id'] = $id  = $gh->read("id");
		$data['name'] = $name  = $gh->read("name");

	  	$update_data = $db->update("tbl_users" , $data ,"user_id=$user_id");
	
		$outputjson['success'] = '1';
	   	$outputjson['message'] = 'Success';
	    
	}
	echo  json_encode($outputjson, JSON_PRETTY_PRINT);
?>