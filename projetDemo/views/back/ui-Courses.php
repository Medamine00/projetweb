<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learnify </title>
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="../src/assets/css/styles.min.css" />

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
      margin-top: 500px;      /* Centrer le conteneur horizontalement */
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
    <link rel="stylesheet" href="../src/assets/css/styles.min.css">
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
            width: 100%;
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
      <!--  Header Start -->
      
          

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
include("C:/xampp/htdocs/projetDemo/config.php");
include("C:/xampp/htdocs/projetDemo/controller/coursesC.php");


// Obtenir la connexion à la base de données
$conn = config::getConnexion();

// Créer une instance de votre contrôleur en passant la connexion
$courseController = new CourseController($conn);
?>

<div class="container">
    <header class="">
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
                $categories = $courseController->getCategories();
                if ($categories) {
                    foreach ($categories as $row) {
                        echo "<option value=\"" . htmlspecialchars($row['id_categorie']) . "\">" . htmlspecialchars($row['nom_categorie']) . "</option>";
                    }
                } else {
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
            <input type="text" class="form-control" name="linkmeeting" id="linkmeeting" placeholder="Meeting Link (optional):">
        </div>
        <div class="form-element my-4">
            <input type="submit" class="btn btn-success" name="subscribe" value="Add Course">
        </div>
    </form>

    <?php
    echo $courseController->handleAddCourse();
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
        const linkmeeting = document.getElementById('linkmeeting').value.trim();

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
        if (linkmeeting && !/^https?:\/\/[^\s]+$/.test(linkmeeting)) {  // Validate the meeting link if it's provided
            alert("Please enter a valid meeting link.");
            return false;
        }
        return true;
    }
</script>
<?php
// Inclure le contrôleur et récupérer les cours triés
include_once("C:/xampp/htdocs/projetDemo/config.php");
include_once("C:/xampp/htdocs/projetDemo/controller/coursesC.php");

// Créer une instance de CourseController
$courseController = new CourseController($conn);
$courses = $courseController->listCourses(); // Récupérer les cours triés

// Variable pour afficher le message de succès
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['course_id'])) {
        // Récupérer les données envoyées via le formulaire de mise à jour
        if (isset($_POST['course_title'])) {
            $courseId = $_POST['course_id'];
            $courseTitle = $_POST['course_title'];
            $tutorName = $_POST['tutor_name'];
            $idCategorie = $_POST['id_categorie'];
            $duration = $_POST['duration'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $linkmeeting = $_POST['linkmeeting'];

            // Préparer la requête SQL pour mettre à jour le cours
            $sql = "UPDATE courses SET 
                course_title = :course_title, 
                tutor_name = :tutor_name, 
                id_categorie = :id_categorie, 
                duration = :duration, 
                price = :price, 
                description = :description, 
                linkmeeting = :linkmeeting
                WHERE id = :course_id";

            // Préparer et exécuter la requête
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':course_title', $courseTitle);
            $stmt->bindParam(':tutor_name', $tutorName);
            $stmt->bindParam(':id_categorie', $idCategorie);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':linkmeeting', $linkmeeting);
            $stmt->bindParam(':course_id', $courseId);

            if ($stmt->execute()) {
                // Message de succès pour la mise à jour
                $message = "Course updated successfully!";
            } else {
                // Message d'erreur
                $message = "Error updating course.";
            }
        }
    }

    // Supprimer un cours
    if (isset($_POST['delete_course_id'])) {
        $courseIdToDelete = $_POST['delete_course_id'];
        $deleteSql = "DELETE FROM courses WHERE id = :course_id";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bindParam(':course_id', $courseIdToDelete);

        if ($deleteStmt->execute()) {
            // Message de succès pour la suppression
            $message = "Course deleted successfully!";
        } else {
            // Message d'erreur pour la suppression
            $message = "Error deleting course.";
        }
    }
}

// Générer l'affichage du tableau
?>
<header class="d-flex justify-content-between my-4">
    <h1>Course Management</h1>
</header>

<?php if ($message): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><a href="?sort_column=id&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">ID</a></th>
            <th><a href="?sort_column=course_title&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Course Title</a></th>
            <th><a href="?sort_column=tutor_name&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Tutor Name</a></th>
            <th><a href="?sort_column=id_categorie&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Category ID</a></th>
            <th><a href="?sort_column=duration&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Duration</a></th>
            <th><a href="?sort_column=price&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Price</a></th>
            <th><a href="?sort_column=description&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Description</a></th>
            <th><a href="?sort_column=linkmeeting&sort_order=<?php echo isset($_GET['sort_order']) && $_GET['sort_order'] === 'ASC' ? 'DESC' : 'ASC'; ?>">Meeting Link</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($courses)): ?>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo htmlspecialchars($course['id']); ?></td>
                    <td><?php echo htmlspecialchars($course['course_title']); ?></td>
                    <td><?php echo htmlspecialchars($course['tutor_name']); ?></td>
                    <td><?php echo htmlspecialchars($course['id_categorie']); ?></td>
                    <td><?php echo htmlspecialchars($course['duration']); ?></td>
                    <td><?php echo htmlspecialchars($course['price']); ?></td>
                    <td><?php echo htmlspecialchars($course['description']); ?></td>
                    <td>
                        <?php if (!empty($course['linkmeeting'])): ?>
                            <a href="<?php echo htmlspecialchars($course['linkmeeting']); ?>" target="_blank" class="btn btn-info">Join Meeting</a>
                        <?php else: ?>
                            <span>No link available</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Button to trigger edit modal -->
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?php echo $course['id']; ?>">Edit</button>
                        <!-- Button to trigger delete modal -->
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $course['id']; ?>">Delete</button>
                    </td>
                </tr>

             <!-- Modal for editing the course -->
             <div class="modal fade" id="editModal-<?php echo $course['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="" onsubmit="return validateForm(<?php echo $course['id']; ?>)">
                                    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>" />

                                    <div class="form-group">
                                        <label for="course_title">Course Title</label>
                                        <input type="text" class="form-control" name="course_title" value="<?php echo htmlspecialchars($course['course_title']); ?>" id="course_title-<?php echo $course['id']; ?>" required />
                                        <div id="course_title_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tutor_name">Tutor Name</label>
                                        <input type="text" class="form-control" name="tutor_name" value="<?php echo htmlspecialchars($course['tutor_name']); ?>" id="tutor_name-<?php echo $course['id']; ?>" required />
                                        <div id="tutor_name_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_categorie">Category ID</label>
                                        <input type="text" class="form-control" name="id_categorie" value="<?php echo htmlspecialchars($course['id_categorie']); ?>" id="id_categorie-<?php echo $course['id']; ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" name="duration" value="<?php echo htmlspecialchars($course['duration']); ?>" id="duration-<?php echo $course['id']; ?>" required />
                                        <div id="duration_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" value="<?php echo htmlspecialchars($course['price']); ?>" id="price-<?php echo $course['id']; ?>" required />
                                        <div id="price_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" name="description" value="<?php echo htmlspecialchars($course['description']); ?>" id="description-<?php echo $course['id']; ?>" required />
                                        <div id="description_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="linkmeeting">Meeting Link</label>
                                        <input type="text" class="form-control" name="linkmeeting" value="<?php echo htmlspecialchars($course['linkmeeting']); ?>" id="linkmeeting-<?php echo $course['id']; ?>" />
                                        <div id="linkmeeting_error-<?php echo $course['id']; ?>" class="text-danger" style="display:none;"></div>
                                    </div>

                                    <button type="submit" class="btn btn-success">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal for confirming course deletion -->
                <div class="modal fade" id="deleteModal-<?php echo $course['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this course?</p>
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_course_id" value="<?php echo $course['id']; ?>" />
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9">No courses found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
<script>
    function validateForm(courseId) {
        let isValid = true;

        // Validate Course Title (only letters)
        let courseTitle = document.getElementById('course_title-' + courseId).value;
        if (!courseTitle.match(/^[A-Za-z\s]+$/)) {
            document.getElementById('course_title_error-' + courseId).style.display = 'block';
            document.getElementById('course_title_error-' + courseId).innerText = "Please enter a valid course title (only letters).";
            isValid = false;
        } else {
            document.getElementById('course_title_error-' + courseId).style.display = 'none';
        }

        // Validate Tutor Name (only letters)
        let tutorName = document.getElementById('tutor_name-' + courseId).value;
        if (!tutorName.match(/^[A-Za-z\s]+$/)) {
            document.getElementById('tutor_name_error-' + courseId).style.display = 'block';
            document.getElementById('tutor_name_error-' + courseId).innerText = "Please enter a valid tutor name (only letters).";
            isValid = false;
        } else {
            document.getElementById('tutor_name_error-' + courseId).style.display = 'none';
        }

        // Validate Description (only letters and more than 20 characters)
        let description = document.getElementById('description-' + courseId).value;
        if (!description.match(/^[A-Za-z\s]+$/) || description.length <= 20) {
            document.getElementById('description_error-' + courseId).style.display = 'block';
            document.getElementById('description_error-' + courseId).innerText = "Please enter a valid description (only letters and more than 20 characters).";
            isValid = false;
        } else {
            document.getElementById('description_error-' + courseId).style.display = 'none';
        }

        // Validate Price (only numbers)
        let price = document.getElementById('price-' + courseId).value;
        if (!price.match(/^[0-9]+$/)) {
            document.getElementById('price_error-' + courseId).style.display = 'block';
            document.getElementById('price_error-' + courseId).innerText = "Please enter a valid price (only numbers).";
            isValid = false;
        } else {
            document.getElementById('price_error-' + courseId).style.display = 'none';
        }

        // Validate Duration (only numbers)
        let duration = document.getElementById('duration-' + courseId).value;
        if (!duration.match(/^[0-9]+$/)) {
            document.getElementById('duration_error-' + courseId).style.display = 'block';
            document.getElementById('duration_error-' + courseId).innerText = "Please enter a valid duration (only numbers).";
            isValid = false;
        } else {
            document.getElementById('duration_error-' + courseId).style.display = 'none';
        }

        // Validate Meeting Link (valid URL)
        let linkMeeting = document.getElementById('linkmeeting-' + courseId).value;
        let urlRegex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/;
        if (linkMeeting && !urlRegex.test(linkMeeting)) {
            document.getElementById('linkmeeting_error-' + courseId).style.display = 'block';
            document.getElementById('linkmeeting_error-' + courseId).innerText = "Please enter a valid URL.";
            isValid = false;
        } else {
            document.getElementById('linkmeeting_error-' + courseId).style.display = 'none';
        }

        return isValid;
    }
</script>

<!-- Include necessary scripts for modal functionality -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Formulaire d'ajout de catégorie -->
<!-- Formulaire pour ajouter une nouvelle catégorie -->
<div class="container my-4"> 
    <h1>Add New Category</h1>
    <form method="POST" action="../../controller/categorieC.php" onsubmit="return validateCategoryForm();">
        <div class="mb-3">
            <label for="nom_categorie" class="form-label">Category Name: <span style="color: red;">*</span></label>
            <input type="text" id="nom_categorie" name="nom_categorie" class="form-control" placeholder="Enter category name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Category Description: <span style="color: red;">*</span></label>
            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter category description" required maxlength="500"></textarea>
        </div>
        <div class="mb-3">
            <label for="date_creation" class="form-label">Creation Date: <span style="color: red;">*</span></label>
            <input type="date" id="date_creation" name="date_creation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

<script>
    function validateCategoryForm() {
        const errors = [];
        const nomCategorie = document.getElementById("nom_categorie").value.trim();
        const description = document.getElementById("description").value.trim();
        const dateCreation = document.getElementById("date_creation").value.trim();

        // Validate category name (only letters and spaces)
        if (!nomCategorie || !/^[A-Za-z\s]+$/.test(nomCategorie)) {
            errors.push("Category name must contain letters and spaces only.");
        }

        // Validate description length (between 1 and 500 characters)
        if (!description || description.length > 500) {
            errors.push("Description must be between 1 and 500 characters.");
        }

        // Ensure creation date is provided
        if (!dateCreation) {
            errors.push("Creation date is required.");
        }

        // If there are validation errors, alert the user and prevent form submission
        if (errors.length > 0) {
            alert(errors.join("\n"));
            return false;
        }
        return true;
    }
</script>
<!-- Category Management Header -->
<header class="d-flex justify-content-between my-4">
    <h1>Category Management</h1>
</header>

<!-- Table displaying categories -->
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
        // Inclure la connexion à la base de données
        include_once("C:/xampp/htdocs/projetDemo/config.php");

        try {
            // Préparer et exécuter la requête SQL avec PDO
            $sql = "SELECT * FROM categorie";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Boucler sur les résultats et les afficher
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_categorie']); ?></td>
                    <td><?php echo htmlspecialchars($row['nom_categorie']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['date_creation']); ?></td>
                    <td>
                        <!-- Lien vers l'édition, ouvrira une modal avec l'ID de la catégorie -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?php echo $row['id_categorie']; ?>">
                            Edit
                        </button>
                        <!-- Lien vers la suppression de la catégorie -->
                        <a href="../../controller/categorieC.php?action=delete&id=<?php echo urlencode($row['id_categorie']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                    </td>
                </tr>

                <!-- Modal for editing the category -->
                <div class="modal fade" id="editModal-<?php echo $row['id_categorie']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Form for editing the category -->
                                <form method="POST" action="../../controller/categorieC.php" onsubmit="return validateForm()">
    <input type="hidden" name="id_categorie" value="<?php echo $row['id_categorie']; ?>" />
    <div class="form-group">
        <label for="nom_categorie">Category Name</label>
        <input type="text" class="form-control" name="nom_categorie" value="<?php echo htmlspecialchars($row['nom_categorie']); ?>" required />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
    </div>
    <div class="form-group">
        <label for="date_creation">Date of Creation</label>
        <input type="date" class="form-control" name="date_creation" value="<?php echo htmlspecialchars($row['date_creation']); ?>" required />
    </div>
    <button type="submit" class="btn btn-success">Save Changes</button>
</form>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='5'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }
        ?>
    </tbody>
</table>


    <!-- Formulaire de recherche par catégorie -->
    <?php
include("C:/xampp/htdocs/projetDemo/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1 class="mb-4">Search Courses</h1>
    <!-- Formulaire de recherche dynamique -->
    <form method="get" action="">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="search_criteria" class="form-label">Search By:</label>
                <select id="search_criteria" name="criteria" class="form-select" required>
                    <option value="">Select a criteria</option>
                    <option value="id_categorie">Category</option>
                    <option value="course_title">Course Title</option>
                    <option value="tutor_name">Tutor Name</option>
                    <option value="duration">Duration</option>
                    <option value="price">Price</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="search_value" class="form-label">Value:</label>
                <input type="text" id="search_value" name="value" class="form-control" placeholder="Enter value" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <?php
    if (!empty($_GET['criteria']) && !empty($_GET['value'])) {
        $criteria = $_GET['criteria'];
        $value = $_GET['value'];

        try {
            // Liste blanche des critères valides pour éviter les erreurs SQL
            $allowedCriteria = ['id_categorie', 'course_title', 'tutor_name', 'duration', 'price'];
            if (!in_array($criteria, $allowedCriteria)) {
                throw new Exception("Invalid search criteria.");
            }

            // Requête SQL dynamique avec une condition WHERE utilisant les critères
            $sql = "SELECT 
            courses.id AS course_id,
            courses.course_title,
            courses.tutor_name,
            courses.duration,
            courses.price,
            courses.description AS course_description,
            courses.linkmeeting,
            categorie.nom_categorie,
            categorie.description AS category_description,
            categorie.date_creation
        FROM 
            courses
        INNER JOIN 
            categorie 
        ON 
            courses.id_categorie = categorie.id_categorie
        WHERE courses.$criteria LIKE :value";


            // Préparer la requête
            $stmt = $conn->prepare($sql);

            // Vérification des types selon le critère choisi
            if ($criteria === 'id_categorie' || $criteria === 'duration' || $criteria === 'price') {
                // Pour les critères numériques (id_categorie, duration, price), on utilise un entier
                $stmt->bindValue(':value', intval($value), PDO::PARAM_INT);
            } else {
                // Pour les critères de texte, on utilise une chaîne
                $stmt->bindValue(':value', "%$value%", PDO::PARAM_STR);
            }

            // Exécution de la requête
            $stmt->execute();

            // Récupérer les résultats
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Affichage des résultats
            if ($results) {
                echo "<h2 class='my-4'>Search Results</h2>";
                echo "<table class='table table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Course ID</th>";
                echo "<th>Course Title</th>";
                echo "<th>Tutor Name</th>";
                echo "<th>Duration</th>";
                echo "<th>Price</th>";
                echo "<th>Course Description</th>";
                echo "<th>Meeting Link</th>";
                echo "<th>Category Name</th>";
                echo "<th>Category Description</th>";
                echo "<th>Date Creation</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                // Boucle pour afficher les résultats
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['course_title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tutor_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['course_description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['linkmeeting']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nom_categorie']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['category_description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date_creation']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-warning'>No results found for the selected criteria.</div>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
// Inclure la configuration
include("C:/xampp/htdocs/projetDemo/config.php");

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
        type: 'bar', // Type de graphique
        data: {
            labels: categories, // Noms des catégories
            datasets: [{
                label: 'Percentage of Courses (%)',
                data: pourcentages, // Pourcentages par catégorie
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',  // Rouge
                    'rgba(54, 162, 235, 0.6)',  // Bleu
                    'rgba(255, 206, 86, 0.6)',  // Jaune
                    'rgba(75, 192, 192, 0.6)',  // Vert
                    'rgba(153, 102, 255, 0.6)', // Violet
                    'rgba(255, 159, 64, 0.6)'   // Orange
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1, // Épaisseur des bordures
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
include("C:/xampp/htdocs/projetDemo/config.php"); 

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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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

  <script src="../src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../src/assets/js/sidebarmenu.js"></script>
  <script src="../src/assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  
  

</html>