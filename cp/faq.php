<!DOCTYPE HTML>

<?php 

include("../includes/config.php");

if(isset($_SESSION['c_id']))

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
		<title>Ecounsellors - FAQs answering your doubts</title>
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


			
<style type="text/css">


.panel-default>.panel-heading{


  background-color: rgb(92, 184, 92);
  color: white;
   min-height: 50;
  
  text-align: center;
}

.panel-title{

  font-size: x-large;
  line-height: inherit;

}


  .panel-group:h4 > a {
  position: relative;
  color: #00bef2;
  text-decoration: none;
}

h4 > a:hover {
  color: #2a6496;
  text-decoration: none;
}

h4 > a:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
.panel-body
{
  background-color: #fff;
      padding: 10px;
}
.panel-title{
  color: #00bef2;
}
.panel-default>.panel-heading {

        background-color: rgb(246, 246, 246);

  }
   .img-responsive{
    width: 1200px;
   }
   .lnk{

    color: #00bef2;
   }
</style>

		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>


				<script type="text/javascript">

	


</script>

		<?php include("includes/header.php");?>

		<!-- mainx -->
			<div id="mainx">
				
				<!-- Intro -->
					<section class="two">
     
<div class="">

          <div class="row">
            <div class="col-md-12 thumbnail">

<div id="block" style="">
  <div class="" style="    background-color: #fff;
    font-size: 35px;
    text-align: center;
    color: #00bef2;
    margin-right: 38px;
    font-weight: 900;
    padding-top: 10px;">
    FAQs
  </div>
       


     <div class="panel-group" id="accordionx"><!-- outer panerl-grp -->
  <div class="panel panel-default" >
    <div class="panel-heading" >
      <h4 class="panel-title" >
        <a data-toggle="collapse" data-parent="#accordionx" href="#collapseOnexyz">
       <h1 style="text-align:center;color:#00bef2;">General<i class="indicator fa fa-angle-down  pull-right"></i></h1>
       </a>
      </h4>
    </div>
    <div id="collapseOnexyz" class="panel-collapse collapse ">
      <div class="panel-body"><!--panel body 2  -->

 <div class="panel-group" id="accordionxy">
       <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwo" style="">
       What is ecounsellors?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse ">
      <div class="panel-body"style="">
       
Ecounsellors is a go to online portal which bridges the gap between the user and the day to day or long term services that he needs some of which are finance and law services, dieticians/nutritionist, IT experts, clinical psychologists, counsellors, personality development and many more,  to people all over the world from experts through video and phone conference.   

 </div>
  </div>
</div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseThree" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      Signing up to our portal is very easy. After opening <a class="lnk" href="http://c.ecounsellors.in">c.ecounsellors.in</a> click on the sign up button and fill in the required details and then just sit back and relax so that we may verify you and approve your request.
        
      </div>
    </div>
  </div>


     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFour1" style="">
        What all do you need while signing up?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFour1" class="panel-collapse collapse ">
      <div class="panel-body"style="">
       All you need is a profile photo, a scanned copy/clear photo of your PAN card and a scanned copy/clear photo of your highest degree in order to verify yourselves.
      </div>
    </div>
  </div>


     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFour2" style="">
        How will I know if I have been approved or not?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFour2" class="panel-collapse collapse ">
      <div class="panel-body"style="">
       We will be notifying you through a phone call/SMS as well as through an email.
      </div>
    </div>
  </div>

   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFour" style="">
        Why do I need to verify myself?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        You need to verify yourself so that your clients get the best of the services you offer.
      </div>
    </div>
  </div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFive" style="">
     What are the details that will be shared with the user?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse ">
      <div class="panel-body"style="">
     Your name, your expertise, your qualifications, your experience and some other basic details will be shared with the client. Phone Number and email id won't be shared with Client.<br>
    <h4><strong>NOTE: Contacting client by any means, other than ecounsellor's portal without our prior acknowledgement will be a violation of our terms, strict actions will be taken including account deactivation.</strong> </h4>
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseSix"style="">
      What portal we will be using to conduct video sessions?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      We will be using our very own video portal for this purpose and not any third party software/website for it. This is to insure the privacy of the client.
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseSeven" style="">
     Will ecounsellors save the record of any session?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      We strictly respect the privacy of both the expert and the client and understand what goes between the two stays between the two.
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseEight" style="">
        What is Boost Business?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      As the name suggests this is a feature which will help you in boosting up your business by offering demo sessions. This will not only help you earn more in a long run but will also help you in getting good user ratings.
      </div>
    </div>
  </div>
 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseNine" style="">
        How do I get listed among the top experts on your website?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseNine" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      To get listed among the top experts you need to get good user ratings and hence it is your clients who decide it. We recommend you to offer demo sessions because it will help you get more ratings and hence a better listing.
      </div>
    </div>
  </div>

   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseEleven" style="">
        What is the discount system?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseEleven" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      Discount system allows you to increase or decrease the  discount/session that you want to offer to the client.
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwelve" style="">
        Is it compulsory to offer demo sessions?
        <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwelve" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      No, it is not compulsory to offer demo sessions but it is recommended to offer these to win the confidence of the people prior to a paid session.
      </div>
    </div>
  </div>






 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseThirteen" style="">
      How will I know if I have an appointment?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseThirteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
      We'll intimate you by sending SMS and an email as well regarding the booking of an appointment. Also you can your check your appointments in the appointment section on your counsellor panel.
        
      </div>
    </div>
  </div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFourteen" style="">
   Some of the panel's buttons/tabs are not working. why?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFourteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">

        You need to get verified first, inorder to get everything working.
        
    </div>
  </div>
</div>

<!--

   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseFifteen" style="">
      What if there is a network problem in the connection and the session terminates?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseFifteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
We will look into the matter and then only refund the money back. It is mandatory to use a good internet connection (atleast 1 Mbps).      </div>
    </div>
  </div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseSixteen" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseSixteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>




   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseSeventeen" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseSeventeen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>




   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseEighteen" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseEighteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>




   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseNineteen" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseNineteen" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>




   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwenty" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwenty" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>




   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentyone" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentyone" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>



   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentytwo" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentytwo" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>



   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentythree" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentythree" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>



   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentyfour" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentyfour" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>



   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentyfive" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentyfive" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>


   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy" href="#collapseTwentysix" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>-->

</div><!-- panel body 2-->




  </div>

  </div> 
</div>




  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="paneel-title">
        <a data-toggle="collapse" data-parent="#accordionx" href="#collapseTwentyseven">
          <h1 style="text-align:center;color:#00bef2">Payment Related<i class="indicator fa fa-angle-down  pull-right"></i></h1>
        </a>
      </h4>
    </div>
    <div id="collapseTwentyseven" class="panel-collapse collapse">
      <div class="panel-body">
 <div class="panel-group" id="accordionxy1">
         <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix1" style="">
       What are Total Earnings?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix1" class="panel-collapse collapse ">
      <div class="panel-body"style="">
         Total Earnings is the total money that you have received till date.
        
      </div>
    </div>
  </div>

   

      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix2" style="">
        What is Amount received?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix2" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
"Amount Received" is the money collected before the appointment and which is not transferred to the bank yet.  
    </div>
    </div>
  </div>


     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix3" style="">
       What is Amount Confirmed?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix3" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
"Amount Confirmed" is the amount of money that is confirmed after a successful appointment.
      </div>
    </div>
  </div>


      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix4" style="">
What is Amount on Hold ?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix4" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
Amount on Hold is the amount of money which will be put on hold in case of any disputes or reports registered until they are sorted out.
      </div>
    </div>
  </div>


     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix5" style="">
      What is Amount Available For Bank Transfer?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix5" class="panel-collapse collapse ">
      <div class="panel-body"style="">

Amount available for bank transfer is the money that is ready to be transferred to the bank which will be transferred 7-10 days after the successful appointment, conditioned that no claim is raised.        
      </div>
    </div>
  </div>

    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix6" style="">
      What is Amount Transferred to Bank?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix6" class="panel-collapse collapse ">
      <div class="panel-body"style="">

Amount Transferred to bank is the amount of money that has been successfully transferred into your bank account.        
      </div>
    </div>
  </div>


     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy1" href="#collapseTwentysix7" style="">
        What is the minimum amount that can be transferred to bank?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix7" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
      Minimum amount in "Amount available for bank transfer" should be atleast &nbsp;<span class="fa fa-inr"> 1000</span>"
      </div>
    </div>
  </div>

</div>

  </div> <!-- panel group payment -->
</div>
</div>





  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="paneel-title">
        <a data-toggle="collapse" data-parent="#accordionx" href="#collapseThirtyfive">
          <h1 style="text-align:center;color:#00bef2">Got Any Issues?
          <i class="indicator fa fa-angle-down  pull-right"></i></h1>
        </a>
      </h4>
    </div>
    <div id="collapseThirtyfive" class="panel-collapse collapse">
      <div class="panel-body">
 <div class="panel-group" id="accordionxy2">
         <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy2" href="#collapseTwentysix11" style="">
What if I don't get the credit after a successful appointment?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix11" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
 You can report the issue at support@ecounsellors.in and we will surely get your credit back.
       </div>
    </div>
  </div>

     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy2" href="#collapseTwentysix12" style="">
       What if the client does not turn up, will I get my money?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix12" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
Contact number of client will be shared with you please coordinate with him/her, in case client is not available on phone wait for 20 minutes. If he still does not show up you can end the session and you will be getting full credit for the session.      </div>
    </div>
  </div>

     <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy2" href="#collapseTwentysix13" style="">
         What if there is a network problem in the connection and the session terminates?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix13" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        We will look into the matter and then only refund the money back. It is mandatory to use a good internet connection (atleast 1 Mbps).
      </div>
    </div>
  </div>

   <!--  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy2" href="#collapseTwentysix14" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix14" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

      <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordionxy2" href="#collapseTwentysix15" style="">
         How do I sign up for the portal?
                  <i class="indicator fa fa-angle-down  pull-right"></i></a>
      </h4>
    </div>
    <div id="collapseTwentysix15" class="panel-collapse collapse ">
      <div class="panel-body"style="">
        
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>-->
   
   </div>
  </div> <!-- panel group -->
</div><!-- outer panerl-grp -->


</div>
</div>



</div>





		















						</div>
           
					</div>
					</div>
						  <style type="text/css">

            .my-btn{
              color: #00bef2;
              background-color: #fff;
              border-radius: 20px;

            }
            .my-btn:hover{
               color: #fff;
              background-color: #00bef2;
            }
          </style>
             
            

  <!-- Contact -->
  <div class="container">
  <div class="">
              <div class="col-md-2"></div>
              <div class="col-md-8"><a href="/cp/index#contact" class="btn btn-lg my-btn btn-info btn-block">Didn't get your answer? Ask Now!</a>
                </div>
              <div class="col-md-2"></div>
            </div>

</div>
					</section>


			</div><br><br><p></p><p></p><p></p><p></p>
	

		<!-- Footer -->
							<?php include_once("templates/footer.php");  ?>


	</body>
</html>



<script src="js/custom.js"></script>

