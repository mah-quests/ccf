<!DOCTYPE html>
<html lang="en" >
<html>
<head>
  <title>Civil Society Forum - User Reset Password</title>
   
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel='stylesheet' href="assets/css/style.css"/>

    <style type="text/css">
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

    if ($stmt = $db->prepare('SELECT user_login_id, username FROM user_authenticate_tbl WHERE username = ?')) {

      // Bind parameters (s = string, i = int, b = blob, etc)
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $user);
        $stmt->fetch();


        $success = "User found... You will now reset your password! <p>Redirection in <span id='counter'>1</span> second(s).</p>
                                <script type='text/javascript'>
                                function countdown() {
                                  var i = document.getElementById('counter');
                                  if (parseInt(i.innerHTML)<=0) {
                                    location.href = 'doNewPassword.php?user_id=$id';
                                  }
                                  i.innerHTML = parseInt(i.innerHTML)-1;
                                }
                                setInterval(function(){ countdown(); },1000);
                                </script>'";
        
         header("refresh:1;url=doNewPassword.php?user_id=$id");

      } else {

          $message = "Identification Number entered is incorrect. Please verify the Identification Number number entered is correct"; // throw error

      }
    }
   }
}
?>


</head>

<style>
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
    height: 420px;
    margin-top: auto;
    margin-bottom: auto;
    width: 400px;
    background-color: rgba(0,0,0,0.5) !important;
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

    #username:valid {
      color: green;
    }
    
    #username:invalid {
      color: red;
    }    

</style>
<body>
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header" align="center">
        <h3 align="center">Reset Password</h3>
          <a class="navbar-brand" href="index.php"> 
              <img align="center" width="330" height="90" src="images/CommConstituencyCovid-19campaignlogo2020v1PNGsansbackground.png" alt="Community Constituency"> 
          </a>         
        <div >
        </div>
      </div>
      <div class="card-body">

        <form  action="" method="post">
          <div class="input-group form-group">
            <div>
              <span></span>
            </div>            
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" 
                  class="form-control" 
                  placeholder="Enter Cellphone eg. +27721234567" 
                  name="username" 
                  id="username" 
                  oninput="this.value = this.value.replace(/[^0-9.+]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                  pattern="[0-9+]{12}"
                  value="+27"                   
                  required>            
          </div>
          <div class="form-group">
            <input type="submit" id="buttn" name="submit" value="Validate" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div align="center">
        <span style="color:red;"><?php echo $message; ?></span> 
        <span style="color:green;"><?php echo $success; ?></span>  
      </div>    
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Ooooh, I remember my password now... 
          <input align="center" onclick="window.location.href='login.php';" value="Login" class="btn float-right login_btn" style="margin:5px;">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>