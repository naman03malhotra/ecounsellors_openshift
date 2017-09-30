<?php include('includes/head.php'); ?>

			
			<table class="default table">

				<thead><tr>

					<th>#</th>

					<th>Name</th>
					

					
				

						<th>Email</th>

					<th>Phone</th>
					<th>pass</th>
					
				

					


					<th>Date of SignUp</th>
				

				

				</tr></thead>

				<?php

				//$query = mysqli_query($connection, "SELECT * FROM c_userdata  where verifyf='1' OR verifyf='0' OR verifyf='-1'  ORDER BY id DESC");

				$count=1;
					echo '<tbody>';
				while($r = mysqli_fetch_array($query))
				{

					$idx=$r['id'];

					echo '<tr>';

					echo '<td>'.$count++.'</td>';

					echo '<td><a target="_blank" href="#">'.$r['name'].'</a></td>';
					
				

				//	if($fimg==1)
				
					echo '<td>'.$r['emailid'].'</td>';
					echo '<td>'.$r['phone'].'</td>';
				  echo '<td>'.$r['password'].'</td>';
					echo '<td>'.date("jS M'y l h:i A",$r['timestamp']).'</td>';
					
					
					
				
						

					


					echo '</tr>';

				}

				?>
				</tbody>
			</table>

		
</div>
	</div>



</body>
