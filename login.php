<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["username"];
    $password = $_POST["pwd"];

    // Prepared statement to fetch user data based on email
    $stmt = $mysqli->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session and redirect to dashboard
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['email'];
            header("location: dashboard.php");
            exit();
        } else {
            // Password is incorrect, redirect back to login with error message
            header("location: login.php?error=Incorrect password.");
            exit();
        }
    } else {
        // User not found, redirect back to login with error message
        header("location: login.php?error=User not found.");
        exit();
    }
}
?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login || TAR UMT SHOP</title>
    <link rel="stylesheet" href="css/foundation.css" />
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
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li class="active"><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>





    <form method="POST" action="verify.php" style="margin-top:30px;">
  <div class="row">
    <div class="small-8 small-centered columns">

      <div class="row">
        <div class="small-12 columns">
          <label>Email</label>
          <input type="email" placeholder="Your email" name="username">
        </div>
      </div>
      <div class="row">
        <div class="small-12 columns">
          <label>Password</label>
          <input type="password" placeholder="Your password" name="pwd">
        </div>
      </div>

      <div class="row">
        <div class="small-12 columns text-center">
          <input type="submit" value="Login" class="button">
          <input type="reset" value="Reset" class="button secondary">
        </div>
      </div>
    </div>
  </div>
</form>



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

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
form label {
    font-weight: bold;
}
form input[type="email"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}
form input[type="submit"],
form input[type="reset"] {
    padding: 10px 20px;
    font-size: 1em;
}

</style>

  </body>
</html>
