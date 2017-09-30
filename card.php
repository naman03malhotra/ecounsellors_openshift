
<style>
    .btn-new{
        box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.18);
        border:none;
        background-color:#25b1cb !important;
        color:white !important;
        transition:all;
        transition-duration:350ms;
        
    }
    .btn-new:hover{
        border:none;
        
        background-color:#209da5 !important; 
    }
    .menu {
      background-color: white;
    padding: 5px;
    border-radius: 4px;
    

    }
    .menu2{
          color: white;
    text-decoration: underline;
    }

    .menu li {
    background-color:rgb(120, 215, 241);
    color: white;
    border-radius: 10px;
    text-align: center;
    list-style-type: none;
    display: inline-block;
    margin: 4px;
        padding: 5px;
    }
    
</style>


 <?php
$num_c=mysqli_num_rows($queryc);

if($num_c>0)
{
  while ($rowc=mysqli_fetch_array($queryc)) {
  $tot_rat=0;
  $avg_rat=0;
  $name=$rowc['fname'].'-'.$rowc['lname'];



  if($rowc['men']==1)
          {
            $men="Mentor";
            $url_men="mentor";
          }
          else
          {
            $men="Counselling expert";
            $url_men="counsellor";
          }


  $sub=$rowc['sub_id'];
  $qrat=query("SELECT * from rating where c_id='$sub'");
          $nrat=mysqli_num_rows($qrat);
           while($rat=mysqli_fetch_array($qrat))
          {
            $rating=$rat['rating'];
            $tot_rat+=$rating;
            $avg_rat=number_format($tot_rat/$nrat,1);
          }
         // query("UPDATE c_userdata set avg_rat='$avg_rat',n_rat='$nrat' where sub_id='$sub'");



  

          echo '<div class="container-fluid" >';
    
          echo '<div class="row thumbnail newthumbnail" style="padding:0px">';
    
            echo '<div class=" col-md-2 text-center" style="margin-top:10px;margin-bottom:10px;" >';
    
    echo ' <a title="'.$name.'" href="/'.$url_men.'/'.$name.'/'.$rowc['sub_id'].'" > ';
    
    
if($rowc['propic_file']!="")
            {
                    
                    echo '<img class=" img-circle img-responsive"'; 

//                    if($agent==0)
//                    {
//                     echo   'style="height:238px;width:238px;"'; 
//                   }
//                  else
//                  {
//                    echo  'style="height:138px;width:138px;"';
//                   }

                    echo 'src="/cp/m_img/'.$rowc['propic_file'].'.png" alt="'.$name.'" >';
            }
                else
                {
                  echo '<img class=" img-circle img-responsive" src="/uploader/userpic.gif">';
                }

                $fee=$rowc['fee'];
                $disc=$rowc['disc'];
                $flagx=0;
                
                if($disc!=0)
                {
                  $flagx=1;
                  $fee2=(int)($fee-(($disc/100)*$fee));
                }
                $sub=$rowc['sub_id'];
                //
              echo '</a></div>
            <div class="col-md-7" style="margin-top:10px;margin-bottom:10px;">
              <a href="/'.$url_men.'/'.$name.'/'.$rowc['sub_id'].'" title="'.$name.'"><h4 class="" style="color:#676767;text-transform: capitalize;font-weight:300;"> '.$rowc['fname'].' '.$rowc['lname'].'  </h4></a>';
           
            // echo '<h5><strong>'.substr($rowc['typec'], 0,45).'</strong></h5>';
                
             
                echo '<p class="list-group-item-text" style="font-weight:400;font-size:12px;color:#808080"> '.substr($rowc['clg'], 0,140).'<a href="/'.$url_men.'/'.$name.'/'.$rowc['sub_id'].'">. . .</a>
              </p><p></p>
              <div  style="color:#ffd62a;font-size:12px;';
              if($agent==0)
              {
                echo 'text-align:center';
              }


              echo'">';

              if($avg_rat!=0)
              {
                $i=0;$flag=0;
                  while($avg_rat-$i>=1)
                  {
                    echo '<span class="fa fa-star"></span>';
                    $i++;
                    

                  }
              
                  if($avg_rat-$i!=0)
                        $flag=1;

                     
                if($flag==1)
                {
                  echo '<span class="fa fa-star-half-o"></span>';
                }

                for($i=1;$i<=(5-$avg_rat);$i++)
                    echo '<span class="fa fa-star-o"></span>';
                  echo '<span style="font-weight: 300;color:#777777;"> ('.$nrat.')</span>';
              //echo '<p style="color:black;"> Average :'.$avg_rat.'</p><div> <span class="glyphicon glyphicon-user"></span>'.$nrat.' total </div>';
            }
            else
            {
              echo '<p style="color:rgba(103, 103, 103, 0.76);font-size: 11px;">Be The First To Review.</p>';
            }

           echo '</div></a></div>

            <div class="col-md-3 text-center" style="background-color:#ffffff;margin-top:10px;min-height:60px;padding-top:10px">';

            /*if($flagx==1)
            {
              echo '<p style="  margin-top: -5px;  font-size: 14px;"><span style="text-decoration: line-through;color:#25b1cb;"><span style="color:black;"> Rs.'.$fee.'</span></span> <small> /session </small></p>';
              echo '<p style="  margin-top: -5px;  font-size: 14px;"><span >Discount: <span style="color:#25b1cb;">'.$disc.'%</span></span></p>';
              echo '<p style="  margin-top: -5px;  font-size: 14px;"><span style="color:#25b1cb;"> Rs.'.$fee2.'</span> <small> /session </small></p>';



            }
            else
            {
              if($fee!=0)
               echo '<p style="  margin-top: -5px;  font-size: 14px;"><span style="color:#25b1cb;"> Rs.'.$fee.'</span> <small> /session </small></p>';
             else
              echo '<p style="  margin-top: -5px;  font-size: 14px;"><span style="color:#25b1cb;">FREE</span></p>';

            }*/


                echo '<a href="/'.$url_men.'/'.$name.'/'.$rowc['sub_id'].'" class="btn btn-info  btn-block btn-new"> Connect</a>
              
              <!--  <h4 style="  color: #25b1cb;"> 14 <small> views </small></h4> -->';

                 if($rowc['free_act']==1 and $rowc['timet_f']==1)
              echo '<br><a href="/'.$url_men.'/'.$name.'/'.$rowc['sub_id'].'" class="btn btn-suc btn-sm btn-block"><span class="fa fa-bolt"></span> FREE</a>';
            echo '</div>';
             $arr= array();
                $arr= explode(',',$rowc['typec']);
                echo "<div class='col-md-12' style='border-top:1px solid #dddddd;margin:0px;width:100%;padding:0px;'><ul class='menu'  style='background-color:transparent;border:none;margin:0px;'>"; 
                $cnt=0;
                foreach($arr as $elem)
                {
                    echo "<li style='text-decoration:none;border-radius:3px;background-color:#eaeaea;border-top:2px solid #dbdbdb;padding:5px;color:#575757;font-weight:400;font-size:12px;'>";
                    echo $elem;
                    echo '</li>';
                    $cnt++;
                    
                    if($cnt==3)
                    {
                        break;
                    }
                }
                echo '</ul></div>'; 
         
         echo '</div>';
         
       echo' </div>';

}
}
else
{
    echo '<h3 class="text-center">Mentors will be added soon</h3>';
}