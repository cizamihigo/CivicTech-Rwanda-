<?php
if(isset($_GET['ig']))
{
    $id = $_GET['ig'];
    $connect = mysqli_connect("localhost", "root", "", "civictech");

    $Sql = "DELETE FROM t_project WHERE pro_id='$id'";
    $Ex = mysqli_query($connect, $Sql);
    if($Ex)
    {
        header("Location: ../index.php");
    }
    else{
        header("Location: ../register.php");
    }
}