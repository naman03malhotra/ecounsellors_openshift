<?php

include('../includes/config.php');



if(isset($_POST['search_inp']))
{
	

	
	$search_inp= $_POST['search_inp'];

	$uid=$_SESSION['u_id'];
	
		//file put
  

  	query("INSERT INTO search_data(search_inp,timestamp,ip,u_id,agent) values('$search_inp','$time','$ip','$uid','$agent')");



}