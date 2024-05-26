<?php 
session_start();

if(!isset($_SESSION['logged'])){
    $_SESSION['logged'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Main page</title>   
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
    <?php
    if(isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
    echo '<a href="cartPage.php" style="margin-left: 7%; padding: 18px;">
            <img src="images/shopping-cart_03.png" alt="" width="30" style="margin-top: 0px;">
            My Shopping Cart
          </a>';
}
?>
</div> 

<div class="container">
<h1>Welcome!</h1>
<h3>MindSpark Academy offers a variety of online courses designed for you. We provide courses in IT and technology to help you get more skilled at your job, 
    as well as courses in science that are exciting and can help you learn more about science. 
    You may also enjoy hobbies like writing, cooking, dancing or crochet. </h3>
    <br>
<h2 style="text-align: center; color: #a759be;">Why MindSpark Academy? <h2>

<h3>Our experienced instructors support you in every aspect, 
ensuring that you develop real-world skills. With the help of our educators, 
you may learn at your own pace, whenever and wherever you choose, with the help of flexible study choices.
 Our affordable fees also guarantee that everyone has access to high-quality education.</h3>
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
                <img class="main-page-image" src="images/hobby_placeholder.png" width="240" >
                
            </td>
            <td>
                <img src="images/it_placeholder.png" alt="" width="240" class="main-page-image">
               
            </td>
            <td>
                <img src="images/science_placeholder.png" alt="" width="240" class="main-page-image">
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
        Melike Z. Tapcı, Resul Erdem Arduç, Ege Eylül Kırmızı, Maram Al-Maohgra, Nazrin Isayeva
    </small>
  </footer>

</body>
</html>
