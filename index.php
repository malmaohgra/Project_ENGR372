<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>   
</head>

<body>

<div class="topnav">
        <a  href="index.php" class="active">Home</a>
        <a href="all.php" >Courses</a>
        <a href="contact.php">Contact</a>
        <a href="aboutus.php">About Us</a>
        <a href=
        <?php 
        if ($_SESSION['logged']==1){
           echo "logout.php";
        }
        else{
            echo "login.html";
        }
        ?>
        >
        <?php 
        if ($_SESSION['logged']==1){
           echo "Logout";
        }
        else{
            echo "Login";
        }
        ?>
    </a>
        <a href="cartPage.php" style="margin-left: 7%;  padding: 18px ; " >
        <img src="images/shopping-cart_03.png" alt="" width="30" style="margin-top: 0px; ">
        My Shopping Cart </a>
</div> 

<div class="container">
<h1>Welcome!</h1>
<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, repellat?
Pariatur obcaecati rerum corporis facere harum deserunt nesciunt rem id.
Reprehenderit iste nesciunt quia totam distinctio corporis deserunt possimus tempore!
Itaque nesciunt qui repudiandae obcaecati animi atque! Repellat, debitis recusandae.
Eos veritatis architecto odit rem dolor. Facilis numquam voluptatibus earum.</h3>
<br>
<hr>

<table>
    <thead>

    </thead>
    <tbody>
       
        <tr>
            
            <td style="color: #a759be;">
                <h2>Courses for Hobbies</h2>
            </td>
            <td style="color: #a759be;">
                <h2>IT Courses</h2>
            </td>
            <td style="color: #a759be;">
                <h2>Science Courses</h2>
            </td>
        </tr>

        <tr>
            <td>
                <img src="images/hobby_placeholder.png" width="240">
                
            </td>
            <td>
                <img src="images/it_placeholder.png" alt="" width="240">
               
            </td>
            <td>
                <img src="images/science_placeholder.png" alt="" width="240">
            </td>
        </tr>
        <tr>
            <td>
              <a href="hobbies.php"> <input class="input-button" type="button" value="View the courses"> </a> 
            </td>
            <td>
               <a href="it.php"> <input class="input-button" type="button" value="View the courses"> </a>
            </td>
            <td>
                <a href="science.php"> <input class="input-button" type="button" value="View the courses"> </a> 
            </td>
        </tr>
</table>
</div>
<footer>
    <small>
      2024 Spring Semester - ENGR 372 - 
    </small>
    <small>
        Melike Z. Tapcı, Resul Erdem Arduç, Ege Eylül Kırmızı, Maram Al-Maohgra
    </small>
  </footer>

</body>
</html>