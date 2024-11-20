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
    <!-- Include Bootstrap for Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Liste des Formations</h2>
        <div class="card shadow p-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Formations Disponibles</h5>
                <table>
                    <thead>
                        <tr>
                            <th>Nom de la Formation</th>
                            <th>Description</th>
                            <th>Durée (en heures)</th>
                            <th>ID Cours</th>
                            <th>ID Certification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($formations as $formation): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($formation['nom_formation']); ?></td>
                            <td><?php echo htmlspecialchars($formation['description_formation']); ?></td>
                            <td><?php echo htmlspecialchars($formation['duration_formation']); ?></td>
                            <td><?php echo htmlspecialchars($formation['id_cours']); ?></td>
                            <td><?php echo htmlspecialchars($formation['id_certification']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
