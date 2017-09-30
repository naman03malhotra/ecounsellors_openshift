<?php include('includes/head.php');

$id=$_GET['q']; 

//echo '<h1>'.$id.'</h1>';
?>

	

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
											<th>Question</th>
											
										</tr>

									</thead>
								 	<tbody>';

								 	$q6=query("SELECT * from ques where id='$id'");
								 	$count=1;
								 	$c=0;
								$rq6=mysqli_fetch_array($q6);
								//echo '<h1>'.$rq6['c_id'].'</h1>';

								 //	while())
								 	{
								 		 	


								 		echo '<tr id="'.++$c.'">
								 		<td>'.$rq6['question'].'</td>';
								 		
								 		
										

								 		echo '</tr>';

								 	$count++;
								 		
								 }

								 	echo '</tbody>
								 	</table>

		
</div>
	</div>';




	
	?>

</body>
