<html>
<head>
<?php   

	include("../../includes/config.php");
$sup=en_de('de',$_COOKIE['super']);

	if(isset($_COOKIE['super']) and $sup=='2')
	{
				redirect("index");

	}?>

	<title>Ecounsellors.IN Admin</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery.scrolly.min.js"></script>
	<script src="../js/jquery.scrollzer.min.js"></script>
	<script src="../js/skel.min.js"></script>
	<script src="../js/skel-layers.min.js"></script>
	<script src="../js/init.js"></script>
	<script src="../js/bootstrap.js"></script>
	

		<link rel="stylesheet" href="../css/skel.css" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/style-wide.css" />
	
	<link rel="stylesheet" href="../css/boot/bootstrap.css" />
	<link rel="stylesheet" href="../css/custom.css" />





	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

	<!-- Header -->
	

		

					



						<div class="row">

							<div class="3u"></div>

							<div class="6u">
								

								<hr>

								<h2 style="text-align:center;">Login with your details</h2>

								<br>

								<form role="form" method="POST" action="">

									<div class="form-group">

										<label for="emailid">Email address</label>

										<input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email address" required value="<?php if(isset($_POST['emailid'])) echo $_POST['emailid'];?>">

									</div>

									<div class="form-group">

										<label for="password">Password</label>

										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

									</div>

									<button type="submit" class="btn btn-primary" name="login">Sign In</button>

								</form>

							</div>
							<div class="6u"></div>

						</div>

							<?php

						if(isset($_POST['login'])) {

							$emailid= strip_tags($_POST['emailid']);

							$password= $_POST['password'];

							if($emailid == 'adminx123@ecounsellors.in' && $password == 'admin-namanx'){

								//$_SESSION['csw_admin'] = 'naman_csw';

								$cookie_name = "super";
								$sup="2";
								$cookie_value = en_de('en',$sup);
								setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/cp/admin123/");

								echo '<script>window.location="index";</script>';

							}

							else{

								echo '<script type="text/javascript">alert("Wrong details!!!");</script>';

							}

						}

						?>

		