<?php
include 'index.php'; // Database connection

// Logic to add a new certification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre_certification = $_POST['titre_certification'];
    $description_certification = $_POST['description_certification'];
    $id_formation = $_POST['id_formation'];

    // Insert the data into the database
    $sql = "INSERT INTO certifications (titre_certification, description_certification, id_formation)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$titre_certification, $description_certification, $id_formation])) {
        header('Location: afficher_certification.php?status=success');
        exit;
    } else {
        echo "<div class='notification error'>Erreur lors de l'ajout de la certification.</div>";
    }
}

// Fetch all certifications from the database
$sql = "SELECT * FROM certifications";
$stmt = $conn->prepare($sql);
$stmt->execute();
$certifications = $stmt->fetchAll();

// Fetch all formations from the database
$sql = "SELECT * FROM formation";
$stmt = $conn->prepare($sql);
$stmt->execute();
$formations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Certifications</title>
    <link rel="stylesheet" href="../backoffice/assets/css/styles.min.css">
    <script>
        function validernom() {
            var nomInput = document.forms["certificationForm"]["titre_certification"].value;
            var regex = /\d/;
            if (regex.test(nomInput)) {
                alert("Le titre de la certification ne doit pas contenir de chiffres.");
                return false;
            }

            if (nomInput.trim() === "") {
                alert("Le titre de la certification est obligatoire.");
                return false;
            }
            return true;
        }

        function validerdescription() {
            var descriptionInput = document.forms["certificationForm"]["description_certification"].value;
            if (descriptionInput.trim().length <= 50) {
                alert("La description doit contenir plus de 50 caractères.");
                return false;
            }
            return true;
        }

        function validateForm() {
            return validernom() && validerdescription();
        }
    </script>
</head>
<body>
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
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
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
                <!-- Add Certification Form -->
                <div class="card p-4">
                    <h2 class="card-title">Ajouter une Certification</h2>
                    <form method="POST" name="certificationForm" onsubmit="return validateForm();">
                        <div class="mb-3">
                            <label for="titre_certification" class="form-label">Titre de la Certification :</label>
                            <input type="text" id="titre_certification" name="titre_certification" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="description_certification" class="form-label">Description :</label>
                            <textarea id="description_certification" name="description_certification" class="form-control" ></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="id_formation" class="form-label">ID de la Formation :</label>
                            <select id="id_formation" name="id_formation" class="form-control" >
                                <option value="">Sélectionnez une formation</option>
                                <?php foreach ($formations as $formation): ?>
                                    <option value="<?= htmlspecialchars($formation['id_formation']) ?>">
                                        <?= htmlspecialchars($formation['id_formation']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter la Certification</button>
                    </form>
                </div>

                <!-- Certifications Table -->
                <div class="card p-4 mt-4">
                    <h2 class="card-title">Liste des Certifications</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>ID Formation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($certifications as $certification): ?>
                            <tr>
                                <td><?= htmlspecialchars($certification['titre_certification']) ?></td>
                                <td><?= htmlspecialchars($certification['description_certification']) ?></td>
                                <td><?= htmlspecialchars($certification['id_formation']) ?></td>
                                <td>
                                    <a href="modifier_certification.php?id=<?= htmlspecialchars($certification['id_certification']) ?>" class="btn btn-sm btn-primary">Modifier</a>
                                    <a href="supprimer_certification.php?id=<?= htmlspecialchars($certification['id_certification']) ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="generate_template.php" class="btn btn-primary">Donner les certifications</a>
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
</body>
</html>
