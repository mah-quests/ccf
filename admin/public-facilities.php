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
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > ACCESS TO PUBLIC FACILITIES </p>

    <h4 class="card-title"> Sampled data with <?php echo $totalNumberOfTests ?> surveys</h4>

  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/public_services.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <p style="font-size: 18px">
    <b>NOTES:</b><br>
      <?php

        $accessWaterSanitationAr=array($numOfCommunityAccessPoints, $numOfToiletInsideDwelling, $numOfToiletOutsideDwelling, $numOfTapInsideDwelling, $numOfTapOutsideDwelling );

        $accessWaterSanitationMax = max($accessWaterSanitationAr);
        $accessWaterSanitationMin = min($accessWaterSanitationAr);

        $percentateRate = ($accessWaterSanitationMax / $numOfCompletedSurveys) * 100;
        $accessWaterSanitationPercentageMax = number_format($percentateRate, 2);

        $percentateRate = ($accessWaterSanitationMin / $numOfCompletedSurveys) * 100;
        $accessWaterSanitationPercentageMin = number_format($percentateRate, 2);



        echo "
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the most interviwed access to water and sanitation is $accessWaterSanitationPercentageMax %
              </li>
              <li> 
                Out of $numOfCompletedSurveys, our concentration rate to the least interviwed access to water and sanitation is $accessWaterSanitationPercentageMin %
              </li>             
              ";

      ?>
    </p>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/public_service_earn_living.php'; ?>
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
            <?php include 'assets/graphs/public_services_grant_ap.php'; ?>
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
            <?php include 'assets/graphs/public_service_application.php'; ?>
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
              <li> 
                
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
        <button class="btn btn-secondary btn-block" onclick="window.location.href='social-behaviour-change.php'">
          MODULE 2: Social and behaviour change
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='work-safety-covid.php'">
          MODULE 4: Work Safety on COVID-19
        </button>
        <button class="btn btn-secondary btn-block" onclick="window.location.href='hygiene.php#'">
          MODULE 5: Hygiene
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