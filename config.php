<?php
ini_set('display_errors', '1'); // Turn it off for production
error_reporting(E_ALL);

$currency = '₹';
$db_username = 'root';
$db_password = '';
$db_name = 'bolt';
$db_host = 'localhost';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($mysqli->connect_error) {
    die('Connection failed: ' . htmlspecialchars($mysqli->connect_error));
}
?>
