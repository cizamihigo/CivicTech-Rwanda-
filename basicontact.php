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
											$a = $_POST['email'];
											$b = $_POST['telephone'];
											
                                            if(!empty($a) && !empty($b))
                                            {
                                                $hsql = "UPDATE `t_user` SET `U_email`='$a',`U_telephone`='$b' WHERE L_id = '$lid'";
											    $ex = mysqli_query($connect, $hsql);
                                                if($ex)
                                                {
                                                    ?>
                                                <script type='text/javascript'>
                                                    window.location.replace("feed.php");
                                                </script>
                                                <?php

                                                }
                                                else
                                                {
                                                    echo("<p style='text-align: center; color: red'>An unexpected error occured this operation can't be performed right now!</p>");
                                                }
                                            }
                                            else if(!empty($a) && empty($b))
                                            {
                                                $hsql = "UPDATE `t_user` SET `U_email`='$a' WHERE L_id = '$lid'";
											    $ex = mysqli_query($connect, $hsql);
                                                if($ex)
                                                {
                                                    ?>
                                                <script type='text/javascript'>
                                                    window.location.replace("feed.php");
                                                </script>
                                                <?php

                                                }
                                                else
                                                {
                                                    echo("<p style='text-align: center; color: red'>An unexpected error occured this operation can't be performed right now!</p>");
                                                }
                                            }
                                            else if(!empty($b) && empty($a))
                                            {
                                                $hsql = "UPDATE `t_user` SET `U_telephone`='$b' WHERE L_id = '$lid'";
											    $ex = mysqli_query($connect, $hsql);
                                                if($ex)
                                                {
                                                    ?>
                                                <script type='text/javascript'>
                                                    window.location.replace("feed.php");
                                                </script>
                                                <?php

                                                }
                                                else
                                                {
                                                    echo("<p style='text-align: center; color: red'>An unexpected error occured this operation can't be performed right now!</p>");
                                                }
                                            }
                                            else
                                            {
                                                echo("<p style='color: green; text-align: center'> No change can be performed consider your input </p>");
                                            }

											
											
										}
									?>
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-mouse-alt"></i> Edit  contact Information</h5>
                                            <p>Enter relevent Information you want to change. if no change should be made simply leave this form. if one change only, complete only the cell provided for that information and let other empty</p>
										<form method="post" action="">
											<div class="form-group half">	
											  <input type="text" id="input" name="email"/>
											  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" name="telephone"/>
											  <label class="control-label" for="input">Telephone Number</label><i class="mtrl-select"></i>
											</div>											
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
