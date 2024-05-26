<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <title>Document</title>   

    <style>
        .container_01 {
            max-width: 800px;
            margin: 0 auto; 
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        label, input, select, textarea {
            
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            
            font-size: large;
            
            text-align: center;
            color:white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: white;
        }
    </style>

    <script>
        function submit() {
            var fname = document.getElementById('fname').value;
            var email = document.getElementById('email').value;
            var subject = document.getElementById('subject').value;
            var message = document.getElementById('message').value;
            
            if (fname === "" || email === "" || subject === "" || message === "") {
                alert("Please fill all the fields!");
                window.location.href= "contact.php";
    
            } else {
                alert("Your message is sent successfully!");
            }
        }
    </script>
</head>

<body>

<div class="topnav">
        <a  href="index.php" >Home</a>
        <a href="all.php" >Courses</a>
        <a href="contact.html" class="active">Contact</a>
        <a href="aboutus.php">About Us</a>
        <a href="<?php 
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
            echo 'logout.php';
        } else {
            echo 'login.html';
        }
    ?>">
        <?php 
        if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
            echo 'Logout';
        } else {
            echo 'Login';
        }
        ?>
    </a>
        <a href="cartPage.php" style="margin-left: 7%;  padding: 18px ; " >
        <img src="images/shopping-cart_03.png" alt="" width="30" style="margin-top: 0px; ">
        My Shopping Cart </a>
</div> 
<div class="container">
<h1>Contact Us</h1>
<h3>Write a message you'd like us to receive from you.</h3>
<br>
<hr>
<div class="container_01" style="margin-top: 2%;">
    <form method="POST" action="send_message.php">
        <label for="fname">Full Name</label>
        <input type="text" id="fname" name="fullname" placeholder="Your full name">
  
        <label for="email">Email Address</label>
        <input type="text" id="email" name="email" placeholder="Your email address">
  
        <label for="subject">Subject</label>
        <select id="subject" name="subject">
            <option value="feedback">Feedback</option>
            <option value="complaint">Complaint</option>
            <option value="question">Question</option>
        </select>
  
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
  
        <input type="submit" value="Submit" style="background-color: #2a3172;" onclick="submit()" ?>
    </form>
</div>
</div>
<footer>
    <small>
      2024 Spring Semester - ENGR 372 - 
    </small>
    <small>
        Melike Z. Tapcı, Resul Erdem Arduç, Ege Eylül Kırmızı, Maram Al-Maohgra, Nazrin Isayeva
    </small>
  </footer>

</body>
</html>
