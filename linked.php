<?php

if(isset($_SESSION['linked']))
{
    echo "abc";
}

if(isset($_POST['linked']) or isset($_SESSION['linked']) or isset($_GET['code']))
{
//$config = include(dirname(__FILE__).'/config.php');
// Change these
echo "true<br>";


include("includes/config.php");
$_SESSION['linked']="abc";
define('API_KEY',      '75ko6ryasdrj4o');
define('API_SECRET',  'Z5UBLfWHnkkAtUOc');
define('REDIRECT_URI', 'https://ecounsellors.in/linked.php');
define('SCOPE',        'r_basicprofile r_emailaddress w_share rw_company_admin');


function getAuthorizationCode() {
    $params = array('response_type' => 'code',
                    'client_id' => API_KEY,
                    'scope' => SCOPE,
                    'state' => uniqid('', true), // unique long string
                    'redirect_uri' => REDIRECT_URI,
              );
 
    // Authentication request
    $url = 'https://www.linkedin.com/uas/oauth2/authorization?' . http_build_query($params);
 
    // Needed to identify request when it returns to us
    $_SESSION['state'] = $params['state'];
 
    // Redirect user to authenticate
    header("Location: $url");
    exit;
}
 
function getAccessToken() {
    $params = array('grant_type' => 'authorization_code',
                    'client_id' => API_KEY,
                    'client_secret' => API_SECRET,
                    'code' => $_GET['code'],
                    'redirect_uri' => REDIRECT_URI,
              );
 
    // Access Token request
    $url = 'https://www.linkedin.com/uas/oauth2/accessToken?' . http_build_query($params);
 
    // Tell streams to make a POST request
    $context = stream_context_create(
                    array('http' => 
                        array('method' => 'POST',
                        )
                    )
                );
 
    // Retrieve access token information
    echo $response = file_get_contents($url, false, $context);
 
    // Native PHP object, please
    $token = json_decode($response);
 
    // Store access token and expiration time
    echo "<br> Token:".$_SESSION['access_token'] = $token->access_token; // guard this! 
   echo "<br> Exp in:".$_SESSION['expires_in']   = $token->expires_in; // relative time (in seconds)
    $_SESSION['expires_at']   = time() + $_SESSION['expires_in']; // absolute time
 
    return true;
}
 
function fetch($method, $resource, $body = '') {
    $params = array('oauth2_access_token' => $_SESSION['access_token'],
                    'format' => 'json',
              );
 
    // Need to use HTTPS
    $url = 'https://api.linkedin.com' . $resource . '?' . http_build_query($params);
    // Tell streams to make a (GET, POST, PUT, or DELETE) request
    $context = stream_context_create(
                    array('http' => 
                        array('method' => $method,
                        )
                    )
                );
 
    // Hocus Pocus
    echo $response = file_get_contents($url, false, $context);
 
    // Native PHP object, please
    return json_decode($response);
}

function final_call()
{
$user = fetch('GET', '/v1/people/~:(id,first-name,last-name,headline,email-address,picture-url,industry,site-standard-profile-request,interests,summary,main-address,phone-numbers,skills:(skill))');


}

 
// You'll probably use a database
//session_name('linkedin');
//session_start();
 
// OAuth 2 Control Flow
if (isset($_GET['error'])) {
    // LinkedIn returned an error
    print $_GET['error'] . ': ' . $_GET['error_description'];
    exit;
} else if (isset($_GET['code'])) {
    // User authorized your application
    if ($_SESSION['state'] == $_GET['state']) {
        // Get token so you can make API calls
        getAccessToken();
        final_call();
    } else {
        // CSRF attack? Or did you mix up your states?
        exit;
    }
} else { 
    if ((empty($_SESSION['expires_at'])) || (time() > $_SESSION['expires_at'])) {
        // Token has expired, clear the state
       // $_SESSION = array();
    }
    if (empty($_SESSION['access_token'])) {
        // Start authorization process
        getAuthorizationCode();
    }
}
 
// Congratulations! You have a valid token. Now fetch your profile 




}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Linked IN</title>
<link rel="stylesheet" href="/css/bootstrap.min.css">
    <style type="text/css">
        .linked
        {
            background:url(images/linked/def.png);
    background-repeat: no-repeat;
    width:218px;
    height:44px;

        }

    </style>

</head>
<body>
<form action="" method="POST">
    <button type="submit" class="linked" name="linked"></button>
</form>

</body>
</html>