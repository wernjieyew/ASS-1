<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

function validateCreditCard($creditCardNumber) {
    // Remove any non-digit characters
    $creditCardNumber = preg_replace('/\D/', '', $creditCardNumber);
    
    // Check if the credit card number consists of 16 digits
    if (!preg_match('/^\d{16}$/', $creditCardNumber)) {
        return false;
    }
    
    // You can add more advanced validation algorithms here, such as Luhn algorithm
    
    return true;
}

function validateCVV($cvv) {
    // Remove any non-digit characters
    $cvv = preg_replace('/\D/', '', $cvv);
    
    // Check if the CVV is a number and its length is between 1 and 4
    if (!is_numeric($cvv) || strlen($cvv) < 1 || strlen($cvv) > 4) {
        return false;
    }
    
    return true;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate credit card number
    $creditCardNumber = $_POST['cardnumber'];
    if (!validateCreditCard($creditCardNumber)) {
        $errors[] = "Invalid credit card number format";
    }
    
    // Validate CVV
    $cvv = $_POST['cvv'];
    if (!validateCVV($cvv)) {
        $errors[] = "Invalid CVV";
    }
    
    // If there are no errors, proceed with form submission
    if (empty($errors)) {
        // Your form submission logic here
        // For example, redirect to the next page
        header("Location: orders-update.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Checkout Form || TAR UMT SHOP</title>
    <link href="payment.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <style>
        body.form-body {
            font-family: Arial, sans-serif;
            font-size: 17px;
            padding: 8px;
            background-image: url(background.jpg);
            background-size: cover;
            background-position: center;
            margin: 0;
        }

        .error-message {
            color: red;
        }
        h2 {
            text-align: center;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: cornsilk;
            border: 1px solid lightgrey;
            border-radius: 3px;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            font-size: 16px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col {
            flex: 1 0 50%;
            padding: 0 10px;
        }

        .col-50 {
            flex: 1 0 100%;
        }

        .icon-container {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn {
            background-color: orange;
            color: white;
            border: none;
            width: 100%;
            height: 50px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 20px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: lightskyblue;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body class="form-body">

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

    <h2>Payment Checkout Form</h2>

    <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row">
                <div class="col">
                    <h3>Payment Method</h3>
                    <div class="icon-container">
                        <img src="images/masc.png" alt="mastercard" width="90px">
                        <img src="images/visa.png" alt="visa" width="80px" height="60px">
                    </div>

                    <label for="name">Name On Card</label>
                    <input type="text" id="name" name="name" placeholder="Steve Chow" required>
                        <!-- Display name on card error below -->
                        <?php if (!empty($errors) && in_array("Name On Card is required", $errors)): ?>
                                                <div class="error-message">Name On Card is required</div>
                                            <?php endif; ?>


                                            <label for="bank">Select Bank</label>
                    <!-- Bank selection dropdown -->
                    <select name="bank" id="bank" required>
                        <option disabled selected>Select Bank</option>
                        <option>Public Bank</option>
                        <option>Maybank</option>
                        <option>CIMBbank</option>
                    </select>
                    <!-- Display bank selection error below -->
                    <?php if (!empty($errors) && in_array("Bank selection is required", $errors)): ?>
                        <div class="error-message">Bank selection is required</div>
                    <?php endif; ?>



                </div>
                <div class="col">
                    <label for="cardnumber">Credit Card Number</label>
                    <input type="text" id="cardnumber" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                    <!-- Display credit card number error below -->
                    <?php if (!empty($errors) && in_array("Invalid credit card number format", $errors)): ?>
                        <div class="error-message">Invalid credit card number format</div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col">
                            <label for="expyear">Card expiry date</label>
                            <input type="date" id="expyear" name="expyear" placeholder="MM / YY" required>
                        </div>
                        <div class="col">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="8-88">
                            <!-- Display CVV error below -->
                            <?php if (!empty($errors) && in_array("Invalid CVV", $errors)): ?>
                                <div class="error-message">Invalid CVV</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <input type="submit" value="Continue To Checkbox" class="btn">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 TAR UMT Shop. All Rights Reserved.</p>
    </footer>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
        $(document).foundation();

        // JavaScript for auto-formatting credit card number input
        document.getElementById('cardnumber').addEventListener('input', function (e) {
            var input = e.target.value.replace(/\D/g, '').substring(0,16);
            var formattedInput = input.replace(/(\d{4})(\d{0,4})(\d{0,4})(\d{0,4})/, '$1-$2-$3-$4').replace(/-+$/, '');
            e.target.value = formattedInput;
        });

                // JavaScript for auto-formatting CVV input
                document.getElementById('cvv').addEventListener('input', function (e) {
            var input = e.target.value.replace(/\D/g, '').substring(0,3);
            var formattedInput = input.replace(/(\d{1})(\d{0,2})/, '$1-$2').replace(/-+$/, '');
            e.target.value = formattedInput;
        });


                // JavaScript function to validate bank selection
                document.getElementById("paymentForm").addEventListener("submit", function(event) {
            var bankSelect = document.getElementById("bank");
            if (bankSelect.value === "") {
                alert("Please select a bank.");
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
