<?php

      require_once 'includes/databaseConfig.php';
      require_once 'includes/classes/Constants.php';
      require_once 'includes/classes/Account.php';
      require_once 'includes/classes/Request.php';

      // // variables
      //  $userId;
      // $userDetails;


      $account = new Account($con);
      $request = new Request($con);


      require_once 'includes/navMenu.php';
      require_once 'includes/session.php';

      // confirming if thier is a logged in user and assign it to a variable to track it


      if ($userDetails) {
         $userId = $userDetails['id'];
      } else {
         $userId = '';
         }


     ?>

