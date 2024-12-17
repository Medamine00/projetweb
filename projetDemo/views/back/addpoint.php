<?php
include 'C:/xampp/htdocs/projetDemo/controller/PointP.php';
include 'C:/xampp/htdocs/projetDemo/models/Point.php'; // Ajout pour inclure la classe Point

$pointP = new PointP();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $points = $_POST['points'];
    $date_points = $_POST['date_points'];
    $id_pointquizz = $_POST['id_pointquizz'];

    $point = new Point(0, $points, $date_points, $id_pointquizz);
    $pointP->addPoint($point);
    header('Location: listpoint.php');
    exit();
}

// Récupérer la liste des quizzes disponibles
$quizzes = $pointP->listQuizzes();
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
   
















    <style>
    form {
        max-width: 400px;
        margin: auto;
        font-family: Arial, sans-serif;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input, select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: -10px;
        margin-bottom: 10px;
        display: none;
    }

    .field-error {
        border-color: red;
    }
</style>


<form id="pointForm" method="POST">
    <label>Points:</label>
    <input type="number" name="points" id="points">
    <div class="error-message" id="pointsError">Veuillez saisir un nombre de points valide (supérieur ou égal à 0).</div>

    <label>Date:</label>
    <input type="date" name="date_points" id="date_points">
    <div class="error-message" id="dateError">Veuillez sélectionner une date valide (pas dans le futur).</div>

    <label>Quizz:</label>
    <select name="id_pointquizz" id="id_pointquizz">
        <option value="">Sélectionnez un quizz</option>
        <?php foreach ($quizzes as $quizz) : ?>
            <option value="<?= $quizz['id_quizz']; ?>"><?= htmlspecialchars($quizz['nom_quizz']); ?></option>
        <?php endforeach; ?>
    </select>
    <div class="error-message" id="quizzError">Veuillez sélectionner un quizz.</div>

    <button type="submit">Ajouter</button>
</form>

<script>
    document.getElementById("pointForm").addEventListener("submit", function (event) {
        let isValid = true;

        // Points validation
        const pointsField = document.getElementById("points");
        const pointsError = document.getElementById("pointsError");
        if (pointsField.value === "" || pointsField.value < 0) {
            pointsError.style.display = "block";
            pointsField.classList.add("field-error");
            isValid = false;
        } else {
            pointsError.style.display = "none";
            pointsField.classList.remove("field-error");
        }

        // Date validation
        const dateField = document.getElementById("date_points");
        const dateError = document.getElementById("dateError");
        const selectedDate = new Date(dateField.value);
        const today = new Date();
        if (isNaN(selectedDate.getTime()) || selectedDate > today) {
            dateError.style.display = "block";
            dateField.classList.add("field-error");
            isValid = false;
        } else {
            dateError.style.display = "none";
            dateField.classList.remove("field-error");
        }

        // Quizz validation
        const quizzField = document.getElementById("id_pointquizz");
        const quizzError = document.getElementById("quizzError");
        if (quizzField.value === "") {
            quizzError.style.display = "block";
            quizzField.classList.add("field-error");
            isValid = false;
        } else {
            quizzError.style.display = "none";
            quizzField.classList.remove("field-error");
        }

        // Prevent form submission if invalid
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>




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