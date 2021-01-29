<!DOCTYPE html>
<html lang="en">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  <title>
    Communities Matter Admin Login
  </title>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<?php
include("../connect/connectDB.php"); //INCLUDE CONNECTION
error_reporting(0); // hide undefine index errors
session_start(); // temp sessions

if(isset($_POST['submit']))   // if button is submit
{
  $username = $_POST['username'];   //fetch username from login form
  $pin = $_POST['pin'];             //fetch pin from login form
  
  if(!empty($_POST["submit"]))   // if records were not empty
  {

    if ($stmt = $db->prepare('SELECT adm_id, password, full_names FROM admin_authenticate_tbl WHERE username = ? AND pin = ? ')) {

      // Bind parameters (s = string, i = int, b = blob, etc)
      $stmt->bind_param('si', $username, $pin);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows > 0) {
        $stmt->bind_result($adm_id, $password, $full_names);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {

          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['user_id'] = $username;
          $_SESSION['full_names'] = $full_names;


            if ($stmt = $db->prepare(
                "INSERT INTO admin_login_log_tbl 
                (adm_id, username, ip_address) 
                VALUES 
                (?, ?, ?)")
            ) {

              $stmt->bind_param("iss", $login_adm_id, $login_username, $login_ip_address);

              $login_adm_id = $adm_id;
              $login_username = $username;
              $login_ip_address = $_SERVER['REMOTE_ADDR'];
              
              $stmt->execute();
            }


          $message = 'Welcome '.$username.'! Successfully logged in. Redirections starts...';
          header("refresh:3;url=dashboard.php");

        } else {
          $message = "Login Unsuccessful! <br><b>Password</b> entered is incorrect. Please try again"; // throw error

        }

      } else {
        $message = "Login Unsuccessful! <br><b>Username and PIN </b> entered is incorrect. Please try again"; // throw error

      }
    }
   }
}

?>

<style>
body {
            background: #000 !important;
        }
        .card {
            border: 1px solid #821d10;
        }
        .card-login {
            margin-top: 130px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span{
            width: 50px;
            background-color: #ff0000;
            color: #fff;
            border:0 !important;
        }

        input:focus{
            outline: 0 0 0 0  !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn{
            width: 130px;
        }

        .login_btn:hover{
            color: #fff;
            background-color: #ff0000;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #28a745;
            background-image: none;
            border-color: #28a745;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #28a745;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #28a745;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0;
        }  

</style>


<div class="container">
    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="assets/img/comlogo.png" class="w-75" alt="Logo"> </span><br/><br>
                        <span class="logo_title mt-5">Communities Matter, Admin Page</span>

        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                    </div>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.+]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="pin" id="pin" class="form-control" placeholder="4 Number PIN" required>
                </div>                

                <div class="form-group">
                    <input type="submit" name="submit" id="submit" value="Login" class="btn btn-outline-danger float-right login_btn">
                </div>

                <p style="color: white">
                  Forgot your password? <br>Click here <a href="doResetAdminPassword.php"> to reset</a>
                </p>

            </form>
        </div>

        <center>
          <p style="color: white"><i><?php echo $message?></i></p>
        </center>

    </div>
</div>