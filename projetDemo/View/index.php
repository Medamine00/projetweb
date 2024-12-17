!<?php
// Database connection
$host = "localhost";
$user = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "learnify";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
