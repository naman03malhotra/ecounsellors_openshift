<?php

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />

<?php

include("includes/header.php");
 if(!isset($_SESSION['u_id']))
  {
     $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
     $_SESSION['cur']=$cur;
      redirect("/?lo");
  }
?>
<link rel="stylesheet" href="share/css/rrssb.css" />

<script type="text/javascript">
 

</script>

<style type="text/css">
  
.panel-body {
  padding: 10px !important;
}




</style>

<body style="background:#fafafa;">


 <?php


  include("includes/nav.php");
  if($agent==1)
  include("includes/feed.php");
 if(!$_SESSION['u_id'])
{
  redirect('index?lo');
}



?>



<script type="text/javascript">
  




function ref()
{

 var keyPressed = event.keyCode || event.which;
 if(keyPressed==13 || keyPressed==1)
 {

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

        
        
          document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";

       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      if(xmlhttp.responseText==2)
      {
        document.getElementById("loadbar_f").style.display="none";
        document.getElementById("quiz_f").style.display="inline";
             document.getElementById('result').innerHTML="<p class='ref bg-primary'>We like smart users referring themselves, but it doesn\'t work that way</p>"

      }
      else if(xmlhttp.responseText==3)
      {
         document.getElementById("loadbar_f").style.display="none";
        document.getElementById("quiz_f").style.display="inline";
               document.getElementById('result').innerHTML="<p class='ref bg-primary'>INVALID CODE</p>"

      }
      else if(xmlhttp.responseText==4)
      {

         document.getElementById("loadbar_f").style.display="none";
        document.getElementById("quiz_f").style.display="inline";
        document.getElementById('result').innerHTML="<p class='ref bg-primary'>You Have Already Earned Through Referral</p>"

      }
      else if(xmlhttp.responseText==5)
      {

         document.getElementById("loadbar_f").style.display="none";
        document.getElementById("quiz_f").style.display="inline";
        document.getElementById('result').innerHTML="<p class='ref bg-primary'>Sorry! your request can't be processed as this account was created after yours. </p>"

      }



      else
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;

    }
  }
 var ref= document.getElementById('ref');

 if(ref.value!='')
 {
  xmlhttp.open("POST","ajax/ref.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("ref="+ref.value);
 }
 else
 {
  ref.focus();
   document.getElementById('result').innerHTML="<p class='ref bg-primary'>Please Enter Referral Code.</p>"
 }


}

}










function confirm(ref)
{



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

        
        
          document.getElementById("loadbar_f").style.display="inline";
        document.getElementById("quiz_f").style.display="none";

       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;

    }
  }
 
 
  xmlhttp.open("POST","ajax/ref.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("conf="+ref);
 }

</script>

<style type="text/css">
  
  .fromx {
  display:inline;
  width: auto;
}
.btn:focus{
  outline: 0px auto -webkit-focus-ring-color !important;
    outline-offset: 0px !important;

}
</style>
    
             <style>
            .btn-new{
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.18);
        border:none;
        background-color:#25b1cb !important;
        color:white !important;
        transition:all;
        border-radius:0px;
        transition-duration:350ms;
        
    }
    .btn-new:hover{
        border:none;
        
        background-color:#209da5 !important; 
    }
                  .newthumbnail
            {
                border:none;
                box-shadow:none;
                border-radius:0px;
                box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.13);
              
                background-color:white;
            }
                 .list-group-item{
                    width:100%;
                    border:none;
                    border-radius:0px;
                      background:#f5f5f5;
                     transition:all;
                     transition-duration:0.35s;
                     border-bottom:1px solid #dddddd;
                     border-top:1px solid #dddddd;
                     
                 }
                    .list-group-item:hover{
                
                          background-color:#ffffff !important;
                        color:#363636 !important;
                 }
                 .thumbnail{
                    padding:0px;
                 }
                           .hr1 {
    max-width: 50px;
    border-color: #1fa1b9;
    border-width: 3px;
}
.hrw{
max-width: 50px;
    border-color: #ffffff;
    border-width: 3px;
}
    
        </style>
<div class="gap" style="margin-bottom: 70px;"></div>



<div class="container">
  <div class="row thumbnail newthumbnail">
   <div class="col-md-3 hidden-xs hidden-sm "    <?php if($agent==1){ echo ' style="max-height:100%;min-height:420px;border-right:1px solid #dddddd;background-color:#f7f7f7;padding:0px"';} ?>  >


        <div class="row"  style="width:100%;margin:0px;padding:none;">  
            <div class="col-md-4" style="padding:none;">
              <?php
        if($rowf['propic']=="")
          {
            if($rowu['status']=="f" or $rowu['status']=="g")
            echo '<img class="img-circle img-responsive" width="150px" style="border:4px solid #ebebeb" src="/u_img/'.$rowu['url_file'].'.png"/>';
                else
            echo '<img class="img-circle"width="150px" style="border:4px solid #ebebeb" src="uploader/userpic.gif"/>';
          }
          else
          {
            echo '<img class="img-circle img-responsive"  style="height: 150px;width:150px; border:4px solid  #ebebeb"src="'.$rowf['propic'].'"/>';

          }

          ?>
            </div>
        <div class="col-md-8" style="text-align:center"  >
            
          <h4 style="text-transform: capitalize;"><a href="#" style="text-decoration:none;font-size:20px;color:#222"><?php echo $rowu['name']; ?></a>
          </h4>
            <hr class="hr1">
        
    </div>
 </div>

         <div class="list-group" style="
    text-align:left;
">
              <a href="profile" class="list-group-item disabled"><span class="fa fa-pencil" style="float:left;margin-right:5px"> </span> My Account</a> 
        <a href="appointments" class="list-group-item "><span class="fa fa-pencil" style="float:left;margin-right:5px" > </span> My Appointments</a>
<?php
        echo '<a href="#" class="list-group-item"><span style="margin-right:5px;float:left" class="fa fa-inr" ></span>E-bucks: '.$rowu['ebucks'].'</a>
        <!-- <a href="#" class="list-group-item"><span style="margin-right:5px;color: #5cb85c;" class="fa fa-check" ></span>Credits: '.$rowu['credits'].'</a>-->';
       ?>
                  
      </div>

     </div>

     <div class="col-md-9 col-sm-9" style="float: right; <?php if ($agent==0){echo "width:100%;";}  ?> ">
  <div class="row" style="padding:20px 10px 0px 10px;text-align:center">
        <span  style="color: #383838;text-align:center;<?php if($agent==1) { echo 'font-size: 20pt;';}?>">My Account</span>
    <hr class="hr1">
    </div>
              
      <div class="row text-center" style="padding:20px 10px 10px 10px">
            
      
            <p>
               <strong>Email</strong> 
                <input readonly class="fromx loginx form-control ref form-new" value="<?php  echo $rowu['emailid'];  ?>"
            </p>
          <form role="form" action="" method="post" class="form-group"> 
              
              <strong>Phone</strong> 
              <input class="fromx loginx form-control ref form-new" type="text" name="ph" placeholder="+91" value="<?php echo ($rowu['phone']!='')? $rowu['phone']: '+91';  ?>"/>
              <br><br>
              <button type="submit" style="margin-left: 48px;" class="btn btn-info btn-new"  name="phx">Update</button>
          </form>
           
            <?php if($rowu['status']!="f" or $rowu['status']!="g")
           echo '<!-- <p> <a href="" class="btn btn-info ti" data-toggle="modal" data-target=".xt">Change Password</a></p>-->';
           ?>
         <!--  <button class="btn btn-success ref" data-toggle="modal" data-target=".xref" style="margin-left: 57px;">Refer And Earn Free Session</button><br><br>-->

           <?php 

if(time()-$rowu['timestamp']<10800)

{
?>

            <!-- <button style="margin-left: 63px;" class="btn btn-info" data-toggle="modal" data-target=".xr"> Do You Have Any Referral Code?</button>-->
<?php }?>
           
    
<?php


if(isset($_POST['phx']))
{
  $phone=$_POST['ph'];
  query("UPDATE u_users set phone='$phone' where u_id='$uid'");
  redirect("profile");
}
?>
    </div><!-- row -->
  </div><!-- col-8 -->
</div><!-- row -->
</div><!-- conatiner-->









<?php 

/*

if($agent==1)
{

echo '<footer class="footer" style="background-color:#fff; height:50px; position:absolute">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2" style="text-align:center;margin-top:10px;">
                    &copy; 2015 Ecounsellors.in All rights reserved.

          </div> 
        </div>

      </div>
    </footer>';

       ?>
          <!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55944f300c6a65fa4a22ed10/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>


    <?php
 }
else*/
{
  echo "<br><br>";
include("includes/footer2.php");
}

?>







</body>
</html>








                                          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
                                          <script>
                                              (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                              e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                              e.src='//www.google-analytics.com/analytics.js';
                                              r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                                              ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                                            </script>-->









<div class="modal fade bs-example-modal-md xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align:center;">Change Password</h4>
      </div>
      <div class="modal-body">
        
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-login">
            <div class="panel-heading">

              <div class="row">
                <div class="col-xs-12">
                  <a href="#" class="active" id="login-form-link">Change</a>
                </div>
                
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">

                  <form id="login-form" action="#" method="" role="form" style="display: block;">
                    <div class="form-group">
                      <input type="password" name="passwordc" id="passwordc" tabindex="1" class="form-control" placeholder="Current Password" value="">
                    </div>
                  
                    <div class="form-group">
                      <input type="password" name="password2" id="password2" tabindex="2" class="form-control" placeholder="New Password">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password3" id="password3" tabindex="2" class="form-control" placeholder="Confirm New Password">
                    </div>
                   
                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <input type="submit" name="change" id="change" tabindex="4" class="form-control btn btn-login" value="Change">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <form method="post" action="">
       
        <div class="login_result" style="text-align:center;" id="login_result"></div>
      </form>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->








<?php 

if(time()-$rowu['timestamp']<10800)

{
?>




<style type="text/css">
  
  .modal-footer {
    text-align:center;
    font-size: 9px;
  }
</style>





 
  <div class="modal fade bs-example-modal-md xr" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe_f">     
       <div class="modal-header">
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></button>

       <?php

       echo '<h4 class="text-center"><span class="label label-success" id="qid" ';

        if($agent==1)
        echo 'style="margin-left: 41px;"';

        echo '>Earn 50 Credits</span></h4>';

       ?>
      </div>
      <div class="modal-body" >
        <div class="col-md-3 col-md-offset-5 col-xs-offset-4">
         <div id="loadbar_f" style="display: none;">
          <div class="blockG" id="rotateG_01"></div>
          <div class="blockG" id="rotateG_02"></div>
          <div class="blockG" id="rotateG_03"></div>
          <div class="blockG" id="rotateG_04"></div>
          <div class="blockG" id="rotateG_05"></div>
          <div class="blockG" id="rotateG_06"></div>
          <div class="blockG" id="rotateG_07"></div>
          <div class="blockG" id="rotateG_08"></div>
        </div>
      </div>

      <div class="quiz" id="quiz_f" data-toggle="buttons">
          <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-login">
            <div class="panel-heading">

              <div class="row">
                <div class="col-xs-12">
                  <a href="#" class="active" id="login-form-link">Code</a>
                </div>
                
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">

                
                    
                      <input type="text" onkeypress="ref()" name="ref" id="ref" tabindex="1" class="ref form-control" placeholder="Referral Code">
                    
                   
                   
                   
                      <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <br>
                         
                          <button onclick="ref()" id="earn"  class="form-control btn btn-login" >Earn</button>
                        
                          <br>
                         
                        </div>

                      </div><br>
                       <div id="result"></div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                          
                          </div>
                        </div>
                      </div>
                    </div>
                 
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      </div>
</div>

    </div>
    <div class="modal-footer text-muted">
      <span id="answer">
        *Earning window will close within 3hrs of SignUp
      </span>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<?php  }?>






<?php 

if($agent!=5)
{
?>

  <div class="modal fade bs-example-modal-md xref" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe_f">     
       <div class="modal-header">
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></button>

       <?php

       echo '<h4 class="text-center"><span class="label label-success" id="qid" ';

        if($agent==1)
        echo 'style="margin-left: 41px;"';

        echo '>Earn 50 Credits</span></h4>';

       ?>
      </div>
      <div class="modal-body" >
        <div class="col-md-3 col-md-offset-5 col-xs-offset-4">
         <div id="loadbar_f" style="display: none;">
          <div class="blockG" id="rotateG_01"></div>
          <div class="blockG" id="rotateG_02"></div>
          <div class="blockG" id="rotateG_03"></div>
          <div class="blockG" id="rotateG_04"></div>
          <div class="blockG" id="rotateG_05"></div>
          <div class="blockG" id="rotateG_06"></div>
          <div class="blockG" id="rotateG_07"></div>
          <div class="blockG" id="rotateG_08"></div>
        </div>
      </div>

      <div class="quiz" id="quiz_f" data-toggle="buttons">
          <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-login">
            <div class="panel-heading">

              <div class="row">
                <div class="col-xs-12">
                  <a href="#" class="active" id="login-form-link">Ask Your Friends And Earn 50 Credits</a>
                </div>
                
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 text-center">
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a href="whatsapp://send" data-text="Take a look at this awesome website:" class="a2a_button_whatsapp" data-href="http://ecounsellors.in" ></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_gmail"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_reddit"></a>
<a class="a2a_dd" href="https://www.addtoany.com/share_save"></a>
</div>

<script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<!-- AddToAny END -->

                
                    <?php
                     echo '<h3>Your Referral Code is:</h3> <h3><span class="label label-primary">'.$rowu['ref'].'</span></h3>
                     <h4>Ask Your Friends To Sign Up Using This Code.You And Your Friend Will Earn <span class="label label-danger">50</span> Credits Each.</h4><br>';
                      $credits=$rowu['credits'];
                       $left=(200-$credits);

                       if($credits<200)
                        echo '<h4>You Still need '.$left.' more credits for a free session fetch '.($left/50).' more friend/friends.</h4>';
                    else
                      echo '<h4><span class="label label-success ref">Time To Grab Free Session</span><br></h4>';
                  

                      echo '<h3 class="label label-success ref">200 Credits = A Free Session </h3><br><br>
                        <h3 class="label label-success ref">Credits You Have = '.$rowu['credits'].'</h3>';


                   
                   ?>


                   
               <div id="result"></div>
                    
                  
                 
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      </div>
</div>

    </div>
    
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->










<?php

}
?>







     <script type="text/javascript">








  

      <?php


if($_SESSION['u_id'])
{
  if(isset($_GET['ref']))
  {
  echo '
    $(window).load(function(){
        $(".xr").modal("show");
    });';
  }
   if(isset($_GET['earn']))
  {
  echo '
    $(window).load(function(){
        $(".xref").modal("show");
    });';
  }
}


?>

 function upload()
  {
  filepicker.setKey("AjcIkquQR3qWKqPaYEczez");

filepicker.pick(
 {
    mimetype: 'image/*',
    imageQuality: 70,
    crop_first:true,
    cache:true,
   
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
      
      window.location='profile';

    }
  }
 
 
  xmlhttp.open("POST","ajax/upload.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("url="+url);


   
  },
  function(FPError){
    console.log(FPError.toString());
  }
);

}



      </script>

      <script src="js/bug.js"></script>





        <?php
/*
if(isset($_POST['up']))
          {

            define("UPLOAD_DIR", "uploads/");

            if (!empty($_FILES["myFile"])) 
            {
              
              //delete("uploads/$fk");
              $myFile = $_FILES["myFile"];

             

              $name =  $myFile["name"];

              $f=0;$f2=0;

              $fileSize = $_FILES['myFile']['size'];
              //echo $fileSize;
              if($fileSize<1250000&&$fileSize!=0)
              {
                $f=1;
              }


              $fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
              $allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG,IMAGETYPE_JPG, IMAGETYPE_PNG);
              //echo image_type_to_mime_type($fileType);
              $parts = pathinfo($name);
              if (in_array($fileType, $allowed))
              {
                $f2=1;
              }
              else if($parts["extension"]=="jpg" OR $parts["extension"]=="png" OR $parts["extension"]=="gif" OR $parts["extension"]=="GIF")
              {
                    $f2=1;
              }

              if ($f2==1&&$f==1) 
              {

                $i = 0;
                
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
                  /*if($rowf['propic']=="")
                  {
                      query("INSERT INTO u_userdata(propic) values('$name')");
                  }
                  else
                  {
                    query("UPDATE u_userdata SET propic='$name' WHERE u_id='$uid';");
                    $fk=$rowf['propic'];
                     unlink('uploads/'.$fk);
                  //}
                    redirect("profile");
                }
                if (!$success)
                { 
                  echo "<h4 style='color: red;'>Unable to save file.</h4>";
                  exit;
                }

              }
              else
              {
                if($f==0)
                  echo '<h4 style="color: red;">Image size must be less than 1MB</h4>';

                else if($f2==0)

                  echo '<h4 style="color: red;">Please Upload Image file only</h4>';
              }

    //$t=UPLOAD_DIR.$name;
//echo $path = rtrim(dirname($t), "/\\");
    //echo realpath($t);
    // set proper permissions on the new file
    //chmod(UPLOAD_DIR . $name, 0644);
            }


          }*/

?>