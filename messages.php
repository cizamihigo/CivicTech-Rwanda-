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
                                        include("includes/shortcut.php");
                                    ?>									
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="messages">
										<h5 class="f-title"><i class="ti-bell"></i>All Conversations <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
										<div class="message-box">
											<ul class="peoples">
                                            <?php
                                                $session = $_SESSION['id'];
                                                //var_dump($session);
                                                $select = "SELECT * FROM t_conversation WHERE  (U_one ='$session' OR U_two= '$session')";
                                                $exec = mysqli_query($connect, $select);
                                                while($run = mysqli_fetch_array($exec))
                                                {
                                                    if($run['U_one'] == $session)
                                                    {
                                                        $other = $run['U_two'];
                                                        $sql = "SELECT * FROM t_user WHERE U_id = '$other'";
                                                        $ee = mysqli_query($connect, $sql );
                                                        $rr = mysqli_fetch_array($ee);
                                                
                                            ?>
												<li>
													
													
													<a href="messages.php?conv=<?php echo($run['Cv_id']);  ?>&name=<?php echo($rr['U_id']); ?>"><div class="people-name">
														<span><?php echo($rr['U_names']);?></span>
													</div> </a>
												</li>
                                                <?php }
                                            else if($run['U_two'] == $session)
                                            {
                                                $other = $run['U_one'];
                                                $sql = "SELECT * FROM t_user WHERE U_id = '$other'";
                                                $ee = mysqli_query($connect, $sql );
                                                $rr = mysqli_fetch_array($ee);
                                        
                                    ?>
                                        <li>
                                            
                                            
                                            <a href="messages.php?conv=<?php echo($run['Cv_id']); ?>&name=<?php echo($rr['U_id']); ?>"><div class="people-name">
                                                <span><?php echo($rr['U_names']);?></span>
                                            </div> </a>
                                        </li>
                                        <?php
                                            }}?>
												
											</ul>
                                            <?php
                                                if(isset($_GET['conv'])  && isset($_GET['name']))
                                                {
                                                    $conv = $_GET['conv'];
                                                    if(isset($_GET['name']))
                                                    {
                                                        $name = $_GET['name'];
                                                        $sq = "SELECT * FROM t_user WHERE U_id = '$name'";
                                                        $exx = mysqli_query($connect, $sq);
                                                        $macer = mysqli_fetch_array($exx);
                                                        $path = $name . ".jpg";
                                                        $pp = "images/profile/".$path;
                                                        if(file_exists($pp))
                                                        {
                                                            $pname = $path;
                                                        }
                                                        else
                                                        {
                                                            $pname = "no.jpg";
                                                        }  
                                                    }

                                                
                                            ?>
											<div class="peoples-mesg-box">
												<div class="conversation-head">
													<figure><img src="images/profile/<?php echo($pname)?>" alt="."></figure>
													<span><?php echo($macer['U_names']) ?><i>online</i></span>
												</div>
                                                <ul class="chatting-area">
                                                <?php
                                                    $sele = "SELECT * FROM t_message_conv WHERE Cv_id = '$conv' ";
                                                    $ledi = mysqli_query($connect, $sele);

                                                    if( $ledi)
                                                    {
                                                        $lednum = mysqli_num_rows($ledi);
                                                        if($lednum < 1)
                                                        {
                                                            echo("<br><center><i>No messages Yet in this conversation.</i></center>");
                                                        }
                                                        else
                                                        {

                                                    ?>
                                                    <?php
                                                    $squery = mysqli_query($connect, "SELECT *  FROM t_message_conv WHERE Cv_id = '$conv' ORDER BY Mc_date ASC ");
                                                    if($squery)
                                                    {
                                                        while($line = mysqli_fetch_array($squery))
                                                        {
                                                            if($line['Mc_sender'] == $_SESSION['id'])
                                                            {
                                                               
                                                                ?>
                                                    <li class="me">
														<p><?php echo($line['Mc_message'])?>
                                                       <span style="color: blue"><i><?php
                                                       $dd = date( $line['Mc_date']); 
                                                        echo($dd)?></i></span> </p>

													</li>
                                                                <?php
                                                            }
                                                            else{

                                                            
                                                        
                                                    
                                                    ?>
													<li class="you">
														<p><?php echo($line['Mc_message'])?>
                                                        
                                                        <span style="color: blue"><i><?php echo($line['Mc_date'])?></i></span></p>
													</li>
													

                                                    <?php  } }}
                                                      }
                                                    }
                                                ?>
													
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
                                                            
                                                            $nameother = $_GET['name'];
                                                            $conv = $_GET['conv'];
                                                            $namethis = $_SESSION['id'];

                                                            //request
                                                            $sql = "INSERT INTO t_message_conv(`Mc_sender`, `Mc_receiver`, `Mc_message`, `Mc_date`, `Cv_id`) VALUES('$namethis', '$nameother', '$text', '$date', '$conv')";
                                                            $exe = mysqli_query($connect, $sql);
                                                            echo("sent");
                                                        }
                                                    ?>
												</div>
											</div>
                                            <?php
                                                }
                                                else
                                                {
                                                    echo("No conversation started Yet");
                                                }
                                            ?>
										</div>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								
                                        <?php
                                            include("includes/onlinefriends.php"); 
                                        ?>
									
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
