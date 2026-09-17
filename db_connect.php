<?php
// db_connect.php
// Change these values to match your XAMPP/WAMP/hosting MySQL setup.

$host = "localhost";
$username = "root";
$password = "";
$database = "smeet_portfolio";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
?>
