<?php
$host = "localhost";
$username = "root";  // Default for local servers like XAMPP
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
