<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voir les Utilisateurs</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <style>
    /* CSS to make the logo smaller */
    .logo-img img {
      width: 100px; /* Adjust the size as needed */
      height: auto;
      margin-left: 70px;
    }

    /* Custom button colors */
    .btn-modifier {
      background-color: #4D90FE; /* Lighter blue */
      color: white;
    }

    .btn-modifier:hover {
      background-color: #3b7dff; /* Slightly darker blue */
      color: white;
    }

    .btn-supprimer {
      background-color: #0066cc; /* Darker blue */
      color: white;
    }

    .btn-supprimer:hover {
      background-color: #005bb5; /* Slightly darker blue */
      color: white;
    }

    .btn-restrict {
      background-color: #3399ff; /* Medium blue */
      color: white;
    }

    .btn-restrict:hover {
      background-color: #3388e6; /* Slightly darker blue */
      color: white;
    }

    .form-container {
      margin-top: 20px;
    }

    .form-container input,
    .form-container select {
      margin-bottom: 15px;
    }

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
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="fas fa-home fs-6"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./adduser.html" aria-expanded="false">
                <span>
                  <i class="fas fa-user-plus fs-6"></i>
                </span>
                <span class="hide-menu">Gérer Les Utilisateurs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./settings.html" aria-expanded="false">
                <span>
                  <i class="fas fa-cogs fs-6"></i>
                </span>
                <span class="hide-menu">Paramètres</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./reports.html" aria-expanded="false">
                <span>
                  <i class="fas fa-chart-line fs-6"></i>
                </span>
                <span class="hide-menu">Rapports</span>
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
        <!-- Button above the table -->
        <button class="btn btn-primary mb-3 ms-auto d-block" onclick="showAddUserForm()">Ajouter Utilisateur</button>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Utilisateurs</h5>
            <div class="table-responsive">
              <table class="table text-nowrap align-middle mb-0">
                <thead>
                  <tr class="border-2 border-bottom border-primary border-0">
                    <th scope="col" class="ps-0">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse Email</th>
                    <th scope="col">Niveau Universitaire</th>
                    <th scope="col">Université</th>
                    <th scope="col">Rôle</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <!-- User Entries -->
                  <tr>
                    <th scope="row" class="ps-0 fw-medium">Bennour</th>
                    <td>Adem</td>
                    <td>Adem.bennour@mail.com</td>
                    <td>3ème année</td>
                    <td>Esprit</td>
                    <td>Etudiant</td>
                    <td class="text-center">
                      <button class="btn btn-modifier btn-sm" onclick="showEditUserForm('Bennour', 'Adem', 'adem.bennour@mail.com', '3ème année', 'Esprit', 'Etudiant')">Modifier</button>
                      <button class="btn btn-supprimer btn-sm">Supprimer</button>
                      <button class="btn btn-restrict btn-sm">Restrict</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" class="ps-0 fw-medium">Rayen</th>
                    <td>Jarray</td>
                    <td>Jarray.rayen@mail.com</td>
                    <td>2ème année</td>
                    <td>MedTech</td>
                    <td>Gestionnaire de stages</td>
                    <td class="text-center">
                      <button class="btn btn-modifier btn-sm" onclick="showEditUserForm('Rayen', 'Jarray', 'Jarray.rayen@mail.com', '2ème année', 'MedTech', 'Gestionnaire de stages')">Modifier</button>
                      <button class="btn btn-supprimer btn-sm">Supprimer</button>
                      <button class="btn btn-restrict btn-sm">Restrict</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row" class="ps-0 fw-medium">Anas</th>
                    <td>Lemjid</td>
                    <td>anas.lemjid@gmail.com</td>
                    <td>4ème année</td>
                    <td>Faculte des sciences</td>
                    <td>Gestionnaire de formations</td>
                    <td class="text-center">
                      <button class="btn btn-modifier btn-sm" onclick="showEditUserForm('Lemjid', 'anas', 'anas.lemjid@gmail.com', '4ème année', 'Faculte des sciences', 'Gestionnaire des formations')">Modifier</button>
                      <button class="btn btn-supprimer btn-sm">Supprimer</button>
                      <button class="btn btn-restrict btn-sm">Restrict</button>
                    </td>
                  </tr>
                  <!-- More user entries... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Add User Form -->
<!-- Add User Form -->
<div id="addUserForm" class="form-container" style="display: none;">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">Ajouter un Utilisateur</h5>
      <form id="addUser">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" required>
        </div>
        <div class="mb-3">
          <label for="prenom" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="prenom" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" required>
        </div>
        
        <!-- Combo box for Niveau Universitaire -->
        <div class="mb-3">
          <label for="niveauUniversitaire" class="form-label">Niveau Universitaire</label>
          <select name="niveauUniversitaire" id="niveauUniversitaire" class="form-control" required>
            <option value=""></option>
            <option value="1ere">1ère année</option>
            <option value="2eme">2ème année</option>
            <option value="3eme">3ème année</option>
            <option value="4eme">4ème année</option>
            <option value="5eme">5ème année</option>
          </select>
        </div>
        
        <!-- Combo box for Université -->
        <div class="mb-3">
          <label for="universite" class="form-label">Université</label>
          <select name="universite" id="universite" class="form-control" required>
            <option value=""></option>
            <option value="Esprit">Esprit</option>
            <option value="MedTech">MedTech</option>
            <option value="Faculte des sciences">Faculté des sciences</option>
            <option value="enit">ENIT</option>
          </select>
        </div>

        <!-- Combo box for Rôle -->
        <div class="mb-3">
          <label for="role" class="form-label">Rôle</label>
          <select name="role" id="role" class="form-control" required>
            <option value=""></option>
            <option value="etudiant">Etudiant</option>
            <option value="gestionnaire_des_cours">Gestionnaire des cours</option>
            <option value="gestionnaire_des_formations">Gestionnaire des formations</option>
            <option value="gestionnaire_des_stages">Gestionnaire des stages</option>
            <option value="gestionnaire_des_quizz">Gestionnaire des Quizz</option>
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <button type="button" class="btn btn-secondary" onclick="hideForms()">Annuler</button>
      </form>
    </div>
  </div>
</div>


        <!-- Edit User Form -->
<!-- Edit User Form -->
<div id="editUserForm" class="form-container" style="display: none;">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">Modifier l'Utilisateur</h5>
      <form id="editUser">
        <div class="mb-3">
          <label for="editNom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="editNom" required>
        </div>
        <div class="mb-3">
          <label for="editPrenom" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="editPrenom" required>
        </div>
        <div class="mb-3">
          <label for="editEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="editEmail" required>
        </div>
        
        <!-- Combo box for Niveau Universitaire -->
        <div class="mb-3">
          <label for="editNiveau" class="form-label">Niveau Universitaire</label>
          <select name="editNiveau" id="editNiveau" class="form-control" required>
            <option value=""></option>
            <option value="1ere">1ère année</option>
            <option value="2eme">2ème année</option>
            <option value="3eme">3ème année</option>
            <option value="4eme">4ème année</option>
            <option value="5eme">5ème année</option>
          </select>
        </div>

        <!-- Combo box for Université -->
        <div class="mb-3">
          <label for="editUniversite" class="form-label">Université</label>
          <select name="editUniversite" id="editUniversite" class="form-control" required>
            <option value=""></option>
            <option value="Esprit">Esprit</option>
            <option value="MedTech">MedTech</option>
            <option value="Faculte des sciences">Faculté des sciences</option>
            <option value="enit">ENIT</option>
          </select>
        </div>

        <!-- Combo box for Rôle -->
        <div class="mb-3">
          <label for="editRole" class="form-label">Rôle</label>
          <select name="editRole" id="editRole" class="form-control" required>
            <option value=""></option>
            <option value="etudiant">Etudiant</option>
            <option value="gestionnaire_des_cours">Gestionnaire des cours</option>
            <option value="gestionnaire_des_formations">Gestionnaire des formations</option>
            <option value="gestionnaire_des_stages">Gestionnaire des stages</option>
            <option value="gestionnaire_des_quizz">Gestionnaire des Quizz</option>
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <button type="button" class="btn btn-secondary" onclick="hideForms()">Annuler</button>
      </form>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>

  <script>
    // Show Add User Form
    function showAddUserForm() {
      document.getElementById('addUserForm').style.display = 'block';
      document.getElementById('editUserForm').style.display = 'none';
    }

    // Show Edit User Form with pre-filled data
    function showEditUserForm(nom, prenom, email, niveau, universite, role) {
      document.getElementById('addUserForm').style.display = 'none';
      document.getElementById('editUserForm').style.display = 'block';
      document.getElementById('editNom').value = nom;
      document.getElementById('editPrenom').value = prenom;
      document.getElementById('editEmail').value = email;
      document.getElementById('editNiveau').value = niveau;
      document.getElementById('editUniversite').value = universite;
      document.getElementById('editRole').value = role;
    }

    // Hide both forms
    function hideForms() {
      document.getElementById('addUserForm').style.display = 'none';
      document.getElementById('editUserForm').style.display = 'none';
    }
  </script>
</body>

</html>
    