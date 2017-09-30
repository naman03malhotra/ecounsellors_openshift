<!-- Header -->


	<div id="header" class="skel-layers-fixed">

		<div class="top">

			<!-- Logo -->
			<div id="logo">
				<h4><a href="https://ecounsellors.in" target="_blank">www.ecounsellors.in</a></h4>
				<?php
				if($_SESSION['c_id'])
				{
				if($rowf['propic_file']!="")
				echo '<span class="image avatar48"><a href="profile"><img src="/cp/m_img/'.$rowf['propic_file'].'.png" alt="" /></a></span>';
				else
					echo '<span class="image avatar48"><a href="profile"><img src="uploader/userpic.gif" alt="" /></a></span>';
				}
					echo '<h4><a href="/cp/profile">'.$rowu['name'].'</a></h4>';?>
				
			</div>

			<!-- Nav -->
			<nav id="nav">
							<!--
							
								Prologue's nav expects links in one of two formats:
								
								1. Hash link (scrolls to a different section within the page)
								
								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>
							
								-->
								<ul>
									<li><a href="index"    ><span class="icon fa-home">Home</span></a></li>
									

									<?php
									if(isset($_SESSION['c_id'])){
										if($rowf['verifyf']==1)
										{
										echo '<li><a href="appointments"><span class="icon fa-calendar">Appointments</span></a></li>';
										echo '<li><a href="manage"><span class="icon fa-cogs">TimeTable</span></a></li>';
										//echo '<li><a href="boost"  ><span class="icon fa-rocket">Boost Business</span></a></li>';
										}
										echo '<li><a href="profile"><span class="icon fa-pencil">Profile</span></a></li>';
										echo '
										
									<li><a href="index#contact"><span class="icon fa-envelope">Contact Us</span></a></li>
									<li><a href="faq"><span class="icon fa-question">FAQs</span></a></li>
									<li><a href="logout"  ><span class="icon fa-power-off">Log Out</span></a></li>';
									}
									else{
										echo '<li><a href="index#loginz"  ><span class="icon fa-power-off">SignIn/SignUp</span></a></li>
										<li><a href="index#about"  ><span class="icon fa-user">About Us</span></a></li>
									<li><a href="index#contact"><span class="icon fa-envelope">Contact Us</span></a></li>
										<li><a href="faq"><span class="icon fa-question">FAQs</span></a></li>

									';

									}?>

										
									
								</ul>
							<ul class="icons">
								<li><a href="https://twitter.com/EcounCare" rel="Twitter Page" title="@EcounCare" target="_blank" class="icon fa-twitter"></a></li>
								<li><a href="https://www.facebook.com/ecounsellors"  rel="Facebook Page" title="https://www.facebook.com/ecounsellors" target="_blank"class="icon fa-facebook"></a></li>
								<li><a href="https://www.linkedin.com/company/ecounsellors-in" target="_blank" rel="Company Page" title="https://www.linkedin.com/company/ecounsellors-in" class="icon fa-linkedin"></a></li>
								
								<li><a href="mailto:support@ecounsellors.in" rel="Email" title="support@ecounsellors.in" class="icon fa-envelope"></a></li>
							</ul>

							</nav>

						</div>

						<div class="">

							<!-- Social Icons -->
							
						</div>

					</div>