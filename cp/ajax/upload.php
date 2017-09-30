<?php


include('../../includes/config.php');
$u=$_POST['url'];
function img_encode($url,$file_name_org)
{
	$url='https://process.filepicker.io/A6SCbpeqSlGu5YBUcAv8Oz/resize=width:200,height:200,fit:crop/'.$url.'';
	$content=file_get_contents($url);
    $imageData = base64_encode($content);
    $file_name='../m_img/'.$file_name_org.'.png';
	file_put_contents($file_name, $content);
	$src = ('data: '.mime_content_type($url).';base64,'.$imageData);
	return $src;
}

if(isset($_POST['pro']))
{
	$url=img_encode($_POST['url']);

	$cid=$_SESSION['c_id'];


	$q = query("SELECT propic_file FROM `u_users` WHERE emailid='$cid'");
	$row = mysqli_fetch_array($q);
	$url_file=$row['propic_file'];
	$file_path='../m_img/'.$url_file.'.png';
	//unlink($file_path);

		//file put
    $file_name_org=random_string2(10);
						
$url=img_encode($_POST['url'],$file_name_org);



	query("UPDATE c_userdata set propic='$url',propic1='$u',propic_file='$file_name_org' where emailid='$cid'");




}


if(isset($_POST['deg']))
{
	$url=($_POST['url']);

	$cid=$_SESSION['c_id'];

	query("UPDATE c_userdata set digree='$url',degree1='$u' where emailid='$cid'");




}

if(isset($_POST['pan']))
{
	$url=($_POST['url']);

	$cid=$_SESSION['c_id'];

	query("UPDATE c_userdata set pan='$url',pan1='$u' where emailid='$cid'");




}