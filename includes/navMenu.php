<?php
   // redirecting function
   function redirect_to($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
   }
   // keeping track of users in session
   if (isset($_SESSION['email'])) {
   $email =  $_SESSION['email'];

   $userDetails = $account->userDetails($email);
   $firstName = $userDetails['lastname'];
   $userId = $userDetails['id'];

   $jsonfirstName = json_encode($firstName);
   }  else {
   $firstName = '';
   }

?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   <link rel="icon" type="image/png" href="assets/images/logo.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

   <title>Erudite</title>

   <!-- CSS Files -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
   <link href="assets/css/custom.css" rel="stylesheet"/>
   <link href="assets/css/grid.css" rel="stylesheet"/>
   
   <!-- jquery script -->
   <script src="assets/js/jquery.min.js" type="text/javascript"></script>

</head>

 <!-- navbar-color-on-scroll" color-on-scroll=" " -->
<body id="home" class="index-page">
   <nav class="navbar navbar-default navbar-primary navbar-fixed-top" id="sectionsNav">
      <div class="container">     
      <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
               
              <ul class="nav navbar-nav navbar-right">
               <?php if ($firstName) { ?>
               <li>
                  <a href="profilePage.php?id=<?php echo $userDetails['id']; ?>"><?php echo $userDetails['lastname']; ?>
                     <i class="fas fa-user-edit"></i>
                  </a>
               </li>
               <?php  }; ?>
                                        <li class="divider"></li>
                     <li>
                        <a href="logOut.php">Sign out 
                           <i class="fas fa-sign-out-alt"></i>
                        </a>
                     </li>
                     <li>
                        <a href="register.php?">Register <i class="fas fa-user-plus"></i></a>
                     </li>
                     <li>
                        <a href="signIn.php?">Log in <i class="fas fa-sign-in-alt"></i> </a>
                     </li>
                      <li>
                        <a href="index.php?">home</a>
                     </li>

                    
                  </ul>
              
           
         </div>
         
      </div>
   </nav>
