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

?>

<div class="container-fluid" id="">

	<a href="home.php?logout=logout">LOGOUT</a>

</div>

	<div class="container"  id="myprofile" style="">
		<div class="row ">

		<div class="col-sm-2 h-100 bodynav sticky-top" style="background-color: transparent; margin:5px;">
			<form method="get">
			 <ul class="list-group list-group-flush">
			  <a href=""><li class="list-group-item"><img src="assets/images/defaultimgpic.jpeg" style="width: 60px; height: 60px;"> Profile</li></a>
			  <a href="work_experience.php"  class="list-group-item">Experience</a>
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
			
					<?php 					
					$myrow = $users->fetchdata('users LEFT JOIN educational_bg educ ON users.id_users = educ.id_user LEFT JOIN additional_info addinfo ON users.id_users = addinfo.id_user WHERE id_users = "'.$uid.'" limit 1');
					foreach ($myrow as $row) {
					
					?>
					<div class="row mt-5">
						<div class="col-sm-3">
							<img src="assets/images/defaultimgpic.jpeg" style="width: 150px; height: 150px; border: solid 1.4px;">
						</div>
						<div class="col-sm-9">
							
							<h4> <?php echo ucfirst($row['firstname'])." ".ucfirst($row['lastname']); ?></h4>
							<h5><?php echo ucwords($row['qualification'])." ". ucwords($row['field_study'])." (".ucfirst($row['graduated_month'])." ".$row['graduated_year'].")"; ?></h5>
							<h5><?php echo ucwords($row['school_name']); ?></h5>
							<br>
							<p><?php echo $row['contact_num']." | ".$row['email']." | PHP".$row['expected_salary']." | ".ucwords($row['preferred_location']); ?></p>
						</div>
					</div>
					<?php } ?>
				    <!-- -------------EDUCATION BG ------------------- -->
					<?php 

					$myrow2 = $users->fetchdata('educational_bg WHERE id_user = "'.$uid.'" limit 1');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Education</h5></div>
						<div class="col-sm-3 mt-2">
							<label><?php echo ucfirst($row2['graduated_month']." ".$row2['graduated_year']); ?></label>
						</div>
						<div class="col-sm-9">
							<h5><b><?php echo ucwords($row2['school_name']); ?></b></h5>
							<p><?php echo ucwords($row2['qualification'])." ".ucwords($row2['field_study'])." | ".ucwords($row2['school_location']); ?></p>
						</div>	
					</div>
					<?php } ?> 

					
					<!-- ----------------- SKILLS --------------------- -->
					<?php 
					$myrow2 = $users->fetchdata('Skills WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Education</h5></div>
						<div class="col-sm-3 mt-2">
							<label><?php echo ucfirst($row2['graduated_month']." ".$row2['graduated_year']); ?></label>
						</div>
						<div class="col-sm-9">
							<h5><b><?php echo ucwords($row2['school_name']); ?></b></h5>
							<p><?php echo ucwords($row2['qualification'])." ".ucwords($row2['field_study'])." | ".ucwords($row2['school_location']); ?></p>
						</div>	
					</div>
					<?php } ?> 
					<!-- ------------- ADDITIONAL INFO ---------------- -->
					<?php 
					$myrow2 = $users->fetchdata('additional_info WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Additional Info</h5></div>
						<div class="col-sm-4 mt-2">
							<label>Expected Salary</label>
						
						</div>
						<div class="col-sm-8 mt-2">
							<h6>PHP <?php echo ucwords($row2['expected_salary']); ?></h6>
						</div>	
						<div class="col-sm-4 mt-2">
						
							<label>Preferred Work Location</label>
						</div>
						<div class="col-sm-8 mt-2">
						
							<h6> <?php echo ucwords($row2['preferred_location']) ?></h6>
						</div>	
					</div>
					<?php } ?> 

					<!-- ----------------- ABOUT ME --------------------- -->
					<?php 
					$myrow3 = $users->fetchdata('users WHERE id_users = "'.$uid.'"');
					foreach ($myrow2 as $row3) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>About Me</h5></div>
						<div class="col-sm-4 mt-2">
							<label> Address </label>
						
						</div>
						<div class="col-sm-8 mt-2">
							<h6> <?php echo ucwords($row3['address']); ?></h6>
						</div>	
						<div class="col-sm-4 mt-2">
						
							<label> Nationality </label>
						</div>
						<div class="col-sm-8 mt-2">
						
							<h6> <?php echo ucwords($row2['nationality']) ?></h6>
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

		// $("#editbg").click(function(){
		// $('.addeduc').hide();
		// });

		// $(document).delegate("#canceledit","click", function(){
		// event.preventDefault(); 
		// 	    $('#edit_educ_bg').hide();
		// 	    $('#view_educ_bg').show();
		// 	    $('.addeduc').show();
		// });

	});
</script>