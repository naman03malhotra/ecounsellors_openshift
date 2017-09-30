<?php
include('../includes/config.php');

if(isset($_GET['next']))
{
	$sub=$_SESSION['sub_id'];
	$uid=$_SESSION['u_id'];
	query("INSERT INTO hit_book(u_id,c_id,timestamp,agent,ip) values('$uid','$sub','$time','$agent','$ip')");


	if($_GET['next']=="book")
	{
	  $_SESSION['next']="book";
	}
	else if($_GET['next']=="ques")
	{
	  $_SESSION['next']="ques";
	}
	else if($_GET['next']=="thank")
	{
	  $_SESSION['next']="thank";
	}

echo 1;

}
else
	exit();