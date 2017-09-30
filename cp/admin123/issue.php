<?php include('includes/head.php'); 


if(isset($_POST['claim'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_r'];


		query("UPDATE meet SET status='2',comment='$comment' WHERE id='$sid'");
			//redirect("issue");

	}
	else if(isset($_POST['claim_solve'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_s'];


		query("UPDATE meet SET status='4',comment='$comment' WHERE id='$sid'");
			//redirect("issue");

	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$comment=$_POST['comment_re'];


	query("UPDATE meet SET status='3',comment='$comment' WHERE id='$sid'");
			//redirect("issue");

	}?>



		

			
			<table class="table default">

				<thead><tr>

					<th>#</th>
					<th>Ticket No.</th>
					<th>Booking No.</th>

					<th>Issue</th>

					<th>Explaination</th>
					

					

					
					<th>Status</th>
					<th>Reason</th>

					<th>Action</th>

				</tr></thead>

				<?php

		$query = query("SELECT * FROM meet where status!='' and status!='1' and status!='r' and status!='c' ORDER BY ticket DESC");

				$count=1;
					echo '<tbody>';
				while($r = mysqli_fetch_array($query)){


					if($r['issue']==4)
					{
						$issue="Other";
					}
					else if($r['issue']==2)
					{
						$issue="Technology Related";
					}
					else if($r['issue']==3)
					{
						$issue="Payment";
					}

					echo '<tr>';

					echo '<td>'.$count++.'</td>';

					echo '<td>'.$r['ticket'].'</td>';

					echo '<td>'.$r['bno'].'</td>';

					echo '<td>'.$issue.'</td>';

					echo '<td><pre>'.$r['exp'].'</pre></td>';


					

					

					
					
										if($r['confirm']=='1' and $r['status']=='' and $r['bnk_status']=='0')
											echo '<td class="">Appointment Pending</td>';
										else if($r['confirm']=='1' and $r['status']=='1' and $r['bnk_status']=='0')
											echo '<td class="btn-info">Appointment Successful</td>';
										else if($r['confirm']=='1' and $r['status']=='2' and $r['bnk_status']=='0')
											echo '<td class="btn-warning">Claim Raised</td>';
										else if($r['confirm']=='1' and $r['status']=='4' and $r['bnk_status']=='0')
											echo '<td class="btn-danger">Claim Approved(User\'s Favour)</td>';
										else if($r['confirm']=='1' and $r['status']=='3' and $r['bnk_status']=='0')
											echo '<td class="btn-info">Claim Rejected(Counsellor\'s Favour)</td>';
										else if($r['confirm']=='1' and $r['status']=='1' and $r['bnk_status']=='2')
											echo '<td class="btn-primary">Avail. for bank Transfer</td>';
										else if($r['confirm']=='1' and $r['status']=='1' and $r['bnk_status']=='1')
											echo '<td class="btn-success">Amount Transferred To Bank</td>';
										else if($r['confirm']=='1' and $r['status']=='4' and $r['bnk_status']=='1')
											echo '<td class="btn-danger">Amount Rejected</td>';
										echo '<td>'.$r['comment'].'</td>';


							
										if($r['status']!='')
										{
												echo '<td>

												<form action="#'.$c.'" method="POST">

					
					<input type="hidden" name="id" value="'.$r['id'].'">';




if($r['status']!=1){
					
					echo '<input type="text" name="comment_r" placeholder="Reason" value="'.$r['comment'].'">

					<button class="btn btn-warning btn-block" type="submit" name="claim">Provide Claim Reason</button>
					<hr>
					<input type="text" name="comment_s" placeholder="Reason" value="'.$r['comment'].'">

					<button class="btn btn-block btn-danger" type="submit" name="claim_solve">Approve Claim</button>
					<hr>
					<input type="text" name="comment_re" placeholder="Reason" value="'.$r['comment'].'">

					<button class="btn btn-info btn-block" type="submit" name="disapprove">Reject Claim</button><hr>';
				}
					
					

					echo '</form>




												</td>';
											}



				}

				?>
				</tbody>
			</table>

		
</div>
	</div>

	<?php

 

	?>

</body>
