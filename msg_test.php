<?php

//Your authentication key
$authKey = "88166AHl2XfQEzwV559ba0a0";

//Multiple mobiles numbers separated by comma
$mobileNumber = "8285526828";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "ECOUNS";

//Your message to send, Add URL encoding here.
$message = urlencode("Your Appointment Has Been Successfully Booked, on 12-jun-15, 02:45 PM be there.");

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
echo "<br>";
echo "success";
?>