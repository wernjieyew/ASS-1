<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || TAR UMT SHOP</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <style>
        /* Custom CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .top-bar {
            background-color: #333;
        }
        .top-bar .name h1 a {
            color: #fff;
        }
        .top-bar-section ul.right li a {
            color: #fff;
        }
        .contact-info {
            margin-top: 30px;
            text-align: center;
            color: #333;
        }
        .contact-info p {
            margin-bottom: 20px;
        }
    </style>
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
            <li><a href="orders.php">My Orders</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>
            <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="logout.php">Log Out</a></li>';
            }
            else{
                echo '<li><a href="login.php">Log In</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </section>
</nav>

<div class="row" style="margin-top:30px;">
    <div class="small-12">
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p>If you have any questions, suggestions, or inquiries, feel free to reach out to us!</p>
            <p>Email: <a href="tarumt@"> perak@tarc.edu.my</a></p>
            <p>Phone: 017-4016934</p>
        </div>
    </div>
</div>

<footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; 2024 TAR UMT Shop. All Rights Reserved.</p>
        </footer>

<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
