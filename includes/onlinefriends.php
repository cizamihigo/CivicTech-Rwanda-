<?php
    include("db.php");
    //session_start();
?>
<aside class="sidebar static">
    <div class="widget friend-list stick-widget">
        <h4 class="widget-title">Friends</h4>
        <div id="searchDir"></div>
        <ul id="people-list" class="friendz-list">
        <?php
            $session = $_SESSION['id'];
            
            $select = "SELECT * FROM t_friend WHERE U_id_Sender = '$session' OR U_id_Receiver = '$session' AND F_is_pending = 0";
            $exec = mysqli_query($connect, $select);
            while($run = mysqli_fetch_array($exec))
            {

            
        ?>
            <li>
                
                
                <a href="messages.php"><div class="people-name">
                    <span><?php 
                        if($run['U_id_Sender'] == $session)
                        {
                            $data = $run['U_id_Receiver'];
                            $See = "SELECT * FROM t_user WHERE U_id= '$data'";
                            $Exe = mysqli_query($connect, $See);
                            $row = mysqli_fetch_array($Exe);
                            echo($row['U_names']);
                        }
                        else if($run['U_id_Receiver'] == $session)
                        {
                            $data = $run['U_id_Sender'];
                            $See = "SELECT * FROM t_user WHERE U_id= '$data'";
                            $Exe = mysqli_query($connect, $See);
                            $row = mysqli_fetch_array($Exe);
                            echo($row['U_names']);
                        }
                    ?></span>
                </div> </a>
            </li>
            <?php }?>
												
           
        </ul>
        
    </div><!-- friends list sidebar -->
</aside>
