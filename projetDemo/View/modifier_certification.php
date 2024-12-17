<?php
// Include the database connection
include 'index.php';

// Fetch all certifications to populate the selection dropdown
$sql = "SELECT id_certification, titre_certification FROM certifications";
$stmt = $conn->prepare($sql);
$stmt->execute();
$certifications = $stmt->fetchAll();

// Handle the update when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the updated data from the form
    $id_certification = $_POST['id_certification'];
    $titre_certification = $_POST['titre_certification'];
    $description_certification = $_POST['description_certification'];
    $id_formation = $_POST['id_formation'];

    // Update the certification record in the database
    $sql = "UPDATE certifications SET titre_certification = ?, description_certification = ?, id_formation = ? 
            WHERE id_certification = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre_certification, $description_certification, $id_formation, $id_certification]);

    // Display a success message after updating
    echo '<div class="success-message">Certification mise à jour avec succès !</div>';
    header('location:./afficher_certification.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Certification</title>
    <link rel="stylesheet" href="./assets/css/styles.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #00376b;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        select, input[type="text"], textarea, button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #4fa3f7; /* Lighter blue */
            color: white;
            font-size: 18px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #3d8bcc; /* Darker blue on hover */
        }

        .success-message, .error-message {
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container">
    

        <?php
        // Check if the user selected a certification to edit
        if (isset($_GET['id'])) {
            $id_certification = $_GET['id'];

            // Fetch the selected certification details
            $sql = "SELECT * FROM certifications WHERE id_certification = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_certification]);
            $certification = $stmt->fetch();

            // Check if the certification exists in the database
            if ($certification) {
        ?>
                <h2>Modifier la Certification</h2>
                <form method="POST">
                    <input type="hidden" name="id_certification" value="<?php echo $certification['id_certification']; ?>">
                    <label>Titre de la Certification :</label>
                    <input type="text" name="titre_certification" value="<?php echo $certification['titre_certification']; ?>" required>
                    <label>Description :</label>
                    <textarea name="description_certification"><?php echo $certification['description_certification']; ?></textarea>
                    <label>ID de la Formation :</label>
                    <input type="text" name="id_formation" value="<?php echo $certification['id_formation']; ?>" required>
                    <button type="submit">Modifier la Certification</button>
                </form>
        <?php
            } else {
                // Display an error message if the certification does not exist
                echo '<div class="error-message">La certification n\'existe pas.</div>';
            }
        }
        ?>
    </div>
</body>

</html>
