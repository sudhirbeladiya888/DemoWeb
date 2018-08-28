<?php	
	function login_user($param=array())
	{
		global $outputjson, $gh, $db;
    

	    $username       = $gh->read("username");
	    $password       = base64_encode($gh->read("password"));
	    


	    if(empty($username))
	    {
	    	$outputjson['success'] = 0;
	    	$outputjson['message'] = 'Enter UserName';
	    	return false;
	    }

	    // if(empty($password))
	    // {
	    // 	$outputjson['success'] = 0;
	    // 	$outputjson['message'] = 'Enter password';
	    // 	return false;
	    // }

	    $user_data= $db->execute("SELECT * FROM tbl_users WHERE (username='$username' OR phone_no = '$username')"); // AND password='$password'
	    if(count($user_data) > 0)
	    {	
	    	$outputjson['data'] = $user_data[0];
	    	$outputjson['success'] = 1;
	    	$outputjson['message'] = 'Login Success';
	    }
	    else
	    {
	    	$outputjson['success'] = 0;
	    	$outputjson['message'] = 'username or password are  not match !!!!';
	    }

		
	}
?>