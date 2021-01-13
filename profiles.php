<!DOCTYPE html>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();

if (empty($_SESSION['user_id']))  //if user is not login redirected baack to login page
{
  header('location:login.php');
  
} else { 

    if ($stmt = $db->prepare('SELECT mobiliser_id, cellnumber, net_structure, first_name, surname, email, date_of_birth, race, religion, school_level, sex, gender_id, gender, pronouns, disable, disability_type, mobaliser_address, province, district, municipality, alternate_person, alternate_number FROM mobiliser_tbl WHERE cellnumber = ?')) {

      // Bind parameters (s = string, i = int, b = blob, etc)
      $stmt->bind_param('s', $_SESSION['name']);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($mobiliser_id, $cellnumber, $net_structure, $first_name, $surname, $email, $date_of_birth, $race, $religion, $school_level, $sex, $gender_id, $gender, $pronouns, $disable, $disability_type, $mobaliser_address, $province, $district, $municipality, $alternate_person, $alternate_number);
      $stmt->fetch();
    

include 'includes/header.php';

?>


<?php

if(isset($_POST['submit'] )) //if submit btn is pressed
{

    $sql = "UPDATE mobiliser_tbl SET 

              net_structure = ?, 
              first_name = ?, 
              surname = ?, 
              date_of_birth = ?, 
              email = ?, 
              race = ?, 
              religion = ?, 
              sex = ?, 
              gender_id = ?, 
              gender = ?, 
              pronouns = ?, 
              mobaliser_address = ?, 
              province = ?, 
              district = ?, 
              municipality = ?, 
              alternate_person = ?, 
              alternate_number = ?, 
              disable = ?, 
              disability_type = ?, 
              school_level = ?

              WHERE mobiliser_id = ?";

        if ($stmt = $db->prepare($sql)){

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssssssssssssssssssssi', $update_net_structure, $update_first_name, $update_surname, $update_date_of_birth,  $update_email, $update_race, $update_religion, $update_sex, $update_gender_id, $update_gender, $update_pronouns, $update_mobaliser_address, $update_province, $update_district, $update_municipality, $update_alternate_person, $update_alternate_number, $update_disable, $update_disability_type, $update_school_level, $update_mobiliser_id);
            
            // Set parameters
            $update_net_structure = $_POST['net_structure'];
            $update_first_name = $_POST['first_name'];
            $update_surname = $_POST['surname'];
            $update_date_of_birth = $_POST['date_of_birth'];
            $update_email = $_POST['email'];
            $update_race = $_POST['race'];
            $update_religion = $_POST['religion'];
            $update_sex = $_POST['sex'];
            $update_gender_id = $_POST['gender_id'];
            $update_gender = $_POST['gender'];
            $update_pronouns = $_POST['pronouns'];
            $update_mobaliser_address = $_POST['mobaliser_address'];
            $update_province = $_POST['List1'];
            $update_district = $_POST['List2'];
            $update_municipality = $_POST['List3'];
            $update_alternate_person = $_POST['alternate_person'];
            $update_alternate_number = $_POST['alternate_number'];
            $update_disable = $_POST['disable'];
            $update_disability_type = $_POST['disability_type'];
            $update_school_level = $_POST['school_level'];
            $update_mobiliser_id = $mobiliser_id; 

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                

              $success = "Profile successfully updated! <p>Page redirection... <span id='counter'>1</span> second(s).</p>
                    <script type='text/javascript'>
                    function countdown() {
                      var i = document.getElementById('counter');
                      if (parseInt(i.innerHTML)<=0) {
                        location.href = 'profile.php';
                      }
                      i.innerHTML = parseInt(i.innerHTML)-1;
                    }
                    setInterval(function(){ countdown(); },1000);
                    </script>'";

            } else{
                $message = "Oops! Something went wrong. Please try again later.";
            } 
        }
     
     $stmt->close();

}

?>

<style>
  #date_of_birth:valid {
    color: black;
  }
  
  #date_of_birth:invalid {
    color: red;
  }

</style>

<script>

    function showHideDisabledPerson() {
      var noOption = document.getElementById("disable").value;
      if (noOption == "Yes") {
        jQuery('#disability_type-lbl').hide();
        document.getElementById("disability_type-lbl").style.visibility = 'hidden';
        jQuery('#disability_type-lbl').show();
        document.getElementById("disability_type-lbl").style.visibility = 'visible';               
      } else {
        jQuery('#disability_type-lbl').show();
        document.getElementById("disability_type-lbl").style.visibility = 'visible';
        jQuery('#disability_type-lbl').hide();
        document.getElementById("disability_type-lbl").style.visibility = 'hidden';
      }
    }
  </script>

  <section class="u-align-center u-clearfix u-section-1" id="carousel_2125">

    <div class="u-clearfix u-sheet u-sheet-1">      
      <div class="u-form u-form-1">
        <div align="center">
            <span style="font-size: 30px">Update Agent Details</span>
          <br><br><br>
        </div>
 

    <div class="container">
          <?php  if(!empty($message)){ ?>
            <span style="color:red;">
                <?php echo '<div class="alert alert-danger">
            <strong>Error during registrations!</strong> '.$message.'
            </div>'; ?>
            <?php  } ?>
            </span>
            <?php  if(!empty($success)){ ?>
        <span style="color:green;">
            <?php echo  '<div class="alert alert-success">
            <strong>Successfully Registered!</strong> '.$success.'
            </div>'; }?>
        </span>
   </div>

    <form name="registerForm"  action="" method="post">

      <div class="row">

        <div class="col-sm-12" align="center"  id="row_id-lbl" style="display:none">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="cellnumber">Row ID</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text"  
                    name="mobiliser_id" 
                    id="mobiliser_id" 
                    value="<?php echo $mobiliser_id ?>"
                    readonly
                    style>
          </div>
          <span style="color: red"><i>*** read-only field</i></span>
        </div>

        <div class="col-sm-12" align="center">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="cellnumber">Username / Login Name / Cellphone number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="tel"  
                    name="cellnumber" 
                    id="cellnumber" 
                    value="<?php echo $cellnumber ?>"
                    readonly
                    style>
          </div>
          <span style="color: red"><i>*** read-only field</i></span>
        </div>
          


        <div class="col-sm-12"><br>
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="net_structure" class="u-label">Organization Name</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="net_structure" 
                    id="net_structure" 
                    placeholder="Please enter your first names" 
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $net_structure?>"
                    required> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="first_name" class="u-label">First Names</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="first_name" 
                    id="first_name" 
                    placeholder="Please enter your first names" 
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $first_name?>"
                    required> 
          </div>          
        </div>
       

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="surname">Surname</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="surname" 
                    id="surname" 
                    placeholder="Please enter your surname"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $surname?>"
                    required> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="email">Email Address</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Please enter your email address" 
                    value="<?php echo $email?>"
                    required> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="date_of_birth">Date of birth</label>
              <input class="u-grey-5 u-input u-input-rectangle" class="form-control" type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $date_of_birth ?>" pattern="[0-9-].{9}" oninput="this.value = this.value.replace(/[^0-9.+-]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" placeholder="Please select your date of birth" required>
            </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="race">Race</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" id="race" name="race" size="1" class="form-control unit" value="<?php echo $race ?>" required>
                      <option selected value=""></option>
                      <option value="African (Black)">African (Black)</option>
                      <option value ="Asian">Asian</option>
                      <option value="Coloured">Coloured</option>
                      <option value="Indian">Indian</option>
                      <option value="White">White</option>
                      <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="religion">Religion</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="religion" id="religion" size="1" class="form-control unit" value="<?php echo $religion ?>" required>
                  <option selected value=""></option>
                  <option value="Christian">Christian</option>
                  <option value="Islam">Islam</option>
                  <option value="Hinduism">Hinduism</option>
                  <option value="African-Religion">African Religion</option>
                  <option value="Judaism">Judaism</option>
                  <option value="Atheist">Atheist</option>
                  <option value="Rastafarian">Rastafarian</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="school_level">What is the highest level of school you have completed or the highest degree you have received?</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="school_level" id="school_level" size="1" class="form-control unit" value="<?php echo $school_level ?>" required>
                  <option selected value=""></option>
                  <option value="Did not go to school">Did not go to school</option>
                  <option value="Primary (Less than high school)">Primary (Less than high school)</option>
                  <option value="Secondary (High school)">Secondary (High school)</option>
                  <option value="Higher (More than high school)">Higher (More than high school)</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="sex">Sex Composition</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="sex" id="sex" size="1" class="form-control unit" value="<?php echo $sex ?>" required>
                  <option selected value=""></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Intersex">Intersex</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="gender_id">Sexual Orientation</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="gender_id" id="gender_id" size="1" class="form-control unit" value="<?php echo $gender_id ?>" required>
                  <option selected value=""></option>
                  <option value="Bisexual">Bisexual</option>
                  <option value="Heterosexual">Heterosexual</option>
                  <option value="Homosexual">Homosexual</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="gender">Gender</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="gender" id="gender" size="1" class="form-control unit" value="<?php echo $gender ?>" required>
                <option selected value=""></option>
                  <option value="Cisgender">Cisgender</option>
                  <option value="Gender Non-Conforming">Gender Non-Conforming</option>
                  <option value="Transgender">Transgender</option>
                  <option value="Queer / Questioning">Queer / Questioning</option>
                  <option value="Prefer not to say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="pronouns">Pronouns</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="pronouns" id="pronouns" size="1" class="form-control unit" value="<?php echo $pronouns ?>" required>
                  <option selected value=""></option>
                  <option value="He-him">He/him</option>
                  <option value="She-her">She/her</option>
                  <option value="They-them">They/them</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-12">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
              <label for="disable-lbl" class="u-label">Do you have a disability?</label>
              <select id="disable" name="disable" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" value="<?php echo $disable ?>" onchange="showHideDisabledPerson(this.value)" required>
                <option selected value=""></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
        </div>

        <div class="col-sm-12" id="disability_type-lbl" style="display:none">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
              <label for="disability_type" class="u-label">Disability type</label>
              <select id="disability_type" name="disability_type" class="u-grey-5 u-input u-input-rectangle" value="<?php echo $disability_type ?>" class="form-control unit" >
               <option selected value=""></option>
                <option value="Physical disability">Physical disability</option>
                <option value="Vision Impairment">Vision Impairment</option>
                <option value="Deaf or hard of hearing">Deaf or hard of hearing</option>
                <option value="Intellectual disability">Intellectual disability</option>
                <option value="Acquired brain injury">Acquired brain injury</option>
                <option value="other">Other</option>
              </select>
            </div>
        </div>


        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="mobaliser_address">Home Address</label>
              <textarea class="u-grey-5 u-input u-input-rectangle" class="form-control" id="mobaliser_address" placeholder="Please enter your home address" name="mobaliser_address" rows="5" required><?php echo $mobaliser_address?></textarea>
          </div>          
        </div>

        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
          <label for="municipality"><br>Location Selection<br></label>
          <br><i> Current Selection:</i> [<?php echo "$province , $district , $municipality" ?>]
          <div style="width:100%">
                
            <select class="u-grey-5 u-input u-input-rectangle" name='List1' id="List1" value="<?php echo $province ?>" onchange="fillSelect(this.value,this.form['List2'])" required>
              <option selected value="">Select Province</option>
                </select> &nbsp;

            <select class="u-grey-5 u-input u-input-rectangle" name='List2' id="List2" onchange="fillSelect(this.value,this.form['List3'])" class="DDlist" required>
              <option selected value="">Select District</option>
                </select> &nbsp;

            <select class="u-grey-5 u-input u-input-rectangle" name='List3' id="List3" onchange="fillSelect(this.value,this.form['List4'])" class="DDlist" required>
              <option selected value="">Choose Municipality</option>
                </select> &nbsp;
            </div>
          </div>
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="alternate_person">Alternative Contact Person</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="alternate_person" 
                    id="alternate_person" 
                    placeholder="Update your district" 
                    value="<?php echo $alternate_person?>"
                    required> 
          </div>          
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="alternate_number">Alternative Contact Number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="alternate_number" 
                    id="alternate_number" 
                    placeholder="Update your district" 
                    value="<?php echo $alternate_number?>"
                    > 
          </div>          
        </div>

          <div class="col-sm-12" align="center"><br><br>

              <input type="submit" value="Update" name="submit" class="btn btn-success" style="font-size: 20px" ><br><br>

              <input type="submit" value="Back" name="back" onclick="goBack()" class="btn btn-danger" style="font-size: 20px" >               

            
          </div>

        </div>
    </form>



      </div>
    </div>
  </section>


<?php 
  include 'includes/footer.php';
  } 
}
?>
