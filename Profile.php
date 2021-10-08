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
                                    <section>
                                        <div class="feature-photo">
                                            <h4>Profile Picture</h4>
                                            <figure>
                                                <img src="images/profile/<?=$pname;?>" alt="">
                                            </figure>
                                        
                                        </div>
                                    </section>

								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-mouse-alt"></i> User General Info</h5>
                                            <p>This information is true and can be used to idenitify a citizen. Some of the data here should be kept confidential</p>
                                            <?php
                                                $lid = $_SESSION['id'];
                                                $s = "SELECT t_user.*, t_cell.C_name FROM t_user, t_cell WHERE t_user.L_id='$lid' AND t_user.C_id = t_cell.C_id";
                                                $exe = mysqli_query($connect, $s);
                                                $row = mysqli_fetch_array($exe);

                                            ?>
                                            <label for="">Full Names: </label> <b><?=$row['U_names'];?></b> <br>
                                            <label for="">Date of Bitrh: </label> <b><?php $da= strtotime($row['U_dateofbirth']);
                                            $date=date("Y/m/d", $da); 
                                            echo($date);
                                            ?></b> <br>
                                            <label for="">Age: </label> <b><?=$row['U_age'];?></b> <br>
                                            <label for="">Sex: </label> <b><?=$row['U_sex'];?></b> <br>
                                            <label for="">Marital Status: </label> <b><?=$row['U_maritalstatus'];?></b> <br>
                                            <label for=""> Citizenship: </label> <b><?=$row['U_citizenship'];?></b> <br>
                                            <b>--- Contact Information ---</b> <br>
                                            <label for="">Telephone Number: </label> <b><?=$row['U_telephone'];?></b> <br>
                                            <label for=""> Email: </label> <b><?=$row['U_email'];?></b> <br>
                                            <b>--- Address Information ---</b> <br>
                                            <label for=""> Address: </label> <b><?=$row['C_name'];?></b> <br>
                                            <center>
                                                <?php
                                                     include("includes/phpqrcode.php");
                                                     $id = $_SESSION['id'];
                                                     $a = $row['U_names'];
                                                     $b = $row['U_email'];
                                                     $c= $row['U_citizenship'];
                                                     $loc = $row['C_name'];
                                                     $file = 'images/qr/' .$id.".png";
                                                 
                                                     //echo("Click on the Qrcode to download");
                                                     Qrcode::png("Full name: $a\nEmail: $b\nCitizenship: $c\nCell/Mudugudu: $loc", $file,'L', 10);
                                                     echo("<a href='".$file."' download='MyQrcode'><center><img src='".$file."'</center></a>");
                                                ?>
                                            </center>

									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<?php
										include("includes/editprofMenu.php");
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
