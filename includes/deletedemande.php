<?php
    include("db.php");
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $a = $_GET['id'];
        $sql = " DELETE FROM `t_friend` WHERE F_id = '$a' ";
        ?>
            <Script>
                alert("Do you really want do delete this request");
            </Script>

        <?php
        $exec = mysqli_query($connect, $sql);
        if($exec)
        {
            header("Location: ../friends.php");
        }
        else
        {
            header("Location: ../404.php");
        }
    }
    else{
        header("Location: ../feed.php");
    }
?>
