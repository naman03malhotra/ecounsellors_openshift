<!DOCTYPE HTML>

<?php 

include("../includes/config.php");

if(isset($_SESSION['c_id']))
{
$session_emailid = $_SESSION['c_id'];
$queryu = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
$rowu = mysqli_fetch_array($queryu);
$queryf = query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");				

	$rowf = mysqli_fetch_array($queryf);
	$cid=$rowf['sub_id'];

	if($rowf['men']==1)
         {
            $men="Mentor";
            $url_men="mentor";
           // $_SESSION['url_men']="mentor";
          }
          else
          {
            $men="Counselling expert";
            $url_men="counsellor";
           // $_SESSION['url_men']="counsellor";
          }

}
$agent=1;
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
{
	$agent=0;
}
?>
<html>
	<head>

<?php include_once('includes/nav.php'); ?>



<script type="text/javascript">
	/*
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
*/

	
</script>
		<title>Ecounsellors - Mentor's Panel</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		
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
<style type="text/css">
 .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}
	.panel-default>.panel-heading{


  background-color: #00bef2;
  color: white;
   min-height: 50;
  
  text-align: center;
}
@media (min-width: 992px){
.modal-lg {
  width: 1200px;
	}
	table{
		font-size: 20px
	}
}
@media (max-width: 500px){
	table{
		font-size: 15px;
	}
}

.panel-title{

  font-size: x-large;


}
.banner{
	margin-bottom: 15px;
}
.banner2{
	margin-top: 15px;
}
.text-left {
    font-weight: 100;
    line-height: 1.4;
    }
    .btn:hover, .btn:focus {
    color: #CCCCCC;
    text-decoration: none;
}
.special{

font-size: -webkit-xxx-large;
    border-radius: 48%;
    height: 122px;
    line-height: 105px;
       transition: 0.6s;
       width: 122px;
    
}
.about{
    color: #41484C;
    padding: 7px;
    font-size: -webkit-xxx-large;
    font-weight: 900;
}
.abt{
	    margin-left: 9px;
    font-weight: 300;
    font-size: 45px;
}

</style>	


<script type="text/javascript">


	
	function anim(cl)
	{
		var b1=$("#"+cl);
		b1.addClass("animated jello");
		//b1.html("Earnings");
	
		
	}
	function anim_out(cl)
	{
		var b1=$("#"+cl);
		b1.removeClass("animated jello");
		//b1.html("<span class='fa fa-inr'></span>");
		
		
	}


</script>


			<?php

	if(isset($_SESSION['c_id']))
							{

								$img_url="images/cp1.png";
								/*echo '<style type="text/css">
											#mainx > section.one{
												background-image: url("images/back.png");
											}
											#mainx section.cover {
														  padding: 3.5em 0;
														}

										</style>
										';*/
							
							}
							else
							{
								$img_url="images/banner.png";
								/*echo '<style type="text/css">
											#mainx > section.one{
												background-image: url("images/banner.png");
											}

										</style>
										';*/
								
							}
						?>


		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	   <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55bce04004651cc2" async="async"></script> -->

	<body>

		<?php include("includes/header.php");

			if(isset($_GET['lo']))
                			{


                			 echo "<script type=\"text/javascript\">
                			 //alert('true');
                			// console.log('sd');
                			  $.amaran({
							 	
							 	'content'   :{
							 		 title:'Sorry!',
							           bgcolor:'#0B5A88',
							           color:'#fff',
							             icon:'fa fa-smile-o',
							             info:'',
							           message:'You Can\'t be logged into both panels at same time'
							         

						        
							       },
							       'theme'     :'colorful',

							       'sticky'    :true,
						         'closeOnClick':true,
						         'outEffect':'slideLeft',
						          'closeButton'   :true,
						           'afterEnd' :function()
								        {
								          // window.location='manage';
								        	$(\".xu\").modal(\"show\");
								        }
						       
						    });
							

							</script>";
							}



		if($rowf['timet']!=1 and $rowf['verifyf']==1)
                			{

                			 echo "<script type=\"text/javascript\">

							 $.amaran({
							 	
							 	'content'   :{
							 		 title:'Just One Step Away!',
							           bgcolor:'#5c8b5c',
							           color:'#f00',
							             icon:'fa fa-smile-o',
							             info:'',
							           message:'Please Update Your Weekly timetable.'
							         

						        
							       },
							       'theme'     :'default',

							       'sticky'    :true,
						         'closeOnClick':true,
						         'outEffect':'slideLeft',
						          'closeButton'   :true,
						           'afterEnd' :function()
								        {
								           window.location='manage';
								        }
						       
						    });

							</script>";
							}
						  
?>
		<!-- mainx -->
			<div id="mainx">
				
				<!-- Intro -->
					<?php
						

						

							echo '<div id="top" class="text-center">
						
							<div class="">';

						if(!isset($_SESSION['c_id'])&&!isset($_POST['forget'])&&!isset($_POST['ok']))

						{
							

							
		echo '<div class="banner">
				<img class="img-responsive" src="'.$img_url.'">
			</div>';
						}
						if(isset($_SESSION['c_id']))
						{

							echo '<div class="banner">
				<img class="img-responsive" src="'.$img_url.'">
			</div>';

							echo '
							<div class="banner2 container">
							<div class="row">

									<div class="col-md-2">
									</div>
										
									<!-- <div class="col-md-2">
										<a data-toggle="modal" data-target=".earn" onmouseover="anim(\'b1\')" onmouseout="anim_out(\'b1\')" id="b1" class="btn btn-lg btn-black scrolly special"><span class="fa fa-inr"></span></a>
									<br>
										<span>Earnings</span>
									</div> -->
									<div class="col-md-3">
										<a href="appointments" onmouseover="anim(\'b2\')" onmouseout="anim_out(\'b2\')" id="b2" class="btn btn-black  btn-lg scrolly special"><span class="fa fa-calendar"></span></a><br><span>Appointments</span>

									</div>
									<div class="col-md-3">
										<a href="manage" onmouseover="anim(\'b3\')" onmouseout="anim_out(\'b3\')" id="b3" class="btn btn-lg  btn-black scrolly special"><span class="fa fa-cogs"></span></a><br><span>Timetable</span>

									</div>
									<div class="col-md-3">
										<a href="profile" onmouseover="anim(\'b4\')" onmouseout="anim_out(\'b4\')" id="b4" class="btn btn-lg  btn-black scrolly special"><span class="fa fa-edit"></span></a><br><span>Profile</span>

									</div>
									<!-- <div class="col-md-2">
										<a href="boost" onmouseover="anim(\'b5\')" onmouseout="anim_out(\'b5\')" id="b5" class="btn btn-lg  btn-info scrolly special" ><span class="fa fa-rocket"></span></a><br><span>Boost Business</span>

									</div> -->
									<div class="col-md-2">
									</div>
								
								
							</div>
							</div>



						






							';
							if($rowf['timet']==1 and $rowf['verifyf']==1)
							{
								$lnk='https://ecounsellors.in/'.$url_men.'/'.$rowf['fname'].'-'.$rowf['lname'].'/'.$rowf['sub_id'];
							echo '<div class="12u"><center><h4>Your Profile link: <a href="'.$lnk.'" target="_blank" style="color: #528A97;">'.$lnk.'</a></h4></center></div>';
						}
							

							
						}
						else if(!isset($_POST['forget'])&&!isset($_POST['ok']))
						{
							if($agent==1)
							{
							//echo '<a href="#loginz" class="button scrolly">Sign In/Sign Up</a>';
							}
							else
							{
								echo '<button type="button" class="button "><a href="#in">Sign In</a></button>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="button "><a href="#out">Sign Up</a></button>';
							}

						}?>
							

						</div>
					</div><!-- mainx div id="top" -->
					<div id="loginz"></div>
					
				<!-- Portfolio -->


<section class="three">
				<div class="container" >
					<?php
					if(isset($_POST['forget'])&&!isset($_SESSION['c_id'])&&!isset($_POST['ok']))
					{
						echo '<header></header><h2 class="text-center">Submit your Email Id to reset your password </h2>
						<form role="form" method="POST" action="">
						<div class="row">
						<div class="3u"></div>
						<div class="6u">
						<input class="" id="" type="email"  name="emailid" required placeholder="Email" value=""><br>
						<button class="button"  type="submit" name="ok" >Submit</button>
						</div>
						<div class="3u"></div>
						</form>
						</div>';

					}
					if(isset($_POST['ok']))
					{

						$flag=0;



						{

							$emailid= strip_tags($_POST['emailid']);

											//$password= md5(strip_tags($_POST['password']));

							$result=query("select * from c_users WHERE emailid='$emailid'");

							$num=mysqli_num_rows($result);
							$row=mysqli_fetch_assoc($result);

							if($num==1) 
							{
								extract($row);


								$flag=1;


							}

							else

								echo '</br><h1 style="text-align:center;">You are not a member of <a href="index">Ecounsellors.IN</a>,<br><form role="form" method="POST" action=""><button class="btn-primary"  type="submit" name="forget" >Try Again!</button> OR <button type="button" class="btn-primary" data-toggle="modal" data-target=".xt">Sign Up</button></form></h1>';

							if($flag==1)
							{
								require_once('mail2.php');
								$rand=random_string2(6);
								$pass=($rand);
								query("UPDATE c_users SET password='$pass' where emailid='$emailid'");

								//$url="https://cashwaapas.com/process.php?key=".$rand;

								$headers = "support@ecounsellors.in";
								$html_customer = "<h3>Hello $name,</h3><br>We received your request for new password.<br><br>This is your new password:  <strong>$rand</strong><br> You can change password from your profile after log-in.<br><a href='https://ecounsellors.in/cp/profile'>Click Here!</a> to login.<br>We are happy to help you. <br><br>Happy Counselling. <br><br>Regards<br>Ecounsellors Team<br><br><br> For Support/Suggestions drop a mail at <a href='mailto:support@ecounsellors.in'> support@ecounsellors.in</a> ";

								mailman2($emailid, "Password Recovery", $html_customer, $name,$headers,"Ecounsellors.in Support");


								echo '<h3 style="font-size:35px;text-align:center;">Please check your email for new password and then <button type="button" class="btn-primary" data-toggle="modal" data-target=".xu">LogIn</button></form></h1>.</h3>';
							}

						}


					}

					if(!isset($_SESSION['c_id'])&&!isset($_POST['forget'])&&!isset($_POST['ok'])){
						
						if($agent==1)
						{
							echo '<header>
						
						</header>';
						echo '<button type="button" class="button " data-toggle="modal" data-target=".xu">Sign In</button>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="button " data-toggle="modal" data-target=".xt">Sign Up</button>';
						}
						

					}
					else if(!isset($_POST['forget'])&&!isset($_POST['ok'])){

						/*echo '<header>
						<h1>Log Out:</h1>
						</header>


						


						<a href="logout.php" class="button " style="margin-left: 30px;" >Log Out</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						';*/
					}?>

<?php 
if(!isset($_POST['forget'])&&!isset($_SESSION['c_id']))
{

if($agent==1){

					echo '<div class="modal fade bs-example-modal-md xu" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="modal-title" style="color: rgb(0, 190, 242);">Sign In: </h2> 
								</div>
								<div class="modal-body">
									<p>
										<form role="form" >
											<div class="row">
												<div class="3u"></div>
												<div class="6u">
													<input class="" id="emailid" type="email"  name="emailid" pattern="^[\w\s!@#\$%\^&\*\+\.\?]{6,30}" required placeholder="Email">
												</div>
												<div class="3u"></div>
											</div>
											<div class="row">
												<div class="3u"></div>
												<div class="6u">
													<input class="" id="password" type="password" name="password" required  placeholder="Password"></br>

												</div>
												<div class="3u"></div>
											</div>

										
										<button class="button" id="login" type="submit" name="login" >Sign In</button>
									</form>
									<form method="post" action="">
									<h1 style="text-align:center;"><button type="submit" class="btn btn-info" href="resetpassword" name="forget">Forgot Password?</button></h1>
									<div class="login_result" style="text-align:center;" id="login_result"></div>
								</form>

								</p>
							</div>
							<div class="modal-footer">
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->











				<div class="modal fade bs-example-modal-md xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h2 class="modal-title" style="color: rgb(0, 190, 242);">Sign Up:</h2>
							</div>
							<div class="modal-body">
								<p>
									<form role="form">
										<div class="row">
											<div class="3u"></div>
											<div class="6u">
												<input class="" id="name2" type="text" name="name" placeholder="Full Name">
											</br>
											<input class="" id="emailid2" type="email" name="emailid" placeholder="Valid Email ID"><br>
											<input class="" id="ph" maxlength="10" type="number" name="ph" placeholder="10 digit mobile number">
										</div>
										<div class="3u"></div>
									</div>
									<div class="row">
										<div class="3u"></div>
										<div class="6u">
											<input class="" id="password2" type="password" name="password" placeholder="Password"></br>
											<input class="" id="cpassword2" type="password" name="cpassword" placeholder="Confirm Password"></br>
										</div>
										<div class="3u"></div>
									</div>
									

								
								<button class="button " type="submit" id="signup" name="signup" >Sign Up</button>
							</form>
							
						</p>
					</div>
					<div class="modal-footer">
						<div class="login_result2" style="text-align:center;" id="login_result"></div>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->';

}
else
{

echo '<section id="in" class="two">
					<header>
						<h1>Sign In</h1>
						</header>
							<form role="form" >
											<div class="row">
												<div class="3u"></div>
												<div class="6u">
													<input class="" id="emailid" type="email"  name="emailid" pattern="^[\w\s!@#\$%\^&\*\+\.\?]{6,30}" required placeholder="Email">
												</div>
												<div class="3u"></div>
											</div>
											<div class="row">
												<div class="3u"></div>
												<div class="6u">
													<input class="" id="password" type="password" name="password" required  placeholder="Password"></br>

												</div>
												<div class="3u"></div>
											</div>

										
										<button class="button " id="login" type="submit" name="login" >Sign In</button>
									</form>
									<form method="post" action="">
				<h1 style="text-align:center;"><button type="submit" class="btn btn-info" name="forget">Forgot Password?</button></h1>
									</form>
							<div class="login_result" id="login_result"></div>
</section>



<section id="out" class="">
<header>
						<h1>Sign Up</h1>
						</header>
							<form role="form">
										<div class="row">
											<div class="3u"></div>
											<div class="6u">
												<input class="" id="name2" type="text" name="name" placeholder="FULL NAME">
											</br>
											<input class="" id="emailid2" type="email" name="emailid" placeholder="Valid Email ID"><br>
											<input class="" id="ph" maxlength="10" type="number" name="ph" placeholder="10 digit mobile number">

										</div>
										<div class="3u"></div>
									</div>
									<div class="row">
										<div class="3u"></div>
										<div class="6u">
											<input class="" id="password2" type="password" name="password" placeholder="Password"></br>
											<input class="" id="cpassword2" type="password" name="cpassword" placeholder="Confirm Password"></br>
										</div>
										<div class="3u"></div>
									</div>
									

								
								<button class="button " type="submit" id="signup" name="signup" >Sign Up</button>
							</form>
							<div class="login_result2" id="login_result"></div>
</section>';}}?>

<!-- About Me -->
<section id="about" class="three">
	<div class="container">

		<br>
			<h2 class="about">About <span class="abt">Us</span></h2>
		
<h3 class="text-left">
	Ecounsellors is an online platform which bridges the gap between a Mentor and the Mentee with time based approach through real time communication. We wish to help our clients in saving time and energy and reach Mentors at anytime from anywhere through an easy to manage appointment system.  <br><br>

With a very flexible timetable updating system we make sure that the Mentoring sessions doesn't overlap with your busy schedules. While you are mentoring, Ecounsellors takes 100% responsibility in coordinating the appointments and make sure that your Perfect advice combines with the flawless technology.</h3>
		</div>
	</section>

	<!-- Contact -->
	<section id="contact" class="four">
		<div class="container">

			<header>
				<h2 class="about">Contact<span class="abt">Us</span></h2>
			</header>

<?php 
					if(!isset($_POST['msg']))
					{?>
			<form method="post" action="#contact">
				<div class="row 50%">
					<div class="6u"><input type="text" name="name" placeholder="Full Name" value="<?php if(isset($_SESSION['c_id'])){ echo $rowu['name']; } ?>" required/></div>
					<div class="6u"><input type="text" name="emailid" placeholder="Email" value="<?php if(isset($_SESSION['c_id'])){ echo $_SESSION['c_id']; } ?>" required/></div>
				</div>
				<div class="row 50%">
					<div class="12u">
						<input type="text" name="subject" placeholder="Subject" required/><br>
						<textarea name="message" placeholder="Message" required></textarea>
					</div>
				</div>
				<div class="row">
					<div class="12u">
						<button type="submit" class="button" name="msg" style="margin-right: 40px;">Send Message</button>
				</div>
				 <div class="col-lg-4 col-lg-offset-2 text-center">
        <i class="fa fa-phone fa-3x wow bounceIn"></i>
        <p>+918470034345</p>
      </div>
      <div class="col-lg-4 text-center">
        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
        <p>support@ecounsellors.in</p>
      </div>
			</form>

			<?php }
					if(isset($_POST['msg']))
					{
								require_once('mail2.php');
								$name=$_POST['name'];
								$headers = $_POST['emailid'];
								$subject=$_POST['subject'];

								$emailid = "support@ecounsellors.in";
								$message = $_POST['message'];

								mailman2($emailid, $subject, $message, "Counsellor support",$headers,$name);


								echo '<h3 style="font-size:35px;text-align:center;">Message sent successfully.<p>We will get back to you shortly.</p></h3>';
					}



			?>

		</div>
	</section>

</div>




	</div>
</section>
































			
			</div>

		<!-- Footer -->
							<?php include_once("templates/footer.php"); 
//if($rowf['verifyf']==1)
{

function paid($amt)
{
	//$amt=float($amt);
	$amt1=($amt-($amt/5));
	return $amt1;
}


$q1=query("SELECT * from meet where confirm='1' and c_id='$cid'");
$nq1=mysqli_num_rows($q1);


if($nq1>0)
{
	while($rq1=mysqli_fetch_array($q1))
	{
		
		$total_amt+=paid($rq1['paid']);
	}
	$total_amt=number_format($total_amt,2);
}
else
{
	$total_amt=number_format(0,2);
}
$q2=query("SELECT * from meet where confirm='1' and (status='' or status='r') and bnk_status='0' and c_id='$cid'");
$nq2=mysqli_num_rows($q2);
if($nq2>0)
{
while($rq2=mysqli_fetch_array($q2))
{
	
	$amt_received+=paid($rq2['paid']);
}
	$amt_received=number_format($amt_received,2);
}
else
{
	$amt_received=number_format(0,2);
}
$q3=query("SELECT * from meet where confirm='1' and status='1' and bnk_status='0' and c_id='$cid'");
$nq3=mysqli_num_rows($q3);
if($nq3>0)
{
while($rq3=mysqli_fetch_array($q3))
{
	
	$amt_confirmed+=number_format(paid($rq3['paid']),2);
}
	$amt_confirmed=number_format($amt_confirmed,2);
}
else
{
	$amt_confirmed=number_format(0,2);
}
$q4=query("SELECT * from meet where confirm='1' and status='2' and bnk_status='0' and c_id='$cid'");
$nq4=mysqli_num_rows($q4);
if($nq4>0)
{
while($rq4=mysqli_fetch_array($q4))
{
	
	$amt_hold+=number_format(paid($rq4['paid']),2);
}
	$amt_hold=number_format($amt_hold,2);
}
else
{
	$amt_hold=number_format(0,2);
}
$q5=query("SELECT * from meet where confirm='1' and status='1' and bnk_status='2' and c_id='$cid'");
$nq5=mysqli_num_rows($q5);
if($nq5>0)
{


while($rq5=mysqli_fetch_array($q5))
{
	
	$amt_avail_bnk+=number_format(paid($rq5['paid']),2);
}
	$amt_avail_bnk=number_format($amt_avail_bnk,2);
}
else
{
	$amt_avail_bnk=number_format(0,2);
}
$q6=query("SELECT * from meet where confirm='1' and status='1' and bnk_status='1' and c_id='$cid'");

$nq6=mysqli_num_rows($q6);
if($nq6>0)
{
while($rq6=mysqli_fetch_array($q6))
{

	$amt_t_bnk+=number_format(paid($rq6['paid']),2);
}

}
else
{
    $amt_t_bnk=number_format(0,2);
}


							echo '<div class="modal fade bs-example-modal-lg earn" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h2 class="bleed about modal-title text-center">Earnings</h2> 
								</div>
								<div class="modal-body text-center">


								<div class="thumbnail table-responsive">
								<table class="default table-bordered table">
								 	<tbody>
								 		<tr><th>Total Earnings:</th><td><span class="fa fa-inr"></span> '.$total_amt.'</td></tr>
								 		<tr><th>Amount Received:</th><td><span class="fa fa-inr"></span> '.$amt_received.'</td></tr>
								 		<tr><th>Amount Confirmed:</th><td><span class="fa fa-inr"></span> '.$amt_confirmed.'</td></tr>
								 		<tr><th>Amount On Hold:</th><td><span class="fa fa-inr"></span> '.$amt_hold.'</td></tr>
								 		<tr><th>Amount Available For Bank Transfer:</th><td><span class="fa fa-inr"></span> '.$amt_avail_bnk.'</td></tr>
								 		<tr><th>Amount Transferred to Bank:</th><td><span class="fa fa-inr"></span> '.$amt_t_bnk.'</td></tr>
								 


								 	</tbody>
								 	</table>

								 	</div>

 
								




								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Transaction History 
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">



	<div class="thumbnail table-responsive">
								<table class="default table-bordered table" style="font-size:14px;">


									<thead>
										<tr>
											<th>#</th>
											<th>Booking No.</th>
											<th>Client</th>
											<th>Booking Date</th>
											<th>App. Date</th>
											<th>App. Time</th>
											<th>Amount</th>
											<th>EC Fee(20%)</th>
											<th>You Get</th>
											<th>Status</th>
											<th>Bank Transfer Date</th>
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from meet where confirm='1' and c_id='$cid' order by id desc");
								 	$count=1;
								 	while($rq6=mysqli_fetch_array($q6))
								 	{
								 		$uid=$rq6['u_id'];
								 		$query_u=query("SELECT * from u_users where u_id='$uid'");
								 		$row_u=mysqli_fetch_array($query_u);


								 		echo '<tr>
								 		<td>'.$count.'</td>
								 		<td>'.$rq6['bno'].'</td>
								 		<td>'.$row_u['name'].'</td>
								 		<td>'.date("jS M'y D",$rq6['btime']).'</td>
								 		<td>'.date("jS M'y D",$rq6['date']).'</td>
								 		<td>'.$rq6['slot'].'</td>
										<td><span class="fa fa-inr">'.number_format($rq6['paid'],2).'</span> </td>
										<td><span class="fa fa-inr">'.number_format(($rq6['paid']/5),2).'</span> </td>
										<td><span class="fa fa-inr">'.number_format(paid($rq6['paid']),2).'</span> </td>';

										if($rq6['confirm']=='1' and $rq6['status']=='' and $rq6['bnk_status']=='0')
											echo '<td class="">Appointment Pending</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' and $rq6['bnk_status']=='0')
											echo '<td class="btn-info">Appointment Successful</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='2' and $rq6['bnk_status']=='0')
											echo '<td class="btn-warning">Claim Raised</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='r' and $rq6['bnk_status']=='0')
											echo '<td class="btn-info" style="    background-color: indigo;">Appointment Rescheduled</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='c' and $rq6['bnk_status']=='0')
											echo '<td class="btn-danger">Appointment Cancelled</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='2' and $rq6['bnk_status']=='0')
											echo '<td class="btn-warning">Claim Raised</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='4' and $rq6['bnk_status']=='0')
											echo '<td class="btn-danger">Claim Approved(User\'s Favour)</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='3' and $rq6['bnk_status']=='0')
											echo '<td class="btn-info">Claim Rejected(Counsellor\'s Favour)</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' and $rq6['bnk_status']=='2')
											echo '<td class="btn-primary">Avail. for bank Transfer</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' and $rq6['bnk_status']=='1')
											echo '<td class="btn-success">Amount Transferred To Bank</td>';


										echo '<td>'.date("",$rq6['bnk_date']).'</td>

								 		</tr>';

								 	$count++;
								 		
								 }

								 	echo '</tbody>
								 	</table>

	</div>




      </div>
    </div>
  </div>










								
									
							</div>
							<div class="modal-footer">
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->';
			}

				 ?>



	</body>
</html>



<script src="js/custom.js"></script>




	
