<?php
require_once("connect/DBController.php");
$db_handle = new DBController();


if(!empty($_POST["cellnumber"])) {
  $query = "SELECT * FROM user_authenticate_tbl WHERE username='" .$_POST["cellnumber"]. "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>