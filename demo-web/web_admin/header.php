<?php
	include '../web_services/_CONFIG.php';
	include '../web_services/_DB.php';

	session_start();
	if (isset($_REQUEST['logout'])) {
		session_destroy();
		echo "<script>location.href='index.php';</script>";
	}
	if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
		session_destroy();
		echo "<script>location.href='index.php';</script>";
	}

	$db = new MysqliDB(db_host, db_user, db_pass, db_name);
	$gh = new HELPER();
	$page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Kointrack">
		<meta name="author" content="Kointrack">
		<meta name="keyword" content="Kointrack">
		<link rel="shortcut icon" href="img/favicon.png">

		<title>Kointrack - Admin Panel</title>

		<!-- Bootstrap CSS -->	
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- bootstrap theme -->
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		
		<!-- font icon -->
		<link href="css/elegant-icons-style.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet" />	
		
		<!--external css-->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet" />
		
		<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">

		<!-- Select 2 CSS -->
		<link href="css/select2.min.css" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
		<!--[if lt IE 9]>
		  <script src="js/html5shiv.js"></script>
		  <script src="js/respond.min.js"></script>
		  <script src="js/lte-ie7.js"></script>
		<![endif]-->

		<!-- Datatables CSS -->
		<link rel="stylesheet" type="text/css" href="css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="css/colReorder.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="css/fixedHeader.dataTables.min.css">

		<script src="js/jquery-1.8.3.min.js"></script>
        <script src="js/common.js"></script>

        <script type="text/javascript">
        	var WEB_SERVICE_PATH = '<?php echo WEB_SERVICE_PATH;?>';
        
        </script>

        <style type="text/css">
			#loadingDiv{
				position:fixed;
				top:0px;
				right:0px;
				width:100%;
				height:100%;
				background-color:#000;
				background-image:url('img/loading.gif');
				background-repeat:no-repeat;
				background-position:center;
				z-index:10000000;
				opacity: 0.7;
				filter: alpha(opacity=40); /* For IE8 and earlier */
			}
			ul.sidebar-menu li.active a, ul.sidebar-menu li a:hover, ul.sidebar-menu li a:focus {
			    background: #1a2732;
			    color: #fff;
			    display: block;
			    -webkit-transition: all 0.3s ease;
			    -moz-transition: all 0.3s ease;
			    -o-transition: all 0.3s ease;
			    -ms-transition: all 0.3s ease;
			    transition: all 0.3s ease;
			}
		</style>
					
	</head>

	<body>
		
		<!-- container section start -->
		<section id="container" class="">

			<!-- Header Start -->
			<header class="header dark-bg">
				<div class="toggle-nav">
					<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
				</div>

				<!--logo start-->
				<a href="dashboard.php" class="logo">Kointrack</a>
				<!--logo end-->

				<div class="top-nav notification-row"> <!-- notificatoin dropdown start-->
					<ul class="nav pull-right top-menu">						
						<!-- user login dropdown start-->
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="profile-ava">
									<img alt="" src="img/admin.png">
								</span>
								<span class="username"> <?php echo strtoupper($_SESSION['admin']); ?></span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu extended logout">
								<div class="log-arrow-up"></div>
								<!-- <li class="eborder-top">
									<a href="#"><i class="icon_profile"></i>My Profile</a>
								</li> -->
								<li>
									<a href="?logout"><i class="icon_key_alt"></i>Log Out</a>
								</li>
							</ul>
						</li> <!-- user login dropdown end -->
					</ul> <!-- notificatoin dropdown end-->
				</div>
			</header>
			<!--header end-->

			<!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse ">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu">
						
						<li class="<?php echo ($page == 'dashboard.php') ? 'active' : ''; ?>">
							<a class="" href="dashboard.php">
								<i class="icon_house_alt"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="">
							<a class="" href="?logout">
								<i class="icon_lock_alt"></i>
								<span>Logout</span>
							</a>
						</li>

					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->

			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">