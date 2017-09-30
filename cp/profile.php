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
	
	$agent=1;
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
	{
		$agent=0;
	}

}
?>
<html>

<head>
	<?php include_once('includes/nav.php'); ?>
	<title>Ecounsellors - View Profile</title>
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
	<script type="text/javascript" src="//api.filepicker.io/v2/filepicker.js"></script>

	<noscript>

		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
	</noscript>
	<link rel="stylesheet" href="css/boot/bootstrap.css" />
	<link rel="stylesheet" href="css/custom.css" />



	<STYLE TYPE="text/css">
	textarea::-webkit-input-placeholder {
color: #838D90 !important;
}
 
textarea:-moz-placeholder { /* Firefox 18- */
color: #838D90 !important;  
}
 
textarea::-moz-placeholder {  /* Firefox 19+ */
color: #838D90 !important;  
}
 
textarea:-ms-input-placeholder {  
color: #838D90 !important;  
}
	input::-webkit-input-placeholder {
color: #838D90 !important;
}
 
input:-moz-placeholder { /* Firefox 18- */
color: #838D90 !important;  
}
 
input::-moz-placeholder {  /* Firefox 19+ */
color: #838D90 !important;  
}
 
input:-ms-input-placeholder {  
color: #838D90 !important;  
}
	.special{

font-size: -webkit-xxx-large;
    border-radius: 48%;
    height: 122px;
    line-height: 105px;
       transition: 0.6s;
       width: 122px;
    
}
	
	#inline ul li{
		display: inline-table;
	}
	th{
		font-weight: 800;
	}
	/*#inline{
		  margin-left: 53px;
  margin-bottom: 96px;
	}*/
th{
	text-align: center;
}
td{
	text-align: left;
}

.btn_my{
	    font-size: 23px;
    padding: 9px;
}
	</STYLE>
	<style type="text/css">
  
.panel-body {
  padding: 10px !important;
}
.fpbtn {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
  height: 27px;
  padding: 4px 40px 5px 40px;
  margin-bottom: 0;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 600;
  line-height: 1.42857143;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background: #3ac7ed;
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA0AAAANCAYAAABy6+R8AAAAGXRF…NJ5pXfNcLBnUVuU8u6AHe9fwXQ+4P2vjAHj2kLzyS+RVgAJKfyOcTLuk9AAAAAElFTkSuQmCC");
  background-repeat: no-repeat;
  background-position: 17px 9px;
  border: 1px solid transparent;
  border-radius: 17px;
}
</style>

	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>
<script type="text/javascript">



	
	function anim(cl)
	{
		var b1=$("#"+cl);
		b1.addClass("animated jello");
		//b1.html("Earnings");
	
		
	}
	function anim_out(cl)
	{
		var b1=$("#"+cl);
		b1.removeClass("animated jello");
		//b1.html("<span class='fa fa-inr'></span>");
		
		
	}



</script>
	<?php  include('includes/header.php'); ?>

					<!-- mainx -->
					<div id="mainx">

						<!-- Intro -->
						<div id="top" class="text-center">
							<div class="">
								<?php
								if(!isset($_POST['ch'])&&!isset($_POST['change'])){
									echo	'

									';

									if(isset($_SESSION['c_id'])&&$rowf['verifyf']=="")
									{
									/*if($agent=="1")
									{
									echo '<button  class="button" data-toggle="modal" data-target=".xu">Apply Now</button>';
									}
									else*/
											$img_url="images/cpanel_org.png";					
										echo '<div class="banner">
												<img class="img-responsive" src="'.$img_url.'">
											</div>';
																	
									/*	echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/cpanel_org.png");
												}

									</STYLE>';*/
										//echo "<h1><span font-size: 68px;>3 </span>STEPS <br>AND<BR> YOU'RE DONE!</h1>";
										//echo '<br><a  class="button" href="#form">Step One</a>';
									

								}
								else if($rowf['verifyf']=="1")
								{
											$img_url="images/profile.png";					
										echo '<div class="banner">
												<img class="img-responsive" src="'.$img_url.'">
											</div>';


										/*echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/profile.png");
												}

									</STYLE>';*/
									echo '<div id="inline"><ul><li><a  class="fpbtn" href="#edit"  >Edit Profile</a></li>&nbsp;';
									echo '<li><form method="post" action=""><button class="fpbtn" type="submit" name="ch" >Change Password</button></form></li></ul></div>';


								}
								else if($rowf['verifyf']=="3"){
										

										echo '<div class="banner">
												<img class="img-responsive" src="'.$img_url.'">
											</div>';

										/*echo '<div style=" height: 175px;"></div>';
									
										echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/cpanel_org.png");
												}

									</STYLE>';*/
									

								}
								else if($rowf['verifyf']=="4"){
										

										echo '<div class="banner">
												<img class="img-responsive" src="'.$img_url.'">
											</div>';

										/*echo '<div style=" height: 175px;"></div>';
									
										echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/cpanel_org.png");
												}

									</STYLE>';*/
									


								}
								else if($rowf['verifyf']=="0")
								{
									$img_url="images/cstatus.png";

									echo '<div class="banner">
												<img class="img-responsive" src="'.$img_url.'">
											</div>';

										

										/*echo '<div style=" height: 175px;"></div>';
									
										echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/cstatus.png");
												}

									</STYLE>';*/
								}


							}

							?>

						
					</div>
				</div><!--id=top div -->

				<?php

						if($rowf['verifyf']==""&&!isset($_POST['ch'])&&!isset($_POST['change'])&&!isset($_SESSION['couns']))
							{

								echo '
								<section id="form">
								<center>
								<form role="form" method="post" action="">
								<h3>Applying As:</h3>
								<div class="row">
								<div class="6u">
									<a href="profile?couns=men" onmouseover="anim(\'b1\')" onmouseout="anim_out(\'b1\')" id="b1" class=" btn special btn-info btn-lg"><span class="fa fa-user"></span>
									</a><br><b>Mentor</b>
								</div>
								<div class="6u">
									<a href="profile?couns=cou" onmouseover="anim(\'b2\')" onmouseout="anim_out(\'b2\')" id="b2" class="btn special btn-info btn-lg"><span class="fa fa-user-plus"></span></a><br>
									<b>Counsellor</b>
								</div>
								</div>
								</input>
								<!-- <button class="button " id="apply" type="submit" name="men" >Submit</button> -->
								</form></center>
								</section><br><br><br>';

							}

						
								if(isset($_GET['couns']))
								{
									if($_GET['couns']=="men")
									{
										$_SESSION['couns']="men";
										$men=1;
									}
									else
									{
										$_SESSION['couns']="cou";
										$men=0;
									}
									redirect("profile");
								}

								if($_SESSION['couns']=="men" or $rowf['men']==1)
									{
										
										$men=1;
									}
									else
									{
									
										$men=0;
									}




				if($rowf['verifyf']=="3"&&!isset($_POST['ch'])&&!isset($_POST['change'])){
						echo '<a  class="btn btn-warning btn-block" href="#pro" style="font-size:20px;"><span style="margin-right: 81px;">STEP 02</span></a>';



					echo '<section class="two" id="pro">


					<div class="row">

					<div class="u">

					</div>
					<div class="10u">
					<h2 class="bg-pers">Upload Profile Picture* (Formals Preferred)</h2><h4 class="btn-black">Only JPEG/PNG/GIF files are accepted, Image size must be less than 4 MB</h4>';

					if($rowf['propic_file']=="")
					{
						echo '<img src="uploader/userpic.gif"/>';
					}
					else
					{
						echo '<img class="img-rounded"style="height: 200px;width:200px;"src="/cp/m_img/'.$rowf['propic_file'].'.png"/>';
					}
					if(isset($_POST['up']))
					{

						define("UPLOAD_DIR", "uploads/");

						if (!empty($_FILES["myFile"])) 
						{
							$myFile = $_FILES["myFile"];



							$name =  $myFile["name"];

							$f=0;

							$fileSize = $_FILES['myFile']['size'];
							if($fileSize<1250000)
							{
								$f=1;
							}


							$fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
							$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
							if (in_array($fileType, $allowed)&&$f) 
							{

								$i = 0;
								$parts = pathinfo($name);
								$rand=random_string(7);
								$name=$rand.".".$parts["extension"];



								while (file_exists(UPLOAD_DIR . $name))
								{
									$i++;
									$name = $rand . $i . "." . $parts["extension"];
								}
		//echo $parts["extension"];

    // preserve file from temporary directory


								$success = move_uploaded_file($myFile["tmp_name"],
									UPLOAD_DIR . $name);
								if($success)
								{
									query("UPDATE c_userdata SET propic='$name' WHERE emailid='$session_emailid';");
									redirect("profile");
								}
								if (!$success)
								{ 
									echo "<h1 style='color: red;'>Unable to save file.</h1>";
									exit;
								}

							}
							else
							{
								if($f=='0')
									echo '<h1 style="color: red;">Image size must be less than 1MB</h1>';

								else

									echo '<h1 style="color: red;">Invalid Extension, Upload Image file only</h1>';
							}

		//$t=UPLOAD_DIR.$name;
//echo $path = rtrim(dirname($t), "/\\");
		//echo realpath($t);
    // set proper permissions on the new file
		//chmod(UPLOAD_DIR . $name, 0644);
						}


					}


					echo '</br><center>
					          <button onclick="upload(\'pro\')" class="fpbtn" name="up">Upload</button>

						<br>
					
					<form action="" method="post" role="form"> 
					<!-- <label><strong>Linked In Profile Url*:</strong></label><input class="" id="clg" type="text"  name="lnk"  placeholder="Paste Link here ">
					<label><strong>Facebook:</strong></label><input class="" id="clg" type="text" name="fbl"  placeholder="Paste Link here (Optional)">
					
					<label><strong>Twitter:</strong></label><input class="" id="clg" type="text"  name="twl"  placeholder="Paste Link here (Optional)">
					<label><strong>Website URL:</strong></label><input class="" id="clg" type="text"  name="wbl" placeholder="Paste Link here (Optional)"><br> -->
					';
					if($rowf['propic']!="")
					{
						echo '<input type="submit" value="Submit" name="link">';
					}
					

					echo '</form>';
					if(isset($_POST["link"]))
					{
						$fbl=$_POST["fbl"];
						$lnk=$_POST["lnk"];
						$twl=$_POST["twl"];
						$wbl=$_POST["wbl"];

						query("UPDATE c_userdata SET fbl='$fbl',lnk='$lnk',twl='$twl',wbl='$wbl',verifyf='4' WHERE emailid='$session_emailid';");
						redirect("profile");
					}

					echo '</center>
					</div>
					<div class="u">

					</div>


					</div>


					</section>';



				}















				if($rowf['verifyf']=="4"&&!isset($_POST['ch'])&&!isset($_POST['change'])){
					echo '<a  class="btn btn-info btn-block" href="#form" style="font-size:20px;"><span style="margin-right: 81px;">STEP 03</span></a>';


					echo '<section class="two" id="pro">


					<div class="row">

					<div class="u">

					</div>
					<div class="10u">';
					
					if($men==1)
					{
					//echo '<h2 class="btn-primary btn_my">Upload Id Card</h2><h3 style="font-weight: 100;">College ID card for verification.</h3>';

					}
					else
					{
					echo '<h2 class="btn-primary btn_my">Upload Degree</h2>
					<h3 style="font-weight: 100;">Upload Your Highest Degree</h3>';
					}

				if ($rowf['digree']=="") {
					# code...
				}
				else
					{
						echo '<center><img class="img-rounded img-responsive "style="height: 300px;width:150px;"src="'.$rowf['digree'].'"/></center>';
					}
					
					/*if(isset($_POST['upd']))
					{

						define("UPLOAD_DIR", "dig/");

						if (!empty($_FILES["myFile"])) 
						{
							$myFile = $_FILES["myFile"];



							$name =  $myFile["name"];

							$f=0;

							$fileSize = $_FILES['myFile']['size'];
							if($fileSize<2250000)
							{
								$f=1;
							}


							$fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
							$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
							if (in_array($fileType, $allowed)&&$f) 
							{

								$i = 0;
								$parts = pathinfo($name);
								$rand=random_string(7);
								$name=$rand.".".$parts["extension"];



								while (file_exists(UPLOAD_DIR . $name))
								{
									$i++;
									$name = $rand . $i . "." . $parts["extension"];
								}
		//echo $parts["extension"];

    // preserve file from temporary directory


								$success = move_uploaded_file($myFile["tmp_name"],
									UPLOAD_DIR . $name);
								if($success)
								{
									query("UPDATE c_userdata SET digree='$name' WHERE emailid='$session_emailid';");
									redirect("profile");
								}
								if (!$success)
								{ 
									echo "<h1 style='color: red;'>Unable to save file.</h1>";
									exit;
								}

							}
							else
							{
								if($f=='0')
									echo '<h1 style="color: red;">Image size must be less than 2MB</h1>';

								else

									echo '<h1 style="color: red;">Invalid Extension, Upload Image file only</h1>';
							}

		//$t=UPLOAD_DIR.$name;
//echo $path = rtrim(dirname($t), "/\\");
		//echo realpath($t);
    // set proper permissions on the new file
		//chmod(UPLOAD_DIR . $name, 0644);
						}


					}*/

					if($men==0)
					echo '<center><button onclick="upload(\'deg\')" class="fpbtn" name="up">Upload</button>';

						if($men==0)
						{

						echo '<h2 class="btn-primary btn_my">Upload Scanned Copy of PAN card or its clear image (optional)</h2>';
	if ($rowf['pan']=="") {
					# code...
				}
				else
					{
						echo '<img class="img-rounded img-responsive"style="height: 150px;width:300px;"src="'.$rowf['pan'].'"/>';
					}	


					
				





						echo '<a onclick="upload(\'pan\')" class="fpbtn" name="up">Upload</a>';


					}
	echo '<form action="" method="post" role="form"> ';
					if($men==0)
					{
						
						echo '<h2 class="btn-primary btn_my">Types Of Counselling You Offer(Multiple)*</h2>';
						  $qfields=query("SELECT * from fields where active='1' and men=''");
					}
					else
					{
						echo '<h2 class="btn-primary btn_my">Types Of MentorShip You Offer(Multiple)*</h2>';
						$qfields=query("SELECT * from fields where active='1' and men='1'");
					}

					echo '<div class="btn-group" data-toggle="buttons">';
   
      while($row_fields=mysqli_fetch_array($qfields))

      {
      						echo '<span class="btn btn-default btn-block"><input type="checkbox" value="'.$row_fields['name'].'" name="typex[]"   >'.$row_fields['name'].'</input></span><br>';

      }
					


					echo '</div><br>';
					if($men==0)
					{
					echo '<h2 class="btn-primary btn_my">Counselling Fee(Per Session)* Input "0" for free service</h2>';
					echo '<strong>Rs.</strong><input type="number" name="fee" placeholder="Fee" min="0" max="4000" style="text-align: center;" required/><p></p>';
					}
					else
					{
						//echo '<h2 class="btn-primary btn_my">Mentorship Fee(Per Session)* Input "0" for free service</h2>';
											echo '<input type="hidden" name="fee" value="99" placeholder="Fee" min="0" max="4000" style="text-align: center;" required/><p></p>';
	
					}

									
								if($men==0)
								{
								echo '<input type="text" name="pan_num" placeholder="PAN card number" style="text-align: center;" />';
							}


					echo '<h2 class="btn-primary btn_my">Languages You Know(Multiple Choice)*</h2>
					<div class="btn-group" data-toggle="buttons">';


					echo '<span class="btn btn-default btn-block"><input type="checkbox" value="Hindi" name="lang[]"   >Hindi</input></span><br>';
					echo '<span class="btn btn-default btn-block"><input type="checkbox" value="English" name="lang[]"   >English</input></span><br>';
					echo '<span class="btn btn-default btn-block"><input type="checkbox" value="Punjabi" name="lang[]"   >Punjabi</input></span><br>';

					echo '</div><br>';
					if($men==0)
					{
					echo '<h2 class="btn-primary btn_my">We need your bank details to transfer money into your account.*</h2>';


					echo '<input type="text" name="bnk" value="'.$rowf['bnk'].'" placeholder="Bank Name"><br>
           				  <input type="text" name="acnt" value="'.$rowf['acnt'].'" placeholder="Account Number"><br>
           				  <input type="text" name="bra" value="'.$rowf['bra'].'" placeholder="Branch Name"><br>
           				  <input type="text" name="ifsc" value="'.$rowf['ifsc'].'" placeholder="IFSC code"><br>
           				  <input type="text" name="micr" value="'.$rowf['micr'].'" placeholder="MICR code"><br>';
					}
				if($men==0)
					{

					echo '<h2 class="btn-primary btn_my">Terms and Conditions</h2>';
				
					if($agent==1)
					echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="900" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
					else
					echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="400" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';

					echo '<br><input type="checkbox" name="chkbx" required>I have read and agree to the Terms</input><br>';
					}

					//------------------------------------------------------------------------------if($rowf['pan']!="")!!!!!!!!!!!!!!!!!@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
					{
					echo '<br><button type="submit" class="button btn-block" value="Finish" name="typed">Finish</button>';
					}

					echo '</form>';
				
						if (isset($_POST['typed'])) 
					{
						$bank=$_POST['bnk'];
						$account=$_POST['acnt'];
						$bra=$_POST['bra'];
						$ifsc=$_POST['ifsc'];
						$micr=$_POST['micr'];

						$check = $_POST['typex'];
						$fee= $_POST['fee'];
						$pan_num=$_POST['pan_num'];

						$lang = $_POST['lang'];
						foreach($check as $checked) 
						{
							$checked=implode(',', $_POST['typex']);



						}
						foreach($lang as $langs) 
						{
							$f_lang=implode(',', $_POST['lang']);



						}
						
						
						query("UPDATE c_userdata SET typec='$checked',lang='$f_lang',verifyf='0',fee='$fee',f_fee='$fee',pan_num='$pan_num',bnk='$bank',acnt='$account',bra='$bra',ifsc='$ifsc',micr='$micr' WHERE emailid='$session_emailid'");
						redirect("profile");
						

					}
					else
					{

						//echo 'ajsdjasd;kjnaksjdbkajslbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb';
					}

						
				

					echo '</center>
					</div>
					<div class="u">

					</div>


					</div>


					</section>';



				}





				



			/*	if($agent=="0"&&$rowf['verifyf']==""&&!isset($_POST['ch'])&&!isset($_POST['change'])){

							echo '<div class="modal fade bs-example-modal-md xu" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<center><h4 class="modal-title">CPL Form:</h4></center>
										</div>
										<div class="modal-body">
											<p>
												<form role="form" method="post" action="" >
													<div class="row">
														<div class="u"></div>
														<div class="5u">
															<input class="" id="fname" type="text"  name="fname"  required placeholder="First Name">
														</div>
														<div class="5u">
															<input class="" id="lname" type="text"  name="lname"  required placeholder="Last Name">
														</div>
														<div class="u"></div>
													</div>
													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<select size="1" id="gender" name="gender" required>
																<option value="" style="display:none">Gender</option>
																<option>Male</option>
																<option>Female</option>




															</select>
														</div>

														<div class="u"></div>
													</div>

													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<input class="" id="phone" type="text"  name="phone"  required  maxlength="14" placeholder="Phone Number: You will be verified via call.">
														</div>

														<div class="u"></div>
													</div>
													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<select size="1" id="state" name="state" required>
																<option value="" style="display:none">Select State</option>
																<option>Andaman and Nicobar Islands</option>
																<option>Andhra Pradesh</option>
																<option>Arunachal Pradesh</option>
																<option>Assam</option>
																<option>Bihar</option>
																<option>Chandigarh</option>
																<option>Chhattisgarh</option>
																<option>Dadra and Nagar Haveli</option>
																<option>Daman and Diu </option>
																<option>Delhi </option>
																<option>Goa</option>
																<option>Gujarat</option>
																<option>Haryana</option>
																<option>Himachal Pradesh</option>
																<option>Jammu and Kashmir</option>
																<option>Jharkhand</option>
																<option>Karnataka</option>
																<option>Kerala</option>
																<option>Lakshadweep</option>
																<option>Madhya Pradesh</option>
																<option>Maharashtra</option>
																<option>Manipur</option>
																<option>Meghalaya</option>
																<option>Mizoram</option>
																<option>Nagaland</option>
																<option>Odisha</option>
																<option>Puducherry </option>
																<option>Punjab</option>
																<option>Rajasthan</option>
																<option>Sikkim</option>
																<option>Tamil Nadu</option>
																<option>Tripura</option>
																<option>Uttar Pradesh</option>
																<option>Uttarakhand</option>
																<option>West Bengal</option>
															</select>
														</div>

														<div class="u"></div>
													</div>

													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<input class="" id="city" type="text"  name="city"  required placeholder="City">
														</div>

														<div class="u"></div>
													</div>


													<div class="row">
														<div class="u"></div>
														<div class="10u">
														<textarea class="" id="clg" type="text"  name="edu"  required placeholder="Qualification"></textarea>

														</div>

														<div class="u"></div>
													</div>
													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<textarea class="" id="clg" type="text"  name="clg"  required placeholder="Experience"></textarea>
														</div>

														<div class="u"></div>
													</div>


													<div class="row">
														<div class="u"></div>
														<div class="10u">
														<textarea class="" id="clg" type="text"  name="pro" placeholder="Past Achivements(Optional)"></textarea>

														</div>

														<div class="u"></div>
													</div>

													


													<div class="row">
														<div class="u"></div>
														<div class="10u">
															<textarea class="" rows="1"  id="addr" type="text"  name="addr"  required placeholder="Full Address"></textarea>
														</div>
														<div class="u"></div>
													</div>

													<div class="row">
														<div class="u"></div>
														<div class="5u">
															<input class="" id="pin" type="text"  name="pin"  required pattern="[0-9]{6}" maxlength="6" placeholder="Pin Code">
														</div>
														<div class="5u">
															<input class="" id="age" type="text"  name="age"  required pattern="[0-9]{2}" maxlength="2"placeholder="Age">
														</div>

														<div class="u"></div>
													</div>

												</br><center>
												<button class="button " id="apply" type="submit" name="apply" >Apply</button></center>
											</form>

										</p>
									</div>
									<div class="modal-footer">
										<form method="post" action="">

											<div class="login_result" id="login_result"></div>
										</form>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->'; }*/
					





							if($rowf['verifyf']==""&&!isset($_POST['ch'])&&!isset($_POST['change'])&&isset($_SESSION['couns']))
							{

								echo '<a  class="btn btn-danger btn-block" href="#form" style="font-size:20px;"><span style="margin-right: 81px;">STEP 01</span></a>';

								echo '
								<section id="form">
								<center>
								<form role="form" method="post" action="">
								<div class="row">
								<div class="u"></div>
								<div class="5u">
								<input class="" id="fname" type="text"  name="fname"  required placeholder="First Name">
								</div>
								<div class="5u">
								<input class="" id="lname" type="text"  name="lname"  placeholder="Last Name">
								</div>
								<div class="u"></div>
								</div>
								<div class="row">
								<div class="u"></div>
								<div class="10u">
								<select size="1" id="gender" name="gender" required>
								<option value="" style="display:none">Gender</option>
								<option>Male</option>
								<option>Female</option>




								</select>
								</div>

								<div class="u"></div>
								</div>

								<div class="row">
								<div class="u"></div>
								<div class="10u">
								<input class="" id="phone" type="text"  name="phone"  required  maxlength="14" placeholder="Phone Number">
								</div>

								<div class="u"></div>
								</div>
								<div class="row">
								<div class="u"></div>
								<div class="10u">
								<select size="1" id="state" name="state" required>
								<option value="" style="display:none">Select State</option>
								<option>Andaman and Nicobar Islands</option>
								<option>Andhra Pradesh</option>
								<option>Arunachal Pradesh</option>
								<option>Assam</option>
								<option>Bihar</option>
								<option>Chandigarh</option>
								<option>Chhattisgarh</option>
								<option>Dadra and Nagar Haveli</option>
								<option>Daman and Diu </option>
								<option>Delhi </option>
								<option>Goa</option>
								<option>Gujarat</option>
								<option>Haryana</option>
								<option>Himachal Pradesh</option>
								<option>Jammu and Kashmir</option>
								<option>Jharkhand</option>
								<option>Karnataka</option>
								<option>Kerala</option>
								<option>Lakshadweep</option>
								<option>Madhya Pradesh</option>
								<option>Maharashtra</option>
								<option>Manipur</option>
								<option>Meghalaya</option>
								<option>Mizoram</option>
								<option>Nagaland</option>
								<option>Odisha</option>
								<option>Puducherry </option>
								<option>Punjab</option>
								<option>Rajasthan</option>
								<option>Sikkim</option>
								<option>Tamil Nadu</option>
								<option>Tripura</option>
								<option>Uttar Pradesh</option>
								<option>Uttarakhand</option>
								<option>West Bengal</option>
								</select>
								</div>

								<div class="u"></div>
								</div>

								<div class="row">
								<div class="u"></div>
								<div class="10u">
								<input class="" id="city" type="text"  name="city"  required placeholder="City">
								</div>

								<div class="u"></div>
								</div>';


								
								if($men==1)
								{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="abt"  required placeholder="About You: 
Sample Data: 
Currently pursuing B.E at Netaji Subhas Institute Of Technology (NSIT) - Delhi in Computer Science (2014-2018). Loves Sketching, Singing and Helping others to grow."></textarea>
								</div>

								<div class="u"></div>
								</div>';
							}

							else
							{
									echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="abt"  required placeholder="About You: 
Sample Data: 
Priya, a counsellor by profession, is also a life skill trainer, parenting coach, motivational speaker and a family therapist, working for the past 13 years in the field of psychology and counselling. She is registered with the Rehabilitation Council Of India ( RCI ) and is actively associated with Expressions India(School life skills health and wellness program). She is also a founding member of All India Association Of School Counsellors and Allied Professionals (AISCAP) and is also on the panel of CBSE helpline counselors. She treasures her love for life and strives hard to preserve the liveliness of others. "></textarea>

								</div>

								<div class="u"></div>
								</div>';

							}

							if($men==1)
							{


								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="edu"  required placeholder="Qualification or Branch of study:
Sample Data:
B.Tech Computer Science

"></textarea>

								</div>

								<div class="u"></div>
								</div>';
							}
							else
							{
									echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="edu"  required placeholder="Qualification or Branch of study:
Sample Data:
• Post Graduate diploma in Guidance and Counselling from NCERT, New Delhi with distinction in Counselling.
• Masters in Education and Psychology
"></textarea>

								</div>

								<div class="u"></div>
								</div>';
							}

							if($men==1)
							{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="clg"  required placeholder="Experience:
Sample Data:
Placed at Google as Software Engineer.
Interned at CodeNation(2015-2016).
Interned at Qualcomm(2015).
"></textarea>
								</div>
								<div class="u"></div>
								</div>';
							}
							else
							{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="clg"  required placeholder="Experience:
Sample Data:
For Counsellors: 18 years of experience in the field of psychology and counselling.
"></textarea>
								</div>
								<div class="u"></div>
								</div>';
							}

								

							if($men==1)
							{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<select size="1" id="exp_num" name="exp_num" required>
								<option value="" style="display:none">Year of study(1st, 2nd, 3rd, 4th, Alumni)</option>';
								for($i=1;$i<=4;$i++)
								{

									echo '<option>'.$i.'</option>';
								}
								echo '<option value="5">Alumni</option>';
								echo '</select>

								</div>

								<div class="u"></div>
								</div>';
							}
							else
							{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<select size="1" id="exp_num" name="exp_num" required>
								<option value="" style="display:none">Years of Experience </option>';
								for($i=1;$i<=50;$i++)
								{

									echo '<option>'.$i.'</option>';
								}

								echo '</select>

								</div>

								<div class="u"></div>
								</div>';

							}

								if($men==1)
								{

								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="skills" type="text"  name="skills" placeholder="Please enter your skills and things you can advise on, in comma separated manner, ex: Performance Growth, Decision Making, Placement advise, Internship advise, Programming advise, HTML, CSS, Data structures." required></textarea>

								</div>

								<div class="u"></div>
								</div>';
							}
							else
							{
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="skills" type="text"  name="skills" placeholder="Please enter your skills and things you can advise on, in comma separated manner, ex:  Career Counselling, Decision Making." required></textarea>

								</div>

								<div class="u"></div>
								</div>';

							}
								if($men==0)
								{



								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" id="clg" type="text"  name="pro" placeholder="Past Achivements(Optional)"></textarea>

								</div>

								<div class="u"></div>
								</div>';

								


								



								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" rows="1"  id="addr" type="text"  name="addr"  required placeholder="Residential Address"></textarea>
								</div>
								<div class="u"></div>
								</div>';

							
								echo '<div class="row">
								<div class="u"></div>
								<div class="10u">
								<textarea class="" rows="1"  id="addr" type="text"  name="o_addr" placeholder="Office Address (Optional)"></textarea>
								</div>
								<div class="u"></div>
								</div>';
								}



								echo '<div class="row">
								<div class="u"></div>
								<div class="5u">
								<input class="" id="pin" type="text"  name="pin"  required pattern="[0-9]{6}" maxlength="6" placeholder="Pin Code">
								</div>
								<div class="5u">
								<input class="" id="age" type="text"  name="age"  required pattern="[0-9]{2}" maxlength="2"placeholder="Age">
								</div>

								<div class="u"></div>
								</div>


								</br>
								<button class="button " id="apply" type="submit" name="apply" ><span class="fa fa-check"></span>Apply</button>
								</form></center>






							</section>';
						}






							?>







							<?php

							if(isset($_POST['apply']))
							{
								$fname=ucfirst(filter(preg_replace('/\s+/','',$_POST['fname'])));
								$lname=ucfirst(filter($_POST['lname']));
								$gender=$_POST['gender'];
								
								$abt=filter($_POST['abt']);


								  $phone=filter($_POST['phone']);
							  $state=filter($_POST['state']);
							   $skills=filter($_POST['skills']);
							    $exp_num=filter($_POST['exp_num']);
							   $city=filter($_POST['city']);
								$edu=filter($_POST['edu']);
								$clg=filter($_POST['clg']);
								$pro=filter($_POST['pro']);
							   $addr=filter($_POST['addr']);
							   $o_addr=filter($_POST['o_addr']);
								$pin=filter($_POST['pin']);
								$age=filter($_POST['age']);
								

								$rand=random_string(3);
								$sub=$fname.$rand;

//echo $fname,$lname,$phone,$state,$city,$edu,$pro,$addr,$pin,$age;
								$re=query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");
								$rowz=mysqli_num_rows($re);
								if($rowz==0)
								{
									$result=query("INSERT INTO c_userdata(men,fname,lname,emailid,gender,phone,state,city,abt,edu,clg,exp_num,skills,pro,addr,o_addr,pin,age,verifyf,timestamp,sub_id,ip) values('$men','$fname','$lname','$session_emailid','$gender' ,'$phone','$state','$city','$abt','$edu','$clg','$exp_num','$skills','$pro','$addr','$o_addr','$pin','$age','3','$time','$sub','$ip')");
								}
								else
								{
									echo "Already applied, please wait for the confirmation.";
	//echo 'you have already applied';
								}
//query("UPDATE c_userdata SET verifyf='0' WHERE emailid='$session_emailid'");


								redirect("profile");
							}



							?>






							<?php if(!isset($_POST['ch'])&&!isset($_POST['change'])&&$rowf['verifyf']=="1")
							{

								echo '<section id="wallet" class="three">


								<div class="container">

								<header>
								<h1>Your Details</h1>
								</header>
								<div id="edit" class="row">

								<div class="12u">';

									if($rowf['propic_file']=="")
					{
						echo '<img src="uploader/userpic.gif"/>';
					}
					else
					{
						echo '<img class="img-rounded"style="height: 200px;width:200px;"src="/cp/m_img/'.$rowf['propic_file'].'.png"/>';

					}



					echo '<center><br>
					<button onclick="upload(\'pro\')" class="fpbtn" >Upload</button>
					<br>
					</center><section >


					<form role="form" method="post" action="" ><table>
<hr size=3 color="black" >

<tr><th> Email ID:</th><td><strong> '.$rowf['emailid'].'  </strong></td></tr>
<tr><th>Name: </th><td><strong> '.$rowf['fname'].'  '.$rowf['lname'].'</strong></td></tr>
<tr><th>Phone:</th><td> <input type="number" name="phone" value="'.$rowf['phone'].'" size="20" maxlength="13">   </td></tr>
<tr><th>State:</th><td><select size="1" id="state" name="state"  >
								<option value="'.$rowf['state'].'">'.$rowf['state'].'</option>
								<option>Andaman and Nicobar Islands</option>
								<option>Andhra Pradesh</option>
								<option>Arunachal Pradesh</option>
								<option>Assam</option>
								<option>Bihar</option>
								<option>Chandigarh</option>
								<option>Chhattisgarh</option>
								<option>Dadra and Nagar Haveli</option>
								<option>Daman and Diu </option>
								<option>Delhi </option>
								<option>Goa</option>
								<option>Gujarat</option>
								<option>Haryana</option>
								<option>Himachal Pradesh</option>
								<option>Jammu and Kashmir</option>
								<option>Jharkhand</option>
								<option>Karnataka</option>
								<option>Kerala</option>
								<option>Lakshadweep</option>
								<option>Madhya Pradesh</option>
								<option>Maharashtra</option>
								<option>Manipur</option>
								<option>Meghalaya</option>
								<option>Mizoram</option>
								<option>Nagaland</option>
								<option>Odisha</option>
								<option>Puducherry </option>
								<option>Punjab</option>
								<option>Rajasthan</option>
								<option>Sikkim</option>
								<option>Tamil Nadu</option>
								<option>Tripura</option>
								<option>Uttar Pradesh</option>
								<option>Uttarakhand</option>
								<option>West Bengal</option>
								</select>
								</div></td></tr>
<tr><th>City:</th><td> <input class="" id="city" type="text"  name="city" value="'.$rowf['city'].'"  placeholder="City">   </td></tr>




<tr><th>About You:</th><td> <textarea class="" id="abt" type="text"  name="abt" value=""  placeholder="About You">'.$rowf['abt'].' </textarea> </td></tr>
<tr><th>You Can Advise on:</th><td> <textarea class="" id="abt" type="text"  name="skills" value=""  placeholder="About You">'.$rowf['skills'].' </textarea> </td></tr>


<tr><th>Education:</th><td> <textarea class="" id="clg" type="text"  name="edu" value=""  placeholder="Qualification">'.$rowf['edu'].' </textarea> </td></tr>

<tr><th>Experience:</th><td> <textarea class="" id="clg" type="text"  name="clg" value="'.$rowf['clg'].'"  placeholder="Experience">'.$rowf['clg'].'</textarea>  </td></tr>

<tr><th>Past Achivements:</th><td> <textarea class="" id="clg" type="text"  name="pro" value="'.$rowf['pro'].'" placeholder="Past Achivements(Optional)">'.$rowf['pro'].'</textarea>   </td></tr>

<tr><th>Residential Address:</th><td> <textarea class="" rows="1"  id="addr" type="text"  name="addr"   placeholder="Residential Address">'.$rowf['addr'].'</textarea>   </td></tr>

<tr><th>Office Address:</th><td> <textarea class="" rows="1"  id="addr" type="text"  name="o_addr"  placeholder="Office Address (Optional)">'.$rowf['o_addr'].'</textarea>   </td></tr>

<tr><th>Pin Code:</th><td> <input class="" id="pin" type="text"  name="pin"  value="'.$rowf['pin'].'" pattern="[0-9]{6}" maxlength="6" placeholder="Pin Code">   </td></tr>


<tr><th>Age:</th><td> <input class="" id="age" type="text"  name="age" value="'.$rowf['age'].'"  pattern="[0-9]{2}" maxlength="2"placeholder="Age">  </td></tr>

                    <tr><th>Facebook:</th><td><input class="" id="clg" type="text"  value="'.$rowf['fbl'].'" name="fbl"  placeholder="Paste Link here"></td></tr>
					<tr><th>Linked In:</th><td><input class="" id="clg" type="text" value="'.$rowf['lnk'].'" name="lnk"  placeholder="Paste Link here"></td></tr>
					<tr><th>Twitter:</th><td><input class="" id="clg" type="text"  name="twl"  value="'.$rowf['twl'].'" placeholder="Paste Link here"></td></tr>
					<tr><th>Website URL:</th><td><input class="" id="clg" type="text"  name="wbl" value="'.$rowf['wbl'].'" placeholder="Paste Link here"></td><br></tr>
</table>

<input type="submit" value="Update" name="updateo"></td>
</form></section>';




							if(isset($_POST['updateo']))
							{
								//$fname=preg_replace('/\s+/','',$_POST['fname']);
								//$lname=$_POST['lname'];
								//$gender=$_POST['gender'];
								$abt=filter($_POST['abt']);
								$skills=filter($_POST['skills']);
							  $phone=filter($_POST['phone']);
							  $state=filter($_POST['state']);
							   $city=filter($_POST['city']);
								$edu=filter($_POST['edu']);
								$clg=filter($_POST['clg']);
								$pro=filter($_POST['pro']);
							   $addr=filter($_POST['addr']);
							   $o_addr=filter($_POST['o_addr']);
								$pin=filter($_POST['pin']);
								$age=filter($_POST['age']);
								$fbl=filter($_POST["fbl"]);
								$lnk=filter($_POST["lnk"]);
								$twl=filter($_POST["twl"]);
								$wbl=filter($_POST["wbl"]);


								$rand=random_string(3);
								$sub=$fname.$rand;

//echo $fname,$lname,$phone,$state,$city,$edu,$pro,$addr,$pin,$age;
								$re=query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");
								$rowz=mysqli_num_rows($re);
								if($rowz==1)
								{
									query("UPDATE c_userdata SET phone='$phone',state='$state',abt='$abt',city='$city',edu='$edu',clg='$clg',pro='$pro',addr='$addr',skills='$skills',o_addr='$o_addr',pin='$pin',age='$age',fbl='$fbl',lnk='$lnk',twl='$twl',wbl='$wbl' WHERE emailid='$session_emailid';");

								}
								else
								{
	//echo 'you have already applied';
								}
//query("UPDATE c_userdata SET verifyf='0' WHERE emailid='$session_emailid'");


								redirect("profile");
							}

if(isset($_POST['up']))
					{

						define("UPLOAD_DIR", "uploads/");

						if (!empty($_FILES["myFile"])) 
						{
							$fk=$rowf['propic'];
							//delete("uploads/$fk");
							$myFile = $_FILES["myFile"];

							unlink('uploads/'.$fk);

							$name =  $myFile["name"];

							$f=0;

							$fileSize = $_FILES['myFile']['size'];
							if($fileSize<1250000)
							{
								$f=1;
							}


							$fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
							$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
							if (in_array($fileType, $allowed)&&$f) 
							{

								$i = 0;
								$parts = pathinfo($name);
								$rand=random_string(7);
								$name=$rand.".".$parts["extension"];



								while (file_exists(UPLOAD_DIR . $name))
								{
									$i++;
									$name = $rand . $i . "." . $parts["extension"];
								}
		//echo $parts["extension"];

    // preserve file from temporary directory


								$success = move_uploaded_file($myFile["tmp_name"],
									UPLOAD_DIR . $name);
								if($success)
								{
									query("UPDATE c_userdata SET propic='$name' WHERE emailid='$session_emailid';");
									redirect("profile");
								}
								if (!$success)
								{ 
									echo "<h1 style='color: red;'>Unable to save file.</h1>";
									exit;
								}

							}
							else
							{
								if($f=='0')
									echo '<h1 style="color: red;">Image size must be less than 1MB</h1>';

								else

									echo '<h1 style="color: red;">Invalid Extension, Upload Image file only</h1>';
							}

		//$t=UPLOAD_DIR.$name;
//echo $path = rtrim(dirname($t), "/\\");
		//echo realpath($t);
    // set proper permissions on the new file
		//chmod(UPLOAD_DIR . $name, 0644);
						}


					}
						//echo 'Name:'.$rowf['fname'].'  '.$rowf['lname'] ;



								
							}







								if(!isset($_POST['ch'])&&!isset($_POST['change'])&&$rowf['verifyf']=='0')
								{
									echo '<section id="status" class="three">
									

									

									

									<h1>All the hardwork has been done.<br> Sit Back And Relax, we will notify you.</h1>
								

									</section>';
								}
								else if(!isset($_POST['ch'])&&!isset($_POST['change'])&&$rowf['verifyf']=='-1')
								{
									echo '<section id="status" class="three">

									<div class="container">

									<header>
									<h1>Status</h1>
									</header>

									<h2>Your application has been rejected, contact us for more info.</h2>
									</section>';
								}
							
									if(isset($_POST['ch'])&&!isset($_POST['change'])){

											echo '<STYLE TYPE="text/css">
										#mainx > section.backimg
												{
												
													background-image: url("images/banner.jpg");
												}

									</STYLE>';

										echo '<section id="change" class="three">
										<div class="container">

									
										<h1>Change Password</h1><p></p>
								
										<form method="post" action="">
										<div class="row">
										<div class="3u"></div>
										<div class="6u">
										<input class="" id="password" type="password" name="cur_password" placeholder="Current Password" required></br>
										<input class="" id="password2" type="password" name="password" placeholder="New Password" required></br>
										<input class="" id="cpassword2" type="password" name="cpassword" placeholder="Confirm New Password" required></br>


										</div>
										<div class="3u"></div>


										</div>
										<button class="button" type="submit" id="change" name="change" >Change</button>
										</form>';}





										if(isset($_POST['change']))
										{	

											$flag=0;

											$cur=(strip_tags($_POST['cur_password']));
											$password= (strip_tags($_POST['password']));

											$cpassword= (strip_tags($_POST['cpassword']));

											$result=query("SELECT * FROM c_users WHERE emailid='$session_emailid'"); 
											$rowx=mysqli_fetch_array($result);

											if(mysqli_num_rows($result)==1)


											{

												if($cur!=$rowx['password'])
												{
													$flag=1;
													echo '<br><br><h1 style="text-align:center;">Incorrect Current Password <form method="post" action=""><button  class="button" type="submit" name="ch" >Try Again!</button></form></h1><br><br>';
													exit();
												}


												if($password!=$cpassword)
												{

							//echo 0;

													$flag=1;
													echo '<br><br><h1 style="text-align:center;">Password did not match <form method="post" action=""><button  class="button" type="submit" name="ch" >Try Again!</button></form></h1><br><br>';

												}
												else if($flag==0)
												{

													$result=query("UPDATE c_users SET password='$cpassword' WHERE emailid='$session_emailid';");


													echo '<br><br><br><h1 style="text-align:center;">Password Successfully Updated. <br> <a class="button" href="profile"> Click Here!</a></h1><br><br><br>';
							//echo 1;
												}

												else
												{
													echo '<h1 style="text-align:center;">Some Problem Occured.</a>.</h1>';
												}


											}
											else
												echo 3;
										}?>
									</div>
								</section>


							</div>

							<!-- Footer -->
							<?php include("templates/footer.php") ?>



						</div>
					</section>





					<script src="js/custom.js"></script>

					<script type="text/javascript">



  function upload(tc)
  {
  filepicker.setKey("A6SCbpeqSlGu5YBUcAv8Oz");

filepicker.pick(
 {
    mimetype: 'image/*',
    imageQuality: 70,
    crop_first:true,
      cache:true,
      size:300,
   
    services: ['URL','CONVERT','COMPUTER', 'FACEBOOK', 'CLOUDAPP','WEBCAM','GMAIL',['INSTAGRAM']]
  },
  function(Blob){
   var url= Blob.url;


    if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
    {

        
       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      var hr=window.location.href;
      window.location='profile';
      // window.location='profile#pro';

    }
  }
 
 
  xmlhttp.open("POST","ajax/upload.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("url="+url+"&"+tc+"=superAlgo");


   
  },
  function(FPError){
    console.log(FPError.toString());
  }
);




}



</script>