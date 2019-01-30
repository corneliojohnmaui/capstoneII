<?php 
	
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


?>
<script type="text/javascript">
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
</script>

<div class="container text-center">
	
	<div class="form-group bg-white" id="login">
	  <h2> LOGIN  <?php  echo $msg; ?></h2>
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
	    <button onclick="return formloginsubmit();" type="submit" name="loginbtn" class="btn btn-dark">Submit</button>
	  </form>
	</div>

</div>




<script type="text/javascript">

</script>