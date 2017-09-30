<?php


include('../includes/config.php');


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['vx']))
{



	$rand=$_POST['vx'];
	$iss=$_POST['iss'];
	$exp=filter($_POST['exp']);
	$uid=$_SESSION['u_id'];
	$flag=0;
	$flag2=0;
	$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
	$rowf=mysqli_fetch_array($rdf);	

	if($_SESSION['u_id'])
	{
		$flag=1;
	}

	if($flag==1)
	{

			$res2=query("SELECT * FROM meet where rand='$rand' and confirm='1' and status='2'");
			$result=mysqli_fetch_array($res2);
			$num2=mysqli_num_rows($res2);

			$query_u=query("SELECT * FROM u_users where u_id='$uid'");
			$row_u=mysqli_fetch_array($query_u);

			$tik=$result['ticket'];
			if($num2==0)
			{
				$r=query("SELECT * FROM meet where status='2' ORDER BY ticket DESC,id desc LIMIT 1");
					$res=mysqli_fetch_array($r);
					if($res['ticket']!='')
					{
						$ticket=$res['ticket'];
						//$bno=ltrim($bno,'TK');
						//$bno=$bno+1;
						//$ticket="TK".++$ticket;
						$ticket=++$ticket;
					}
					else
					{
						$ticket='1001';
				
					}
			if($iss==2)
			{
				$issue="Technology Issue";
			}
			else if($iss==3)
			{
				$issue="Payment Issue";
			}
			else if($iss==4)
			{
				$issue="Other Issue";
			}
			require_once('../mail.php');
			$emailid=$row_u['emailid'];
			$username=$row_u['name'];
			$headers="care@ecounsellors.in";
			$sub="Claim registered with ticket #[$ticket]";
			$html="<h3>Hi $username,</h3>
					<p align=left>your complaint is registered with ticket number <strong>$ticket</strong><br><br>
					Here are the details of the claim<br>
					<strong>Issue:</strong>$issue<br><br>
					<strong>Explaination:</strong>$exp<br><br><br>
					Please provide us some time, we'll get back to you shorty.

					Ecounsellors Team</p>";

			$emailid2="care@ecounsellors.in";
			$sub2="Claim registered with ticket #[$ticket]";
			$html2="<h3>Hi $username,</h3>
					<p align=left>your complaint is registered with ticket number <strong>$ticket</strong><br><br>
					Here are the details of the claim:<br>
					<strong>Issue:</strong>$issue<br><br>
					<strong>Explaination:</strong>$exp<br><br><br>
					Please provide us some time, we'll get back to you shorty.<br><br>

					Ecounsellors Team</p>";
			$username2="care";
			$headers2=$emailid;


			$emailid3="ecounsellorscare@gmail.com";
			mailman($emailid,$sub, $html, $username,$headers,"care");
			mailman($emailid3,$sub2, $html2, $username2,$headers2,$username);




			query("UPDATE meet set status='2',issue='$iss',exp='$exp',ticket='$ticket' where rand='$rand' and confirm='1'");
			/*$res=query("SELECT * FROM meet where rand='$rand' and confirm='1' and status='1'");
			$result=mysqli_fetch_array($res);
			$num=mysqli_num_rows($res);*/
			}
			else
			{
				$flag2=1;
			}

			if($flag2==1)
			{
				$title="Complaint already registered.";
			}
			else
				$title="New Ticket";

			echo ' <div class="modal-header">
			<a href type="button" class="close btn " ><span class="label label-danger" aria-hidden="true">&times;</span></a>

			<h4><span class="label label-info" id="qid">'.$title.'</span></h4>
			</div>
			<div class="modal-body" >
			<div class="col-md-3 col-md-offset-5 col-xs-offset-4">
			<div id="loadbar" style="display: none;">
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

			<div class="quiz" id="quiz" data-toggle="buttons">

			<h3 style="text-align:center;">';

			if($flag2!=1)
				echo 'Your ticket Number is: '.$ticket.' <br> we will contact you shorty.';
			else
				echo 'Your Complaint is already registered with ticket number: '.$tik.' <br>Please be patient we\'ll contact you.';



			echo '</h3>
			</div>	';
			
			echo '<div class="text-center"><a href class="btn btn-new">Close</a></div>';
			
			
	}
	else
	{
		echo '<h3 style="color:red;">You are not logged In, please <a type="submit" href="index?lo" class="btn btn-info"  style="margin-top:8px;">Sign Up/Log In</a></li> First.</h3>';
	}
			



}

