<?php
include("C:/xampp2/htdocs/Learnify web site/config.php");

if (isset($_GET['id'])) {
    $id_categorie = $_GET['id'];

    // Récupérer la catégorie actuelle
    try {
        $sql = "SELECT * FROM categorie WHERE id_categorie = :id_categorie";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$category) {
            echo "Category not found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mettre à jour la catégorie
        $nom_categorie = $_POST['nom_categorie'];
        $description = $_POST['description'];

        try {
            $update_sql = "UPDATE categorie SET nom_categorie = :nom_categorie, description = :description WHERE id_categorie = :id_categorie";
            $stmt = $conn->prepare($update_sql);
            $stmt->bindParam(':nom_categorie', $nom_categorie);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':id_categorie', $id_categorie);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Category updated successfully!');
                        window.location.href = 'ui-Courses.php';
                      </script>";
                exit;
            } else {
                echo "Error updating category.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <style>
        body {
            background-image: url('https://example.com/your-background-image.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background for form */
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .alert {
            color: red;
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Update Category</h1>

    <form method="POST">
        <label for="nom_categorie">Category Name:</label>
        <input type="text" name="nom_categorie" value="<?php echo htmlspecialchars($category['nom_categorie']); ?>" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($category['description']); ?></textarea>
        
        <button type="submit">Update Category</button>
    </form>

</div>

</body>
</html>
