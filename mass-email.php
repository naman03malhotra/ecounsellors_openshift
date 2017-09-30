<?php

ignore_user_abort(true);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);
include("includes/config.php");
require_once("mail2.php");


$t1=time();



$from="care@ecounsellors.in";
$fromname="Ecounsellors.in";
$emailid="ecounsellorscare@gmail.com";

//$username=substr($emailid,0,6 );
$username="Ecounsellors";

$sub=strtok($username," ").", here is an opportunity to be a part of change";

$html=nl2br('<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><body>
<h2>Hi '.strtok($username," ").',</h2>
<h3>A chance to become the "advocates of change"</h3>

<a href="https://ecounsellors.in">ecounsellors.in</a> is a one stop place which connects students to mentors from dream companies and institutions through real time communication via one to one video platform and chat.
 
  <h4>Why you should be a Campus Ambassador</h4>
- Ecounsellors Ambassador Certificate (Letter of recommendation for exceptional work)
- Top 3 performers get cash awards
- 4 years exclusive FREE mentorship from people in GOOGLE, Mckinsey etc.
- Hands on experience of media relations & managerial skills 
- Create extensive network of contacts.

  <h4>All you have to do:</h4> 
- Be the link between the Ecounsellors team & college - Online & offline publicity
- Be the link between your college alumni and Ecounsellors.


<a href="https://ecounsellors.in/Campus-Ambassador" ><img src="https://d4z6dx8qrln4r.cloudfront.net/image-56bd61b60bba7-default.png"></a>




<tr align="center"><a href="https://ecounsellors.in/Campus-Ambassador"><h1>https://ecounsellors.in/Campus-Ambassador</h1></a></tr>

<h4>To know more about ecounsellors visit: <a href="https://ecounsellors.in">www.ecounsellors.in</a></h4>

Cheers,
Team Ecounsellors<br>
</body>
');



	//printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";


/*
$q=query("select * from marketing");
while($res=mysqli_fetch_array($q))
{

	$emailid=$res['email'];
	if($res['name']!='')
	$username=$res['name'];
	else
	$username=substr($emailid,0,6);

	//printf(mailman2($emailid,$sub,$html,$username,$from,$fromname))."<br>";


}
*/
$t2=time();
$t3=$t2-$t1;

 $file="test1.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);

  exit();
   