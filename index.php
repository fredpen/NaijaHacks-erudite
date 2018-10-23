<?php
  require_once 'includes/header.php';

  $requestArray = $request->fetchRequests();
  if (isset($_GET['status'])) {
    $success = $_GET['status'];
  }else{
    $success = "";
  }
?>
<div class="spacer"></div>
 <?php if ($success) { ?>
        <div id="errorDiv" class='alert alert-info alert-dismissible col-sm-12' role='alert'>
        <div class="container">
        <div class="row">
        <div class="col-sm-10 col-md-offset-1">
           A sms and an email has been sent to notify the farmer of your interest.
           <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
           </button>
        </div>
        </div>
        </div>
        </div>
    <?php }; ?>


	<div class="container">
		<div class="row">
<div class="col-sm-12 topMargin8"></div>




	<?php

		foreach ($requestArray as $row) {
		$requestId = $row['id'];?>
			 <div class="col-md-4">
          <div class="card card-image" style="height: 505px" >
            <div class="card-avatar">
              <a href="#">
									<img class="img" src="assets/images/<?php echo $row['image'] ?>.jpeg">
								</a>
            </div>

            <div class="card-content">
              <h4 class="card-title">  <?php echo $row['firstName'] . " " . $row['lastname']. " farms"; ?></h4>
              <h6 class="category"> <?php echo $row['resources']?></h6>

              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
              <a class="btn btn-round btn-primary" href="request.php?id=<?php echo $requestId ?>">visit <?php echo $row["lastname"] . "'s farm"; ?></a>
            </div>
          </div>
        </div>





	  <?php };?>

  </div>
</div>

<!-- right section of the main container -->
<?php
require_once 'includes/footer.php';
?>
