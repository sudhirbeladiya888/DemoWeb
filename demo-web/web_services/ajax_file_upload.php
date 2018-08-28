<?php
function ajax_file_upload($param = array())
{
    global $outputjson, $gh, $db;
    $outputjson['success'] = 0;

    $file_url = $gh->UploadImage("file", false);
  
    if ($file_url != "") {
        $outputjson['success'] = '1';
        $outputjson['message'] = 'File uploaded successfully.';
        $outputjson['file_url'] = $file_url;
    } else {
        $outputjson['success'] = '0';
        $outputjson['message'] = 'Failed !! please try again.';
    }
}

?>