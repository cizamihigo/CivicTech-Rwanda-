<?php
session_start();
include("db.php");
if(isset($_GET['feed']) && !empty($_GET['feed']))
{
    $idfeed = intval($_GET['feed']) ; 
}
else
{
    header("Location: ../feed.php#Faillure");
    exit();
}
    
$date = date("Y-m-d H:i");
$sess = $_SESSION['id'];
if(isset($_POST['message']) && !empty($_POST['message']))
{
$msg = htmlspecialchars($_POST['message']);

$sq = "INSERT INTO t_post_comment(`pC_date`, `pC_content`, `U_id`, `F_id`) VALUES('$date', '$msg', '$sess', '$idfeed')";
$sqexec = mysqli_query($connect, $sq);
if($sqexec)
{
    header("Location: ../feed.php#Success");
}
else
{
    header("Location: ../feed.php#Fail");
}

}
else
{
    header("Location: ../feed.php");

}

?>