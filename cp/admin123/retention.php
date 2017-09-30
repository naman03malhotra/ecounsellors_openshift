<?php include('includes/head.php'); 
if(isset($_POST['can']))
{

$idx=$_POST['id'];

$why=$_POST['why'];
query("UPDATE meet set why_cancel='$why' where id='$idx'");

}



if(isset($_POST['conf'])){

		$sid = $_POST['id'];

		$mode=$_POST['mode'];

		

		query("UPDATE meet SET type=$mode WHERE id='$sid'");
		//redirect("bank-approve");

	}

if(isset($_POST['approve'])){

		$sid = $_POST['id'];

		

		query("UPDATE meet SET bnk_status='2' WHERE id='$sid'");
		//redirect("bank-approve");

	}
	else if(isset($_POST['claim'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_r'];


		query("UPDATE meet SET status='2',comment='$comment' WHERE id='$sid'");
			//redirect("bank-approve");

	}
	else if(isset($_POST['claim_solve'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_s'];


		query("UPDATE meet SET status='4',comment='$comment' WHERE id='$sid'");
			//redirect("bank-approve");

	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_re'];


		query("UPDATE meet SET status='3',comment='$comment' WHERE id='$sid'");
			//redirect("bank-approve");

	}

	else if(isset($_POST['approve_bnk']))
	{
		$sid = $_POST['id'];
		


		query("UPDATE meet SET bnk_status='1',bnk_date='$time' WHERE id='$sid'");
			//redirect("bank-approve");

	}?>

	<div class="row text-center">
		<div id="app_disp" class="col-md-12"></div>
	</div>


<style type="text/css">
	.tday{
		    background-color: cadetblue;
    color: #FFFEFE;
	}
	.paisa{
		    background-color: green;
    color: #fff;
	}
</style>

		<?php	

function paid($amt)
{
	//$amt=float($amt);
	$amt1=($amt-($amt/5));
	return $amt1;
}
		echo '<table class="default table" style="font-size:14px;">


									<thead>
										<tr>
											<th>#</th>
											<th>Booking No.</th>
											<th>Counsellor</th>
											<th>C .ph</th>
											<th>Client</th>
											<th>U .ph</th>
											<th>U .id</th>
											<th>Booking Date</th>
											<th>App. Date</th>
											<th>App. Time</th>
											<th>Amount</th>
											<th>EC Fee(20%)</th>
											<th>We Get</th>
											<th>Status</th>
											<th>Mode</th>
											<th>Comment</th>
											
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from meet where confirm!='1' order by hit_time desc, id desc");
								 	$count=1;
								 	$c=0;
								$app_cnt=0;
								 	while($rq6=mysqli_fetch_array($q6))
								 	{
								 		 	$tday=0;
								 		 
								 		    $type=$rq6['type'];
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
								 		$idx=$rq6['id'];
								 		$uid=$rq6['u_id'];
								 		$cid=$rq6['c_id'];
								 		$query_u=query("SELECT * from u_users where u_id='$uid'");
								 		$row_u=mysqli_fetch_array($query_u);
								 		$query_c=query("SELECT * from c_userdata where sub_id='$cid'");
								 		$row_c=mysqli_fetch_array($query_c);
								 		$cname=$row_c['fname'].' '.$row_c['lname'];

								 		if(date("jS M'y D",time())==date("jS M'y D",$rq6['hit_time']))
								 		{
								 			$tday=1;
								 			$app_cnt++;
								 			//echo date("jS M'y D",time());
								 		}

								 		/*$xdate=strtotime(date("j M y",$rq6['date'])." ".date("H:i",$rq6['time']));
								 		$tdate=time()+3600;
								 		$flagz=0;

								 		  if($tdate<=$xdate)
										    {
										      $flagz=1;
										    }

										    if($rq6['status']=="" and $flagz==0)
										        {
										          query("UPDATE meet set status='1' where id='$idx'");
										          redirect("bank-approve");

										        }*/


								 		echo '<tr id="'.++$c.'">
								 		<td>'.$count.'</td>
								 		<td>'.$rq6['bno'].'</td>
								 		<td><a style="
    color: #00bef2;
    text-decoration: underline;
    font-weight: 800;
"href="time?email='.$row_c['emailid'].'" target="_blank">'.$cname.'</a></td>
								 		<td>'.$row_c['phone'].'</td>
								 		<td>'.$row_u['name'].'</td>
								 		<td>'.$row_u['phone'].'</td>
								 		<td>'.$row_u['u_id'].'</td>';
								 		if($tday==1)
								 		echo '<td class="tday">'.date("jS M'y D h:i A",$rq6['hit_time']).'</td>';
								 	else
								 		echo '<td >'.date("jS M'y D h:i A",$rq6['hit_time']).'</td>';

								 		echo '<td>'.date("jS M'y D ",$rq6['date']).'</td>';
								 		



								 		echo '<td>'.$rq6['slot'].'</td>';

								 		if($rq6['paid']>0)
										echo '<td class="paisa"><span class="fa fa-inr">'.number_format($rq6['paid'],2).'</span> </td>';
										else
										echo '<td><span class="fa fa-inr">'.number_format($rq6['paid'],2).'</span> </td>';


										echo '<td><span class="fa fa-inr">'.number_format(($rq6['paid']/5),2).'</span> </td>
										<td><span class="fa fa-inr">'.number_format(paid($rq6['paid']),2).'</span> </td>';

										if(($rq6['confirm']=='0' or $rq6['confirm']=='-1') and $rq6['status']=='' and $rq6['bnk_status']=='0')
											echo '<td class="">Transaction not completed</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' and $rq6['bnk_status']=='0')
											echo '<td class="btn-info">Appointment Successful</td>';
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
										else if($rq6['confirm']=='1' and $rq6['status']=='4' and $rq6['bnk_status']=='1')
											echo '<td class="btn-danger">Amount Rejected</td>';

										echo '<td><form action="#'.$c.'" method="POST">
										<input type="hidden" name="id" value="'.$rq6['id'].'">
										<select size="1" id="mode" name="mode" required>
																<option value="'.$rq6['type'].'" style="display:none">'.$type.'</option>
																<option value="1">Video</option>
																<option value="2">Audio</option>
												

														</select>
														<!-- <button class="btn btn-primary btn-block" type="submit" name="conf">Change</button>-->
														</form>

		
															</td>';
										echo '<td><form action="#'.$c.'" method="POST">
										<input type="hidden" name="id" value="'.$rq6['id'].'">
										<input rows="3" name="why" placeholder="Comment " value="'.$rq6['why_cancel'].'">
														<button class="btn btn-primary btn-block" type="submit" name="can">Submit</button>
														</form>

		
															</td>';

															

								 		echo '</tr>';

								 	$count++;
								 		
								 }
								 echo '<input type="hidden" id="app_cnt" value="'.$app_cnt.'">';

								 	echo '</tbody>
								 	</table>

		
</div>
	</div>';



	

	?>

</body>
<script type="text/javascript">
	var app_cnt=document.getElementById('app_cnt');
	document.getElementById('app_disp').innerHTML="Total Appointments Tried to book Today="+app_cnt.value

</script>