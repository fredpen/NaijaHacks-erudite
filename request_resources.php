<?php
   require_once 'includes/header.php';

    if (isset($_GET['id'])) {
      $userId = $_GET['id'];
    }
 
   // $newUser = false;
   // $quoteSuccessful = false;
   // $uploadFailure = false;
   $errorMessages = array();
   $errors = [
      $loginError = "<strong>Holy guacamole!</strong> You need to log in first. You can do that <a href='signIn.php'>here</a>",
      $serverError = "<strong>Holy guacamole!</strong> Sorry cant request for help at the moment",
      $successMessage = "<strong>Your request has been successfully uploaded! We will get back to you the moment there is an interested investor</strong>",
      $fieldError = "<strong>oops!</strong> sorry but it seems you left one or two field(s) empty",
   ];

  function checkError($errorMessages, $errors)  {
    // check if there is an error
    if (count($errorMessages) > 0) {
      foreach ($errorMessages as $errorMessage) {
        foreach ($errors as $error) {
          if ($errorMessage == $error) {
            return $error;
          }
        }
      }
    }
    return; 
  }



  if (isset($_POST['submit'])) {
    // check if there is a logged in user
    if ($userDetails) {
      // check if all the needed boxes are filled
      if (isset($_POST['purpose']) && isset($_POST['age']) && isset($_POST['duration']) && isset($_POST['collateral']) && isset($_POST['location']) && isset($_POST['size']) && isset($_POST['product']) ) {

        // store all fields into variables
        $purpose = $request->sanitiseRequest($_POST['purpose']);
        $age =     $_POST['age'];
        $duration = $_POST['duration'];
        $collateral = $request->sanitiseRequest($_POST['collateral']);
        $location = $request->sanitiseRequest($_POST['location']);
        $size = $request->sanitiseRequest($_POST['size']);
        $product = $request->sanitiseRequest($_POST['product']);
    

        $uploadRequest = $request->uploadRequest($purpose, $age,$duration, $collateral, $location, $size, $product, $userId);
        // if quotes already exists
        if (!$uploadRequest) {
          array_push($errorMessages, $serverError);
        // if quote is successfully uploaded
        } else {
          array_push($errorMessages, $successMessage);
         // if quote fail to upload relating to database
        } 

         // if there is no logged in user
        } else {
          array_push($errorMessages, $fieldError);
        }
      // if there is no logged in user
      }else {
        array_push($errorMessages, $loginError);
      }
    }


    $theError = checkError($errorMessages, $errors);
 ?>
      <div class="spacer"></div>


   <?php if ($theError) { ?>
        <div id="errorDiv" class='alert alert-info alert-dismissible col-sm-12' role='alert'>
        <div class="container">
        <div class="row">
        <div class="col-sm-10 col-md-offset-1">
           <?php echo $theError; ?>
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
          <div class="col-md-10 col-md-offset-1">

         

          <div class="card card-signup">
            <h2 class="card-title text-center">Resources request form</h2>
            <h6 class="text-center">All fields must be filled, Incomplete application will not be processed</h6>
            <p class="text-center">be descriptive a much as possible</p>
        <div class="social text-center">
              <h4> share word on </h4>
                <button class="btn btn-just-icon btn-round btn-twitter">
                    <i class="fa fa-twitter"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </button>
                <button class="btn btn-just-icon btn-round btn-facebook">
                    <i class="fa fa-facebook"> </i>
                </button>
            </div>


        <div class="row">
      <form class="form" method="POST" action="request_resources.php">

        <div class="col-sm-10 col-md-offset-1">
        <div class="form-group label-floating">
        <label class="control-label quote">State the resouces you need e.g 2 hectares of land, 20 bags of fertilizer </label>
        <textarea class="form-control" name="purpose" rows="1"></textarea>
        <span class="material-input"></span>
       </div>
      </div>


       <div class="col-sm-10 col-md-offset-1">
       
       <div class="col-sm-5">
        <select class="selectpicker" name="age" data-style="select-with-transition" title="Age of Farm" data-size="7">
          <option disabled>How old is your farm</option>
          <option value="less than a year">Less than a year </option>
          <option value="More than two (2) years">More than two(2) years</option>
          <option value="More than five (5) years">More than five (5) years</option>
          <option value="More than ten (10) years">More than ten (10) years</option>
        </select>
      </div>

      
        <div class="col-sm-2"></div>

       <div class="col-sm-5">
      <select class="selectpicker" name="duration" data-style="select-with-transition" title="Duration of Loan or resources" data-size="7">
        <option disabled>How long you want the loan for </option>
        <option value="6">6 Months </option>
        <option value="9">9 Months</option>
        <option value="12">a year</option>
        <option value="24">2 years</option>
        <option value="36">3 years</option>
        <option value="48">4 years</option>
      </select>
    </div>

    </div>

       <div class="col-sm-10 col-md-offset-1">
        <div class="form-group label-floating">
        <label class="control-label quote">Describe the collateral you have e.g house, land, forex</label>
        <textarea class="form-control" name="collateral" rows="1"></textarea>
        <span class="material-input"></span>
       </div>
      </div>

        
        <div class="col-sm-10 col-md-offset-1">
        <div class="form-group label-floating">
        <label class="control-label quote">Describe the location of your farm</label>
        <textarea class="form-control" name="location" rows="1"></textarea>
        <span class="material-input"></span>
       </div>
      </div>

      <div class="col-sm-10 col-md-offset-1">
        <div class="form-group label-floating">
        <label class="control-label quote">Size of the farm e.g 2 hectares of cocoa plantation, 1000 birds on a plot of land</label>
        <textarea class="form-control" name="size" rows="1"></textarea>
        <span class="material-input"></span>
       </div>
      </div>

       <div class="col-sm-10 col-md-offset-1">
        <div class="form-group label-floating">
        <label class="control-label quote">State your farm product(s) e.g Cassava plantation, Poultry, Eggs</label>
        <textarea class="form-control" name="product" rows="1"></textarea>
        <span class="material-input"></span>
       </div>
      </div>
      
     

    <div class="footer text-center">
       <div class="checkbox">
        <label>
          <input type="checkbox" name="agree" checked>
          I agree to the <a href="#something">terms and conditions</a>.
        </label>
      </div>
      </div>

      <div class="footer text-center">
       <button type="submit" name="submit" class="btn btn-primary btn-round">Get Started</button>
      </div>

      </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>


     
<?php require_once 'includes/footer.php';



?>
