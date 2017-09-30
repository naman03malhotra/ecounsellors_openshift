<?php

ignore_user_abort(true);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);
include("../includes/config.php");
require_once("../mail2.php");


$t1=time();



$from="care@ecounsellors.in";
$fromname="Naman Malhotra";



$q=query("SELECT * from marketing_test");
while($res=mysqli_fetch_array($q))
{

	$emailid=$res['email'];
	$username=$res['name'];
	if($res['name']=='')
	$usernamex=strtok($emailid,'@');
	else
	$usernamex=$res['name'];

$sub="Ecounsellors Reborn! ";

$html='<html>
<head>
<title>Booking Details</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
   
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} 
    img{-ms-interpolation-mode: bicubic;}

     .table td,th{

    border: 1px solid #ddd;
  padding: 8px;
  line-height: 1.42857143;

}

    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    @media screen and (max-width: 525px) {

     
        .wrapper {
          width: 100% !important;
        	max-width: 100% !important;
        }

  
        .logo img {
          margin: 0 auto !important;
        }

    
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

      
        .responsive-table {
          width: 100% !important;
        }


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
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px;" class="wrapper">
                <tr>
                     <td align="center" valign="top" style="padding: 15px 0;" class="logo">
                         <a href="https://ecounsellors.in/" target="_blank">
                        <img  src="https://e-counsellors.rhcloud.com/img/logov2final.png" width="180" height="50" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #ffffff; font-size: 16px;" border="0">
                          
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
            <table border="0" cellpadding="0" cellspacing="0" width="800" style="padding:0 0 20px 0;" class="responsive-table">
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
                                                <td valign="top"><a href="http://litmus.com" target="_blank"><img src="product-2.png" alt="alt text here" width="150" height="200" border="0" style="display: block; font-family: Arial; color: #266e9c; font-size: 14px;"></a></td>
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
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Hello Mentor,</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
March was a crazy busy month for us at Ecounsellors. There have been tons of new developments and the biggest is the launch of the first version of our brand new & polished user website.</td>
                                                        </tr>
                                                         <tr><td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #25b1cb;" class="padding-copy">Bringing Forth Version V1.0 of Ecounsellors.in</td></tr><tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
Bringing forth our first version for our users, I am very excited to introduce the sleek & highly intuitive users panel of Ecounsellors. This wouldn\'t have been possible without your valuable time and constant motivation.
<br>

The new version comes with a awesome user interface, simple 4 step booking experience and a new search bar. I have learnt a lot in the past 3 months of running our website and have added some key features to support our mentors as well which are :





          <ul style="list-style:none;padding:0px;">
                                                                
                                                               
                                                                  <li><strong>A new chat system: </strong><br> To assist you in case of internet connectivity issues.</li><br>
                                                                
                                                                  <li><strong>Sync your Appointments with Google Calendar:</strong><br>Now directly add all your appointments into your Google calendar so that you always know about your schedule and never miss any appointment.</li><br>
                                                                 

                                                                  <li><strong>Ping Mechanism:</strong><br>Now you will know if the user is online or not on your dashboard.</li><br><br>
                                                                  <li>It\'s been some time since you last updated your timetable. With the launch of the new user panel, I request you take out some time to update your time table as per your convenience.</li><br>
                                                                  <li>We always take inspiration from you and hence would love your feedback on the new website. A word of appreciation will be a huge boost for the team and suggestions will help us serve better.</li><br>

                                                                 </ul>










                                                           


                                                                 </td>
                                                        </tr><tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                            
                                                     
    <tr>
        <td bgcolor="#ffffff" align="center" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- COPY -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Visit ecounsellors</a><br><br></td>
                                                    </tr>
                                                </table>
                                            </td>
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
             
                            <tr></tr><tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">

                                                             <ul style="list-style:none;padding:0px;">
                                                                 


                                                        <li style="font-size: 16px;">
           Sincerely,<br>                                             
           Naman Malhotra<br>
           CTO | ecounsellors<br><br>
           <a href="https://ecounsellors.in">www.ecounsellors.in</a>
       </li>
                                                                 
                                                              
                                                                 </ul></td>
                                                        </tr>
                                                       
       

            </table>
        </td>
    </tr>
  <tr>

       
    </tr>
</table>
</body>
</html>';




//	printf(mailman2($emailid,$sub,$html,$usernamex,$from,$fromname))."<br>";


}


$t2=time();
$t3=$t2-$t1;

 $file="mass_mentor.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);

  exit();
   