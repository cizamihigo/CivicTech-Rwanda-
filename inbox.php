<?php
    include("includes/head.php");
    include("includes/db.php");
    if(isset($_GET['room']) && is_numeric($_GET['room']))
    {
        $room = $_GET['room'];
        $sql = "SELECT * FROM t_room WHERE R_id = '$room'";
        $ex = mysqli_query($connect, $sql);
        $row1 = mysqli_fetch_array($ex);

    

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
											<div class="inbox-navigation">
												<div class="inbox-panel-head">
													<img alt="" src="images/rooms/coat.png">
													<h1><i><?php echo($row1['R_name']);?></i> </h1>
													<a title="" href="profile.php"><i class="fa fa-user"></i>Leader: </a>
													<ul>
														<li><a class="compose-btn" title="" href="#">Compose</a></li>
													</ul>
												</div><!-- Inbox Panel Head -->
												<p>
                                                    <ul>
                                                        <li> <?php echo($row1['R_description']);?></li>
                                                    </ul>
                                                </p>
												
											</div>
										</div>
										<div class="col-lg-9 col-md-9 col-sm-8">
											<div class="inbox-lists">
												<div class="inbox-action">
													<ul>
														<li><a href="includes/leave.php?id=<?php echo($room);?>" class="delete-email" title=""><i class="fa fa-trash-o"></i> Leave Room</a></li>
														<li><a href='' title=""><i class="fa fa-refresh"></i> Refresh</a></li>
													</ul>
												</div>
                                                <center>
													<div class="peoples-mesg-box">
												
                                                        <ul class="chatting-area">
                                                            <?php
                                                                $sql1 = "SELECT * FROM t_room_message WHERE R_id= '$room' ORDER BY Rm_date ASC";
                                                                $query1 = mysqli_query($connect, $sql1);
                                                                //$fect = mysqli_fetch_array($query1);
                                                                $numrows = mysqli_num_rows($query1);
                                                                if($numrows < 1)
                                                                {
                                                                    echo("<center><span><i>No message To show here right now</center></span></i>");
                                                                }
                                                                else
                                                                {
                                                                    while($row2 = mysqli_fetch_array($query1))
                                                                    {
                                                                        $sessions = $_SESSION['id'];
                                                                        if($row2['U_id'] == $sessions)
                                                                        {
                                                                            //echo("good");
                                                                        

                                                                    
                                                                
                                                            ?>
                                                    
                                                            <li class="me">
                                                                <p><?php echo($row2['Rm_message']);?>
                                                            <span style="color: blue"><i><?php echo($row2['Rm_date']);?></i></span> </p>

                                                            </li>
                                                                
                                                            <?php }
                                                            else
                                                            {
                                                                ?>
                                                                <li class="you">
                                                                    <?php
                                                                        $id  = $row2['U_id'];
                                                                        $sql2 = "SELECT * FROM t_user WHERE U_id = '$id'";
                                                                        $exss = mysqli_query($connect, $sql2);
                                                                        $row3 = mysqli_fetch_array($exss);
                                                                        $name = $row3['U_names'];                                                                    ?>
                                                                    <p>-<?php echo($name)?>-<br><?php echo($row2['Rm_message']);?>
                                                                    <span style="color: blue"><i><?php echo($row2['Rm_date']);?></i></span> </p>

                                                                </li>
                                                                <?php   
                                                            }
                                                                    }
                                                        }?>
                                                                    
                                                        </ul>
                                                        <div class="message-text-container">
                                                            <form method="post" action="">
                                                                <textarea name='msg'></textarea>
                                                                <button type='submit' name='send' title="send"><i class="fa fa-paper-plane"></i></button>
                                                            </form>
                                                            <?php
                                                                if(isset($_POST['send']))
                                                                {
                                                                    $var = $_POST['msg'];
                                                                    $text = htmlspecialchars($var);
                                                                    $date = date('Y-m-d H:i:s');
                                                                    
                                                                    
                                                                    $namethis = $_SESSION['id'];

                                                                    //request
                                                                    $sql = "INSERT INTO t_room_message(`Rm_message`,`Rm_date`,`U_id`,`R_id`) VALUES('$text', '$date', '$namethis', '$room')";
                                                                    $exe = mysqli_query($connect, $sql);
                                                                    echo("");
                                                                }
                                                            ?>
                                                        </div>
											        </div>
                                                </center>
												
											</div><!-- Inbox lists -->
										</div>
									</div>
								</div>
							</div>
                        
                    
			        <div class="col-lg-3">
								<aside class="sidebar static">
									<?php
                                        include("includes/shortcut.php");
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
    }
    else{

    }
?>