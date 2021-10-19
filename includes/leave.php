<?php
    include("db.php");
    session_start();
    $session = $_SESSION['id'];
    if(isset($_GET['id']))
    {
        $room = $_GET['id'];
        $sql = "DELETE FROM `t_participant` WHERE U_id = '$session' AND R_id='$room' ";
        $exe = mysqli_query($connect, $sql);
        if($exe)
        {
            header("Location: ../rooms.php?sucess");
        }

    }
    else
    {
        header("Location: ../rooms.php");
    }

?>