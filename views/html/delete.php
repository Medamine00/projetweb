<?php
if (isset($_GET['id'])) {
    // Inclusion de la configuration
    include("C:/xampp2/htdocs/Learnify web site/config.php");

    try {
        // Récupération et sécurisation de l'ID
        $id = intval($_GET['id']); // Convert ID to integer to prevent SQL injection

        // Vérification si un cours existe avec cet ID
        $sql_check_course = "SELECT * FROM courses WHERE id = :id";
        $stmt_check_course = $conn->prepare($sql_check_course);
        $stmt_check_course->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_check_course->execute();

        if ($stmt_check_course->rowCount() > 0) {
            // Si le cours existe, procéder à la suppression
            $sql_delete_course = "DELETE FROM courses WHERE id = :id";
            $stmt_delete_course = $conn->prepare($sql_delete_course);
            $stmt_delete_course->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Debugging - Check if the delete query executes correctly
            if ($stmt_delete_course->execute()) {
                echo "<div class='alert alert-success'>Course successfully deleted!</div>";
            } else {
                // Debugging - If the delete fails, output error message
                echo "<div class='alert alert-danger'>Failed to delete course. Please try again.</div>";
            }
        } else {
            echo "<div class='alert alert-warning'>No course found with the provided ID.</div>";
        }
    } catch (PDOException $e) {
        // Debugging - Show the exception message if something goes wrong
        echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }

    // Redirection vers la page ui-Courses.php après la suppression
    header("Location: ui-Courses.php");
    exit(); // S'assurer que le script s'arrête après la redirection
} else {
    echo "<div class='alert alert-warning'>No ID provided for deletion.</div>";
}
?>
