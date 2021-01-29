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
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > HYGIENE BEHAVIOUR CHANGE </p>

    <h4 class="card-title"> Sampled data with <?php echo $totalNumberOfTests ?> surveys</h4>

  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/hygiene_washHands.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $hygieneWashHandsArr=array($numOfWashHandsThroughDay, $numOfWashHandsDaily, $numOfWashHandsFewTimesWeek, $numOfWashHandsWeekly, $numOfWashHands3TimesMonth, $numOfWashHandsNever );

        $hygieneWashHandsMax = max($hygieneWashHandsAr);
        $hygieneWashHandsMin = min($hygieneWashHandsAr);

        $percentateRate = ($hygieneWashHandsMax / $numOfCompletedSurveys) * 100;
        $hygieneWashHandsPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($hygieneWashHandsMin / $numOfCompletedSurveys) * 100;
        $hygieneWashHandsPercentageMinPerc = number_format($percentateRate, 2);


        $handSanitiserAr=array($numOfUseSanitisersThroughDay, $numOfUseSanitisersDaily, $numOfUseSanitisersFewTimesWeek, $numOfUseSanitisersWeekly, $numOfUseSanitisers3TimesMonth,$numOfUseSanitisersNever );

        $handSanitiserMax = max($handSanitiserAr);
        $handSanitiserMin = min($handSanitiserAr);

        $percentateRate = ($handSanitiserMax / $numOfCompletedSurveys) * 100;
        $handSanitiserPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($handSanitiserMin / $numOfCompletedSurveys) * 100;
        $handSanitiserPercentageMinPerc = number_format($percentateRate, 2);


        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed hygieneWashHands change is $hygieneWashHandsPercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed hygieneWashHands change is $hygieneWashHandsPercentageMinPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, the most positive lifestyle change is $handSanitiserPercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, the most least positive lifestyle change is $handSanitiserPercentageMinPerc %
              </li>              
              ";

      ?>
      <li>
          <a href="#"></a>
      </li>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/hygiene_disinfect_surfaces.php'; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $healthFoodAr=array($numOfMuchLessDailyMeals, $numOfLessDailyMeals, $numOfTheSameDailyMeals, $numOfMoreDailyMeals, $numOfMuchMoreDailyMeals);

        $healthFoodMax = max($healthFoodAr);
        $healthFoodMin = min($healthFoodAr);

        $percentateRate = ($healthFoodMax / $numOfCompletedSurveys) * 100;
        $healthFoodPercentageMaxPerc = number_format($percentateRate, 2);

        $percentateRate = ($healthFoodMin / $numOfCompletedSurveys) * 100;
        $healthFoodPercentageMinPerc = number_format($percentateRate, 2);

        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed lifestyle change is $healthFoodPercentageMaxPerc %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed lifestyle change is $healthFoodPercentageMinPerc %
              </li>
              ";

      ?>

    </p>
    
    <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/hygiene_avoid_faceTouchingFreshAir.php'; ?>
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
            <?php include 'assets/graphs/hygiene_social_distancing.php'; ?>
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
          RESPONDANTS
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='surviving-covid.php'">
          MODULE 1: Surviving Covid-19
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='public-facilities.php'">
          MODULE 3: Access to public facilities
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='work-safety-covid.php'">
          MODULE 4: Work Safety on COVID-19
        </button> 
        <button class="btn btn-secondary btn-block" onclick="window.location.href='attitude-to-vaccine.php#'">
          MODULE 6: Attitudes to the Vaccine
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