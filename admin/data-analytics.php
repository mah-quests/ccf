<?php

  include("../connect/connectDB.php"); // connection to db
  include("../connect/dataCollection.php"); // connection to db

error_reporting(0);
session_start();

if ($_SESSION['loggedin']  != TRUE)   //if user is not login redirected baack to login page
{
  header('location:login.php');
} else {

  include_once "includes/header.php";

?>

  <div class="panel-header panel-header-sm">  
  </div>
  <br><br><br>
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > DATA ANALYTICS & REPORTS </p>

    <h4 class="card-title"> Sampled data with <?php echo $numOfCompletedSurveys ?> surveys</h4>

  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/respondents_age_race.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php


        $raceAr=array($numOfRaceBlack, $numOfRaceAsian, $numOfRaceColored, $numOfRaceIndian, $numOfRaceWhite, $numOfRaceOther);

        $raceMax = max($raceAr);
        $raceMin = min($raceAr);

        $percentateRate = ($raceMax / $numOfCompletedSurveys) * 100;
        $racePercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($raceMin / $numOfCompletedSurveys) * 100;
        $racePercentageMinPerc = number_format($percentateRate, 2);

        $ageBrackets= $numOfAge18to24 + $numOfAge25to34 + $numOfAge35to44 + $numOfAge45to54 + $numOfAge55to64 + $numOfAge65plus;

        $ageAr=array($numOfAge18to24, $numOfAge25to34, $numOfAge35to44, $numOfAge45to54, $numOfAge55to64, $numOfAge65plus);

        $ageMax = max($ageAr);
        $ageMin = min($ageAr);

        $percentateRate = ($ageMax / $ageBrackets) * 100;
        $agePercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($ageMin / $ageBrackets) * 100;
        $agePercentageMinPerc = number_format($percentateRate, 2);


        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed race is $racePercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed race is $racePercentageMinPerc %
              </li>
              <li> 
                Out of $ageBrackets, our concentration rate to the most interviwed ages are $agePercentageMaxPerc %
              </li>
              <li> 
                Out of $ageBrackets, our concentration rate to the least interviwed ages are $agePercentageMinPerc %
              </li>              
              ";

      ?>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_religions.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $religionAr=array($numOfReligionChristian, $numOfReligionIslam, $numOfReligionHinduism, $numOfReligionAfrican, $numOfReligionJudaism, $numOfReligionAtheist, $numOfReligionRastafarian, $numOfReligionUnknown, );

        $religionMax = max($religionAr);
        $religionMin = min($religionAr);

        $percentateRate = ($religionMax / $numOfCompletedSurveys) * 100;
        $religionPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($religionMin / $numOfCompletedSurveys) * 100;
        $religionPercentageMinPerc = number_format($percentateRate, 2);



        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed race is $religionPercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed race is $religionPercentageMinPerc %
              </li>             
              ";

      ?>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_genders.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $genderAr=array($numOfGenderCisgender, $numOfGenderNonConform, $numOfGenderTransgender, $numOfGenderQueer, $numOfGenderUnknown, $numOfGenderOther );

        $genderMax = max($genderAr);
        $genderMin = min($genderAr);

        $percentateRate = ($genderMax / $numOfCompletedSurveys) * 100;
        $genderPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($genderMin / $numOfCompletedSurveys) * 100;
        $genderPercentageMinPerc = number_format($percentateRate, 2);



        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed gender is $genderPercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed gender is $genderPercentageMinPerc %
              </li>             
              ";

      ?>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_sex_pronouns.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        echo "
              <li> 
              </li>
              <li> 
              </li>             
              ";

      ?>
    </p>



  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_disabilities.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $disabilityTypeAr=array($numOfDisabledPhysical, $numOfDisabledImpairment, $numOfDisabledDeaf, $numOfDisabledIntellectual, $numOfDisabledBrainInjury);

        $disabilityTypeMax = max($disabilityTypeAr);
        $disabilityTypeMin = min($disabilityTypeAr);

        $percentateRate = ($disabilityTypeMax / $numOfDisabled) * 100;
        $disabilityTypePercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($disabilityTypeMin / $numOfDisabled) * 100;
        $disabilityTypePercentageMinPerc = number_format($percentateRate, 2);



        echo "
              <li> 
                Out of $numOfCompletedSurveys, total number of people with disabilities are $numOfDisabled 
              </li>
              <li> 
                Out of $numOfDisabled disabled interviews, our concentration rate to the most interviwed disability is $disabilityTypePercentageMaxPerc %
              </li>               
              <li> 
                Out of $numOfDisabled disabled interviews, our concentration rate to the least interviwed disability is $disabilityTypePercentageMinPerc %
              </li>             
              ";

      ?>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_employment.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

      $totalEmploymentSurveys = $numOfEmployed1to20 + $numOfEmployed21to40 + $numOfUnEmployedLooking + $numOfUnEmployedNotLooking + $numOfUnEmployedRetired + $numOfUnEmployedDisabled;

        $employmentAr=array($numOfEmployed1to20, $numOfEmployed21to40, $numOfUnEmployedLooking, $numOfUnEmployedNotLooking, $numOfUnEmployedRetired, $numOfUnEmployedDisabled);

        $employmentMax = max($employmentAr);
        $employmentMin = min($employmentAr);

        $percentateRate = ($employmentMax / $totalEmploymentSurveys) * 100;
        $employmentPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($employmentMin / $totalEmploymentSurveys) * 100;
        $employmentPercentageMinPerc = number_format($percentateRate, 2);



        echo "
              <li> 
                Out of $totalEmploymentSurveys interviews conducted on employment, our concentration rate to the most interviwed employment is $employmentPercentageMaxPerc %
              </li>               
              <li> 
                Out of $totalEmploymentSurveys interviews conducted on employment, our concentration rate to the least interviwed employment is $employmentPercentageMinPerc
              </li>             
              ";

      ?>
    </p>

        <button class="btn btn-secondary btn-block" onclick="window.location.href='data-analytics.php'">
          RESPONDANTS: Respondants Analysis
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='surviving-covid.php'">
          MODULE 1: Surviving Covid-19
        </button>         
        <button class="btn btn-secondary btn-block" onclick="window.location.href='social-behaviour-change.php'">
          MODULE 2: Social and behaviour change
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='public-facilities.php'">
          MODULE 3: Access to public facilities
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='work-safety-covid.php'">
          MODULE 4: Work Safety on COVID-19
        </button>                         


  </div>
  <footer class="footer">
    <div class=" container-fluid ">
      <nav>
        <ul>
          <li>
            <a target="_blank" href="https://app.sanaccsf.org.za/">
              Community Matters
            </a>
          </li>
          <li>
            <a target="_blank" href="https://app.sanaccsf.org.za/about.php">
              About Us
            </a>
          </li>
          <li>
            <a target="_blank" href="https://support.sanaccsf.org.za/app/admin/">
              Support Tickets
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </footer>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  </body>
<?php } ?>

</html>