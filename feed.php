<?php 
include_once("includes/head.php");
include_once("includes/db.php");
?>
	<?php
	$photovar = $_SESSION['id'];
	$photovar = $photovar.".jpg";
	$path= "images/profile/".$photovar;
	$pname = $photovar;
	if(file_exists($path))
	{
		$pname = $photovar;
	}
	else
	{
		$pname = "no.jpg";
	}  
	
?>

<?php
	//Pages
	//
	//
	$postperpage = 30;
	$numberposts =mysqli_query($connect, "SELECT COUNT(*)'count' FROM t_feed ");
	$feedtotal = mysqli_fetch_array($numberposts);
	$numberavaillable = $feedtotal['count'];

	$numberofpages = ceil($numberavaillable / $postperpage);


	if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0)
	{
		$_GET['page'] = intval($_GET['page']);
		$pagecourante = $_GET['page'];
	}
	else
	{
		$pagecourante = 1;
	}
	$depart = ($pagecourante - 1 ) * $postperpage;


	//var_dump($numberavaillable);
?>
	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									<?php
										include("includes/shortcut.php");
									?>
									
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
											<img src="images/profile/<?php echo($pname);?>" alt="" width='70px' height='9s0px'>
										</figure>
										<div class="newpst-input">
											<form method="post" action="includes/feedpost.php" enctype="multipart/form-data">
												<textarea name="text" rows="2" placeholder="Report / suggest Here"></textarea>
												<div class="attachments">
													<ul>
														<li>
															<i class="fa fa-camera"></i>
															<label class="fileContainer">
																<input type="file" name="Send">
															</label>
														</li>
														<li>
															<button name="send" type="submit">Post</button>
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div><!-- add post new box -->
								<!-- <div class="loadMore"> -->
								<?php
									$sqlposts = "SELECT * FROM t_feed ORDER BY F_id LIMIT " . $depart . ",". $postperpage;
									$quer = mysqli_query($connect, $sqlposts);
									if($quer)
									{
										while($row = mysqli_fetch_array($quer))
										{

										

									
								?>
									<div class="central-meta item">
										<div class="user-post">
											<div class="friend-info">
												<figure>
												<?php
													$photovar = $row['U_id'];
													$photovar = $photovar.".jpg";
													$path= "images/profile/".$photovar;
													$pname = $photovar;
													if(file_exists($path))
													{
														$pname = $photovar;
													}
													else
													{
														$pname = "no.jpg";
													}  
													//echo($path);
												?>
													<img src="images/profile/<?php echo($pname);?>" alt="HH">
												</figure>
												<div class="friend-name">
													<?php
														$id = $row['U_id'];
														$pub = "SELECT * FROM t_user WHERE U_id = '$id'";
														$exee = mysqli_query($connect, $pub);
														$rpw  = mysqli_fetch_array($exee);
													?>
													<ins><a href="profile.php?id=<?php echo($id);?>" title=""><?php
													if($id == $_SESSION['id'])
													{
														echo("Me - ");
													} echo($rpw['U_names']);?></a></ins>
													<span>published: <?php echo($row['F_date']);?></span>
												</div>
												<div class="post-meta">
													<?php
														if(isset($row['F_picture']) && $row['F_picture'] != '')
														{
															$pic = $row['F_picture']

														
													?>
													<img src="images/feed/<?php echo($pic);?>" alt="">
													
													<?php }
													 ?>
													
													<div class="description">
														
														<p>
															<?php
																echo($row['F_description']);
															?>
														</p>
													</div>
													<div class="we-video-info">
														<ul>
															
															<li>
																<?php
																$feed = $row['F_id'];
																//echo($feed);
																	$sql = "SELECT COUNT(*)'comment' FROM t_post_comment WHERE F_id='$feed'";
																	$es = mysqli_query($connect, $sql);
																	$cmt = mysqli_fetch_array($es);
																?>
																<span class="comment" data-toggle="tooltip" title="Comments">
																	<i class="fa fa-comments-o"></i>
																	<ins><?php echo($cmt['comment']);?></ins>
																</span>
															</li>
															<a href="includes/like.php?feed=<?php echo($feed) ?>"><li>
																<?php
																	$sql = "SELECT COUNT(*)'like' FROM t_post_like WHERE F_id = '$feed'";
																	$ess = mysqli_query($connect, $sql);
																	$lk = mysqli_fetch_array($ess);
																?>
																<span class="like" data-toggle="tooltip" title="like">
																	<i class="ti-heart"></i>
																	<ins><?php echo($lk['like']);?></ins>
																</span>
															</li></a>
															<a href="includes/dislike.php?feed=<?php echo($feed) ?>"><li>
																<?php
																	$sql = "SELECT COUNT(*)'dislike' FROM t_post_dislike WHERE F_id = '$feed'";
																	$ess = mysqli_query($connect, $sql);
																	$lk = mysqli_fetch_array($ess);
																?>
																<span class="dislike" data-toggle="tooltip" title="dislike">
																	<i class="ti-heart-broken"></i>
																	<ins><?php echo($lk['dislike']);?></ins>
																</span>
															</li>
															</a>
															
														</ul>
													</div>
													
												</div>
											</div>
											<div class="coment-area">
												<ul class="we-comet">
													<?php
														$comment = "SELECT *, count(*)'num' FROM t_post_comment WHERE F_id='$feed'";
														$excomm = mysqli_query($connect, $comment);
														if($excomm)
														{
															$num= mysqli_fetch_array($excomm);
															$nums = $num['num'];
															


															while ($a = mysqli_fetch_array($excomm)) {
																
															
													?>
												
													<li>
														<div class="comet-avatar">
															<img src="images/resources/comet-1.jpg" alt="">
														</div>
														<div class="we-comment">
															<div class="coment-head">
																<h5><a href="time-line.html" title="">Jason borne</a></h5>
																<span>1 year ago</span>
																
															</div>
															<p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
														</div>
														
													</li>
													<?php }if($nums > 2)
													{

													?>
													<li>
														<a href="#" title="" class="showmore underline">more comments</a>
													</li> <?php }
													else
													{
														echo "<center><span><i>no comment yet</i></span></center>";
													}
													?>
													<?php
														} 
														else
														{
															echo("<center><span><i>No comment yet</i></span></center>");
														}
													?>
													
													
													<li class="post-comment">
														<div class="comet-avatar">
															<img src="images/resources/comet-1.jpg" alt="">
														</div>
														<div class="post-comt-box">
															<form method="post" action="formpost.php">
																<textarea placeholder="Post your comment" name="message"></textarea>
																
																<button class="attachments " type="submit" name="send" style="color: blue"><b>Send</b> </button>
															</form>	

														</div>
													</li>
													
												</ul>
											
											</div>
										</div>
									</div>
									<?php }}
									else
									{
										echo("<span><i> no post yet</i><span>");
									} ?>
								<?php
								?>
								
								<!-- Pages GOES HERE -->

								Pages
								<?php
									for ($i=1; $i <= $numberofpages ; $i++) { 
										# code...
										if($i == $pagecourante)
										{
											echo( " | " . $i . " | ");
										}
										else
										{

										
										echo(" <a href='feed.php?page=". $i ."'>  ".$i."  </a>");
										}
									}
								?>
							
							
							
							
							
							
							
							
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<div class="banner medium-opacity bluesh">
											<div class="bg-image" style="background-image: url(images/rooms/coat.png)"></div>
											<div class="baner-top">
												<span><img alt="" src="images/book-icon.png"></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>Link people by interest</span>
												<a data-ripple="" title="" href="#">start now!</a>
											</div>
										</div>											
									</div>
									
										<?php
											include("includes/onlinefriends.php");
										?>
									</div><!-- friends list sidebar -->
								</aside>
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>