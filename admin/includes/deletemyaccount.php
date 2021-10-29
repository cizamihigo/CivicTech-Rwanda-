<?php
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $dd = $_GET['id'];
        $sql = " UPDATE `t_login` SET `UT_id`= 5 WHERE L_id = '$dd' ";
        $seexc = mysqli_query(mysqli_connect("localhost", "root", "", "civictech"), $sql);

        if($seexc)
        {
            header("Location: ../register.php");
            session_start();

            if($dd == $_SESSION['id'])
            {
                session_unset();
                session_destroy();
                header("Location: ../../index.php");
            }
        }
        else
        {
            header("Location: ../index.php");
        }
    }

?>