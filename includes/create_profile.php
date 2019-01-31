

<br>
	<div class="container" >
		<div class="card" id="additional_info">
		  <div class="card-header">
		    Featured
		  </div>
		  <div class="card-body">
			   <form action="" method="post">
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
			 	 </form>
		  </div>
		  <div class="card-footer text-muted">
		  <button type="button" id="next" class="btn btn-dark float-right">Next</button>
		  </div>
		</div>
	 
	 	<div class="card" id="educational_bg" style="display: none;">
		  <div class="card-header">
		    Featured2
		  </div>
		  <div class="card-body">
			   <form action="" method="post">
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
			 	 </form>
		  </div>
		  <div class="card-footer text-muted">
		  	<button type="button" id="back2" class="btn btn-dark float-right">Prev</button>
		  <button type="button" id="next" class="btn btn-dark float-right">Next</button>
		  </div>
		</div>
	</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#next').click(function(){
			$('#additional_info').hide(500);
			$('#educational_bg').show(500);
		});
		$('#back2').click(function(){
			$('#educational_bg').hide(500);
			$('#additional_info').show(500);
		});
	})
</script>