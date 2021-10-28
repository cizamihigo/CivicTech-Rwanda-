<!DOCTYPE html>
<html lang="en">

<?php
    include("includes/head.php");
    ?>
<body>


	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
                                    <?php
                                        include('includes/shortcut.php');
                                    ?>  
                                </aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
							
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<?php
                                        include("includes/onlinefriends.php");
                                    ?>
								</aside>
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

    <?php
        include("includes/footer.php");
    ?>
</div>
	
	
	<script src="js/main.min.js"></script>
	<!-- ECharts -->
    <script src="js/echarts.min.js"></script>
    <script src="js/world.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/script.js"></script>


</body>	

</html>