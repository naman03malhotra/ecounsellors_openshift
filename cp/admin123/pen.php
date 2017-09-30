<?php include('includes/head.php'); 

	
?>

			
			
			<table class="default table">

				<thead><tr>

					<th>#</th>
					<th>Type</th>

					<th>Name</th>

					<th>Gender</th>
					<th>Profile Pic</th>
				
					

					<th>Degree</th>

					<th>Phone</th>
					<th>Email</th>
						<th>Services</th>
					<th>State</th>

					<th>City</th>



					<th>About</th>
					<th>Skills</th>
					<th>Address</th>

					<th>Office Address</th>




					<th>Qualification</th>
					<th>Exp</th>
					<th>Achivements</th>
					
					<th>Age</th>

					
					<th>Status</th>
					<th>Fee</th>
					<th>Reason</th>



				</tr></thead>

				<?php


				$query = query("SELECT * FROM c_userdata  where verifyf!='1' and verifyf!='0' and verifyf!='-1'  ORDER BY id DESC");

				$count=0;
					echo '<tbody>';
				while($r = mysqli_fetch_array($query)){

					$idx=$r['id'];

					echo '<tr id="'.++$count.'">';

					echo '<td>'.$count.'</td>';
					if($r['men']==1)
					{
						$men="Mentor";
					}
					else
					{
						$men="Counsellor";
					}

					echo '<td>'.$men.'</td>';

					echo '<td>'.$r['fname'].' '.$r['lname'].'</td>';

					echo '<td>'.$r['gender'].'</td>';
					echo '<td><a target="_blank" href="'.$r['propic1'].'">Link!</a></td>';



					echo '<td><a target="_blank" href="'.$r['digree'].'">Link!</a></td>';

					echo '<td>'.$r['phone'].'</td>';
					echo '<td>'.$r['emailid'].'</td>';
					echo '<td>'.$r['typec'];
					echo '<br><form action="#'.$count.'" method="POST">

							<input type="hidden" name="id" value="'.$r['id'].'">
							<textarea style="width:100%;padding: 0px 5px;" class="" rows="1"  id="addr" type="text" name="service" required>'.$r['typec'].'</textarea><br>
							
							<button type="submit" class="btn-primary" name="typec">change</button>
							

							</form></td>';

					echo '<td>'.$r['state'].'</td>';

					echo '<td>'.$r['city'].'</td>';

					echo '<td>'.$r['abt'].'</td>';
					echo '<td>'.$r['skills'].'</td>';
					echo '<td>'.$r['addr'].'</td>';

					echo '<td>'.$r['o_addr'].'</td>';



					echo '<td>'.$r['edu'].'</td>';
					echo '<td>'.$r['clg'].'</td>';
					echo '<td>'.$r['pro'].'</td>';
					echo '<td>'.$r['age'].'</td>';

						$xdate=strtotime(date("j M y",$r['date'])." ".date("H:i",$r['time']));
						$tdate=time()+3600;
						$flagz=0;

						if($tdate<=$xdate)
							{
								  $flagz=1;
							}

					    if($r['status']=="" and $flagz==0)
							{
								 query("UPDATE meet set status='1' where id='$idx'");
							}
					

					if(isset($_POST['approve']) && $r['id']==$_POST['id'])
					{
						echo '<td class="btn-success">Approved</td>';
					}

					else if(isset($_POST['disapprove']) && $r['id']==$_POST['id']){

						

						echo '<td class="btn-danger">Rejected</td>';

					}

					else{

							//echo '<td>'.$r['cashwaapas'].'</td>';

						if($r['verifyf']==1)

							echo '<td class="btn-success">Approved</td>';

						else if($r['verifyf']==-1)

							echo '<td class="btn-danger">Rejected</td>';

						else

							echo '<td class="btn-warning">Pending</td>';

					}
					echo '<td>'.$r['f_fee'].'</td>';
					echo '<td>'.$r['reason'].'</td>';

					

					echo '</tr>';

				}

				?>
				</tbody>
			</table>

		
</div>
	</div>

	<?php

	if(isset($_POST['typec'])){

		$sid = $_POST['id'];
		$typec=$_POST['service'];


		query("UPDATE c_userdata SET typec='$typec' WHERE id='$sid'");
		redirect("index");
	}

	if(isset($_POST['approve'])){

		$sid = $_POST['id'];

		$q=query("SELECT * from c_userdata where id='$sid'");
		$row=mysqli_fetch_array($q);
		$name=$row['fname'];
		$emailid=$row['emailid'];



		$headers = "support@ecounsellors.in";
						
						
						$sub='Hey! '.$name.', Welcome Aboard';

						
						



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
					<h1>Congratulations! '.strtok($name,' ').',</h1><p align=left>  You are now a part of Ecounsellors family. We have approved your sign-up request. Now you can sign-in to your account by clicking on the button given below or from the website <strong> c.ecounsellors.in</strong><br><br> Your  next step is to update your timetable by clicking on the manage account button on your panel, in order to get listed on our website. Also please check our boost business feature in order to have more growth rate. </p><br><br>

					<h3 align=left>
					In order to have a smooth appointment procedure:it is mandaory to install these software<br>
					1.Google chrome browser : <a href="https://www.google.com/chrome/browser/desktop/" target="_blank">Download</a><br>
					2.Screencastify for Chrome : <a href="https://chrome.google.com/webstore/detail/screencastify-screen-vide/mmeijimgabbpbgpdklnllpncmdofkcpn?hl=en" target="_blank">Download</a><br>
					3.Teamviewer : <a href="http://download.teamviewer.com/download/TeamViewer_Setup_en.exe" target="_blank">Download</a>


					</h3>
                       

					</span></font>
				</div>
				
			</td></tr>
                
                <tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							<a href="http://ecounsellors.in/cp/manage" target="_blank" style="display: inline-block;
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
                    
                     <!--   <div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #00bef2;">
                        <h2>HOW TO GET STARTED?</h2>
					</span></font>
				</div>
                     
                  
                  
	
    <a target="_blank" href="https://youtu.be/mSF1G0np80E"><img class="resp" src="http://ecounsellors.in/images/mail/video_ct.png"  style="max-height: 350px;"></a>


   

                        <br>  -->
                        
                        <div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #00bef2;">
                       <h3> If you encounter any problem please feel free to contact us.</h3>
					</span></font>
				</div>
                        
                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="4" color="#596167">
	<img src="http://ecounsellors.in/images/mail/env1.png" style="height:20px;"> <a style="color:#000;" href="mailto:support@ecounsellors.in">support@ecounsellors.in</a>
                        <br><br>
                            
                          <a href="https://twitter.com/EcounCare" target="_blank"><span style="color:#000;"> 
                          	<img src="http://ecounsellors.in/images/mail/tw1.png" style="height:20px;">@EcounCare<br></span></a> 
                            <h2 style="color:#41484C ;">HAPPY COUNSELLING!</h2>
<br><p style="color:#41484C ;" align="left">
Regards,
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
			


				
					{
						mailman($emailid,$sub, $html, $name,$headers,"Ecounsellors.in");
					}

		query("UPDATE c_userdata SET verifyf='1' WHERE id='$sid'");

redirect("index");






	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$reason=$_POST['reason'];

			

		$q=query("SELECT * from c_userdata where id='$sid'");
		$row=mysqli_fetch_array($q);
		$name=$row['fname'];
		$emailid=$row['emailid'];



		$headers = "support@ecounsellors.in";
						
						
						$sub="Status Approval Failed";

						
						



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
					<h1>Sorry '.strtok($name,' ').',</h1><p align=left>  We regret to infrom you that, we couldn\'t approve your request due to following reasons:<br> <h3>Reason: '.$reason.' </h3></p><br>
                       

					</span></font>
				</div>
				
			</td></tr>
                
                <tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							<a href="http://ecounsellors.in/cp/#contact" target="_blank" style="display: inline-block;
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
  width:40%;" >Contact Us!</a>

   <br>    <div style="line-height:22px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#41484C" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #00bef2;">
                        
					<h3 style="color: #FFF;
background-color: #337AB7;
border-radius: 20px;
border: 4px solid #5CB85C;
padding: 10px 0;
font-size: 21px;">Please Contact Us so that we me help you. </h3>
                    
                      
                  
                  
	


   

                        <br>  
                        
                        <div style="line-height: 20px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #00bef2;">
                       <h3> If you encounter any problem please feel free to contact us.</h3>
					</span></font>
				</div>
                        
                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="4" color="#596167">
	<img src="http://ecounsellors.in/images/mail/env1.png" style="height:20px;"> <a style="color:#000;" href="mailto:support@ecounsellors.in">support@ecounsellors.in</a>
                        <br><br>
                            
                          <a href="https://twitter.com/EcounCare" target="_blank"><span style="color:#000;"> 
                          	<img src="http://ecounsellors.in/images/mail/tw1.png" style="height:20px;">@EcounCare<br></span></a> 
                            <h2 style="color:#41484C ;">HAPPY COUNSELLING!</h2>
<br><p style="color:#41484C ;" align="left">
Regards,
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
			


				
					{
						mailman($emailid,$sub, $html, $name,$headers,"Ecounsellors.in");
					}




		query("UPDATE c_userdata SET verifyf='-1',reason='$reason' WHERE id='$sid'");
		redirect("index");

	}

	?>

</body>
