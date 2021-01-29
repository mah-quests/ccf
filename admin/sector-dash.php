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
  <div class="content"> <p><a href="dashboard.php"> DASHBOARD </a> > SECTOR STATS </p>



  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <br><br>
          <p align="center" style="font-size: 18px">
            Number of mobilisers across sectors
          </p>
        <div class="card-content">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=men">
                    <h1 class="display-5">
                        <?php echo $menMobilisers; ?>
                    </h1>
                </a>
                <span># Men</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=faith">
                    <h1 class="display-5">
                        <?php echo $faithMobilisers; ?>
                    </h1>
                </a>
                <span># Faith</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=women">
                    <h1 class="display-5">
                        <?php echo $womenMobilisers; ?>
                    </h1>
                </a>
                <span># Women</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=youth">
                    <h1 class="display-5" >
                        <?php echo $youthMobilisers; ?>
                    </h1>
                </a>
                <span># Youth</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=lgbtiq">
                    <h1 class="display-5">
                        <?php echo $lgbtiMobilisers; ?>
                    </h1>
                </a>
                <span># LGBTIQ</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=labour">
                    <h1 class="display-5">
                        <?php echo $labourMobilisers; ?>
                    </h1>
                </a>
                <span># Labour</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=research">
                    <h1 class="display-5">
                        <?php echo $researchMobilisers; ?>
                    </h1>
                </a>
                <span># Research</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=children">
                    <h1 class="display-5">
                        <?php echo $childrenMobilisers; ?>
                    </h1>
                </a>
                <span># Children</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=sexworkers">
                    <h1 class="display-5">
                        <?php echo $sexWorkerMobilisers; ?>
                    </h1>
                </a>
                <span># Sex Workers</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=highereducation">
                    <h1 class="display-5">
                        <?php echo $higerEducationMobilisers; ?>
                    </h1>
                </a>
                <span># Higher Education</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=humanrights">
                    <h1 class="display-5">
                        <?php echo $humanRightsMobilisers; ?>
                    </h1>
                </a>
                <span># Law & Human Rights</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=traditionalleaders">
                    <h1 class="display-5">
                        <?php echo $traditionalLeadersMobilisers; ?>
                    </h1>
                </a>
                <span># Traditional Leaders</span>
              </div>
            </div>              
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=healthprofessionals">
                    <h1 class="display-5">
                        <?php echo $healthProfessionalsMobilisers; ?>
                    </h1>
                </a>
                <span># Health Professionals</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=sportsart">
                    <h1 class="display-5">
                        <?php echo $sacMobilisers; ?>
                    </h1>
                </a>
                <span># Sport, Arts & culture</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=disability">
                    <h1 class="display-5">
                        <?php echo $peopleWithDisabilitiesMobilisers; ?>
                    </h1>
                </a>
                <span># People with Disabilities</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=npo">
                    <h1 class="display-5">
                        <?php echo $npoMobilisers; ?>
                    </h1>
                </a>
                <span># Non-Governmental Organisations</span>
              </div>
              <br><br>
            </div> 

            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=traditionalhealth">
                    <h1 class="display-5">
                        <?php echo $traditionalhealthMobilisers; ?>
                    </h1>
                </a>
                <span># Traditional Health Practitioners</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=plhiv">
                    <h1 class="display-5">
                        <?php echo $plhivMobilisers; ?>
                    </h1>
                </a>
                <span># People Living with HIV and AIDS (PLHIV)</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="#">
                    <h1 class="display-5">
                        <?php  ?>
                    </h1>
                </a>
                <span></span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="#">
                    <h1 class="display-5">
                        <?php  ?>
                    </h1>
                </a>
                <span></span>
              </div>
            </div>              
            <br>
          </div>
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
                Registered Mobilisers Across Provinces:
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=all">
                    <h1 class="display-4" style="color: green">
                        <?php echo $numOfRegisteredMobilisers;?>
                    </h1>
                </a>
                <span style="color: green"># Registered Mobilisers </span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=gauteng">
                    <h1 class="display-5">
                        <?php echo $gautengMobilisers; ?>
                    </h1>
                </a>
                <span># in Gauteng</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=freestate">
                    <h1 class="display-5">
                        <?php echo $freeStateMobilisers; ?>
                    </h1>
                </a>
                <span># in Free State</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=northwest">
                    <h1 class="display-5" >
                        <?php echo $northWestMobilisers; ?>
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
                <a target="_blank" href="mobiliser-personal-details.php?id=mpumalanga">
                    <h1 class="display-5">
                        <?php echo $mpumalangaMobilisers; ?>
                    </h1>
                </a>
                <span># in Mpumalanga</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=limpopo">
                    <h1 class="display-5">
                        <?php echo $limpopoMobilisers; ?>
                    </h1>
                </a>
                <span># in Limpopo</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=kzn">
                    <h1 class="display-5">
                        <?php echo $kznMobilisers; ?>
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
                <a target="_blank" href="mobiliser-personal-details.php?id=northcape">
                    <h1 class="display-5">
                        <?php echo $northernCapeMobilisers; ?>
                    </h1>
                </a>
                <span># in Northern Cape</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=eastcape">
                    <h1 class="display-5">
                        <?php echo $easternCapeMobilisers; ?>
                    </h1>
                </a>
                <span># in Eastern Cape</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-personal-details.php?id=westcape">
                    <h1 class="display-5">
                        <?php echo $westernCapeMobilisers; ?>
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
            <h4 class="card-title"> Top 10 Mobilisers</h4>
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
            $sql="SELECT mobiliser_tbl.mobiliser_id as mob_id, mobiliser_tbl.first_name as first_name, mobiliser_tbl.surname as surname, mobiliser_tbl.net_structure as net_structure, mobiliser_tbl.province as province, mobiliser_tbl.municipality as municipality, mobiliser_tbl.cellnumber as cellnumber, count(summary_tbl.mobiliser_id) as no_of_surveys FROM summary_tbl INNER JOIN mobiliser_tbl ON summary_tbl.mobiliser_id=mobiliser_tbl.mobiliser_id group by summary_tbl.mobiliser_id order by no_of_surveys desc LIMIT 15";
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


  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <div class="card-content">
          <div class="row">   
            <?php include 'assets/graphs/sector_mobilisers.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row" >
    <div class="col-12" >
      <div class="card bg-gradient-x-info">
        <br><br>
          <p align="center" style="font-size: 18px">
            Number of active mobilisers and number of surveys
          </p>
        <div class="card-content">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=men">
                    <h1 class="display-5">
                        <?php echo $menSurveys; ?>
                    </h1>
                </a>
                <span># Men</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=faith">
                    <h1 class="display-5">
                        <?php echo $faithSurveys; ?>
                    </h1>
                </a>
                <span># Faith</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=women">
                    <h1 class="display-5">
                        <?php echo $womenSurveys; ?>
                    </h1>
                </a>
                <span># Women</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=youth">
                    <h1 class="display-5" >
                        <?php echo $youthSurveys; ?>
                    </h1>
                </a>
                <span># Youth</span>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=lgbtiq">
                    <h1 class="display-5">
                        <?php echo $lgbtiSurveys; ?>
                    </h1>
                </a>
                <span># LGBTIQ</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=labour">
                    <h1 class="display-5">
                        <?php echo $labourSurveys; ?>
                    </h1>
                </a>
                <span># Labour</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=research">
                    <h1 class="display-5">
                        <?php echo $researchSurveys; ?>
                    </h1>
                </a>
                <span># Research</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=children">
                    <h1 class="display-5">
                        <?php echo $childrenSurveys; ?>
                    </h1>
                </a>
                <span># Children</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=sexworkers">
                    <h1 class="display-5">
                        <?php echo $sexWorkerSurveys; ?>
                    </h1>
                </a>
                <span># Sex Workers</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=highereducation">
                    <h1 class="display-5">
                        <?php echo $higerEducationSurveys; ?>
                    </h1>
                </a>
                <span># Higher Education</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=humanrights">
                    <h1 class="display-5">
                        <?php echo $humanRightsSurveys; ?>
                    </h1>
                </a>
                <span># Law & Human Rights</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=traditionalleaders">
                    <h1 class="display-5">
                        <?php echo $traditionalLeadersSurveys; ?>
                    </h1>
                </a>
                <span># Traditional Leaders</span>
              </div>
            </div>              
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=healthprofessionals">
                    <h1 class="display-5">
                        <?php echo $healthProfessionalsSurveys; ?>
                    </h1>
                </a>
                <span># Health Professionals</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=sportsart">
                    <h1 class="display-5">
                        <?php echo $sacSurveys; ?>
                    </h1>
                </a>
                <span># Sport, Arts & culture</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=disability">
                    <h1 class="display-5">
                        <?php echo $peopleWithDisabilitiesSurveys; ?>
                    </h1>
                </a>
                <span># People with Disabilities</span>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br><br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=npo">
                    <h1 class="display-5">
                        <?php echo $npoSurveys; ?>
                    </h1>
                </a>
                <span># Non-Governmental Organisations</span>
              </div>
              <br><br>
            </div> 

            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border border-right-info border-right-lighten-3">
                <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=traditionalhealth">
                    <h1 class="display-5">
                        <?php echo $traditionalhealthSurveys; ?>
                    </h1>
                </a>
                <span># Traditional Health Practitioners</span>
              </div>
            </div> 
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="mobiliser-details.php?id=plhiv">
                    <h1 class="display-5">
                        <?php echo $plhivSurveys; ?>
                    </h1>
                </a>
                <span># People Living with HIV and AIDS (PLHIV)</span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>               
              <div class="card-body text-center">
                <a target="_blank" href="#">
                    <h1 class="display-5">
                        <?php  ?>
                    </h1>
                </a>
                <span></span>
              </div>
            </div>  
            <div class="col-lg-3 col-md-6 col-sm-12 card-gradient-md-border">
            <br>
              <div class="card-body text-center">
                <a target="_blank" href="#">
                    <h1 class="display-5">
                        <?php  ?>
                    </h1>
                </a>
                <span></span>
              </div>
            </div>              
            <br>
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