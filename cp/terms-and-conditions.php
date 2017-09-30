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



        <div class="row">
          <div class="col-md-12 thumbnail">

            <div id="block" style="">
              



              <div class="panel-group" id="accordionx"><!-- outer panerl-grp -->
                <div class="panel panel-default" >
                  <div class="panel-heading" >
                    <h4 class="panel-title" >
                      <a data-toggle="collapse" data-parent="#accordionx" href="#collapseOnexyz">
                       <h1 style="text-align:center;color:#00bef2;">Terms And Conditions<i class="indicator fa fa-angle-down  pull-right"></i></h1>
                     </a>
                   </h4>
                 </div>
                 <div id="collapseOnexyz" class="panel-collapse collapse in">
                  <div class="panel-body"><!--panel body 2  -->
      


        <?php
        if($agent==1)
          echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="900" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
          else
          echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="400" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';

        ?>

                  </div><!-- panel body 2-->




                </div>

              </div> 


            </div>


      </div><!-- panel group -->





    

        </div><!-- block-->
      </div><!-- thumbnail-->
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
        <div class="col-md-8"><a href="/cp/index#contact" class="btn btn-lg my-btn btn-info btn-block">Still got doubts? Contact Us!</a>
        </div>
        <div class="col-md-2"></div>
      </div>

    </div><!-- row-->
 
  </section>


</div><br><br><p></p><p></p><p></p><p></p>


<!-- Footer -->
<?php include_once("templates/footer.php");  ?>


</body>
</html>



<script src="js/custom.js"></script>

