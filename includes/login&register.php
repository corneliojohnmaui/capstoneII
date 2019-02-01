<?php 
	
	if (isset($_SESSION['id'])) {
		header("location:home.php");
	}

	
	if (isset($_REQUEST['loginbtn'])) {

		extract($_REQUEST);
		$result =$users->loginuser($email,$pwd);
		if ($result) {
			// $msg = "Success";
			header('location:home.php');
		}else{
			$msg = "Failed";
		}
	}

	if (isset($_REQUEST['registerbtn'])) {
		extract($_REQUEST);
		$result = $users->register_user($firstname,$lastname,$contact,$emailreg,$pwdreg,$usertype);
		if ($result) {

			sleep(3);

			
		}else{
			
			$msg = "Registration Failed";
			echo "<script>alertLogReg();</script>";
		}
		
	}


?>
<script type="text/javascript">
	

	function alertLogReg(){
		swal({
		  title: 'Registered Successfully!',
		  text: 'You can now login',
		  icon: 'success',
		  button: false,
		});
	}

	function formloginsubmit()
	{
		var form = document.login;
		if (form.email.value == "") {
			alert("Enter Email or Password");
			return false;
		}
		else if (form.pwd.value == "") {
			alert("Enter Password");
			return false;
		}

	}
	function formregistersubmit()
	{
		var form = document.register;
		if (form.usertype.value == "") {
			alert("Please Select on Register As");
			return false;
		}
		else if (form.firstname.value == "") {
			alert("Enter First name");
			return false;
		}
		else if (form.lastname.value == "") {
			alert("Enter Last name");
			return false;
		}
		else if (form.contact.value == "") {
			alert("Enter Contact Number");
			return false;
		}
		else if (form.emailreg.value == "") {
			alert("Enter Email");
			return false;
		}
		else if (form.pwdreg.value == "") {
			alert("Enter Password");
			return false;
		}else{
		 
			
		}
		
	}	
</script>

<div class="container text-center">
	
	<div class="form-group bg-white" id="login">
	  <h2> LOGIN <p id="msgtxt"><?php  echo $msg; ?> </p></h2>
	  <form action="" method="post" name="login">
	    <div class="form-group">
	      <label for="email" class="text-left">Email:
	      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"></label>
	    </div>
	    <div class="form-group">
	      <label for="pwd" class="text-left">Password:
	      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"></label>
	    </div>
	    <div class="checkbox">
	      <label><input type="checkbox" name="remember"> Remember me</label>
	    </div>
	   
	    <button onclick="return formloginsubmit();" type="submit" name="loginbtn" class="btn btn-dark">Login</button><br>
	     <small> Don't have an account?<a style="color: #0366d6;" id="goregister"> Create Account </a></small>
	  </form>
	</div>
	<br>
	<div class="form-group bg-white" id="register">
	  <h2> REGISTER  <?php  echo $msg; ?></h2>
	  <form action="" method="post" name="register">

	  	<div class="form-group">
	      <label for="usertype" class="text-left"> Register as
	      <select name="usertype" id="usertype" class="form-control">
	      	<option> </option>
	      	<option value="applicant"> Applicant </option>
	      	<option value="employer"> Employer </option>
	      </select>
	  	  </label>
	    </div>	 
	    <div class="form-group">
	      <label for="firstname" class="text-left">First name
	      <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname"></label>
	    </div>
	    <div class="form-group">
	      <label for="lastname" class="text-left">Last name
	      <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname"></label>
	    </div>	    
	   	<div class="form-group">
	      <label for="contact" class="text-left">Contact Number
	      <input type="tel" class="form-control" id="contact" placeholder="Enter Contact Number" name="contact"></label>
	    </div>
	    <div class="form-group">
	      <label for="emailreg" class="text-left">Email
	      <input type="email" class="form-control" id="emailreg" placeholder="Enter Email" name="emailreg"></label>
	    </div>
	    <div class="form-group">
	      <label for="pwdreg" class="text-left">Password
	      <input type="password" class="form-control" id="pwdreg" placeholder="Enter Password" name="pwdreg"></label>
	    </div>

 		<button onclick="return formregistersubmit();" type="submit" name="registerbtn" class="btn btn-dark">Register</button><br>
	    <small> Already have an account?<a style="color: #0366d6;" id="gologin"> Sign In Now </a></small>
	   
	  </form>
	</div>
</div>




<script type="text/javascript">
$('#register').hide();

$(document).ready(function(){
	$('#goregister').click(function(){
		$('#login').hide(300);
		$('#register').show(300);
	});
	$('#gologin').click(function(){
		$('#register').hide(300);
		$('#login').show(300);
	});
});

</script>