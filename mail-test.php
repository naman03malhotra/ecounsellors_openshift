<?php

ignore_user_abort(true);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);
include("includes/config.php");
require_once("mail2.php");


$t1=time();


$sub="Preparing For Placements/Internships In Dream Companies?";
$from="care@ecounsellors.in";
$fromname="Ecounsellors.in";

$html=nl2br('<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><body>
Hi,

Wish you could talk to people placed in Dream Companies like Google, Texas Instruments, Codenation, Qualcomm etc?

Your wish is a reality now. Get mentored from people placed in these companies.
Let them prepare the best strategy for you.



<a href="https://ecounsellors.in/counsellor/Ravi-Batra/Ravi219" ><img src="https://ecounsellors.in/marketing/2.jpg"></a>



<tr align="center"><a href="https://ecounsellors.in/counsellor/Ravi-Batra/Ravi219" target="_blank" style="border: 1px solid transparent;text-align=center;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center; white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;padding: 10px 16px;font-size: 18px;line-height: 1.3333333;border-radius: 6px;background-color: #00bef2;color: #fff;"><h2>BOOK FREE APPOINTMENT NOW!</h3></a></tr>

To see more mentors log on to <a href="https://ecounsellors.in">www.ecounsellors.in</a>

Cheers,
Team Ecounsellors<br>
</body>

');
$emailid="ecounsellorscare@gmail.com";
$username=substr($emailid,0,6 );

	printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";


/*
$q=query("select * from subs");
while($res=mysqli_fetch_array($q))
{

	$emailid=$res['email'];
	$username=substr($emailid,0,6 );
	//printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";


}*/

$t2=time();
$t3=$t2-$t1;

 $file="test1.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);

  exit();
   