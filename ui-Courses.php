<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learnify </title>
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="/Learnify web site/views/backend/src/assets/css/styles.min.css" />

  <title>backend</title>
  <style>
      body {
                  font-family: Arial, sans-serif;
                  margin: 5cm 20px 20px 20px; /* Marge de 5 cm en haut et 20px sur les autres côtés */
              }
              table {
                  width: 100%;
                  border-collapse: collapse;
              }
              th, td {
                  padding: 12px;
                  border-bottom: 1px solid #ddd;
                  text-align: left;
              }
              th {
                  border-bottom: 2px solid #007bff;
                  color: #007bff;
                  font-size: 16px;
              }
              tr:nth-child(even) {
                  background-color: #f9f9f9;
              }
              .btn-approve, .btn-reject {
                  padding: 8px 12px;
                  border: none;
                  border-radius: 4px;
                  color: #fff;
                  cursor: pointer;
              }
              .btn-approve {
                  background-color: #007bff; /* Green */
              }
              .btn-reject {
                  background-color: #4e88c7; /* Red */
              }
    .container {
      width: 80%;          /* Largeur relative par rapport à l'écran */
      margin: 0 auto;      /* Centrer le conteneur horizontalement */
      padding: 20px;       /* Espacement interne */
      background-color: #f4f4f4; /* Couleur de fond */
      border-radius: 8px;  /* Coins arrondis */
    }

    .container img {
      width: 100px;        /* Largeur de l'image */
      margin-bottom: 20px; /* Espacement sous l'image */
      transition: transform 0.4s ease; /* Transition lors du survol */
    }

    .container img:hover {
      transform: scale(1.2); /* Zoom sur l'image lorsqu'elle est survolée */
    }
  </style>
   

    <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
    <link rel="stylesheet" href="/Learnify web site/views/backend/src/assets/css/styles.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 5cm 20px 20px 20px;
            color: #333;
        }

        /* Container for Logo */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container img {
            width: 100px;
            margin-bottom: 20px;
            transition: transform 0.4s ease;
        }

        .container img:hover {
            transform: scale(1.2);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            position: relative;
        }

        th {
            border-bottom: 2px solid #007bff;
            color: #007bff;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Button Styles */
        .btn-approve, .btn-reject, .btn-edit, .btn-delete {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: #fff;
        }

        .btn-approve {
            background-color: #007bff; /* Blue */
        }

        .btn-reject {
            background-color: #81b8fb; /* Lighter Blue */
        }

        .btn-edit {
            background-color: #ffc107; /* Yellow */
        }

        .btn-delete {
            background-color: #6c757d; /* Grey */
        }

        /* Tooltip Styles */
        .tooltip {
            visibility: hidden;
            width: 150px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            top: -30px;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        td:hover .tooltip {
            visibility: visible;
            opacity: 1;
        }

        /* Comment Section Styles */
        .comment-section {
            width: 60%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment {
            display: flex;
            margin-bottom: 15px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            background-color: #ccc;
        }

        .comment-content {
            flex: 1;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
        }

        .comment-name {
            font-weight: bold;
            color: #333;
        }

        .comment-time {
            font-size: 0.9em;
            color: #888;
        }

        .comment-text {
            margin-top: 10px;
            color: #555;
        }

        .comment-actions {
            margin-top: 10px;
        }

        .comment-actions button {
            background-color: transparent;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 0.9em;
            margin-right: 15px;
        }

        .comment-actions button:hover {
            text-decoration: underline;
        }

        .comment-actions .btn-delete {
            color: #f44336;
        }

        /* Add Comment Form */
        .add-comment {
            margin-top: 20px;
            display: flex;
            align-items: center;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .add-comment input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }

        .add-comment button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-comment button:hover {
            background-color: #0056b3;
        }

        /* Map Styles */
        #map {
            height: 600px;
            width: 100%;
        }

        .info {
            padding: 5px;
            background: #34495e;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            position: absolute;
            pointer-events: none;
            z-index: 1000;
            display: none;
        }
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 5cm 20px 20px 20px; /* 5 cm margin on top and 20px on other sides */
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 12px;
                border-bottom: 1px solid #ddd;
                text-align: left;
            }
            th {
                border-bottom: 2px solid #007bff;
                color: #007bff;
                font-size: 16px;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .btn-approve, .btn-reject {
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                color: #fff;
                cursor: pointer;
            }
            .btn-approve {
                background-color:#007bff; /* Green */
            }
            .btn-reject {
                background-color: #81b8fb; /* Red */
            }
        </style>
    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="container">
    <!-- Assurez-vous que le chemin vers l'image est relatif à votre fichier HTML -->
    <img src="/Learnify web site/views/backend/src/assets/images/logos/learnifylogo.png" alt="Logo">
  </div>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="/Learnify web site/views/backend/src/assets/images/logos/logo-light.svg" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <h1 class="titre-droite"> <strong> Learnify</strong> </h1>

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
              <a class="sidebar-link" href="./ui-Courses.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Courses </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Alerts</span>
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
                <img src="/Learnify web site/views/backend/src/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
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
      <!--  Header Start -->
      
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="/Learnify web site/views/backend/src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
     <!--  Header End -->
     <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            
    
            <style>
              body {
                  font-family: Arial, sans-serif;
                  margin: 5cm 20px 20px 20px; /* Marge de 5 cm en haut et 20px sur les autres côtés */
              }
              table {
                  width: 100%;
                  border-collapse: collapse;
              }
              th, td {
                  padding: 12px;
                  border-bottom: 1px solid #ddd;
                  text-align: left;
              }
              th {
                  border-bottom: 2px solid #007bff;
                  color: #007bff;
                  font-size: 16px;
              }
              tr:nth-child(even) {
                  background-color: #f9f9f9;
              }
              .btn-approve, .btn-reject {
                  padding: 8px 12px;
                  border: none;
                  border-radius: 4px;
                  color: #fff;
                  cursor: pointer;
              }
              .btn-approve {
                  background-color: #007bff; /* Green */
              }
              .btn-reject {
                  background-color: #4e88c7; /* Red */
              }
          </style>
      </head>
      <body>
      
      

      <?php
// Inclure la configuration de la base de données
include("C:/xampp2/htdocs/Learnify web site/config.php");
?>

<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Add New Course</h1>
    </header>

    <form action="" method="post" onsubmit="return validateForm()">
        <div class="form-element my-4">
            <input type="text" class="form-control" name="course_title" id="course_title" placeholder="Course title:">
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="tutor_name" id="tutor_name" placeholder="Tutor name:">
        </div>
        <div class="form-element my-4">
            <select name="id_categorie" class="form-control" id="id_categorie">
                <option value="">Select category</option>
                <?php
                try {
                    $sql = "SELECT id_categorie, nom_categorie FROM categorie";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"" . htmlspecialchars($row['id_categorie']) . "\">" . htmlspecialchars($row['nom_categorie']) . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "<option value=\"\">Error loading categories</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-element my-4">
            <select name="duration" class="form-control">
                <option value="">Select course duration (Hours)</option>
                <option value="2h">2h</option>
                <option value="6h">6h</option>
                <option value="12h">12h</option>
                <option value="24h">24h</option>
            </select>
        </div>
        <div class="form-element my-4">
            <input type="text" class="form-control" name="price" id="price" placeholder="Price:">
        </div>
        <div class="form-element my-4">
            <textarea class="form-control" name="description" placeholder="Course description:"></textarea>
        </div>
        <div class="form-element my-4">
            <input type="submit" class="btn btn-success" name="subscribe" value="Add Course">
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["subscribe"])) {
        try {
            // Sanitize and validate inputs
            $course_title = htmlspecialchars(trim($_POST["course_title"]));
            $tutor_name = htmlspecialchars(trim($_POST["tutor_name"]));
            $id_categorie = intval($_POST["id_categorie"]);
            $description = htmlspecialchars(trim($_POST["description"]));
            $duration = htmlspecialchars(trim($_POST["duration"]));
            $price = floatval($_POST["price"]);

            if (!empty($course_title) && !empty($tutor_name) && $id_categorie > 0 && !empty($description) && !empty($duration) && $price > 0) {
                // Insert into the 'courses' table
                $sql_courses = "INSERT INTO courses (course_title, tutor_name, id_categorie, duration, price, description) 
                                VALUES (:course_title, :tutor_name, :id_categorie, :duration, :price, :description)";
                $stmt_courses = $conn->prepare($sql_courses);
                $stmt_courses->bindParam(':course_title', $course_title);
                $stmt_courses->bindParam(':tutor_name', $tutor_name);
                $stmt_courses->bindParam(':id_categorie', $id_categorie);
                $stmt_courses->bindParam(':duration', $duration);
                $stmt_courses->bindParam(':price', $price);
                $stmt_courses->bindParam(':description', $description);
                $stmt_courses->execute();

                echo "<div class='alert alert-success'>Course successfully subscribed!</div>";
            } else {
                echo "<div class='alert alert-warning'>All fields are required and must be valid.</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Database error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
    ?>
</div>

<script>
    function validateForm() {
        const courseTitle = document.getElementById('course_title').value.trim();
        const tutorName = document.getElementById('tutor_name').value.trim();
        const categorySelect = document.getElementById('id_categorie').value;
        const durationSelect = document.querySelector('select[name="duration"]').value;
        const price = document.getElementById('price').value.trim();
        const description = document.querySelector('textarea[name="description"]').value.trim();

        if (!courseTitle || !/^[A-Za-z\s]+$/.test(courseTitle)) {
            alert("Course title is required and must contain letters only.");
            return false;
        }
        if (!tutorName || !/^[A-Za-z\s]+$/.test(tutorName)) {
            alert("Tutor name is required and must contain letters only.");
            return false;
        }
        if (!categorySelect) {
            alert("Please select a category.");
            return false;
        }
        if (!durationSelect) {
            alert("Please select a course duration.");
            return false;
        }
        if (!price || isNaN(price) || price <= 0) {
            alert("Please enter a valid price greater than zero.");
            return false;
        }
        if (!description || description.length < 1 || description.length > 500) {
            alert("Description must be between 1 and 500 characters.");
            return false;
        }
        return true;
    }
</script>

<header class="d-flex justify-content-between my-4">
    <h1>Course Management</h1>
</header>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Course Title</th>
        <th>Tutor Name</th>
        <th>Category ID</th>
        <th>Duration</th>
        <th>Price</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include("C:/xampp2/htdocs/Learnify web site/config.php");

    try {
        // Requête SQL avec PDO
        $sql = "SELECT * FROM courses";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Parcours des résultats
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['course_title']); ?></td>
                <td><?php echo htmlspecialchars($row['tutor_name']); ?></td>
                <td><?php echo htmlspecialchars($row['id_categorie']); ?></td>
                <td><?php echo htmlspecialchars($row['duration']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo urlencode($row['id']); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='8'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
    ?>
    </tbody>
</table>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["add_category"])) {
    try {
        // Sanitize and validate inputs
        $nom_categorie = htmlspecialchars(trim($_POST["nom_categorie"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $date_creation = htmlspecialchars(trim($_POST["date_creation"]));

        // Validate the inputs
        if (!empty($nom_categorie) && !empty($description) && !empty($date_creation)) {
            // Insert into the 'categorie' table
            $sql_category = "INSERT INTO categorie (nom_categorie, description, date_creation) 
                             VALUES (:nom_categorie, :description, :date_creation)";
            $stmt_category = $conn->prepare($sql_category);
            $stmt_category->bindParam(':nom_categorie', $nom_categorie);
            $stmt_category->bindParam(':description', $description);
            $stmt_category->bindParam(':date_creation', $date_creation);
            $stmt_category->execute();

            echo "<div class='alert alert-success'>Category successfully added!</div>";
        } else {
            echo "<div class='alert alert-warning'>All fields are required.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Database error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}
?>

<!-- Formulaire pour ajouter une nouvelle catégorie -->
<div class="container my-4">
    <h1>Add New Category</h1>
    <form method="POST" action="">
    <div class="mb-3">
        <label for="nom_categorie" class="form-label">Category Name:</label>
        <input type="text" id="nom_categorie" name="nom_categorie" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Category Description:</label>
        <textarea id="description" name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label for="date_creation" class="form-label">Creation Date:</label>
        <input type="date" id="date_creation" name="date_creation" class="form-control">
    </div>
    <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
</form>

</div>

<script>
    function validateCategoryForm() {
        const nomCategorie = document.getElementById("nom_categorie").value.trim();
        const description = document.getElementById("description").value.trim();
        const dateCreation = document.getElementById("date_creation").value.trim();

        // Validate category name (only letters and spaces allowed)
        if (!nomCategorie || !/^[A-Za-z\s]+$/.test(nomCategorie)) {
            alert("Category name is required and must contain letters only.");
            return false;
        }

        // Validate description (1 to 500 characters)
        if (!description || description.length < 1 || description.length > 500) {
            alert("Description must be between 1 and 500 characters.");
            return false;
        }

        // Validate creation date
        if (!dateCreation) {
            alert("Please select a creation date.");
            return false;
        }

        return true;
    }
</script>


    <header class="d-flex justify-content-between my-4">
        <h1>Category Management</h1>
    </header>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Date of Creation</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include("C:/xampp2/htdocs/Learnify web site/config.php");

        try {
            // Requête SQL avec PDO
            $sql = "SELECT * FROM categorie";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Parcours des résultats
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_categorie']); ?></td>
                    <td><?php echo htmlspecialchars($row['nom_categorie']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_creation']); ?></td>
                    <td>
                        <a href="edit_category.php?id=<?php echo urlencode($row['id_categorie']); ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_category.php?id=<?php echo urlencode($row['id_categorie']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='5'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

    <!-- Formulaire de recherche par catégorie -->
    <h1>Search Courses by Category</h1>
<form method="get" action="">
    <div class="mb-3">
        <label for="id_categorie" class="form-label">Category:</label>
        <select id="id_categorie" name="id_categorie" class="form-control" required>
            <option value="">Select a category</option>
            <?php
            try {
                // Fetch unique category names from the database
                $sql = "SELECT MIN(id_categorie) as id_categorie, nom_categorie FROM categorie GROUP BY nom_categorie";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Populate the dropdown with unique category names
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"" . htmlspecialchars($row['id_categorie']) . "\">" . htmlspecialchars($row['nom_categorie']) . "</option>";
                }
            } catch (PDOException $e) {
                echo "<option value=\"\">Error loading categories</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
</form>


    <?php
    // Recherche des cours en fonction de la catégorie sélectionnée
    if (isset($_GET['id_categorie']) && !empty($_GET['id_categorie'])) {
        $id_categorie = intval($_GET['id_categorie']); // Sécurisation de la valeur

        try {
            // Requête SQL pour rechercher les cours par id_categorie
            $sql = "SELECT 
                        courses.id AS course_id,
                        courses.course_title,
                        courses.tutor_name,
                        courses.duration,
                        courses.price,
                        categorie.nom_categorie,
                        categorie.description,
                        categorie.date_creation
                    FROM 
                        courses
                    INNER JOIN 
                        categorie 
                    ON 
                        courses.id_categorie = categorie.id_categorie
                    WHERE 
                        categorie.id_categorie = :id_categorie";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
            $stmt->execute();

            // Récupérer les résultats
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result) {
                echo "<h2 class='my-4'>Courses for Category ID: $id_categorie</h2>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Course ID</th>";
                echo "<th>Course Title</th>";
                echo "<th>Tutor Name</th>";
                echo "<th>Duration</th>";
                echo "<th>Price</th>";
                echo "<th>Category Name</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['course_title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tutor_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nom_categorie']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-warning'>No courses found for this category!</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
    ?>
</div>
</body>
</html>
<?php
// Inclure la configuration
include("C:/xampp2/htdocs/Learnify web site/config.php");

// Requête SQL pour récupérer les données
$sql = "
    SELECT c.nom_categorie, COUNT(cr.id_categorie) AS nombre_cours
    FROM categorie c
    LEFT JOIN courses cr ON c.id_categorie = cr.id_categorie
    GROUP BY c.id_categorie
";
$stmt = $conn->prepare($sql);
$stmt->execute();

$categories = [];
$nombreCours = [];
$totalCours = 0;

// Remplir les tableaux pour le graphique et calculer le total des cours
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $categories[] = htmlspecialchars($row['nom_categorie']);
    $nombreCours[] = $row['nombre_cours'];
    $totalCours += $row['nombre_cours'];
}

// Calculer les pourcentages
$pourcentages = [];
foreach ($nombreCours as $nombre) {
    $pourcentages[] = $totalCours > 0 ? round(($nombre / $totalCours) * 100, 2) : 0;
}

// Encoder les données en JSON pour JavaScript
$categoriesJson = json_encode($categories);
$pourcentagesJson = json_encode($pourcentages);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percentage of Courses by Category</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Percentage of Courses by Category</h2>
    <canvas id="categoryChart" width="400" height="200"></canvas>
</div>

<script>
    // Récupérer les données PHP en JavaScript
    const categories = <?php echo $categoriesJson; ?>;
    const pourcentages = <?php echo $pourcentagesJson; ?>;

    // Configuration du graphique
    const ctx = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(ctx, {
        type: 'line', // Type de graphique
        data: {
            labels: categories, // Noms des catégories
            datasets: [{
                label: 'Percentage of Courses (%)',
                data: pourcentages, // Pourcentages par catégorie
                borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de fond sous la courbe
                borderWidth: 2, // Épaisseur de la ligne
                tension: 0.4, // Courbure de la ligne
                pointBackgroundColor: 'rgba(255, 99, 132, 1)', // Couleur des points
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw + '%';
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Categories',
                        color: '#000',
                        font: {
                            size: 16,
                        },
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Percentage (%)',
                        color: '#000',
                        font: {
                            size: 16,
                        },
                    }
                }
            }
        }
    });
</script>
</body>
</html>

<?php
// Inclure la configuration pour la connexion à la base de données
include("C:/xampp2/htdocs/Learnify web site/config.php"); 

// Récupérer les éléments de la wishlist
$sql_wishlist = "SELECT w.course_id, c.course_title, c.price 
                 FROM wishlist w
                 INNER JOIN courses c ON w.course_id = c.id";
$stmt_wishlist = $conn->prepare($sql_wishlist);
$stmt_wishlist->execute();
$wishlist_items = $stmt_wishlist->fetchAll();

// Récupérer les avis des utilisateurs
$sql_reviews = "SELECT r.course_id, c.course_title, r.rating, r.review 
                FROM ratings r
                INNER JOIN courses c ON r.course_id = c.id";
$stmt_reviews = $conn->prepare($sql_reviews);
$stmt_reviews->execute();
$reviews = $stmt_reviews->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist et Avis</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>

<!-- Section Wishlist -->
<div class="container mt-5">
    <h2>Ma Wishlist</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID Cours</th>
                <th>Titre du Cours</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($wishlist_items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['course_id']) ?></td>
                    <td><?= htmlspecialchars($item['course_title']) ?></td>
                    <td><?= htmlspecialchars($item['price']) ?> DT</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Section Avis -->
<div class="container mt-5">
    <h2>Avis des Cours</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID Cours</th>
                <th>Titre du Cours</th>
                <th>Note</th>
                <th>Avis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review['course_id']) ?></td>
                    <td><?= htmlspecialchars($review['course_title']) ?></td>
                    <td>
                        <?php 
                            $rating = htmlspecialchars($review['rating']);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fa fa-star text-warning"></i>'; // Étoile pleine
                                } else {
                                    echo '<i class="fa fa-star text-muted"></i>'; // Étoile vide
                                }
                            }
                        ?>
                    </td>
                    <td><?= htmlspecialchars($review['review']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Font Awesome for Star Ratings -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- Scripts -->
<script src="path/to/bootstrap.js"></script>

</body>
</html>

  <script src="/Learnify web site/views/backend/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/Learnify web site/views/backend/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/Learnify web site/views/backend/src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/Learnify web site/views/backend/src/assets/js/sidebarmenu.js"></script>
  <script src="/Learnify web site/views/backend/src/assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  
  

</html>