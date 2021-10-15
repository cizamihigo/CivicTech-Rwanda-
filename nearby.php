<?php include("includes/head.php");
include("includes/db.php");
?>
<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta sidebar static">
                                    
                        
                                <div class="widget friend-list stick-widget">
                                    <h4 class="widget-title">System Users</h4>
                                    <div id="searchDir"></div>
                                    <ul id="people-list" class="friendz-list">
                                        <?php
                                            $sql = "SELECT * FROM t_user";
                                            $sqyery = mysqli_query($connect, $sql);
                                            if($sqyery)
                                            {
                                                $row1 = mysqli_fetch_array($sqyery);
                                                $count = mysqli_num_rows($sqyery);
                                                $r = $count;
                                                //echo($r);
                                                $session = $_SESSION['id'];
                                                while($r > 1)
                                                {

                                                    $user = $row1['U_id'];
                                                    $sqelect = "SELECT * FROM t_friend WHERE (U_id_Sender=$r AND U_id_Receiver='$session') OR (U_id_Sender='$session' AND U_id_Receiver='$r') ";
                                                    $exe = mysqli_query($connect, $sqelect);
                                                    if($exe)
                                                    {
                                                        ?>
                                                    <li>
                                                        <figure>
                                                            <img src="images/resources/friend-avatar.jpg" alt="">
                                                            
                                                        </figure>
                                                        <div class="friendz-meta">
                                                            <a href="time-line.html"><?php echo($row1['U_names']) ?></a>
                                                            <i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0d7c9ced4c5d2d3cfccc4c5d2e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></i>
                                                        </div>
                                                    </li>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo("Bad");
                                                    }
                                                    $r--;
                                                }
                                            }
                                            else
                                            {
                                                echo("bad");
                                            }


                                        ?>
                                    </ul>
                                    <div class="chat-box">
                                        <div class="chat-head">
                                            
                                            <h6><?php echo($row1['U_names']);?></h6>
                                            <div class="more">
                                                
                                                <span class="close-mesage"><i class="ti-close"></i></span>
                                            </div>
                                        </div>
                                        <center>
                                            <div class="chat-list">
                                                <ul>
                                                    <li class="you">
                                                        
                                                        <div class="notification-event">
                                                            <span class="chat-message-item">
                                                                <?php echo($row1['U_age'] . "  Years old"); ?> <br>
                                                                <?php echo($row1['U_sex'] . "  Person"); ?> <br>
                                                                <?php echo($row1['U_maritalstatus'] . "  as Marital status"); ?> <br>
                                                                <?php 
                                                                    $ville = $row1['C_id'];
                                                                    $SEL = "SELECT * FROM t_cell WHERE C_id = '$ville'";
                                                                    $sexec = mysqli_query($connect, $SEL);
                                                                    $ms = mysqli_fetch_array($sexec);
                                                                ?>
                                                                <?php echo($ms['C_name'] . "  is his cell"); ?> <br>
                                                            </span>
                                                            
                                                        </div>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                
                                                <center class="you">
                                                    <a href="includes/sendreq.php?id=<?php echo($row1['U_id']);?>"><button type="" class="you">Send Friend Request</button></a>
                                                </center>
                                                    
                                            
                                            </div>
                                        </center>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>	
    </div>
</section>