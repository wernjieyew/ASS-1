<?php
ini_set('display_errors', '1'); // Turn it off for production
error_reporting(E_ALL);

$currency = '₹';
$db_username = 'admin';
$db_password = 'database';
$db_name = 'bolt';
$db_host = 'assdatabase.cuxnkfqlkpwa.us-east-1.rds.amazonaws.com';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($mysqli->connect_error) {
    die('Connection failed: ' . htmlspecialchars($mysqli->connect_error));
}
?>
