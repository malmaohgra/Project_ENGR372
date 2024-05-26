<?php 
session_start();


if(!$_SESSION['logged']){
  $_SESSION['logged'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>An About Us Page</title>
  <link rel="stylesheet" href="style.css">
  <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body > section > div > div > h1 {
  font-size: 4em !important;
}
body > section > div > img {
  width: 400px;
}

.about-us{
  
  width: 100%;
  padding: 90px 0;
  margin-bottom: 50px;
}
.pic{
  width:  500px;
  height: 255px;
  margin-left: 10%;
  margin-top : 75%;
}
.about{
  width: 1130px;
  max-width: 85%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-around;
  margin-bottom: 150px;
  
}
.text{
  width: 540px;
  margin-bottom: 20px;
}
.text h2{
  font-size: 80px;
  font-weight: 600;
  margin-bottom: 80px;
  margin-right: 100px;
  

}
.text h5{
  font-size: 32px;
  font-weight: 500;
  margin-bottom: 90%;
  margin-right: 100px;
}


.data{
  margin-top: 30px;
}
.hire{
  font-size: 18px;
  background: #4070f4;
  color: #ddd;
  text-decoration: none;
  border: none;
  padding: 8px 25px;
  border-radius: 6px;
  transition: 0.5s;
}
.hire:hover{
  background: #000;
  border: 1px solid #4070f4;
}

.pica {
    margin-bottom: 180px;
    margin-left: 10%;
}

.pics {
    margin-bottom: 180px;
    margin-left: 10%;
}

.text1 {
    margin-left: 20px;
    margin-bottom: 180px;
}

.text2 { 
    margin-bottom: 7080px;
    margin-left: 20px;


}
.about-uss{
    height: 250vh;
    width: 100%;
    padding: 90px 0;
    background: #ddd;
  }

.about-usa {
    
  height: 250vh;
    width: 100%;
        padding: 90px 0;
        background: #ddd;
}

.about-uss1 {
    width: 1130px;
    max-width: 85%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-bottom: 150px;

}
.about-usa1{
    width: 1130px;
    max-width: 85%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-bottom: 150px;
}

section {
  padding: 0 40px;
}
.wrap {
  display: flex;
  width: 1200px;
  padding: 0 100px;
  right: 0;
  margin: 30px 0;
}
.wrap .item {
  padding: 0 0 0 50px;
}
.wrap img {
  width: 300px;
  height: 200px;
}

.contacts {
  margin: 200px 0 0 0;
  text-align: center;
}
.contacts p {
  margin: 10px 0;
}
  </style>
  
</head>

<body>
<div class="topnav">
        <a  href="index.php" >Home</a>
        <a href="all.php" >Courses</a>
        <a href="contact.php">Contact</a>
        <a href="aboutus.php" class="active">About Us</a>
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
  <section class="about-us">
    <div class="about">
      <img src="images/about.jpg" alt="about" height="500"/>
      <div class="text">
        <h1>About Us</h1>
        <br>
        <p>Welcome to our Group 2 company!
          Here at Group 2, we're dedicated to igniting your curiosity and fueling your
          passion for learning. Our platform offers a diverse range of courses designed to inspire, educate, and empower
          learners of all backgrounds. From hobbies like cooking, dancing, art, and crafts to science and IT courses, we
          cater to a wide variety of interests. Join us as we embark on a journey of knowledge discovery and personal
          growth together.</p>
      </div>
    </div>

    <section>
      <h2>Hobby Courses:</h2>
      <div class="wrap">
        <img src="images/hobbies.jpg" alt="img" height="200"/>
        <div class="item">
          <p><b>- Dancing:</b> Learn various styles of dance, from salsa to hip-hop, in a fun and supportive
            environment. No prior experience required!</p>
            <br>
          <p><b>- Cooking:</b> Explore the culinary world with our cooking courses, where you'll learn essential
            techniques, recipes, and tips to impress your friends and family in the kitchen.</p>
            <br>
          <p><b>- Art and Crafts:</b> Unleash your creativity with our art and crafts courses, covering everything from
            painting and drawing to pottery and jewelry making.</p>
        </div>
      </div>
    </section>
    <section>
      <h2>Science Courses:</h2>
      <div class="wrap">
        <div class="item">
          <p><b>- Physics:</b> Dive into the fascinating world of physics, where you'll learn about the laws of motion,
            electricity, magnetism, and more through hands-on experiments and demonstrations.</p>
            <br>
          <p><b>- Biology:</b> Explore the wonders of life with our biology courses, covering topics such as genetics,
            evolution, ecology, and anatomy, with a focus on real-world applications.</p>
            <br>
          <p><b>- Chemistry:</b> Discover the magic of chemistry as you explore the properties of matter, chemical
            reactions, and the periodic table through engaging demonstrations and lab experiments.</p>
        </div>
        <img src="images/science.jpg" alt="img" height="200"/>
      </div>
    </section>
    <section>
      <h2>IT Courses:</h2>
      <div class="wrap">
        <img src="images/it.jpg" alt="img" height="200" />
        <div class="item">
          <p><b>- Web Development:</b> Master the fundamentals of web development, including HTML, CSS, JavaScript, and
            responsive design, to create stunning and functional websites from scratch.</p>
            <br>
          <p><b>- Programming:</b> Learn programming languages such as Python, Java, and C++, and gain the skills to
            develop software applications, games, and algorithms.</p>
            <br>
          <p><b>- Data Science:</b> Dive into the world of data science, where you'll learn how to analyze and interpret
            data using statistical methods, machine learning algorithms, and data visualization tools to make informed
            decisions.</p>
        </div>
      </div>
    
      <div class="contacts">
        <p>Mail: Info@bilgi.edu.tr </p>
        <p>Number: 444 0 428 </p>
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