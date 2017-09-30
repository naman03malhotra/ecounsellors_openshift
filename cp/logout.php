<?php

session_start();

session_unset();

setcookie("pk", "", time() - 3600,"/");
setcookie("pk2", "", time() - 3600,"/");

if(isset($_GET['out']))
{
header("Location: /cp/?lo");
}
else
{
header("Location: /cp/");
}



?>