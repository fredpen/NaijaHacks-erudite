<?php

   ob_start();
   session_start();

   $timezone = date_default_timezone_set("Africa/Lagos");
   $dbServername = "localhost";
   $dbUsername ="root";
   $dbPassword = "123456";
   $dbName = "farmHub";

   $con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

   if (!$con) {
      echo "connection failed because of " . mysqli_connect_error();
   }


 ?>
