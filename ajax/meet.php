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

	$rd=query("SELECT * From timetable where sub_id='$sub'");
	$rowd=mysqli_fetch_array($rd);	

	$res=query("SELECT * FROM meet where u_id='$uid' and c_id='$sub' and confirm='1' and status=''");
	$result=mysqli_fetch_array($res);
	$num=mysqli_num_rows($res);
	$res2=query("SELECT * FROM meet where u_id='$uid' and c_id='$sub' and confirm='0'");
	$result2=mysqli_fetch_array($res2);

	$r3=query("SELECT * FROM u_users where u_id='$uid'");
	$result3=mysqli_fetch_array($r3);
	$final_fee=$rowf['f_fee'];
	a:
	$rand=random_string2(7);
	$qspl=query("SELECT * from meet where rand='$rand'");
    $nspl=mysqli_num_rows($qspl);
    if($nspl>0)
    {
    	goto a;
    }
    else
    {
    	$_SESSION['rand']=$rand;

    }
	//$bno=random_string(7);
	$r=query("SELECT * FROM meet ORDER BY id DESC LIMIT 1");
			$res=mysqli_fetch_array($r);
			if($res['bno']!="")
			{
				$bno=$res['bno'];
				$bno=ltrim($bno,'ECP');
				//$bno=$bno+1;
				$bno="ECP".++$bno;
			}
			else
			{
				$bno="ECP101";
		
			}


			 $type=$result['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }
           else if($type==3)
          {
            $type="Phone";
          }
if($rowf['men']==1)
					{
						$men="Mentor";
					}
					else
					{
						$men="Counsellor";
					}

$fx=0;
if ($result3['phone']=="") 
{
	echo '<div class="modal-header">
	<a type="button" class="close btn btn-primary" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>
	<h4><span class="label label-info" id="qid">2</span>Update Phone Number</h4>';
	echo '</div><br><h2 style="text-align:center;">Please Update your phone number first:</h2><br>
	<center>
	<form method="post" action="">
	<input id="ph" name="phone" class="form-control" maxlength="14" placeholder="+91" style="width: 40%;"><br>
	<button type="submit" name="sub" class="btn btn-info">Update</button>
	</form>
	</center>


	';
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

		query("INSERT INTO meet(type,u_id,c_id,rand,bno,final_fee,hit_time,ip,agent) values('$vx','$uid','$sub','$rand','$bno','$final_fee','$time','$ip','$agent')");
	}
	else
	{
		query("UPDATE meet set type='$vx',u_id='$uid',c_id='$sub',rand='$rand',final_fee='$final_fee',hit_time='$time',ip='$ip',agent='$agent' where u_id='$uid' and c_id='$sub' and confirm='0'");
	}
	if($flag=='0')
	{
		$title="Appointment already booked";
	}
	else
		$title="Please select a <b>Date</b>.";

	echo ' <div class="modal-header">
	 <a href="" type="button" class="close btn "  aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">X</span></a>


	<h4><span class="label label-info" id="qid">2</span> '.$title.'</h4>
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

	<div class="quiz text-center" id="quiz" data-toggle="buttons">

	<p >';
	if($_SESSION['u_id'] AND $flag==1)
	{

		date_default_timezone_set("Asia/Kolkata");
		$t=time();


		$z=$t+86400*7;
		$count=1;
		echo '<select id="date" onchange="setdate(\''.$rand.'\')" class="btn dropdown-toggle selectpicker btn-white" name"date" class="selectpicker" data-style="btn-white" style="
		font-size: 20px;
		">
		<option value=""  style="display:none">Select a date</option>';
		$sun=0;$sat=0;$sun_disp=0;$sat_disp=0; $count_new=0;
		while($z-$t>0)
		{
			$time=date("jS M'y l",$t);
			$day=date("D",$t);
			if($rowd[$day]!='')
			{
				echo' <option value='.$t.'>'.$time.'</option>';
				$count_new++;

			}
			/*$time=date("jS M'y l",$t);
			$day=date("D",$t);
			if($day=="Sun")
			{
				$sun=$t;

			}
			if($day=="Sat")
			{
				$sat=$t;
				
			}
			if($count<4)
			{
						if($day=="Sun")
						{
							$sun_disp=1;

						}
						if($day=="Sat")
						{
							$sat_disp=1;
							
						}	

			echo' <option value='.$t.'>'.$time.'</option>';
			}
*/
			$t+=86400;
			$count++;
		}

		/* 
		if($sat!=0 and $sat_disp==0)
		{
			$time=date("jS M'y l",$sat);
			echo '<option value='.$sat.'>'.$time.'</option>';

		}

		if($sun!=0 and $sun_disp==0)
		{
			$time=date("jS M'y l",$sun);
			echo '<option value='.$sun.'>'.$time.'</option>';

		}

		if($sat==1)
		{
			$day=time();
			while(date("D",$day)!="Sat"))
			{

				if(date("D",$day)=="Sat")
				{
					//echo "aksbda";
					$time=date("jS M'y l",$day);
					echo' <option value='.$day.'>'.$time.'</option>';
					break;
				}
			}
		}*/

		echo' </select></p>


		';
	}
	else if($flag==0)
	{
		echo '<h2 class="text-center">You have already booked an appointment with this '.$men.'.</h2>';
		echo '<table class="table table-hover "> 

		<tr><th>'.$men.':</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
		<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$result['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>
		<tr><th>Phone:</th><td>'.$result3['phone'].'</td></tr>

		</table>';
		echo '</div><br><p style="text-align:center;"><a href="/appointments" class="btn btn-new">View Appointments</a></p>';

		$count_new++;
	}
	else
	{
		echo '<h3 style="color:red;">You are not logged In, please <button type="submit" class="btn btn-info" data-toggle="modal" data-target=".xu" style="margin-top:8px;">Sign Up/Log In</button></li> First.</h3>';
		$count_new++;
	}


if($count_new==0)
{
	echo '<h3>All Slots are booked. Please Click notify me, we\'ll arrange an appointment for you.</h3>';
	//echo '<br><br><button class="btn btn-info btn-lg btn-white" onclick="ask()"><span class="fa fa-comment modali"></span> Ask Questions For Free</button>';
	echo '<br><br><button class="btn btn-info btn-lg btn-new" onclick="notify()"><span class="fa fa-clock-o"></span> Notify Me</button>';
}

echo '</div>';


}

}


if(isset($_POST['setdate']))

{	

	$rand=$_SESSION['rand'];

	$dx=$_POST['setdate'];
	$uid=$_SESSION['u_id'];
	
	$adate=date("jS M y D",$dx);
	
	
	//$exrand=md5(rand());
	$efrow=query("UPDATE meet SET date='$dx',adate='$adate' where u_id='$uid' and rand='$rand'");

	//$efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);
if($efrow){
//query("UPDATE meet SET dt='$adx' where u_id='$uid' and rand='$rand'");
$r=query("SELECT * FROM meet where u_id='$uid' and rand='$rand'");
$result=mysqli_fetch_array($r);
$sub=$result['c_id'];
$rd=query("SELECT * From timetable where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$slotx=array();
$query=query("SELECT * FROM meet where c_id='$sub' and confirm='1' and (status='' or status='r') and adate='$adate'");
$i=0;
while($rowck=mysqli_fetch_array($query))
{
$slotx[$i]=$rowck['slot']; //slots from time table
$i++;
}

//echo $slotx[0];

echo ' <div class="modal-header">
 <a href=""  type="button" class="close btn "  aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">X</span></a>


<h5><span class="label label-info" id="qid">3</span> Please select a <b>Time Slot</b>.</h5>
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
<br>
<br>
<p style="width:100px !important;margin-top:60px;">Please wait, it may take a while.</p>
</div>
</div>

<div class="quiz" id="quiz" data-toggle="buttons">
<p style="text-align:center;">';

date_default_timezone_set("Asia/Kolkata");
$t=time();


$z=$t+86400*7;
$count=1;
echo '<select id="date" onchange="setdate(\''.$rand.'\')" class="btn dropdown-toggle selectpicker btn-white" name"date" class="selectpicker" data-style="btn-white" style="
font-size: 20px;
">
<option value="'.$result['date'].'" style="display:none;" >'.date("jS M'y l",$result['date']).'</option>';
	$sun=0;$sat=0;$sun_disp=0;$sat_disp=0;
		while($z-$t>0)
		{
			$time=date("jS M'y l",$t);
			$day=date("D",$t);
			if($rowd[$day]!='')
			{
				echo' <option value='.$t.'>'.$time.'</option>';
			}
			/*$time=date("jS M'y l",$t);
			$day=date("D",$t);
			if($day=="Sun")
			{
				$sun=$t;

			}
			if($day=="Sat")
			{
				$sat=$t;
				
			}
			if($count<4)
			{
						if($day=="Sun")
						{
							$sun_disp=1;

						}
						if($day=="Sat")
						{
							$sat_disp=1;
							
						}	

			echo' <option value='.$t.'>'.$time.'</option>';
			}
*/
			$t+=86400;
			$count++;
		}

		/*if($sat!=0 and $sat_disp==0)
		{
			$time=date("jS M'y l",$sat);
			echo '<option value='.$sat.'>'.$time.'</option>';

		}

		if($sun!=0 and $sun_disp==0)
		{
			$time=date("jS M'y l",$sun);
			echo '<option value='.$sun.'>'.$time.'</option>';

		}*/

echo' </select><br><br>';
$day=date("D",$result['date']);// capturing today's DAY
$key=$rowd[$day];				// caputuring slots for that day in TT

$datas=array();
$datas=explode(',', $key);				//slots into array
echo '<form id="mainForm" name="mainForm" style="text-align: center;">';
$flag=0;
$j=0;
$tdate=date("D",time());   //today's date
echo '	<div class="btn-group" data-toggle="buttons">';
$count_new=0;
foreach ($datas as $data)
{
	

	if($data!="")
	{
		
		$dt= date("h:i", $data) . '-'.date("h:i A", $data+3599); //converting UNIX slots into string time slots
		$test=date("H:i",$data);
		$now=date("H:i",time()+3600);

		if(date("D",time()+3600)!=$tdate)
			$now=("24".date("H",time()+3600)).":".date("i",time()+3600);
		
		//query("SELECT * FROM meet where slot='$dt' and ");

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
			{
				$count_new++;
			echo '<span class="btn btn-default btn-white"><input required type="radio" name="rads" value="'.$data.'" id="radio">'.$dt.'</input></span><br>'; 
			}
		}
	}
	else
		$flag=1;
$j++;
}
echo '</div><br>';
if($flag==0 and $count_new>0)
echo '<br><button onclick="setime(\''.$rand.'\')" class="btn btn-info btn-lg btn-new">Proceed</button></form></p>';
if($flag==1 or $count_new==0)
{
	echo '<h3>All Slots are booked for this date. <br>Please select any other <b>Date</b> or choose any other Mentor.</h3>';
	//echo '<br><br><button class="btn btn-info btn-lg btn-white" onclick="ask()"><span class="fa fa-comment modali"></span> Ask Questions For Free</button>';
	echo '<br><br><button class="btn btn-info btn-lg btn-new" onclick="notify()"><span class="fa fa-clock-o"></span> Notify Me</button>';
}
echo '</div>
';
}

else
	{echo '<h2>Please Don\'t mess with the code.</h2>';}



}



if(isset($_POST['setime']))

{

	$rand=$_SESSION['rand'];
	$dx=$_POST['setime'];
	$uid=$_SESSION['u_id'];
	//$exrand=md5(rand());
	$dt= date("h:i", $dx) . '-'.date("h:i A", $dx+3599);

	$efrow=query("UPDATE meet SET time='$dx',slot='$dt' where u_id='$uid' and rand='$rand'");

	//$efrow=mysqli_affected_rows($connection);
	//mysqli_close($connection);

if($efrow)
{

$r=query("SELECT * FROM meet where u_id='$uid' and rand='$rand'");
$result=mysqli_fetch_array($r);
$final_fee=$result['final_fee'];

$sub=$result['c_id'];
$rd=query("SELECT * From timetable where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	
$r2=query("SELECT * FROM u_users where u_id='$uid'");
$result2=mysqli_fetch_array($r2);
$data=$result['slot'];

if($rowf['men']==1)
					{
						$men="Mentor";
					}
					else
					{
						$men="Counsellor";
					}
if($final_fee==0)
	{




			 $type=$result['type'];
			          if($type==1)
			          {
			            $type="Video";

			          }
			          else if($type==2)
			          {
			            $type="Audio";
			          }
			           else if($type==3)
			          {
			            $type="Phone";
			          }

			echo ' <div class="modal-header">
			 <a href=""  type="button" class="close btn " aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">&times</span></a>


			<h4><span class="label label-info" id="qid">4</span> Booking Confirmation.</h4>
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

			echo '<table class="table table-hover "> 

			<tr><th>'.$men.':</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
			<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
			<tr><th>Time Slot:</th><td>'.$data.'</td></tr>
			<tr><th>Mode:</th><td>'.$type.'</td></tr>
			<tr><th>Your Phone:</th><td>'.$result2['phone'].' <a href="/profile" onclick=" window.open(\'https://ecounsellors.in/profile\',\'_blank\');" target="_blank">(update)</a></td></tr>
			<tr><th>Fee:</th><td><span class="fa fa-inr"></span>'.$final_fee.'</td></tr>

			</table>';
			$yes="yes";
			$no="no";	


			//
			// 
			//  
			//   
			//    
			//     
			//       echo '<br><button onclick="confirm(\'yes\',\''.$rand.'\')" id="confirm" class="btn btn-lg btn-block btn-big-red" value="yes" style="font-weight:600">Confirm</button>&nbsp;<br><a id="reject" href="#" onclick="confirm(\'no\',\''.$rand.'\')" value="no" class="" style="text-decoration:none;color:#333333;margin-top:20px;cursor:pointer">Cancel</button></a></div>';


		}
		else
		{

			require "../insta/instamojo.php";

			//$api = new Instamojo('aff823f809fe3eed241a1edc139afd01', '715f8ce37289c1bece9d7234f424d68f');

			$api = new Instamojo('c88e1d662da293bc9d571b50190fff19', '3b0a55f334396e56e963ab9a0dfedc93');

			try {
			    $response = $api->linkCreate(array(
			        'title'=>$result2['name'].' Please Pay',
			        'description'=>'India\'s first platform for online counselling',
			       /* 'data_name'=>'Naman Malhota',
			        'data_email'=>'me.nm@mail.ru',
			        'data_phone'=>'9898989898',*/
			        'base_price'=>$final_fee,
			        'redirect_url'=>'https://ecounsellors.in/pay_status',
			        'currency'=>'INR'
			        ));
			   // print_r($response);
			    //echo $response['url'];
			    $slug=$response['slug'];
			    $purl=$response['url'].'?data_readonly=data_name&data_readonly=data_email&data_readonly=data_phone&data_readonly=data_amount&data_email='.$result2['emailid'].'&data_amount='.$final_fee.'&data_name='.$result2['name'].'&data_phone='.substr($result2['phone'], 3,13).'&embed=form';
			}
			catch (Exception $e) {
			    print('Error: ' . $e->getMessage());
			}
			$bno=$result['bno'];
			$_SESSION['bno']=$bno;
			//echo '<h1>'.$_SESSION['bno'].'</h1>';

			query("INSERT into pay(slug,bno,url,fee,timest,ip,agent) values('$slug','$bno','$purl','$final_fee','$time','$ip','$agent')");

				 $type=$result['type'];
			          if($type==1)
			          {
			            $type="Video";

			          }
			          else if($type==2)
			          {
			            $type="Audio";
			          }
			           else if($type==3)
			          {
			            $type="Phone";
			          }

			echo ' <div class="modal-header">
			<a href=""  type="button" class="close btn "  aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">&times</span></a>

			<h4><span class="label label-info" id="qid">4</span> Booking Confirmation.</h4>
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

			<tr><th>'.$men.':</th><td>'.$rowf['fname'].' '.$rowf['lname'].'</td></tr>
			<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
			<tr><th>Time Slot:</th><td>'.$data.'</td></tr>
			<tr><th>Mode:</th><td>'.$type.'</td></tr>
			<tr><th>Your Phone:</th><td>'.$result2['phone'].' <a href="/profile" onclick=" window.open(\'https://ecounsellors.in/profile\',\'_blank\');" target="_blank">(update)</a></td></tr>';

			if($rowf['men']==1)
			echo '<tr><th>Service fee:</th><td><span class="fa fa-inr"></span> '.$final_fee.'</td></tr>';
			else
			echo '<tr><th>fee:</th><td><span class="fa fa-inr"></span> '.$final_fee.'</td></tr>';


			echo '</table>';
			$yes="yes";
			$no="no";	
			//echo '<br><button onclick="pay(\''.$purl.'\')" id="confirm" class="btn btn-lg btn-big-red" value="yes" style="font-weight:600">Pay <i class="fa fa-inr"></i>'.$final_fee.' </button>&nbsp;<br><a href="#" id="reject" onclick="confirm(\'no\',\''.$rand.'\')" value="no" style="text-decoration:none;color:#333333;margin-top:20px;cursor:pointer">Cancel</a></div></p>';
			//
			//
			//
// echo '<br><button onclick="pay(\''.$purl.'\')" id="confirm" class="btn btn-lg btn-big-red btn-block" value="yes" style="font-weight:600">Get Your Problem Solved - Pay Now</button>&nbsp;<p></p>';
// 
// 
// 
// 
// 
// 
// 
// 
// 
			//Cancel button   echo '<a href="#" id="reject" onclick="confirm(\'no\',\''.$rand.'\')" value="no" style="text-decoration:none;color:#333333;margin-top:20px;cursor:pointer">Cancel</a></div></p>';
			echo '<hr><div class="row thumbnail">
			<div class="col-md-12">';

			if($rowf['men']==1)
			{
			echo '<p> The service fee you will be giving will help us in improving our conference calls and video quality so that you get the best of experience while taking mentorship. Also, it will help us bringing more mentors from the best Organizations all around the world.</p><br>
			<p>Till date, our users are very happy with mentorship and we haven\'t received a single complaint. If in any case you are not satisfied; we will refund 100% of the money back to your account.</p>';
			}
			else
			{
				echo '<p> The counselling experts we have on this platform are highly experienced, and they have solved problems of over thousands of peoples in the past. This actually had changed many people\'s lives and led them in right direction and might change your\'s too.</p><br>
			<p>Till date, our users are very happy with counselling advise and we haven\'t received a single complaint. If in any case you are not satisfied; we will refund 100% of the money back to your account.</p>';
			}
			echo '</div>
			</div>';



		}












}
else
{
	echo '<h2>Please Don\'t mess with the code.</h2>';
	exit();
}


}



if(isset($_GET['confirm']))

{

	$rand=$_SESSION['rand'];
	$ans=$_GET['confirm'];
	$btime=time();
	//$exrand=md5(rand());
	$flag=0;
	$flag2=0;
	$uid=$_SESSION['u_id'];
	$r=query("SELECT * FROM meet where u_id='$uid' and rand='$rand'");
	$result=mysqli_fetch_array($r);
	$final_fee=$result['final_fee'];


	
	if($ans=="yes")
	{
		$efrow=query("UPDATE meet SET confirm='1',btime='$btime',paid='$final_fee' where u_id='$uid' and rand='$rand'");

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
else if($ans=="no")
{
	$efrow=query("UPDATE meet SET confirm='-1',btime='$btime',exrand='$exrand' where u_id='$uid' and rand='$rand'");

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
else
{
	echo '<h4>Something went wrong, please contact us ASAP.</h4>';
	exit();
}

if($flag==1 or $flag2==1)
{


$sub=$result['c_id'];
$rd=query("SELECT * From timetable where sub_id='$sub'");
$rowd=mysqli_fetch_array($rd);	
$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	


if($rowf['men']==1)
					{
						$men="Mentor";
					}
					else
					{
						$men="Counsellor";
					}


$data=$result['slot'];
$bno=$result['bno'];
 $type=$result['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }
           else if($type==3)
          {
            $type="Phone";
          }

 $r2=query("SELECT * FROM u_users where u_id='$uid'");
$result2=mysqli_fetch_array($r2);
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
 <a href=""  type="button" class="close btn " aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">&times</span></a>

<h4><span class="label label-info" id="qid">4</span> Congrats!!!.</h4>
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

<div class="quiz" id="quiz" data-toggle="buttons" style="text-align:center;">
<p >';
$cname=$rowf['fname'].' '.$rowf['lname'];
echo '<table class="table table-hover table-bordered"> 
<tr><th>Booking ID:</th><td class="text-capitalize">'.$bno.'</td></tr>
<tr><th>'.$men.':</th><td class="text-capitalize">'.$cname.'</td></tr>
<tr><th>Date:</th><td>'.date("jS M'y l",$result['date']).'</td></tr>
<tr><th>Time Slot:</th><td>'.$data.'</td></tr>
<tr><th>Mode:</th><td>'.$type.'</td></tr>
<tr><th>Phone:</th><td>'.$result2['phone'].'</td></tr>
<tr><th>Amount Paid:</th><td>'.$final_fee.'</td></tr>



</table></p>';



require_once('../msg.php');

$ph=$result2['phone'];
$message='Your Appointment has been successfully booked with '.strtoupper($cname).':
Date:'.date("jS M'y l",$result['date']).'
Time:'.$data.'
Mode:'.$type.'
Amount Paid:'.$final_fee.'
Thanks!';
if($flag==1)
{
//send($ph,$message);
}


$ph=$rowf['phone'];
$message='Congrats! you got an appointment with '.strtoupper($result2['name']).':
Date:'.date("jS M'y l",$result['date']).'
Time:'.$data.'
Mode:'.$type.'
Amount Paid:'.$final_fee.'
Thanks!';
//send($ph,$message);


  $xdate=strtotime(date("j M y",$result['date'])." ".date("H:i",$result['time']));

$url_calender_user=google_cal($xdate,$result2['name'],$cname,1);
$url_calender_mentor=google_cal($xdate,$result2['name'],$cname,0);
						//require_once('../mail.php');
						require_once('../mail2.php');
						$headers = "care@ecounsellors.in";
						$headers2 = "support@ecounsellors.in";
						$username=$result2['name'];
						$username2=$cname;
						$emailid=$result2['emailid'];
						$emailid2=$rowf['emailid'];

						
						$sub="Booking Confirmation!";
						$sub2="You have got an Appointment.";

						
						



						//$rand=random_string2(50);
					
					
    
    
    




 $html='<!DOCTYPE html>
<html>
<head>
<title>Booking Confirmation</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
   
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} 
    img{-ms-interpolation-mode: bicubic;}

    
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }


    @media screen and (max-width: 525px) {

     
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

  
        .logo img {
          margin: 0 auto !important;
        }

    
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

      
        .responsive-table {
          width: 100% !important;
        }


        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
     		padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

 
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }


    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
    
<!--[if gte mso 12]>
<style type="text/css">
.mso-right {
	padding-left: 20px;
}
</style>
<![endif]-->
</head>
    
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->


<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#25b1cb" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                     <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                         <a href="https://ecounsellors.in/" target="_blank">
                        <img alt="Logo" src="https://e-counsellors.rhcloud.com/img/logov2final.png" width="180" height="50" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                          
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 25px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" style="padding:0 0 20px 0;" class="responsive-table">
                <tr>
                    <td align="center" height="100%" valign="top" width="100%" style="padding-bottom: 35px;">
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                        <td align="center" valign="top" width="500">
                        <![endif]-->
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                                    <tr>
                                    <td align="left" valign="top" width="150">
                                    <![endif]-->
<!--
                                    <div style="display:inline-block; max-width:150px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="150">
                                            <tr>
                                                <td valign="top"><a href="http://litmus.com" target="_blank"><img src="product-2.png" alt="alt text here" width="150" height="200" border="0" style="display: block; font-family: Arial; color: #266e9c; font-size: 14px;"></a></td>
                                            </tr>
                                        </table>
                                    </div>
-->
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="350">
                                    <![endif]-->
                                    

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"  class="wrapper">
                                            <tr>

                                                <td style="padding: 10px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Hi '.strtok($username,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Congratulations!

Your appointment has been successfully booked at Ecounsellors.in. The 

schedule for the same is as follows:</td>
                                                        </tr><tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                            <tr>
        <td bgcolor="#ffffff" align="center" style="padding:10px 0px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
         <table cellspacing="2" cellpadding="3" border="0" width="100%" class="table">
                            <tr>                            
                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Booking ID</td>
                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$bno.'</td>
                            </tr> 
                            <tr>
<td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">'.$men.'</td>
<td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$cname.'</td>
                                                    </tr>
                                      <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Date and Day</td>
    <td align="right" style="font-family: Arial, sans-serif; text-align:right;color: #333333; font-size: 16px; ">'.date("jS M'y D",$result['date']).'</td>
                                                    </tr>
                                                    <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;">Time Slot:</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; ">'.$data.'</td>
                                                    </tr>
                                                    <tr>
  <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Mode</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$type.'</td>
                  </tr> <tr>
            <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Amount Paid</td>
            <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$final_fee.'</td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
                                                        <tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                     <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#F33A5A"><a href="'.$url_calender_user.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #F33A5A; display: inline-block;" class="mobile-button">Add to Calendar</a><br><br></td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                            <ol>
                                                                 <li>You must use an updated version of Google Chrome for audio and video conferencing. <a href="https://www.google.co.in/search?q=how%20to%20update%20google%20chrome&rct=j" style="text-decoration:none;color:#333333;font-weight:bold">Click here</a> to see how to update or call us at 09643781369 and we will assist you.</li><br>
                                                                 <li>Our team will call you 2 hours prior to the appointment to confirm it. Make sure you pick up the call.</li></ol></td>
                                                        </tr>
                                         <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                     <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/appointments" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Account</a><br><br></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                 
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
              
            </table>
        </td>
    </tr>

 <tr>
        <td bgcolor="#333333" align="center" style="padding: 20px 0px;width:100%">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                                            <td align="" style=" font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: #dedede;padding:0px 10px 0px 10px">We will be happy to answer any questions or concerns you might have about Ecounsellors. Stay in touch with us.<br><br>
                     <a href="mailto:care@ecounsellors.in" style="color:white; text-decoration:none;text-decoration:none !important;text-decoration:none;font-weight:500;">care@ecounsellors.in</a></td>
                        </tr>
                <tr>
                    <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #ffffff; text-align:left;line-height: 20px;padding:0px 10px 0px 10px" class="pad"><p>
                                    <a href="https://twitter.com/ecouncare" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/6rqi2h839/1458285314_square_twitter.png?noCache=1458269179"></a> &nbsp; 
                                       <a href="https://plus.google.com/u/0/116894056051003633015" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s9.postimg.org/rpxq1v24r/1458285359_square_google_plus.png?noCache=1458269237"></a> &nbsp;
                                       <a href="https://www.linkedin.com/company/10115744?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A10115744%2Cidx%3A1-1-1%2CtarId%3A1458842934703%2Ctas%3Aecounsell" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/o93sp2nn9/1458285377_square_linkedin.png?noCache=1458269268"></a> 
                        &nbsp;
                                      <a href="https://www.facebook.com/ecounsellors/" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s29.postimg.org/d32lll3ur/1458285303_square_facebook.png?noCache=1458269107"></a> 
                                      </p>
                                      
                                       Cheers,<br>
                                    Team Ecounsellors<br>
                        8930130199   <br>
                                      <br>
                                      
                                  </td></tr>
                <tr><td><br></td></tr>
                  
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
'
;
	

















$html2='<!DOCTYPE html>
<html>
<head>
<title>Your Appointment is scheduled</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} 
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
    img{-ms-interpolation-mode: bicubic;} 

    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

  
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    
    @media screen and (max-width: 525px) {

       
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

       
        .logo img {
          margin: 0 auto !important;
        }

      
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }
      .responsive-table {
          width: 100% !important;
        }

  
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
     		padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

 
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<!--[if gte mso 12]>
<style type="text/css">
.mso-right {
	padding-left: 20px;
}
</style>
<![endif]-->
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->


<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#25b1cb" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                     <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                         <a href="https://ecounsellors.in/" target="_blank">
                           <img alt="Logo" src="https://e-counsellors.rhcloud.com/img/logov2final.png" width="180" height="50" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                          
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 25px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" style="padding:0 0 20px 0;" class="responsive-table">
                <tr>
                    <td align="center" height="100%" valign="top" width="100%" style="padding-bottom: 35px;">
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                        <td align="center" valign="top" width="500">
                        <![endif]-->
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                                    <tr>
                                    <td align="left" valign="top" width="150">
                                    <![endif]-->
<!--
                                    <div style="display:inline-block; max-width:150px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="150">
                                            <tr>
                                                <td valign="top"><a href="http://litmus.com" target="_blank"><img src="product-2.png" alt="alt text here" width="150" height="200" border="0" style="display: block; font-family: Arial; color: #25b1cb; font-size: 14px;"></a></td>
                                            </tr>
                                        </table>
                                    </div>
-->
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="350">
                                    <![endif]-->
                                    

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"  class="wrapper">
                                            <tr>

                                                <td style="padding: 10px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Dear '.strtok($username2,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">We hope you are in good spirit and health. This is to notify you that a 

user has booked an appointment with you at Ecounsellors.in, which is 

scheduled as follows:</td>
                                                        </tr><tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                            <tr>
        <td bgcolor="#ffffff" align="center" style="padding:10px 0px 10px 0px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
      
               
                        <!-- TWO COLUMNS -->
                        <table cellspacing="2" cellpadding="3" border="0" width="100%" class="table">
                            <tr>                            
                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Booking ID</td>
                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$bno.'</td>
                            </tr> 
                            <tr>
<td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">User</td>
<td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$username.'</td>
                                                    </tr>
                                      <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Date and Day</td>
    <td align="right" style="font-family: Arial, sans-serif; text-align:right;color: #333333; font-size: 16px; ">'.date("jS M'y D",$result['date']).'</td>
                                                    </tr>
                                                    <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;">Time Slot:</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; ">'.$data.'</td>
                                                    </tr>
                                                    <tr>
  <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Mode</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$type.'</td>
                  </tr>
<!--
                            <tr>
            <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Amount Paid</td>
            <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$final_fee.'</td>
                </tr>
-->
            </table>
                                          
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
                                                        <tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                            <ol>
                                                                 <li>You must use an updated version of Google Chrome for audio and video conferencing. <a href="https://www.google.co.in/search?q=how%20to%20update%20google%20chrome&rct=j" style="text-decoration:none;color:#333333;font-weight:bold">Click here</a> to update.</li><br>
                                                                 </ol></td>
                                                        </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#F33A5A"><a href="'.$url_calender_mentor.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #F33A5A; display: inline-block;" class="mobile-button">Add to Calendar</a><br><br></td>
                                                    </tr> 
                                                </table>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                   <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/cp/" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Account</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                  
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                 
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
              
            </table>
        </td>
    </tr>
<tr>
        <td bgcolor="#333333" align="center" style="padding: 20px 0px;width:100%">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                                            <td align="" style=" font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: #dedede;padding:0px 10px 0px 10px">We will be happy to answer any questions or concerns you might have about Ecounsellors. Stay in touch with us.<br><br>
                     <a href="mailto:care@ecounsellors.in" style="color:white; text-decoration:none;text-decoration:none !important;text-decoration:none;font-weight:500;">care@ecounsellors.in</a></td>
                        </tr>
                <tr>
                    <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #ffffff; text-align:left;line-height: 20px;padding:0px 10px 0px 10px" class="pad"><p>
                                    <a href="https://twitter.com/ecouncare" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/6rqi2h839/1458285314_square_twitter.png?noCache=1458269179"></a> &nbsp; 
                                       <a href="https://plus.google.com/u/0/116894056051003633015" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s9.postimg.org/rpxq1v24r/1458285359_square_google_plus.png?noCache=1458269237"></a> &nbsp;
                                       <a href="https://www.linkedin.com/company/10115744?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A10115744%2Cidx%3A1-1-1%2CtarId%3A1458842934703%2Ctas%3Aecounsell" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/o93sp2nn9/1458285377_square_linkedin.png?noCache=1458269268"></a> 
                        &nbsp;
                                      <a href="https://www.facebook.com/ecounsellors/" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s29.postimg.org/d32lll3ur/1458285303_square_facebook.png?noCache=1458269107"></a> 
                                      </p>
                                      
                                       Cheers,<br>
                                    Team Ecounsellors<br>
                        8930130199   <br>
                                      <br>
                                      
                                  </td></tr>
                <tr><td><br></td></tr>
                  
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>

';
			


				
					


        
          


            /*if (strstr($emailid, '@gmail'))
          {

            mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
          }
          else*/
         if($flag==1)
          {
              $emailid3="ecounsellorscare@gmail.com";
            mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
            mailman2($emailid2,$sub2, $html2, $username2,$headers2,"Ecounsellors.in");
            mailman2($emailid3,$sub, $html, $username,$headers,"Ecounsellors.in");

          }














echo '<h2>Congratulations Appointment Successfully booked!</h2></div>';
echo '<br><p style="text-align:center;"><a target="_blank" href="'.$url_calender_user.'" class="btn btn-big-re">Add to Calendar</a></p>';

echo '<br><p style="text-align:center;"><a href="/appointments" class="btn btn-info btn-new">View Appointments</a></p>';


}

}








if(isset($_GET['sub']))


{
$sub=$_SESSION['sub_id'];
$uid=$_SESSION['u_id'];


$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	

$r3=query("SELECT * FROM u_users where u_id='$uid'");
$result3=mysqli_fetch_array($r3);

query("INSERT INTO notify(u_id,c_id,timestamp,agent,ip) values('$uid','$sub','$time','$agent','$ip')");


$emailid=$result3['emailid'];
	echo ' <div class="modal-header">
			<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

			<h4><span class="label label-info" id="qid">4</span> You\'ll be notified.</h4>
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
			<p style="text-align:center;">
			<form id="mainForm" name="mainForm" style="text-align: center;">
			<h3>You\'ll be notified as soon as the time slots are available, an email regarding the same has been sent to you on <b>'.$emailid.'</b></h3>
			';

			$purl="https://ecounsellors.in";
			$purl2="https://ecounsellors.in/".$_SESSION['url_men']."/".$rowf['fname']."-".$rowf['lname']."/".$sub;
			 //$cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



			

		
			echo '<br>
			<!--<button class="btn btn-info btn-md" onclick="ask()">Ask Questions</button>&nbsp;--><button onclick="pay(\''.$purl.'\')" class="btn btn-primary btn-md" >Explore More </button>&nbsp; 
			<button id="reject" onclick="pay(\''.$purl2.'\')" class="btn btn-danger">Close</button></p></div>';
			echo '</div>';
 $emailid3="ecounsellorscare@gmail.com";  
			

			 require_once('../mail2.php');
					
						$headers = "care@ecounsellors.in";

						$cname=$rowf['fname'].' '.$rowf['lname'];
						$username=$result3['name'];
					
						$emailid=$result3['emailid'];
						

						
						$sub= strtok($username," ").", "."we will notify you about free slots."; 
						$html='Hi, <b>'.strtok($username," ").'</b> ('.$emailid.')
						<br><br>
						We are glad that you took the first step to clear your confusions and "Live Happier" by trying to book an appointment with <b>'.$cname.'</b>, but unfortunately all slot are booked as of now.
						We will surely inform you regarding free slots.
						<br>
						<h3><strong>NOTE: Try selecting different dates, free slots might be available.</strong></h3>
						<br>
						<br>
						Visit <a href="https://ecounsellors.in">www.ecounsellors.in</a> to view all our <b>Mentors and Experts</b>.



						<br>
						<br>
						Regards,<br>
						Team Ecounsellors<br>
						<a href="https://ecounsellors.in">www.ecounsellors.in</a>







						';

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");

						mailman2($emailid3,$sub, $html, $username,$headers,"Ecounsellors.in");
					
						

}






if(isset($_POST['ques']))


{
$sub=$_SESSION['sub_id'];
$uid=$_SESSION['u_id'];

$ques=filter(strip_tags($_POST['ques']));
$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	

$r3=query("SELECT * FROM u_users where u_id='$uid'");
$result3=mysqli_fetch_array($r3);

query("INSERT INTO ques(u_id,c_id,question,timestamp,agent,ip) values('$uid','$sub','$ques','$time','$agent','$ip')");
			//$purl2="https://ecounsellors.in/".$_SESSION['url_men']."/".$rowf['fname']."-".$rowf['lname']."/".$sub;


$emailid=$result3['emailid'];
	echo ' <div class="modal-header">
			<a type="button" class="close btn" href=""><span class="label label-danger" aria-hidden="true">&times;</span></a>

			<h4><span class="label label-info" id="qid">4</span> You\'ll be notified.</h4>
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
			<p style="text-align:center;">
			<form id="mainForm" name="mainForm" style="text-align: center;">
			<h4>Your Questions has been submitted Successfully, Answers will be emailed to you in 5 days. Also you\'ll be notified as soon as the time slots are available, an email regarding the same has been sent to you on <b>'.$emailid.'</b></h4>
			';

			$purl="https://ecounsellors.in";
			$purl2="https://ecounsellors.in/".$_SESSION['url_men']."/".$rowf['fname']."-".$rowf['lname']."/".$sub;

			 //$cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



			

		
			echo '<br><button onclick="pay(\''.$purl.'\')" class="btn btn-primary btn-lg" >Explore More </button>&nbsp;<button id="reject" onclick="pay(\''.$purl2.'\')" class="btn btn-danger">Close</button></p></div>';
			echo '</div>';
 $emailid3="ecounsellorscare@gmail.com";  
			

			 require_once('../mail2.php');
					
						$headers = "care@ecounsellors.in";

						$cname=$rowf['fname'].' '.$rowf['lname'];
						$username=$result3['name'];
					
						$emailid=$result3['emailid'];
						

						
						$sub= strtok($username," ").", "."Your questions has been submitted successfully."; 
						$html='Hi, <b>'.strtok($username," ").'</b> ('.$emailid.')
						<br><br>
						We Have received your questions, these questions will be forwarded to <b>'.$cname.'</b>, it might take upto 5 days for the same.<br>
						Answers will be emailed to you.

						Also you\'ll be informed regarding free slots.
						<br>
						<br>
						Visit <a href="https://ecounsellors.in">www.ecounsellors.in</a> to view all our <b>Mentors and Experts</b>.
						<br>
						<br>
						Your Questions are as follows:-<br><br>
						'.nl2br($_POST['ques']).'

											


						<br>
						<br>
						Regards,<br>
						Team Ecounsellors<br>
						<a href="https://ecounsellors.in">www.ecounsellors.in</a>







						';

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");

						mailman2($emailid3,$sub, $html, $username,$headers,"Ecounsellors.in");
					
						

}