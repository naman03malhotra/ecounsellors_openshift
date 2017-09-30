

<?php 
$r=query("SELECT * FROM progm WHERE prog='$title'");
$row=mysqli_fetch_array($r);
$url="https://cashwaapas.com/cpl/l/?&p=".$row['nick']."&id=".$rowf['sub_id'];
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$r2=query("SELECT * FROM masking where link='$url' ");
$s=$rowf['sub_id'];
$num=mysqli_num_rows($r2);
$rowx=mysqli_fetch_array($r2);

$r3=query("SELECT * FROM level where sub_id='$s' and prog='$title'");
$rowl=mysqli_fetch_array($r3);
if($num==1)
{
	$url2="https://cashwaapas.com/c/".$rowx['mask'];
}
else
{
	$sub=strtolower(substr($rowf['fname'],0,4));
	$ran=random_string(3);
	$mask=$sub.$ran;

	if(query("INSERT INTO masking(link,mask,ip) values('$url','$mask','$ip')"))
	{

		$url2="https://cashwaapas.com/c/".$mask;
	}


}

?>
<div id="main">

	<!-- Intro -->
	<section id="top" class="">
		<div class="container">
			<div class="row">
				
				<div class="12u">
					<h1 style="font-size:50px;"> <?= htmlspecialchars($title) ?></h1>
					<h7>Rs.<?php echo $row['price']; ?>/Lead</h7>
					<h1> Read Procedure Carefully</h1>
					<h3>Must do steps for one valid registration to be counted:</h3>
					<ul style="text-align:left;">
						
						<?php echo $row['tc']; ?>
					</ul>

				</div>
				<div class="2u"></div>
				<div class="2u"></div>


			</div>

			<div class="row">


				
				<div class="12u">
					<?php 

					if($row['cat']!=""&&$rowl['status']=="")
					{
						echo '<form action="" method="POST">
						<button class="button " id="apply" type="submit" name="ask" >Request Approval for this Programme</button>
						</form>';
					}
					else if($row['cat']!=""&&$rowl['status']=="2")
					{
						echo '<p> <h2>Your request for this Programme is submitted and is pending for approval.</h2> </p>';
					}
					else if($row['cat']!=""&&$rowl['status']==-1)
					{

						echo '<p> <h2>Request Rejected.</h2> </p>';
					}
					else
					{
						echo '<p> <h2 style="color:orange;">Your unique Link:</h2> <a href="'.$url2.'" target="_blank"><strong>'. $url2.'</strong></a></p>';
					}

					if(isset($_POST['ask']))
					{
						$req=$rowf['sub_id'];
						query("INSERT INTO  level(prog,status,sub_id,timestamp,ip) values('$title',2,'$s','$time','$ip')");
						redirect($_SERVER['REQUEST_URI']);
					//query("UPDATE progm SET reqno='$req'");
					}

					?>

				</div>
				

			</div>
		</div>
	</section>
</div>



<?php include_once("footer.php");  ?>




</div>
</section>
</body>
</html>





<script src="js/custom.js"></script>