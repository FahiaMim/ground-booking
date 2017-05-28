<?php
    session_start();

    if (isset($_POST['submit'])) {
        include("connection.php"); //connection.php
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        
        $sql = "SELECT id, email, password FROM users WHERE email = '$email' AND password = '$password'";


        
        $query = mysqli_query($dbCon, $sql); 
         if ($query) {
            $row = mysqli_fetch_row($query); 
            $userId = $row[0];
            $dbEmail = $row[1];
            $dbPassword = $row[2];
           
         }
        if ($email == 'admin@gmail.com' && $password == 'admin') {
          $_SESSION['email'] = admin;
            $_SESSION['password'] = admin;
            header('Location: admin_dashboard.php');
        }
        elseif ($email == $dbEmail && $password == $dbPassword) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $dbPassword;
            header('Location: user.php');
        }
        
         else {
            
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    if (isset($_POST['register'])) {
        include("connection.php"); //connection.php
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $confirm_password = strip_tags($_POST['confirm_password']);
        $agreement = strip_tags($_POST['agreement']);
        //echo $agreement;
       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO users (email, password, confirm_password, agreement) VALUES ('$email', '$password', '$confirm_password', '$agreement');";
     //INSERT INTO users (email, password, confirm_password, agreement) VALUES ("gbigv@gmail.com", "hhh", "hhh", "1")
    if (mysqli_query($dbCon, $sql)) {
        //echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbCon);
    }

       mysqli_close($dbCon);
   }
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>The Project</title>

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
          <li class="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search"> 
            </div>
          </li>
        </ul>
      </div>

  

  <!--Sign In register -->
  <section id="sign">
    <div class="container">
      
      <div class="row">

        <div class="col-md-5 col-md-offset-1 col-sm-3 col-md-offset-3 col-xs-12 signup-form">
          <h4 class="text-uppercase">Sign in</h4>
          <form method="post" >
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Your Password" name="password" required>
            </div>
            <div class="row sign-in">
                    <div class="col-md-6 col-sm-12 pull-left">
                        <button type="submit" name="submit" class="btn btn-default sign">
                             SIGN IN
                        </button>
                    </div>
                    <div class="col-md-6 col-sm-12 pull-right">
                        <a href="#" class="remember">
                            Forgot your password
                            <span class="glyphicon glyphicon-arrow-right"></span>
                        </a>
                    </div>
            </div>
          </form>
        </div>
          
          <div class="col-md-5 col-sm-2 col-xs-12 registration-form">
            <h4 class="text-uppercase">Register</h4>
            <form method="post">
              <div class="form-group">
                <input type="email" class="form-control" name ="email" placeholder="Your Email..">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Your Password..">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password..">
              </div>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="agreement" value="1">Sign up for exclusive updates, discounts, new arrivals, contests and more!
                </label>
            </div>
            <button type="submit" name ="register" class="btn btn-default create">
                    CREATE ACCOUNT
            </button>
            
            <div class="col-md-6 col-sm-12 pull-right">
              By clicking ‘Create Account’, you  agree to our <a href="#">Privacy Policy <span class="glyphicon glyphicon-arrow-right"></span></a>
            </div>
            <div id="notification "></div>
            </form>
        </div>
    </div>
  </div>
  </section>

  
    
  </section>

  <!--Footer-->
  <footer id="footer">
    <div class="container">
      <div class="row">
          <div class="col-lg-1"></div>
              <div class="col-lg-5 gauche pull-left">
                  <p class="copy"> &copy; Copyrights 2017 Fahia Nasnin <i class="fa fa-trademark"></i> </p>
              </div>

              <div class="col-lg-5 corps pull-right">
                  <p class="by">Design by Fahia Nasnin </p>
              </div>
          <div class="col-lg-1"></div>
      </div>
    </div>
  </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow66.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>