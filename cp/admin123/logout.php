<?php

session_start();

session_unset();

setcookie("super", "", time() - 3600,"/");
//setcookie("pk2", "", time() - 3600,"/");

if(isset($_GET['out']))
{
header("Location: login");
}
else
{
header("Location: login");
}



?>