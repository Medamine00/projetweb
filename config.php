<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "courses_db";

try {
    // Connexion à la base de données avec PDO
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";
    $conn = new PDO($dsn, $dbUser, $dbPass);

    // Configuration des options PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Message temporaire pour vérifier la connexion
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die("Erreur de connexion : " . $e->getMessage());
}
?>
