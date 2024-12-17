<?php
include '../../controller/QuizzQ.php';
$quizzQ = new QuizzQ();

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET["id_quizz"])) {
    $id_quizz = $_GET["id_quizz"];
    // Récupérer les informations du quizz
    $quizz = $quizzQ->getQuizzById($id_quizz);

    // Vérifier si un quizz a été trouvé avec cet ID
    if (!$quizz) {
        echo "Quizz non trouvé.";
        exit();
    }
} else {
    echo "ID du quizz manquant dans l'URL.";
    exit();
}

if (isset($_POST["update"])) {
    // Récupérer les nouvelles valeurs
    $new_nom_quizz = $_POST["nom_quizz"];
    $new_description_quizz = $_POST["description_quizz"];
    $new_date_quizz = $_POST["date_quizz"];

    // Appel à la méthode pour mettre à jour le quizz
    $quizzQ->updateQuizz($id_quizz, $new_nom_quizz, $new_description_quizz, $new_date_quizz);
    header("Location: listQuizz.php"); // Redirection après mise à jour
    exit();
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
        .error-message {
            color: red;
            display: none;
            font-size: 0.9em;
        }
    </style>
    <body>
    <h1>Modifier un Quizz</h1>
    <form action="" method="POST" id="update_quizz_form">
        <label for="nom_quizz">Nom du Quizz :</label>
        <input type="text" id="nom_quizz" name="nom_quizz" value="<?= htmlspecialchars($quizz['nom_quizz']) ?>" required>
        <div id="nom_quizz_error" class="error-message">Le nom du quizz doit contenir au moins 5 caractères.</div><br>

        <label for="description_quizz">Description :</label>
        <textarea id="description_quizz" name="description_quizz" required><?= htmlspecialchars($quizz['description_quizz']) ?></textarea>
        <div id="description_quizz_error" class="error-message">La description doit contenir au moins 10 caractères.</div><br>

        <label for="date_quizz">Date du Quizz :</label>
        <input type="date" id="date_quizz" name="date_quizz" value="<?= htmlspecialchars($quizz['date_quizz']) ?>" required>
        <div id="date_quizz_error" class="error-message">La date doit être valide.</div><br>

        <button type="submit" name="update">Mettre à jour</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("update_quizz_form");

            const nomQuizzInput = document.getElementById("nom_quizz");
            const descriptionQuizzInput = document.getElementById("description_quizz");
            const dateQuizzInput = document.getElementById("date_quizz");

            const nomQuizzError = document.getElementById("nom_quizz_error");
            const descriptionQuizzError = document.getElementById("description_quizz_error");
            const dateQuizzError = document.getElementById("date_quizz_error");

            form.addEventListener("submit", (e) => {
                let isValid = true;

                // Validation du champ "Nom du Quizz"
                if (nomQuizzInput.value.trim().length < 5) {
                    nomQuizzError.style.display = "block";
                    isValid = false;
                } else {
                    nomQuizzError.style.display = "none";
                }

                // Validation du champ "Description"
                if (descriptionQuizzInput.value.trim().length < 10) {
                    descriptionQuizzError.style.display = "block";
                    isValid = false;
                } else {
                    descriptionQuizzError.style.display = "none";
                }

                // Validation du champ "Date"
                if (!dateQuizzInput.value) {
                    dateQuizzError.style.display = "block";
                    isValid = false;
                } else {
                    dateQuizzError.style.display = "none";
                }

                if (!isValid) {
                    e.preventDefault(); // Annuler l'envoi du formulaire si la validation échoue
                }
            });
        });
    </script>
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