<?php 



if (isset($_POST['save'])) {
	// $uid = 'dasda';
	$userid = $users->getsessionid();
	$arrayname = array(
				"id_user"=> $userid,
				"nationality"=>$_POST['nationality'],
				"address"=>$_POST['address'],
				"expected_salary"=>$_POST['salaryexp'],
				"preferred_location"=>$_POST['preferredloc']);

	$arrayname2 = array("id_user"=> $userid,
				"school_name"=>$_POST['school_name'],
				"school_location"=>$_POST['school_loc'],
				"qualification"=>$_POST['qualification'],
				"field_study"=>$_POST['field_study'],
				"graduated_year"=>$_POST['grad_year'],
				"graduated_month"=>$_POST['grad_mont']);

	$result = $users->savedata("additional_info",$arrayname);
	$result2 = $users->savedata("educational_bg",$arrayname2);

	if ($result && $result2) {
		header('location:myprofile.php?msg=success');
	}else{
		header('location:home.php?msg=failed');
	}
	
}

	// nationality
	// address
	// salaryexp
	// preferredloc

	// school_name
	// school_loc
	// qualification
	// field_study
	// grad_date
?>

<script type="text/javascript">
	function createprofileValidation(){		

	var form = document.create_profile;
	if (form.nationality.value == "") {
		alert("Enter Nationality");
		return false;
	}
	else if (form.address.value == "") {
		alert("Enter Address");
		return false;
	}
	else if (form.salaryexp.value == "") {
		alert("Enter Salary Expectation");
		return false;
	}
	else if (form.preferredloc.value == "") {
		alert("Enter Preferred Location");
		return false;
	}
	// else{
	// 	$('#additional_info').hide(500);
	// 	$('#educational_bg').show(500);
	// }
	else if (form.school_name.value == "") {
		alert("Enter University/Institute");
		return false;
	}
	else if (form.school_loc.value == "") {
		alert("Enter University/Institute Location");
		return false;
	}
	else if (form.qualification.value == "") {
		alert("Enter Qualification");
		return false;
	}	
	else if (form.field_study.value == "") {
		alert("Enter Field of Study");
		return false;
	}
	else if (form.grad_year.value == "") {
		alert("Select Graduation Year");
		return false;
	}
	else if (form.grad_mont.value == "") {
		alert("Select Graduation Date");
		return false;
	}	

	}	

	
</script>
	
<br>
	<div class="container" >
		<form action="" method="post" name="create_profile">
		<!-- ----------- ADDITIONAL INFO ---------- -->

		<div class="card" id="additional_info" >
		  <div class="card-header">
		    Featured
		  </div>
		  <div class="card-body">

			   		
				    <div class="form-group">
				      <label for="nationality"> Nationality*
				      <input type="text" class="form-control" id="nationality" placeholder="Enter Nationality" name="nationality"></label>
				    </div>
				    <div class="form-group">
				      <label for="address"> City Address*
				      <input type="text" class="form-control" id="address" placeholder="Enter City Address" name="address"></label>
				    </div>				

				    <div class="form-group">
				      <label for="salaryexp"> Monthly Salaray Expectation*
				      <input type="number" class="form-control" id="salaryexp" placeholder="Enter Salaray Expectation" name="salaryexp"></label>
				    </div>

				    <div class="form-group">
				      <label for="preferredloc"> Preferred Work Location*
				      <input type="text" class="form-control" id="preferredloc" placeholder="Enter Preferred Work Location" name="preferredloc"></label>
				    </div>

<!-- 				    <div class="form-group">
				      <label for="address"> Other Info
				      <input type="text" class="form-control" id="address" placeholder="Enter City Address" name="address"></label>
				    </div>				 -->    				    				    
			 	 
		  </div>
		  <div class="card-footer text-muted">
		  <button onclick="" type="button" id="next" class="btn btn-dark float-right">Next</button>
		  </div>
		</div>

	 	<!-- ----------- EDUCATIONAL BACKGROUND  ---------- -->
	 	<div class="card" id="educational_bg"  style="display: none;">
		  <div class="card-header">
		    Educational Background
		  </div>
		  <div class="card-body">
			 
				    <div class="form-group">
				      <label for="school_name"> University/Institute*
				      <input type="text" class="form-control" id="school_name" placeholder="Enter University/Institute" name="school_name"></label>
				    </div>
				    <div class="form-group">
				      <label for="school_loc"> University/Institute Location*
				      <input type="text" class="form-control" id="school_loc" placeholder="Enter University/Institute Location" name="school_loc"></label>
				    </div>				

				    <div class="form-group">
				      <label for="qualification"> Qualification*
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

				    <div class="form-group">
				      <label for="field_study"> Field of Study*
				      <input type="text" class="form-control" id="field_study" placeholder="Enter Preferred Work Location" name="field_study"></label>
				    </div>

				    <div class="form-group">
				      <label for="grad_year"> Graduation Year*
				     
				      <select class="form-control" id="grad_year" name="grad_year">
				      	<option>	</option>
				      <?php 
				      	// $year=1959;
				      	for($year=2024;$year>=1959;$year--){?>
				      	<option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
				      	<?php } ?>
				      </select>
				      </label>
				      <label for="grad_mont">  Month*
				     	<select class="form-control" id="grad_mont" name="grad_mont">
				     		<option> 	</option> 
				     	<?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
							foreach ($months as $month) { ?>
							<option value="<?php echo $month; ?>"><?php echo $month; ?>	</option>
							<?php } ?>				     		
				     	</select>
				      </label>
				    </div>
<!-- 				    <div class="form-group">
				      <label for="address"> Other Info
				      <input type="text" class="form-control" id="address" placeholder="Enter City Address" name="address"></label>
				    </div>				 -->    				    				    
			 	
		  </div>
		  <div class="card-footer text-muted">
		  	<button type="button" id="back2" class="btn btn-dark float-right">Prev</button>
		 <!--  <button type="button" id="next" class="btn btn-dark float-right">Next</button> -->
		    <button onclick="return createprofileValidation();" type="submit" id="save" name="save" class="btn btn-dark float-right">Save</button>
		  </div>
		</div>

		<!-- ----------- WORK EXPERIENCE AND SKILLS ---------- -->
		<div class="card" id="workexp_skills" style="display: none;">
		  <div class="card-header">
		   Skills
		  </div>
		  <div class="card-body">
			
				    <div class="form-group">
				      <label for="skills"> Skills
				      <input type="text" class="form-control" id="Skills" placeholder="" name="skills"></label>
					  <label for="school_name"> Proficiency
				      <select class="form-control" id="profiency" name="profiency">
				      	
				      	<option> Advanced</option>
				      	<option> Intermediate</option>
				      	<option selected=""> Beginner</option>
				      </select>
				  	  </label>

				  	  <button>x</button>
				    </div>
				    <button>+</button>
   
		  </div>
		  <div class="card-footer text-muted">
		  <button type="button" id="back2" class="btn btn-dark float-right">Prev</button>
		  <button type="button" id="next" class="btn btn-dark float-right">Next</button>
		
		  </div>
		</div>

		</form>
	</div> <!-- end of container -->


<script>
$( "input" ).focusin(function() {
  $( this ).closest( "label" ).css( "font-size", "15px" );
  // var labltxt = $(this).find("label").text();
  // alert(labltxt)
});
$( "input" ).focusout(function() {
  $( this ).closest( "label" ).css( "font-size", "17px" );
});
</script>
 

<script type="text/javascript">
	$(document).ready(function(){
		$('#next').click(function(){
			// createprofileValidation();
				$('#additional_info').hide(500);
			$('#educational_bg').show(500);
			
		});
		$('#back2').click(function(){
			$('#educational_bg').hide(500);
			$('#additional_info').show(500);
		});
		//alert value of select
		// $(document).on("change","#grad_date", function(){
		// 	var val = $(this).val();
		// 	alert(val);
		// });
		// $('input').focus(function() {
		//   // oldSize = $("label[for='FirstName']").css('font-size');
		//   // $("label[for='FirstName']").css('font-size', '42px');
		//   // var forl = $(this).attr('id');
		//   // $("label[for=forl]").css('font-size','5px');
		//   alert('dada')
		// });

	})
</script>