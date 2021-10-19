<?php
    include("includes/db.php");
    include("includes/head.php");
 

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
							</div>
							<div class="col-lg-8">
								<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-users"></i> Rooms</span>
									</div>
									<ul class="nearby-contct">
                                        <?php
                                            $select = "SELECT * FROM t_room";
                                            $select_q = mysqli_query($connect, $select);
                                            while($run = mysqli_fetch_array($select_q))
                                            {
                                                if($run['Ut_id'] == 1)
                                                {
                                                    $prov= $run['Rand_id'];
                                                    $select = "SELECT * FROM t_province Where P_id = '$prov'";
                                                    $prov_q = mysqli_query($connect, $select);
                                                    $r = mysqli_fetch_array($prov_q);
                                                    ?>
                                                    <li>
											<div class="nearly-pepls">
												<figure>
													<a href="" title=""><img src="images/rooms/coat.png" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="" title=""><?php echo($run['R_name']); ?></a></h4>
													<span><?php echo($r['P_name']); ?> | Governmental Group | RW</span>
													<em>32k Members</em>
													<a href="includes/join.php?id=<?php echo($run['R_id']);?>" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li><?php
                                                }
                                                else if($run['Ut_id'] == 4)
                                                {
                                                    $prov= $run['Rand_id'];
                                                    $select = "SELECT * FROM t_cell Where C_id = '$prov'";
                                                    $prov_q = mysqli_query($connect, $select);
                                                    $r = mysqli_fetch_array($prov_q);
                                                    $var = $r['C_id'];
                                                    $session = $_SESSION['id'];
                                                    $select = "SELECT * FROM t_user WHERE U_id='$session '";
                                                    $qr = mysqli_query($connect, $select);
                                                    $rrq = mysqli_fetch_array($qr);
                                                    $var1 = $rrq['C_id'];
                                                    if($var == $var1)
                                                    {

                                                    
                                                    ?>
                                                    <li>
											<div class="nearly-pepls">
												<figure>
													<a href="" title=""><img src="images/rooms/coat.png" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="" title=""><?php echo($run['R_name']); ?></a></h4>
													<span><?php echo($r['C_name']." Cell"); ?> | Governmental Group | RW</span>
													<em>32k Members</em>
													<a href="includes/join.php?id=<?php echo($run['R_id']);?>" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li>
                                            <?php
                                                }
                                                else
                                                {

                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                  <li>
											<div class="nearly-pepls">
												<figure>
													<a href="" title=""><img src="images/rooms/group2.jpg" alt=""></a>
												</figure>
												<div class="pepl-info">
													<h4><a href="" title=""><?php echo($run['R_name']); ?></a></h4>
													<span>Private Group | Citizen Groups </span>
													<em>32k Members</em>
													<a href="includes/join.php?id=<?php echo($run['R_id']);?>" title="" class="add-butn" data-ripple="">join now</a>
												</div>
											</div>
										</li><?php

                                            }

                                            ?>
										
                                        <?php }?>
										
									</ul>
								</div><!-- photos -->
							</div>
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>