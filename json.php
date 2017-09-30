<?php

include("includes/config.php");

$result=query("SELECT * FROM ca");
$desc = array(); $views = array();$id=array();
$cnt=0;
while($row = mysqli_fetch_array($result)) {

$new[$cnt]=array('uid' => $row['id'],'name'=>$row['name']);
		/*$id[$cnt]= $row["id"];
        $desc[] = $row["name"]; 
        $views[] = $row["email"];*/
        $cnt++;
}
//$res = array($id,$desc, $views);
$res= array($new);
echo json_encode($res);