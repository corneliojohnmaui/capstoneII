<?php 
include 'core/init.php';
include 'includes/header.php';

//check if logged in
if (!$users->getsession()) {
	header("location:index.php");
}

//redirect to index 
if (isset($_GET['logout'])) {
	$users->user_logout();
	header("location:index.php");
}

if (isset($_SESSION['usertype'])) {
	$utype = $_SESSION['usertype'];
	$uid = $_SESSION['id'];
}


// FORM ACTIONS
	if (isset($_POST['submitAddExp'])) {
		
		$idofworkexp = $_POST['idofworkexp'];
		$result = $users->fetchdata("work_experience WHERE id_workexp='".$idofworkexp."'");
		foreach ($result as $res) {
			$companyname = $res['company_name'];
			$userid = $res['id_user'];
		}
		// if ($companyname ==" ") {
		// 	echo "companyname"."--".$userid;
		// }else{
		// 	echo 'userid';
		// }
		// echo $companyn;
		
		if (empty($companyname)) {
			$where = array("id_workexp"=>$idofworkexp);
			$fields = array(
					"company_name"=> addslashes($_POST['comp_name']),
					"company_location"=> addslashes($_POST['comp_loc']),
					"position"=> addslashes($_POST['position']),
					"position_level"=> addslashes($_POST['position_lvl']),
					"joined_year"=> addslashes($_POST['joined_yr']),
					"joined_month"=> addslashes($_POST['joined_mt']),
					"joined_year_to"=> addslashes($_POST['joined_yr_to']),
					"joined_month_to"=> addslashes($_POST['joined_mt_to']),
					"specialization"=> addslashes($_POST['specialization']),
					"role"=> addslashes($_POST['role']),
					"industry"=> addslashes($_POST['industry']));
					// "since_year"=> addslashes($_POST['since_yr']),
					// "since_month"=> addslashes($_POST['since_mt'])

			$updateresult = $users->updatedata("work_experience",$where,$fields);
				if ($updateresult) {
					echo '<script>swal({	
					icon: "success",
					title: "",
					text: "Successfully Data Inserted!",
					type: "success"}).then(okay => {
					if (okay) {
					window.location.href = "work_experience.php";
					}
					}); </script>';
				}else{
					echo '<script>swal({	
					icon: "error",
					title: "Error!",
					text: "Error Inserting Data!",
					type: "warning"}).then(okay => {
					if (okay) {
					window.location.href = "work_experience.php";
					}
					}); </script>';
				}	

		}else if(!empty($companyname)){
			$arrayname3 = array("id_user"=> $userid,
			"company_name"=>$_POST['comp_name'],
			"company_location"=>addslashes($_POST['comp_loc']),
			"position"=>addslashes($_POST['position']),
			"position_level"=>addslashes($_POST['position_lvl']),
			"joined_year"=>$_POST['joined_yr'],
			"joined_month"=>$_POST['joined_mt'],
			"joined_year_to"=>$_POST['joined_yr_to'],
			"joined_month_to"=>$_POST['joined_mt_to'],
			"specialization"=>addslashes($_POST['specialization']),
			"role"=>addslashes($_POST['role']),
			"industry"=>addslashes($_POST['industry']));
			// "since_year"=>$_POST['since_yr'],
			// "since_month"=>$_POST['since_mt'])

			$result3 = $users->savedata("work_experience",$arrayname3);
			if ($result3) {
				echo '<script>swal({	
				icon: "success",
				title: "",
				text: "Successfully Data Inserted!",
				type: "success"}).then(okay => {
				if (okay) {
				window.location.href = "work_experience.php";
				}
				}); </script>';
			}else{
				echo '<script>swal({	
				icon: "error",
				title: "Error!",
				text: "Error Inserting Data!",
				type: "warning"}).then(okay => {
				if (okay) {
				window.location.href = "work_experience.php";
				}
				}); </script>';
			}	
		
		} // end if !empty
		
		
	}
?>

<div class="container-fluid" id="">

	<a href="home.php?logout=logout">LOGOUT</a>

</div>

	<div class="container"  id="myprofile" style="">
		<div class="row ">

		<div class="col-sm-2 h-100 bodynav sticky-top" style="background-color: transparent; margin:5px;">
			<form method="get">
			 <ul class="list-group list-group-flush">
			  <a href="myprofile.php"><li class="list-group-item"><img src="assets/images/defaultimgpic.jpeg" style="width: 60px; height: 60px;"> Profile</li></a>
			  <a href="work_experience.php"  class="list-group-item active">Experience</a>
			  <a href="education.php"  class="list-group-item">Education</a>
			  <a href=""  class="list-group-item">Skills</a>
			  <a href="additional_info.php"  class="list-group-item">Additional Info</a>
			  <a href=""  class="list-group-item">Experience</a>

			  <!-- <a href="myprofile.php?l=22"><li class="list-group-item">Education</li></a>
			  <a href=""><li class="list-group-item">Skills</li></a>
			  <a href=""><li class="list-group-item">Languages</li></a>
			  <a href=""><li class="list-group-item">Additional Info</li></a>
			  <a href=""><li class="list-group-item">About Me</li></a>
			  <a href=""><li class="list-group-item">Uploaded Resume </li></a>
			  <a href=""><li class="list-group-item">Privacy Settings</li></a> -->
			
			</ul>
			</form>
		</div>
	
			
		<div class="col-sm-9 bodyresult float-right" style="background-color: white;  margin:5px;"> 
			
				
				
					
					<!-- ------ F-INNER ROW ------- -->
					<div class="row mt-3">

						
						<div class="col-sm-12">
							<h5>Experience 
								

							</h5>
							<hr>
						</div>
						<?php 
						$myrow2 = $users->fetchdata('work_experience WHERE id_user = "'.$uid.'" AND experience_level !=" "');
						foreach ($myrow2 as $row2) {
						$comp_name = $row2['company_name'];
						$workexpid = $row2['id_workexp'];
						?>
						<?php 
						if (isset($_GET['addInfo'])) {
							$addinfo = $_GET['addInfo'];
						
						?>
						<div class="col-sm-12" id="edit_add_info">
							
								<form method="post">
									<div class="form-group row">
									  	<div class="col-sm-4">
									  		<input type="hidden" name="idofaddinfo" id="idofaddinfo" value="<?php echo $addinfo; ?>">
											<label for="exp_sal">Expected Salary</label>
									  	</div>										   
									  	<div class="col-sm-7">
									       <div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <span class="input-group-text" id="basic-addon1">PHP</span>
											  </div>
											 <input type="text" class="form-control" id="exp_sal" name="exp_sal" value="<?php echo ucwords($row2['expected_salary']); ?>" pattern="[0-9]*">
											</div>
									    </div>
									</div>
									<div class="form-group row">
										<div class="col-sm-4 mt-2">
											<label for="pre_loc">Preferred Work Location</label>
										</div>
										<div class="col-sm-7 mt-2">
											<input class="form-control" type="text" id="pre_loc" name="pre_loc" value="<?php echo ucwords($row2['preferred_location']) ?>">
										</div>
									</div>
								
									<button type="submit" id="submitAddInfo" name="submitAddInfo">SAVE</button>
									<button type="button" id="canceleditAI">CANCEL</button>
								</form>
							
						</div>
						<?php } ?>
						<?php 
						if (!isset($_GET['addInfo'])) {
													
						?>
						<!-- ---------- VIEW EXPERIENCE LEVEL ------------- -->
						<div class="col-sm-12" id="view_exp_level">
							<div class="row">
								<div class="col-sm-3 mt-2">
									<input type="text" name="cmp_nam" id="cmp_nam" value="<?php echo $comp_name; ?>">
									<label>Experience Level</label>
								</div>
								<div class="col-sm-5 mt-2">
									<h6> <?php echo ucwords($row2['experience_level']); ?></h6>
								</div>	
								<div class="col-sm-2 mt-2">
									<a href="additional_info.php?addInfo=<?php echo $row2['id_addinfo']; ?>"><i class="fa fa-pencil-square-o fa-lg editAI" aria-hidden="true" id=""></i></a>
								</div>							
							</div>
							<br><br>	
							
						</div>
						<!-- ---------- END OF VIEW EXPERIENCE LEVEL ------------- -->
						
						<?php } //END OF NOT ISSET ?>

						<?php } // END OF FOR EACH?> 

						<div class="col-sm-12">
							<hr>
								<!-- <a href="additional_info.php?add_experience=<?php echo $row2['id_workexp']; ?>" class="float-right"> -->
									<i class="fa fa-plus-square-o fa-lg fa_add_exp float-right" aria-hidden="true" id="<?php echo $workexpid; ?>"> Add</i>  
								<!-- </a> -->
								<br>
						</div>
						<!-- ---------- VIEW EXPERIENCES  ------------- -->
						<?php 
						if (!isset($_GET['edit_exp_info'])) {
							# code...
						$myrow3 = $users->fetchdata('work_experience WHERE id_user = "'.$uid.'"');
						foreach ($myrow3 as $row3) {
						// $comp_name = $row2['company_name'];
						// $workexpid = $row2['id_workexp'];
						?>
						
						<div class="col-sm-12" id="view_experiences">
						
							
							<div class="row">
								<div class="col-sm-3 mt-2">
									<input type="text" name="cmp_nam" id="cmp_nam" value="<?php echo $comp_name; ?>">
									<label>
									<?php echo $row3['joined_month']." ".$row3['joined_year']." - ".$row3['joined_month_to']." ".$row3['joined_year_to']; ?></label>
								</div>
								<div class="col-sm-5 mt-2">
									<h5> <?php echo ucwords($row3['position']); ?></h5>
									<h6><?php echo ucwords($row3['company_name']);?></h6>

									<div class="col-sm-12 mt-2">
									<br>
										<div class="row">
										<div class="col-sm-4" style="padding: 0;">
											<label>Industry</label>											
										</div>
										<div class="col-sm-8">
											<p><?php echo ucwords($row3['industry']); ?></p>
										</div>
										<div class="col-sm-4" style="padding: 0;">
											<label>Specialization</label>									
										</div>
										<div class="col-sm-8">
											<p><?php echo ucwords($row3['specialization']); ?></p>
										</div>
										<div class="col-sm-4" style="padding: 0;">
											<label>Role</label>										
										</div>
										<div class="col-sm-8">
											<p><?php echo ucwords($row3['role']); ?></p>
										</div>
										<div class="col-sm-4" style="padding: 0;">
											<label>Position Level</label>				
										</div>
										<div class="col-sm-8">
											<p><?php echo ucwords($row3['position_level']); ?></p>
										</div>
										
										</div>
									</div>
								</div>	
								<div class="col-sm-2 mt-2">
									<a href="work_experience.php?edit_exp_info=<?php echo $row3['id_workexp']; ?>"><i class="fa fa-pencil-square-o fa-lg " aria-hidden="true" id=""></i></a>
								</div>							
							</div>
							<br><br>	
							<hr>
							
						</div>
						<?php } //end of foreach ?>
						<?php } // end of NOT ISSET GET ?>

						<!-- ---------- END OF VIEW EXPERIENCES  ------------- -->

						<?php 
						if (empty($comp_name)) { ?>
							<div class="col-sm-12" id="expi_note">
						<?php }else{  ?>
					
						<div class="col-sm-12" id="expi_note" style="display: none;">
						<?php } ?>
							<div class="row">
							<div class="card-footer">
								This is optional for you to fill in. However if you have any internship, part-time job or volunteering experience, we strongly recommend you include them here.
							</div>
							<br>
							</div>
						</div>
						
						<!-- ---------- ADD EXPERIENCES  ------------- -->
						<?php 
						if (empty($comp_name)) { ?>
							<div class="col-sm-12" id="add_experience">	
						
						<?php }else{  ?>	

							<div class="col-sm-12" id="add_experience" style="display: none;">
						<?php } ?>

							<!-- <div class="form-group row">
								<div class="col-sm-3">
							     	<label for="since_yr"> Since*</label>
								</div>

							    <div class="col-sm-4">
							        <select class="form-control" id="since_yr" name="since_yr">
								      	<option disabled selected> Year </option>
								      <?php 
								      	// $year=1959;
								      	for($year=2024;$year>=1959;$year--){?>
								      	<option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
								      	<?php } ?>
								    </select>

							    </div>
							    <div class="col-sm-4">
							    	<select class="form-control" id="since_mt" name="since_mt">
							     		<option disabled selected> Month </option> 
							     		<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										foreach ($months as $month) { ?>
										<option value="<?php echo $month; ?>"><?php echo $month; ?>	</option>
										<?php } ?>				     		
						     		</select>

							    </div>
							</div>	 -->				

							<form method="post" id="exp_form">
							<div class="form-group row">
								<div class="col-sm-3">
									<input type="text" name="idofclickexp" id="idofclickexp" value="">
									<input type="text" name="idofworkexp" value="<?php echo $workexpid; ?>">
							     	<label for="comp_name"> Company Name*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="comp_name" placeholder="Enter Preferred Work Location" name="comp_name">
							    </div>
							</div>		
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="comp_loc"> Company Location*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="comp_loc" placeholder="Enter Preferred Work Location" name="comp_loc">
							    </div>
							</div>	
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="position"> Position Title*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="position" placeholder="Enter Preferred Work Location" name="position">
							    </div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="position_lvl"> Position Level*</label>
								</div>
							    <div class="col-sm-5">
							     	<select name="position_lvl" id="position_lvl" class="form-control">
							     		<option> 	</option>

							     		<option title='CEO / SVP / AVP / VP / Director' value='1' > CEO / SVP / AVP / VP / Director </option>
		                                <option title='Assistant Manager / Manager' value='2' > Assistant Manager / Manager </option>
		                                <option title='Supervisor / 5 Years & Up Experienced Employee' value='3' > Supervisor / 5 Years & Up Experienced Employee </option>
		                                <option title='1-4 Years Experienced Employee' value='4' > 1-4 Years Experienced Employee </option>
		                                <option title='Fresh Grad / < 1 Year Experienced Employee' value='5' > Fresh Grad / < 1 Year Experienced Employee </option>
		                                <option title='Non-Executive' value='6' > Non-Executive </option>

							     	</select>
							    </div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="join_dura"> Joined Duration*</label>
								</div>

							    <div class="col-sm-4">
							        <select class="form-control" id="joined_yr" name="joined_yr">
							        	<option> 	</option>
								      	<option disabled selected> Year </option>
								      <?php 
								      	// $year=1959;
								      	for($year=2024;$year>=1959;$year--){?>
								      	<option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
								      	<?php } ?>
								    </select>

							    </div>
							    <div class="col-sm-4">
							    	<select class="form-control" id="joined_mt" name="joined_mt">
							    		<option> 	</option>
							     		<option disabled selected> Month </option> 
							     		<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										foreach ($months as $month) { ?>
										<option value="<?php echo $month; ?>"><?php echo $month; ?>	</option>
										<?php } ?>				     		
						     		</select>

							    </div>
							    <div class="col-sm-3">
							     	<label for="join_dura" class="float-right"> To</label>
								</div>
							     <div class="col-sm-4">
							        <select class="form-control" id="joined_yr_to" name="joined_yr_to">
							        	<option> 	</option>
								      	<option disabled selected> Year </option>
								      <?php 
								      	// $year=1959;
								      	for($year=2024;$year>=1959;$year--){?>
								      	<option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
								      	<?php } ?>
								    </select>
								    
							    </div>
							    <div class="col-sm-4">
							    	<select class="form-control" id="joined_mt_to" name="joined_mt_to">
							    		<option> 	</option>
							     		<option disabled selected> Month </option> 
							     		<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										foreach ($months as $month) { ?>
										<option value="<?php echo $month; ?>"><?php echo $month; ?>	</option>
										<?php } ?>				     		
						     		</select>
							    </div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="specialization"> Specialization*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="specialization" placeholder="Enter Preferred Work Location" name="specialization">
							    </div>
							</div>					
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="role"> Role*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="role" placeholder="Enter Preferred Work Location" name="role">
							    </div>
							</div>					
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="industry"> Industry*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="industry" placeholder="Enter Preferred Work Location" name="industry">
							    </div>
							</div>

							<button type="submit" id="submitAddExp" name="submitAddExp">SAVE</button>
							<button type="button" id="cancelAddExp">CANCEL</button>
							</form>
							--
						</div>
						<!-- -------------- END OF ADD EXPERIENCES  ------------- -->

						<!-- ---------------- EDIT EXPERIENCE --------------------- -->
						<?php 
						if (isset($_GET['edit_exp_info'])) {
							$idworkexp = $_GET['edit_exp_info'];
						
						$myrow4 = $users->fetchdata('work_experience WHERE id_workexp = "'.$idworkexp.'"');
						foreach ($myrow4 as $row4) {
						// $comp_name = $row2['company_name'];
						// $workexpid = $row2['id_workexp'];
						?>

						<div class="col-sm-12" id="edit_exp">
						<form method="post" id="exp_form_edit">
							<div class="form-group row">
								<div class="col-sm-3">
									<input type="hidden" name="idofclickexp" id="idofclickexp" value="">
									<input type="text" name="idofworkexp" value="<?php echo $workexpid; ?>">
							     	<label for="comp_name"> Company Name*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="comp_name" placeholder="Enter Preferred Work Location" value="<?php echo $row4['company_name']; ?>" name="comp_name">
							    </div>
							</div>		
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="comp_loc"> Company Location*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="comp_loc" placeholder="Enter Preferred Work Location" name="comp_loc" value="<?php echo $row4['company_location']; ?>">
							    </div>
							</div>	
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="position"> Position Title*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="position" placeholder="Enter Preferred Work Location" name="position" value="<?php echo $row4['position']; ?>">
							    </div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="position_lvl"> Position Level*</label>
								</div>
							    <div class="col-sm-5">
							     	<select name="position_lvl" id="position_lvl" class="form-control">
							     		<option> 	</option>

							     		<option title='CEO / SVP / AVP / VP / Director' value='1' > CEO / SVP / AVP / VP / Director </option>
		                                <option title='Assistant Manager / Manager' value='2' > Assistant Manager / Manager </option>
		                                <option title='Supervisor / 5 Years & Up Experienced Employee' value='3' > Supervisor / 5 Years & Up Experienced Employee </option>
		                                <option title='1-4 Years Experienced Employee' value='4' > 1-4 Years Experienced Employee </option>
		                                <option title='Fresh Grad / < 1 Year Experienced Employee' value='5' > Fresh Grad / < 1 Year Experienced Employee </option>
		                                <option title='Non-Executive' value='6' > Non-Executive </option>

							     	</select>
							    </div>
							</div>
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="join_dura"> Joined Duration*</label>
								</div>

							    <div class="col-sm-4">
							        <select class="form-control" id="joined_yr" name="joined_yr">
							        	<option> 	</option>
								      	
								      		<?php 
									     	for($year=2024;$year>=1959;$year--){
											if ($year == $row2['joined_year']) {
									     	?> 
									     	<option value="<?php echo $year;?>" selected><?php echo $year;?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $year;?>"><?php echo $year;?></option>
									     	<?php }} ?>
								    </select>

							    </div>
							    <div class="col-sm-4">
							    	<select class="form-control" id="joined_mt" name="joined_mt">
							    		<option> 	</option>
							     		
							     			<?php 
									     	$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");	
							
											foreach ($months as $month) {
											if ($month == $row2['joined_month']) {
									     	?>
									     	<option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
									     	<?php }} ?>		     		
						     		</select>

							    </div>
							    <div class="col-sm-3">
							     	<label for="join_dura" class="float-right"> To</label>
								</div>
							     <div class="col-sm-4">
							        <select class="form-control" id="joined_yr_to" name="joined_yr_to">
							        	<option> 	</option>
								      	<?php 
									     	for($year=2024;$year>=1959;$year--){
											if ($year == $row2['joined_year_to']) {
									     	?> 
									     	<option value="<?php echo $year;?>" selected><?php echo $year;?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $year;?>"><?php echo $year;?></option>
									     	<?php }} ?>
								    </select>
								    
							    </div>
							    <div class="col-sm-4">
							    	<select class="form-control" id="joined_mt_to" name="joined_mt_to">
							    		<option> 	</option>
							     			<?php 
									     	$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");	
							
											foreach ($months as $month) {
											if ($month == $row2['joined_month_to']) {
									     	?>
									     	<option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
									     	<?php }} ?>			     		
						     		</select>
							    </div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="specialization"> Specialization*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="specialization" placeholder="Enter Preferred Work Location" name="specialization" value="<?php echo $row4['specialization']; ?>">
							    </div>
							</div>					
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="role"> Role*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="role" placeholder="Enter Preferred Work Location" name="role" value="<?php echo $row4['role']; ?>">
							    </div>
							</div>					
							<div class="form-group row">
								<div class="col-sm-3">
							     	<label for="industry"> Industry*</label>
								</div>
							    <div class="col-sm-5">
							       <input type="text" class="form-control" id="industry" placeholder="Enter Preferred Work Location" name="industry" value="<?php echo $row4['industry']; ?>">
							    </div>
							</div>

							<button type="submit" id="submitEditExp" name="submitEditExp">SAVE</button>
							<button type="button" id="cancelEditExp">CANCEL</button>
						</form>
						</div>
						<?php } //end of for each ?>
						<?php } //end of isset get ?>
							<!-- ---------------- EDIT EXPERIENCE --------------------- -->
					</div>
					<!-- ------ END OF F-INNER ROW ------- -->
					



		</div>
		</div>

	</div>
	


<?php 
include 'includes/footer.php';
?>
<script type="text/javascript">
	$(document).ready(function() {
		// var compane = $('#cmp_nam').val();
		// alert(compane)
		// if (compane == " ") {

		// 	$('#add_experience').show();
		// 	$('#expi_note').show();
		// 	$('#cancelAddExp').hide();
		// 	alert('empty')
			
		// }else {
		// 	$('#add_experience').hide();
		// 	$('#expi_note').hide();
		// 	$('#cancelAddExp').hide();
		// 	alert('notempty')
		// }

		$('.fa_add_exp').click(function(){
			var idval = $(this).attr("id");
			$('#add_experience').show();
			$('#view_experiences').hide();
			$('#idofworkexp').empty();
			$('#idofworkexp').val(idval);
			// alert(idval)
		});

		$("#cancelAddExp").click(function(){
			// history.back(1);
			$('#add_experience').hide();
			 $('#exp_form')[0].reset();
			$('#view_experiences').show();

		});

		$("#cancelEditExp").click(function(){
			history.back(1);
			// $('#edit_exp').hide();
			//  $('#exp_form_edit')[0].reset();
			// $('#view_experiences').show();

		});		



	});
</script>