

<?php include('includes/head.php'); 


$idx=$_GET['id'];

if(isset($_POST['bt']))
{


//echo $t=$_POST['dt']." ".$_POST['tm'];

$t2=$_POST['dt'];

$timestamp=strtotime($t2);
$adate=date("jS M y D",$timestamp);
$slot=date("h:i",$timestamp).'-'.date("h:i A",$timestamp+3599);

$send_date=date("jS M'y D h:i A",$timestamp);

query("UPDATE meet set date='$timestamp',time='$timestamp',adate='$adate',slot='$slot',status='r',re='r' where id='$idx'");


$r=query("SELECT * FROM meet where id='$idx'");
$result=mysqli_fetch_array($r);
$sub=$result['c_id'];
$uid=$result['u_id'];


$rdf=query("SELECT * From c_userdata where sub_id='$sub'");
$rowf=mysqli_fetch_array($rdf);	

$r3=query("SELECT * FROM u_users where u_id='$uid'");
$result3=mysqli_fetch_array($r3);

$emailid3="ecounsellorscare@gmail.com";  
			

			 require_once('mail2.php');
					
						$headers = "care@ecounsellors.in";
						$headers2 = "support@ecounsellors.in";

						$cname=$rowf['fname'].' '.$rowf['lname'];
						$username=$result3['name'];
					
						$emailid=$result3['emailid'];

						$emailid2=$rowf['emailid'];
						

						
						$sub= strtok($username," ").", "."Your Appointment has been Rescheduled with ".$cname." at ".$send_date.""; 
    
						$html='<!DOCTYPE html>
<html>
<head>
<title>Mentor Pre Sign-in</title>
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
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                         <a href="https://ecounsellors.in/" target="_blank">
                    <img alt="Logo" src="https://e-counsellors.rhcloud.com/img/logov2.png" width="180" height="50" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                          
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
Dear '.strtok($username," ").',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 0px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Your appointment with the <b>'.$cname.'</b>, which was due on  has been rescheduled by the Mentor due to some time constraints. We regret the 

inconvenience caused.</td>
                                                        </tr>
                                                       
                                             <tr>
                                            <td align="left" style="padding: 0 0 0 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                <br>The details of the rescheduled appointment are as follows.<br>

<strong>New Date:</strong>'.$adate.'<br>

<strong>Time Slot:</strong>'.$slot.'<br>
                                                 <br>
                                                 We hope to deliver a great and memorable mentorship experience to you.</td>
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

						mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");

						$sub2=$username."'s appointment with you has been rescheduled at ".$send_date.""; 
    
						$html2='<!DOCTYPE html>
<html>
<head>
<title>Mentor Pre Sign-in</title>

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
                    <td align="center" valign="top" style="padding: 15px 0;" class="logo">
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
Hi '.strtok($cname," ").',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 0px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">The appointment of the user '.$username.', has been rescheduled by the user due to some time constraints. We regret 

the inconvenience caused.</td>
                                                        </tr>
                                                       
                                             <tr>
                                            <td align="left" style="padding: 0 0 0 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                <br>The details of the rescheduled appointment are as follows.<br>

<strong>New Date:</strong>'.$adate.'<br>

<strong>Time Slot:</strong>'.$slot.'<br>
                                                 <br>
                                                 Visit c.ecounsellors.in to view all your upcoming appointments</td>
                                        </tr>
                                                          <tr>
                                            <td align="center" style="padding-top: 10px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/cp" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Mentor Panel</a></td>
                                                    </tr>
                                                </table>
                                            </td>
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

						mailman2($emailid2,$sub2, $html2, $cname,$headers2,"Ecounsellors.in");

						echo '<script>alert("Appointment Rescheduled Successfully"); window.location="bank-approve";</script>';


}

if(isset($_POST['can']))
{



$why=$_POST['why'];
query("UPDATE meet set status='c',why_cancel='$why' where id='$idx'");
echo '<script>alert("Appointment Cancelled Successfully");window.location="bank-approve";</script>';

}

if(isset($_POST['del']))
{




query("DELETE from meet where id='$idx'");
echo '<script>alert("Appointment Deleted Successfully");window.location="bank-approve";</script>';

}

?>


<div class="row text-center">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<h3>Reschedule Appointment</h3>
		<form class="form-group" method="post" action="">    
		<input class="form-control" type="datetime-local" name="dt" required>
		<br>
		<input class="btn btn-lg btn-primary" style="background-color:indigo;" type="submit" name="bt" value="Update">
		</form>
	</div>
	<div class="col-md-3">
		<h3>Cancel Appointment</h3>
		<form method="post" action=""> 
		<textarea rows="3" name="why" placeholder="why cancelled? "></textarea>  <br> 
		<input class="btn btn-lg btn-danger" style="background-color:brown;" type="submit" name="can" value="Cancel">
		</form>
	</div>
	<div class="col-md-3">
		<h3>Delete Appointment:(Use with Caution)</h3>
		<form method="post" action="">    
		<input class="btn btn-lg btn-danger" style="background-color:red;" type="submit" name="delx" value="Delete (Inactive)">
		</form>
	</div> 
	<div class="col-md-1"></div>

	
</div>
<br>

<br><br><br><br><br><br><br><br><br><br>