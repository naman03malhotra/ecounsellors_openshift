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
<body style="background:#fafafa">
  

 <script type="text/javascript">


 function but(sub)
 {


  var but ='<button class="btn btn-new" onclick="issue(\''+sub+'\')">Submit</button>';
  document.getElementById('but').innerHTML=but;
 }

 function issue(vx)
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
  //var sub=<?php echo "'".$sub."'"; ?>;
  var exp= document.getElementById('exp').value;
  var issue_f=document.getElementById('issue_f').value;
  if(issue_f=='')
  {
        document.getElementById('result').innerHTML= '<p class="bg-primary">Please Select an Issue.</p>';
        return false;

  }
  else if(exp=='')
  {

    document.getElementById('result').innerHTML= '<p class="bg-primary">Please Explain Us the Issue, do not leave it blank.</p>';

}
else
{
  xmlhttp.open("POST","ajax/issue.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("vx="+vx+"&iss="+issue_f+"&exp="+exp);

}
 }
 </script>

 <?php 

 include("includes/nav.php");
 if($agent==1)
  include("includes/feed.php");
 if(!$_SESSION['u_id'])
{
  redirect('index?lo');
}?>


<?php

if(isset($_GET['sorry']))
{

?>




<script type="text/javascript">
  
 //  $.amaran({content:{message:'Sorry No Counsellor With that Name', color:'#e74c3c'}});
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
          color:'#e74c3c'
    });


</script>





<?php

}

?>


  <?php

      $querym=query("SELECT * FROM meet where  u_id='$uid' and confirm='1' order by id desc");
          
          
      $num=mysqli_num_rows($querym);
      

    

      $querym_f=query("SELECT * FROM meet_f where  u_id='$uid' and confirm='1' order by id desc");
          
          
      $num_f=mysqli_num_rows($querym_f);
      

    
          ?>

<div class="gap" style="margin-bottom: 70px;"></div>


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
    .img-width {
          width: auto;
    height: 95px !important;
    }
</style>


<div class="container">
  <div class="row thumbnail" style="padding:0px;">
    <div class="col-md-3 hidden-xs hidden-sm "    <?php if($agent==1){ echo ' style="height:100%;min-height:420px;border-right:1px solid #dddddd;background-color:#f7f7f7;padding:0px"';} ?>  >


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
                border-top:3px solid #dddddd;
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
        </style>
        
    </div>
 </div>
        <div class="row " style="width:100%;margin:0px">
            <div class="list-group" style=" text-align: center;        width:100%;">

        <a href="profile" class="list-group-item"><span class="fa fa-pencil" > </span> View Profile</a> 
        <a href="profile" class="list-group-item disabled"><span class="fa fa-pencil" > </span> My Appointments</a>
        
        <?php
        if($num_f>0)
          echo '<a href="#free" class="list-group-item btn-success " style="color:fff;background-color:#5cb85c;"><span style="margin-right:5px;color: #fff;" class="fa fa-smile-o" ></span>Free Appointments</a>';
        ?>
       
      </div>
        </div>
      </div>

    <div class="col-md-9" style="margin-bottom:40px;">

  <div class="row" style="width:100%;padding:20px 10px 20px 10px;text-align:center">
        <span  style="color: #383838;text-align:center;<?php if($agent==1) { echo 'font-size: 20pt;';}?>">Appointments</span>
    <hr class="hr1">
    </div>

      <div class="row">
         
        <div class="col-sm-12 col-lg-12 col-md-12">
          
            
   <?php
/*
echo $tdate=date("j M y",time());
echo "<br>";
echo $tdtime=date("H:i",time());echo "<br>";
echo "<br>";
echo $tdate." ".$tdtime;*/


//$tdate=date("j M y H:i",time());
$count=1;
$tdate=time()-(3600*1);
if($num>0)
{
while ( $rowm= mysqli_fetch_array($querym)) 
  {
    $flagz=0;
    $xdate=strtotime(date("j M y",$rowm['date'])." ".date("H:i",$rowm['time']));
    $rand=$rowm['rand'];



    if($tdate<=$xdate)
    {
      $flagz=1;
    }



      if($flagz==0)
      {

          $idx=$rowm['id'];
          $link="#";

        if($rowm['status']=="" or $rowm['status']=="r")
        {
          query("UPDATE meet set status='1' where id='$idx'");
          redirect("appointments");

        }
        else if($rowm['status']==2)
        {
              echo '<div class="container-fluid thumbnail" style="border-top:3px solid #f2d600">';

        }
        else if($rowm['status']=='c')
        {
           echo '<div class="container-fluid thumbnail" style="border-top:3px solid red">';
           $link='#';
        }
        else
          echo '<div class="container-fluid thumbnail" style="border-top:3px solid #25bc25">';

       }

 

         

         
     
      else
      {
        $link='target="_blank" href="cp/convo?sub='.$rowm['rand'].'"';
             if($rowm['status']=='r')
        {
           echo '<div class="container-fluid thumbnail" style="border-top:3px solid indigo">';
          $link='target="_blank" href="cp/convo?sub='.$rowm['rand'].'"';
        }
         else if($rowm['status']=='c')
        {
           echo '<div class="container-fluid thumbnail" style="border-top:3px solid red">';
           $link='#';
        }
        else
        {
            echo '<div class="container-fluid thumbnail" style="border-top:3px solid #25b1cb">';
        }
        
      }


          echo '<div class="container-fluid " style="background-color:#f7f7f7;padding:4px;border-bottom:1px solid #dddddd;">
          
              <div class="col-md-6 col-sm-12 " style="font-size:13px;text-align:left" >
               <strong>Booking No: </strong>'.$rowm['bno'].'
              </div>
              <div class="col-md-6 col-sm-12 " style="font-size:13px;text-align:right">';
              
    
                echo '<strong>Booked on: </strong>'.date("jS M'y l h:i A",$rowm['btime']).'

              </div>
        
       
      </div>';

          $sub=$rowm['c_id'];
          $querycf = query("SELECT * FROM c_userdata WHERE sub_id='$sub'");   
          $rowc=mysqli_fetch_array($querycf);
          $type=$rowm['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }
           else if($type==3)
          {
            $type="Phone";
          }

          $mentor_name=$rowc['fname'].' '.$rowc['lname'];
          $url_calender=google_cal($xdate,$rowu['name'],$mentor_name,1);
           if($rowc['men']==1)
              {
                $men="mentor";
              }
              else
              {
                $men="counsellor";
              }
             
              $men_link='https://ecounsellors.in/'.$men.'/'.preg_replace('/\s+/', '-', $mentor_name).'/'.$rowc['sub_id'].'';
              


          echo '<div class="container-fluid" style="padding:5px; background-color:#ffffff">
         
            <div class=" col-md-2 col-sm-2 col-xs-4  col-xs-offset-4 col-md-offset-0 col-sm-offset-0 col-lg-offset-0" style="padding:7px;"> ';
              if($rowc['propic_file']!="")
              {
                    echo '<a href="'.$men_link.'" ><img class="img-circle img-responsive img-width"'; 

                    if($agent==0)
                    {
                     echo   'style="height:150px;width:150px;"'; 
                   }
                   echo 'src="/cp/m_img/'.$rowc['propic_file'].'.png" alt="placehold.it/350x250" ></a>';
             }
            else
             {
                echo '<a '.$rowc['link'].'" ><img class=" img-rounded img-responsive" src="uploader/userpic.gif"></a>';
              }
             echo' 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <a href="'.$men_link.'"><h4 class="text-capitalize" style="color:#262727;"> '.$mentor_name.'  </h4></a>
           
              <table class="table table-hover table-condensed" style="font-size:13px;margin-bottom:0px;"> 

          
          <tr><th>Date:</th><td>'.date("jS M'y l",$rowm['date']).'</td></tr>
          <tr><th>Time Slot:</th><td>'.$rowm['slot'].'</td></tr>
          <tr><th>Mode:</th><td>'.$type.'</td></tr>

          </table>
            </div>
            <div class="col-md-4 col-xs-12 nopad text-center">
              <h5 style="   font-size: 18px;">Amount Paid: <span class="bleed fa fa-inr">'.$rowm['paid'].'</span></h5>';

               

             

            if($flagz==0 and $rowm['status']!=4)
            {
                  if($rowm['status']==1  or $rowm['status']=='c')
                  {  
               echo '<button class="btn btn-info btn-md btn-new" data-toggle="modal" onclick="but(\''.$rand.'\')" data-target=".xt" style="" >Got a problem?</button>';

                   if($rowm['status']==1)
                   {
                         $description ='I took mentorship session at ecounsellors.in from '.$mentor_name.', it really helped me a lot.';    
                         $caption  =rawurlencode($description);

 $ename=$mentor_name." at ecounsellors.in helped me choose the right path.";


$share_url='https://www.facebook.com/dialog/feed?link='.$men_link.'&app_id=415771041928681&redirect_uri=https://ecounsellors.in/appointments&picture='.$rowc['propic1'].'&name='.rawurlencode($ename).'&caption='.($caption).'&description='.rawurlencode($description).'&display=page';

                        echo '<br><a href="'.$share_url.'" target="_blank" style="margin-top:5px;" class="btn btn-lg btn-big-re "><i class="fa fa-heart"></i></a>';
                   }

                }
                else
                {
                           echo '<button class="btn btn-white" style="" >Ticket: '.$rowm['ticket'].'</button>';

                }
                
                $count++;

            }
            else
            {
                 if($rowm['status']=='c')
               echo '<button class="btn btn-info btn-md btn-block btn-new" data-toggle="modal" onclick="but(\''.$rand.'\')" data-target=".xt" style="" >Got a problem?</button>';
                  else
                    echo '<a '.$link.'type="button" class="btn btn-info btn-lg btn-block btn-new"> Start! </a>';
                  echo '<a href="'.$url_calender.'" target="_blank" style="margin-top:5px;" class="btn btn-lg btn-big-red"><i class="fa fa-calendar" ></i> </a>';

            }
             
            echo '

           
            </div>
        </div>
        </div>
        ';

  


 



  }


}
else
{
  echo '<h2 style="text-align: center;">You haven\'t Booked Any Appointments Yet <br><p></p><br><a href="hub" class="btn btn-new">Book Now!</a> </h2>';
}

       
          ?>
       

      

        </div>
        </div>

   
   




      </div><!-- row -->



   






<?php

if($num_f>0)
{
?>
      <div class="row">
        
        <div class="col-sm-12 col-lg-12 col-md-12">
          <div id="free" class="well" style="color: white; background-color:#5cb85c;text-align:center;<?php if($agent==1) { echo 'font-size: x-large;';}?>">Free Appointments</div>
            <div class="thumbnail">
   <?php
/*
echo $tdate=date("j M y",time());
echo "<br>";
echo $tdtime=date("H:i",time());echo "<br>";
echo "<br>";
echo $tdate." ".$tdtime;*/


//$tdate=date("j M y H:i",time());
$count=1;
$tdate=time()-(3600*1);

while ( $rowm_f= mysqli_fetch_array($querym_f)) 
  {
    $flagz=0;
    $xdate=strtotime(date("j M y",$rowm_f['date'])." ".date("H:i",$rowm_f['time']));
    $rand=$rowm_f['rand'];



    if($tdate<=$xdate)
    {
      $flagz=1;
    }



      if($flagz==0)
      {

          $idx=$rowm_f['id'];

        if($rowm_f['status']=="" or $rowm['status']=="r")
        {
          query("UPDATE meet_f set status='1' where id='$idx'");
           redirect("appointments");

        }
        else if($rowm_f['status']==2)
        {
              echo '<button class="btn btn-warning btn-block">Complaint Registered</button>';

        }
        else
          echo '<button class="btn btn-success btn-block">Appointment Successful</button>';

          $link="#";

         
      }
      else
      {
        $link='cp/convo?sub='.$rowm_f['rand'].'&f';
      }


          echo '<center><button class="caption btn btn-block btn-info ti">
              <div class="col-md-6">
               <p class="pull-left"><strong>Booking No:</strong>'.$rowm_f['bno'].'</p>
              </div>
              <div class="col-md-6">
               <p ';

               if($agent==0)
                echo 'class="pull-left"';
              else
                echo 'class="pull-right"';


                echo '><strong>Booked on:</strong>'.date("jS M'y l h:i A",$rowm_f['btime']).'</p>

              </div>
        
       
      </button></center>';

          $sub=$rowm_f['c_id'];
          $querycf = query("SELECT * FROM c_userdata WHERE sub_id='$sub'");   
          $rowc=mysqli_fetch_array($querycf);
          $type=$rowm_f['type'];
          if($type==1)
          {
            $type="Video";

          }
          else if($type==2)
          {
            $type="Audio";
          }




          echo '<div class="list-group">
          <a href="'.$link.'" class="list-group-item card">
            <div class="media col-md-3">
              <figure class="pull-left">';
              if($rowc['propic']!="")
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

               echo 'src="'.$rowc['propic'].'" alt="placehold.it/350x250" >';
             }
               else
               {
                echo '<img class="media-object img-rounded img-responsive" src="uploader/userpic.gif">';
              }
             echo' </figure>
            </div><br>
            <div class="col-md-6">
              <h4 class="list-group-item-heading text-capitalize" style="color:#25b1cb;"> '.$rowc['fname'].' '.$rowc['lname'].'  </h4>
            <br>
              <table class="table table-hover table-bordered"> 

          
          <tr><th>Date:</th><td>'.date("jS M'y l",$rowm_f['date']).'</td></tr>
          <tr><th>Time Slot:</th><td>'.$rowm_f['slot'].'</td></tr>
          <tr><th>Mode:</th><td>'.$type.'</td></tr>

          </table>
            </div>
            <div class="col-md-3 text-center">
              <h5 style="   font-size: 25px;"><span class="bleed">FREE</span></h5>';

            if($flagz==0 and $rowm_f['status']!=4)
            {
         echo '<button class="btn btn-info btn-lg btn-new"  data-toggle="modal" onclick="but(\''.$rand.'\')" data-target=".xt" style="" >Got a problem?</button>';

          
          $count++;

            }
            else
            {
                 echo '<button type="button" class="btn btn-info btn-lg btn-block"> Start! </button>';

            }
             
            echo '
                <a href="#"><span class="glyphicon-class" style="color:#222">glyphicon glyphicon-heart</span></a> 
            </div>
          </a>
        </div>';
           

  


 



  }


}
else
{
}

       
          ?>
       

      

        </div>
        </div>

        
   




      </div><!-- row -->

















    </div><!-- col-8 -->



  </div><!-- row -->






</div><!-- conatiner-->








<?php 

/*

if(($agent==1 AND $num<2) and ($num_f<1))
{

echo '<footer class="footer" style="background-color:#fff; height:50px; position:fixed;">
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
else */
{
  echo "<p></p><br><br>";
include("includes/footer2.php");
}


if($flagz==0)
{
   

}
?>











</body>
</html>





<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>


<script src="js/main.js"></script>

                                          <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
                                          <script>
                                              (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                                              function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                                              e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                                              e.src='//www.google-analytics.com/analytics.js';
                                              r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                                              ga('create','UA-XXXXX-X','auto');ga('send','pageview');
                                            </script>-->

   


 <div class="modal fade bs-example-modal-lg xt" aria-labelledby="myLargeModalLabel" tabindex="-1" role="dialog"  aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
   <div id="mainframe">     
       <div class="modal-header text-center">
        <button type="button" class="close btn " data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size:20px;font-color:#333;margin-right:5px;">&times;</span></button>

        <h4>We are here to help</h4>
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

      <div class="quiz text-center" id="quiz" data-toggle="buttons">

      <select id="issue_f" required class="btn dropdown-toggle selectpicker btn-white" name="issue" class="selectpicker" data-style="btn-white" style="
    font-size: 20px;
    ">
    <option value=""  style="display:none">Select Issue</option>
    <!-- <option value="1">Not Happy with Counselling?</option>-->
    <option value="2">Technology Related Issue?</option>
    <option value="3">Payment Issue?</option>
    <option value="4">Some Other Issue.</option>


  
     </select><br><br>
     <div class="row"> 
     <div class="col-md-2"></div>    
      <div class="col-md-8">
     <textarea name="explain" rows="5" class="form-control" id="exp" placeholder="Please Explain the issue"></textarea><br>
     <div id="result"></div>
     <div id="but"></div>
     </div> 
      <div class="col-md-2"></div> 
       </div>

      </div>
</div>

    </div>
    <div class="modal-footer text-muted">
      <span id="answer"></span>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <script src="js/bug.js"></script>
