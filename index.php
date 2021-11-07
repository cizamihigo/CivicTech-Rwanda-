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
							<br>
						<h2>Key features</h2>
					</div>
				</div>	
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/bloglist-1.jpg" alt=""></figure>
						<div class="team-info">
							<h4>Citizen collaboration</h4>
							<span>both government and citizen</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/blog-detail2.jpg" alt=""></figure>
						<div class="team-info">
							<h4>Project evaluation</h4> <br><br><br>
							<span>By citizens</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/btm-baner-avatar.png" alt=""></figure>
						<div class="team-info">
							<h4>Support and communication</h4>
							<span>citizens & government</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="our-teambox">
						<figure><img src="images/resources/bloglist-3.jpg" alt=""></figure>
						<div class="team-info">
							<h4>just relax</h4>
							<span>your voice counts</span>
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