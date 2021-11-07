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
                                    $lid= $_SESSION['id'];
                                    $query = "SELECT * FROM t_friend WHERE U_id_Sender= '$lid' OR U_id_Receiver= '$lid'";
                                    $exe = mysqli_query($connect, $query);
                                    //$data = mysqli_fetch_array($exe);
                                    
                                    //var_dump($var);
                                    $user_check[]=$_SESSION['id'];
                                    
                                ?>
                            </aside>
                        </div>
                        <div class="col-lg-9">
                            <div class="central-meta">
                                <div class="frnds">
                                    <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">Friends</a> <span>55</span></li>
                                            <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friends Requests</a><span>60</span></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active fade show " id="frends" >
                                            <ul class="nearby-contct">
                                                <?php
                                                    $va= 0;
                                                    while($data = mysqli_fetch_array($exe))
                                                    {
                                                        $var = mysqli_num_rows($exe);
                                                        $uid = $data['U_id_Receiver'];
                                                        $sql ="SELECT * FROM t_user WHERE U_id='$uid'";
                                                        $exec = mysqli_query($connect, $sql);
                                                        $User = mysqli_fetch_array($exec);
                                                        if($data['U_id_Sender'] == $lid)
                                                        {
                                                            $user_check[] = $data['U_id_Sender'];
                                                            
                                                            ?>
                                                            <li>
                                                                <div class="nearly-pepls">
                                                                    <figure>
                                                                    <?php
                                                                        $varphot = $User['U_id'];
                                                                        $varphoto = $varphot.".jpg";
                                                                        $njiya= "images/profile/".$varphoto;
                                                                        $something = $varphoto;
                                                                        if(file_exists($njiya))
                                                                        {
                                                                            $something = $varphoto;
                                                                        }
                                                                        else
                                                                        {
                                                                            $something = "no.jpg";
                                                                        }  
                                                                        //var_dump($something);
                                                                        
                                                                    ?>
                                                                    <a href="profile.php?id=<?php echo($varphot);?>" title=""><img src="images/profile/<?php echo($something);?>" alt=""></a>
                                                                    </figure>
                                                                    <div class="pepl-info">
                                                                        <h4><a href="time-line.html" title=""><?=$User['U_names']?></a></h4>
                                                                        <span><?=$User['U_about']?></span>
                                                                        <?php 
                                                                            if($data['F_is_pending'] == true)
                                                                            {
                                                                                ?>
                                                                                <a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                                                                <?php
                                                                            }
                                                                            else{

                                                                            
                                                                        ?>
                                                                        <a href="includes/unfriend.php?id=<?php echo($data['F_id']);?>" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                                                        <a href="includes/mssg.php?id=<?php echo($User['U_id'])?>" title="" class="add-butn" data-ripple="">Message</a> <?php }?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                    <?php
                                                        }
                                                        else
                                                        {
                                                            
                                                            $sid = $data['U_id_Sender'];
                                                            $user_check[] = $sid;
                                                            $sql ="SELECT * FROM t_user WHERE U_id='$sid'";
                                                            $exec = mysqli_query($connect, $sql);
                                                            $rec = mysqli_fetch_array($exec);
                                                            if($data['F_is_pending'] == false)
                                                            {
                                                                ?>
                                                                <li>
                                                                <div class="nearly-pepls">
                                                                    <figure>
                                                                    <?php
                                                                        $varphot = $rec['U_id'];
                                                                        $varphoto = $varphot.".jpg";
                                                                        $njiya= "images/profile/".$varphoto;
                                                                        $something = $varphoto;
                                                                        if(file_exists($njiya))
                                                                        {
                                                                            $something = $varphoto;
                                                                        }
                                                                        else
                                                                        {
                                                                            $something = "no.jpg";
                                                                        }  
                                                                        //var_dump($something);
                                                                        
                                                                    ?>
                                                                    <a href="profile.php?id=<?php echo($varphot);?>" title=""><img src="images/profile/<?php echo($something);?>" alt=""></a>
                                                                    </figure>
                                                                    <div class="pepl-info">
                                                                        <h4><a href="time-line.html" title=""><?=$rec['U_names']?></a></h4>
                                                                        <span><?=$rec['U_about']?></span>
                                                                        <?php 
                                                                            if($data['F_is_pending'] == true)
                                                                            {
                                                                                ?>
                                                                                <a href="#" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                                                                <?php
                                                                            }
                                                                            else{

                                                                            
                                                                        ?>
                                                                        <a href="includes/unfriend.php?id=<?php echo($data['F_id']);?>" title="" class="add-butn more-action" data-ripple="">unfriend</a>
                                                                        <a href="includes/mssg.php?id=<?php echo($rec['U_id'])?>" title="" class="add-butn" data-ripple="">Message</a> <?php }?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                                <?php
                                                                            }
                                                                        }

                                                    
                                                                        ?>
                                                                    
                                                                    <?php
                                                                    //$i++;
                                                                    $va++;
                                                    }
                                                                    // echo("<br/>");
                                                                    ?>
                                            
                                            </ul>
                                        </div> 
                                        <div class="tab-pane fade" id="frends-req" >
                                            
                                            <ul class="nearby-contct">
                                                <?php 
                                                    for($i=0; $i<$var; $i++ )
                                                    {
                                                        $sid = $data['U_id_Sender'];
                                                        $user_check[] = $sid;
                                                        $sql ="SELECT * FROM t_user WHERE U_id='$sid'";
                                                        $exec = mysqli_query($connect, $sql);
                                                        $sender = mysqli_fetch_array($exec);
                                                        if($data['F_is_pending'] == true && $data['U_id_Receiver'] == $lid)
                                                        {

                                                        
                                                    
                                                ?>
                                                <li>
                                                    <div class="nearly-pepls">
                                                        <figure>
                                                        <?php
                                                            $varphot = $sender['U_id'];
                                                            $varphoto = $varphot.".jpg";
                                                            $njiya= "images/profile/".$varphoto;
                                                            $something = $varphoto;
                                                            if(file_exists($njiya))
                                                            {
                                                                $something = $varphoto;
                                                            }
                                                            else
                                                            {
                                                                $something = "no.jpg";
                                                            }  
                                                            //var_dump($something);
                                                            
                                                        ?>
                                                        <a href="profile.php?id=<?php echo($varphot);?>" title=""><img src="images/profile/<?php echo($something);?>" alt=""></a>
                                                        </figure>
                                                        <div class="pepl-info">
                                                            <h4><a href="time-line.html" title=""><?=$sender['U_names']?></a></h4>
                                                            <span><?=$sender['U_about']?></span>
                                                        
                                                            <a href="includes/deletedemande.php?id=<?php echo($data['F_id']);?>" title="" class="add-butn more-action" data-ripple="">delete Request</a>
                                                            <a href="includes/confirmdemande.php?id=<?php echo($data['F_id']);?>" title="" class="add-butn" data-ripple="">Confirm</a><?php }?>
                                                        </div>
                                                    </div>
                                                        
                                                </li>	
                                                <?php
                                                        
                                                    }
                                                ?>
                                            </ul>	
                                            <button class="btn-view btn-load-more"></button>
                                        </div>
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
    