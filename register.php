<?php

      require_once 'includes/databaseConfig.php';
      require_once 'includes/classes/Constants.php';
      require_once 'includes/classes/Account.php';

      $account = new Account($con);

      require_once 'includes/handlers/account_handler.php';
      require_once 'includes/navMenu.php';
      require_once 'includes/session.php';

 
?>

	<div class="container">
  	<div class="row">
  		<div class="col-md-10 col-md-offset-1">
        <div class=" card card-signup topMargin65">
          
              <div class="col-md-6">

               
           
                <!-- the form container -->
                <form class="padding25 form" method="post" action="register.php">

            			<div class="form-group label-floating">
                    <?php echo errorGetter(Constants::$firstnameCharacter); ?>
            				<label for="name" class="control-label"></i>First Name</label>
            				<input type="text" class="form-control" name="firstName" aria-describedby="first name" required="required" value="<?php getInputValue('firstName'); ?>">
        			    </div>

            			<div class="form-group label-floating">
                    <?php echo errorGetter(Constants::$lastnameCharacter); ?>
            				<label for="name" class="control-label">Last Name</label>
            				<input type="text" class="form-control" name="lastName" aria-describedby="last name" required="required"  value="<?php getInputValue('lastName');?>">
            			</div>

            		
            			<div class="form-group label-floating">
                         <?php echo errorGetter(Constants::$emailInvalid);
            			        echo errorGetter(Constants::$emailAlreadyExists); ?>
            				<label for="email" class="control-label"></i>Email address</label>
            				<input type="email" class="form-control" name="email" aria-describedby="email" required value="<?php getInputValue('email');?>">
            				<small class="form-text text-muted">We'll never share your email with anyone else.</small>
            			</div>
                 
                  <div class="form-group label-floating">
                    <?php echo errorGetter(Constants::$contactCharacter);  ?>
                    <label for="contact" class="control-label"></i>Phone number</label>
                    <input type="text" class="form-control" name="contact" aria-describedby="contact" required value="<?php getInputValue('contact');?>">
                  </div>
                  

                  <div class="form-group">
                    <div class="text-muted">
                      <span>Categories</span>
                    </div>

                    <div class="genderSelection">
                      <div class="radio">
                        <label>Farmer
                          <input type="radio" name="category" value="farmer" checked="true">
                        </label>
                      </div>

                      <div class="radio">
                        <label>Investor
                          <input type="radio" name="category" value="investor">
                        </label>
                      </div>
                    </div>               
                  </div>

               		<div class="form-group label-floating">
                    <?php echo errorGetter(Constants::$passwordCharacter); ?>
               			 <label for="password" class="control-label">Password</label>
               			 <input type="password" name="password" class="form-control" required>
           		    </div>


                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="terms" >
                       Agree with out terms and condition
                    </label>
                  </div>

               		<div class="footer text-center">
                   	<button type="submit" name="registerButton" class="btn btn-primary btn-round btn-lg">let's get you Started
                    </button>
                  </div>              
                </form>
              </div> <!-- end of left column -->
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php require_once 'includes/footer.php' ?>
