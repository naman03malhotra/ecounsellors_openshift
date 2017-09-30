<!DOCTYPE html>
<html lang="en">

  <?php
include("includes/header.php");
include("includes/nav.php");
?>
        
        <div class="container-fluid text-center" style="background:#25b1cb;width:100%;color:white !important;">
            <div class="col-md-8 col-md-offset-2" style="margin-top:100px;">
                <h1 style="font-weight:bolder">Looks like you are lost !</h1>
                <div><img src="/img/404.png" style="max-width:600px;width:100%;min-width:100px" ></div>
                <h2><a href="/" class="btn btn-lg btn-big-re" style="font-weight:600">Take me back home</a></h2>

            </div>
        </div>
 
         
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