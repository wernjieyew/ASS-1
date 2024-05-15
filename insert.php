<?php
session_start();
include 'config.php';

$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pwd = $_POST["pwd"];

$check_stmt = $mysqli->prepare("SELECT email FROM users WHERE email = ?");
$check_stmt->bind_param("s", $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    header("location: register.php?error=Email address already exists. Please choose a different email.");
    exit();
} else {
    $stmt = $mysqli->prepare("INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $fname, $lname, $address, $city, $pin, $email, $pwd);
    if ($stmt->execute()) {
        header("location: login.php?success=Registration successful. You can now log in.");
        exit();
    } else {
        header("location: register.php?error=Registration failed. Please try again later.");
        exit();
    }
}
?>
