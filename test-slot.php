<style type="text/css">
    input[type="date"] {
     -webkit-align-items: center;
     display: -webkit-inline-flex;
     font-family: monospace;
     overflow: hidden;
     padding: 0;
     -webkit-padding-start: 1px;
}

input::-webkit-datetime-edit {
    -webkit-flex: 1;
    -webkit-user-modify: read-only !important;
    display: inline-block;
    min-width: 0;
    overflow: hidden;
}

input::-webkit-datetime-edit-fields-wrapper {
    -webkit-user-modify: read-only !important;
    display: inline-block;
    padding: 1px 0;
    white-space: pre;
}
</style>

<form method="post" action="">
    
<input type="datetime-local" name="dt">
<input type="time" name="tm">
<input type="submit" name="bt" value="submit">
</form>

<?php

  date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['bt']))
{


//echo $t=$_POST['dt']." ".$_POST['tm'];

echo $t2=$_POST['dt'];

echo "<br>";
echo 'Time stamp:'.$t1=strtotime($t2);
echo "<br>";
echo 'Adate:'.date("jS M y D",$t1);
echo "<br>";
echo 'slot:'.date("h:i",$t1).'-'.date("h:i A",$t1+3599);
echo "<br>";
echo $x=date("jS M'y l h:i A",$t1);
echo "<br>";
echo $rt=date("Y-m-d\TH:i:s",$t1);
echo "<br>";
echo '<input type="datetime-local" value='.$rt.' name="dt">';
//echo $x2=date("h:i A",$t2);
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


echo $zulu=date("Ymd\THis", $t1);
echo "<br>";
echo $zulu2=date("Ymd\THis", $t1+3599);
echo "<br>";
$title=urlencode("Appointment with Nikhil Menon");

$desp=urlencode("Appointment with Nikhil Menon schedule as ".$x." visit https://ecounsellors.in/appointments");
echo "<br>";
echo $link='https://calendar.google.com/calendar/render?action=TEMPLATE&dates='.$zulu.'/'.$zulu2.'&location=www.ecounsellors.in&text='.$title.'&details='.$desp.'';
echo "<br>";
echo '<a target="_blank" href="'.$link.'">link</a>';
}
























/*
$colors = "u1,u2,u3";
$array=array();

echo $datas=explode(',', $colors);
echo "<br>";
$count=0;
    foreach ($datas as $data) 
    {
        $array[$count]=$data;
        echo $data;
        echo "<br>";
        $count++;
    }
    $array[$count]="u4";

    $arr=implode(',',$array);
    echo "<br>";
    echo $arr;
echo "<br>New Data<br>";
    foreach ($array as $data) 
    {
        //$array[$count]=$data;
        echo $data;
        echo "<br>";
        
    }

    $del="u2";

    $count=0;
    unset($array);
    //$array=array();
    $datax=explode(',', $arr);
    foreach ($datax as $data) 
    {
        if($data!=$del)
            $array[$count]=$data;
        $count++;
        
        
    }
    echo "<br>";
    echo $arr2=implode(',', $array);




