<?php
   if (isset($_POST['register'])) {
        include("connection.php"); //connection.php
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $confirm_password = strip_tags($_POST['confirm_password']);
        $agreement = strip_tags($_POST['agreement']);
       //shoudl do validation on passwords before submitting form
    $sql = "INSERT INTO users (email, password, confirm_password, agreement) VALUES ('$username', '$password', '$confirm_password', '$agreement')";
     
    if (mysqli_query($dbCon, $sql)) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbCon);
    }

       mysqli_close($dbCon);
   }
?>

