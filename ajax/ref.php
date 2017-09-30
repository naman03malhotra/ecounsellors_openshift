<?php


include('../includes/config.php');


date_default_timezone_set("Asia/Kolkata");

if(isset($_POST['ref']))
{

	$u_id=$_SESSION['u_id'];
	$queryu=query("SELECT * From u_users where u_id='$u_id'");
	$rcheck=mysqli_fetch_array($queryu);
	$ref_check=$rcheck['ref'];	

	$ref=strtoupper(filter($_POST['ref']));
	
	$flag=0;
	$flag2=0;
	$flag3=0;
	$rdf=query("SELECT * From u_users where ref='$ref'");
	$rowu=mysqli_fetch_array($rdf);
	$uid=$rowu['u_id'];

	$queryf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");   
	if($ref==$ref_check)
		$flag=1;    
	if($rcheck["ref_by"]!="")
		$flag2=1;
	if($rcheck['timestamp']<$rowu['timestamp'])
		$flag3=1;

 	$rowf = mysqli_fetch_array($queryf);
	$refn=mysqli_num_rows($rdf);

	if($refn==1 and $flag==0 and $flag2==0 and $flag3==0)
	{
		//query("INSERT INTO referral(user1, user2,timest) values('','','')")
		//query("UPDATE u_users set ref_by='$ref'");

	echo' <div class="modal-header">
        <a type="button" class="close btn" href><span class="label label-danger" aria-hidden="true">&times;</span></a>

        <h4 class="text-center"><span class="label label-success" id="qid" ';

        if($agent==1)
        echo 'style="margin-left: 54px;"';

        echo '>Confirm Referrer</span></h4>
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
          <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-login">
            <div class="panel-heading">

              <div class="row">
                <div class="col-xs-12">
                  <a href="#" class="active" id="login-form-link">Earn 50 Credits</a>
                </div>
                
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 text-center">';

                
				                   
					if($rowf['propic']=="")
				          {
				            if($rowu['status']=="f" or $rowu['status']=="g")
				            echo '<img class="img-circle" style="height: 200px;width:auto;" src="'.$rowu['url'].'"/>';
				                else
				            echo '<img class="img-circle" src="uploader/userpic.gif"/>';
				          }
				          else
				          {
				            echo '<img class="img-circle" style="height: 200px;width:auto;"src="'.$rowf['propic'].'"/>';

				          }

                   
                   
                   echo '<h2 class="bg-primary ref">'.$rowu['name'].'</h2>';
                      echo '<div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                          <br>
                          <button onclick="confirm(\''.$ref.'\')" id="earn"  class="form-control btn btn-login" >Confirm</button>
                          <br>
                         
                        </div>

                      </div><br>
                       <div id="result"></div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                          
                          </div>
                        </div>
                      </div>
                    </div>
                 
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      </div>
</div>';










     }
     else
     {
     	if($flag==1)
     		echo 2;
     	else if($flag2==1)
     		echo 4;
     	else if($flag3==1)
     		echo 5;
     	else
     		echo 3;
     }

 }












 if(isset($_POST['conf']))

 {


	$u_id=$_SESSION['u_id'];
	$queryu=query("SELECT * From u_users where u_id='$u_id'");
	$rcheck=mysqli_fetch_array($queryu);
	$ref_check=$rcheck['ref'];	
	$r_credits=$rcheck['credits'];

	$ref=strtoupper(filter($_POST['conf']));
	
	$flag=0;
	$flag2=0;
	$rdf=query("SELECT * From u_users where ref='$ref'");
	$rowu=mysqli_fetch_array($rdf);	
	$uid=$rowu['u_id'];
	$re_credits=$rowu['credits'];

	$queryf = query("SELECT * FROM u_userdata WHERE u_id='$uid'");   
	if($ref==$ref_check)
		$flag=1;    

	if($rcheck["ref_by"]!="")
		$flag2=1;

 	 $rowf = mysqli_fetch_array($queryf);
	$refn=mysqli_num_rows($rdf);

	if($refn==1 and $flag==0 and $flag2==0)
	{
		//query("INSERT INTO referral(user1, user2,timest) values('','','')")
		//query("UPDATE u_users set ref_by='$ref'");

		$r_credits+=50;
		$re_credits+=50;
		query("UPDATE u_users set credits='$r_credits',ref_by='$uid' where u_id='$u_id'");
		query("UPDATE u_users set credits='$re_credits' where u_id='$uid'");


	echo' <div class="modal-header">
        <a type="button" class="close btn" href aria-label="Close"><span class="label label-danger" aria-hidden="true">&times;</span></a>

        <h4 class="text-center"><span class="label label-success" id="qid" ';

        if($agent==1)
        echo 'style="margin-left: 54px;"';

        echo '>Congrats :-)</span></h4>
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
          <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-login">
            <div class="panel-heading">

              <div class="row">
                <div class="col-xs-12">
                  <a href="#" class="active" id="login-form-link">Your And Your Friend Just Earned 50 Credits</a>
                </div>
                
              </div>
              <hr>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12 text-center">';

                
				 

                   $left=(200-$r_credits);
                   
                   echo '<h2 class="bg-primary ref">'.$rcheck['name'].'</h2>';
                      echo '<div class="row">
                        <div class="col-sm-12">
                          <br>
                          <h3><span class="label label-success ref"> Total Credits:'.$r_credits.'</span></h3><br>';

                       if($r_credits<200)
                        echo '<h4>You Still need '.$left.' more credits for a free session fetch '.($left/50).' more friend.</h4>';
                    else
                    	echo '<h4><span class="label label-success ref">TIme To Grab Free Session</span><br><br><span class="label label-success ref"> 200 Credits = One Session </span></h4>';
                          
                         
                      echo '</div>

                      </div><br>
                       <div id="result"></div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="text-center">
                          
                          </div>
                        </div>
                      </div>
                    </div>
                 
                 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            
      </div>
</div>';










     }
     else
     {
     	if($flag==1)
     		echo 2;
     	else if($flag2==1)
     		echo 4;
     	else
     		echo 3;
     }



 }