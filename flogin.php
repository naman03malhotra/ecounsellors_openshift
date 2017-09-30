<?php
include("includes/config.php");



if(isset($_GET['error']))
{
  $err=$_GET['error'];

  if($err=='access_denied')
  {
    redirect('/?access-denied&lo');
  }
}

if($_GET['code'])
{
$code = $_GET['code'];

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

					$array=array();

					//$graph_url = "https://graph.facebook.com/me?access_token=". $params['access_token'];
					//$graph_url = "https://graph.facebook.com/v2.5/me?access_token=". $params['access_token']."&fields=id,name,email,link,first_name,middle_name,last_name,gender,age_range,about,birthday,currency,devices,education,favorite_athletes,favorite_teams,hometown,inspirational_people,install_type,installed,interested_in,is_verified,languages,locale,location,meeting_for,political,quotes,relationship_status,religion,significant_other,timezone,verified,website,work";
					$graph_url = "https://graph.facebook.com/v2.5/me?access_token=". $params['access_token']."&fields=id,name,email,link,first_name,middle_name,last_name,gender,age_range,currency,devices,languages,timezone,verified";

					$user = json_decode(file_get_contents($graph_url));
					//$_SESSION['fb_user']=$user->first_name;
					$fname=$user->first_name;
					//$_SESSION['fb_user']=$graph_url;
					//$_SESSION['file_get']=file_get_contents($graph_url);
					$lname=$user->last_name;
					$username = $user->first_name." ".$user->last_name;
					$emailid = $user->email;
					$fid=$user->id;
					$link=$user->link;
					$gender=$user->gender;
					$result2=query("SELECT * from u_users WHERE emailid='$emailid'");
					$r=query("SELECT * FROM u_users ORDER BY id DESC LIMIT 1");
					if($emailid=="")
					{
						redirect("/?sorry");
						exit();
					}
					
					$num_m=0;
					$rowu=mysqli_fetch_array($result2);
					$u_id=$rowu['u_id'];
					$querym=query("SELECT * FROM meet where  u_id='$u_id' and confirm='1' order by id desc");
         			$num_m=mysqli_num_rows($querym);
					$rowx=mysqli_fetch_array($r);
					if (mysqli_num_rows($result2)>0)
					{
						$uid=$rowu['u_id'];
						$_SESSION['u_id']=$rowu['u_id'];

						$phone="+".ltrim($_SESSION['phone']);
							$cookie_name = "phone";
						$cookie_value = $phone;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");


						$cookie_name = "pk";
						$cookie_value = en_de('en',$uid);
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");
						query("UPDATE u_users set t_in='$time',gender='$gender' where u_id='$u_id'");
						if(isset($_SESSION['cur']))
						{
							$cur=$_SESSION['cur'];
							redirect($cur);

						}
						else if($num_m>0)
							redirect("appointments");
						else
							redirect("/");
					}
					else
					{

						
						if($rowx['u_id']!="")
						{
							$uid=$rowx['u_id'];
							$uid=ltrim($uid,'u');
							//$uid=$uid+1;
							$uid="u".++$uid;
						}
						else
						{
							$uid="u1";
						}
						 query("INSERT into u_users(u_id) values('$uid')");

						if(isset($_SESSION['ca']))
                        {
                          $ca=$_SESSION['ca'];
                        }

						$ref=strtoupper(substr($username, 0,3));
						$rand=random_string(2);
						$ref.=$rand;
						$phone="+".ltrim($_SESSION['phone']);
							$cookie_name = "phone";
						$cookie_value = $phone;
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");


						$cookie_name = "pk";
						$cookie_value = en_de('en',$uid);
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");
						
					
						$array = get_headers('https://graph.facebook.com/'.$fid.'/picture?type=large', 1);
    					$url= (isset($array['Location']) ? $array['Location'] : FALSE);
    					$content=file_get_contents($url);
    					$imageData = base64_encode($content);





    					//file put
    					$file_name_org=random_string2(10);
						$file_name='u_img/'.$file_name_org.'.png';
						file_put_contents($file_name, $content);













// Format the image SRC:  data:{mime};base64,{data};
						 $src = ('data: '.mime_content_type($url).';base64,'.$imageData);

                        //query("INSERT INTO u_users(fid,emailid,name,status,u_id,url,credits,timestamp,ip,ref,phone,link,agent) values('$fid','$emailid','$username','g','$uid','$src','50','$time','$ip','$ref','$phone','$link','$agent')");

                        query("UPDATE u_users SET fid='$fid',emailid='$emailid',name='$username',status='f',url='$src',url_file='$file_name_org',credits='50',timestamp='$time',ip='$ip',ref='$ref',phone='$phone',link='$link',agent='$agent',ca='$ca',gender='$gender' where u_id='$uid'");
                        //query("INSERT INTO u_userdata(fname,lname,emailid,u_id,fbl) values('$fname','$lname','$emailid','$uid','$link')");
                        $_SESSION['u_id']=$uid;
						require_once('mail.php');
						require_once('mail2.php');
						$headers = "care@ecounsellors.in";
						
						
						$sub="We are pleased to meet you :-)";

						
						



						//$rand=random_string2(50);
					
					$html='
					<!--Welcome email to users after sign up.html-->
<!DOCTYPE html>
<html>
<head>
<title>Welcome to ecounsellors</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
     		padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 16px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<!--[if gte mso 12]>
<style type="text/css">
.mso-right {
	padding-left: 20px;
}
</style>
<![endif]-->
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->


<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#25b1cb" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="wrapper">
                <tr>
                    <td align="center" valign="top" style="padding: 25px 0;" class="logo">
                        <a href="https://ecounsellors.in/" target="_blank">
                               <img alt="Logo" src="https://e-counsellors.rhcloud.com/img/logov2final.png" width="180" height="50" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 70px 15px 25px 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="500" style="padding:0 0 20px 0;" class="responsive-table">
                <tr>
                    <td align="center" height="100%" valign="top" width="100%" style="padding-bottom: 35px;">
                        <!--[if (gte mso 9)|(IE)]>
                        <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                        <tr>
                        <td align="center" valign="top" width="500">
                        <![endif]-->
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500;">
                            <tr>
                                <td align="center" valign="top" style="font-size:0;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                                    <tr>
                                    <td align="left" valign="top" width="150">
                                    <![endif]-->
<!--
                                    <div style="display:inline-block; max-width:150px; vertical-align:top; width:100%;">

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="150">
                                            <tr>
                                                <td valign="top"><a href="http://litmus.com" target="_blank"><img src="product-2.png" alt="alt text here" width="150" height="200" border="0" style="display: block; font-family: Arial; color: #25b1cb; font-size: 14px;"></a></td>
                                            </tr>
                                        </table>
                                    </div>
-->
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    <td align="left" valign="top" width="350">
                                    <![endif]-->
                                    

                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"  class="wrapper">
                                            <tr>

                                                <td style="padding: 10px 0 0 0;" class="no-padding">
                                                    <!-- ARTICLE -->
                                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                        <tr>
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">
Hi '.$fname.',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 0px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Thanks for signing up at  <a href="https://ecounsellors.in/" style="text-decoration:none;font-weight:bold;color:#333333 ">ecounsellors.in</a> !

This is your personalised portal to put an end to all the career related doubts which 

hold you back, from choosing the right path.

You would be having interactive sessions with expert mentors through online 

communication, once you book an appointment on our website through your 

                                                                 account.
                                                            <br><br>
                                                           <strong style="color:#333333"> Just follow these simple steps and get started with your session.</strong><br>
<ol> 
    <li>Review the profiles of the Mentors and choose your ideal Mentor.</li>

<li>Click on the tab-‘Book an Appointment’ and choose the mode of appointment. 
</li> 
<li>There are 3 modes available- chat, audio and video conferencing.</li>

<li>Write a review about the Mentor after a successful Appointment.</li> 
    </ol></td>
                                                        </tr>
                                    
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                 
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
              
            </table>
        </td>
    </tr>

  <tr>
        <td bgcolor="#333333" align="center" style="padding: 20px 0px;width:100%">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <!-- UNSUBSCRIBE COPY -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width: 500px;" class="responsive-table">
                <tr>
                                            <td align="" style=" font-size: 16px; line-height: 20px; font-family: Helvetica, Arial, sans-serif; color: #dedede;padding:0px 10px 0px 10px">We will be happy to answer any questions or concerns you might have about Ecounsellors. Stay in touch with us.<br><br>
                     <a href="mailto:care@ecounsellors.in" style="color:white; text-decoration:none;text-decoration:none !important;text-decoration:none;font-weight:500;">care@ecounsellors.in</a></td>
                        </tr>
                <tr>
                    <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #ffffff; text-align:left;line-height: 20px;padding:0px 10px 0px 10px" class="pad"><p>
                                    <a href="https://twitter.com/ecouncare" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/6rqi2h839/1458285314_square_twitter.png?noCache=1458269179"></a> &nbsp; 
                                       <a href="https://plus.google.com/u/0/116894056051003633015" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s9.postimg.org/rpxq1v24r/1458285359_square_google_plus.png?noCache=1458269237"></a> &nbsp;
                                       <a href="https://www.linkedin.com/company/10115744?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A10115744%2Cidx%3A1-1-1%2CtarId%3A1458842934703%2Ctas%3Aecounsell" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s10.postimg.org/o93sp2nn9/1458285377_square_linkedin.png?noCache=1458269268"></a> 
                        &nbsp;
                                      <a href="https://www.facebook.com/ecounsellors/" style="color:#9ec459;text-decoration:none;text-decoration:none !important;color:#9ec459;text-decoration:none;font-weight:bold;"><img src="http://s29.postimg.org/d32lll3ur/1458285303_square_facebook.png?noCache=1458269107"></a> 
                                      </p>
                                      
                                       Cheers,<br>
                                    Team Ecounsellors<br>
                        8930130199   <br>
                                      <br>
                                      
                                  </td></tr>
                <tr><td><br></td></tr>
                  
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
</body>
</html>
';
			


				
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


					/*if (strstr($emailid, '@gmail'))
					{

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
					}
					else*/
					{
						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
					}

					
					if(isset($_SESSION['cur']))
						{
							//$cur=$_SESSION['cur']."&ref";
							$cur=$_SESSION['cur'];
							redirect($cur);

						}
					else
						redirect("/");

					}
					//$facebook_id = $user->id;

		}


?>