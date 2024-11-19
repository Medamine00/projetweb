<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Learnify </title>
  <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
  <link rel="stylesheet" href="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/css/styles.min.css" />

  <title>Image Hover</title>
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
    <img src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/images/logos/learnifylogo.png" alt="Logo">
  </div>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/images/logos/logo-light.svg" alt="" />
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
                <img src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
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
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
      
      
      <h2>Student Request</h2>
      
      <table id="studentTable">
          <thead>
              <tr>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th>Age</th>
                  <th>School Level</th>
                  <th>Average</th>
                  <th>Approve</th>
                  <th>Reject</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Adem Melki</td>
                  <td>adem.melki@example.com</td>
                  <td>20</td>
                  <td>5NIDS2</td>
                  <td>15.75</td>
                  <td><button class="btn-approve" onclick="approveStudent(this)">Approve</button></td>
                  <td><button class="btn-reject" onclick="rejectStudent(this)">Reject</button></td>
              </tr>
              <tr>
                  <td>Sara Ben Ali</td>
                  <td>sara.benali@example.com</td>
                  <td>22</td>
                  <td>Undergraduate</td>
                  <td>14.20</td>
                  <td><button class="btn-approve" onclick="approveStudent(this)">Approve</button></td>
                  <td><button class="btn-reject" onclick="rejectStudent(this)">Reject</button></td>
              </tr>
              <tr>
                  <td>Mohamed Trabelsi</td>
                  <td>mohamed.trabelsi@example.com</td>
                  <td>21</td>
                  <td>Master 1</td>
                  <td>16.50</td>
                  <td><button class="btn-approve" onclick="approveStudent(this)">Approve</button></td>
                  <td><button class="btn-reject" onclick="rejectStudent(this)">Reject</button></td>
              </tr>
              <tr>
                  <td>Rania Said</td>
                  <td>rania.said@example.com</td>
                  <td>23</td>
                  <td>Master 2</td>
                  <td>17.00</td>
                  <td><button class="btn-approve" onclick="approveStudent(this)">Approve</button></td>
                  <td><button class="btn-reject" onclick="rejectStudent(this)">Reject</button></td>
              </tr>
          </tbody>
      </table>
      
      <script>
          function approveStudent(button) {
              alert("Student approved!");
          }
      
          function rejectStudent(button) {
              const confirmation = confirm("Are you sure you want to reject this student?");
              if (confirmation) {
                  const row = button.parentNode.parentNode;
                  row.parentNode.removeChild(row);
                  alert("Student rejected and removed from the list!");
              }
          }
      </script>

    <h2>Tutor Request</h2>
    
    <table id="tutorTable">
        <thead>
            <tr>
                <th>Tutor Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Diploma</th>
                <th>Subject Expertise</th>
                <th>Experience (Years)</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td>45</td>
                <td>Ph.D. in Mathematics</td>
                <td>Mathematics</td>
                <td>20</td>
                <td><button class="btn-approve" onclick="approveTutor(this)">Approve</button></td>
                <td><button class="btn-reject" onclick="rejectTutor(this)">Reject</button></td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>jane.smith@example.com</td>
                <td>38</td>
                <td>Master's in Physics</td>
                <td>Physics</td>
                <td>12</td>
                <td><button class="btn-approve" onclick="approveTutor(this)">Approve</button></td>
                <td><button class="btn-reject" onclick="rejectTutor(this)">Reject</button></td>
            </tr>
            <tr>
                <td>Michael Brown</td>
                <td>michael.brown@example.com</td>
                <td>42</td>
                <td>Ph.D. in Chemistry</td>
                <td>Chemistry</td>
                <td>18</td>
                <td><button class="btn-approve" onclick="approveTutor(this)">Approve</button></td>
                <td><button class="btn-reject" onclick="rejectTutor(this)">Reject</button></td>
            </tr>
            <tr>
                <td>Emily Wilson</td>
                <td>emily.wilson@example.com</td>
                <td>34</td>
                <td>Master's in Biology</td>
                <td>Biology</td>
                <td>10</td>
                <td><button class="btn-approve" onclick="approveTutor(this)">Approve</button></td>
                <td><button class="btn-reject" onclick="rejectTutor(this)">Reject</button></td>
            </tr>
        </tbody>
    </table>
    
    <script>
        function approveTutor(button) {
            alert("Tutor approved!");
        }
    
        function rejectTutor(button) {
            const confirmation = confirm("Are you sure you want to reject this tutor?");
            if (confirmation) {
                const row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
                alert("Tutor rejected and removed from the list!");
            }
        }
    </script>
   

<?php
include 'C:/xampp/htdocs/Learnify web site/controller/coursesC.php';

// Créer une instance de la classe CoursesC (et non courses)
$c = new CoursesC();
$tab = $c->listcourses();
?>

<center>
    <h1>Manage Courses</h1>
    <h2>
        <a href="addcourses.php">Add Course</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Course</th>
        <th>Course Title</th>
        <th>Tutor Name</th>
        <th>Subject</th>
        <th>Duration (Hours)</th>
        <th>Price</th>
        <th>Status</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Phone</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach ($tab as $course) {
    ?>

        <tr>
            <td><?= $course['id']; ?></td>
            <td><?= $course['course_title']; ?></td>
            <td><?= $course['tutor_name']; ?></td>
            <td><?= $course['subject']; ?></td>
            <td><?= $course['duration']; ?></td>
            <td><?= $course['price']; ?></td>
            <td><?= $course['status']; ?></td>
            <td><?= $course['etudiant_name']; ?></td>
            <td><?= $course['etudiant_email']; ?></td>
            <td><?= $course['etudiant_phone']; ?></td>
            <td align="center">
                <form method="POST" action="updatecourses.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $course['id']; ?> name="idCourse">
                </form>
                <a href="deletecourses.php?id=<?php echo $course['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>



  <title>Commentaires des Étudiants</title>
 
   

  <div class="comment-section">
    <h2>Comments</h2>

    <!-- Comment 1 -->
    <div class="comment" id="comment-1">
      <div class="comment-avatar"></div>
      <div class="comment-content">
        <div class="comment-header">
          <span class="comment-name">Ali Hamza</span>
          <span class="comment-time">Il y a 1 heure</span>
        </div>
        <div class="comment-text">
          Ce cours est vraiment intéressant, mais j'aimerais qu'il y ait plus de pratiques.
        </div>
        <div class="comment-actions">
          <button onclick="alert('Répondre à Ali Hamza')">Répondre</button>
          <button onclick="alert('Like ajouté à Ali Hamza')">J'aime</button>
          <button class="btn-delete" onclick="deleteComment('comment-1')">Supprimer</button>
        </div>
      </div>
    </div>

    <!-- Comment 2 -->
    <div class="comment" id="comment-2">
      <div class="comment-avatar"></div>
      <div class="comment-content">
        <div class="comment-header">
          <span class="comment-name">Leila Ben Ali</span>
          <span class="comment-time">Il y a 3 heures</span>
        </div>
        <div class="comment-text">
          Le contenu est très clair, mais une meilleure organisation des ressources serait utile.
        </div>
        <div class="comment-actions">
          <button onclick="alert('Répondre à Leila Ben Ali')">Répondre</button>
          <button onclick="alert('Like ajouté à Leila Ben Ali')">J'aime</button>
          <button class="btn-delete" onclick="deleteComment('comment-2')">Supprimer</button>
        </div>
      </div>
    </div>

    <!-- Ajouter un commentaire -->
    <div class="add-comment">
      <input type="text" placeholder="Ajouter un commentaire..." />
      <button onclick="alert('Commentaire ajouté')">Publier</button>
    </div>
  </div>

  <script>
    
    // Fonction pour supprimer un commentaire
    function deleteComment(commentId) {
      var comment = document.getElementById(commentId);
      comment.remove(); // Supprimer le commentaire
      alert('Le commentaire a été supprimé.');
    }
  </script>




    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <h2 style="text-align: center;">Users Geolocation Map</h2>
    <div id="map"></div>
    <div class="info" id="countryNameTooltip"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-ajax/dist/leaflet.ajax.min.js"></script>

    <script>
        // Initialize the map
        const map = L.map('map').setView([20, 0], 2);

        // Add a tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 5,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tooltip for country name
        const tooltip = document.getElementById('countryNameTooltip');

        // Show tooltip on mouse move over a country
        function showTooltip(e, countryName) {
            tooltip.style.display = 'block';
            tooltip.style.left = (e.originalEvent.pageX + 5) + 'px'; // Adjusted to +5 for closer placement
            tooltip.style.top = (e.originalEvent.pageY + 5) + 'px';  // Adjusted to +5 for closer placement
            tooltip.innerHTML = `<strong>${countryName}</strong>`;
        }

        // Hide tooltip
        function hideTooltip() {
            tooltip.style.display = 'none';
        }

        // Load GeoJSON data for the countries
        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: (e) => highlightFeature(e, feature.properties.name),
                mouseout: resetHighlight,
                mousemove: (e) => showTooltip(e, feature.properties.name)
            });
        }

        // Highlight feature with a fine black border and blue fill on hover
        function highlightFeature(e, countryName) {
            const layer = e.target;
            layer.setStyle({
                weight: 1, // Fine border
                color: '#000000', // Black border color
                fillColor: '#007bff', // Blue fill color
                fillOpacity: 0.7
            });
            showTooltip(e, countryName); // Show tooltip with country name
        }

        // Reset highlight and hide tooltip
        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            hideTooltip();
        }

        // Add GeoJSON layer with default colors
        const geojson = L.geoJson(null, {
            style: {
                color: "#ffffff", // Default border color
                weight: 1,
                fillColor: "#f0f0f0", // Default fill color (light gray)
                fillOpacity: 1
            },
            onEachFeature: onEachFeature
        }).addTo(map);

        // Fetch and add GeoJSON data
        const geojsonURL = "https://raw.githubusercontent.com/johan/world.geo.json/master/countries.geo.json";
        fetch(geojsonURL)
            .then(response => response.json())
            .then(data => geojson.addData(data));
    </script>
</body>
</html>


  <script src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/js/sidebarmenu.js"></script>
  <script src="C:/xampp/htdocs/Learnify web site/views/backend/src/assets/js/app.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  
  

</html>