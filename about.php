<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || TAR UMT SHOP</title>
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
          <li class="active"><a href="about.php">About</a></li>
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
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:30px;">
      <div class="small-12">
      <h1>Welcome to TAR UMT SHOP</h1>
    <p>Your premier destination for exquisite graduation flowers. Celebrate success with our meticulously crafted arrangements.</p>
    
    <h2>Why Choose Us?</h2>
    <ul>
        <li><strong>Specialization:</strong> Unparalleled beauty and elegance in every bouquet.</li>
        <li><strong>Quality:</strong> Hand-selected blooms ensuring freshness and longevity.</li>
        <li><strong>Personalized Service:</strong> Tailored to find the perfect arrangement for your loved ones.</li>
        <li><strong>Celebrate with Convenience:</strong> Easy online ordering and nationwide delivery.</li>
        <li><strong>Shop with Confidence:</strong> Trusted provider dedicated to customer satisfaction.</li>
    </ul>

    <p>Join us in celebrating the achievements of your loved ones!</p>
        <footer>
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
