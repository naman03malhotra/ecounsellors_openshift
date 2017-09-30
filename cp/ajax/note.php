<?php
include("../../includes/config.php");


if(isset($_POST['note']))
{
  $note=filter($_POST['note']);
  $sid=$_POST['sub'];

  query("UPDATE meet set u_notes='$note' where rand='$sid'");
  //redirect("convo?sub=$sid#notes");
}


if(isset($_POST['notes']))
{
  $note=filter($_POST['notes']);
   $sid=$_POST['sub'];
   echo 1;
  //$note="<pre"
  

  query("UPDATE meet set note='$note' where rand='$sid'");

  
}

