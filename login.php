<?php

include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    header("refresh:0;url=logged_in.php");

  } else {

?>

<!DOCTYPE html>
<html>
<head>
  <title>SANAC CSF Communities Matter - Login</title>
   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="icon" type="image/png" sizes="32x32" href="images/black-covid-logo.png">    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel='stylesheet' href="assets/css/style.css"/>

    <style type="text/css">

    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
    background-image: url('images/img/login-page.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font: normal 16px "Raleway","Helvetica Neue",Helvetica,Arial,sans-serif;
    }

    .container{
    height: 100%;
    align-content: center;
    }

    .card{
    width: auto;
    height: 450px;
    margin-top: auto;
    margin-bottom: auto;
    width: 500px;
    background-color: rgba(0,0,0,0) !important;
    }

    .social_icon span{
    font-size: 60px;
    margin-left: 10px;
    color: #FFFFFF;
    }

    .social_icon span:hover{
    color: white;
    cursor: pointer;
    }

    .card-header h3{
    color: white;
    }

    .social_icon{
    position: absolute;
    right: 20px;
    top: -45px;
    }

    .input-group-prepend span{
    width: 50px;
    background-color: #ffffff;
    color: black;
    border:0 !important;
    }

    input:focus{
    outline: 0 0 0 0  !important;
    box-shadow: 0 0 0 0 !important;

    }

    .remember{
    color: white;
    }

    .remember input
    {
    width: 20px;
    height: 20px;
    margin-left: 15px;
    margin-right: 5px;
    }

    .login_btn{
    color: black;
    background-color: #447EBA;
    width: 100px;
    }

    .login_btn:hover{
    color: black;
    background-color: white;
    }

    .links{
    color: white;
    }

    .links a{
    margin-left: 4px;
    }

    #buttn{
      color:#fff;
      background-color: #ff3300;
    }
    </style>

<?php
include("connect/connectDB.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions
if(isset($_POST['submit']))   // if button is submit
{
  $username = $_POST['username'];  //fetch records from login form
  
  if(!empty($_POST["submit"]))   // if records were not empty
  {

    if ($stmt = $db->prepare('SELECT user_login_id, password, project FROM user_authenticate_tbl WHERE username = ?')) {

      // Bind parameters (s = string, i = int, b = blob, etc)
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_login_id, $password, $project);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {

          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['name'] = $username;
          $_SESSION['project'] = $project;


          $stmt = $db->prepare('SELECT mobiliser_id FROM mobiliser_tbl WHERE cellnumber = ?');

          $stmt -> bind_param('s', $username);
          $stmt -> execute();
          $stmt -> store_result();
          $stmt -> bind_result($mob_id);
          $stmt -> fetch();

          $_SESSION['user_id'] = $mob_id; 


          $success = 'Welcome '.$username.'! Successfully logged in';
          header("refresh:2;url=survey.php");

        } else {
          $message = "Login Unsuccessful! <br>Password entered is incorrect. Please try again"; // throw error

        }

      } else {
        $message = "Login Unsuccessful! <br>Username entered is incorrect. Please try again"; // throw error

      }
    }
   }
}
?>

</head>

<style>
  #username:valid {
    color: green;
  }
  
  #username:invalid {
    color: red;
  }
</style>

<body>
<div class="container">
  <br><br>
    <center>
      <img align="center" width="200" height="200" src="images/ThinkTwiceAboutCOVIDcampaignlogotypePNGimage300dpiRGB.png" alt="Community Constituency">
    </center>
    <br><br>
  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-header" align="center">
          <a class="navbar-brand" href="index.php"> 
              <img align="center" width="290" height="90" src="images/CommConstituencyCovid-19campaignlogo2020v1PNGsansbackground.png" alt="Community Constituency Front">
          </a>         
        <div >
        </div>
      </div>
      <div class="card-body">

        <form  action="" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" 
                  class="form-control" 
                  placeholder="Enter Your Cellphone Number, eg. +27721234567" 
                  value="+27" 
                  oninput="this.value = this.value.replace(/[^0-9.+]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                  pattern="[0-9+]{12}" 
                  name="username" 
                  id="username" 
                  required>
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" 
                  class="form-control" 
                  placeholder="Enter your Password" 
                  name="password"
                  id="password"
                  required>
          </div>
          <div >
            <input type="checkbox">   Remember Me
          </div>
          <div class="form-group">
           <input align="center" onclick="window.location.href='index.php';" value="Home" class="btn float-right login_btn" style="margin:5px;">
            <input align="center" type="submit" id="buttn" name="submit" value="Login" class="btn float-right login_btn" style="margin:5px;">
          </div>
        </form>
      </div>
      
      <div align="center">
        <span style="color:red;"><?php echo $message; ?></span> 
        <span style="color:green;"><?php echo $success; ?></span>
      </div>

      <br>
      <div class="card-footer">
        <div align="center">
          Don't have an account?<a href="register.php"> Sign Up </a><br>
        </div>
        <div class="d-flex justify-content-center">
          <a href="doResetPassword.php">Forgot your password?</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php
  }
?>