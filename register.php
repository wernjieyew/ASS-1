<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register || TAR UMT SHOP</title>
    <link rel="stylesheet" href="css/foundation.css">
    <style>
        .error-message {
            color: red;
            font-size: 0.8em;
        }
    </style>
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
        <ul class="right">
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">View Cart</a></li>
            <li><a href="orders.php">My Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="logout.php">Log Out</a></li>';
            }
            else{
                echo '<li><a href="login.php">Log In</a></li>';
                echo '<li class="active"><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </section>
</nav>

<form method="POST" action="insert.php" style="margin-top:30px;" id="registration-form">
    <div class="row">
        <div class="small-8">
            <div class="row">
                <div class="small-4 columns">
                    <label for="fname" class="right inline">First Name</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="fname" placeholder="Nayan" name="fname" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="lname" class="right inline">Last Name</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="lname" placeholder="Seth" name="lname" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="address" class="right inline">Address</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="address" placeholder="Infinite Loop" name="address" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="city" class="right inline">City</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="city" placeholder="Mumbai" name="city" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="pin" class="right inline">Pin Code</label>
                </div>
                <div class="small-8 columns">
                    <input type="text" id="pin" placeholder="400056" name="pin" required>
                </div>
            </div>

            <div class="row">
        <div class="small-4 columns">
            <label for="email" class="right inline">E-Mail</label>
        </div>
        <div class="small-8 columns">
            <input type="email" id="email" placeholder="nayantronix@gmail.com" name="email" required>
            <!-- Display error message below the email input -->
            <?php
            if(isset($_GET['error'])) {
                echo '<span class="error-message">' . $_GET['error'] . '</span>';
            }
            ?>
        </div>
    </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="pwd" class="right inline">Password</label>
                </div>
                <div class="small-8 columns">
                    <input type="password" id="pwd" name="pwd" required>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns"></div>
                <div class="small-8 columns">
                    <span class="error-message" id="registration-error"></span>
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns"></div>
                <div class="small-8 columns">
                    <input type="submit" value="Register" class="button">
                    <input type="reset" value="Reset" class="button">
                </div>
            </div>
        </div>
    </div>
</form>

<footer>
    <p style="text-align:center; font-size:0.8em;">&copy; 2024 TAR UMT Shop. All Rights Reserved.</p>
</footer>

<script>
document.getElementById("registration-form").onsubmit = function() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("pwd").value;

    // Check if email is valid
    if (!isValidEmail(email)) {
        document.getElementById("registration-error").innerText = "Please enter a valid email address.";
        return false; // Prevent form submission
    }

    // Check if password meets the minimum length requirement
    if (password.length < 8) {
        document.getElementById("registration-error").innerText = "Password must be at least 8 characters long.";
        return false; // Prevent form submission
    }

    return true; // Allow form submission
};

function isValidEmail(email) {
    // You can implement your email validation logic here
    // This is just a basic example
    return /\S+@\S+\.\S+/.test(email);
}
</script>



</body>
</html>
