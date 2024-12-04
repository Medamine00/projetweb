<?php
if (isset($_GET['id'])) {
    // Inclusion de la configuration
    include("C:/xampp2/htdocs/Learnify web site/config.php");

    try {
        // Récupération et sécurisation de l'ID
        $id = intval($_GET['id']);

        // Supprimer le cours de la table 'courses'
        $sql_delete_course = "DELETE FROM courses WHERE id = :id";
        $stmt_delete_course = $conn->prepare($sql_delete_course);
        $stmt_delete_course->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt_delete_course->execute()) {
            echo "Course successfully deleted!";
        } else {
            echo "Failed to delete course.";
        }
    } catch (PDOException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }

    // Redirection vers la page ui-Courses.php après la suppression
    header("Location: ui-Courses.php");
    exit(); // S'assurer que le script s'arrête après la redirection
} else {
    echo "No ID provided for deletion.";
}
?>
