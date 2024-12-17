<?php
echo"fgdgfdg";
require_once 'C:/xampp/htdocs/projet/controller/QuizzQ.php';
require_once 'C:/xampp/htdocs/projet/models/Quizz.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification des champs requis
    if (
        isset($_POST["quizz_name"]) &&
        isset($_POST["quizz_description"]) &&
        isset($_POST["quizz_date"])
    ) {
        // Créer un objet Quizz
        $quizz = new Quizz(
             0, // L'ID sera géré automatiquement par la base de données
            $_POST['quizz_name'],
            $_POST['quizz_description'],
            date_quizz: $_POST['quizz_date']
        );

        // Ajouter le quizz via le contrôleur
        $quizzQ = new QuizzQ();
        if ($quizzQ->addQuizz($quizz)) {
            // Redirection en cas de succès
            header('Location: listquizz.php');
            exit;
        } else {
            echo "Erreur lors de l'ajout du quizz.";
        }
    } else {
        echo "Tous les champs sont requis.";
    }
}
?>
<?php

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
    











    <body>
    <div class="container">
        <h1>Ajouter un Quizz</h1>
        <form action="addquizz.php" method="POST" id="quizz_form" novalidate>
            <div class="form-group">
                <label for="quizz_name">Nom du Quizz:</label>
                <input type="text" name="quizz_name" class="form-control" id="quizz_name" maxlength="50">
                <span id="quizz_name_error" class="error-message">Le nom du quizz doit contenir au moins 5 caractères.</span>
            </div>
            <div class="form-group">
                <label for="quizz_description">Description:</label>
                <textarea name="quizz_description" class="form-control" id="quizz_description" maxlength="255"></textarea>
                <span id="quizz_description_error" class="error-message">La description doit contenir au moins 10 caractères.</span>
            </div>
            <div class="form-group">
                <label for="quizz_date">Date:</label>
                <input type="date" name="quizz_date" class="form-control" id="quizz_date">
                <span id="quizz_date_error" class="error-message">La date doit être valide (pas dans le futur).</span>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("quizz_form").addEventListener("submit", function (event) {
            let isValid = true;

            // Validation du nom
            const nameField = document.getElementById("quizz_name");
            const nameError = document.getElementById("quizz_name_error");
            if (nameField.value.trim().length < 5) {
                nameError.style.display = "block";
                nameField.classList.add("field-error");
                isValid = false;
            } else {
                nameError.style.display = "none";
                nameField.classList.remove("field-error");
            }

            // Validation de la description
            const descriptionField = document.getElementById("quizz_description");
            const descriptionError = document.getElementById("quizz_description_error");
            if (descriptionField.value.trim().length < 10) {
                descriptionError.style.display = "block";
                descriptionField.classList.add("field-error");
                isValid = false;
            } else {
                descriptionError.style.display = "none";
                descriptionField.classList.remove("field-error");
            }

            // Validation de la date
            const dateField = document.getElementById("quizz_date");
            const dateError = document.getElementById("quizz_date_error");
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

            // Empêche l'envoi du formulaire si des champs sont invalides
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>

<style>

.error-message {
    color: red;
    font-size: 0.9em;
    margin-top: 5px;
    display: none;
}

.field-error {
    border-color: red;
    background-color: #ffe6e6;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 1em;
    margin-top: 5px;
    box-sizing: border-box;
}

.btn {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    font-size: 1em;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

</style>



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