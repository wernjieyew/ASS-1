<?php
session_start();
include 'config.php';  // Database connection settings

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    if (isset($_SESSION['id'])) {
        // Get user ID from session
        $user_id = $_SESSION['id'];

        // Prepare and execute query to get user email
        $userQuery = $mysqli->prepare("SELECT email FROM users WHERE id = ?");
        if (!$userQuery) {
            echo "MySQLi error: " . $mysqli->error;
        } else {
            $userQuery->bind_param("i", $user_id);
            $userQuery->execute();

            // Check for errors
            if ($userQuery->errno) {
                echo "MySQLi error: " . $userQuery->error;
            } else {
                $result = $userQuery->get_result();

                if ($result->num_rows == 1) {
                    $user = $result->fetch_assoc();
                    $email = $user['email'];

                    // Start database transaction
                    $mysqli->begin_transaction();

                    try {
                        // Create a new order
                        $orderQuery = $mysqli->prepare("INSERT INTO orders (email) VALUES (?)");
                        $orderQuery->bind_param("s", $email);
                        $orderQuery->execute();
                        $order_id = $mysqli->insert_id;

                        // Prepare the statement for inserting order details
                        $detailQuery = $mysqli->prepare("INSERT INTO order_details (order_id, product_code, quantity, price) VALUES (?, ?, ?, ?)");

                        foreach ($_SESSION['cart'] as $product_id => $quantity) {
                            // Fetch product information using product ID
                            $productQuery = $mysqli->prepare("SELECT product_code, price FROM products WHERE id = ?");
                            if (!$productQuery) {
                                echo "MySQLi error: " . $mysqli->error;
                            } else {
                                $productQuery->bind_param("i", $product_id);
                                $productQuery->execute();
                        
                                // Check for errors
                                if ($productQuery->errno) {
                                    echo "MySQLi error: " . $productQuery->error;
                                } else {
                                    $result = $productQuery->get_result();
                                    $product = $result->fetch_assoc();
                        
                                    if (!$product) {
                                        throw new Exception("Product with ID $product_id not found.");
                                    }
                                    $product_code = $product['product_code'];
                                    $price = $product['price'];
                                    $detailQuery->bind_param("isis", $order_id, $product_code, $quantity, $price);
                                    $detailQuery->execute();
                        
                                    // Check for errors
                                    if ($detailQuery->errno) {
                                        echo "MySQLi error: " . $detailQuery->error;
                                    }
                                }
                            }
                        }
                        

                        // Commit transaction
                        $mysqli->commit();
                        unset($_SESSION['cart']);  // Clear the cart
                        header("Location: success.php");  // Redirect to a success page
                    } catch (Exception $e) {
                        $mysqli->rollback();  // Rollback transaction on error
                        echo "Order failed: " . $e->getMessage();
                    }
                } else {
                    echo "User not found.";
                }
            }
        }
    } else {
        echo "User ID is not set in session.";
    }
} else {
    echo "Cart is empty.";
}
?>