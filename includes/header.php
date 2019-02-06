<?php 
if (isset($_SESSION['usertype'])) {
	$utype = $_SESSION['usertype'];
	$status = $_SESSION['status'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<!-- icons fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="m">
<div class="">

	<nav class="navbar navbar-expand-lg navbar-light">
	  <a class="navbar-brand" href="#">JuanApplyPH</a>
	  
	  
	  <div class="collapse navbar-collapse" id="navbarNav">
	  <div id="listnav">
	    <ul class="navbar-nav text-center">

	    <?php 
	    if (!isset($_SESSION['usertype'])) {        
	    ?>
	    <li class="nav-item">
	        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
	    </li>
	    <li class="nav-item">
	        <a class="nav-link" href="#">Search Jobs</a>
	    </li>
	    <li class="nav-item">
	        <a class="nav-link" href="#"> Company Profiles</a>
	    </li>
	    <?php  } ?>

	      <?php  
	      if (isset($_SESSION['usertype'])) {
	     
	      if ($utype == "applicant") { ?>
	      <li class="nav-item">
	        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Search Jobs</a>
	      </li>
	  	  <?php } ?>
	      <?php 
	      if ($utype == "applicant") {
	      ?>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         MyJuanApply
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="myprofile.php">My Profile</a>
	          <a class="dropdown-item" href="#">Online Applications</a>
	          <a class="dropdown-item" href="#">Interview Invitation</a>
	        </div>
	      </li>

	     <?php } ?>
	      <?php  if ($utype == "applicant") { ?>
	     <li class="nav-item">
	        <a class="nav-link" href="#"> Company Profiles</a>
	      </li>
	  		<?php } ?>
	      <?php 
	      if ($utype == "employer") {
	      ?>
	      <li class="nav-item">
	        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"> Job Ads</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"> Talent Jobs</a>
	      </li>
	  	  <?php } } ?>
	    </ul>
		   <!--  <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form> -->	    
	  </div>
	  </div>
<!-- 	  <ul class="navbar-nav text-right float-right mr-5">
	     <li class="nav-item dropdown float-right">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         NAME
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	          <a class="dropdown-item" href="#"> LOGOUT </a>
	         
	        </div>
	      </li>
	    </ul> -->
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
</div>

