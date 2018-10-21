<?php
  require_once 'includes/header.php';

  $requestArray = $request->fetchRequests();

?>
	<div class="main-container">
		<div class="frow">

	<?php 
	
		foreach ($requestArray as $row) {
		$requestId = $row['id'];?>
		
	
			<div class="quote-container spacer">
				<a href="request.php?id=<?php echo $requestId ?> ">
			  <div class="rotating-card-container manual-flip">
				<div class="card card-rotate">
				  <div class="front">
					<div class="card-content">
					
					<!-- the quote  -->
					  <p class="card-title">
							<?php echo $row['resources']; ?>
					  </p>
	
	
				</div>
			  </div>
			</div>
		  </div>
		  </a>
		</div>
		
		


	  <?php };?>

  </div>
</div>

<!-- right section of the main container -->
<?php
require_once 'includes/footer.php';
?>
