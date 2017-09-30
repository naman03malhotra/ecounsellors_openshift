<title>Brand Ambassador panel - ecounsellors.in</title>
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
$count=0;
if(isset($_POST['sub']))
{
	$code=$_POST['code'];
	$email=$_POST['email'];

		$q=query2("SELECT * from ca where ref='$code' and email like '%$email%'","mark");
		$q_num=mysqli_num_rows($q);

		if($q_num>0)
		{

			$q2=query("SELECT * from u_users where ca='$code' order by id desc");
			$q2_num=mysqli_num_rows($q2);

			if($q2_num>0)
			{

				echo '<table class="table default">

				<thead><tr>

					<th>#</th>
					<th>Name</th>
					<th>Date of SignUp</th>

					

				</tr></thead>';	
				echo '<tbody>';
				while($row=mysqli_fetch_array($q2))

					{

							

				

		
				
				

					echo '<tr>';

					echo '<td>'.++$count.'</td>';

					echo '<td>'.$row['name'].'</td>';

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
				echo '</tbody>
			</table>';
			}
			else
			{
				echo "<h3 class='text-center bg-primary'>THIS PORTAL WILL ONLY OPEN ONCE YOU SIGN UP YOURSELF OR ONE OF YOUR FRIENDS USING YOUR UNIQUE 'CA' LINK GIVEN TO YOU. </h3>";
			}

			
		}
		else
		{
			echo "<h2 class='text-center bg-primary'>INVALID CODE OR EMAIL ID</h2>";
		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Brand Ambassador panel</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
		<form role="form" action="" method="post" class="col-md-8 go-right">
			<h2>Brand Ambassador Portal</h2>
            <p>Input your email ID and unique code below.</p>
			<div class="form-group">
			<input id="name" name="code" type="text" class="form-control" max="6" value="<?php echo $_POST['code'];?>" required>
			<label for="name">6 digit UNIQUE CODE</label>
		</div>
		<div class="form-group">
			<input id="email" name="email" type="email" class="form-control" value="<?php echo $_POST['email'];?>" required>
			<label for="phone">Email associated with program</label>
		</div>
		<button type="submit" class="btn btn-primary btn-block btn-lg" name="sub">SUBMIT</button>
		 <h3 class="bg-success" style="padding:10px;margin-top:20px;clear:both"><small><a href="https://ecounsellors.in/" target="_blank">Click Here!</a> to know More about ecounsellors.in</small></h3>
		</form>
       
	</div>
</div>

</body>
</html>


<?php

include('../includes/footer2.php');