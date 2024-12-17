<?php
include '../../controller/PointP.php';
$pointP = new PointP();

// Vérifier si l'ID du point est passé dans l'URL
if (isset($_GET['id_point'])) {
    $id_point = $_GET['id_point'];

    // Récupérer les informations du point
    $point = $pointP->getPointById($id_point);

    // Vérifier si un point a été trouvé avec cet ID
    if (!$point) {
        echo "Point non trouvé.";
        exit();
    }
} else {
    echo "ID du point manquant dans l'URL.";
    exit();
}

// Vérifier si le formulaire a été soumis pour la mise à jour
if (isset($_POST['update'])) {
    // Récupérer les nouvelles valeurs du formulaire
    $points = $_POST['points'];
    $date_points = $_POST['date_points'];
    $id_pointquizz = $_POST['id_pointquizz'];

    // Appeler la méthode pour mettre à jour le point
    $pointP->updatePoint($id_point, $points, $date_points, $id_pointquizz);

    // Rediriger après mise à jour
    header('Location: listpoint.php');
    exit();
}

// Récupérer la liste des quizzes pour afficher dans le formulaire
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
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="listQuizz.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Quizz</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="listpoint.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Notes</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6" class="fs-6"></iconify-icon>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4" class="fs-6"></iconify-icon>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-primary-subtle position-relative mb-7 mt-7 rounded-3"> 
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-75">Upgrade to pro</h6>
                <a href="#" target="_blank"
                  class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
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


    <form id="updatePointForm" method="POST">
    <label>Points:</label>
    <input type="number" name="points" id="points" value="<?= htmlspecialchars($point['points']) ?>">
    <div class="error-message" id="pointsError">Veuillez saisir un nombre de points valide (supérieur ou égal à 0).</div>

    <label>Date:</label>
    <input type="date" name="date_points" id="date_points" value="<?= htmlspecialchars($point['date_points']) ?>">
    <div class="error-message" id="dateError">Veuillez sélectionner une date valide (pas dans le futur).</div>

    <label>Quizz:</label>
    <select name="id_pointquizz" id="id_pointquizz">
        <?php foreach ($quizzes as $quizz): ?>
            <option value="<?= $quizz['id_quizz']; ?>" <?= $point['id_pointquizz'] == $quizz['id_quizz'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($quizz['nom_quizz']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div class="error-message" id="quizzError">Veuillez sélectionner un quizz.</div>

    <button type="submit" name="update">Mettre à jour</button>
</form>

<script>
    document.getElementById("updatePointForm").addEventListener("submit", function (event) {
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