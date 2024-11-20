<?php
// Inclure la connexion à la base de données
include 'index.php';

// Récupérer toutes les formations
$sql = "SELECT * FROM Formation";
$stmt = $conn->prepare($sql);
$stmt->execute();
$formations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #00376b;
            margin-bottom: 30px;
        }

        .formation-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .formation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .formation-card h3 {
            color: #00376b;
            margin-bottom: 10px;
        }

        .formation-card p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .formation-card p strong {
            font-weight: bold;
        }

        .formation-card hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Liste des Formations</h2>

        <?php
        foreach ($formations as $formation) {
            echo "<div class='formation-card'>";
            echo "<h3>" . htmlspecialchars($formation['nom_formation']) . "</h3>";
            echo "<p><strong>Description :</strong> " . htmlspecialchars($formation['description_formation']) . "</p>";
            echo "<p><strong>Durée :</strong> " . htmlspecialchars($formation['duration_formation']) . " heures</p>";
            echo "<p><strong>ID Cours :</strong> " . htmlspecialchars($formation['id_cours']) . "</p>";
            echo "<p><strong>ID Certification :</strong> " . htmlspecialchars($formation['id_certification']) . "</p>";
            echo "</div><hr>";
        }
        ?>

    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
