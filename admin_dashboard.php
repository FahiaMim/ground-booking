<?php
    session_start();
    
    if(isset($_SESSION['email'])) {
        $dbEmail = $_SESSION['email'];
        $dbPassword = $_SESSION['password'];
        
    } else {
        header('Location: index.php');
        die();
    }

     if (isset($_POST['add'])) {
        include("connection.php"); //connection.php
        $ground_name = strip_tags($_POST['ground_name']);
        $address = strip_tags($_POST['address']);
        $price= strip_tags($_POST['price']);
        $advance_amount = strip_tags($_POST['advance_amount']);
        $capacity = strip_tags($_POST['capacity']);
        $area = strip_tags($_POST['area']);
        
        //echo $agreement;
       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO ground (ground_name, address, price, advance_amount, capacity, area) VALUES ('$ground_name', '$address', '$price', '$advance_amount', '$capacity', '$area');";
     //INSERT INTO users (email, password, confirm_password, agreement) VALUES ("gbigv@gmail.com", "hhh", "hhh", "1")
    if (mysqli_query($dbCon, $sql)) {
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbCon);
    }

       mysqli_close($dbCon);
   }

   if (isset($_POST['map'])) {
        include("connection.php"); //connection.php
        $ground_name = strip_tags($_POST['ground_name']);
        $address = strip_tags($_POST['address']);
        $latitude= strip_tags($_POST['latitude']);
        $longitude = strip_tags($_POST['longitude']);
        $type = strip_tags($_POST['type']);
        
        //echo $agreement;
       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO map (ground_name, address, latitude, longitude, type) VALUES ('$ground_name', '$address', '$latitude', '$longitude', '$type');";
     
    if (mysqli_query($dbCon, $sql)) {
        
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
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">GROUND BOOKING</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li ><a href="approval.php">Approve Requests</a></li>
      <li><a href="#">Map</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Registration</a></li>
      <li><a href="signup.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  <h2 class="text-center">Welcome <strong><?php echo $dbEmail; ?></strong></h2>
    <div class="row">
      <div class="col-md-4">
        <h3>ADD a Ground</h3>
        <form method="post" >
        <div class="form-group">
            <label for="usr">Ground Name</label>
            <input type="text" class="form-control" name="ground_name" >
        </div>
        <div class="form-group">
            <label for="usr">Ground Address</label>
            <input type="text" class="form-control" name="address" >
        </div>
        <div class="form-group">
            <label for="usr">Price</label>
            <input type="number" class="form-control" name="price" >
        </div>
        <div class="form-group">
            <label for="usr">Advance Amount</label>
            <input type="number" class="form-control" name="advance_amount" >
        </div>
        <div class="form-group">
            <label for="usr">People Capacity</label>
            <input type="number" class="form-control" name="capacity" >
        </div>
        <div class="form-group">
            <label for="usr">Area</label>
            <input type="text" class="form-control" name="area" >
        </div>
        
        <button type="submit" name="add" class="btn btn-success">Add</button>
      </div>
    </form>
    <form method="post">
      <div class="col-md-4">
        <h3>Map Setting</h3>
        <div class="form-group">
            <label for="usr">Ground Name</label>
            <input type="text" class="form-control" name="ground_name" >
        </div>
        <div class="form-group">
            <label for="usr">Ground Address</label>
            <input type="text" class="form-control" name="address" >
        </div>
        <div class="form-group">
            <label for="usr">Latitude</label>
            <input type="text" class="form-control" name="latitude" >
        </div>
        <div class="form-group">
            <label for="usr">Longitude</label>
            <input type="text" class="form-control" name="longitude" >
        </div>
        <div class="form-group">
            <label for="usr">Type</label>
            <input type="text" class="form-control" name="type" >
        </div>
        <button type="submit" name="map" class="btn btn-success">Add</button>
      </div>
      </form>
      <div class="col-md-4">
        <h3>**<a href="approval.php">Approve Pending Request</a>**</h3>
        
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow66.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>