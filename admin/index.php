<?php 

include("../config/connect.php"); // connection to db
error_reporting(0);
session_start();

if ($_SESSION['loggedin'] == TRUE)  
{
  
  header('location:dashboard.php');

}else{

  header('location:login.php');
  
}
 

?>