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

//FORM ACTIONS

if (isset($_POST['editEducBg'])) {

	$ideduc = $_POST['ideduc'];
	$where = array("id_educ_bg"=>$ideduc);
	$myarray = array(
				"school_name"=> $_POST['school_name_edit'],
				"school_location"=> $_POST['school_loc_edit'],
				"qualification"=> $_POST['qualification_edit'],
				"graduated_year"=> $_POST['grad_year_edit'],
				"graduated_month"=> $_POST['grad_mont_edit']);
	// echo $ideduc;
	$users->updatedata('educational_bg',$where,$myarray);
	// header('location:education.php');
	// echo $ideduc;
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
			  <a href="" class="list-group-item">Experience</a>
			  <a href="" class="list-group-item active">Education</a>
			  <a href="" class="list-group-item">Skills</a>
			  <a href="" class="list-group-item">Additional Info</a>
			  <a href="" class="list-group-item">Experience</a>

			  <!-- <a href="myprofile.php?l=22"><li class="list-group-item">Education</li></a>
			  <a href=""><li class="list-group-item">Skills</li></a>
			  <a href=""><li class="list-group-item">Languages</li></a>
			  <a href=""><li class="list-group-item">Additional Info</li></a>
			  <a href=""><li class="list-group-item">About Me</li></a>
			  <a href=""><li class="list-group-item">Uploaded Resume </li></a>
			  <a href=""><li class="list-group-item">Privacy Settings</li></a> -->
			
			</ul>
			</form>
<!-- 			<div class="list-group" id="list-tab" role="tablist">
		      <a class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#home" role="tab" aria-controls="home">Home</a>
		      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Experience</a>
		      <a class="list-group-item list-group-item-action active" id="list-messages-list" data-toggle="list" href="#education" role="tab" aria-controls="messages">Education</a>
		      <a class="list-group-item list-group-item-action " id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Skills</a>
		      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Languages</a>
		      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Additional Info</a>
		      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">About Me</a>
		      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Uploaded Resume</a>
		      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
		    </div>
			</form> -->
		</div>
	
			
		<div class="col-sm-9 bodyresult float-right" style="background-color: white;  margin:5px;"> 
			
					<!-- ------------- ADD EDUCATION BG ------------------- -->
					<?php 

					$myrow2 = $users->fetchdata('educational_bg WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					
					<div class="row ml-3 mt-3">
						<div class="col-sm-12"><h5>Education<button class="addeduc float-right" data-toggle="collapse" data-target="#demo">Collapsible</button></h5>
							
						<hr>
						</div>
						<form method="post">
						<div class="collapse col-sm-12" id="demo">
	
							<div class="form-group row">							
							    <div class="col-sm-4">
							  		<label for="school_name"> University/Institute*</label>
							  	</div>	
							    <div class="col-sm-7">
							      
							       <input type="text" class="form-control" id="school_name" placeholder="Enter University/Institute" name="school_name">
							    </div>
							</div>
							<div class="form-group row">
							  	<div class="col-sm-4">
							  		<label for="school_loc"> University/Institute Location*</label>
							  	</div>									     
							    <div class="col-sm-7">
							       <input type="text" class="form-control" id="school_loc" placeholder="Enter University/Institute Location" name="school_loc">
							    </div>
							</div>
							<div class="form-group row">
							  	<div class="col-sm-4">
							  		<label for="qualification"> Qualification* </label>
							  	</div>									     
							    <div class="col-sm-7">
							       <select name="qualification" id="qualification" class="form-control">
							       		<option> 	</option>
							       		<option value="High School Diploma"> High School Diploma </option>
							       		<option value="Vocational Diploma/Short Course Certificate"> Vocational Diploma/Short Course Certificate</option>
							       		<option value="Bachelor's /College Degree"> Bachelor's /College Degree</option>
							       		<option value="Post Graduate Diploma / Master's Degree"> Post Graduate Diploma / Master's Degree </option>
							       		<option value="Professional License (Passed Board/Bar/Professional License Exam)"> Professional License (Passed Board/Bar/Professional License Exam)</option>
							       		<option value="Doctorate Degree"> Doctorate Degree </option>
							       </select>
							    </div>
							</div>
							<div class="form-group row">
							  	<div class="col-sm-4">
							  		 <label for="field_study"> Field of Study*</label>
							  	</div>									     
							    <div class="col-sm-7">
							       <input type="text" class="form-control" id="field_study" placeholder="Enter Preferred Work Location" name="field_study">
							    </div>
							</div>								  								  
							<div class="form-group row">
							  	<div class="col-sm-4">
							  		  <label for="grad_year"> Graduation Year*</label>
							  	</div>									     
							    <div class="col-sm-3">
							       	<select class="form-control" id="grad_year" name="grad_year" placeholder="Year">
								      	<option>	</option>
								      <?php 
								      	// $year=1959;
								      	for($year=2024;$year>=1959;$year--){?>
								      	<option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
								      	<?php } ?>
									</select>
							    </div>
							    <div class="col-sm-3">
									<select class="form-control" id="grad_mont" name="grad_mont" placeholder="Month">
							     		<option> 	</option> 
							     		<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
										foreach ($months as $month) { ?>
										<option value="<?php echo $month; ?>"><?php echo $month; ?>	</option>
										<?php } ?>				     		
									</select>								    	
							    </div>
							</div>
							<div class="form-group row">
							  	<div class="col-sm-4">
							  		 <label for="field_study"> Field of Study*</label>
							  	</div>									     
							    <div class="col-sm-7">
							       
							    </div>
							</div>	

							<button type="submit" id="submitAddEduc" name="submitAddEduc"> SAVE </button>	<button type="button" id="cancelAddEduc" name="cancelAddEduc"> CANCEL </button>		  										
							<hr>
						</div>
						</form>
						<!-- -------------  END OF ADD EDUCATION BG ------------------- -->

						<!-- ----------------- EDIT EDUCATION BG ------------------- -->
						<div class="col-sm-12" id="edit_educ_bg" style="display: none;">
							<?php 
							$myrow2 = $users->fetchdata('educational_bg WHERE id_user = "'.$uid.'"');
							foreach ($myrow2 as $row2) {

							?>

							<form method="post">
								<input type="hidden" value="<?php echo $row2['id_educ_bg'];?>" name="ideduc">

								<div class="form-group row">
									<div class="col-sm-4">
										<label for="school_name_edit"> University/Institute*</label>
									</div>
									<div class="col-sm-7">
									<input type="text" class="form-control" id="school_name_edit" placeholder="Enter University/Institute" value="<?php echo ucwords($row2['school_name']);?>" name="school_name_edit">
									</div>
								</div>
								<div class="form-group row">
								  	<div class="col-sm-4">
								  		<label for="school_loc_edit"> University/Institute Location*</label>
								  	</div>									     
								    <div class="col-sm-7">
								       <input type="text" class="form-control" id="school_loc_edit" placeholder="Enter University/Institute Location" value="<?php echo ucwords($row2['school_location']); ?>" name="school_loc_edit">
								    </div>
								</div>
								<div class="form-group row">
								  	<div class="col-sm-4">
								  		<label for="qualification_edit"> Qualification* </label>
								  	</div>									     
								    <div class="col-sm-7">
								       <select name="qualification_edit" id="qualification_edit" class="form-control">
								       		<option> 	</option>
								       		<option value="High School Diploma"> High School Diploma </option>
								       		<option value="Vocational Diploma/Short Course Certificate"> Vocational Diploma/Short Course Certificate</option>
								       		<option value="Bachelor's /College Degree"> Bachelor's /College Degree</option>
								       		<option value="Post Graduate Diploma / Master's Degree"> Post Graduate Diploma / Master's Degree </option>
								       		<option value="Professional License (Passed Board/Bar/Professional License Exam)"> Professional License (Passed Board/Bar/Professional License Exam)</option>
								       		<option value="Doctorate Degree"> Doctorate Degree </option>
								       </select>
								    </div>
								</div>
								<div class="form-group row">
								  	<div class="col-sm-4">
								  		 <label for="field_study_edit"> Field of Study*</label>
								  	</div>									     
								    <div class="col-sm-7">
						
								      	<select id="field_study_edit" name="field_study_edit" class="form-control">
									       	<option value="2">Advertising/Media</option>
											<option value="3">Agriculture/Aquaculture/Forestry</option>
											<option value="5">Airline Operation/Airport Management</option>
											<option value="4">Architecture</option>
											<option value="1">Art/Design/Creative Multimedia</option>
											<option value="6">Biology</option>

										</select>
								    </div>
								</div>

								<div class="form-group row">
								  	<div class="col-sm-4">
								  		  <label for="grad_year_edit"> Graduation Year*</label>
								  	</div>									     
								    <div class="col-sm-3">
								       	<select class="form-control" id="grad_year_edit" name="grad_year_edit" placeholder="Year">
									     	<option>	</option>
									     	<?php 
									     	for($year=2024;$year>=1959;$year--){
											if ($year == $row2['graduated_year']) {
									     	?> 
									     	<option value="<?php echo $year;?>" selected><?php echo $year;?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $year;?>"><?php echo $year;?></option>
									     	<?php }} ?>
									    </select>
									</div>

									<div class="col-sm-3">
										<select class="form-control" id="grad_mont_edit" name="grad_mont_edit" placeholder="Month">
									     	<option> 	</option>
									     	<?php 
									     	$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");	
							
											foreach ($months as $month) {
											if ($month == $row2['graduated_month']) {
									     	?>
									     	<option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
									     	<?php }else{ ?>
									     	<option value="<?php echo $month; ?>"><?php echo $month; ?></option>
									     	<?php }} ?>
									    </select>
									</div>
								</div>

								<button type="submit" id="editEducBg" name="editEducBg">SAVE</button>
								<button type="button" id="canceledit">CANCEL</button>

							</form>

						<?php } //end of for each ?>
						</div>
						<!-- ------------- END OF EDUCATION BG ------------------- -->

						<!-- ------------- VIEW EDUCATION BG ------------------- -->
						<div class="col-sm-12" id="view_educ_bg">
							<div class="row">
								<div class="col-sm-2 mt-2">
									<label><?php echo ucfirst($row2['graduated_month']." ".$row2['graduated_year']); ?></label>
								</div>
								<div class="col-sm-7 mb-5">
									<h5><b><?php echo ucwords($row2['school_name']); ?></b></h5>
									<p><?php echo ucwords($row2['qualification'])." ".ucwords($row2['field_study'])." | ".ucwords($row2['school_location']); ?></p>
								</div>	
								<div class="col-sm-2">
									<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" id="editbg"> </i>
								</div>
							</div>
						</div>
						<!-- ------------- END OF VIEW EDUCATION BG ------------------- -->
					</div>

				</div>
				<?php } ?> 


			    	
					


		</div>
		</div>

	</div>
	


<?php 
include 'includes/footer.php';
?>
<script type="text/javascript">
	$(document).ready(function() {

		//show editable eduction info
		// $('#editbg').click(function(){
		// 	 $('#edit_educ_bg').show();
		// 	var action = 'edit';
		// 	$('#view_educ_bg').hide();
		// 	$('.addeduc').hide();
		// 	// alert('dads');
		// 	$.post("add_view_profile.php",{
		// 			action:action
		// 		},
		// 		function(data){
		// 			// $('#edit_educ_bg').val(" ");
		// 			$('#edit_educ_bg').html(data);
		// 		});
		// });

		//EDIT BUTTON
		$("#editbg").click(function(){
			$('#view_educ_bg').hide();
			$('.addeduc').hide();
			$('#edit_educ_bg').show();
		});
		//CANCEL EDIT BUTTON
		$("#canceledit").click(function(){
			$('#edit_educ_bg').hide();
			$('#view_educ_bg').show();
			$('.addeduc').show();
			
		});
		//ADD BUTTON
		$(".addeduc").click(function(){
			$('#editbg').toggle();
			
		});
		// $(document).delegate("#canceledit","click", function(){
		// event.preventDefault(); 
		// 	    $('#edit_educ_bg').hide();
		// 	    $('#view_educ_bg').show();
		// 	    $('.addeduc').show();
		// });

	});
</script>