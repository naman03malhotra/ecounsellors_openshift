<?php



echo "<h1>".$_SERVER['HTTP_USER_AGENT']."</h1>";

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match("/iphone/i", $useragent))
{
	echo 1;
 
    if(!preg_match("/cri/i", $useragent))
  {

      $flag_agent=1;
      echo 2;
  }

}
else
{
   if(!preg_match("/chr/i", $useragent))
  {
     $flag_agent=1;
     echo 3;

  }
  
}

 if($flag_agent==1)
 {
  echo ' <script type="text/javascript">
  alert("We are currently supporting Google Chrome based browsers for video conferencing, Please use latest version of Gooogle Chrome or Torch browser.");
  </script>';
 }
