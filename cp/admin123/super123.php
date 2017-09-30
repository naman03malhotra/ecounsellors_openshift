
	<?php   

	include("../../includes/config.php");
	//include("../includes/functions.php");
	//includes("../")
	//include("mail.php");
	$sup=en_de('de',$_COOKIE['super']);

	if(!isset($_COOKIE['super']) || $sup!='2')
	{
		redirect("login");
	}
	/*if(!isset($_SESSION['csw_admin']) || $_SESSION['csw_admin']!='naman_csw' ){

		redirect("login");

	}*/

	



if(isset($_GET['xuidabc']))
{


						$_SESSION['u_id']=$_GET['xuidabc'];
						$u_id=$_GET['xuidabc'];

						


						$cookie_name = "pk";
						$cookie_value = en_de('en',$u_id);
						setcookie($cookie_name, $cookie_value, time() + (86400 * 2460), "/");

						echo '<h1>Suc </h1>';

					}
					else
					{
						echo '<h1>Fatal error </h1>';
					}