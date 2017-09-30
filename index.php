<!DOCTYPE html>
<html lang="en">


<?php  include('includes/header.php'); ?>




      
    
 <script type="text/javascript">
  
<?php
$currentpage = $_SERVER['PHP_SELF'];
echo 'var curr="'.$currentpage.'";';

  $qfields=query("SELECT * from fields where active=1 order by order_by");

?>

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


 <?php

if($_GET['next']=="book")
{
  $_SESSION['next']="book";
}
else if($_GET['next']=="ques")
{
  $_SESSION['next']="ques";
}
else if($_GET['next']=="thank")
{
  $_SESSION['next']="thank";
}


if(isset($_GET['ca']))
{
  $_SESSION['ca']=$_GET['ca'];
}
if(isset($_GET['eic']))
{
  $_SESSION['eic']=$_GET['eic'];
}
?>

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
#pho {
  font-size:24px;font-family:"open-sans",sans-serif;
}
</style>



   <?php 
     if(!$_SESSION['u_id'])
     {

     ?>
            <!------------------------------ NEW MODAL --------------------------- -->


<div class="modal fade bs-example-modal-sm xt login" id="myModal" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
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
              echo '<span class="input-group-addon" id="basic-addon1"><span class="fa fa-phone"></span></span><input autofocus onKeyDown="login(event,0)" class="btn-block loginx" type="text" id="pho" value="'.$_COOKIE["phone"].'" placeholder="Phone" >';
            }
            else
            {
            echo '<span class="input-group-addon" id="basic-addon1"><span class="fa fa-phone"></span></span><input autofocus onKeyDown="login(event,0)" class="btn-block loginx" type="text" id="pho" value="+91" placeholder="Phone" >';
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
   <div class="modal-footer">
   </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

     <?php } ?>

                                   
<?php


if(!$_SESSION['u_id'])
{


  echo '<script>
  function click_log()
  {
     $(".xt").modal("show");
  }

  </script>';
  if(isset($_GET['lo']))
  {
  echo '<script type="text/javascript">
    $(window).load(function(){
        $(".xt").modal("show");
    });
</script>';
}
}



if(isset($_GET['access-denied']))
{

  echo '<script type="text/javascript">alert("Please provide access to ecounsellors.in while you login.")</script>';
}



//include("includes/nav.php"); 

 if($agent==1)
 { 
  //include("includes/feed.php");
}
if(isset($_GET['sorry']))
 {
   echo "<script type=\"text/javascript\">
 
 $.amaran({content:{message:'Please enable emailid access for 3rd party Apps over Facebook', color:'#e74c3c'},sticky:true});

   </script>";


 

 }

?>




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
 #mySearch{
      
      
     
    }
    .ui-state-focus {
      background: rgba(37, 177, 203, 0.85) !important;
      color: white !important;
    border:none;
    }
    .ui-widget-content {
    border:none;
   background:transparent;
      /*margin-left: -10px;*/
    }
    .search-icon {
      /*position: absolute;
        font-size: 0;
        white-space: nowrap;
        right: 45px;
        top: 4px;
        bottom: 0;*/
    }
  

   .ui-menu .ui-menu-item {
    position: relative;
       font-familiy:'OpenSans',sans-serif;
    background-color:transparent;
    border:none;
    color:white;
    margin: 0;
    padding: 10px 2em 10px 1.4em;
    cursor: pointer;
       transition:all;
       transition-duration:399ms;
/*
   border-right: 1px solid #00bef2;
    border-left: 1px solid #00bef2;
     border-bottom: 1px solid #A8C3C8; 
    border-top: 1px solid #A8C3C8;
*/
    
  }
    .ui-menu-item:hover{
      background: rgba(35, 142, 162, 0.73);
    }
    .ui-menu-item:nth-child(even){
        background:rgba(37, 177, 203, 0.69);
    }
    .ui-menu-item:nth-child(odd) {background: rgba(35, 142, 162, 0.73)}
    .bg-primary{
    color:rgba(128, 0, 0, 0.62);
    background: transparent;
    padding: 10px;
/*    border: 1px solid #800000;*/
}
</style>


<script type="text/javascript">
  



            <?php 
            $cnt=0;
            $arr=array();
            //$qfields=query("SELECT * from fields where active='1'");
            mysqli_data_seek($qfields, 0);
              $qmentor= query("SELECT * from c_userdata where verifyf='1' and timet='1' order by n_rat desc,avg_rat desc,id desc");
             $q_org= query("SELECT * from f_org");



             while($row_fields=mysqli_fetch_array($qfields))
            {
              $arr[$cnt]=$row_fields['name'];
              $stu[$cnt]->label=$row_fields['name'];
              $stu[$cnt]->value='/hub/'.preg_replace('/\s+/', '-', $row_fields['name']).'';
              $cnt++;

            }

            $cnt2=0;
            $top_arr=  array();

              while($row_fields=mysqli_fetch_array($qmentor))
            {
             // $arr[$cnt]=$row_fields['name'];
              $name=$row_fields['fname'].' '.$row_fields['lname'];
              
              if($row_fields['men']==1)
              {
                $men="mentor";
              }
              else
              {
                $men="counsellor";
              }
              $stu[$cnt]->label=$name;
              $stu[$cnt]->value='/'.$men.'/'.preg_replace('/\s+/', '-', $name).'/'.$row_fields['sub_id'].'';
              $stu[$cnt]->avg_rat=$row_fields['avg_rat'];
              $stu[$cnt]->n_rat=$row_fields['n_rat'];

              if($cnt2<8)
              {
              $top_arr[$cnt2]->label=$name;
              $top_arr[$cnt2]->value='/'.$men.'/'.preg_replace('/\s+/', '-', $name).'/'.$row_fields['sub_id'].'';
              $top_arr[$cnt2]->avg_rat=$row_fields['avg_rat'];
              $top_arr[$cnt2]->n_rat=$row_fields['n_rat'];
              $top_arr[$cnt2]->pic=$row_fields['propic_file'];
              $top_arr[$cnt2]->tag=explode(",",$row_fields['typec'])[0];
            
              $cnt2++;
          	  }

               $cnt++;

            }
           

            while($row_fields=mysqli_fetch_array($q_org))
            {
             
              $stu[$cnt]->label=$row_fields['name'];
              $stu[$cnt]->value='/hub/'.preg_replace('/\s+/', '-', $row_fields['name']).'';
              $cnt++;

            }
            echo 'var couns='.json_encode($stu).';';
            echo 'var top_mentor='.json_encode($top_arr).';';

            ?>


       $(function() {
       	

            
            $("#search-form").submit(function(e) {

            var url = "/ajax/search.php"; 
            var search_data= $('#mySearch').val();
            var x="search_inp="+search_data;
            if(search_data=="")
            {
              alert("No query entered in search.");
              return false;
            }
            else
            {
               window.open('https://www.google.co.in/#q=site:ecounsellors.in+'+encodeURIComponent(search_data).replace(/%20/g,'+'),'_blank');

              
            }

           $.ajax({
                   type: "POST",
                   url: url,
                   data: x, 
                   success: function(data)
                   {
                      //window.location='https://www.google.co.in/#q=site:ecounsellors.in+'+encodeURIComponent(search_data).replace(/%20/g,'+');
                        //window.open('https://www.google.co.in/#q=site:ecounsellors.in+'+x,'_blank');
                       //console.log(x);
                       // console.log(search_data);
                   }
                 });


             e.preventDefault(); 
          });

           });


         $(function() {
           
      
        $("#mySearch").autocomplete({
            source: couns,
            minLength: 2,
        focus: function (event, ui) {
          $(event.target).val(ui.item.label);
          
          return false;
        },
        select: function (event, ui) {
          $(event.target).val(ui.item.label);

          if((ui.item.label)!="")
          window.location = ui.item.value;
      
          return false;
        }
      });
      $('#mySearch').focus(function(){            
              //$("#mySearch").css("border", "solid 1px #00bef2");
              if (this.value == "")
                {
                   // $(this).autocomplete("search");
                }
          });
      });
        $(document).ready(function(){
            var a = $(document).scrollTop();
            /*if(a > 200){
            $(".navbar").css("background-color","rgba(0,0, 0, 1)");
               
            }*/
    });
    </script>
 



 

   
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">


    <?php 
    include('includes/nav.php');

    ?>

    <header id="particles">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Connecting to your future selves</h1>
                <hr>
                <h5>Ecounsellors is a mentoring platform to connect to mentors through video, audio and chat across domains.</h5><br>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <form id="search-form"> 
               
                    <div class="input-group" style="width: 100%">
                        <input type="text" class="form-control search-form " name="search_inp" placeholder="Search for mentors, organizations and services..." id="mySearch">  <span class="input-group-btn">
                        <button class="btn btn-sch" type="submit" id="search-btn">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
<!--
                        <span class="input-group-btn">
                          <span class="fa fa-search"></span></button>
                        </span>
-->
                    </div>
                   
                 </form> 
<!--
                <div class="thumbnail search-tub">
                    <ul class="nav nav-pills nav-justified">
                        <li role="presentation"><a href="#">Internships</a></li>
                        <li role="presentation"><a href="#">MBA</a></li>
                        <li role="presentation"><a href="#">IIM</a></li>
                        <li role="presentation"><a href="#">Google</a></li>
                    </ul>
                </div>
-->
                    <div class="container mentorship-box text-center" style="max-width:700px;">
                        <div class="owl-carousel" id="owl-mentorship">
<?php

                           for($i=0;$i<5;$i++)
				               {          
				                   
				        


				             echo '<div class="item mentorship-option" >
                                   <div class="text-center">
                            	   <a href="hub/'.preg_replace('/\s+/', '-', $arr[$i]).'" >  <img  src="img/'.strtolower(substr($arr[$i], 0,3)).'.png" title="'.$arr[$i].'" width="100px" height="100px"></div></a>
                             	   <p  style="color:white">'.strtok($arr[$i], ",").'</p>
                                   </div>';      
				          }
          ?>

                             

                              
                    </div>
            </div>
<!--
        
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
-->
             
        </div>
    </header>
    <style>
        .search-tub{
            margin:0;
            width: 100%;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 0px;
            background-color:#f2f2f2;
            transition-duration: 1s;
            opacity: 0;
            transition: all;
            
        }
        
        .opac{
            opacity: 1;
            transition-duration: 500ms;
         
            transition: all;
            
        }
        .nav-pills > li >a{
            padding: 3px;
            background-color: #ffffff;
            border-top:2px solid #25b1cb;
            border-radius: 0px;
            margin-left: 6px;
            margin-right: 6px;
            color:#25b1cb;
            
        }
        #particles{
           
            width: 100%;
            margin: 0px;
            padding: 0px;
        }
        canvas{
            position: absolute;
        }
        .btn-sch,.btn-sch:hover,.btn-sch:visited,.btn-sch:active,.btn-sch:focus{
            height: 50px;
    width: 60px;
            color:white !important;
            background:transparent;
             border-top: 3px solid white !important;
    border-right: 3px solid white !important;
    border-bottom: 3px solid white !important;
    background-color: rgba(255, 255, 255, 0.12) !important;
        }
       
    </style>
<!--
<div class="container-fluid" style="background:#25b1cb;color:white;padding:0px;">
<div id="particles">
  <div class="contianer-fluid text-center" style="postion:relative;padding:50px;">
    <h1>Welcome to ecounsellors</h1>
      <hr class="hrw">
    <p>A JavaScript plugin for snazzy background particle systems</p>
    
  </div>
</div>
    </div>
-->
        
	<div class="container-fluid mentor text-center " style="width:100%">
			<h3 style="margin:5px;color: #444444;">Organizations</h3>
        <div class="col-md-10 col-md-offset-1 " id="owl-org-master"> 
<!--
			<div class="owl-carousel owl-theme" style="" id="owl-orgs">
<div class=" text-center  item"> <div class="text-center"><img src="img/org1.png " style="max-width:150px"></div></div>		<div class=" text-center  item"> <div class="text-center"><img  src="img/org2.png " style="max-width:150px"></div></div>	
                <div class=" text-center  item"> <div class="text-center"><img  src="img/org3.png " style="max-width:150px"></div></div>	<div class=" text-center  item"> <div class="text-center"><img  src="img/org4.png " style="max-width:150px"></div></div>	<div class=" text-center  item"> <div class="text-center"><img  src="img/org5.png " style="max-width:150px"></div></div>	<div class=" text-center  item"> <div class="text-center"><img src="img/org6.png " style="max-width:150px"></div></div>
			

			</div>
-->
			</div>
	</div>
        <script>
            var i=1;
            var org_data= ["Deloitte","Goldman-Sachs","Google","Samsung","Amazon","Adobe"];
            $("#owl-org-master").append("<div class='owl-carousel owl-theme' id='owl-orgs'>");
            for(i=1;i<7;i++){
                var start = '<div class=" text-center  item"> <div class="text-center"><a href="/hub/'+org_data[i-1]+'" title="'+org_data[i-1]+'"><img src="/img/org'+i+'.png " style="max-width:150px"></a></div></div>';
                $('#owl-orgs').append(start);
            }
                $('#owl-orgs').append('</div>');                      
        </script>
    <section id="howitworks"  data-wow-offset="0" data-wow-duration="2s" data-wow-delay="0s">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">How <strong>ecounsellors</strong> works</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container how">
            <div class="row">
                <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-mouse-pointer wow bounceIn text-primary" data-wow-delay='0.5s' data-wow-duration='1.5s'></i>
                        <h3>Select</h3>
                        <p class="text-muted">Select the field in which you want mentorship to view all the relevant mentors.</p>
                        
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 text-center" >
                    <div class="service-box">
                        <i class="fa fa-4x fa-search wow bounceIn text-primary" data-wow-delay='0.7s' data-wow-duration='1.5s'></i>
                        <h3>Choose</h3>
                        <p class="text-muted">Choose a mentor you want to connect with.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-smile-o  wow bounceIn text-primary" data-wow-delay='0.9s' data-wow-duration='1.5s'></i>
                        <h3>Book</h3>
                        <p class="text-muted">Book an appointment by selecting the date, time and mode of conversation
		   (video, audio and chat) from those available.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x  fa-calendar-check-o wow bounceIn text-primary" data-wow-delay='1.1s' data-wow-duration='1.5s'></i>
                        <h3>Be Present</h3>
                        <p class="text-muted">Mark your calendar and be present at the website for the appointment.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
 
        .mentor-card{
           
          margin-left: 10px;
           margin-right: 10px;
            border-radius: 4px;
            padding: 0px;
            border-top: 3px solid #25b1cb;
             padding-top: 25px;
       
        }
        .mentor-card:hover{
            
          border-top: 3px solid #25b1cb;

        }
        .mentor-card > .container-fluid{
            padding: 0px;
            padding-left: 10px;
          
            line-height: normal;
        }
        .mentor-card >.container-fluid > h4{
            margin: 0px;
            margin-top: 10px;
            padding: 0px;
            color: #25b1cb !important;
        }
        .mentor-card >.container-fluid > p{
            margin: 0px;
            margin-bottom: 10px;

        }
        .mentor{
            background: #f4f4f4;
            border: none;
            border-top: 2px solid #dddddd;
            padding-top: 25px;
            padding-bottom: 50px;
            
        }
        .mentor-active{
            background: #fafafa;
            border: none;
            border-top: 2px solid #25b1cb;
            padding-top: 25px;
            padding-bottom: 50px;

        }
        .btn-con,.btn-con:visited{
            border-radius: 0px;
            background-color: #f5f5f5;
            color: #222222;
        }
         .btn-con:hover,.bnt-con:focus{
            border-radius: 0px;
            background-color: #25b1cb;
            color: #ffffff;
        }
        .starsr {
  margin: 2px auto 0px !important;
  font-size: 11px;
}
        
    </style>

    <div class="container-fluid mentor text-center blue" >
       
        
        <h2 style="margin-bottom:30px">Our <strong>Top</strong> Mentors</h2>
           <hr>
              <div class=" owl-carousel owl-theme owl-masters wow fadeInUp" id="owl-mentors" data-wow-offset="100" data-wow-duration="2s" data-wow-delay="0s">
                  
<!--
           
                  </div>
                </div>   
                  

-->
         
    </div>  
        <script>
     var New_couns = top_mentor;
     
   
             for(var i=0; i<8 ;i++)
             {
             var start = '  <div class="item text-center "><div class="thumbnail mentor-card mentoro'+i+'"> <a title="'+New_couns[i].label+'" href="'+New_couns[i].value+'" ><img  src="cp/m_img/'+New_couns[i].pic+'.png" class="img-responsive img-circle" style="width:100px" ></a> ';
             var mid = ' <div class="container-fluid text-center mentorno'+i+'"><h4>'+New_couns[i].label+'</h4><p style="margin-bottom:2px">'+New_couns[i].tag+'</p>';
                
                $('#owl-mentors').append(start+mid);
                 
                 var intvalue = Math.ceil( New_couns[i].avg_rat );
                 
                 for(var m=1; m<=intvalue;m++){
                    $('.mentorno'+i).append('<span class="glyphicon glyphicon-star " style="color:#efc30b;margin:2px;"></span>');
                 } 
                 for(var m=1; m<= (5-(intvalue));m++){
                    $('.mentorno'+i).append('<span class="glyphicon glyphicon-star" style="color:#e0e0e0;margin:2px;"></span>');
                 }
                 
                 
            var end='</div><a title="'+New_couns[i].label+'" href="'+New_couns[i].value+'" class="btn btn-primary btn-block btn-con" style="margin-top:2px">Connect</a></div></div>  '; 
           
                $('.mentoro'+i).append(end);
             }
            
          
        </script>

</div>
   <style>
       .whyec{
           width:100%;
           padding:50px 0 50px 0px;
           background-color: white;
           margin:0px;
           
           
       }
       .starsr {
  margin: 5px auto 0px;
  font-size: 11px;
}
       .whyecrow{
           width:100%;
             margin:0px;
        text-align:center
       }
    </style>
<div class="container-fluid whyec">
    <h2 class="text-center">Why <strong>ecounsellors </strong>work</h2>
    <hr>
    <div class="row whyecrow ">
        <div class="col-md-3 text-center col-xs-10 col-xs-offset-2 col-md-offset-2 wow fadeInUp  "   data-wow-delay='0.5s'>
            <img class="img-responsive  " width="200px"src="img/webd1.png">
        </div>
        <div class="col-md-4 col-xs-12 " >
            <h2 style="font-weight:700;">Simple and <span style="color:#25b1cb;">Effective</span></h2>
            <p style="color:#6c6c6c; font-size:16x;">Ecounsellors offers you a simple 4 step easy booking procedure and provides mentorship from expert mentors via real time communication.</p>
        </div>
    </div>
    <div class="row whyecrow">
        
       
        <div class="col-md-4 col-sm-push-4 col-md-offset-2 col-sm-offset-0 col-xs-10 col-xs-offset-1 text-center wow fadeInUp  "   data-wow-delay='.7s' >
            <a href="https://ecounsellors.in/mentor/Ravi-Batra/Ravi219" target="_blank">
            <div class="thumbnail mentor-active text-center">
            <img src="/cp/m_img/fi681hlo4e.png" class="img-responsive img-circle" width="100px" height="100px">
            <h3 style="font-weight: bolder; color: #333;">Hi, I’m  Ravi</h3>
            <p style="font-size: 13px; color: #999"> I am currently working as an associate engineer at Qualcomm. I did my B.Tech in ECE and hence can help you in clearing all your doubts regarding placements and internships</p>
            </div>
            </a>
        </div>
         <div class="col-md-5 col-sm-pull-5 col-xs-12 " >
            <h2 style="font-weight:700;">We're in this  <span style="color:#25b1cb;">together </span></h2>
            <p style="color:#6c6c6c; font-size:16x;">Receive guidance, support and motivation from your mentor and get the most practical solutions to all your career related problems.</p>
        </div>
    </div>
    <div class="row whyecrow">
        <div class="col-md-3 col-xs-10 col-xs-offset-1 col-md-offset-2 text-center wow fadeInUp  "   data-wow-delay='.5s'>
            <img class="img-responsive " src="img/web3.png">
        </div>
        <div class="col-md-4 col-xs-12 " >
            <h2 style="font-weight:700;">Just for <span style="color:#25b1cb;">you</span></h2>
            <p style="color:#6c6c6c; font-size:16x;">Ecounsellors promises you complete confidentiality of your sessions. We are always there for you to help you connect with the right mentor.</p>
        </div>
    </div>
        
</div>

    
<!--    Carousel Testimonials-->
<div class="container-fluid testimonial blue text-center " >
 
       
           <h1 >What People say about us</h1>
    <hr><br>
              <div class="owl-carousel blue wow fadeInUp" id="owl-testimonial" data-wow-offset="0" data-wow-duration="2s" data-wow-delay="0s">

                  <div class="item"> 
                    <div class="col-md-8 col-md-offset-2">
                      <div class=" thumbnail testcard " style="padding:0px" >
                          <div class="container-fluid" style="padding:0px"> 
                            <div class="col-md-6 ">
                                    <h2 style="color:#25b1cb;">" The most Amazingest and Coolest mentor!"</h2><br>
                                    <p> It was such a wonderful experience talking to such a cool and humble mentor. He cleared all my doubts with great perseverance. Besides being so talented, he was so down to earth. I'm completely satisfied with the kind of mentorship he provided. Will love to interact with him again.Great work ecounsellors team. Wish you a great future ahead. You guys are doing an awesome job.</p>
                                <p> <strong>- Rachita Bhagchandani</strong> </p>
                              </div>
                            <div class="col-md-6 testimg testi1" style="height:400px;">
<!--                            <img class="" height="100%" width="100%" src="img/portfolio/2.jpg" >-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>     
                  <div class="item"> 
                    <div class="col-md-8 col-md-offset-2">
                      <div class=" thumbnail testcard " style="padding:0px" >
                          <div class="container-fluid" style="padding:0px"> 
                            <div class="col-md-6 ">
                                    <h2 style="color:#25b1cb;">" Most positive response ever "</h2>
                                    <p>Talking to the mentor was the most positive experience I have ever had. Mentors ausually are convincing but he on the other hand, made me familiar with all the other possible faces of my queries. His answers satisfied me and i can now move ahead with a more clear vision. Thanks Ecounsellors. I loved the supervision.</p>
                                <p> <strong>- Anjul Jain </strong> </p>
                              </div>
                            <div class="col-md-6 testimg testi2" style="height:400px;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>    
                  <div class="item"> 
                    <div class="col-md-8 col-md-offset-2">
                      <div class=" thumbnail testcard " style="padding:0px" >
                          <div class="container-fluid" style="padding:0px"> 
                            <div class="col-md-6 ">
                                    <h2 style="color:#25b1cb;">" wow! what an amazing experience. I was in real need of this."</h2>
                                    <p> wow! what an amazing experience. I was in real need of this. Thank you for sharing the 'light' in this transitory world. I really do hope that your words will surely embark upon the new dimension to my life.<br>
Ecounsellors team did a great job in bringing so many amazing people on the board.</p>
                                <p> <strong>- Manishh Chauhan </strong> </p>
                              </div>
                            <div class="col-md-6 testimg testi3" style="height:400px;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
             <div class="item"> 
                    <div class="col-md-8 col-md-offset-2">
                      <div class=" thumbnail testcard " style="padding:0px" >
                          <div class="container-fluid" style="padding:0px"> 
                            <div class="col-md-6 ">
                                    <h2 style="color:#25b1cb;">" It was really wonderful experience to talk with such a knowledgeable ,humble mentor"</h2>
                                    <p> It was really a wonderful experience to talk with such a knowledgeable and humble mentor. The mentor covered all aspects of my queries and I totally satisfied with my mentorship session. Well done ecounsellors team.</p>
                                <p> <strong>- Pankaj Chaudhary </strong> </p>
                              </div>
                            <div class="col-md-6 testimg testi4" style="height:400px;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> 
            
       </div>


</div>
    

   
    

<div class="container-fluid faqs text-center wow fadeInUp" id="faq" data-wow-offset="0" data-wow-duration="2s" data-wow-delay="0s">
    <h2 style="font-family: 'Raleway','Helvetica Neue',Arial,sans-serif;" >Frequently <strong>Asked</strong> Questions</h2>
      <hr class="hr">
        <div class="container blue text-center">
          <div class="row">
           
              <div class="owl-carousel " id="owl-faq">

                  <div class="item">
                      <h3>How does the appointment happen?</h3>
                      <p> All appointments happen on the website itself for all three modes i.e. video, audio and chat.</p>
                  </div> 
                  
                <div class="item">
                    <h3>How much does each session cost? How long is the session?</h3>
                    <p>All sessions are free, please book sessions wisely. Time is a precious thing. Each session is of 1 hour.</p>
                  </div> 
                  
                <div class="item">
                    <h3>What happens if I cancel my session after booking it? Will I get my money back?</h3>
                    <p>You will be refunded 100% of the money in case you paid for one. Applicable only if you inform us 24 hours prior to the date of appointment.<br> <a href='/refund-and-cancellation-policy' target="_blank">Refund and Cancellation Policy</a></p>
                  </div>
                  
                  <div class="item">
                    <h3>Will my sessions be recorded?</h3>
                    <p>No. We care for your privacy.</p>
                  </div>
                  
               <div class="item">
                    <h3>How to cancel an appointment?</h3>
                   <p>Write to us at care@ecounsellors.in 24 hour prior to the appointment.For more info check our <br><a href='/refund-and-cancellation-policy' target="_blank">Refund and Cancellation Policy</a></p>
                  </div> 
                  
                  <div class="item">
                    <h3>Can I reschedule my appointment??</h3>
                    <p> Yes you can if you inform us 24 hours prior to the appointment</p>
                  </div>
                      
                  <div class="item">
                    <h3>Have any other question?</h3>
                      <p>Let us know more about it. <a href="contact-us" title="Contact Us">Click here</a> </p>
                  </div>
                      
                
              </div>
        
          </div>
    </div>   
</div>
        
        
    <div class="container-fluid footer-abv text-center wow fadeInUp" data-wow-offset="0" data-wow-duration="2s" data-wow-delay="0s">
        <div class="col-md-6 col-md-offset-3">
        <h2 style="font-family: 'Raleway','Helvetica Neue',Arial,sans-serif;" > Live a confusion free life</h2>
            <br>
        <p style="font-weight:600"> We want to see you take decisions that will be best for your career. So now say NO to all your confusion and let our expert mentors plan your career for you. Schedule an appointment now</p>
            <a class="btn btn-primary btn-lg btn-new wow fadeIn  "   data-wow-delay='0.7s' title="Meet Our Mentors" href="/hub"  >Meet our Mentor</a>
        </div>
    
    </div>
        <style>
            .bluec{
                color:#25b1cb;
            }
             .newt{
             box-shadow:0px 0px 10px rgba(163, 163, 163, 0.12);
            min-height:100px;
            marign:10px;
                 padding:10px;
            font-weight:lighter;
                 border-radius:0px;
                 boder:none;
            }
            .yolo p {
                font-weight:400 ;
            }
        </style>
        <section>
        <div class="container-fluid  text-center wow fadeInUp yolo"  data-wow-offset="0" data-wow-duration="2s" data-wow-delay="0s">
            <h3> Are you a <strong>Mentor</strong></h3>
            <hr>
            <div class="container">
            <div class="col-md-4  text-center">
                <div class="thumbnail newt wow fadeInLeft  "   data-wow-delay='0.7s' >
                <span ></span><h4 class="bluec"><i class="fa  fa-user"></i><strong> Mentor </strong></h4>
                <p>Join the ecounsellors family of mentors and help others to grow from your experience. </p>
                    </div>
            </div>
          
            <div class="col-md-4  text-center">
                     <div class="thumbnail newt wow fadeInLeft  "   data-wow-delay='.7s' >
                <span></span><h4 class="bluec"><i class="fa fa-share-alt"></i><strong> Connect</strong></h4>
                <p>Be a part of the community of like minded people and connect with the leaders of tomorrow.</p>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                     <div class="thumbnail newt wow fadeInLeft  "   data-wow-delay='.7s' >
                <span></span><h4 class="bluec"><i class="fa fa-book"></i><strong> Payback</strong></h4>
                <p>Payback to the community in the<br> most unique way.</p>
                </div>
            </div>
                </div>
              <div class="row text-center">
                  <div class="container" style="font-weight:lighter;">
                     
                  <span></span><h4 class="bluec"> <i class="fa fa-smile-o"></i><strong>
Spread Smiles  </strong></h4>
                      <hr>
                  <p>With Ecounsellors unique Spread Smiles initiative, Pledge your earnings for a noble cause and help us organise  events that would help the underprivileged to build their future and spread smiles. We promise to give you report of each such event that we will organise. <br>
                       </p>
            </div>
                  <a class="btn btn-primary btn-lg btn-new wow fadeIn"   data-wow-delay='0.7s' title="Mentor SignUp" href="https://ecounsellors.in/cp/" target="_blank">Become a Mentor</a>
        </div>
        </div>
        </section>
    <script src="js/jquery.counterup.min.js"></script>
  
    <div class="container-fluid stats text-center">
        <div class="col-md-12 ">
            <div class="col-md-4 ">
                <h4>Total Minutes of Mentorship</h4>
                <h1 class=" h1tab"><span class="counter">30,000</span>+</h1>
            </div> 
            <div class="col-md-4 ">
                <h4>Mentors  </h4>
                <h1  class="h1tab"><span class="counter">250</span>+</h1>
            </div> 
            <div class="col-md-4 ">
                <h4> Average Mentor Rating </h4>
                <h1  class=" h1tab"><span class="counter">4.8</span>/5</h1>
            </div>
             
        </div>
    </div>

    <script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 100,
            time: 2000
        });
    });
  </script>

  <?php include('includes/footer2.php'); ?>
    
    
    
    
    
    
   
    <script type='text/javascript' src='js/jquery.particleground.js'></script>
    <script type='text/javascript' src='js/demo.js'></script>
    <!-- Demo -->

 
    <script>
        
        $(document).ready(function() {
 
  var owl = $("#owl-mentors");
 
  owl.owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  }); 
            
            $("#search-form").click(function(){
                $(".search-tub").toggleClass("opac");
            });
       
});
            $(document).ready(function() {
 
  var owl = $("#owl-mentorship");
 
  owl.owlCarousel({
      items : 5, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      slideSpeed : 500,
      paginationSpeed : 500,
  }); 
    
    var owlg = $("#owl-orgs");
 
  owlg.owlCarousel({
      items : 6, //10 items above 1000px browser width
      itemsDesktop : [1000,4], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      slideSpeed : 500,
      paginationSpeed : 500,
      margin:20,
  }); 
            
          
});
        
    $(document).ready(function() {
      $("#owl-faq").owlCarousel({

      slideSpeed : 500,
      paginationSpeed : 500,
      singleItem : true

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
         $(document).ready(function() {
      $("#owl-testimonial").owlCarousel({

      slideSpeed : 500,
      paginationSpeed : 500,
      singleItem : true

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
        
//
//
//      $('ul.nav li.dropdown').hover(function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
//}, function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
//});
$('.carousel').carousel({
  interval: 1000 * 7
});
  





   
     





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

    
    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    

    <!-- Plugin JavaScript -->
  

    <!-- Custom Theme JavaScript -->
    

    
    <script type="text/javascript">
    	

// $('ul.nav li.dropdown').hover(function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
//}, function() {
//  $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
//});

    </script>


</body>

</html>
