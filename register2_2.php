<?php session_start();
?>
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
						if(isset($_GET['id']) && is_numeric($_GET['id'])){

						
					?>
					<div class="log-reg-area sign">
						
						<h2 class="log-title">Register</h2>
							
						<form method="post" action="">
							<div class="form-group">	
							  <input type="text" required="required" name= "names"/>
							  <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="email" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name="telephone"/>
							  <label class="control-label" for="input">Telephone</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="date" required="required" name = "dob"/>
							  <label class="control-label" for="input">Date of Birth</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <Select name="marital">
								  <option value="Maried">Maried</option>
								  <option value="Divorced">Divorced</option>
								  <option value="Separated">Separated</option>
								  <option value="Widow">Widow</option>
								  <option value="Single">Single</option>
							  </Select>
							  <label class="control-label" for="select">Marital Status</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
								<select name="cell" id="">
									<option value="" disabled='true'>------</option>
									<?php
										//fecthing cell names to put in select element as options
										include("includes/db.php");
										$sql = "SELECT * FROM t_cell ORDER BY C_name ASC";
										$exec = mysqli_query($connect, $sql);
										while($row = mysqli_fetch_array($exec))
										{
											echo("<option value='". $row['C_id']. "'>". $row['C_name'] . "</option>");
										}

									?>
								</select>
							  
							  <label class="control-label" for="select">Your cell</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name = "idnumber"/>
							  <label class="control-label" for="input">Identity Number</label><i class="mtrl-select"></i>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" checked="checked" value="Male"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" Value="Female"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
							<div class="submit-btns">
								<button class="mtr-btn" type="submit" name="submit"><span>Finish</span></button>
							</div>
						</form>
						
						<?php
						// Recuperate the data 
						if(isset($_POST['submit']))
						{
							$a = $_POST['names'];
							$b = $_POST['email'];
							$c = $_POST['telephone'];
							$ds = $_POST['dob'];
							$e = $_POST['marital'];
							$f = $_POST['idnumber'];
							$g = $_POST['radio'];
							$h = $_POST['cell'];
							
							$today = date('m/d/Y');
							$d = date_create($ds);
							$td = date_create($today);

							$age = date_diff($td, $d);
							//var_dump($age);
							$ages = ($age->format("%y"));
							//verify the Id is not manually typed and exist in database.
							if(isset($_GET['id']) && is_numeric($_GET['id']))
							{
								$id = $_GET['id'];
								$sql = "SELECT L_id, UT_id from t_login WHERE L_id = '$id' LIMIT 1";
								$ex = mysqli_query($connect, $sql);
								$rw = mysqli_fetch_array($ex);
								if(mysqli_num_rows($ex)>0)
								{
									//Data  insertion in database
									$i = $id;
									$sql = "INSERT INTO `t_user`(`U_names`, `U_dateofbirth`, `U_age`, `U_sex`, `U_maritalstatus`, `U_citizenship`, `U_idnumber`, `U_telephone`, `U_email`,`C_id`, `L_id`) VALUES ('$a', '$ds', '$ages', '$g', '$e', 'Rwandan', '$f', '$c', '$b', '$h', '$i')";
									$exec = mysqli_query($connect, $sql);
									
									if($exec)
									{
										//$cell = mysqli_fetch_array($exec);
										$_SESSION['id'] = $rw['L_id'];
										$_SESSION['type'] = $rw['UT_id'];
										$_SESSION['cell'] = $h;

										$id = $_SESSION['type'];
										if($id == '6')
										{
											?>
											<script type='text/javascript'>
												window.location.replace("admin/index.php");
											</script>
											<?php
										}
										else
										{
											?>
											<script type='text/javascript'>
												window.location.replace("site/index.php");
											</script>
											<?php
										}
										
									
									}
									else
									{
										echo("<p style='color:red'> An error occured</p>");
									}
								}
								else
								{
									echo"<p style='color:red'> You are not a well registered user. please reregister</p>";
								}
							}
							

						}	
						else
						{
							//DO nothing.
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