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
				    <!-- -------------EDUCATION BG ------------------- -->
					<?php 

					$myrow2 = $users->fetchdata('educational_bg WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Education</h5></div>
						<div class="col-sm-3 mt-2">
							<label><?php echo ucfirst($row2['graduated_month']." ".$row2['graduated_year']); ?></label>
						</div>
						<div class="col-sm-9">
							<h5><b><?php echo ucwords($row2['school_name']); ?></b></h5>
							<p><?php echo ucwords($row2['qualification'])." ".ucwords($row2['field_study'])." | ".ucwords($row2['school_location']); ?></p>
						</div>	
					</div>
					<?php } ?> 

					
					<!-- ----------------- SKILLS --------------------- -->
					<?php 
					$myrow2 = $users->fetchdata('Skills WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Education</h5></div>
						<div class="col-sm-3 mt-2">
							<label><?php echo ucfirst($row2['graduated_month']." ".$row2['graduated_year']); ?></label>
						</div>
						<div class="col-sm-9">
							<h5><b><?php echo ucwords($row2['school_name']); ?></b></h5>
							<p><?php echo ucwords($row2['qualification'])." ".ucwords($row2['field_study'])." | ".ucwords($row2['school_location']); ?></p>
						</div>	
					</div>
					<?php } ?> 
					<!-- ------------- ADDITIONAL INFO ---------------- -->
					<?php 
					$myrow2 = $users->fetchdata('additional_info WHERE id_user = "'.$uid.'"');
					foreach ($myrow2 as $row2) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>Additional Info</h5></div>
						<div class="col-sm-4 mt-2">
							<label>Expected Salary</label>
						
						</div>
						<div class="col-sm-8 mt-2">
							<h6>PHP <?php echo ucwords($row2['expected_salary']); ?></h6>
						</div>	
						<div class="col-sm-4 mt-2">
						
							<label>Preferred Work Location</label>
						</div>
						<div class="col-sm-8 mt-2">
						
							<h6> <?php echo ucwords($row2['preferred_location']) ?></h6>
						</div>	
					</div>
					<?php } ?> 

					<!-- ----------------- ABOUT ME --------------------- -->
					<?php 
					$myrow3 = $users->fetchdata('users WHERE id_users = "'.$uid.'"');
					foreach ($myrow2 as $row3) {
					
					?>
					<hr>
					<div class="row ml-3">

						<div class="col-sm-12"><h5>About Me</h5></div>
						<div class="col-sm-4 mt-2">
							<label> Address </label>
						
						</div>
						<div class="col-sm-8 mt-2">
							<h6> <?php echo ucwords($row3['address']); ?></h6>
						</div>	
						<div class="col-sm-4 mt-2">
						
							<label> Nationality </label>
						</div>
						<div class="col-sm-8 mt-2">
						
							<h6> <?php echo ucwords($row2['nationality']) ?></h6>
						</div>	
					</div>
					<?php } ?> 
