<?php include('includes/head.php'); ?>

		

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
											<th>Client</th>
											<th>Booking Date</th>
											<th>App. Date</th>
											<th>App. Time</th>
											
											<th>Status</th>
											
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from meet_f where confirm='1' order by id desc");
								 	$count=1;
								 	$c=0;
								 	while($rq6=mysqli_fetch_array($q6))
								 	{
								 		$idx=$rq6['id'];
								 		$uid=$rq6['u_id'];
								 		$cid=$rq6['c_id'];
								 		$query_u=query("SELECT * from u_users where u_id='$uid'");
								 		$row_u=mysqli_fetch_array($query_u);
								 		$query_c=query("SELECT * from c_userdata where sub_id='$cid'");
								 		$row_c=mysqli_fetch_array($query_c);
								 		$cname=$row_c['fname'].' '.$row_c['lname'];

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
								 		<td>'.$cname.'</td>
								 		<td>'.$row_u['name'].'</td>
								 		<td>'.date("jS M'y D",$rq6['btime']).'</td>
								 		<td>'.date("jS M'y D",$rq6['date']).'</td>
								 		<td>'.$rq6['slot'].'</td>
										';

										if($rq6['confirm']=='1' and $rq6['status']=='')
											echo '<td class="">Appointment Pending</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1')
											echo '<td class="btn-info">Appointment Successful</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='2' )
											echo '<td class="btn-warning">Claim Raised</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='4' )
											echo '<td class="btn-danger">Claim Approved(User\'s Favour)</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='3' )
											echo '<td class="btn-info">Claim Rejected(Counsellor\'s Favour)</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' )
											echo '<td class="btn-primary">Avail. for bank Transfer</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='1' )
											echo '<td class="btn-success">Amount Transferred To Bank</td>';
										else if($rq6['confirm']=='1' and $rq6['status']=='4')
											echo '<td class="btn-danger">Amount Rejected</td>';


										
											

								 		echo '</tr>';

								 	$count++;
								 		
								 }

								 	echo '</tbody>
								 	</table>

		
</div>
	</div>';



	if(isset($_POST['approve'])){

		$sid = $_POST['id'];

		

		mysqli_query($connection, "UPDATE meet SET bnk_status='2' WHERE id='$sid'");
		redirect("bank-approve");

	}
	else if(isset($_POST['claim'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_r'];


		mysqli_query($connection, "UPDATE meet SET status='2',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}
	else if(isset($_POST['claim_solve'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_s'];


		mysqli_query($connection, "UPDATE meet SET status='4',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_re'];


		mysqli_query($connection, "UPDATE meet SET status='3',comment='$comment' WHERE id='$sid'");
			redirect("bank-approve");

	}

	else if(isset($_POST['approve_bnk']))
	{
		$sid = $_POST['id'];
		


		mysqli_query($connection, "UPDATE meet SET bnk_status='1',bnk_date='$time' WHERE id='$sid'");
			redirect("bank-approve");

	}

	?>

</body>
