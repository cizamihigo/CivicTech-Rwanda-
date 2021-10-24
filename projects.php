<!DOCTYPE html>
<html lang="en">

<?php
    //session_start();
    include("includes/db.php");
    include("includes/head.php");
?>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">

	
	<div class="topbar transparent">
		
	</div><!-- topbar transparent header -->
	
	<section>
		<div class="ext-gap bluesh high-opacity">
			<div class="content-bg-wrap" style="background: url(images/resources/animated-bg2.png)"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="top-banner">
							<h1>Open Community Projects</h1>
							<nav class="breadcrumb">
							  <a class="breadcrumb-item" href="feed.php">Home</a>
							  <span class="breadcrumb-item active">Forum</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area animated -->
	
	<section>
		<div class="gap100">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="forum-warper">
							
						</div>
						<div class="forum-open">
							<h5 class=""><i class="fa fa-star"></i> You can rate project realization once decleared as finished</h5>
							<table class="table table-responsive">
                            <?php
                                    $query ="SELECT t_project.*, t_executor.U_id, t_user.U_names FROM t_project, t_executor, t_user WHERE t_project.pro_id = t_executor.pro_id AND t_executor.U_id = t_user.U_id";
                                    $sqlexecution = mysqli_query($connect, $query);
                                    if($sqlexecution)
                                    {
                                        if(mysqli_num_rows($sqlexecution) < 1)
                                        {

                                        }
                                        else
                                        {
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th>Executor</th>
                                                    <th>Execution Time</th>
                                                    <th>Description</th>
                                                    <th>Evolution</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                       // echo("not");
                                    }
                                ?>
								
                                
								<tbody>
                                    <?php
                                        $ss = $_SESSION['id'];
                                        while($row = mysqli_fetch_array($sqlexecution))
                                        {
                                            
                                            $qq = $row['U_id'];
                                            $sele = "SELECT U_names FROM t_user WHERE U_id = '$qq' ";
                                            $vq = mysqli_query($connect, $sele);
                                            $rd = mysqli_fetch_array($vq);
                                            if($row['U_id'] == $_SESSION['id'])
                                            {
                                                $car = "<p><a style='color: blue'> set Finish</a> | <a style='color: green'>Evolution</a></p>";
                                            }
                                            else
                                            {
                                                $car = "";
                                            }
                                    ?>
									<tr>
										<td class="topic-data">
											<img src="images/resources/forum-author1.png" alt="">
											<span><?php echo($rd['U_names']);?></span>
											<em>Leader</em>
										</td>
										<td class="date-n-reply">
											<span>from <?php echo($row['pro_startdate']); ?> To  <?php echo($row['pro_endate']); ?></span>
											<a href="#" title=""><?php echo($car);?></a>
										</td>
										<td>
											<p> <?php echo($row['pro_description']);?></p>
										</td>
                                        <td>
											<p> <?php echo($row['pro_evolution']);?></p>
										</td>
                                        <td>
											<p> <?php if($row['pro_status'] == 1)
                                            {
                                                echo("evaluation not ready");
                                            }
                                            else
                                            {
                                                
                                                $pro = $row['pro_id'];
                                                $seval = "SELECT U_id FROM t_project_rating WHERE U_id = '$ss' AND pro_id = '$pro'";
                                                $execc = mysqli_query($connect, $seval);
                                                if(mysqli_num_rows($execc) < 1)
                                                {
                                                echo("<a href='eval.php?id=". $row['pro_id']."' style='color: blue'>Evaluate</a>");
                                                } else
                                                {
                                                    echo("Already done");
                                                }
                                            }?></p>
										</td>
									</tr>
                                    <?php

                                        }
                                    ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-3">
						<aside class="sidebar static">
                            <?php
                                include("includes/shortcut.php");
                            ?>							
						</aside>	
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	
</div>
	
	
	<script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>	

</html>