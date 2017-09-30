<?php


include('../includes/config.php');
$u=$_POST['url'];
function img_encode($url,$file_name_org)
{
	$url='https://process.filepicker.io/A6SCbpeqSlGu5YBUcAv8Oz/resize=width:200/'.$url.'';
	$content=file_get_contents($url);
    $imageData = base64_encode($content);
    $file_name='../u_img/'.$file_name_org.'.png';
	file_put_contents($file_name, $content);
	$src = ('data: '.mime_content_type($url).';base64,'.$imageData);
	return $src;
}

if(isset($_POST['url']))
{
	

	$uid=$_SESSION['u_id'];
	$q = query("SELECT url_file FROM `u_users` WHERE u_id='$uid'");
	$row = mysqli_fetch_array($q);
	$url_file=$row['url_file'];
	if($url_file!='def')
	{
	$file_path='../u_img/'.$url_file.'.png';
	unlink($file_path);
	}

		//file put
    $file_name_org=random_string2(10);
						
$url=img_encode($_POST['url'],$file_name_org);

	query("UPDATE u_users set url='$url',img_link='$u',url_file='$file_name_org' where u_id='$uid'");




}