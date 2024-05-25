<?php
//Start session
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
$email=$_POST['txt_email'];
$password=$_POST['pass'];
$sql = "SELECT * FROM `customers` WHERE email='$email' and password='$password';";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count > 0){  
    $_SESSION['logged']=1;
    $_SESSION['user_email']=$email;

    //PLEASE CHANGE THIS TO MAIN PAGE CONTAINING THE LOGOUT
    header("Location: index.php");}  
else{  
    echo "<br> <br> <br> ","<h1> Login failed. Check your email or password.</h1>";  
}     
//Close connection 
mysqli_close($conn);

?>