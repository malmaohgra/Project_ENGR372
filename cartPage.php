<?php
session_start();


include 'external.php';


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$cartItems = [];
if(!isset($_COOKIE['prod_ids'])){
  $_COOKIE['prod_ids'] = "";
}
$cValue = json_decode($_COOKIE['prod_ids'], true);



if (!empty($cValue)) {
    
    $productIds = implode(',', $cValue);
    $sql = "SELECT p.product_id, p.name AS product_name, c.category_name, p.price 
            FROM product p 
            JOIN category c ON p.category_id = c.category_id
            WHERE p.product_id IN ($productIds)";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cartItems[] = $row;
        }
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
}


if(!$_SESSION['logged']){
  $_SESSION['logged'] = 0;
}



mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <style>
      body {
        
        background-color: #f4f4f4;
      }
      .cart-container {
        width: 80%;
        margin: 7% auto;
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30%;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,
      td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #ddd;
      }
      th {
        background-color: #f9f9f9;
      }
      .remove-btn {
        color: red;
        cursor: pointer;
      }
      .total-price {
        color: #a759be;
        font-size: 20px;
        font-weight: bold;
      }
      .checkout-btn {
        background-color: #a759be;
        color: white;
        padding: 10px 20px;
        text-align: center;
        display: inline-block;
        cursor: pointer;
        border: none;
      }
      .total-row td {
        border: none;
        font-weight: bold;
      }
           footer {
  text-align: center;
  padding: 5px;
  background-color: #fbe3ce;
  color: #000;
  position: fixed;
  bottom: 0;
}
    </style>
</head>
<body>
<div class="topnav">
        <a  href="index.php" >Home</a>
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
        <a href="cartPage.php" class="active" style="margin-left: 7%;  padding: 18px ; " >
        <img src="images/shopping-cart_03.png" alt="" width="30" style="margin-top: 0px; ">
        My Shopping Cart </a>
</div> 

<div class="cart-container">
  <h1>Shopping Cart</h1>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($cartItems)) : ?>
        <tr>
          <td colspan="4">Your cart is empty.</td>
        </tr>
      <?php else : ?>
        <?php foreach ($cartItems as $item) : ?>
          <tr data-id="<?php echo htmlspecialchars($item['product_id']); ?>">
            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
            <td><?php echo htmlspecialchars($item['category_name']); ?></td>
            <td class="price"><?php echo htmlspecialchars($item['price']); ?></td>
            <td><i class="fas fa-trash remove-btn" onclick="removeItemsFromCookie('<?php echo $item['product_id']; ?>')"></i></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr class="total-row">
        <td colspan="3"></td>
        <td>Total: <span class="total-price"><?php echo number_format(array_sum(array_column($cartItems, 'price')), 2); ?> TL</span></td>
        <td>
          <button
            class="checkout-btn"
            onclick= goCheckout()
          >
            Checkout
          </button>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

<script>

function goCheckout(){
  var cartItems = <?php echo json_encode($cartItems); ?>;
  if(cartItems.length === 0){
    alert("Your Cart is empty.")
  }
  else{
    location.href='checkout.php'
  }
}


function removeItemsFromCookie(ids) {
  cValue1 = JSON.parse(Cookies.get('prod_ids'));
  console.log(cValue1,'$cValue');
  cValue1 = cValue1.filter(id => id !== ids);
  console.log(cValue1,'$cValue');
  Cookies.set('prod_ids', JSON.stringify(cValue1));
  location.reload();
}




</script>
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
