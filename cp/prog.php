<?php
require_once("config.php");




$session_emailid=$_SESSION['cpl_id'];
$queryf = query("SELECT * FROM userdata WHERE emailid='$session_emailid'");
$rx=mysqli_fetch_array($queryf);
$roq=mysqli_num_rows($queryf);
if($rx['verifyf']=="1")
{			

	$rowf = mysqli_fetch_array($queryf);



	$prog = $_GET['prog'];
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
	if(!isset($_GET['prog'])&&$rowf['verifyf']!="1"){
		redirect("index.php");
	}
	$result=query("SELECT link FROM progm where prog='$prog'");
	$anymatches=mysqli_num_rows($result);
	if ($anymatches == 0) 
	{
		echo "<h2>Invalid programme go <a href='profile.php#prog'>Back</a> and try again</h2><br><br>"; 
	}
	else if(isset($_GET['id'])){
		$url ="template.php";

		$prog_header=$prog;
		render("$url", ["title" => $prog_header,"id"=>$id]);
	}
	else
	{
		$url ="template.php";

		$prog_header=$prog;
		render("$url", ["title" => $prog_header]);
	}


}
else if($rx['verifyf']=="0")
{
	echo "<h1 style='font-size:100px;'>You are not verified yet, please wait for your approval.</h1><br><br>"; 
}
else
{
	echo "<h1 style='font-size:100px;'>You need to <a href='profile.php'> SignIn</a> first to view this page</h1><br><br>"; 
}



?>

