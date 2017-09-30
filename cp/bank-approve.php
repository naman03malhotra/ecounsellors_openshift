<?php include('includes/head.php'); ?>

			<ul class="nav nav-tabs">
  <li role="presentation" ><a href="index">Home</a></li>
   <li role="presentation" ><a href="pen">Pending</a></li>
    <li role="presentation" ><a href="couns">Counsellor SignUps</a></li>
   <li role="presentation" ><a href="users">Users</a></li>
  <li role="presentation"><a href="issue">Issues</a></li>
  <li role="presentation" class="active"><a href="bank-approve">Bank-Approve</a></li>
  <li role="presentation"><a href="free">Free-Appointments</a></li>
</ul>

<style type="text/css">
	.tday{
		    background-color: cadetblue;
    color: #FFF;
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
											<th>Booking Date</th>
											<th>App. Date</th>
											<th>App. Time</th>
											<th>Amount</th>
											<th>EC Fee(20%)</th>
											<th>We Get</th>
											<th>Status</th>
											<th>Mode</th>
											<th>Bank Transfer Date</th>
											<th>Reason</th>
											<th>Action</th>
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from meet where confirm='1' order by id desc");
								 	$count=1;
								 	$c=0;
								 	$tday=0;
								 	while($rq6=mysqli_fetch_array($q6))
								 	{
								 		   if($rq6['type']==1)
								          {
								            $type="Video";

								          }
								          else if($rq6['type']==2)
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

								 		if(date("jS M'y D",time())==date("jS M'y D",$rq6['date']))
								 		{
								 			$tday=1;
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


								 		echo '<tr'; 
								 		//if($tday==1)
								 		{
								 			echo 'class="tday"';
								 		}
								 		echo 'id="'.++$c.'">
								 		<td>'.$count.'</td>
								 		<td>'.$rq6['bno'].'</td>
								 		<td>'.$cname.'</td>
								 		<td>'.$row_c['phone'].'</td>
								 		<td>'.$row_u['name'].'</td>
								 		<td>'.$row_u['phone'].'</td>
								 		<td>'.date("jS M'y D h:i A",$rq6['btime']).'</td>
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

										echo '<td>'.$type.'</td>';
										echo '<td>'.date("jS M'y D",$rq6['bnk_date']).'</td>';
											echo '<td>'.$rq6['comment'].'</td>';
												
										if($rq6['status']!='')
										{
												echo '<td>

												<form action="#'.$c.'" method="POST">

					
					<input type="hidden" name="id" value="'.$rq6['id'].'">';




/*if($rq6['status']!=1){
					
					echo '<input type="text" name="comment_r" placeholder="Reason" value="'.$rq6['comment'].'">

					<button class="btn btn-warning btn-block" type="submit" name="claim">Provide Claim Reason</button>
					<hr>
					<input type="text" name="comment_s" placeholder="Reason" value="'.$rq6['comment'].'">

					<button class="btn btn-block btn-danger" type="submit" name="claim_solve">Approve Claim</button>
					<hr>
					<input type="text" name="comment_re" placeholder="Reason" value="'.$rq6['comment'].'">

					<button class="btn btn-info btn-block" type="submit" name="disapprove">Reject Claim</button><hr>';
				}*/
					
					if($rq6['status']==1 or $rq6['status']==3)
					{
					echo '<button class="btn btn-primary btn-block"type="submit" name="approve">Approve for Bank </button>
						<hr>
					<button class="btn btn-success btn-block" type="submit" name="approve_bnk">Transfer To Bank</button>';
					}

					echo '</form>




												</td>';
											}

								 		echo '</tr>';

								 	$count++;
								 		
								 }

								 	echo '</tbody>
								 	</table>

		
</div>
	</div>';



	if(isset($_POST['approve'])){

		$sid = $_POST['id'];

		

		query("UPDATE meet SET bnk_status='2' WHERE id='$sid'");
		redirect("bank-approve");

	}
	else if(isset($_POST['claim'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_r'];


		query("UPDATE meet SET status='2',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}
	else if(isset($_POST['claim_solve'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_s'];


		query("UPDATE meet SET status='4',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_re'];


		query("UPDATE meet SET status='3',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}

	else if(isset($_POST['approve_bnk']))
	{
		$sid = $_POST['id'];
		


		query("UPDATE meet SET bnk_status='1',bnk_date='$time' WHERE id='$sid'");
			redirect("bank-approve");

	}

	?>

</body>
