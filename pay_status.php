<?php

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />
<?php

include("includes/header.php");
if(!isset($_GET['payment_id']))
{
  redirect('/logout?out');
}
?>


<script type="text/javascript">
 

</script>
<style type="text/css">
  
.panel-body {
  padding: 10px !important;
}




</style>

<body>


 <?php

 require "insta/instamojo.php";
$pay_id=$_GET['payment_id'];
$status=$_GET['status'];
      $api = new Instamojo('c88e1d662da293bc9d571b50190fff19', '3b0a55f334396e56e963ab9a0dfedc93');

try {
    $response = $api->paymentDetail($pay_id);
    //print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
$status=$response['status'];
$bno=$_SESSION['bno'];
query("UPDATE pay set pay_id='$pay_id' where bno='$bno'");
$qx=query("SELECT * from pay where bno='$bno'");
$rx=mysqli_fetch_array($qx);

$q1=query("SELECT * from meet where bno='$bno'");
$r1=mysqli_fetch_array($q1);
$u_id=$r1['u_id'];
$c_id=$r1['c_id'];


$q2=query("SELECT * from u_users where u_id='$u_id'");
$r2=mysqli_fetch_array($q2);

$q3=query("SELECT * from c_userdata where sub_id='$c_id'");
$r3=mysqli_fetch_array($q3);

$final_fee=$r1['final_fee'];

  $type=$r1['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }
           else if($type==3)
          {
            $type="Phone";
          }

  if($r3['men']==1)
          {
            $men="Mentor";
          }
          else
          {
            $men="Counsellor";
          }


  include("includes/nav.php");
  //include("includes/feed.php");
 if(!$_SESSION['u_id'])
{
  redirect('index?lo');
}



?>

<style>
    #table{
      margin:auto;
    }
    #payment-table {
      max-width: 700px;
      margin-bottom: 20px;
    }
    
    
    #header > a {
      color: #00bef2;
    }
    .bluelink {
      color: #00bef2 !important;
      font-weight: 400;
    }
    .white-bk {
      background-color: #fff; 
    }
    body {
      background-color: #f0f0f0;
    }
    .verdana-text {
      font-family: "Verdana", sans-serif;
    }
    .center {
      margin: 0 auto;
      text-align: center;
    }
        body{
            background-color: white;
        }

        .noborder{
            border: none;
            border-radius:2px;
          
        }
  </style>

<script type="text/javascript">
  
</script>

 <div class="gap" style="margin-bottom: 70px;"></div>





<div class="container">



  <div class="row">
        <div class="col-md-6 col-md-offset-3" style="text-align:center">
          <?php
          $btime=time();
            if($status =='Credit')
            {

        
              query("UPDATE pay set confirm='1',ip2='$ip' where bno='$bno' and pay_id='$pay_id'");
           
        query("UPDATE meet SET confirm='1',btime='$btime',exrand='$exrand',paid='$final_fee' where bno='$bno'");
        
          echo '<h3>Payment Confirmation :)</h3>
                    <hr>
          <span class="verdana-text text-success" style="font-size:1.5em;">Payment successfully completed </span><br>
      
          <br><br>  
        
          <table id="payment-table"  class="table table-striped table-hover" >
                        <tbody>
            <tr>
              <td>'.$men.'\'s Name</td>
              <td>'.$r3['fname'].' '.$r3['lname'].'</td>
            </tr>
            <tr>
              <td>Date</td>
              <td>'.date("jS M'y l",$r1['date']).'</td>
            </tr>
            <tr>
              <td>Time Slot</td>
              <td>'.$r1['slot'].'</td>
            </tr>
            <tr>
              <td>Mode</td>
              <td>'.$type.'</td>
            </tr>
            <tr>
              <td>Amount Paid</td>
              <td>Rs. '.$r1['final_fee'].'</td>
            </tr>
                            </tbody>
          </table>
          
          
                <br>
                
          <hr>
      
       <a class="btn btn-primary btn-block noborder" href="appointments" role="button">Check your appointments</a><br><hr><br>';
       $cname=$r3['fname'].' '.$r3['lname'];
       $xdate=strtotime(date("j M y",$r1['date'])." ".date("H:i",$r1['time']));

$url_calender_user=google_cal($xdate,$r2['name'],$cname,1);
$url_calender_mentor=google_cal($xdate,$r2['name'],$cname,0);


echo '<a class="btn btn-block btn-big-re" href="'.$url_calender_user.'" target="_blank"><span class="fa fa-calendar"></span> Add to Calendar</a><br><br>';




$final_fee=$r1['final_fee'];



require_once('msg.php');

$ph=$r2['phone'];
$message='Your Appointment has been successfully booked with '.strtoupper($cname).':
Date:'.date("jS M'y l",$r1['date']).'
Time:'.$r1['slot'].'
Mode:'.$type.'
Amount Paid:'.$final_fee.'
Thanks!';
//if($flag==1)
{
send($ph,$message);
}


$ph=$r3['phone'];
$message='Congrats! you got an appointment with '.strtoupper($r2['name']).':
Date:'.date("jS M'y l",$r1['date']).'
Time:'.$r1['slot'].'
Mode:'.$type.'
Amount Paid:'.$final_fee.'
Thanks!';
                $disc=$r3['disc'];
                $fee=$r3['fee'];
                $flagx=0;
                
              /*  if($disc!=0)
                {
                  $flagx=1;
                  $final_fee=(int)($fee-(($disc/100)*$fee));
                }*/

send($ph,$message);




            require_once('mail.php');
            require_once('mail2.php');
            $headers = "care@ecounsellors.in";
            $headers2 = "support@ecounsellors.in";
            $username=$r2['name'];
            $username2=$cname;
            $emailid=$r2['emailid'];
            $emailid2=$r3['emailid'];

            
            $sub="Booking Confirmation!";
            $sub2="You have got an Appointment.";

            
            



            //$rand=random_string2(50);
          
         
    $html='<!DOCTYPE html>
<html>
<head>
<title>Booking Confirmation</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
   
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} 
    img{-ms-interpolation-mode: bicubic;}

    
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
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Hi '.strtok($username,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">Congratulations!

Your appointment has been successfully booked at Ecounsellors.in. The 

schedule for the same is as follows:</td>
                                                        </tr><tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                            <tr>
        <td bgcolor="#ffffff" align="center" style="padding:10px 0px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
         <table cellspacing="2" cellpadding="3" border="0" width="100%" class="table">
                            <tr>                            
                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Booking ID</td>
                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$bno.'</td>
                            </tr> 
                            <tr>
<td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">'.$men.'</td>
<td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$cname.'</td>
                                                    </tr>
                                      <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Date and Day</td>
    <td align="right" style="font-family: Arial, sans-serif; text-align:right;color: #333333; font-size: 16px; ">'.date("jS M'y D",$r1['date']).'</td>
                                                    </tr>
                                                    <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;">Time Slot:</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; ">'.$r1['slot'].'</td>
                                                    </tr>
                                                    <tr>
  <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Mode</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$type.'</td>
                  </tr> <tr>
            <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Amount Paid</td>
            <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$final_fee.'</td>
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
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/appointments" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Account</a><br><br></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                            <ol>
                                                                 <li>You must use an updated version of Google Chrome for audio and video conferencing. <a href="https://www.google.co.in/search?q=how%20to%20update%20google%20chrome&rct=j" style="text-decoration:none;color:#333333;font-weight:bold">Click here</a> to see how to update or call us at 09643781369 and we will assist you.</li><br>
                                                                 <li>Our team will call you 2 hours prior to the appointment to confirm it. Make sure you pick up the call.</li></ol></td>
                                                        </tr>
                                         <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#F33A5A"><a href="'.$url_calender_user.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #F33A5A; display: inline-block;" class="mobile-button">Add to Calendar</a><br><br></td>
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
'
;
	

















$html2='<!DOCTYPE html>
<html>
<head>
<title>Your Appointment is scheduled</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} 
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
    img{-ms-interpolation-mode: bicubic;} 

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
                                                            <td align="left" style="padding: 0 0 5px 0; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">Dear '.strtok($username2,' ').',</td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">We hope you are in good spirit and health. This is to notify you that a 

user has booked an appointment with you at Ecounsellors.in, which is 

scheduled as follows:</td>
                                                        </tr><tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                            <tr>
        <td bgcolor="#ffffff" align="center" style="padding:10px 0px 10px 0px;" >
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
      
               
                        <!-- TWO COLUMNS -->
                        <table cellspacing="2" cellpadding="3" border="0" width="100%" class="table">
                            <tr>                            
                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Booking ID</td>
                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$bno.'</td>
                            </tr> 
                            <tr>
<td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">User</td>
<td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$username.'</td>
                                                    </tr>
                                      <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Date and Day</td>
    <td align="right" style="font-family: Arial, sans-serif; text-align:right;color: #333333; font-size: 16px; ">'.date("jS M'y D",$r1['date']).'</td>
                                                    </tr>
                                                    <tr>
     <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; font-weight: bold;">Time Slot:</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px; ">'.$r1['slot'].'</td>
                                                    </tr>
                                                    <tr>
  <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Mode</td>
    <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$type.'</td>
                  </tr>
<!--
                            <tr>
            <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;font-weight: bold;">Amount Paid</td>
            <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">'.$final_fee.'</td>
                </tr>
-->
            </table>
                                          
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
                                                        <tr>
                                                        <td style="border-top:1px solid #eaeaea"></td>
                                                        </tr>
                                                        <tr>
                                                             <td align="left" style="padding: 10px 0 15px 0; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                            <ol>
                                                                 <li>You must use an updated version of Google Chrome for audio and video conferencing. <a href="https://www.google.co.in/search?q=how%20to%20update%20google%20chrome&rct=j" style="text-decoration:none;color:#333333;font-weight:bold">Click here</a> to update.</li><br>
                                                                 </ol></td>
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
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#25b1cb"><a href="https://ecounsellors.in/cp/" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #25b1cb; display: inline-block;" class="mobile-button">Access Account</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                         <tr>
                                            <td align="center" style="padding-top: 25px;" class="padding">
                                                <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#F33A5A"><a href="'.$url_calender_mentor.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #F33A5A; display: inline-block;" class="mobile-button">Add to Calendar</a><br><br></td>
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
			


				
					


        
          


            /*if (strstr($emailid, '@gmail'))
          {

            mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
          }
          else*/
         // if($flag==1)
          {
              $emailid3="ecounsellorscare@gmail.com";
            mailman2($emailid,$sub, $html, $username,$headers,"Ecounsellors.in");
            mailman2($emailid2,$sub2, $html2, $username2,$headers2,"Ecounsellors.in");
            mailman2($emailid3,$sub, $html, $username,$headers,"Ecounsellors.in");

          }












            }
            else
            {
                 query("UPDATE pay set confirm='-1',ip='$ip' where bno='$bno' and pay_id='$pay_id'");

              query("UPDATE meet SET confirm='-1',btime='$btime' where bno='$bno'");
              echo '  <h3>Payment Failed :(</h3>
                    <hr>
          <span class="verdana-text text-danger" style="font-size:1.5em;">Sorry for the inconvenience</span><br>
          <span class="verdana-text" style="font-size:1em;">Ecounsellors has failed to receive your payment</span>
      
        <br><br>  
        
          <table id="payment-table"  class="table table-striped table-hover" >
                        <tbody>
                <tr>
              <td>'.$men.'\'s Name</td>
              <td>'.$r3['fname'].' '.$r3['lname'].'</td>
            </tr>
            <tr>
              <td>Date</td>
              <td>'.date("jS M'y l",$r1['date']).'</td>
            </tr>
            <tr>
              <td>Time Slot</td>
              <td>'.$r1['slot'].'</td>
            </tr>
            <tr>
              <td>Mode</td>
              <td>'.$type.'</td>
            </tr>
            <tr>
              <td>Amount to be Paid</td>
              <td>Rs. '.$r1['final_fee'].'</td>
            </tr>
                            </tbody>
          </table>
          
        
                <br>
                
          If amount has been deducted from your bank please contact us.<hr>
                              <a class="btn btn-block btn-big-re" href="'.$rx['url'].'" role="button">Try Again</a> <br><br>
              ';
           
            }


                          ?>

      </div><!-- col-6-->

   



</div><!-- row -->






</div><!-- conatiner-->









<?php 


include("includes/footer2.php");


?>







</body>
</html>








<script src="js/main.js"></script>

                                          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
                                          <script>
                                              (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                              e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                              e.src='//www.google-analytics.com/analytics.js';
                                              r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                                              ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                                            </script>-->























<script src="js/custom.js"></script>



     <script type="text/javascript">








    

    </script>