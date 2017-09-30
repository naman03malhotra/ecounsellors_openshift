<title>EIC track admin - ecounsellors.in</title>
<?php

include('../includes/config.php');

include('../includes/header.php');
?>

<style type="text/css">
.form-control{
    background: transparent;
}
form {
	width: 320px;
	margin: 20px;
}
form > div {
	position: relative;
	overflow: hidden;
}
form input, form textarea {
	width: 100%;
	border: 2px solid gray;
	background: none;
	position: relative;
	top: 0;
	left: 0;
	z-index: 1;
	padding: 8px 12px;
	outline: 0;
}
form input:valid, form textarea:valid {
	background: white;
}
form input:focus, form textarea:focus {
	border-color: #357EBD;
}
form input:focus + label, form textarea:focus + label {
	background: #357EBD;
	color: white;
	font-size: 70%;
	padding: 1px 6px;
	z-index: 2;
	text-transform: uppercase;
}
form label {
	-webkit-transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	position: absolute;
	color: #999;
	padding: 7px 6px;
	font-weight: normal;
}
form textarea {
	display: block;
	resize: vertical;
    columns:5;
}
form.go-bottom input, form.go-bottom textarea {
	padding: 12px 12px 12px 12px;
}
form.go-bottom label {
	top: 0;
	bottom: 0;
	left: 0;
	width: 100%;
}
form.go-bottom input:focus, form.go-bottom textarea:focus {
	padding: 4px 6px 20px 6px;
}
form.go-bottom input:focus + label, form.go-bottom textarea:focus + label {
	top: 100%;
	margin-top: -16px;
}
form.go-right label {
	border-radius: 0 5px 5px 0;
	height: 100%;
	top: 0;
	right: 100%;
	width: 100%;
	margin-right: -100%;
}
form.go-right input:focus + label, form.go-right textarea:focus + label {
	right: 0;
	margin-right: 0;
	width: 40%;
	padding-top: 5px;
}
</style>


<?php
echo '<table class="table default">

				<thead><tr>

					<th>#</th>
					<th>EIC name</th>
					<th>EIC code</th>
					<th>EIC clg</th>
					<th>EIC email</th>
					<th>EIC ph</th>
					<th>IMG</th>
					<th>Date of Trans.</th>

					

				</tr></thead>';	
				echo '<tbody>';
$count=0;
//if(isset($_POST['sub']))
{
	$code=$_POST['code'];
	$email=$_POST['email'];

		$q=query2("SELECT * from eic","mark");
		$q_num=mysqli_num_rows($q);
		while($q_qer=mysqli_fetch_array($q))
		{
			$name=$q_qer['name'];
			$code=$q_qer['ref'];
			$clg=$q_qer['clg'];
			$ca_email=$q_qer['email'];
			$ca_phone=$q_qer['phone'];
			$cnt_tot=0;
		

		if($q_num>0)
		{

			$q2=query2("SELECT * from color where code='$code'","mark");
			$q2_num=mysqli_num_rows($q2);

			if($q2_num>0)
			{

				
				while($row=mysqli_fetch_array($q2))

					{

							

				$cnt_tot++;

		
				
				

					echo '<tr>';

					echo '<td>'.++$count.'</td>';
					echo '<td>'.$name.'</td>';
					echo '<td>'.$code.'</td>';
					echo '<td>'.$clg.'</td>';
					echo '<td>'.$ca_email.'</td>';
					echo '<td>'.$ca_phone.'</td>';

					echo '<td><a href="'.$row['url'].'" target="_blank">LINK</a></td>';


					echo '<td>'.date("jS M'y D h:i A",$row['timestamp']).'</td>';

					
					echo '</tr>';
											



			
						//$id=$row['id'];
						//$username=$row['name'];
					/*$ref=strtoupper(substr($username, 0,3));
					$rand=random_string(3);
					$ref.=$rand;
					preg_replace('/\s+/', '-', $ref);
					$refx="https://ecounsellors.in/?lo&ca=".$ref;
					query2("UPDATE ca set ref='$ref',refx='$refx' where id='$id'","mark");*/


					}
					echo '<tr>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td></td>';
					echo '<td><b>Total:</b></td>';
					echo '<td>'.$cnt_tot.'</td>';
					echo '</tr>';
				
			}
			else
			{
					echo '<tr>';

					echo '<td>'.++$count.'</td>';
					echo '<td>'.$name.'</td>';
					echo '<td>'.$code.'</td>';
					echo '<td>'.$clg.'</td>';
					echo '<td>'.$ca_email.'</td>';
					echo '<td>'.$ca_phone.'</td>';

					echo '<td>NO ENTRY</td>';


					echo '<td>-</td>';

					
					echo '</tr>';
									
			}

			
			}
			else
			{
				echo "<h2 class='text-center bg-primary'>INVALID CODE OR EMAIL ID</h2>";
			}
		}echo '</tbody>
			</table>';

}

?>

