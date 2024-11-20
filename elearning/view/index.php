!<?php
// Database connection
$host = "localhost";
$user = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "elearning";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
