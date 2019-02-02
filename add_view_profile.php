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

?>

<div class="container-fluid" id="">
	
	<a href="home.php?logout=logout">LOGOUT</a>

</div>
	
<div class="container" id="myprofile">
	<div class="row">
		<div class="col-sm-3 h-100 bodynav sticky-top" style="background-color: transparent; margin:5px;">
			 <ul class="list-group list-group-flush">
			  <a href="myprofile.php"><li class="list-group-item"><img src="assets/images/defaultimgpic.jpeg" style="width: 60px; height: 60px;"> Profile</li></a>
			  <a href=""><li class="list-group-item">Experience</li></a>
			  <a href=""><li class="list-group-item">Education</li></a>
			  <a href=""><li class="list-group-item">Skills</li></a>
			  <a href=""><li class="list-group-item">Languages</li></a>
			  <a href=""><li class="list-group-item">Additional Info</li></a>
			  <a href=""><li class="list-group-item">About Me</li></a>
			  <a href=""><li class="list-group-item">Uploaded Resume </li></a>
			  <a href=""><li class="list-group-item">Privacy Settings</li></a>
			
			</ul>
		</div>

		<div class="col-sm-8 bodyresult float-right" style="background-color: white;  margin:5px;"> 

				<?php 
				
				$myrow = $users->fetchdata('users LEFT JOIN educational_bg educ ON users.id_users = educ.id_user LEFT JOIN additional_info addinfo ON users.id_users = addinfo.id_user WHERE  id_users = "'.$uid.'"');
				foreach ($myrow as $row) {
				
				?>
				<div class="row mt-5">
					<div class="col-sm-3">
						<img src="assets/images/defaultimgpic.jpeg" style="width: 150px; height: 150px; border: solid 1.4px;">
					</div>
					<div class="col-sm-9">
						
						<h4> <?php echo ucfirst($row['firstname'])." ".ucfirst($row['lastname']); ?></h4>
						<h5><?php echo ucwords($row['qualification'])." ". ucwords($row['field_study'])." (".ucfirst($row['graduated_month'])." ".$row['graduated_year'].")"; ?></h5>
						<h5><?php echo ucwords($row['school_name']); ?></h5>
						<br>
						<p><?php echo $row['contact_num']." | ".$row['email']." | PHP".$row['expected_salary']." | ".ucwords($row['preferred_location']); ?></p>
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
</div>



<?php 
include 'includes/footer.php';
?>