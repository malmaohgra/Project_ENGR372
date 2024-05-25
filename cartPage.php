<?php
session_start();

// Connect with DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "group2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch cart items from the database (example query, adjust according to your schema)
$cartItems = [];
$sql = "SELECT p.product_id, p.name AS product_name, c.category_name, p.price 
        FROM product p 
        JOIN category c ON p.category_id = c.category_id"; // Adjust the table name and column names as necessary
$result = mysqli_query($conn, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cartItems[] = $row;
    }
    // Debugging line
    
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
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
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
      }
      .cart-container {
        width: 80%;
        margin: 20px auto;
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            <td><i class="fas fa-trash remove-btn"></i></td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
    <tfoot>
      <tr class="total-row">
        <td colspan="3"></td>
        <td>Total: <span class="total-price">TL<?php echo number_format(array_sum(array_column($cartItems, 'price')), 2); ?></span></td>
        <td>
          <button
            class="checkout-btn"
            onclick="location.href='checkout.html'"
          >
            Checkout
          </button>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const removeButtons = document.querySelectorAll(".remove-btn");

    removeButtons.forEach(button => {
      button.addEventListener("click", function() {
        const row = this.parentNode.parentNode;
        const price = parseFloat(row.querySelector(".price").innerText);
        row.remove();
        updateTotal(-price);
      });
    });

    function updateTotal(amount) {
      const totalSpan = document.querySelector(".total-price");
      let currentTotal = parseFloat(totalSpan.innerText.replace("₺", "").replace(",", ""));
      if (isNaN(currentTotal)) {
        currentTotal = 0; // If total is NaN, set it to 0
      }
      currentTotal += amount;
      totalSpan.innerText = `₺${currentTotal.toFixed(2)}`;
    }
  });
</script>
</body>
</html>
