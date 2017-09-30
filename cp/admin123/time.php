	<script src="https://ecounsellors.in/cp/js/jquery.min.js"></script>
	<script src="https://ecounsellors.in/cp/js/jquery.scrolly.min.js"></script>
	<script src="https://ecounsellors.in/cp/js/jquery.scrollzer.min.js"></script>
	<script src="https://ecounsellors.in/cp/js/skel.min.js"></script>
	<script src="https://ecounsellors.in/cp/js/skel-layers.min.js"></script>
	<script src="https://ecounsellors.in/cp/js/init.js"></script>
	<script src="https://ecounsellors.in/cp/js/bootstrap.js"></script>
	<noscript>

		<link rel="stylesheet" href="https://ecounsellors.in/cp/css/skel.css" />
		<link rel="stylesheet" href="https://ecounsellors.in/cp/css/style.css" />
		<link rel="stylesheet" href="https://ecounsellors.in/cp/css/style-wide.css" />
	</noscript>
	<link rel="stylesheet" href="https://ecounsellors.in/cp/css/boot/bootstrap.css" />
	<link rel="stylesheet" href="https://ecounsellors.in/cp/css/custom.css" />



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
#main > section {
   
    padding: 0em 0px !important;
}

</STYLE>

<?php include("../../includes/config.php");
$sup=en_de('de',$_COOKIE['super']);

	if(!isset($_COOKIE['super']) || $sup!='123')
	{
		redirect("login");
	}

$session_emailid=$_GET['email'];


if(isset($_POST['sub']))
			{

				$f=0;
				//$sub=$rowf['sub_id'];
				$days=array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
				$i=0;
				if($session_emailid!='')
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
							//if(query("INSERT INTO timetable ($day,email,sub_id) VALUES ('".$checked."','$session_emailid','$sub')"))
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


				//redirect('manage#time');
			}


$r=query("SELECT * From timetable where email='$session_emailid'");
	$rowd=mysqli_fetch_array($r);



?>


<div class="row" style="font-size:10px;">
	
	<div class="col-md-12">
			<?php
				if($rowd['flag']==1)
				{
			echo '<h2 class="animated bounceInDown" style="color: #00BEF2;
   
    text-align: center;
    border-radius: 60px;">TimeTable Updated Successfully</h2>'; 
			query("UPDATE timetable SET flag='0' where email='$session_emailid'");
		}
		?>


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
											$t2 = strtotime('2010-05-06 22:00:00');
											$sl='EVENING';
										}                    
										if($i==3){
											$t1 = strtotime('2010-05-06 22:00:00');
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

										<div id="'.$k.'" class="panel-collapse collapse in">
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

					<center><button type="submit" id="search" name="sub" class="btn btn-lg btn-success" style="width:200px;height=100px;"/>Submit</button></center>


				</form>

	
	</div>
	<div class="col-md-2"></div>

	
</div>