<?php
  require_once 'includes/header.php';

  $requestArray = $request->fetchRequests();

?>
	<div class="container">
		<div class="row">
<div class="topMargin80></div>
	<?php 
	
		foreach ($requestArray as $row) {
		$requestId = $row['id'];?>
		
	 <div class="col-md-4">
					<!-- the quote  -->
					<div class="card">
            <div class="card-content">
              <h5 class="category-social">
									<i class="fa fa-newspaper-o"></i> TechCrunch
								</h5>
              <h4 class="card-title">
									<a href="#pablo">"Focus on Your Employees"</a>
								</h4>
              <p class="card-description">
                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
              </p>
              <div class="footer text-center">
                <a href="#pablo" class="btn btn-white btn-round">Read Article</a>
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
