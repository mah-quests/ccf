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
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > CUSTOMIZE MOBILISER REPORTS </p>
<?php 

    $sector = "%";
    $mobiliser_province = "%";
    $education = "%";
    $write_up = "All Mobilisers";

?>


    <div class="row" style="font-size: 18px">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form action="dynamic-mobiliser-reports.php" method="post">

              <tr>
                <td>
                  <label for="province" class="u-label">Province: </label>
                    <select class="u-grey-5 u-input u-input-rectangle" id="province" name="province" size="1" class="form-control unit" >
                        <option  value="%">All</option>
                        <option  value="Eastern Cape">Eastern Cape</option>
                        <option  value="Free State">Free State</option>
                        <option  value="Gauteng">Gauteng</option>
                        <option  value="Kwazulu Natal">KwaZulu-Natal</option>
                        <option  value="Limpopo">Limpopo</option>
                        <option  value="Mpumalanga">Mpumalanga</option>
                        <option  value="Northern Cape">Northern Cape</option>
                        <option  value="North West">North West</option>
                        <option  value="Western Cape">Western Cape</option>
                    </select>
                </td>
                <td>
                  <label for="net_structure" class="u-label" >Sector: </label>
                  <select class="u-grey-5 u-input u-input-rectangle" id="net_structure" name="net_structure" size="1" class="form-control unit">
                      <option  value="%">All</option>
                      <option value="People Living with HIV and AIDS (PLHIV)">People Living with HIV and AIDS (PLHIV)</option>
                      <option value="Sex Workers">Sex Workers</option>
                      <option value="Faith">Faith</option>
                      <option value="Higer Education" >Higher Education</option>
                      <option value="Sport, Arts & culture">Sport, Arts & Culture</option>
                      <option value="Labour">Labour</option>
                      <option value="Research">Research</option>
                      <option value="Law & Human Rights">Law & Human Rights</option>
                      <option value="Youth">Youth</option>
                      <option value="Men">Men</option>   
                      <option value="Women">Women</option>
                      <option value="Non-Governmental Organisations">Non-Governmental Organisations</option>
                      <option value="Traditional Leaders">Traditional Leaders</option>
                      <option value="Traditional Health Practitioners">Traditional Health Practitioners</option>
                      <option value="Health Professionals">Health Professionals</option>
                      <option value="People with Disabilities">People with Disabilities</option>
                      <option value="Children">Children</option>
                      <option value="LGBTIQ">LGBTIQ+</option>
                    </select>                
                </td>
                <td>
                  <label for="race" class="u-label">Race: </label>
                    <select class="u-grey-5 u-input u-input-rectangle" id="race" name="race" size="1" class="form-control unit">
                      <option value="%">All</option>
                      <option value="African (Black)">African (Black)</option>
                      <option value="Asian">Asian</option>
                      <option value="Coloured">Coloured</option>
                      <option value="Indian">Indian</option>
                      <option value="White">White</option>
                      <option value="Other">Other</option>
                    </select>      
                </td>
                <td>
                  <input type="submit" value="Filter" name="submit" class="btn btn-danger"> 
                </td>
              </tr>

            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">
              <b>
                TOTAL NUMBER OF MOBILISERS IN SECTOR: <?php echo $write_up; ?>
              </b>
            </h5>
            <h4 class="card-title"> <?php echo $write_up ?> (No filters applied)</h4>
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
                    Email
                  </th>                  
                  <th>
                    Municipality, Province
                  </th>
                </thead>
                <tbody>



        <?php
            $sql="SELECT * FROM mobiliser_tbl  order by net_structure asc";
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
                            <td>'.$rows['email'].'</td>
                            <td>'.$rows['municipality'].', '.$rows['province'].' </td>
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