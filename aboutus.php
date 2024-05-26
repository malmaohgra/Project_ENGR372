<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>An About Us Page</title>
  <link rel="stylesheet" href="style.css">
  
</head>

<style> 

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color: #2a3172;
  font-family: "Open Sans";
}

body > section > div > div > h1 {
  font-size: 4em !important;
}
body > section > div > img {
  width: 400px;
}

body {
  background: linear-gradient(90deg, #0d349b, #e99bc1);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

}

.about-us{
  height: 250vh;
  width: 100%;
  padding: 90px 0;
  margin-bottom: 500px;
}
.pic{
  width:  370px;
  height: 255px;
  margin-left: 10%;
  margin-top : 75%;
}
.text p {
  font-size: 1.5em;
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
h2 {
  text-align: center;
  margin-top: 140px;
}
h1, h2 {
  font-family: "Montserrat";
}
.text h2{
  font-size: 80px;
  font-weight: 600;
  margin-bottom: 180px;
  margin-right: 100px;
}
.text h5{
  font-size: 32px;
  font-weight: 500;
  margin-bottom: 90%;
  margin-right: 100px;
}
span{
  color: #4070f4;
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
    margin-bottom: 7080px;
    margin-left: 10%;
}

.pics {
    margin-bottom: 7080px;
    margin-left: 10%;
}

.text1 {
    margin-left: 20px;
    margin-bottom: 7080px;
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
  margin: 30px auto;
  align-items: center;
}
.wrap .item {
  padding: 0 0 0 50px;
}
.wrap img {
  margin: 0 50px;
}

body > section > section:nth-child(2) > div > img {
  min-width: 300px;
  height: 300px
}
body > section > section:nth-child(3) > div > img {
  width: 400px;
  height: 250px;
}
body > section > section:nth-child(4) > div > img {
  width: 500px;
  height: 350px;
}

.contacts {
  margin: 200px 0 0 0;
  border-top: 2px solid silver;
  border-bottom: 2px solid silver;
  text-align: center;
  background: #2a3172;
}
.contacts p {
  margin: 10px 0;
}
.contacts > * {
  color: #fff;
}



</style>

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
 
<section class="about-us">
    <div class="about">
      <img src="images/about.jpg" alt="about" />
      <div class="text">
        <h1>About Us</h1>
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
        <div class="item">
          <p><b>- Dancing:</b> Learn various styles of dance, from salsa to hip-hop, in a fun and supportive
            environment. No prior experience required!</p>
          <p><b>- Cooking:</b> Explore the culinary world with our cooking courses, where you'll learn essential
            techniques, recipes, and tips to impress your friends and family in the kitchen.</p>
          <p><b>- Art and Crafts:</b> Unleash your creativity with our art and crafts courses, covering everything from
            painting and drawing to pottery and jewelry making.</p>
        </div>
        <img style="width: 200px; height: auto;" src="images/hobbies.jpg" alt="img" />
      </div>
    </section>
    <section>
      <h2>Science Courses:</h2>
      <div class="wrap">
        <img src="images/science.jpg" alt="img" />
        <div class="item">
          <p><b>- Physics:</b> Dive into the fascinating world of physics, where you'll learn about the laws of motion,
            electricity, magnetism, and more through hands-on experiments and demonstrations.</p>
          <p><b>- Biology:</b> Explore the wonders of life with our biology courses, covering topics such as genetics,
            evolution, ecology, and anatomy, with a focus on real-world applications.</p>
          <p><b>- Chemistry:</b> Discover the magic of chemistry as you explore the properties of matter, chemical
            reactions, and the periodic table through engaging demonstrations and lab experiments.</p>
        </div>
      </div>
    </section>
    <section>
      <h2>IT Courses:</h2>
      <div class="wrap">
        <div class="item">
          <p><b>- Web Development:</b> Master the fundamentals of web development, including HTML, CSS, JavaScript, and
            responsive design, to create stunning and functional websites from scratch.</p>
          <p><b>- Programming:</b> Learn programming languages such as Python, Java, and C++, and gain the skills to
            develop software applications, games, and algorithms.</p>
          <p><b>- Data Science:</b> Dive into the world of data science, where you'll learn how to analyze and interpret
            data using statistical methods, machine learning algorithms, and data visualization tools to make informed
            decisions.</p>
        </div>
        <img src="images//it.jpg" alt="img" />
      </div>
    </section>
    <div class="contacts">
      <p>Mail: Info@bilgi.edu.tr </p>
      <p>Number: 444 0 428 </p>
      <a target="_blank" href="https://www.google.com/maps/place/Istanbul+Bilgi+University/@41.0677587,28.9441436,17z/data=!3m1!4b1!4m6!3m5!1s0x14cab0ce099c5d49:0x9f665fc172ad4624!8m2!3d41.0677587!4d28.9467185!16zL20vMDgxNXJ4?entry=ttu" style="margin: 0 0 15px 0 !important; display: block;">Adres: Emniyettepe, Kazım Karabekir Cd. No: 2/13, 34060 Eyüpsultan/İstanbul
      </a>
    </div>
  </section>
  
  

</body>

</html>
