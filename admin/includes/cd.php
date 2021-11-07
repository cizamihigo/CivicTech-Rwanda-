<?php session_start();
    if(isset($_POST['registerbtn']))
    {
        $description = $_POST['description'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $executor = $_POST['executor'];
        $connect = mysqli_connect("localhost", "root", "", "civictech");
    
        $Sql = "INSERT INTO `t_project`(`pro_startdate`, `pro_endate`, `pro_description`, `pro_status`) VALUES ('$start', '$end', '$description', '0')";
        $Ex = mysqli_query($connect, $Sql);
        if($Ex)
        {
            $sql = "SELECT  pro_id FROM t_project WHERE pro_startdate = '$start' AND pro_endate = '$end' AND pro_description = '$description'";
            $sqlex = mysqli_query($connect, $sql);
            $r = mysqli_fetch_array($sqlex);
            if(isset($_SESSION['id']))
            {
            $uid = $executor;
            }
            else
            {
                $uid = $executor;
            }
            
            $var = $r['pro_id'];
            $_sql = "INSERT INTO t_executor(U_id, pro_id) VALUES('$uid', '$var')";
            $_exsql = mysqli_query($connect, $_sql);
            if($_exsql){

            header("Location: ../smstwilio/index.php"); }
        }
        else{
            header("Location: ../register.php");
        }
    }

?>