<!DOCTYPE html>
<html lang="en">

  <?php
include("includes/header.php");
include("includes/nav.php");
?>
        
        <div class="container-fluid text-center" style="height:300px;background:#25b1cb;width:100%;color:white !important;">
            <div class="col-md-8 col-md-offset-2" style="margin-top:100px;">
                <h1 style="font-weight:bolder"> Terms and Conditions</h1>  
            </div>
        </div>
  
    <section>  
    <div class="container-fluid container">
    <div class="row">

    <div class="text-center embed-responsive embed-responsive-16by9 col-md-10 col-md-offset-1">
        <?php
        //if($agent==1)
          echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="900" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
          //else
          //echo'<iframe src="https://docs.google.com/document/d/1jkqhX0YgWW9LUfyee1kcYdibyCZ9MytkWFH_QmeomvY/pub?embedded=true" width="400" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';

        ?>
        </div>
        </div>
     </div>
     </section>   
         
    <?php
    include("includes/footer2.php");
    ?>
        
        <!-- JAVA SCRIPT  -->
    
   
   
 



   
    </body>
</html>


<script type="text/javascript">
  $('#mainNav').affix({
        offset: {
            top: -100
        }
    })

</script>