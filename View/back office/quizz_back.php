<?php

include "../controller/quizz_controller.php"; // Assurez-vous d'utiliser le contrôleur adapté
$quizzController = new QuizzController();
$list = $quizzController->listQuizz(); // Méthode pour récupérer tous les quizz
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Quizz</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <h1>Liste des Quizz</h1>

    <?php if (!empty($list)) { ?>
        <table>
            <tr>
                <th>ID Quizz</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Durée (minutes)</th>
            </tr>
            <?php foreach ($list as $quizz) { ?>
                <tr>
                    <td><?= htmlspecialchars($quizz['id_quizz']); ?></td>
                    <td><?= htmlspecialchars($quizz['nom_quizz']); ?></td>
                    <td><?= htmlspecialchars($quizz['description_quizz']); ?></td>
                    <td><?= htmlspecialchars($quizz['duration_quizz']); ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>Aucun quizz trouvé.</p>
    <?php } ?>
</body>

</html>
