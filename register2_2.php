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
						<br> <b><br></b>
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
							  <input type="text" required="required" name= "marital"/>
							  <label class="control-label" for="input">Marital Status</label><i class="mtrl-select"></i>
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
							
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
							<a href="#" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<button class="mtr-btn signup" type="button"><span>Finish</span></button>
							</div>
						</form>
						<?php
						//
						//
						//
						//
						//
						//
						//
						//
						//
						///
						//
						//
						//
						//
						//

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