<!DOCTYPE html>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();
if (!empty($_SESSION['user_id']))  //if user is not login redirected baack to login page
{
  header('location:login.php');
} else { $user_id =  $_SESSION['user_id'];
  $m_id_sql = "SELECT  agent_id  FROM  agent_tbl  WHERE  cellnumber  in (SELECT  username  FROM  user_authenticate_tbl  WHERE  user_login_id  = '$user_id')";
  $ress=mysqli_query($db,$m_id_sql);
  $raw=mysqli_fetch_array($ress);
  $user_idf = $raw['agent_id'];


include_once 'includes/header.php';


if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['organization_name']) || 
        empty($_POST['net_structure']) ||
        empty($_POST['first_name']) ||
        empty($_POST['surname']) ||
        empty($_POST['alternate_number']) 
      )
    {
    $message = "Please make sure all fields required have been properly completed!";
    }
  else
  {
    //cheching username & email if already present
  $check_username = mysqli_query($db, "SELECT idnumber FROM agent_tbl where idnumber = '".$_POST['idnumber']."' ");
  $check_celphone = mysqli_query($db, "SELECT cellnumber FROM agent_tbl where cellnumber = '".$_POST['cellnumber']."' ");
    
  if($_POST['passwrd'] != $_POST['psword']){  //matching passwords
        $message = "Registration not completed. <br>
            Password not match<br>";
    }
    elseif(strlen($_POST['passwrd']) < 6)  //cal password length
    {
      $message = "Registration not completed. <br>
            Password Must be >=6 characters <br>";
    }
    elseif(strlen($_POST['cellnumber']) == 11)  //cal phone length 
    {
      $message = "Registration not completed. <br>
            Invalid phone number! Eg, +27825561420 <br>";
    }
    elseif(mysqli_num_rows($check_celphone) > 0) //check email
    {
      $message = 'Registration not completed. <br>
            Cellphone Number already registered!<br>';
    }    
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
      $message = "Registration not completed. <br>
            Invalid email address please type a valid email!<br>";
    }
    elseif(mysqli_num_rows($check_username) > 0)  //check username
     {
      $message = 'Registration not completed. <br>
            Identity Number already registered!<br>';
     }
  else{

   //inserting values into 'agent_tbl' db
    $msql = "INSERT INTO agent_tbl
      (organization_name, net_structure, first_name, surname, date_of_birth, age, cellnumber, email, race, religion, sex, sexuality, gender, prefix, pronouns, mobaliser_address, province, district, municipality, alternate_person, alternate_number, disable, disability_type)
      VALUES 
      ('".$_POST['organization_name']."', '".$_POST['net_structure']."', '".$_POST['first_name']."', '".$_POST['surname']."', '".$_POST['date_of_birth']."', '".$_POST['age']."', '".$_POST['cellnumber']."', '".$_POST['email']."', '".$_POST['race']."', '".$_POST['religion']."', '".$_POST['sex']."', '".$_POST['sexuality']."', '".$_POST['gender']."', '".$_POST['prefix']."', '".$_POST['pronouns']."', '".$_POST['mobaliser_address']."', '".$_POST['List1']."', '".$_POST['List2']."', '".$_POST['List3']."', '".$_POST['alternate_person']."', '".$_POST['alternate_number']."', '".$_POST['disable']."', '".$_POST['disability_type']."')";


    $usrsql = "INSERT INTO user_authenticate_tbl
      (username, password, role)
      VALUES 
      ('".$_POST['cellnumber']."', '".md5($_POST['passwrd'])."', 'user')";

 
  
    if(mysqli_query($db, $msql) && mysqli_query($db, $usrsql)){

            
        $agent_email=$_POST['email'];
        $agent_name=$_POST['first_name'];
        include("agent_welcome_mail.php");
        
        $success = "Congradulations... Community Constituency Mobaliser user account created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
                    <script type='text/javascript'>
                    function countdown() {
                      var i = document.getElementById('counter');
                      if (parseInt(i.innerHTML)<=0) {
                        location.href = 'index.php';
                      }
                      i.innerHTML = parseInt(i.innerHTML)-1;
                    }
                    setInterval(function(){ countdown(); },1000);
                    </script>'";
        
         header("refresh:5;url=index.php"); // redireted once inserted success
         //sendmail();
         mysqli_query($db, $usrsql);
      }
    }
  }

}

?>

<style>
  #cellnumber:valid {
    color: green;
  }
  
  #cellnumber:invalid {
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


<?php 
  include_once 'validate_username.php';
?>


  <section class="u-align-center u-clearfix u-section-1" id="carousel_2125">
   <div class="container">
      <a href="register.php" class="active">
          <?php  if(!empty($message)){ ?>
            <span style="color:red;">
                <?php echo '<div class="alert alert-danger">
            <strong>Error!</strong> '.$message.'
            </div>'; ?>
            <?php  } ?>
            </span>
            <?php  if(!empty($success)){ ?>
        <span style="color:green;">
            <?php echo  '<div class="alert alert-success">
            <strong>Success!</strong> '.$success.'
            </div>'; }?>
        </span>
      </a>
   </div>

    <div class="u-clearfix u-sheet u-sheet-1">      
      <div class="u-form u-form-1">
        <div align="center">
            <span style="font-size: 30px">Register As A agent</span>
          <br><br><br>
        </div>

    <form name="registerForm" action="" method="post">

      <div class="row">

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="organization_name-lbl" class="u-label">Organization Name</label>
              <input type="text" 
                      placeholder="Enter organization name" 
                      id="organization_name" 
                      name="organization_name" 
                      class="u-grey-5 u-input u-input-rectangle"  
                      pattern="[A-Za-z0-9].{3,}" 
                      title="Enter a valid Organization Name" 
                      required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                <label for="net_structure-lb" class="u-label">Partner Network</label>
                  <select class="u-grey-5 u-input u-input-rectangle" class="form-control unit" id="net_structure" name="net_structure" size="1" required > 
                      <option selected value=""></option>
                      <option value="PLHIV">People Living with HIV and AIDS (PLHIV)</option>
                      <option value="SexWorkers">Sex Workers</option>
                      <option value="Faith">Faith</option>
                      <option value="HigerEducation">Higher Education</option>
                      <option value="Sport-Arts-Culture">Sport, Arts & Culture</option>
                      <option value="Labour">Labour</option>
                      <option value="Research">Research</option>
                      <option value="Law-HumanRights">Law & Human Rights</option>
                      <option value="Youth">Youth</option>
                      <option value="Men">Men</option>   
                      <option value="Women">Women</option>
                      <option value="Non-Governmental">Non-Governmental Organisations</option>
                      <option value="Traditional-Leaders">Traditional Leaders</option>
                      <option value="Traditional-Health-Practitioners">Traditional Health Practitioners</option>
                      <option value="Health-Professionals">Health Professionals</option>
                      <option value="People-With-Disabilities">People with Disabilities</option>
                      <option value="Children">Children</option>
                      <option value="LGBTIQ">LGBTIQ+ (Lesbians, Gays, Bi-sexuals, Trans-gender, Intersex, Queer & gender non-conforming people)</option>
                  </select>
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
            <label for="surname">Surname</label>
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

        <div class="col-sm-4">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="date_of_birth">Date of birth</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="date" 
                    name="date_of_birth" 
                    id="date_of_birth" 
                    placeholder="Please select your date of birth" 
                    pattern="[A-Za-z0-9].{3,}" 
                    required>
            </div>          
        </div>

        <div class="col-sm-2">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="age">Age</label>
              <input class="u-grey-5 u-input u-input-rectangle"  
                    class="form-control" 
                    type="text" 
                    placeholder="Enter your age"  
                    name="age" 
                    id="age"  
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                    pattern="[0-9]{2}"
                    required>
            </div>        
        </div>
        
        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="cellnumber">Cellphone number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="tel"  
                    placeholder="Please enter your valid cellphone number, eg: +27825561420"  
                    name="cellnumber" 
                    id="cellnumber" 
                    value="+27" 
                    oninput="this.value = this.value.replace(/[^0-9.+]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                    pattern="[0-9+]{12}"
                    required>
          </div>          
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="email">Email</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Please enter your email address">
          </div>         
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="race">Race</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" id="race" name="race" size="1" class="form-control unit" required>
                      <option selected value=""></option>
                      <option value="African">African (Black)</option>
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
                  <option value="Prefer-not-to-say">Prefer not to say</option>
                  <option value="Other">Other</option>
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
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="intersex">Intersex</option>
                  <option value="prefer-not-to-say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>                
        
        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="sexuality">Gender Identity</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle" name="sexuality" id="sexuality" size="1" class="form-control unit" required>
                  <option selected value=""></option>
                  <option value="Bisexual">Bisexual</option>
                  <option value="Heterosexual">Heterosexual</option>
                  <option value="Homosexual">Homosexual</option>
                  <option value="prefer-not-to-say">Prefer not to say</option>
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
                  <option value="Non-Confirming">Gender Non-Confirming</option>
                  <option value="Transgender">Transgender</option>
                  <option value="Queer-Questioning">Queer / Questioning</option>
                  <option value="prefer-not-to-say">Prefer not to say</option>
                  <option value="Other">Other</option>
              </select>
              </div>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="prefix">Prefix</label>
              <div style="width:100%">
              <select class="u-grey-5 u-input u-input-rectangle"  name="prefix" id="prefix" size="1" class="form-control unit" required>
                  <option value="mr">Mr</option>
                  <option value="mrs">Mrs</option>
                  <option value="miss">Miss</option>
                  <option value="dr">Dr</option>
                  <option value="prof">Professor</option>
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
                  <option value="he">He </option>
                  <option value="him">Him</option>
                  <option value="they">They</option>
                  <option value="them">Them</option>
                  <option value="she">She</option>
                  <option value="her">Her</option>
                  <option value="Other">Other</option>
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
                <option value="vision-impairment">Vision Impairment</option>
                <option value="deaf">Deaf or hard of hearing</option>
                <option value="mental-health">Mental health conditions</option>
                <option value="intellectual-disability">Intellectual disability acquired brain injury</option>
                <option value="autism">Autism spectrum disorder</option>
                <option value="physical-disability">Physical disability</option>
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
            <input class="u-grey-5 u-input u-input-rectangle" 
                  type="text" 
                  class="form-control" 
                  id="alternate_person" 
                  name="alternate_person" 
                  placeholder="Please enter alternative contact person"  
                  pattern="[A-Za-z0-9].{3,}" 
                  required>
          </div>          
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="alt_number">Alternative Contact Number</label>
            <input class="u-grey-5 u-input u-input-rectangle" 
                  type="text" 
                  class="form-control" 
                  id="alternate_number" 
                  name="alternate_number" 
                  placeholder="Please enter alternative contact number"   
                  pattern="[A-Za-z0-9].{3,}" 
                  required>
          </div>          
        </div> 

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="passwrd">Password</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="password" 
                    name="passwrd" 
                    id="passwrd"  
                    placeholder="Enter password" 
                    pattern=".{8,}" 
                    title="Eight or more characters" 
                    required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="psword">Password Again</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="password" 
                    name="psword" 
                    id="psword" 
                    placeholder="Enter password again"  
                    pattern=".{8,}" 
                    title="Eight or more characters" 
                    required>
          </div>           
        </div>         

          <div class="col-sm-12" align="center">
            <p><br><br>
              <input type="submit" value="Register" name="submit" class="btn btn-danger" style="font-size: 20px"> 
            </p>
          </div>

        </div>
    </form>


      </div>
    </div>
  </section>


<?php 
include_once 'includes/footer.php';
}?>
</html>