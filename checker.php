<?php

include("includes/config.php");
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

		$result=query("select * from u_users WHERE emailid='$emailid' and password='$password'");
		$r=mysqli_fetch_array($result);

		$num=mysqli_num_rows($result);

		if($num==1) 
		{
			$flag=1;
			$_SESSION['u_id']=$r['u_id'];
			$_SESSION['emailid']=$emailid;


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
		$phone= strip_tags($_POST['phone']);

		$query = mysqli_query($connection, "SELECT emailid FROM u_users WHERE emailid='$emailid'");

		if(mysqli_num_rows($query))
		{

					//echo '<h2 style="text-align:center;">Email ID already registered.</h2>';
			echo 0;

			$flag=1;

		}

		$name= ucfirst(strip_tags($_POST['name']));

		$password=  (strip_tags($_POST['password']));

		$cpassword=  (strip_tags($_POST['cpassword']));

		if($password!=$cpassword && !$flag){

					//echo '<h2 style="text-align:center;">Passwords does not Match. Please try again.</h2>';
			echo 1;
			$flag=1;

		}

		if(!$flag)
		{

			$r=query("SELECT * FROM u_users ORDER BY id DESC LIMIT 1");
			$res=mysqli_fetch_array($r);
			if($res['u_id']!="")
			{
				$uid=$res['u_id'];
				$uid=ltrim($uid,'u');
				//$uid=$uid+1;
				$uid="u".++$uid;
			}
			else
			{
				$uid="u1";
			}
				//$uid=0;
			query("INSERT INTO u_users(u_id,emailid,phone,name,password,timestamp,ip) values('$uid','$emailid','$phone','$name' ,'$password','$time','$ip')");
			query("INSERT INTO u_userdata(u_id,emailid,timestamp,ip) values('$uid','$emailid','$time','$ip')");

			echo 3;
			$_SESSION['u_id']=$uid;
			$_SESSION['emailid']=$emailid;
			//$rand=random_string2(50);


			//$url="https://cashwaapas.com/verify.php?key=".$rand;

					//sending welcome email to newly signed up customer

					//$headers = "From: info@cashwaapas.com";

					//to be set later

					//$html_customer = "Hi $name,\n\nWelcome to India's biggest online cash saving platform! \n\nHard cash savings are just a click away at www.Cashwaapas.com Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.\n\nWe get commissions for your Click-through and we share them with you. \n\nKeep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) \n\nWe are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you Rupees. \n\nWe are happy to be your service. \n\nKeep saving. \n\nRegards\nCashwaapas Team";

					//mail($emailid, "Welcome to CashWaapas", $html_customer, $headers);



					//sending welcome email to newly signed up customer
			//require_once('mail.php');
					//$headers = "care@cashwaapas.com";
					//$html_customer = "Hello and welcome<h3>$name</h3><br>Welcome to India's fastest growing online cash saving platform! <br><br>Hard cash savings are just a click away at <a href='www.Cashwaapas.com'>Cashwaapas.com</a> Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.<br><br>We get commissions for your Click-through and we share them with you. <br><br>Keep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) <br><br>We are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you lots of bucks.<br> <br>Please visit this link to verify your account:<br>$url<br>We are happy to be at your service. <br><br>Keep saving. <br><br>Regards<br>Cashwaapas Team <br><br><br> For Support/Suggestions drop a mail at care@cashwaapas.com ";

					//mailman($emailid, "Welcome to CashWaapas!", $html_customer, $name,$headers,"Cashwaapas");
					//query("UPDATE users SET verify='$rand',verifys='2' where emailid='$emailid'");
		}

		else if(!$flag)
		{
			echo 2;
					//echo '<h2 style="text-align:center;">Something Went Wrong!<br>Couldn\'t register now. Please try again later.</h2>';

		}

	}

if(isset($_POST['action'])&& $_POST['action'] == 'change') 
				{
					$uid=$_SESSION['u_id'];
					$flag=0;
					$passwordc = strip_tags($_POST['passwordc']);

					$password2=  (strip_tags($_POST['password2']));

					$password3=  (strip_tags($_POST['password3']));
					
					$result=query("SELECT * FROM u_users WHERE u_id='$uid'"); 
					$r=mysqli_fetch_array($result);
					
					if(mysqli_num_rows($result)==1)


					{

						if($passwordc!=$r['password'])
						{
							echo 4;
						}
						

						 else if($password2!=$password3)
						{

							echo 0;

							$flag=1;
							//echo '2';

						}
						else if($flag==0)
						{

							$result=query("UPDATE u_users SET password='$password3' WHERE u_id='$uid';");


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



				if(isset($_POST['action']) && $_POST['action'] == 'rate')
				{	
					$uid=$_SESSION['u_id'];
					$flag=0;
					$review = filter(strip_tags($_POST['review']));

					$rating=  strip_tags($_POST['rating']);
					$title=filter(strip_tags($_POST['title']));
					$cid=$_SESSION['sub_id'];


					if(!$_SESSION['u_id'])
					{
						//$flag=1;
						echo 0;
					}
					if($_SESSION['u_id'])
					{
					$r=query("SELECT * FROM rating where u_id='$uid' and c_id='$cid'");
					$num=mysqli_num_rows($r);
					$r1=query("SELECT * FROM meet where u_id='$uid' and c_id='$cid' and status='1'");
					$num1=mysqli_num_rows($r1);
					$r3=query("SELECT * FROM meet_f where u_id='$uid' and c_id='$cid' and status='1'");
					$num3=mysqli_num_rows($r3);
					$r2=query("SELECT * FROM ques where u_id='$uid' and c_id='$cid' and status='1'");
					$num2=mysqli_num_rows($r2);

					if($num1==0 and $num2==0 and $num3==0)
					{
						echo 3;
						exit();
					}

					if($num==0)
					{
						$flag=1;
					}
					else
					{
						$flag=3;
						//echo 2;
					}


					if($flag==1)
					{
						if(query("INSERT into rating(review,title,rating,u_id,c_id,time,ip,agent) values('$review','$title','$rating','$uid','$cid','$time','$ip','$agent')"))
							{echo 1;}

								$query_c=query("SELECT * from c_userdata where sub_id='$cid'");
								$row_c=mysqli_fetch_array($query_c);
								$r3=query("SELECT * FROM u_users where u_id='$uid'");
								$result3=mysqli_fetch_array($r3);
								$user_name=$result3['name'];
								$emailid2=$row_c['emailid'];
								$cname=$row_c['fname'].' '.$row_c['lname'];
								$name=$row_c['fname'].'-'.$row_c['lname'];
								$link='https://ecounsellors.in/'.$_SESSION['url_men'].'/'.$name.'/'.$cid;

								$headers2 = "care@ecounsellors.in";
							
								require_once('mail2.php');
							$sub2= strtok($cname," ").', '.$user_name." left a review on your profile.";
						$html2='Hi, <b>'.strtok($cname," ").'</b> 
						<br><br>
						Congratulations, you have a new review on your profile.
						<br>
						<br>
						<b>'.$user_name.'</b> left a review on your profile. To see, click on the following link(profile link).<br><br>
						<b>Reviews are at the bottom of the page</b><br>
						<br>
						<a href="'.$link.'">'.$link.'</a>
						<br>
						<br>
											
						<br>
						Regards,<br>
						Team Ecounsellors<br>
						<a href="https://ecounsellors.in">www.ecounsellors.in</a>

						';

						mailman2($emailid2,$sub2, $html2, $cname,$headers2,"Ecounsellors.in");

							

					}

					if($flag==3)
					{
						query("UPDATE rating set review='$review',title='$title',rating='$rating',time='$time' where u_id='$uid' and c_id='$cid'");
						echo 2;
					}

				}



				}









	?>