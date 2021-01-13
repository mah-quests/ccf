<?php 
  include_once 'includes/header.php';
?>
<style>
#page{
    width:auto;
    height:490px;
    
}
</style>

<?php

    $mobiliser_id = $_SESSION['user_id'];

    $stmt = $db->prepare('SELECT COUNT(*) FROM summary_tbl WHERE mobiliser_id = ?');
    $stmt->bind_param('i', $mobiliser_id);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_row();
    $survey_numbers = $row[0];

?>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <center style="font-size: 18px">
            Surveys Completed So Far: <i><b><?php echo $survey_numbers ?></b></i>
          </center>
            <div class="table-responsive"><br>
              <table class="table">
                <thead class=" text-secondary">
                  <th>
                    Date & Time of Survey
                  </th>
                  <th>
                    Reference Number
                  </th>
                  <th>
                    Respondent Full Names
                  </th>
                  <th>
                    Respondent Cellphone
                  </th>
                  <th>
                    Municipality, Province
                  </th>
                  <th class="text-right">
                    Transaction ID
                  </th>
                </thead>
                <tbody>



        <?php
            $sql="SELECT * FROM summary_tbl WHERE mobiliser_id='$mobiliser_id' ORDER BY completed_datetime DESC ";

            $query=mysqli_query($db,$sql);
                if(!mysqli_num_rows($query) > 0 )
                {
                    echo '<td colspan="7">
                            <center>
                                No Surveys Completed Yet!
                            </center>
                        </td>';
                } else {
                    while($rows=mysqli_fetch_array($query)) {

                    echo ' <tr>
                            <td>'.$rows['completed_datetime'].'</td>
                            <td>'.$rows['unique_code'].'</td>
                            <td>'.$rows['respondant_name'].' '.$rows['respondant_surname'].' </td>
                            <td>'.$rows['respondant_phone'].'</td>
                            <td>'.$rows['municipality'].', '.$rows['province'].' </td>
                            <td align="right">
                              <a href="survey-id-detail.php?id='.$rows['summary_id'].' ">
                                  '.$rows['summary_id'].'
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

  <br><br>
    
<?php 
  include_once 'includes/footer.php';
?>