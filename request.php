<?php
 if (isset($_GET['id'])) {
    $requestId = $_GET['id'];
  }else{
    header("location: index.php");
  }
      require_once 'includes/databaseConfig.php';
      require_once 'includes/classes/Account.php';
      require_once 'includes/classes/Request.php';

       $account = new Account($con);
      $request = new Request($con);


      require_once 'includes/session.php';

      // confirming if thier is a logged in user and assign it to a variable to track it
      if ($userDetails) {
         $userId = $userDetails['id'];
      } else {
         $userId = '';
         }
 

  $requestDetails = $request->fetchRequestDetails($requestId);

?>

<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   <link rel="icon" type="image/png" href="assets/images/home.png">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Naijahacks - Team Erudite</title>


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

  <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
 <!-- font awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
</head>

<body class="product-page">
  <nav class="navbar navbar-primary navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100">
      <div class="container">     
      <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
               <i class="fas fa-home"></i> Agriloan 
            </a>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <?php if ($userDetails) { ?>
               <li>
                  <a href="profilePage.php?id=<?php echo $userDetails['id']; ?>"><?php echo $userDetails['lastname']; ?>
                     <i class="fas fa-user-edit"></i>
                  </a>
               </li>
               <?php  }; ?>
               <li>
                  <a href="blog/home.php">
                     <i class="fas fa-newspaper"></i>  Investors 
                  </a>
               </li>
               <li>
                  <a href="authors.php">
                  <i class="fas fa-book-reader"></i> Farmers</a>
               </li>
               <li>
                  <a href="genre.php">About us</a>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fas fa-user"></i>
                     <b class="caret"></b>
                  </a>

                  <?php if ($userDetails) { ?>
                  <ul class="dropdown-menu">
                     <li>
                        <a href="request_resources.php?id=<?php echo $userId ?>">Request resources <i class="fab fa-joomla"></i></a>
                     </li>
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
                        <a href="request_resources.php">Request resources <i class="fab fa-joomla"></i></a>
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

  <div class="page-header header-filter" data-parallax="true" filter-color="green" style="background-image: url('assets/images/sprout.svg');">
      <div class="container">
          <div class="row title-row">
              <div class="col-md-4 col-md-offset-8">
          <button class="btn btn-round btn-rose pull-right"> <i class="far fa-eye"></i> 10 Investors have shown interest</button>
              </div>
          </div>
      </div>
  </div>

  <div class="section section-gray">
      <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-md-6 col-sm-6">

                       <div class="tab-content">
                            <div class="tab-pane" id="product-page1">
                                 <img src="assets/images/f2.jpeg"/>
                              </div>
                              <div class="tab-pane active" id="product-page2">
                                  <img src="assets/images/<?php echo $requestDetails['image']?>.jpeg"/>
                             </div>
                              <div class="tab-pane" id="product-page3">
                                  <img src="assets/images/f3.jpeg"/>
                              </div>
                              <div class="tab-pane" id="product-page4">
                                  <img src="assets/images/f4.jpeg"/>
                              </div>
                        </div>
                        <ul class="nav flexi-nav" role="tablist" id="flexiselDemo1">
              <li>


                <a href="#product-page1" role="tab" data-toggle="tab" aria-expanded="false">
                  <img src="assets/images/f2.jpeg"/>
                </a>
              </li>
              <li class="active">
                <a href="#product-page2" role="tab" data-toggle="tab" aria-expanded="false">
                  <img src="assets/images/<?php echo $requestDetails['image']?>.jpeg"/>
                  
                </a>
              </li>
              <li>
                <a href="#product-page3" role="tab" data-toggle="tab" aria-expanded="false">
                  <img src="assets/images/f3.jpeg"/>
                </a>
              </li>
              <li>
                <a href="#product-page4" role="tab" data-toggle="tab" aria-expanded="true">
                  <img src="assets/images/f4.jpeg"/>
                </a>
              </li>
                       </ul>
                    </div>


                    <div class="col-md-6 col-sm-6">
            <h2 class="title"> <?php echo $requestDetails['firstName'] . " " . $requestDetails['lastname']. " farms"; ?></h4>  </h2>
            <h3 class="main-price">Farm worth: #2,000,000</h3>
            
            <div id="acordeon">
            <div class="panel-group" id="accordion">
          <div class="panel panel-border panel-default">

            <div class="panel-heading" role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h4 class="panel-title">
                    Farm Products
                    <i class="material-icons">keyboard_arrow_down</i>
                    </h4>
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body">
               <p><?php echo $requestDetails['product']; ?></p>
              </div>
            </div>
          </div>


          <div class="panel panel-border panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-controls="collapseOne">
                    <h4 class="panel-title">
                    Farm location, age and size
                    <i class="material-icons">keyboard_arrow_down</i>
                    </h4>
                </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body">
               <p>location :<?php echo $requestDetails['location']; ?></p>
               <p>Age: <?php echo $requestDetails['age']; ?></p>
               <p>Size: <?php echo $requestDetails['size']; ?></p>
              </div>
            </div>
          </div>

          <div class="panel panel-border panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseOne">
                    <h4 class="panel-title">
                    Resources needed, duration and collateral
                    <i class="material-icons">keyboard_arrow_down</i>
                    </h4>
                </a>
            </div>
              <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
              <p>Collateral: <?php echo $requestDetails['collateral']; ?></p>
              <p>Duration: <?php echo $requestDetails['duration']; ?></p>
              <p>Resources: <?php echo $requestDetails['resources']; ?></p>
              </div>
            </div>
          </div>

          
           <div class="panel panel-border panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-controls="collapseOne">
                    <h4 class="panel-title">
                   Farmers Contact 
                    <i class="material-icons">keyboard_arrow_down</i>
                    </h4>
                </a>
            </div>
            <div id="collapsefive" class="panel-collapse collapse">
              <div class="panel-body">
              <p>Email: <?php echo $requestDetails['email']; ?></p>
              <p>Phone Number: <?php echo $requestDetails['contact']; ?></p>
              </div>
            </div>
          </div>

           

                  </div>
        </div><!--  end acordeon -->
<div class="row text-gray text-left">
     By clicking the button below you give your consent to share your interest with  <?php echo $requestDetails['firstName'] . " " . $requestDetails['lastname'] ?> on his farm
  </div>

  <div class="row text-center">
      <a href="sendMessage.php?id=<?php echo $requestDetails['contact']?>&mail=<?php echo $requestDetails['email'] ?> " name="submit" class="btn btn-rose btn-round">send a Message to <?php echo $requestDetails['firstName'] . " " . $requestDetails['lastname'] ?> with twillo
      <i class="material-icons">message</i></a>
  </div>


          
          </div>
      </div>
  </div>
  </div>
  </div>

           


<footer class="footer footer-black footer-big">
  <div class="container">

   

    <ul class="pull-left">
      <li>
        <a href="#pablo">
           Blog
        </a>
      </li>
      <li>
        <a href="#pablo">
          Presentation
        </a>
      </li>
      <li>
        <a href="#pablo">
           Discover
        </a>
      </li>
      <li>
        <a href="#pablo">
          Payment
        </a>
      </li>
      <li>
        <a href="#pablo">
          Contact Us
        </a>
      </li>
    </ul>

    <div class="copyright pull-right">
      Copyright &copy; <script>document.write(new Date().getFullYear())</script> Creative Tim All Rights Reserved.
    </div>
  </div>
</footer>

</body>

  <!--   Core JS Files   -->
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/material.min.js"></script>

  <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
  <script src="assets/js/moment.min.js"></script>

  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
  <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
  <script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
  <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

  <!--  Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
  <script src="assets/js/bootstrap-tagsinput.js"></script>

  <!--  Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
  <script src="assets/js/jasny-bootstrap.min.js"></script>

  <!--  Plugin for Product Gallery, full documentation here: https://9bitstudios.github.io/flexisel/ -->
  <script src="assets/js/jquery.flexisel.js"></script>

  <!--    Plugin For Google Maps   -->
  <script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
  <script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>

    <script type="text/javascript">

    $(document).ready(function() {
    $("#flexiselDemo1").flexisel({
      visibleItems: 4,
        itemsToScroll: 1,
        animationSpeed: 400,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 3
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
    });
   </script>


</html>
