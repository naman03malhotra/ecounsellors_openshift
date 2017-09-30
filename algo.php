<?php


include("includes/config.php");


$q= query("SELECT * from c_userdata where typec like '%eng%'");


while($row= mysqli_fetch_array($q))
{

	$typec= $row['typec'];
	$id= $row['id'];
	$new_arr= array();
	
	$arr= explode(",", $typec);

	foreach ($arr as $field) {
		if($field!='Engineering Mentorship')
			$new_arr[]=$field;
		else
			$new_arr[]='IIT JEE Mentorship';

		# code...
	}

	/*foreach ($arr as $field) {
		if($field!='Entrepreneurship Startup Masterz')
			$new_arr[]=$field;
		else
			$new_arr[]='Entrepreneurship';

		# code...
	}*/
	echo $new_data= implode(",", $new_arr);
	echo '<br>';

	query("update c_userdata set typec='$new_data' where id='$id'");
}