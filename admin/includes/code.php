<?php
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $email = $_POST['email'];
    if($password == $_POST['confirmpassword']){
        //code
        $password = sha1($password);
        $sql = "INSERT INTO t_login(L_username, L_password, UT_id) values('$username', '$password', 6 )";
        $ex = mysqli_query(mysqli_connect("localhost", "root", "", "civictech"), $sql);
        if($ex)
        {
            $sql = "SELECT L_id FROM t_login WHERE L_password = '$password' AND L_username = '$username' ";
            $ex = mysqli_query(mysqli_connect("localhost", "root", "", "civictech"), $sql);
            if($ex)
            {
                $row = mysqli_fetch_array($ex);
                $lid = $row['L_id'];
                $dt = date('Y-m-d');
                $name = "Admin".$lid;
                $sql = "INSERT INTO t_user(U_email, C_id, L_id, U_dateofbirth, U_names) values('$email',  '1', '$lid', '$dt', '$name' )";
                $ex = mysqli_query(mysqli_connect("localhost", "root", "", "civicTech"), $sql);
                if($ex)
                {
                    echo("Done");
                    header("Location: ../index.php?success+OK");
                }
                else
                {
                    echo "grave maake";
                }
            }
            else{
                header("Location: ../register.php?error+usernot_inserted");
            }
        }
        echo("mistake");
    }
    else
    {
        header("Location: ../register.php?error+passwords are differents");
    }


}

?>