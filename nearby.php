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
                                            $session = $_SESSION['id'];
                                            $sql = "SELECT * FROM t_user WHERE U_id != '$session' AND u_id  NOT IN(SELECT U_id_Sender FROM t_friend WHERE U_id_Sender = '$session') ";
                                            $sqyery = mysqli_query($connect, $sql);
                                            if($sqyery)
                                            {
                                                
                                                #$count = mysqli_num_rows($sqyery);
                                                #$r = $count;
                                                //echo($r);
                                                
                                               // $row1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM t_user"));
                                               
                                                while($row = mysqli_fetch_array($sqyery))
                                                {

                                                    $user = $row['U_id'];
                                                    
                                                    $sqelect = "SELECT * FROM t_friend WHERE (U_id_Sender= '$user' AND U_id_Receiver='$session') OR (U_id_Sender='$session' AND U_id_Receiver='$user') ";
                                                    $exe = mysqli_query($connect, $sqelect);
                                                    if($exe)
                                                    {
                                                        ?>
                                                    <li>
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
                                                        ?>
                                                        <figure>
                                                            <img src="images/profile/<?php echo($pname);?>" alt="">
                                                            
                                                        </figure>
                                                        <div class="friendz-meta">
                                                            <a href=""><?php echo($row['U_names']) ?></a>
                                                            <i><a href="" class="__cf_email__">[email&#160;Not revealed] <br> <?php echo($row["U_sex"]);?> <br> <?php echo($row["U_age"] . " Years old");?></a></i>
                                                        </div></li>
                                                        <?php
                                                        $row1 = $row['U_id'];
                                                    }
                                                    else
                                                    {
                                                        echo("Bad");
                                                    }
                                                    
                                                }
                                          


                                        ?>
                                         <?php
                                          }
                                          else
                                          {
                                              echo("bad");
                                          }
                                    // ?>
                                    </ul>
                                    <div class="chat-box">
                                        <div class="chat-head">
                                            
                                            <h6><?php echo("Send Request");?></h6>
                                            <div class="more">
                                                
                                                <span class="close-mesage"><i class="ti-close"></i></span>
                                            </div>
                                        </div>
                                        <center>
                                            <div class="chat-list">
                                               
                                                
                                                <center class="you">
                                                    <form action="includes/sendreq.php" method="get">
                                                    <select name="id" id="">
                                                        <?php
                                                            $slect = "SELECT * FROM t_user WHERE U_id != '$session'";
                                                            $ex = mysqli_query($connect, $slect);
                                                            $numr = mysqli_num_rows($ex);
                                                            
                                                            while($rrr = mysqli_fetch_array($ex)){
                                                                ?>
                                                        <option value="<?php echo($rrr['U_id'])?>"><?php echo($rrr['U_names']);?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>

                                                    <button type="submit">Send Friend Request</button></a>
                                                    </form>
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