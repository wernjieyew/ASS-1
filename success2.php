<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TAR UMT SHOP</title>
    <link rel="stylesheet" href="css/foundation.css" />

    <style>
    /* Add your custom styles here */

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    .success-message {
      background-color: #dff0d8;
      border: 1px solid #3c763d;
      color: #3c763d;
      padding: 15px;
      margin-top: 20px;
      border-radius: 5px;
    }
    footer {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
      color: #666;
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




    <div class="container">
  <div class="row">
    <div class="small-12">
      <div class="success-message">
        <p><p>You have successfully updated your information.</p></p>
      </div>
    </div>
  
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; 2024 TAR UMT Shop. All Rights Reserved.. All Rights Reserved.</p>
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
