
<?php
    session_start();
    include("connection.php");
    $result = mysqli_query($dbCon,"SELECT * FROM ground");
    if(isset($_SESSION['email'])) {
        $dbEmail = $_SESSION['email'];
        $dbPassword = $_SESSION['password'];
        
    } else {
        header('Location: index.php');
        die();
    }

if (isset($_POST['request'])) {
        
        $ground_name = strip_tags($_POST['Gname']);
         $address = strip_tags($_POST['Oadd']);
         $user_email = $_SESSION['email'];
         $orderDate  = date('Y-m-d', strtotime($_POST['orderDate']));
         $advance_amount = strip_tags($_POST['Oamo']);
        $txid = strip_tags($_POST['txid']);
        //echo $agreement;
       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO order_ground (ground_name,address, user_email, order_date, advance_amount, tx_id) VALUES ('$ground_name','$address','$user_email', '$orderDate', '$advance_amount' ,'$txid');";
     
    if (mysqli_query($dbCon, $sql)) {
        //echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbCon);
    }

       //mysqli_close($dbCon);
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
    <!-- Animate -->
    <link href="css/animate.min.css" rel="stylesheet" >
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

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
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              
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
            <a href="#" >Reservation</span></a>
            
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

<div id="userlist">

  <center><h3 class="info">Book a Ground</h3></center>

  <center><h4>***After requesting a ground, check Email for Confirmation***</h4>

   <?php
    echo "<table class='table' border='1'>
    <tr>
    <th>Ground Name</th>
    <th>Address</th>
    <th>Price</th>
    <th>Advance Amount</th>
    <th>People Capacity</th>
    <th>Total Area</th>
    <th>Pick a Date</th>
    <th>Availability</th>
    <th>Bkash Transaction ID</th>
    <th>Request</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
            echo "<form method='post'>";
            echo "<tr class='userlistoutput'>";
            echo "<td ><input type='hidden' name='Gname'  value='".$row["ground_name"]."'> ". $row['ground_name'] . "</td>";
            
            echo "<td ><input type='hidden' name='Oadd'  value='".$row["address"]."'>" . $row['address'] . "</td>";
            echo "<td >" . $row['price'] . "</td>";
            echo "<td ><input type='hidden' name='Oamo'  value='".$row["advance_amount"]."'>" . $row['advance_amount'] . "</td>";
            echo "<td >" . $row['capacity'] . "</td>";
            echo "<td >" . $row['area'] . "</td>";
            echo "<td><input type='date' name='orderDate' class='form-control' id='orderDate' placeholder='which date'></td>";
            if ($row['availability']==0) {
              echo "<td >" .'Available' . "</td>";
            }
            else{
              echo "<td >" .'Not Available' . "</td>";
            }

            echo "<td><input type='text' name='txid' class='form-control' placeholder='TxID'></td>";
            echo "<td><button type='submit' name='request' class='btn btn-success'> Apply </button></td>";
            echo "</tr>";
            echo "</form>";
   }
   echo "</table>";
   echo "</div>";
   mysqli_close ($dbCon);
?>

</div>


 <!--Footer-->
  <footer id="footer">
    <div class="container">
      <div class="row">
          <div class="col-lg-1"></div>
              <div class="col-lg-5 gauche pull-left">
                  <p class="copy"> &copy; Copyrights 2017 Fahia Nasnin <i class="fa fa-trademark"></i> </p>
              </div>

              <div class="col-lg-5 corps pull-right">
                  <p class="by">Design by Fahia Nasnin</p>
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
    <script src="js/modernizr.js"></script>
  </body>
</html>