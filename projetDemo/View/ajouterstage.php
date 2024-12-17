<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'manager_des_stages' && $_SESSION['role'] !== 'admin')) {
    header('Location: login.php?error=unauthorized');
    exit();
}

require_once '../Model/User.php';
$pdo = config::getConnexion();

$search = $_GET['search'] ?? '';
$sortBy = $_GET['sortBy'] ?? 'id';
$order = $_GET['order'] ?? 'ASC';

// Fetch users and statistics
$users = User::searchAndSortUsers($pdo, $search, $sortBy, $order);
$stats = User::getUserStatistics($pdo);

?>
<style>
    .datepicker {
        z-index: 1600 !important; /* Ensures datepicker shows above other elements */
    }
    .input-group-text {
        cursor: pointer;
    }
</style>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voir les Utilisateurs</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
      <!-- Header Start -->
     
      <!-- Header End -->

      <!-- Content Start -->
      <!-- Previous HTML content remains the same -->
      <div class="container-fluid">
          <div class="card">
              <div class="card-body">
                  <h1 class="card-title fw-semibold mb-4">Add Internship</h1>
                  <?php
                  // Display success/error messages
                  if(isset($_GET['success'])) {
                      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Stage ajouté avec succès!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                  }
                  
                  if(isset($_GET['error'])) {
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Erreur lors de l\'ajout du stage. Veuillez réessayer.
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                  }
                  ?>
                  <!-- Update the form action to point to InternshipManager.php directly -->
                  <form action="InternshipManager.php" method="POST" enctype="multipart/form-data" onsubmit="return validateInternshipForm()">
    <input type="hidden" name="action" value="add">

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" id="location" name="location" class="form-control">
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <div class="input-group">
            <input type="text" class="form-control" id="start_date" name="start_date" readonly>
            <span class="input-group-text" id="start_date_icon">
                <i class="ti ti-calendar"></i>
            </span>
        </div>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <div class="input-group">
            <input type="text" class="form-control" id="end_date" name="end_date" readonly>
            <span class="input-group-text" id="end_date_icon">
                <i class="ti ti-calendar"></i>
            </span>
        </div>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Duration</label>
        <input type="text" id="duration" name="duration" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label for="field" class="form-label">Field</label>
        <input type="text" id="field" name="field" class="form-control">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Add Internship</button>
</form>
              </div>
          </div>
      </div>
<!-- Rest of your HTML remains the same -->
      <!-- Content End -->
      
      <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="text-primary text-decoration-underline">Learnify</a> Distributed by <a href="https://themewagon.com/" target="_blank" class="text-primary text-decoration-underline">Learnify</a></p>
      </div>
    </div>
  </div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.fr.min.js"></script>

</body>

<script>
function validateInternshipForm() {
    // Get all form inputs
    const title = document.getElementById('title').value.trim();
    const description = document.getElementById('description').value.trim();
    const location = document.getElementById('location').value.trim();
    const duration = document.getElementById('duration').value.trim();
    const field = document.getElementById('field').value.trim();
    const image = document.getElementById('image').value;

    // Clear any existing error messages
    clearErrors();

    let isValid = true;
    const errors = [];

    // Validate Title (minimum 3 characters)
    if (title.length < 3) {
        showError('title', 'Title must be at least 3 characters long');
        isValid = false;
    }

    // Validate Description (minimum 10 characters)
    if (description.length < 10) {
        showError('description', 'Description must be at least 10 characters long');
        isValid = false;
    }

    // Validate Location
    if (location.length < 2) {
        showError('location', 'Please enter a valid location');
        isValid = false;
    }

    // Validate Duration (can add specific format validation if needed)
    if (duration.length < 1) {
        showError('duration', 'Please enter a valid duration');
        isValid = false;
    }

    // Validate Field
    if (field.length < 2) {
        showError('field', 'Please enter a valid field');
        isValid = false;
    }

    // Validate Image
    if (!image && !document.querySelector('form').getAttribute('data-edit')) {
        showError('image', 'Please select an image');
        isValid = false;
    }

    return isValid;
}

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message text-danger mt-1';
    errorDiv.innerHTML = message;
    field.parentNode.appendChild(errorDiv);
    field.classList.add('is-invalid');
}

function clearErrors() {
    // Remove all error messages
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(error => error.remove());

    // Remove invalid class from inputs
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => input.classList.remove('is-invalid'));
}

// Add some CSS for error styling
const style = document.createElement('style');
style.textContent = `
    .error-message {
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .is-invalid {
        border-color: #dc3545;
    }
`;
document.head.appendChild(style);
</script>
<script>
$(document).ready(function() {
    // Initialize datepickers
    $('#start_date, #end_date').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        language: 'fr',
        todayHighlight: true,
        startDate: new Date()
    });

    // Handle calendar icon clicks
    $('#start_date_icon').click(function() {
        $('#start_date').datepicker('show');
    });

    $('#end_date_icon').click(function() {
        $('#end_date').datepicker('show');
    });

    // Calculate duration when dates change
    function calculateDuration() {
        const startDate = $('#start_date').datepicker('getDate');
        const endDate = $('#end_date').datepicker('getDate');

        if (startDate && endDate) {
            // Calculate the difference in months
            const months = (endDate.getFullYear() - startDate.getFullYear()) * 12 + 
                          (endDate.getMonth() - startDate.getMonth());
            const days = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24));

            let duration = '';
            if (months > 0) {
                duration += months + (months === 1 ? ' mois ' : ' mois ');
            }
            if (days % 30 > 0) {
                duration += (days % 30) + (days % 30 === 1 ? ' jour' : ' jours');
            }
            $('#duration').val(duration.trim());
        }
    }

    // Update duration when dates change
    $('#start_date, #end_date').on('changeDate', calculateDuration);

    // Add date validation to the form validation
    const originalValidateForm = window.validateInternshipForm;
    window.validateInternshipForm = function() {
        const isOriginalValid = originalValidateForm();
        const startDate = $('#start_date').val();
        const endDate = $('#end_date').val();

        if (!startDate) {
            showError('start_date', 'Start date is required');
            return false;
        }
        if (!endDate) {
            showError('end_date', 'End date is required');
            return false;
        }

        const start = $('#start_date').datepicker('getDate');
        const end = $('#end_date').datepicker('getDate');
        if (start && end && start > end) {
            showError('end_date', 'End date must be after start date');
            return false;
        }

        return isOriginalValid;
    };
});
</script>

</html>
