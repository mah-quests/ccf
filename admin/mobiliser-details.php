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

  $column = $_GET[id];

  if ($_GET[id] == 'men'){
    $sector = "Men";
    $subsector = "Men Sector";
    $completedSurveys = $menSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'faith'){
    $sector = "Faith";
    $subsector = "Faith Sector";
    $completedSurveys = $faithSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'women'){
    $sector = "Women";
    $subsector = "Women Sector";
    $completedSurveys = $womenSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'youth'){
    $sector = "Youth";
    $subsector = "Youth Sector";
    $completedSurveys = $youthSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'lgbtiq'){
    $sector = "LGBTIQ";
    $subsector = "LGBTIQ+ Sector";
    $completedSurveys = $lgbtiSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'lgbtiq'){
    $sector = "LGBTIQ";
    $subsector = "LGBTIQ+ Sector";
    $completedSurveys = $lgbtiSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'labour'){
    $sector = "Labour";
    $subsector = "Labour Sector";
    $completedSurveys = $labourSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'research'){
    $sector = "Research";
    $subsector = "Research Sector";
    $completedSurveys = $researchSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'children'){
    $sector = "Children";
    $subsector = "Children Sector";
    $completedSurveys = $childrenSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'sexworkers'){
    $sector = "Sex Workers";
    $subsector = "Sex Workers Sector";
    $completedSurveys = $sexWorkerSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'highereducation'){
    $sector = "Higer Education";
    $subsector = "Higer Education Sector";
    $completedSurveys = $higerEducationSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'humanrights'){
    $sector = "Law & Human Rights";
    $subsector = "Law & Human Rights Sector";
    $completedSurveys = $humanRightsSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'humanrights'){
    $sector = "Law & Human Rights";
    $subsector = "Law & Human Rights Sector";
    $completedSurveys = $humanRightsSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'traditionalleaders'){
    $sector = "Traditional Leaders";
    $subsector = "Traditional Leaders Sector";
    $completedSurveys = $traditionalLeadersSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'healthprofessionals'){
    $sector = "Health Professionals";
    $subsector = "Health Professionals Sector";
    $completedSurveys = $healthProfessionalsSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'healthprofessionals'){
    $sector = "Health Professionals";
    $subsector = "Health Professionals Sector";
    $completedSurveys = $healthProfessionalsSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'sportsart'){
    $sector = "Sport, Arts & Culture";
    $subsector = "Sport, Arts & Culture Sector";
    $completedSurveys = $sacSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'disability'){
    $sector = "People with Disabilities";
    $subsector = "People with Disabilities";
    $completedSurveys = $peopleWithDisabilitiesSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'npo'){
    $sector = "Non-Governmental Organisations";
    $subsector = "Non-Governmental Organisations Sector";
    $completedSurveys = $npoSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'traditionalhealth'){
    $sector = "Traditional Health Practitioners";
    $subsector = "Traditional Health Practitioners Sector";
    $completedSurveys = $traditionalhealthSurveys; 
    $mobiliser_province = "%";
  } elseif($_GET[id] == 'plhiv'){
    $sector = "People Living with HIV and AIDS (PLHIV)";
    $subsector = "People Living with HIV and AIDS (PLHIV) Sector";
    $completedSurveys = $plhivSurveys; 
    $mobiliser_province = "%";
  }


?>

  <div class="panel-header panel-header-sm">  
  </div>
  <br><br><br>
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > <?php echo $subsector ?></p>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">
              <b>
                TOTAL SURVEYS COMPLETED BY SECTOR: <?php echo $completedSurveys; ?>
              </b>
            </h5>
            <h4 class="card-title"> <?php echo $subsector ?> </h4>
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
            $sql="SELECT mobiliser_tbl.mobiliser_id as mob_id, mobiliser_tbl.first_name as first_name, mobiliser_tbl.surname as surname, mobiliser_tbl.net_structure as net_structure, mobiliser_tbl.province as province, mobiliser_tbl.municipality as municipality, mobiliser_tbl.cellnumber as cellnumber, count(summary_tbl.mobiliser_id) as no_of_surveys FROM summary_tbl INNER JOIN mobiliser_tbl ON summary_tbl.mobiliser_id=mobiliser_tbl.mobiliser_id WHERE net_structure LIKE '$sector' AND summary_tbl.province LIKE '$mobiliser_province' group by summary_tbl.mobiliser_id order by no_of_surveys desc ";
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