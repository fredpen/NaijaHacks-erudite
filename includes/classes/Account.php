<?php
   class Account {

      private $conc;
      public $errorArray;
      public $id;

      function __construct($con)  {
         $this->con = $con;
         $this->errorArray = array();
         $this->id;
      }


       // login user
      public function login($email, $password){
         $encryptedPassword = md5($password);

         $query = "SELECT * FROM users WHERE pwd='$encryptedPassword' AND email='$email' OR username='$email' AND pwd='$encryptedPassword'";
         $results = mysqli_query($this->con, $query);

         if (mysqli_num_rows($results) == 1) {
            return true;

         }else {
            array_push($this->errorArray, Constants::$loginFailed);
         }
      }


      // register users data
      public function register($firstName, $lastName, $email, $contact, $password, $category){
         $this->validateFirstname($firstName);
         $this->validateLastname($lastName);
         $this->validateContact($contact);
         $this->validateEmail($email);
         $this->validatePassword($password);

         if (empty($this->errorArray)) {
            return $this->insertUserDetails($firstName, $lastName, $email, $contact, $password, $category);
            } 
            return false;
      }

     

            // getting user insertUserDetails
         public function userDetails($email) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $query = mysqli_query($this->con, $sql);

            while ($row = mysqli_fetch_array($query)) {
              return $row;
            }
         }

      public function errorLog(){
         return $this->errorArray;
      }

   // insert user details into the database
   private function insertUserDetails($firstName, $lastName, $email, $password, $category){
      $encryptedPassword = md5($password);
      $date = date("Y-m-d h:i:s");

      $sql = "INSERT INTO users VALUES('$firstName','$lastName', '$email','$password','$category','$date','')"; 
      $query = mysqli_query($this->con, $sql);
      return $query;
   }

      // validate user's firstname
      private function validateFirstname($firstName)  {
         if (strlen($firstName) < 5 || strlen($firstName) > 25) {
            array_push($this->errorArray, Constants::$firstnameCharacter);
            return;
         }
      }


      // validate user's lastname
      private function validateLastname($lastName)  {
         if (strlen($lastName) < 2 || strlen($lastName) > 25) {
            array_push($this->errorArray, Constants::$lastnameCharacter);
            return;
         }
      }

      // validate conatct lastname
      private function validateContact($contact)  {
         if (strlen($contact) !== 11 ) {
            array_push($this->errorArray, Constants::$contactCharacter);
            return;
         }
      }


      // validate user's password
      private function validatePassword($password)  {
         if (strlen($password) < 5 || strlen($password) > 30) {
            array_push($this->errorArray, Constants::$passwordCharacter);
            return;
         } 
      }

      // validate emails
      private function validateEmail($email) {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         array_push($this->errorArray, Constants::$emailInvalid);
         return;
         }

         $query = mysqli_query($this->con, "SELECT * FROM users WHERE email ='$email'");
         if (mysqli_num_rows($query) > 0) {
            array_push($this->errorArray, Constants::$emailAlreadyExists);
            return;
         }

        
      }




} /**end of class */


 ?>
