<?php
session_start();
include 'external.php';

$mysqli = new mysqli($servername, $username,
                $password, $dbname);
 

if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 

$sql = " SELECT * FROM product ORDER BY price";
$result = $mysqli->query($sql);

if(!isset($_SESSION['logged'])){
    $_SESSION['logged'] = 0;
}


$mysqli->close();

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Courses </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='coursesGall_styles.css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <style>
        
    .topnav a.active {
    background-color: #ddd;
    color: #000;
    
    }

    </style>
    <script>
        function add_to_cart(prod_id){
            var date = new Date();
            date.setTime(date.getTime() + (1*60*1000000));
            var cValue= Cookies.get('prod_ids');
            
            if (cValue == undefined){
                console. log( 'Cookie array created' );
            
                var p_ids=[prod_id];
                Cookies.set('prod_ids', JSON.stringify(p_ids), { expires: date });
                console. log( "Prod id: ", prod_id ," added");
            }
            else{
                console. log( 'Cookie array exsist' );
                
                var p_ids= $.parseJSON(Cookies.get('prod_ids'));
                if (p_ids.indexOf(prod_id) !== -1) {
            alert("Product with id " + prod_id + " already exists in cart");
            return; 
        }
                p_ids.push(prod_id);
                Cookies.set('prod_ids', JSON.stringify(p_ids), {  expires: date });
                console. log( 'Id added' );
            }
            cValue= JSON.parse(Cookies.get('prod_ids'));
            console. log( "Products id: ", cValue);

        }

        function check_login() {
            alert("You need to login first! ");
            window.location.href= "login.html";
        }
        
 
    </script>
</head>

<body>

<div class="topnav">
        <a  href="index.php" >Home</a>
        <a href="all.php" class="active">Courses</a>
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
    
    <!--Div container-->
    <div class="container">

        <!--Navigation bar-->
        <ul>
            <li><a href="all.php" class="choosen">All</a></li>
            <li><a href="hobbies.php">Hobbies</a></li>
            <li><a href="it.php">IT</a></li>
            <li><a href="science.php">Science</a></li>
        </ul>
        <!--Table to contain the products-->
        <!-- Fech data-->
      
        <table>
            
           
            <?php 
                $i=1;
                while($rows=$result->fetch_assoc())
                { 
                 
            ?>
                <td>
                    <div class="card">
                        <div class="card_content">
                        <img src=<?php echo $rows['image'] ?> alt="image not found">
                        <div class="overlay">
                            <?php echo $rows['description'] ?>
                        </div>
                            </div>
                        <div class="card_title">  <?php echo $rows['name'] ?> </div>
                    
                        <hr>
                        <div class="card_footer">Price:  <?php echo $rows['price'] ?>  
                        <input type="button" value="add to cart" name="btn_add_to_cart" id= <?php echo $rows['product_id'] ?> onclick=
                        <?php 
                        if ($_SESSION['logged']==1){
                            echo  "add_to_cart(this.id)" ;
                        }
                        else{
                           echo "check_login()";
                        }
                        ?>
                       
                        
                        >
                        </div>
                    </div>
                </td>

                <?php  
               if ( $i % 3 == 0){
                echo "</tr>";
               }
                $i++;
                }
            ?>
           
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


