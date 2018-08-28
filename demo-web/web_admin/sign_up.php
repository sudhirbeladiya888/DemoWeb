<?php
    session_start();
    require '../web_services/_CONFIG.php';
    $username = $password = $msg = "";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       

        <title>Kointrack - Admin Panel</title>

        <!-- Bootstrap CSS -->    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

    </head>

    <body><!-- class="login-img3-body" -->

        <div class="container">

            <form class="login-form" action="" method="post" onsubmit="return false">        
                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>
                    <!-- <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" placeholder="Username" autofocus name="username" id="username">
                    </div> -->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                        <input type="text" class="form-control" placeholder="Phone no" autofocus name="phone_no" id="phone_no">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                   
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" onclick="signup_user()">Signup</button>
                    <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
                </div>
            </form>
            <h3 align="center">
                <label class="label label-danger"><?php if (!empty($msg)) { echo $msg; } ?></label>
            </h3>

        </div>


    </body>
</html>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script type="text/javascript">
  var WEB_SERVICE_PATH = '<?php echo WEB_SERVICE_PATH;?>';
</script>
<script type="text/javascript">
  function signup_user(response){
    if (response && response.success > 0) {
    window.location="<?php echo DOMAIN ?>web_admin/index.php";
    }
    else if (response && response.success <= 0) {
       alert(response.message);
        return false;
    }
    else if (!response) {
        var data = {
            "op" : "signup_user"
            , "username" : $("#username").val()
            , "phone_no" : $("#phone_no").val()
            , "password"  : $("#password").val()
        };
        doServiceCall(data,signup_user,false);
    }
}



</script>