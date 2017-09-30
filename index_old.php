

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta content="text/html; charset=UTF-8" http-equiv="content-type" />

<style type="text/css">

</style>

<title> Ecounsellors </title>
<link rel="shortcut icon" href="img/icon.png">
<?php
include("includes/header.php");
?>
<link rel="stylesheet" type="text/css" href="woo/engine1/style.css" />

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55bce04004651cc2" async="async"></script>


<style>

.btn:focus{
  outline: 0px auto -webkit-focus-ring-color !important;
    outline-offset: 0px !important;

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
 .modal-footer {
    text-align:center;
    
  }
  .refx{
        border: 1px solid #00BEF2;
  }
  .centered {
    text-align: center;
 margin:12% auto;
}
.begin{
      border-radius: 360px;
   
    
}
.hide{
  display: none !important;
}
.bleed{
  color: #00BEF2;
}
.input-group{
  margin: auto;

}
.input-group a{
  font-size: 20px;
}

@media (min-width: 992px){
.begin {
  font-size: 50px;
  }
  
}
@media (max-width: 500px){
  .begin{
    font-size: 30px;
  }
}
.about{

      line-height: 25px;
    color: #41484C;
}
.panel-title{
  color: #fff;
}
.panel-default>.panel-heading {
  background-color: rgb(0, 190, 242);
  }




.containerx {
  width:auto;
  background-color: black;
  margin: 0 auto;
  text-align: center;
  position: fixed;
  z-index: -1;
}
.containerx div {
  background-color: white;
  width: 100%;
  display: inline-block;
  display: none;
}

.preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #fff;
    z-index: 99999;
    height: 100%;
    width: 100%;
    overflow: hidden !important;
}

.status {
    width: 400px;
    height: 400px;
    position: absolute;
    left: 50%;
    top: 50%;
    background-image: url(images/load_f.gif);
    background-repeat: no-repeat;
    background-position: center;
    -webkit-background-size: cover;
            background-size: cover;
    margin: -20px 0 0 -20px;
    transform: translate(-50%, -50%);
}

#nprogress{
  z-index: 1000000;
  position: fixed;
}
#wowslider-container1 .ws_thumbs {
   
    height: 6.7em;
  }

  #wowslider-container1 .ws_thumbs a {
    max-width: 100px;
  }
  .info {
    padding: 0px;
  }
  .op{
    
    opacity: .85;

  }

  </style>
<body>
<script type="text/javascript">


 NProgress.start();
NProgress.set(0.4); 

jQuery(window).load(function() {


   NProgress.set(0.9); 
     NProgress.done();
        // will first fade out the loading animation


})



</script>
<?php 

  @session_start();
if(!isset($_SESSION['begin']))
{
 echo '<div class="preloader">
  <div class="status">&nbsp;
    </div>
 
  
  <h2 class="bleed text-center">Hold your breaths to experience the revolution!</h2>';
}
  ?>

</div>
    <script type="text/javascript">


   $(document).ready(function(e) {   
    // your code here
 

var currentIndex = 0,
  items = $('.containerx div'),
  itemAmt = items.length;

function cycleItems() {
  var item = $('.containerx div').eq(currentIndex);
  items.hide();
  item.css('display','inline-block');
}

var autoSlide = setInterval(function() {
  currentIndex += 1;
  if (currentIndex > itemAmt - 1) {
    currentIndex = 0;
  }
  cycleItems();
}, 150);


});

  </script>
<?php


 if(!($_SESSION['u_id']) and !isset($_SESSION['begin'])) { ?>

<div class="begin2">

 <div class="containerx">
    <div style="display: inline-block;">
      <img class="img-responsive" src="img/lets/red0.png"/>
    </div>
  <?php
for($i=1;$i<30;$i++)
{
   echo '<div>
      <img class="img-responsive" src="img/lets/red'.$i.'.png"/>
    </div>';
  }
  ?>
    
  </div>


  <img src="img/icon3.png" style="display:none;">
<div class="thumbnail text-center op">
  <h2 class="bleed">Get Expert advise before you make any life changing decision, in the following fields.</h2>
  <p class="text-center">
 <div class="input-group">
            <div id="radioBtn" class="btn-group">
               
              <a class="btn btn-info btn-sm" data-toggle="fun" data-title="P">Career</a>
              <a class="btn btn-info btn-sm notActive" data-toggle="fun" data-title="D">Relationship</a>
              <a class="btn btn-info btn-sm notActive" data-toggle="fun" data-title="N">Health</a>
               <a class="btn btn-info btn-sm notActive" data-toggle="fun" data-title="N">Legal</a>
        
             
              <a class="btn btn-info btn-sm notActive" data-toggle="fun" data-title="N">Finance</a>
            
              
            </div>
            
          </div>
</div>
</p>
<br>
<br>
<p class="text-center"><button class="btn btn-info btn-lg begin centered animated infinite pulse" onmouseleave="img2()" onmouseover="img()" onclick="show()" style="opacity:0.85;">
<img src="img/icon.png" class="imgx"  style="height: 120px;">

  Let's Begin</button></p>
</div>

<?php }


?>
<div class="x">

 <?php include("includes/nav.php"); 
  include("includes/feed.php");




  ?>


<?php if(!isset($_SESSION['u_id']) and !isset($_SESSION['begin'])) {?>


<script type="text/javascript">

function img()
{
  $('.imgx').attr('src','img/icon3.png');
}
function img2()
{
  $('.imgx').attr('src','img/icon.png');
}
function show(){
    var bdy=$('.x');
  bdy.show();
  var but=$('.begin');
  var but2=$('.begin2');
  but.hide();
  but2.hide();
  tawk();
  

}
$(document).ready()
{
  var bdy=$('.x');
  bdy.hide();
  var twak=$('#tawkchat-iframe-container');
  twak.addClass('hide');
}
  function load()
  {
    var nav=$('.navbar');
    nav.addClass('animated bounceInDown');

  }
  load();
tawk();
</script>

<?php }
else{

?>


<script type="text/javascript">

tawk();
  var bdy=$('.x');
  bdy.show();
  var but=$('.begin');
  var but2=$('.begin2');
  but.hide();
  but2.hide();

  function load()
  {
    var nav=$('.navbar');
    nav.addClass('animated bounceInDown');

  }
  load();
  
</script>


<?php 

}

?>


<script type="text/javascript">
  
$(window).scroll(function () {
    var scrollh = $(this).scrollTop();
    if (scrollh == 0) {
        $(".navbar").css({
            'opacity':'1',
        });
    } else {
        $(".navbar").css({
            'opacity':'0.9',
        });
    }
});

</script>


 <?php
 if(isset($_GET['sorry']))
 {
   echo "<script type=\"text/javascript\">
 
 $.amaran({content:{message:'Please enable emailid access for 3rd party Apps over Facebook', color:'#e74c3c'},sticky:true});

   </script>";


 

 }

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
                        message  :'<h3>You Earned 50 credits for Signing Up</h3>',

                    
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


function login()
{
 

 var keyPressed = event.keyCode || event.which;
 if(keyPressed==13 || keyPressed==1)
 {

 var ph= document.getElementById('pho');

 if(ph.value!='')
 {
  
      if(ph.value.length<11)
      {
               document.getElementById('result').innerHTML="<br><p class='err bg-danger'>Plz Enter Mobile Number With Country Code</p>"

      }
      else if(isNaN(ph.value))
      {
                       document.getElementById('result').innerHTML="<br><p class='err bg-danger'>Invalid Phone Number</p>"

      }
     else
      {
                window.location='auth?ph='+ph.value+'';
      }
 }
 else
   {
    ph.focus();
     document.getElementById('result').innerHTML="<br><p class='err bg-danger'>Please Enter Phone Number</p>"
   }


}

}
</script>



 <nav class="navbar navbar-default navbar-fixed animated bounceInDown" style="
 margin-top: 50px;
 ">
 <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header hidden-md">
    <center>
    <?php if($agent==0){

if(!$_SESSION['u_id'])
{
   echo '<button type="submit" class="btn btn-block btn-info refx ref animated bounceInDown" data-toggle="modal" data-target=".xt" style="margin-top:8px;">Sign Up/Log In</button></li>';
 }
 else
 {
     echo '<a href="profile" type="submit" class="btn btn-info btn-sm" style="margin-top:8px;">View Profile</a>&nbsp;<a href="appointments" type="submit" class="btn btn-info btn-sm" style="margin-top:8px;">Appointments</a></li>';

 }

}
   ?></center>
  </div>


  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

       <!--  <form class="navbar-form navbar-left" role="search">
     <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->


      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form class="navbar-form " role="form" style="text-align: center;">
           <div class="form-group">
<?php
if(!$_SESSION['u_id']){
  echo '';
 echo '<button type="button" class="btn btn-block btn-md btn-info ti refx ref animated bounceInDown" data-toggle="modal" data-target=".xt" style="width:500px;">Sign Up/Log In</button></li>';
}
else
{
  echo '<a href="profile" type="button" class="btn btn-sm btn-info ti" style="width:100px;">View Profile</a>&nbsp;<a href="appointments" type="button" class="btn btn-sm btn-info ti">Appointments</a></li>';

}
?>






           </form>
         </div>
       </div>

     </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
 </nav>


<style type="text/css">
  .list-group a{
    text-align: left;
    //margin-left: 20px;
    //margin-right: 20px;
  }
  .list-group p{
    //margin-left: 20px;
    margin-bottom: 0px;
  }
.dropdown-submenu {
    position: relative;
    list-style-type:none;
}

.dropdown-submenu>.dropdown-menu {
    //top: 0;
    left: 20%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

//.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
.col-md-3{
  z-index: 1000;
}
</style>



 <div class="container">



  <div class="row">


    <div class="col-md-3 animated bounceInLeft"    <?php if($agent==1){ echo 'style="position: fixed;"';} ?>  >

      <p class="list-group-item" style="background-color: #00bef2;color: white;font-size: x-large;text-align: center;">Counselling Options
      </p>
      <div class="list-group" style="text-align: center;">
        








            <!--  <div class="panel-group" id="accordionx">
                <div class="panel panel-default" >
                  <div class="panel-heading" >
                    <h4 class="panel-title" >
                      <a data-toggle="collapse" data-parent="#accordionx" href="#collapseOnexyz">
                       <h1 style="text-align:center;color:#00bef2;">Legal<i class="indicator fa fa-angle-down  pull-right"></i></h1>
                     </a>
                   </h4>
                 </div>
                 <div id="collapseOnexyz" class="panel-collapse collapse in">
                  <div class="panel-body">
      

        <a href="hub?c=career" class="list-group-item">Career<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
               <a href="hub?c=finance" class="list-group-item">Finance<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>

        <a href="hub?c=relationship" class="list-group-item">Relationship<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-heart" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
           
                     <a href="hub?c=fit" class="list-group-item">Health & Fitness<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
                            <a href="hub?c=stress" class="list-group-item">Stress & Depression<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>



       

                  </div>




                </div>

              </div> 


            </div>


      </div>  -->








        <li class="dropdown-submenu">
           <a href="hub?c=law" tabindex="-1" class="list-group-item"><p>Law<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></p></a>


                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="#">Second level</a></li>
                  <li class="dropdown-submenu">
                    <a href="#">Even More..</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">3rd level</a></li>
                      <li><a href="#">3rd level</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Second level</a></li>
                  <li><a href="#">Second level</a></li>
                </ul>
              </li>


        <a href="hub?c=career" class="list-group-item">Career<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
               <a href="hub?c=finance" class="list-group-item">Finance<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>

        <a href="hub?c=relationship" class="list-group-item">Relationship<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-heart" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
           
                     <a href="hub?c=fit" class="list-group-item">Health & Fitness<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>
                            <a href="hub?c=stress" class="list-group-item">Stress & Depression<span style="margin-left:5px;color: #00bef2;" class="glyphicon glyphicon-book" ></span><span style="margin-left:5px;color: #00bef2;" class="fa fa-chevron-right pull-right" ></span></a>





      </div>
    </div>
<div class="col-md-1"></div>
    <div class="col-md-8" style="float: right;">


      <div class="row animated bounceInUp">
  
<div class="col-md-12">
   <div class="thumbnail" style="padding: 0px;"> 


  <div id="wowslider-container1">
  <div class="ws_images"><ul>
    <li><img src="img/main/raw/intro.png" alt="09" title="Intro" id="wows1_0"/></li>
    <li><img src="img/main/raw/car.png" alt="01" title="Career" id="wows1_1"/></li>
    <li><img src="img/main/raw/fin.png" alt="02" title="Finance" id="wows1_2"/></li>
    <li><img src="img/main/raw/rel.png" alt="06" title="Relationship" id="wows1_3"/></li>
    <li><img src="img/main/raw/car2.png" alt="07" title="Confused?" id="wows1_4"/></li>
     <li><img src="img/main/raw/law.png" alt="07" title="Law" id="wows1_4"/></li>
      <li><img src="img/main/raw/health.png" alt="07" title="Health" id="wows1_4"/></li>

  
   
  </ul></div>
  <div class="ws_thumbs"><div>
    <a href="http://ecounsellors.in" title="09"><img src="img/main/thumb/intro.png" alt="09"/>1</a>
    <a href="#" title="01"><img src="img/main/thumb/car.png" alt="01"/>2</a>
    <a href="#" title="02"><img src="img/main/thumb/fin.png" alt="02"/>3</a>
    <a href="#" title="06"><img src="img/main/thumb/rel.png" alt="06"/>4</a>
    <a href="#" title="07"><img src="img/main/thumb/car2.png" alt="07"/>5</a>
     <a href="#" title="07"><img src="img/main/thumb/law.png" alt="07"/>6</a>
      <a href="#" title="07"><img src="img/main/thumb/health.png" alt="07"/>7</a>
   
  
 
  </div></div>
  <div class="ws_shadow"></div>
  </div>  
  <script type="text/javascript" src="woo/engine1/wowslider.js"></script>
  <script type="text/javascript" src="woo/engine1/script.js" ></script>
</div>

</div>
</div>



<div class="row ">
  
<div class="col-md-12">





        <div class="thumbnail animated bounceInRight" >   
             <div class="well" style="width:100%;color: white; background-image: linear-gradient(to bottom,#00BEF2 0,#00BEF2 100%);text-align:center;<?php if($agent==1) { echo 'font-size: x-large;';}?>">5 Steps To Happiness</div>

          <div class="row" style="text-align:center;">

              <!--<div class="col-md-3" style="margin:10px;">
                <img  src="http://placehold.it/180x180" alt="">

              </div>-->
              <div class="col-md-12 col-xs-12" style="text-align:left;">
               <div class="info">

                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" width="721" height="315" src="https://www.youtube.com/embed/h1-9r5M9tzU?rel=0" frameborder="0" allowfullscreen></iframe>

                </div>  <div id="about"></div>

              
              </div>              

            </div>
          </div>

        </div>




         <div class="thumbnail animated bounceInDown">   

 <div class="panel-group" id="accordion">
  <div class="panel panel-default" >
    <div class="panel-heading" >
      <center><h4 class="panel-title" >
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
       About Our Mission <span style="" class="fa fa-chevron-down pull-right" ></span>
       </a>
      </h4></center>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="thumbnail info">
        <h4 class="text-center about"> Ecounsellors is an online portal whose aim is to ensure that no single person walks with a drooping face and to turn every frown into a big smile. Ecounsellors provides quality yet affordable counselling sessions with experts just being a click away. We provide online video sessions, phone sessions and at-your-doorstep counselling sessions so that you can solve all your problems sitting at home saving your time and energy. Our sessions touch a variety of topics like relationship, career, nutritional and legal consultancy. From all over the country, we have brought together highly qualified and reputed counsellors to provide you with unmatched counselling and advice. We have a provision for trial counselling sessions so that you can evaluate your compatibility with different counsellors and then choose for yourself.<br><br>
To help you choose the best counsellor for yourself we also have a user rating system using which you can read the reviews and check the rating of a particular counsellor given to him/her by his/her clients. Ecounsellors also boasts of a hassle free appointment system which takes away your worries of trying to fit in a counselling session in your busy schedule. We promise to maintain the privacy of your session and guarantee confidentiality and anonymity. We wish to make counselling and consultancy services accessible to each and every individual easily.<br><br>
 While the first act of inducing self-destructive habits is not recommended to anyone, seeking professional help is something you can choose no matter how small or how big the issue. We often fail to realize the gravity of an issue initially. Recognizing the issues and tackling them in correct time is important and for that we need you to trust in us and realize that we are working for a better tomorrow and a better you.

</h4>
        
      </div>
      </div>
    </div>
  </div>
</div>


        </div>




  
  

</div>

</div>


     <!-- <div class="row"><br><br>
        <div class="thumbnail">
          <div class="btn btn-info btn-block btn-circle">Our Top Counsellors</div><br>
         <div class="list-group">
          <a href="counsellor" class="list-group-item card">
            <div class="media col-md-3">
              <figure class="pull-left">
                <img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x350" alt="placehold.it/350x250" >
              </figure>
            </div>
            <div class="col-md-6">
              <h4 class="list-group-item-heading" style="color:#00bef2;"> First Consellor </h4>
              <p class="list-group-item-text"> Qui diam libris ei, vidisse incorrupte at mel. His euismod salutandi dissentiunt eu. Habeo offendit ea mea. Nostro blandit sea ea, viris timeam molestiae an has. At nisl platonem eum. 
                Vel et nonumy gubergren, ad has tota facilis probatus. Ea legere legimus tibique cum, sale tantas vim ea, eu vivendo expetendis vim. Voluptua vituperatoribus et mel, ius no elitr deserunt mediocrem. Mea facilisi torquatos ad.
              </p>
            </div>
            <div class="col-md-3 text-center">
              <h2> 14240 <small> views </small></h2>
              <button type="button" class="btn btn-info btn-lg btn-block"> Book Now! </button>
              <div class="stars">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <p> Average 4.5 <small> / </small> 5 </p>
            </div>
          </a>




          <a href="counsellor" class="list-group-item card">
            <div class="media col-md-3">
              <figure class="pull-left">
                <img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x350" alt="placehold.it/350x250" >
              </figure>
            </div>
            <div class="col-md-6">
              <h4 class="list-group-item-heading" style="color:#00bef2;"> First Consellor </h4>
              <p class="list-group-item-text"> Qui diam libris ei, vidisse incorrupte at mel. His euismod salutandi dissentiunt eu. Habeo offendit ea mea. Nostro blandit sea ea, viris timeam molestiae an has. At nisl platonem eum. 
                Vel et nonumy gubergren, ad has tota facilis probatus. Ea legere legimus tibique cum, sale tantas vim ea, eu vivendo expetendis vim. Voluptua vituperatoribus et mel, ius no elitr deserunt mediocrem. Mea facilisi torquatos ad.
              </p>
            </div>
            <div class="col-md-3 text-center">
              <h2> 14240 <small> views </small></h2>
              <button type="button" class="btn btn-info btn-lg btn-block"> Book Now! </button>
              <div class="stars">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <p> Average 4.5 <small> / </small> 5 </p>
            </div>
          </a>


          <a href="#" class="list-group-item card">
            <div class="col-md-3">
              <figure class="pull-left">
                <img class="media-object img-rounded img-responsive"  src="http://placehold.it/350x350" alt="placehold.it/350x350" >
              </figure>
            </div>
            <div class="col-md-6">
              <h4 class="list-group-item-heading" style="color:#00bef2;"> First Consellor </h4>
              <p class="list-group-item-text"> Qui diam libris ei, vidisse incorrupte at mel. His euismod salutandi dissentiunt eu. Habeo offendit ea mea. Nostro blandit sea ea, viris timeam molestiae an has. At nisl platonem eum. 
                Vel et nonumy gubergren, ad has tota facilis probatus. Ea legere legimus tibique cum, sale tantas vim ea, eu vivendo expetendis vim. Voluptua vituperatoribus et mel, ius no elitr deserunt mediocrem. Mea facilisi torquatos ad.
              </p>
            </div>
            <div class="col-md-3 text-center">
              <h2> 14240 <small> views </small></h2>
              <button type="button" class="btn btn-info btn-lg btn-block"> Book Now! </button>
              <div class="stars">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
              </div>
              <p> Average 4.5 <small> / </small> 5 </p>
            </div>
          </a>

        </div>


      </div>

    </div> -->







   <section class="footer animated bounceInDown" id="contact">
  <div class="thumbnail" >
<?php
if(!isset($_POST['msg']))
{
?>

    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <h2 class="section-heading" style="
    color: white;
    background-color: rgb(0, 190, 242);border-radius: 4px;
">Let's Get In Touch!</h2>
        <hr class="primary">

        <form class="form-group" action="#contact" method="post">
          <div class="row">
            <div class="col-md-6"> 


              <input type="text" class="form-control" required name="name" value="<?php  if($_SESSION['u_id']){ echo $rowu['name']; }?>" placeholder="Full Name">

            </div>

            <div class="col-md-6">
              <input type="email" class="form-control" required name="emailid" value="<?php  if($_SESSION['u_id']){ echo $rowu['emailid']; }?>" placeholder="Email">
            </div>
          </div><br>

          <div class="row">

            <div class="col-md-12">
             <input type="text" name="subject" required class="form-control" placeholder="Subject">
           </div>
         </div><br>

         <div class="row">

            <div class="col-md-12">
             <textarea type="text" rows="5" name="message" required class="form-control" placeholder="Message"></textarea>
           </div>
         </div><br>

         <button type="submit" class="btn btn-info" name="msg" style="">Send Message</button>

       </form>


       <div class="col-lg-4 col-lg-offset-2 text-center">
        <i class="fa fa-phone fa-3x wow bounceIn"></i>
        <p>123-456-6789</p>
      </div>
      <div class="col-lg-4 text-center">
        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
        <p><a href="mailto:care@ecounsellors.in">care@ecounsellors.in</a></p>
      </div>
    </div>

    <div>

    </div>


<?php
}
if(isset($_POST['msg']))
          {
                require_once('mail.php');
                $name=$_POST['name'];
                $headers = $_POST['emailid'];
                $subject=$_POST['subject'];

                $emailid = "care@ecounsellors.in";
                $message = $_POST['message'];

                mailman($emailid, $subject, $message, "User Support",$headers,$name);


                echo '<h3 style="font-size:35px;text-align:center;">Message sent successfully.<p>We will get back to you shortly.</p></h3>';
          }

?>



  </div>
</section>






  </div><!-- col-8 -->


</div><!-- row -->






</div><!-- conatiner-->






<footer class="footer-distributed">

      <div class="footer-right">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>

      </div>

      <div class="footer-left">

        <p class="footer-links">
          <a href="/">Home</a>
          ·
          <a href="#">Terms and conditions</a>
          ·
          <a href="/#about">About us</a>
          ·
          <a href="explore">Faq</a>
          ·
          <a href="/#contact">Contact us</a>
        </p>

        <p>&copy; 2015 Ecounsellors.in All rights reserved.</p>
      </div>

    </footer>


<!--

<footer class="footer" style="background-color:#fff; height:50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2" style="text-align:center;margin-top:10px;">
                    &copy; 2015 Ecounsellors.in All rights reserved.

          </div> 
        </div>

      </div>
    </footer>
-->


         <script type="text/javascript">
      $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
});

      </script>



<script type="text/javascript">

function tawk(){
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/55944f300c6a65fa4a22ed10/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
}


</script>



<script type="text/javascript">
  



</script>





<div class="modal fade bs-example-modal-sm xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align:center;"><center><span>Are you a counsellor?</span><a href="http://c.ecounsellors.in" target="_blank">Sign Up</a></center></h4>
      </div>
      <div class="modal-body" style="min-height: 20px;">
        <center>
         	<div class="row">
          		<div class="col-lg-2"></div>

          		<div class="col-xs-12 col-lg-8">
            		<label>Phone:</label><input autofocus onkeypress="login()" class="btn-block ref" type="text" id="pho" value="+91" placeholder="Phone" >
           			<a class="btn btn-primary btn-block" onclick="login()" style="border-radius: 29px;" title="Signup with facebook">
                
               			<span class="fa fa-facebook mr1"></span> Sign in with Facebook
 					</a>
 					<a class="btn btn-primary btn-danger btn-block" onclick="login()" style="border-radius: 29px;" title="Signup with google+">
                
               			<span class='fa fa-google-plus'></span> Sign in with Google+
 					</a>
              		<div id="result"></div>
              	
          
          			<div class="col-lg-2"></div>

        		</div>
      	</center>
     
    </div>



   
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->






</div>

</body>

</html>






<script src="js/vendor/bootstrap.min.js" async="async"></script>

<script src="js/main.js" async="async"></script>
<script src="js/custom.js" async="async"></script>
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
<?php


if(!$_SESSION['u_id'])
{
  if(isset($_GET['lo']))
  {
  echo '<script type="text/javascript">
    $(window).load(function(){
        $(".xt").modal("show");
    });
</script>';
}
}


?>




      <script type="text/javascript">
      $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

      </script>

  <script src="js/bug.js"></script>

<script type="text/javascript">
  

  <?php
if(isset($_SESSION['u_id']) or isset($_SESSION['begin']))
{
  echo 'tawk();';
}
$_SESSION['begin']="true";
?>



$(document).ready(function(){

  jQuery(".status").delay(2500).fadeOut("slow");
        // will fade out the whole DIV that covers the website.

  jQuery(".preloader").delay(3500).fadeOut("slow");
});
</script>
