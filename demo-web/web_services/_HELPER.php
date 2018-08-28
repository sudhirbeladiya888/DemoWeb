<?php
	global  $db;
	class HELPER
	{
		

		/* This function is read paramater values from url */
		function read($param_name, $default = null) {
			$ret = isset($_REQUEST[$param_name]) 
					? trim($_REQUEST[$param_name]) 
					: (isset($_POST[$param_name]) 
						? trim($_POST[$param_name]) 
						: $default
					)
			;
			$ret = addslashes(urldecode($ret));
			return $ret;
		}

		

		/* This Function is used for upload file. When thumb_needed is true is also upload thumbnail file in thumb folder */
		function Upload($file) {
	        $file_path = "";
			
			if(!isset($_FILES[$file]['size']) || $_FILES[$file]['size']=='' || $_FILES[$file]['size'] <= 0){
				return $file_path;
			}

			if(isset($_FILES[$file]['name']) && $_FILES[$file]['name']!='')
			{
				$ext = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
	            $filename = uniqid().".".$ext;
				$this->Log('Uploading file:'.$filename);

				$success = move_uploaded_file($_FILES[$file]['tmp_name'],"upload/large/".$filename);
				if($success)
				{
					$file_path = WEB_SERVICE_PATH.UPLOAD.'large/'.$filename;
					$this -> Log('file uploaded: '.$file_path);
				}
			}		
			return $file_path;
		}
}
?>