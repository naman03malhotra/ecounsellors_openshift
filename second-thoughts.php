<!DOCTYPE html>
<html lang="en">

  <?php
include("includes/header.php");
include("includes/nav.php");
?><style>
      h2{
      font-size:20pt
      }
      h3{
        font-size:17pt;
      }
      #texter{
        transition:all;
          transition-duration:700ms;
      
      }
    </style>
        
        <div class="container-fluid text-center" style="background:#25b1cb;width:100%;color:white !important;padding-bottom:50px;">
            <div class="col-md-8 col-md-offset-2" style="margin-top:100px;min-height: 322px;">
                <img src="/img/logo.png" class="img-circle"  width="200px" height="200px" style="    box-shadow: 0px 0px 40px rgb(30, 152, 175);"> 
                <div class="col-md-8 col-md-offset-2"><h2 style="font-family: 'Raleway', sans-serif;color:white" >After a session with our mentor , you  could</h2><h3 style="font-family: 'Open Sans', sans-serif;font-style:italic;color:white" id="texter"></h3></div>
               
                
            </div>
        </div>
  
    <section>  
    <div class=" container">
    <div class="col-md-8 col-md-offset-2 text-center " style="background:#ffffff;padding:50px">
        
        <h3 style="color:#5d5d5d">The money that you will be paying for this session will be used to extend more helping hands to the 

student community and organising meaningful talk sessions for the underprivileged to help them 

learn and grow. Hence In a way you will be responsible in spreading a million smiles just like the one 

you will have after a session with one of our mentors.  So why think twice before spending ?</h3>
        <br>
    <a href="/" class="btn btn-lg btn-big-red"><i class="fa fa-smile-o"></i> Continue</a>
        </div>
     </div>
     </section>   
         
    <?php
    include("includes/footer2.php");
    ?>
        
        <!-- JAVA SCRIPT  -->
    
   
   
 



   
    </body>


 <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
<script type="text/javascript">
    
  $('#mainNav').affix({
        offset: {
            top: -100
        }
    })

</script>
<script>
var ar = ["have cleared all your confusions","start afresh","be more confident","advance your career","avoid mistakes that others most often make","have a right strategy","have practical solutions","Choose what is best for you"];
   var i = 1;                     //  set your counter to 1

function myLoop () {
 
     
   setTimeout(function () { 
     // $("#texter").addClass('animated fadeInUp').html(ar[i]).delay(3000).removeClass('animated fadeInUp').addClass('animated fadeOutUp');

      $("#texter").addClass('animated fadeInUp').html(ar[i]).delay(2000).queue(function (next) {
       
    $(this).removeClass('animated fadeInUp').delay(1000);
    

    //$(this).addClass('animated fadeOutUp');
    //$(this).delay(1000);
    //$(this).removeClass('animated fadeOutUp');
    //$(this).html("");
    $(this).dequeue();
   
      });

     
      
       
      i++;                     //  increment the counter
      if (i < 7) { 
          //  if the counter < 10, call the loop function
         myLoop(); 
          //  ..  again which will trigger another 
      } 
       if(i == 7){
        i=0;
           myLoop();
       }//  ..  setTimeout()
   }, 4000)
   
}

$(function() {
 
$("#texter").addClass('animated fadeInUp').html(ar[0]).delay(2000).queue(function (next) {
       
    $(this).removeClass('animated fadeInUp').delay(1000);
    

    //$(this).addClass('animated fadeOutUp');
    //$(this).delay(1000);
    //$(this).removeClass('animated fadeOutUp');
    //$(this).html("");
    $(this).dequeue();
       });

myLoop();   
});
                 
                            

</script>

</html>


