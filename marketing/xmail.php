<?php

ignore_user_abort(true);
ini_set('max_execution_time', 0);
ini_set('max_input_time', 0);
include("../includes/config.php");
require_once("../mail2.php");


$t1=time();



$from="care@ecounsellors.in";
$fromname="Naman Malhotra";



$q=query("SELECT * from marketing");
while($res=mysqli_fetch_array($q))
{

	$emailid=$res['email'];
	$username=$res['name'];
	if($res['name']=='')
	$usernamex=strtok($emailid,'@');
	else
	$usernamex=$res['name'];

$sub="Ecounsellors Reborn!";

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
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Hello '.strtok($username,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
Did you also feel the first quarter of 2016 went by in the blink of an eye? We sure did. March was a crazy busy month for us at Ecounsellors. There have been tons of new developments and the biggest is the launch of the first version of our brand new & polished website amongst other great things and we’re all set to move into an exciting phase of growth at Ecounsellors.</td>
                                                        </tr>
                                                         <tr><td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #25b1cb;" class="padding-copy">Bringing Forth Version V1.0 of Ecounsellors.in</td></tr><tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
Bringing Forth our first Version for you!
I am very excited to introduce; the sleek & highly intuitive version of Ecounsellors. You might think nothing much has changed but trust us when we say this: a LOT of things have.





          <ul style="list-style:none;padding:0px;">
                                                                 <li><strong>Introducing a New User Interface (UI):</strong><br>All of you wish to get certain career related doubts cleared and you have been using Ecounsellors a lot. You use it so frequently, that it only made sense we present to you a user friendly interface that makes your trip on our website memorable. And with this thought, we introduce a new interface for all the pages that makes things much more convenient.</li><br>
                                                                 <li><strong>Search Tab:</strong><br> Tired of thinking as to which page you should approach to meet the expert of your choice? Now simply type the name of mentor, category (MBA/Coding etc.), or some particular company or college whose people you are looking for, hit search and reach the desired page instantly on the website. </li><br>
                                                                 <li><strong>Improvised Booking Experience:</strong><br>To make your lives happier and help you avail our services with ease, we\'ve made your experience of booking an appointment seamless, by keeping steps very simple and self explanatory.</li><br>
                                                               
                                                                  <li><strong>A new chat system: </strong><br> To assist you in case of connectivity issues we bring you an option for chat. You can opt for chat anytime during an appointment. You\'ll also able to see if the person on the other side is online or not.</li><br>
                                                                
                                                                  <li><strong>Sync your Appointments with Google Calendar:</strong><br> Now directly add all your appointments into your Google calendar so that you always know about your schedule and never miss any appointment.</li><br>
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
             
                            <tr><td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #25b1cb;" class="padding-copy">
Ecounsellors Turns One!

</td></tr><tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">

                                                             <ul style="list-style:none;padding:0px;">
                                                                 <li><strong>31st of March, 2016:</strong><br> Ecounsellors Turned One. And as we celebrated our first birthday, we took the time to look back & see how far we\'ve come and reminisce our glorious journey so far! As we grow, we realize that the single biggest contributing factor to everything we have been able to do so far, has been our incredible <b>User and Mentor</b> community so, a BIG THANK YOU for believing in us and helping us build Ecounsellors.</li><br>

                                                                  <li style="font-size: 16px;">Do write back to us in case you have any feedback or love to share :)</li><br>


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




	//printf(mailman2($emailid,$sub,$html,$usernamex,$from,$fromname))."<br>";


}


$t2=time();
$t3=$t2-$t1;

 $file="mass.txt";

 $t="testing...".$t3."\n";
    file_put_contents($file, $t, FILE_APPEND | LOCK_EX);

  exit();
   