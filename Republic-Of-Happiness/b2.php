 <?php
//header('Content-Type: image/jpeg');
//$url="https://process.filestackapi.com/AqXZPMiF9QUiioSSFuTepz/watermark=file:0ORTDHzRfed5TnkPdY1C/https://process.filestackapi.com/AqXZPMiF9QUiioSSFuTepz/resize=width:640,height:640,fit:crop/https://www.filepicker.io/api/file/RZLpROMT6SS6jXUVdOPX";
include("../includes/config.php");
if(isset($_POST['url']))
{
 $url=$_POST['url'];
 	$imageData = base64_encode(file_get_contents($url));
 	query("INSERT INTO thebeg(url,timestamp,ip,agent) values('$url','$time','$ip','$agent')");

echo $src = ('data:image/jpeg'.mime_content_type($url).';base64,'.$imageData);
}
//echo "<img src=".$src.">";



