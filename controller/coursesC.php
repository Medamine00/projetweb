<?php
include("C:/xampp2/htdocs/Learnify web site/config.php");

// Function to handle course insertion
function insertCourse($conn, $course_title, $tutor_name, $id_categorie, $duration, $price, $description) {
    try {
        // Prepare SQL query
        $sql = "INSERT INTO courses (course_title, tutor_name, id_categorie, duration, price, description)
                VALUES (:course_title, :tutor_name, :id_categorie, :duration, :price, :description)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':course_title', $course_title);
        $stmt->bindParam(':tutor_name', $tutor_name);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);

        // Execute the statement
        if ($stmt->execute()) {
            return "<div class='alert alert-success'>Record Inserted Successfully</div>";
        } else {
            return "<div class='alert alert-danger'>Error: Could not insert record.</div>";
        }
    } catch (PDOException $e) {
        return "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

// Handle course subscription (insertion)
if (isset($_POST["subscribe"])) {
    // Sanitize and retrieve form inputs
    $course_title = htmlspecialchars($_POST["course_title"]);
    $tutor_name = htmlspecialchars($_POST["tutor_name"]);
    $id_categorie = htmlspecialchars($_POST["id_categorie"]);
    $duration = htmlspecialchars($_POST["duration"]); // Corrected to $_POST["duration"]
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);

    // Check if all fields are filled
    if ($course_title && $tutor_name && $id_categorie && $duration && $price && $description) {
        echo insertCourse($conn, $course_title, $tutor_name, $id_categorie, $duration, $price, $description);
    } else {
        echo "<div class='alert alert-warning'>Please fill all the required fields.</div>";
    }
}

// Handle course editing (update)
if (isset($_POST["edit"])) {
    // Sanitize and retrieve form inputs
    $course_title = htmlspecialchars($_POST["course_title"]);
    $tutor_name = htmlspecialchars($_POST["tutor_name"]);
    $id_categorie = htmlspecialchars($_POST["id_categorie"]);
    $duration = htmlspecialchars($_POST["duration"]); // Corrected to $_POST["duration"]
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);

    // Check if all fields are filled
    if ($course_title && $tutor_name && $id_categorie && $duration && $price && $description) {
        try {
            // Prepare SQL query to update course
            $sql = "UPDATE courses SET course_title = :course_title, tutor_name = :tutor_name, 
                    id_categorie = :id_categorie, duration = :duration, price = :price, 
                    description = :description WHERE id = :id";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':course_title', $course_title);
            $stmt->bindParam(':tutor_name', $tutor_name);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id', $_POST['course_id']); // Assuming you are passing the course ID

            // Execute the statement
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Update Successful</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: Could not update record.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill all the required fields.</div>";
    }
    // Dans le contrôleur coursesC.php


}
?>
