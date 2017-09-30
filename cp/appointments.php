<!DOCTYPE HTML>

<?php 

include("../includes/config.php");
if(!isset($_SESSION['c_id']))
{
	redirect("index");


}
else
{
	$session_emailid = $_SESSION['c_id'];
	$queryu = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
	$rowu = mysqli_fetch_array($queryu);
	//$kid=$rowu[]'id'];

	$queryf = query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");	
	$rowf = mysqli_fetch_array($queryf);	
	$r=query("SELECT * From timetable where email='$session_emailid'");
	$rowd=mysqli_fetch_array($r);		
	$sub=$rowf['sub_id'];

	//query("UPDATE timetable SET flag='0' where email='$session_emailid'");

	if($rowf['verifyf']!=1)
	{
		redirect("profile");
	}
	$agent=1;
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{
		$agent=0;
	}

}
?>

	


<html>
<STYLE TYPE="text/css">


</STYLE>
<head>
	<?php include_once('includes/nav.php'); ?>
	<title>View All Appointments</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.scrolly.min.js"></script>
	<script src="js/jquery.scrollzer.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/bootstrap.js"></script>
	<noscript>

		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
	</noscript>
	<link rel="stylesheet" href="css/boot/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />



	<STYLE TYPE="text/css">
	
	#inline ul li{
		display: inline-table;
	}
	th{
		font-weight: 800;
	}

	tr:nth-child(odd):hover td{background-color:#00bef2;}

	h3{color:white;}
	.panel-title{text-align: center;}

	.table{
		
		border-spacing: 7px;
		border-collapse: separate;
	}


	tr:nth-child(even){background-color:#0075D3;}
	tr:nth-child(odd){background-color: #00bef2;}	



}       


</STYLE>

<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

	<!-- Header -->
	<?php  include('includes/header.php'); ?>

	<!-- Main -->
	<div id="mainx">

		<!-- Intro -->
		
		

				<?php  
				date_default_timezone_set("Asia/Kolkata"); 

	//include('../includes/config.php');
				?>
		




<section class="two" id="appoint">


		 <div class="col-sm-12 col-lg-12 col-md-12">
		 	<?php  if($rowf['free_act']==1)
		 	{
		 			echo '<a href="#demo" class="btn btn-black btn-block btn-lg" style="font-size: x-large;"> View Demo Appointments</a><p></p>';

		 	}
			?>
		 	
          <div class="well" style="color: white; background-color:#00bef2; text-align:center;<?php if($agent==1) { echo 'font-size: x-large;';}?>">Appointments</div>

          <div class="thumbnail">
           





<?php
$tdate=time();

$querym=query("SELECT * FROM meet where c_id='$sub' and confirm='1' order by id desc");
$num=mysqli_num_rows($querym);

if($num>0)
{
	while ( $rowm= mysqli_fetch_array($querym)) 

	{
		$flagz=0;
		 $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));

		if($tdate<=$xdate)
		{
			$flagz=1;
		}





if($flagz==0)
      {
      	if($rowm['status']==1)
      	echo '<button class="btn btn-success btn-block">Appointment Successful</button>';
      	else if($rowm['status']=='c')
      	echo '<button class="btn btn-danger btn-block">Appointment Cancelled</button>';
      }
      else
      {
      	if($rowm['status']==1)
      	echo '<button class="btn btn-success btn-block">Appointment Successful</button>';
      	else if($rowm['status']=='r')
      	echo '<button class="btn btn-info btn-block" style="background-color: indigo;color: white;">Appointment Rescheduled</button>';
      	else if($rowm['status']=='c')
      	echo '<button class="btn btn-danger btn-block">Appointment Cancelled</button>';

      }


		echo '<div class="caption">
		<div class="text-left">
		<strong>Booking No:</strong>'.$rowm['bno'].'<p class="pull-right"><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm['btime']).'</p>
		</div>

		<hr>
		</div>';

		$subu=$rowm['u_id'];

		$queryuf = query("SELECT * FROM u_userdata WHERE u_id='$subu'");   
		$rowuf=mysqli_fetch_array($queryuf);
		$queryud = query("SELECT * FROM u_users WHERE u_id='$subu'");   
		$rowud=mysqli_fetch_array($queryud);
         // echo '<input type"text" value="'.$subu.'">';

		echo '<div class="list-group"';
		if($agent==1)
		{
			echo  'style="height: 281px;"';
		}
		else
		{
			echo 'style="height: 500px;"';
		}
		$type=$rowm['type'];
		if($type==1)
		{
			$type="Video";

		}
		else if($type==2)
		{
			$type="Audio";
		}


		echo '>
		<a target="_blank" href="convo?sub='.($rowm['rand']).'" class="list-group-item card" style="height: inherit;">
		<div class="media col-md-3">
		<figure class="pull-left">';
		if($rowuf['propic']=="")
		{
			if($rowud['status']=="f" or $rowud['status']=="g")
				echo '<img style="height: 225px;" class="img-rounded" src="/u_img/'.$rowud['url_file'].'.png"/>';
			else
			{
				echo '<img class="media-object img-rounded img-responsive"'; 
				if($agent==0)
				{
					echo   'style="height:238px;width:238px;"'; 
				}
				else
				{
					echo  'style="height:138px;width:138px;"';
				}

				echo 'src="uploader/userpic.gif" alt="placehold.it/350x250" >'; 
			}

		}
		else
		{
			echo '<img style="height: 225px;" class="img-rounded" src="'.$rowuf['propic'].'"/>';
		}

		echo '</figure>
		</div><br>
		<div class="col-md-6 text-left">
		<span class="list-group-item-heading" style="color:#00bef2;">'.$rowud['name'].'  </span>
		<br>
		<table class="table table-hover table-bordered" style="color: white;"> 


		<tr><th>Date:</th><td>'.date("jS M'y l",$rowm['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$rowm['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>

		</table>
		</div>
		<div class="col-md-3 text-center">



		<button type="button" class="btn btn-info btn-lg btn-block"> Start! </button>


		</div>
		</a></div>
		';
		}/*
		else
		{
			$idx=$rowm['id'];

			if($rowm['status']=="")
			{
				//query("UPDATE meet set status='1' where id='$idx'");

			}
			echo '<button class="btn btn-success btn-block">Appointment Successful</button>';

			echo '<div class="caption">
		<div>
		<strong>Booking No:</strong>'.$rowm['bno'].'<p class="pull-right"><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm['btime']).'</p>
		</div>

		<hr>
		</div>';

		$subu=$rowm['u_id'];

		$queryuf = query("SELECT * FROM u_userdata WHERE u_id='$subu'");   
		$rowuf=mysqli_fetch_array($queryuf);
		$queryud = query("SELECT * FROM u_users WHERE u_id='$subu'");   
		$rowud=mysqli_fetch_array($queryud);
         // echo '<input type"text" value="'.$subu.'">';

		echo '<div class="list-group"';
		if($agent==1)
		{
			echo  'style="height: 281px;"';
		}
		else
		{
			echo 'style="height: 500px;"';
		}
		$type=$rowm['type'];
		if($type==1)
		{
			$type="Video";

		}
		else if($type==2)
		{
			$type="Phone";
		}


		echo '>
		<a target="_blank" href="convo?sub='.($rowm['rand']).'" class="list-group-item card" style="height: inherit;">
		<div class="media col-md-3">
		<figure class="pull-left">';
		if($rowuf['propic']=="")
		{
			if($rowud['status']=="f" or $rowud['status']=="g")
				echo '<img style="height: 200px;width: auto;" class="img-rounded" src="'.$rowud['url'].'"/>';
			else
			{
				echo '<img style="height: 200px;width: auto;" class="media-object img-rounded img-responsive"'; 
				if($agent==0)
				{
					echo   'style="height:238px;width:238px;"'; 
				}
				else
				{
					echo  'style="height:138px;width:138px;"';
				}

				echo 'src="uploader/userpic.gif" alt="placehold.it/350x250" >'; 
			}

		}
		else
		{
			echo '<img class="img-rounded" style="height: 200px;width: auto;" src="'.$rowuf['propic'].'"/>';
		}

		echo '</figure>
		</div><br>
		<div class="col-md-6">
		Name: <span class="list-group-item-heading" style="color:#00bef2;">'.$rowud['name'].'  </span>
		<br>
		<table class="table table-hover table-bordered" style="color: white;"> 


		<tr><th>Date:</th><td>'.date("jS M'y l",$rowm['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$rowm['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>

		</table>
		</div>
		<div class="col-md-3 text-center">



		<button type="button" class="btn btn-info btn-lg btn-block"> Start! </button>


		</div>
		</a></div>
		';
		}















	}*/


}
else
{
	echo '<h1 style="text-align: center;">You do not have any Upcoming Appointments </h1><br>
	<center>
	<!-- <div style="margin-bottom: 10px;"><a href="boost" class="button" style="width: 276px;">Boost Business</a></div><a href="manage#account" class="button">Increase Discount</a> --> </center>
	
	';

}
?>



            
            
          </div>
        </div>

	</section>
	
</a>





















<?php  
$querym=query("SELECT * FROM meet_f where c_id='$sub' and confirm='1' order by id desc");
$num=mysqli_num_rows($querym);
if($rowf['free_act']==1||$num>0)
		 	{?>




<section class="two" id="appoint">


		 <div class="col-sm-12 col-lg-12 col-md-12">
		 	
          <div class="well" id="demo" style="color: white; background-color:#5cb85c; text-align:center;<?php if($agent==1) { echo 'font-size: x-large;';}?>">Demo Appointments</div>

          <div class="thumbnail">
           





<?php
$tdate=time();



if($num>0)
{
	while ( $rowm= mysqli_fetch_array($querym)) 

	{
		$flagz=0;
		 $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));

		if($tdate<=$xdate)
		{
			$flagz=1;
		}






      if($flagz==1)
      {
      	if($rowm['status']==1)
      	echo '<button class="btn btn-success btn-block">Appointment Successful</button>';
      	else if($rowm['status']=='c')
      	echo '<button class="btn btn-danger btn-block">Appointment Cancelled</button>';
      }
      else
      {
      	if($rowm['status']==1)
      	echo '<button class="btn btn-success btn-block">Appointment Successful</button>';
      	else if($rowm['status']=='r')
      	echo '<button class="btn btn-info btn-block">Appointment Rescheduled</button>';
      	else if($rowm['status']=='c')
      	echo '<button class="btn btn-danger btn-block">Appointment Cancelled</button>';

      }

		echo '<div class="caption">
		<div>
		<strong>Booking No:</strong>'.$rowm['bno'].'<p class="pull-right"><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm['btime']).'</p>
		</div>

		<hr>
		</div>';

		$subu=$rowm['u_id'];

		$queryuf = query("SELECT * FROM u_userdata WHERE u_id='$subu'");   
		$rowuf=mysqli_fetch_array($queryuf);
		$queryud = query("SELECT * FROM u_users WHERE u_id='$subu'");   
		$rowud=mysqli_fetch_array($queryud);
         // echo '<input type"text" value="'.$subu.'">';

		echo '<div class="list-group"';
		if($agent==1)
		{
			echo  'style="height: 281px;"';
		}
		else
		{
			echo 'style="height: 500px;"';
		}
		$type=$rowm['type'];
		if($type==1)
		{
			$type="Video";

		}
		else if($type==2)
		{
			$type="Audio";
		}


		echo '>
		<a target="_blank" href="convo?sub='.($rowm['rand']).'&f" class="list-group-item card" style="height: inherit;">
		<div class="media col-md-3">
		<figure class="pull-left">';
		if($rowuf['propic']=="")
		{
			if($rowud['status']=="f")
				echo '<img style="height: 200px;width: auto;" class="img-rounded" src="/u_img/'.$rowud['url_file'].'.png"/>';
			else
			{
				echo '<img style="height: 200px;width: auto;" class="media-object img-rounded img-responsive"'; 
				if($agent==0)
				{
					echo   'style="height:238px;width:238px;"'; 
				}
				else
				{
					echo  'style="height:138px;width:138px;"';
				}

				echo 'src="uploader/userpic.gif" alt="placehold.it/350x250" >'; 
			}

		}
		else
		{
			echo '<img style="height: 200px;width: auto;" class="img-rounded" src="'.$rowuf['propic'].'"/>';
		}

		echo '</figure>
		</div><br>
		<div class="col-md-6">
		Name: <span class="list-group-item-heading" style="color:#00bef2;">'.$rowud['name'].'  </span>
		<br>
		<table class="table table-hover table-bordered" style="color: white;"> 


		<tr><th>Date:</th><td>'.date("jS M'y l",$rowm['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$rowm['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>

		</table>
		</div>
		<div class="col-md-3 text-center">



		<button type="button" class="btn btn-info btn-lg btn-block"> Start! </button>


		</div>
		</a></div>
		';
		}
		/*
		else
		{
			$idx=$rowm['id'];

			if($rowm['status']=="")
			{
				//query("UPDATE meet_f set status='1' where id='$idx'");

			}
			echo '<button class="btn btn-success btn-block">Appointment Successful</button>';

			echo '<div class="caption">
		<div>
		<strong>Booking No:</strong>'.$rowm['bno'].'<p class="pull-right"><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm['btime']).'</p>
		</div>

		<hr>
		</div>';

		$subu=$rowm['u_id'];

		$queryuf = query("SELECT * FROM u_userdata WHERE u_id='$subu'");   
		$rowuf=mysqli_fetch_array($queryuf);
		$queryud = query("SELECT * FROM u_users WHERE u_id='$subu'");   
		$rowud=mysqli_fetch_array($queryud);
         // echo '<input type"text" value="'.$subu.'">';

		echo '<div class="list-group"';
		if($agent==1)
		{
			echo  'style="height: 281px;"';
		}
		else
		{
			echo 'style="height: 500px;"';
		}
		$type=$rowm['type'];
		if($type==1)
		{
			$type="Video";

		}
		else if($type==2)
		{
			$type="Phone";
		}


		echo '>
		<a target="_blank" href="convo?sub='.($rowm['rand']).'" class="list-group-item card" style="height: inherit;">
		<div class="media col-md-3">
		<figure class="pull-left">';
		if($rowuf['propic']=="")
		{
			if($rowud['status']=="f")
				echo '<img style="height: 200px;width: auto;" class="img-rounded" src="'.$rowud['url'].'"/>';
			else
			{
				echo '<img class="media-object img-rounded img-responsive"'; 
				if($agent==0)
				{
					echo   'style="height:238px;width:238px;"'; 
				}
				else
				{
					echo  'style="height:138px;width:138px;"';
				}

				echo 'src="uploader/userpic.gif" alt="placehold.it/350x250" >'; 
			}

		}
		else
		{
			echo '<img style="height: 200px;width: auto;" class="img-rounded" src="'.$rowuf['propic'].'"/>';
		}

		echo '</figure>
		</div><br>
		<div class="col-md-6">
		Name: <span class="list-group-item-heading" style="color:#00bef2;">'.$rowud['name'].'  </span>
		<br>
		<table class="table table-hover table-bordered" style="color: white;"> 


		<tr><th>Date:</th><td>'.date("jS M'y l",$rowm['date']).'</td></tr>
		<tr><th>Time Slot:</th><td>'.$rowm['slot'].'</td></tr>
		<tr><th>Mode:</th><td>'.$type.'</td></tr>

		</table>
		</div>
		<div class="col-md-3 text-center">



		<button type="button" class="btn btn-info btn-lg btn-block"> Start! </button>


		</div>
		</a></div>
		';
		}















	}*/


}
else
{
	echo '<h1 style="text-align: center;">You do not have any Upcoming Appointments </h1>';
}
?>



            
            
          </div>
        </div>

	</section>
	
</a>


<?php  }?>


</div>



















<!-- Footer -->
<?php include("templates/footer.php") ?>



</div>
</section>

	</body>

			</html>



<script src="js/custom.js"></script>

<?php
				//sleep(5);
				if(isset($_POST['sub']))
				redirect('manage');

			?>