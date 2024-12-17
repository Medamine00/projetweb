<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="./assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <!-- Sidebar Content... -->
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Sidebar End -->
    
    <!-- Main Wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <!-- Navbar Items... -->
          </ul>
        </nav>
      </header>
      <!-- Header End -->
      
      <!-- Main Content -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Gestion des Formations</h5>
            <div class="mb-4">
              <a href="http://localhost/elearning/view/ajouter_formations.php" class="btn btn-primary me-2">Ajouter une formation</a>
              <a href="http://localhost/elearning/view/supprimer_formations.php" class="btn btn-danger me-2">Supprimer une formation</a>
              <a href="http://localhost/elearning/view/modifier_formation.php" class="btn btn-warning me-2">Modifier une formation</a>
            </div>
            <!-- Formations Table -->
            <h5 class="card-title fw-semibold mb-4">Afficher les Formations</h5>
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Formation</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Durée</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // Include the database connection file
                    include 'path_to_your_db_connection.php'; // Replace with the correct path to your database connection file

                    // SQL Query to fetch the formations data
                    $query = "SELECT * FROM formation";  // Replace 'formations' with your actual table name
                    $result = $conn->query($query);

                    // Loop through the rows and display data
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['id_formation'] . "</td>
                                    <td>" . $row['titre_formation'] . "</td>
                                    <td>" . $row['description_formation'] . "</td>
                                    <td>" . $row['duree_formation'] . "</td>
                                    <td>
                                      <a href='modifier_formation.php?id=" . $row['id_formation'] . "' class='btn btn-warning btn-sm'>Modifier</a>
                                      <a href='supprimer_formation.php?id=" . $row['id_formation'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Aucune formation trouvée</td></tr>";
                    }
                    
                    // Close the connection
                    $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        <!-- Footer -->
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
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
