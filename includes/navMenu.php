<?php

   // keeping track of users in session
   if (isset($_SESSION['email'])) {
   $email =  $_SESSION['email'];

   $userDetails = $account->userDetails($email);
   $firstName = $userDetails['lastname'];
   $userId = $userDetails['id'];

   }else{
    $userDetails = "";
   }

?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   <link rel="icon" type="image/png" href="assets/images/home.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Naijahacks - Team Erudite</title>

  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />


   <!-- CSS Files -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
   <link href="assets/css/custom.css" rel="stylesheet"/>
   <link href="assets/css/grid.css" rel="stylesheet"/>
   
    <!-- font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
            <a class="navbar-brand" href="index.html">
               <i class="fas fa-home"></i> Agriloan 
            </a>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <?php if ($userDetails) { ?>
               <li>
                  <a href="#>"><?php echo $userDetails['lastname']; ?>
                     <i class="fas fa-user-edit"></i>
                  </a>
               </li>
               <?php  }; ?>
               <li>
                  <a href="investor.php">
                     <i class="fas fa-newspaper"></i>  Investors 
                  </a>
               </li>
               <li>
                  <a href="index.php">
                  <i class="fas fa-book-reader"></i> Farmers</a>
               </li>
               <li>
                  <a href="request_resources.php?id=<?php echo $userId ?>">Request resources <i class="fab fa-joomla"></i></a>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fas fa-user"></i>
                     <b class="caret"></b>
                  </a>

                  <?php if ($userDetails) { ?>
                  <ul class="dropdown-menu">
                      <li>
                        <a href="invest_resources.php">Invest resources <i class="fab fa-joomla"></i></a>
                     </li>
                     <li class="divider"></li>
                     <li>
                        <a href="logOut.php">Sign out 
                           <i class="fas fa-sign-out-alt"></i>
                        </a>
                     </li>
                  </ul>

                  <?php  } else { ?>
                  <ul class="dropdown-menu dropdown-with-icons">
                     <li>
                        <a href="register.php?">Register <i class="fas fa-user-plus"></i></a>
                     </li>
                     <li>
                        <a href="signIn.php?">Log in <i class="fas fa-sign-in-alt"></i> </a>
                     </li>
                    
                      <li>
                        <a href="invest_resources.php">Invest resources <i class="fab fa-joomla"></i></a>
                     </li>
                  </ul>
                  <?php  }; ?>
               </li>
            </ul>
         </div>
      </div>
   </nav> 
