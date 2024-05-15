<?php
session_start();
include 'config.php';  // Include database connection settings

if (!isset($_SESSION["username"])) {
    header("location:login.php");
    exit;  // Stop script execution after redirection
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>My Orders || TAR UMT SHOP</title>
    <link rel="stylesheet" href="css/foundation.css"/>
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="index.php">TAR UMT SHOP</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">View Cart</a></li>
            <li class="active"><a href="orders.php">My Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php

            if (isset($_SESSION['username'])) {
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="logout.php">Log Out</a></li>';
            } else {
                echo '<li><a href="login.php">Log In</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </section>
</nav>


<div class="row" style="margin-top:10px;">
    <div class="large-12">
        <h3>My Orders</h3>
        <hr>

        <?php
        $user = $_SESSION["username"];
        $result = $mysqli->query("SELECT * FROM orders WHERE email='$user'");
        if ($result && $result->num_rows > 0) {
            while ($obj = $result->fetch_object()) {
                echo '<div class="order">';
                echo '<p><h4>Order ID: ' . $obj->id . '</h4></p>';
                echo '<p><strong>Date of Purchase:</strong> ' . $obj->date . '</p>';

                // Now we need to fetch order details associated with this order
                $orderId = $obj->id;
                $orderDetailsResult = $mysqli->query("SELECT od.*, p.product_name FROM order_details od JOIN products p ON od.product_code = p.product_code WHERE order_id=$orderId");
                if ($orderDetailsResult && $orderDetailsResult->num_rows > 0) {
                    $totalCost = 0; // Initialize total cost for the order
                    $totalUnitsBought = 0; // Initialize total units bought
                    echo '<table>';
                    echo '<tr><th>Product Name</th><th>Price Per Unit</th><th>Units Bought</th><th>Total Cost</th></tr>';
                    while ($orderDetail = $orderDetailsResult->fetch_object()) {
                        echo '<tr>';
                        echo '<td>' . $orderDetail->product_name . '</td>';
                        echo '<td>RM' . $orderDetail->price . '</td>';
                        echo '<td>' . $orderDetail->quantity . '</td>';
                        $itemTotal = $orderDetail->price * $orderDetail->quantity; // Calculate total cost for this item
                        $totalCost += $itemTotal; // Add item total to the order's total cost
                        $totalUnitsBought += $orderDetail->quantity; // Add quantity to total units bought
                        echo '<td>RM' . $itemTotal . '</td>';
                        echo '</tr>';
                    }
                    echo '<tr><td colspan="2"><strong>Total</strong></td><td>' . $totalUnitsBought . '</td><td>RM' . $totalCost . '</td></tr>'; // Display total cost for the order
                    echo '</table>';
                } else {
                    echo '<p>No order details found.</p>';
                }

                echo '</div>'; // End of order div
            }
        } else {
            echo '<p>No orders found.</p>';
        }
        ?>
    </div>
</div>

<div class="row" style="margin-top:10px;">
    <div class="small-12">
        <footer style="margin-top:10px;">
            <p style="text-align:center; font-size:0.8em;">&copy; 2024 TAR UMT Shop. All Rights Reserved.</p>
        </footer>
    </div>
</div>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
