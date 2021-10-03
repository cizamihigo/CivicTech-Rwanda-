<?php
    include("db.php");
        $var = $_POST['username'];
    var_dump($var);
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $name = htmlspecialchars($_POST["username"]);
        $password = sha1($_POST["password"]);

        //Database data insertion
         $sql = "INSERT INTO t_login(L_username, L_password, UT_id) VALUES('$name', '$password', '5')";
         $exec = mysqli_query($connect, $sql);
         var_dump($exec);
         if($exec)
         {
             header("Location: ../register2_2.php");
         }
         else
         {
            header("Location: ../register.php?page=1");
         }
    }
    else
    {
        echo("eho");
    }
?>