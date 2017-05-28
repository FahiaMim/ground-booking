<?php
    session_start();

    if(isset($_SESSION['email'])) {
        $dbEmail = $_SESSION['email'];
        $dbPassword = $_SESSION['password'];
        
    } else {
        header('Location: index.php');
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>GROUND-Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Project Styling -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <!--top Navigation -->
  <header id="top-header"> 
    <nav class="navbar navbar-inverse">
      
      <div class="container top-nav">
    
      <div class="row">

        <div class="col-md-5 col-md-offset-1 col-sm-3 col-md-offset-3 col-xs-12">
          <ul class="currency">
              <li><a href="#">Welcome!!</li>
          </ul>
        </div>
  
        <div class="col-lg-1"></div>
        <div class="col-md-4 col-sm-3 col-xs-12">
          <ul class="addCart">
              <li><a href="signup.php">Register</a></li>
              <li><a href="signup.php">Sign In</a></li>
              
              
          </ul>
        </div>
      </div>
    </div>
  </header>

   <!-- start logo navigation -->
  <section  id="fashion">
    <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid slider">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3" >
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">GROUND BOOKING
        </a>
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php" >Home</a>
            
          </li>
          <li >
            <a href="reservation.php" >Reservation</span></a>
            
          </li>
          
          
          <li>
            <a href="lookbook.html" >Gallery</span></a>
            
          </li>
          <li>
            <a href="logout.php" >Logout</span></a>
            
          </li>
          
        </ul>
      </div>

  

         
         <h2 class="text-center">Welcome <strong><?php echo $dbEmail; ?></strong></h2>
         
        
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow66.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>