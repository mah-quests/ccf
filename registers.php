<?php
  include("connect/connectDB.php"); // connection to db
  error_reporting(0);
  session_start();

  $passed_id = $_GET["id"];
  $username = str_replace(" ", "+", $passed_id);

  include 'includes/header.php';


if(isset($_POST['submit'] )) //if submit btn is pressed
{

  $check_celphone = mysqli_query($db, "SELECT cellnumber FROM mobiliser_tbl where cellnumber = '".$_POST['cellnumber']."' ");
    
  if($_POST['passwrd'] != $_POST['psword']){  //matching passwords
        $message = "Registration not processed!<br>
            Passwords do not match. Please try again!<br>";
    } elseif(mysqli_num_rows($check_celphone) > 0) //check email
    {
      $message = "Error during the registration. Registration not processed!<br>
            Cellphone Number already registered on the system!<br>";
    } else {


    //inserting values into 'mobiliser_tbl' db
    $stmt = $db->prepare("
      INSERT INTO mobiliser_tbl 
      (net_structure, first_name, surname, date_of_birth, cellnumber, email, race, religion, sex, gender_id, gender, pronouns, mobaliser_address, province, district, municipality, alternate_person, alternate_number, disable, disability_type, school_level) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssssssssssssss", $net_structure, $first_name, $surname, $date_of_birth, $cellnumber, $email, $race, $religion, $sex, $gender_id, $gender, $pronouns, $mobaliser_address, $province, $district, $municipality, $alternate_person, $alternate_number, $disable, $disability_type, $school_level);

      $net_structure = $_POST['net_structure'];
      $first_name = $_POST['first_name'];
      $surname = $_POST['surname'];
      $date_of_birth = $_POST['date_of_birth'];
      $cellnumber = $username;
      $email = $_POST['email'];
      $race = $_POST['race'];
      $religion = $_POST['religion'];
      $sex = $_POST['sex'];
      $gender_id = $_POST['gender_id'];
      $gender = $_POST['gender'];
      $pronouns = $_POST['pronouns'];
      $mobaliser_address = $_POST['mobaliser_address'];
      $province = $_POST['List1'];
      $district = $_POST['List2'];
      $municipality = $_POST['List3'];
      $alternate_person = $_POST['alternate_person'];
      $alternate_number = $_POST['alternate_number'];
      $disable = $_POST['disable'];
      $disability_type = $_POST['disability_type'];
      $school_level = $_POST['school_level'];

    $stmt->execute();



    //inserting values into 'user_authenticate_tbl' db
    $stmt = $db->prepare("
      INSERT INTO user_authenticate_tbl 
      (username, password, role) 
      VALUES (?, ?, ?)");

    $mobaliser_role = 'user';

    $stmt->bind_param("sss", $username, $hash_password, $role);

      $username = $username;
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      $role = $mobaliser_role;

    $stmt->execute();

            
    $agent_email=$_POST['email'];
    $agent_name=$_POST['first_name'];
    include("agent_welcome_mail.php");
    
    $success = "Congradulations... Community Constituency Agent use account created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
                <script type='text/javascript'>
                function countdown() {
                  var i = document.getElementById('counter');
                  if (parseInt(i.innerHTML)<=0) {
                    location.href = 'login.php';
                  }
                  i.innerHTML = parseInt(i.innerHTML)-1;
                }
                setInterval(function(){ countdown(); },1000);
                </script>'";
     
     $stmt->close();

  }
}

?>

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


    function checkPasswordConfirmation() {
      var firstEntry = document.getElementById('passwrd').value;
      var secondEntry = document.getElementById('psword').value;

      if (firstEntry == secondEntry) {
        document.getElementById('password_feedback').style.color = 'green';
        document.getElementById('password_feedback').innerHTML = 'Great! Passwords entered match!';
      } else {
        document.getElementById('password_feedback').style.color = 'red';
        document.getElementById('password_feedback').innerHTML = 'Password entered DO NOT match, please retry!';
      }
    }    

</script>

<style>
  #passwrd:valid {
    color: green;
  }
  
  #passwrd:invalid {
    color: red;
  }

</style>

  <section class="u-align-center u-clearfix u-section-1" id="carousel_2125">
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

    <div class="u-clearfix u-sheet u-sheet-1">      
      <div class="u-form u-form-1">
        <div align="center">
            <span style="font-size: 30px">Register As An Agent</span>
          <br><br><br>
        </div>

    <form name="registerForm" action="" method="post">

      <div class="row">

        
        <div class="col-sm-6" style="display:none">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="cellnumber">Cellphone number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="tel"  
                    name="cellnumber" 
                    id="cellnumber" 
                    value="<?php echo $username ?>"
                    readonly>
          </div>
          <span style="color: red; font-size: 12px"><i>*** Read-Only Column</i></span>
        </div> 

        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="net_structure" class="u-label">Organization Name</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="net_structure" 
                    id="net_structure" 
                    placeholder="Please enter your Organization name" 
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
                    required> 
          </div>          
        </div>
       

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="surname">Surname/ Family Name</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="text" 
                    name="surname" 
                    id="surname" 
                    placeholder="Please enter your surname"  
                    pattern="[A-Za-z0-9].{3,}" 
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
                    required> 
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="date_of_birth">Date of birth</label>
              <input class="u-grey-5 u-input u-input-rectangle" class="form-control" type="date" name="date_of_birth" id="date_of_birth" placeholder="Please select your date of birth" required>
            </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="race">Race</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" id="race" name="race" size="1" class="form-control unit" required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="religion" id="religion" size="1" class="form-control unit"  required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="school_level" id="school_level" size="1" class="form-control unit"  required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="sex" id="sex" size="1" class="form-control unit"  required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="gender_id" id="gender_id" size="1" class="form-control unit" required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="gender" id="gender" size="1" class="form-control unit"  required>
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
              <select class="u-grey-5 u-input u-input-rectangle" name="pronouns" id="pronouns" size="1" class="form-control unit"  required>
           <option selected value=""></option>
                  <option value="He-him">He/him</option>
                  <option value="She-her">She/her</option>
                  <option value="They-them">They/them</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
              <label for="disable-lbl" class="u-label">Do you have a disability?</label>
              <select id="disable" name="disable" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideDisabledPerson(this.value)" required>
                <option selected value=""></option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="disability_type-lbl" style="display:none">
              <label for="disability_type" class="u-label">Disability type</label>
              <select id="disability_type" name="disability_type" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" >
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
              <textarea class="u-grey-5 u-input u-input-rectangle" class="form-control" id="mobaliser_address" placeholder="Please enter your home address" name="mobaliser_address" rows="5" required></textarea>
          </div>          
        </div>

        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
          <label for="municipality"><br>Location Selection<br></label>
          <div style="width:100%">
                
            <select class="u-grey-5 u-input u-input-rectangle" name='List1' id="List1" onchange="fillSelect(this.value,this.form['List2'])" required>
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
            <input class="u-grey-5 u-input u-input-rectangle" type="text" class="form-control" id="alternate_person" name="alternate_person" placeholder="Please enter alternative contact person" required pattern="[A-Za-z0-9].{3,}" >
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="alternate_number">Alternative Contact Number</label>
            <input class="u-grey-5 u-input u-input-rectangle" type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Please enter alternative contact number"  required pattern="[A-Za-z0-9].{3,}" >
          </div>          
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="passwrd">Password</label>
              <input class="u-grey-5 u-input u-input-rectangle" class="form-control" type="password" name="passwrd" id="passwrd"  placeholder="Enter password" required pattern=".{6,}" title="Eight or more characters">
          </div>
          <span style="color: red; font-size: 12px"><i>*** password should consist of at least 6 characters</i></span>
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="psword">Confirm Password</label>
              <input class="u-grey-5 u-input u-input-rectangle" class="form-control" type="password" name="psword" id="psword" placeholder="Confirm your password" required pattern=".{8,}" title="Eight or more characters" onchange='checkPasswordConfirmation();'>
          </div>
          <span id='password_feedback' style="font-size: 14px"></span>
        </div>         

          <div class="col-sm-12" align="center">
            <p> 
              <input type="submit" value="Register" name="submit" class="btn btn-primary" style="font-size: 20px" > 
            </p>
          </div>

        </div>
    </form>


      </div>
    </div>
  </section>


<?php 
include_once 'includes/footer.php';
?>
