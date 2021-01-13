<!DOCTYPE html>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();

if (empty($_SESSION['user_id']))  //if user is not login redirected baack to login page
{
  header('location:login.php');

} else {

include_once 'includes/header.php'; 
    

    if (isset($_POST['submit'])) //if submit btn is pressed
    {

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $reference = substr(str_shuffle($permitted_chars), 0, 10);
        $project = $_SESSION['project'];
        $mobiliser_user_id = $_SESSION['user_id'];


    //inserting values into 'summary_tbl' db
    $stmt = $db->prepare("
      INSERT INTO summary_tbl 
      (unique_code, mobiliser_id, province, district, municipality, project_name, respondant_name, respondant_surname, respondant_phone ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sisssssss", $unique_code, $mobiliser_id, $province, $district, $municipality, $project_name, $respondant_name, $respondant_surname, $respondant_phone );

      $unique_code = $reference; 
      $mobiliser_id = $mobiliser_user_id; 
      $province = $_POST['List1']; 
      $district = $_POST['List2']; 
      $municipality = $_POST['List3']; 
      $project_name = $project; 
      $respondant_name = $_POST['first_name']; 
      $respondant_surname = $_POST['surname']; 
      $respondant_phone = $_POST['cellnumber']; 

      $stmt->execute();



    $stmt = $db->prepare('SELECT summary_id FROM summary_tbl WHERE unique_code = ?');

    $stmt -> bind_param('s', $reference);
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result($summary_id);
    $stmt -> fetch();

    $summary_id_key = $summary_id; 

    // Respondent's details
    //inserting values into 'respondant_contact_tbl' db
    $stmt = $db->prepare("
      INSERT INTO respondant_contact_tbl 
      (unique_code, summary_id, first_name, surname, age_bracket, cellnumber, birth_month, race, religion, gender_id, sex, gender, pronouns, disable, disability_type, province, district, municipality, home_address, employment_status ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

    $stmt->bind_param("sissssssssssssssssss", $unique_code, $summary_id, $first_name, $surname, $age_bracket, $cellnumber, $birth_month, $race, $religion, $gender_id, $sex, $gender, $pronouns, $disable, $disability_type, $province, $district, $municipality, $home_address, $employment_status );

      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $first_name = $_POST['first_name']; 
      $surname = $_POST['surname'];
      $age_bracket = $_POST['age_bracket'];
      $cellnumber = $_POST['cellnumber'];
      $birth_month = $_POST['birth_month'];
      $race = $_POST['race'];
      $religion = $_POST['religion']; 
      $gender_id = $_POST['gender_id'];  
      $sex = $_POST['sex'];  
      $gender = $_POST['gender']; 
      $pronouns = $_POST['pronouns'];  
      $disable = $_POST['disable'];   
      $disability_type = $_POST['disability_type'];  
      $province = $_POST['List1'];  
      $district = $_POST['List2'];
      $municipality = $_POST['List3'];
      $home_address = $_POST['home_address']; 
      $employment_status = $_POST['employment_status'];  

      $stmt->execute();


    // Index 1: Surviving Covid-19
    //inserting values into 'surviving_covid_tbl' db
    $stmt = $db->prepare("
      INSERT INTO surviving_covid_tbl 
      (unique_code, summary_id, tested_covid, hospitalised, isolate_info, counselling_support, physical_rehab, disability_grant, access_medication, information, no_access, other, need_counselling_support, need_physical_rehab, need_disability_grant, need_access_medication, need_information, need_no_access, need_other ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

    $stmt->bind_param("sisssssssssssssssss", $unique_code, $summary_id, $tested_covid, $hospitalised, $isolate_info, $counselling_support, $physical_rehab, $disability_grant, $access_medication, $information, $no_access, $other, $need_counselling_support, $need_physical_rehab, $need_disability_grant, $need_access_medication, $need_information, $need_no_access, $need_other );
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $tested_covid = $_POST['tested_covid'];  
      $hospitalised = $_POST['hospitalised'];  
      $isolate_info = $_POST['isolate_info'];  
      $counselling_support = $_POST['counselling_support'];  
      $physical_rehab = $_POST['physical_rehab'];  
      $disability_grant = $_POST['disability_grant'];  
      $access_medication = $_POST['access_medication'];  
      $information = $_POST['information'];  
      $no_access = $_POST['no_access'];  
      $other = $_POST['other'];  
      $need_counselling_support = $_POST['need_counselling_support'];  
      $need_physical_rehab = $_POST['need_physical_rehab'];  
      $need_disability_grant = $_POST['need_disability_grant'];  
      $need_access_medication = $_POST['need_access_medication'];  
      $need_information = $_POST['need_information'];  
      $need_no_access = $_POST['need_no_access'];  
      $need_other = $_POST['need_other'];  
    
      $stmt->execute();


    // Index 2: Social and behaviour change
    //inserting values into 'social_behaviour_tbl' db
    $stmt = $db->prepare("
      INSERT INTO social_behaviour_tbl 
      (unique_code, summary_id, family, worship, friends, work, shopping, travel, lifestyle_changes, family_social_distancing, see_friends, health_improvements, healthy_food ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sisssssssssss", $unique_code, $summary_id, $family, $worship, $friends, $work, $shopping, $travel, $lifestyle_changes, $family_social_distancing, $see_friends, $health_improvements, $healthy_food );
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $family = $_POST['family']; 
      $worship = $_POST['worship'];  
      $friends = $_POST['friends'];   
      $work = $_POST['work'];   
      $shopping = $_POST['shopping'];   
      $travel = $_POST['travel'];   
      $lifestyle_changes = $_POST['lifestyle_changes'];   
      $family_social_distancing = $_POST['family_social_distancing'];   
      $see_friends = $_POST['see_friends'];   
      $health_improvements = $_POST['health_improvements'];   
      $healthy_food = $_POST['healthy_food'];   

      $stmt->execute();


    // Index 3: Access to public facilities
    //inserting values into 'public_facilities_tbl' db
    $stmt = $db->prepare("
      INSERT INTO public_facilities_tbl 
      (unique_code, summary_id, community_access_points, flushing_toilet_inside_dwelling, flushing_toilet_outside_dwelling, tap_inside_dwelling, tap_outside_dwelling,earning_living, changed_employment, government_support, applied_sassa, which_grant, applied_assistance, application_success ) 
      VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sissssssssssss", $unique_code, $summary_id, $community_access_points, $flushing_toilet_inside_dwelling, $flushing_toilet_outside_dwelling, $tap_inside_dwelling, $tap_outside_dwelling, $earning_living, $changed_employment, $government_support, $applied_sassa, $which_grant, $applied_assistance, $application_success );
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $community_access_points = $_POST['community_access_points'];  
      $flushing_toilet_inside_dwelling = $_POST['flushing_toilet_inside_dwelling'];  
      $flushing_toilet_outside_dwelling = $_POST['flushing_toilet_outside_dwelling'];  
      $tap_inside_dwelling = $_POST['tap_inside_dwelling'];  
      $tap_outside_dwelling = $_POST['tap_outside_dwelling'];  
      $earning_living = $_POST['earning_living']; 
      $changed_employment = $_POST['changed_employment']; 
      $government_support = $_POST['government_support']; 
      $applied_sassa = $_POST['applied_sassa']; 
      $which_grant = $_POST['which_grant']; 
      $applied_assistance = $_POST['applied_assistance']; 
      $application_success = $_POST['application_success']; 

      $stmt->execute();


    // Index 4: Work and Travel Safety on COVID-19
    //inserting values into 'work_safety_tbl' db
    $stmt = $db->prepare("
      INSERT INTO work_safety_tbl 
      (unique_code, summary_id, employer_safe_environment, employer_measures, workplace_guidelines, access_infomation, travel_to_work, public_transport, public_transport_measures, covid_19_manager, daily_temperature, changed_policies, sanitised_at_entry, wearing_masks, driver_wearing_mask, window_open, one_space ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sisssssssssssssss", $unique_code, $summary_id, $employer_safe_environment, $employer_measures, $workplace_guidelines, $access_infomation, $travel_to_work, $public_transport, $public_transport_measures, $covid_19_manager, $daily_temperature, $changed_policies, $sanitised_at_entry, $wearing_masks, $driver_wearing_mask, $window_open, $one_space);
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $employer_safe_environment = $_POST['employer_safe_environment']; 
      $employer_measures = $_POST['employer_measures'];  
      $workplace_guidelines = $_POST['workplace_guidelines']; 
      $access_infomation = $_POST['access_infomation']; 
      $travel_to_work = $_POST['travel_to_work'];  
      $public_transport = $_POST['public_transport'];  
      $public_transport_measures = $_POST['public_transport_measures']; 
      $covid_19_manager = $_POST['covid_19_manager'];  
      $daily_temperature = $_POST['daily_temperature']; 
      $changed_policies  = $_POST['changed_policies'];
      $sanitised_at_entry = $_POST['sanitised_at_entry']; 
      $wearing_masks = $_POST['wearing_masks'];  
      $driver_wearing_mask = $_POST['driver_wearing_mask'];   
      $window_open = $_POST['window_open'];    
      $one_space = $_POST['one_space'];    

      $stmt->execute();

    // Index 5: Hygiene Questions
    //inserting values into 'hygiene_tbl' db
    $stmt = $db->prepare("
      INSERT INTO hygiene_tbl 
      (unique_code, summary_id, wash_hands, alcohol_based_sanitisers, avoid_touching, disinfect_surfaces, disinfect_objects, fresh_air, social_distance ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sisssssss", $unique_code, $summary_id, $wash_hands, $alcohol_based_sanitisers, $avoid_touching, $disinfect_surfaces, $disinfect_objects, $fresh_air, $social_distance);
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $wash_hands = $_POST['wash_hands'];  
      $alcohol_based_sanitisers = $_POST['alcohol_based_sanitisers'];   
      $avoid_touching = $_POST['avoid_touching'];    
      $disinfect_surfaces = $_POST['disinfect_surfaces'];     
      $disinfect_objects = $_POST['disinfect_objects'];      
      $fresh_air = $_POST['fresh_air'];       
      $social_distance  = $_POST['social_distance'];    

      $stmt->execute();



    // Index 6: Attitudes to the Vaccine
    //inserting values into 'vaccine_opinion_tbl' db
    $stmt = $db->prepare("
      INSERT INTO vaccine_opinion_tbl 
      (unique_code, summary_id, quickly_as_possible, prioritised_health_workers, prioritised_teachers, informed_enough, vaccines_safe, something_5g ) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sissssss", $unique_code, $summary_id, $quickly_as_possible, $prioritised_health_workers, $prioritised_teachers, $informed_enough, $vaccines_safe, $something_5g);
 
      $unique_code = $reference; 
      $summary_id = $summary_id_key;
      $quickly_as_possible = $_POST['quickly_as_possible'];   
      $prioritised_health_workers = $_POST['prioritised_health_workers'];
      $prioritised_teachers = $_POST['prioritised_teachers']; 
      $informed_enough = $_POST['informed_enough'];  
      $vaccines_safe = $_POST['vaccines_safe'];   
      $something_5g = $_POST['something_5g'];     

      $stmt->execute();


        $system_email = 'survey@communityconstituency.org.za';
        $participants_name = $_POST['first_name'];

        if (true) {
          include("./survey_complete_mail.php");
        }


        $success = "<br>Congradulations... Community Constituency Survey Completed successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
            <script type='text/javascript'>
                function countdown() {
                  var i = document.getElementById('counter');
                  if (parseInt(i.innerHTML)<=0) {
                    location.href = 'survey.php';
                  }
                  i.innerHTML = parseInt(i.innerHTML)-1;
                }
                setInterval(function(){ countdown(); },1000);
                </script>'";

      }

    ?>

    <section class="u-align-center u-clearfix u-section-1" id="carousel_2125">

      <div class="container">
        <a href="#" class="active">
          <?php if (!empty($message)) { ?>
            <span style="color:red;">
              <?php echo $message; ?>
            <?php  } ?>
            </span>
            <span style="color:green;">
              <?php echo $success; ?>
            </span>
        </a>
      </div>

      <div class="u-clearfix u-sheet u-sheet-1">

    <div class="u-clearfix u-sheet u-sheet-1">      
      <div class="u-form u-form-1">
        <div align="center">
            <span style="font-size: 30px">COVID-19 Survey</span>
          <br>
        </div>

          <form action="" method="post">

              <div class="u-form-group u-form-select u-form-group-20">
                <br><h3>Respondent's details</h3><br>
              </div>

            <div class="row">

              <div class="col-sm-6">
                <!-- Left -->
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-2">
                  <label for="firstname_lbl" class="u-label">First Names (*)</label>
                  <input type="text" placeholder="Enter your first names" id="first_name" name="first_name" class="u-grey-5 u-input u-input-rectangle" required>
                </div>
              </div>

              <div class="col-sm-6">
                   <!-- Right -->
                <div class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-2">
                  <label for="surname_lbl" class="u-label">Surname/ Family Name (*)</label>
                  <input type="text" placeholder="Enter your first names" id="surname" name="surname" class="u-grey-5 u-input u-input-rectangle" required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-group-6">
                  <label for="cellnumber_lbl" class="u-label"> Cellphone number (*)</label>
                  <input type="tel" placeholder="Enter your Cellphone number" id="cellnumber" name="cellnumber" class="u-grey-5 u-input u-input-rectangle" required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="age_bracket">Age brackets (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" id="age_bracket" name="age_bracket" size="1" class="form-control unit" required>
                            <option selected value=""></option>
                            <option value="18-24">18-24</option>
                            <option value="25-34">25-34</option>
                            <option value="35-44">35-44</option>
                            <option value="45-54">45-54</option>
                            <option value="55-65">55-65</option>
                            <option value="65+">65+</option>
                    </select>
                    </div>
                </div>          
              </div>

              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="birth_month">Month of birth (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" id="birth_month" name="birth_month" size="1" class="form-control unit" required>
                            <option selected value=""></option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>                            
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                    </select>
                    </div>
                </div>          
              </div>              


              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="race_lbl" class="u-label">Race (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" id="race" name="race" size="1" class="form-control unit" required>
                      <option selected value=""></option>
                      <option  value="Black">African (Black)</option>
                      <option value="Asian">Asian</option>
                      <option value="Colored">Colored</option>
                      <option value="Indian">Indian</option>
                      <option value="White">White</option>
                      <option value="Other">Other</option>
                    </select>
                    </div>
                </div>          
              </div> 


              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="religion">Religion (*)</label>
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

              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="gender_id" class="u-label">Sexual Orientation (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" name="gender_id" id="gender_id" size="1" class="form-control unit"  required>
                      <option selected value=""></option>
                      <option value="Bisexual">Bisexual</option>
                      <option value="Heterosexual">Heterosexual</option>
                      <option value="Homosexual">Homosexual</option>
                      <option value="prefer-not">Prefer not to say</option>
                      <option value="Other">Other</option>
                    </select>
                    </div>
                </div>          
              </div>


              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="sex_lbl" class="u-label">Sex Composition (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" name="sex" id="sex" size="1" class="form-control unit"  required>
                      <option selected value=""></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Intersex">Intersex</option>
                      <option value="prefer-not">Prefer not to say</option>
                      <option value="Other">Other</option>
                    </select>
                    </div>
                </div>          
              </div>


              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="gender_lbl" class="u-label">Gender (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" name="gender" id="gender" size="1" class="form-control unit"  required>
                      <option selected value=""></option>
                      <option  value="Cisgender">Cisgender</option>
                      <option value="Gender Non-Conforming">Gender Non-Conforming</option>
                      <option value="Transgender">Transgender</option>
                      <option value="Queer/ Questioning">Queer/ Questioning</option>
                      <option value="prefer-not">Prefer not to say</option>
                      <option value="Other">Other</option>
                    </select>
                    </div>
                </div>          
              </div>

              <div class="col-sm-6">
                <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
                  <label for="pronouns_lbl" class="u-label">Pronouns (*)</label>
                    <div style="width:100%">
                    <select class="u-grey-5 u-input u-input-rectangle" name="pronouns" id="pronouns" size="1" class="form-control unit"  required>
                      <option selected value=""></option>
                      <option value="He-Him">He/him</option>
                      <option value="She-Her">She/her</option>
                      <option value="They-Them">They/them</option>
                    </select>
                    </div>
                </div>          
              </div>

            <div class="col-sm-6">
                <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                  <label for="disable-lbl" class="u-label">Do you have a disability? (*)</label>
                  <select id="disable" name="disable" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideDisabledPerson(this.value)" required>
                    <option selected value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
            </div>

            <div class="col-sm-12">
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
              <div class="u-form-group u-form-select u-form-group-20">
                <label for="municipality">Location Selection (*)</label>
                <div style="width:100%">

                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List1' id="List1" onchange="fillSelect(this.value,this.form['List2'])" required>
                    <option selected value="">Select Province</option>
                  </select> &nbsp;
                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List2' id="List2" onchange="fillSelect(this.value,this.form['List3'])" class="DDlist" required>
                    <option selected value="">Select District</option>
                  </select> &nbsp;
                  <select class="u-grey-5 u-input u-input-rectangle u-input-14" size="1" name='List3' id="List3" onchange="fillSelect(this.value,this.form['List4'])" class="DDlist" required>
                    <option  value="">Choose Municipality</option>
                  </select> &nbsp;
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="u-form-group u-form-message u-form-group-13">
                <label for="home_address_lbl" class="u-label">Place where you live (*)</label>
                <textarea placeholder="Enter your details about the place where you live" rows="4" cols="50" id="home_address" name="home_address" class="u-grey-5 u-input u-input-rectangle" spellcheck="false"></textarea>
              </div>
            </div>

            <div class="col-sm-12">
                <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                  <label for="employment_status" class="u-label">Which of the following categories best describes your employment status? (*)</label>
                  <select id="employment_status" name="employment_status" class="u-grey-5 u-input u-input-rectangle" class="form-control unit"  required>
                    <option selected value=""></option>
                    <option value="Student">Student</option>
                    <option value="Employed, working 1-20 hours per week">Employed, working 1-20 hours per week</option>
                    <option value="Employed, working 21 – 40+ or more hours per week">Employed, working 21 – 40+ or more hours per week</option>
                    <option value="Not employed, looking for work">Not employed, looking for work</option>
                    <option value="Not employed, NOT looking for work">Not employed, NOT looking for work</option>
                    <option value="Retired / Pensioner">Retired / Pensioner</option>
                    <option value="Disabled, not able to work">Disabled, not able to work</option>
                  </select>
                </div>
            </div>
          </div>

          <div class="u-form-group u-form-select u-form-group-20">
            <br><br>
              <h3>Index 1: Surviving Covid-19</h3>
            <br>
          </div>


            <div class="row">
            
            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="tested_covid" class="u-label">Have you tested positive for Covid-19? (*)</label>
                <select id="tested_covid" name="tested_covid" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" required onchange="showHideOtherTestedForCovid(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option  value="No">No</option>
                  <option value="Unsure">Unsure</option>
                </select>
              </div>
            </div>


            <div class="col-sm-12" id="hospitalized-covid-info" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="hospitalised" class="u-label">Were you hospitalised for Covid-19? </label>
                <select id="hospitalised" name="hospitalised" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideYouHospitalized(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>


            <div class="col-sm-12" id="isolateInfo" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="isolateInfo" class="u-label">How did you manage to self isolate. Choose relevant answer? </label>
                <select id="isolate_info" name="isolate_info" class="u-grey-5 u-input u-input-rectangle" class="form-control unit" onchange="showHideSupportServices(this.value)">
                  <option selected value=""></option>
                  <option value="Isolated in my own household">Isolated in my own household</option>
                  <option value="Isolated in a separate dwelling outside of my usual house">Isolated in a separate dwelling outside of my usual house
                  <option value="I did not self-isolate">I did not self-isolate</option>                    
                  </option>
                </select>
              </div>
            </div>



            <div class="col-sm-12" id="support_services" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="support" class="u-label">Do you have access to support services? <i>Tick all areas that apply</i></label>
                  <div class="u-form-wrapper" style="text-align: left;">
                  <input type="checkbox" name="counselling_support" id="counselling_support" value="Yes">
                  <label for="counselling_support">Counselling support</label><br>
                  <input type="checkbox" name="physical_rehab" id="physical_rehab" value="Yes">
                  <label for="physical_rehab">Physical rehabilitation</label><br>
                  <input type="checkbox" name="disability_grant" id="disability_grant" value="Yes">
                  <label for="disability_grant">Access to disability grant</label><br>
                  <input type="checkbox" name="access_medication" id="access_medication" value="Yes">
                  <label for="access_medication">Assistance to access medication</label><br>
                  <input type="checkbox" name="information" id="information" value="Yes">
                  <label for="information">Information on how to sustain health & wellness</label><br>
                  <input type="checkbox" name="no_access" id="no_access" value="Yes">
                  <label for="no_access">I do not access any of the stated support services</label><br>
                  <input type="checkbox" name="other" id="other" value="Yes">
                  <label for="other">Other</label><br>                  
                </div>
              </div>
            </div>


            <div class="col-sm-12" id="need_support_services" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="support" class="u-label">Which of the following support services do you need <i>Tick all areas that apply</i></label>
                  <div class="u-form-wrapper" style="text-align: left;">
                  <input type="checkbox" name="need_counselling_support" id="need_counselling_support" value="Yes">
                  <label for="need_counselling_support">Counselling support</label><br>
                  <input type="checkbox" name="need_physical_rehab" id="need_physical_rehab" value="Yes">
                  <label for="need_physical_rehab">Physical rehabilitation</label><br>
                  <input type="checkbox" name="need_disability_grant" id="need_disability_grant" value="Yes">
                  <label for="need_disability_grant">Access to disability grant</label><br>
                  <input type="checkbox" name="need_access_medication" id="need_access_medication" value="Yes">
                  <label for="need_access_medication">Assistance to access medication</label><br>
                  <input type="checkbox" name="need_information" id="need_information" value="Yes">
                  <label for="need_information">Information on how to sustain health & wellness</label><br>
                  <input type="checkbox" name="need_no_access" id="need_no_access" value="Yes">
                  <label for="need_no_access">I do not access any of the stated support services</label><br>
                  <input type="checkbox" name="need_other" id="need_other" value="Yes">
                  <label for="need_other">Other</label><br>                                   
                </div>
              </div>
            </div>
          </div>


          <div class="u-form-group u-form-select u-form-group-20">
            <br><br>
              <h3>Index 2: Social and behaviour change</h3>
            <br>
          </div>

              
          <div class="row">

            <div class="col-sm-12">
              <div class="u-form-group u-form-select u-form-group-13">
                <label for="select-07f8" class="u-label">What lifestyle changes do you think you need to make in order to make sure that you are safe from Covid-19? <i>Tick all areas that apply</i></label>
                <div class="u-form-wrapper" style="text-align: left;" >
                  <input type="checkbox" name="family" id="family" value="Yes">
                  <label for="family">How I spend time with my family</label><br>
                  <input type="checkbox" name="worship" id="worship" value="Yes">
                  <label for="worship">How I attend places of worship</label><br>
                  <input type="checkbox" name="friends" id="friends" value="Yes">
                  <label for="friends">How I socialise with friends</label><br>
                  <input type="checkbox" name="work" id="work" value="Yes">
                  <label for="work">How I conduct myself at work</label><br>
                  <input type="checkbox" name="shopping" id="shopping" value="Yes">
                  <label for="shopping">Where I go for shopping</label><br>
                  <input type="checkbox" name="travel" id="travel" value="Yes">
                  <label for="travel">Places outside of my community that I will travel to</label><br>
                  <input type="checkbox" name="other" id="other" value="Yes" onchange="showHideOtherLifeStyleChanges(this.value)">
                  <label for="other">Other</label>                
                </div>
              </div>
            </div>


            <div class="col-sm-12" id="other_lifestyle_changes" style="display:none">
              <div class="u-form-group u-form-message u-form-group-13">
                <label for="lifestyle_changes" class="u-label">Any other lifestyle changes? Please add in brackets <i>(– e.g. what does this mean for people living in hostels, services in townships, people in rural communities)</i> </label>
                <textarea placeholder="more details on other lifestyle changes " rows="4" cols="50" id="lifestyle_changes" name="lifestyle_changes" class="u-grey-5 u-input u-input-rectangle"></textarea>
              </div>  
            </div>   

            <div class="col-sm-12" >
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="family_social_distancing" class="u-label">Are you practising social distancing when you are socialising</label>
                <select id="family_social_distancing" name="family_social_distancing" class="u-grey-5 u-input u-input-rectangle" onchange="showHideSeeingFriends(this.value)" required>
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Most times">Most times</option>
                  <option value="Sometimes">Sometimes</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="seeing_friends_info" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="see_friends" class="u-label">How much do you see friends now as compared to before COVID-19 Lockdown in February/March of 2020?</label>
                <select id="see_friends" name="see_friends" id="see_friends" class="u-grey-5 u-input u-input-rectangle" onchange="showHideStepsToImproveHealth(this.value)">
                  <option selected value=""></option>
                  <option value="Much less">Much less</option>
                  <option value="Less">Less</option>
                  <option  value="The same">The same</option>
                  <option value="More">More</option>
                  <option value="Much more">Much more</option>
                </select>
              </div>
            </div>


            <div class="col-sm-12" id="compared_health" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="health_improvements" class="u-label">Would you say that as compared to last year your health is</label>
                <select id="health_improvements" name="health_improvements" class="u-grey-5 u-input u-input-rectangle" onchange="showHideDailyMeals(this.value)">
                 <option selected value=""></option>
                  <option value="Better">Better</option>
                  <option value="The same">The same</option>
                  <option value="Worse">Worse</option>
                  <option value="Not sure">Not sure</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="daily_meals_info" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="healthy_food" class="u-label">Have you been able to eat a daily meal since the beginning of lockdown</label>
                <select id="healthy_food" name="healthy_food" class="u-grey-5 u-input u-input-rectangle" >
                  <option selected value=""></option>
                  <option value="Much less">Much less</option>
                  <option value="Less">Less</option>
                  <option value="The same">The same</option>
                  <option value="More">More</option>
                  <option value="Much more">Much more</option>
                </select>
              </div>
            </div>

        </div>
            
            <br><br>
            <div class="u-form-group u-form-select u-form-group-20">
                <h3>Index 3: Access to public facilities</h3><br>
            </div>

        <div class="row">


            <div class="col-sm-12">
              <div class="u-form-group u-form-select u-form-group-13">
                <label for="select-07f8" class="u-label">Do you have access to water and sanitation i.e. toilets and running water? <i>If yes, what do you have - Tick all that apply:</i></label>
                <div class="u-form-wrapper" style="text-align: left;" >
                  <input type="checkbox" name="community_access_points" id="community_access_points" value="Yes">
                  <label for="community_access_points">Public community access points</label><br>
                  <input type="checkbox" name="flushing_toilet_inside_dwelling" id="flushing_toilet_inside_dwelling" value="Yes">
                  <label for="flushing_toilet_inside_dwelling">Flushing toilet inside dwelling</label><br>
                  <input type="checkbox" name="flushing_toilet_outside_dwelling" id="flushing_toilet_outside_dwelling" value="Yes">
                  <label for="flushing_toilet_outside_dwelling">Flushing toilet located outside of dwelling</label><br>
                  <input type="checkbox" name="tap_inside_dwelling" id="tap_inside_dwelling" value="Yes">
                  <label for="tap_inside_dwelling">Tap with running water inside dwelling</label><br>
                  <input type="checkbox" name="tap_outside_dwelling" id="tap_outside_dwelling" value="Yes">
                  <label for="tap_outside_dwelling">Tap with running water outside dwelling</label><br>
                </div>
              </div>
            </div>


          <div class="col-sm-12">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
              <label for="earning_living" class="u-label">How do you earn a living?</label>
              <select id="earning_living" name="earning_living" class="u-grey-5 u-input u-input-rectangle" onchange="showHideOtherEarnALiving(this.value)" required>
                <option selected value=""></option>
                <option value="Self employed">Self employed</option>
                <option value="Unemployed">Unemployed</option>
                <option value="Employed (part time)">Employed (part time)</option>
                <option value="Employed (permanent)">Employed (permanent)</option>
                <option value="Informal trader">Informal trader</option>
                <option value="other">Other</option>
              </select>
            </div>
          </div>

          <div class="col-sm-12" id="employment_changed_info" style="display:none">
            <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
            <label for="select-9172" class="u-label">Has your employment changed?</label>
              <div class="u-form-select-wrapper">
                <select id="changed_employment" name="changed_employment" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmploymentChanged(this.value)">
                <option selected value=""></option>
                <option value="Yes">Yes</option>
                <option  value="No">No</option>
                <option value="Unsure?">Unsure</option>
                </select>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                  <path fill="currentColor" d="M4 8L0 4h8z"></path>
                </svg>
              </div>
          </div>
        </div>


          <div class="col-sm-12" id="government_scheme_info" style="display:none">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="government_support" class="u-label">Did you access any government support schemes for small businesses/freelancers ?</label>
                <div class="u-form-select-wrapper">
                  <select id="government_support" name="government_support" class="u-grey-5 u-input u-input-rectangle">
                    <option selected value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Unsure?">Unsure</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>
              

            <div class="col-sm-12" id="unemployed-info" style="display: none;">  
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="select-9179" class="u-label">Did you apply for any SASSA grants?</label>
                <div class="u-form-select-wrapper">
                  <select id="applied_sassa" name="applied_sassa" class="u-grey-5 u-input u-input-rectangle"onchange="showHideEmployementInfo(this.value)">
                    <option selected value=""></option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                    <path fill="currentColor" d="M4 8L0 4h8z"></path>
                  </svg>
                </div>
              </div>
            </div>
              
            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="sassa-grant-info" style="display: none;">
                <label for="which_grant" class="u-label">Which grant did you apply</label>
                <select id="which_grant" name="which_grant" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmployAsstance(this.value)">
                  <option selected value=""></option>
                  <option value="old">Old persons Grant</option>
                  <option value="disability">Disability Grant</option>
                  <option value="care-dependency">Care-Dependency Grant</option>
                  <option value="war-veteran">War Veterans Grant</option>
                  <option value="child-support">Child Support Grant</option>
                  <option value="foster-child">Foster Child Grant</option>
                  <option value="in-aid">Grant-in-Aid</option>
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret">
                  <path fill="currentColor" d="M4 8L0 4h8z"></path>
                </svg>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="employment-changed-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" >
                <label for="applied_assistance" class="u-label">If you lost your job during Covid, have you applied for unemployment assistance?</label>
                <select id="applied_assistance" name="applied_assistance" class="u-grey-5 u-input u-input-rectangle" onchange="showHideUnemploymentAssistance(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unsure?">Unsure</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="applied_assistance-info" style="display: none;">
                <label for="application_success" class="u-label">Has your application been successful?</label>
                <select id="application_success" name="application_success" class="u-grey-5 u-input u-input-rectangle">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Unsure">Unsure</option>
                </select>
              </div>
            </div>
          </div>

      <div class="u-form-group u-form-select u-form-group-20">
        <br><h3>Index 4: Work and Travel Safety on COVID-19</h3>
      </div>

          <div class="row">

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="currently_employed" class="u-label">Are you currently employed</label>
                <select id="currently_employed" name="currently_employed" class="u-grey-5 u-input u-input-rectangle" onchange="showHideCurrentlyEmployed(this.value)" required>
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12"  id="employed_work_conditions" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="select-e2ab" class="u-label">Has your employer taken any steps to make your working environment safe against COVID infection? (*)</label>
                <select id="employer_safe_environment" name="employer_safe_environment" class="u-grey-5 u-input u-input-rectangle" onchange="showHideEmployerActions(this.value)">
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                  <option value="Somewhat">Somewhat</option>
                </select>
              </div>
            </div>            


            <div class="col-sm-12" id="employer_actions" style="display: none;">
              <div class="u-form-group u-form-select u-form-group-13">
                <label for="employer_measures" class="u-label">Which of the following measures has your employer taken? <i> Tick all that apply:</i></label>
                <div class="u-form-wrapper" style="text-align: left;" >
                  <input type="checkbox" name="covid_19_manager" id="covid_19_manager" value="Yes">
                  <label for="covid_19_manager">COVID-19 Manager onsite</label><br>
                  <input type="checkbox" name="daily_temperature" id="daily_temperature" value="Yes">
                  <label for="daily_temperature">Daily temperature checks for all staff</label><br>
                  <input type="checkbox" name="changed_policies" id="changed_policies" value="Yes">
                  <label for="changed_policies">Changed policies for sick leave</label><br>
                </div>
              </div>

              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="workplace_guidelines" class="u-label">Do you know the guidelines for the workplace during this pandemic?</label>
                <select id="workplace_guidelines" name="workplace_guidelines" class="u-grey-5 u-input u-input-rectangle" onchange="showHideGuidelines(this.value)" >
                  <option selected value=""></option>
                  <option value="Yes">Yes</option>
                  <option  value="No">No</option>
                  <option value="Some">Some</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="access_workplace_regulations" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="access_infomation" class="u-label"> 
                  Where are you accessing information on workplace regulations under Covid-19?
                </label>
                <select id="access_infomation" name="access_infomation" class="u-grey-5 u-input u-input-rectangle">
                  <option selected value=""></option>
                  <option value="Work Office">Work Office</option>
                  <option value="My Manager">My Manager/ Boss</option>
                  <option value="E-mail">E-mail</option>
                  <option value="Social Media">Social Media</option>
                  <option value="Billboards">Billboards</option>
                  <option value="Some">Some</option>
                  <option value="Internet Search">Internet Search</option>
                  <option value="Printed Media">Printed Media</option>
                  <option value="SMS">SMS</option>
                  <option value="Radio and TV">Radio and TV</option>
                  <option value="Municipalities">Municipalities</option>
                  <option value="Neighbourhood Committee">Neighbourhood Committee</option>
                  <option value="Local NPOs">Local NPOs</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="travel_to_work_and_around" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="travel_to_work" class="u-label">How do you travel around?</label>
                <select id="travel_to_work" name="travel_to_work" class="u-grey-5 u-input u-input-rectangle" onchange="showHideTransportInfo(this.value)">
                  <option selected value=""></option>
                  <option  value="Own-car">Own car</option>
                  <option value="Car-pool">Car-pool with others</option>
                  <option value="Minibus Taxi">Minibus Taxi</option>
                  <option value="Bus">Bus</option>
                  <option value="Train">Train</option>
                  <option value="High-speed">High-speed rail (e.g. Gautrain)</option>
                  <option value="Uber-Taxify">Uber/Taxify</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="publicTransportInfo" style="display: none;">
              <div class="u-form-group u-form-select u-form-group-13">
                <label for="public_transport" class="u-label">Are there safety measures that you can see? <i> Tick all that apply:</i></label>
                <div class="u-form-wrapper" style="text-align: left;" >
                  <input type="checkbox" name="sanitised_at_entry" id="sanitised_at_entry" value="Yes">
                  <label for="sanitised_at_entry">Passengers sanitised at entry</label><br>
                  <input type="checkbox" name="wearing_masks" id="wearing_masks" value="Yes">
                  <label for="wearing_masks">Passengers wearing masks</label><br>
                  <input type="checkbox" name="driver_wearing_mask" id="driver_wearing_mask" value="Yes">
                  <label for="driver_wearing_mask">Is the driver wearing a mask throughout the trip</label><br>
                  <input type="checkbox" name="window_open" id="window_open" value="Yes">
                  <label for="window_open">Is there a window open to allow for
                    air to flow</label><br>
                  <input type="checkbox" name="one_space" id="one_space" value="Yes">
                  <label for="one_space">Is there at least 1 space between passengers</label><br>                                    
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10" id="publicTransportInfo1" style="display: none;">
                <label for="public_transport_measures" class="u-label">What safety measures do you think are missing</label>
                <textarea placeholder="Please enter details" rows="4" cols="50" id="public_transport_measures" name="public_transport_measures" class="u-grey-5 u-input u-input-rectangle"></textarea>
              </div>
            </div>
          </div>


      <div class="u-form-group u-form-select u-form-group-20">
        <br><h3>Index 5: Hygiene Questions</h3>
        <b><i>
          How much do you practice the following measures to prevent COVID
        </i></b>
      </div><br>

          <div class="row">

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="wash_hands" class="u-label">Regularly wash hands with soap and water for at least 20 seconds</label>
                <select id="wash_hands" name="wash_hands" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule05Question01(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="hygiene-number-01-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="alcohol_based_sanitisers" class="u-label">Use alcohol-based hand sanitisers when you can’t use soap and water</label>
                <select id="alcohol_based_sanitisers" name="alcohol_based_sanitisers" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule05Question02(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="hygiene-number-02-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="avoid_touching" class="u-label">Avoid touching your eyes, nose and mouth</label>
                <select id="avoid_touching" name="avoid_touching" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule05Question03(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>            

            <div class="col-sm-12" id="hygiene-number-03-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="disinfect_surfaces" class="u-label">Clean and disinfect surfaces you use often such as tabletops, desks and doorknobs</label>
                <select id="disinfect_surfaces" name="disinfect_surfaces" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule05Question04(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12"  id="hygiene-number-04-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="disinfect_objects" class="u-label">Clean and disinfect objects you use often such as cellphones, keys, wallets and bus/train cards</label>
                <select id="disinfect_objects" name="disinfect_objects" class="u-grey-5 u-input u-input-rectangle" required  onchange="showHideModule05Question05(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div>              

            <div class="col-sm-12"  id="hygiene-number-05-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="fresh_air" class="u-label">Increase the amount of fresh air by opening windows</label>
                <select id="fresh_air" name="fresh_air" class="u-grey-5 u-input u-input-rectangle" required  onchange="showHideModule05Question06(this.value)">
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div> 


            <div class="col-sm-12"  id="hygiene-number-06-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10">
                <label for="social_distance" class="u-label">Keep a distance of 1.5m from people outside of my household all the time</label>
                <select id="social_distance" name="social_distance" class="u-grey-5 u-input u-input-rectangle" required>
                  <option selected value=""></option>
                  <option value="throughout-the-day">Throughout the day</option>
                  <option value="daily">Daily</option>
                  <option value="few-times-week">A few times a week</option>
                  <option value="weekly">Weekly</option>
                  <option value="3-times-month">3 times or less a month</option>
                  <option value="never">Never</option>
                </select>
              </div>
            </div> 

          </div>

      <div class="u-form-group u-form-select u-form-group-20">
        <br><h3>Index 6: Attitudes to the Vaccine</h3>
      </div>

          <div class="row">

            <div class="col-sm-12">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="quickly_as_possible" class="u-label">South Africa should roll out vaccines to the population as quickly as possible</label>
                <select id="quickly_as_possible" name="quickly_as_possible" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule06Question01(this.value)">
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="vaccine-number-01-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="prioritised_health_workers" class="u-label">I think that community health workers should be included as essential workers to be prioritised for the vaccine roll-out</label>
                <select id="prioritised_health_workers" name="prioritised_health_workers" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule06Question02(this.value)">
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12" id="vaccine-number-02-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="prioritised_teachers" class="u-label">I think that teachers should be included as essential workers to be prioritised for the vaccine roll-out</label>
                <select id="prioritised_teachers" name="prioritised_teachers" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule06Question03(this.value)">
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12"  id="vaccine-number-03-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="informed_enough" class="u-label">I  feel like I am informed enough and feel comfortable to take the vaccine </label>
                <select id="informed_enough" name="informed_enough" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule06Question04(this.value)">
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12"  id="vaccine-number-04-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="vaccines_safe" class="u-label">The vaccines that have been approved are safe for people to take</label>
                <select id="vaccines_safe" name="vaccines_safe" class="u-grey-5 u-input u-input-rectangle" required onchange="showHideModule06Question05(this.value)">
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

            <div class="col-sm-12"  id="vaccine-number-05-info" style="display: none;">
              <div class="u-form-group u-form-partition-factor-2 u-form-select u-form-group-10"><br>
                <label for="something_5g" class="u-label">COVID19 has something to do with 5G</label>
                <select id="something_5g" name="something_5g" class="u-grey-5 u-input u-input-rectangle" required >
                  <option selected value=""></option>
                  <option value="Strongly Agree">Strongly Agree</option>
                  <option value="Agree">Agree</option>
                  <option value=" Neither Agree nor Disagree"> Neither Agree nor Disagree</option>
                  <option value="Disagree">Disagree</option>
                  <option value="Strongly Disagree">Strongly Disagree</option>
                </select>
              </div>
            </div>

          </div>

              <div class="row">
                <div class="col-sm-12" align="center">
                  <p>
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="font-size: 20px" > 
                  </p>
                </div>
              </div>

          </form>
        </div>
      </div>
    </section>


<?php } 
include_once 'includes/footer.php'; 
?>
