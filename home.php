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
	$status = $_SESSION['status'];
}

if ($utype == "applicant" && $status == "notactive"){
	header('location:continue_create_profile.php');
}
if ($utype == "employer" && $status == "notactive") {
	header('location:continue_company_profile.php');
}


?>

<div class="container-fluid" id="">

	



	<h1>HOME</h1>

	<a href="home.php?logout=logout">LOGOUT</a>
	

</div>
	
<div>

</div>



<?php 
include 'includes/footer.php';
?>