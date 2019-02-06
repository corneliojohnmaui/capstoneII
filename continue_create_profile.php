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
        "school_location"=>addslashes($_POST['school_loc']),
        "qualification"=>addslashes($_POST['qualification']),
        "field_study"=>addslashes($_POST['field_study']),
        "graduated_year"=>$_POST['grad_year'],
        "graduated_month"=>$_POST['grad_mont']);





  $result = $users->savedata("additional_info",$arrayname);
  $result2 = $users->savedata("educational_bg",$arrayname2);

  if ($_POST['exp_lvl'] != "Fresh graduate seeking my first job") {
    //save all fields
    $arrayname3 = array("id_user"=> $userid,
      "company_name"=>$_POST['comp_name'],
      "company_location"=>addslashes($_POST['comp_loc']),
      "position"=>addslashes($_POST['position']),
      "position_level"=>addslashes($_POST['position_lvl']),
      "joined_year"=>$_POST['joined_yr'],
      "joined_month"=>$_POST['joined_mt'],
      "joined_year_to"=>$_POST['joined_yr_to'],
      "joined_month_to"=>$_POST['joined_mt_to'],
      "specialization"=>addslashes($_POST['specialization']),
      "role"=>addslashes($_POST['role']),
      "industry"=>addslashes($_POST['industry']),
      "since_year"=>$_POST['since_yr'],
      "since_month"=>$_POST['since_mt'],
      "experience_level"=>addslashes($_POST['exp_lvl']));
    $result3 = $users->savedata("work_experience",$arrayname3);
  }else{
    //save exp level only
    $arrayname33 = array("id_user"=>$userid,
        "experience_level"=> addslashes($_POST['exp_lvl']));
    $result33 = $users->savedata("work_experience",$arrayname33);
  }
  

  $where = array('id_users'=> $userid);
  $fields = array('status'=>'active');
  $result4 = $users->updatedata("users",$where,$fields);

  if ($result && $result2 && $result4 ) {
    echo '<script>swal({  
      icon: "success",
      title: "Done Creating Profile",
      text: "You can now start Applying !",
      type: "success"}).then(okay => {
      if (okay) {
      window.location.href = "myprofile.php";
      }
      });</script>';

    // header('location:myprofile.php?msg=success');
  }else{
    // header('location:home.php?msg=failed');
    echo '<script>swal({  
      icon: "error",
      title: "Erorr Creating Profile",
      text: "",
      type: "danger"});</script>';;
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
  //  $('#additional_info').hide(500);
  //  $('#educational_bg').show(500);
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
  <a href="home.php?logout=logout">LOGOUT</a>
  
<br>
  <div class="container continuecp_con" id="continue_cp">
    <form action="" method="post" name="create_profile">
    <!-- ----------- ADDITIONAL INFO ---------- -->

    <div class="card" id="additional_info" >
      <div class="card-header">
          Featured
      </div>
        <div class="card-body justify-content-center">
          <div class="container">
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="nationality"> Nationality*</label>
              </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="nationality" placeholder="Enter Nationality" name="nationality">
              </div>
          </div>            
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="address"> City Address*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="address" placeholder="Enter City Address" name="address">
              </div>
          </div>
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="salaryexp"> Monthly Salaray Expectation*</label>
            </div>  
              <div class="col-sm-5">
                 <input type="number" class="form-control" id="salaryexp" placeholder="Enter Salaray Expectation" name="salaryexp">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <label for="preferredloc"> Preferred Work Location*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="preferredloc" placeholder="Enter Preferred Work Location" name="preferredloc">
              </div>
          </div>
        </div>
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

            <div class="form-group row">
            <div class="col-sm-3">
               <label for="school_name"> University/Institute*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="school_name" placeholder="Enter University/Institute" name="school_name">
              </div>
          </div>
            <div class="form-group row">
            <div class="col-sm-3">
                <label for="school_loc"> University/Institute Location*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="school_loc" placeholder="Enter University/Institute Location" name="school_loc">
              </div>
          </div>
            <div class="form-group row">
            <div class="col-sm-3">
                <label for="qualification"> Qualification*</label>
            </div>
              <div class="col-sm-5">
                  <select name="qualification" id="qualification" class="form-control">
                    <option>  </option>
                    <option value="High School Diploma"> High School Diploma </option>
                    <option value="Vocational Diploma/Short Course Certificate"> Vocational Diploma/Short Course Certificate</option>
                    <option value="Bachelor's /College Degree"> Bachelor's /College Degree</option>
                    <option value="Post Graduate Diploma / Master's Degree"> Post Graduate Diploma / Master's Degree </option>
                    <option value="Professional License (Passed Board/Bar/Professional License Exam)"> Professional License (Passed Board/Bar/Professional License Exam)</option>
                    <option value="Doctorate Degree"> Doctorate Degree </option>
                  </select>
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-3">
                <label for="field_study"> Field of Study*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="field_study" placeholder="Enter Preferred Work Location" name="field_study">
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-3">
                <label for="grad_year"> Graduation Year*</label>
            </div>
              <div class="col-sm-4">
                 <select class="form-control" id="grad_year" name="grad_year">
                    <option>  </option>
                  <?php 
                    // $year=1959;
                    for($year=2024;$year>=1959;$year--){?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-sm-4">
                <select class="form-control" id="grad_mont" name="grad_mont">
                  <option>  </option> 
                  <?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                foreach ($months as $month) { ?>
                <option value="<?php echo $month; ?>"><?php echo $month; ?> </option>
                <?php } ?>                
                </select>
              </div>
          </div>
           
                          
        
      </div>
      <div class="card-footer text-muted">
      
         <button type="button" id="back" class="btn btn-dark float-left">Prev</button>
        <button type="button" id="next2" class="btn btn-dark float-right">Next</button>
      </div>
    </div>

    <!-- ----------- WORK EXPERIENCE AND SKILLS ---------- -->
    <div class="card" id="workexp" style="display: none;">
      <div class="card-header">
       Skills
      </div>
      <div class="card-body">
      
        <div class="form-group row justify-content-center" >
          <div class="col-sm-5">
              <button type="button" class="form-control explvlbtn" id="1"  value="I have been working since"> I HAVE WORK EXPERIENCE </button>
          </div>
            <div class="col-sm-5">
               <button type="button" class="form-control explvlbtn" id="2" value="Fresh graduate seeking my first job">  I AM A STUDENT / FRESH GRADUATE </button>
            </div>
            <input type="hidden" name="exp_lvl" id="exp_lvl" value="">
        </div>
        <!-- I HAVE WORK EXP OR I AM A STUDENT / FESH GRADUATE  -->
        <div id="work_exp_div" style="display: none;">
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="since_yr"> Since*</label>
            </div>

              <div class="col-sm-4">
                  <select class="form-control" id="since_yr" name="since_yr">
                    <option disabled selected> Year </option>
                  <?php 
                    // $year=1959;
                    for($year=2024;$year>=1959;$year--){?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                    <?php } ?>
                </select>

              </div>
              <div class="col-sm-4">
                <select class="form-control" id="since_mt" name="since_mt">
                  <option disabled selected> Month </option> 
                  <?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                foreach ($months as $month) { ?>
                <option value="<?php echo $month; ?>"><?php echo $month; ?> </option>
                <?php } ?>                
                </select>

              </div>
          </div>          
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="comp_name"> Company Name*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="comp_name" placeholder="Enter Preferred Work Location" name="comp_name">
              </div>
          </div>    
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="comp_loc"> Company Location*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="comp_loc" placeholder="Enter Preferred Work Location" name="comp_loc">
              </div>
          </div>  
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="position"> Position Title*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="position" placeholder="Enter Preferred Work Location" name="position">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="position_lvl"> Position Level*</label>
            </div>
              <div class="col-sm-5">
                <select name="position_lvl" id="position_lvl" class="form-control">
                  <option>  </option>

                  <option title='CEO / SVP / AVP / VP / Director' value='1' > CEO / SVP / AVP / VP / Director </option>
                                <option title='Assistant Manager / Manager' value='2' > Assistant Manager / Manager </option>
                                <option title='Supervisor / 5 Years & Up Experienced Employee' value='3' > Supervisor / 5 Years & Up Experienced Employee </option>
                                <option title='1-4 Years Experienced Employee' value='4' > 1-4 Years Experienced Employee </option>
                                <option title='Fresh Grad / < 1 Year Experienced Employee' value='5' > Fresh Grad / < 1 Year Experienced Employee </option>
                                <option title='Non-Executive' value='6' > Non-Executive </option>

                </select>
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="join_dura"> Joined Duration*</label>
            </div>

              <div class="col-sm-4">
                  <select class="form-control" id="joined_yr" name="joined_yr">
                    <option disabled selected> Year </option>
                  <?php 
                    // $year=1959;
                    for($year=2024;$year>=1959;$year--){?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                    <?php } ?>
                </select>

              </div>
              <div class="col-sm-4">
                <select class="form-control" id="joined_mt" name="joined_mt">
                  <option disabled selected> Month </option> 
                  <?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                foreach ($months as $month) { ?>
                <option value="<?php echo $month; ?>"><?php echo $month; ?> </option>
                <?php } ?>                
                </select>

              </div>
              <div class="col-sm-3">
                <label for="join_dura" class="float-right"> To</label>
            </div>
               <div class="col-sm-4">
                  <select class="form-control" id="joined_yr_to" name="joined_yr_to">
                    <option disabled selected> Year </option>
                  <?php 
                    // $year=1959;
                    for($year=2024;$year>=1959;$year--){?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                    <?php } ?>
                </select>
                
              </div>
              <div class="col-sm-4">
                <select class="form-control" id="joined_mt_to" name="joined_mt_to">
                  <option disabled selected> Month </option> 
                  <?php $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                foreach ($months as $month) { ?>
                <option value="<?php echo $month; ?>"><?php echo $month; ?> </option>
                <?php } ?>                
                </select>
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-3">
                <label for="specialization"> Specialization*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="specialization" placeholder="Enter Preferred Work Location" name="specialization">
              </div>
          </div>          
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="role"> Role*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="role" placeholder="Enter Preferred Work Location" name="role">
              </div>
          </div>          
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="industry"> Industry*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="industry" placeholder="Enter Preferred Work Location" name="industry">
              </div>
          </div>
        </div>
   
      </div>
      <div class="card-footer text-muted">
        <button type="button" id="back2" class="btn btn-dark float-left">Prev</button>
    
          <button onclick="return createprofileValidation();" type="submit" id="save" name="save" class="btn btn-dark float-right">Save</button>
    
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
       // $("#additional_info").hide("slide", { direction: "left" }, 500);
      // createprofileValidation();
      $('#additional_info').hide();
      $('#educational_bg').show();
       // $('#additional_info').hide("slide", { direction: "left" }, 1000);
       //  $('##educational_bg').show("slide", { direction: "left" }, 1000);
      
    });
    $('#next2').click(function(){
      // $('#additional_info').hide(400);
      $('#educational_bg').hide();
      $('#workexp').show();
    });
    $('#back').click(function(){
      $('#educational_bg').hide();
      $('#workexp').hide();
      $('#additional_info').show();
    });
    $('#back2').click(function(){
      $('#workexp').hide();
      $('#educational_bg').show();
    });
    //alert value of select
    // $(document).on("change","#grad_date", function(){
    //  var val = $(this).val();
    //  alert(val);
    // });
    // $('input').focus(function() {
    //   // oldSize = $("label[for='FirstName']").css('font-size');
    //   // $("label[for='FirstName']").css('font-size', '42px');
    //   // var forl = $(this).attr('id');
    //   // $("label[for=forl]").css('font-size','5px');
    //   alert('dada')
    // });

    //EXPIRIENCE LEVEL BTN
    $('.explvlbtn').click(function(){
      var explvlid = $(this).attr("id");
      var explvlval = $(this).val();
      $('#exp_lvl').val(explvlval);
      if (explvlid == "1") {
        $('#work_exp_div').show();
        $("#work_exp_div input").prop("disabled", false);
        $("#work_exp_div select").prop("disabled", false);

      }else{
        $('#work_exp_div').hide();
        $("#work_exp_div input").prop("disabled", true);
        $("#work_exp_div select").prop("disabled", true);
        // $('#work_exp_div').find('input:text').val(' ');
        // $('#work_exp_div').find('option:selected').val('');
      }
      alert(explvlval)
    });
  });
</script>

<?php 
include 'includes/footer.php';
?>