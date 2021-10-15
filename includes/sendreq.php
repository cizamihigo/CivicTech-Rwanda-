<?php
session_start();
$id = $_SESSION['id'];
if(isset($_GET['id']))
{
    $GETr = $_GET['id'];
}
else
{
    header("Location: ../nearby.php");
    exit();
}
include("db.php");
$date = date('Y-m-d');
var_dump($date);
$Sl = "INSERT INTO `t_friend`(`U_id_Sender`, `U_id_Receiver`, `F_date_sent`, `F_is_pending`) VALUES ('$id','$GETr','$date',1)";
$exe = mysqli_query($connect , $Sl);
if($exe)
{
    echo("DONE!!!!!!!!!!!!!!!!!!!!!!!!");
    header("Location: ../friends.php");
}
else
{
    header("Location: ../nearby.php");
}
?>
