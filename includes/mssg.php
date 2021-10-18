<?php
session_start();
include_once("db.php");
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $userId = $_GET['id'];
        $Session = $_SESSION['id'];

        $sql = "SELECT * FROM t_conversation WHERE (U_one ='$userId' OR U_two= '$userId') AND (U_one ='$Session' OR U_two= '$Session')";
        $execution = mysqli_query($connect, $sql);
        if($execution)
        {
            $num = mysqli_num_rows($execution);
            if($num == false)
            {
                echo("not started Conversation");
                $sql = "INSERT INTO t_conversation(U_one, U_two) VALUES ('$Session', '$userId')";
                $exec = mysqli_query($connect, $sql);
                if($exec)
                {
                    $sql = "SELECT * FROM t_conversation WHERE (U_one ='$userId' OR U_two= '$userId') AND (U_one ='$Session' OR U_two= '$Session')";
                    $execu = mysqli_query($connect, $execu);
                    $rum = mysqli_fetch_array($execu);
                    header("Location: ../messages.php?conv=".$rum['Cv_id']."");
                }
                else
                {
                    header("Location: ../friends.php");
                }

            }
            else if( $num == true)
            {
                $row = mysqli_fetch_array($execution);
                header("Location: ../messages.php?conv=".$row['Cv_id']."");
            }
        }
        else
        {
            echo("bad");
        }
    }

?>
