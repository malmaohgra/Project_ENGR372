<?php
session_start();
//Connect with DB
$servername = "localhost";
$username = "root";
$password = "";
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

//Check if email is unique or not

$sql = "SELECT * FROM `customers` WHERE email='$email';";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count > 0){  
  
  echo '<script>alert("Email already exists, please login or try with a different email");</script>';
    echo '<script>window.location.href = "signup.html";</script>';
  }  
else{  

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
    
}     
 
// Close connection
mysqli_close($conn);


?>
