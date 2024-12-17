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
        echo "<div class='notification error'>L'ID de la certification n'existe pas dans la table des certifications.</div>";
    } else {
        // Insert the data into the database
        $sql = "INSERT INTO formation (nom_formation, description_formation, duration_formation, id_cours, id_certification)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$nom_formation, $description_formation, $duration_formation, $id_cours, $id_certification])) {
            header('Location: afficher_formation.php?status=success');
            exit;
        } else {
            echo "<div class='notification error'>Erreur lors de l'ajout de la formation.</div>";
        }
    }
}

// Fetch all formations from the database, sorted by duration
$sql = "SELECT * FROM formation ORDER BY duration_formation ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$formations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste et Ajout des Formations</title>
    <link rel="stylesheet" href="../backoffice/assets/css/styles.min.css">
    <script>
        function validernom() {
            var nomFormation = document.forms["formationForm"]["nom_formation"].value;

            var regex = /^[a-zA-Z\s]+$/;
            if (!regex.test(nomFormation)) {
                alert("Le nom de la formation doit contenir uniquement des lettres.");
                return false;
            }
            
            return true;
        }

        function validerdescription() {
            var descriptionFormation = document.forms["formationForm"]["description_formation"].value;
            if (descriptionFormation.length < 50) {
                alert("La description doit contenir au moins 50 caractères.");
                return false;
            }
            
            return true; 
        }

        function validateForm() {
            if (!validernom()) return false;
            if (!validerdescription()) return false;

            return true;
        }
    </script>
</head>
<style>
    /* CSS to make the logo smaller */
    .logo-img img {
      width: 100px; /* Adjust the size as needed */
      height: auto;
      margin-left: 70px;
    }

    /* Custom button colors */
   

  
  </style>
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../images/logo.png" alt="Logo" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="fas fa-times fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="fas fa-ellipsis-h nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="userDetails.php" aria-expanded="false">
                <span>
                  <i class="fas fa-home fs-6"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ajouterstage.php" aria-expanded="false">
                <span>
                  <i class="fas fa-user-plus fs-6"></i>
                </span>
                <span class="hide-menu">Add Internship</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="listeDesStages.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Internships List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../views/back/addquizz.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Add quiz</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../views/back/addpoint.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Add point</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../views/back/listpoint.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Points List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../views/back/listQuizz.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Quiz List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../views/back/ui-Courses.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Courses</span>
              </a>
            </li>
            <li class="sidebar-item">
                            <a class="sidebar-link" href="afficher_formation.php" aria-expanded="false">
                                <span>
                                </span>
                                <span class="hide-menu">Formation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="afficher_certification.php" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:certificate-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Certification</span>
                            </a>
                        </li>
          </ul>
        </nav>
      </div>
    </aside>
        <!-- Sidebar End -->

        <!-- Main Wrapper -->
        <div class="body-wrapper">
            <div class="container">
                <div class="card p-4">
                    <h2 class="card-title">Ajouter une Formation</h2>
                    <form name="formationForm" method="POST" onsubmit="return validateForm();">
                        <div class="mb-3">
                            <label for="nom_formation" class="form-label">Nom de la Formation :</label>
                            <input type="text" id="nom_formation" name="nom_formation" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="description_formation" class="form-label">Description :</label>
                            <textarea id="description_formation" name="description_formation" class="form-control" ></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="duration_formation" class="form-label">Durée :</label>
                            <input type="text" id="duration_formation" name="duration_formation" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="id_cours" class="form-label">ID du Cours :</label>
                            <input type="number" id="id_cours" name="id_cours" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="id_certification" class="form-label">ID de la Certification :</label>
                            <input type="number" id="id_certification" name="id_certification" class="form-control" >
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter la Formation</button>
                    </form>
                </div>

                <div class="card p-4 mt-4">
                    <h2 class="card-title">Liste des Formations</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Durée</th>
                                <th>ID Cours</th>
                                <th>ID Certification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($formations as $formation): ?>
                            <tr>
                                <td><?= htmlspecialchars($formation['nom_formation']) ?></td>
                                <td><?= htmlspecialchars($formation['description_formation']) ?></td>
                                <td><?= htmlspecialchars($formation['duration_formation']) ?></td>
                                <td><?= htmlspecialchars($formation['id_cours']) ?></td>
                                <td><?= htmlspecialchars($formation['id_certification']) ?></td>
                                <td>
                                    <a href="modifier_formation.php?id=<?= htmlspecialchars($formation['id_formation']) ?>" class="btn btn-sm btn-primary">Modifier</a>
                                    <a href="supprimer_formation.php?id=<?= htmlspecialchars($formation['id_formation']) ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
