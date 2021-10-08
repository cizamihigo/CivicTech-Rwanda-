<?php
include("includes/head.php");
include("includes/db.php");


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
										include("includes/editprofMenu.php");
									?>
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<?php
									$lid = $_SESSION['id'];
										if(isset($_POST['submit'] ))
										{
											$a = $_POST['curOne'];
											$b = $_POST['curTwo'];
											$c = $_POST['New'];
											if($a == $b)
											{
												$sql = "SELECT * FROM t_login WHERE L_id = '$lid'";
												$esxec = mysqli_query($connect, $sql);
												$row = mysqli_fetch_array($esxec);
												$d = $row['L_password'];
												$aa = sha1($a);
												if($aa == $d)
												{
													if(strlen($c) > 7)
													{
														$cc = sha1($c);
														$sql = "UPDATE t_login SET L_password = '$cc' WHERE L_id = '$lid'";
														$exec = mysqli_query($connect, $sql);
														if($exec)
														{
															session_destroy();
															?>
															 <script type='text/javascript'>
																window.location.replace("index.php");
															</script>


															<?php
														}
													}
													else
													{
														echo("<p style='color:red; text-align: center'> The password length can't be less than expected</p>");
													}

												}
												else
												{
													echo("<p style='color:red; text-align: center'> The entered password is not recognized for this user.</p>");
												}
											}
											else
											{
												echo("<p style='color:red; text-align: center'> Your two current password entered are different</p>");
											}

											
											
										}
									?>
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-lock"></i> Edit  Current Password</h5>
										<p>After this operation you should be loged off to start using the new password</p>
                                            <form method="post" action="">
											<div class="form-group ">	
											  <input type="password" id="input" name="curOne"/>
											  <label class="control-label" for="input">Currrent Password</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group ">	
											  <input type="password" name="curTwo"/>
											  <label class="control-label" for="input">Re-enter current Password</label><i class="mtrl-select"></i>
											</div>		
											<div class="form-group ">	
											  <input type="password" name="New"/>
											  <label class="control-label" for="input">New Password</label><i class="mtrl-select"></i>
											</div>		
											<a class="forgot-pwd underline" title="" href="includes/sendforget.php">Forgot Password?</a>								
											<div class="submit-btns">
												<a href="feed.php"><button type="button" class="mtr-btn"><span>Cancel</span></button></a>
												<button type="submit" name="submit" class="mtr-btn"><span>Update</span></button>
											</div>
										</form>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<?php
										include("includes/rooms.php");
									?>
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<?php
include("includes/footer.php");
?>
