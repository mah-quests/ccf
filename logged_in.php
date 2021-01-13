<?php 
  include_once 'includes/header.php';
?>
<style>
#page{
    width:auto;
    height:490px;
    
}
</style>
    
    <section id=page>
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 align="center">
          Currently logged in
        </h1>

        <?php



          if ($stmt = $db->prepare('SELECT first_name, surname FROM agent_tbl WHERE cellnumber = ?')) {

            // Bind parameters (s = string, i = int, b = blob, etc)
            $stmt->bind_param('s', $_SESSION['name']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
              $stmt->bind_result($first_name, $surname);
              $stmt->fetch();
            }
          }


        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          $full_names = $first_name. ' ' .$surname;
        
        ?>


        <h5 align="center">
          <?php echo $full_names ?> is currently logged in! Do you wish to logout?
        </h5>        

        <?php
          }
        ?>
          <br><br>

        
          <div align="center">
            <a href="logout.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-palette-2-base u-none u-text-black u-text-hover-white u-btn-1">
              Yes, log out
            </a>

            <a href="index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-palette-4-base u-none u-text-black u-text-hover-white u-btn-1">
              No, stay logged in
            </a>          
          </div>
        


      </div>
      </section>
    
    
    
    
<?php 
  include_once 'includes/footer.php';
?>