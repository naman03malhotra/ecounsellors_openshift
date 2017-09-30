<?php
/*
include("../includes/config.php");
//$file_name="abc1.png";

$q = query("SELECT * FROM `u_users` WHERE url_file=''");
while($row = mysqli_fetch_array($q))

{
	$id=$row['id'];
	$file_name_org=random_string2(10);
	$file_name=$file_name_org.'.png';
	$data=$row['url'];
	$sub= substr($data, 14);
	$binary = base64_decode($sub);
	file_put_contents($file_name, $binary);
	query("UPDATE u_users set url_file='$file_name_org' where id='$id'");
}
echo 'suc';*/

/*echo $sub= substr($data, 14);
$binary = base64_decode($sub);
file_put_contents($file_name, $binary);
echo "suc";

$url="http://g-ecx.images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg";

$file_name="abc2.png";
//$imageData = (file_get_contents($url));
file_put_contents($file_name, $imageData);
echo mime_content_type("abc.png");*/

?>