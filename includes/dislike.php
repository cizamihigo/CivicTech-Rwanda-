<?php
    include("db.php");
session_start();
if(isset($_GET['feed']))
{
    $feed = $_GET['feed'];
    $session = $_SESSION['id'];
    $sql = "SELECT *, COUNT(*)'count' FROM t_post_like WHERE F_id = '$feed' AND U_id = '$session'";
    $exe = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($exe);
    $num = $row['count'];
    if($num < 1)
    {
        $select = "SELECT *, COUNT(*)'dislike' FROM t_post_dislike WHERE F_id = '$feed' AND U_id = '$session'";
        $exec = mysqli_query($connect, $select);
        $rr = mysqli_fetch_array($exec);
        $num = $rr['dislike'];
        //$num = mysqli_num_rows(mysqli_fetch_array($exec));
        echo($num);

        if($num < 1)
        {
            $ins = "INSERT INTO t_post_dislike(F_id, U_id) VALUES('$feed', '$session')";
            $insert = mysqli_query($connect, $ins);
            if($insert)
            {
                header("Location: ../feed.php#feed");
            }
            else
            {
                header("Location: ../feed.php#fail");
            }
        }
        else
        {
            $del = "DELETE FROM t_post_dislike WHERE F_id ='$feed' AND U_id = '$session'";
            $exdel = mysqli_query($connect, $del);
            if($exdel)
            {
                header("Location: ../feed.php#feed");
            }
        }
    }
    else
    {
        $sql = "DELETE FROM `t_post_like` WHERE F_id='$feed' AND U_id = '$session' ";
        $exe = mysqli_query($connect, $sql);
        if($exe)
        {
            $sql = "INSERT INTO t_post_dislike(F_id, U_id) VALUES('$feed', '$session')";
            $execuition = mysqli_query($connect, $sql);
            if($execuition)
            {
                header("Location: ../feed.php#feed");
            }
        }

    }
}
else
{
    if(isset($_SESSION['id']))
    {
        header("Location: ../feed.php");
    }
    else
    {
        header("Location: ../index.php");
    }
}
?>