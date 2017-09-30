<!DOCTYPE html>
<html lang="en">

  <?php
include("includes/header.php");
include("includes/nav.php");
?>
        
        <div class="container-fluid text-center" style="height:300px;background:#25b1cb;width:100%;color:white !important;">
            <div class="col-md-8 col-md-offset-2" style="margin-top:100px;">
                <h1 style="font-weight:bolder"> Contact Us</h1>  
            </div>
        </div>
  
    <section>  
    <div class="container-fluid container">
    <div class="row">

    <div class="text-center embed-responsive embed-responsive-16by9 col-md-11 col-md-offset-1" <?php  if($agent==0) {echo 'style="height:400px;";';}?>>
        <?php
        if($agent==1)
          echo'<iframe src="https://tawk.to/ecounsellors/"  allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';
          else
          echo'<iframe src="https://m.tawk.to/ecounsellors/popout/page/?$_tawk_popout=true&$_tawk_sk=570f5479413caa82a5a79a18&$_tawk_tk=9e2f506fed1994728392f80fad981032&v=465" width="400" height="749" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>';

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