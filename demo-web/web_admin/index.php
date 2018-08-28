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
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" placeholder="Username" autofocus name="username" id="username">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                   <!--  <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label> -->
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" onclick="login_admin()">Login</button>
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
  var BASE_URL = '<?php echo BASE_URL;?>';
  var WEB_SERVICE_PATH = '<?php echo WEB_SERVICE_PATH;?>';
  var DOMAIN = '<?php echo DOMAIN;?>';
</script>
<script type="text/javascript">
  function login_admin(response){
    if (response && response.success > 0) {

     window.location="<?php echo BASE_URL ?>dashboard.php";
    }
    else if (response && response.success <= 0) {
       alert(response.message);
        return false;
    }
    else if (!response) {
        var data = {
            "op" : "login_admin"
            , "username" : $("#username").val()
            , "password"  : $("#password").val()
        };
        doServiceCall(data,login_admin,false);
    }
}



</script>