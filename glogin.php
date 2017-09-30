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
 $content ="code=$code&client_id=664628686506-ciifonmhln536rffrk98gim68s2n4c25.apps.googleusercontent.com&client_secret=oB2pZxVEhloD2scc_Ts1wIiF&redirect_uri=https://ecounsellors.in/glogin.php&grant_type=authorization_code";
 
 $opts = array(
  'http'=>array(
    'method'=>"POST",
    'Content-Type'=> "application/x-www-form-urlencoded",
    'content'=>$content
        )
    );

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$data = file_get_contents('https://www.googleapis.com/oauth2/v3/token', false, $context);

 $info = json_decode($data);
 $access_token = $info->{'access_token'};
 
 $header = stream_context_create(
    array(
    'https' => array(
            'method'  => 'GET',
            'header'  => 'None'
        )
    )
    );
 $data = file_get_contents('https://www.googleapis.com/plus/v1/people/me?access_token=' . $access_token, false, $header);
 //$_SESSION['file_get']=$data;
 $info = json_decode($data);
 $email = $info->{'emails'};

 $email = $email[0]->value;





                    $url= $info->{'image'}->{'url'}."&sz=200";







                    $username = $info->{'displayName'};
                    $emailid = $email;
                    $fid=$info->{'id'};
                    $link=$info->{'url'};
                     $gender=$info->{'gender'};
                    $result2=query("SELECT * from u_users WHERE emailid='$emailid'");
                    $r=query("SELECT * FROM u_users ORDER BY id DESC LIMIT 1");
                    if($emailid=="")
                    {
                        /*echo $emailid;
                        echo "<br>";
                        echo $fid;

                        echo $username;*/

                        redirect("/?sorry");
                        exit();
                    }
                    
                    $num_m=0;
                    $rowu=mysqli_fetch_array($result2);
                    $u_id=$rowu['u_id'];
                    //$querym=query("SELECT * FROM meet where  u_id='$u_id' and confirm='1' order by id desc");
                    //$num_m=mysqli_num_rows($querym);
                    $rowx=mysqli_fetch_array($r);
                    if (mysqli_num_rows($result2)>0)
                    {
                        $phone="+".ltrim($_SESSION['phone']);

                        $_SESSION['u_id']=$rowu['u_id'];

                        $cookie_name = "phone";
                        $cookie_value = $phone;
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");


                        $cookie_name = "pk";
                        $cookie_value = en_de('en',$u_id);
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");

                        
                        query("UPDATE u_users set t_in='$time',gender='$gender' where u_id='$u_id'");
                        if(isset($_SESSION['cur']))
                        {
                            $cur=$_SESSION['cur'];
                            redirect($cur);

                        }
                        //else if($num_m>0)
                            //redirect("appointments");
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
                        $phone="+".ltrim($_SESSION['phone']);


                        if(isset($_SESSION['ca']))
                        {
                          $ca=$_SESSION['ca'];
                        }
                        $ref=strtoupper(substr($username, 0,3));
                        $rand=random_string(2);
                        $ref.=$rand;


                        $cookie_name = "phone";
                        $cookie_value = $phone;
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");


                        $cookie_name = "pk";
                        $cookie_value = en_de('en',$uid);
                        setcookie($cookie_name, $cookie_value, time() + (86400 * 2000), "/");

                       
                          $content=file_get_contents($url);
                         $imageData = base64_encode($content);

// Format the image SRC:  data:{mime};base64,{data};


                          $def="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";





                          //file put
                        if($imageData==$def)
                        {
                          $file_name_org='def';
                        }
                        else
                        {
                        $file_name_org=random_string2(10);
                        }
                      $file_name='u_img/'.$file_name_org.'.png';
                      file_put_contents($file_name, $content);








                        $src = ('data: '.mime_content_type($url).';base64,'.$imageData);

                        //query("INSERT INTO u_users(fid,emailid,name,status,u_id,url,credits,timestamp,ip,ref,phone,link,agent) values('$fid','$emailid','$username','g','$uid','$src','50','$time','$ip','$ref','$phone','$link','$agent')");

                        query("UPDATE u_users SET fid='$fid',emailid='$emailid',name='$username',status='g',url='$src',url_file='$file_name_org',credits='50',timestamp='$time',ip='$ip',ref='$ref',phone='$phone',link='$link',agent='$agent',ca='$ca',gender='$gender' where u_id='$uid'");
                        //query("INSERT INTO u_userdata(fname,lname,emailid,u_id,fbl) values('$fname','$lname','$emailid','$uid','$link')");
                        $_SESSION['u_id']=$uid;

                        //require_once('mail.php');
                        require_once('mail2.php');
                     $headers = "care@ecounsellors.in";
            $fname=strtok($username, " ");
            
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
                            $cur=$_SESSION['cur'];
                            redirect($cur);

                        }
                    else
                        redirect("/");

                    }
                    //$facebook_id = $user->id;

 }



























?>
