<?php 
include 'core/init.php';
// include 'includes/header.php';

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
// if (isset($_POST['editEducBg'])) {

// 	// $ideduc = $_POST['ideduc'];
// 	// $where = array("id"=>$ideduc);
// 	// $myarray = array(
// 	// 			"school_name"=> $_POST['school_name'],
// 	// 			"school_location"=> $_POST['school_loc'],
// 	// 			"qualification"=> $_POST['qualification']);
// 	// // echo $ideduc;
// 	// $users->updatedata('educational_bg',$where,$myarray);
// 	// header('location:myprofile.php');
// }



?>

<?php 

	if (isset($_POST['action'])) {
		$act = $_POST['action'];
		if ($act == "edit") {
			
			$result ='';

			$myrow2 = $users->fetchdata('educational_bg WHERE id_user = "'.$uid.'"');

			foreach ($myrow2 as $row2) {
				$result .='<form method="post">
							<input type="hidden" value="'.$row2['id_educ_bg'].'" name="ideduc">';
				$result .='<div class="form-group row">';

				$result .='<div class="col-sm-4">';
				$result .='<label for="school_name"> University/Institute*</label>';
				$result .='</div><div class="col-sm-7">';
				$result .='<input type="text" class="form-control" id="school_name" placeholder="Enter University/Institute" value="'.ucwords($row2['school_name']).'" name="school_name">';
				$result .='</div>';
				$result .='</div>';

				$result .='<div class="form-group row">
						  	<div class="col-sm-4">
						  		<label for="school_loc"> University/Institute Location*</label>
						  	</div>									     
						    <div class="col-sm-7">
						       <input type="text" class="form-control" id="school_loc" placeholder="Enter University/Institute Location" value="'.ucwords($row2['school_location']).'" name="school_loc">
						    </div>
						  </div>';
				$result .='<div class="form-group row">
								  	<div class="col-sm-4">
								  		<label for="qualification"> Qualification* </label>
								  	</div>									     
								    <div class="col-sm-7">
								       <select name="qualification" id="qualification" class="form-control">
								       		<option> 	</option>
								       		<option value="High School Diploma"> High School Diploma </option>
								       		<option value="Vocational Diploma/Short Course Certificate"> Vocational Diploma/Short Course Certificate</option>
								       		<option value="Bachelor'."'".'s /College Degree"> Bachelor'."'".'s /College Degree</option>
								       		<option value="Post Graduate Diploma / Master'."'".'s Degree"> Post Graduate Diploma / Master'."'".'s Degree </option>
								       		<option value="Professional License (Passed Board/Bar/Professional License Exam)"> Professional License (Passed Board/Bar/Professional License Exam)</option>
								       		<option value="Doctorate Degree"> Doctorate Degree </option>
								       </select>
								    </div>
								  </div>';	
				$result .='<div class="form-group row">
							  	<div class="col-sm-4">
							  		 <label for="field_study"> Field of Study*</label>
							  	</div>									     
							    <div class="col-sm-7">
							       <input type="text" class="form-control" id="field_study" value="" placeholder="Enter Preferred Work Location" name="field_study">
							    </div>
							  </div>';
				$result .='<div class="form-group row">
							  	<div class="col-sm-4">
							  		  <label for="grad_year"> Graduation Year*</label>
							  	</div>									     
							    <div class="col-sm-3">
							       	<select class="form-control" id="grad_year" name="grad_year" placeholder="Year">
								      	<option>	</option>';
							for($year=2024;$year>=1959;$year--){
							if ($year == $row2['graduated_year']) {
							$result .='<option value="'.$year.'" selected>'.$year.'</option>';				      		
							}		      	
							$result .='<option value="'.$year.'">'.$year.'</option>';												
							} 
				$result .='</select></div>';
				$result .='<div class="col-sm-3">
										<select class="form-control" id="grad_mont" name="grad_mont" placeholder="Month">
								     		<option> 	</option> ';
						$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");	
						
						foreach ($months as $month) {
						if ($month == $row2['graduated_month']) {
						$result .='<option value="'.$month.'" selected>'.$month.'</option>';
							}
						$result .='<option value="'.$month.'">'.$month.'</option>';
						}
				$result .='</select></div></div>
								  ';
				

				$result .='<button type="submit" id="editEducBg" name="editEducBg">SAVE</button><button id="canceledit">CANCEL</button>';
				$result .='</form>';
			}
			echo $result;
		}
	}


?>
<script type="text/javascript">
	// $("#editbg").click(function(){
	// 		$('.addeduc').hide();
	// });

	// $('#editEducBg').click(function(){
	// 	event.preventDefault(); 
			
	// 		var action = 'save';
			
	// 		// alert('dads');
	// 		$.post("add_view_profile.php",{
	// 				action:action
	// 			},
	// 			function(data){
	// 				// $('#edit_educ_bg').val(" ");
	// 				$('#view_educ_bg').show();
	// 				$('#edit_educ_bg').hide();
	// 				$('#ideductext').html(data);
	// 				// alert(data);

	// 			});
	// 	});
</script>
								    
								    
								  		
								  	
								   
								      
								       
								   
								  
								 
								 <!--  
								  						  								  
								  
								    
										     		
										
								  <div class="form-group row">
								  	<div class="col-sm-4">
								  		 <label for="field_study"> Field of Study*</label>
								  	</div>									     
								    <div class="col-sm-7">
								       
								    </div>
								  </div>	 -->

<?php 
// include 'includes/footer.php';
?>

