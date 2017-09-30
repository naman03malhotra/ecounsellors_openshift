

<?php

require("includes/config.php");
if(isset($_GET['ph']))
{
$phone=$_GET['ph'];
$_SESSION['phone']=$phone;
}

if(isset($_GET['cur']))
{
$cur=$_GET['cur'];
$_SESSION['cur']=$cur;
}
if($_GET['act']==1)
{
redirect("https://www.facebook.com/dialog/oauth?client_id=415771041928681&redirect_uri=https://ecounsellors.in/flogin.php&scope=email");

}
else
{
//redirect("https://accounts.google.com/o/oauth2/auth?scope=email%20profile&url=https://oa2cb.example.com/myHome&redirect_uri=https://ecounsellors.in/glogin.php&response_type=code&client_id=664628686506-ciifonmhln536rffrk98gim68s2n4c25.apps.googleusercontent.com&approval_prompt=force");
redirect("https://accounts.google.com/o/oauth2/auth?scope=email%20profile&redirect_uri=https://ecounsellors.in/glogin.php&response_type=code&client_id=664628686506-ciifonmhln536rffrk98gim68s2n4c25.apps.googleusercontent.com");

}