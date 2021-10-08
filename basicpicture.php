<?php
    include("includes/head.php");
?>

<section>
    <div class="feature-photo">
        <figure><img src="images/resources/timeline-1.jpg" alt=""></figure>
        <div class="add-btn">
            
        </div>
        
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="images/profile/<?=$pname;?>" alt="">
                            <form class="edit-phto" action="includes/editp.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="Send"/>
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    <input type="submit" name="submit" class="btn" value="Edit Display Photo"></input>
                                    
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5><?php
                                include("includes/db.php");
                                $lid = $_SESSION['id'];
                                $SE = "SELECT * FROM t_user WHERE L_id ='$lid'";
                                $exe = mysqli_query($connect, $SE);
                                $row = mysqli_fetch_array($exe);
                                echo($row['U_names']);
                                
                                ?></h5>
                                <span><?= "".  $row['U_telephone'] ."-". $row['U_email']?></span>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>