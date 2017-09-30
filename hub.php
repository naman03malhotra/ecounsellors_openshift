<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />


<?php
$title=str_replace('-', ' ', $_GET['c']);
include("includes/header.php");

?>

<style type="text/css">
  
 .touch{

    background-color: white;
    text-decoration: none;
    transition: all;
    transition-duration: 500ms;
}
    .touch:hover
{
    background-color: #f0f0f0;
}
            
.btn-new,
.btn-new:active,
.btn-new:hover{
                border-radius:0px;
           
                border:none;
                border-top:3px solid #25c1bc;
            }
.btn-new:hover{
             background-color:#20aaa6;
                    
             }

</style>
</head>
<body>

 <?php include("includes/nav.php");
 if($agent==1)
  include("includes/feed.php");
 if(isset($_GET['c']))
 {
 $c=str_replace('-', ' ', $_GET['c']);

 //$c=substr($cx, 0,3);
  

  {
  
    $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by no_slot desc,n_rat desc,avg_rat desc,f_fee asc,id desc");
  }

}

 else
 {
  


  {
    
    $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' order by no_slot desc,n_rat desc,avg_rat desc,f_fee asc,id desc");
  }


 }
 


 if(isset($_GET['c']))
 {
?> <script type="text/javascript">

        function sort(vx)
        {
             if (window.XMLHttpRequest)
             {
              xmlhttp=new XMLHttpRequest();
            }
            else
            {
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
              if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
              {

                //document.getElementById("loadbar").style.display="inline";
                //document.getElementById("quiz").style.display="none";
               // document.getElementById("mainframe").innerHTML='<img style="height: 340px;"src="images/loading4.gif">';

                   NProgress.start();
                     NProgress.set(0.4);


              }
              else if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                 NProgress.set(0.8);
                 NProgress.done();
                document.getElementById("mainframe").innerHTML= xmlhttp.responseText;
              }
            }
            var c=<?php echo "'".$c."'"; ?>;
            xmlhttp.open("GET","/ajax/sort.php?car="+c+"&q="+vx,true);
            xmlhttp.send();
            }



</script>

 <?php



}

else
{


?>

 <script type="text/javascript">
    function sort(vx)
        {
             if (window.XMLHttpRequest)
             {
              xmlhttp=new XMLHttpRequest();
            }
            else
            {
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
              if (xmlhttp.readyState==1||xmlhttp.readyState==2||xmlhttp.readyState==3)
              {

             
                 //document.getElementById("mainframe").innerHTML='<img style="height: 340px;"src="images/loading4.gif">';
                  NProgress.start();
                     NProgress.set(0.4);




              }
              else if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                   NProgress.set(0.8);
                 NProgress.done();
                document.getElementById("mainframe").innerHTML= xmlhttp.responseText;
              }
            }
            //var c=<?php echo "'".$c."'"; ?>;
            xmlhttp.open("GET","/ajax/sort.php?q="+vx,true);
            xmlhttp.send();
            }










</script>






<?php }?>



<?php

if(isset($_GET['sorry']))
{

?>




<script type="text/javascript">
  
 //  $.amaran({content:{message:'Sorry No Counsellor With that Name', color:'#e74c3c'}});
 $(document).ready( function () {
var random = function(items)
{
    return items[Math.floor(Math.random()*items.length)];
}
var inEffects = ['slideTop'];
var positions = ['bottom right'];

    $.amaran({
        'message'   :'Sorry No Counsellor With that ID',
        'position'  : random(positions) ,
        'inEffect'  : random(inEffects), 
         'delay'     :10000,
          color:'#e74c3c'
    });
});

</script>





<?php

}

?>







<style type="text/css">
  

  div::-webkit-scrollbar {
    width: 0.5em;

}
 
div::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
div::-webkit-scrollbar-thumb {
  background-color: #25b1cb ;
  
      border-radius:100px;

}
    hr {
    max-width: 50px;
    border-color: #1fa1b9;
    border-width: 3px;
}
.hrw{
max-width: 50px;
    border-color: #ffffff;
    border-width: 3px;
}
      .btn-white{
        color:#585858 !important;
        background:#fafafa;
        border:1px solid #dddddd;
        border-radius:0px;
        font-weight:lighter !important;
        font-size:14px !important;
        box-shadow:0px 0px 5px rgba(221, 221, 221, 0.63);
        transition:all;
        transition-duration:200ms;
        margin-bottom:20px;
        padding:5px;
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
</style>




<!--

<div class="gap" style="margin-bottom: 70px;"></div>
-->


<!--<img src="images/loading4.gif" style="display:none;">-->


<div class="container"  style="width:100%;">
    <div class="row text-center" style="padding:100px 10px 50px 10px;">
       <div style="color: #4e4e4e; font-family: 'Raleway',sans-serif;<?php if($agent==1) { echo 'font-size:20pt;';}?>">

        <?php 

        if(isset($c))
        {
            echo $c;
        }
      else

          echo 'Mentor\'s Hub';

          ?>

           <hr>
        </div>
     </div>

</div>
 <div class="container">


  <div class="row">


    <div class="col-md-4 col-sm-4 thumbnail newthumbnail text-center"   style="max-width: 370px; <?php if($agent==1){ echo 'z-index: 10;';} ?> " >
        <div class="text-center container-fluid"> 
            <h3>Sort by</h3><hr>
         <div class="input-group text-center col-md-offset-1 col-xs-offset-1">
            <div id="radioBtn" class="btn-group">
               
              <a onclick="sort('pri')" class="btn  btn-white" data-toggle="fun" data-title="P">Price</a>
              <a onclick="sort('dis')" class="btn  btn-white notActive" data-toggle="fun" data-title="D">Discount</a>
              <a onclick="sort('pop')" class="btn  btn-white notActive" data-toggle="fun" data-title="N">Popularity</a>
              <a onclick="sort('rec')" class="btn  btn-white notActive" data-toggle="fun" data-title="R">New</a>
            <!--  <a onclick="sort('free')" class="btn btn-suc btn-sm" data-toggle="fun" data-title="F" style="">FREE</a>-->
              
            </div>
            
          </div>
        </div>

      <h3 class="hidden-xs">Mentorship Options <hr></h3>
       
      <div class="list-group hidden-xs" style="
      text-align: left;height:205px;overflow-y: scroll;height: 205px;
      ">
           <!--<a class="list-group-item" href="/hub"><span class="fa fa-sign-in bleed pull-left"> </span><span >View All</span><span style="margin-left:5px;color: #25b1cb;" class="fa fa-chevron-right pull-right" ></span></a>-->
      <?php 
      mysqli_data_seek($qfields, 0);
    $yo =0;
         while($row_fields=mysqli_fetch_array($qfields))
         {
          if($yo<5)
          echo '<a class="list-group-item " style="border:none;border-radius:0px;border-bottom:2px solid #dddddd;"  href="/hub/'.preg_replace('/\s+/', '-', $row_fields['name']).'"><img src="/img/'.strtolower(substr($row_fields['name'], 0,3)).'b.png" class="pull-left" style="margin-right:10px;width:25px"> </img ><span >'.$row_fields['name'].'</span></a>';
          else
             echo '<a class="list-group-item " style="border:none;border-radius:0px;border-bottom:2px solid #dddddd;"  href="/hub/'.preg_replace('/\s+/', '-', $row_fields['name']).'"><img src="/icons/'.strtolower(substr($row_fields['name'], 0,3)).'.png" class="pull-left" style="margin-right:10px;width:25px"> </img ><span >'.$row_fields['name'].'</span></a>';

             $yo++;
             
         }
      ?>
     
    </div>
            
  </div>
      

  <div class="col-md-8 col-sm-8" >

<?php
//echo $_SERVER['REQUEST_URI'];
//echo $_SERVER['QUERY_STRING'];
?>


    <div class="row">
<script type="text/javascript">

</script>

      <div class="col-sm-12 col-lg-12 col-md-12">
      

     
            <style>
                .btn-group>a
                {
                    margin-right:10px;
                }
            .newthumbnail
    {
        border:none;
        box-shadow:none;
        border-radius:0px;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.15);
/*        border-bottom: 1px solid #dddddd;*/
/*        border-top:1px solid #dddddd;*/
        background-color:white;
    }
                 body{
        background-color:#fafafa;
    }
            </style>
        <div class="" id="mainframe">
          

<?php  include( 'card.php');
       
          ?>
       

      

        </div>
      </div>

     









     







      <div class="modal fade bs-example-modal-md xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" style="text-align:center;">Sign In/Sign Up</h4>
            </div>
            <div class="modal-body">
              <center>
               <div class="row">
                <div class="col-lg-2"></div>

                <div class="col-xs-6 col-lg-4">
                  <a href="#" class="btn btn-primary" >Login With Face
                  </a>
                </div>
                <div class="col-xs-6 col-lg-4">
                  <a href="#" class="btn btn-danger" style="<?php if($agent==1){ echo "width: 160px;";}?>">Login with Google   </a>
                </div>
                <div class="col-lg-2"></div>

              </div>
            </center><br>
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-login">
                  <div class="panel-heading">

                    <div class="row">
                      <div class="col-xs-6">
                        <a href="#" class="active" id="login-form-link">Sign In</a>
                      </div>
                      <div class="col-xs-6">
                        <a href="#" id="register-form-link">Sign Up</a>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">

                        <form id="login-form" action="#" method="" role="form" style="display: block;">
                          <div class="form-group">
                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                          </div>
                          <div class="form-group">
                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                          </div>
                          <div class="form-group text-center">
                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                            <label for="remember"> Remember Me</label>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="text-center">
                                  <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <form id="register-form" action="" method="post" role="form" style="display: none;">
                          <div class="form-group">
                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                          </div>
                          <div class="form-group">
                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                          </div>
                          <div class="form-group">

                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                          </div>
                          <div class="form-group">
                            <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
















  </div><!-- row -->




</div><!-- col-8 -->


</div><!-- row -->






</div><!-- conatiner-->











<?php include("includes/footer2.php");  ?>















</body>

</html>





<script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>



<script src="/js/main.js"></script>
  <script src="/js/bug.js"></script>
<script type="text/javascript">
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


  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})

</script>

                                          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
                                          <script>
                                              (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                              e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                              e.src='//www.google-analytics.com/analytics.js';
                                              r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                                              ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                                            </script>-->