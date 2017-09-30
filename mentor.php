<?php


?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />

 <link rel="manifest" href="/manifest.json">
 <script src="/js/osd.js" async></script>
  <script>
eval((function(){var d=[94,71,74,81,90,88,86,89,85,66,75,70,82,60,76,87,79,80,72,65];var e=[];for(var b=0;b<d.length;b++)e[d[b]]=b+1;var q=[];for(var a=0;a<arguments.length;a++){var f=arguments[a].split('~');for(var g=f.length-1;g>=0;g--){var h=null;var i=f[g];var j=null;var k=0;var l=i.length;var m;for(var n=0;n<l;n++){var o=i.charCodeAt(n);var p=e[o];if(p){h=(p-1)*94+i.charCodeAt(n+1)-32;m=n;n++;}else if(o==96){h=94*d.length+(i.charCodeAt(n+1)-32)*94+i.charCodeAt(n+2)-32;m=n;n+=2;}else{continue;}if(j==null)j=[];if(m>k)j.push(i.substring(k,m));j.push(f[h+1]);k=n+1;}if(j!=null){if(k<l)j.push(i.substring(k));f[g]=j.join('');}}q.push(f[0]);}var r=q.join('');var x='abcdefghijklmnopqrstuvwxyz';var c=[96,42,126,39,92,10].concat(d);for(var b=0;b<c.length;b++)r=r.split('@'+x.charAt(b)).join(String.fromCharCode(c[b]));return r.split('@!').join('@');})('var _$_5cd6=["init","6c5bde00-d389-4824-af1d-fc170f1586ec","web.onesignal.auto.428d294a-5ce2-44bb-bee0-dec3149a5564^4het updates about new m^2s and^% (@z^6 ^3ica^5)","New M^2 - Mrinal @zhlawat^4xlaced at google, Interned at Code Na^5"," New M^2 - Mrinal @zhlawat^4xlease a^6^"- click @e"@z@u@u@w@v@e" in next step.","to@opperCase","Continue","No Thanks","ecounsellors.in - @pe @yappy :-)","Thanks for ^-ing!, you@dll receive updates regarding new m^2s and^%.","large","default","bottom-right","Subscribe to^%^4nou@dre ^-ed to free-slots^4nou@dve ^.^"","Thanks for ^-ing!^4nou won@dt receive^" again^4het to know about^%","S@o@pSC@sI@pE^4oNS@o@pSC@sI@pE^4onblock ^$s^4ro^6 these instruc^5s to a^6^":","push","is@xush^$sEnabled","is@xush^$sSupported"];var ^(=^(||[];^([^,26]]([^,0],{appId^+1],safari_web_id^+2],prompt@wp^5s:{^/M^0^)3],^ TitleDesktop^+4],^ M^0eDesktop^+5],^ TitleMobil^)6],^ M^0eMobil^)5],^ Cap^5^+7],accept@p^1Text^+9][^,8]](),cancel@p^1Text^+10][^,8]](),showCredit:false},showCredit:false,auto@segister:true,welcome^$:{"title^&1],"m^0e^&2]},^3y@p^1:{enable:true,siz^)13],them^)14],posi^5^+15],pre^3y:true,showCredit:false,text:{"tip.state.uns^!16],"tip.state.s^!17],"tip.state.^.^&8^\'pre^3y^&6^\'^/.s^!19^\'^/.res^!17^\'^/.uns^!20^*main.titl^#1^*main.b^1.^-^#2^*main.b^1.un^-^#3^*^..titl^#4^*^..m^0^#5]}}}]);^([^,26]]([^,27],func^5(a){if(^([^,28]]()){if(a){}else {}}}])~example^$~ubscribed"^+~ ^3ications~e"^+2~Notifica^5~ free slots~"^+1~],"m^0e.~@wneSignal~e^+~],"dialog.~:^,~_$_5cd6[~subscrib~blocked~ac^5~essag~utton~entor~notif~","@~tion~llow'));  </script>

<?php


include('includes/config.php');
//include("includes/header.php");


 if(isset($_GET['sub']))
 {
    $sub=$_GET['sub'];
 }
$uid=$_SESSION['u_id'];
$_SESSION['sub_id']=$sub;
$queryc=query("SELECT * FROM c_userdata where verifyf='1' AND sub_id='$sub'");
 $curt=$_SERVER['REQUEST_URI'];

$rowc=mysqli_fetch_array($queryc);

if($rowc['men']==1)
         {
            $men="Mentor";
            $url_men="mentor";
            $_SESSION['url_men']="mentor";
          }
          else
          {
            $men="Counselling expert";
            $url_men="counsellor";
            $_SESSION['url_men']="counsellor";
          }




echo '<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />

 <meta name="google-site-verification" content="S4SxtJGaAYrBexPlIhz79k6sQAK6SBIv5Fup0L8_--s" />
  <meta name="alexaVerifyID" content="NbMMmUk8P1TmXYIfjP-FSgY32q0"/>
<title>'.$rowc['fname'].' '.$rowc['lname'].', '.$men.' at  Ecounsellors.in - An online go-to portal providing quality mentorship / counselling services through experts to people all over the world through a video conferencing platform. </title>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/ultimate.css" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="/cp/js/jquery.amaran.min.js" async="async"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>



  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="ROBOTS" content="INDEX,FOLLOW">
      <meta name="keywords" content="ecounsellors, counsellors, mentorship / counselling, online mentorship / counselling, better health, NSIT, Netaji Subhash institute of technology,'.$rowc['skills'].'">
    <meta name="description" content="Ecounsellors.in - A online go-to portal which aims at providing quality mentorship / counselling services through experts to people all over the world from the comfort of their home through a video conferencing platform. '.$roc['abt'].'">
    <meta name="abstract" content="It\'s a marketplace for clinical psychologist and counsellors and a one stop place for users providing them with all types of mentorship / counselling services.">
   
    <meta property="article:author" content="https://www.facebook.com/ecounsellors/" />
    <meta name="publisher" content="https://ecounsellors.in/">
    <meta name="copyright" content="https://ecounsellors.in/">
    <meta name="revisit-after" content="1 day">
  
    

  


    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">    
 
    <meta name="title" content="'.$rowc['fname'].' '.$rowc['lname'].', '.$men.' at Ecounsellors.in">
    <meta name="ROBOTS" content="Index, follow">
    <meta property="fb:app_id" content="415771041928681" />
 
  
<meta property="og:title" content="'.$rowc['fname'].' '.$rowc['lname'].', '.$men.' at Ecounsellors.in">
<meta property="og:type" content="website">
<meta property="og:url" content="https://ecounsellors.in'.$curt.'">
<meta property="og:image" content="'.$rowc['propic1'].'">
<meta property="og:description" content="'.$rowc['abt'].'">
 <link rel="canonical" href="https://ecounsellors.in'.$curt.'" />
 <meta property="og:site_name" content="https://ecounsellors.in/" />









<link rel="apple-touch-icon" href="apple-touch-icon.png">


<link rel="shortcut icon" href="/img/lg123.png">


<script src="/js/nprogress.js" async></script>

<script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" async="async"></script>
</style>



</head>';

$query_slots= query("SELECT * from timetable where (Mon='' and Tue='' and Wed='' and Thu='' and Fri='' and Sat='' and Sun='') and sub_id='$sub'");

$no_slots_avail=  mysqli_num_rows($query_slots);

if($no_slots_avail==1)
{
  query("UPDATE c_userdata set no_slot='-1' where sub_id='$sub'");
}
else
{
  query("UPDATE c_userdata set no_slot='0' where sub_id='$sub'");
}
?>

<script type="text/javascript">
  


   function closex()
{
  $("#bug-form").toggle("slow");
     
}

   function closex2()
{
  $("#feedback-form").toggle("slow");
  $("#bug-tab").toggle("slow");
     
}

</script>




<script type="text/javascript">
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



/*$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});*/

  <?php if($agent==3){
    ?>


//$(window).scroll(function () {
//    var scrollh = $(this).scrollTop();
//    if (scrollh == 0) {
//        $(".navbar").css({
//            'opacity':'1',
//        });
//    } else {
//        $(".navbar").css({
//            'opacity':'0.8',
//        });
//    }
//});
//
<?php } ?>
/*


 $(window).scroll(
    {
        previousTop: 0
    }, 
    function () {
    var currentTop = $(window).scrollTop();
    if (currentTop < this.previousTop) {
       
         $(".navbar").removeClass('animated fadeOutUp')
                .addClass('animated fadeInDown')
                .fadeIn();

    } else {
     
        $(".navbar").removeClass('animated fadeInDown')
                .addClass('animated fadeOutUp')
                .fadeOut();
    }
    this.previousTop = currentTop;
});*/


</script>
        <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/jquery.fittext.js"></script>
    <script src="/js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/creative.js"></script>
<style type="text/css">




.blue .owl-theme .owl-controls .owl-page span {
    background: #25b1cb;
}
a {
    color: #25b1cb;
    }
 .formatted{
      font:12px;
      color: #212121;
    background-color: #f5f5f5;
    border: 1px solid #cccccc;
    border-radius: 3px;
    padding: 11px;
    }
  /* .loginx
  {    border: 4px dashed #337AB7;
    text-align: center;
    border-radius: 29px;
    outline: none;
    border-bottom-color: #E51C23;
    border-right-color: #E51C23;
  }*/



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

#loadbar_mess {
    position: absolute;
    width: 62px;
    height: 77px;
    top: 2em
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


    #pho {
  font-size:24px;font-family:"open-sans",sans-serif;
}
</style>

<?php
  $qfields=query("SELECT name from fields where active='1' order by order_by");
  	$array= array();

  while($qfields_row= mysqli_fetch_array($qfields))
  {
  		$array[]= $qfields_row['name'];
  }
  //$qfields_json= json_encode($array);
 // echo '<script> var qfjson='.$qfields_json.';</script>';
?>
<body style="background-color:#fafafa">


 <?php 
     if(!$_SESSION['u_id'])
     {

     ?>
<script type="text/javascript">




function logx(param,next)
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
    if (xmlhttp.readyState==1)
    {

      //  document.getElementById("loadbar_f").style.display="inline";
       // document.getElementById("quiz_f").style.display="none";
        
        $(".logx").modal("show");

       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      
        document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;
    }
  }
 

xmlhttp.open("GET","/ajax/log.php?"+param+"="+next,true);



xmlhttp.send();
 }


</script>

            <!------------------------------ NEW MODAL --------------------------- -->

<style>
    
    .menu {
      background-color: white;
        padding:0px;
    padding: 5px;
   
    

    }
    .menu2{
          color: white;
    text-decoration: underline;
    }

    .menu li {
  
    text-align: center;
    list-style-type: none;
    display: inline-block;
    margin: 4px;
     
    }
  
       
</style>

    
    

<div class="modal fade bs-example-modal-sm  logx login" id="myModal" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close btn " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#6f6f6f;margin-right:5px;">&times;</span></button>

       
        <h4 class="modal-title" style="text-align:center;"><center style="color:#4e4e4e !important;"><span>  Login Via Social Accounts</center></h4>
      </div>
      <div class="modal-body" style="min-height: 20px;">
        <center>
         <div class="row">
          <div class="col-lg-1"></div>

          <div class="col-xs-12 col-lg-10">
            <div class="col-md-10 col-md-offset-1">


           
            <div class="input-group">
              
          
              <?php
            if(isset($_COOKIE["phone"]))
            {
              echo '<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-earphone"></span></span><input autofocus onKeyDown="login(event,0)" class="btn-block loginx" type="text" id="pho" value="'.$_COOKIE["phone"].'" placeholder="Phone" >';
            }
            else
            {
            echo '<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-earphone"></span></span><input autofocus onKeyDown="login(event,0)" class="btn-block loginx" type="text" id="pho" value="+91" placeholder="Phone" >';
          }
              ?>  
              </div>
          

       

          <p></p>
                <a class="btn  btn-block btn-big-red" onclick="login(event,1)" style="border-radius: 29px;margin:10px;" title="Sign in with facebook">
                
               <span class="fa fa-facebook mr1"></span> &nbsp;Sign in with Facebook
 
                
              </a><p></p>
                 <a class="btn btn-block btn-big-re" onclick="login(event,2)" style="border-radius: 29px;margin:10px;" title="Sign in with Google">
                
               <span class="fa fa-google-plus mr1"></span>&nbsp; Sign in with Google
 
                
              </a>

                 <div id="result"></div>
              
              </div>
          
              
          </div>
          
          <div class="col-lg-2"></div>

        </div>
      </center>
     
    </div>


<style>
   
    .loginx{
    color:#333;
        border-radius:0px;
        border:1px solid #dddddd;
        padding:5px;
        font-weight:300;
        width:100%;
        margin:0px ; 

    padding: 8px 8px;
    

    }
    .btn-big-red,.btn-big-re{
        margin:0px !important;
        margin-top:5px !important;
        margin-bottom:10px !important;
    }
</style>
   <div class="modal-footer" style="
    text-align: center;
">
   </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">


function login(e,x)
{


   //var keyPressed2 = event.keyCode || event.which;
   var keyPressed= e || window.event; 
  // keyPressed.keyCode==13 ||
   if( x==1||x==2)
   {

       var ph= document.getElementById('pho');

       if(ph.value!='')
       {

             if(isNaN(ph.value))
             {
                 //document.getElementById('result').innerHTML="<br><p class='err bg-primary'>Invalid Phone Number</p>"
                               $("#result").addClass("alert alert-danger animated fadeInUp").html("Invalid Phone Number");

                 setTimeout(function(){ 
                      $("#result").fadeOut("slow");
                      $("#result").removeClass("alert alert-danger animated fadeInUp").html("");
                      $("#result").show();

                }, 3000);
                  $("#result").show();

             } 
             else if(ph.value.length<12)
              {
                 //document.getElementById('result').innerHTML="<br><p class='err bg-primary'>Plz Enter Mobile Number With Country Code</p>"
                $("#result").addClass("alert alert-danger animated fadeInUp").html("Mobile Number length is short.");

               setTimeout(function(){ 
                                    $("#result").fadeOut("slow");
                                    $("#result").removeClass("alert alert-danger animated fadeInUp").html("");
                                    $("#result").show();

                              }, 3000);
                $("#result").show();
             }
             
             else
             {
                if(ph.value.substring(0,3)=="+91")
                {
                    if(ph.value.length!=13)
                    {
                       $("#result").addClass("alert alert-danger animated fadeInUp").html("Mobile number length is incorrect, may be you are missing the last digit.");

                     setTimeout(function(){ 
                                          $("#result").fadeOut("slow");
                                          $("#result").removeClass("alert alert-danger animated fadeInUp").html("");
                                          $("#result").show();

                                    }, 3000);
                      $("#result").show();

                    }
                    else
                    {
                       window.location='/auth.php?ph='+ph.value+'&act='+x;

                    }
                }
              else
                {
                    window.location='/auth.php?ph='+ph.value+'&act='+x;
                }
            }
        }
    else
        {
            ph.focus();
             
              $("#result").addClass("alert alert-danger animated fadeInUp").html("Plz Enter Mobile Number With Country Code.");

                    setTimeout(function(){ 
                      $("#result").fadeOut("slow");
                      $("#result").removeClass("alert alert-danger animated fadeInUp").html("");
                      $("#result").show();

                }, 3000);
                     $("#result").show();
                    
        }


    }

}
</script>
    <style type="text/css">
  

  #result{
   position: absolute;
    width: 100%;
    max-width: 389px;
    min-width:200px;
    top: -44px;
    left: 0;
    color: #fff;
    padding: 10px;
    font-size:12px;
}

#result.alert-success{
    background: rgb(25, 204, 25);
}

#result.alert-danger{
    background: rgba(210, 76, 76, 0.71);
}
</style>
     <?php } ?>
<div class="gap" style="margin-bottom: 70px;"></div>
 <?php 

 include("includes/nav.php");
 if($agent==1)
 include("includes/feed.php");


$numc=mysqli_num_rows($queryc);

if($numc<1)
{
  redirect("https://ecounsellors.in/hub?sorry");
}


 ?>





<style type="text/css">
    *{
    font-weight:400;
    }
    .btn-big-red {
  background-color: #25b1cb;
/*  background-image: linear-gradient(167deg, rgba(255, 255, 255, 0.1) 50%, rgba(0, 0, 0, 0) 55%), linear-gradient(to bottom, rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0));*/
/*  border-radius: 500px;*/
  box-shadow: 0 0 0 1px #25b1cb inset, 0 0 0 2px #25b1cb inset, 0 8px 0 0 #0f90a8, 0 8px 8px 1px rgba(1, 152, 165, 0.5);
  color: #FFF;
  display: inline-block;
  border-radius:3px !important;
  font-size: 16px;
  font-weight: lighter;
  letter-spacing: -1px;
  line-height: 20px;
  
  position: relative;
  text-align: center;
/*  text-shadow: 0 px 1px rgba(0, 0, 0, 0.5);*/
  text-decoration: none !important;
  top: 0;
    margin-bottom:10px;
  
  -moz-transition: 0.15s;
  -o-transition: 0.15s;
  -webkit-transition: 0.15s;
  transition: 0.15s;
}
    .nopad{
        
        padding: 0px;
    }
.btn-big-red:hover, .btn-big-red:focus {
  background-color: #22abc4 !important;
  box-shadow: 0 0 0 1px #22abc4 inset, 0 0 0 2px #1b96ad inset, 0 10px 0 0 #188ba0, 0 10px 0 1px rgba(0, 107, 113, 0.4), 0 10px 8px 1px #1b96ad;
  top: -2px;
}
.btn-big-red:active {
  box-shadow: 0 0 0 1px #1b96ad inset, 0 0 0 2px #1b96ad inset, 0 0 0 1px rgba(0, 168, 214, 0.24);
  -moz-transform: translateY(10px);
  -ms-transform: translateY(10px);
  -webkit-transform: translateY(10px);
  transform: translateY(10px);
}
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
       .btn-big-re,btn-big-re:visited {
  background-color: #d03867 !important;
/*  background-image: linear-gradient(167deg, rgba(255, 255, 255, 0.1) 50%, rgba(0, 0, 0, 0) 55%), linear-gradient(to bottom, rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0));*/
/*  border-radius: 500px;*/
  box-shadow: 0 0 0 1px #d03867 inset, 0 0 0 2px #d03867 inset, 0 8px 0 0 #b13058, 0 8px 8px 1px rgba(208, 56, 103, 0.46);
  color: #FFF;
  display: inline-block;
  border-radius:3px !important;
  font-size: 16px;
  font-weight: lighter;
  letter-spacing: -1px;
  line-height: 20px;
  
  position: relative;
  text-align: center;
/*  text-shadow: 0 px 1px rgba(0, 0, 0, 0.5);*/
  text-decoration: none !important;
  top: 0;
    margin-bottom:10px;
  
  -moz-transition: 0.15s;
  -o-transition: 0.15s;
  -webkit-transition: 0.15s;
  transition: 0.15s;
}
    .nopad{
        
        padding: 0px;
    }
.btn-big-re:hover, .btn-big-re:focus {
  background-color: #b13058 !important;
  box-shadow: 0 0 0 1px #b13058 inset, 0 0 0 2px #b13058 inset, 0 10px 0 0 #a02a4e, 0 10px 0 1px #8b2444, 0 10px 8px 1px #b13058;
  top: -2px;
}
.btn-big-re:active {
  box-shadow: 0 0 0 1px #a02a4e inset, 0 0 0 2px #a02a4e inset, 0 0 0 1px rgba(160, 42, 78, 0.24);
  -moz-transform: translateY(10px);
  -ms-transform: translateY(10px);
  -webkit-transform: translateY(10px);
  transform: translateY(10px);
}
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
/*    */
       .btn-big-ye {
  background-color: #ffbf11 !important;
/*  background-image: linear-gradient(167deg, rgba(255, 255, 255, 0.1) 50%, rgba(0, 0, 0, 0) 55%), linear-gradient(to bottom, rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0));*/
/*  border-radius: 500px;*/
  box-shadow: 0 0 0 1px #ffbf11 inset, 0 0 0 2px #ffbf11 inset, 0 8px 0 0 #f09c14, 0 8px 8px 1px rgba(255, 191, 17, 0.41);
  color: #FFF;
  display: inline-block;
  border-radius:3px !important;
  font-size: 16px;
  font-weight: lighter;
  letter-spacing: -1px;
  line-height: 20px;
  
  position: relative;
  text-align: center;
/*  text-shadow: 0 px 1px rgba(0, 0, 0, 0.5);*/
  text-decoration: none !important;
  top: 0;
    margin-bottom:10px;
  
  -moz-transition: 0.15s;
  -o-transition: 0.15s;
  -webkit-transition: 0.15s;
  transition: 0.15s;
}
    .nopad{
        
        padding: 0px;
    }
.btn-big-ye:hover, .btn-big-ye:focus {
  background-color: #e8b016 !important;
  box-shadow: 0 0 0 1px #f0b514 inset, 0 0 0 2px #ea9813 inset, 0 10px 0 0 #edb316, 0 10px 0 1px rgba(234, 153, 23, 0.56), 0 10px 8px 1px #e88615;
  top: -2px;
}
.btn-big-ye:active {
  box-shadow: 0 0 0 1px #f0b514 inset, 0 0 0 2px #f0b514 inset, 0 0 0 1px #e39b13;
  -moz-transform: translateY(10px);
  -ms-transform: translateY(10px);
  -webkit-transform: translateY(10px);
  transform: translateY(10px);
}
    
    .disp
    { display: block;
    
    margin: 10px;
    font-size: 12px;
    line-height: 1.42857143;
    color: #403f3f;
   
    background-color: #fff;
 
  }
    .menu {
    
   

    }
    .menu2{
          color: white;
    text-decoration: underline;
    }

    .menu li {
       
    text-align: center;
    list-style-type: none;
    display: inline-block;
    margin: 4px;
        padding: 5px;
    }
    .thumbnail{
      padding:10px;  
    }
</style>
<style>
 
        .mentor-card{
          margin-left: 10px;
           margin-right: 10px;
            border-radius: 0px;
            padding: 0px;
            border-top: 3px solid #dddddd;
            
       
        }
        .mentor-card:hover{
            
          border-top: 3px solid #25b1cb;

        }
        .mentor-card > .container-fluid{
            padding: 0px;
            padding-left: 10px;
            text-align: left;
            line-height: normal;
        }
        .mentor-card >.container-fluid > h4{
            margin: 0px;
            margin-top: 10px;
            padding: 0px;
            color: #25b1cb;
        }
        .mentor-card >.container-fluid > p{
            margin: 0px;
            margin-bottom: 10px;

        }
        .mentor{
            background: #fcfcfc;
            
            border-bottom:3px solid #f4f4f4;
            padding-top: 25px;
            padding-bottom: 50px;
            
        }
        .btn-con,.btn-con:visited{
            border-radius: 0px;
            background-color: #f5f5f5;
            color: #222222;
            border:none;
            transition:all;
            transition-duration:0.35s;

        }

         .btn-con:hover,.bnt-con:focus{
            border-radius: 0px;
            background-color: #25b1cb;
            color: #ffffff;
        }

        .men-hr {
          border-top: 1px solid #ddd;
        }
    </style>




<div class="container thumbnail" style="padding:10px 10px 10px 10px;">



  <div class="row" style="padding: 0px;margin: -10px;" >


   

<div class="col-md-4 col-sm-12 col-md-push-8 text-center hidden-xs hidden-sm" style="padding-top:30px
;margin-bottom: 50px">
    <?php 
          if($_SESSION['u_id'])
          {
          if($no_slots_avail==1)
          {
         echo '<button onclick="notify()" class="wow btn btn-lg btn-block btn-new btn-big-ye" data-toggle="modal" data-target=".xt" style="animation-duration: 2s;min-height: 42px;font-size: 18px;" >All Slots are booked(Notify Me!)</button><br>';
          }
          else
          {
             echo '<button class="wow btn btn-lg btn-block btn-new btn-big-re" data-toggle="modal" data-target=".xt" style="animation-duration: 2s;min-height: 42px;font-size: 18px;" >Talk To '.$men.'</button><br>';

          } 


         if($rowc['free_act']==1 and $rowc['timet_f']==1)
            echo '<button class="btn btn-md btn-block btn-new" data-toggle="modal" data-target=".xf" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</button><br>';
        }
        else
        {


    
     $_SESSION['cur']=$cur;
     if($no_slot_avail==0)
      echo '<a class="wow btn btn-block btn-big-re" onclick="logx(\'next\',\'book\')" style=" animation-duration: 2s;min-height: 42px;font-size: 18px;" >Talk To '.$men.'</a><br>';
    else
      echo '<a class="wow btn btn-block btn-big-re" onclick="logx(\'next\',\'notify\')" style=" animation-duration: 2s;min-height: 42px;font-size: 18px;" >Talk To '.$men.'</a><br>';
     // echo '<a class="btn btn-success btn-md btn-block" href="/?lo" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</a><br>';


        //echo '<button class="btn btn-info btn-block" data-toggle="modal" data-target=".xu" style="min-height: 42px;font-size: x-large;" >Book An Appointment Now!</button><br>';
        // echo '<button class="btn btn-success btn-md btn-block" data-toggle="modal" data-target=".xu" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</button><br>';

        }
        ?>
        <br><hr class="men-hr">
  <div class="list-group" style="
    text-align: center;
">

      <?php 
       $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
       $fee=$rowc['fee'];
                $disc=$rowc['disc'];
                
                if($disc!="")
                {
                  $fee2=(int)($fee-(($disc/100)*$fee));
                }
                else
                  $fee2=$fee;

               /* if($fee2!=0)
                echo '<a  class="list-group-item"><strong>Fee:</strong> <span style="font-size:16px;margin-left:5px;color: #25b1cb;" ><span class="fa fa-inr"></span>'.$fee2.'</span></a>';
                else
                   echo '<a  class="list-group-item"><strong>Fee:</strong>  <span style="font-size:16px;margin-left:5px;color: #25b1cb;" >FREE</span></a>';*/

                  
                   
                    if(isset($_SESSION['u_id']))
                    {
                      echo '<a  id="war" href="#thank" class="list-group-item" style="animation-duration: 3s;background-color: #fff;"><span style="font-size:16px;margin-left:5px;color: #25b1cb;cursor: pointer;"><span class="fa fa-comments"></span> Write A Review</span></a>';

                    }
                    else
                    {
                       echo ' <a    class="list-group-item " onclick="logx(\'next\',\'thank\')" style="animation-duration: 3;background-color: #fff;"><span style="font-size:16px;margin-left:5px;color: #25b1cb;cursor: pointer;" ><span class="fa fa-comments"></span> Write A Review</span></a>';
 
                    }


                ?>
       
      </div>
        
    
    <div class="container-fluid thumbnail text-center owl-master blue">
           
             <h3 style="font-weight:400">People Also Viewed</h3>
        <hr class="hr1">
        
    </div>
          
    </div>

     <div class="col-md-8 col-sm-12 col-md-pull-4 " style="; <?php if ($agent==0){echo "width:100%;";}  ?> ">


   <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-lg-offset-0  ">
       <?php 

if($rowc['propic_file']!=""){
       echo '<img class="img-circle img-responsive" style=" margin-top: 10px;  width:200px;" src="/cp/m_img/'.$rowc['propic_file'].'.png" alt=""/>'; 
       }
       else
       {
        echo '<img class=" img-circle img-responsive" width="200px" src="uploader/userpic.gif">';
       }
        ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12 " style="margin-top:10px">
        
         <div class="col-md-offset-0 col-xs-offset-2"> <h5 ><a href="#" style="text-align:left;text-transform: capitalize;text-decoration:none;font-family:'Raleway',sans-serif;font-weight:400;font-size:30px;color:#585858"><?php echo ''.$rowc['fname'].' '.$rowc['lname'].'';?> </a> 
              
              <?php   $sh_url=rawurlencode('https://ecounsellors.in'.$curt.'');
                    echo '<a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?app_id=415771041928681&sdk=joey&u='.$sh_url.'&display=popup" style="position:relative;top:-5px;"><span style="font-size:12px;margin-left:5px;margin-top:-5px;color: white;padding:4px 8px;border-radius:20px;background-color:#dddddd;" ><span class="fa fa-facebook"></span></a>';?>
          </h5>
            
          <h6 >
              <a href="http://c.ecounsellors.in" target="_blank" style="text-align:left;text-decoration:none;text-transform: capitalize;color:#25b1cb;">(Become a <?php echo $men ?>, extend a helping hand)</a>
          </h6>
          </div>  
            
    <div class="hidden-md hidden-lg">
               <div class="list-group" style="
    text-align: center;
">

      <?php 
       $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
       $fee=$rowc['fee'];
                $disc=$rowc['disc'];
                
                if($disc!="")
                {
                  $fee2=(int)($fee-(($disc/100)*$fee));
                }
                else
                  $fee2=$fee;

               /* if($fee2!=0)
                echo '<a  class="list-group-item"><strong>Fee:</strong> <span style="font-size:16px;margin-left:5px;color: #25b1cb;" ><span class="fa fa-inr"></span>'.$fee2.'</span></a>';
                else
                   echo '<a  class="list-group-item"><strong>Fee:</strong>  <span style="font-size:16px;margin-left:5px;color: #25b1cb;" >FREE</span></a>';*/

                    // $sh_url=rawurlencode('https://ecounsellors.in'.$curt.'');
                    // echo '<a  target="_blank" class="list-group-item" href="https://www.facebook.com/sharer/sharer.php?app_id=415771041928681&sdk=joey&u='.$sh_url.'&display=popup"><span style="font-size:16px;margin-left:5px;color: #25b1cb;" ><span class="fa fa-facebook"></span> Share this profile on facebook</span></a>';
                   
                    if(isset($_SESSION['u_id']))
                    {
                      echo '<a  id="war" href="#thank" class="list-group-item" style="animation-duration: 3s;background-color: #fff;"><span style="font-size:16px;margin-left:5px;color: #25b1cb;cursor: pointer;"><span class="fa fa-comments"></span> Write A Review</span></a>';

                    }
                    else
                    {
                       echo ' <a class="list-group-item " onclick="logx(\'next\',\'thank\')" style="animation-duration: 3;background-color: #fff;"><span style="font-size:16px;margin-left:5px;color: #25b1cb;cursor: pointer;" ><span class="fa fa-comments"></span> Write A Review</span></a>';
 
                    }


                ?>
       
      </div>
            </div>

            </div>
       <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 hidden-md hidden-lg">
        <?php 
          if($_SESSION['u_id'])
          {
          if($no_slots_avail==1)
          {
         echo '<button onclick="notify()" class="wow btn btn-lg btn-block btn-new btn-big-ye" data-toggle="modal" data-target=".xt" style="animation-duration: 2s;min-height: 42px;font-size: 18px;" >All Slots are booked(Notify Me!)</button><br>';
          }
          else
          {
             echo '<button class="wow btn btn-lg btn-block btn-new btn-big-re" data-toggle="modal" data-target=".xt" style="animation-duration: 2s;min-height: 42px;font-size: 18px;" >Talk To '.$men.'</button><br>';

          } 


         if($rowc['free_act']==1 and $rowc['timet_f']==1)
            echo '<button class="btn btn-md btn-block btn-new" data-toggle="modal" data-target=".xf" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</button><br>';
        }
        else
        {


    
     $_SESSION['cur']=$cur;
     if($no_slot_avail==0)
      echo '<a class="wow btn btn-block btn-big-re" onclick="logx(\'next\',\'book\')" style=" animation-duration: 2s;min-height: 42px;font-size: 18px;" data-toggle="modal" data-target=".xt" >Talk To '.$men.'</a><br>';
    else
      echo '<a class="wow btn btn-block btn-big-re" onclick="logx(\'next\',\'notify\')" style=" animation-duration: 2s;min-height: 42px;font-size: 18px;" >Talk To '.$men.'</a><br>';
     // echo '<a class="btn btn-success btn-md btn-block" href="/?lo" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</a><br>';


        //echo '<button class="btn btn-info btn-block" data-toggle="modal" data-target=".xu" style="min-height: 42px;font-size: x-large;" >Book An Appointment Now!</button><br>';
        // echo '<button class="btn btn-success btn-md btn-block" data-toggle="modal" data-target=".xu" style="min-height: 42px;font-size: x-large;" >Request Free Appointment</button><br>';

        }
        ?>

       
       </div>
            </div>
<style>
    .libuton{
        text-decoration:none;
        border-radius:3px;
       color:white !important;
        background-color:#25b1cb;
        border-top:2px solid #2498ad;
        padding:5px;
      
        font-weight:400;
        font-size:12px;
        transition:all;
        transition-duration: 0.35s;
    }
    .libuton:hover{
    color:white !important;
        background-color:#1f90a5;
    }
    .libuton >a{
        
        text-decoration: none;
        color: inherit;
    }.libuton1{
        text-decoration:none;
        border-radius:3px;
        background-color:#eaeaea;
        border-top:2px solid #dbdbdb;
        padding:5px;
        color:#575757 !important;
        font-weight:400;
        font-size:12px;
        transition:all;
        transition-duration: 0.35s;
    }
    .libuton1:hover{
    color:white !important;
        background-color:#25b1cb;
    }
    .libuton1 >a{
        
        text-decoration: none;
        color: inherit;
    }
    .awesomeheading{
        color:#575757;
        font-weight:600 !important;
        
/*        border: 1px solid #9b9b9b;*/
        border-bottom:1px solid #cccccc;
        margin-top:10px;
        margin-bottom:10px;
        padding:3px;
        display:inline-block;
/*        border-radius: 500px;*/
        
        
    }
         </style>
      <div class="row">


        <div class="col-sm-12 col-lg-12 col-md-12">
         
            <div class="row" style="text-align:center;margin-top:10px">

              <!--<div class="col-md-3" style="margin:10px;">
                <img  src="http://placehold.it/180x180" alt="">

              </div>-->
              <div class="col-md-12 " style="text-align:left;">
              <?php  echo '<div class="info " style="border-radius:0px;background-color:white;margin-top:5px;border:none;border-top:1px solid #dddddd">
                <!-- <p><strong>Name:</strong>'.$rowc['fname'].' '.$rowc['lname'].' </p> -->
                <strong class="awesomeheading">Expertise:</strong>';

                  $arr1=explode(",",$rowc['typec']);
                    echo "<ul class='menu' style='padding:0px;'>";
                  foreach ($arr1 as $data) {
                    echo "<li  class='libuton'><a class='menu2' href='https://ecounsellors.in/hub/".preg_replace('/\s+/', '-', $data)."' title=".$data.">".$data."</a></li>";

                    //New code mentor suggestion



                    
                  }
                      echo "</ul>";

                      if($rowc['skills']!='')
                      {
                              echo ' <strong class="awesomeheading">I can advise on:</strong>';

                          $arr=explode(",",$rowc['skills']);
                            echo "<ul class='menu' style='padding:0px;'>";
                          foreach ($arr as $data) {
                            echo "<li class='libuton1'>".$data."</li>";
                            
                          }
                              echo "</ul>";
                       // .nl2br($rowc['typec']).

                    }


                echo '<strong class="awesomeheading">About Me:</strong><span class="disp"> '.nl2br($rowc['abt']).' </span>
                  <strong class="awesomeheading">Experience:</strong><span class="disp">'.nl2br($rowc['clg']).'</span>
                 <strong class="awesomeheading">Qualification:</strong><span class="disp">'.nl2br($rowc['edu']).'</span>
                 
                ';
                  if($rowc['pro']!="")
                  {
                  echo '<p><strong class="awesomeheading">Past Achivements:</strong><span class="disp">'.nl2br($rowc['pro']).'</span></p>';
                }

                 //echo ' <p><strong>State:</strong>'.$rowc['state'].'</p><p><strong>City:</strong>'.$rowc['city'].'</p><p><strong>Age:</strong>'.$rowc['age'].'</p>';    


                ?>         
                </div>
             </div>
          





           


         </div>
       </div>




















       <div class="col-sm-12 col-lg-12 col-md-12">
        <div class="" >   
            <!-- <div class="well" style="width:100%;color: white; background-color: #25b1cb;text-align:center;<?php if($agent==1) { echo 'font-size: x-large;';}?>">Video</div>
-->
          <div class="row" style="text-align:center;">

              <!--<div class="col-md-3" style="margin:10px;">
                <img  src="http://placehold.it/180x180" alt="">

              </div>-->
             <!-- <div class="col-md-12 col-xs-12" style="text-align:left;">
               <div class="info" style="padding: 0px;">

                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" width="721" height="315" src="https://www.youtube.com/embed/0Kdw8MWoHJo?rel=0" frameborder="0" allowfullscreen></iframe>

                </div>

              
              </div>              

            </div>-->
          </div>


                <?php 
              
                 echo '<input type="hidden" id="c_id" value="'.$sub.'">';
                ?>




          <div class="caption">
          </div>

        </div>
      </div>



          <div class="col-md-4 col-sm-4"   <?php //if($agent==1){ echo 'style="position: fixed;max-width: 370px;"';} ?>  >


     

          <!--<p><strong>Specialisation:</strong> Career</p>-->
    
           <!-- <div class="ratings">
              <p class="pull-right">12 reviews</p>
              <p>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </p>
            </div>-->
          


      <!--<p class="list-group-item" style="
      background-color: #25b1cb;
      color: white;
      font-size: x-large;
       text-align: center;
       ">Options</p>-->
     


    </div><!-- row -->
         

<style type="text/css">

.list-group-item {
  border-radius: 0px !important;
    }
.well-sm {
   
    border-radius: 0px;
}
.progress {
    margin-bottom: 9px;
    }
  

  .well-lg {
  padding: 4px;
}
.imgx{
  height: 50px !important;

  margin: 7px auto;
}
.starsr {
  margin: 5px auto 0px;
  font-size: 11px;
}
.dt{
  padding-bottom: 5px;
  padding-top: 8px;
}
.rating{
  font-size: 20px;
}
input:focus{
  outline: 0px auto -webkit-focus-ring-color !important;
    outline-offset: 0px !important;
    
}
.err{
  color: #fff;
  border-radius: 29px;
  background-color: #CC1717;
}
</style>

<?php

if(isset($_GET['ref']) and (time()-$rowu['timestamp']<10800))
{


                        echo "<script type=\"text/javascript\">


                        



               $.amaran({
                'theme'     :'awesome green',
                'content'   :{
                        title:'<br><h1 class=\"label label-primary\">Got Referral Code?</h1>',
                         bgcolor:'#27ae60',
                         color:'#f00',
                           icon:'fa fa-smile-o',
                           info:'',
                        message  :'<h3>Click Here!</h3>',

                    
                     },

                     'sticky'    :true,
                     'closeOnClick':true,
                     'inEffect':'slideTop',
                     'outEffect':'slideLeft',
                      'closeButton'   :true,
                       'afterEnd' :function()
                        {
                            window.location='profile?ref';
                        }
                   
                });


 $.amaran({
                'theme'     :'awesome green',
                'content'   :{
                        title:'<br><h1 class=\"label label-success\">Congrats!</h1>',
                         bgcolor:'#27ae60',
                         color:'#f00',
                           icon:'fa fa-heart',
                           info:'',
                        message  :'<h3>You got 50 credits for Sign Up</h3>',

                    
                     },
                     
                     'closeOnClick':true,
                     'inEffect':'slideTop',
                     'outEffect':'slideLeft',
                      'closeButton'   :true,
                      'delay': 4000
                      
                   
                });

              </script>";
           
}



 ?>

<script type="text/javascript">
  


</script>
        <style>
         
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


 <div class="col-sm-12 col-lg-12 col-md-12">

    
    <div class="row ">

      <div class="">

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default" style="background-color:#fff !important;border:none;">
          <div class="panel-heading" role="tab" id="headingOne" style="background-color:#fff !important;">
            <h4 class="panel-title" style="" style="background-color:#fff !important;">
              <a data-toggle="collapse" id="rev" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="" style="text-decoration:none;color:#222;text-align:center">
                <span style="font-size:18px;color:#404040;font-weight:light">Reviews</span>
                 <hr class="hr1" style="margin-top:5px; margin-bottom:px">
              </a>
            </h4>
          </div>
          <div class="col-xs-12">
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
               <ul class="media-list">

      <?php 

          $crat1=0;
          $crat2=0;
          $crat3=0;
          $crat4=0;
          $crat5=0;




          $qrat=query("SELECT * from rating where c_id='$sub' order by rating desc,id desc");
          $nrat=mysqli_num_rows($qrat);
          if($nrat>0)
          {
          while($rat=mysqli_fetch_array($qrat))
          {
            $ruid=$rat['u_id'];
            
            $rating=$rat['rating'];
            if($rating==1)
            {
              $crat1++;
            }
            else if($rating==2)
            {
              $crat2++;
            }
            else if($rating==3)
            {
              $crat3++;
            }
            else if($rating==4)
            {
              $crat4++;
            }
            else if($rating==5)
            {
              $crat5++;
            }
            $tot_rat+=$rating;
            $avg_rat=number_format($tot_rat/$nrat,1);

            $qud=query("SELECT * from u_users where u_id='$ruid'");
            $r_qud=mysqli_fetch_array($qud);
            $qufd=query("SELECT * from u_userdata where u_id='$ruid'");
            $r_qufd=mysqli_fetch_array($qufd);


               echo '<li class="media">
                    
                    <div class="container" style="width:100%;">
                    <div class="row">
                    <div class="col-md-2">
                     <a style="margin: 10px;margin-top:20px;"href="#">';

                  if($r_qufd['propic']=="")
                  {
                    if($r_qud['status']=="f" || $r_qud['status']=="g")
                      echo '<img class="imgx media-object img-circle img-responsive" src="/u_img/'.$r_qud['url_file'].'.png"/>';
                    else
                      echo '<img class="imgx media-object img-circle img-responsive" src="uploader/userpic.gif"/>';
                  }
                  else
                  {
                    echo '<img class="imgx media-object img-circle img-responsive" src="'.$r_qufd['propic'].'"/>';

                  }

                   query("UPDATE c_userdata set avg_rat='$avg_rat',n_rat='$nrat' where sub_id='$sub'");
                  echo '</a>
                  </div>
                  <div class="col-md-6" style="text-align:left;margin-top:5px">
                          
                            <span class=" text-capitalize  " style="font-weight:700;font-size:14px">'.$r_qud['name'].'</span>
                            <span class=" text-capitalize dt" style="font-size:12px;">'.date("j M'y",$rat['time']).' </span>';
                     if($agent==0) echo '<br><br>'; 
                      
                      echo ' 
                             <div class="stars starsr">';

                for($i=1;$i<=$rating;$i++)
                    echo '<span class="glyphicon glyphicon-star" style="color:#efc30b"></span>';
                for($i=1;$i<=(5-$rating);$i++)
                    echo '<span class="glyphicon glyphicon-star-empty" style="color:#cecece;"></span>';

             echo '         </div>
                            
                            </div><!-- col-md-12 -->
      </div><!-- ROW -->
      <div class="row">
                <div class="col-md-9 col-md-offset-2" style="text-align:left;">
                
                    <!-- <p>'.$rowc['fname'].' '.$rowc['lname'].' </p> -->
            <!--        <div class="awesomeheading" style="font-weight:700;font-size:14px;">'.$rat['title'].'</div> -->
               
                 <p style="font-size:12px;">'.nl2br($rat['review']).'</p>
                    
            
            <hr>
                </div>


     </div><! -- row -->


                       
                  
            </div>
              </li> '; 
              }

            }
            else
            {
              

               echo '<li class="media">
                  <a class="pull-left" href="#">';

                

                  echo '</a>
                  <div class="media-body">
                    <div class="well well-lg">';
                   
                    
                      
                      echo '<div class="media-comment thumbnail">
                        <h3>Be the first to write a review.</h3>
                        
                      </div>
                       
                      
                    </div>              
                 
                </div>
              </li> '; 
            }


              ?>        

            </ul>
                  <div id="review"></div>
          </div>
          </div>
        </div>
      </div>
</div>

    </div>

</div >
  <div class="hidden-md hidden-lg text-center">
       <h3 style="font-weight:400">People Also Viewed</h3>
        <hr class="hr1">
    <div class="container-fluid  text-center owl-minor blue">

    </div>
     </div>
    <div id="thank" ></div>
     <script>
     $("#war").click(function() {
    $('html,body').animate({
        scrollTop: $("#review").offset().top},
        'slow');
});
     </script>

<script type="text/javascript">
  
    
     var couns = [];




<?php


$array_final=array();
foreach ($arr1 as $key ) {
	foreach ($array as $key2) {
		if($key==$key2)
		{
			$array_final[]=$key;
		
		}
	}
}

$cnt=0;

foreach ($array_final as $key) {
  // $stu[$cnt]= new stu();
    $stu= Array();         
	
	$q_sugg_1=query("SELECT * from c_userdata where typec like '%$key%' and sub_id!='$sub' and verifyf='1' and timet='1' and no_slot!='-1' order by n_rat asc,avg_rat asc LIMIT 6");
	
	  while($q_row_sugg_1= mysqli_fetch_array($q_sugg_1))
            {
             // $arr[$cnt]=$row_fields['name'];

              $name=$q_row_sugg_1['fname'].' '.$q_row_sugg_1['lname'];
              
              if($q_row_sugg_1['men']==1)
              {
                $men="mentor";
              }
              else
              {
                $men="counsellor";
              }
              $stu[$cnt]->name=$name;
              $stu[$cnt]->value='/'.$men.'/'.preg_replace('/\s+/', '-', $name).'/'.$q_row_sugg_1['sub_id'].'';
              $stu[$cnt]->tag=$key;
              $stu[$cnt]->img=$q_row_sugg_1['propic_file'];
              $cnt++;

            }

            echo '
         
            couns.push(\''.json_encode($stu).'\');
            

            ';
          unset($stu);
          $cnt=0;
          

            
}

?>

  



</script>

<script type="text/javascript">


  for(var k=0;k<couns.length;k++)
  {
  
    var CounsNew = JSON.parse(couns[k]);



 
    $(".owl-minor").append('<div class=" owl-carousel owl-theme blue" id="owl-minmtr'+k+'"></div>');
    $(".owl-master").append('<div class=" owl-carousel owl-theme blue" id="owl-mentors'+k+'"></div>');

   

    for (var i = 0; i < CounsNew.length; i++) {
      var div_item = '  <span class="item"><div class="thumbnail mentor-card" ><div class="container-fluid" style="width:100%;padding-left:0px;" > <div class="col-md-4 col-sm-4 col-xs-4" style="padding:0px;">';
      var imgs ='<a href="'+CounsNew[i].value+'"><img  src="/cp/m_img/'+CounsNew[i].img+'.png" class="img-responsive"></a> </div>';
      var namse ='<div class="col-md-8 col-sm-8 col-xs-8"><a href="'+CounsNew[i].value+'" style="text-decoration:none;"><h4>'+CounsNew[i].name+'</h4></a><br>' ;
      var tag = ' <p class="hidden-xs"><span class="libuton1">'+CounsNew[i].tag+'</span ></p><p class="hidden-md hidden-lg hidden-sm ">'+CounsNew[i].tag+'</p></div>';
      var endiv = '</div><a class="btn btn-primary btn-block btn-con" href="'+CounsNew[i].value+'">Connect</a> </div></span>';
      // console.log(imgs,name,tag);
      $("#owl-mentors"+k).append(div_item+imgs+namse+tag+endiv);
       $("#owl-minmtr"+k).append(div_item+imgs+namse+tag+endiv);
     
   }
   CounsNew =0;

       $("#owl-minmtr"+k).owlCarousel({

      slideSpeed : 500,
      paginationSpeed : 500,
      items : 1, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      loop:true,
      autoPlay:2800,
      autoPlayTimeout:1000,
      stopOnHover :true

      });
 
      $("#owl-mentors"+k).owlCarousel({

      slideSpeed : 500,
      paginationSpeed : 500,
      items : 1, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      loop:true,
      autoPlay:2800,
      autoPlayTimeout:1000,
      stopOnHover :true

      });
 
     
 
 }
</script>

<?php

 $rat=query("SELECT * from rating where u_id='$uid' and c_id='$sub'");
 $row_rat=mysqli_fetch_array($rat);

?>







  <div class="row " style="margin-top:40px;" >
    <div class="col-md-6">
  
        <div class="text-right">
          <?php
           if($row_rat['rating']!="")
           echo '<a class="btn btn-info btn-green btn-block btn-new" id="open-review-box">Update Your Review</a>';
          else
            echo '<a class="btn btn-info btn-green btn-block btn-lg btn-new" id="open-review-box">Write a Review</a>';

          ?>
        </div>

        <div class="row" id="post-review-box" style="display:none;">
          <div class="col-md-12">
            <form accept-charset="UTF-8" action="" method="post">
              <?php echo '<input id="ratings-hidden" name="rating" type="hidden" value="'.$row_rat['rating'].'"> ';
              echo '<input class="form-control animated"  type="text" placeholder="Title" value="'.$row_rat['title'].'" id="title"><br> ';
              echo '<textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5">'.$row_rat['review'].'</textarea>'; ?>

              <div class="text-right">
                <div class="stars starx starrr" style="color:#fdd706;" data-rating="0"></div>
                <a class="btn btn-new-dg btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                  <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                  <button class="btn btn-info btn-lg btn-new" id="save" type="submit"><span class="glyphicon glyphicon-ok"></span>Submit</button>
                </div>
              </form>

             <?php 
             if(!$_SESSION['u_id'])
                 echo '<div class="rat_result bg-primary text-center" style="border-radius: 27px;">You are not logged in.<a onclick="logx(\'next\',\'thank\')" class="btn btn-big-red btn-block">Login</a></div>';
              else
              {
            if($row_rat['rating']!="")
             echo '<div class="rat_result bg-primary text-center">You Can Update Your Review</div>';
             else
              echo '<div class="rat_result bg-primary text-center"></div>'; 
            }
            ?>
            </div>
          </div>
        

      </div>

<?php

$avg_crat1=number_format(($crat1/$nrat)*100,1);
$avg_crat2=number_format(($crat2/$nrat)*100,1);
$avg_crat3=number_format(($crat3/$nrat)*100,1);
$avg_crat4=number_format(($crat4/$nrat)*100,1);
$avg_crat5=number_format(($crat5/$nrat)*100,1);

      echo '<div class="col-xs-12 col-md-6">
        <div class="well well-sm">
          <div class="row">
            <div class="col-xs-12 col-md-6 text-center">
              <h1 class="rating-num">
                '.$avg_rat.'</h1>
                <div class="rating">';


            
                  $i=0;$flag=0;
                  while($avg_rat-$i>=1)
                  {
                    echo '<span class="fa fa-star"></span>';
                    $i++;
                    

                  }
              
                  if($avg_rat-$i!=0)
                        $flag=1;

                     
                if($flag==1)
                {
                  echo '<span class="fa fa-star-half-o"></span>';
                }

                for($i=1;$i<=(5-$avg_rat);$i++)
                    echo '<span class="fa fa-star-o"></span>';
                
            echo '</div>
            <div>
              <span class="glyphicon glyphicon-user"></span>'.$nrat.' total
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="row rating-desc">
              <div class="col-xs-3 col-md-3 text-right">
                <span class="glyphicon glyphicon-star"></span>5
              </div>
              <div class="col-xs-8 col-md-9">
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                  aria-valuemin="0" aria-valuemax="100" style="width:'.$avg_crat5.'%">
                  <span class="sr-only">'.$avg_crat5.'%</span>
                </div>
              </div>
            </div>
            <!-- end 5 -->
            <div class="col-xs-3 col-md-3 text-right">
              <span class="glyphicon glyphicon-star"></span>4
            </div>
            <div class="col-xs-8 col-md-9">
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                aria-valuemin="0" aria-valuemax="100" style="width: '.$avg_crat4.'%">
                <span class="sr-only">'.$avg_crat4.'%</span>
              </div>
            </div>
          </div>
          <!-- end 4 -->
          <div class="col-xs-3 col-md-3 text-right">
            <span class="glyphicon glyphicon-star"></span>3
          </div>
          <div class="col-xs-8 col-md-9">
            <div class="progress">
              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
              aria-valuemin="0" aria-valuemax="100" style="width: '.$avg_crat3.'%">
              <span class="sr-only">'.$avg_crat3.'%</span>
            </div>
          </div>
        </div>
        <!-- end 3 -->
        <div class="col-xs-3 col-md-3 text-right">
          <span class="glyphicon glyphicon-star"></span>2
        </div>
        <div class="col-xs-8 col-md-9">
          <div class="progress">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
            aria-valuemin="0" aria-valuemax="100" style="width: '.$avg_crat2.'%">
            <span class="sr-only">'.$avg_crat2.'%</span>
          </div>
        </div>
      </div>
      <!-- end 2 -->
      <div class="col-xs-3 col-md-3 text-right">
        <span class="glyphicon glyphicon-star"></span>1
      </div>
      <div class="col-xs-8 col-md-9">
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
          aria-valuemin="0" aria-valuemax="100" style="width: '.$avg_crat1.'%">
          <span class="sr-only">'.$avg_crat1.'%</span>
        </div>
      </div>
    </div>
    <!-- end 1 -->
  </div>
  <!-- end row -->
</div>
</div>
</div>
</div>

</div>';



?>



</div>
<img class="img-responsive thumbnail newthumbnail " src="/img/money_back.jpg">

</div><!-- col-8 -->

      
<!--         BOX BUTTON-->

</div><!-- row -->





</div><!-- conatiner-->

    </div>











<?php 

include("includes/footer2.php");

?>









</body>
</html>








<script src="/js/main.js"></script>

                                          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
                                          <script>
                                              (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                              e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                              e.src='//www.google-analytics.com/analytics.js';
                                              r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                                              ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                                            </script>-->

                                           

<?php
if(isset($_SESSION['u_id']))
{
?>
 <script type="text/javascript">

 function ask()
 {
  $(".xt").modal("hide");
  $(".xq").modal("show");
 }

  function ask2()
 {
  $(".xf").modal("hide");
  $(".xq").modal("show");
 }
function pay(ur)
{
  window.location=ur;
  $("#confirm").html("&nbsp;");
  $("#confirm").addClass("m-progress");
}
 function save(vx)
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

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
  var sub=<?php echo "'".$sub."'"; ?>;
xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vx="+vx+"&sub="+sub);
 }

 function setdate(rand)
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

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
  var dx=document.getElementById("date").value;
xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setdate="+dx+"&rand="+rand);
 }
  function setime(rand)
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

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      if(tx=="")
      {
        document.getElementById('mainframe').innerHTML= "<h1>No Time Slot Selected<a class='btn btn-info' href='' onclick='window.location.reload(true);'> Reload</a></h1>";
      }
      else
      {
      document.getElementById('mainframe').innerHTML= xmlhttp.responseText;

      }
      

    }
  }
  var tx;
 tx = document.querySelector('input[name="rads"]:checked');
 
 if(tx==null)
 {
    alert('Please select a time slot');
    return false;
 }
 else
 {
    tx=tx.value;
 }

 if(tx!='' || tx !='\0')
 {

xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setime="+tx+"&rand="+rand);
}
else
{
  alert("No slot Selected");
  document.getElementById('answer').innerHTML= "<h4 class='err bg-primary animated infinite pulse'>No Time Slot Selected</h4>"

}

 }

function confirm(ans,rand)
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

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
      if(ans=="no")
      {
        location.reload();
      }
      else
        document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
 
  if(ans=="yes")
xmlhttp.open("GET","/ajax/meet.php?confirm=yes"+"&rand="+rand,true);
else
  xmlhttp.open("GET","/ajax/meet.php?confirm=no"+"&rand="+rand,true);


xmlhttp.send();
 }




function notify()
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

        document.getElementById("loadbar").style.display="inline";
        document.getElementById("quiz").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
    
        document.getElementById('mainframe').innerHTML= xmlhttp.responseText;
    }
  }
 

xmlhttp.open("GET","/ajax/meet.php?sub=",true);

xmlhttp.send();
 }









 function query()
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

        document.getElementById("loadbar_mess").style.display="inline";
        document.getElementById("quiz_mess").style.display="none";
        


       
    }
  else if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      
    
        document.getElementById('mainframe_mess').innerHTML= xmlhttp.responseText;
    }
  }
 
var dx=document.getElementById("query1").value;

if(dx=='')
{
    document.getElementById('answer_mess').innerHTML="<br><p class='err bg-primary animated infinite pulse'>No Questions Entered</p>"
}
else if(dx.length<100)
{
    document.getElementById('answer_mess').innerHTML="<br><p class='err bg-primary animated infinite pulse'>Questionare too short; use atleast 100 characters</p>"

}

else
{
xmlhttp.open("POST","/ajax/meet.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("ques="+dx);
}

 }























 function save_f(vx)
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
  var sub=<?php echo "'".$sub."'"; ?>;
xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vx="+vx+"&sub="+sub);
 }

 function setdate_f(rand)
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
  var dx=document.getElementById("date").value;
xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setdate="+dx+"&rand="+rand);
 }
  function setime_f(rand)
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
      if(tx=="")
      {
        document.getElementById('mainframe_f').innerHTML= "<h1>No Time Slot Selected<a class='btn btn-info' href='' onclick='window.location.reload(true);'> Reload</a></h1>";
      }
      else
      {
      document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;

      }
      

    }
  }
 var tx = document.mainForm.rads.value;

xmlhttp.open("POST","/ajax/meet_f.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("setime="+tx+"&rand="+rand);
 }

function confirm_f(ans,rand)
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
      
      if(ans=="no")
      {
        location.reload();
      }
      else
        document.getElementById('mainframe_f').innerHTML= xmlhttp.responseText;
    }
  }
 
  if(ans=="yes")
xmlhttp.open("GET","/ajax/meet_f.php?confirm=yes"+"&rand="+rand,true);
else
  xmlhttp.open("GET","/ajax/meet_f.php?confirm=no"+"&rand="+rand,true);


xmlhttp.send();
 }














  </script>



<style>
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
    .modalp{
     
        color:rgba(255, 255, 255, 0.67);
        font-size: 14px;
     
        
    }
    .modal .btn-new{
        border-top:3px solid #1490a7;
    }
    .bigi{
        background:#1e9ab1;
        font-size:25px;
         padding:15px;
    }
    .modal hr{
        margin-top:5px;
        margin-bottom:5px;
    }
</style>





  <div class="modal fade bs-example-modal-md xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe">     
       <div class="modal-header">
        <button type="button" class="close btn " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">&times;</span></button>

        <h4><span class="label label-info" id="qid">1</span> Mode of conversation?</h4>
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
        <?php
        if($fee2==0)
        {
        echo '<a onclick="save(\'1\')" type="radio" name="q_answer" value="1" class=" btn btn-lg btn-block btn-new"> 
        
          <div class="container-fluid">
        <i class="glyphicon glyphicon-facetime-video modali bigi"></i>
       <h2 style="font-size:20px;margin:0px;padding:0px;color:white">Video Call</h2>
         <hr class="hrw">         <p class="modalp hidden-xs">Requires good internet connection 3G or wifi</p>
         </div>
        </a>
        <br>';
        echo '<a onclick="save(\'3\')" type="radio" name="q_answer" value="1" class=" btn btn-lg btn-block btn-new "> 
         <div class="container-fluid"> 
       <i class="glyphicon glyphicon glyphicon-volume-up modali bigi"></i>
       <h2 style="font-size:20px;margin:0px;padding:0px;color:white">Phone Call</h2> 
          <hr class="hrw">
          <p class="modalp hidden-xs">You\'ll be connected to mentor via call </p>
        </label>
       </div>
       </a>
       
        <br>';
        }
        else
        {
           echo '<a onclick="save(\'1\')" type="radio" name="q_answer" value="1" class=" btn btn-lg btn-block btn-new"> 
        
          <div class="container-fluid">
        <i class="glyphicon glyphicon-facetime-video modali bigi"></i>
       <h2 style="font-size:20px;margin:0px;padding:0px;color:white">Video Call</h2>
         <hr class="hrw">         <p class="modalp hidden-xs">Requires good internet connection 3G or wifi</p>
         </div>
        </a>
        <br>';
        echo '<a onclick="save(\'3\')" type="radio" name="q_answer" value="1" class=" btn btn-lg btn-block btn-new "> 
         <div class="container-fluid"> 
       <i class="glyphicon glyphicon glyphicon-volume-up modali bigi"></i>
       <h2 style="font-size:20px;margin:0px;padding:0px;color:white">Phone Call</h2> 
          <hr class="hrw">
          <p class="modalp hidden-xs">You\'ll be connected to mentor via call</p>
        </label>
       </div>
       </a>
       
        <br>';
        }
        ?>
          <!-- <a onclick="ask()" type="radio" name="q_answer" value="1" class=" btn btn-lg btn-white "> <i class="glyphicon glyphicon-comment modali"></i> Ask Questions (FREE)</a> -->

        <?php //echo '<a onclick="save('2')" type="radio" name="q_answer" value="1"> <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> Phone Conference</label></a> --> ?>
       
      </div>
</div>

    </div>
    <div class="modal-footer text-muted">
        <div class="hidden-md hidden-lg" style="text-align:left"><h4>1. Video call requires good internet connection 3G or wifi</h4><br>
        <h4>2. In Phone call you'll be connected to mentor via call</h4>
      </div>
        <div class="modal-footer" style="
    text-align: center;
">
   <?php echo '<p><b>NOTE:</b> Text Chat is also available in both modes, you can also text chat with '.$men.' along with appointment.</p>'; ?>
   </div>
        
      <span id="answer"></span>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



 <div class="modal fade bs-example-modal-md xq" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe_mess">     
       <div class="modal-header">
         <button type="button" class="close btn " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">X</span></button>


        <h4><span class="label label-info" id="qid">1</span> Write your <b>Queries</b> below</h4>
      </div>
      <div class="modal-body" >
        <div class="col-md-3 col-md-offset-5 col-xs-offset-4">
         <div id="loadbar_mess" style="display: none;">
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

      <div class="quiz" id="quiz_mess" data-toggle="buttons">
        <form class="form-group text-center">
        <textarea rows="5" class="form-control" id="query1" placeholder="Keep your query brief and to the point.
NOTE: please 'DO NOT' include any personal information such as email or contact number else question won't be entertained."  style="border-radius:0px;"></textarea><br>
           <span id="answer_mess"></span>
        <a onclick="query()"  name="q_answer" value="1" class="btn btn-lg btn-white " style="text-align:left;padding-top:10px"> <i class="glyphicon glyphicon-chevron-right modali"></i> Submit</a><br>
       </form>
      </div>
</div>

    </div>
    <div class="modal-footer text-muted">
   
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->







  <div class="modal fade bs-example-modal-md xf" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe_f">     
       <div class="modal-header">
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></button>

        <h4 class="text-center"><span class="label label-success" id="qid">Free 15m Session</span></h4>
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
        <a onclick="save_f('1')" type="radio" name="q_answer" value="1"> <label class="element-animation1 btn btn-lg btn-info btn-block"><span class="btn-label"><i class="glyphicon glyphicon-facetime-video"></i></span> Video Confrence</label></a><br>
        <a onclick="ask2()" type="radio" name="q_answer" value="1"> <label class="element-animation1 btn btn-lg btn-info btn-block"><span class="btn-label"><i class="glyphicon glyphicon-comment"></i></span> Ask Questions (FREE)</label></a>
        <!-- <a onclick="save_f('2')" type="radio" name="q_answer" value="1"> <label class="element-animation1 btn btn-lg btn-info btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> Phone Confrence</label></a> -->
       
      </div>
</div>

    </div>
     <div class="modal-footer" style="
    text-align: center;
">
   <?php echo '<p><b>NOTE:</b> Text Chat is also available in both modes, you can also text chat with '.$men.' along with appointment.</p>'; ?>
   </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<?php
}
?>

<!--
<div class="modal fade bs-example-modal-sm xu" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align:center;"><center><span>Are you a counsellor?</span><a href="http://c.ecounsellors.in" target="_blank">Sign Up</a></center></h4>
      </div>
      <div class="modal-body" style="min-height: 20px;">
        <center>
         <div class="row">
          <div class="col-lg-2"></div>

          <div class="col-xs-12 col-lg-8">
            <label>Phone:</label><input onkeypress="login()" class="btn-block ref" type="text" id="pho" value="+91" placeholder="Phone" >
           <a class="btn btn-primary btn-block" onclick="login()" style="border-radius: 29px;" title="Signup with facebook">
                
               <span class="fa fa-facebook mr1"></span> Sign in with Facebook
 
                
              </a>
              <div id="result"></div>
          </div>
          
          <div class="col-lg-2"></div>

        </div>
      </center>
     
    </div>

   
  </div><!-- /.modal-content 
</div>
</div>
-->







<script>
   
    </script>


<script src="/js/custom2.js"></script>
<script type="text/javascript">

$('#rev').removeClass('collapsed');

$(function() {

  $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});
    
<?php

if(isset($_SESSION['u_id']))
{

      if($_SESSION['next']=="ques")
    {
       echo '
        $(window).load(function(){
            $(".xq").modal("show");
        });';
    }

      if(($_SESSION['next']=="book"))
      {
      echo '
      setTimeout(function(){  



            $(".xt").modal("show");
        
    },500); 

    ';
      }
      if(($_SESSION['next']=="thank"))
      {
      echo '
      setTimeout(function(){  



             var b1=$("#thank");  
  $("html, body").animate({ scrollTop: b1.offset().top }, "slow");
        
    },0); 

    ';
      }
      else if(isset($_GET['log_f']))
      {
         echo '
        $(window).load(function(){
            $(".xf").modal("show");
        });';

      }
  unset($_SESSION['next']);
}


?>
</script>
  <script src="/js/bug.js"></script>

<?php




if(isset($_POST['sub'])||isset($_POST['sub_f']))
{

  $ph=$_POST['phone'];
  query("UPDATE u_users set phone='$ph' where u_id='$uid'");
    $cur="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if(isset($_POST['sub'])) 
    redirect($cur."&log");
  else
    redirect($cur."&log_f");

}
?>
