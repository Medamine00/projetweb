<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter un Utilisateur</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
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
            <img src="../assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
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
            <li class="sidebar-item">
              <a class="sidebar-link" href="./adduser.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:user-plus" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Ajouter un Utilisateur</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./manageusers.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="bi:person-lines-fill" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Gérer les Utilisateurs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./viewcourses.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="ic:baseline-school" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Voir les Cours</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./addcourse.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:book-open" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Ajouter un Cours</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./viewtrainings.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:clipboard-alt" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Voir les Formations</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./addtraining.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:graduation-cap" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Ajouter une Formation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./viewstages.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:briefcase" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Voir les Stages</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./addstage.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:plus-circle" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Ajouter un Stage</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./viewquizzes.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:question-circle" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Voir les Quizz</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./addquiz.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="uil:plus-square" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Ajouter un Quizz</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Sidebar End -->
    <!-- Main wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <!-- Header End -->

      <!-- Page Content -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ajouter un Utilisateur</h5>
            <div class="card">
              <div class="card-body">
                <form action="/addUser" method="POST">
                  <div class="mb-3">
                    <label for="nom" class="form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required><br><br>
                  </div>

                  <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom:</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required><br><br>
                  </div>

                  <div class="mb-3">
                    <label for="niveauUniversitaire" class="form-label">Niveau Universitaire:</label>
                    <select name="niveauUniversitaire" id="niveauUniversitaire" class="form-select" required>
                      <option value=""></option>
                      <option value="1ere">— 1ère année</option>
                      <option value="2eme">— 2ème année</option>
                      <option value="3eme">— 3ème année</option>
                      <option value="4eme">— 4ème année</option>
                      <option value="5eme">— 5ème année</option>
                    </select><br><br>
                  </div>

                  <div class="mb-3">
                    <label for="universite" class="form-label">Université:</label>
                    <select name="universite" id="universite" class="form-select" required>
                      <option value=""></option>
                      <option value="Esprit">— Esprit</option>
                      <option value="MedTech">— MedTech</option>
                      <option value="Faculte des sciences">— Faculté des sciences</option>
                      <option value="enit">— ENIT</option>
                      <option value="Thriller">— Thriller</option>
                    </select><br><br>
                  </div>

                  <div class="mb-3">
                    <label for="adresseMail" class="form-label">Adresse Mail:</label>
                    <input type="email" class="form-control" id="adresseMail" name="adresseMail" required><br><br>
                  </div>

                  <div class="mb-3">
                    <label for="role" class="form-label">Rôle:</label>
                    <select name="role" id="role" class="form-select" required>
                      <option value=""></option>
                      <option value="etudiant">— Etudiant</option>
                      <option value="gestionnaire_des_cours">— Gestionnaire des cours</option>
                      <option value="gestionnaire_des_formations">— Gestionnaire des formations</option>
                      <option value="gestionnaire_des_stages">— Gestionnaire des stages</option>
                      <option value="gestionnaire_des_quizz">— Gestionnaire des Quizz</option>
                    </select><br><br>
                  </div>

                  <button type="submit" class="btn btn-primary">Ajouter Utilisateur</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
