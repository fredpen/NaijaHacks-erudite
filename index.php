<?php
  require_once 'includes/header.php';

  $requestArray = $request->fetchRequests();

?>
	<div class="main-container">
		<div class="frow">

	<?php 
	
		foreach ($requestArray as $row) {
		$requestId = $row['id'];?>
		

			<div class="quote-container">
			  <div class="rotating-card-container manual-flip">
				<div class="card card-rotate">
				  <div class="front">
					<div class="card-content">
					
					<!-- the quote  -->
					  <p class="card-title">
							<?php echo $row['content']; ?>
					  </p>
	
					<!-- the quote genre -->
					  <p class="card-description">
						<div class="genreList">
						  <span class="label label-primary">
							<a class="genre" href='genre.php?genre=<?php echo $row['genre1'] ?>'><?php echo $row['genre1']; ?></a>
						  </span>
						  <span class="label label-info">
							<a class="genre" href='genre.php?genre=<?php echo $row['genre2'] ?>'><?php echo $row['genre2']; ?></a>
						  </span>
						  <span class="label label-default">
							<a class="genre" href='genre.php?genre=<?php echo $row['genre3'] ?>'><?php echo $row['genre3']; ?></a>
						  </span>
						</div>

					<footer class="quote-footer">
					 
						   
					</footer>
					<!-- quotes author and image -->
					<div class="footnote">
					  <div class="author">
						


				</div>
			  </div>
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
