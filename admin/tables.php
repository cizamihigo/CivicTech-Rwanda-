<?php
session_start();
include_once("includes/header.php");
include_once("includes/navbar.php");

?>
     <td>
            
        <form action="" method="post">
            <input type="hidden" name="edit_id" value="">
            <button  type="submit" name="edit_btn" class="btn btn-success"> Print the reports</button>
        </form>
            
    </td>
<div class="card-body">

    <div class="table-responsive">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Names & email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sq = "SELECT * FROM t_login WHERE  UT_id= 6";
                $sql = mysqli_query(mysqli_connect("localhost","root","","civicTech"), $sq);
                if($sql){
                while ($rr = mysqli_fetch_array($sql)) {
                    # code...
                    //echo("salut");
                
                

                
            ?>
        <tr>
            <td> <?php echo($rr['L_id']);?> </td>
            <td>  <?php echo($rr['L_username']);?> </td>
            <?php $va = $rr['L_id']; 
            $v = "SELECT * FROM t_user WHERE U_id='$va'";
            $ss = mysqli_query(mysqli_connect("localhost","root","","civictech"), $v);
            $t = mysqli_fetch_array($ss); ?>
            <td> <?php echo($t['U_names']); ?>  - <?php echo($t['U_email']); ?></td>
            <td> <?php
            $var = md5($rr['L_password']);
            echo($var."***");
            // session_start();
            //echo($_SESSION['id']);
            ?></td>
        
           
        
           

        </tr>
        <?php
        // 
            }
                    
        }
        ?>
        
        </tbody>
    </table>

    </div>
</div>