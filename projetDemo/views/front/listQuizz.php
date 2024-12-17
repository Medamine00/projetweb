<?php
// Inclusion du fichier contenant la classe QuizzQ
require_once 'C:/xampp/htdocs/projet/controller/QuizzQ.php';

// Instanciation de la classe QuizzQ
$quizzController = new QuizzQ();

// Gestion des paramètres d'ordre et de recherche
$order = isset($_GET['order']) && in_array($_GET['order'], ['ASC', 'DESC']) ? $_GET['order'] : 'ASC';
$recherche = isset($_POST['search']) ? trim($_POST['search']) : '';

// Appel à la méthode listQuizz
$list = $quizzController->listQuizz($order, $recherche);

// Préparer les événements pour le calendrier
$events = [];
foreach ($list as $quizz) {
    $events[] = [
        'id' => $quizz['id_quizz'], // ID du quizz
        'title' => $quizz['nom_quizz'], // Nom du quizz comme titre de l'événement
        'start' => $quizz['date_quizz'], // Date du quizz
        'description' => $quizz['description_quizz'], // Description comme info supplémentaire
    ];
}

$eventsJson = json_encode($events); // Convertir en JSON pour JavaScript



?>
<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] === 'manager_des_stages' || $_SESSION['role'] === 'admin')) {
    header('Location: login.php?error=unauthorized');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="..//img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- FullCalendar CSS et JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Learnify</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="../../View/LearnifyFront/Learnify-html-template/front.php" class="nav-item nav-link ">Acceuil</a>
            <a href="../../View/stageListUser.php" class="nav-item nav-link">Internships</a>
                <a href="listpoint.php" class="nav-item nav-link">Notes </a>
                <a href="listQuizz.php" class="nav-item nav-link active">Quizz</a>
                <a href="course_front.php" class="nav-item nav-link ">Courses</a>
                <a href="../../front office/elearning-html-template/formations.php" class="nav-item nav-link  ">Training</a>

            </div>
            <!-- User Info Section -->
            <div class="dropdown">
                <button class="btn btn-primary py-2 px-4 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="../../Controller/UserController.php?action=logout">Logout</a></li>
                <li><a class="dropdown-item" href="../../View/LearnifyFront/Learnify-html-template/profil.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->





    <!-- Formulaire de recherche et tri -->
<div class="container mt-5">
    <form action="listQuizz.php" method="post" class="d-flex" style="width: 100%; max-width: 600px;">
        <input type="text" name="search" class="form-control rounded-start" placeholder="Rechercher un quizz" value="<?= htmlspecialchars($recherche) ?>">
        <button class="btn btn-outline-primary rounded-end" type="submit">Rechercher</button>
    </form>

    <form action="listQuizz.php" method="get" class="d-flex mt-3" style="max-width: 250px;">
        <label for="order">Trier par date :</label>
        <select name="order" id="order" class="form-control" onchange="this.form.submit()">
            <option value="ASC" <?= $order == 'ASC' ? 'selected' : ''; ?>>Croissant</option>
            <option value="DESC" <?= $order == 'DESC' ? 'selected' : ''; ?>>Décroissant</option>
        </select>
    </form>
</div>


        <!-- Calendrier -->
        <div id="calendar"></div>
    </div>

    <!-- Script pour le calendrier -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var events = <?= $eventsJson; ?>; // Injecter les événements depuis PHP

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events, // Charger les événements
                eventClick: function(info) {
                    // Afficher les détails d'un événement lorsqu'on clique dessus
                    alert(
                        'Quizz : ' + info.event.title +
                        '\nDescription : ' + info.event.extendedProps.description +
                        '\nDate : ' + info.event.start.toISOString().split('T')[0]
                    );
                }
            });

            calendar.render();
        });
    </script>

    <style>
        #calendar {
            max-width: 900px; /* Taille ajustée */
            margin: 20px auto; /* Centrage */
            border: 1px solid #ccc; /* Bordure */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
            font-family: Arial, sans-serif;
            background-color: #fefefe; /* Couleur de fond */
        }

        .fc-toolbar-title {
            color: #007bff; /* Couleur du titre */
            font-weight: bold;
        }

        .fc-daygrid-event {
            background-color: #007bff !important; /* Couleur des événements */
            color: white !important; /* Texte blanc */
            border-radius: 5px; /* Coins arrondis */
        }

        .fc-button {
            background-color: #28a745; /* Couleur des boutons */
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .fc-button:hover {
            background-color: #218838; /* Survol des boutons */
        }
    </style>




    <body>
    <div class="container">
        <!-- Entête de page avec bouton pour ajouter un quizz -->
        <div class="d-flex justify-content-between mb-5"> <!-- Espacement avec "mb-5" -->
            <h1>Liste des Quizz</h1>
        </div>

        <!-- Liste des quizz -->
        <div class="quizz-list">
            <ul class="list-group">
                <?php
                // Boucle pour afficher chaque quizz dans la liste
                foreach ($list as $quizz) {
                ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="quizzmath.html"><!-- Affichage du nom du quizz -->
                            <strong>Nom :</strong> <?= htmlspecialchars($quizz['nom_quizz']); ?><br>

                            <!-- Affichage de la description du quizz -->
                            <strong>Description :</strong> <?= htmlspecialchars($quizz['description_quizz']); ?><br>

                            <!-- Affichage de la date du quizz -->
                            <strong>Date :</strong> <?= htmlspecialchars($quizz['date_quizz']); ?></a>
                        </div>
                        
                        
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</body>

<style>
.quizz-list {
    margin-top: 30px;
}

.list-group-item {
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
}

.list-group-item:hover {
    background-color: #e9ecef;
}

strong {
    font-weight: bold;
    margin-right: 5px;
}
</style>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="..//lib/wow/wow.min.js"></script>
    <script src="..//lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="..//js/main.js"></script>
    
    <script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2024/12/10/00/20241210001039-X5DA3JYK.js"></script>
    
</body>
<script src="js/main.js"></script>
    <script>
        window.embeddedChatbotConfig = {
        chatbotId: "O6Os6sDN5zXDJG98InQ0v",
        domain: "www.chatbase.co"
        }
    </script>
    <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="O6Os6sDN5zXDJG98InQ0v"
        domain="www.chatbase.co"
        defer>
    </script>
</html>