<?php
  $errorArray = array();
   // getting error
   function errorGetter($error)  {
      global $errorArray;
     if (in_array($error, $errorArray)) {
       echo "<div class='errorMessage'>$error</div>";
     }
   }

   // getting form values
   function getInputValue ($name) {
     if (isset($_POST[$name])) {
       echo $_POST[$name];
     }
   }


// sanitize inputs--remove tags and empty spaces
   function sanitiseStrings($strings) {
      $strings = strip_tags($strings);
      $strings = str_replace(" ", "", $strings);
      return $strings;
   }

   // sanitise passwords
   function sanitisePasswords($password)  {
      $password = strip_tags($password);
      return $password;
   }

   // sanitise the username
   function sanitiseUsername($username)  {
      $username = strip_tags($username);
      $username = str_replace(" ", "", $username);
      $username = ucfirst(strtolower($username));
      return $username;
   }

   if (isset($_POST['registerButton'])) {

      // sanitize all inputs on clicking register
      $firstName = sanitiseUsername($_POST['firstName']);
      $lastName = sanitiseUsername($_POST['lastName']);
      $email = sanitiseStrings($_POST['email']);
      $password = sanitisePasswords($_POST['password']);
      $category = $_POST['category'];
      $contact = $_POST['contact'];

      $registerUser = $account->register($firstName, $lastName, $email, $password, $category, $contact);

      // check the logs for error from validating inputs
      $errorArray = $account->errorLog();

      // check if the registration is succesful and redirects to home
      if ($registerUser) {
         $_SESSION['email'] = $email;
        header("Location: index.php");
       }

   }

// ----------------------------handling log in---------------------------

    if (isset($_POST['loginButton'])) {

      $email = sanitiseStrings($_POST['loginEmail']);
      $password = sanitisePasswords($_POST['loginPassword']);

      $loginUser = $account->login($email, $password);

      // check the logs for error from validating inputs
      $errorArray = $account->errorLog();

      if ($loginUser) {
         $_SESSION['email'] = $email;
         header("Location: index.php");

      }
      $loginFailed = true;
   }


 ?>
