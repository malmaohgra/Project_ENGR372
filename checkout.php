<?php
session_start();

// Connect with DB
$servername = "localhost";
$username = "root";
$password = "abcd";
$dbname = "group2";



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch cart items from the database based on the product IDs stored in the cookie
$cartItems = [];
$cValue = json_decode($_COOKIE['prod_ids'], true);

$email = $_SESSION["user_email"]; // Session'dan email'i alıyoruz ve değişkene atıyoruz
$sql1 = "SELECT name,surname FROM customers WHERE email = '$email'
       "  ;

$result1 = mysqli_query($conn, $sql1);

if ($row = mysqli_fetch_assoc($result1)) {
    $name = $row['name'];
    $surname = $row['surname'];
}
$full_name = $name . " " . $surname;
if (!empty($cValue)) {
    // Convert array to comma-separated string for the SQL query
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

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            margin: 20px auto;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #table_header {
            text-align: center;
            font-weight: bold;
        }

        form {
            margin-bottom: 20px;
        }

        #firsttb {
            width: 50%;
            background-color: rgb(244, 244, 236);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #4766c3;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #314989;
        }

        label {
            font-weight: bold;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

    </style>
</head>

<body style="color: rgb(71, 102, 195);">
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="all.php">Courses</a>
        <a href="contact.php">Contact</a>
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
        <span style="text-align: right; float: right">
            <a href="cartPage.php">Shopping Cart</a>
            <img src="images/shopping-cart.png" alt="" width="50" style="margin-top: 5px" />

        </span>
    </div>
    <div align="center">
        <form id="form1" name="form1"></form>
        <table id="firsttb" border="1">
            <tr>
                <td align="center">
                    <form name="form2">
                        <table border="1" cellpadding="15">
                            <tr>
                                <td colspan="3" id="table_header">Receiver Informations</td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="cur">Name</label>

                                </td>
                                <td id="name_section">
                                <?php echo $full_name ?>
                                </td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="bs">Orders</label>

                                </td>

                                <td>
                                    <div id="table-container">
                                    <table border='1' cellpadding='10' cellspacing='10'>
                                    <tr><th>Course Name</th><th>Category</th><th>Price</th></tr>
                                    <?php foreach ($cartItems as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                        <td><?php echo htmlspecialchars($item['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($item['price']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="street-address">Street Address</label>

                                </td>
                                <td><input type="text" id="street-address" name="street-address"
                                        autocomplete="street-address" required enterkeyhint="next"></input></td>
                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="postal-code">ZIP or Postal Code (optional)</label>


                                </td>
                                <td><input class="postal-code" id="postal-code" name="postal-code"
                                        autocomplete="postal-code" enterkeyhint="next"></td>

                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="city">City</label>


                                </td>
                                <td><input required type="text" id="city" name="city" autocomplete="address-level2"
                                        enterkeyhint="next"></td>

                            </tr>

                            <tr>
                                <td align="center">
                                    <label for="country">Country or Region</label>

                                </td>
                                <td><input required type="text" id="country" name="city" autocomplete="address-level2"
                                        enterkeyhint="next"></td>

                            </tr>


                            <tr>
                                <td><label for="country">Total Price </label></td>
                                <td id="total_price"><?php echo number_format(array_sum(array_column($cartItems, 'price')), 2); ?> TL</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><button type="button" onclick="openModal()">PAY</button></td>
                            </tr>


                        </table>
        </table>
        </form>
        </td>
        </tr>


    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Ödeme Yap</h2>
            <form id="payment-form">
                <div class="form-group">
                    <label for="card_number">Card Number:</label>
                    <input name="cardnumber"
                    pattern="[0-9]{12,19}" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiry Date:</label>
                    <input type="month" id="expiry_date" name="expiry_date" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="number" id="cvv"  name="cvv" required>
                </div>
                <div class="form-group">
                    <label for="name_on_card">Name on Card:</label>
                    <input type="text" id="name_on_card" name="name_on_card" required>
                </div>
                <button type="submit">Ödeme Yap</button>
            </form>
        </div>
    </div>


    <footer>
        <small>
            2024 Spring Semester - ENGR 372 -
        </small>
        <small>
            Melike Z. Tapcı, Resul Erdem Arduç, Ege Eylül Kırmızı.....FILL THESE
        </small>
    </footer>


    <script>

        function myFunction() {
            var streetAddress = document.getElementById("street-address").value.trim();
            var city = document.getElementById("city").value.trim();
            var country = document.getElementById("country").value.trim();

            

            openModal(); 


        }


        function openModal() {
            var streetAddress = document.getElementById("street-address").value.trim();
            var city = document.getElementById("city").value.trim();
            var country = document.getElementById("country").value.trim();

            if (streetAddress === "" || city === "" || country === "") {
                alert("Please fill in all required fields (Street Address, City, Country/Region).");
                return;
            }


            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById("myModal")) {
                closeModal();
            }
        }

        document.getElementById("payment-form").addEventListener("submit", function (event) {
            event.preventDefault();
            alert("Ödendi");
            closeModal();
        });

    </script>

</body>

</html>