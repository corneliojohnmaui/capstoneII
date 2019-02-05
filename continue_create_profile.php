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
}

?>

<style type="text/css">
	.example .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<div class="container-fluid" id="">
	<!-- Circles which indicates the steps of the form: -->
	<!-- <div style="text-align:center;margin-top:40px;">
	  <span class="step"></span>
	  <span class="step"></span>
	  <span class="step"></span>
	  <span class="step"></span>
	</div> -->

	
	<button id="next">next</button>
</div>
	
<div>

</div>
<!-- <script type="text/javascript" src="assets/js/formwizard.js"></script> -->
<?php
?>
<script type="text/javascript">
	
</script>
<?php 
include 'includes/footer.php';
?>