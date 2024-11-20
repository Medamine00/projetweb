<?php
// Inclure la connexion à la base de données
include 'index.php';

// Récupérer toutes les formations
$sql = "SELECT id_formation, nom_formation FROM Formation";
$stmt = $conn->prepare($sql);
$stmt->execute();
$formations = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Formation</title>
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
        <h2>Choisissez une formation à modifier</h2>
        <form method="GET">
            <select name="id" required>
                <option value="">--Sélectionner une formation--</option>
                <?php foreach ($formations as $formation): ?>
                    <option value="<?php echo $formation['id_formation']; ?>">
                        <?php echo $formation['nom_formation']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Modifier</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mise à jour des données dans la base de données
            $id_formation = $_POST['id_formation'];
            $nom_formation = $_POST['nom_formation'];
            $description_formation = $_POST['description_formation'];
            $duration_formation = $_POST['duration_formation'];
            $id_cours = $_POST['id_cours'];
            $id_certification = $_POST['id_certification'];

            // Mettre à jour dans la base de données
            $sql = "UPDATE Formation SET nom_formation = ?, description_formation = ?, duration_formation = ?, id_cours = ?, id_certification = ? 
                    WHERE id_formation = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nom_formation, $description_formation, $duration_formation, $id_cours, $id_certification, $id_formation]);

            echo '<div class="success-message">Formation mise à jour avec succès !</div>';
        }

        if (isset($_GET['id'])) {
            $id_formation = $_GET['id'];
            $sql = "SELECT * FROM Formation WHERE id_formation = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_formation]);
            $formation = $stmt->fetch();

            if ($formation) {
        ?>
                <h2>Modifier la Formation</h2>
                <form method="POST">
                    <input type="hidden" name="id_formation" value="<?php echo $formation['id_formation']; ?>">
                    <label>Nom de la Formation :</label>
                    <input type="text" name="nom_formation" value="<?php echo $formation['nom_formation']; ?>" required>
                    <label>Description :</label>
                    <textarea name="description_formation"><?php echo $formation['description_formation']; ?></textarea>
                    <label>Durée (en heures) :</label>
                    <input type="text" name="duration_formation" value="<?php echo $formation['duration_formation']; ?>" required>
                    <label>ID du Cours :</label>
                    <input type="text" name="id_cours" value="<?php echo $formation['id_cours']; ?>" required>
                    <label>ID de la Certification :</label>
                    <input type="text" name="id_certification" value="<?php echo $formation['id_certification']; ?>" required>
                    <button type="submit">Modifier la Formation</button>
                </form>
        <?php
            } else {
                echo '<div class="error-message">La formation n\'existe pas.</div>';
            }
        }
        ?>
    </div>
</body>

</html>
