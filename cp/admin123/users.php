<?php include('includes/head.php'); ?>

			
			<table class="default table">

				<thead><tr>

					<th>#</th>

					<th>Name</th>
						<th>Linked with</th>

					<?php 
					//if($fimg==1)
					{

					//echo '<th>Profile Pic</th>';
				}
					?>
				

						<th>Email</th>

					<th>Phone</th>
					
				

					


					<th>Date of SignUp</th>
					<th>Device</th>

				

				</tr></thead>

				<?php

				//$query = mysqli_query($connection, "SELECT * FROM c_userdata  where verifyf='1' OR verifyf='0' OR verifyf='-1'  ORDER BY id DESC");

				$count=1;
					echo '<tbody>';
				while($r = mysqli_fetch_array($queryu1))
				{

					$idx=$r['id'];

					echo '<tr>';

					echo '<td>'.$count++.'</td>';

					echo '<td><a target="_blank" href="/u_img/'.$r['url_file'].'.png">'.$r['name'].'</a></td>';
					if($r['status']=='g')
					{
						$st='Google';
					}
					else
						$st='FB';
					echo '<td><a target="_blank" href="'.$r['link'].'">'.$st.'</a></td>';

				//	if($fimg==1)
						//echo '<td><img class="img-circle" style="height: 200px;" src="'.$r['url'].'"></td>';
				
					echo '<td>'.$r['emailid'].'</td>';
					echo '<td>'.$r['phone'].'</td>';
				//	echo '<td>'.$r['clg'].'</td>';
					echo '<td>'.date("jS M'y l h:i A",$r['timestamp']).'</td>';
					
					
					if($r['agent']=='1')
					{
						$device='Desktop';
					}
					else if($r['agent']=='0')
					{
						$device='Mobile';
					}
					else
					{
						$device='No Data';
					}
					echo '<td>'.$device.'</td>';
				
						

					


					echo '</tr>';

				}

				?>
				</tbody>
			</table>

		
</div>
	</div>



</body>
