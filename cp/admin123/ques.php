<?php include('includes/head.php');


if(isset($_POST['answered'])){

		$sid = $_POST['id'];

		

		query("UPDATE ques SET status='1',ansdate='$time' WHERE id='$sid'");
		//redirect("ques");

	}
	else if(isset($_POST['user'])){

		$sid = $_POST['id'];
		//$comment=$_POST['comment_r'];


		query("UPDATE ques SET conv='1' WHERE id='$sid'");
			//redirect("ques");

	}
	else if(isset($_POST['abs'])){

		$sid = $_POST['id'];
		//$comment=$_POST['comment_r'];


		query("UPDATE ques SET status='-1' WHERE id='$sid'");
			//redirect("ques");

	}
	else if(isset($_POST['sent'])){

		$sid = $_POST['id'];
		$ques= $_POST['ques'];
		$emailid= $_POST['emailid'];
		$cname= $_POST['cname'];
		$uname= $_POST['uname'];
		 require_once('mail2.php');
					
						$headers = "ecounsellorscare@gmail.com";

						//$headers2 = "support@ecounsellors.in";

						//$cname=$rowf['fname'].' '.$rowf['lname'];
						//$username=$result3['name'];
					
						//$emailid=$result3['emailid'];

						//$emailid2=$rowf['emailid'];
						

						
						$sub= "Ecounsellors.in - Questions By ".strtok($uname," "); 
						$html='Greetings,
						<br>
						<br>
						'.strtok($uname," ").' wants to ask you the following Questions.<br>
						Please send your reply to this email.
						<br>
						<br>'.nl2br($ques).'
						
						<br>
						<br>
						Regards,<br>
						Team Ecounsellors<br>
						<a href="https://ecounsellors.in">www.ecounsellors.in</a>

						';

						mailman2($emailid,$sub, $html, $cname,$headers,"Ecounsellors.in");
		//$comment=$_POST['comment_r'];


		query("UPDATE ques SET sent='1' WHERE id='$sid'");
			//redirect("ques");

	}  ?>

	

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
											
											<th>Counsellor</th>
											<th>C .ph</th>
											<th>Client</th>
											<th>U .ph</th>
											<th>U .id</th>
											<th>U .email</th>
											<th>Asked Date</th>
											<th>Ans. Date</th>
											
											<th>Status</th>
												<th>View Questions</th>
											
											
											<th>Action</th>
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from ques order by id desc");
								 	$count=1;
								 	$c=0;
								
								 	while($rq6=mysqli_fetch_array($q6))
								 	{
								 		 	$tday=0;
								 		  
								 		$idx=$rq6['id'];
								 		$uid=$rq6['u_id'];
								 		$cid=$rq6['c_id'];
								 		$query_u=query("SELECT * from u_users where u_id='$uid'");
								 		$row_u=mysqli_fetch_array($query_u);
								 		$query_c=query("SELECT * from c_userdata where sub_id='$cid'");
								 		$row_c=mysqli_fetch_array($query_c);
								 		$cname=$row_c['fname'].' '.$row_c['lname'];

								 		if(date("jS M'y D",time())==date("jS M'y D",$rq6['timestamp']))
								 		{
								 			$tday=1;
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
								 		
								 		<td>'.$cname.'</td>
								 		<td>'.$row_c['phone'].'</td>
								 		<td>'.$row_u['name'].'</td>
								 		<td>'.$row_u['phone'].'</td>
								 		<td>'.$row_u['u_id'].'</td>
								 		<td>'.$row_u['emailid'].'</td>';
								 		
								 		if($tday==1)
								 		echo '<td class="tday">'.date("jS M'y D",$rq6['timestamp']).'</td>';
								 	else
								 		echo '<td >'.date("jS M'y D",$rq6['timestamp']).'</td>';



								 	

								 echo 	'<td>'.date("jS M'y D h:i A",$rq6['ansdate']).'</td>';


									

										if($rq6['status']=='' and $rq6['conv']=='' and $rq6['sent']=='')
											echo '<td class="">Answer Pending</td>';
										if($rq6['status']=='-1' and $rq6['conv']=='' and $rq6['sent']=='')
											echo '<td class="btn-danger">Absurd (Draft Manual Email)</td>';
										else if($rq6['status']=='' and $rq6['sent']=='1' and $rq6['conv']=='')
											echo '<td class="btn-warning">Question Sent</td>';
										else if($rq6['status']=='1' and $rq6['conv']=='')
											echo '<td class="btn-primary">Question Answered</td>';
										else if($rq6['conv']=='1' )
											echo '<td class="btn-success">User Converted</td>';
										
										echo '<td ><a class="btn btn-danger" target="_blank" href="view?q='.$idx.'">View Ques</a></td>';
										
												
										//if($rq6['status']=='')
										{
												echo '<td>

												<form action="#'.$c.'" method="POST">

					
					<input type="hidden" name="id" value="'.$rq6['id'].'">
					<input type="hidden" name="ques" value="'.$rq6['question'].'">
					<input type="hidden" name="emailid" value="'.$row_c['emailid'].'">
					<input type="hidden" name="cname" value="'.$cname.'">
					<input type="hidden" name="uname" value="'.$row_u['name'].'">';




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
					
					//if($rq6['status']==1 or $rq6['status']==3)
					{
					echo '<button class="btn btn-warning btn-block" type="submit" name="sent">Send Questions(Email)</button>
					<button class="btn btn-primary btn-block"type="submit" name="answered">Question Answered </button>
					
					<button class="btn btn-success btn-block" type="submit" name="user">User Converted</button>
					<button class="btn btn-danger btn-block" type="submit" name="abs">Mark Absurd</button>';
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



	
	
	?>

</body>
