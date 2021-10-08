<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>CivicTech - Rwanda</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/strip.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>

<?php
    if(!isset($_SESSION['id']))
    {

  

    ?>
    <div class="topbar stick">
		<div class="logo">
			<a title="" href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		
		<div class="top-area">
			<div class="top-search">
            
			</div>
			<div class="login-form">
				<form method="post" action="">
					<input name="username" type="text" placeholder="User Name">
					<input name="password" type="password" placeholder="Passoword">
					<button type="submit" name="submit">Login</button>
				</form>
                
			</div>
           
		</div>
	</div>
	<?php
	if(isset($_POST['submit']))
	{
		include_once("db.php");
		$username = $_POST['username'];
		$sql = "SELECT * from t_login WHERE L_username='$username' LIMIT 1";
		$exec = mysqli_query($connect, $sql);
		$passhash = sha1($_POST['password']);
		$row = mysqli_fetch_array($exec);

		$test = strcmp($passhash, $row['L_password']); 
		if($test == 0)
		{
			//create session var
			$_SESSION['id'] = $row['L_id'];
			$var = $row['L_id'];
			$rwsql ="SELECT * FROM t_user WHERE L_id = '$var'";
			$exec = mysqli_query($connect, $rwsql);
			if($exec)
			{
				$rw = mysqli_fetch_array($exec);
				$_SESSION['type'] = $rwsql['UT_id'];
				$_SESSION['cell'] = $rwsql['C_id'];

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
						window.location.replace("feed.php");
					</script>
					<?php
				}
			}
			else
			{
				?> 
				<script type='text/javascript'>
					window.location.replace("register2_2.php?id=<?=$var?>");
				</script>
				<?php
			}
			
		}
		else
		{
			echo("<p style='color:red; text-align: center'>Wrong username and/or password");
		}
	}
	else
	{
		
	}
	?>
    <?php
      }
      else
      {
    ?>
	<?php
	$photovar = $_SESSION['id'];
	$photovar = $photovar.".jpg";
	$path= "images/profile/".$photovar;
	$pname = $photovar;
	if(file_exists($path))
	{
		$pname = $photovar;
	}
	else
	{
		$pname = "no.jpg";
	}  
	
?>
<div class="theme-layout">
	<div class="topbar stick">
		<div class="logo">
			<a title="" href="feed.php"><img src="images/logo.png" alt=""></a>
		</div>
		
		<div class="top-area">
			<ul class="main-menu">
				<li>
					<a href="#" title="">Home</a>
					<ul>
						<li><a href="index-2.html" title="">Home Social</a></li>
						<li><a href="index2.html" title="">Home Social 2</a></li>
						<li><a href="index-company.html" title="">Home Company</a></li>
						<li><a href="landing.html" title="">Login page</a></li>
						<li><a href="logout.html" title="">Logout Page</a></li>
						<li><a href="newsfeed.html" title="">news feed</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">Friends</a>
					<ul>
						<li><a href="friends.php" title="">Friends</a></li>
						<li><a href="timeline-friends.html" title="">timeline friends</a></li>
						<li><a href="timeline-groups.html" title="">timeline groups</a></li>
						
						<li><a href="people-nearby.html" title="">people nearby</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">account settings</a>
					<ul>
						<li><a href="Profile.php" title="">View Profile</a></li>
						<li><a href="basicprofile.php" title="">edit account information</a></li>
						<li><a href="basicontact.php" title="">edit Contacts Information</a></li>
						<li><a href="basicpassword.php" title="">edit password</a></li>
						<li><a href="basicpicture.php" title="">edit  Profile picture</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">more pages</a>
					<ul>
						<li><a href="404.html" title="">404 error page</a></li>
						<li><a href="about.html" title="">about</a></li>
						<li><a href="contact.html" title="">contact</a></li>
						<li><a href="faq.html" title="">faq's page</a></li>
						<li><a href="insights.html" title="">insights</a></li>
						<li><a href="knowledge-base.html" title="">knowledge base</a></li>
						<li><a href="widgets.html" title="">Widgts</a></li>
					</ul>
				</li>
			</ul>
			<ul class="setting-area">
				<li>
					<a href="#" title="Home" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Friend">
							<button data-ripple><i class="ti-search"></i></button>
						</form>
					</div>
				</li>
				<li><a href="newsfeed.html" title="Home" data-ripple=""><i class="ti-home"></i></a></li>
				<li>
					<a href="#" title="Notification" data-ripple="">
						<i class="ti-bell"></i><span>20</span>
					</a>
					<div class="dropdowns">
						<span>4 New Notifications</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="notifications.html" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li>
					<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
					<div class="dropdowns">
						<span>5 New Messages</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="messages.html" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
					<div class="dropdowns languages">
						<a href="#" title=""><i class="ti-check"></i>English</a>
						<a href="#" title="">Arabic</a>
						<a href="#" title="">Dutch</a>
						<a href="#" title="">French</a>
					</div>
				</li>
			</ul>
			<div class="user-img">
				<img src="images/profile/<?=$pname;?>"  alt="">
				<span class="status f-online"></span>
				<div class="user-setting">
					<?php echo("<a href= 'Profile.php?id=".  $_SESSION['id'])."'>" . "<i class='ti-user'></i> view profile</a>";?>
					<a href="editprofile.php" title=""><i class="ti-pencil-alt"></i>edit profile</a>
					<a href="#" title=""><i class="ti-target"></i>activity log</a>
					<a href="#" title=""><i class="ti-settings"></i>account setting</a>
					<a href="#" title=""><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
			
		</div>
	</div><!-- topbar -->
	<?php

	  }?>
	
	</div>

</div>
<script src="js/main.min.js"></script>
	<script src="js/backgroundVideo.js"></script>
	<script src="js/strip.pkgd.min.js"></script>
	<script src="js/script.js"></script>
	
	<script>
		jQuery(window).on('load',function() {
			"use strict";
			// video parallax for top featured
			const backgroundVideo = new BackgroundVideo('.bv-video', {
			  src: [
				'videos/video3.MP4',
			  ]
			});
		});
			
	</script>
</body>
	