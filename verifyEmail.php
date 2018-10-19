<?php   require_once 'includes/header.php';
        require_once 'includes/handlers/account_handler.php'; 

        echo "<div class='topMargin65'></div>";

   if (isset($_GET['tempPass'])) {
      $tempPass = $_GET['tempPass'];
     
      if ($url === $tempPass) { ?>
        echo $tempPass;
        <div class="col-sm-4"> your email has been cofirmed, click <a href="index.php">here</a> homepage</div>

      }else{ ?>

        <div class="col-sm-4"> confirm your email through the link we sent to your email address</div>
      
  <?php  } 
    }else{
        echo "<div> confirm your email through the link we sent to your email address</div>";
      }




require_once 'includes/footer.php'; ?>
