
<style type="text/css">

</style>

<?php  
//date_default_timezone_set("Asia/Kolkata"); 

include_once('../../includes/config.php');
$f=0;
$days=array('mon','tue','wed','thu','fri','sat','sun');
$i=0;

	# code...

while($i<7){
 $day=$days[$i];

	if(isset($_POST[$day]))
	{
		$check = $_POST[$day];
		foreach($check as $checked) 
		{
			$checked=implode(',', $_POST[$day]);



		}
		if($f==0)
		{
			if(query("INSERT INTO timetable ($day) VALUES ('".$checked."')"))
			{$f=1;}
		}
		else if($f==1)
		{
			query("UPDATE timetable SET $day='$checked'");
		}
	}
	else
	{
		echo 'notset';
	}
	$i++;
}
/*echo date('m-d-Y');
echo "<br>";
echo date("jS \of F Y h:i:s A");
 //echo $_SERVER['REQUEST_TIME'];
echo "<br>";
echo $ti=time();
echo "<br>";
echo date("jS  F Y h:i:s A D", $ti);

echo "<br>";*/



$t1 = strtotime('2010-05-06 09:00:00');
$t2 = strtotime('2010-05-07 09:00:00');

$timeslots = array();

while ($t1 < $t2) {
	$t1 = $t1 + 3600;
	$timeslots[] = $t1;
}
echo '<form name ="check" action="" method="POST">
<tr>
<table class="table table-hover table-bordered">

					<thead><tr>';


					foreach ($days as $day) {

						echo '<th>'.$day.'</th>';

					}

					echo '</tr></thead>
					<tbody>





';

foreach ($days as $day) {
		# code...
	echo '<tr>';
	foreach ( $timeslots as $slot ) {
		$dt= date("H:i", $slot) . '-'.date("H:i", $slot+3600);


		
		echo '<td><input type="checkbox" name="'.$day.'[]" value="'.$dt.'"  />'.$dt.'<br></td>';
		



	}
	echo '</tr>';
	//echo "<br>";
}	


echo '</tbody>	</table>';
echo '<input type="submit" value="submit" /></form>';
?>















