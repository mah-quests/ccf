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
            <span style="font-size: 30px">View Only: Agent Details</span>
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
        </div>

        <div class="col-sm-6" align="center">
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
        </div>
      

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="first_name" class="u-label">Organization Name</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="net_structure" 
                    id="net_structure" 
                    placeholder="No first names entered" 
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $net_structure?>"
                    readonly> 
          </div>          
        </div>

        


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="first_name" class="u-label">First Names</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="first_name" 
                    id="first_name" 
                    placeholder="No first names entered" 
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $first_name?>"
                    readonly> 
          </div>          
        </div>
       

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Surname</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="surname" 
                    id="surname" 
                    placeholder="No surname entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $surname?>"
                    readonly> 
          </div>          
        </div>
       

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Email Address</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="email" 
                    id="email" 
                    placeholder="No email entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $email?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Date of birth</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="date_of_birth" 
                    id="date_of_birth" 
                    placeholder="No birth date entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $date_of_birth?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Race</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="race" 
                    id="race" 
                    placeholder="No race entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $race?>"
                    readonly> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Religion</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="religion" 
                    id="religion" 
                    placeholder="No religion entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $religion?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">What is the highest level of school you have completed or the highest degree you have received?</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="school_level" 
                    id="school_level" 
                    placeholder="No school level entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $school_level?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Sex Composition</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="sex" 
                    id="sex" 
                    placeholder="No sex entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $sex?>"
                    readonly> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Gender Identity</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="gender_id" 
                    id="gender_id" 
                    placeholder="No gender Identity entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $gender_id?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Gender </label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="gender" 
                    id="gender" 
                    placeholder="No gender entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $gender?>"
                    readonly> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Pronouns </label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="pronouns" 
                    id="pronouns" 
                    placeholder="No pronouns entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $pronouns?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Do you have a disability </label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="disable" 
                    id="disable" 
                    placeholder="No disable entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $disable?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="surname">Disability type </label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="disability_type" 
                    id="disability_type" 
                    placeholder="No disability type entered"  
                    pattern="[A-Za-z0-9].{3,}" 
                    value="<?php echo $disability_type?>"
                    readonly> 
          </div>          
        </div>


        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="mobaliser_address">Home Address</label>
              <textarea class="u-grey-5 u-input u-input-rectangle" class="form-control" id="mobaliser_address" placeholder="No home address entered" name="mobaliser_address" rows="3" readonly><?php echo $mobaliser_address?></textarea>
          </div>          
        </div>

        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="mobaliser_address">Province, District and Municipality</label>
              <textarea class="u-grey-5 u-input u-input-rectangle" class="form-control" id="mobaliser_address" placeholder="No location entered" name="mobaliser_address" rows="1" readonly><?php echo "$province , $district , $municipality" ?></textarea>
          </div>          
        </div>


        <div class="col-sm-6"><br><br>
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="alternate_person">Alternative Contact Person</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="alternate_person" 
                    id="alternate_person" 
                    placeholder="No alternate person entered" 
                    value="<?php echo $alternate_person?>"
                    readonly> 
          </div>          
        </div> 

        <div class="col-sm-6"><br><br>
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <br><label for="alternate_number">Alternative Contact Number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="alternate_number" 
                    id="alternate_number" 
                    placeholder="No alternate number entered" 
                    value="<?php echo $alternate_number?>"
                    readonly> 
          </div>          
        </div>

          <div class="col-sm-12" align="center"><br><br>

              <a href="profiles.php" class="btn btn-info" role="button" style="font-size: 20px" >Want to Update My Profile</a>

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
