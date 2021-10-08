<?php
    include("includes/head.php");
    include("includes/db.php");
?>

<?php
	$lid = $_SESSION['id'];
	$s = "SELECT * FROM t_interest WHERE L_id = '$lid'";
	$ex = mysqli_query($connect, $s);
	if(mysqli_num_rows($ex) > 0)
	{
		$exis = 1;

		$row= mysqli_fetch_array($ex);
		$iid = $row['I_id'];
		$prov = $row['I_province'];
		$dist = $row['I_district'];
		$sect = $row['I_sector'];
		$cell = $row['I_cell'];
		if($prov == '1')
		{
			$isvalid_prov= "checked= 'true' Value = '1'";
		}
		else
		{
			$isvalid_prov ="";
		}
		// for district Now
		if($dist == '1')
		{
			$isvalid_dist= "checked= 'true' Value = '1'";
		}
		else
		{
			$isvalid_dist ="";
		}
		//for sector
		if($sect == '1')
		{
			$isvalid_sect= "checked= 'true' Value = '1'";
		}
		else
		{
			$isvalid_sect ="";
		}
		//for cell
		if($cell == '1')
		{
			$isvalid_cell= "checked= 'true' Value = '1'";
		}
		else
		{
			$isvalid_cell ="";
		}
	}
	else
	{
		$exis = 0;
		echo("");
		$isvalid_prov = "";
		$isvalid_dist = "";
		$isvalid_sect = "";
		$isvalid_cell = "";
	}
?>
<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-3">
							<aside class="sidebar static">
								<p>
									Hey there. Hope you are doing extremly fine.
									this is to tell you a little bit about interests if this is the first time for you here.

									<br>
								</p>										
							</aside>
						</div><!-- sidebar -->
						<div class="col-lg-6">
						<div class="central-meta">
							<div class="onoff-options">
								<h5 class="f-title"><i class="ti-settings"></i>My Interests</h5>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
								<form method="post" action="">
									<div class="setting-row">
										<span>Province: city of Kigali</span>
										<p>Enable this if you want to get informed, have friends from every where in the province</p>
										<input type="checkbox" id="switch00" name="prov"  <?php echo($isvalid_prov)?> /> 
										<label for="switch00" data-on-label="ON" data-off-label="OFF"></label>
									</div>
									<div class="setting-row">
										<span>Enable district</span>
										<p>Enable this if you want to get informed, have friends from every where in you respective district</p>
										<input type="checkbox" id="switch01" name="dist" <?php echo($isvalid_dist)?> /> 
										<label for="switch01" data-on-label="ON" data-off-label="OFF"></label>
									</div>
									<div class="setting-row">
										<span>Enable Sector</span>
										<p>Receive information related to my sector and participate at sector level to decision making</p>
										<input type="checkbox" id="switch02" name="sect"  <?php echo($isvalid_sect)?>/> 
										<label for="switch02" data-on-label="ON" data-off-label="OFF"></label>
									</div>
									<div class="setting-row">
										<span>Enable Cell</span>
										<p>Your cell is the entity by default you get info of.</p>
										<input type="checkbox" id="switch03" name="cell"  <?php echo($isvalid_cell)?>/> 
										<label for="switch03" data-on-label="ON" data-off-label="OFF"></label>
									</div>
									
									<div class="submit-btns">
										<button type="button" class="mtr-btn"><span>Cancel</span></button>
										<button type="submit" name="send" class="mtr-btn"><span>Update</span></button>
									</div>
								</form>
							</div>
							<?php
							if(isset($_POST['send']))
							{
								if(empty($_POST['prov']))
								{
									$isvalid_prov = 0;
								}
								else
								{
									$isvalid_prov = 1;
									
								}
								//district
								if(empty($_POST['dist']))
								{
									$isvalid_dist = 0;
								}
								else
								{
									$isvalid_dist = 1;
									
								}
								
								//sector
								if(empty($_POST['sect']))
								{
									$isvalid_sect = 0;
								}
								else
								{
									$isvalid_sect = 1;
									
								}
								//cell
								if(empty($_POST['cell']))
								{
									$isvalid_cell = 0;
								}
								else
								{
									$isvalid_cell = 1;
									
								}
								//echo("cell= ". " ".$isvalid_cell.", \nSector= ". $isvalid_sect.", \nDistrict= ".$isvalid_dist."\nProvince= ".$isvalid_prov."");

								if($exis == 1)
								{
									$up = "UPDATE t_interest SET I_province='$isvalid_prov', I_district='$isvalid_dist', I_sector= '$isvalid_sect', I_cell='$isvalid_cell' WHERE L_id='$lid' AND I_id = '$iid' ";
									$exe = mysqli_query($connect, $up);
									if($exe)
									{
										?>
										<script>
											alert("Your interests have been updated");
											window.location.replace("feed.php");
										</script>
										
										<?php
									}
									else{
										?>
										<script>
											alert("Incredible");
										</script>
										<?php
									}
								}
								else if($exis == 0)
								{
									$up ="INSERT INTO t_interest( `I_province`, `I_district`, `I_sector`, `I_cell`, `L_id`) VALUES('$isvalid_prov', '$isvalid_dist','$isvalid_sect', '$isvalid_cell', '$lid')";
									$exe = mysqli_query($connect, $up);
									if($exe)
									{
										?>
										<script>
											alert("Your interests have been updated");
											window.location.replace("feed.php");
										</script>
										
										<?php
									}
									else{
										?>
										<script>
											alert("Incredible");
										</script>
										<?php
									}
								}

							}

							?>
						</div>
						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								
								<?php include("includes/editprofMenu.php"); ?>
							</aside>
						</div><!-- sidebar -->
					</div>	
				</div>
			</div>
		</div>
	</div>	
</section>