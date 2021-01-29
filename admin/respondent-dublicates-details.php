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

  $mobiliser_id = $_GET['mob_id'];
  $survey_numbers = $_GET['num'];

  $stmt = $db->prepare('SELECT first_name, surname, cellnumber, net_structure FROM mobiliser_tbl WHERE mobiliser_id = ?');

  $stmt -> bind_param('s', $mobiliser_id);
  $stmt -> execute();
  $stmt -> store_result();
  $stmt -> bind_result($first_name, $surname, $cellnumber, $net_structure);
  $stmt -> fetch();


?>

  <div class="panel-header panel-header-sm">  
  </div>
  <br><br><br>
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a>  <?php echo ''?></p>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">
              <b>
                Possible Dublications Details
              </b>
            </h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                     Respondant Full Names 
                  </th>            
                  <th>
                    Respondant Sex
                  </th>
                  <th>
                    Respondant Religion
                  </th>
                  <th>
                    Respondant Municipality, Province
                  </th>
                                  
                  <th class="text-right">
                    #No. of Possible Duplications
                  </th>
                </thead>
                <tbody>



        <?php
            $sql="SELECT first_name, surname, sex, religion, municipality, province, COUNT(*) FROM respondant_contact_tbl GROUP BY first_name, surname, sex, religion, municipality, province HAVING COUNT(*) > 1 ";

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
                            <td>'.$rows['first_name'].' '.$rows['surname'].'</td>
                            <td>'.$rows['sex']. '</td>
                            <td>'.$rows['religion'].'</td>
                            <td>'.$rows['municipality'].', '.$rows['province'].' </td>
                            <td align="right">'
                              .$rows['COUNT(*)'].'
    
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