<style type="text/css">
#my-div
{
    width    : 400px;
    height   : 200px;
    overflow : hidden;
    position : relative;
}
	
	#my-iframe
{
    position : absolute;
    top      : -100px;
    left     : -100px;
    width    : 1280px;
    height   : 1200px;
}
</style>



<?php



include("includes/config.php");

/*
$u_id='u2';
$rand="asda";
$q="select * from u_users where u_id='u500'";
$result=mysqli_query($connection, $q);
if($result==1)
	echo 'true';
else
	echo 'false';

//echo $result;

echo $efrow=mysqli_affected_rows($connection);


$row=mysqli_fetch_array($q);
$time=$row['time'];

echo date("h:i A",$time);*/

//$big=mysqli_real_escape_string($big);
//$big="asndl'nalsdnas";

//$big=filter_var($big, FILTER_SANITIZE_MAGIC_QUOTES);
//$q=query("INSERT into test(big) values('$big')");
//echo $big;

/*findWord('naman@gmail.com');

function findWord($text) {

    if (strstr($text, '@gmail')) {

        echo 'found a word';

    } 
    else 
    {
        echo 'did not find a word';
    }
}*/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://voicechatapi.com/api/v1/conference/");
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "conference_name=abcde123&conference_url=http://voicechatapi.com/abcde123/");

// in real life you should use something like:
//curl_setopt($ch, CURLOPT_POSTFIELDS,  http_build_query(array('conference_name' => 'abcd123fghsdasdasdasdasdasd')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

$arr=json_decode($server_output,true);

$link=$arr['conference_url'];

if ($server_output) { //echo 'success';
 } else { echo 'fail'; }


echo '<div class="my-div">';
echo '<iframe id="my-iframe" src="'.$link.'" width="100%" height="100%" align="center" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" >    </iframe>';

echo '</div>';
//echo '<button onclick="window.open(\''.$link.'\');">Open popup</button>';