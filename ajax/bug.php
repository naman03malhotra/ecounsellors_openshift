<?php


include('../includes/config.php');

if(isset($_POST['urls']))
{
	$url=strip_tags($_POST['urls']);

	$uid=$_SESSION['u_id'];
	$email=strip_tags($_POST['email']);
	$exp=filter(strip_tags($_POST["exp"]));

	query("INSERT INTO u_bug(urls, exp,u_id,emailid) values('$url','$exp','$uid','$email')");

	//query("UPDATE u_bug set url='$url' where u_id='$uid'");




}





if(isset($_POST['op']))
{
	$cat=strip_tags($_POST['op']);

	$uid=$_SESSION['u_id'];
	$email=strip_tags($_POST['email']);
	$exp=filter(strip_tags($_POST["exp"]));
	$actual=date("jS M'y D",time());

	query("INSERT INTO u_feed(cat, exp,u_id,emailid,timestamp,actual) values('$cat','$exp','$uid','$email','$time','$actual')");

	//query("UPDATE u_bug set url='$url' where u_id='$uid'");




}