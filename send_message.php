<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "group2";

  
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];



    if (empty($fullname) || empty($email) || empty($subject) || empty($message)) {
        echo "<script type='text/javascript'>
                alert('Please fill all the fields!');
                window.location.href = 'contact.php';
              </script>";
        exit();
    }

    
    $sql = "INSERT INTO `messages` (`fullname`, `email`, `subject`, `message`) VALUES ('$fullname', '$email', '$subject', '$message');";

    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'> 
                alert('Your message has been sent successfully!'); 
                window.location.href = 'contact.php';
            </script>"; 
        
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
   
    header("Location: contact.php");
    exit;
}
?>






