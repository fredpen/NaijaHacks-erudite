<?php
  require_once 'includes/header.php';
$rand1 = rand(10, 100);
           $randoString = $rand1 . $lastName;
           $randomString = md5($randoString);

           echo $randomString ."<br>" .  $randoString;

           $url = "verifyEmail.php?" . $randomString;
           echo $url;
require_once 'includes/footer.php';
?>
