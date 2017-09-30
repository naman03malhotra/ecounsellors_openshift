<?php include('includes/head.php'); 



























if(isset($_POST['fee_f'])){

		$sid = $_POST['id'];
		$typec=$_POST['fee_x'];


		query("UPDATE c_userdata SET fee='$typec',f_fee='$typec' WHERE id='$sid'");
		//redirect("index");
	}

	if(isset($_POST['typec'])){

		$sid = $_POST['id'];
		$typec=$_POST['service'];


		query("UPDATE c_userdata SET typec='$typec' WHERE id='$sid'");
		//redirect("index");
	}

	if(isset($_POST['approve'])){

		$sid = $_POST['id'];

		$q=query("SELECT * from c_userdata where id='$sid'");
		$row=mysqli_fetch_array($q);
		$name=$row['fname'];
		$emailid=$row['emailid'];



		$headers = "support@ecounsellors.in";
						
						
						$sub='Hey! '.$name.', Welcome Aboard';

						
						



						//$rand=random_string2(50);
					
					$html='
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
Thank You '.strtok($name,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 0px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">We are glad to have you as a member of our Ecounsellors family. Your sign-up request has been approved.Now you can sign-in to your account with ease, by clicking on the access button given below or from the website <a href="https://ecounsellors.in/cp/" style="text-decoration:none;font-weight:bold;color:#333333">c.ecounsellors.in</a></td>
                                                        </tr>
                                                       
                                             <tr>
                                            <td align="left" style="padding: 0 0 0 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                <br>Your next step is to update your timetable by clicking on the <strong>Manage 

Timetable</strong> option on your panel. This will allow the users to view your free slots. 

Once this is completed, you will get listed on our website as a Mentor.</td>
                                        </tr>
                                                          <tr>
                                            <td align="center" style="padding-top: 10px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/cp/index" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Mentor Panel</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                                      
                                                         <tr>
                                            <td align="left" style="padding: 15 0 0 0; font-size: 14px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #868686; font-style: italic;" class="padding-copy">
                                                <br>Note : For smooth glitch free appointment process it is compulsory to use the latest version Google Chrome.  To Download <a href="https://www.google.com/chrome/browser/desktop/index.html?utm_source=google&utm_medium=sem&utm_campaign=1001342|ChromeWin10|GLOBAL|en|Hybrid|Text|BKWS~TopKWDS-Exact" style="text-decoration:none;color:#333333;font-weight:bold">Click here</a></td>
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
			


				
					{
						mailman2($emailid,$sub, $html, $name,$headers,"Ecounsellors.in");
					}

		query("UPDATE c_userdata SET verifyf='1' WHERE id='$sid'");

//redirect("index");






	}

	else if(isset($_POST['disapprove'])){

		$sid = $_POST['id'];
		$reason=$_POST['reason'];

			

		$q=query("SELECT * from c_userdata where id='$sid'");
		$row=mysqli_fetch_array($q);
		$name=$row['fname'];
		$emailid=$row['emailid'];



		$headers = "support@ecounsellors.in";
						
						
						$sub="Status Approval Failed";

						
						



						//$rand=random_string2(50);
					
					$html='
					<!DOCTYPE html>
<html>
<head>
<title></title>

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
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Dear '.strtok($name,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">We hope that you are keeping well. We regretfully inform you herein, that your sign-up request to be a Mentor at our portal, ecounsellors.in has been rejected due to '.$reason.' . We deeply apologise for the inconvenience caused to you through 
this process. Thanks a lot for your valuable time.</td>
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
			


				
					{
						mailman2($emailid,$sub, $html, $name,$headers,"Ecounsellors.in");
					}




		query("UPDATE c_userdata SET verifyf='-1',reason='$reason' WHERE id='$sid'");
		//redirect("index");

	}

















	$qfields=query("SELECT * from fields where active='1'");

			  echo ' <p><strong>Fields:</strong></p>';




			 while($row_fields=mysqli_fetch_array($qfields))
            {
          echo ''.$row_fields['name'].',';
           }
?>

		
			
			<table class="default table">

				<thead><tr>

					<th>#</th>
					<th>Type</th>


					<th>Name</th>

					<th>Gender</th>
					<th>Profile Pic</th>
				
					

					<th>Degree</th>

					<th>Phone</th>
					<th>Email</th>
						<th>Services</th>
					<th>State</th>

					<th>City</th>



					<th>About</th>
					<th>Skills</th>
					<th>Address</th>

					<th>Office Address</th>




					<th>Qualification</th>
					<th>Exp</th>
					<th>Achivements</th>
					
					<th>Age</th>

					
					<th>Status</th>
					<th>Fee</th>

					<th>Bank A/C</th>
					<th>Bank Name</th>
					<th>IFSC</th>
					<th>MICR</th>
					<th>Reason</th>
					


					<th>Approve</th>

				</tr></thead>

				<?php


				$query = query("SELECT * FROM c_userdata  where verifyf='1' OR verifyf='0' OR verifyf='-1'  ORDER BY id DESC");

				$count=0;
					echo '<tbody>';
				while($r = mysqli_fetch_array($query)){

					$idx=$r['id'];

					echo '<tr id="'.++$count.'">';

					echo '<td>'.$count.'</td>';
					if($r['men']==1)
					{
						$men="Mentor";
					}
					else
					{
						$men="Counsellor";
					}
					if($r['timet']==1)
					echo '<td class="btn-success">'.$men.'(TT updated)</td>';
					else if($r['timet']==0)
					echo '<td class="btn-danger">'.$men.'(TT not updated)</td>';
					else
					echo '<td class="btn-warning">'.$men.'</td>';

					echo '<td><a style="
    color: #00bef2;
    text-decoration: underline;
    font-weight: 800;
" href="time?email='.$r['emailid'].'" target="_blank">'.$r['fname'].' '.$r['lname'].'</a></td>';

					echo '<td>'.$r['gender'].'</td>';
					echo '<td><a target="_blank" style="height: 200px;" href="'.$r['propic1'].'">Link!</a></td>';



					echo '<td><a target="_blank" href="'.$r['digree'].'">Link!</a></td>';

					echo '<td>'.$r['phone'].'</td>';
					echo '<td>'.$r['emailid'].'</td>';
					echo '<td>'.$r['typec'];
					echo '<br><form action="#'.$count.'" method="POST">

							<input type="hidden" name="id" value="'.$r['id'].'">
							<textarea style="width:100%;padding: 0px 5px;" class="" rows="1"  id="addr" type="text" name="service" required>'.$r['typec'].'</textarea><br>
							
							<button type="submit" class="btn-primary" name="typec">change</button>
							

							</form></td>';

					echo '<td>'.$r['state'].'</td>';

					echo '<td>'.$r['city'].'</td>';

					echo '<td>'.$r['abt'].'</td>';
					echo '<td>'.$r['skills'].'</td>';
					echo '<td>'.$r['addr'].'</td>';

					echo '<td>'.$r['o_addr'].'</td>';



					echo '<td>'.$r['edu'].'</td>';
					echo '<td>'.$r['clg'].'</td>';
					echo '<td>'.$r['pro'].'</td>';
					echo '<td>'.$r['age'].'</td>';



						$xdate=strtotime(date("j M y",$r['date'])." ".date("H:i",$r['time']));
						$tdate=time()+3600;
						$flagz=0;

						if($tdate<=$xdate)
							{
								  $flagz=1;
							}

					    if($r['status']=="" and $flagz==0)
							{
								 query("UPDATE meet set status='1' where id='$idx'");
							}
					

					if(isset($_POST['approve']) && $r['id']==$_POST['id'])
					{
						echo '<td class="btn-success">Approved</td>';
					}

					else if(isset($_POST['disapprove']) && $r['id']==$_POST['id']){

						

						echo '<td class="btn-danger">Rejected</td>';

					}

					else{

							//echo '<td>'.$r['cashwaapas'].'</td>';

						if($r['verifyf']==1)

							echo '<td class="btn-success">Approved</td>';

						else if($r['verifyf']==-1)

							echo '<td class="btn-danger">Rejected</td>';

						else

							echo '<td class="btn-warning">Pending</td>';

					}
					echo '<td><form action="#'.$count.'" method="POST">

							<input type="hidden" name="id" value="'.$r['id'].'">
							<input style="width:100%;padding: 0px 5px;" class="" rows="1"  id="addr" type="text" name="fee_x" required value="'.$r['f_fee'].'"><br>
							
							<button type="submit" class="btn-primary" name="fee_f">change</button>
							

							</form></td>';
					echo '<td>'.$r['acnt'].'</td>';
					echo '<td>'.$r['bnk'].' '.$r['bra'].'</td>';
					echo '<td>'.$r['ifsc'].'</td>';
					echo '<td>'.$r['micr'].'</td>';

					echo '<td>'.$r['reason'].'</td>';



					echo '<td><form action="#'.$count.'" method="POST">

					<input type="hidden" name="id" value="'.$r['id'].'">



					

					<button class="btn btn-primary btn-block"type="submit" name="approve">Approve</button>
					<hr>
					<input type="text" placeholder="Reason" value="'.$r['reason'].'" name="reason">

					<button class="btn btn-danger btn-block" type="submit" name="disapprove">Reject</button>

					</form></td>';

					echo '</tr>';

				}

				?>
				</tbody>
			</table>

		
</div>
	</div>

	<?php


	?>

</body>
