<?php
  require_once 'includes/header.php';

  if (isset($_GET['id'])) {
    $requestId = $_GET['id'];
    echo $requestId;
  }else{
    header("location: index.php");
  }

  $requestDetails = $request->fetchRequestDetails($requestId);

?>

  <div class="main-container">
    <div class="frow">

      <div class="quote-container spacer">
        <div class="rotating-card-container manual-flip">
        <div class="card card-rotate">
          <div class="front">
          <div class="card-content">
          
          <!-- the quote  -->
            <p class="card-title">
              <?php echo $requestDetails['resources']; ?>
            </p>
  
  
        </div>
        </div>
      </div>
      </div>
      </a>
    </div>
    
    



  </div>
</div>

<!-- right section of the main container -->
<?php
require_once 'includes/footer.php';
?>
