<?php
include '../../controller/QuizzQ.php';

// Instancier le contrôleur et récupérer la liste des quizz
$quizzQ = new QuizzQ();
$list = $quizzQ->listQuizz();


$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$recherche = isset($_POST['search']) ? $_POST['search'] : null;

// Liste des quizz avec tri et recherche
$list = $quizzQ->listQuizz($order, $recherche);


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
<h1>Learnify</h1>
  <link rel="stylesheet" href="assets/css/styles.min.css" />
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
            <img src="../../images/logo.png" alt="Logo" />
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
              <a class="sidebar-link" href="../../View/userDetails.php" aria-expanded="false">
                <span>
                  <i class="fas fa-home fs-6"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../View/ajouterstage.php" aria-expanded="false">
                <span>
                  <i class="fas fa-user-plus fs-6"></i>
                </span>
                <span class="hide-menu">Add Internship</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../../View/listeDesStages.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Internships List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="addquizz.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Add quiz</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="addpoint.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Add point</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="listpoint.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Points List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="listQuizz.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Quiz List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ui-Courses.php" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Courses</span>
              </a>
            </li>
            <li class="sidebar-item">
                            <a class="sidebar-link" href="../../View/afficher_formation.php" aria-expanded="false">
                                <span>
                                </span>
                                <span class="hide-menu">Formation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="../../View/afficher_certification.php" aria-expanded="false">
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
    <style>
          .logo-img img {
      width: 100px; /* Adjust the size as needed */
      height: auto;
      margin-left: 70px;
    }

    </style>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
     
      <!--  Header End -->



      

    <!-- Formulaire de recherche et tri -->
<div class="container mt-5">
    <form action="listQuizz.php" method="post" class="d-flex" style="width: 100%; max-width: 600px;">
        <input type="text" name="search" class="form-control rounded-start" placeholder="Rechercher un quizz" value="<?= htmlspecialchars($recherche) ?>">
        <button class="btn btn-outline-primary rounded-end" type="submit">Rechercher</button>
    </form>

    <form action="listQuizz.php" method="get" class="d-flex mt-3" style="max-width: 250px;">
        <label for="order">Trier par date :</label>
        <select name="order" id="order" class="form-control" onchange="this.form.submit()">
            <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Croissant</option>
            <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Décroissant</option>
        </select>
    </form>
</div>









<body>
    <div class="container">
        <!-- Entête de page avec bouton pour ajouter un quizz -->
        <div class="d-flex justify-content-between">
            <h1>Liste des Quizz</h1>
            <a href="addquizz.php" class="btn btn-primary">Ajouter un Quizz</a>
        </div>

        <!-- Tableau des quizz -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom du Quizz</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Boucle pour afficher chaque quizz dans le tableau
                    foreach ($list as $quizz) {
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($quizz['id_quizz']); ?></td>
                            <td><?= htmlspecialchars($quizz['nom_quizz']); ?></td>
                            <td><?= htmlspecialchars($quizz['description_quizz']); ?></td>
                            <td><?= htmlspecialchars($quizz['date_quizz']); ?></td>
                            <td>
                                <!-- Lien vers la page de modification du quizz -->
                                <a href="updatequizz.php?id_quizz=<?= htmlspecialchars($quizz['id_quizz']) ?>" class="btn btn-warning">Modifier</a>
                                </td>
                            <td>
                                <!-- Lien de suppression avec confirmation -->
                                <a href="deletequizz.php?id_quizz=<?= htmlspecialchars($quizz['id_quizz']); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quizz ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</html>