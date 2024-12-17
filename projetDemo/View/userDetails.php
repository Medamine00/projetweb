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
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Voir les Utilisateurs</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    input.is-invalid,
  select.is-invalid {
  border-color: #dc3545;
  background-color: #f8d7da;
}

input.is-valid,
select.is-valid {
  border-color: #28a745;
  background-color: #d4edda;
}

.invalid-feedback {
  color: #dc3545;
  margin-top: 0.25rem;
  font-size: 0.875rem;
}
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
  .btn-unrestrict {
    background-color: #3399ff; /* Medium blue */
    color: white;
  }

  .btn-unrestrict:hover {
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
  input.is-invalid,
  select.is-invalid {
  border-color: #dc3545;
  background-color: #f8d7da;
  }

input.is-valid,
select.is-valid {
border-color: #28a745;
background-color: #d4edda;
}

.invalid-feedback {
color: #dc3545;
margin-top: 0.25rem;
font-size: 0.875rem;
}
/* Stats Section Styling */
.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  margin-bottom: 20px;
}

.card {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 25px;
  text-align: center;
  position: relative;
}

.card .circle {
  width: 100px;
  height: 100px;
  margin: 0 auto 15px;
  position: relative;
}

.card .circle svg {
  transform: rotate(-90deg);
}

.card .circle circle {
  fill: none;
  stroke-width: 10;
}

.card .circle .progress {
  stroke: #007bff;
  stroke-dasharray: 440; /* Circumference of the circle */
  stroke-dashoffset: 440; /* Initially hidden */
  transition: stroke-dashoffset 1s ease-in-out;
}

.card .circle .background {
  stroke: #e9ecef;
}

.card .title {
  font-size: 18px;
  font-weight: 600;
  color: #333;
  margin-bottom: 10px;
}

.card .value {
  font-size: 28px;
  font-weight: 700;
  color: #007bff;
}

.card .info {
  font-size: 14px;
  color: #6c757d;
  margin-top: 10px;
}

.card .percentage {
  font-size: 16px;
  font-weight: 500;
  color: #28a745;
}

.card:hover .progress {
  stroke-dashoffset: calc(440 - (440 * <?= isset($stats['percentage_users']) ? $stats['percentage_users'] : 0 ?>) / 100);
}

  /* Add a little space between the stats and table */
  .table-container {
    margin-top: 40px;
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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #333a59, #181d38);
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            color: #333;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #333a59;
            color: #ffffff;
        }

        a {
            color: #333a59;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .no-data {
            text-align: center;
            font-size: 1.2em;
            color: #666;
        }
    </style>
    <!-- Main wrapper -->
    <div class="body-wrapper">
       <!-- Header Start -->
       <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <span class="nav-link">Bienvenue, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Controller/UserController.php?action=logout">Se déconnecter</a>
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
            <div class="container">
            <!-- Search and Sort -->
              <form method="GET" action="userDetails.php">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by name or email" value="<?= htmlspecialchars($search) ?>">
                  </div>
                  <div class="col-md-3">
                    <select name="sortBy" class="form-control">
                      <option value="id" <?= $sortBy === 'id' ? 'selected' : '' ?>>Sort by ID</option>
                      <option value="nom" <?= $sortBy === 'nom' ? 'selected' : '' ?>>Sort by Name</option>
                      <option value="prenom" <?= $sortBy === 'prenom' ? 'selected' : '' ?>>Sort by Surname</option>
                      <option value="role" <?= $sortBy === 'role' ? 'selected' : '' ?>>Sort by Role</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select name="order" class="form-control">
                      <option value="ASC" <?= $order === 'ASC' ? 'selected' : '' ?>>Ascending</option>
                      <option value="DESC" <?= $order === 'DESC' ? 'selected' : '' ?>>Descending</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </div>
                  <div class="actions">
                      <!-- Other user actions here -->
                      <a href="../Controller/UserController.php?action=viewAllUsers" class="btn">Voir l'historique</a>
                  </div>
                </div>
              </form>

            </div>
            

            <style>
                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #333a59;
                    color: #fff;
                    border-radius: 6px;
                    text-decoration: none;
                    font-weight: bold;
                    transition: all 0.3s ease;
                }

                .btn:hover {
                    background-color: #181d38;
                    transform: scale(1.05);
                }
            </style>

            <div class="table-responsive">
              <table class="table text-nowrap align-middle mb-0">
                <thead>
                  <tr class="border-2 border-bottom border-primary border-0">
                    <th scope="col" class="ps-0">Id</th>
                    <th scope="col" class="ps-0">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Niveau Universitaire</th>
                    <th scope="col">Université</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Adresse Email</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Etat</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <!-- User Entries -->
                  
                  
                  <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']); ?></td>
                        <td><?= htmlspecialchars($user['nom']); ?></td>
                        <td><?= htmlspecialchars($user['prenom']); ?></td>
                        <td><?= htmlspecialchars($user['niveauUni']); ?></td>
                        <td><?= htmlspecialchars($user['universite']); ?></td>
                        <td><?= htmlspecialchars($user['role']); ?></td>
                        <td><?= htmlspecialchars($user['email']); ?></td>
                        <td><?= htmlspecialchars($user['password']); ?></td>
                        <td><?= htmlspecialchars($user['etat']); ?></td>
                        <td>
                            <button class="btn btn-modifier btn-sm"
                                onclick="showEditUserForm(
                                    '<?= $user['id']; ?>',
                                    '<?= addslashes($user['nom']); ?>',
                                    '<?= addslashes($user['prenom']); ?>',
                                    '<?= addslashes($user['niveauUni']); ?>',
                                    '<?= addslashes($user['universite']); ?>',
                                    '<?= addslashes($user['role']); ?>',
                                    '<?= addslashes($user['email']); ?>',
                                    '<?= addslashes($user['password']); ?>',
                                    '<?= $user['etat']; ?>'
                                )">Modifier</button>
                            <form action="../Controller/UserController.php?action=deleteUser" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <button type="submit" class="btn btn-supprimer btn-sm">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                            <form action="../Controller/UserController.php?action=restrictUser" method="POST" style="display:inline;">
                              <input type="hidden" name="id" value="<?= $user['id']; ?>">
                              <input type="hidden" name="etat" value="<?= $user['etat']; ?>">
                              <?php if ($user['etat']==0): ?>
                              <button type="submit" class="btn btn-restrict btn-sm">
                                <i class="fas fa-block-alt"></i>Restrict
                              </button>
                              <?php else: ?>
                                <button type="submit" class="btn btn-unrestrict btn-sm">
                                  <i class="fas fa-block-alt"></i>Unrestrict
                                </button>
                              <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>




                  <!-- More user entries... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- Statistics -->
        <div class="stats">
  <div class="card">
    <div class="circle">
      <svg width="100" height="100">
        <circle class="background" cx="50" cy="50" r="35"></circle>
        <circle class="progress" cx="50" cy="50" r="35"></circle>
      </svg>
    </div>
    <div class="title">Total Users</div>
    <div class="value"><?= isset($stats['total_users']) ? $stats['total_users'] : 0 ?></div>
    <div class="info">All registered users</div>
    <div class="percentage"><?= isset($stats['percentage_users']) ? $stats['percentage_users'] : 0 ?>% of active users</div>
  </div>

  <div class="card">
    <div class="circle">
      <svg width="100" height="100">
        <circle class="background" cx="50" cy="50" r="35"></circle>
        <circle class="progress" cx="50" cy="50" r="35"></circle>
      </svg>
    </div>
    <div class="title">Admins</div>
    <div class="value"><?= isset($stats['total_admins']) ? $stats['total_admins'] : 0 ?></div>
    <div class="info">Admins in the system</div>
    <div class="percentage"><?= isset($stats['percentage_admins']) ? $stats['percentage_admins'] : 0 ?>% of total users</div>
  </div>

  <div class="card">
    <div class="circle">
      <svg width="100" height="100">
        <circle class="background" cx="50" cy="50" r="35"></circle>
        <circle class="progress" cx="50" cy="50" r="35"></circle>
      </svg>
    </div>
    <div class="title">Managers</div>
    <div class="value"><?= isset($stats['total_managers']) ? $stats['total_managers'] : 0 ?></div>
    <div class="info">Managers handling tasks</div>
    <div class="percentage"><?= isset($stats['percentage_managers']) ? $stats['percentage_managers'] : 0 ?>% of total users</div>
  </div>

  <div class="card">
    <div class="circle">
      <svg width="100" height="100">
        <circle class="background" cx="50" cy="50" r="35"></circle>
        <circle class="progress" cx="50" cy="50" r="35"></circle>
      </svg>
    </div>
    <div class="title">Active Users</div>
    <div class="value"><?= isset($stats['active_users']) ? $stats['active_users'] : 0 ?></div>
    <div class="info">Currently active users</div>
    <div class="percentage"><?= isset($stats['percentage_active']) ? $stats['percentage_active'] : 0 ?>% of total users</div>
  </div>
</div>




<!-- Add User Form -->
<div id="addUserForm" class="form-container" style="display: none;">
  <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">Ajouter un Utilisateur</h5>
      <form id="addUser" action="../Controller/UserController.php?action=addUser" method="POST">
        <div>
        <input type="number" class="form-control" id="id" name="id" hidden>
        <input type="number" class="form-control" id="etat" name="etat" hidden>
        </div>
        <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom">
      </div>
      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez le prénom">
      </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" >
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe:</label>
          <input type="password" class="form-control" id="password" name="password" >
        </div>
        
        <!-- Combo box for Niveau Universitaire -->
        <div class="mb-3">
          <label for="niveauUni" class="form-label">Niveau Universitaire</label>
          <select name="niveauUni" id="niveauUni" class="form-control" >
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
          <select name="universite" id="universite" class="form-control" >
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
          <select name="role" id="role" class="form-control" >
            <option value=""></option>
            <option value="etudiant">Etudiant</option>
            <option value="admin">Administrateur</option>
            <option value="enseignant">Enseignant</option>
            <option value="manager_des_stages">Manager des stages</option>
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
      <form id="editUser" action="../Controller/UserController.php?action=updateUser" method="POST">
      <div>
        <input type="number" class="form-control" id="editId" name="editId" hidden>
        <input type="number" class="form-control" id="editEtat" name="editEtat" hidden>
        </div>
        <div class="mb-3">
          <label for="editNom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="editNom" name="editNom">
        </div>
        <div class="mb-3">
          <label for="editPrenom" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="editPrenom" name="editPrenom">
        </div>
        <div class="mb-3">
          <label for="editEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="editEmail" name="editEmail">
        </div>
        <div class="mb-3">
          <label for="editPassword" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="editPassword" name="editPassword">
        </div>
        
        <!-- Combo box for Niveau Universitaire -->
        <div class="mb-3">
          <label for="editNiveauUni" class="form-label">Niveau Universitaire</label>
          <select name="editNiveauUni" id="editNiveauUni" class="form-control" >
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
          <select name="editUniversite" id="editUniversite" class="form-control" >
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
          <select name="editRole" id="editRole" class="form-control" >
            <option value=""></option>
            <option value="etudiant">Etudiant</option>
            <option value="admin">Administrateur</option>
            <option value="enseignant">Enseignant</option>
            <option value="manager_des_stages">Manager des stages</option>
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
    function showEditUserForm(id, nom, prenom, niveau, universite, role, email, password, etat) {
    document.getElementById('addUserForm').style.display = 'none';
    document.getElementById('editUserForm').style.display = 'block';
    document.getElementById('editId').value = id;
    document.getElementById('editNom').value = nom;
    document.getElementById('editPrenom').value = prenom;
    document.getElementById('editEmail').value = email;
    document.getElementById('editPassword').value = password;
    document.getElementById('editNiveauUni').value = niveau;
    document.getElementById('editUniversite').value = universite;
    document.getElementById('editRole').value = role;
    document.getElementById('editEtat').value = etat;
}


    // Hide both forms
    function hideForms() {
      document.getElementById('addUserForm').style.display = 'none';
      document.getElementById('editUserForm').style.display = 'none';
    }
    document.querySelectorAll('.btn-supprimer').forEach(button => {
    button.addEventListener('click', function (event) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
            event.preventDefault(); // Cancel the form submission
        }
    });
  });
  
  document.querySelectorAll('.btn-restrict').forEach(button => {
    button.addEventListener('click', function (event) {
        if (!confirm('Êtes-vous sûr de vouloir restrict cet utilisateur ?')) {
            event.preventDefault(); // Cancel the form submission
        }
    });
  });
  document.querySelectorAll('.btn-unrestrict').forEach(button => {
    button.addEventListener('click', function (event) {
        if (!confirm('Êtes-vous sûr de vouloir unrestrict cet utilisateur ?')) {
            event.preventDefault(); // Cancel the form submission
        }
    });
  });


  document.addEventListener("DOMContentLoaded", function () {
  // Add User Form Validation
  const addUserForm = document.getElementById("addUser");
  addUserForm.addEventListener("submit", function (event) {
    if (!validateForm(addUserForm)) {
      event.preventDefault();
    }
  });

  // Edit User Form Validation
  const editUserForm = document.getElementById("editUser");
  editUserForm.addEventListener("submit", function (event) {
    if (!validateForm(editUserForm)) {
      event.preventDefault();
    }
  });

  function validateForm(form) {
    let isValid = true;
    const inputs = form.querySelectorAll("input, select");

    inputs.forEach((input) => {
      // Remove existing feedback messages
      const feedback = input.nextElementSibling;
      if (feedback && feedback.classList.contains("invalid-feedback")) {
        feedback.remove();
      }

      // Reset input styles
      input.classList.remove("is-invalid");
      input.classList.remove("is-valid");

      // Validation logic
      if (input.id === "nom" || input.id === "prenom" || input.id === "editNom" || input.id === "editPrenom") {
        if (!input.value.trim()) {
          isValid = false;
          showError(input, "Ce champ est requis.");
        } else if (/\d/.test(input.value)) {
          isValid = false;
          showError(input, "Ce champ ne peut pas contenir de chiffres.");
        } else {
          showSuccess(input);
        }
      }

      if (input.type === "email" && input.value.trim()) {
        if (!validateEmail(input.value)) {
          isValid = false;
          showError(input, "Veuillez entrer une adresse email valide.");
        } else {
          showSuccess(input);
        }
      }

      
    });

    return isValid;
  }

  function showError(input, message) {
    input.classList.add("is-invalid");
    const errorFeedback = document.createElement("div");
    errorFeedback.className = "invalid-feedback";
    errorFeedback.textContent = message;
    input.insertAdjacentElement("afterend", errorFeedback);
  }

  function showSuccess(input) {
    input.classList.add("is-valid");
  }

  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
});


document.getElementById('search').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('.table tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
    });
});



  </script>
</body>

</html>
    