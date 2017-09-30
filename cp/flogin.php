<?php
include("includes/config.php");

if($_GET['code'])
{
$code = $_GET['code'];
session_start();
/*
$header = stream_context_create(
    array(
	'https' => array(
            'method'  => 'GET',
            'header'  => 'None'
        )
    )
);

$url = "https://graph.facebook.com/oauth/access_token?client_id=1453247728270397&redirect_uri=https://www.myidealist.co/callback/flogin/&client_secret=a3f6f7c3f3436aa2b937bbccfd0d1696&code=" . $code;
$req = file_get_contents($url, false, $header);
$arr = explode("&", $req);
$ar = explode("=", $arr[0]);

$url = "https://graph.facebook.com/v2.2/me?access_token=" . $ar[1] ."&format=json&method=get&pretty=0&suppress_http_code=1";

$req = file_get_contents($url, false, $header);

$info = json_decode($req);
$name = $info->{'first_name'} . " " . $info->{'last_name'};
$email = $info->{'email'};
session_start();
$_SESSION['l_name'] = $name;
$_SESSION['l_email'] = $email;

$home_url = '/login/flogin.php';
header('Location:'.$home_url);
exit();
}
else
{
include_once("/var/lib/openshift/535ac25f5004468e9700014b/app-root/repo/4oh4/wrong.php");
exit();
}

?>
<?php */
//if(isset($_POST['fblogin']))
							
					$app_id = "415771041928681";

					$app_secret = "61b1c89fb5b4b2d44b8aeca0f30aebdb";

					$my_url = "https://ecounsellors.in/flogin.php";

					$token_url = "https://graph.facebook.com/oauth/access_token?"

					. "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)

					. "&client_secret=" . $app_secret . "&code=" . $code . "&scope=publish_stream,email";

					//echo $code;

					$response = @file_get_contents($token_url);

					$params = null;

					parse_str($response, $params);



					$graph_url = "https://graph.facebook.com/me?access_token=". $params['access_token'];


					$user = json_decode(file_get_contents($graph_url));

					$username = $user->first_name." ".$user->last_name;
					$emailid = $user->email;
					$result2=query("select * from u_users WHERE emailid='$emailid'");
					$rowu=mysqli_fetch_array($result2);
					if (mysqli_num_rows($result2))
					{
						$_SESSION['u_id']=$rowu['u_id'];
						redirect("index");
					}
					else
					{
						query("INSERT INTO u_users(emailid,name,status) values('$emailid','$username','f')");
						$_SESSION['u_id']=$rowu['u_id'];
						



						//$rand=random_string2(50);
					
					
					//$url="https://cashwaapas.com/verify.php?key=".$rand;

					//sending welcome email to newly signed up customer

					//$headers = "From: info@cashwaapas.com";

					//to be set later

					//$html_customer = "Hi $name,\n\nWelcome to India's biggest online cash saving platform! \n\nHard cash savings are just a click away at www.Cashwaapas.com Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.\n\nWe get commissions for your Click-through and we share them with you. \n\nKeep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) \n\nWe are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you Rupees. \n\nWe are happy to be your service. \n\nKeep saving. \n\nRegards\nCashwaapas Team";

					//mail($emailid, "Welcome to CashWaapas", $html_customer, $headers);



					//sending welcome email to newly signed up customer
					/*require_once('mail.php');
					$headers = "care@cashwaapas.com";
					$html_customer = "Hello and welcome<h3>$name</h3><br>Welcome to India's fastest growing online cash saving platform! <br><br>Hard cash savings are just a click away at <a href='www.Cashwaapas.com'>Cashwaapas.com</a> Simply click through the links on our website to various leading e-commerce stores and get cash in your hands.<br><br>We get commissions for your Click-through and we share them with you. <br><br>Keep adding money in you cashwaapas account and get a payout by any of your desired payment modes (mobile recharge, bank transfer, cheque, Shopping Vouchers) <br><br>We are slowly adding more stores so that we can provide Cashwaapas on most of your online purchases. So each time you plan to shop online, just check www.cashwaapas.com Just a Click can save you lots of bucks.<br> <br>We are happy to be at your service. <br><br>Keep saving. <br><br>Regards<br>Cashwaapas Team <br><br><br> For Support/Suggestions drop a mail at care@cashwaapas.com ";

					mailman($emailid, "Welcome to CashWaapas!", $html_customer, $name,$headers,"Cashwaapas");*/
					

					redirect("profile");

					}
					//$facebook_id = $user->id;

		}


?>