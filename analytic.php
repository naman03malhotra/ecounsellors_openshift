<?php


include("includes/config.php");


/*
$x= query("SELECT * from meet where status=1 and confirm=1");


echo 'Total:'.$nx = mysqli_num_rows($x);
$sum=0;
while($arr= mysqli_fetch_array($x))
{
	$sub_id=$arr['c_id'];
	$x2= query("SELECT * from c_userdata where typec (like '%intern%' and like '%coding%') and sub_id='$sub_id'");
	$nx2= mysqli_num_rows($x2);
	 $sum=$sum+$nx2;


}
echo 'Sum:'.$sum;
echo '<br>';
echo $percent= $sum/$nx*100; echo '%';

*/


$x= query("SELECT * from c_userdata where verifyf='1'");
echo 'Total:'.$nx = mysqli_num_rows($x);

echo '<br>';
 $cnt=0;

while($nx = mysqli_fetch_array($x))

{
	$flag=0;
	$flag2=0;
     $typec=$nx['typec'];

     $arr= explode(',', $typec);


     foreach ($arr as $ar) {
     	if($ar=='Placements and Internships')
     	{
     		$flag=1;
     	}
     	if($ar=='Development and Coding')
     	{
     		$flag2=1;
     	}

     	if($flag==1 and $flag2==1)
     	{
     		$cnt++;
     	}
     }
}

echo $cnt;