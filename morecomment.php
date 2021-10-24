<?php
	include("includes/head.php");
	include("includes/db.php");
	if(isset($_GET['feed']) && !empty($_GET['feed']))
	{
		$var = $_GET['feed'];
		$Sql = "SELECT * FROM t_feed WHERE F_id='$var'";
		$ex = mysqli_query($connect, $Sql);
		if($ex)
		{
			$rw = mysqli_fetch_array($ex);
			if(isset($rw) && !empty($rw))
			{
				$name = $rw['U_id'];
				$selce = "SELECT * FROM t_user WHERE U_id= '$name'";
				$sexc = mysqli_query($connect, $selce);
				if($sexc)
				{
					$n = mysqli_fetch_array($sexc);
					

				}
			}
			else
			{
				echo("");
			}
		}
	}
?>


<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-9">
								<div class="inbox-sec">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-4">
											
											<div class="inbox-panel-head">
													<img alt="" src="images/resources/friend-avatar11.jpg">
													<center><h2><i>Post </i> </h2></center>
													<ul>
														<?php
															$uid = $n['U_id'];
															$session = $_SESSION['id'];
															$friend = "SELECT * FROM t_friend WHERE (U_id_Sender= '$uid' AND U_id_Receiver= '$session') OR  (U_id_Sender= '$session' AND U_id_Receiver= '$uid')";
															$friendex = mysqli_query($connect, $friend);
															if($friendex)
															{
																$f = mysqli_fetch_array($friendex);
																$fr = mysqli_num_rows($friendex);
																if($fr == 1 && $fr != $session)
																{
																	?>
																	<li><a class="compose-btn" title="" href="#">Write to post Owner</a></li>
																	<?php
																}
																else
																{
																	?>
																	<p class="compose-btn">¨¨Post sender not friend¨¨</p>
																	<?php
																}
															}
															else
															{
																echo("Error");
															}
														?>
															</ul>
											</div><!-- Inbox Panel Head -->
											<div class="inbox-navigation">
												<?php
														$ss = "SELECT U_id FROM t_post_comment  WHERE F_id = '$var' ";
														$qss = mysqli_query($connect, $ss);
												?>
													<br>
													<center><span><i><h3>Commentors</h3></i></span></center>
													
													<ul>
														<?php
															$arr = array();
															while($rrr = mysqli_fetch_array($qss))
															{
																if(in_array($rrr['U_id'], $arr))
																{

																}
																else
																{
																	array_push($arr, $rrr['U_id']);
																}
																
																?>
															
																<?php
															}
															for($i = 0; $i< sizeof($arr); $i++)
															{
																$vardu = $arr[$i];
																$sel = "SELECT * FROM t_user WHERE U_id = '$vardu'";
																$squery = mysqli_query($connect, $sel);
																$ro = mysqli_fetch_array($squery);
																?>
															<li>Name: <?php echo($ro['U_names'])?></li>
																<?php
															}
															//var_dump($arr);
														?>
														
													</ul>
													
												</div>
											</div>
										
										<div class="col-lg-9 col-md-9 col-sm-8">
											<div class="inbox-lists">
												
												<div class="mesages-lists">
													<center><i><h3>All post comments</h3></i></center>
													<ul id="message-list" class="message-list">
														<?php 
															$ti = "SELECT * FROM t_post_comment WHERE F_id = '$var' ";
															$rrti = mysqli_query($connect, $ti);
															while ($a = mysqli_fetch_array($rrti)) {
																

															
														?>
														<li class="">
															
															<?php
																$nameuser = $a['U_id'];
																$ssss = "SELECT U_names FROM t_user WHERE U_id = '$nameuser'";
																$lolo = mysqli_query($connect, $ssss);
																$rty = mysqli_fetch_array($lolo);
															?>
															<h3 class="sender-name"><?php echo($rty['U_names']);?></h3>
															

															<p><?php echo($a['pC_content']);?></p><br><span><i><?php echo($a['pC_date']);?></i></span>
														</li>
														<?php
															}
														?>
														
													</ul>
												</div>
											</div><!-- Inbox lists -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<aside class="sidebar static">
									
									<div class="widget friend-list stick-widget">
										<?php
											include("includes/shortcut.php");
										?>
									</div><!-- friends list sidebar -->
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>