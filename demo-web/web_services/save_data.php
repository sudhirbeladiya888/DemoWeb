<?php	
	function save_data($param=array())
	{
		global $outputjson, $gh, $db;

					
	   $row['id']  = $gh->read("id");
	   $row['name'] =$gh->read("name");
	  
	  	$currency_latest_detail = $db->insert("tbl_users" , $row);
	
		if($currency_latest_detail > 0)
	    {	
	    	$outputjson['success'] = '1';
	    	$outputjson['message'] = 'Success';
	    }
	    else
	    {
	    	$outputjson['success'] = '0';
	    	$outputjson['message'] = 'Fail !!!';
	    }
	    }
?>