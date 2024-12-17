<?php
include 'index.php'; // Database connection

// Logic to add a new formation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_formation = $_POST['nom_formation'];
    $description_formation = $_POST['description_formation'];
    $duration_formation = $_POST['duration_formation'];
    $id_cours = $_POST['id_cours'];
    $id_certification = $_POST['id_certification'];

    // Check if the certification ID exists in the certifications table
    $checkCertSql = "SELECT COUNT(*) FROM certifications WHERE id_certification = ?";
    $checkCertStmt = $conn->prepare($checkCertSql);
    $checkCertStmt->execute([$id_certification]);
    $certificationExists = $checkCertStmt->fetchColumn();

    if ($certificationExists == 0) {
        echo "<p class='error'>L'ID de la certification n'existe pas dans la table des certifications.</p>";
    } else {
        // Insert the data into the database (id_formation will be auto-incremented)
        $sql = "INSERT INTO formation (nom_formation, description_formation, duration_formation, id_cours, id_certification)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$nom_formation, $description_formation, $duration_formation, $id_cours, $id_certification])) {
            // Redirect to a page or display a success message
            header('Location: afficher_formation.php?status=success');
            exit;
        } else {
            echo "<p class='error'>Erreur lors de l'ajout de la formation.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Formation</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Notification */
        .notification {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            text-align: center;
        }

        /* Message d'erreur */
        .error {
            margin-top: 20px;
            color: red;
            font-weight: bold;
        }

        /* Style du formulaire */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            margin-bottom: 20px;
            color: #007BFF;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Ajouter une Formation</h1>
        <form name="formationForm" method="POST">
            <label>Nom de la Formation :</label>
            <input type="text" name="nom_formation" >

            <label>Description :</label>
            <textarea name="description_formation" ></textarea>

            <label>Durée :</label>
            <input type="text" name="duration_formation" >

            <label>ID du Cours :</label>
            <input type="number" name="id_cours" >

            <label>ID de la Certification :</label>
            <input type="number" name="id_certification">

            <button type="submit">Ajouter la Formation</button>
        </form>
    </div>
</body>

</html>
