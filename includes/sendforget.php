<?php
session_start();
    if(isset($_SESSION['id']))
    {
        $lid = $_SESSION['id'];
        echo($lid);
        echo("\n");
        $tokeylong = 30;
        $key = "";
        for($i =1; $i<$tokeylong; $i++)
        {
            $key .= mt_rand(0, 9);
        }
        include("db.php");
        $date = date("Y-m-d");
        $sq = "INSERT INTO `t_token`(`T_token`, `T_date`, `L_id`) VALUES ('$key','$date','$lid')";

        //echo($date . " - ". $key);

        $exec = mysqli_query($connect, $sq);
        if($exec)
        {
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From: "CivicTechRwanda.com"<support@civictech.com>'."\n";
            $header .= 'Content-Type: text/html; charset="utf-8'."\n";
            $header .= 'Content-Transfer-Encoding: 8bit';
        
            $message= '
                <html>
                    <body>
                    <p align="Center"> <h3><u>Civic Tech Rwanda: Password Reset</u></h3> <p>
                    <aside>
                        <div style="color:green">
                            CIVIC TECH RWANDA.<br>
                            It seems you have lost you password. 
                            <p> Don\'t Worry The problem will be solved by clicking on this link
                            </div>
                    </aside>
                   
                    <p> This is an opportunity for you to reset your password.<br> this email is sent only to you and will expire after one day</p>
                        <div align="center">
                            <a href= "http://localhost:8080/civicTech/forgetpass.php?token='.urlencode($key).'"> Click this link to change Your password</a>
                        </div>
                        <p>------------------------------------------------------------------</p>
                        <b> Creator: Ciza Mihigo Christian Rodrigue</b> <br>
                        <p> Student In: <b>Y3/CS/D</b> <br>
                            Rollnumber: <b>201810473<b> <br>
                            ---------------------------- <br>
                            <h3>cizamihigochristian@gmail.com</h3> is coder/developer email address.
                         </p>
                    </body>
                </html>
            ';
            mail("cizamihigochristian@gmail.com", "Passowrd resset -  CivicTech Rwanda", $message, $header);
            
            header("Location: ../forgetpass.php");


        }
      


    }
    else
    {
        echo("<a href='../index.php'><button>Leave this page</button></a>");
    }
   
?>
  