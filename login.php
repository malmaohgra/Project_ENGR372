<?php

session_start();


include 'external.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$email=$_POST['txt_email'];
$password=$_POST['pass'];
$sql = "SELECT * FROM `customers` WHERE email='$email' and password='$password';";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count > 0){  
    $_SESSION['logged']=1;
    $_SESSION['user_email']=$email;

    
    header("Location: index.php");}  
else{  
    echo "<br> <br> <br> ","<h1> Login failed. Check your email or password.</h1>";  
}     
 
mysqli_close($conn);

?>