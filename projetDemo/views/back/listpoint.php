<?php
include '../../controller/PointP.php';
$pointP = new PointP();
// Gestion de la recherche
if (isset($_POST['search'])) {
    $list = $pointP->chercher($_POST['search']);
  }
  // Gestion du tri
  elseif (isset($_GET['order'])) {
    $list = $pointP->trier($_GET['order']);
  }
  // Liste par défaut
  else {
    $list = $pointP->listPoints();
  }
  
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
      


    <div class="container mt-5">
    <div class="d-flex justify-content-between mb-5">
        <!-- Formulaire de recherche -->
        <form action="listpoint.php" method="post" class="d-flex" style="width: 100%; max-width: 600px;">
            <input type="text" name="search" class="form-control rounded-start" id="recherche" placeholder="Rechercher un point">
            <button class="btn btn-outline-primary rounded-end" type="submit">Rechercher</button>
        </form>

        <!-- Formulaire de tri -->
        <form action="listpoint.php" method="get" class="d-flex" style="max-width: 250px;">
            <label for="order">Trier par points :</label>
            <select name="order" id="order" class="form-control" onchange="this.form.submit()">
                <option value="ASC" <?= isset($_GET['order']) && $_GET['order'] == 'ASC' ? 'selected' : ''; ?>>Croissant</option>
                <option value="DESC" <?= isset($_GET['order']) && $_GET['order'] == 'DESC' ? 'selected' : ''; ?>>Décroissant</option>
            </select>
        </form>
    </div>
</div>









<div class="container">
    <h1>Liste des Points</h1>
    <a href="addpoint.php" class="btn btn-primary">Ajouter un Point</a>
    <a href="generate_pdf.php" class="btn btn-success">Télécharger PDF</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Points</th>
                    <th>Date</th>
                    <th>Quizz</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $point): ?>
                    <tr>
                        <td><?= htmlspecialchars($point['id_point']); ?></td>
                        <td><?= htmlspecialchars($point['points']); ?></td>
                        <td><?= htmlspecialchars($point['date_points']); ?></td>
                        <td><?= htmlspecialchars($point['nom_quizz']); ?></td> <!-- Affiche le nom du quizz -->
                        <td>
                        <a href="updatepoint.php?id_point=<?= $point['id_point']; ?>" class="btn btn-warning">Modifier</a>
                        </td>
                        <td>
                            <a href="deletepoint.php?id=<?= $point['id_point']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce point ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


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