<?php
include("includes/head.php");
include("includes/db.php");
?>
<?php
    if(isset($_POST['rate']))
    {
        $ratedIndex = $_POST['rate'];
        $ratedIndex++;
        $session = $_SESSION['id'];
        //echo($ratedIndex);
    }
    else
    {
        echo("");
    }
    //echo("<p><br><br></p>");
?>

<div align='center'>
    <i class="fa fa-star fa-2x " data-index="0" ></i>
    <i class="fa fa-star fa-2x " data-index="1" ></i>
    <i class="fa fa-star fa-2x " data-index="2" ></i>
    <i class="fa fa-star fa-2x " data-index="3" ></i>
    <i class="fa fa-star fa-2x " data-index="4" ></i>
</div>


<script src="js/jquery.min.js"></script>
<script>

    var ratedIndex = -1;
    $(document).ready(function(){
        reset_star();
        $('.fa-star').on('click', function(){
            ratedIndex  = parseInt($(this).data('index'));
            
           
            
        });
        $('.fa-star').mouseover(function(){
            reset_star();
            var curentIndex = parseInt($(this).data('index'));
            for(var i=0; i<= curentIndex; i++ )
                $('.fa-star:eq('+i+')').css('color', 'yellow');

        });

        $('.fa-star').mouseleave(function(){
            reset_star();
            if(ratedIndex != 1)
            {
                for(var i=0; i<= ratedIndex; i++ )
                    $('.fa-star:eq('+i+')').css('color', 'yellow');
            }
            
        });
    });
    function reset_star(){
        $('.fa-star').css('color', 'Blue');
    }
  
</script>
<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row" id="page-contents">
					
					<div class="offset-lg-1 col-lg-10">
						<div class="career-page">
							<div class="carrer-title">
								<h2>Rating system <span>for project</span></h2>
								<p>Help us rate this project for better ressource management </p>
								</div>
	
								<center>
								<div class="">
									<span>Rate</span>
									<form method="POST">
                                        <select name = "rate">
                                            <option value="5">  
                                               5 (Excellent)
                                            </option>
                                            <option value="4">4 (Very good)</option>
                                            <option value="3">3 (Good)</option>
                                            <option value="2">2 (Poor)</option>
                                            <option value="1">1 (Bad)</option>
                                        </select>
                                        <button type="submit">Rate this project</button>
                                    </form>
								</div>
                                </center>
				
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php
        if(isset($_POST['rate']))
        {
            $rate = $_POST['rate'];
            //echo($rate);
            $get = $_GET['id'];
            
            $sess = $_SESSION['id'];

            $sql = "INSERT INTO t_project_rating(`U_id`, `pro_id`, `pr_rate`) VALUES('$sess', '$get', '$rate')";
            $exe = mysqli_query($connect, $sql);
            if($exe)
            {
                ?>
                <script>window.location.href = "feed.php"; </script>
                <?php
            }
        }
    ?>