<?php
    session_start();
    include("connection.php");
    $result = mysqli_query($dbCon,"SELECT * FROM order_ground");
    if(isset($_SESSION['email'])) {
        $dbEmail = $_SESSION['email'];
        $dbPassword = $_SESSION['password'];
        
    } else {
        header('Location: index.php');
        die();
    }

    if (isset($_POST['approve'])) {
        
        $ground_name = strip_tags($_POST['Gname']);
        //$userMail = strip_tags($_POST['Uemail']);
        $userMail = strip_tags($_POST['Uemail']);
         echo $ground_name;
        $sql = "UPDATE ground SET availability='1' WHERE ground_name='$ground_name';";

if (mysqli_query($dbCon, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($dbCon);
}





require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//$mail->SMTPDebug = 2;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fahiamim.hc@gmail.com';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('fahiamim.hc@gmail.com', 'Mailer');
$mail->addAddress($userMail, 'Joe User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Confirmation email';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}



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
              <li><a href="logout.php">Logout</a></li>
              
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

  <div id="userlist">

  <center><h3 class="info">Approve Ground Request</h3></center>

   <?php
    echo "<table class='table' border='1'>
    <tr>
    <th>Ground Name</th>
    <th>Address</th>
    
    <th>User Email</th>
    <th>Order Date</th>
    <th>Advance Amount</th>
    <th>Bkash Transaction ID</th>
    <th>Approval</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
            echo "<form method='post'>";
            echo "<tr class='userlistoutput'>";
            echo "<td ><input type='hidden' name='Gname'  value='".$row["ground_name"]."'>". $row['ground_name'] . "</td>";
            
            echo "<td >" . $row['address'] . "</td>";
            echo "<td ><input type='hidden' name='Uemail'  value='".$row["user_email"]."'>" . $row['user_email'] . "</td>";
            echo "<td >" . $row['order_date'] . "</td>";
            echo "<td >" . $row['advance_amount'] . "</td>";
            echo "<td >" . $row['tx_id'] . "</td>";
            
            
            echo "<td><button type='submit' name='approve' class='btn btn-success'> Approve </button></td>";
            echo "</tr>";
            echo "</form>";
   }
   echo "</table>";
   echo "</div>";
   mysqli_close ($dbCon);
?>

</div>
         
        
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow66.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>