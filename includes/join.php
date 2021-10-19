<?php
    include("db.php");
    session_start();
    if(isset($_GET['id']) and is_numeric($_GET['id']))
    {
        $session = $_SESSION['id'];
        $rid = $_GET['id'];
        $sql = "SELECT * FROM t_participant WHERE R_id = '$rid' AND U_id = '$session'";
        $exe = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($exe);

        if($num < 1)
        {
            $sql = "INSERT INTO t_participant( `R_id`, `U_id`) VALUES('$rid', '$session')";
            $ex = mysqli_query($connect, $sql);
            if($ex)
            {
                header("Location: ../inbox.php?room=$rid");
            }
        }
        else
        {
            header("Location: ../inbox.php?room=$rid");

        }

    }

?>