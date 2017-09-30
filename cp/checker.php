<?php

include("../includes/config.php");
//@session_start();



if(isset($_POST['action']) && $_POST['action'] == 'login')
{	
	
	$flag=0;
	$emailid= strip_tags($_POST['emailid']);
	if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) 
	{
		echo 2;

	}
	else
	{
		//$password= md5(strip_tags($_POST['password']));
		$password= (strip_tags($_POST['password']));

		$result=query("select * from c_users WHERE emailid='$emailid' and password='$password'");

		$num=mysqli_num_rows($result);

		if($num==1) 
		{
			$flag=1;
			$_SESSION['c_id']=$emailid;
			$c_id=$_SESSION['c_id'];

			$cookie_name = "pk2";
						$cookie_value = en_de('en',$c_id);
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");


			echo 1;

		}

		else
		{
						//echo '<h3 style="text-align:center;color:#666;">Email ID and Password Combination is incorrect. Please try again.</h3>';
						//echo '<h3 style="text-align:center;color:#666;">Password is incorrect <a href="resetpassword.php">Reset</a> in case you forget</h1></h3>';
			echo 0;
		}
	}
}









if(isset($_POST['action']) && $_POST['action'] == 'signup')

	{	$flag=0;

		$emailid= strip_tags($_POST['emailid']);

		$query = query("SELECT emailid FROM c_users WHERE emailid='$emailid'");

		if(mysqli_num_rows($query))
		{

					//echo '<h2 style="text-align:center;">Email ID already registered.</h2>';
			echo 0;

			$flag=1;

		}

		$name= ucfirst(strip_tags($_POST['name']));

		$password=  (strip_tags($_POST['password']));
		$ph=  (strip_tags($_POST['ph']));

		$cpassword=  (strip_tags($_POST['cpassword']));

		if($password!=$cpassword && !$flag){

					//echo '<h2 style="text-align:center;">Passwords does not Match. Please try again.</h2>';
			echo 1;
			$flag=1;

		}

		if(!$flag && query("INSERT INTO c_users(emailid,name,password,phone,timestamp,ip) values('$emailid','$name' ,'$password','$ph','$time','$ip')"))
		{
			

			echo 3;
			$_SESSION['c_id']=$emailid;
			$c_id=$_SESSION['c_id'];

			$cookie_name = "pk2";
						$cookie_value = en_de('en',$c_id);
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");
			//$rand=random_string2(50);

	require_once('mail.php');
						require_once('mail2.php');
						$headers = "support@ecounsellors.in";
						
						
						$sub="We are pleased to meet you :-)";

						
						



						//$rand=random_string2(50);
					
					$html='
					<html>
<head>
	
</head>
<style type="text/css">
	



body {
    padding: 0;
    margin: 0;
}

.btn-pink {
  color: #fff;
  background-color: #FF6B57;
  border-color: #FF6B57;
  width:40%;
  ;}

  .fa {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  transform: translate(0, 0);
}
  .fa-envelope:before {
  content: "\f0e0";
}
.fa-twitter:before {
  content: "\f099";
}

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
    *[class="table_width_100"] {
		width: 96% !important;
	}
	*[class="border-right_mob"] {
		border-right: 1px solid #dddddd;
	}
	*[class="mob_100"] {
		width: 100% !important;
	}
	*[class="mob_center"] {
		text-align: center !important;
	}
	*[class="mob_center_bl"] {
		float: none !important;
		display: block !important;
		margin: 0px auto;
	}	
	.iage_footer a {
		text-decoration: none;
		color: #929ca8;
	}
	img.mob_display_none {
		width: 0px !important;
		height: 0px !important;
		display: none !important;
	}
	img.mob_width_50 {
		width: 40% !important;
		height: auto !important;
	}
    
    
    
}
.table_width_100 {
	width: 680px;}
    

    
    .video-container {
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 30px;
	height: 0;
	overflow: hidden;
}

.video-container iframe,  
.video-container object,  
.video-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.resp{
	  display: block;
  max-width: 100%;
  height: auto;
}
    
    
</style>










<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tr><td>
	<!-- padding --><!-- padding --><div style="height: 20px; line-height: 80px; font-size: 10px;"></div>
	</td></tr>
	<!--header -->
	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding -->
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left"><!-- 

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
						<tr><td align="left" >
							<!-- padding -->
							<table width="115" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="left" valign="top" class="mob_center">
									
                                     <a href="https://ecounsellors.in" target="_blank" style="text-decoration:none;">
									<font face="georgia;font-size: 33px;" size="3" color="#00bef2">
                                   <img src="http://ecounsellors.in/images/mail/head.png" width="200" height="60" alt="Ecounsellors.in" border="0" style="display: block;" /></font></a>
								</td></tr>
							</table>						
						</td></tr>
					</table></div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align="right">
				<![endif]--><!-- 

				Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
					<table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
						<tr><td align="right" valign="middle">
							<!-- padding --><div style="height: 10px; line-height: 10px; font-size: 5px;"></div>
							<table width="100%" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="right">
									<!--social -->
									<div class="mob_center_bl" style="width: 88px;">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr><td width="30" align="center" style="line-height: 19px;">
											<a href="https://www.facebook.com/ecounsellors" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="http://artloglab.com/metromail/images/facebook.gif" width="10" height="19" alt="Facebook" border="0" style="display: block;" /></font></a>
										</td><td width="39" align="center" style="line-height: 19px;">
											<a href="https://twitter.com/EcounCare" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="http://artloglab.com/metromail/images/twitter.gif" width="19" height="16" alt="Twitter" border="0" style="display: block;" /></font></a>
										</td></tr>
									</table>
									</div>
									<!--social END-->
								</td></tr>
							</table>
						</td></tr>
					</table></div><!-- Item END--></td>
			</tr>
		</table>
		<!-- padding --><div style="height: 10px; line-height: 10px; font-size: 5px;"></div>
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<!-- padding --><div style="height: 30px; line-height:30px; font-size: 5px;"></div>
				
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					<h1>Hi '.strtok($name,' ').',</h1><p align=left> Welcome to ecounsellors, your portal to provide services to people from the comfort of your workplace. We are happy to have you as part of counsellors panel where you can expand your reach to millions of people all over world who are in need of counselling and consultance to overcome their problems.<br><br>

Get the most of our website by letting us know more about you!<br><br>

Just few more steps to complete your verification and you can be a part of our team. After that just sit back and relax while we approve your request. By signing up with us you are agreeing to our <a href="http://ecounsellors.in/cp/terms-and-conditions" target="_blank">Terms and Conditions</a>.
                        </p><br>
                       
 <h3 align=center>Please Use Latest version of Google Chrome.</h3>     
					</span></font>
				</div>
				
			</td></tr>
                
                <tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							<a href="http://ecounsellors.in/cp" target="_blank" style="display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;


  color: #fff;
  background-color: #FF6B57;
  border-color: #FF6B57;
  width:40%;" >Click Here!</a>

   <br>    <div style="line-height:22px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#41484C" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #00bef2;">
                        
					<h3 style="color: #FFF;
background-color: #337AB7;
border-radius: 20px;
border: 4px solid #5CB85C;
padding: 10px 0;
font-size: 21px;">Your panel url is: c.ecounsellors.in </h3>
                    
                       <div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #00bef2;">
                        <h2>HOW TO GET STARTED?</h2>
					</span></font>
				</div>
                     
                  
                  
	
    <a target="_blank" href="https://youtu.be/mSF1G0np80E"><img class="resp" src="http://ecounsellors.in/images/mail/video_ct.png"  style="max-height: 350px;"></a>


   

                        <br>  
                        
                        <div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #00bef2;">
                       <h3>  We’ll happily clear up any questions or concerns that you have about Ecounsellors, suggestions are always welcome.</h3>
					</span></font>
				</div>
                        
                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="4" color="#596167">
	<img src="http://ecounsellors.in/images/mail/env1.png" style="height:20px;"> <a style="color:#000;" href="mailto:support@ecounsellors.in">support@ecounsellors.in</a>
                        <br><br>
                            
                          <a href="https://twitter.com/EcounCare" target="_blank"><span style="color:#000;"> 
                          	<img src="http://ecounsellors.in/images/mail/tw1.png" style="height:20px;">@EcounCare<br></span></a> 
                            <h2 style="color:#41484C ;">HAPPY COUNSELLING!</h2>
<br><p style="color:#41484C ;" align="left">
Love and Regards,
<br>
 Team Ecounsellors
 

                         </font>  
                    
				</div>
				<!-- padding --><div style="height: 10px; line-height: 10px; font-size: 5px;"></div>
			</td></tr>
                
			
		</table>		
	</td></tr>
	<!--content 1 END-->

	
	

	
	
	<!--footer -->
	<tr><td class="iage_footer" align="center" bgcolor="#ffffff">
		<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 5px;"></div>	
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					&copy; 2015 Ecounsellors.in All rights reserved.
				</span></font>				
			</td></tr>			
		</table>
		
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>	
	</td></tr>
	<!--footer END-->
	<tr><td>
	<!-- padding --><div style="height: 20px; line-height: 80px; font-size: 10px;"></div>
	</td></tr>
</table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
 
</td></tr>
</table>
			
</div> 

</html>';
			


				
					//$url="https://cashwaapas.com/verify.php?key=".$rand;

					//sending welcome email to newly signed up customer

					//$headers = "From: info@cashwaapas.com";

					//to be set later

					//$html_customer = "Hi $name,\n\nWelcome to India's biggest online cash saving platform! \n\nHard cash savings are just a click away at www.Cashwaapas.com Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.\n\nWe get commissions for your Click-through and we share them with you. \n\nKeep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) \n\nWe are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you Rupees. \n\nWe are happy to be your service. \n\nKeep saving. \n\nRegards\nCashwaapas Team";

					//mail($emailid, "Welcome to CashWaapas", $html_customer, $headers);



					//sending welcome email to newly signed up customer
					/*require_once('mail.php');
					$headers = "care@cashwaapas.com";
					$html_customer = "Hello and welcome<h3>$name</h3><br>Welcome to India's fastest growing online cash saving platform! <br><br>Hard cash savings are just a click away at <a href='www.Cashwaapas.com'>Cashwaapas.com</a> Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.<br><br>We get commissions for your Click-through and we share them with you. <br><br>Keep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) <br><br>We are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you lots of bucks.<br> <br>We are happy to be at your service. <br><br>Keep saving. <br><br>Regards<br>Cashwaapas Team <br><br><br> For Support/Suggestions drop a mail at care@cashwaapas.com ";

					mailman($emailid, "Welcome to CashWaapas!", $html_customer, $name,$headers,"Cashwaapas");*/


					/*if (strstr($emailid, '@gmail'))
					{

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
					}
					else*/
					{
						mailman2($emailid,$sub, $html, $name,$headers,"Ecounsellors.in");
					}
		}

		else if(!$flag)
		{
			echo 2;
					//echo '<h2 style="text-align:center;">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</h2>';

		}

	}

if(isset($_POST['action'])&& $_POST['action'] == 'change') 
				{
					$flag=0;
					$emailid = strip_tags($_POST['emailid']);

					$password=  (strip_tags($_POST['password']));

					$cpassword=  (strip_tags($_POST['cpassword']));
					
					$result=query("SELECT * FROM c_users WHERE emailid='$emailid'"); 
					
					if(mysqli_num_rows($result)==1)


					{

						
						

						 if($password!=$cpassword)
						{

							echo 0;

							$flag=1;
							//echo '2';

						}
						else if($flag==0)
						{

							$result=query("UPDATE c_users SET password='$cpassword' WHERE emailid='$emailid';");


							//echo '<h1 style="text-align:center;">Password is Successfully Updated visit<a href="profile.php"> Profile</a>.</h1>';
							echo 1;
						}
						
						else
						{
							echo 2;
						}


					}
					else
						echo 3;


					//else{echo '<h1 style="text-align:center;">Link expired.</h1>';}
					

				}

	?>