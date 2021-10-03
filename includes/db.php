<?php
$host= "localhost";
$user = "root";
$pwd = "";
$database = "civictech";

$connect = mysqli_connect($host, $user, $pwd, $database);
if($connect)
{
    //echo("COnnected");
}
else
{
    //mysqli_error($connect);
}

?>