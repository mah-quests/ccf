<!DOCTYPE html>
<?php
include("connect/connectDB.php"); // connection to db
error_reporting(0);
session_start();


if(isset($_POST['submit'] )) //if submit btn is pressed
{

    //cheching cellphone number is already registered
  $check_celphone = mysqli_query($db, "SELECT cellnumber FROM agent_tbl where cellnumber = '".$_POST['cellnumber']."' ");
    
	if(mysqli_num_rows($check_celphone) > 0)  //check username
     {
      	header("refresh:5;url=login.php");

     } else {
        header("refresh:5;url=start_registration.php");

  }
}

?>

<style>
  #cellnumber:valid {
    color: green;
  }
  
  #cellnumber:invalid {
    color: red;
  }
</style>



    <div class="u-clearfix u-sheet u-sheet-1">      
      <div class="u-form u-form-1">
        <div align="center">
            <span style="font-size: 30px">Validate Cellphone Number</span>
          <br><br><br>
        </div>

    <form name="validationForm" action="" method="post">

      <div class="row">
        
        <div class="col-sm-12">
          <div class="u-form-email u-form-group u-form-partition-factor-2 u-form-group-1">
            <label for="cellnumber">Cellphone Number</label>
              <input class="u-grey-5 u-input u-input-rectangle" 
                    class="form-control" 
                    type="tel"  
                    placeholder="Please enter your valid cellphone number, eg: +27825561420"  
                    name="cellnumber" 
                    id="cellnumber" 
                    value="+27" 
                    oninput="this.value = this.value.replace(/[^0-9.+]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" 
                    pattern="[0-9+]{12}"
                    required>
          </div>          
        </div> 

          <div class="col-sm-12" align="center">
            <p> 
              <input type="submit" value="Validate Number" name="submit" class="btn btn-danger" style="font-size: 20px"> 
            </p>
          </div>

        </div>
    </form>


      </div>
    </div>

</html>