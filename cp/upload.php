<form action="" method="post" enctype="multipart/form-data"> 
	<input type="file" name="myFile">
	<br>
	<input type="submit" value="Upload" name="up">
</form>




<?php
include("../includes/config.php");

if(isset($_POST['up']))
{

	define("UPLOAD_DIR", "uploads/");

	if (!empty($_FILES["myFile"])) 
	{
		$myFile = $_FILES["myFile"];

		if ($myFile["error"] !== UPLOAD_ERR_OK) 
		{
			echo "<p>An error occurred.</p>";
			exit;
		}

 
		$name =  $myFile["name"];

		

		
		$fileType = exif_imagetype($_FILES["myFile"]["tmp_name"]);
		$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
		if (in_array($fileType, $allowed)) 
		{

			$i = 0;
			$parts = pathinfo($name);
			$rand=random_string(7);
			$name=$rand.".".$parts["extension"];



			while (file_exists(UPLOAD_DIR . $name))
			{
				$i++;
				$name = $rand . $i . "." . $parts["extension"];
			}
		//echo $parts["extension"];

    // preserve file from temporary directory


			$success = move_uploaded_file($myFile["tmp_name"],
				UPLOAD_DIR . $name);
			if (!$success)
			{ 
				echo "<p>Unable to save file.</p>";
				exit;
			}

		}
		else
		{
			echo 'Invalid extension';
		}
		$t=UPLOAD_DIR.$name;
//echo $path = rtrim(dirname($t), "/\\");
		echo realpath($t);
    // set proper permissions on the new file
		chmod(UPLOAD_DIR . $name, 0644);
	}


}
?>