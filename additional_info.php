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
	if (isset($_POST['submitAddInfo'])) {
		
		$idofaddinfo = $_POST['idofaddinfo'];
		$where = array("id_addinfo"=> $idofaddinfo);
		$fields = array(
					"expected_salary"=> $_POST['exp_sal'],
					"preferred_location"=> $_POST['pre_loc']
					);
		$result = $users->updatedata("additional_info",$where,$fields);
		if ($result) {
			echo '<script>swal({	
			icon: "success",
			title: "Updated!",
			text: "Successfully Data Updated!",
			type: "success"}).then(okay => {
			if (okay) {
			window.location.href = "additional_info.php";
			}
			}); </script>';
		}else{
			echo '<script>swal({	
			icon: "error",
			title: "Error!",
			text: "Error Updating Data!",
			type: "warning"}).then(okay => {
			if (okay) {
			window.location.href = "additional_info.php";
			}
			}); </script>';
		}	
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
			  <a href=""  class="list-group-item">Experience</a>
			  <a href="education.php"  class="list-group-item">Education</a>
			  <a href=""  class="list-group-item">Skills</a>
			  <a href="additional_info.php"  class="list-group-item active">Additional Info</a>
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
			
				
					<!-- ------------- ADDITIONAL INFO ---------------- -->
					
					<!-- ------ F-INNER ROW ------- -->
					<div class="row ml-3 mt-3">

						
						<div class="col-sm-12">
							<h5>Additional Info
								

							</h5>
							<hr>
						</div>
						<?php 
						$myrow2 = $users->fetchdata('additional_info WHERE id_user = "'.$uid.'"');
						foreach ($myrow2 as $row2) {
						
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
											 <input type="text" class="form-control" id="exp_sal" name="exp_sal" value="<?php echo ucwords($row2['expected_salary']); ?>">
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
						<!-- ---------- VIEW ADDITIONAL INFO ------------- -->
						<div class="col-sm-12" id="view_add_info">
							<div class="row">
								<div class="col-sm-4 mt-2">
									<label>Expected Salary</label>
								</div>
								<div class="col-sm-4 mt-2">
									<h6>PHP <?php echo ucwords($row2['expected_salary']); ?></h6>
								</div>	
								<div class="col-sm-2 mt-2">
									<a href="additional_info.php?addInfo=<?php echo $row2['id_addinfo']; ?>"><i class="fa fa-pencil-square-o fa-lg editAI" aria-hidden="true" id=""></i></a>

									
								</div>
								<div class="col-sm-4 mt-2">
								
									<label>Preferred Work Location</label>
								</div>
								<div class="col-sm-7 mt-2">
								
									<h6> <?php echo ucwords($row2['preferred_location']) ?></h6>
								</div>
							</div>	
						</div>
						<!-- ---------- END OF VIEW ADDITIONAL INFO ------------- -->
						
						<?php } //END OF NOT ISSET ?>

						<?php } // END OF FOR EACH?> 


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

		$("#canceleditAI").click(function(){
			history.back(1);
		});

		// $(document).delegate("#canceledit","click", function(){
		// event.preventDefault(); 
		// 	    $('#edit_educ_bg').hide();
		// 	    $('#view_educ_bg').show();
		// 	    $('.addeduc').show();
		// });

	});
</script>