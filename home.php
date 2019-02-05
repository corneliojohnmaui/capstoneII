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

?>

<div class="container-fluid" id="">
	<?php  if ($utype == "applicant" && $status == "notactive"){ ?>
	<?php
	
	 include 'includes/create_profile.php'; 
	
	 ?>
	<a href="home.php?logout=logout">LOGOUT</a>
	<?php }else if ($utype == "applicant" && $status != "notactive"){?>

	<a href="home.php?logout=logout">LOGOUT</a>
	<h1>HOME</h1>
	<?php }else{ echo "OTHER USER"; ?>
	<a href="home.php?logout=logout">LOGOUT</a>
	<?php } ?>

</div>
	
<div>

</div>



<?php 
include 'includes/footer.php';
?>