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
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > LIVE STATS </p>
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header" align="center">
            <h5 class="card-category"># Registered Mobilasers today</h5><br>
            <h3 class="card-title" style="font-size: 50px"><?php echo $numOfRegisteredMobilisersToday ?></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header" align="center">
            <h5 class="card-category"># Completed Surveys today</h5><br>
            <h3 class="card-title" style="font-size: 50px"><?php echo $numOfCompletedSurveysToday ?></h3>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header"  align="center">
            <h5 class="card-category"># Active Agents today</h5><br>
            <h3 class="card-title" style="font-size: 50px"><?php echo $numOfActiveAgentsToday ?></h3>
          </div>
        </div>
      </div>
    </div>


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3" align="center">
                <br>
                Surveys Across Provinces:
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todayall&num=<?php echo $numOfCompletedSurveysToday ?> ">
                    <h1 class="display-4" style="color: green">
                        <?php echo $numOfCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span style="color: green">#Surveys Completed Today</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaygauteng&num=<?php echo $gautengCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $gautengCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Gauteng</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todayfreestate&num=<?php echo $freeStateCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $freeStateCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Free State</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaynorthwest&num=<?php echo $northWestCompletedSurveysToday ?> ">
                    <h1 class="display-5" >
                        <?php echo $northWestCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in North West</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <h1 class="display-5">                    
                </h1>
                <span></span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaympumalanga&num=<?php echo $mpumalangaCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $mpumalangaCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Mpumalanga</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaylimpopo&num=<?php echo $limpopoCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $limpopoCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Limpopo</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaykzn&num=<?php echo $kznCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $kznCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in KwaZulu Natal</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <h1 class="display-5" style="color: red">                   
                </h1>
                <span style="color: red"></span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaynorthcape&num=<?php echo $northernCapeCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $northernCapeCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Northern Cape</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todayeastcape&num=<?php echo $easternCapeCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $easternCapeCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Eastern Cape</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="survey-details.php?id=todaywestcape&num=<?php echo $westernCapeCompletedSurveysToday ?> ">
                    <h1 class="display-5">
                        <?php echo $westernCapeCompletedSurveysToday; ?>
                    </h1>
                </a>
                <span># in Western Cape</span>
              </div>
              <br><br>
            </div> 
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Mobilisers Performance</h5>
            <h4 class="card-title"> Top 10 Mobilisers today</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Sector Represented
                  </th>
                  <th>
                    Cellphone Number
                  </th>
                  <th>
                    Municipality, Province
                  </th>                  
                  <th class="text-right">
                    Number of Surveys
                  </th>
                </thead>
                <tbody>

        <?php
            $sql="SELECT mobiliser_tbl.mobiliser_id as mob_id, mobiliser_tbl.first_name as first_name, mobiliser_tbl.surname as surname, mobiliser_tbl.net_structure as net_structure, mobiliser_tbl.province as province, mobiliser_tbl.municipality as municipality, mobiliser_tbl.cellnumber as cellnumber, count(summary_tbl.mobiliser_id) as no_of_surveys FROM summary_tbl INNER JOIN mobiliser_tbl ON summary_tbl.mobiliser_id=mobiliser_tbl.mobiliser_id where date(completed_datetime)=CURDATE() group by summary_tbl.mobiliser_id order by no_of_surveys desc";
            $query=mysqli_query($db,$sql);

                if(!mysqli_num_rows($query) > 0 )
                {
                    echo '<td colspan="7">
                            <center>
                                No User-Data!
                            </center>
                        </td>';
                } else {               
                    while($rows=mysqli_fetch_array($query)) {
                        

                    echo ' <tr>
                            <td>'.$rows['first_name'].' '.$rows['surname'].' </td>
                            <td>'.$rows['net_structure'].'</td>
                            <td>'.$rows['cellnumber'].'</td>
                            <td>'.$rows['municipality'].', '.$rows['province'].' </td>
                            <td align="right">
                              <a href="mobiliser-survey-details.php?mob_id='.$rows['mob_id'].'&num='.$rows['no_of_surveys'].' ">
                                  '.$rows['no_of_surveys'].'
                              </a>
                            </td>
                            </tr>';

                    }   
                }

            ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
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