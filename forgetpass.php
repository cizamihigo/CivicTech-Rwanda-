<?php
include("includes/head.php");
include("includes/db.php");
$lid = $_SESSION['id'];


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
                                            if(isset($_GET['token']))
                                            {
                                                $token = $_GET['token'];

                                           
                                    ?>
									
                                    <?php
                                        $SEL = "SELECT * FROM t_token WHERE T_token = '$token' AND T_used= 0";
                                        $exec = mysqli_query($connect, $SEL);
                                        if($exec)
                                        {
                                            $row = mysqli_fetch_array($exec);
                                            $datedb = $row['T_date'];
                                            $date = date("Y-m-d");
                                            $dateone = "".$datedb."";
                                            $datetwo = "".$date."";
                                            if($dateone == $datetwo)
                                            {
                                                ?>
                                                <div class="editing-info">
                                                    <h5 class="f-title"><i class="ti-lock"></i> Edit  Current Password </h5>
                                                        <p>You will be using the token valid For 1 fullday. After this time passed, the system will no longer accept the token received via mail</p>
                                                        <div class="form-group ">
                                                        <form method="post" action="">	
                                                        <input type="password" name="New"/>
                                                        <label class="control-label" for="input">New Password</label><i class="mtrl-select"></i>
                                                        </div>		
                                                        <div class="submit-btns">
                                                            <a href="feed.php"><button type="button" class="mtr-btn"><span>Cancel</span></button></a>
                                                            <button type="submit" name="submit" class="mtr-btn"><span>Update</span></button>
                                                        </div>
                                                    </form>
                                                </div>


                                               
                                    <?php
                                            } else
                                        {
                                            echo("<div class='editing-info'><p align='center'>Nothing to show because no token is setted</p></div>");
                                        }
                                    ?>
                                    
								</div>	
                                <?php
                                                //echo("The request is still valid");
                                                
                                                if(isset($_POST['submit']))
                                                {
                                                    $new = $_POST["New"];
                                                    $New = sha1($new);
                                                    $SeL = "UPDATE t_login SET L_password='$New' WHERE L_id='$lid'";
                                                    $ex = mysqli_query($connect, $SeL);
                                                    if($ex)
                                                    {
                                                        $SEL= "UPDATE t_token SET T_used = 1 WHERE L_id = '$lid'";
                                                        $exec = mysqli_query($connect, $SEL);
                                                        ?>
                                                        <script type='text/javascript'>
                                                            window.location.replace("feed.php");
                                                        </script>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo("error occured");
                                                    }
                                                }
                                                else
                                                {
                                                    echo("");
                                                }
                                            }
                                            else
                                            {
                                                echo("<div class='editing-info'><p align='center'>This token is no longer usable. because you passed the valid day.</p></div>");
                                            }
                                        }
                                    ?>
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
