


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-57882215-1', 'auto');
ga('send', 'pageview');

</script>





<?php

require_once("../config.php");
$p=$_GET['p'];
$id=$_GET['id'];

$r=query("SELECT * FROM progm WHERE nick='$p'");
$row=mysqli_fetch_array($r);
$num1=mysqli_num_rows($r);
$pro=$row['prog'];

//$queryf = query("SELECT * FROM userdata WHERE sub_id='$id'");				
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//$rowf = mysqli_fetch_array($queryf);
//$num2=mysqli_num_rows($queryf);

//if($num1==1&&$num2==1)
if($num1==1)
{
    if($row['state']=="")
    {
	$queryc = query("SELECT * FROM clicks WHERE sub_id='$id' AND nick='$p'");				

	$rowc = mysqli_fetch_array($queryc);
	echo $num3=mysqli_num_rows($queryc);

	$tclicks=1;
//$uclicks=0;


	if($num3==1)
	{
		$tclicks=$rowc['tclicks']+1;

		/*if($rowc['ip']!=$ip)
		{
			$uclicks=$rowc['uclicks'];
		}
		else
		{
			$uclicks=$rowc['uclicks']+1;
		}*/

		query("UPDATE clicks SET tclicks='$tclicks',ip='$ip' WHERE sub_id='$id' AND nick='$p'");

	}
	else
	{
		query("INSERT INTO clicks(prog,nick,tclicks,sub_id,ip) values ('$pro','$p','$tclicks','$id','$ip')");
	}

	//$url=$row['link']."&aff_sub=".$rowf['sub_id'];
		$url=$row['link']."&aff_sub=".$id;


	redirect("$url");
	}
	else
	{
		echo '<h1>This programme has been paused for this moment, try again later or contact us via our home page.</h1>';
	}


//echo $url;
}

else
{

	echo '<h1>INVALID LINK----check your CPL profile for correct link.</h1>';
	
}



?>