<?php
include("db.php");
    session_start();
    if(isset($_POST['send']))
    {
        if(isset($_FILES['Send']['tmp_name']) && !empty($_FILES['Send']['tmp_name']) && !isset($_POST['text']) && empty($_POST['text']))
        {
            include("../wimage/WideImage.php");
            $filename = $_FILES['Send']['name'];
            $ext = strtolower(substr(strrchr($filename, '.'), 1));
            $image_name = $filename. '.';
            $image = WideImage::load($_FILES['Send']['tmp_name'])->resize(870, 470);
            //$image->resize(200,300);
            $image->saveToFile("../images/feed/" . $image_name."jpg");
            $nim = $image_name."jpg";
            $userid = $_SESSION['id'];
            $sql = "INSERT INTO t_feed(`F_description`, `F_picture`, `U_id`) VALUES('', '$nim', '$userid')";
            $exe = mysqli_query($connect, $sql);
            if($exe)
            {
                echo("Done!");
                header("Location: ../feed.php");
            }
            else
            {
                header("Location: ../feed.php?notdone");
            }
               
        }
        else if(isset($_POST['text']) && !empty($_POST['text']) && empty($_FILES['Send']['tmp_name']) || !isset($_FILES['Send']['tmp_name']))
        {
            //var_dump($_POST['text']);

            $userid = $_SESSION['id'];
            if(isset($_POST['text']))
            {
                $text = $_POST['text'];
            }
            else
            {
                $text = "";
            }
            $sql = "INSERT INTO t_feed(`F_description`, `F_picture`, `U_id`) VALUES('$text', '', '$userid')";
            $exe = mysqli_query($connect, $sql);
            if($exe)
            {
                echo("Done!");
                header("Location: ../feed.php");
            }
            else
            {
                header("Location: ../feed.php?NOTDONE");
            }

            
        }
        else if(isset($_FILES['Send']['tmp_name']) && !empty($_FILES['Send']['tmp_name']) && isset($_POST['text']) && !empty($_POST['text']))
        {   

            include("../wimage/WideImage.php");
            $filename = $_FILES['Send']['name'];
            $ext = strtolower(substr(strrchr($filename, '.'), 1));
            $image_name = $filename. '.';
            $image = WideImage::load($_FILES['Send']['tmp_name'])->resize(870, 470);
            //$image->resize(200,300);
            $image->saveToFile("../images/feed/" . $image_name."jpg");
            
            $nim = $image_name."jpg";

            $userid = $_SESSION['id'];
            if(isset($_POST['text']))
            {
                $text = $_POST['text'];
            }
            else
            {
                $text = "";
            }

            $sql = "INSERT INTO t_feed(`F_description`, `F_picture`, `U_id`) VALUES('$text', '$nim', '$userid')";
            $exe = mysqli_query($connect, $sql);
            if($exe)
            {
                echo("Done!");
                header("Location: ../feed.php");
            }
            else
            {
                header("Location: ../feed.php?ECHECH");
            }


        }
    }

?>