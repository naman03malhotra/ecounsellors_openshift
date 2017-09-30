<html>
<head>
	<title>Ecounsellors.IN Admin</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->

	
	<link rel="stylesheet" href="../css/boot/bootstrap.min.css" />
	
	<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="cust.css" />

	<?php   

	include("../../includes/config.php");
	include("mail2.php");
	$sup=en_de('de',$_COOKIE['super']);

	if(!isset($_COOKIE['super']) || $sup!='2')
	{
		redirect("logout");
	}








      $querym=query("SELECT * FROM meet where  (status='' or status='r') and confirm='1' order by id desc");
          
          
      $num=mysqli_num_rows($querym);
      

    

      $querym_f=query("SELECT * FROM meet_f where  (status='' or status='r') and confirm='1' order by id desc");
          
          
      $num_f=mysqli_num_rows($querym_f);





     $tdate=time()-(3600*1); 
   /*  echo "<br>";
     echo date("j M y H:i a",$tdate);
      echo "<br>";*/
    

if($num>0)
{
while ( $rowm= mysqli_fetch_array($querym)) 
  {
  	 /* echo $xdate=date("j M y",$rowm['date'])." ".date("H:i a",$rowm['time']);
       echo "<br>";*/
		    $flagz=0;
		   $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));
		    $rand=$rowm['rand'];



		    if($tdate<=$xdate)
		    {
		      $flagz=1;
		      //echo "true";
		    }
		    else
		    {
		    	//echo "flase";
		    }



		      if($flagz==0)
		      {

		          $idx=$rowm['id'];

		        if($rowm['status']=="" or $rowm['status']=="r")
		        {
		          query("UPDATE meet set status='1' where id='$idx'");
		         // redirect("bank-approve");

		        }
		      

		         
		      }
		      else
		      {
		        //$link='target="_blank" href="cp/convo?sub='.$rowm['rand'].'"';
		      }


        


       

       }


}




if($num_f>0)
{


while ( $rowm_f= mysqli_fetch_array($querym_f)) 
  {
    $flagz=0;
    $xdate=strtotime(date("j M y",$rowm_f['date'])." ".date("H:i",$rowm_f['time']));
    $rand=$rowm_f['rand'];



    if($tdate<=$xdate)
    {
      $flagz=1;
    }



      if($flagz==0)
      {

          $idx=$rowm_f['id'];

        if($rowm_f['status']=="" or $rowm['status']=="r")
        {
          query("UPDATE meet_f set status='1' where id='$idx'");
          redirect("bank-approve");

        }
        

         
      }
      else
      {
        //$link='cp/convo?sub='.$rowm_f['rand'].'&f';
      }


        

  }

}
























	?>

<style type="text/css">

form input[type="text"], form input[type="email"], form input[type="password"], form select, form textarea {
		padding: 0px;
	}
		.container{
		width: auto !important;
	}
	</style>
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

	<!-- Header -->


	<!-- Main -->
	
		<div class="container">
		<div class="row">



			<?php

				//$connection = mysqli_connect("localhost","makeruw5_cwaapas","CashWaapas987@","makeruw5_cashwaapas");

			$query = query("SELECT * FROM c_users order by id desc");
			$query2= query("SELECT id from c_userdata where verifyf='1'");
			$query3= query("SELECT id from c_userdata where verifyf='1' and timet='1'");
			$total_counsellors = mysqli_num_rows($query);
			$verified_consellors = mysqli_num_rows($query2);
			$verified_disp_consellors = mysqli_num_rows($query3);

			$queryu1= query("SELECT * from u_users order by id desc");
			$query_ques= query("SELECT * from ques ");
				$query_appointments= query("SELECT * from meet where confirm='1' and status='1'");
			//$queryu2= query("SELECT * from c_users order by id desc");

			$total_users= mysqli_num_rows($queryu1);
			$total_ques= mysqli_num_rows($query_ques);
			$total_app= mysqli_num_rows($query_appointments);
			//$total_couns= mysqli_num_rows($queryu1);

			?>

			<div class="row text-center">
			<h2>Stats<a target="_blank" href="/msd">.</a></h2>
			<div class="col-md-2"></div>
				
				<div class="col-md-4">
					<?php echo '<h4>Total Counsellor sign-ups: '.$total_counsellors.'</h4>'; 
					echo '<h4>Total Verified Counsellors: '.$verified_consellors.'</h4>'; 
					echo '<h4>Total Verified with time table: '.$verified_disp_consellors.'</h4>'; 





					?>
				</div>
				<div class="col-md-4">
					
						<?php 
								echo '<h4>Total Users:'.$total_users.'</h4>';
								echo '<h4>Total Questions:'.$total_ques.'</h4>';
								echo '<h4>Successful Appointments:'.$total_app.'</h4>';
								//echo '<h4>Total Couns SignUps:'.$total_couns.'</h4>';

						?>

				</div>
			</div>

			<hr>

			<h3 style="text-align:center">Ecounsellors.IN Admin Dashboard v 2.5</h3>


					<ul class="nav nav-tabs">
  <li role="presentation" ><a href="index">Home</a></li>
   <li role="presentation" ><a href="pen">Pending</a></li>
    <li role="presentation" ><a href="couns">Counsellor SignUps</a></li>
   <li role="presentation" ><a href="users">Users</a></li>
  <li role="presentation"><a href="issue">Issues</a></li>
  <li role="presentation" ><a href="bank-approve">Bank-Approve</a></li>
  <li role="presentation"><a href="free">Free-Appointments</a></li>
    <li role="presentation"><a href="ques">Questions</a></li>
       <li role="presentation"><a href="notify">Notify</a></li>
       <li role="presentation"><a href="retention">Retention</a></li>
</ul>