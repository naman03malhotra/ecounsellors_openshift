<!DOCTYPE HTML>

<?php 

include_once("config.php");
if(!isset($_SESSION['cpl_id']))
{
	redirect("index.php");

}
else
{
$session_emailid = $_SESSION['cpl_id'];
$queryu = query("SELECT * FROM users WHERE emailid='$session_emailid'");
$rowu = mysqli_fetch_array($queryu);
	//$kid=$rowu[]'id'];

	$queryf = query("SELECT * FROM userdata WHERE emailid='$session_emailid'");				

$rowf = mysqli_fetch_array($queryf);

}
?>
<html>
	<head>
		<title><?= htmlspecialchars($title) ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollzer.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/bootstrap.js"></script>
		<noscript>
				
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<link rel="stylesheet" href="css/boot/bootstrap.css" />
				<link rel="stylesheet" href="css/custom.css" />





		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header" class="skel-layers-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
				<!--<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>-->
			<?php	echo '<h1 id="title"><a href="http://cpl.cashwaapas.com">'.$rowu['name'].'</a></h1>'?>
				<p><a href="https://cashwaapas.com" target="_blank">Cashwaapas.com</a></p>
			</div>

					<!-- Nav -->
						<nav id="nav">
							<!--
							
								Prologue's nav expects links in one of two formats:
								
								1. Hash link (scrolls to a different section within the page)
								
								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>
							
							-->
							<ul>
									<li><a href="index.php"    ><span class="icon fa-home">Home</span></a></li>
									<li><a href="index.php#about"  ><span class="icon fa-user">About Us</span></a></li>
									<li><a href="index.php#contact"><span class="icon fa-envelope">Contact Us</span></a></li>

									<?php
									if(isset($_SESSION['cpl_id'])){
										echo '<li><a href="profile.php"><span class="icon fa-pencil">Profile</span></a></li>';
										echo '<li><a href="logout.php"  ><span class="icon fa-power-off">Log Out</span></a></li>';
										
									}
									else{
										echo '<li><a href="#loginz"  ><span class="icon fa-power-off">Login</span></a></li>';

									}?>

										
									
								</ul>
						</nav>
						
				</div>
				
				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>
				
				</div>
			
			</div>