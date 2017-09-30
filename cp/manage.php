<!DOCTYPE HTML>

<?php 

include("../includes/config.php");
if(!isset($_SESSION['c_id']))
{
	redirect("index");


}
else
{
	$session_emailid = $_SESSION['c_id'];
	$queryu = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
	$rowu = mysqli_fetch_array($queryu);
	//$kid=$rowu[]'id'];

	$queryf = query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");	
	$rowf = mysqli_fetch_array($queryf);	
	$r=query("SELECT * From timetable where email='$session_emailid'");
	$rowd=mysqli_fetch_array($r);	
	$r_f=query("SELECT * From timetable_f where email='$session_emailid'");
	$rowd_f=mysqli_fetch_array($r_f);	
	$sub=$rowf['sub_id'];

	//query("UPDATE timetable SET flag='0' where email='$session_emailid'");

	if($rowf['verifyf']!=1)
	{
		redirect("profile");
	}
	$agent=1;
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{
		$agent=0;
	}

}
?>

	<?php
			if(isset($_POST['sub']))
			{

				$f=0;
				$sub=$rowf['sub_id'];
				$days=array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
				$i=0;
				if($rowd['email']==$session_emailid)
				{
					$f=1;
				}

				while($i<7)
				{
					$day=$days[$i];

					if(isset($_POST[$day]))
					{
						$check = $_POST[$day];
						foreach($check as $checked) 
						{

							$checked=implode(',', $_POST[$day]);



						}
						if($f==0)
						{
							if(query("INSERT INTO timetable ($day,email,sub_id) VALUES ('".$checked."','$session_emailid','$sub')"))
								{$f=1;}
						}
						else if($f==1)
						{
							query("UPDATE timetable SET $day='$checked' where email='$session_emailid'");
						}

					}
					else
					{
						query("UPDATE timetable SET $day='' where email='$session_emailid'");
					}
					$i++;


				}
				//redirect('manage');

				query("UPDATE timetable SET flag='1' where email='$session_emailid'");
				query("UPDATE c_userdata SET timet='1' where emailid='$session_emailid'");


				redirect('manage#time');
			}


			if(isset($_POST['subf']))
			{

				$f=0;
				$sub=$rowf['sub_id'];
				$days=array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
				$i=0;
				if($rowd_f['email']==$session_emailid)
				{
					$f=1;
				}

				while($i<7)
				{
					$day=$days[$i];

					if(isset($_POST[$day]))
					{
						$check = $_POST[$day];
						foreach($check as $checked) 
						{
							$checked=implode(',', $_POST[$day]);



						}
						if($f==0)
						{
							if(query("INSERT INTO timetable_f ($day,email,sub_id) VALUES ('".$checked."','$session_emailid','$sub')"))
								{$f=1;}
						}
						else if($f==1)
						{
							query("UPDATE timetable_f SET $day='$checked' where email='$session_emailid'");
						}

					}
					else
					{
						query("UPDATE timetable_f SET $day='' where email='$session_emailid'");
					}
					$i++;


				}
				//redirect('manage');

				query("UPDATE timetable_f SET flag='1' where email='$session_emailid'");
				query("UPDATE c_userdata SET timet_f='1' where emailid='$session_emailid'");


					redirect('manage#demo');
			}


			?>



<html>
<STYLE TYPE="text/css">


</STYLE>
<head>
	<?php include_once('includes/nav.php'); ?>
	<title>Manage Account</title>
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



	<STYLE TYPE="text/css">
	
	#inline ul li{
		display: inline-table;
	}
	th{
		font-weight: 800;
	}

	tr:nth-child(odd):hover td{background-color:#00bef2;}

	h3{color:white;}
	.panel-title{text-align: center;}

	.table{
		
		border-spacing: 7px;
		border-collapse: separate;
	}


	tr:nth-child(even){background-color:#0075D3;}
	tr:nth-child(odd){background-color: #00bef2;}	



}       
#mainx > section {
   
    padding: 0em 0px !important;
}

</STYLE>

<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

	<!-- Header -->
	<?php  include('includes/header.php'); ?>

	<!-- Main -->
	<div id="mainx">

		<!-- Intro -->
		<section id="top" class="two">
	 <div id="time" class="about">Manage <span class="abt">Timetable</span></div><hr>

			<div class="container">

		

				<?php  
				date_default_timezone_set("Asia/Kolkata"); 

	//include('../includes/config.php');
				?>
		<?php
				if($rowd['flag']==1)
				{
			echo '<h2 class="animated bounceInDown" style="color: #00BEF2;
   
    text-align: center;
    border-radius: 60px;">TimeTable Updated Successfully</h2>'; 
			query("UPDATE timetable SET flag='0' where email='$session_emailid'");
		}
		?>


				<h2 style="text-align:center;">Update Your Weekly Schedule.</h2>
				<div class="table-responsive text-center">
					<table class="table table-hover table-bordered">



						<tbody>

							<tr>	
								<td><h3><center>MONDAY</center></h3></td>
								<td><h3><center>TUESDAY</center></h3></td>
								<td><h3><center>WEDNESDAY</center></h3></td>
								<td><h3><center>THURSDAY</center></h3></td>
								<td><h3><center>FRIDAY</center></h3></td>
								<td><h3><center>SATURDAY</center></h3></td>
								<td><h3><center>SUNDAY</center></h3></td>
							</tr>    
							<form name ="check" action="" method="POST">
								<?php
								$k=2;
								
								$slots=array('Morning','NOON','EVENING','NIGHT');
								for($i=0;$i<4;$i++)
								{
									echo '<tr>';
									for($j=0;$j<7;$j++)
									{

										if($i==0)
										{
											$t1 = strtotime('2010-05-06 05:00:00');
											$t2 = strtotime('2010-05-06 11:00:00');
											$sl='MORNING';
										}
										if($i==1){
											$t1 = strtotime('2010-05-06 11:00:00');
											$t2 = strtotime('2010-05-06 17:00:00');
											$sl='NOON';
										}
										if($i==2){
											$t1 = strtotime('2010-05-06 17:00:00');
											$t2 = strtotime('2010-05-06 21:00:00');
											$sl='EVENING';
										}                    
										if($i==3){
											$t1 = strtotime('2010-05-06 21:00:00');
											$t2 = strtotime('2010-05-07 05:00:00');
											$sl='NIGHT';
										}

										echo '<td>  
										<div class="panel-group" id="accordionx">
										<div class="panel panel-default">

										<div class="panel-heading">
										<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#'.$k.'">'.$sl.'</a>
										</h4>
										</div>

										<div id="'.$k.'" class="panel-collapse collapse">
										<div class="panel-body">
										<p>';



										if($j==0){$day='Mon';}
										if($j==1){$day='Tue';}
										if($j==2){$day='Wed';}
										if($j==3){$day='Thu';}
										if($j==4){$day='Fri';}
										if($j==5){$day='Sat';}
										if($j==6){$day='Sun';}


										$key=$rowd[$day];

										$datas=array();
										$datas=explode(',', $key);


										$timeslots = array();
										echo '	<div class="btn-group" data-toggle="buttons">';

										while ($t1 < $t2) 
										{
											$t1 = $t1 + 3600;
											$timeslots[] = $t1;
										}
										foreach ( $timeslots as $slot )
										{
											$flag=0;

											$dt= date("h:i", $slot) . '-'.date("h:i A", $slot+3599);  
											foreach ($datas as $data)
											{

												if($data==$slot)
												{
													$flag=1;
													echo '<span class="btn btn-default active "><input type="checkbox" name="'.$day.'[]" value="'.$slot.'" checked >'.$dt.'</input></span><br>'; 
												}

											}
											if($flag==0)
												echo '<span class="btn btn-default"><input type="checkbox" name="'.$day.'[]" value="'.$slot.'"  >'.$dt.'</input></span><br>';  
										}


										echo '</p> 
										</div>
										</div>
										</div>
										</div>
										</div>
										</td>  '; 
										$k++;
									}
									echo '</tr>';
								}




								?>
							</tbody>
						</table>
					</div>

					<center><button type="submit" id="search" name="sub" class="button"style="width:200px;height=100px;"/>Submit</button></center>


				</form>

	






		</div>



<?php   if($rowf['free_act']==1){ ?>

<br>

 <div class="abt" id="demo" style="
    font-weight: 500;
">Manage Timetable For Demo Appointments</div>

			<div class="container">

		

				<?php  
				date_default_timezone_set("Asia/Kolkata"); 

	//include('../includes/config.php');
				?>
		<?php
				if($rowd_f['flag']==1)
				{
			echo '<h2 class="animated bounceInDown" style="color: #00BEF2;
    
    text-align: center;
    border-radius: 60px;">TimeTable Updated Successfully</h2>'; 
			query("UPDATE timetable_f SET flag='0' where email='$session_emailid'");
		}
		?>


				<h2 style="text-align:center;">Update Your Weekly Schedule.</h2>
				<div class="table-responsive text-center">
					<table class="table table-hover table-bordered">



						<tbody>

							<tr>	
								<td><h3><center>MONDAY</center></h3></td>
								<td><h3><center>TUESDAY</center></h3></td>
								<td><h3><center>WEDNESDAY</center></h3></td>
								<td><h3><center>THURSDAY</center></h3></td>
								<td><h3><center>FRIDAY</center></h3></td>
								<td><h3><center>SATURDAY</center></h3></td>
								<td><h3><center>SUNDAY</center></h3></td>
							</tr>    
							<form name ="check" action="" method="POST">
								<?php
								$k=1000;
								
								$slots=array('Morning','NOON','EVENING','NIGHT');
								for($i=0;$i<4;$i++)
								{
									echo '<tr>';
									for($j=0;$j<7;$j++)
									{

										if($i==0)
										{
											$t1 = strtotime('2010-05-06 05:00:00');
											$t2 = strtotime('2010-05-06 11:00:00');
											$sl='MORNING';
										}
										if($i==1){
											$t1 = strtotime('2010-05-06 11:00:00');
											$t2 = strtotime('2010-05-06 17:00:00');
											$sl='NOON';
										}
										if($i==2){
											$t1 = strtotime('2010-05-06 17:00:00');
											$t2 = strtotime('2010-05-06 22:00:00');
											$sl='EVENING';
										}                    
										if($i==3){
											$t1 = strtotime('2010-05-06 22:00:00');
											$t2 = strtotime('2010-05-07 05:00:00');
											$sl='NIGHT';
										}

										echo '<td>  
										<div class="panel-group" id="accordiony">
										<div class="panel panel-default">

										<div class="panel-heading">
										<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#'.$k.'">'.$sl.'</a>
										</h4>
										</div>

										<div id="'.$k.'" class="panel-collapse collapse">
										<div class="panel-body">
										<p>';



										if($j==0){$day='Mon';}
										if($j==1){$day='Tue';}
										if($j==2){$day='Wed';}
										if($j==3){$day='Thu';}
										if($j==4){$day='Fri';}
										if($j==5){$day='Sat';}
										if($j==6){$day='Sun';}


										$key=$rowd_f[$day];

										$datas=array();
										$datas=explode(',', $key);


										$timeslots = array();
										echo '	<div class="btn-group" data-toggle="buttons">';

										while ($t1 < $t2) 
										{
											$t1 = $t1 + 900;
											$timeslots[] = $t1;
										}
										foreach ( $timeslots as $slot )
										{
											$flag=0;

											$dt= date("h:i", $slot) . '-'.date("h:i A", $slot+899);  
											foreach ($datas as $data)
											{

												if($data==$slot)
												{
													$flag=1;
													echo '<span class="btn btn-default active "><input type="checkbox" name="'.$day.'[]" value="'.$slot.'" checked >'.$dt.'</input></span><br>'; 
												}

											}
											if($flag==0)
												echo '<span class="btn btn-default"><input type="checkbox" name="'.$day.'[]" value="'.$slot.'"  >'.$dt.'</input></span><br>';  
										}


										echo '</p> 
										</div>
										</div>
										</div>
										</div>
										</div>
										</td>  '; 
										$k++;
									}
									echo '</tr>';
								}




								?>
							</tbody>
						</table>
					</div>

					<center><button type="submit" id="search" name="subf" class="button"style="width:200px;height=100px;"/>Submit</button></center>


				</form>

	






		</div>







<?php   } ?>







	</section>


<br>
<section class="two" id="account">


	


</section>

<!-- Footer -->
</div>
</div>
<?php include("templates/footer.php") ?>






	</body>

			</html>



<script src="js/custom.js"></script>

