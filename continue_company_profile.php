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
  // $userid = $users->getsessionid();
  // $arrayname = array(
  //       "id_user"=> $userid,
  //       "nationality"=>$_POST['nationality'],
  //       "address"=>$_POST['address'],
  //       "expected_salary"=>$_POST['salaryexp'],
  //       "preferred_location"=>$_POST['preferredloc']);

  // $arrayname2 = array("id_user"=> $userid,
  //       "school_name"=>$_POST['school_name'],
  //       "school_location"=>addslashes($_POST['school_loc']),
  //       "qualification"=>addslashes($_POST['qualification']),
  //       "field_study"=>addslashes($_POST['field_study']),
  //       "graduated_year"=>$_POST['grad_year'],
  //       "graduated_month"=>$_POST['grad_mont']);





  // $result = $users->savedata("additional_info",$arrayname);
  // $result2 = $users->savedata("educational_bg",$arrayname2);

  
  // if ($result && $result2 && $result4 ) {
  //   echo '<script>swal({  
  //     icon: "success",
  //     title: "Done Creating Profile",
  //     text: "You can now start Applying !",
  //     type: "success"}).then(okay => {
  //     if (okay) {
  //     window.location.href = "myprofile.php";
  //     }
  //     });</script>';

  //   // header('location:myprofile.php?msg=success');
  // }else{
  //   // header('location:home.php?msg=failed');
  //   echo '<script>swal({  
  //     icon: "error",
  //     title: "Erorr Creating Profile",
  //     text: "",
  //     type: "danger"});</script>';;
  // }
  
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
  <div class="container continuecp_con" id="continue_com_pro">
    <form action="" method="post" name="create_com_profile">
    <!-- ----------- ADDITIONAL INFO ---------- -->

    <div class="card" id="company_info" >
      <div class="card-header">
          Continue Creating Your Profile Before Posting Your Free Ad
      </div>
      <h4 class="ml-4 mt-2"> Company Info</h4>
        <div class="card-body justify-content-center">
          <div class="container">
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="industry"> Industry *</label>
              </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="nationality" name="nationality">
              </div>
          </div>            
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="company_type"> Company Type* </label>
            </div>
              <div class="col-sm-5">              
                <select name="company_type" id="company_type" class="form-control">
                  <option>  </option>
                  <option value="Private Limited"> Private Limited </option>
                  <option value="Government Agency "> Government Agency </option>
                  <option value="Sole Proprietorship"> Sole Proprietorship </option>
                  <option value="Partnership"> Partnership </option>
                  <option value="Public Limited"> Public Limited </option>
                  <option value="NGO"> NGO </option>
                </select>

              </div>
          </div>
            <div class="form-group row">
              <div class="col-sm-3">
              <label for="reg_number"> Registration Number* </label>
            </div>  
              <div class="col-sm-5">
                 <input type="number" class="form-control" id="reg_number" placeholder="" name="reg_number">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <label for="busi_add"> Business address*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="busi_add" placeholder="" name="busi_add">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <label for="city"> City*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="city" placeholder="" name="city">
              </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">
              <label for="postcode"> Postcode*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="postcode" placeholder="" name="postcode">
              </div>
          </div>
               
        </div>
        </div>

        <div class="card-footer text-muted">
        <button onclick="" type="button" id="next" class="btn btn-dark float-right">Next</button>
        </div>
    </div>

    <!-- ----------- JOB AD  ---------- -->
    <div class="card" id="jobad"  style="display: none;">
      <div class="card-header">
        Create Your Job Ad 
      </div>
      <div class="card-body">
          <h4 class="ml-4 mt-2">Job Details</h4>
            <div class="form-group row">
            <div class="col-sm-3">
               <label for="pos_title"> Position Title*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="pos_title" name="pos_title">
              </div>
          </div>
            <div class="form-group row">
            <div class="col-sm-3">
                <label for="employ_type"> Employemnt Type*</label>
            </div>
              <div class="col-sm-5">
                    <select name="employ_type" id="employ_type" class="form-control">
                      <option>  </option>
                      <option> Full-Time </option>
                      <option> Partime </option>
                      <option> Contract </option>
                      <option> Internship </option>
                      <option> Temporary </option>
                    </select>
              </div>
          </div>
            <div class="form-group row">
            <div class="col-sm-3">
                <label for="pos_lvl"> Position Level*</label>
            </div>
              <div class="col-sm-5">
                  <select class="form-control" id="pos_lvl" name="pos_lvl">
                    <option>    </option>
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
                <label for="job_speci"> Job Specialization*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="job_speci" name="job_speci">
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-3">
                <label for="work_loc"> Work Location*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="work_loc" name="work_loc">
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-3">
                  <label for="mot_sal_min"> Monthly Salary*</label>
              </div>
              <div class="col-sm-3">
                  <input type="number" class="form-control" id="mot_sal_min" name="mot_sal_min">
              </div>
              <div class="col-sm-3">
                   <input type="number" class="form-control" id="mot_sal_max" name="mot_sal_max">
              </div>
          </div>

          <div class="form-group row ml-5">
            <input type="checkbox" name="display_ad" id="display_ad">  Display salary on ad to attract the right candidates
          </div>
                          
        
      </div>

    </div>

    <!-- ----------- JOB REQUIREMENTS ---------- -->
    <div class="card" id="jobreq" style="display: none;">
 
      <div class="card-body">
        <h4 class="ml-4 mt-2">JOB REQUIREMENT</h4>


        <div id="work_exp_div" style="">
        
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="educ_level"> Education Level*</label>
            </div>
              <div class="col-sm-5">
                 <select name="educ_level" id="educ_level" class="form-control">
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
                <label for="field_study_ad"> Field of Study*</label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="field_study_ad" name="field_study_ad">
              </div>
          </div> 
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="yr_exp"> Year(s) of Experience*</label>
            </div>
              <div class="col-sm-5">
                 <input type="number" class="form-control" id="yr_exp" name="yr_exp">
              </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-3">
                <label for="skilss"> Skills </label>
            </div>
              <div class="col-sm-5">
                 <input type="text" class="form-control" id="skilss" name="skilss">
              </div>
          </div>
        
          <div class="form-group row">
            <div class="col-sm-3">
                <label for="yr_exp"> Job Description </label>
            </div>
              <div class="col-sm-5">
                <textarea name="jobdesc" id="jobdesc" class="form-control" rows="8">
                </textarea>
              </div>
          </div>
          
        </div>
   
      </div>
      <div class="card-footer text-muted">
         <button type="button" id="back" class="btn btn-dark float-left">Prev</button>
    
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
  
</script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#next').click(function(){
       // $("#additional_info").hide("slide", { direction: "left" }, 500);
      // createprofileValidation();
      $('#company_info').hide();
      $('#jobad').show();
      $('#jobreq').show();
       // $('#additional_info').hide("slide", { direction: "left" }, 1000);
       //  $('##educational_bg').show("slide", { direction: "left" }, 1000);
      
    });

    $('#back').click(function(){
      $('#jobad').hide();
      $('#jobreq').hide();
      $('#company_info').show();
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