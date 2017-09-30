<?php


include('../includes/config.php');


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['vx']))
{



	$sub=$_POST['sub'];
	$vx=$_POST['vx'];
	$uid=$_SESSION['u_id'];
	$flag=0;
	$flag2=0;
	$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
	$rowf=mysqli_fetch_array($rdf);	

	$res=query("SELECT * FROM meet_f where u_id='$uid' and c_id='$sub' and confirm='1' and status=''");
	$result=mysqli_fetch_array($res);
	$num=mysqli_num_rows($res);
	$res2=query("SELECT * FROM meet_f where u_id='$uid' and c_id='$sub' and confirm='0'");
	$result2=mysqli_fetch_array($res2);

	$r3=query("SELECT * FROM u_users where u_id='$uid'");
	$result3=mysqli_fetch_array($r3);

	$rand=random_string2(7);
	$_SESSION['rand_f']=$rand;
	//$bno=random_string(7);
	$r=query("SELECT * FROM meet_f ORDER BY id DESC LIMIT 1");
			$res=mysqli_fetch_array($r);
			if($res['bno']!="")
			{
				$bno=$res['bno'];
				$bno=ltrim($bno,'ECF');
				//$bno=$bno+1;
				$bno="ECF".++$bno;
			}
			else
			{
				$bno="ECF101";
		
			}


			 $type=$result['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Phone";
          }

$credits=$result3['credits'];
$fx=0;
if ($result3['phone']=="") 
{
	echo '<div class="modal-header">
	<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>
	<h4 class="text-center"><span class="label label-info" id="qid">Update Phone Number</span></h4>';
	echo '</div><br><h2 style="text-align:center;">Please Update your phone number first:</h2><br>
	<center>
	<form method="post" action="">
	<input id="ph" name="phone" class="form-control" required minlength="10" maxlength="14" placeholder="+91" style="width: 40%;"><br>
	<button type="submit" name="sub_f" class="btn btn-info">Update</button>
	</form>
	</center>';
	$fx=1;
}
else if($credits<-10000)
{

	echo '<div class="modal-header">
	<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>
	<h4 class="text-center"><span class="label label-info" id="qid">Low Credits</span></h4>';
	echo '</div><br><h3 style="text-align:center;">You Need Atleast 200 Credits For a Free Session</h3><br>
	<center>
	<h3 class="label label-success ref">Credits You have: '.$credits.'</h3><br>
	<h2>Your Referral code is:<br><br><span class="label label-primary ref">'.$result3['ref'].'</span><br><br> Ask your friends to sign up using this code to earn more credits<br><a href="profile?earn">Click Here!</a> to know more</h3>

	</center>';
	$fx=1;


}

if($fx==0)
{
	if($num==0)
	{
		$flag=1;
		//echo "true";
	}
	if(mysqli_num_rows($res2)=='0')
	{
		$flag2=1;
	}
	if($_SESSION['u_id'] AND $flag==1 AND $flag2==1)
	{

		query("INSERT INTO meet_f(type,u_id,c_id,rand,bno) values('$vx','$uid','$sub','$rand','$bno')");
	}
	else
	{
		query("UPDATE meet_f set type='$vx',u_id='$uid',c_id='$sub',rand='$rand' where u_id='$uid' and c_id='$sub' and confirm='0'");
	}
	if($flag=='0')
	{
		$title="Appointment already booked";
	}
	else
		$title="Please select a date.";
	echo ' <div class="modal-header">
	<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

	<h4><span class="label label-info" id="qid">2</span>'.$title.'</h4>
	</div>
	<div class="modal-body" >
	<div class="col-md-3 col-md-offset-5 col-xs-offset-4">
	<div id="loadbar_f" style="display: none;">
	<div class="blockG" id="rotateG_01"></div>
	<div class="blockG" id="rotateG_02"></div>
	<div class="blockG" id="rotateG_03"></div>
	<div class="blockG" id="rotateG_04"></div>
	<div class="blockG" id="rotateG_05"></div>
	<div class="blockG" id="rotateG_06"></div>
	<div class="blockG" id="rotateG_07"></div>
	<div class="blockG" id="rotateG_08"></div>
	</div>
	</div>

	<div class="quiz" id="quiz_f" data-toggle="buttons">

	<p style="text-align:center;">';
	if($_SESSION['u_id'] AND $flag==1)
	{

		date_default_timezone_set("Asia/Kolkata");
		$t=time();


		$z=$t+86400*7;
		echo '<select id="date" onchange="setdate_f(\''.$rand.'\')" class="btn dropdown-toggle selectpicker btn-info" name"date" class="selectpicker" data-style="btn-info" style="
		font-size: 20px;
		">
		<option value=""  style="display:none">Select a date</option>';

		while($z-$t>0)
		{
			$time=date("jS M'y l",$t);
			echo' <option value='.$t.'>'.$time.'</option>';
			$t+=86400;
		}

		echo' </select>


		</p>
		</div>';
	}
	else if($flag==0)
	{
		echo '<h2 class="text-center">You have already booked an appointment with this Counsellor.</h2>';
		echo '<table class="table table-hover table-bordered"> 

		<tr><th>Counsellor:</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
		<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$result['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>
		<tr><th>Phone:</th><td>'.$result3['phone'].'</td></tr>

		</table>';
		echo '</div><br><p style="text-align:center;"><a href="/appointments" class="btn btn-info">View Appointments</a></p>';
	}
	else
	{
		echo '<h3 style="color:red;">You are not logged In, please <button type="submit" class="btn btn-info" data-toggle="modal" data-target=".xu" style="margin-top:8px;">Sign Up/Log In</button></li> First.</h3>';
	}


}

}


if(isset($_POST['setdate']))

{	

	$rand=$_SESSION['rand_f'];

	$dx=$_POST['setdate'];
	$uid=$_SESSION['u_id'];
	
	$adate=date("jS M y D",$dx);
	
	//$exrand=md5(rand());
	$efrow=query("UPDATE meet_f SET date='$dx',adate='$adate' where u_id='$uid' and rand='$rand'");

	//$efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);
if($efrow){
//query("UPDATE meet_f SET dt='$adx' where u_id='$uid' and rand='$rand'");
$r=query("SELECT * FROM meet_f where u_id='$uid' and rand='$rand'");
$result=mysqli_fetch_array($r);
$sub=$result['c_id'];
$rd=query("SELECT * From timetable_f where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$slotx=array();
$query=query("SELECT * FROM meet_f where c_id='$sub' and confirm='1' and adate='$adate'");
$i=0;
while($rowck=mysqli_fetch_array($query))
{
$slotx[$i]=$rowck['slot'];
$i++;
}

//echo $slotx[0];

echo ' <div class="modal-header">
<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

<h4><span class="label label-info" id="qid">3</span> Please select A Time Slot.</h4>
</div>
<div class="modal-body" >
<div class="col-md-3 col-md-offset-5 col-xs-offset-4">
<div id="loadbar_f" style="display: none;">
<div class="blockG" id="rotateG_01"></div>
<div class="blockG" id="rotateG_02"></div>
<div class="blockG" id="rotateG_03"></div>
<div class="blockG" id="rotateG_04"></div>
<div class="blockG" id="rotateG_05"></div>
<div class="blockG" id="rotateG_06"></div>
<div class="blockG" id="rotateG_07"></div>
<div class="blockG" id="rotateG_08"></div>
</div>
</div>

<div class="quiz" id="quiz_f" data-toggle="buttons">
<p style="text-align:center;">';

date_default_timezone_set("Asia/Kolkata");
$t=time();


$z=$t+86400*7;
echo '<select id="date" onchange="setdate_f(\''.$rand.'\')" class="btn dropdown-toggle selectpicker btn-info" name"date" class="selectpicker" data-style="btn-info" style="
font-size: 20px;
">
<option value="'.$result['date'].'" style="display:none;" >'.date("jS M'y l",$result['date']).'</option>';
$date=0;
while($z-$t>0)
{
	$date=date("jS M'y l",$t);
	echo' <option value='.$t.'>'.$date.'</option>';
	$t+=86400;
}

echo' </select><br><br>';
$day=date("D",$result['date']);
$key=$rowd[$day];

$datas=array();
$datas=explode(',', $key);
echo '<form id="mainForm" name="mainForm" style="text-align: center;">';
$flag=0;
$j=0;
$tdate=date("D",time());
foreach ($datas as $data)
{
	

	if($data!="")
	{
		
		$dt= date("h:i", $data) . '-'.date("h:i A", $data+900);
		$test=date("H:i",$data);
		$now=date("H:i",time()+3600*4);

		if(date("D",time()+3600*4)!=$tdate)
			$now=("24".date("H",time()+3600*4)).":".date("i",time()+3600*4);
		
		//query("SELECT * FROM meet_f where slot='$dt' and ");

		$cdate=date("H:i",$data);

		if($test<$now AND $tdate==$day)
		{
			

		}
		else 
		{
			$flagz=0;
			foreach ($slotx as $slots) 
			{
				if($dt==$slots)
				{
					$flagz=1;
				}
			}
			if($flagz==0)
			echo '<span class="btn btn-default"><input required type="radio" name="rads" value="'.$data.'" id="radio">'.$dt.'</input></span><br>'; 
		}
	}
	else
		$flag=1;
$j++;
}
if($flag==0)
echo '<br><button onclick="setime_f(\''.$rand.'\')" class="btn btn-info">Proceed</button></form></p>';
if($flag==1)
{
	echo '<h2>No slot available.<br>Please select some other date.</h2>';
}
echo '</div>
';
}

else
	{echo '<h2>Please Don\'t mess with the code.</h2>';}



}



if(isset($_POST['setime']))

{

	$rand=$_SESSION['rand_f'];
	$dx=$_POST['setime'];
	$uid=$_SESSION['u_id'];
	//$exrand=md5(rand());
	$dt= date("h:i", $dx) . '-'.date("h:i A", $dx+900);

	$efrow=query("UPDATE meet_f SET time='$dx',slot='$dt' where u_id='$uid' and rand='$rand'");

	//$efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);
	if($efrow){

$r=query("SELECT * FROM meet_f where u_id='$uid' and rand='$rand'");
$result=mysqli_fetch_array($r);

$sub=$result['c_id'];
$rd=query("SELECT * From timetable_f where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	
$r2=query("SELECT * FROM u_users where u_id='$uid'");
$result2=mysqli_fetch_array($r2);

$data=$result['slot'];
 $type=$result['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Phone";
          }

echo ' <div class="modal-header">
<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

<h4><span class="label label-info" id="qid">4</span> Booking Confirmation.</h4>
</div>
<div class="modal-body" >
<div class="col-md-3 col-md-offset-5 col-xs-offset-4">
<div id="loadbar_f" style="display: none;">
<div class="blockG" id="rotateG_01"></div>
<div class="blockG" id="rotateG_02"></div>
<div class="blockG" id="rotateG_03"></div>
<div class="blockG" id="rotateG_04"></div>
<div class="blockG" id="rotateG_05"></div>
<div class="blockG" id="rotateG_06"></div>
<div class="blockG" id="rotateG_07"></div>
<div class="blockG" id="rotateG_08"></div>
</div>
</div>

<div class="quiz" id="quiz_f" data-toggle="buttons">
<p style="text-align:center;">';
 $fee=$rowf['fee'];
                $disc=$rowf['disc'];
                
                if($disc!="")
                {
                  $fee2=(int)($fee-(($disc/100)*$fee));
                }
                else
                {
                	$fee2=$fee;
                }

echo '<table class="table table-hover table-bordered"> 

<tr><th>Counsellor:</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
<tr><th>Time Slot:</th><td>'.$data.'</td></tr>
<tr><th>Mode:</th><td>'.$type.'</td></tr>
<tr><th>Your Phone:</th><td>'.$result2['phone'].'</td></tr>
<tr><th>Amount Paid:</th><td>Free</td></tr>

</table>';
$yes="yes";
$no="no";	
// 
// 
// 
// 
// 
// 
// 
// 
// 
// echo '<br><button onclick="confirm_f(\'yes\',\''.$rand.'\')" id="confirm" class="btn btn-primary" value="yes">Confirm</button>&nbsp;<button id="reject" onclick="confirm(\'no\',\''.$rand.'\')" value="no" class="btn btn-danger">Cancel</button></p></div>';

}
else
{
	echo '<h2>Please Don\'t mess with the code.</h2>';
}


}



if(isset($_GET['confirm']))

{

	$rand=$_SESSION['rand_f'];
	$ans=$_GET['confirm'];
	$btime=time();
	//$exrand=md5(rand());
	$flag=0;
	$flag2=0;

	$uid=$_SESSION['u_id'];
	
	if($ans=="yes")
	{

		$efrow=query("UPDATE meet_f SET confirm='1',btime='$btime' where u_id='$uid' and rand='$rand'");

	//$efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);
	if($efrow)

		{
			$flag=1;
		}
		else
		{
			echo '<h2>Please Don\'t mess with the code.</h2>';
		}
	}
else
{
	$efrow=query("UPDATE meet_f SET confirm='-1',btime='$btime',exrand='$exrand' where u_id='$uid' and rand='$rand'");

	//echo $efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);
	if($efrow)

		{
			$flag2=1;
		}
		else
		{
			echo '<h2>Please Don\'t mess with the code.</h2>';
		}
	
}

if($flag==1 or $flag2==1)
{

$r=query("SELECT * FROM meet_f where u_id='$uid' and rand='$rand'");
$result=mysqli_fetch_array($r);
$sub=$result['c_id'];
$rd=query("SELECT * From timetable_f where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	

$data=$result['slot'];
 $type=$result['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Phone";
          }

 $r2=query("SELECT * FROM u_users where u_id='$uid'");
$result2=mysqli_fetch_array($r2);
$credits=$result2['credits'];
$credits-=200;
query("UPDATE u_users set credits='$credits' where u_id='$uid'");
 $fee=$rowf['fee'];
                $disc=$rowf['disc'];
                
                if($disc!="")
                {
                  $fee2=(int)($fee-(($disc/100)*$fee));
                }
                else
                {
                	$fee2=$fee;
                }

echo ' <div class="modal-header">
<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

<h4><span class="label label-info" id="qid">4</span> Congrats!!!.</h4>
</div>
<div class="modal-body" >
<div class="col-md-3 col-md-offset-5 col-xs-offset-4">
<div id="loadbar_f" style="display: none;">
<div class="blockG" id="rotateG_01"></div>
<div class="blockG" id="rotateG_02"></div>
<div class="blockG" id="rotateG_03"></div>
<div class="blockG" id="rotateG_04"></div>
<div class="blockG" id="rotateG_05"></div>
<div class="blockG" id="rotateG_06"></div>
<div class="blockG" id="rotateG_07"></div>
<div class="blockG" id="rotateG_08"></div>
</div>
</div>

<div class="quiz" id="quiz_f" data-toggle="buttons" style="text-align:center;">
<p >';

echo '<table class="table table-hover table-bordered"> 

<tr><th>Counsellor:</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
<tr><th>Time Slot:</th><td>'.$data.'</td></tr>
<tr><th>Mode:</th><td>'.$type.'</td></tr>
<tr><th>Phone:</th><td>'.$result2['phone'].'</td></tr>
<!-- <tr><th>Credits Used:</th><td>200</td></tr> -->



</table></p>';


require_once('../msg.php');

$ph=$result2['phone'];
$message='Your Appointment has been successfully booked with '.strtoupper($cname).':
Date:'.date("jS M'y l",$result['date']).'
Time:'.$data.'
Mode:'.$type.'
Credits Used:200
Thanks!';
if($flag==1)
//send($ph,$message);

$ph=$rowf['phone'];
$message='Congrats! you got an appointment with '.strtoupper($result2['name']).':
Date:'.date("jS M'y l",$result['date']).'
Time:'.$data.'
Mode:'.$type.'
Counselling Type:DEMO
Thanks!';
if($flag==1)
//send($ph,$message);


						require_once('../mail.php');
						require_once('../mail2.php');
						$headers = "care@ecounsellors.in";
						$headers2 = "support@ecounsellors.in";
						$username=$result2['name'];
						$username2=$cname;
						$emailid=$result2['emailid'];
						$emailid2=$rowf['emailid'];
							$emailid3="ecounsellorscare@gmail.com";
						
						$sub="Booking Confirmation!";
						$sub2="Congrats! You got an appointment.";
						
						



						//$rand=random_string2(50);
					
					$html='<html style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;">
<head>
	
</head>
<style type="text/css">
	
	.table td,th{

	  border: 1px solid #ddd;
  padding: 8px;
  line-height: 1.42857143;

}
.table tr:hover{
	background-color: #00bef2;
	color: #fff;
}



body {
    padding: 0;
    margin: 0;
    font-family: "Arial, Helvetica, sans-serif";
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
                                   <img src="https://ecounsellors.in/images/mail/head.png" width="200" height="60" alt="Ecounsellors.in" border="0" style="display: block;" /></font></a>
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
											<img src="https://artloglab.com/metromail/images/facebook.gif" width="10" height="19" alt="Facebook" border="0" style="display: block;" /></font></a>
										</td><td width="39" align="center" style="line-height: 19px;">
											<a href="https://twitter.com/EcounCare" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="https://artloglab.com/metromail/images/twitter.gif" width="19" height="16" alt="Twitter" border="0" style="display: block;" /></font></a>
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

					<h1 style="
    color: #41484C;
">Hi '.strtok($username,' ').',</h1><br>		<h3 style="
    color: #41484C;
">Your free 15 minutes appointment has been successfully booked, which is scheduled as follows:

                        </h3><br>

                        <table class="table"> 

<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;  text-transform: capitalize;">Counsellor:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Date:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.date("jS M'y l",$result['date']).'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Time Slot:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$data.'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Mode:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$type.'</td></tr>
<!-- <tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Credits Used:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">200</td></tr> -->



</table>
<br>
           <h3 align=center>Please Use Latest version of Google Chrome.</h3>            

					</span></font>
				</div>
				
			</td></tr>
                
                <tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							</font></a><a href="https://ecounsellors.in/appointments" target="_blank" style="display: inline-block;
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
  width:40%;">Access Account</a>
                    
                        <br>  <br>  

   

                        <br>  
                        
                        <div style="line-height: 20px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #00bef2;">
                        We’ll happily clear up any questions or concerns that you have about Ecounsellors, suggestions are always welcome.
					</span></font>
				</div>
                        
                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="4" color="#596167">
	<img src="https://ecounsellors.in/images/mail/env1.png" style="height:20px;"> <a style="color:#000;" href="mailto:care@ecounsellors.in">care@ecounsellors.in</a>
                        <br>
                            
                          <a href="https://twitter.com/EcounCare" target="_blank"><span style="color:#000;"> 
                          	<img src="https://ecounsellors.in/images/mail/tw1.png" style="height:20px;">@EcounCare<br></span></a> 
                            <h2>HAPPY COUNSELLING!</h2>
<br><h4 style="
    color: #41484C;
"
align="left">
 Cheers,
<br>
 Team Ecounsellors

                         </h4></font>  
                    
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
			
























$html2='<html style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;">
<head>
	
</head>
<style type="text/css">
	
	.table td,th{

	  border: 1px solid #ddd;
  padding: 8px;
  line-height: 1.42857143;

}
.table tr:hover{
	background-color: #00bef2;
	color: #fff;
}



body {
    padding: 0;
    margin: 0;
    font-family: "Arial, Helvetica, sans-serif";
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
                                   <img src="https://ecounsellors.in/images/mail/head.png" width="200" height="60" alt="Ecounsellors.in" border="0" style="display: block;" /></font></a>
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
											<img src="https://artloglab.com/metromail/images/facebook.gif" width="10" height="19" alt="Facebook" border="0" style="display: block;" /></font></a>
										</td><td width="39" align="center" style="line-height: 19px;">
											<a href="https://twitter.com/EcounCare" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="https://artloglab.com/metromail/images/twitter.gif" width="19" height="16" alt="Twitter" border="0" style="display: block;" /></font></a>
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

					<h1 style="
    color: #41484C;
">Congratulations! '.strtok($username2,' ').',</h1><br>		<h3 style="
    color: #41484C;
"> You have a DEMO appointment, which is scheduled as follows. This is an apportunity waiting to be converted into Paid one. Make Sure You Ask user to rate you on your profile at the end of session.

                        </h3><br>

                        <table class="table"> 

<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;  text-transform: capitalize;">Client\'s Name :</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$username.'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Date:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.date("jS M'y l",$result['date']).'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Time Slot:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$data.'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Mode:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">'.$type.'</td></tr>
<tr><th style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">Counselling TYPE:</th><td style="border: 1px solid #ddd;padding: 8px;line-height: 1.42857143;">DEMO</td></tr>



</table>
<br>
                       
 <h3 align=center>Please Use Latest version of Google Chrome.</h3>     
					</span></font>
				</div>
				
			</td></tr>
                
                <tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							</font></a><a href="https://ecounsellors.in/cp/appointments" target="_blank" style="display: inline-block;
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
  width:40%;">Access Account</a>
                    
                        <br>  <br>  

   

                        <br>  
                        
                        <div style="line-height: 20px;">
					<font face="Arial, Helvetica, sans-serif" size="2" color="#00bef2" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #00bef2;">
                          We’ll happily clear up any questions or concerns that you have about Ecounsellors, suggestions are always welcome.
					</span></font>
				</div>
                        
                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="4" color="#596167">
	<img src="https://ecounsellors.in/images/mail/env1.png" style="height:20px;"> <a style="color:#000;" href="mailto:support@ecounsellors.in">support@ecounsellors.in</a>
                        <br>
                            
                          <a href="https://twitter.com/EcounCare" target="_blank"><span style="color:#000;"> 
                          	<img src="https://ecounsellors.in/images/mail/tw1.png" style="height:20px;">@EcounCare<br></span></a> 
                            <h2>HAPPY COUNSELLING!</h2>
<br><h4 style="
    color: #41484C;
"
align="left">
Regards,
<br>
 Team Ecounsellors

                         </h4></font>  
                    
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

					
					/*if (strstr($emailid, '@gmail'))
					{

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
					}
					else*/
						if($flag==1)
					{
						mailman($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
						mailman($emailid2,$sub2, $html2, $username2,$headers2,"Ecounsellors.in");

						mailman($emailid3,$sub, $html, $username,$headers,"Ecounsellors.in");
					}

					

echo '<h2>Congratulations Appointment Successfully booked!</h2></div>';
echo '<br><p style="text-align:center;"><a href="/appointments#free" class="btn btn-info">View Appointments</a></p>';


}

}


?>