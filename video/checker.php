<?php

include("../includes/config.php");
//@session_start();



if(isset($_POST['action']) && $_POST['action'] == 'secret')
{	
	

	$sid= strip_tags($_POST['sid']);
	
	{
		//$password= md5(strip_tags($_POST['password']));
		//$password= (strip_tags($_POST['password']));

		if($result=query("INSERT INTO video(sid) values('$sid')"))
			echo "1";

		

		
	}
}


?>