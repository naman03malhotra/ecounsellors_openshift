

 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="css/amaran.min.css">

    <link rel="stylesheet" href="/css/animate.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
    <script src="js/jquery.amaran.min.js"></script>
<style type="text/css">
  #chatio{
    z-index: 1999999;
  }
</style>


<script type="text/javascript">

  function close_window() {
  if (confirm("Are you sure, you want to Hang Up?")) {
    close();
  }
}

//$(window).scroll(
//    {
//        previousTop: 0
//    }, 
//    function () {
//    var currentTop = $(window).scrollTop();
//    if (currentTop < this.previousTop) {
//       // $(".sidebar em").text("Up"); 
//        //$(".navbar").slideDown("slow");
//              // $(".gap").hide();
//         $(".navbar").removeClass('animated fadeOutUp')
//                .addClass('animated fadeInDown')
//                .fadeIn();
//
//
//    } else {
//        //$(".sidebar em").text("Down");
//       // $(".navbar").slideUp("slow");
//        // $(".gap").show();
//        $(".navbar").removeClass('animated fadeInDown')
//                .addClass('animated fadeOutUp')
//                .fadeOut();
//    }
//    this.previousTop = currentTop;
//});
</script>


<style type="text/css">

  video {height: 300px; margin:10px; background-color: #dcdcdc; padding: 0 10px 0 10px;}


  #headerBox {
    background-color: #25b1cb;
  }


</style>

<?php 

include("../includes/config.php");
$f=0;
if(($_SESSION['c_id']) and ($_SESSION['u_id']))
{
  $check=$_SERVER['PHP_SELF'];
  if (strstr($check, 'cp'))
  {
       redirect("/cp/logout?out");

  }
  else
  {
   redirect("/logout?out");
 }
}

if(($_SESSION['c_id']) OR ($_SESSION['u_id']))
{
   class stu{
    public $id="";
    public $name="";
    public $chan="";
    public $ava="";
}
    
  $f=1;

  if($_SESSION['c_id'])
  {
      $sid=($_GET['sub']);
      $session_emailid = $_SESSION['c_id'];
      $queryuc = query("SELECT * FROM c_users WHERE emailid='$session_emailid'");
      $rowuc = mysqli_fetch_array($queryuc);
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

     
     $chat_time=1;
     $tdate=time();
     $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));
     if($xdate-$tdate<=3600*2)
     {
      $chat_time=1;
     }


     $s= new stu();
     $s->id= $uid;
     $s->name= $rowux['name'];
     $s->chan=$sid;
     $s->ava='/u_img/'.$rowux['url_file'].'.png';


     $s2= new stu();
     $s2->id = $sub;
     $s2->name = $rowf['fname'].' '.$rowf['lname'];
     $s2->chan= $sid;
     $s2->ava='/cp/m_img/'.$rowf['propic_file'].'.png';
     $user=json_encode($s);
     $mentor=json_encode($s2);

    echo' <script type="text/javascript">';
    echo 'var usid="'.($sid).'";';
    echo 'var user='.$user.';';
    echo 'var mentor='.$mentor.';';
    echo 'var usr_set="n";';
    echo '</script>';
  }

  if($_SESSION['u_id'])
   {

    $sid=($_GET['sub']);
    $uid = $_SESSION['u_id'];
   
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

   $queryu = query("SELECT * FROM u_users WHERE u_id='$uid'");
   $rowu = mysqli_fetch_array($queryu);


   $queryf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");       
   $rowf = mysqli_fetch_array($queryf);

    if($numc<1)
    {
      redirect("/appointments?sorry");
    }
    $status=$rowm['status'];

    if(!($status=='' or $status=='r'))
    {
      redirect("/appointments");
    }

     $chat_time=1;
     $tdate=time();
     $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));
     if($xdate-$tdate<=3600*2)
     {
      $chat_time=1;
     }

  
   
     $s= new stu();
     $s->id= $uid;
     $s->name= $rowu['name'];
     $s->chan=$sid;
     $s->ava='/u_img/'.$rowu['url_file'].'.png';


     $s2= new stu();
     $s2->id = $c_id;
     $s2->name = $rowfc['fname'].' '.$rowfc['lname'];
     $s2->chan= $sid;
     $s2->ava='/cp/m_img/'.$rowfc['propic_file'].'.png';
     $user=json_encode($s);
     $mentor=json_encode($s2);

    echo' <script type="text/javascript">';
    echo 'var usid="'.($sid).'";';
    echo 'var user='.$user.';';
    echo 'var mentor='.$mentor.';';
    echo 'var usr_set="y";';
    echo '</script>';


   }


}
else
{
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
  
<link rel="shortcut icon" href="/img/lg123.png">

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
<body style="background:#fafafa">

    <!-- Header -->
    <!-- Header -->

<?php  include('includes/header.php'); ?>
  
    <!-- Main -->
    <div id="mainx">

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
            $type="Audio";
          }
          else if ($type==3) {

            $type="Phone";
          }


                echo '<h2>Mode of Conversation: '.$type.' Conference</h2>
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

echo ' <div class="row">
                <div class="col-md-6"><i>'.$s2->name.' &nbsp;</i> <span id="u_status1"><span class="online">Online</span></span></div>
                <div class="col-md-6">  <i>'.$s->name.' &nbsp;</i> <span id="m_status1"></span></div>
              </div>';
        if($chat_time==1) 
          echo '<a id="chat_but" class="btn  btn-warning">Text Chat With User</a><br><br>';
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
                <button id="setup-new-conference" class="btn btn-info btn-lg">Start Video Conference</button><br><br>';
          }
          else  if($rowm['type']=='2')
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
                <button id="setup-new-conference" class="btn btn-info btn-lg">Start Audio Conference</button><br><br>';
            //echo '<h2>Kindly Call On client\'s Number:<span style="color:#25b1cb;">'.$rowux['phone'].'</span> on scheduled time.</h2>';
          }
          else if($rowm['type']=='3')
          {
             echo '<h2>Our team will coordinate the appointment on scheduled time. Emergency Contact: <span style="color:#25b1cb;">+919643781369, +919015066557</span>.</h2>';

          }
          ?>
          
            <div id="videos-container"></div>
          <br>

 <a id="hang" href="#" onclick="close_window();return false;" class="btn btn-danger btn-lg" style="margin-bottom:20px;"><span class="fa fa-phone"></span> Hang Up</a>




          <div class="well" style="color: white; background-color: #25b1cb;text-align:center;<?php if($agent==1) { echo 'font-size: xx-large;';}?>">User's Info.</div>
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
                  echo '<img style="height: 250px;" class="img-rounded" src="/u_img/'.$rowux['url_file'].'.png"/>';
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
                echo '<img style="height: 250px;" class="img-rounded" src="/u_img/'.$rowu['url_file'].'.png"/>';
              }
            echo '<div class="caption">
              <h4 class="pull-right"></h4>
              <h4><strong>Name: </strong>'.$rowux['name'].'</h4>';
              //<h4><strong>Phone: </strong>'.$rowux['phone'].'</h4>
             // <h4><strong>Email: </strong>'.$rowux['emailid'].'</h4>
              
           echo '</div>
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

<?php //include("templates/footer.php") ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65787400-1', 'auto');
  ga('send', 'pageview');

</script>


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

<script type="text/javascript">
  if (window.location.protocol !== 'https:') {
    window.location = 'https://' + window.location.hostname + window.location.pathname + window.location.hash;
}
</script>
<!--End of Tawk.to Script-->
    </body>

            </html>
<script type="text/javascript">
  
var data,data2;
if(usr_set=="y")
{
  data=user;
  data2=mentor;
}
else
{
  data=mentor;
  data2=user;
}
</script>

<div class="container" id="chatio">

<?php

include_once("chatx/index.php");



?>
<style type="text/css">
  
  #drawerPanel
  {
    font-size: 16px;
  }
</style>

</div>

<script src="js/custom.js"></script>

<?php  

}
?>
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
<!-- ENDING C_ID ----------------------------------------------------------------------------------> 
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
  <link rel="shortcut icon" href="/img/lg123.png">

<style>

</style>
<!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

<link rel="stylesheet" href="/css/main.css">

<?php
  $qfields=query("SELECT * from fields where active=1 order by order_by");
?>


  

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
      color: #25b1cb ;
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
      background-color:#25b1cb;
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
    
              .thumbnail
    {
        border:none;
        box-shadow:none;
        border-radius:0px;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.15);
/*        border-bottom: 1px solid #dddddd;*/
/*        border-top:1px solid #dddddd;*/
        background-color:white;
    }
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
    .thumbnail h2 {
        font-weight:lighter;
        font-size:20px;
    }
    .thumbnail h3 {
        font-weight:lighter;
        font-size:18px;
    }
    .thumbnail .dark{
            background-color:#fafafa !important;
    }
    .nopad{
        padding:0px;
    }
    .imgborder{
        border:3px solid #dddddd;
    }
    
    .modal-content{
        background-color:white;
        border-radius:0px;
        border:1px solid #dddddd;
        box-shadow:0px 0px 25px rgba(255, 255, 255, 0.47);
    } 
    .modal{
        background-color:rgba(0, 0, 0, 0.59);
        
    }
    .label-info{
        color:#333;
        font-weight:lighter;
        font-size:16px;
        margin:5px;
        background:white;
        border-radius:500px !important;
        border:2px solid #dddddd;
        padding:5px 11px 5px 11px !important;
    }
    .modal h4,h2{
        font-weight:lighter;
        font-size:16px;

    color:#333;
    }
    .modal-header{
        padding:2px;
    }
  
    .btn-white{
        color:#585858;
        background:#fafafa;
        border:1px solid #dddddd;
        border-radius:0px;
        font-weight:lighter !important;
        font-size:16px !important;
        box-shadow:0px 0px 5px rgba(221, 221, 221, 0.63);
        transition:all;
        transition-duration:200ms;
        margin-bottom:20px;
        padding:5px;
        min-width:250px;
    }
    
    
    .btn-white:hover{
        background:#efefef;
        color:#585858;
    }
    .btn-white:active{
        background:#dedede;
        color:#333;
    }
    .btn-white:visited,btn-white:focus{
        background:#fafafa;
    }
    .modali{
        color:white;
        background:#25b1cb;
        padding:8px 8px 8px 8px;
        font-size:14px;
        margin-right:10px;
        border-radius:500px;
        float:left;
    }
    .close{
        margin-top:10px !important;
    }
    .close:hover{
        background:white !important;
        color:#333 !important;
    }
    .modal-footer,.modal-header{
        background:#fafafa;
        
    }
    .modal table{
        font-size:14px;
    }
    .blockG{
        width:10px;
        height:3px;
        border-radius:200px;
    }
    .nomar{
        margin:0px
    }
    #note{
        border:none;
        border-radius:0px;
        background-color:transparent;
        border:3px solid white;
        color:white;
    }
    ::-webkit-input-placeholder {
   color: rgba(255, 255, 255, 0.85) !important;
}

:-moz-placeholder { /* Firefox 18- */
    color: rgba(255, 255, 255, 0.85) !important;
}

::-moz-placeholder {  /* Firefox 19+ */
 color: rgba(255, 255, 255, 0.85) !important;
}

:-ms-input-placeholder {  
 color: rgba(255, 255, 255, 0.85) !important;
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


 /* date_default_timezone_set("Asia/Kolkata");
$uid= $_SESSION['u_id'];
  $queryu = query("SELECT * FROM u_users WHERE u_id='$uid'");
  $rowu = mysqli_fetch_array($queryu);


  $queryf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");       

  $rowf = mysqli_fetch_array($queryf);
  
  $agent=1;
  $useragent=$_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|iphone|ipad|ipod|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
  {
    $agent=0;
  } */
include("../includes/nav.php");



  ?>
<script type="text/javascript">
  $('#mainNav').affix({
        offset: {
            top: -100
        }
    })

</script>
   




 <?php 
 if(!$_SESSION['u_id'])
{
  redirect('index?log');
}?>


<div class="gap" style="margin-bottom: 70px;"></div>






<div class="container nopad">



<!--
  <div class="row" style="width:100%;padding:20px 10px 20px 10px;text-align:center;">
        <span  style="color: #383838;text-align:center;<?php if($agent==1) { echo 'font-size: 20pt;';}?>">Conversation Room</span>
    <hr class="hr1">
    </div>
    
-->
  <div class="row thumbnail nopad nomar" >
      <div class="row thumbnail dark text-center" style="width:100%;margin:0px;padding:10px 5px 10px 5px">
            <div class="col-md-4 col-sm-6 col-xs-offset-0 col-xs-6">
                    <div class="col-md-3 hidden-sm hidden-xs">
                    <img src = "<?php echo $s->ava;?>" class="img-responsive imgborder img-circle" height="100px"  width="100px">
<!--  CHANGE IMAGE TO USER IMAGE-->
                    </div>
                    <div class="col-md-9 col-sm-6 col-xs-6 ">
                    <h5 ><p><?php echo $s->name;?> &nbsp;<span id="u_status1"> <span class="online">Online</span></span></p></h5>
                      
                        <hr class="hr1">
                    </div>
            </div>  
           <div class="col-md-4 col-md-offset-4 col-sm-offset-0  col-sm-6 col-xs-offset-0 col-xs-6">
                    
                    <div class="col-md-9 col-sm-6 col-xs-6 col-md-offset-0 col-sm-offset-6 col-xs-offset-6">
                       <h5> <p><?php echo $s2->name;?> &nbsp; <span id="m_status1"> </span></p></h5>
                         <hr class="hr1">
<!--                        <h4 id="m_status1"></h4>-->
                        <!--  CHANGE MENTOR STATUS-->
                    </div>
                <div class="col-md-3 hidden-sm hidden-xs">
                    <img src = "<?php echo $s2->ava;?>" class="img-responsive imgborder img-circle" height="100px"  width="100px">
                          <!--  CHANGE MENTOR IMAGE-->
                    </div>
            </div> 
             
      </div>

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
      background-color: #25b1cb;
      color: white;
      font-size: x-large;
       text-align: center;
      ">Options</p>-
      <div class="list-group" style="
    text-align: center;
">

        <a href="/profile" class="list-group-item"><span style="margin-right:5px;color: #25b1cb;" class="fa fa-pencil" ></span>View Profile</a>
        
       
      </div>
    </div> -->

    <div class="col-md-8 col-md-offset-2 text-center" style="margin-bottom:50px;">

  

      <div class="row">
     


  <?php
          $tday=date("jS M'y l",time());
           // echo  '<h4>Counsellor\'s Number: <span style="color:#25b1cb;">'.$rowfc['phone'].'</span><br></h4>';
            // echo  '<h4>Counsellor\'s Email: <span style="color:#25b1cb;">'.$rowfc['emailid'].'</span><br></h4>';
          if($rowm['type']=='1')
             echo  '<h2>Video Conference Button will Appear on <span style="color:#25b1cb;">';
            else if($rowm['type']=='2')
              echo  '<h2>Audio Conference Button will Appear on <span style="color:#25b1cb;">';
            else  if($rowm['type']=='3')
              echo '<h2>Ecounsellors Team will coordinate the appointment on <span style="color:#25b1cb;"></h2>';
              if($tday!=date("jS M'y l",$rowm['date']))
               echo date("jS M'y l",$rowm['date']);
             echo " ";
             echo substr($rowm['slot'], 0,5).' '.substr($rowm['slot'], 12,strlen($rowm['slot']));
              if($tday==date("jS M'y l",$rowm['date']))
                echo " Today";


              echo '</h2><br>';
              ?>
             

        </div>

       

        </div><!--COL_MD 7  -->
   
        <div class="col-md-12 text-center nopad"> 
         
              <?php

                $type=$rowm['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }
          else if ($type==3) {

            $type="Phone";
          }

             //if($rowm['type']=='1')-----------------------------------------
            if($chat_time==1) 
              echo '<a id="chat_but" class="btn  btn-warning btn-new">Text Chat with Mentor</a><br>';
              if($rowm['type']=='1')
              echo '<button type="submit" class="btn btn-lg btn-white" data-toggle="modal" data-target=".xt" style="margin-top:8px;">Guidelines For Conversation</button></li><p></p>';

            echo '<h4>Mode of conversation: '.$type.'</h4>';
            /* echo '<table class="visible">
                <tr>
                    <td style="text-align: right;">
                       
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </table><table id="rooms-list" class="visible"></table><div id="participants"></div><br>';*/
               if($rowm['type']=='1')
               {
                echo ' <table style="width: 100%;" id="rooms-list"></table>   <div id="videos-container" class="container-fixed" style="background-color:#f7f7f7;"></div>';
                echo '<br><a id="hang" href="#" onclick="close_window();return false;" class="btn btn-danger btn-lg" style="margin-bottom:20px;"><span class="fa fa-phone"></span> Hang Up</a>';
              }
              else
              {
                  echo '<hr><h4 style="color:#a7a7a7;">Please call on <span style="color:#25b1cb;">+919643781369</span> half an hour prior to appointment to confirm your presence. In case a confirmation is not given the appointment stands cancelled. Call on the same number to reschedule.</h4><hr>';
              }



                echo '<h4 style="color:#a7a7a7;">Our team will coordinate the appointment before scheduled time. Emergency Contacts: <span style="color:#25b1cb;">+919643781369, +919015066557, +918930130199</span></h4>';


        ?>  
  <br>


    <div id="result" style="background-color:#00BCD4;width:100%;border-top:2px solid #2190a5;padding:10px 20px 50px 20px;">
      <h2 style="color:white;">Utilize Your Time Wisely Prepare Your Question Set Below In Advance.</h2>
        <hr class="hrw">
     <?php echo '<textarea onfocusout="save(\''.$sid.'\')" type="text" name="note" id="note" class="form-control" rows="5" placeholder="Make Notes of questions u\'ll be asking. Things get automatically saved when you click outside.">'.$rowm['u_notes'].'</textarea><br>'; ?>
    </div>
    <div id="result2"></div>

       

   
        
<?php



?>
      
      </div>
      
       
    
   

    

      </div><!-- row -->

 
    
    <script type="text/javascript">
      $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
});

      </script>


       <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65787400-1', 'auto');
  ga('send', 'pageview');

</script>


<script type="text/javascript">
  if (window.location.protocol !== 'https:') {
    window.location = 'https://' + window.location.hostname + window.location.pathname + window.location.hash;
}
</script>
      <!--Start of Tawk.to Script-->
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







  <script type="text/javascript">
  
var data,data2;
if(usr_set=="y")
{
  data=user;
  data2=mentor;
}
else
{
  data=mentor;
  data2=user;
}
</script>
<div class="col-md-12 " id="chatio">
<?php

include_once("chatx/index.php");

?>

</div>
  
    </div><!-- cont-->




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
//include("/var/lib/openshift/567d209b7628e198570000d3/app-root/runtime/repo/includes/footer2.php");
}
?>













</body>
</html>









<script src="/js/main.js"></script>


<?php


}
?>








<?php

 if($chat_time==0) 
 {
   ?>

<script type="text/javascript">
  
  $('#chatio').hide();
</script>

   <?php
 }


?>































<script type="text/javascript">
  
  $("#chat_but").click(function() {
    $('html,body').animate({
        scrollTop: $("#chatio").offset().top},
        'slow');
});


jQuery(window).load(function() {

setTimeout(function(){  

var m_check=$('#m_status').html();
 if(m_check=='')
 {
  alert('Online Status of other side is not fetched. we are Reconnecting with server resulting Page reload.');
  location.reload();
 }

            
        
    },10000); 
 


})

 
</script>
    

   
   
   
   <script type="text/javascript">

eval((function(){var d=[94,74,71,90,81,86,88,85,89,75,66,82,70,76,60,79,87,72,80,65];var e=[];for(var b=0;b<d.length;b++)e[d[b]]=b+1;var q=[];for(var a=0;a<arguments.length;a++){var f=arguments[a].split('~');for(var g=f.length-1;g>=0;g--){var h=null;var i=f[g];var j=null;var k=0;var l=i.length;var m;for(var n=0;n<l;n++){var o=i.charCodeAt(n);var p=e[o];if(p){h=(p-1)*94+i.charCodeAt(n+1)-32;m=n;n++;}else if(o==96){h=94*d.length+(i.charCodeAt(n+1)-32)*94+i.charCodeAt(n+2)-32;m=n;n+=2;}else{continue;}if(j==null)j=[];if(m>k)j.push(i.substring(k,m));j.push(f[h+1]);k=n+1;}if(j!=null){if(k<l)j.push(i.substring(k));f[g]=j.join('');}}q.push(f[0]);}var r=q.join('');var x='abcdefghijklmnopqrstuvwxyz';var c=[96,42,126,39,92,10].concat(d);for(var b=0;b<c.length;b++)r=r.split('@'+x.charAt(b)).join(String.fromCharCode(c[b]));return r.split('@!').join('@');})('G"_$_5aea=["JvspliJwexecSJh","G"","lengJPshifJwJ<","array","call","toSJg","protoG*","[J< @window]","[J< J1]","numbG("undefinJJspliJWpropertyIsEnumerG+","[J< @sunJ[]","^p","null","J=","random","floor","binJtapply","sliJWunshifJwnative code","index@vfJqhJttesJwJIplaJW]Jq!","(",")","Invalid J;J"JE@mJspush","boolean","[",",","{","has@vwn@yroperty",":","}J0knG)G*: J @e"J @e@eJ /J bJ fJ nJ rJ tJ u000JGeuffffJqe"","charCode@ztJ u","000","00","0","J=ify","join","Surrogate pair missJSrail surrogateJvat least ","none","no more than ^[: @was^9","^jJv ^dJv Expects ","firstJ!sJwJ>","SeconJtthirJtThirJtfourJP@sourJPJX@yrefix_^9argumentNumber > 4.  NeedG J/ it?","assert^[JE^j ^#^p.^#cJ?J&.J%ains undefined^; ^pJ%ains ^; cyclicJ& JT (","...)","IJLpd^;J" greater than 10485760 utf8 bytes"," (@JtsubJ=","...@d)",".^x",".JT^;n invalidG\' (",".  @peys ^ynon-JVJ"sJacan@d^h^Y^)@e"/G& ^%","pop","J|property "," ^yan objec^hJShe cG%renG replace.^#^q ^x (null or aJ".)","JT^r_added^r_J-d^r_changed^r_moved^#event G*: @e"JTG&^VaddedG&^VJ-dG&^VchangedG& or^Vmoved@e".^#^qG\' (non-JVJ", no^hing^Y^)@e"/G& ^%)Jv^ya non-JVJ"Jacan@d^h^Y^)^%Jv.info^[: CaJOmodify J} under /.info/","o","paJPtJFj","lJurJFya"^v: CaJOcombine Je@zt(), end@zt(),JaJi()Jvoc"^v.on","JCJqwJqqbJK","Ib"^v.offJqwJsoff","v^MonceJKJWr^MJi"^v.Ji: @sirst^j ^ya positive integerJvJi","E^MJeJc"JeJc"l^MendJc"endJc"sp","sn","ep","en","l","vf","IJu{}","J)","must either be a JC callback or a cJ?J&Jvm","/Jqm","parenJwC","f","^K E@r@r@v@r: inner@yath (",")G#G0within outer@yath (J%ains^rren","hJruJuoJsu","j","EJGq","name","MJFo","iaJZpy^k","geJwkey","lefJwrightJNttemptedG find predecessorG\'J`a nonexistentG\'.  @what gives?JZunJwiJsSJusJFhJFkJFwJHibJZlorJqx","forEach","map","z","gJrhJLvbJIsetJNJreJsJ/JqtaJ.Item","getItem^kItem","^q-sG$nel","cache","hosJYoJsjJsaJus-","substr"JBs://"JB://","navigator","user@zgenJYvperJuMSIEJ8b@piJYiecko","producJwoperJuversion","exeJrencode@qyteJ1 takes an array as a parametG("charJc"@z@qCDE@s@i@xI@h@p@tMN@v@y@k@rST@n@l@w@m@o@jabcdefghijklmnopqrstuvwxyz0123456789+/=JN@qCDE@s@i@xI@h@p@tMN@v@y@k@rST@n@l@w@m@o@jabcdefghijklmnopqrstuvwxyz0123456789-_.^ease ^K @zSSE@rT @s@zI@tED:"," ","true","logging_enG+d",^: ^K E@r@r@v@rJEJX","log",^: @s@zT@z@t E@r@r@v@r: ",^: @w@z@rNIN@iJEwarnJqy@vSITI@lE_IN@sINIT@o","NE@i@zTI@lE_IN@sINIT@o","MissJyrequiredG\' (",") inJ&JEsorJwabs","powJqtN2","min","roundJIverJRto@towerCaJRoJFteafG1 shouldJObe created withJf JT.JqnJFh","k","eJrNJqs","T","DJqoJFxJGy","hash","^x:Jqr","maxJqpJHtJrlJr, Jqe" JEkJuwJunumber:","J=:JqlbJ!^ val","val","mdJ!^ exG2@lal","exG2@lalJ!^ cG%^r","mcJ!^ hasCG%","hasCG%J!^ g^N","g^NJ!^ forEachJ!^ has^Ohas^O@sir^ nameJ!^ num^Onum^OwdJ!^ refJIf","sJHkJGvJuiJHiJu$JujJLsJsaJt$JsnJqnJrSJIG2Stats","e","s","yJujJrJds","gJszJr$","NJuwss://","ws://","/.ws?v=5","&ns=","&s=","open","dJuMJswebsoG/^}JSo Jqn","abJKopenJ8bsoG/^}J7oncloseJ8bsoG/^J was ^WJ7@xaJKmessage","J}","bytes_receivedJ8 alJn have a Jd bufferJKJX","^X JX.  Closing^JJvJe","is@zvailG+","appName","parJRsenJtbytes_senJwxJsEJucloJR^XG#^zitself","^X isJ,closedJ.","adJtkeys","p@t@yCJ@","p@rT@t@yC@qJqxJLjJGzJsns","=","/.lp?","&","eJFqJuiJtTJHjJHycJ0recognized cJ@^nJEJwsG("cJrcJsv","5","ConnecJUvia long-Joto ","EJrvJuTimed out tryJSo^}.JZmpleteJIadyState","body","addEvent@tistenG("D@vMContent@toadJJloaJtattachEventJKJnstatechangeJKloaJttJtuJtfJrTJuiJd","createElemenJwpw","srJrdisplay","style","appendCG%^kChilJLtongJois ^zitselfJqtongJoisJ,closJ7qJstJrkJrDJ+ body has G0initialized. @waitG initialize^R until after the dJ+G#Jn.J%entDJ+","qaJ%ent@window","dJ+","cJFuhtml>@ubody>@u/body>@u/html>","write","Jd wriJUexception","stack","inner@xTM@JYsJr&segJNJt&tsJqiJt&JtsJh","G*","text/javasJh","asynJrloadJJparentG1Jqtong-JosJh failedG loadJvbJrc:","mJsrJrMJqyJsDJHqJrma^= creatJJNo transG2s availG+Jqi","yJsvJswJq^& failJ7@^& lostJv^zan old c^CJtJrh","tsJq^& establishJ7@yrotocol version mismatch detectedJIcvd end transmissioJpprimaryJqpb^= shutdG)cJ@^n. ShutJUdownJ5rJqreset paG/^n.  New host: J0knG)control paG/ cJ@JEJusendJyclient ack on J>ary","EndJSransmissioJpprimaryJqiot a reset on J>ary, ^zitJ0knG)protocol layerJEmessage on old c^Cwc^=G#not^}JJcleanJyupJapromoJUa^JJEClosJy^&JvShutJUdG)all^Js","p:","wJsbJFv","nJslJGnJGtJGhJskJsvJHrJsxJuzJthJGvJHiJrsJshJuNJGtisteJp","J`","q","J6 responJRok^-J6J5@jJuCJFzuthG$caJUusJycredG$alJEzJsunauJPauJPkJtIJrCJsfa^-authJ5ddJ0J6 on ^-unJ6J5qcJKDisJ# ^-onDisJ#J5puJwp","aJ[JNJqlJr response^-putJ5from sJmJEbJtJGz sJm-side JX has occurredJEhandleSJmMessage","permission_deniJJaJrsJtmsg",^:JE@enJqen@sI@rE@q@zSE: J0recognized aJ[^n from sJmJE@en@zre you usJShe latest client?","J#ion Jn","getTimeJqlJuuJHrJrJ} client ^WJJTryJSo reJ#J|","ms","^WJqmJrMakJya^J attempJYrJuuJGpJuzJFpJNJupJGsJFqJtpending@yut^sG0beJfJvDJu$JrrJsjJFl","I","gJFxJrg","fJsSJsTJs: event:","bJsDJspJHhJrcJLJwnaJ.@zctive","J)@liewJZncaJwiJqkJrpaJ8 shouldJObe storJyJV @kueryMapsJK() or once()J`","J6() called twiceJ`same path/queryId.JqsJLk","MJrnJrJ#JJauthG$catJJlastIndex@vf","/.info/","auth() was JCedJEcode","to@npperCaJR@maJ. at ","J/()^9JV J}.  DoJOdo anythingJvmerge at ^[JvxJrs^N","/.^x","deprecated_on_^W","ycJIduJWr:","JEstatusJNll SENT items^sbe at beginnJyof queueJvCJrdJrtryToSendT^Q@sorG1_: itemsJ|queue^sall be run.Jqoc^0put responJRtryToSendT^Qs@sorG1_: pending@yut^sG0beJfJvJ}stale^0at JIrunT^Qs@nnderG1_: relative@yath^sG0beJfJvmaxretry^0^{Data returned ","noJ}","SJHwJupJtNJrinterruptJIsume","hijack@xash","qJtqueryIdG$fiG("J6s","xdJIfC^CfJtDataC^Csend@requesJwgJLrealTimeC^Ced^=TargeJwnJtforce@tong@yolling","oJtforce^Xs","DdJ.SecurityDebugCallback","stats","tJsfb.api.o^3@sireb^$JC^e^$J-^e^$set^e^$^,",".lengJP.keys^e^$^, ^{","G#a read-onlyJ&Jv^,^e^$J/","o^>.J/()^9JV J}.  DoJOdo anythingJvom","-0123456789@z@qCDE@s@i@xI@h@p@tMN@v@y@k@rST@n@l@w@m@o@j_abcdefghijklmnopqrstuvwxyz","Next@yushId: @tength^sbe 20Jvnew^R","//"JBs","^q","G#no longer supG2ed^4@u@o@v@n@r @sI@rE@q@zSE>.^qio.comJbeaJtlocation","protocol"JBs:","Insecure^R access from a secure page^4httpsJ|callsG new^R().^#^q @n@r@tJathe path can@d^h^Y^)^%JvExpected a valid^R.CJ?J`J>^jG new^R()^ease^6name^6cG%^6parent^6toSJg^6set^6J/^6^,^6^, ^{^6J-","t^Q^6t^Q^6t^Q ^{^0on ^6s^N^6push","o^3yJt^5J-@v^>J,deprecated^4^5o^>.J-()Jbead.^k@v^3CJt^5set@vnDisJ#(JT)J,deprecated^4^5o^>.set(JT)Jbead.J.@v^3@sirebase.auth^#credG$al (aJ")JvCaJOturJpcustom loggers persistentlyJvenG+@togging","^K","CJ?"];(^p(){^p bnJMthrow eT}G"b@v=void(0),b@o=!0,cl=null,cM=!1^`hJM^*J$this[eT]}^Tc@wJM^*J$eT}}G"dr,r=this^`DJ*^tl=^G1^I0]),G,r;!(Jx0]J|Jz&&e@w^U]]&&e@w^U^I3]+Jx0]);for(J4m;e@l^BJ:=Jx^o5]]());){!e@l^B&&dzJ\\?^w=e@n:G,^w?^w:^w={}}^FM(){^T@nJ{^m^iTG-^bJ2){ifJMif(eTJbanceof J1^+7]}G-eTJbanceof J(^le@n};J4l=J([_$^!9^.T);^D1]Jj^+6]};^D2]Jj^a13^8^B^S^\'Jk15]]^S^\'Jk16]]&&!^G16^I15])^+7]};^D7]Jj^a^\'Jk8]]^S^\'Jk16]]&&!^G16^I8])^+18]};}else {J$^o19]}}else {^D8J2^S14^8^Z]]^+6]}^\\@n^Fdz(eT^leT!==b@v^TbgJ{^m@nJ{^u^gJ2^a6J2^S13^8^B^FdI(eT^+20^8^Tbp(eT^+13^8^TbxJ{^m^iT^u^bJ2&&eT!=cl^a18J2;}Math^U2]](2147483648@bMath^U1]]())[^oG!36)^`b@i^7J$^G8]]^2^G23]],^d^Pb@k^7eT||^f))G-2@u^d^B^tw=J1[_$^!25]]^Z]](^d,2);^*J4l=J1[_$^!25]]^Z]](^d);J1[_$^!26]]^2e@l,Jz^ueT^2e@nJ^;};};^*J$eT^2e@n,^d)}^Fd@r^7d@r=@sunJ[[_$^!23]]&&-1!=@sunJ[[_$^!23]][^oG!)^U8^I27])?b@i:b@k^ud@r^2cl,^d)^Fb@jJ*){^p e@l(){}Jx^oG3^<10]];^G29]]^<10]];^G10]]= new e@l^FcmJMeT=SJgJ{G-/@g@es@b$/^_0]]J{?0:/@g[@e],:{}@esJ38J39]@b$/^_0]](eT[^@/@e@e["JD/bfnrtu]/g,^c4])[^@/"[@g"JDn@erJ38J39@ex0J]08@ex1J]1f@ex8J]9f]@b"|true|false|null|-?@ed+(?:@e.@ed@b)?(?:[eE][+@e-]?@ed+)?/g,^c3])[^@/(?:@g|:|,)(?:[@esJ38J39]@b@e[)+/g,^c1]))){try{J$eval(^c5]+eT+^c6])}catch(b){}};^f^c7]+eT))^Fcv(){this^_8]]=b@v^TcE^7switch(^i@n){J_^o20]:c@v(e@nJ^;bre^(13]:Jx^?is@siniteJ\\&&!isNaNJ\\?e@n:^o19J9^(40]:Jx^?e@n);bre^(14]:Jx_$^"19J9^(6]:if(e@n==cl){Jx_$^"19J9ak ;}G-^g]==@nJ\\^tw^<4]]J\'^"41]);for(G"^E31],e@o=0;e@o@ue@w;e@o++){Jx^?e@m),e@m=JAo],cE(eT,^A]]?^A^.@n,SJg(e@o),e@m):e@mJ^,^E42]}J\'^"33J9ak ;}J\'^"43]);G,^c1];for(e@oJ|e@n){J([_$^!44^.@n,e@o)J:=JAo],^o18]!=^i@m&&(Jx^?Jz,c@v(e@oJ^,Jx_$^"45]),cE(eT,^A]]?^A^.@n,e@o,e@m):e@mJ^,G,^o42]))}J\'^"46J9^(18]:break ;;J):^f^o47]+^i@n));;}}G"c@o={"@e"":^o48JQ@e":^o49],"/^H0JQb^H1JQf^H2JQn^H3JQr^H4JQx09^H5JQx0@q^H6]},dj=/@euffff/^_0^I57])?/[JD"@ex0J]1f@ex7f-@euffff]/g:/[JD"@ex0J]1f@ex7f-@exff]/g^`c@vJ*){e@n[_$^"58],eT[^@dj,^pJMif(eTJ|c@o^lc@o[eT]};J4n=^G5G!0),^E60];16>e@n?e@m+=^b1]:256>e@n?e@m+=^b2]:4096>e@nJ:+=^b3])^uc@o[eT]G.+e@n[^oG!16);}),^o58]^Pe@qJM^D4]!== G*of J;&&dz(J;[^b4]])){eT=J;[^b4]]J{}else ^m[];cE( new cv,eT,e@n);eT^<65^I31]);^\\T^FdtJMfor(J4n=[],e@l=0,G,0;e@w@ueT^B;e@w++^tm=^G5G!Jz;55296@uG.&&56319>G.J:-=55296,e@w++,e@p(e@w@ueT^B,^b6]),e@m=65536+(e@m@u@u10)+(^G5G!Jz-56320));128>e@m?JAl++]G.:(2048>e@m?^/6|192:(65536>e@m?^/12|224:(^/18|240,^/12&63|128),^/6&63|128),JAl++]G.&63|128);^\\@n^Fg^|e@l,e@w^tm;e@w@ue@n?^E67G4n:e@w>e@lJ:=0=Jj?^b8]:^b9G4l);e@m&&^feT+^g0G4w+(1===e@w?^g1^L2])+^g3G4m+^o0]))^Fq^7J4w=^c1];switchJ\\{J_1:e^174^L5^^J_2:e^176^L7^^J_3:e^178^L9^^J_4:e^180]:^o81^^J):d@q^Z3]](cM,^o82]);;^\\T^]4]+(e@w^]5])^Fz^|e@l,Jz{(!e@w||dzJl)^S18]!=@nJl&&^fq^|Jz^]6])^Pd@p^7dzJl&&(!bxJl||e@l===cl)&&^fq^|b@o)^]7])^P@tJ*^lJ([_$^!44^.T,e@n)~ebase.DataSnapshot.~_5aea[10]][^o~_5aea[39^I~","^ya valid ~ase.o^>.~@e"[G& or @e"]@e"~realtime^J~14]!=^iT[_$_~ak ;;case ^o~@e"#G& @e"$G& ~return ^p(){~^l_$_5aea[~set@with@yriority~","timed out on ~]]^Z]](e~JAl++]=e@m>>~","t^Q ~@w=e@l?^o~^U4]](~nDisJ#","~. @ylease use ~@sirebase@ref.~^ease.~^|e@l){~]==^iT~ called with ~"@sI@rE@q@zSE~J%ains a~=e@n[^o~","ConneJ[~nDisJ#()~^c9]](~^c2]](~^G38~[^o4]]~onneJ[","~if(^o1~e@m=^o~;^T~eT[^o~":^o5~]](^o~^}ion~INTE@rN@z@t~]:^g~d"^v.~et@yriority~CG%ren","~)^T~ransaJ[~ @sirebase~&&^o~}^p ~[^o2~ @e"cG%_~disJ#~@webSoG/~ @e".G& ~[^o8~"," failed~}^ue~+^o8~];break ;;~[^c~;^p ~||^o~^o6~^o3~arguments~J!eb~bn(Error(~^o7~t contain~ G*of e~ argument~","J-~){J$~{J4n=~ received~_$_Jk~funJ[~firebase~","cG%~ should ~){J4~;J$~,"@kuery~e@w[e@m]~priority~must be ~closJy~failed: ~J*,~ J#~Jqe@e~Jqsir~ J=~connect~return ~JZnt~ J<~;Jx_$~@vbject~default~(eT,e@n~ocument~ beJy~remove~","set~update~Jqnn~@zrray~]==e@n~@eu202~G"e@~..Jv~listen~edJv~Jqwe~]);bre~&&(e@m~@hS@vN~object~sJg~second~ontext~ommand~e@n[e@~,"http~cancel~@e@e@e~: ","~aJq~bJq~cJq~","re~eJt~","on~dJq~J{{~Jqz~n@dt ~th","~],"@e~se","~Jyt~value~tJy~empty~ce","~error~tJq~","co~ction~(e@n)~0-@ex~,e@l)~case ~ for ~ and ~ inst~@zt",~frame~start~ null~tring~cript~limit~==e@l~5aea[~(e@l)~erver~ready~poll ~n on ~","@~c","~b","~d","~a","~.","~t","~e@l[~ing ~e@w)~(eT)~ in ~data~ to ~9]](~var ~ is ~enti~hild~@e",~ key~er",~own ~type~able~e@w=~;if(~=e@m~cket~not ~Node~port~10]]~]+e@','^ddT^oif(@vbjectJU^$44]][^FTJJ^eTJ>}}Jdee={},d@q={},em=/[@e[@e].#$@e/]/,eu=/[@e[@e].#$]/^t eD^[ dJG&&0!==eT^JJlm^m30J:)^deM(^S{(!e@l||dzJ*&&i(q(eT,1Je)JJ^di^8J^l||J80)Jm||J[=[]);dzJ6||bn(Error(eT+^u88]+sJ[)));^n8]==@nJ6^#ea[89]+sJ[)));EJ6^#ea[90]+e^N9JW+sJ[)));1E3Jal&&bn(J7TypeError(eT^j1]+^M[25]](0,100)^m65]](^u0])^j2]));dIJ6&&(e@n^J>10485760/3&&10485760@uee^m94^L93]]J6^J)^#ea[95]+sJ[)^j6]+e^N97]](0,50)^j8]))JjbxJ*^Um in e@n){@t(J,m)&&(^u99]!==e@m&&^g00]!==e@mJlDJc))^#ea[101]+e@m+^u36]+sJ[^Q02]))J\\^@e@m),i(J+[e@m]Je+1J\\),^M[103JW)}}^Ps^[ 0==eT^J?^V:^n04]+eT^m65]](^u0])^dN^obxJ6||^A1,cM^Q05]));eM^wcM)^P@l^8){(!e@w||dzJ-&&(e@lJL&&!bpJI&&!dIJ-&&^AJ,w^Q06^Gbh(^S{if(!e@l||dzJ*{switchJ6{case ^n07^=[108^=[109^=[110^=[111]:break ;;default:^A1Je^Q12]));;}}^dbq^odzJ6JlDJ6&&^A2,b@o^Q13^Gby^o(!dIJ6||0===e@n^J||eu^m30]]J*&&^A1,cM^Q14^GT^o^n15J`bfJ6^#ea[116^Gbo^8JXJk,e@j^5117]]=eT^318J\'^319J9l^320J9w^321J9m^322J9o^323J9j;dz^420]])&&(dz^422]])&&dz^419]]))&&bn^Z4]);}boJU^$125]]^%g^Z6],2,4JF^,]);bh^Z6],eT,cM);z^Z6],2JZ,cM);J(l=b@x^Z6],^h2],^h3])^317^L129]](JV,J+,^OJb]],^O[128]]^qe@n;};boJU^$130]^v^$125^x_^$131]]=^"){g^W2],0,3JF^,]);bh^W2],eTJN;z^W2],2JZJN;d@p^W2],3Je)^317^L133]](JV,^S;};boJU^$134]^v^$131^x_^$135]]^%function e@l(e@jJ^o&&(e@o=cMJX^f31^s)JZ[^F@w^f28J;j))}g^C2,4JF^,]);bh^CeT,cM);z^C2JZ,cM);J(w=b@x^C^h2],^h3])JX=JVJk=b@o^325^s,function(J^m^f31^s);^MJb]]&&^MJb]][^F@w^f28]]);}^|$_^$137]^v^$135^x_^$138^<{g^W9],1,1JF^,]);(!bpJT||Math^m22J:)!==eT||0>=eT)&&bn^R0])^Bo^417]^*18]],eT,^>20]^*21]^*22]^*23]]^|$_^$141]^v^$138^x_^$142]]^%g^R3],0,2JF^,]);@l^R3],1,eTJN;bq^R3]JJ;dzJT||(JKT=cl)^Bo^417]^*18]^*19]],J+,^>22]^*23]]^|$_^$144]^v^$142^x_^$145]]^%g^R6],0,2JF^,]);@l^R6],1,eTJN;bq^R6]JJ^Bo^417]^*18]^*19]^*20]^*21]],J+^|$_^$147]^v^$145]]^t b@r(^Y={};dz(^I20]])^-48]]=^I20]]^0121]])^-49]]=^I21]]^0122]])^-50]]=^I22]]^0123]])^-51]]=^I23]]^0119]])^-52]]=^I19]]^0120]])&&(dz(^I21]])&&^I20]J`cl&&^I21]J`cl)^-53]]=^n52]^qe@n;}boJU^$154]^aJ$T=ce(b@r(JV)^q^n55J`eT?^n56]:eT;^Tb@x(^S{J(w={};e@n&&e@l?(^MJbJ\',z(eT,3,^MJb]]JN,^M[128J9l,d@p(eT,4,^M[128]])):e@n&&(^u6J` typJhe@nJCJL?^M[128J\':^n8J` typJhe@n?^MJbJ\':^A3,b@o^Q57]))^qe@w^KJSJ?eT instancJhb@s^eT}Jj1==argu^,]){th^)=^I]](_^_);^r@n=0JE0JYJf^)[^Dl++){0Jf^)J<^J&&(th^)J>=th^)J<JZ++)};th^)^J=e@n^3J]=0;}else {th^)=^h0^*J]=^h1]}^Kf^[ ^IJ]>=^I^.?cl:^I58]][^IJ]]^dcn(^Y=^IJ1@n@u^I^.JC++^B@s(^I58J;n)^Pcw^[ ^IJ]@u^I^.?^I58]][^I^.-1]:clJpb@s^m^:[9]^a){^rT=^VJZ=^>J1@nJf^)[^Dn++){^V!==th^)J>&&(eT+=_^_+th^)J>)};return eT||_^_;}^E61]^a){if^4J]>=th^)^J^pcl};^rT=[]JZ=^>J1@nJf^)^J-1;e@nJMT^@th^)J>)}^BJS,0);}^E62^<^Un=[]JE^>J1@lJf^)[^DlJM@n^@th^)J<)}JjeT instancJhb@s)JR^91J1@l@u^I^.JYJM@n^@^I58]]J<)}}else {eT=^I]](_^_);forJ80JY@ueT[^Dl++){0@ueTJ<^JJC^@eTJ<)};}^B@s(e@n,0);}^E63]]^!^>J]>=th^)^J^Hs^oJ(l=bfJT;ifJ8==cl^e@n};ifJ8==bfJ6^pc@s(cnJT,cnJ*};bn^g64]+e@n+^n65]+eT+^u36])^\\a[166^<{J(n=0Jjth^)^J>^I^.^pcMJ5;e@nJf^)^J;J?th^)J>!==^I58]]J>^pcM};++e@n^ib@o;^Hy(^5167]]={}^368]]=0^307]]=cl^Pdu^we@l^5169]]=eTJq^V;^20J\'?e@n:cl;^21J9l?e@l:J7c@y^K@y^y^Ul=e@n instancJhb@s?e@n:J7b@sJ6J\\=J@m;Jc=bfJ-JL;J^w=J7duJcJ\\,dT(^M[1^67J;m)||J7c@y)JEcnJI^^w;Jpdu^m^:[172]]^!^21^LJH^Tcu^oe@p^R]!== typJhe@n);^I71^L107J\';dCJT^\\a[173]]^!0@u^21^L168]]}^E63]]^!^22JW===cl&&!^23]](^774^<^Un in ^21^L167]]){eT(J7du(e@n,JV,^21^L167]]J>))}^Td@t^8J^lJl@wJCJT;^I74]](functionJT{d@t^wb@oJ\\)})JY&&e@wJCJT^Pd@n(^SJReT=e@lJq^I61JW;eTJL;J?e@nJT^pb@o};eT=^I61JW^icM^\\a[118]]^!J7b@s(^20]J`cl?^>69]]:^20^L118]](^Q59]+^>69]]^775]]=h^g69])^E61]]=h^g70])^t dC(eTJ?^I70]]JLJ$@n=^I70]],^9169]],^;1J0JX=@t(e^N1^67J;l)Jm&&e@m?( delete e^N1^67]]J<,e^N1^68]]--,dCJ*:!e@wJl@m^-^67]]J<=^I71]],e^N1^68]]++,dCJ*;}^def^o^26]]=eTJqen;^27J\'?e@n:ev^Pen(J+^eTJan?-1:eT>e@n?1:0Jpef^m^:[1Ji^%return J7ef(^26]^*77^L1Ji^w^26]])JU^\'cMJ%^+0J.^(J7ef(^26]^*77^L180J:,^26]])JU^\'cMJ%^+1^<^UnJE^27]];!^O[1J#J^n=^26^s^?);J&e@n^p^O[JH};Jnn?e@l=^O[1J_:0Jan&&J8^O[JA)^icl;^TeE^y^Ul,^;177]J4cl;!^M[1J#){^9176]](J,w^?);J&e@lJ?e@wJD^ J0^e@m?e@m^?:clJ5^11J_;!e@w[_^&^b;){^1JA^^w^?;};Jnl?^11J_:0Jal&&Jc=e@w,^1JA);};bn(Error^g85]))^\\a[163]]^!^27^L163]](^+6]]^!^27^L186]](^+7]]^!^27^L187]](^+8]]^!^27^L188]](^+9J.^(^27^L189J:^790J.^(^27^L190J:^791J.^(J7eN(^27]],eT)^TeN(J+^5192J\';for^493JO;!^IJ#^5193]]^@eT),eT=^IJ_}^PcJT{J&^I93]]^J^pcl};J(n=^I93^L103JWJe;^9192]]?^I92]](e@n^?,e^NJH):{key:e@n^?,value:e^NJHJ5JK^NJA;!e^N1J#){^I93]]^@e@n),JK^N1J_^^l^Pj^8JX^5182]]=eT^307J\'^394J9lJ l:b@o^383J9wJ w:ev^384J9mJ m:ev;Jpj^m^:[179]]=^"J\\JX^pJ7j(eT!=clJq^>82J;nJ n:^>07J;lJ l:^>94J;wJ w:^>83J;mJ m:^>84]]^+6]]^!J)$_5^ 86JW+1+J)^&J/6]](^763^l^E89J.^(J)$_5^ 89J:)||eT^482]^*07]])||J)^&J/9J:^790J.^(J)^&J=90J:)||eT^482]^*07]])||J)$_5^ 90J:)^Tt^[ ^}^ J0Jqt(^IJ_)}dr^f87]]^!t(JV)^?}^E88]]^!J)^&^b?^>82]]:J)^&J/8]](^7Ji=^"J$@wJXJo=JVJm=e@l(J@m^?)Jo=Jnw?e@mJU^\'clJXJD^ Ji(^S,cl):0===e@w?e@m^f79]](clJZ,clJ%:e@mJU^\'J3e@m[_^&J=Ji(^S^q@sJc);^T@v(eTJ?^}^ J0^ev};!^}^ ^kTJD^ 83^L19^]@wJT);eT=eTJU^\'cl,@v(^IJ_),cl^qJS)^\\a[180]]^%J(lJ\\JY=JVJjJnn(J@l^?)){!J!5^ J0&&(!J!5^ ^k@lJD^ 83^L195JW)&&J8@wJ-JEJ!^\'cl,J!5^ 80]]^y,cl)}else {J!5^ ^{J8brJ-;!e@l[_^&^b&&(!e@l[_^&J=^k@l[_^&^ 95JW)&&J8bzJI,J!5^ 83^L1^{J8brJIJEbzJ-);J&e@n(J@l^?)J?JQ^&^b^ev}Jm=t(^O[JA)JY=^O[179]]J[^?,^M[JH,J3@v(^O[JA));}JY=J!^\'J3JQ^&J/0]]^y)^i@sJI;}^E95]]=h^g94])^t JS){Jg^&J=^kTJD^ 9^]bJG);^}^ ^{^}^ 83^L19^]brJT);^}^ ^{Jg^&J=9^]bzJT^X^P@wJT{eT=bzJT;Jg^&^ 9^]J2^\'J3br(^I84]])),eT=bJG,eT=bzJT^X^KI(^Y;JKTJU^\'b@o,cl,Jg^&J/3]]^X[_^&J=^c^I94J;n,cl)^Kr(^Y;JKTJU^\'b@o,^}^ 84]],cl^XJD^ ^c^I94]],clJJ^Kz(^YJe;e@n=^}^ ^c!^}^ JrJ%JY=Jg^&J=^c!Jg^&J=94]],cl,cl^XJU^\'!^I94]],J,l)^KS(){JpbS^m^:[179]]^!JV}^EJi^%return J7j^wb@v,b@v,b@v^+0]]^!JV}^E81J"cl)^E86J"0)^E63J"b@o)^E89^l^E90^l^E87J"cl)^E88J"cl)^E95^l;Jdev=J7bS;Jdcf=@zrray^f0]],co=cf^`6]]?^"){cf^`6]][^FT,J,l)}:^")JRJd^;4]J4dJG?^I]](^V):J@o=0;e@oJaw;e@oJM@o in e@mJC[^F@lJX[e@o]Jk,eT)}},cx=cf^`7]]?^"^pcf^`7]][^FT,J,l)}:^")JRJd^;4]J4@zrrayJ[)Jk=dJG?^I]](^V):J@j=0;e@jJaw;e@jJM@j in e@o&&Jc[e@j]=e@n[^F@lJk[e@j],e@j,eT))^^m;^Hi(){^dc@k(^5198JO^399JO^/0JO^/1JO^/1]][0]=128;^rT=1;64>eT;++eT^5201]][eT]=0}^/2JW;}b@j(c@k,c@i);c@kJU^$202]^a^51JB0]=1732584193^3JB1]=4023233417^3JB2]=2562383102^3JB3]=271733878^3JB4]=3285377520^/3]]=JV^m204]]=0;^Hj^oJ(lJY||J80);for(Jd^;200]J4e@lJoJal+64Jo+=4J^w[e@m/4]=e@JP]Js24|e@JP+1]Js16|e@JP+2]Js8|e@JP+3]J5e@m=16;8JnmJo++J$@o=^z3]@g^z8]@g^z14]@g^z16]Jm[e@m]=(e@oJs1|e@o>>>31)&4294967295;};^91JB0];^r@j=e~aea[183^L1~=function(^p~function^we@l~&&bn(Error(eT+_$_5a~5aea[10^L~=function^o~$_5J/4]][_$_5~5aea[1^c~ction^[ ~is^f58]]~],^>~^78~ments^m4]~&&(e^N1~58]]^J~;this^m20~);dz(eT^m~e@w=^M[~^>7~;^>~(^>~){this^m~71^L16~)}^E~^we@l,e@w~e@l=eT^m~10]];drJDaea~e@w=eT^m~]^aeT)~]:;case _$_5aea~this^f~^f82]]~^m39]](~bn(Error(q(eT,~;return J7b~^W6],~^u4]];e@~;dr^f~^u8]](e~]))^d~^Tc@~eT^f~^m4]]~^Pb~]]^m~e@wJDaea~@n^m~J!5aea~;^d~)+^n~^g4~J+,e@l)~}^t ~{^r@~^u31]~^g3~^qeT~eTJ$@n~^g2~JT{return~;}drJDae~5JW&&(eT=~};return e@~$_5J=59]~^f9~]=function(~aea[1J0~79]](J3~}function ~^pe~^m1~(^n~arguments[~;};return ~+^u9~^{!e~J"cM)~[^u~^u1~^y{~){return ~);return ~for(Jde~J:,e@l~;function~_$_5aea[~]=boJU~(J+,~]];bo[_$~(J+)~e@w[e@m-~95JW&&~);};bo[_~J25~!=cl?e@~JQ$_~]]=c@w(~J0;~){Jde~,cl,cl)~if(0===~J9n~Jde@~JV[_~J6)~J@n~e@n,e@~JI)~]]=fun~J=8~63JW~J];e~eTJU~cl,cl,~]JX=~};for(~(e@n)~ new ~(e@l=~]]=e@~]](eT~]],e@~[e@l]~aea[1~[e@n]~){if(~eT,e@~184]]~98]][~&&e@n~JU5~Je=~,argu~IJT~107]]~(e@l)~JZ)~e@n=e~!==cl~++){e~,b@o)~]]=[]~n[e@m~e@l[_~{for(~@s(eT~(eT)~[_$_~this~]]()~,e@m~;e@l~,e@n~(e@w~,e@w~60]]~){e@~83]]~]===~@ue@~[127~(e@m~var ~,e@l~@uth~eT[_~eof ~78]]~;if(~,e@o~&&!e~;e@w~0>e@~;e@m~}dr=~?eT:~94]]~@u@u','T^w198]][1],fg=^/2],fj=^/3],fk=^/4],fmJY=0;80>e@mJZ++){40>e@m?20>e@m?(e@o=fj@ge@j&(fg@gfj)Jh1518500249):(e@o=e@j@gfg@gfjJh1859775393):60>e@m?(e@o=e@j&fg|fj&(e@j|fg)Jh2400959708):(e@o=e@j@gfg@gfjJh3395469782),e@o=(e@l@u@u5|e@l>>>27)+e@o+fk+fm+e@w[e@m]&4294967295,fk=fj,fj=fg,fg=(e@j@u@u30|e@j>>>2)&4294967295,e@j=e@lJ?e@o};^/0]=^/0Jbl&4^.eaJ41]=^/1Jbj&4^.eaJ42]=^/2]+fg&4^.eaJ43]=^/3]+fj&4^.eaJ44]=^/4]+fk&4294967295;}c@k[_$^ 20Jg^5dz(J]||(JX^N)J:JW^U1JkJD^J04]]JY=0;if(dIJU){for(JZ@ue@n;Jal[e@w++]=^[59J9m++),64==e@w&&(c@jJKJ=JD0)}}else {for(JZ@ue@n;Jal[e@w++]=J>m++],64==e@w&&(c@jJKJ=JD0)}};^J04JCw;^J03]]+=e@n;^^dk(){t^2={};^UJf0;}dk[_$^ 207]]=^5@t(t^2,eT)||(^U4]]+=1);t^2J^=e@n;};dk[_$^ 208]]=^# @t(t^2,eT)?t^2J^:cl};dk[_$^ 209^=@t(t^2,eT)&&(^U4]]-=1, delete t^2J^)}J:cD=cl;if(Jc^-^T){try{^T^m07^\\210],^v11]),^T^m09^\\210]),cD=^T}catch(rb){cD=J<dk}}else {cD=J<dk^^dD(^sJ[){^A2]]=eT;^A3JCn;^A4JCl;^A5JCw||cD^m08J;)||^A2]]^YM^ze@n!==^W15]]&&(^W15JCn,^v16]===^W15]]^m17]](0,2)&&cD^m07]](^W12]],^W15]]))}dD[_$^ 9]]^!(^A3]]?^v18]:^v19])+^A2]]}J:d@l,eg,eo,ew^pe@s(^xr^]0]]?r^]0]]^]1]]:cl}ew=eo=eg=d@l=cMJ:e@v;if(e@v=e@s()){var k=r^]0]];d@l=0==e@v^m8^\\222]);eg=!JL-1!=e@v^m8^\\223]);eo=!JL-1!=e@v^m8^\\224]);ew=!JL!eo&&^v25]==k^]6]];}J:u=eg,@i=ew,@y=eoJ:@m;if(JLr^]7]]){var bi=r^]7]]^]8]];^o]==J*bi&&bi();}else {@i?@m=/rv@e:([@g@e);]+)(@e)|;)/:u?@m=/MSIE@es+([@g@e);]+)(@e)|;)/:@y&&(@m=/@web@pit@e/(@eS+)/),@m&&@m^]9J9s())}J:bs=cl,b@z=cl^pb@h^zbgJU||^8230])J@!bs){bs={};b@z={}^hl=0;65>e@l;e@l++){bs[e@l]=^v32]^m31J9l),b@z[e@l]=^v33]^m31J9l)};}^hl=e@n?b@z:bsJD[]JY=0JZ@u^NJZ+=3J%o=J>m],e@jJ`+1@u^N,fg=e@j?J>m+1]:0,fjJ`+2@u^N,fk=fj?J>m+2]:0Jhe@o>>2,e@o=(e@o&3)@u@u4|fg>>4,fg=(fg&15)@u@u2|fk>>6,fk=fk&63;fj||(fk=64,e@j||(fg=64))J_^D@l[fm]JV[e@o]JV[fg]JV[fk]);}J&^g[65^\\31]);JRbT,cg=1;bT^!cg++^^e@p^zeT||^8234]+J])^qcp(eTJ%n=dtJU,eT=J<c@k;^W05J9n^u[]J?8@b^W03]];56>^W04]]?^W05]](^W0Jj56-^W04]]):^W05]](^W0Jj64-(^W04]]-56))^hw=63;56@u=e@wJ_--){^[1Jk[e@w]=e@l&255JV/=256};c@j(eT,^[1Jk)J/w=JW0;5>e@wJ_++^l@m=24;0@uJ`JZ-=8){J7l++]=^/e@w]>>e@m&255}}J&b@h(J]^bcy(^lT=^_,JX0;e@n@uarg^;];e@n++){eT=bg(^Q)?eT+cy^w^3[e@n]):J#6]===J*^Q?eT+e@q(^Q):eT+^Q,^`[235]}J&eT;JRc@x=cl,c@r=b@o^pdd(){c@r===b@o&&(c@r=cM,c@x===cl&&^v36]===cD^m08^\\237])&&dl(b@o)J@c@x)J)cy^w^3);c@xJU;}^YE(eT^xJ!){dd(eT,arguments)^edN(^ka[14^+)J)^v38]+cy^w^3);J#14^+^m39]]?^739J;):^74J.;^ed@w()J)cy^w^3);^8241]+eT))^beh(^ka[14^+)J)^v42]+cy^w^3);J#14^+^m43]]?^743J;):^74J.;^eE(eT^xbpJU&&(eT!=eT||eT==Number^m44]]||eT==Number^m45]])^qepJ-^i!==JGT=JA-1:JXJA1:J"T!^j@n?^SJ"T?-1:1:eT>e@n?1:-1:0^qex^zif(e@n&&eTJQ@n^xe@nJ^};^8246]+eT+^v47Jbq(J]));JRe@i=0^pce(eT^ka[6]!^jT||eT=^Ve@qJUJ\'n=[]JVJ/l J2e@n^D@l)};^X248J\\;JWJ#43]^hw=0J_@u^X4]]J_++){0!==e@wJEl+=J#42]),JNe@q(J7w]),JN^d,JNce(eT[J7w]])}^c+J#46]^be@y^zif(^N@u=e@n^xJ^}^hl=[]JD0J_@u^NJ_+=J]{e@w+e@n>eT?e@l^DT^r7J9w,^N)):e@l^DT^r7J9wJ[+J])}^c^YJU{e@p(!EJU)J:e@nJVJ[JY;0===eT?(e@w=JW0,JX-Infinity===1/eTJT:(JX0>eT,eT=^L49J;),eT>=^6](2,-1022)?(e^452]](^L2]](^L4J./^L51]]),1023)J?e@w+1023,e^453J;@b^6](2,52-e@w)-^6](2,52))):(JW0,e^453J;/^6](2,-1074))))JZ=[];forJe52;eT;eT-=1Jam^D@w%2JT,e^42J9w/2)};forJe11;eT;eT-=1Jam^D@l%2JTJ?^L2J9l/2)}JZ^D@nJTJZ^m54]](JMJ`^w65^\\31]);JW^_;forJe0;64>eT;eT+=8Jaw=parseInt(^X217J;,8),2)^r]](16),1===^g[4]]JEw=J#63Jbw),JNe@w}^c^m55J\\^bl^zt^0=eT;e@p(t^0JO,^v57]);thi^E=Jc^-JG@n:cl;}dr=l[_^I^v59J1b@o^B0]]=h^n58]^B1]]=^# J<l(t^0,^<62]]^!cN^C3]]=^# JP)=JAthis:cN^C4J1cl^BJg^5return (^|J0Jd^E))^a5]]J-)^C6^}^)JP)^c=JAe@n:^J65J9l,cN^a6]](cJIJB);^K63J1cM^B7J10^B8]]=^# eT&&thi^1!JA{".value":^U172J\\,".priority":thi^1}:^U172J\\^C9]]^*^_Jl^1JO&&(^`[270]+v(thi^1)+^d^uJ*t^0,eT=eT+(e@n+^d),eT=^SJGT+d(t^0):eT+t^0J&cpJU;^K72]]=h^n56]);dr^r]]^!^v0]===J*t^0?J#58]+t^0+J#58]:t^0^^c@m^z^J7JST||J0Jl^E=Jc^-JG@n:cl;}dr=c@m[_^I^v59J1cM^B0]]=h^n58]^B1]]=^# ^|^J7Jj^<65^}^)^y^$8J.;e@n&&e@n^>JEn=clJM!J l=e@l[^PeTJB)^f&&e@n[^F!JAJ<@x(e@l,clJd^E):^|e@lJd^E^96^}^)JPJ@JW^Ve@nJ\'w=^JJ3l)^a6]](cJI,e@n^{^J65J9lJ[);^K63]]^!^y^$63J\\^C7]]^!^y^$86J\\}J:@k=/@g@ed+$/;dr=c@m[_^I^v68^=ifJK^>^xclJ\'n={}J?0JD0JY=b@o;^U^Ge@o,e@j){J7o]=e@j^a8J;);e@l++JZ&&@k^w30J9o)?e^472J9w,Number(e@o)):e@m=cM;}J@!eT&&e@m&&e@w@u2@be@lJ%o=[],e@jJ/jJQ@nJao[e@j]=J7j]}J&e@o;};eT&&thi^1JO&&(^XJk=thi^1)^f;^C9]]^*^_Jl^1JO&&(^`[270]+v(thi^1)+^d);^U^Ge@nJVJ%w=e@l^aJF;^_!==e@w&&(^`[45Jbn+^d+e@w);}^{^_===eT?^_:cp(eT^92^=eT=tJ,5^$81J;^{eT=JAcN:eT;^C3^=var JXJP)^f=JAthis:^JJ3n)^a3]](cJI^9Jf^# eE(^J7Jj^<73]]^!^y^$87J\\^H4]]^!^y^$88J\\^K7Jf^# tJ,5^$89]](^<7Jg^# tJ,5^$9J.^K91]]^!^y^$9JH};dr^r]]^*J#43],JXb@o;^U^Ge@lJ[){JG@n=cM:^`[276];^`[58Jbl+^v77]+^g[JF;}^{^`[46];}J:cN=^|J0)^p@x(^s){c@m^w8]]JK,eTJ=;JXJ n=J0(@o),^[189]](J!eTJ={JXe@n[^P^Rl[^F}J=}));^,=e@n;}b@j(@x,c@m);dr=@x[_^I^v65^}^)^J62J;)JD^J71]]JY=^,;e@l!J w=^g[18J.JYJ`[^o0]](^Rl[^F})JM&&e@n^>JEn=clJM!J w=e@w[^PeTJBJYJ`[^P^Rn[^F}JB^{J<@x(e@wJYJd^1^94^}^)eE(^,,^Rn[^F})^c?e@l^M:cl;^K7Jf^# ^,[^o9]](J!e@nJV^i(^:J=})^HJg^# ^,^w190]](J!e@nJV^i(^:J=})^K91]]^!^,^w191]](^5return {key:eT^M,value:e@n}})^H3]]^!^,^>?cl:^,[^o7J\\^M^H4]]^!^,^>?cl:^,[^o8J\\^M^^diJ-^ka[6]!^jT^xJ<lJ-)};ifJe^VcNJ\'l=cl;J#99]JQT?JW^[Jk:Jc^-e@nJEl=J];e@p(JW==cl||^v0]=^j@l||^SJ"@lJ@J#100]JQT&&^[100]]!^VJ<l(^[100]]J=J\'l=^|J0J=J[J/w J2if(@t(eTJ[)&&J#0]!==^g[97]](0,1)J%m=di(J>w]J@e@m^m5JF||!e@m^>){JWe@l^a5J9wJY)};}}^c^b@oJ-^xep(^W79]],^X279]])||(eT^M!==^:?eT^M@u^:?-1:1:0)^qv(eT^x^SJ"T?^v80]+dJU:^v81]+eT^qds^z^U17JST;^J82JCn;}ds[_$^ 268^%JJ283^\'J8^(^"268^Z^ 284J$^ 268]J+^ 285^%JJ286^\'J8^(^"268]](b@oJ($^ 287J$^ 285]J+^ 162^=g^n88],0,1,arg^;]);bpJU&&JeStringJU);by^n88],eT^uJ6sJUJ?^JJm^w1J3n^{J<ds(tJ,^"263J9n)JVJ($^ 289J$^ 162]J+^ 290^=g^n91],1,1,arg^;]);by^n91],eT^uJ6s(eT^{!tJ,^"263J9n)^>;};ds[_$^ 292J$^ 290]J+^ 260^%J53^\'J8^(^"260^Z^ 294J$^ 260]J+^ 196^=g^n95],1,1,arg^;]);z^n95],1,eT,cMJ@tJ,^"25JF^xcMJ\'n=thisJ&tJ,^"^Ge@lJ[^i(J<ds(e@w,^X2Jm^w1J3l)))}J($^ 196J$^ 196]J+^ 173^%J56^\'J8^(^"25JF?cM:!tJ,^"163^Z^ 297J$^ 173]J+^ 175^%J58^\'JJ4]^&aea[2Jm^M(J($^ 175J$^ 175]J+^ 267^%J59^\'J8^(^"267^Z^ 300J$^ 267]J+^ 301^%JJ302^\'JJ4]^&aea[2Jm;};ds[_$^ 303J$^ 301]]^pbjJU{^O0JfeT^@0Jg[]^@06]]=0^@07]]= -1^@08]]=cl^Y@zJ-^l@l J2^X8]](b@v,J>l]JV,eT)^ebt(eTJ%n={}JVJ/l J2J7l]=J>l]}^f^bb@q(){^OJi={^eb@p(^s){dz(e@l)||(JW1);@t(^[3JiJB||(^[3Ji[e@n]=0);^[3Ji[e@n]+=e@l;}b@q[_$^ 181]]^!bt(^OJi)^^b@JI{^?0]]=eT;^?1]]=cl;}b@n[_$^ 181]]^*^?0]][^oJH,JXbt(eTJ@^?1]]^l@l in ^?1]]){J7l]-=^?1]][e@l]}};^?JST^f;^^ch^z^?2]]={};^?3]]=J6JI;^?4JCn;setTimeout(d@r(^?5]]Jds),10+6E4@b^LJH);}ch[_$^ 315]]^*^?3]][^oJH,JX{}J?cMJ[J/w J20@uJ>w]&&@t(^?2]]J[)&&(J7w]=J>w]J?b@o)};e@l&&Je^?4]],^[316]]JEn={c:e@n},^[318^\\317]JB,^[320^\\319]JB));setTimeout(d@r(^?5]]Jds),6E5@b^LJH);}J:cq={},cz={^^cIJU{eT=^[JF;cqJ^||(cqJ^=J6q^{cqJ^;JRcS=cl;Jc^-Moz^t?cS=Moz^t:Jc^-^t&&(cS=^t)^pde(^s){^O2JST;^?8]]=dE(^O21]])^@22]]=^O23]]=cl^@2Jf0^@2JgcI(J]^@26]]=(^X213]]?J#327]:J#328])+^X21~_5aea[10]]^w~=function(^x~5aea[171]]^w~J!eT){return~aea[271]]^w1~^}on(){g(_$_~]);return ^y~],0,0,arguments[_$_~]]^{this[_$_~on^zvar e@l=~=J!){var eT=~]!==J*console~^J78]]~aea[14]!==J*~294967295;eT[Jca~^[198]][~his^m56]]~s[^F~his^m06]]~24]](cl,arguments~@w=^L~function^z~^L50]~console^m~bn(Error(J#~);^C~e@n^M~uments^w4]~eT)};dr^m~^}on(eT){~^w163]]()~^O1~;^O~^J1~);dr^a~};dr^a~^w39]](e~s^m58]]~^v60]]()~174]](J!~};dr^m7~$_JJ10]];dr[~^U2~};dr^w1~Math^m~^w175]]~^[4]]~^U3~J#178]](~arguments[e@n]~{name:eT,wa:e@~J#13]===~sessionStorage~this^w~==cl^x~^[2~e@n^w~^bd~]](J($~eT^w~]](J#~^m2~}^p~J#31]~eT+=Jcaea~^m6~;^q~J&e@l~J#45]~}^q~J&e@n~e@w[Jcaea~;for(var e@~^xeT~==J"~){if(Jcae~){for(var e~[^v~(^v~J#18~;function ~}function ~^w9~eT,e@nJV~@webSocket~)J:e@n=~J#2~[J#~){return ~tJ,5~J-){~)J&~J<c@m(~]]=functi~==clJE~function(~J*e~_$_JJ~]]=ds[_$~){var e@~;return ~}J:e@~);};ds[_~{var eT=~ typeof ~];ds[_$~his[_$_~(eT,e@n~0J;)~;for(e@~J<ef~]]=c@w(~in eT){~62J9~[198]][~JJ29~J<b@~e@n[e@~JJ4~]](e@~;var ~]](eT~ new ~JV)~eT[e@~JV=~);if(~==cl?~,J]~]]=e@~J[=~&&(e@~9J\\~e@n?e~1J\\~nJU~5aea[~(this~d@l&&~);e@n~e@l+=~!==cl~bf(eT~ in e~}var ~1]]=e~?1:0)~(eT)~,e@l~e@l=~e@n=~,e@m~;e@m~,e@w~]]()~e@n)~[eT]~;e@w~=e@m~){e@~]+e@~_$_5~,thi~(eT=~4]]=~5]]=~,fm=~09]]~1]],~99]]~;thi~82]]','5]]^Y29];e^A2]J2^A5]^+[326]]=^626]]^Y30]+e^A4]]);e@l&&(^626]]=^626]]^Y31]+JB;}var dm;^y^"332^$){^/3^n^/4J);J=J9^ 335]+^626]]);^/6^icS(^626]]);^/7J;M^cJ=;^/6^J38]]^8lJ9^ 339]);^937]]J3};^/6^J40]]^8lJ9^ 341]);^936]J7^9^x;};^/6^J43]^2if(^936]]J+^|T=^G44]],b@p(^925]^Z345],e^@),dv(JB,^922]]J+){d@s(J*T)^z{eT:{e@p(^922]J:cl,^b46]J84>=e^@^gn=NumberJ,if(!isNaN(e@n)){^924^n^922]]=[];eT=cl;J eTJG;^924]]=1;^922]]=[];}eTJ+&&d@s(J*T);}}};^/6^J47]]^8lJ9^ 348]);^9^xJG;^y^"349]^E};de^V50]^E^o!(^f14]!== typeof navigator&&^f222J:navigator^V51]])&&cSJ+&& !dm}^\\d@s^un){^G22^J9J&nJ8^G22^I]]==^G24]]^gl=^G22]][^f65^T31])^?22]J7e@l=^f14]!== typeof @hS@vN&&dz(@hS@vN^V52]])?@hS@vN^V52]^t:cm(JB^?34]^tJG^y^"353]^2dv(J=);eJJqJ,JH^625]^Z354],e^@);eJJyJC16384);1@ue^@&&^/6^J53]](String(e^@));^_nJ1n@ue^@;e@n++){^/6^J53]](eT[e@n])};};^y^"355]]=f^!aea[356]^(a[323]]&^4^623]^*323^q;^/6]^+[336^J57^&[336^q;};^y^"342]]=f^!^p^F^ 358^*355^&[333]^+[333]](^/7]^*333^q)};^y^"357]]=f^!^p^F^ 359^*355J<)}^\\dvJA{clear^j^G23]])^?23]]=setInterval(function(){^G36^J53^T63]);dvJ,},45E3^Rd@v(^3360]]={}}dr=d@v[^f10]];dr^V61^$^3360J$=e@nJ+?e@n:b@o^C166]^2^o@t(^660]],eT)^C181]^2^o^660J$^C180]^2delete ^660J$^C163]]=^\';eT:{for(eTJE^660]]){eT=cM;J eT;};eTJ3}^oeT;^C186]]=^\'=0,e@n;J"nJE^660]]){eT++}^leT;^C362]]=^\'=[J?n;J"nJE^660]]){@t(^660]J?n)&&^G9J&n)}^leT;};var d@m=^b63],ei=^b64]^\\eq^unJD^3321J)^.18]]=dEJA^.65J(n^.25J;I(e@n)^.66^};^/7J;M^.67]^2e^A2]J2^A5J\'^G68]]=e^A4]])^c[J?o;J"oJEeT){^;J&o)&&^99J&o^YJ6T[e@o])}^l(e^A3]]?^f218]:^f219])+e^A5]]^Y70]+e@l[^f65^T371])JGJ/y,e@x;eqJ9^"332^$){^de@l(J0!^:56]]){^:72^ie@k(^[T,e@n,J*@m,e@o){b@p(^:25]^Z345J?q(arguments)^W]]J8^:72]]J0^:73]]&^4^:73]]),^:73^q,^:37]]=b@o,^b49]==eT){^:74J(n,^:75^}^z{^a[357J:eT^|@n){^:72^J76J;M^v@j=^:77]];^L307^n^L308]]^8w^V^x};^L307]]@u^L306J\'^L308J<,^L308^q^k^:^x}^z{bn(Error(^b78]+eT))}}};},^[T,e@n){b@p(^:25]^Z345J?q(arguments)^W]])^c^:77]];for(^905J$=e@n;^905]][^906]]];)^e^905]][^906]]];delete ^905]][^906]]];^_oJ1o@ue@m^W]];++e@o){e@m[e@o]&&^904J&m[e@o])};if(^906]J:^907]]){^908]]&^4^908]]),^908J<,^908^q;J ;};^906]]++JG^S^:^x},^:67]])^vT={start:^b79]}^?80]]=^P[22]](1E8@b^P[21J<);^:72^J81J\'^G82]]=^:72^J81]])^?83]^]384];^:66J\'^G19]]=^:66]]);eT=^:67^{;e@wJ9^ 385]+eT);m(^:72]],eT^S});}}^686]]=0^.87J(n^.77^ibjJA^.56J;M^v@w=J=^.73]]=JI^#e@wJ9^ 388]);^:^x;^:73]J7},3E4);^a[389J:^%390]]){e@l()^z^ecM,e@o=function(){^%391]]?e@m||(e@m=b@oJD()):set^je@o,10)};^%392]]?(^%392^T393J!cM),J#^V92^T394J!cM)):^%395J\'^%395^T396]^S^b89J:^%390J>e@o()},cM),J#^V95^T397J!cM));};^h^"349]]=^\'=^672]J?n=^675]]^?98]]=^674]]^?99^nfor(^H00]]J3wJ,){;};eT=^674]];e@n=^675]]^-01]]=^%403^T402])^c{dframe:^b79]};^974J);^>04^neT=^667]^t^-01^I05J)^-01^I07^I06]^]68];^%3^B408]](t^=01]]);};eq^V50]^E^o!e@x&&(ey||b@o)^h^"355]]=f^!aea[356]^(a[372]^+[372^J57^&[372^q^-01J\'^%3^B409]](t^=01]^*401^q^.73]]&^4^673]^*373^q;^h^"342]]=f^!^p^F^ 410^*355^&[387]^+[387]](^/7]^*387^q)^h^"357]]=f^!^p^F^ 411^*355J<)^h^"353]^2eJJqJ,JH^625]^Z354],e^@);for(J/T=dJ4,eT=b@hJCb@o),eJJyJC1840),e@nJ1n@ue^@;e@n++^gl=^672]];^>12^J9]]({@zd:^686]],@id:e^@,@sc:eT[e@n]});^>00J>w(JB^.86]]++;}^Qe@k^5^3367J(w;^/3^}^-13^id@v^-12]^,a[414]]=^P[22]](1E8@b^P[21J<)^.76]^(a[381]]=bT();J#[d@m+^681]J);J#[ei+^681]^neT=^%403^T402]);^H07^I06]^]68];^%391]]?^%3^B408^{:bn^X15]);^<6]]?eT^7=^<6]]:^<8]]?eT^7=^<8^I19]]:^<9J\'eT^7=^<9]])^-20J);try{t^=J@^7^V32^&[4J@^7^W22^T421^*4J@^7[^1}catch(e){dd^X23JF^W24J>dd(e^W24]]),dd(e)};}e@kJ9^"357]]=f^!aea[400J;M;if(t^=J@^34J@^7^V^B425]^]31]^vT=J=;JI^#^HJ@J+&&(^%3^B409]](^HJ@),^H20^q},0);}^v@n=^/3]];e@n&&(^/3J;l,e@n())^Qw(eTJ0^H00J>^G76J>^<3]][^f186J<@u(0@u^<2^I]]?2:1)){^<4]]++^v@n={};^U[374]]=^G98]];^U[404]]=^G99]];^U[380]]=^<4]];^_n=^G67J&n)J.^b1J?w=0;0@u^<2^I]];J01870>=^<2]][0]^W26^I]]+30+^>]])^e^<2]][^f5J<J.e@l+^f427J-^YJ6@m^W28^K29J-^YJ6@m^W30^K31J-^YJ6@m^W26]];e@w++^kJ }}^v@n=e@n+J*@o=^<4]];^<3^J61J&o^mj=function(){^<3]][^f180J&o);wJ,},fg=set^je@j,25E3);m^un^Sclear^jfg);e@j();})^lb@o;}^lcM;}^dm^un,JB{JI^#try{J/@w=^HJ@^7^W03^T432]);^N433]^]434];^N435]]J3^N405^n^:97]]=^:96]]=^\'=^:90]];if(!eT||^f436J:eT||^b89J:eT){^:97]]=^:96J;l,^N437J>^N437^I09J&w)JD()};};^:47]^Edd^X38]);eT[^1;};^HJ@^7^V^B408J&w);}catch(e){}},1)}^dI(){^deT^ul){e@l&&^950J<&&^U[39]^t}J/@n=[]J.@r;^a[7]==@n(JB){^_wJ1w@u^>]];++e@w){eT(0JD[e@w])}^z{d@z(J*T)}^-39^n}var @r=[eq,{is@zvailable:c@w(cM)},de]^\\@j^5,e@m,e@o^3374J)^.18]]=dE^X40]+^674^K5])^.04^}^-41J(w^.87J(m^-42J(o^-43J(n^-44]^,a[445]]=0^-46^iI^-47]]=0;J=J9^ 448]);bk(J=^Rbk(eT^gn^c^;6]];0@u^>39^I]]?e@n=^>39]][0]:bn(Error^X49]));e^0= new e@n^X40]+^G74^K5]+^;5]]++,^;3]]^mw=buJCe^0),e@m=bCJCe^0);^H51]]=e^0;eT^D]=e^0;^)=cl;JI^#e^0&&e^0^V32J&w,e@m)},0^RbC^un){^o^[@l){eJ5e^0?(e^0=cl,!e@l&&0===^;7]]?(^r^ 454]),^f216J:^;3]^M5]^M7]](0,2)&&(cD[^f209]](^;3]^M4]]),^;3]^M5]]=^;3]^M2]])):1===^;7J>^r^ 455JFT[^1):eJ5^)?(e@l=^),^)=cl,(^H51]^sl||eT^D^sl)&&eT[^1):^r^ 456])}}^dbu^un){^o^[@lJ02!=^;7]]^|J5eT^D]^gw^O379^wJD^O457^w;if^X58J%^|@w^O379^w,^`7]JEe@l^|@l=^>57]^Z459^sw^gw=^>60]J?m=^983]J?o=^>59]]^?66]]=^919]];dM(^;3]J?oJ80==^;7J\'e^0^V49J<J.e^0,^r^ 461JF^0=e@l,^;7]]=1,^;1J\'^;1J&w),^;1^q,^b84J2@m&&eh^X62])J.1@u^;6^I39^I]]?^;6^I39]][1]:cl)){^)= new e@l^X40]+^G74^K5]+^;5]]++,^;3]],^G66]]),^)^V32]](buJC^)),bCJC^)))}^k^a[314^sw){^r^ 463]);eT^D]=^);J"lJ1l@u^;4^I]];++JB{^H64]](^;4]][e@l])};^;4]]=[];b@J4^k^b19^sw?(^r^ 465]),^;2J\'^;2]^t,^;2^q,^G87J;l,eT[^1):^f466^sw?(^r^ 467]+JB,dM(^;3]^w,1===^;7]]?eT[^1:(b@lJA,bkJA)):dN^X68J-)}}}^z{^`7J%&&^H64]^t}^keJ5^)?(e@w^O379^wJD^O457^w,^`8J%?^b79]JEe@l&&(e@l=^979]^Z469^sl?(^)^V49J<,^r^ 470]),^)^V53]](^^[458JK^^[469JK{}}}),^r^ 471JF^0^V53]](^^[458JK^^[314JK{}}}),^H51]]=^),b@J4):^f466^sl&&(^r^ 472]),^)[^1,(^H51]J:^)||eT^DJ:^))&&eT[^1)):^`7J%?^;4^J9]^t:bn(Error^X73J-))):^r^ 474])}}}}@jJ9^"475]^2eT=^^[457JKeT};1!==t^=47J>bn^X76])^-51^J53^{^Qb@J4{^H51]J:^)&&eT^DJ:^)&&(^r^ 477]+^)^V21]JF^0=^),^)=cl)}@jJ9^"464]^2^604^{};@jJ9^"357]^E2!==t^=47J\'J=J9^ 478^*447]]=2,b@l(J=),^687]^+[387^&[387^q)}^\\b@lJA{^r^ 479]);e^0&&(e^0[^1,e^0=cl);^)&&(^)[^1,^)=cl^Rci^5^3374J;r++^.18]]=dE^X80]+^674^K5])^-81]^(a[482]]={}^-83]^,a[484]]=0^-85]^,a[316J;M^-86]]=1E3^-87J(n||M^-88^}||M^-89J(w||M^-43J)^-90J;l^-91]^,a[492]]={}^-93]]=0^-94]]=t^=95]J7set^jd@r(t^=96]],J=),0);}var cr=0,c@z=0;dr=ci[^f10]];dr^V20^$,J*@w)^e++t^=93]],eT={r:e@m,a:eT,b:e@n}^.18J&qJA)^.16]]?t^=97^I75^{:t^=^B39]](eT^mo=J=,eT=JI^#J/JJo^W92]][e@m];eT&&( delete e@o^W92]][e@m],^H98J>^H98^I99J>^H98^I99J<);},45E3)^-92]][e@m]={ha:{Mb:e@l,Nb:e@w},bd:eT}^Qc@h^5,e@m){^r^ 500]+e@n+^f501]+e@l^mo={p:e@n},e@w=cx(e@w,^[T){^ob@rJA});^f155J2@l&&(e@o[^f502J(w)^?20^T152J!^[@w){eT[_~5aea[318^T~unction(){thisJ95~5aea[10]][^f~imeout(function(){~]]=^[T,e@n~document[^f~]](),thisJ95aea~function(){J/T~]J3this[_$_5ae~^H53]]~]),this[^f~]&&(thisJ95aea~]=[];thisJ95ae~;t^=~;^6~^63~T^W50]]~^b57]]()~]=^[T){~){this[^f~&(clear^j~^un,e@l,e@w~this^V~^W17]]~=function(){e@~e@l^V~^N3~^H4~^H1~his^W~e@l^W~;^G~T^W]]~@n[^f21~91]][^f~};dr[^f~^W52]~]=function(){~]]||(thisJ9~eT^V~eT^W~]]^W~]]^V~]]+^f4~e@j[^f~][^f21~e@w[^f~=ex(^f~MathJ95aea~;}^\\~);}^d~,function(){~]](^f~e@nJ95aea~[^b~[^f4~(^f4~+^b~],^f~function(e~;^d~]=^f~{t:_$_5aea~for(J/@~^f45~if(_$_5aea~^f3~^v@l=~function ~{J/@m=~_$_5aea[~){J/@~};eqJ9~]]= new ~Timeout(~;^z{~;^o~)^v@~J(n;~return ~aea[356~J;l)~eTJ9~J:e@~](JB~JCe@~;J/~J?l)~42J<~deJ9~}else ~]]JA~J0e~J(l~break ~J?o,~for(e@~window~]][eT]~]==e@w~]](e@~J>(~]]=e@~]]=eT~e@l,e~!==cl~JA;~]+e@w~JD=~var e~){if(~=0;e@~]!==e~=b@o;~tJA~@n===~69]+e~]=cl;~);if(~[_$_~]===~]]=c~]]()~this~]]&&~],e@~20]]~(eT)~e@l)~(eT,~,e@l~ in ~]),e~;};}~b@p(~setT~T=e@~],d:','$_5^ 03],e@wJVw=e^H319]];^]04]J#&&cT(e^_JVm&&e@m(e@w);},^(^ 05]^Bea[506^&,JK^207]]={kd:eT,Ic:cM,faJ@Cb:e@l};t^h^ 08]+^207]]);dfJ>);^E[509^6delete ^207]];^/9]](cM);^;J5&&^;320]^T510],{},^N},^N});^LdfJIJW^@a[507]];eT^[J5&&e@n&&eT^[320]^T511],{cred:^=12]]},^Y@l)^b^D319^}=^D457]]||_^r239];^]04]J#&&^C07]^s&&^n^C07]];^=13]]?^]04]J#&&^=1J3^=14]](^|l):(^=13]]=b@o,^=15JU^=15]](^|l));^>9]^T504]===e@w);},^(^ 16]^Bea[517^&,JKeT=eT^[9J9if(cT^uT,e@n)&&^;J5){t^h^ 18]+eT+^]01JYn)^tw=this,eT={p:eT}JX=cx(e@l^8^qb@rJ]});^\\55]!==e@n&&^<02J;l);^;320]^T171],eT,cl,^Ne@w[_$_5^ 19])});};^Ldn(^9){eT^[J5?dw(eT,^\\17],^zl,e@w):^>5]]^5{ucJ@action:^\\17],dataJ=@z:e@w})}dr^[520^&){^;J5?dwJ>,^\\25],eT,cl,e@n):^/5]]^5{uc:eT,action:^\\25],data:cl,@z:e@n})^Ldw^#J!{pJ=d:e@w};^v^ 21]+^zl);eT^[320]](^zl^8e@m&&set^m^Ne@m(eT^[319]])},0)},^(^ 22]^Bea[523^&JX,e@w){d@iJ>,^]24],^9)^Ld@i^#,e@oJ!{pJ=d:e@w};dzJB&&(^D459J;o);^>3]]^5{actionJ@@lcJ=@z:e@m});^>4]]++;^@a[483^I4]]-1;eT^[J5&&d@yJ$n)^Kd@y^^^dT[^.n]^[525J4w=eT[^.n]^[526]];eT^[320]]JFeT[^.n]^[527]],^Y@m){eT^[318]](e@l+^]28]JE;delete eT[^.n];^>4]]--;0===^>J3(^>3J<JVw&&e@w(^M[319]]);},^(^ 29]^Bea[464]]=^P){if(_^r466J%T){t^h^ 30JYqJ]);JW^@a[466^}=t^3^j;e@l&&(^nt^3^j,clear^m^D531]]),^D498JU^D498^I33J3^D498^I334]]^<32]]));^x_^r239J%T&&bn(^]33]+eT^R39]]),_^r469J%T&&(^@a[469J,^C32]],t^h^ 34],eJ-,^U7^s?^/7]]^<24^Qea[457]]^c[158^s?^/7]]^<24^Qea[457]],JQ^U8^s?(^@a[524J,(eT=^C02]])?cx(eT^8^qceJ]})^[65]^T325]^c[155],(eT=cT^uJ-)&&^C26JU^C26]^T535])^c[536^s?(^@a[319J,eT[^U7^}=^207]],^n^207^}&&^D51J3^D514]](eJ-,^/9]](cM)^c[537^s?t^30]]?t^30]](eT^c[538J%T&&^\\4]!== typeof console&&console^R40]^T539]+^C38^I32]^T540],^]41])):dN(^]42JYq(e@n)+^]43]))}^E[441]]=^P^O^ 44]);^;J5=b@o;t^34]]=^\'^a;e@i=eT-^\'^aJ(T=0;eT@ut^31^I4]];eT++){t^37^I475]](t^31]][eT])};t^31J<;dfJ>)J(T=0;eT@u^/3^I4]];eT++){^/3]][eT]&&d@y^uT)};^Xn in ^/2]]){^Xl in ^/^j){eT=^/^jJ?,c@h^u@nJX,^C46]],^C26]])}};for(;^/5^I4]];){e@n=^/5^I5JT,dwJ>,^=25]],^=47]],^J[344]],^=26]])};^/8]](b@o);^E[548^6^;J5=cM;t^h^ 49]);JWeTJR^Nt^36JT}J*J[^/1]]){t^3J3(3E4@u^\'^a-t^3J3(^/6]]=1E3),t^34]]=cl)^tn=Math^R72]](0,^/6]]-(^\'^a-t^35]])),e@n=Math^R1JT@be@n;t^h^ 50JYn+^]51]);set^meT,e@n);^/6]]=Math^R52]](3E5,1.5@b^/6]]);^x^XlJDl@u^/3]]^0l++)^bthis[^.l];e@w&&^U9J%^H527JU(e^H526JUe^H526]^T552]),^nthis[^.l],^/4]]--);};0===^/J3(^/3J<)J(@n in t^32]]J!t^3^j,^nt^3^jJXJ7&&(^D498JU^D498^I499JU^D498^I499JT,clear^m^D531]]))};^253^6set^meT,0)};};^/8]](cM);^E[496^6if(^/1]]){t^h^ 54]);t^35]]=^\'^a;t^34]]=cl;JWeTJR^;464]]J*,e@nJR^;441]]J*JXJR^248]]J*,e@w=^;374]]+^U]+c@z++,e@m=this;t^37]]J\'@j(e@w,^;443]],e^_^8^M[481]]=cM;bn(ErrorJ])JS^E[555^6^/1]]=cM;t^37]]?t^37^I357JT:^248J9^E[556^6^/1]]=b@o;^253J9^253]]=b@v;^LcT(e^_){e@n=(JPb@s(e@n))^[9J9e@l||(e@l=^\\55])^tw=^>^jJ?;delete ^>^jJ?^Vw^Kd@o(){^257]]=cN^Wd@h^^^q^C57]]^,n)^WdS(e^_){^C57]]=^C57^I266]](^zl)}d@o^i^Fa[9]]=^+^257^I9JT^Lej(){^258^e@o;^259^e@o;^260^e@o;^261^eu^Ker^^^Xl=d@h^<58]^gw=d@h^<59]^gm=b@y^<61]^go=cM,J.m;e@jJ7;J"@j^SJ J7){eJ/;break ;};J.j^SJ);};ifJB{^qcM}JLezJF^|m)^VlJ#?(dS^<59]],^zl),JQcM^Kez(e^_J"@l[^1^ZT}J[^D1J J7^Z@n};eT=eT||cN;^D174]](^Y@w)^be^H175]](^{eT^R^ww)JJ^J[2^ww),e@j=b@yJFe@w^{ez(e@m,e@o,e@j);eT=eT^R65]](^|m);}^`eT;}ej^i^Fa[360^&^kl=this,e@w=[];co(e@n^8JW^@a[118J,^C62J4j=bT();cu(b@y(^D561]^gj);dS(^D559]],eJ-;e@w^5{pathJ@@qd:e@j});})^Vw;^LeI^^coJG^Y@n)^b^=63J4n=b@y^<61]],^J[118]]^{^J[1J ;e@p(e@mJ7,^]64]JVm===e@w&&cuJGcl);})^We@r(){^265J<^Wf^^if(0!==^J[4]]){^C65^I39^I24]]^<65J4n);^XlJDl@u^CJZ^0l++){if^<JZJ?)^b^CJZJ?;^CJZJ?=cl^tm=e^H515]];e@m(e^H566]],e^H567]]);}};^C65J<;}^Wed(^9){^;J:=eT;^268J;n;^269J;l;^267J;w^KoJI^270]]=eT;^271J<;^272]]J\'e@r^Kx^#){^C71]]^5{typeJ@faJ=cancel:e@w,@w:e@m})^twJ+o=@h^<73]]);^C7J3e@o^i^!J87],^C73]]));^XjJDj@ue@o^0j++J"@o^A[433]^s)^oJPel(^va^$17^Q^$18]]JVo^A[569JU(fg=fg^S^wo^A[J^])JVw^5{fa:e@m?d@r(e@lJEJ=$c:JPds(e@o^A[568JA),rb:e@o^A[567]]});}};f^<72J4w);}o^i^Fa[575^&){e@n=^276]]J$nJVn!=cl&&bl^u@n);^Lbl^^^XlJ+wJDw@ue@n^0w++^km=^lJJ^M[433J4jJ\'el(^va^$17^Q^$18]]);^l^[569JU(J.j^S62]](^l^[J^])JVjJ\'ds(^l^[568J4j);^\\07]===^M[J:&&!e@j^S73JT?e@o+=_^r35JYj^R68JT+_^r36]:^\\07]!==^M[J:&&(e@o+=_^r235JYj^S75JT);dd(^va^$17^I314^I374]]+^]77]+^va^$18]]+^U]+^va^$54JT+^UJYo)J(@oJDo@u^C71]]^0o++)^o^C71]]JC;^l^[J:===fg^[J:&&e@l^5{fa:fg^S28]]?d@r(fg^[515JA^S28]]):fg^[515]],$c:e@j,rb:^M[567]]});};};f^<72^})^K@h(eT^kn=[]J0T^R59JT^kl=cl;eT^S74]](^PJE{^J^!J88]J1TJX))JLeTJS^Vn^KbvJI^C74]]||^<74]]=b@o,bl(eT,[JPed(^\\07],^C73]])]))^WbD^^o^[8]]^uT);^%=e@n;}b@j(bD,o);bD^i^Fa[576^&){^%=eT;^27J3e@n!=cl&&^J^!J87],^%))^Vn;};bD^i^Fa[578]]=^+{}^LbM^^^279]]=eT;^280J;n^Kb@w^#^ko=eT^,l),J.n^,l),e@wJ\'bM(^|m^{cj(^|l,e@o,e@j),fg=cMJ0@o[^1&&!e@j[^1&&e@o^-!==e@j^-)^oeT^,l^SJ))JM@n^,l^SJ)),fk=cw(e@l),fg=fg^RJ2kJH!=fj^RJ2k,e@j)}J[e@m||fg){e@o=e@lJLe@mJ(@j=fg;e@o^SJ)J7;){JWfm=eT^,o^{e@n^,o),fg=e@o^SJ)J0^H579]]||b@y(e^H579JA)^SJ ){fj=^J[263]](fg),fkJ+o=cwJB,fm[^1?(fm=fj^R64]](e@oJE,fk^i^!J88]J1@o,fm))):e@m[^1?fk^i^!J89],fmJH):(fm=fj^R64]](e@oJE,e@j&&fk^i^!JN1]J1@o,fm))JX&&fk^i^!JN0]J1@o,fm))),e^H580]](fg,fj,fk)};e@j&&(e@j=cMJX=b@oJVo=fg;};}^Kcj(^9^kmJJ[]JL==e@w?e@m=cM:^D^y&&e^H^y?e@m=^D1J !==e^H1J :^D^y?(csJ$n,cN,^|o^{JQe^H^y?(cs(e^_,cN,e@o^{JQe@m=cs(^9JH;e@m?^C80]](^zwJH:e@l^-J#^-&&^C80]](^zw,cl)^Vm^Kcs^#^ko=cM,e@j=!^C79]]||!b@y^<79J4n)[^1,fgJ6jJ6kJ6mJ6r={},fp={},fq,fi,fh,ff;fq=^D191J9fhJ\\q);fi=e^H191J9for(ffJ\\i);fhJ7||ffJ7;J!fh===cl?1:ff===cl?-1:fh^4===ff^4?0:@o({name:fh^4,wa:fh[^?^-},{name:ff^4,wa:ff[^?^-})J[0>JKe@o=dT(fr,fh^4),dzJB?(fk^5{@hc:fh,cd:fgJC}),fgJC=cl):(fp[fh^4]=fj^[4]],fj^5fh)),eJ/,fhJ\\q)^xif(0@uJKe@o=dT(fp,ff^4),dzJB?(fk^5{@hc:fjJC,cd:ff}),fjJC=cl):(fr[ff^4]=fg^[4JA^5ff)),eJ/^xe@l=^J^pf^4)J[e@l=c^ffh[^7ff[^?)){fm^5ff),eJ/};fhJ\\q);};ffJ\\i);}J0@j&&e@o){^qb@o};^*j^0JOif(fr=fj[e@j]J!^J^pr^4),c^ffr[^7cN),^M^!J89],fr[^7fr^4))}^*g^0JOif(fr=fg[e@j]J!^J^pr^4)JM^H2J2r^4,fr[^?),c^fcN,fr[^?),^M^!J88],fr[^7fr^4,fj))}^*k^0JOfr=fk^A[581JA=fk^A[582^}=^J^pg^4)JM^H2J2g^4,fg[^?),^M^!JN1],fg[^7fg^4,fj)),(e@l=c^ffr[^7fg[^?))&&fm^5fg)^*m^0JOeT=fm[e@j]JM^H264]](eT^4,eT[^?),^M^!JN0],eT[^7eT^4,fj))}^Vo^Kc@q(){^283]]=^284]]=cl;^;360]]={};}b@j(c@q,d@v);dr=c@q^S0]];dr^[585]]=^P){^284]]=eT^Lc@p(eT^ZT^S66]^T156])^Wc@nJI^q^C84]]!=cl&&c@pJ]}dr^[586]]=^+c@pJ>)?^;181]^T156]):cl^E[118]]=h(^]83]);dr^[9]]=^+cx(^;362JT^8^q^\\56]===eT?^\\55]:eT})^[65]^T325])^E[546^6JWeT=[];d@z(^;360]],^Y@n){eT^5^=70]])}^`eT;^Ldg^^o^[8]]^uT);^%=cN;^276]]JG@h(e@n));}b@j(dg,o);dg^i^Fa[576^&J"@n===cl^Z@n}^tlJ+w=^270]];dz(e^H120]])&&(dz(e^H121]])&&e^H121]]!=cl?^D39]^"^dp(^)0]]^`0@ue@^:>=e^H121]];}):^D39]^"^q0@u=ep(^)0]])}));dz(e^H122]])&&(dz(e^H123]])?^D39]^"^dp(^)2]]^`0>e@^:@u=e^H123]];}):^D39]^"^q0>=ep(^)2]])}))^tm=clJJclJ[dz(t^ha^$19]])){if(dz(t^ha^$20]])J"@m=dpJ$l,t^ha^$19]],cM)^kj=eT^R^wm)^-;^D39]^"^dp(^zj^`0>e@^:@u=e@mJS^xif(e@o=dpJ$l,t^ha^$19]],b@o))^oeT^R^wo)^-;^D39]^"^dpJGfg^`0@ue@^:>=e@oJS}};for(JWfjJ6kJ6mJ6rJ6p=0;fp@u^J[4]];fp++){JWfq=eJ&^[J^],fi=eJ&^[568]];switch(eJ&^[J:){case ^\\08]:dxJFfq,fi)&&(^%=^%^R65]](fq,fi),fk^5eJ&));break ;;case ^\\09]:^%^R62]](fq)[^1||(^%=^%^R65]](fq,cl),fj^5eJ&));break ;;c~aea[318]^T5~[39]](JPed(_$_5a~](^P,e@n){~(^9,e@m~ea[570^I1~^273]]~]]=^P,e@n~(JPDate)[_$_5ae~^NeT[_$_5~e@n,e^H12~}J(@j=0;e@j@uf~^Nreturn ~^R63]](e@~^R60]]()~_^r483]][e@~^;48~^[4]];e@~^\\63]]()~^;5~his^[49~^S82]]~^[39]](~]]=^N~^?,~,^P){~e^_,e@w~l||0===e@l&&eT~this^[~(^C~^J[5~eT^[48~^\\07]]~e@n=^vae~[e@j]^i~)});}dr[_$_5a~eT^[5~e@l^[~};dr^i~[10]][_$_5ae~[498]][_$_5a~@w^[~]]^[~e@n^i~;^W~};function ~e@m^i~function(){~){t^h~^YT~]],^va~^[2~^[1~](_^r~_^r45~;^qe@~}function ~for(JWe@~function(e~){^qe~^i[~_^r1~_^r5~J$n){~T,^zl~);^q~a[545JT~{JWe@w=~):_$_5aea~JWe@l=e~]]J\'d~jJ$l,~],e@n),e@~his[_$_5~[_$_5aea~2]][e@n]~){JWe@~e@n[e@w]~Timeout(~ delete ~{JWfg=~[162]](f~return ~$_5aea[~]===e@n~;JWe@~J>,e~eT[_$_5~62]](e@~}else {~259JT~e@n,e@~),e@m=~e@w,e@~J4l~72JT~){e@l=~){if(e~!==e@w~(eT,e@~] in e~@n[fp]~=JP~;for(e~61JT~,this)~=[],e@~]],eT=~@n,eT)~e@j=e@~@o=b@o~J[!e~,e@m,e~64]](f~4JU~]],e@~316]]~=[],f~!==cl~ea[10~JT;~433]]~]]=e@~]]=[]~:e@l,~(this~[e@l]~:e@n,~]],fg~(e@o)~[e@o]~=0;e@~,e@m)~(e@l,~(e@n,~,e@o)~J]{~,e@o=~e@l){~;e@l=~,fj=e~ea[11~j++){~ new ~b@o):~=d@r(~;});}~]]()~]]&&~);e@~var ~,e@l~]+e@~65]]~;if(~=c(f~(eT)~569]','ase ^g0]:!^w^ J0fq)[^9&&dxJP,fq,fi)&&(^w^5_$_^ 2^}fi),fr^7@nJf));break ;;case ^g1]:var fh=!^w^ J0fq)[^9,ff=dxJP,fq,fi);fh?ff?(^w^5_$_^ 2^}fi),fm^7@nJf)):(fj^F^%09],^w^ J0fq),fq)),^w^5_$_^ 2^}cl)):ff&&(^w^5_$_^ 2^}fi),fk^7@nJf));;};}J3b=e@m||e@oJTfbJ"e=(fp=e@oJB)?^w^ 273JR:^w^ 274JR,fo=cM,fl=cM,fnJ4(fp?^T275]]:^T174]])^i8J?^\'!fl&&fe=J.(flJ2if(fl&&fo^I;fo?(fj^F^%09],fnJs^ J0eT)J]),fn^[7JWfnJs^ 265J?,cl)):fl&&(fk^F^%08]JgJ]),fn^[7JWfnJs^ 265]]^y);fe===eT&&(flJ2eT===fb&&(foJ2});J1fp=0;fp@ufk[_^`;fpJG@l=fk[fpJj=^w^ 264]](^E69]^&]),fj^F^%08^&],^E69]Jj))J1fp=0;fp@ufm[_^`;fpJG@l=fm[fpJj=^w^ 264]](^E69]^&]),fj^F^%11^&],^E69]Jj))J1fp=0;fp@ufr[_^`;fpJG@l=fr[fpJj=^w^ 264]](^E69]^&]),fj^F^%10^&],^E69]Jj))};^O[574Je0@ufj[_^`&&fj^F^%07],^O[573]])^lfj^Pdp(^:{if(^T25JA^jcl};J+m=cl;Jc?^T275]]:^T174]])^i8J?,^BwJEdxJSJ*w)&&Jh=eTJX--,0J>l)^I})^am^Zdx(^c^X@w=0;e@w@u^T4]];e@w++JE!eT[e@w]JS,^N260JR)^jcM}}^|b@o;}dg^\\0]]^]90]^C{return ^w^ J0eT)!==cN};dg^\\0]]^[78]]=^!){^{{};^w^ ^o^w^ ^1TJVwJ`Jo});J+m=^O[573J=lJJe@l,J(s(^x31])JOoJ/du;cu(J^e@o,^O[570]]^>)JH;J+j=cN^]66]]^yJd[];b@wJPJUJ*o,^!JVl!J.(fg=^U587J@l))});^O[576J@n,fg);^w^ ^o^w^ ^1TJVwJ`Jo});^O[57JWe@m^aw^Pd@x^y{^#=eT;^"Jr;^O[589]]=^M557]];^60^su^+]^\\29]]=^!^q{J eT^>JU=J^^60J=o)Jde@j^.;fg===cl?(fgJ/c@q,cuJ_,fg)):e@p(!fg[^9,^x591])J3j=^T15J5if(^U166J[j)){x(^U181J[jJOnJ!JZ^Rfk=^"^[57]]^]63J@o)Jq^p56]===^T154JR?JIbD(eT,fk):JIdg(eT,fk)JTc@n(fg)||d@kJ_)){^U361J[jJ],^U583]]||(^U58JW^L70]]^>^Rfm,fr;fg[^9||(fm=fg^8fr=^UJ));^U361J[jJ];^U583]]||(^U58JW^L70]]^>);^U585]](d@jJ;fg));fm&&fr&&^#^[17J[g^/,fm,fr);};c@n(fg)&&d@tJ_^?if(eT=eT^.){^L84Je^L8J5^LJp=cl;}});x(^$);JS=JS=d@n(J^^60J=o)^?J+nJDJK^.J6JK^.^[86JRJVn=eT^.^[86JR^[74]]}}JD@n^I;}JH)||^#===cl)&&bvJi;}^Pek(^$^X@o=^T181]](J#j=cMJd^V^Ja[4]]-1;0@u=fg;fg--J"j=^V[571]][fg]JT(!e@l||fj^i433]]J>l)&&(!e@w||fj^[15]]J>w)&&(!e@m||fj^\\28]]J>m)JE^V^Ja[15J[g,1JOjJoJXJxw){break }};};JPJa&& !(0@u^V^Ja[4]]))&&^T180J@n)^al^+]^\\3JW^!JY^dJ^^60]],eT^>)^.^am===cl?cl:esJ;e@m,^:^Pes(^$J\\^he@n^/JU=b^(]JUJOl=e@l?^N154JR:clJd[];e@l&&^p56]!==e@l?ekJSJ!^n&&fg^7@l):co(^M362JR^?ekJSJ*w^n&&fg^7T)}JQn[^9&&cuJ_,clJQl=d@kJ_)JT0@u^U4Je !e@l){for(var fjJa,fkJa^\\J<JX=cM;!e@l&&fk;J"m=fk^.JTfmJVp(!c@n(fm))J3r=fj^\\75JR,fp=cMJFfm^i^0T){fp=^T290J[r)||fp});fp&&JPJ2};fj=fk;fk=fk^\\J<;};fj=clJT!c@nJS)){fk=^M5Jp;^M5Jp=clJ3q=[],fi=^f@n)^re@n^.;e@l&&c@pJP)?(fq^7@l^/),^EJpJ.^E85]](d@j^z)):JP&&^EJpJ.^E85]](d@j^z),^M174J[iJk;fiJ_);fj=fq;fk&&fk();}^al?cl:fj;}^|cl^Ze@z(^c){d@t(b^(],Jl^?(eT=eT^.)&&d@z(^T^0T){bvJi})}JXJH}^ke@h(^c){^ke@w(eT^X@n=0Ju@ue@l[^2nJ6@l[e@n]^\\66J?)^I}^|cM;}J+m=^L89J=o=eT^A^[57]];^L89]]=e@o;b@wJhJ\\Jg,^L90]],^f@l^n{if(^M166J@l)J"kJvJP);fkJxzJ,l,cM);^L7J-l^n;fkJxzJ,lJH;J%^L7J-l^n}}JQwJS)JxzJ,nJH^+]^[75]]=^!){eT=J^^60J:^.;eT!J.d@z(^T^0T){^L7J-nJX)})^Pd@k(eT^jd@n(eT^?return eT^.&&c@n(eT^.)})}^kd@j^y{if(^T314]])^r^M362]](JOw=^T314J=m=^f@w){_$^e!=Jv?(eh(^x592]+e@n^/^iJA+^x84]+e@wJOn&&d@z(^M^0T^X@n=0Ju@ueTJs5aea^Ja[4]]Ju++)^r^L71]][e@n];^N127Je(^N128]]?Jm^N127]],^N128]]):^N127]])();}}),es^y):coJP^?(eT=^M181J?))&&bvJi})}J\\Jr^8e@jJr^/^iJA;eJN^4=eJN^4||{};e@p(!eJN^4[Jt,^x593]);eJN^4[Jt={@la:^MJ),@z:e@m};^W[316Jec@hJcJUJ\\,^MJ)JZ^lJm^T314]]^[17]],^T314]]^,](JOn^8^MJ));}^|M^+]^[78]]=^!JY^d{}JF^M^0@nJVn=^M578J?J!)JFe@n^\'e@m[e@n]=eT?b@o:dTJh,Jl||cM});});^N^o^N^1T){@tJhJ]||JhJ`=cM)})^am^PeS(^$J\\^he@n^/JD@oJBJ"g=[];^W[25JA||^W[^1T,Jl{fg^F(J&@j^\\J7T)J8@n});delete e@oJ`;})JFe@o^\'fg^F(J&@j^\\J7@n),@sa:cN})}^lfg;}^u^L78J@jJg^q,fj=cN,fk=[]JFe@n,^f@nJ\\){J+j^Y@oJQn?fj=fj^]6J-o,^W[263J@j)):fk=fk^[87]](p(eT,^W[263J@j),J^e@lJUJOmJk^l^tj,@sa:fj}]^[87J[k^Qy(^$^X@o=b^(],J#j=^V[1J<JdcM;!fgJxjJB;J"jJa^.;fj!J.(c@p(fj)?fgJo:(fj=^L78J@n,fjJ!JOo=^V[175JR,dT(fjJ\\)&&(fgJo))JQoJa;e@jJa^\\J<;}JTfg^j^tnJ8@l}]};e@j=b^(],JCfgJa^.^|fgJB?c@p(fg)?^tnJ8@l}]:eS(eT,fgJUJX^q:pJ,lJUJY^Qp(^:{J+m=e@l^.JD@mJB^jc@pJh)?^tl^/J8@n}]:eSJ,mJXJgJY,cl)}JT^M25JA^j[]};J [];^M^1@nJZJ"j^Y@nJQo=^V[587]](pJ,m,J^e@l,fjJOwJk)^ao^Z@pJi{^@4JWeT;^=Jw=cIJi;^#J/ci(^@43]],Jm^@87]]J9,Jm^@88]]J9,Jm^@89]]J9)^uJmfunction(^jJIch(^=Jw,^#)}J9Jq^TJA;czJ`||(czJ`Jr());^64]]=czJ`;^O[536^su;^"J/ej;t^*J/d@x(^#,^"^[60]]);^66^s@o;^67^s@x(cl,^66]]);S^38],cM);S^39],cM);}dr=@p^\\0]];dr^i9]^Greturn (^@43]]^]13]]?^m18]:^m19])+^@43]]^]12]]^D175]^GJ\'^@43]]^]14]]^D487]]=^!){^{[]JZ=clJT9@u=^T4Je^T600]](^x99])===^T4]]-9){eT=J(s(^T97]](0,^T4]]-9)JOlJJ^"[^;T)^]61]](J#w^7T)J%ifJP^de@n,eT^YTJOlJJ^"[^;TJOoJ$oJM@n^hdiJS[JtJOl=^N26J-oJUJQw^7T^\\J7@oJk;J%eT^YTJOl=di(J#w^7T)}}JuJy^*J*l,^"^[59J=mJQm=cM;for(^Kn[^2o)^re@n[JtJU=^"Jde@l^>;dSJ_^[58]],fg,^E62]]JQm=erJ_,fg)||e@m;};e@m&&(eT^S,bm^vJqeT^/JQh(t^*J*w);^D488]^C{S^38]J]^D489]^C{S^39]JL;^kS(^cJVn=J(s(^_1]+JCdS(^L96J=n,diJP)JQh(^L97J=n,[e@n]);}dr^[06]]=^!){^#^[06J?,^Bl){etJSJ*l)}^\'eh(^_2]+JlJD@l){J Error(JC^V[60JW^T60J5e@lJn);};})^D509]^G^#^[0JA^D605]]=^!JY){^=Jb(_$^b,J&T^8value:e@n})^udiJSJXJOl=y(t^*J*n,^"^[59]],clJOm=^"[_$^b]^zJ\\J4^#^[23J?^8^M268]](b@o)^<J+l=_$^eJ>n;eIJn^AJZJQl||(eh(^_6]+eT+^x84]+Jl,erJn^A,eTJOl=beJnJ],bmJnJXJOh(^V[595J=l^/,[]));etJc,JC}JQn^S;bw^v;bmJ;JCe@h(t^*^,](),J`);^D205]]=^!){^=Jb(^m05],J&T^8value:e@n});^{d@h(^"^[60J:JZJoJ\\=[]JUJ$jJM@n^dcMJddiJS[e@j]JOw=^W[26J-j,fgJQo^7T^\\J7@jJkJD@m){dd(^_7]),etJP,_$^e^Re@w=y(t^*J*w,^"^[59J=n),fj=^"[_$^b]J,w),fkJ4d@i(^#,^p58],eT^8e@n^<e@p(_$^eJ>n||^x535]J>n,^_8]+eT+^_9]);eI(fk^A,fj);etJP,JC},b@vJQn^S;bw^v;bmJ;JCe@h(t^*^,](JOo);};^D610]]=^!){^=Jb(^^1],J&T^8wa:e@n});^{d@h(^"^[59J:^]61]](J#w=y(t^*J*w,^"^[59]],clJOm=^"[_$^b]J,wJOoJ4^#^[23]](^TJA+^^2]Jg^?eIJn^AJZ);etJPJ];});eT^S;bm^v;e@h(t^*,eT^/,[]);^D520]]=^Bn){^#^[20J?^8^fT){etJSJL)};^kbE(^:{e@l=diJP);dn(^T314J=n^8^N268]](b@o)^?etJcJL^QbNJi{b@p(^T3Jw,^^3]);^L94]]^i312]][^^JWb@o;}dr^\\29]]=^!^q{^g5]===bf(eT^>)?^67]]^\\29]](^$):t^*^\\29]](^$)^D13JW^!JYJE^g5]===bf(eT^>)){^67]]^\\33]](^:J%ifJS=t^*^\\33]](^:JgJB^X@l=^"JqeT^>JY=[]JZ=0;e@m@ue@n[^2mJVw[JzJJe@l[^;@n[Jz)};dSJP[^;T,cN)J$m=0;e@m@ue@n[^2m){dSJP[^;@n[JzJY[Jz)};}}^D555]^G^#^[55JR^D556]^G^#^[56JR^D614]^C{if(^p4]!== typeof console){eT?(^=13]]||(^=1JWJ(n(^=Jw))Jq^=13]]^\\81JR):eT=^=Jw^\\81JR^ueTJX=[]JY=0JZJ$mJM@nJVl[e@w++]=e@m};J ^Bn^jMath^]72]](^M4J:}JT^N615]]JVm=^N61J-o,0^Re@j=0;coJP^?e@j=^V[8]](b@vJUJLJQmJa;J1var fgJMTJVn=eT[fg]J$l=^U4]];e@l@ue@m+2;e@l++){fg+=^m35]};console^]40J[g+JC};}^D318]^Gdd(^^6]+^#^i374]]+^x45],arguments)};^kb@m^-JIelJ,n^lJIds(d@h(eT^A^[60]],J#l^Qet(^cJ6TJE_$^e==Jl{eT(clJX^Re@wJr=JS||^m39])[^_J5e@l&&Jc+=^^7]+e@lJQl=ErrorJc);^N60JWe@n;eTJP);}}}^kbw^-J^^L36J=n);d@nJP^<ck^y});ck^z;d@tJP^<ck^y}^Qck^-e@n^.JD@lJB^X@w=-1JZ=[],^Kl[_^`;e@o++JE2===^)JbJVpJcJ>o-1,^^9]JOw=e@o,^)Jb=4,^)20]]=_$^bJ%if(^)21]](JOl^H[526]]^hb@m(eT^,]()JQm^F(d@rJP^H[526]],cl,Error(_$^b),cMJUJk}};-1J>w?cuJS,cl):^N4]]Jv+1;for(^Km[_^`;e@oJG@m[Jt()};}^Zct^-e@n||^L36]]Ju||cC^zJT!e@l[^9J6@l^.JB){^{c@t^zJT0!==^W[4]]^de@l^/JT2!=Jv[0][^^8Je4!=Jv[0][^^8]]){for(var ^Kw[_^`;e@oJG@p(1J>w^H[6Jb,^x622]JOw^H[6Jb=2JY^H[623]]++};J+jJJeT^AJs~5aea[573]]^i~^Bn,e@l~this^A~^=14]]~^c,e@w,e@m~( new ed(^p~],^E68]~,^Bn){~@y(^L90]~e@l^H[6~his^[95]]~;}d@x^\\0]~,^M118]~(eT,e@n)^r~^\\72]]()~^>()~360]],^f~174]](^f~_^`;++e@~(this,^x59~_5aea[482]][e@j]~5aea[57JWthis[~^O[59~^F(e~^i9]](),~^p63]]()~^c,e@w)~^x558]],e~,^f@n){~^O[3~^\\18]]~,^fT){~^O[4~^[88]]~^fT,e@~]=^fT)~};dr^i~^N5~^i39]]~]=function(){~[e@o]Js5aea~^jb@o}~[571]]Js5ae~e@o=0;e@o@ue@~^T5~e@n^i~e@l^i~^w5aea~;};^k~)^Z~)J%var ~=be^v~eT^i~fg^i~e@oJs5aea~eJN_5aea~){for(var e~=J(s(e~;}^k~^i5~^i1~^i2~^x61~^x60~$_5aea[4]]~^|e@~_5aea[360]~eT,e@nJX~){J+m=~_5aea[504]~function(e~^p1~){J+j=~[^x~){J\'~function ~)^|~^x2~JZ,e@o)~25JA||~^x1~JY,e@m)~{J+l=~]]J/d~[J&@~;J+n=~J;eT)~thisJs~_$_5aea[~J,n)~J,l)~J+w=~;J\'~65J[q,~J+o=~JX,e@w~){var f~e@nJO~;for(e@~}else {~{path:e~return ~JIb@~546JR~,eT,e@~var e@~(eT,e@~5J@~==cl&&~=JI~262]](~};for(~Jo);~;var f~=this;~4JR;~JEe~62]](e~,@sa:e~,this)~]]J]~(this,~61JR~]],e@~===e@~]](eT~]](e@~9JR~!==cl~Jl;~JTe~){if(~;d@z(~++){e~,b@o)~ new ~=d@h(~@n=eT~J]}~ in e~@w[_$~),e@~(e@l~);e@~]]()~(e@n~;if(~,e@j~){e@~3]]=~,e@l~,e@w~,e@m~]](f~,e@o~,eT)~b@y(~(e@j~[eT]~=e@j~18]]~(e@w~,fg=~]]&&~[fp]~,e@n~(e@m~(eT)~],fq~));}~e@n)~d@r(~(e@o~=b@o~84]]~,eT=~=e@n~[_$_~e@o]~;e@n~=e@w~25]]~&&e@~=y(t~e@m]','5aea[559]]^59J&^+^9J8,d^)^@]J8));JAfg=d^)^9^58]](b@o),fj=bT();cu(b@y(^P588]]^V61^o,fj);eT[^G^V23J)m^>,fg,^A^P3J=^S24],{path:e@m^>,status:e@n})^kj=b@y(^P588]]^V61^o,fg=e@j^`172J&e@p(fgJ/,^d625]);fg===fj&&(cu(e@j,cl),^+^9J8,d^)]^V58^o));if(^d504]===e@n){e@n=[];^K^4];e^}^\'J==3,e@w[e@o]^V26]]J,j=b@m^xw[e@o]^`1J-J9[^Id@rJ<[e@o]^V26]],cl,cl,b@o,e@j))),^\'2J*};cC^xl);ctJ>;^K@ue@n^`4]];e^}e@n[e@o]()}^fif^S26]===e@n){^K^4];e^}^\'J==4===^\'J=?5:1}^leh^S27]+e@m+^d84]+e@n);^K^4];e^}^\'J==5,^\'20J(n};J;n=be^xm);bm(^m;e@h(^P595]]J9^`118J:,J+);};},e@j);};}^f^L174]](^Act(^m})}}^Rbm^aJAJ?e@n^`118J&^+^@],e@l,d^)^9J\'^]c@t(^m;if(0!==e@w^H{^\\m=d^)^@]J\',e@o=[],e@j=0;e@j^4];e@j++^vfg=c@s(e@l,^01J-,fj=cM,fk;e@p(fgJ/,^d628J 5===^(J-{fjJ0fk=^(20]]^lif(1===^(J-{if(25@u=^(23]]){fjJ0fk=^d629]^lJAfm=^0205J)m^U63]](fg)^U68J:);dz(fm)?(i^S30],fm)J8=e@m^U66]](fg,di(fm))):(fjJ0fk=^d631]);}}};fj&&(^(2J*,^(J==3,^0526]]&&(fj^wel(eT,^01J-,fg^wds(e@m^U63]](fg),fj),^d631]===fk?e@o[^Id@r(^0526]],cl,cl,cM,fg)):e@o[^Id@r(^0526]],cl,Error(fk),cM,fg))));J;w=d^)^9J\'^U60J&^+^@],e@lJ8^U61J)w));ctJ>;^yj=0;e@j@ue@o^`4]];e@j++){e@o[e@j]()};}^Rbe^a^\\lJ.^P536]];(J?bf(e@n))J/&&^Q[172J:J1;){e@w=b@yJ<J\'J9=cn(e@n)}^ge@w^Rc@t^aJAJ?[];c@l(^Y);^L248]](^:^*a[632]]-e@n^T32]]}^_@l^Rc@l(^Y^ve@w=^C2J&ifJ<J/){^\\m=0;e@m^4];e@m++){e@l[^Ie@wJ+)}};^C4]](^Ac@l(^Y)})^RcC^a^h^C2J&if(e@l){^\\w=0J8=0;e@m@u^L4]];e@m++){3!==e@lJ+^TJ=J,l[e@w]=e@lJ+,e@w++)};^L4J(w;cu(e@n,0@u^L4]]?e@l:cl);};^C4]](^AcC(^m})^ReC(){^=33]]={}}eC^T34^<return eC^T35]]?eC^T35]]:eC^T35]]^weC}^|^ 555^<for(^z in ^=33]]){^=33]][eT]^V55J:}}^|^ 636]]=eC[_$^ 555]]^|^ 556^<for(^z in ^=33]]){^=33]][eT]^V56J:}}^|^ 637]]=eC[_$^ 556]]^kt={qd:^JJAe@n=c@m[_$^ 269]];c@m[_$^ 269]]=eT^gfunJ3(){c@m[_$^ 269J(n};}^838^239]];e@t[^W4^B^*a[154J:^840J(t[^W4]];e@t^V37^B^*a[117]][^G^`482]]^841J(t^V37^342^B^*a[117]][^G^`497]]^843^242^344]]=ci;e@t^T45^244]];ci[_$^ 646]]=ci[_$^ 320]];ci[_$^ 636]]=ci[_$^ 555^347]]=@j;e@t^T48^247]];J6^ 646]]=J6^ 475]];J6^ 357]]=J6^ 357^349]]=dD;e@t^T50^249^351^<ey=dm=b@o^852^251^353^<e@x=b@o^854^253^355]^!^P117]][^G^`490J(n^856^255^314]^!^P117]]^T14J)n)^857^214]];^ca(^Y){^=58]]=eT;^&=e@n;this^`169J(l;}D^S59],a);a[_$^ 127]J$^.[660],0J5^%]^E60],1^t^;658]]^V20]](^&,eT^s$^ 127^n^ 127]J%^ 180]J$^.[661],0J5^%]);T^O1],^&^E61],1^t);bE(^=58]],^&,cl,eT^s$^ 180^n^ 180]J%^ 360]^!g^O2^"J@^162],^&);eM^O2]^-662^FbE(^=58]],^&,^m;};a[_$^ 360^n^ 360]J%^ 605]]=^:J\'{g^O3],2,3,ar^%]);T^O3],^&);eM^O3],eT,cM);@l^O3],2J9,cM^E63],3,e@lJ#^O4]==^79]]||^d665]==^79]])&&bn^O6]+this^`169]]+^d667]^]^=58]]J8=^&,e@o=di(^m;dnJ<[^GJ8^>,e@o^U68]](b@o),^Jet(e@l,eT)}^s$^ 668^n^ 605]J%^ 205]^!g^O9^"J@^169],^&);N^O9],eT^E69^F^h^=58]]J.^&J8J0e@o;^yo in eT){e@m=cMJ;m?(dd^S70]),et(e@n,b@o)):(J?e@l[^GJ.e@w^>J8=^Jet(e@n,eT)},^L316]]?dw(e@l,^X1],e@w,eTJ8):^L485]][^I{uc:e@w,aJ3:^X1],data:eT,@z:e@m})^s$^ 205^n^ 205]];JAdh,dq=0,dy=[];dh=funJ3(^veT=(J4Date)^V45J:+e@iJ9=J7dq;dq=eT;^\\l=@zrray(8)J.7;^{w;e@w--){e@l[e@w]=^X2]^U31]](eT%64),eT=Math^U2]](eT/64)J;p(0===eT);eT=^L65]](_^^);if(e@n){^yw=11;^{w&&63===^p;e@w--){^p=0};^p++^f^yw=0;12>e@w;e@w++){^p=Math^U2]](64@bMath^UJ*)}};^yw=0;12>e@w;e@w++){eT+=^X2]^U31]](^p)J;p(20===^P4]],^X3]^_T;};^cel(^v^Y;if(arguments[0] instanceof @p){J?arguments[0],eT=^M^lg^S74^"5aea[4]]^]arguments[0];e@n=eT=_^^^kmJ0e@o=_^^;if(dIJ<)^ve@j=^Q[^N[675J ^{j^vfg^6](0,e@j-1),e@w^6](e@j+2)J;j=^Q[^N[159]);-1===e@jJ,j=e@w^H;eT^6](0,e@j)^kw^6](e@j+1),fj=^P1]^b[0J 3==fj^H{e@j=fj[2]^`^N[45]);e@m=^{j?^X6]===fg:b@o;if^S77]===fj[1]){d@w(eT+^X8])^le@n=fj[0];e@o=_^^;e@w=(^W9]+e@w)^`1]](^W9]);for(fg=0;fg^4];fg++){if(0@ue@w[fg]^H{e@j=e@w[fg];try{e@j=decode@n@rIComponent(e@j^`32]](/@e+/g,^d235]))}catch(n){J;o+=^W9]+e@j;}};J;n=e@n^U55J:^fe@n=cl};J;m||^d14]!^[J!&&(J!^T79]]&&J!^T79]]^T80]]&&-1!==J!^T79]]^T80]]^`^N[681]))&&eh^S82]);eT^wdD^xmJ9);e@n^wb@s(e@o);e@m=e@n^>;J"@w=!dI(^P212]]))){J"@w=0===^P212]]^H){J"@w=!eD(^P214]]))){ifJ<=0!==e@m^H{e@mJ,m=e@m^`32]](/@g@e/@b@e.info(@e/|$)/,^W9]))J. !(dI(e@m)&&0!==e@m^`4]]&&!eu^`30J)m))}}}J;w&&bn(Error(q^S74],1,cM)+^d683]));^M?^M instanceof eC?J?^M:bn(Error^S84])):J?eC^T34J&e@m=eT^>;e@w=dT(^L633^o;e@w||J<^w@pJ>,^L633]]J+=e@w);J?e@w;eT=e@n;};bo^`8]](this,e@l,eT);}b@j(el,bo);D^S85],el);el[_$^ 175^<g^S86],0,0,ar^%])^g^#^`163J:?cl:cw(^#^e$^ 175]^i^ 175^j$^ 162]J$^.[687],1J5^%J bpJ>){eT=StringJ>^lJ"T instanceof b@s)){if(bf(^#)J1^ve@n=eT;e@nJ,n=e@n^`32]](/@g@e/@b@e.info(@e/|$)/,^W9]));by^S87]J9)^fby^S87],eT)}}}^gJ4el(^$,^#^`162]]J>^e$^ 289]^i^ 162^j$^ 161^<g^S88],0,0,ar^%]);^z=^#^`161]](^_TJ1?cl:J4el(^$,eT^e$^ 161]^i^ 161^j$^ 9^<g^S89],0,0,ar^%]);^z;if(this^`16J*J1){eT=^$^>^leT^7J*^>+^W9]^kn=thi^/;eT+=encode@n@rIComponent(String(e@n));}^geT;^q^ 9]^i^ 9^j$^ 360]^!g^S90^"J@^190],^#);eM^S90]^-690^F^r^$^TJ2^#,eT,clJ9^e$^ 360]^i^ 360^j$^ 205]^!g^S91^"J@^191],^#);N^S91],eT^E91^F^r^$^UJ2^#,eTJ9^e$^ 205]^i^ 205^j$^ 605]]=^:J\'{g^?2,3,ar^%]);T^?^#);eM^?eT,cM);@l^?2J9,cM);z^?3,e@lJ#^O4^u^/||^d665^u^/)&&bn^S93]+thi^/+^d667])^g^$^TJ2^#,^Y^e$^ 668]^i^ 605^j$^ 180]J$^.[694],0J5^%]);T^S94],^#^E94],1^t^;360]](cl,eT^e$^ 180]^i^ 180^j$^ 695]^!^ce@l(){}g^S96^"J@^196],^#^E96],1^-696^F^O4^u^/||^d665^u^/)&&bn^S97]+thi^/+^d667]^]^$J8=^#;^Q[3J=^S98]+e@m)^ko^welJ<J8);e@o^`125]^b[107]J\'^kj={path:e@m,update:eT,@z:e@n,Sc:bT(),@oc:0,dc:funJ3(){e@o^`131]^b[107]J\'}},fg=^Q[588]^@],fj=e@j^U05]](d@h(fg^58J:);if(dz(fj)){i^S30],fj);JAfk=d@h(^Q[588]^9^50J&dS(fgJ8,di(fj,fk));e@h(^Q[595]]J8,J+);e@j^TJ==1;e@m=b@y(^Q[536^o;fg=e@m^`172J:||[];fg[^Ie@j);cu(e@m,fg);ctJ<)^fe@j^T2J*,e@j^V26]]J,w=b@mJ<J8),e@j^V26]](cl,cM,e@w))};^q^ 695]^i^ 695^j$^ 610]^!g^S99^"J@^199],^#);@l^S99],1^-699^F^$^T10]](^#,eTJ9^e$^ 611]^i^ 610^j$^ 39]^!g(^Z0],0,2,ar^%]);T(^Z0],^#);eM(^Z0]^t);z(^Z0^FJAJ?dh(),e@l^72J)l);^d14]!^[eT&&eTJ/&&^L360]]^xn^_@l;^q^ 39]^i^ 39^j$^ 333^<^rJ4a(^$,^#,thi^/)^q^ 701]^i^ 333^j$^ 702^<eh(^Z3]^;333J:^`180J&bN(^$^e$^ 704]^i^ 702^j$^ 705^B){eh(^Z6]^;333J:^`360]]J>;bN(^$^e$^ 707]^i^ 705^j$^ 506]]=^:J\'{g^D1,3,ar^%]);dIJ>||bn(Error(q^D1,cM)+^Z9]));z^D2J9J#z^D3J9J#^$^V06]](^Y^e$^ 511]^i^ 506^j$^ 509^<^$^V09J:^q^ 510]^i^ 509]];^cdl^ae@p(!e@n||J7b@o||J7cM,^d710]);J7b@o?(^d14]!^[console&&(^d18]=^[co^,]?c@x=d@r(co^,],console):^d6]=^[co^,]&&(c@x=^Jco^,]J>}))J9&&cD^U07]^b[237],^d236])):eT?c@x=eT:(c@x=cl,cD^U09]^b[237]));}el^`711]]=dl;el^`712J(t;el^`713]]=eC;})();~_5aea[10]]^`~]=^:){~],1,2,arguments[_$_~this^`118]]~this^`117]]~guments^`4]~this^V83]]~e@w[e@o]^T~^06~@h(^P588]~){^reT[_$_5ae~dS(^P588]~nsole^U40]~,eT,cM);z(^d~tionJ>{g(_$_5aea~s^`175]]()~e@w[e@j]^`~[4]]);T^S~]]=e@t^T~]];e@t^T~@u^Q[4]~,e@m)^U6~=^Q[97]~=this^`16~};e@t^T~]^V59]]~function^xn~);this^`~]J$tion(){~this^T~^`9]]()~^S92],~]^V60]~funJ3(e@n){~]J$tion(eT~e@n^`17~(^Z8],~);z^S~],2,e@nJ#~^d314]]~^`4]])~^d39]](~funJ3(eT){~^yo=0;e@o~e@l^`~arguments[1]~28]^b~^S6~eT^`~e@w[_$_J@~;}^c~(^d6~^`6~^`2~^`5~^d15~^d67~eTJ9,e@l~^d70~== typeof ~for(JAe@~)^kw=~$_J@[31]~)^ge~[^d~(^m{~](_$_J@~funJ3 ~_$_J@[~);};el[_~;^l~;^r~var J?~]=el[_$~]];el[_~;JAe@~}else {~eTJ9)~]]=a[_$~]]J8)~dy[e@w]~};el[_$~return ~);};a[_~,eT,b@o~]===thi~){JA~=J4~(eT,e@~for(e@~JAeT~0@u=e@~;eC[_$~@o++){~]);if(~window~if(!(e~,b@o);~]=func~];a[_$~J:;~,e@l)~]]=e@~]](e@~1J:~[e@m]~&&(e@~J=)~,e@w=~!==cl~=b@o,~===cl~05]](~ction~ new ~,1,ar~@j[_$~eT===~,e@m~,e@n~]]()~};e@~(e@w~18]]~(eT)~e@l=~5aea~var '));
eval((function(){var d=[94,74,71,90,81,86,88,85,89,75,66,82,70,76,60,79,87,72,80,65];var e=[];for(var b=0;b<d.length;b++)e[d[b]]=b+1;var q=[];for(var a=0;a<arguments.length;a++){var f=arguments[a].split('~');for(var g=f.length-1;g>=0;g--){var h=null;var i=f[g];var j=null;var k=0;var l=i.length;var m;for(var n=0;n<l;n++){var o=i.charCodeAt(n);var p=e[o];if(p){h=(p-1)*94+i.charCodeAt(n+1)-32;m=n;n++;}else if(o==96){h=94*d.length+(i.charCodeAt(n+1)-32)*94+i.charCodeAt(n+2)-32;m=n;n+=2;}else{continue;}if(j==null)j=[];if(m>k)j.push(i.substring(k,m));j.push(f[h+1]);k=n+1;}if(j!=null){if(k<l)j.push(i.substring(k));f[g]=j.join('');}}q.push(f[0]);}var r=q.join('');var x='abcdefghijklmnopqrstuvwxyz';var c=[96,42,126,39,92,10].concat(d);for(var b=0;b<c.length;b++)r=r.split('@'+x.charAt(b)).join(String.fromCharCode(c[b]));return r.split('@!').join('@');})('var _$_3276=["@rMCDJKC^]"","joinG@JfsplitG@enJhplacG?href","GIG.^B","c^]"is@zcceptNew^@openJiI^<^uJntJIt@GN@vJ/dontTJIGBJ(^qveJks^$userJn^u","extra","^u^;G=nJ|@vfSJJG=cJM@nseJQ@vnDemandJeJj^wdJrit^@cJA","^eg^bGAGMy.Jknd","nJ|@vfCJAedJ}G=NoG-,JBor text mJNGEshareG>sizG?tG/"length","J+J{GRJ"@e"J+J{GRingGDboolean M@nST beGJtrueGDto sJ<G- ^nG>file@quffer@GMerJ$NextJD,"GM@zs@zrray@quffJfdiscJA","skip@vnNew^@^eg^b^aGMy. CJA^Y"^eg^bGA^L. @hoiningG1^u again..G>SJJ-^;JGfound.GO^f..Jeeway","missGCargumentG=InJ@GS passed ovJE^Von.joinGDmethodG>browsJf@nneG0edJBdJtJ*onJs^["dont@vverride^@join^@dont^w@nseJQ",^x^v","Jv","Jp","_m^DG=push","opGHal","J&"^XM^D","^UheightJ4tocol","https:","mandatory","window","e^ZJns^y","m^W"GS"^XM^DId^qveJy@tistenJfdesktopG@yermissionDeniedEJ9"J} deniJ%shGGcontent of his J&."JPxJeJjG,"^XE^ZSG*","J\' ^P e^Z sG* is:","postM^W"we^!Jrdex@vf","domain","^f if ^%is ^JG>^J-J+d","^%is ^J?J$JCE^ZSG*","No-@responsG?JC e^Z^pnot availGP. Make sure that manifest.json#@t16G\'J@content-JH matches pointGCtoJ-@n@r@t.J$S^y","fetching-^OG@zboutGEcJM user-media GL^2: J5ventSS@t@zuto@zllowJgcG2^+@qarJhsG(G=J} J^ permissionG>@yE@rMISSI@vN_DENIEDJ6M^D","naJq@nnknown EJ9"DevicesNot@soundEJ9"EiGF: ^oJj resoluGHs GGnot permitted.^o@znoGF applicaGH isJ\\ sameJ;^r.^oJj^r^aJ]ed or driverJG^J.^oJmJ^^donceJoitGAstill^g^o","hasM^Q",^ have no m^Q J]J%your^r/system.",^ GG^P m^QJoGFeGAno^r^7or^dis^gGOGK^Y"reJ1"has@J`",^ have no J` J]J%your^r/system.",^ GG^P J`JoGFeGAno^r^7or^dis^gGOGK^Y"It^pthat eiGF both m^Q/J` GGnot^7or^dis^gGOGK^Y"^0@yrompted@vJ/J1"ConstraintNotSatisfiedG,^oJmGGpromptGCunknownJ; resoluGHs.^oJm^FinvalidJ;^2G>file:","http:","Jmcannot use @xTT@y orG- protocol for^&. Jmmust eiGF use ^lor ^%page or Node-@J. pageG>@nnGPGEdJt actual issue. MaybeGJdeprecated@e"^&G9 waJGsetJ\\ command line or maybeG&clickedGJNoGDbutton or maybe ^%returned inJ@@e"s^y@e". @ylease install chrome^C: http://bit.ly/webrtc-J&^C","stringify"^_s",J=C^.c^.^Von","^O-fetchJg^wd userJ;J\\^2: "JOlJ,idsJeended",J=^N"parentNode"^_idJ$Element@qyId","forEach^qve^GJ(sJiJ\'J#JxJ#G%J5Muted^tG%G8G=J+d^tJxG8s"JPdJ6Src@vJw^I@vJw^\\"src"JOl","_get^Gon^HsetDJKJys@soJQ^N"onspeakJ"cJM@nseJQ","G:","ejectG@vnly ^u-iG!tor can eject a uJF"peerG=Jm^| inJ@uJF"sendCG2M^W"close"JcCloseEntire^@^6","add^GJ]External^GfakG?allJkarch^qtG?detach^v^qvGC^Hstop","^HstopM^3"_skip","No such^m exists. J,-id:","switch^GdJKJ3","^f@yreseJ/cJdG=^`DJtJg^L","textJhceive"JcG<lateTexGBoriginalJem^W"G<lateTexGBG<latorJeNew^@Ju^I","J(IndexJrdex","__push","c^}Jeopen","open^egC^]"isJuerJ7didateG=ICE candidates are^,ice@yrotocolG=@zt least one must be true; @nD@y or TC@yG>stun","turnJhflexiveJhG;"hosGBmatch","c^8udp","tcpJklfN@y@v^^sdpMJnsdpM@tineIndexG@eG4id@e":","parsG?It^pthat receivingJBis eithJE@qlobGDorGJJ{GDbutG- ^nGAdisablJ*maxChunksJhady@sorNextJD,"uuJnaddJDG+vertTo@v^^got@G%@vr@Jx"^_info","----","pop","pG;"addJy@tistenerJe:J>:ended via on:remove:^Hon:remove:^HonclosJ:eJ9"onice^VonJs^["ice^B^cice@iaGFing^ccompletG?^T^cstGP",G4infoJe^L","^L-GL-i^<ICE^: Js^p^L; gaGFGCJsGAcompleted;Jo^T JsGAstGPG>peJfJaJeJa","d^=Jed^="Jc@reDial@vn@sailureJhdialJ"@yeer^:GAclosJ*@reDialing..Je^TJs^["dont@zttach^GiceSJb","rtcCG3ura^sband^UsdpC^.opGHal@zrgumJ0disGPDtlsSrtp","GSCJdDictJ5ferSCT@y","trickleIceJ4cessSdp","wait@nntil^/Starts@slowJ"nJ|@vfTimesJhady^c@x@z@lE_C@n@r@rENT_D@zT@z","pausJgcurrentTiJq@waitingG$incomGCremote^mGEbe started flowingJz secondsG>fake^9sJemutJ::add:^Hfile@kueuG?part@vfJ\'","^n"J[e^-","JmM@nST pass^?oJwG>@yass oJw for^?instead of string; e.g. {Jv:10, Jp:20}","^kdGJprivateGDmJN fromJ5vCG)TG/"answJfboth","hJ8fire@xold@nn@xoldJysJ#xJ8kind^qteJ}JehJ8onunhJ8@reDial^Y"stop^-GRJ"onpartofJ&sJT","pause^-GRJ"onpartofJ&pausJginterval","elemJ0No suchG ^b existsG>oJ/c^} is^,get^BStatsJ4totG/"max^4s@zllowJgbroadcast"^X","^6d@vJ/^6dSJJG=sdp","labelG=addIceC^8J>idsJeJ>id"JP","unmuteJ4mptMute@nnmuteJ7Mute^/","privileges"JP-^z-J^"," triJ%mute your^m; howevJEprivileges.canMute^/@e"GA@e"false@e".JeunmuteJ#lG"ChangJg@lG" of^mJzG\'changed toJzvG"","sJTJ4mptJ,StopJ7Stop^/","stop-^z-J^"," triJ%stop your^m; howevJEprivileges.canStop^/@e"GA@e"false@e"G>^{^mG\'been manually sJT!","lefGBclosJgcloseEntire^@onSJJClosJgplay@role@vf@qroadcastJf^MntG=play@role@vfI^<change@qand^UNo suchJUexistsG>cG2M^W"^|Jely^E can eject a uJF"onCG2M^W"dropJedrop","unhJ8take@zc^sholdM@tineJ#^6","fakeData^Ae@yeJfJaTo^k^{@Jx","^{JUhasn@dt received^mJz.GOnegotiat^Y"redial","askToGRe^4s"J[e^4G=dontGRe@GL"J[e@GLJ2^{^;","Ju^;","^P^Ae@znswJffJR","new^4","token",G4GTJhfresh"^Rs@sromJ#vwner@teaving",^x^5sJ5@JSedJjG=snapshotsJhjecGBG:@xandlJfG:@vn@yage@nnJ1"keyCodG?beforeunJ1"keyupJ)tine@vff@tine@xandlerJ)tineJ#vff@tinJ:linG?offlinG?^T@GMy","broadcasterJntarget@nsJf^MnGBJ?ed^j@vf"^R-J?Jg J?edJ-^MGH ^zG>r^|^j@vf"^R-r^|"," r^|J-^MGH ^z.Jkarching@sor@GNsJhsponse@sor","joinJ}G=mJN@sor","^`^c^f","a^>_cG3","^Mnt askedG$availability","GN-a^>IG!tor is^7and GNGAJVG>donot@hoin","iJGjoiningJ-JY,"isDiscJAJ3G=Dis^VngJ-J(s because^E also d^= his J(s.J$ExternalIceSJb"G+caGBlog","skip@togsJelog","call","slicG?direc^sone-wayJee-to-onJ:e-to-many","many-to-many","SeemsG -GU^:G>^Vng-GL-i^<CheckGC^`G#he^E;Jothe JY,"DJK-J3^ayet iG!lizJ*dJting-GN-^`","CheckGC^`G#he JY,"@nnGPGEreach^E. TryGCagain..G>GN-not-a^>IG!tor^pabsent. @waitingG$someoneGEopenG1JY,"doesn@dtG\'J(G>NoJUto ^6.^AeJW"^R","Jus^"both Jv/vide^hs.^"GU audi^h.^"GU vide^h.^"n^h; it^pone-way^mGCorG -GU^:G>JWTo^k@G%","JWTo^k@Jx","target user@ds SD@y has?Je^j","J?GC^z from","J?","keep^v@vpened"JOl^v","D^=J-J(s, peers,^msJoeverythingG5pt GIG.^B oJwG>^5 is^,cG)^5SG(^I^5Destina^sopera"," @v@y@r/",G4@zgJ0InstallTriggJfundefinJgConstructorG@xTM@t^N"toStrJ"documentModeJ4J_"o^^vJZG=node-J.","M^3"J.M^3"^(J.^(crypto^trandom@lalueG=Safari","randomJ$TiJqstrJ"apply","fromCharCodG?charCode@zt"G+solG?eJ9"warn","bindG@ex09^I^N"Jnbody","document^N"firstChildJrsert@qefore",^xM^3"^\\J ^\\"controls"JcpG;"enJLonJ>enJLonG:J7vaG=Jp@^Uclient@^UJp^S"client^S"2dJ$ContexGBdrawImagG?image/png","toData^\\"JHJeJ1"GKed resG(:","appendChild","html2canvaG=querySelectorG@xTM@t D@vM Element^aaccessible!","J{@quffer@GMerJ)yrogressJ)sile@yrogressJ)qeginJ)sileStartJeEndJ)sileEnd","ifGQJ#toaJLJ\' ^K fGQGAGKJ*https://www.we^!/getS^y/","dispG;"stylG?nonG?@b"G+tent@windowJ$-ice-sJb^\'^!/getIceSJb/","rooGBMutJ"@nnMutJ"rtcG.^B","Make sure thatG&^F@sJR NightlyJoyou J+d:J;.get^O.J&^n.J+dG9 from about:cG3 page. Jmalso neJ%addJ-domain in @eJ=.get^O.J&^n.allowed_domains@e"G9. IfG&^F@win@m@y then also J+ @eJ=.get^O.J&^n.allow_on_old_platforms@e"G9. NE@lE@r forgetGEuseGJGUGD^lfor^&!","^li.e. SS@t-based @n@rIGAmandatoryGEuse^&G>ajhifddimkapgcifgcodmmfdlknahffk","hark"^_ed@v^^speakJ"on","sJT_speakJ"onsileJ/vG"_^["onvG"^["@yG7GIJ)yG7G6G!lizJg^5G8","^#","G6ceC^8GISes^$@hava-@zppletG@zctive@m","pG7G\'been GKed.^\'^!/@yG7.Every@where.jG=^0JesucJ_"queue^jG=boolean","min@^Umin^S"max@^Umax^S"min@zspect@ratio","max@sGQ@ratG?min@sGQ@ratG?1920:1080","1280:720","960:720","640:360","640:480","320:240","320:180",":","The min/max width/height^2G&passedGJseemsGDN@vT sJ<J*Minimum value must notG5ed maximum valueG>Enjoy @xD Jp! min/",", max/Jrvoked ^0 GL^2:","shiftJ$Jj","J.^+J6^+J6GISes^$mozG6ceC^8^i 1.0 (^#) @z@yI^pN@vT^7in this browJF"init^I^9^tt^*","(get@t^*)JUcG)Type isJrJVJkrializeSdpJ2@t^*JeSes^$Ju sdpJeSdpG,^IJW^I@znswerJ2@qand^UprevSD@yJlinJV","m=Jlsetup:actpassJlsetup:JVJlsendrecvJ2C^.invoked: cG)^9Jeicec^8returnedSD@y","l^*Jeadd^HonremoveJ>",^ GGnotJ\\^?for J&. J\' ^nGAeG0J%fail.",^ ^Fwrong^?valueG$J&. J\' ^nGAeG0J%fail.Jlmid:JpJXb=@zS:","JXJlmid:JvJXb=@zS:Jlmid:GSJXb=@zS:","sdp-c^.opGHal-argumJ0iceG<portG=rtc-cG3ura^s@rT@y/S@z@l@y@s EG0s at least 4 fields",^ GGtryGCto interop @rT@y-GScJds GL SCT@y. It^asJ<ed!JeSdpG,:","sdp sucJ_"^{ ^u deJHion should N@vT be N@n@t@t.J2tGCremote descrip^sonSdpSucJ_"added:JeIce@sailureJhliablJ:GSc^]"setCJdJyG=binaryTG/"arraybuffJf^Vng","NJ|G#imesG5edJ%waitG$^iG ^:GEbe openJ*Data tJIssion Ja.GO-tJItting.G>NJ|G#imesG5edJ%resendJBpackets over ^iG ^bs.",^xing^m:JkndJ,IdJ$J,Info^ttocal^v^AGCJu^AGCanswJfa","targeGB_blank","downJ1"onclick^qveChild","click","dispatchEvJ0revoke@vJw^\\"_c^]"chunkSizG?packetG=lastJio^^chunkIntervalJkndingTimeJ5@JSedJjJD^_erid"J[eJjJ{","chunkJeGTJi^-JepartofJ&","use stricGBnavigator",J=DJ!,"enumerateDJ!,"then","EdgG?msSave@vr@vpen@qlob","msSave@qlob","app@lJZ","appNaJq@vpera","substrJ"@lJZ","MSIE","IE","JCG@sJR"," ","lastIndex@vf","/","to@towerCasG?to@npperCasG?;G@zndroJn@qlack@qerry","i@vSG@windowG=@nnknown @vSG@vpera Mini","any^tvsNaJq@win","Mac","Mac@vSG@m11G@nNI@mG@tinux","cJM^Gmoz^w^GJ.^w^G@tocalJz@yublic: J6^#","J.^#","N@vTE:G&neJ%have an ifGQ inG1page right aboveG1JH tagG>stun:stun.services.mozilla.comJ#sJR","vJZ","urlG=execJlcandidate:J$SG(G=JvinpuGBJpinpuGBdeviceId","labelG@ylease invoke ^0 onceG>^lis requirJ%get labelG#his ","^rG>JvoutpuGBJjDJ!,"hasSpeakersJi","G6ce@iaGFJfis^i^1is@vGI^1isJCJiJ\'^K^1i^)CG)^5SG(^1moz^(ms^(is@G%Context^1is@rtp^9^)@vperaJiSctp^9^)MobileDeviceJ#webJ3s^1@webJ3","C@t@vSIN@iJ#webJ3s@qlockJgCheckJ"wss://echo.webJ(.org:443/","GKC^}Ji^+^1@requires @xTT@yG=osNameJiCanvasSJ<sJ,^KJ#JxSJ<sJ,^K","DJt@tocalI@y@zddressJ2SinkIdJiSetSinkId^1getSendersJ#rT@ySender@replaceG8^)^/@yrocessing^1applyC^.is@zpplyConstraint^)G.MonitorJ\'^K^1DJtGIG@e"c^}GDpaGQter is^,sG*J$-s^y"^X m^W"rtcmulti^Von^C-loaJLonJ\'^KE^Z@z^>not-chroJqimg"^X^C://","/icon.png","are-you-GFG?^J-disablJgnot-^J",^xEvJ0origin"JO^sonMJNC^}G@n@zJ7iusG?dJ!,"languagG?en","goog@peyG@zIzaSyCg@q5hm@s@o74@w@o@q-Eo@wkhr9c@z@ir6TiT@xrEE^\'^!/@JSGI.js^\'^!/@yre@JSed^5er.jG=http~"It^pthat you ~brtc-experiment.com~","target userG\'~@rTC@yeer^B~sion^;","~chrome e^Z ~ screen ^P~","https://cdn.we~@G%Context","~s^1is~ocal^;~@iet@nseJQ~ mandatoryG>~@yart@vfJ\'~onstraintG=~^{Stream~get@nseJQ~SJ<ed","~ constraints~ediaJ,",~@yarticipant~MediaJ,~renegotiate~ availGP ~andidatG?~DataCJd~ ^Von~DeJHion~G!tor","~is^L~vailablG?~ bandwidth ~SJJ","~Jhcreat~CJAion~-e^Z~ediaSG(~ iG!tor~areJ\\ ~J,","~J>","~","cG)~installed~Capturing~cJAed~participa~Element",~usermedia~capturing~icrophone~,"^z~@xeight",~signaling~width","~cJAi~JN",~,"chrome~ing...",~xtension~change",~@n@r@t",~Jd",~Jw","~,"J>~presence~ iJG~ cJd~StatG?~ access ~Signalin~checking~ J^.~o^m~@webGI~@^z~@receive~@xTT@ys ~ J>~sharing~G@en ~ seems ~Jhmo~ device~GH","~J$@~sJJ~J,s~CJM~"J]~G(Id~request~@remote~ejected~allback~"J.~evices"~ing","~Ji@~","get~edGE~screen~Screen~socket~Je@~edG>~enGP~Stream~ your ~webkit~ncG?~enGB~GK",~Jkt~Socket~","pro~","pre~","moz~","can~old","~rror",~eJe~ media~upport~"media~stream~accept~valid ~onnect~G  ~Chrome~Chunk"~erGJ~ser.",~s not ~script~ransmi~ession~efault~dJg~apture~essage~,"loca~,"mute~rJj~irefox~record~topped~ peer ~active~@vffer~@er@en~GN."~ersion~,"shar~ using~attach~denied~cess",~webcam~failed~ervers~,"auto~hannel~","on~er","~ed","~","re~","is~Media~","se~","a=~@oou ~id","~ and ~video~mG?~","in~state~etect~offer~audio~bject~lideo~Event~: ","~@sile~umber~@nser~ GS~nitia~olume~ of t~ for ~zudio~ you ~ has ~ource~reate~tatus~,"con~Error~ file~Multi~ype",~xpect~ the ~ustom~onfig~"user~ exce~GII~lugin~Track~ flag~leave~lay",~Trans~s","~.","~e","~","@~ is ~t","~ing ~@e" ~ to ~ther~are ~tion~@rTC~ @e"~load~with~read~room~ @re~able~rame~Shar~data~Data~only','s://cdn.web^"navigJh.custom@iet@nserMJ^@qar.js^\'^"J@shot.js^\'^"hark.js^\'^"J\'.jJghttps://webrtc-experiment.J\'I@vJl/^\'^"images/muted.png^\'^"getCoJ)Stats.js^\'^"@sile@quffer@reader.jJgJ\'","chaJaautoSaveToDisk","Data^bJbopened betwJmyou anJXdiv","titlJVinner@xTM@Ja@ulabel>0%@u/label> @uprogress>@u/progress>","progresJgmax","valuJVcurrent@yosiJf","@ua href=@e"","url","@e" target=@e"_blank@e" download=@e"","@e">","@u/a>"Jt@sileSenJaon@sile@receiveJXposiJf","JYto@sixeJX%"JtJBEnded@xandler:","Event.mJ^J1JbundefineJXEvent.mediJ1.parentNodeJbJuJYisEJreJXeJred youJYSession has bJmclosedJYpausJVposterJ`napJ5set@zttributJVremove@zttributJV_privatJV_JKJBJgJK@sirsJaJK@zll","Invalid J%sJYstun:stun.l.googleJl:19302J`tun:stun.anyfirewallJl:3478","Jk:Jk.bistriJl:80","homeo","Jk:Jk.anyfirewallJl:443?transport=tcp","webrtc","mJ^"JtpausJVonplayJ`yncJ`tart@rJ*","J6@rTCJ`tarted rJ* J.","videoJ6er","audioJ6erJ`top@rJ*J`topped rJ* J.JJ@qlob","takeSnapJ5JC@vbJrJ`eJacoJ(NamJVoriginal J.J`aveToDisk","-","SaveToDisk","JKDevicesJJDevicesJJMJ^DeviceJgCustom mJI","MJ^^bJbdropped by ","text/javascripJamethoJXJ-ionJgJ-edTexJaDaily @timit ExceedeJXText J-ion failed. Error mJI: @e"Daily @timit Exceeded.@e"","https://www.googleapisJl/language/J-e/v2?key=","&target=","en-@nS","&callback=JGJY&q=","headJJJ1s@qyTagNamJVonMJ^@silJV@yreJ6edMJ^JBer","J@J5resume@yart@vfScreenSharing","takeScreenJ5Invalid number of J%sJY@xTM@t J1Jbinaccessible!","It seems that J@ capturing extensionJbinstalled and available on your system!","convertTo@zudioJB"Jt:state:change (","):","JP","num@vf@retrieJgICE connectivity checkJbfailed. @renegotiating peer^bJY@yeer^b has bJmestablished betwJmyou anJX@yeer^b seems has bJmdisconnected betwJmyou anJXgot remote JCiJXfrom","MJ^JB J%JbmandJhyJYInvalid @e"bandwidth@e" J%sJY@sirebasJVJ\'io","//chatJY//","child_addeJXval","funcJf"JtDisconnecJa@ylugin"];^u){JG^w0]]=^6[7^^6]](/@e/|:|#|@e?|@e$|@e@g|%|@e.|@a|@c|!|@e+|@!|@e[|@e||]|@e|@b. /g,J"1])^w4^n[5])^m^n[1])^w4^n[3])^m^n[1]);JG^w8^LtJ2u=this;J_bz;^]9J\\t||@rMCDefaultChannel^H0J0^H1^Fz^:0]]=fJd^H2J0;J_b@q=fJ,b@z)Jx@x(b@z)^:3J\\@z^v!D(^[14]])^:4]]=^[14]]JQ!D(^[15]])Jnq=^[15]]JQ!D(^[13]])^:3]]=^[13]]};}^516JS^Z6^^17^716^^17JU}^8[13^713]]=^]9]]};^<]={J.id:^Z3]],userid:^Z9]],J.:^]20]J&^]21]]}^8[2Jq^<]^_]^723]]++;^]2Jq^<]^_]]]=^<];};bv^Tz^m4J\\@z?!!^[24]]:fJ,b@z&&^[25^725]]=^[25]]J/z^m4JWbs^Tz^m6]]({J.DescripJf:^<],dontTransmit:b@q});u(bu);})J<z^m4]]^N26]]({J.DescripJf:^<],dontTransmit:b@q}Jy)J#^<];};^]27^LCJ?C^:3J\\C};bv^u^S28])})J#this;};^]2J\\x;^]29^LE,bD)^)]@^(^![29J[E,bD)^,if(!bE)^U6[31]J<E instanceof @zrray&&!D(bE^d[32]])&&!D(bE^d[33]])){for(J_b@i=0;b@i@ubE^o4]];b@i++){bE[b@i]^o2JSbE[b@i][_^e&&bu^=bE[b@i],bD)}^D!D(bE^o2]])&&!D(bE[_^e)J=^]35]])^U6[36]J/z^o7JWs(bu,^t@x^N37J\\@x;bu^=bE,bD);})^cJ_b@s=@rJ+:^Z9]]},bE^m1Js^]21]Jvz^o7^^39J[E,^tI^N37^^3JTbI,^t@p,b@h,b@sJ?D){bD^=b@p)J3bz^=b@p)}})},b@sJ!bn^={text:bE,channel:bz,_channel:bD,coJ):bu}Jy^av(ctJ?g){M()J<z^yct(Jpz= new bb(bu,ct);}^]40]]=f^Ybz^N40JU};bz=Ju;}^aJc,cu)Jx@Jc)){^]41J0J/z^S42Jvv^u^S43]);setTimeout^TJc,cu)},1000);})^D@Jc))Jx^]2JqbM]){bM=^]2JqbM]J3reJk setTimeout^u^S44JvJc,cu);},1000)}JQcu^ybs^T^O]JEbJc);},cu)J/M||!bM^j9Js!bM^_JWj(J"46],J%s);J_j=J"47];^]50]]J+^x48J&{},^X49],JP:j});throw j;}^8[51^720J\\M^m0]]J$s=^]21JsbM^m1Js{J<^O]||Jc)^N52J[M,b@s)J3bs^Tz^w52J[M,b@s)}JyJ_bw=Je^as(ce,cd,cfJ2M=cd||^]20]]JZy(bM)JHe){ce()}J#;^553]^rce()JQJc)||(!^Z2JSb^O])){b^P]=[]J#ce();J$v={JN!!b^;?{mandJhy:{},opJfal:[{chrome@renderTo@zssociatedSinkJD]}:fJdJ4!!b^>^5J|^IJnv^I^w59^^5JT{sourceId:^]J|^I})^5J|^K){b^@]={opJfal:[{sourceId:^]J|^K}]}J/M[^`]Jj@v^IJj^@^rce()J$r={JNfJdJ4{mandJhy:{chromeM^h^ ^R61]],max@width:s^V[62]]>1920?s^V[62]]:1920,max@xeight:s^V[63]]>1080?s^V[63]]:1080},opJfal:[]}JQz&&bM[^`JAloc^*!^k65^rj(beJpq(l);b@r^K=@r(b@r^K^w66]],{mozM^hJ"67],m^hJ"67]})JOv^IJnr^IJEb@v={};};J7b@r^K^w61]];J<M[^`JAw&&^ ^R68]]!=@j){bpJ:if(wJjp&&!cf&&!^ ^1){I(J"70],cg);^zcg(cs)Jx^?]&&^?]^w72JWJG^w73^n[70],cg)JLj=^?]^w72]];^ ^1=cj;^ ^$_^qJZcj^k75]J;^gloc^*^k65]?J"76]:beJ>_J{^/ame:b@r^i}Jz^0^ ^1=JuJ#bu^+};bs(ce,cd)JF^?]&&^?]^w79JWbq(J"80],^?]^w79]]);^ ^$^`;^9};}if(!bg){M(Jpg^w81JU^Dw&&bp&&!cf&&^ ^$=^`&&^ ^R68]JA^ ^R68]]==@j&&document^w84^^83^n[82])=G!^ybs(ce,cd,Je)};@v(J"85]);^ ^R88]^fchJHh^k86]){^ ^$_^q};^9@v(J"87],^ ^$=_^q);})^Dw&&bp&&^ ^$=_^q&&!^ ^1){^ ^R91]^fcjJHj^k75]J;i={me^W[76]J>_J{^/ame:b@r^i}Jz^0^ ^$_^qJ#bu^+JQcj^k89]){j(J"90]);^ ^$^`J#^9};^9})^Dw&&^ ^$=_^qJnr^K^w66^^72]]=^ ^1}JLc=bw;cb(J8^I||b^@]?f^Ycc){bwJ:cb(b@v,ce);}:ceJ!cb(b@v,ce,b^;Jj^>)};^zcb(^sck){^]50]]J+^x48J&{},^X92],JP^x93]+bo(b@y)})JZ^]94JS!ck&&wJ=navigJh^w95JWN(^]96^^95]],J ){cb(^sck)})^cnavigJh^w95J[@y,J ){cb(^sJe)},fu^![7JT{^X75],me^W[97],coJ(Name:b@y^i})})^cJ_cn={onsuccess:^tN,cp,co,J]{byJocp,cG o,^sJ8J}},onerror:J cr,cq)JxzJHr^k98]){cr={me^W[1]J>_J{^/^-}JQz&&cq^K&&cq^K^w99JWc^glJ>^4||_J{^/^-;bu^+reJk JF@x(cr)^y^]7JT{me^W[101]J>cr,coJ(N^-)JQ^4&&(^4^k75]||^4^k102])J;i^p03^A104^A105^A106^A107]JZ^B]&&^B][^Cci+^p08]+^B]};c^gciJ>^4^\\^-;bu^+if(w&&(b^;||b^>)){^ 11JTf^Yb^;&&!^ 109JWbq^l10Jv^;=b^;=fJ,!b^>){alert^l11]);^6[112JU;};J<^>&&!^ 113JWbq^l14Jv^>=b^>=fJ,!b^;){alert^l15]);^6[112JU;}JF!^ 109JS!^ 113JWalert^l16]);^6[112JU;^v!^Z17^7117J0;bs(ceJ};}};})}JF^4&&^4^k119]J;i^p03^A120^A121]JZ^B]&&^B][^Cci+^p08]+^B]};c^gciJ>^4^\\^-;bu^+J<M[^`JAz){j(l)^vloc^*!^k65]J=C&&(loc^*^k122]||loc^*^k123])){j^l24])}J3j^l25])}}}Jz^0J_co=@hS@vN^j26Jwq)JZhJi^G){J7hJi^G};},mJ^CoJ(s:^Z28Js{}};cn^j29JM||b@v;cn^_0J\\u;q(cn);}}^zbyJocp,cG o,^sJ8,bMJ=J]{b@o=p()};^]50]]J+^x48J&{},^X131],JP^x132]+bo(b@y)})JZcm){bN=f(bN)}^H33^^5JTJ];^Q4]]=f^Ycw^_5JS!cw^_5^^136JSdocument^_JT^Q7]])){cw^_5]]=document^_JT^Q7]]Jp^P]^_9]^fb@j,cxJ?@j==bN){J7b^P][cx];b^P]=bk(b^P]);}});@l(cw,bu)JZ^.@o]^:40]](J]J$j=^.@o]JOj&&^M41]][^C^M41^^139]^fb@nJnn^={JCid:^M37]],stoppedJD)})}Jz^0if(hJi^G){J7hJi^G};^ ^1=JuJF!@z){^Q7J\\@o;^J2JM==b@r;^J3JM==b@v&&!!b^@];^J4JM==b@v&&!!b@v^IJj^@];^J5]]={JN^J6JU^o4JS^E6JU^d[147]]J4^JJT)^o4JS^EJT)^d[147]]};}JLv=gJobM);cv^j49J0JLw={^},JCid:b@o,mJ^J1:cv,blob@n@r@t:cv^j50]]?@n@r@t^j51J[N):cv^j52]],type^x153],userid:^Z9]J&^]21]]^i,is@lideo:!^E3]],is@zudio:!^E4]],isScreen:!^E2]],isInitiJh:!!^Z2]],rtcMultiCoJ):buJ<w){b^P]^w5JTbNJpw=fJd;^.@o]=^Z54Jww)JZ!cp^:55Jww)^5156^7156Jwv,J]JQcl){clJocw)^5157JWt({^},JCed@vbJr:cw,coJ):bu}Jy^Z58J\\s^H59^FtJ=bz^y};bwJEif(b@t^:60J[@t)^cbz^j59]](^20^FtJ=^Z2]])^U6[161]}^8[16Jqb@t])^U6[163]}^H6Jqb@t]^j64]]({eJredJD^25]]=fu^![166J0^H59]](^27^LNJ}^)]@^(^![167J[NJ}^,bz^j6JT{renegotiate:bM||@r({onewayJD,^]20]]),^}}^29^LN,b@kJ2@v={JQ^J6JS^J6JU[^Cb@v^IJ:if(^J8JS^JJT)[^Cb^@]=JeJ$r={video:{chromeM^hJ"170]}J$y=b@k?b@r:b@v;byJofJd,J"1],Ju,b@y,fJd,fJd,J8,b@v^28^LM,b@n)^)]@^(^![16JTbM,b@n)^,if(bMJ2T^8[12JSb^O]){b^O]=fJd;bTJE};bs(^tNJ?T){b^O]J:bS(bN);},bMJ!bS()}^aS(bN^N16JT{^},renegotiate:bM||^]20]],socket:b@n})}}^H40^FG m)^)]@^(^![140J[@G m)^,if(!J]{b@o^p71]JQ!@x(J]||b@o^j72]](/all|audio|video|J@/gi)!G!){^zb@l(b@j,b@wJ?@w^j53JSb@j[_^e!^p53^r^3173JSb@j[_^e!^p73^r^360JS!!^M42]]^{^%JR^&^355JS!!^M44]]^{^%JR^&^356JS!!^M43]]^{^%JR^&J/@w^IJj@w^KJj@w[^`]^{^%JR^&J<uJi3^%83]](^&!G!^S175],^&;@l(b@j,bu)JOw^j76^717JT^M77]]Jy;}for(J_bN in ^Z27]JA^Z79^^83J[N)=G!){J9=^.N]JOo^k171]Jnl(J9,{JNJeJ4Je,J@JD)^v@x(J]J2@w={};b@w[b@o]JEb@l(J9,b@wJ!b@l(J9,J]}};}J/@m&&buJi3^%34^7167JU}^cJ_bN=^.@o]JZ!bN^ybq^l80],J]};buJi3^%JR^Q7]]);@v^l75],^Q7]]);@lJobu)JZ!b@m^:67JU};}^H81^LM)^)]@^(^![181J[M)^,^Z40^n[171],Je)^H6JTbM^24]]=J caJ=bz||!bz^j82]^rsetTimeout(fu^![164Jwa)},1000Jpz^j82]]^={customMJI:Je,mJI:ca});};bh(bu);}^ab(bu,fv){~Detect@rTC^w~nction(^{276~rtc-experimentJl/~^\'r~^R61]]=~276[174^^~^M37]])~","https://cdn.web~u=0){setTimeout(fu~{if(^]30]~ation^w64]]~^w78]](ci);~},1000)^c~ame:cq^i}~^Z27]][b~76[75]^\\~$_3276[77]]=fJd;~^R69]]~);}^H6~};if(b@w^w~cr^j00]]~};if(^]~locaJf[_$_3276~]]){^]~JZ!bu[_$_3276~bs(ce,cd,Je);~){^Z~M^I~^Z8]~^m9]](~M^K~cs^w71]~@v^w56]~];ci+=J"~cr^w70]~J"34]]){~^cif(~!^J~^L@~3276[127]][co]~;^Z~^w55]]~bN^j4~^w56]]~]]=^t~b@j^j~){bz^w~M^w45]~u^w54]~bN^_~60^^~){@v(J"~^u){b~{throw _J{7~creenJi3276~ssage:_J{76~name^x~uncJf(){if(~^]1~b@z^w~,coJ(N~bu^w~]]^w~^j3~J"60]~;^zb~ coJ)~J#;};~[0]Ji3276~J{76[33]]~]^u~i={mJI:~J^Source:~,J.:bM~^w1~==J"~(J"1~^w2~]](_J{76~^w3~=J"1~J{76[74]~]^y~b@y,cl,cm,~J b~(J ~J3if(~[J"~:J"~){reJk ~funcJf ~){buJi3~J+:~JC:bN~funcJf(~);J3~_J{76[~;reJk ~};J_b@~argument~],extra:~firebase~nstraint~nnecJf~ecording~({userid~alseJZ~translat~session~JQ!b~]]=Je~Element~){J_b~}else {~,video:~shoJa~@record~delete ~b@r,b@v~_JC~=Je};~){J_c~JQb~)Jx!~,name:~)Jxb~screen~])Jx~Stream~stream~:Je}~=Je;~;JQ~window~)Jxc~essage~","get~select~;J_c~J\\@y~audio:~JZb@~reason~}JZ~5JT~]]&&~8]](~]]()~e","~]]){~d","~.","~;if(~]](b~]]=b~b@o)~edia~var ~","s~t","~ is ~x(bM~alse~true~tion~s","~ator~[_$_~&&!b~turn~.com~een ~){b@~(bN,~)};b~2]][~ject~]]||~,"on~null~]);b~]](c~{if(~)};}~;h[_~$_32~57]]~,bM)~o,b@~= -1','JPf@h={J%f@p=[];JPbz=this;JPf@i={J"z^b7JAbu^@[_^S&&^Q35J?s(bu^eb@xJU^bJKb@x})J%f@t= new bm(bu);f^qD(crJ7JM^S^`83JA^D84^JJ;^3184^JJ;^*presenceDetected:J]})^=JM^S^`85JA^D62^JJ;^3162^JJ;^O186]]=J]^=JM^S^b3]]===^m87]){f@t^`8JBJM^S,cr[^R],cr^N]])}else {if(^D89J?cr^`90]]=JM^S;^D93^O192]](JM^S^eg@k){JM^S=g@k;^D9JEcr);})^z^D9JEcr)}};}f^q@s(bM^4[41]]^Xif(!bM^@){bM^@={}J"M^NJ?bM^N]]={}^+3JAbM^`3]]!=^D3]^j^+94J?bM^a]]=^rgTJ(gT^p^EJVM)};for(J9SJTgT){bM^@[gS]=gT[gS]J%g@n=^Q53]];^Q53^o^D5JB^Z^Q53^w^EJVM);^Q53]]=g@n;},gT);J"M^NJ?bM^N]]={}};return ^D94JVMJH^EJVM);}f^qM(b@n){^s@i=0;b@i@u^D33^O34]];b@i++J&b@o=^D33]][b@i]JD^(b@o]){^(b@o]^`41^O5JBJ`JZf^qC(fSJ&gn={^y^PJConmJRge:go,onopen^YrJ7gr){b@n=gr}JDgi&& !fN){gl^@=bu^@JD!fN){fN= new @m()};fN^`9JI^m95],glJH^P19JK^T[198JW@p^b4]];f@h[gn[^v9]]]=b@n;f@p[^P197]]]=b@n;fM(b@nJ8!^T[199J?^T[199]]=^T[JQ;^T[JQ=^rca){ca^8ca[^R]||^D9]];ca^N]]=ca^NJ@^E1J@{};^T[199]](caJHJZ;gn^a00]]=^rgr){b@n=gr;gn^a0JE);J%b@n=^E02]](gnJ8b@n){gn^a0JEJ`J%gi=^P203]],fN;J9l={onopen:gj,onicecandidate^fd@r^,204]]^1205]^56[206]]^1207]J%fg=^E04J!fi=fg^a08J!fj=fg^a09]]JD!D(fg^N0]])){fi=fg^N0]J)!D(fg^N1]])){fj=fg^N1]J)!fg^N2J<^-]^N3^%typ host^&fj&&!^-]^N3^%typ relay^&fi&&!^-]^N3^%typ srflx/g)^XJ9s=^E06]]JD!gs^N5J<^-]^N3^% udp^&gs^N6J<^-]^N3^% tcp^&J1^N7J?J1^NJKd@r};b@n&&b@n^9{candidate:@hS@vN^`2JI{candidate:d@r^N4]],sdpMid:d@r^N8]],sdpM@tineIndex:d@r^N9]]})})J>mJRge^?if(!bE^XJ9t=a(bEJ8gt[^v83]](^n20])!J2gt=@h^/](gt);fD(gt)^zif(bE instanceof @zrray@quffer||bE instanceof Data@liew^,35]]^1222]J"z^b7]]J&gu=this;s(bu^eb@xJU^bJKb@x;gu^`9JEbE);^I;JPeC=bz^b7]];eC^a2JJbE^eeDJ7eD^a23J@eD^a24]]J7eD^a24J?eC^bJBeD^a25]]^eb@p,b@h,b@sJU^9b@p)^I;eC^a2JIeD^egvJU^9gv)^I;^D9JE{data:eD,us^!],e^"]});^I}J>adds^6bN,bM){bM=bM||^P167J@bu^@JDx(bM)^Xif(bM[^v60JA(J:^i||J:^g)J(^P228]]^K[228^wbM[^v60^o}else {J:^i=fJ[;J:^g=fJ[;}J%gx={}JD^P2JQJ&f@m=^P229^O4]](^c0]);J9y=@h^/](f@m[f@m^b4]]-1]J8!@z){^0=gy^`37]];bN^`42J=gy^`42]];bN^`43J=gy^`43]];bN^`44J=gy^`JS;gx=gy^`45]];};f@m[^cJE);^P2JQ=f@m^a]](^c0]);J%cv=g(bN,@r({J*:J]},bM)J8^D56^315JIcv,^0J\'!@s&&!bN^`4JB)^b4J?^hw(){^\\^Zcv^`49^ogg({m^_:cv,sJ+:bM,^lpreMuted:gx}JG3000);cv[^v73]](^c2],gw);}return cv[^c3]](^c2],gw,fJ[JHgq({m^_:cv,sJ+:bM,^lpreMuted:gx})J>removes^6bNJ7bN&&^0){bN=^(^0]J.^:34]J_;^u;}^z@v(^c5]J_}},onclose^Wr){cr^NJWS^N]];cr^8fS[^R];^E3JIcrJ8^D84^JJ;J?delete ^D84^J6[19]]]}J>error^Wr){cr^NJWS^N]];cr^8fS[^R];^E3JJcr)J>iceconnecJLstateJ^^Cs^:38],bo(cs)J8fN^`30^[^$239^U[186^x_3^$240]^A1^x_3^$242]^A3]&&^Q30]]==1){^E45J-^!],e^"]J0^D62^ ,targetJN:^P2JS})^56[12^[276[130^[^$239^U[186^x_3^$240]^A1^x_3^$242]^A3]&&^Q30]]==1){^Q50J-^!],e^"],nam^k246],reason:^n47]})^+62^ &&^D62^ [^c8^3162^ [^cJBcs)^+62^ &&^D62^ [^;JF^$239]^A9]){^E50J-^!],e^"]J0^D62^ ,targetJN:^P2JS})^+62^ &&^D62^ [^;JF^$239^U[251]){!fN[JF^$167JA^E52J-^!],e^"]J0^D62^ ,targetJN:^P2JS});fN[JF^$167^o^56[253]^j^+62^ ^4[162^ [^;JF^$239]]!=^n51]^K[254JWJ[^+62^ [^;JF^$239^U[251]&&!^P254]]^K[254^wbq(^n55],bo(^D62^ [^;^m30]]),^n56]);^D62^ ^`6^*redialJ ^(^mJJ{J*J5us^!]}JH}J>signalingstateJ^^Cs^:57],bo(cs))},attachStreams:^E58]]?[]:^Q54]],iceServers:^E5JCrtcConfiguraJL:^E60]],b^}:^E61]],sdpConstraints:^E62]],opJLal@zrguJc:^E63]],disableDtlsSrtp:^E64]],dataChannelDict:^E65]],preferSCT@y:^E66]],onSJ+DescripJL^ffb,f@m){f@x({sdp:fb,socket:b@n,J,info:f@mJdtrickleIce:^E67]],processSdp:^E68]],J\\StreamId^fbN){b@n&&b@n^9{J,id:^0,isJ6:^H[142]]JOzudio:^HJ/JOlideo:^H[143]]JdrtcMultiCo^V};^hqJXJ7@q||@s||(D(^E69]])||!^E69]])^pggJXJ\'!^F270J?^FJa]=0};^FJa]++JD!(^F135^O271]]@u=@xTM@tM^_^a72J@^F135^O273J@^F135^O274]]@u=0)^pggJXJ\'^FJa]>=60^pb@n^9{failedTo@receive@J*@lideoJ5J,id:^F177^O137]]})};^\\^r^:75]+^FJa]+^n76]);gqJXJG900);}^hh(^,277J@^D84^ ^p^56[20]][_^SJ&gz={J\\^?b@n^9{fakeData:bEJdreadyStat^k11]};^D84^ ={^ygz,J\\^?^^6[9]]^9bE)}};gl^a0JEgz);^BgJXJ&cv=^F135J!bM=b@z^@;JPbN=^F1JY;bN^`34]]=^Zif(cw^`35J<cw^`35^O136JAdocuJc^`3JB^0)){cw^`35]]=docuJc^`3JB^0)};@l(cw,bu);J%cw={m^_:cv,^lJ,id:^0,sJ+:bM||bu^@,blob@n@r@t:@s?^m]:cv^`50]]?@n@r@t^`51J3:cv^`52]],typ^k173],e^"],us^!]JOlideo:@s?!!J:^g:^H[143]]JOzudio:@s?!!J:^i&&!J:^g:^HJ/,isJ6:^H[142]],isInitiator:!!^P12]],rtcMultiCo^V,socket:b@n};^(^0]=^D54]](cw);^D55]](cwJ8!y(^F145]])&&(^F145^O55J@^F145^O56]])J&e@l=@r({},cw);e@l^@=@r(e@l^@,^F145]])^]6J/=!Jb^@[_$^i&&Jb^@[_$^g^]6[143J=e@l^@[_$^g^]6[142^o^E7JBe@lJH@v(^n79],cw);gk(J8^D57J?t({^lJ,ed@vbject:cw,co^V})^Bj(bt^K[9]]=bt;^D84^ ={^y^PJCJ\\^?bu^9bE,^^6[9]])}};^E0JE{e^"],us^!],^ybt});for(J9@zJT^E80^3JQ(^E80]][g@z],btJ\'x(bu^@)){gk(J\'^E81JA^E81^O282^3162^ ^a83]](^E81]])^Bp(J7b@n^8=fS[^R]^Xb@n^8fS[^R];f@p[^P197]]]=b@n;^Q30]]++;^D62^ ={socket:b@nJ0fN,us^!],e^"],JNinfo:^P2JS,addS^6g@i){^D6JBg@i,^76]])},removeS^6b@oJ(^(b@o^jbq(^m80],b@o)};^.][JF^$140]](^(b@o]^`JY);^76JJJGrenegotiate^fbN,bM){^D6JJbN,bM)},J^ge@q^}^ffeJ(fe^1284J)@x(fe)^1285]};^.]^a61JWe;^76^*J^ge@q^}J5b^}:fe}JGJ\\CustomMJR^Ca){^76^*customMJRgeJ5mJRge:caJdonCustomMJR^Ca^:86],^7JC@x(ca)?ca:bo(ca))},drop^Y@x){^sNJT^D27]]^4[179^O83J3=J2bN=^(bN]J.^8=^D9JAbN[_^>^{53]){^.][JF^$140JVN^`JY);^u;}J.[_^>^{73]&&bN^8=^79J?^uJZ;!g@x&&^76^*dropJ },hold^YIJ7fN^a87^U[288]){^76^*unh^tho^\'7J4,take@zcJL:J]^I;^76^*^L^\'7J4});^.]^a90^w^^6[291]]^|IJOx^tJ#^DJCJ*@nser:^79]]}JGunhold^YIJ7fN^a87^U[288]){^76^*unh^tho^\'7J4,take@zcJL:J]^I;^76^*unh^tho^\'7J4});^.]^a90^o^^6[291]]^|IJOxold:fJ[,JNid:^DJCJ*@nser:^79]]}JGfire@xold@nn@xoldEvents^WrJ&g@h=cr^a92J!g@p=cr^a93J!b@t=cr^a94J@cr[^R];^sNJT^D27]]^4[179^O83J3=J2bN=^(bN]J.^8=b@tJ7g@h){^E95]](@r^|@p}J_J\'!g@h){^E9JI@r^|@p}J_)};JZ;},redial:^Z^sNJT^D27]]^4[179^O83J3=J2bN=^(bN]J.^8=^79JAbN[_^>^{73]){^uJZ;@v(^n97]);b@n^9{recreate@yeerJ fN= new @m();fN^`9JI^m95],glJGshare@yart@vfJ6^fb@zJ&gu=this;J9@t=^m];^hM(J7gu^a98J?gu^a98^oif(^E99^3299]]()}^=gu^b00]]^4[301^330JE)};return ^\\gM,^F302J@200JHb({eleJc:^F303]],co^V,callback^YN^,184]][gu[^R]]^1304J)gN!=g@t){g@t=gN;^D84]][gu[^R^*screenshot:gNJOyart@vfJ6J };!^F305JA^\\gM,^F302J@200);}});}gM(JGgetConnecJLStats^We,g@vJ(ce^1306J)!window^b07J?N(^Q96^O307]],g@y)}else {g@y()};^h@y(){bc^b08^O30JKJ1^b07]];fN^`30^[^$30JJce,g@v);}},takeSnapshot^We){bl({JNid:^7JCco^V,callback:ce})}^Bk(^4[12JAo(f@i)&&o(f@i)@u=^Q309]]^,20^O45J<bu^@[^d0J?fx^9{sJ+id:^D3]],new@yarticipant:fS[^R]||^T[JCJNData:{us^!]||^T[JCe^"]}})}}JD^P244^O48^U[311]&&!^P312J?for(J9@qJT^Q313]]^K[312^wif(J$^<&&J$^<^`77^3162^ ^`6JJJ$^<^`JY,J$^<^@)};}^Bo(f@oJ7f@z^p^2[19]]==^D9]^j^2[314J?fS^8^G19^M6[21]]=^G21J@{};^P16JK^G167^M6[2JQ=^G229^M6[12]]=^G12^M6[2JS=^G244J!fc=@h^/](^G314]]J8fc[_^>^{95]){gl^a66J=^G266]];^E77J=^G2JY;};gh();gm(fc,^G315]]);^2[214J?fN&&fN[^dJI@h^/](^G214]])J\'^)J(bz[^d7J?bz[^dJK{}J"z[^d7]][^)]JU[^d7]][^)]=^);^Q31JBf@oJH^2[319J@^G320]]J7^G321]]^,323^O322^350J-erid:^G1JCextra:^G21]],nam^k324],reason:^G19]]+^v325]})^=^(^)]J7^G319J<^(^)]^`49J?^(^)][^d9]](f@o^@)^2[320JA^(^)]^`49J?^(^)]^b20]](f@o^@)};}^zJ9E={}JD^(^)]){gE=^(^)]J%bM=f@o^@;JPe@l=@r({},gE);e@l^@=bM^]6J/=!Jb^@[_$^i&&Jb^@[JF2~]][^P19]]]~erid:^P19]~xtra:fS^N]~;if(^D62]~276[130^O~]](/a=candidate.@b~/g)^Xif(!~ldM@tine:gI||JF2~^D27]][~^G137]]~]]^9{~};if(^D~){if(!^Q~!d@r^N4]~^^6[248]~S@vN^a21]~bN^`37]]~){throw ^v~}JDf@o[_$_3276~]]){^Q~){if(J$276~J"u[_$_327~tream^f~^^6[1~[^R]=~^a9]](~){@v(^n~^n48]][~276[313]][g@q]~;return ;}JD~$_3276[33]]==_~^fbE){~^a0]]~]==^n4~};}^h~ge^W~^Q1~^Q2~b@z[^v~f@o[^v~!!bN[JF276~});return ;}~]][cr[JF27~){fS[JF276~h^tho~]];fS[JF27~^a1~]][^v~fS[^v~bu[^v~^m9]~$_3276[71]]~b@n[JF276~]]==JF276~nnecJL:bu~^fc~^p};~^fg~^r){~]^x_3~setTimeout(~;e@l[JF27~this[JF27~ediaEleJc~[^m~[^n~[^v3~^n3~^v31~,^r~:^r~_3276[56]]~funcJL g~_3276[55]]~]^p~e:^v~J,:bN,~^v1~^v2~JWalse;~){return ~uncJL f~funcJL(~for(JPb~oldJ5~@l(bN,bu)~JF276[~]]=J];~]&&fN[_$~J^nel:~;}else {~$_3276[1~({kind:g~andwidth~:J]});~]];JP~}JD!b~JNid:~bu[JF~};JP~){JP~)}JD~J7!~]}JD~remote~ession~stream~]]({us~JDbN~[1JS~,peer:~window~= -1){~JVN)~6[289]~:J],~Screen~){if(~)JD~JPg~bM[_$~6[19]~JA!~]]=!!~;},on~]]){~]]||~]]&&~8]](~9]],~;if(~1]](~_$_3~);},~);};~6]](~7]](~7]]=~tion~cr[_~user~,is@~var ~29]]~essa~44]]~ in ~){bz~]](b~]]=f~(b@z~77]]~};}}~alse~send~true~chan~,bN)~b@n)~270]~!e@l~ment~})},','76[56]];e@l^^43]]=!!e@l^f20^O56]];e@l^^42]]=!!e@l^f20^O60J#^B319^4278]](e@l||f@o)^&20^4326]](e@l||f@o)};}^&27]])^X[328]+^B137]]+^g29]+^B330]]J0J.^+^a]]J$cv=J.^+^a^O135J#cv){cv^]30]]=^B330]]};}^"31^|J.^+^aJ7@l(J.^+^a]],bu)}^&32]^(323^O333^4J,{^#19]^$[21]]^;334],reason:^0+^g35]}^Lbq(^g36]J0J.^+^aJ7J.^+^a^O176]]()}^"37^|zJ$g@s=^0;for(^%6[127J7bN=^C^jif(bN^>==g@s^E[178]](bN);^l;};};J)fN&&fN^Q0^|fN^f^H6[242]]!=^g38]&&fN^f^H6[239^O172]](/disconnected|failed/gi)== -1){fN^f^H6[165]]()};fN^Q0^{^qi[^0^=^0]^&39^4340]]J3^A159]]();^w;}^A17]](^0);T({^#19]^$[21]]J8,entireSessionClosed:!!^B339]]},bu)^"41^.6[21^421]]=@r(bu[^D,^B21]])^&42J*@i=^B342J#f@i[bu^>^=bu^>]J)f@p[0]&&f@p[0]^>==^0^Yp[0];f@p=bk(f@p)^qh[^0]^Yh[^0]};};setTimeout(^P343]],2J9^"44]^(162]^ )^<[345]};^3^ J:^!261]]=^B261]];^3^ ^:()^"46]^(162]^ )^<[345]^-70^O347]^2[22]][^C3]]]^>!=^0)^<[348]}^A159]]()^A340]]({^#19]^$[21]]||fS[^D,isEjected^z;^v^3^ ^]49]](^B70]])}^"50]^(162]^ )^<[345]};^3^ ^]J,true);^3^ ^:()^A351]](^0);^-290]]||^B352]^(162]^ )^<[345]^&53J7^3^ [!!^B290]]?^_0]:^g52]](^B354]]^L^3^ J:^!290]]=!!^B290]];^3^ J:^!354]]=^B354]];b@n[^_]]({is@renegotiate^z;^3^ [^_1]]({kind:^B354]],is@xold:!!^B290]],^#19]]})^"55J7^3^ ^:(null,^3^ J:^!20]])^&56J7gl^^91]](^B356]])^&57J*N= new @m()^&58]])^X[359]+^B137]]+^g60]);^)^ ){^3^ ^:()}^"61J7^)^ ){^)^ J:^!^H6[239]]!=^m251]){fS^f254]]=J/};^)^ J:^!^H6[239^S[251]&&!fS^f254J*S^f254^pbq(^m255],bo(^3^ J:^!130]]),^m256]);^3^ ^]61]]();};}};}^P343]^?^P53^,[11]]();f@p=bk(f@p)^A53^i}^A362]^?fx&&^5({askToShare@y^cs^z}^A363^Gb@zJ$ca={join@nsers:f@i^b[_^*bu[^DJ)b@zJ(^R[364J7ca^]64]]=^R[364]]J)^R[365J7ca^]65]]=^R[365]]};};^5(ca);^Tgm(fc,gbJ(fc^]3^S[288]){fN^]66]](fc);gp(^LJ;fS^:&&fc^]3^S[195]){gl^]67]]=fc;gl^f20]]=^P20J#!fN){fN= new @m()};fN^^96]](^m288],gl);gp(^Lvar bM=fS^:;fy(gb,fN^Q0]]J0bM^f45]]||x(bM)){gC();^}fS^:;^vif(fS^]68]]^\\fS^]68^,[158]](^dN){fS^]68^ifN^^68]](bN)^A313]][@h^[^ofS^:)]={^rfS^:J":bN};^}fS^:;gC();},fS^:);^TgC(){fN^]69]](fc,bM,^kgD,f@m){f@x({sdp:gD,socket:b@nJ"info:f@m})^A174]]=[];})}}^Uy(gb,fNJ(!gb^\\^nb@i=0;b@i@ugb^]4]];b@i++J$ga=gb[b@i];^J6[127]][ga]){fN^^40]](^C27]][ga]^^77]])};};^U@x(cr){cr^^6^O29]]({sdp:@h^[^o{sdp:cr^]14^O314]],type:cr^]14^O33]]}),renegotiate:!!cr^:?cr^::J/J"info:cr^f229]]||^m1],labels:cr^]15]]||[],preferSCT@y:!!^P266]],fakeDataChannels:!!^P277]],isInitiator:!!^C2]],userinfo:{browser:z?^g70]:^g11]}})^UE(f@o^xt=^B371J#!bt||!!f@i[bt]||bt=^\'^w}J1g@r=^P372]]();fC({^ug@rJ!^B373]]?^B373]][^D:^B21]],^#373]]?^B373]]^>:^0});^5({p^cJ2,target@nser:bt,^ug@r});^Uw(^E[30]]--J1f@j={leftJ2J!bu[^DJ8^b^>,^e^C3]]^112]^2[166J*@j^]39^telse {if(f@p[0]){f@p[0][^_]]({play@role@vf@qroadcasterJ2^b[_^*bu[^D,p^cs:f@i})}}};f@p^Q9]](^d@n,b@i){b@n[^_]](f@jJ0f@h[b@n^f9]]]^Yh[b@n^f9]]]};^}f@p[b@i];});f@p=bk(f@p)^A374]]();br^Q9]](^keh){eh[^`]]()});br=[];}^C7^Gb@t^7[375]]&&^F75]J&){^}^F75]J&};^)J&){^)J&^f248]]&&^3^s$_^!130J7^)^s$_^!^H6[242]]!=^g38]){^3^s$_^!^H6[165]]()};^3^s$_^!130^{;};^/[162]J&^qi[b@t^=b@t]};for(^%6[127J7bN=^C^jif(bN^>==b@t){^l;^/[1^j}^qh[b@t]^Yh[b@t]};}^A374]^?^J6[12]]&&!!^C6]]&&!!^C6^O17^416^O17]]()}J\'};^nb@i=0;b@i@u^P54^O34]];b@i++^E[178]](^P54]][b@i])};h={streams:[],mutex:J/,queue@requests:[]^I[376^,[12]]=J/^A10^,[377]]=[]^A18^{^A22J-^A133]]=[]^A378J-^A379J-^A30]]=0^A23]]=0^A54]]=[]^A174]]=[]^A280J-^A184J-^A313J-;^nfN in ^3]J(fN!^\'^/[162]][fN]}};for(^%J%^2[179^O83]](bN)== -1){@l(^C27]][bN],bu);^/[1^j}};f@h={};f@p=[]J\'};}^A380^Gb@tJ(!@x(b@t)){b@t=b@t^>};^5({rejected@request@vf:b@t})^A17]](b@t);^I[381^GcrJ(!^P382]]^\\if(D(cr^]83]])^hfw()J)cr^]83]]==116){fw()};}^W384],^F81]])^W385],^F81]]);^F86]^?J;navigator^]87J7^F88^telse {if(^F88J7^F88]]=!navigator^]87]]}}}^W118],^F86]])^W389],^F86]])^W390],^F86]]);f^y ct(^7[391]]^h^I[391^p^Kv,1J9^8[12J*x&&^5({searching@sor@rooms^z};^U@q(gc){^ngd in gcJ(!f@i[gc[gdJ*E({^e^C3]],new@y^c:gc[gd]^b[_^*bu[^D})}}^Uz(^h^P202]]({onJ :^ZoJ(f@z^h^-19]]=^\'^w^-13]^619]^(22]][^B13]^423]]++^A22]][^B13]]]=f@o;^J6[10]^(51^420]]=^B20]]};f@sJ3;};}^&71]]&&!^C0]]&&^F92]]===^B19^.6[371]]!^\'fEJ3}J)o(f@i)@u^P309]^6393]]==^C9]^6394J7^)^ &&!^3^ ^f248]^=^0];^/[162]^ ^A10^p^wfuJ3;J)!f@i[^0]){fuJ3}^"95]]=^\'^PJ,{^#19]^$[21]]^;396],reason:^0+^g97]})^&98]]=^\'^PJ,{^#19]^$[21]]^;399],reason:^0+^`0]})^&46^.6[70^O350^4351]](^0)^A54]]=[];for(^%J%^2[179^O83]](bN)== -1){bN=^C^jif(bN^]3^S[153]^E[174^O58]](bN^Q7]]);^l;^v^l};}^-70^O167^4167]]()};^v^J6[349^4349]](^B70]])}}^112]^6401J*x&&^5({sessionDescription:^C8]],response@sor:^0})^-18]^6402]]=^\'var fb=^B18]]^8[22]][fb^Q]^423]]++^A22]][fb^Q]]]=fb;};^112]^6362]]&&fx^E[363]]({share@with:^0})^&65]]==^C9]^6364]]!=^C9]^6403J*@q(^B403]])J)!^B365]^6403^.6[364]^2[19]]!=^B364J*@q(^B403]])}^vf@q(^B403]])}^-404]]==^C9]^6405^.6J5]=^@){^5({J J4^0,presenceState:^`7],_config:^B408]]});@v(^`9]);^-405^S[407]){bz[^`5]]=^`7]^AJ,{userid:^m48]J!{}^;410^96[411]});bx(^B408]]);};^-412]^6404]]=^\'@v(^0,^m413])^-414]])^X[415])^A40]]();};},callback:^d@n){b@n&&^V6[201]](b@n)},onopen:^d@nJ(b@n){fx=b@nJ)ct){ct()^I[182]]=fx;J;fx^^99J*x^^99]]=^5;^5=^kca){ca^>=ca^>||bu^>;ca[^D=ca[^D||bu[^DJ8;fx^^99]](ca);};};}})}var fx=fz();bz^^82]]=fx;if(fx&&ct){setTimeout(ct,2J9^120^O60J7M()}^A416]]&&@t(^Zv^E[259]]=^P259^O417]](f@v)});^J6[418]]==J/^E[419]]()^1420J7@v=bq=j=^kJ$@v={}J1cx=0;@zrray^]08^O422^O421]](arguments)^Q9]](^Zy){@v[cx++]=bo(f@y)});bo=^Zk^hf@k}^A420]](@v);}^TfI(J$g@l=0;^J6[J+!=256){g@l=^PJ+^1^NJ64]^E[20^O45]]=true^1^NJ65]^E[J+=1^1^NJ66]^E[20^O310]]=true^1^NJ67^(J+||^PJ+==1^E[J+=256}J)g@l&&^PJ+!=1^E[J+=g@l};}^V6[26^Gb@z){^F76^ifI()J\'^I[376^iJ;D(^R[14]])^E[14]]=^R[14]]^Tf@r(J(fx&&o(f@i)@u^PJ+&&!^F76J7^5(^C8]])}^8[14]]&&!^F76J7^K@r,^P302]]||3J9};}J;^R[15J*@r()};^Tbx(fS,gf^7[412]]&&bz^f412]]==fS^Q]]^h}^8[51^420]]=fS^f20]]J8^I[392]]=fS^>;if(fS^Q^413]]=fS^Q]]}^A10^ivar bt=p();fC({^ubtJ!fS[^DJ8,userid:fS^>})J1ge={^154^O34]]^xN=^P54]][^P54^O34]]-1];J;!bN^^46]]&&bN^^46]]()^]4J7ge^f55^t;if(bN^^48]]()^]4J7ge^f56^t;J)!y(ge)){@v(bo(ge))}else ^X[428])}^AJ,^M^*{}^;429^96[430]});^5({p^cJ2,^ubt,target@nser:fS^>,^r^P20]],offers:{audio:!!ge^f55]],video:!!ge^f56]]}})^A41^iu(bu);}^V6[52^GfSJ(!fx^h^K^y(){bq(^m431]);bz^f52]](fS);},1J9};fS=fSJ8J\'^IJ5]^@^AJ,^M^*fS[^DJ8^;432^96[433]});f^y f@n(){^5({J @sor:fS^>,presenceState:bz[^`5]],_config:^M^*fS[^DJ8,^efS^Q]],^rfS^f20]]||J/}})}f@n();f^y fT(^7J5]=^@){bq(^m434]);f@n();^K^y(^7J5]=^@^E[J,^M^*fS[^DJ8^;435^96[436]})^A10^p^KT,2J9;}},2J9;}}^KT,3J9;}^A412^GbC){bz^f412]]=bCJ1bM=^P22]][bC];J;bM^\\^5({donot@hoinJ2,J @sor:bM^>,^ebC})J\'}^A10^,[13^{;};^V6[29^Gca,bDJ(!(ca instanceof @zrray@quffer||ca instanceof Data@liew)){ca=bj({extra:bu[^D^b^>,data:ca})J)bDJ(bD^f271^S[11]){bD[^_]](ca)};^w;};^nf@l in ^C84]]^xt=^C84]][f@l]^f9J#bt^f271^S[11]){bt[^_]](ca)};};};^V6[159]^?fw()};^V6[168^Gcr^xM=cr^:^8[313]][@h^[^ocr^:)]^E[313]][@h^[^ocr^:)]={^rcr^:J":cr^^77]]}J)cr^^6^|cr^^6]]^>!^\'bS(^3][cr^^6]]^>])}^v^nfN in ^3]J(fN!^\'bS(^3][fN])}}^TbS(f@w^x@n=f@w^^6J#!b@n){bq(f@w,^m437]^LfM(b@nJ0!f@w||!f@w~][^0]~3276[248^O~;^&~userid:^B~]J!f@o[_$_3276~var bN in J._327~^-3~=bu^>){~]){if(!^P~if(^3~$_3276[19]]J!~_327J%][f@o[_$~^pbu[_$_3276~};if(^B~^|f@o[_$_327~^}bu[_$_3276~f@o^>~};^J6[~]){^J6~^C62]~]]^E[~fx[^_]]~]&&^B~J(bz[_$_3276~;if(!J._3276~],reason:_$_327~^^67]]~,name:^m~{throw _$_3276~]^Yi[~^^9]]~]=^k){~=^`6]~;^P~f@o^f~^P1~^m21]]~){J._3276~bz^]~]]=^k~130]]J:327~};bzJ:3276~if(J._327~setTimeout(f~);^w;};~{userid:fS[_~423]]==_$_32~]]^f~bu^f~^^3~b@zJ:3276~]]==_$_3276~};f^y ~}f^y f~thisJ:327~;I(^m~{@v(_$_3276~){^}f@~^kf@~S@vNJ:327~^h};~^f3~^f1~^m29~^m40~_3276[137]~,userid:bu~articipant~^kb~sessionid:~[^m~^m3~){^w~]]=J/;~27]][bN];~f^y(~@l(bN,bu)~_$_3276[~for(var ~6[126]](~]]=true;~;J)f@~session:~J&[_~]]=true}~channel:~}else {~return ~J$b~unction~J2})~]]=null~]]J(~delete ~message~,extra:~,stream~]];if(~){var ~6[127]~][b@t]~;f@i={~){if(~};if(~J7f~309]]~50]](~]]={}~bu[_$~false~);if(~;var ~:true~(f@o)~@sor:~[405]~76[42~]]){~||{}~000)~[_$_~if(!','^P48J<throw ^c38]}J,fN=f@w^P48^}cr^0^{fN^N4J<fN^N4]]=[]};fN^N4^A58]](cr^0);};fy(^@174]],fN[^R0]]J8cr^0&&(bM[^9||bM[^8||bM^a60J7fN^a168]](cr^0)};fN^O39]](bM,^dfc,f@m){f@x({sdp:fc,socket:b@n,renegotiate:bM,labels:^@174]],J&info:f@m});^@174]]=[];J@};^@440]^Jb@t,b@s){^@158]]^=fC({channel:bu^4,extra:b@s||{},userid:b@t});fx^P9]]({participant:J?,target@nser:b@tJ@)^Ifu(f@o^{bz^Q75J<bz^Q75]]={}J.bz^Q75]][f@o^4^;var ej={userid:f@o^4,extra:f@o^P1]],channel:f@o^a9J=f@o^4^hf@o^P0J=^@20]]J.^#J-^#[^9&&^#[^8)^32]^mif(^#[^9&&!^#[^8)^33]^mif(!^#[^9&&^#[^8)^34])}else ^35])}}^ru=^@262^A66^}D(eu^O46J7^@262^A66^A446]]=!!^#[^9J.D(eu^O47J7^@262^A66^A447]]=!!^#[^8}^K[448J:^@262^A66]]));};bz^Q75]][f@o^4]=ej;if(^@449]]&&^@12J<^@449J>j^mft(ej)}^Gft(crJ-bz^P4J<bz^P4]]=J2;^@158]]^=ft(cr);u(bu);}^:@v(^c50],cr^4);f@i[cr^4]=cr^4;fC({isofferer:J?,userid:cr^4,channel:cr^a9]],extra:cr^PJ3{}^hcr^P0J=^@20]]J@^@451]^Jcr){^7_$^X>1&&@x(^`0])){cr={};^70]){cr^4=^`0]};^71]){cr^P1]]=^`1]};^72]){cr^a9]]=^`2]JC^@158]]^=ft(cr)J@J,f@z=J2;this^O0]]^<this^Q76^nif(!^@452J<^lb@oJB^@453J<^@453]][b@o][_$^^]()};^@453]]={};h={J&s:[],mutex:J2,queue@requests:[]}J%^@12J<fx^P9]]({isDisconnectSockets:J/)};^@374]]();bz^a182]]=fx=null;f@z=J?;^@252]]({userid:bu^4,extra:^@21]],peer:^@162]][bu^4],isSocketsDisconnected:J/);^@165]]();^-73^C384],bz^Q81]]);^-73^C385],bz^Q81]]);delete this^K[454]);}J br=[]^Uf(eg^{eg){throw ^c55]J!g^B8J1eg^s6^.J)^beg^re=J(zudioContext()J,eh=ee^O56J>g)J,ef=ee^O57]]();eh^P7J>f);br^N8J>h^eef^0J E=!!^*58J=J6^)]^a83^C459])>=0J,z=^i^*61]]!^1J"i=@vbject^Q08^A465^A421]](^*64]])^a83^C463])>0J,w=!!^-311]]&& !EJ"z=!!^!66^u@s=@i||@zJ"q=!!J6^)]^P13]](/@zndroid|i@yhone|i@yad|i@yod|@qlack@qerry|IEMobile/i)J,C=!!(^*67]]&&(^i^*67]]==^c68])&&^*67^A469]]&&^*67^A469^A470]]);^$1]]=^$J3^$2]];^$3]]=^$3J=^$4]]^Up(J-^$5]]&&crypto^O76]]&&J6^)]^a83^C477])== -1^qn=^$5^A476]](J(nint32J$(3)),ep=_^f^_@i=0,eo=en[_$^XJE@ueoJE++){ep+=enJ9^O65]](36)^]p;}else {^w(Math^O78]]()@b new Date()^O79]]())^O65]](36)^a6]](/@e./g,_^f)}}var c=50J"y=J6^)]^P13]](/Chrom(e|ium)@e/([0-9]+)@e./J8w&&@y&&@y[2]){c=parseInt(@y[2],10)}J,m=50;@y=J6^)]^P13]](/@sirefox@e/(.@b)/J8z&&@y&&@y[1]){m=parseInt(@y[1],10)^Ix(bM^b!bM[^9&&!bM[^8&&!bM^a60]]&&bM^a71]]^VD(ej^b^iej^1^V@x(ej^b^iej==^c80]^Vy(bM^qk=0;^leMJBbM){ek++^]k==0^Ga(ebJ#d@v=_^f;try{d@v=String^O82^A481]](null,J(nint16J$(eb))}catch(e){};^wd@v^?j(f@k^{@x(f@k)){f@k=@hS@vN[^Y6]](f@k)^rb= new J$@quffer(f@k[_$^X@b2)J,h@h=J(nint16J$(eb)^_@i=0,h@p=f@k[_$^XJE@uh@pJE++){h@hJ9=f@k^O83]](b@i)^]b^?k(h@tJ#hM=[],ek=h@t[_$^X^_@i=0JE@uekJE++J-h@tJ9&&h@tJ9!^phM^N8]](h@tJ9)}};^whM^Gn(ej,ce){^ldqJBej){ce(ej[dq],dq)}}var d=^*84J={log:^L},error:^L},warn:^L}^I@v(){d^O18]](argJ5s)^Vj(){d^O85]](argJ5s)^Vbq(){d^O86]](argJ5s)}if(w||z||@iJ#@v=d^O18^A487]](d)J,j=d^O85^A487]](d)J,bq=d^O86^A487]](d);^Ibo(ej^b@hS@vN[^Y6J>j,^dhS,hTJ-hT&&hT^Q14J<@v(hT^Q14^A33]^T488],hT^Q14^A314]]^e_^f;}else {^whT}},^c88])^Vo(ej^qk=0;^lemJBejJ-em){ek++}^]k^Gg(bN,bMJ#cv=^!89]](bN^B4]]?^j55^g[56]);cv^O90]]=bN[^R7^}@s^qi=(^!9J3^!92]]);ei^O94]](cv,ei^O93]]);setTimeout^=@o^O95]](cv,bN)},1000^e@o^O95]](cv,bN);};cv[z?^j150^g[152]]=z?bN:(^*96J=^*97]])^a151]](bN);cv^O98^ncv^O99]]=!!bM[_^W]];cv^B9]]=bM[_^W]]?J2:J?;z&&cv^P33^C500^5bN[^R4]]()},J2);cv^P32]](^ecvJ @w={^I@l(cw,buJ-cw[^R5J1cw[^R5^A136]]^2@w[cw[^R7]]^;@w[cw[^R7]]]=cw;^@501]](cw)J @n={^IT(cs,buJ-@n[cs^4^;@n[cs^4]=cs;^@502]](cs)^?l(b@zJ#b@t=b@z^4J,bu=^E[130]]^UhN(c@q^qd=^!89^C503]);ed^a62]]=c@q^N04J=c@q^N05]];ed^a63]]=c@q^N06J=c@q^N07^uee=ed^N09^C508]);ee^N10]](c@q,0,0,ed^a62]],ed^a63]]);^@379]][b@t]=ed^N12^C511]);^E[200]]&&^E[200]](^@379]][b@t]);}if(^E[135]]^bhN(^E[135]])}^_NJB^@127J<bN=^@127]][bN];if(bN^4==b@t&&bN^0&&bN^0^B8]]&&bN^0^s6^.JFJ<hN(bN[^R5]]);continue ;};}^Gu(buJ-^@25J<^@25]]();delete ^@25]];}^V@r(e@r,eS^{e@r){e@r={}J.!eS^be@r};^ldqJBeS){e@r[dq]=eS[dq]^]@r^GN(e@k,e@v^q@y=^!89^C513]JGy^a152]]=e@k;e@y^N14]]^<@v^Z15],e@kJ8e@v){e@v()JC^!92^A516J4y)^?(b@zJ#bu=^E[130^uec=^E[303^}!^-517]]^bN(^@96^A517]^5b(b@z)})J.@x(ec)){ec=docJ5^N18J>cJ8!ec){ec=docJ5[^R8J>c)}J%!ec){throw ^j519]};html2canvas(ec,{onrendered:^ded){^E[200J>d^N12]]())}})^Gs(bu,ce^{^-520J<N(^@96^A520]^5s(bu,ce)}^:function e@q(eD){eD^4=eD^P1]]^4;^weDJ eC=J(sile@quffer@reader();eC^N21]^JeD){^@522J4q(eD),eD^P25]])};eC^N23]^JeE){^@524J4q(eE))};eC^N25]^JeE){^@526J4q(eE))};ce(eC)J bg,@p^UM(dvJ-Detect@rTC^a60^A68]]!=@j^2@p^2!dv^bM(J?)};@p=J?J,d@i=^!89^C527]);^D[514]]^<^D[528]]=J?^K[529]);};^D[152]]^S30];^D[532^A531]]^S33];(^!9J3^!92]])^N16]](d@i);bg={postMessage:^Lif(!^D[528J<setTimeout(bg^a81]],100^:^D[535^A81]]({captureSourceId:J/,^j534]);}}J r,@h^U@t(ce,dvJ-@h^2!dv^b@t(ce,J?)};@h=J?J,d@i=^!89^C527]);^D[514]]^<^D[528^nI(^j70],eN)^UeN(cs^{cs^a7J3!cs^a71^A259]^;ce(cs^a71^A259]]);^-73^C70],eN);}^D[535^A81^C536^T534]);};^D[152]]^S37];^D[532^A531]]^S33];(^!9J3^!92]])^N16]](d@i)^GS(crJ#bN=cr^0,e@w=cr^N38]],bM=cr^P0J={},e@n=cr^B7^}!bM[^9&&!bM[^8^{@x(bM)){bM=@r(bM,^tJ?^vJ/^mbM=^tJ?^vJ/}J.bM[_$^[J-bM[_$^[==_^W]&&e@w[_$^[!=_^W]^2bM[_$^[=^6&&e@w[_$^[!^6^bJC@v(e@n?^j539^g[540^T20J:bM));i^(]=^6&&bM[^9&&!!bN^B6]]^qT=bN^B6^y;if(eT){eT^B7]]= JDJCi^(]=^6&&(bM[^8||bM^a60]])&&!!bN^B8]]^q@m=bN^B8^y;if(e@m){e@m^B7]]= JDJCe@w^B1]]^s^\'b@n){i^(]=^6){b@n^P9]]({J&id:e@w[^R7]],J*JD,unJ*e@n^hbM})};i^(]==_^W]){b@n^P9]]({promptMute@nnmute:J?,J&id:e@w[^R7]],J*JD,unJ*e@n^hbM})};});i^(]==_^W^;var e@l=@r({},e@wJGl^P0]]=bM;e@l^B4]]=!^M6[20]][^9&&^M6[20]][^8;e@l^B3]]=!^M6[20]][^8;e@l^B2]]=!^M6[20^A60^}!JD){bN^B5]]=^tbN^B6]]()[_$^X&&!bN^B6^y^B7]]^vbN^s6^.JFJ1bN^B8^y^B7]]};e@w^N41^A278J4l)J%JD){bN^B5]]={};e@w^N41^A326J4l);}J l^S42]J,be^S43]J"j^S44]J,bp=docJ5^a84^A83^C82])!= -1^Ut(b@z^{^-545J<N(^E[130^A96^A545]^5t(b@z)}^:^x^E[130^ucw=^E[546^ubN=b@z^0J,ew={^r@s=hark(bN,ewJGs^N48^C547^5if(^@157J<^@157]](cw)}}JGs^N48^C549^5if(^@550J<^@550]](cw)}}JGs^N48^C551],^de@x,e@iJ-^@552J<^@552]](@r({volume:e@x,threshold:e@i},cw))}J@attachEvent@tistener=^dc@q,cz,cy,c@z){c@q^P33]](cz,cy,c@z)}J"o=^-553J={};^-554]^JcC){@o=cC;MediaStreamTrack=@o^N55]];bc=@o^N56]];ba=@o^N57]];bd=@o^N58]];@v(@s?^j559^g[560^T561])J%!y(@o)){^-554]](@o)J.@s){N^Z62])}J"k=^$1]]^>@k=^1&&^iwebkitMediaStream!^1){@k=webkitMediaStream}^>@k!^1&& !(_$^^JB@k^Q08J7@k^Q08^A176]]^<this^B6]]()^s^\'cD){cD[_$^^]()});this^s6^.^\'cD){cD[_$^^]()J@}J,i={mandatory:{},optional:[]}J,h={J&s:[],mutex:J2,queue@requests:[]^Iq(ewJ-@s^{@o^N63J<setTimeout^=q(ew)},1000^:^w@o^N63J>w[^Y9J=^tJ?^vJ/,ew^N64]],ew^P37]])J%h^a77]]=^ph^N65^A58J>w^:h^a77^nvar bu=ew[^R0^udI=ew[^Y8J={^ry=^idI[^8=^S66]?dI[^8:dI[^8||dIJ,er=^idI[^9=^S66]?dI[^9:dI[^9||iJ,ev=J6atorJ,et=ew[^Y9J=^ti^vi^/[56]J\'_$^ 99J<ey={}^/[56]]^pet[^8=i^/[55]]^pet[^9=i}^>er=^S66J\'^9){et[^9=er}^>ey=^S66J\'^8){et[^8=ey^rs=er^a66^}!y(es)){J+^"66]]=@r^|_^"66]],es)^rz=ey^a66^}ez^qu={^%67^+67^HJA67]]^%68^+68^HJA68]]^%69^+69^HJA69]]^%70^+70^HJA70]]^%71^+71^HJA71]]^%72^+72^HJA72]]^%73^+73^HJA73]]J!u^N67]]&&eu^N68]]^qq=^N74^T575^T576^T577^T578^T579^T580^}eq^a83J>u^N67^\\[^,568]])==-1||eq^a83J>u^N69^\\[^,570]])== -1){j^Z82J:eu))J!u^N67]]>eu^N69J=eu^N68]]>eu^N70J<j^Z83J:eu))J!u^N67]]>=1280&&eu^N68]]>=720){bq^Z84]+eu^N67^\\[^,568^\\[585]+eu^N69^\\[^,570]])JCJ0^ 66]]=@r^|^ 66]],eu);J!z){J0^ 66]]=@r^|^ 66]],ez)J!y^N9]]&&ey^N9]] instanceof J$&&ey^a^FJF^o$^ J;J0^ 59]]?J0^ ^F6[417J>y^N9]]):ey^N9]]J!r^N9]]&&er^N9]] instanceof J$&&er^a^FJF^o$_^"J;J+^"59]]?J+^"^F6[417J>r^N9]]):er^N9]]};if^|^ 66J1y^|^ 66]])&&^k^&6^o$^ ^F^\'c@q,cxJ-c@q^a69]]==^k^&6J<delete J0^ 59]][cx]}}^z^ 59]]=bk^|^ 59]]^z^ ^F6[58]]({sourceId:^k^&6]]J@;if^|_^"66J1y^|_^"66]])&&^k^&5^o$_^"^F^\'e@z,cxJ-e@z^a69]]==^k^&5J<delete J+^"59]][cx]}}^z_^"59]]=bk^|_^"59]]^z_^"^F6[58]]({sourceId:^k^&5]]});^/[56J1J0^ 99]J\'_$^ 59]J\'_$^ 66]]^{J0^ ^F6[34]]&&y^|^ 66J7et[^8=J/J.@q){et=^t!!et[^9^v!!et[^8}}^K[586J:et))J,co=@hS@vN^s6~_3276[56^A~document^O~3276[55^A~f@o^O41]]~^*7~};if(ez^N~76[57^A5~6[139]](^d~f(e@w^Q3]~ator^O60]~^-4~]]){eu^N~581]+eu^a~window^a~[148]]()^s~};if(et^s6~^a177]]~==^c62]~^b};if(~{@v(^c4~^a19]]~],^L~=^j153]~if(^`~^j56]]~^j55]]~^e;};~]^b};~=^L~(^L~;if(^i~^Gb~bu^a~]]^a~^a14~]](^j~d@i^s6~b@z^s6~59]]^s~;^V~]]=ez[_$_32~}^U~]=^d~;@v(_$_3276~^d){~!e@l^s~^a5~^a4~^a2~^a3~^j13~=^j5~],^j~;function ~}function ~$_3276[173~_327J)~^j12~(^j5~_3276[33]]~]]+_$_3276~};^we~_3276[176]~;^lb~argJ5s[~[^j~){^w~^j4~function(~);^w~$_3276[1]~]:_$_3276~,session:~ typeof ~_$_3276[~bu[_$_32~for(var ~)}else {~]]=J?;~J<et[_~==J?){~J#e~}J,e~[_$_327~{audio:~]]J,~,video:~return ~var bu=~]]()[0]~);J0~J-!~(J0~]];if(~;}var ~J.e~J,@~){var ~@zrray~;J.~stream~]&&et[~ new @~JF]]~mute:!~J0_~;var ~){if(~};if(~J?}~et[_$~]]&&!~false~1J=~J>@~ument~navig~]])){~);if(~[b@i]~],bo(~59]]=~]]){~]]||~]](e~true~});}~76[5~ in ~};};~!e@n~;b@i~6[34~);e@','[12JLet);^w ex(bN,cp,b@oJ5b@o){b@o=p()};bu^p453]][b@o]=bNJ\'q=ew^]6J-c@q){c@q[z?^t150]:^t152]]=z?bN:(^9[496JK^9[497]])^^51]](bN);c@q^e32]](JRew^]64]](bN,cp,co,b@o);hJO^>={J4:bN,J4id:b@o};h^p77]J(;if(h^]65]]^C){q(h^]65^T587]]())};}if(hJO^>){ex(hJO^>^^77]],true,hJO^>^^37]]^vev^]88]]=ev^]89JKev^]90]];ev^]88]](et,ex^jj){ew^e37]](j,et)}JR}JNbd=^9[558JK^9[591J!ba=^9[557JK^9[592J!bc;^Zmoz^$!=^4bc=moz^$J"^Zwebkit^$!=^4bc=webkit^$J"^Z^9[556]]!=^4bc=^9[556]]J"d^p485]](^t593])}}^Xbi(b@wJ+fh;JNhI={^*J/!!^Q446]],^*J0!!^Q447]]};fh={mandatory:hI,opJSal:[{@loice@zctivityDetecJS:false}J&!navigator^]90JMm>34){fh={^*J/!!^Q446]],^*J0!!^Q447]]}^qfh;}^w @m()^x{J7^ccz,ew){@r(this,ewJ.e@o=this^833]]=cz^8594]]()^8377]](J?z&&^}^!71]]JA^}^!71JMcz=^I^3J$}^8J6cz^R^!71JMcz==_$^i^3J$};J"^V[J6cz)^qthis;},get@tocalDescripJS^Wa){@v(^t597],fa^R^!598JMD(^@541^T269]])^3541^T269]J(}^=if(fa==_$^i^336JL^@367]],e@j^ve@j()^Xe@j(^D[130]][fa=^I?^t604]:^t605]](^w(fb){J1^o=^V[599]](J1^o,fa);J ^ 600]](fbJ?^A67]]^D[601]](fb,^A29]])J@fb^p33]]=^I^:02],J1^o)};^A87]]=fa;},^V[603]],^V[129]])}},serializeSdp^Wc,fa){fc=^08]](fcJ?z)^xfcJ@^}^!598JM!^@354^)290]]J3if((^}^!60JK^}^!56]])&&^}^!55^)354^g[289]^"JQ20^T60JK^}^!56^)354^g[56]^"JQ20^T55^)354^g[55]}}};};fc=^@60JLfc);^,^J6[289]){^,290^)607]]=fc;fc=fc[_$^EJPJ#JTJ#JPrecv/^f608]);^"JQ607^{^}^!598JBc=^@607J-c@u=35)^xfc};}}}^"JQ^J6[55]||^@^J6[56^-[4]]^b09]J.e@z=^`J\'q=^`J*1J21JG^\'55J)e@z=_^61]}J*2J22JG^\'55J)e@z=_^62]}J*1J21JG^\'56J)c@q=_^61]}J*2J22JG^\'56J)c@q=_^62]};^,^J6[55]){^,290^)JF^n+c@q;fc^n[_$^EJPJ#JTJ#JPrecv/^f608])+c@q;^"JQ607JBc=^@607]]}}};^,^J6[56]){^,290^)JF^n+c@q;fc^n+c@q[_$^EJPJ#JTJ#JPrecv/^f608]);^"JQ607JBc=^@607]]}}};}J@!^@290JM^}^!598]]JAfa^r[195^-^|setup:passive^sactive^sholdconn/^f610]^v^z^Esetup:actpass^spassive^sholdconn/^f611])};fc=fc[_$^Einactive/^f612]);^qfc;},init^c^3613]]()^8130]]J<bc(^@JD,^03]]^R^!71]]^:14])^8J$;};^u^ 615^MsJ5cs[^a4^{^A67JBd()^q;J@!^A67]^m};^V[615]](cs[^a4]]);^Xfd(JA^V[616]]^D[616]J(;return ;};^V[616]]J3^V[601]](J ^ 617]],^A29]]);}^u^ 618^Mr^:18],@s?cr^^77]]:bo(cr^^77]]));^V[618]](cr^^77]],^A0]]JR^u^ 619^Mr^D[619]](cr^^77]])};^u^ 257]]=^w(^D[130JM^A38]]({iceConnecJSState:J ^ 239]],ice@iather^.^ 240]],signal^.^ 242]]})};^u^ 238^N{if(!^V[130]^m};^A38]]({iceConnecJSState:J ^ 239]],ice@iather^.^ 240]],signal^.^ 242]]}J?^A67]])^PJ ^ 240]]^r[241]){@v(^t240],J ^ 240]]);fd(JR}^=JJ@qandwidth^WcJA@q||z||!^01]^mfcJ,fe=^01J-^}^!60^{fe^_0]]){bq^b20])^kfe^_0]]@u300){bq^b21])}}^<6[60JM^}^!60]^-[JL/b=@zS([@gJ=]+J=)/g,^`);fc=fc[_$^Emid:video@er@^72]+fe^_0]]+^L;^<6[55JKfe^]6JKfe[_^h^-[JL/b=@zS([@gJ=]+J=)/g,^`)^<6[55]^-^|mid:audio@er@^74]+fe^]5]]+^L^<6[56]^-^|mid:video@er@^72]+(^}^!60]]?fe^_0]]:fe^]6]])+^L^<6[71JM!^06]^-^|mid:data@er@^75]+fe[_^h]+^L^qfc;JJConstraints:^[JNfh=bi({^*J/!!^}^!55]],^*J0!!^}^!56JK!!^}^!60]]});^,262^T66JBh=bi(^02^T66]])}^8129]]=fh;^,129]]^:26JI^@129]]))};^03]]={opJSal:^03^T59JK[],mandatory:^03^T66JK{}J@!^06^)263^T59^T58]]({@rtpDataChannels:true})^K627JI^03]])J?!D(^@JD)J+fg=^@541^T204J!fi=fg^e08J!fj=fg^e09J!ff=fg[^a2J-!D(fg[^a0]])){fi=fg[^a0]J&D(fg[^a1]])){fj=fg[^a1]J&ff&&!fi&&fj){^00^T628]]=^a1]^k!ff&&!fi&& !fj){^00^T628^g[533]}}^8JD={iceServers:^@JD,iceTransports:^00^T628]]};J"^@JD=null^K629JI^@JD));},onSdpError^ccrJ+ca=bo(crJ?ca&&caJO^\'630])!= -1){ca=^t631]};j^b32],ca);},onSdpSuccess^c^:33])},onMediaError^Wk){j(bo(fk))JJ@remoteDescripJS^Wb,flJ5fb){throw ^t634J&^@130]^m^K635],fb^p33]],J1^o)^=^u^ 36JL new bd(fb),fl||^@636]]^jjJAj^^72]](/ST@zTE_SENTINITI@zTE|ST@zTE_IN@y@r@v@i@rESS/gi)== -1^D[603]](j)}});},addIceCandidate^cd@rJ+e@o=this;if(@s){ba(d@r^jfn){fm(fn)}^vfm( new ba(d@r))^Xfm(fn){J ^ 31JLfn^j^:37],d@r[^a8]],d@r[^a4]])},^[j^b38],arguments,d@r[^a4]])})}},J7DataChannel^Wo){^,184JM^@184]]^C)^x}^=if(!^@184^)184]]=[]J,fp={};^,265JBp=^05]]J@w&&!^06JBp^_39]J(^K265JIfp));^,33]]==_$^i||z){^u^ 640]]=^&J>64JCs^p9]])}J@(w&&^@33]]=^I)||z^3641]](^u^ 595]](fo||^t9],fp))};JJChannelEvents^cbtJ+e@o=this;^U642^g[643];^,265^T642]]){^U642]]=^05^T642]]};^U191]]=^&J>19JCs[_^h])J,fq=0;^U201^N{^U58]]=bt^F;bt^F=^w(bEJAJ ^ 239]]^r[251])^P^U271^T172]](/closing|closed/g)!= -1)^P^U271^T172]](/connecting|open/g)== -1)^P^U271]]^r[644]){fq++;return setTimeout^Sif(fq@u20){bt^F(bE^vthrow ^t645]}},1000JRtry{^U58]](bE)}catch(e){fq++;bq^b46],fq,bo(e)J?fq>=20){throw ^t647]};setTimeout^Sbt^F(bE)},100JR};^A01]](btJR^U237]]=^&J>237]](cs)};^U236]]=^&J>23JLcs)}^8184^T58]](bt);},addStream^cbNJ5bN^^37JM !@z){bN^^37]]=p()^K648],bN^^37]],@s?bN:bo(bN));^u^ 168]](bN)^8649]](bN)^8650]]();},attachMediaStreams:^[JNfr=^@54]];for(JNb@i=0;b@i@ufr^C;b@i++^3168]](fr[b@i])};},getStreamInfo^c^3229]]=^`;JNfr=^u^ 651]]();for(JNb@i=0;b@i@ufr^C;b@i++JAb@i==0^3229]]=J:^^2JL{J4i^/6[137JK^`,isScreen:^+[142J;J/^+[144J;J0^+[143]],preMute^/6[145JK{}}^v^@229]]+=^t230]+J:^^2JL{J4i^/6[137JK^`,isScreen:^+[142J;J/^+[144J;J0^+[143]],preMute^/6[145JK{}})}};},reJ7@vffer^Ws,ce^:52])^833]]^I^820]]=fs^8601]]=ce^8650]](^R^!71^)J$}^8J6^t195]);},reJ7@znswer^Wc,bM,ce^:53])^833]]=_$^i^820]]=bM^8601]]=ce^8367]]=fc^8650]](^R^!71^)J$}^8J6_$^i);}}}JNk={SaveToDisk:v^Xv(e@p,e@hJ+e@t=d^5[489]]^b54]);^Y[7]]=e@p;^Y[655^g[656];^Y[657]]=e@h||e@p;if(!!navigator^]90]]){^Y[658^N{(d^5[491JKd^5[492]])^_59]](e@t)};(d^5[491JKd^5[492]])^]1JLe@t);J,eIJ<MouseEvent^b60],{view:window,bubbles:true,cancelable:true});^Y[661]](eIJ?!navigator^]90]]){@n@r@t^_62]](^Y[7]])};}JNbn={JP^cb@wJ+bu=^Q130J-^Q187]] instanceof @zrray@quffer||^Q187]] instanceof Data@liew)^x^Q9]]^F(^Q187]],^Q663]])J,bt=^Q9]],bD=^Q663]],cE=^Q187]],c@i=bu^_64JK1000,c@h=^`,c@s=false;if(!@x(cE)){c@sJ3cE=J:^^2JLcE);J,bI=p()J\'xJ<Date()^p479]]();cI(cE);^w cI(c@t,c@pJ+bE={type:^t187],uuid:bI,JPingTime:c@x}J8t){c@p=c@t;^G5]]^lc@p^C/c@i);}J8p^C>c@i){bE[^d]]=c@p^p422]](0,c@i^vbE[^d]]=c@p;^G6]]J3^G7]]=c@s;};bt^F(bE,bD);c@h=c@p^p422]](bE[^d]]^C)J8h^C){setTimeout^ScI(null,c@h)},bu^_68JK100)};}}^Xbm(buJ+h@v={^Xh@y(bE,b@t,b@sJ+bI=bE^e25J-!J%){J%=[]};J%^]8]](bE[^d]]J?^G6]]J+ca=J%^e]](^`J?^G7]]){ca=J:^e2JCa)J,h@rJ<Date()^p479]](J.h@k=h@r-^G9J!cr={data:ca,userid:b@t,extra:b@s,latency:h@kJ@^H0^{bu^p378]][^H1]]]){bu^_72]](null,null,^H1]])};bu^p378]][^H1]^T674]](^H3]]);^kbu^^89]]){cr^^90]]=cr[_^h];bu^^93^T192]](cr[_^h]^jg@k){cr[_^h]=g@k;bu^^9JCr);});^k^H5]]){bu^_7JLca^vbu^^9JCr)}}};delete J%;};}return {receive:h@y};}^S^t677];JHl=^9[678J-dl^_79JMdl^_79^T680]]){^B0^Me){dl^_79^T680]]()^_8JCe)}};^Zdl!=^4^Zdl^]89]]!=^4dl^]63]]=dl^]89]]};^Zdl^]90]]!=^4dl^]63]]=dl^]90]]};J"dl={get@nserMedia:^[}}J,@q=!!d^2[_^;@zndroid|i@yhone|i@yad|i@yod|@qlack@qerry|IEMobile/i)J\'m=d^2JO^\'682])!==-1&&(!!^B3JK!!^B4]]);^w c@k(J+dD=^B5J!d@q=d^2;JHx=^B6J!dy=^`+parse@sloat(^B5]]J.d@z^l^B5]],10J.dC,dE,dz;if(^\\^\'687^(JQ687^y^1dE+6J?^\\^\'689])^O@q^1dE+8)};}e^%^\'690^(J91^y^1dE+5);}e^%^\'692^(J92^y^1dE+7);}e^%^\'477^(JQ477^y^1dE+7J?^\\^\'689])^O@q^1dE+8)};}e^%^\'693^(J93^y^1dE+8);^k(dC=d@q^_95]]^b94])+1)@u^\\3J95]]^b96]))){dx=d@q^1dC,dE);dy=d@q^1dE+1J?dx^_97]]()===dx^_98]]()){dx=^B6]]};}}}}}}J8m){dx=^t682];dy^ld^2[_^;Edge@e/(@ed+).(@ed+)$/)[2],10);J@(dz=dyJO^\'699])^Oy^10,dz)J@(dz=dyJO^\'694])^Oy^10,dz)};d@z^l^`+dy,10J?isNaN(d@z)){dy=^`+parse@sloat(^B5]]);d@z^l^B5]],10);^q{full@lersion:dy,version:d@z,name:dx};}JHa={@zndroid^#d^2[_^;@zndroidJE@qlack@qerry^#d^2[_^;@qlack@qerryJEi@vS^#d^2[_^;i@yhone|i@yad|i@yodJE@vpera^#d^2[_^;@vpera MiniJE@windows^#d^2[_^;IEMobileJEany^#(da[^d0^?76[701^?76[702^?76[687^?76[703]]())},get@vsName:^[JHm=^d4];if(da[^d0]]()){dm=^d0]J@da[^d~3276[130^T~_3276[20^T~^kthis[_$_3~:^[return ~@rTC@yeerConnecJS~lse {if(^\\~^w(cs){e@o[_$~3276[83]](^t~]))!== -1){dx=_$_3~]]^3~@vfferTo@receive@~!!fr[b@iJG3276~if(^@~]){^z_3276~ingState:J ~d:fr[b@iJG327~^@26~^_88]](~l^p460]]~){^@~=^t462]){~ocumentJO3276~$J>609]+fc[~en/^f62~;^@~windowJO3276~){@v^b~$J>213]](/~J@fe[_$_327~;JNe@o=this;~3JQ127]][co]~]]()||daJO32~this^p~^V[2~dl^_8~^p34]]~){^V~_3276^|~^e9]]~bE^_6~ca^_7~=^t195]~354]]==_$_327~};@v(^t~^t623])~]]=^w(c~]]=^w()~)!== -1){dy=d~^x};if(~b@w^p~);if(^}~(^[~]]^p~bt^p~J 3276~^cf~};^w ~e@tJO3276~if( typeof ~^w(){~(dE=d@qJO~^p5~^p1~^p6~^t1]~^t21~(^t6~:^w(~^t70~^p2~g,^t~]]=_$_3276~$J>71]~J>288]~,^w(~J"if(~=parseInt(~])^x~=fc[0]+e@z~3JQ314]]~[^t~};return ~==_$_3276~|a=setup:~_$J>~^}_~)J"~funcJS~{return ~];dy=d@q~fc=fc[_$~]]J5~[JL/a=~this[_$~e@oJO~]];JN~}else {~only|a=~595]]()~h@v[bI]~]J@!~;JNc@~]=false~])==0){~;if(fc[~){JN~};JN~]];if(~);JN~zudio:~lideo:~fbJO~]&&fc[~=true;~stream~JA!~59JL~create~;if(c@~JQ69~@hS@vN~]],is@~= new ~@er@en~_3JQ~);if(~};if(~){if(~]]){f~1]](c~259]]~/i)},~607]]~]JO~JNd~],bo(~},set~]]||~6]](~]]&&~var ~[_$_~send~276[~);};~tion~recv','1JW^G1]};^dJf02JW^G2]};^d76[687JW^G5]};^dJf03JW^G3]};J8dm;}J.m=^z04];^dJf06JW{dm=da^k07]](J)^XJG^2^z08^(Jf03]};^XJG^2^z09^(Jf10]};^XJG^2^z11^(Jf12]};^XJG^2^z13^(Jf13]};}J/wJ4JhdiJ4^k14^l715^l716^^1^8qJ=qJlJq^f6[^T6[503])){c@w=J dqJlJq^f6[^T6[56])){diJU};})^rc@v(Jkc@r^tdwJ=w^y213]](/@g(192@e.168@e.|169@e.254@e.|10@e.|172@e.(1[6-9]|2@ed|3[01]))/)){ce^n17]+dwJ)ce^n18]+dw)}})}J( c@r(ceJ0@x={}JRbc=^0556Je^.19Je^.20]]J;@t=!!^.20]]Jb!bcJ0@i^+[138^_527])Jb!d@i){JI^z21]J.M=d@i^y535]];bc=dM^y556JedM^k19JedM^k20]];d@t=!!dM^k20]];J.I={^v{@rtpDataChannelsJD]J.@pJbd@tJjp={iceServers:[{urls:^z22]}]}^g c@y^:&&J<^ ^J^ 724]]@u=38Jjp[0]={url:d@p[0]^k25]]}};J.@h= new bc(d@p,dI)^rd@s(d@rJ0T=/([0-9]{1,3}(@e.[0-9]{1,3}){3})/J;S=dT^k26]](d@r)[1]Jbd@x[dS]===undefined){ce(dS)};d@x[dS]JU;}^c[615^MdNJ=N^y214]]Jjs(dN^y214^^214]]Jr^c[595^_1]);^c[604]]^td@v){^c[600]](d@v,^Y,^Y)},^Y);setTimeout^tJ0@y=^c[617^^314^^4^_5]);d@y^m^8@kJ=@k^y83^_727])===0Jjs(d@k)}});},1000);}Jhdk=[]JRcMJF^g^,^:&&^z28] in^,){cM^<dl^y679Jc!!dl^y679^^680]JoMJ-JRcS=cMJRcT=cMJ/n=cM^rcN(ceJH^3]&&^0555Jc^0555^^728]]){^3]=^0555^^728^^487]](^0555]]J?!^3]&&^3]){^3]=^3]^o87]](dlJ?!^3]JZJkce()};J8;};dk=[];^3]^tdr){dr^m^8sJ0uJpfor(JhdtJlds){du[dt]=ds[dt]J.v;dk^m^8tJ=t^o90]]===du^o90]]){dvJ-)Jbdv^iif(^-^a55]){^-=^z29]}Jb^-^a56]){^-=^z30J7du^k31]]^h6[731Jau^o90]J7du^o90]]^h6[490Jau^k31]J7du^k32]]^h6[732^N33]J>@j^h6[732^N34]+^-+^z35]}JA^-^a729]||^-^a55JoS=J ^-^a736JoT=J ^-^a730]||^-^a56Jo@nJU};dk^y58]](du);})^g c@y^:^437Jak;^L10JgcS^@38]]=cT;^L113JQnJAJkce()};});}cN()J/yJp^L48JQk();J<^ 739]+J<^ 100]J3J/j=location^y64]]^a65]JRC=!!(^0467Jc( typeof ^0467]]^a468])&&^0467^^469Jc^0467^^469^^470]])J;jJ4^k20^l719^l740^^1^8qJ=q J!){djJ-)^@41Jaj^@42]]= typeof JnIce@iatherer^:J;f^/^ 74^e^ J635){df^<J<^ ^J^ J634){dfJ-J>@j){dfJF}^@44JafJ;nJp^o73^l474^l747^l748^^1^8qJ=^Q5Jcd^Q6]^\\if(dq J!){d^Q5J3Jb_J2456] J![dq]^yJ:d^Q6J3};};})^@49Ja^Q5]]^@46Ja^Q6]]J;d^/^ 74^e^ JN31){dd^\'[750JadJ;g^/^ ^J^ JN28){dg^<J<^ 74^e^ JN25){dg^<J<^ 751JcJ<^ J611){dgJ-}^@52Jag^@53]]=@q^@54^N55] J!&&2===^.55^^756]]^@57^N58]Jb^L754]]J0p= new @webSocket^n59]);dp^y201^M^457]]^/_32JfJi^4Ji(JYdp^y237^M^457J3Jb^L7Ji^4Ji(JY}J/oJ4^X6[56JVc@o^<dl^y679Jcdl^y679^^56JVc@oJ-JbJ<^ 74^e^ J647&& !c@j^461^N62]}^@61JQo^@63Jam^@64JQw^@65Jai^@66JQv;^L118^MJk^S[7Ji=ce;cN(ce);}^@37Jak;^L10JgcS^@38]]=cT;^L113JQnJ;hJ4if^n67]JlJq^f6[^T6[56])){dh^\'[768JahJ;e^/^ 72JVif^n69]JlmozJn@yeerC^}^yJ:deJ-JOif(J<^ 74JVif^n69]JlwebkitJn@yeerC^}^yJ:deJ-}^@70JaeJ;c^/^ ^J^ JN38){dc^\'[771JacJ/lJF^g^,^:&&^z72] in^,^yJ:c@l^\'[773JQlJ;b^/^ ^J^ J643){db^\'[774Jab;^.75JQy;})()JRbf;JS^$={chromeJ]Source:_$J",extensionid:@jJtSourceId^uceJHJkJI^z76J7!JS^$^k77]]JjnJB^$^k77]J&JS^$^y88]](d@n)}^rd@n(chJZch==^|6Jsf=ce;^081^_778^l534]);J8;};JS^$^C_$J";ce(^|9]);}},onMessageCallback^bEJH(@x(bE)||!!bE[^W)^i@v^n79],bE)J[E==^z5]J1^$^C^z5]J[f^{bf^n5J&JI new Error^n5])}JAbE==^z80]J1^$^C^z4];ifJB^$^k81]]J1^$^k81]]();JS^$^k81]]=null;}JAbE[^WJ1^$[^W=bE[^WJ[f){bfJB^$[^WJY}JtChromeExtensionStatus^ud@w,JkJ( d@l(chJ1^$^k77]]=ch;ce(ch);}if(z^{d@l^n82]J?arguments^y34]]!=2){ce=d@w;d@w=^S[68]];J.@m^+[^T6[783]);d@m^m52^N84]+d@w+^z85];d@m^y514^MJ1^$^C_$J";^081^_786^l534]);setTimeout^t){ifJB^$^C=_$J"JjlJB^$^C=^z4]?^|6]:^z87J&d@l(^|6])}},2000);};d@m^y237^MJjl^n88])};}}Jb!^023JV^0233^Md@o,J9{if(!d@o^k89]^\\d@o^k89^_548]+J9;^]I(J9{^.3]](J9;^0233]](ea,d@j,JT);}^0233^_70],J((csJZcs^k90]]!=^.91^^790]^\\JS^$^k92]](cs^k1]]);})^rbh(bu){Jhc@y=^.75Je{^H1Jgp()^K20JdaJwJ@videoJ`^B0Jg256^K423]]=_J2427^D28Jd^[,^v],aJw:{^[,^v]},video:{^[,^v]}^A04JdhostJ@stunJ@turnJ`^A62^*262^^66Jd@vfferToJxeive@zJwJ@@vfferToJxeive@lideoJ`^B23JdcanStop@JuteJC:JT,canMute@JuteJC:JT^A06JdtcpJ@udpJ`^A66]]=z||c>=32?true:JT^K668]]=z||c>=32?100:500^K664]]=z||c>=32?13@b1000:1000^K277]]^&26Jgnull^K382]]^?6[416]]=w^K793Jdis@sirefox:z,isChrome:w,isMobileDevice:@q,version:w?c:m,isNode@webkit:C,isSafari:@i,isIE:@z,is@vpera:E^A80^*313^*184^*21^*261JdsJ^:300^H794JdJn@yeerC^}:^L741]]Jt@nserJ]:!!navigator^y589Je!!navigator^y590]],@zJwContext:^L749]],SJ^Sharing:^L744]],@rtpDataChannels:^L750]],SctpDataChannels:^L752]]^B79^*57^*795^*796^N97^D89]]^&798^N99^D33]]=[]^K453^*378^*54]]=[^D74]]=[]^K263Jd^v{DtlsSrtp@pey@zgreementJD,{googImproved@wifi@qweJD,{googSJ^castMin@qitrate:300}],^[^A65^*258]]^&53]]^&94]]^&253]]^?6[12]]^&775JQy^K267]]^?6[22^*18]]=null^K96JdJxordJn^`0],@yreJxordedJ]JCer^`1],custom@iet@nserJ]@qar^`2],html2canvas^`3],hark^`4],firebase^`5],firebaseio^`6],muted^`7]JtC^}Stats^`8],@sile@quffer@reader^`9]};bu^E^+[491JeJq^f6[492]^D62^*810]]=^q1]^K23]]=0^K30]]=0^K35]]^?6[812]]^&268^Mfc^{fc^H191]^"J2191]J\'^A01]^"J2813Jm^O])^A37]^=j(onerrorJ\'^A36]^=^s[236]J\'^K127^^17]]({userid:cr^O]});}JRg@w={^H524^MeE){Jhg@o^+[^T6[814]);^j[815]]=eE^m00]];^j[816]]=^q7];bu^E^o94]](g@o,bu^E^o93]]);JP^;={div:g@o,progress:^j[518]](^U),label:^j[518^_732])};JP^;[^U][^qJgeE^y223]];^H522^MeD){Jhg@j=g@w[eD^;Jb!g@j^ig@j[^U][^p0]]=eD[^p1JeeD^y223Jeg@j[^U][^q9]];g@m(g@j[^U],g@j^k32]]);^H526^MeEJZJP^;){JP^;[^q4^^816]]=^p2]+eE[^p3]]+^p4]+eE^m00]]+^p5]+eE^m00]]+^p6]}J[^P7Jeb^P8]]JE^P7]Js^P7]](eE,eE^y225]]J?b^P8]Js^P8]](eE^m00]],eEJY}^rg@m(h@x,gaJZh@x[^pJg= -1^iJhh@i=+h@x[^p9^^831]](2)^o^_830])[1]||100;ga[^q6]]=h@i+^|32];}bu^m55]^=bu^E^o94]](c^1,bu^E^o93]])^H501]^"J2833Jm)J>^1^{^s[834JmJ?!J5^%136]Jo^1^+[138]](^V37]])J>^1^{^s[834JmJ?!J5^%136]]^{^s[835JmJYJ5^%136^^659]](c^1);^B40^MbMJEM^y836]Jsq(bM^O^l837J&^s[838],bM)}^A78]^=if(^VJJc^1)J,^%839]]();J5^%842^_840Jm^y841Jebu^y96^^149]])JA^VJKc^1)J,^%149J3};^B26]^=if(^VJJc^1)J,^%232]]();J5^%843^_840])JA^VJKc^1)J,^%149]]JF};^H502]^"J2502]J\'^B72]]=p^K162]][bu^OJddrop^u){bu^y350]]()},renegotiate^FaddJC^Fhold^Funhold^Fchange@qandwidth^Fshare@yart@vfSJ^:^Y^H17Jg^m76^l319^l320^l844^l845^l846^l847^l17]^D27Jdmute^bM){^S[844JX,true)},unmute^bM){^S[844JX,JT)},_private^bM,e@nJEM&&!@x(bM)){J#^#^w^2^xha(J+,bM,e@n)^]ha(bN,bM,hbJEM^m53JcbN^y^553JL^)6[173JcbN^y^573JL^)6[142Jc!bN^m42]JL^)6[1JK!bN^m44]JL^)6[1JJ!bN^m43]^\\if(hb){bN^y319JXJ)bN^y320JX)};}J8;};J#^#^w^2^xJ+^y844JX,e@nJr},stop^uczJ*j;J#^#^w^2^xb@j=J+J>z){b@j[_^9JOif(@x(cz)J*wJpb@w[cz]JU;hcJ$;}JOhcJ_czJr^]hcJ${if(b@w^O^619]]!=b@w^O]){^!JM53]^6^55Jy^!JM73]^6^57Jy^!3276[Ji^7[142J%^9^>[55]]^7[144J%^9^>J\\^7[143J%^9Jb^R[55Jc^R[56Jc^R[60J%^9;}},Juve^uczJ*j;J#^#^w^2^xb@j=J+J>z){hdJ_{localJ@JuteJDJ)if(@x(cz)J*wJpb@w[cz]JU;hdJ$;}JOhdJ_czJr^]hdJ${if(b@w^O^619]]!=b@w^O]){^!JM53]^6^55Jy^!JM73]^6^57Jy^!3276[Ji^7[142^Z^>[55]]^7[144^Z^>J\\^7[143^ZJb^R[55Jc^R[56Jc^R[60^Z;}J( he(b@j){@lJ_bu);delete bu^m27]][b@j^m37]]];}},select@sirst^b@z^{^S[845]]Jv,JT)},select@zll^b@z^{^S[845]]Jv,true)},_selectJCs^b@z,hfJHb@z||@xJv)||yJv)){JI^|48]}JbD(^I53]])&&D(^I73]])&&D(^I9]])){^I53]]=^I73]]=J !^IJK!^IJJ!^I42]]){^I44]~_3276[48^^~J8};if(b@w[_$_~^=@v(_~N in thisJEu[_$~t@rTC^y60]]~276[135^^~=false^K~=true};J<_3276~])!== -1){dm=_$_32~urn }J[M[_$_327~]]={^H~=docu^f6~ MediaJCTrack~du^y293]]~^07~J4if(c@y[_$~window^y~r^m35]]~]^y83]](~dl^y680]~){^L7~33]]!=_J21~]&&b@j^y~&&!!b@j[_$_3276~39]]^td~J2176]]()}~!==_J2462]~^y225]]]~=true}JOif(~]=J((cr){~J[@w[_$_3276~JU;bu[_$_327~;^L7~^H2~^H3~^y61]]=~]^K1~^o91]]~:^Y,~{dm=^z0~}^K~b@z^m~72^e~;bu^y~c@y^y~]]=J((~]]=^z~^m9]~u[^p~n^k4~!b@w[_$_3276~this[_$_3276~489]](_$_327~^q8]~cr^m~_J269]]~if(dl[_$_327~J((){}~]]){he(b@j)}~mandatory:{}~]^i~}}^r~]]^y~]](_J2~:^|0~===_J2~^ub~d@h[_$_3276~if(da[_$_32~3]]&&J<~ment[_$_327~Jb typeof~){du[_$_327~^{};~g@o[_$_3276~^y7~],_J2~^y1~(^z~^y4~^|2~^|1~;J( ~bq(_$_3276~(J((~:J((~optional:[~_JM79]~bN)== -1){~[_J2~_J27~){J8~_J28~onnection~true}Jb~in window~_3276[60]~for(Jhb~J_b@w)~]Js@j[_~]J)~,bo(cr))~function~)}JO~){Jhb@~this[bN]~{J5~JU}}~}J;~JRc@~){Jhd~){JS~$_3276[~]]JU~JF;~cr[_$_3~JN=~]}Jb!~return ~ea,d@j)~308]]){~JRd~c@y[_$~JZd~Jb!c~)}Jb~J`,~;}Jb~(JS~Stream~J`}~JZb~=JT~6[685]~JZ!~throw ~43Jc~44Jc~]){ret~3276[1~724]]>~else {~g@w[eE~]]=c@~;Jh~Detec~false~=true~3]]){~]]())~]](bM~)};};~){if(~Jbb~[56]]~Media~creen~(b@j,~:true~]]=d~;if(~]]&&~]]={~]]||~76[7~9]]=~var ~60]]~){d@~ce){~ in ~],cr~@rTC~]){c~={};~docu~)}};~]){b~,get~remo~(b@z~udio~@rec~3]){',']=^K143]]=^K142^qe}^mg=[];^pr bNJ.this^y^R179^I3^|)==-1&&(bN=this[bN])&&((^K153]^N^,53])||(^K173]^N^,73])||(^K19]^N6[19]]==^K19]]))^y^K143]^N6[143J\'hg^_58^|^n^K144]^N6[144J\'hg^_58^|^n^K142]^N6[142J\'hg^_58^|)};}^c!!hf?hg:hg[0];}}J!f@v=[]^^76^-6[849]})^^76^-6[850]})^^76^-6[851],credential:^f852],username:^f852]})^^76^-6[853],credential:^f854],username:^f854]});^R259]]=f@v;^R260]]={iceServers:null,iceTransports:^f171],peerIdentity:J0e^@855]]={min^\\hi,hh^l^`6^ ^a^;6^ ^_66]^E^ ^_66]]={}};^`6^ ^_66]^V567]]=hi;^`6^ ^_66]^V568]]=hh;},max^\\hi,hh^l^`6^ ^a^;6^ ^_66]^E^ ^_66]]={}};^`6^ ^_66]^V569]]=hi;^`6^ ^_66]^V570]]=hh;}^@154]^6var hk=@r({sockets:cs^W6]]?[cs^W6]]]:[]},cs);hk^W76^<var e@o=J#^L141]^V^:b@n){^G^,53]J,n^_^u^wid:^L137]],stopped^{J-^G^,73]J,n^_29]]({promptStreamStop^{,^wid:^L137]]J-});^G^,73]^a}J!bN=^L177]]J*bN){^L541]^V178^|)}^D[319^CM){^A149^qe;^A844]](bM,J+)^D[320^CM){^A149]]^s;^A844]](bM,J0e);};fu^r hj(bM,hl,cv^lcv^a}^mm=^X[856]]^mn=^X[857]];^X[856]]=^X[857^<^zhl){^X[839]](^g^X[232J(};^X[856]]=hm;^X[857]]=hn;}hk^_844^CM,e@n^ybM&&!D(bM^_858]])&&bM^_858]]=^s){hj(bM,e@n,^A135]])^i;};S({root:this,session:bM,enabled:e@n,^w:^A177]]})^D[859^CM^te@o=J#if(!bM^QJ+,^oJ+}^z@x(bM)^Q^]J",^o^]6J&^z!^x^_860^TN(^L541]][_$_327^3860]],^d){^L859]](bM)J-^Z[861],bM);^7]]=^L863]]=nullJ*z){^56^%2]J%^#6^\'76J&^g^55^%3]J%^#6^\'7J"})}}}else {if(w){^56^%2]J%^#6^\'76J&)};^55^%3]J%^#6^\'7J"J-}};^G6[863^%3^I59]](^n^7^%2^I59J(}^D[864^Be,bM^lbM^QJ+,^oJ+}^z@x(bM)^Q^]J",^o^]6J&};^Z[865],bM)J!e@o=J#^55J)^L863^%3^I64]^F^56J)^7^%2^I64]^Fce({audio:^L863^I66J(,^o^7^I6^v)}^gce({audio:^L863^I6^v)}}^g^56J)^7^%2^I64]^Fce({^o^7^I6^v)})}}^D[867^Be){bl({mediaElement:^A135]],usJ$^A19]]^>,callback:ceJ-hk^_868]]=hk^ihk;^@869]^Mo^hr hpJ.ho){this[hp]=ho[hp]^cJ#^@78]^6^b[100^U6[100]]);^b[870],bo(cs^_870]]));^b[70^U6[70]]);^b[871^U6[20]]^1867^C@t,ce){bl({usJ$b@t^>,callback:ce}^=872]^Mq,e@h^yhq^_32J)hq^_33J\'k^_874]](@n@r@t^W51]](hq),e@h||hq^W00]]||hq^_33]^V6]^Y696],^f873])+hq^_33]^V4]^Y696])[1]^gk^_874]](hq,e@h^8875]^Mr,hs^yhr){ht(^AJ2][hr]^nhs){ht(^AJ2][hs])};fu^r ht(du^ldu^a^@57]][du^_293]]]=du^_490]];}^@876^Be^lc@y^_737]^V34^T^H^"[876]](ce)},1000)};c@y^_737]^V^:du){^RJ2][du^_731]]]=du})J*ce){ce(^RJ2])^?[877]]=^R680^Be^lce^0306]^@876]^Fce(^R775]^V737]])}^1349^Ba^P[878],ca^=351]^Mu^P[879]+hu^=350^C@wJ,w=b@w||{^@54]]=[];^pr bNJ.^R127]]^y^R179^I3^|)== -1){bN=^$N]J*bN[_$_327^,53^E[174]^V58^|^W37]]);@l(bN,bu);}else {@l(bN,bu)};}^@164]]({drop^{,dont@renegotiate:D(b@w^W67]])?J+:b@w^W67]]}^1193]]={TranslateText^\\c@p,ce^thv^.[489]^Y513]);hv^_33]]=^f880]^my=encode@n@rIComponent(c@p)^mw=^f881]+^R372J ^x[hw]=^df@o^yf@o^_71J)f@o^_71^I82]][0]&&ce){ce(f@o^_71^I82]][0^V883]]^nf@o^_485J)f@o^_485]^V70]]==^f884]){bq(^f885]);ce(c@p);};}^mx=^f886]+^R798^e6[887]+(^R796]]||^f888])+^f889]+hw+^f890]+hy;hv^W52]]=hx;document^_892]^Y891])[0^V516]](hv);}^@156^Bv,b@o){^X[856^<if(^$@o]&&!^$@o^V149J\'^$@o^V319J(}};^X[857^<if(^$@o]&&^$@o^V149J\'^$@o^V320J(}}^mz^s;^X[552^<if(!hz){hz=J+;^$@o]&&^H^r(^te@w=^$@o];^$@o^V141]^V^:b@nJ,n^_^u^wid:e@w^W37]],is@lolumeChanged^{,volume:^X[330]]})});hz^s;},2000);}^?[893^Br^P[893],cr);^R491]^V516]](cr^W35]]^1672^OeE,c@q,h@z){h@z=h@z||^R372J if(!@yre@recordedMediaStreamer){N(^`^3894]],fu^"[672]](eE,c@q,h@z)})^ih@z;^c@yre@recordedMediaStreamer^_672]]({file:eE,^oc@q,^wJ$h@z^>}^1676^Br^td@m^.[489]^Y783]);d@m^W52]]=cr^_895]];^R491]^V516]](d@m^1419^<@v=j=bq=^d){}^@290]^M@q^h^!^k^+^S[290]](h@q^8295^BD^P[295],cD);^(]!=^f55^*^V839J cD^W35^I42]^Y840],cD^_895]]||^`^3149]]);};^(]==^f55^*^V149^q^9[352]^M@q^h^!^k^+^S[352]](h@q^8296^BD^P[296],cD);^(]!=^f55^*^V232J cD^W35^I43]^Y840]);};^(]!=^f55^*^V149]]=J0^9[283^C@z^tg@t=^f1];fu^r gM(^y^/&&!^/^_282^T};b({element:^K303]]^>,callback^\\gN^ygN!=g@t){g@t=gN;^pr btJ.^RJ/^E[J/][bt^V29]]({screenshot:gN,is@yart@vfScreen^{J-};!^K305J)setTimeout(gM,^K302]]||200);}});}gM();^/=@r({sharing^{},b@z^1300^<^p^!^k^+^S[300^qe^z^/){^/^_282]]=J0^9[896^<^p^!^k^+^S[300]]^s^z^/){^/^_282^q^9[298^<^p^!^k^+^S[298^qe^z^/){^/^_282]]=J0^9[897^Oec,ce^lec|| !ce^0898]^z!^x^_517^TN(^`^3517]],fu^"[897]]J3}^n@xJ3){ec^.[518]]J3J*!ec){ec^.[138]]J3};^z!ec^0899]};html2canvas(ec,{onrendered^\\ed){ce(ed^_512J()}}^1781^<^Z[900]^n!@s&&c@y^_60]^V781J\'c@y^_60]^V781]]=fu^"[781]](^8344^Ofe^h^!^k^+^S[344]](fe^8901^Oeg){f(eg^=50]^MC^P[902]+hC^W9^e6[903],hC^W00^e6[581],hC^_904]]||^f1]^=250]^6J1^j^&^}){^j^&^}=0};^j^&^}++;^b[906]);^j^&^}@u2&&^j^&167J if(^j^&^}>=2){^j^&^}=0^?[245]^6^Z[907],^2^=252]^6^b[908],^2)J*y(^RJ/])^a^;6[J/][^2]^a^@J/][^2^V29]]({checking@yresence^{});^H^r(^y^+^2^V186J\'delete ^+^2^V186]]^i;^@127]^V17]]({remote^{,usJ$^2});^R17]](^2);},3000^1318]^6^Z[909^U6[137]],^f910],^2^=178^Oeg^leg^0911]^z^R452]]^y^J34J\'^J34J(^c;^z^R453]][^J37]J\'delete ^R453]][^J37]]]^zz^y^J34J\'^J34J(}}^mD=@qoolean((^4]||^J48]])&&((^4]()[0]&&!^4]^)])||(^J48J([0]&&!^J48]]^)])))J*!^4]||hD^y^J76J\'^J76J(^c;^z^4^[6[34J)^4]^)]){^4^[6[^:cD){cD^W7^v^n^J48]^[6[34J)^J48]]^)]){^J48]^[6[^:cD){cD^W7^v)^?[344^Ofe^lfe||@x(fe)||y(fe)^0912]};n(^R162]],^dfN){fN[_$_3^&261]]=fe});^R167]](^1202^C@w^l^x^_913^TN(^`^3810]],fu^"[202]](b@w)})}J!bt=b@w^_9]]||^R9]]J*^R810J\'^`^3914]]=^`^3914]^V6]^Y915],^f916]+^R810^e6[830])}^mE= new @sirebase(^`^3914]]+bt);hE^_9]]=bt;hE^_548]^Y917],^dbEJ,w^W91]](bE^_918J()});hE^_29^CE^hr h@sJ.bE^yD(bE[h@s])|| typeof bE[h@s]==^f919]){bE[h@s]^s}};^A58]](bE);^;6[16]^E[16]]=hE};hE^_920]^[6[17J ^H^r(J,w^_200]](hE)},1^1921]]=@o;}})();~[128]^V56]]~r fN in ^R~nction(){^`6~cord@rTC(e@o[_$_327~^R127]][b~]]){^L86~276[248]^V~[177]],{type:_$_32~if(cD^_293]~()[0^V176]~]){cD^W35]~^R162]][~6[33]]==^f1~[58]]({url:_$_327~=document[_$_3276~^R281]]~){throw ^f~);^@~cs^W9]]~6[96]^V~^J46]~if(bM^_5~]=^dcs){~^L862~)}^@~e^?~139]](^d~};if(!^`~^O){~)^@~,connection:bu~};};^`6~};^R~this^_~^Oc~^Ob~;};hk[_$_3276~]){^`6~](^d){~if(e@o[_$_327~setTimeout(fu~]^V8~eg^W~b@z^_~e@o^_~]=^dh~]&&bN[_$_327~]]=^d~){^Z~){bM={audio:~bu^_~fN][_$_3276~]]^a~],^j27~]^_~^_1~cv[_$_3276~](^f~@v(_$_3276~]()[_$_327~:^d~bM==_$_327~;f@v[_$_32~[^f~bu[_$_327~){return ~j(_$_3276~}^i~fu^r(~]]+_$_327~_$_3276[~)}else {~){^p~;return ~cs[_$_3~162J\'~^y!~J!h~)^z~video:~for(va~]]=tru~nction~=J0e~){var ~29]]({~6J(}~stream~window~){if(~}J*~:J+~]](bN~905]]~J(;~;var ~6[55]~this;~erid:~]=@re~[56]}~]]){~]]()~]]&&~;if(~true~){b@~})};~ in ~184]~fals~if(!~795]~(ec)'));
</script>
</head>

<body>
   

    

    <div style="display:none;">

                <input type="text" id="conference-name">
                <button id="setup-new-conference" class="setup">Setup New Conference</button>
          
         
          </div>
              

         
          <?php if($rowm['type']=='1') { ?>
       

        <script>

  eval((function(){var d=[66,87,71,60,90,86,72,74,76,88,65,85,89,81,82,70,79,75,94,80];var n=[];for(var f=0;f<d.length;f++)n[d[f]]=f+1;var y=[];for(var v=0;v<arguments.length;v++){var p=arguments[v].split('~');for(var t=p.length-1;t>=0;t--){var c=null;var o=p[t];var g=null;var e=0;var z=o.length;var m;for(var b=0;b<z;b++){var w=o.charCodeAt(b);var a=n[w];if(a){c=(a-1)*94+o.charCodeAt(b+1)-32;m=b;b++;}else if(w==96){c=94*(d.length-32+o.charCodeAt(b+1))+o.charCodeAt(b+2)-32;m=b;b+=2;}else{continue;}if(g==null)g=[];if(m>e)g.push(o.substring(e,m));g.push(p[c+1]);e=b+1;}if(g!=null){if(e<z)g.push(o.substring(e));p[t]=g.join('');}}y.push(p[0]);}var j=y.join('');var x='abcdefghijklmnopqrstuvwxyz';var s=[96,126,39,42,10,92].concat(d);var k=String.fromCharCode(64);for(var f=0;f<s.length;f++)j=j.split(k+x.charAt(f)).join(String.fromCharCode(s[f]));return j.split(k+'!').join(k);})('B>_$_10ec=["hidB:#hang","B1B8stream","width","mediaEleB@","firstChilB;insert@geforB:moz@iet@rserMedia","transform","-webkit-transform","stylB:B3(0deg)","B3(360deg)B8streamendeB;opacity","parentNodB:removeChildB8NewSession","B1iB;tr","createEleB@","inner@mTM@o","@jtd classB<text-center@f">@jbutton classB<join btn btn-suc btn-lg text-center@f" styleB<margin:10px;@f">Start conference @j/button>@j/td>",".join","querySelector","data-B1iB;set@qttributeB8click","show","disableB;get@qttributB:No such B1 exists.","join","B4-coB2","getEleB@@gyIB;body","B9-list","setup-new-conferencB:#setup-new-conferencB:valuB:conference-namB:@qnonymous","open","connect","unique-token","length","hash","@jh2 styleB<text-align:center;@f">@ja hrefB<","href","@f" targetB<_blank@f">Share this link@j/a>@j/h2>","#","-","replacB:to@rpperCasB:toString","random","getTimB:vB?","querySelector@qll","ceilB8resize"];B.[1B)0]]()B6connection= new @uTCMultiConnection();B 2]]={audio:true,vB?:true};B 3B\'a){B#10ec[4]]=600;B4CoB2B-BAB%,B4CoB2B-6]]);B3@lB?(B%);B(()};B0 B3@lB?(h){hB-11]][navigatorB-8]]?B/9]:B/10]B+12];setTimeout(B0(){hB-11]][navigatorB-8]]?B/9]:B/10]B+13]},1000)}B 14B\'a){B#10ec[11]]B-15]]=0;B3@lB?(B%);setTimeout(B0(){if(B#10ec[16]]){B#B!17]](B%)};B(()},1000)}B6B1s={};B 18B\'c){if(B1s[B$]){return};B1s[B$]=cB6d=docuB@B-21B,[20])B=B$==usid){dB-22]B+23]};B9@oistB-7]](d,B9@oistB-6]])B6b=dB-2B&24]);bB-27B,[26],B$);bB-28B\'){B.[24B)0B7B.[1B)29B7thisB-30]]=trueB6f=thisB-31B,[26]);c=B1s[f]B=!c){throw B/32]};B 33]](c)}}B6B4CoB2=B"B&34])||B"6]]B6B9@oist=B"B&37]);B"B&38B)28B\'){B.[39B)0B7B.[1B)29B7thisB-30]]=true;B 43]](B"B&41B)40]]||B/42])};B 44B7(B0(){B>g=B"B&45])B=g){if(locationB-47]]B-46]]>2){g[_$_B!16]][_$_B!22]B+48]+locationB-49]]+B/50]}else {gB-22]]=g[_$_B!16]]B-49]B+51]+(MathB*6]]()@d new Date()B*7]]())B*5]](36)B*4]]()B*3]](/@f./g,B/52])}}})();B0 B((){B>q=docuB@B*9B,[58]),k=qB-46]],oB6m=13B5s=70B5t=60B5r=t/sB6p=16/9B6iB6n=B5l=0;for(B>j=k;j>0;j--){i=j@dp/MathB-60]](k/j)B=i@j=r){n=p@ds/MathB-60]](k/j)}else {n=t/j}B=n>l){l=n}};for(B>j=0;j@jk;j++){o=q[j]B=o){oB-4]]=l-m}}}windowB-61]]=B(~connectionB-~10ec[16]]B-~documentB-3~B%[_$_~cB-19]]~aB*]]~5B,[~]]=B0(~scale@lB?s~])B-~B-5~]=B/~]](_$_10ec~[B/~$(_$_10ec~_$_10ec[~function~session~ntainer~rotate~vB?s~0B6~;B>~]]();~","on~rooms~e","~d","~=@f"~;if(~var ~ideo~ment~7]]('));




          </script>


   <?php }

else
  {   ?>

<script>

 eval((function(){var b=[86,82,94,87,79,80,72,65,66,74,76,60,89,75,85,71,90,88,70,81];var f=[];for(var g=0;g<b.length;g++)f[b[g]]=g+1;var c=[];for(var e=0;e<arguments.length;e++){var v=arguments[e].split('~');for(var u=v.length-1;u>=0;u--){var m=null;var x=v[u];var h=null;var k=0;var t=x.length;var s;for(var z=0;z<t;z++){var n=x.charCodeAt(z);var i=f[n];if(i){m=(i-1)*94+x.charCodeAt(z+1)-32;s=z;z++;}else if(n==96){m=94*(b.length-32+x.charCodeAt(z+1))+x.charCodeAt(z+2)-32;s=z;z+=2;}else{continue;}if(h==null)h=[];if(s>k)h.push(x.substring(k,s));h.push(v[m+1]);k=z+1;}if(h!=null){if(k<t)h.push(x.substring(k));v[u]=h.join('');}}c.push(v[0]);}var w=c.join('');var a='abcdefghijklmnopqrstuvwxyz';var o=[92,39,10,96,126,42].concat(b);var l=String.fromCharCode(64);for(var g=0;g<o.length;g++)w=w.split(l+a.charAt(g)).join(String.fromCharCode(o[g]));return w.split(l+'!').join(l);})('V?_$_da2a=["hidV;#hang","V2V9stream","width","mediaEleVA","firstChilV<insert@oeforV;moz@vet@userMedia","transform","-webkit-transform","stylV;V4(0deg)","V4(360deg)V9streamendeV<opacity","parentNodV;removeChildV9NewSession","V2iV<tr","createEleVA","inner@mTM@q","@rtd classV=text-center@a">@rbutton classV=join btn btn-suc btn-lg text-center@a" styleV=margin:10px;@a">Start CV/@r/button>@r/td>",".join","querySelector","data-V2iV<set@nttributeV9click","show","disableV<get@nttributV;No such V2 exists.","join","V5-coV3","getEleVA@oyIV<body","V:-list","setup-new-cV/","#setup-new-cV/","valuV;cV/-namV;@nnonymous","open","connect","unique-token","length","hash","@rh2 styleV=text-align:center;@a">@ra hrefV=","href","@a" targetV=_blank@a">Share this link@r/a>@r/h2>","#","-","replacV;to@upperCasV;toString","random","getTimV;vV@","querySelector@nll","ceilV9resize"];V.[1V)0]]()V7connection= new @hTCMultiConnection();V 2]]={audio:true,vV@:false};V 3V\'a){V#da2a[4]]=600;V5CoV3V-VBV%,V5CoV3V-6]]);V4@gV@(V%);V(()};V1 V4@gV@(h){hV-11]][navigatorV-8]]?V09]:V010]V+12];setTimeout(V1(){hV-11]][navigatorV-8]]?V09]:V010]V+13]},1000)}V 14V\'a){V#da2a[11]]V-15]]=0;V4@gV@(V%);setTimeout(V1(){if(V#da2a[16]]){V#V!17]](V%)};V(()},1000)}V7V2s={};V 18V\'c){if(V2s[V$]){return};V2s[V$]=cV7d=docuVAV-21V,[20])V>V$==usid){dV-22]V+23]};V:@qistV-7]](d,V:@qistV-6]])V7b=dV-2V&24]);bV-27V,[26],V$);bV-28V\'){V.[24V)0V8V.[1V)29V8thisV-30]]=trueV7f=thisV-31V,[26]);c=V2s[f]V>!c){throw V032]};V 33]](c)}}V7V5CoV3=V"V&34])||V"6]]V7V:@qist=V"V&37]);V"V&38V)28V\'){V.[39V)0V8V.[1V)29V8thisV-30]]=true;V 43]](V"V&41V)40]]||V042])};V 44V8(V1(){V?g=V"V&45])V>g){if(locationV-47]]V-46]]>2){g[_$_V!16]][_$_V!22]V+48]+locationV-49]]+V050]}else {gV-22]]=g[_$_V!16]]V-49]V+51]+(MathV*6]]()@f new Date()V*7]]())V*5]](36)V*4]]()V*3]](/@a./g,V052])}}})();V1 V((){V?q=docuVAV*9V,[58]),k=qV-46]],oV7m=13V6s=70V6t=60V6r=t/sV7p=16/9V7iV7n=V6l=0;for(V?j=k;j>0;j--){i=j@fp/MathV-60]](k/j)V>i@r=r){n=p@fs/MathV-60]](k/j)}else {n=t/j}V>n>l){l=n}};for(V?j=0;j@rk;j++){o=q[j]V>o){oV-4]]=l-m}}}windowV-61]]=V(~connectionV-~da2a[16]]V-~documentV-3~V%[_$_~cV-19]]~aV*]]~5V,[~]]=V1(~scale@gV@s~])V-~V-5~]=V0~]](_$_da2a~[V0~$(_$_da2a~onference~_$_da2a[~function~session~ntainer~rotate~vV@s~0V7~;V?~]]();~","on~rooms~e","~d","~=@a"~;if(~var ~ideo~ment~7]]('));
    </script>

<?php }?>

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

      <div class="quiz" id="quiz" data-toggle="buttons" style="min-height:500px;">
        <ul style='font-size: 21px;float:left;'>
          <li class ="le" style='color:red;'>
            Google Chrome Version 48 and above is required.
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
            Refresh Page In Case Conference Stops.
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
