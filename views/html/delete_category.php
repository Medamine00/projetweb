<?php
include("C:/xampp2/htdocs/Learnify web site/config.php");

if (isset($_GET['id'])) {
    $id_categorie = $_GET['id'];

    try {
        // Vérifier si des cours sont liés à cette catégorie
        $sql_check = "SELECT COUNT(*) AS course_count FROM courses WHERE id_categorie = :id_categorie";
        $stmt = $conn->prepare($sql_check);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $course_count = $result['course_count'];

        // Si des cours sont liés, afficher un message de confirmation
        if ($course_count > 0 && !isset($_GET['confirm'])) {
            echo "<script>
                    if (confirm('This category has $course_count associated courses. Do you want to delete the category and all its courses?')) {
                        window.location.href = 'delete_category.php?id=$id_categorie&confirm=yes';
                    } else {
                        window.location.href = 'ui-Courses.php';
                    }
                  </script>";
            exit;
        }

        // Supprimer la catégorie et les cours associés si l'utilisateur a confirmé
        if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
            // Supprimer les cours associés
            $sql_delete_courses = "DELETE FROM courses WHERE id_categorie = :id_categorie";
            $stmt = $conn->prepare($sql_delete_courses);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->execute();

            // Supprimer la catégorie
            $sql_delete_category = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
            $stmt = $conn->prepare($sql_delete_category);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->execute();

            echo "<script>
                    alert('Category and associated courses deleted successfully!');
                    window.location.href = 'ui-Courses.php';
                  </script>";
            exit;
        }

        // Supprimer uniquement la catégorie si aucun cours n'est associé
        if ($course_count == 0) {
            $sql_delete_category = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
            $stmt = $conn->prepare($sql_delete_category);
            $stmt->bindParam(':id_categorie', $id_categorie);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Category deleted successfully!');
                        window.location.href = 'ui-Courses.php';
                      </script>";
                exit;
            }
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Error: " . htmlspecialchars($e->getMessage()) . "');
                window.location.href = 'ui-Courses.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Invalid category ID.');
            window.location.href = 'ui-Courses.php';
          </script>";
}
?>
