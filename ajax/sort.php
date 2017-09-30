<?php
include('../includes/config.php');
//secho $_SERVER['QUERY_STRING'];

if(isset($_GET['car']))

{

         $c=str_replace('-', ' ',$_GET['car']);
          $q=$_GET['q'];
         

        if($q=='pri')
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by f_fee asc,n_rat desc,avg_rat desc,id desc");

          }
          else if($q=='dis')
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by disc desc,f_fee asc,n_rat desc,avg_rat desc");
          }
          else if ($q=='pop') {
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by n_rat desc,avg_rat desc,f_fee asc,id desc");

          }
          else if ($q=='free') {
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND free_act='1' AND timet_f='1' AND typec LIKE '%$c%' order by n_rat desc,avg_rat desc,f_fee asc,id desc");

          }
          else if ($q=='rec') {
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by id desc");

          }
          else
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND typec LIKE '%$c%' order by f_fee asc,n_rat desc,avg_rat desc,id desc");
          }

  include('../card.php');



 }

else
{


     $q=$_GET['q'];

        if($q =='pri')
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' order by f_fee asc,n_rat desc,avg_rat desc,id desc");
            

          }
          else if($q=='dis')
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1'  order by disc desc,f_fee asc,n_rat desc,avg_rat desc");
          }
          else if ($q=='pop') {
            
              $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1'  order by n_rat desc,avg_rat desc,f_fee asc,id desc");
          }
          else if ($q=='free') {
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' AND free_act='1' AND timet_f='1' order by n_rat desc,avg_rat desc,f_fee asc,id desc");

          }
            else if ($q=='rec') {
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1' order by id desc");

          }
          else
          {
            
            $queryc=query("SELECT * FROM c_userdata where verifyf='1' AND timet='1'   order by f_fee asc,n_rat desc,avg_rat desc,id desc");
          }

include('../card.php');

}



