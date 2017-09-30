<!DOCTYPE HTML>

<?php 

include("../includes/config.php");

if(isset($_SESSION['c_id']))
{
$session_emailid = $_SESSION['c_id'];
$queryu = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
$rowu = mysqli_fetch_array($queryu);
$queryf = query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");				

	$rowf = mysqli_fetch_array($queryf);
	$sub=$rowf['sub_id'];
}
else
{
	redirect("index");
}
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
?>
<html>
	<head>

<?php include_once('includes/nav.php'); ?>
		<title>Ecounsellors - Boost Business</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	
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


				<?php

	if(isset($_SESSION['c_id']))
							{
								echo '<style type="text/css">
											#mainx > section.one{
												background-image: url("images/graph.png");
											}
											#mainx section.cover {
														  padding: 10em 0;
														}

										</style>
										';
							
							}
							else
							{
								echo '<style type="text/css">
											#mainx > section.one{
												background-image: url("images/banner.png");
											}

										</style>
										';
								
							}
						?>


		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<style type="text/css">
		.text-left{
			font-weight: 100;
		}

		</style>
	</head>
	<body>


				<script type="text/javascript">

	


</script>

		<?php include("includes/header.php");?>

		<!-- mainx -->
			<div id="mainx">
				
				<!-- Intro -->
					<?php
						

						

							echo '<div id="top" class="text-center">
						
							<div class="">';
								echo '
							<img class="img-responsive" src="images/graph.png">
							

							
							
							';

						if(!isset($_SESSION['c_id'])&&!isset($_POST['forget'])&&!isset($_POST['ok']))

						{
							

						
						}
						if(isset($_SESSION['c_id']))
						{

							echo '
							









</div>

<br>
	<div id="activate"> </div>
<form method="post" action="">';
            		

                		if($rowf['free_act']!=1)
                		{
                			echo '<button type="submit" name="act" class="button" style="background-color: #5cb85c;">Activate This Feature</button>';

                			if($rowf['timet_f']==1)
                			{

                			 echo "<script type=\"text/javascript\">
							 $.amaran({
							 	
							 	'content'   :{
							 		 title:'Need Help?',
							           bgcolor:'#27ae60',
							           color:'#f00',
							             icon:'fa fa-frown-o',
							             info:'',
							           message:'If you are facing any Issues,Please feel free to contact us.'
							         

						        
							       },
							       'theme'     :'awesome error',

							       'sticky'    :true,
						         'closeOnClick':true,
						         'outEffect':'slideLeft',
						          'closeButton'   :true,
						           'afterEnd' :function()
								        {
								           
								        }
						       
						    });

							</script>";
							}
						  
                		}
                		else
                		{
                			if($rowf['timet_f']!=1)
                			{
                			  echo "<script type=\"text/javascript\">
							 $.amaran({
							 	'theme'     :'default',
							 	'content'   :{
							          title:'One Step Away',
							           bgcolor:'#27ae60',
							           color:'#f00',
							             icon:'fa fa-smile-o',
							             info:'',
							          message  :'Update Your TimeTable For<br>Demo Appointments, Click Here!',

						        
							       },

							       'sticky'    :true,
						         'closeOnClick':true,
						         'outEffect':'slideLeft',
						          'closeButton'   :true,
						           'afterEnd' :function()
								        {
								            window.location='manage#demo';
								        }
						       
						    });

							</script>";
							}
							else
							{
								
								echo "<script type=\"text/javascript\">
							 $.amaran({
							 	'theme'     :'default',
							 	'content'   :{
							          title:'Congrats!',
							           bgcolor:'#5cb85c',
							           color:'#5cb85c',
							             icon:'fa fa-smile-o',
							             info:'',
							          message  :'Boost Business Feature Is Live',

						        
							       },

							       'sticky'    :true,
						         'closeOnClick':true,
						         'outEffect':'slideLeft',
						          'closeButton'   :true,
						           'afterEnd' :function()
								        {
								            
								        }
						       
						    });

							</script>";
							}

                			echo '<button type="submit" name="dact" class="button" style="background-color: rgba(255, 0, 0, 0.5);">Deactivate This Feature</button>';
                		}


                echo '</form>



</div>



<!-- About Me -->
<section id="about" class="three">
	<div class="container">

		<br>
			<h1 class="bg-pers">How This Works? </h1>
<h3 class="text-left">

Boost business is a feature that will surely help you in your growth and will help you take your business to new heights. All you need to do is to activate<a href="#activate"> “Boost Your Business”</a> feature and offer 15 minutes of demo counselling session to clients via video conference, or phone as per client’s need. After activating this feature you can offer these demo sessions as per your convenience through our easy to manage time table system. Just select the time slots during which you want to offer these sessions and you are good to go. These will help you in getting the right reviews and thus help you remain at the top of our popularity list plus you will gain client\'s confidence. For more information, please view our Boost Your Business video. Looking forward to build a long term relationship with you. Only genuine client would be able to have demo session. In case of doubts please contact us through chat box below or email us your query at <a href="mailto:support@ecounsellors.in">support@ecounsellors.in</a><br><br>
<strong>NOTE: Please remind user to rate your profile at the end of demo session.</strong>


</h3>		

		

<h2 class="bg-pers">Watch This Video To Know More</h2>
<div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" width="721" height="315" src="https://www.youtube.com/embed/5n18C_mmkmk?rel=0" frameborder="0" allowfullscreen></iframe>

                


                </div><br>
                
                
                	<form method="post" action="">';
            		

                		if($rowf['free_act']!=1)
                		{
                			echo '<button type="submit" name="act" class="button" style="background-color: #5cb85c;">Activate This Feature</button>';

                			
						  
                		}
                		else
                		{
                			

                			echo '<button type="submit" name="dact" class="button" style="background-color: rgba(255, 0, 0, 0.5);">Deactivate This Feature</button>';
                		}


                echo '</form>
		</div>
	</section>

	<!-- Contact -->
	


			</div>';
		}?>

		<!-- Footer -->
							<?php include_once("templates/footer.php");  ?>


	</body>
</html>



<script src="js/custom.js"></script>

<?php
/*
if(isset($_POST['act']))
{
	$act=$_POST['act'];
	query("UPDATE c_userdata set free_act='1' where sub_id='$sub'");
	
	
	redirect("boost#activate");

}
if(isset($_POST['dact']))
{
	$act=$_POST['act'];
	query("UPDATE c_userdata set free_act='2' where sub_id='$sub'");
	redirect("boost#activate");


}