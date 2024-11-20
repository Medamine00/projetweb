<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une Formation</title>
    <!-- Include Bootstrap for Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the Supprimer button */
        .btn-supprimer {
            background-color: #4fa3f7; /* Lighter blue */
            color: white;
            border: none;
            font-size: 18px;
        }

        .btn-supprimer:hover {
            background-color: #3d8bcc; /* Darker blue on hover */
            color: white;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Supprimer une Formation</h2>
        <div class="card shadow p-4">
            <?php
            // Inclure la connexion à la base de données
            include 'index.php';

            // Logic for deleting a formation
            if (isset($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
                $id_formation = $_GET['id'];

                // Supprimer la formation
                $sql = "DELETE FROM Formation WHERE id_formation = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$id_formation])) {
                    echo "<div class='alert alert-success text-center'>Formation supprimée avec succès !</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Erreur lors de la suppression de la formation.</div>";
                }
            } elseif (isset($_GET['delete'])) {
                echo "<div class='alert alert-warning text-center'>Veuillez sélectionner une formation à supprimer.</div>";
            }

            // Fetch all formations
            $sql = "SELECT id_formation, nom_formation FROM Formation";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $formations = $stmt->fetchAll();
            ?>

            <form method="GET">
                <div class="mb-3">
                    <label for="formation" class="form-label">Choisissez une formation</label>
                    <select id="formation" name="id" class="form-select">
                        <option value="">--Sélectionner une formation--</option>
                        <?php
                        foreach ($formations as $formation) {
                            echo '<option value="' . htmlspecialchars($formation['id_formation']) . '">'
                                . htmlspecialchars($formation['nom_formation']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="delete" class="btn btn-supprimer">Supprimer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
