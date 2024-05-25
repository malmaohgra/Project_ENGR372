<?php
session_start();
//Connect with DB
$servername = "localhost";
$username = "root";
$password = "abcd";
$dbname = "group2";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Check
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
//Get Values
$name=$_POST['txt_name'];
$surename=$_POST['txt_surename'];
$email=$_POST['txt_email'];
$password=$_POST['pass1'];
$password_02=$_POST['pass2'];
$phone=$_POST['txt_phone'];


if ($password==$password_02){
    $sql = "INSERT INTO customers (name, surname, email, password, phone) VALUES ('$name', '$surename', '$email', '$password', '$phone');";
    if ($conn->query($sql) === TRUE) {
    header('Location: login.html');
  } 
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }  
}
else{
    echo "<br> <br> <br> <br> <br> <br> The password and password verification don't match, please try again";
}


 
// Close connection
mysqli_close($conn);


?>