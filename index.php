<?php
include("includes/head.php");
?>
<section>
		<div class="getquot-baner">
			<span>New here? Register to be part of change makers</span>
			<a title="" href="register.php?page=1">Register </a>
		</div>
	</section><!-- get a quote -->
<section>
	<div class="gap100 pattern">
		<div class="bg-image" style="background-image:url(images/resources/newsletter-bg.jpg); background-repeat: no-repeat;"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="news-letter">
						<h2>Newsletter <span>Signup</span></h2>
						<span>Shortest Way To Explore What Will Happen On Enternity</span>
						<form method="post">
							<input type="text" placeholder="Please Type Email Id" class="emails">
							<button>Subscribe Now</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- news letter -->
<section>
	<div class="gap100 no-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-heading">
						<h2>Our Team</h2>
					</div>
				</div>	
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/team1.jpg" alt=""></figure>
						<div class="team-info">
							<h4>Sara Grey</h4>
							<span>Designer</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/team2.jpg" alt=""></figure>
						<div class="team-info">
							<h4>Peeter Paker</h4>
							<span>Developer</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/team3.jpg" alt=""></figure>
						<div class="team-info">
							<h4>Amy watson</h4>
							<span>Support</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/team4.jpg" alt=""></figure>
						<div class="team-info">
							<h4>jaison born</h4>
							<span>Operations</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- our team -->

<?php
	include("includes/footer.php");
?>

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

</html>