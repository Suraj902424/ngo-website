<?php
$host = "sql211.infinityfree.com";
$username = "if0_40041023";
$password = "CIYsY3JHFhEiYp1";
$database = "if0_40041023_operation"; // 🔁 इसे अपने DB नाम से बदलें

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set character set
$conn->set_charset("utf8mb4");
?>
