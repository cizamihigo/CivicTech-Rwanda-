<?php
include("includes/head.php");
include("includes/db.php");


?>

<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									
									<?php
										include("includes/editprofMenu.php");
									?>
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<?php
									$lid = $_SESSION['id'];
										if(isset($_POST['submit'] ))
										{
											$a = $_POST['fname'];
											$b = $_POST['lname'];
											$c = "".$a." ".$b;
											$d = $_POST['dob'];
											$e = $_POST['radio'];
											$f = $_POST['cell'];
											$g = $_POST['citizenship'];
											$i = $_POST['about'];
											//echo($c);
											$today = date('m/d/Y');
											$ds = date_create($d);
											$td = date_create($today);

											$age = date_diff($td, $ds);
											//var_dump($age);
											$ages = ($age->format("%y"));
											$hsql = "UPDATE `t_user` SET `U_names`='$c',`U_dateofbirth`='$d',`U_age`='$ages',`U_sex`='$e',`U_citizenship`='$g',`U_about`='$i',`C_id`='$f' WHERE L_id = '$lid'";
											$ex = mysqli_query($connect, $hsql);
											if($ex)
											{
												?>
											<script type='text/javascript'>
												window.location.replace("feed.php");
											</script>
											<?php

											}
											else
											{
												echo("<p style='text-align: center; color: red'>An unexpected error occured this operation can't be performed right now!</p>");
											}
										}
									?>
									<div class="editing-info">
										<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>

										<form method="post" action="">
											<div class="form-group half">	
											  <input type="text" id="input" required="required" name="fname"/>
											  <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" required="required" name="lname"/>
											  <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
											</div>
											
											<div class="dob">
												<div class="form-group ">
                                                    <input type="date" required="required" name="dob"/>
                                                    <label class="control-label" for="input">Date of Birth</label><i class="mtrl-select"></i>
												</div>
											</div>
											<div class="form-radio">
											  <div class="radio">
												<label>
												  <input type="radio" value="Male" checked="checked" name="radio"><i class="check-box"></i>Male
												</label>
											  </div>
											  <div class="radio">
												<label>
												  <input type="radio" Value="Female" name="radio"><i class="check-box"></i>Female
												</label>
											  </div>
											</div>
											<div class="form-group">	
												<select name="cell" id="">
													<option value="" disabled='true'>------</option>
													<?php
														//fecthing cell names to put in select element as options
														
														$sql = "SELECT * FROM t_cell ORDER BY C_name ASC";
														$exec = mysqli_query($connect, $sql);
														while($row = mysqli_fetch_array($exec))
														{
															echo("<option value='". $row['C_id']. "'>". $row['C_name'] . "</option>");
														}

													?>
												</select>
											  <label class="control-label" for="input">Cell</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <select name="citizenship">
												
												  <option value="AFG">Afghanistan</option>
												  <option value="ALA">Ƭand Islands</option>
												  <option value="ALB">Albania</option>
												  <option value="DZA">Algeria</option>
												  <option value="ASM">American Samoa</option>
												  <option value="AND">Andorra</option>
												  <option value="AGO">Angola</option>
												  <option value="AIA">Anguilla</option>
												  <option value="ATA">Antarctica</option>
												  <option value="ATG">Antigua and Barbuda</option>
												  <option value="ARG">Argentina</option>
												  <option value="ARM">Armenia</option>
												  <option value="ABW">Aruba</option>
												  <option value="AUS">Australia</option>
												  <option value="AUT">Austria</option>
												  <option value="AZE">Azerbaijan</option>
												  <option value="BHS">Bahamas</option>
												  <option value="BHR">Bahrain</option>
												  <option value="BGD">Bangladesh</option>
												  <option value="BRB">Barbados</option>
												  <option value="BLR">Belarus</option>
												  <option value="BEL">Belgium</option>
												  <option value="BLZ">Belize</option>
												  <option value="BEN">Benin</option>
												  <option value="BMU">Bermuda</option>
												  <option value="BTN">Bhutan</option>
												  <option value="BOL">Bolivia, Plurinational State of</option>
												  <option value="BES">Bonaire, Sint Eustatius and Saba</option>
												  <option value="BIH">Bosnia and Herzegovina</option>
												  <option value="BWA">Botswana</option>
												  <option value="BVT">Bouvet Island</option>
												  <option value="BRA">Brazil</option>
												  <option value="IOT">British Indian Ocean Territory</option>
												  <option value="BRN">Brunei Darussalam</option>
												  <option value="BGR">Bulgaria</option>
												  <option value="BFA">Burkina Faso</option>
												  <option value="BDI">Burundi</option>
												  <option value="KHM">Cambodia</option>
												  <option value="CMR">Cameroon</option>
												  <option value="CAN">Canada</option>
												  <option value="CPV">Cape Verde</option>
												  <option value="CYM">Cayman Islands</option>
												  <option value="CAF">Central African Republic</option>
												  <option value="TCD">Chad</option>
												  <option value="CHL">Chile</option>
												  <option value="CHN">China</option>
												  <option value="CXR">Christmas Island</option>
												  <option value="CCK">Cocos (Keeling) Islands</option>
												  <option value="COL">Colombia</option>
												  <option value="COM">Comoros</option>
												  <option value="COG">Congo</option>
												  <option value="COD">Congo, the Democratic Republic of the</option>
												  <option value="COK">Cook Islands</option>
												  <option value="CRI">Costa Rica</option>
												  <option value="CIV">C𴥠d'Ivoire</option>
												  <option value="HRV">Croatia</option>
												  <option value="CUB">Cuba</option>
												  <option value="CUW">Cura袯</option>
												  <option value="CYP">Cyprus</option>
												  <option value="CZE">Czech Republic</option>
												  <option value="DNK">Denmark</option>
												  <option value="DJI">Djibouti</option>
												  <option value="DMA">Dominica</option>
												  <option value="DOM">Dominican Republic</option>
												  <option value="ECU">Ecuador</option>
												  <option value="EGY">Egypt</option>
												  <option value="SLV">El Salvador</option>
												  <option value="GNQ">Equatorial Guinea</option>
												  <option value="ERI">Eritrea</option>
												  <option value="EST">Estonia</option>
												  <option value="ETH">Ethiopia</option>
												  <option value="FLK">Falkland Islands (Malvinas)</option>
												  <option value="FRO">Faroe Islands</option>
												  <option value="FJI">Fiji</option>
												  <option value="FIN">Finland</option>
												  <option value="FRA">France</option>
												  <option value="GUF">French Guiana</option>
												  <option value="PYF">French Polynesia</option>
												  <option value="ATF">French Southern Territories</option>
												  <option value="GAB">Gabon</option>
												  <option value="GMB">Gambia</option>
												  <option value="GEO">Georgia</option>
												  <option value="DEU">Germany</option>
												  <option value="GHA">Ghana</option>
												  <option value="GIB">Gibraltar</option>
												  <option value="GRC">Greece</option>
												  <option value="GRL">Greenland</option>
												  <option value="GRD">Grenada</option>
												  <option value="GLP">Guadeloupe</option>
												  <option value="GUM">Guam</option>
												  <option value="GTM">Guatemala</option>
												  <option value="GGY">Guernsey</option>
												  <option value="GIN">Guinea</option>
												  <option value="GNB">Guinea-Bissau</option>
												  <option value="GUY">Guyana</option>
												  <option value="HTI">Haiti</option>
												  <option value="HMD">Heard Island and McDonald Islands</option>
												  <option value="VAT">Holy See (Vatican City State)</option>
												  <option value="HND">Honduras</option>
												  <option value="HKG">Hong Kong</option>
												  <option value="HUN">Hungary</option>
												  <option value="ISL">Iceland</option>
												  <option value="IND">India</option>
												  <option value="IDN">Indonesia</option>
												  <option value="IRN">Iran, Islamic Republic of</option>
												  <option value="IRQ">Iraq</option>
												  <option value="IRL">Ireland</option>
												  <option value="IMN">Isle of Man</option>
												  <option value="ISR">Israel</option>
												  <option value="ITA">Italy</option>
												  <option value="JAM">Jamaica</option>
												  <option value="JPN">Japan</option>
												  <option value="JEY">Jersey</option>
												  <option value="JOR">Jordan</option>
												  <option value="KAZ">Kazakhstan</option>
												  <option value="KEN">Kenya</option>
												  <option value="KIR">Kiribati</option>
												  <option value="PRK">Korea, Democratic People's Republic of</option>
												  <option value="KOR">Korea, Republic of</option>
												  <option value="KWT">Kuwait</option>
												  <option value="KGZ">Kyrgyzstan</option>
												  <option value="LAO">Lao People's Democratic Republic</option>
												  <option value="LVA">Latvia</option>
												  <option value="LBN">Lebanon</option>
												  <option value="LSO">Lesotho</option>
												  <option value="LBR">Liberia</option>
												  <option value="LBY">Libya</option>
												  <option value="LIE">Liechtenstein</option>
												  <option value="LTU">Lithuania</option>
												  <option value="LUX">Luxembourg</option>
												  <option value="MAC">Macao</option>
												  <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
												  <option value="MDG">Madagascar</option>
												  <option value="MWI">Malawi</option>
												  <option value="MYS">Malaysia</option>
												  <option value="MDV">Maldives</option>
												  <option value="MLI">Mali</option>
												  <option value="MLT">Malta</option>
												  <option value="MHL">Marshall Islands</option>
												  <option value="MTQ">Martinique</option>
												  <option value="MRT">Mauritania</option>
												  <option value="MUS">Mauritius</option>
												  <option value="MYT">Mayotte</option>
												  <option value="MEX">Mexico</option>
												  <option value="FSM">Micronesia, Federated States of</option>
												  <option value="MDA">Moldova, Republic of</option>
												  <option value="MCO">Monaco</option>
												  <option value="MNG">Mongolia</option>
												  <option value="MNE">Montenegro</option>
												  <option value="MSR">Montserrat</option>
												  <option value="MAR">Morocco</option>
												  <option value="MOZ">Mozambique</option>
												  <option value="MMR">Myanmar</option>
												  <option value="NAM">Namibia</option>
												  <option value="NRU">Nauru</option>
												  <option value="NPL">Nepal</option>
												  <option value="NLD">Netherlands</option>
												  <option value="NCL">New Caledonia</option>
												  <option value="NZL">New Zealand</option>
												  <option value="NIC">Nicaragua</option>
												  <option value="NER">Niger</option>
												  <option value="NGA">Nigeria</option>
												  <option value="NIU">Niue</option>
												  <option value="NFK">Norfolk Island</option>
												  <option value="MNP">Northern Mariana Islands</option>
												  <option value="NOR">Norway</option>
												  <option value="OMN">Oman</option>
												  <option value="PAK">Pakistan</option>
												  <option value="PLW">Palau</option>
												  <option value="PSE">Palestinian Territory, Occupied</option>
												  <option value="PAN">Panama</option>
												  <option value="PNG">Papua New Guinea</option>
												  <option value="PRY">Paraguay</option>
												  <option value="PER">Peru</option>
												  <option value="PHL">Philippines</option>
												  <option value="PCN">Pitcairn</option>
												  <option value="POL">Poland</option>
												  <option value="PRT">Portugal</option>
												  <option value="PRI">Puerto Rico</option>
												  <option value="QAT">Qatar</option>
												  <option value="REU">R궮ion</option>
												  <option value="ROU">Romania</option>
												  <option value="RUS">Russian Federation</option>
												  <option value="RWA" selected>Rwanda</option>
												  <option value="BLM">Saint Barthꭥmy</option>
												  <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
												  <option value="KNA">Saint Kitts and Nevis</option>
												  <option value="LCA">Saint Lucia</option>
												  <option value="MAF">Saint Martin (French part)</option>
												  <option value="SPM">Saint Pierre and Miquelon</option>
												  <option value="VCT">Saint Vincent and the Grenadines</option>
												  <option value="WSM">Samoa</option>
												  <option value="SMR">San Marino</option>
												  <option value="STP">Sao Tome and Principe</option>
												  <option value="SAU">Saudi Arabia</option>
												  <option value="SEN">Senegal</option>
												  <option value="SRB">Serbia</option>
												  <option value="SYC">Seychelles</option>
												  <option value="SLE">Sierra Leone</option>
												  <option value="SGP">Singapore</option>
												  <option value="SXM">Sint Maarten (Dutch part)</option>
												  <option value="SVK">Slovakia</option>
												  <option value="SVN">Slovenia</option>
												  <option value="SLB">Solomon Islands</option>
												  <option value="SOM">Somalia</option>
												  <option value="ZAF">South Africa</option>
												  <option value="SGS">South Georgia and the South Sandwich Islands</option>
												  <option value="SSD">South Sudan</option>
												  <option value="ESP">Spain</option>
												  <option value="LKA">Sri Lanka</option>
												  <option value="SDN">Sudan</option>
												  <option value="SUR">Suriname</option>
												  <option value="SJM">Svalbard and Jan Mayen</option>
												  <option value="SWZ">Swaziland</option>
												  <option value="SWE">Sweden</option>
												  <option value="CHE">Switzerland</option>
												  <option value="SYR">Syrian Arab Republic</option>
												  <option value="TWN">Taiwan, Province of China</option>
												  <option value="TJK">Tajikistan</option>
												  <option value="TZA">Tanzania, United Republic of</option>
												  <option value="THA">Thailand</option>
												  <option value="TLS">Timor-Leste</option>
												  <option value="TGO">Togo</option>
												  <option value="TKL">Tokelau</option>
												  <option value="TON">Tonga</option>
												  <option value="TTO">Trinidad and Tobago</option>
												  <option value="TUN">Tunisia</option>
												  <option value="TUR">Turkey</option>
												  <option value="TKM">Turkmenistan</option>
												  <option value="TCA">Turks and Caicos Islands</option>
												  <option value="TUV">Tuvalu</option>
												  <option value="UGA">Uganda</option>
												  <option value="UKR">Ukraine</option>
												  <option value="ARE">United Arab Emirates</option>
												  <option value="GBR">United Kingdom</option>
												  <option value="USA">United States</option>
												  <option value="UMI">United States Minor Outlying Islands</option>
												  <option value="URY">Uruguay</option>
												  <option value="UZB">Uzbekistan</option>
												  <option value="VUT">Vanuatu</option>
												  <option value="VEN">Venezuela, Bolivarian Republic of</option>
												  <option value="VNM">Viet Nam</option>
												  <option value="VGB">Virgin Islands, British</option>
												  <option value="VIR">Virgin Islands, U.S.</option>
												  <option value="WLF">Wallis and Futuna</option>
												  <option value="ESH">Western Sahara</option>
												  <option value="YEM">Yemen</option>
												  <option value="ZMB">Zambia</option>
												  <option value="ZWE">Zimbabwe</option>
											  </select>
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" required="required" name="about"></textarea>
											  <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
											</div>
											<div class="submit-btns">
												<a href="feed.php"><button type="button" class="mtr-btn"><span>Cancel</span></button></a>
												<button type="submit" name="submit" class="mtr-btn"><span>Update</span></button>
											</div>
										</form>
									</div>
								</div>	
							</div><!-- centerl meta -->
							<div class="col-lg-3">
								<aside class="sidebar static">
									<?php
										include("includes/rooms.php");
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
