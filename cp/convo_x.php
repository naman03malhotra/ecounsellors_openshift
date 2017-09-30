

 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="css/amaran.min.css">

    <link rel="stylesheet" href="/css/animate.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
    <script src="js/jquery.amaran.min.js"></script>




<script type="text/javascript">

  function close_window() {
  if (confirm("Are you sure, you want to Hang Up?")) {
    close();
  }
}
</script>


<style type="text/css">

  video {height: 300px; margin:10px; background-color: #dcdcdc; padding: 0 10px 0 10px;}


  #headerBox {
    background-color: #00BEF2;
  }


</style>

<?php 

include("/var/lib/openshift/567d209b7628e198570000d3/app-root/runtime/repo/includes/config.php");
$f=0;
if(($_SESSION['c_id']) and ($_SESSION['u_id']))
{
   redirect("/logout?out");
}

if(($_SESSION['c_id']) OR ($_SESSION['u_id']))
{
    //redirect("index");
    //echo '<script>alert("true");</script>';
        $f=1;

        if($_SESSION['c_id'])
        {
        $sid=($_GET['sub']);
        $session_emailid = $_SESSION['c_id'];
    $queryuc = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
    $rowuc = mysqli_fetch_array($queryuc);
    //$kid=$rowu[]'id'];

    $queryfc = query("SELECT * FROM c_userdata WHERE emailid='$session_emailid'");  
    $rowf = mysqli_fetch_array($queryfc);   
    $r=query("SELECT * From timetable where email='$session_emailid'");
    $rowd=mysqli_fetch_array($r);   
    $sub=$rowf['sub_id'];
   

   if(isset($_GET['f']))
   {
    $querym=query("SELECT * FROM meet_f where c_id='$sub' and rand='$sid'");
   }
   else
   {
   $querym=query("SELECT * FROM meet where c_id='$sub' and rand='$sid'");
 }
   $rowm= mysqli_fetch_array($querym);

   $uid=$rowm['u_id'];
   $queryux = query("SELECT * FROM u_users WHERE u_id='$uid'");
  $rowux = mysqli_fetch_array($queryux);

  echo' <script type="text/javascript">';

 //$sid=$rowm['rand'];
   // echo $sid;
    echo 'var usid="'.($sid).'";';
  
echo '</script>';
    }
   if($_SESSION['u_id'])
   {

         $sid=($_GET['sub']);
        $uid = $_SESSION['u_id'];
    /*$queryu = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
    $rowu = mysqli_fetch_array($queryu);*/
    //$kid=$rowu[]'id'];
    if(isset($_GET['f']))
    {
$querym=query("SELECT * FROM meet_f where u_id='$uid' and rand='$sid'");
}
else
{
  $querym=query("SELECT * FROM meet where u_id='$uid' and rand='$sid'");
}
   $rowm= mysqli_fetch_array($querym);
   $c_id=$rowm['c_id'];
    $queryfc = query("SELECT * FROM c_userdata WHERE sub_id='$c_id'");  
    $rowfc = mysqli_fetch_array($queryfc);  
  $numc=mysqli_num_rows($queryfc);
  if($numc<1)
  {
    redirect("/appointments?sorry");
  }
  $status=$rowm['status'];

  if($status!="")
  {
    redirect("/appointments");
  }
    //$r=query("SELECT * From timetable where email='$session_emailid'");
    //$rowd=mysqli_fetch_array($r); 
    //$sub=$rowf['sub_id'];
   
   
  echo' <script type="text/javascript">';

 //$sid=$rowm['rand'];
   // echo $sid;
    echo 'var usid="'.($sid).'";';
  
echo '</script>';



   }


}
else
{
    //echo '<script>alert("false");</script>';
        redirect("/index?lo");
}










if($_SESSION['c_id'])
{
        

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


?>

<script type="text/javascript">



   function save(sub)
 {
   var note=document.getElementById('note').value;
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
    if (xmlhttp.readyState==1)
    {

       // document.getElementById("loadbar").style.display="inline";
        //document.getElementById("quiz").style.display="none";
         //$.amaran({content:{'message':'Processing...'}});
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      //document.getElementById('result2').innerHTML='<p class="text-center bg-primary">Saved Successfully</p>' ;
      $.amaran({content:{'message':'Notes Saved Successfully'}});
    }
  }
 // var sub=<?php echo "'".$sub."'"; ?>;

 if(note=='')
 {
 $.amaran({content:{message:'Can\'t save blank notes', color:'#e74c3c'}});
 }
 else
 {
xmlhttp.open("POST","ajax/note.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("sub="+sub+"&notes="+note);
 }

 }

</script>


<html>
<STYLE TYPE="text/css">


</STYLE>
<head>
    <title>Ecounsellors - Conversation Room</title>
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
<link rel="shortcut icon" href="/img/icon.png">


    <STYLE TYPE="text/css">
    
</STYLE>




 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        
        <meta name="author" content="Nitin kumar">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        
     
        <script>
            document.createElement('article');
            document.createElement('footer');
        </script>

<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

    <!-- Header -->
    <!-- Header -->

<?php  include('includes/header.php'); ?>

    <!-- Main -->
    <div id="main">

        <!-- Intro -->
        <section id="top" class="two">
            <div class="container">
        
<?php
  $type=$rowm['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Phone";
          }


                echo '<h2>Mode of counselling: '.$type.' Conference</h2>
                Visit this page on: '.date("jS M'y l",$rowm['date']).'<br>
        Time Slot:'.$rowm['slot'].'



        ';

                




   
?>

   
 
        <article>
            
                   
                

            

          


       
        
       
    
        






        </div>
    </section>
            <section  class="four">
            <div class="row">
        

 <div class="col-sm-12 col-lg-12 col-md-12">
   <?php  
   $queryuf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");   
          $rowuf=mysqli_fetch_array($queryuf);
                 if($rowm['type']=='1')
                 {
    /* echo '<table class="visible">
                <tr>

                  <td style="text-align: right;">';

                          echo '<input type="hidden" class="secid" id="conference-name" placeholder="Broadcast Name" value="'.($sid).'">';
                  
                   echo' </td>
                    <td>
                        <button class="btn btn-info" id="start-conferencing">Start Video Conference</button>
                    </td>';

                echo '</tr>
            </table>';*/


            echo '   <input type="hidden" id="conference-name" value='.$sid.'>
                <button id="setup-new-conference" class="btn btn-info">Start Video Conference</button><br><br>';
          }
          else
          {
            echo '<h2>Kindly Call On client\'s Number:<span style="color:#00BEF2;">'.$rowux['phone'].'</span> on scheduled time.</h2>';
          }
          ?>
          
            <div id="videos-container"></div>

 <a id="hang" href="#" onclick="close_window();return false;" class="btn btn-danger btn-lg"><span class="fa fa-phone"></span> Hang Up</a>


          <div class="well" style="color: white; background-color: #00bef2;text-align:center;<?php if($agent==1) { echo 'font-size: xx-large;';}?>">Client's Information.</div>
<?php
         echo '<div class="thumbnail">
           <div class="caption">
                <div>
                    <p class="pull-left"><strong>Booking No:</strong>'.$rowm['bno'].'</p><p class="pull-right"><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm['btime']).'</p>
                </div>
                
                
            </div>
            <hr>';
           if($rowuf['propic']=="")
              {
                if($rowux['status']=="f" or $rowux['status']=="g")
                  echo '<img style="height: 250px;" class="img-rounded" src="'.$rowux['url'].'"/>';
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
                echo '<img style="height: 250px;" class="img-rounded" src="'.$rowuf['propic'].'"/>';
              }
            echo '<div class="caption">
              <h4 class="pull-right"></h4>
              <h4><strong>Name: </strong>'.$rowux['name'].'</h4>
              <h4><strong>Phone: </strong>'.$rowux['phone'].'</h4>
              <h4><strong>Email: </strong>'.$rowux['emailid'].'</h4>
              
            </div>
             <button class="btn btn-primary btn-block">Make Notes</button><br>


    <div id="result">';
     echo '<textarea  onfocusout="save(\''.$sid.'\')" type="text" name="note" id="note" class="form-control" rows="5" placeholder="Make Notes about user. Things get automatically saved when you click outside.">'.$rowm['note'].'</textarea><br>'; ?>
    </div>
    <div id="result2"></div>


            
          </div>
        </div>

    </div>
        





<?php 


?>

        </div>
    </section>




<!-- Footer -->




</div>

<?php include("templates/footer.php") ?>
    </body>

            </html>



<script src="js/custom.js"></script>

<?php  

}
?>
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 



<?php
if($_SESSION['u_id']){
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
  
  <title> Ecounsellors - Conversation Room</title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
  <script src="/cp/js/bootstrap.js"></script>
  <link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="shortcut icon" href="/img/icon.png">
<style>

</style>
<!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

<link rel="stylesheet" href="/css/main.css">


  

<style type="text/css">
   .loginx
  {    border: 4px dashed #337AB7;
    text-align: center;
    border-radius: 29px;
    outline: none;
    border-bottom-color: #E51C23;
    border-right-color: #E51C23;
  }



  .bluelink {
      color: #00bef2 ;
      font-weight: 400;
    }
        .fcolor {/*fb icon color*/
      color: #3b5998;
    }
    .tcolor {/*twitter icon color*/
      color: #1dcaff;
    }
    .gcolor {/*g+ icon color*/
      color: #d34836;
    }
    .center-block {
      margin: 0 auto;
      float: none;
    }


    .footer-menu {
      background-color:white;
        clear:both;
        text-align:center;
        padding:20px;
    }
    .footer {
      background-color:#00bef2;
        color:#f0f0f0;
        clear:both;
        text-align:center;
        padding:14px;
    }

    .modal-backdrop.in {
      opacity: 1;
    }


    .free{
    padding: 0px 0px;
      border-radius: 15px;
        margin: -10px 0px;
}
.btn-suc{

  background-color: #fff;
  color: #5CB85C;
  border-color: rgb(92, 184, 92);
}
.btn-suc:hover{
  color:#fff;
  background-color: #5CB85C;
   border-color: rgb(92, 184, 92);

}
.btn-suc.active{
  background-color:  #50A350;
   color:#fff;

}
</style>

</head>

<script type="text/javascript">



   function save(sub)
 {
   var note=document.getElementById('note').value;
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
    if (xmlhttp.readyState==1)
    {

       // document.getElementById("loadbar").style.display="inline";
        //document.getElementById("quiz").style.display="none";
         //$.amaran({content:{'message':'Processing...'}});
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      //document.getElementById('result2').innerHTML='<p class="text-center bg-primary">Saved Successfully</p>' ;
      $.amaran({content:{'message':'Notes Saved Successfully'}});
    }
  }
 // var sub=<?php echo "'".$sub."'"; ?>;

 if(note=='')
 {
 $.amaran({content:{message:'Can\'t save blank notes', color:'#e74c3c'}});
 }
 else
 {
xmlhttp.open("POST","ajax/note.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("sub="+sub+"&note="+note);
 }

 }

</script>

<body>
  
   





<?php 


  date_default_timezone_set("Asia/Kolkata");
$uid= $_SESSION['u_id'];
  $queryu = query("SELECT * FROM u_users WHERE u_id='$uid'");
  $rowu = mysqli_fetch_array($queryu);


  $queryf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");       

  $rowf = mysqli_fetch_array($queryf);
  /*
  $agent=1;
  $useragent=$_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|iphone|ipad|ipod|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
  {
    $agent=0;
  } */
include("/var/lib/openshift/567d209b7628e198570000d3/app-root/runtime/repo/includes/nav.php");
  ?>
   




 <?php 
 if(!$_SESSION['u_id'])
{
  redirect('index?log');
}?>


<nav class="navbar navbar-default navbar-fixed" style="
margin-top: ;
">

</nav>






<div class="container">



  <div class="row">

<!--
    <div class="col-md-3"    <?php //if($agent==1){ echo 'style=" max-width: 370px;position: fixed;"';} ?>  >




          <div class="thumbnail">
              <?php
     //   if($rowfc['propic']=="")
          {
          //  echo '<img class="img-circle" src="uploader/userpic.gif"/>';
          }
      //    else
          {
      //      echo '<img class="img-rounded" style="height: 200px;width:200px;"src="'.$rowfc['propic'].'"/>';

          }


        
          ?>
        <div class="caption">
          <h4 class="pull-right"></h4>
         <?php //echo '<h4 style="text-align:center;"><a target="_blank" href="/counsellor?sub='.$rowfc['sub_id'].'">'. $rowfc['fname'].' '.$rowfc['lname'].' </a>';?>
          </h4>
              
              
            </div>
           <!-- <div class="ratings">
              <p class="pull-right">12 reviews</p>
              <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </p>
            </div>
          </div>
        

      <!--<p class="list-group-item" style="
      background-color: #00bef2;
      color: white;
      font-size: x-large;
       text-align: center;
      ">Options</p>-
      <div class="list-group" style="
    text-align: center;
">

        <a href="/profile" class="list-group-item"><span style="margin-right:5px;color: #00bef2;" class="fa fa-pencil" ></span>View Profile</a>
        
       
      </div>
    </div> -->

    <div class="col-md-12" style="margin-bottom:50px;">

  

      <div class="row">
          <?php
         
     
          ?>
        <div class="col-sm-12 col-lg-12 col-md-12">
          <div class="well" style="color: white; background-color: #00bef2;text-align:center;<?php if($agent==1) { echo 'font-size: xx-large;';}?>">Conversation Room</div>
            <div class="thumbnail" style="text-align:center;padding:0px;"><center>


  <?php
          $tday=date("jS M'y l",time());
           // echo  '<h4>Counsellor\'s Number: <span style="color:#00bef2;">'.$rowfc['phone'].'</span><br></h4>';
            // echo  '<h4>Counsellor\'s Email: <span style="color:#00bef2;">'.$rowfc['emailid'].'</span><br></h4>';
          if($rowm['type']=='1')
             echo  '<h2>Video Conference Button will Appear on<br></h2><h3 style="color:#00bef2;">';
            else
              echo  '<h2>Counsellor will call you on<br><span ></h2><h3 style="color:#00bef2;">';
              if($tday!=date("jS M'y l",$rowm['date']))
               echo date("jS M'y l",$rowm['date']);
             echo " ";
             echo substr($rowm['slot'], 0,5).' '.substr($rowm['slot'], 12,strlen($rowm['slot']));
              if($tday==date("jS M'y l",$rowm['date']))
                echo " Today";


              echo '</h3><br>';

             if($rowm['type']=='1')
              echo '<button type="submit" class="btn btn-info" data-toggle="modal" data-target=".xt" style="margin-top:8px;">Guidelines For Conversation</button></li><p></p>';
            /* echo '<table class="visible">
                <tr>
                    <td style="text-align: right;">
                       
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table><table id="rooms-list" class="visible"></table><div id="participants"></div><br>';*/
                echo ' <table style="width: 100%;" id="rooms-list"></table>   <div id="videos-container" class="container-fixed" style="background-color:whitesmoke;border-bottom:1px solid #dcdcdc;border-top:1px solid #dcdcdc;"></div>';
                echo '<br><a id="hang" href="#" onclick="close_window();return false;" class="btn btn-danger btn-lg"><span class="fa fa-phone"></span> Hang Up</a>';
                echo '<h4 style="color:#a7a7a7;">Please contact us in case button doesn\'t appear at schduled time.</h4>';

        ?>  
  <br>


    <div id="result" style="background-color:whitesmoke;padding:10px;">
      <h4 style="color:#a7a7a7;">Make Notes</h4>
     <?php echo '<textarea onfocusout="save(\''.$sid.'\')" type="text" name="note" id="note" class="form-control" rows="5" placeholder="Make Notes of questions u\'ll be asking. Things get automatically saved when you click outside.">'.$rowm['u_notes'].'</textarea><br>'; ?>
    </div>
    <div id="result2"></div>

       

   
        
<?php



?>
      

        </div>



       

        </div>

        
   




      </div><!-- row -->


    </div><!-- col-8 -->



  </div><!-- row -->






</div><!-- conatiner-->










<?php 



/*if($agent==1)
{

echo '<footer class="footer" style="background-color:#fff; height:50px; ">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2" style="text-align:center;margin-top:10px;">
                    &copy; 2015 ecounsellors.in All rights reserved.

          </div> 
        </div>

      </div>
    </footer>';
 }
else*/
{
include("/var/lib/openshift/567d209b7628e198570000d3/app-root/runtime/repo/includes/footer2.php");
}
?>









</body>
</html>









<script src="/js/main.js"></script>


<?php


}
?>









































<head>
   
    

    <!-- scripts used for broadcasting -->
    <script src="//cdn.webrtc-experiment.com/firebase.js">
    </script>
    <script src="//cdn.webrtc-experiment.com/RTCMultiConnection.js">
    </script>
</head>

<body>
   

    

    <div style="display:none;">

                <input type="text" id="conference-name">
                <button id="setup-new-conference" class="setup">Setup New Conference</button>
          
         
          </div>
              

         
          
       

        <script>
        $('#hang').hide();
     
        var connection = new RTCMultiConnection();
        connection.session = {
            audio: true,
            video: false
        };
        connection.onstream = function(e) {
            e.mediaElement.width = 600;
            videosContainer.insertBefore(e.mediaElement, videosContainer.firstChild);
            rotateVideo(e.mediaElement);
            scaleVideos();
        };
        function rotateVideo(mediaElement) {
            mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
            setTimeout(function() {
                mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
            }, 1000);
        }
        connection.onstreamended = function(e) {
            e.mediaElement.style.opacity = 0;
            rotateVideo(e.mediaElement);
            setTimeout(function() {
                if (e.mediaElement.parentNode) {
                    e.mediaElement.parentNode.removeChild(e.mediaElement);
                }
                scaleVideos();
            }, 1000);
        };
        var sessions = {};
        connection.onNewSession = function(session) {
            if (sessions[session.sessionid]) return;
            sessions[session.sessionid] = session;
            var tr = document.createElement('tr');
            if(session.sessionid==usid)////////////////////////////////////////////////////////////
            {
            tr.innerHTML = '<td class="text-center"><button class="join btn btn-suc btn-lg text-center" style="margin:10px;">Start Chat With Counsellor</button></td>';
            }
            roomsList.insertBefore(tr, roomsList.firstChild);
            var joinRoomButton = tr.querySelector('.join');
            joinRoomButton.setAttribute('data-sessionid', session.sessionid);
            joinRoomButton.onclick = function() {
                $(".join").hide();
                $('#hang').show();///////////////////////////////////////////////////////////
                this.disabled = true;
                var sessionid = this.getAttribute('data-sessionid');
                session = sessions[sessionid];
                if (!session) throw 'No such session exists.';
                connection.join(session);
            };
        };
        var videosContainer = document.getElementById('videos-container') || document.body;
        var roomsList = document.getElementById('rooms-list');
        document.getElementById('setup-new-conference').onclick = function() {
            $('#setup-new-conference').hide();
             $('#hang').show();
         
            this.disabled = true;
            connection.open(document.getElementById('conference-name').value || 'Anonymous');
        };
        
        connection.connect();
        (function() {
            var uniqueToken = document.getElementById('unique-token');
            if (uniqueToken)
                if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
                else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
        })();
        function scaleVideos() {
            var videos = document.querySelectorAll('video'),
                length = videos.length,
                video;
            var minus = 130;
            var windowHeight = 700;
            var windowWidth = 600;
            var windowAspectRatio = windowWidth / windowHeight;
            var videoAspectRatio = 16 / 9;
            var blockAspectRatio;
            var tempVideoWidth = 0;
            var maxVideoWidth = 0;
            for (var i = length; i > 0; i--) {
                blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
                if (blockAspectRatio <= windowAspectRatio) {
                    tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
                } else {
                    tempVideoWidth = windowWidth / i;
                }
                if (tempVideoWidth > maxVideoWidth)
                    maxVideoWidth = tempVideoWidth;
            }
            for (var i = 0; i < length; i++) {
                video = videos[i];
                if (video)
                    video.width = maxVideoWidth - minus;
            }
        }
        window.onresize = scaleVideos;
        </script>


   

    </script>
</body>

</html>
<style type="text/css">
  .le{
    text-align: left;
  }
  .modal-body {
    min-height: 260px;
}
</style>


  <div class="modal fade bs-example-modal-lg xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe">     
       <div class="modal-header">
        <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></button>

        <h4><span class="label label-info" id="qid">1</span> Guidelines</h4>
      </div>
      <div class="modal-body" >
        <div class="col-md-3 col-md-offset-5 col-xs-offset-4">
         <div id="loadbar" style="display: none;">
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

      <div class="quiz" id="quiz" data-toggle="buttons">
        <ul style='font-size: 21px;float:left;'>
          <li class ="le" style='color:red;'>
            Use of latest version of Google Chrome is advised.
          </li>
        
          <li class ="le"  style='color:green;'>
            Use Of Mic And Headphone is Advised.
          </li>
          <li class ="le"  style='color:green;'>
              Internet Connection Must be 3G/WiFi(512 KB) atleast.
          </li>
          <li class ="le" >
           Stop All other bandwith consuming process such as downloading, for smooth experience.
          </li>
          <li class ="le" >
            Refresh Page In Case Video Stops.
          </li>
          <li class ="le" >
            Kindly contact us, in case button doesn't appear.
          </li>
        </ul>
      </div>
</div>

    </div>
   
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
