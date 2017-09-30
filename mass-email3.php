<?php

ignore_user_abort(true);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);
include("includes/config.php");
require_once("mail2.php");

/*
$t1=time();



$from="care@ecounsellors.in";
$fromname="Ecounsellors.in";

$sub=strtok($username," ").", want to how to crack the best companies? Here is your chance.";

$html=nl2br('<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><body>
<h2>Hi '.strtok($username," ").',</h2>

Want to know how to crack best companies?
Want to know how to make kickass web applications? 
Want to know how to start coding? 
Confused between Tech. and Non-Tech? 

Don\'t worry, you\'ll get all of your answers. 

Talk to Your Personal Mentor directly for FREE
Mentor <b>Sahil Dua</b>

- Placed at Samsung, Booking.com(Amsterdam), CodeNation.
- Intern at HackerRank. 
- Did 5+ internships in last 3 years

Schedule an appointment Now and TALK LIVE FOR FREE!

<h1><a href="https://ecounsellors.in/counsellor/Sahil-Dua/Sahil503">TALK LIVE FOR FREE (Mentor Sahil Dua)</a></h1>

<h4>To view all mentors please visit <a href="https://ecounsellors.in">www.ecounsellors.in</a></h4>

Cheers,
Team Ecounsellors<br>
</body>
');


$emailid="ecounsellorscare@gmail.com";
//$emailid="naman03malhotra@gmail.com";
$username=substr($emailid,0,6 );
printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";



$q=query("select * from marketing");
while($res=mysqli_fetch_array($q))
{

	$emailid=$res['email'];
	$username=$res['name'];
	if($res['name']=='')
	$username=substr($emailid,0,6);
	//else
	//$username=substr($emailid,0,6);

$sub="Hi, want to how to crack the best companies? Here is your chance.";

$html=nl2br('<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><body>
<h2>Hi, </h2>
Want to know how to crack best companies?
Want to know how to make kickass web applications? 
Want to know how to start coding? 
Confused between Tech. and Non-Tech? 

Don\'t worry, you\'ll get all of your answers. 

Talk to Your Personal Mentor directly for FREE
Mentor <b>Sahil Dua</b>

- Placed at Samsung, Booking.com(Amsterdam), CodeNation.
- Intern at HackerRank. 
- Did 5+ internships in last 3 years

Schedule an appointment Now and TALK LIVE FOR FREE!

<h1><a href="https://ecounsellors.in/counsellor/Sahil-Dua/Sahil503">TALK LIVE FOR FREE (Mentor Sahil Dua)</a></h1>

<h4>To view all mentors please visit <a href="https://ecounsellors.in">www.ecounsellors.in</a></h4>

Cheers,
Team Ecounsellors<br>
</body>
');

if($res['name']=='')
	//printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";


}


$t2=time();
$t3=$t2-$t1;

 $file="test1.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);

  exit();



  $q= query("select * from c_userdata");
  while($row_q= mysqli_fetch_array($q))
  {
  $typec= $row_q['typec'];
  $idx=$row_q['id'];

  $x = preg_replace('/\s*,\s*/', ',', $typec);
  //echo $x;
  query("update c_userdata set typec='$x' where id='$idx'");
  echo 'suc<br>';

} 

  */