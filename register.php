<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Civic-Tech </h1>
						<p>
							Civic-tech Rwanda An initiative made by africans for africa
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Contribute to country development</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<?php
						if(isset($_GET['page']) && $_GET['page']== 1){

						
					?>
					<div class="log-reg-area sign">
						<h2 class="log-title">Register 1/2</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
						<form method="POST" action="">
							<div class="form-group">	
							  <input type="text" id="input" name="username" required="required"/>
							  <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" name="password" required="required"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<a href="login.php" title="" class="forgot-pwd">Already have an account?</a>
							<div class="submit-btns">
								
								<button class="btn"  type="submit"><span>Register</span></button>
							</div>
						</form>
						<?php
							include("includes/db.php");
							
							if(isset($_POST['username']) && isset($_POST['password']))
							{
								$name = htmlspecialchars($_POST["username"]);
								$password = sha1($_POST["password"]);
								//Database operation check
								$usercheck = "SELECT * FROM t_login WHERE L_username = '$name'";
								$execcheck = mysqli_query($connect, $usercheck);
								if(mysqli_num_rows($execcheck)>0)
								{
									echo("<p style='color:red'> Username Already used. please choose another one</p>");
								}
								else
								{
									//Database data insertion
									$sql = "INSERT INTO t_login(L_username, L_password, UT_id) VALUES('$name', '$password', '5')";
									$exec = mysqli_query($connect, $sql);
									//var_dump($exec);
									if($exec)
									{
										//fetching user id from database
										$sql ="SELECT * FROM t_login WHERE L_username ='$name' and L_password='$password' LIMIT 1";
										$exec = mysqli_query($connect, $sql);
										$row = mysqli_fetch_array($exec);
										$passing = "register2_2.php?id=".$row["L_id"];
										header("Location: $passing");
									}
									else
									{
										echo("<p style='color:red'>A Basic error occured!!! Try again</p>");
									}
								}
							}
							else
							{
								echo("");
							}
						?>
					</div>
				
					
					<?php }
					else
					{
						?>
					<div class="log-reg-area sign">
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Civic-tech  Yet? <a href="#" title="">Take the tour</a> or <a href="register.php?page=1" title="">Join now</a>
							</p>
						
					</div>
						<?php
					}?>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>	

</html>