<?php
include("C:/xampp2/htdocs/Learnify web site/config.php");

// Function to handle category insertion
function insertCategory($conn, $nom_categorie, $description) {
    try {
        // Prepare SQL query
        $sql = "INSERT INTO categorie (nom_categorie, description, date_creation) 
                VALUES (:nom_categorie, :description, NOW())";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':nom_categorie', $nom_categorie);
        $stmt->bindParam(':description', $description);

        // Execute the statement
        if ($stmt->execute()) {
            return "<div class='alert alert-success'>Category Inserted Successfully</div>";
        } else {
            return "<div class='alert alert-danger'>Error: Could not insert category.</div>";
        }
    } catch (PDOException $e) {
        return "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Function to handle category update
function updateCategory($conn, $id_categorie, $nom_categorie, $description) {
    try {
        // Prepare SQL query
        $sql = "UPDATE categorie 
                SET nom_categorie = :nom_categorie, description = :description 
                WHERE id_categorie = :id_categorie";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
        $stmt->bindParam(':nom_categorie', $nom_categorie);
        $stmt->bindParam(':description', $description);

        // Execute the statement
        if ($stmt->execute()) {
            return "<div class='alert alert-success'>Category Updated Successfully</div>";
        } else {
            return "<div class='alert alert-danger'>Error: Could not update category.</div>";
        }
    } catch (PDOException $e) {
        return "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Handle category insertion
if (isset($_POST["add_category"])) {
    // Sanitize and retrieve form inputs
    $nom_categorie = htmlspecialchars($_POST["nom_categorie"]);
    $description = htmlspecialchars($_POST["description"]);

    // Check if fields are filled
    if ($nom_categorie) { // 'description' is optional
        echo insertCategory($conn, $nom_categorie, $description);
    } else {
        echo "<div class='alert alert-warning'>Please fill all the required fields.</div>";
    }
}

// Handle category update
if (isset($_POST["edit_category"])) {
    // Sanitize and retrieve form inputs
    $id_categorie = htmlspecialchars($_POST["id_categorie"]);
    $nom_categorie = htmlspecialchars($_POST["nom_categorie"]);
    $description = htmlspecialchars($_POST["description"]);

    // Check if fields are filled
    if ($id_categorie && $nom_categorie) { // 'description' is optional
        echo updateCategory($conn, $id_categorie, $nom_categorie, $description);
    } else {
        echo "<div class='alert alert-warning'>Please fill all the required fields.</div>";
    }
}
?>
