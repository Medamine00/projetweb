<?php
include '../../view/index.php'; // Database connection

try {
    // Default query
    $sql = "SELECT * FROM formation";

    // Check if a search term is provided
    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
        $search = "%" . trim($_GET['search']) . "%"; // Use wildcard for partial matches
        $sql = "SELECT * FROM formation WHERE nom_formation LIKE :search";
    }

    $stmt = $conn->prepare($sql);

    // Bind the search term if needed
    if (isset($search)) {
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    }

    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching formations: " . htmlspecialchars($e->getMessage()));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - Search Formations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] === 'manager_des_stages' || $_SESSION['role'] === 'admin')) {
    header('Location: login.php?error=unauthorized');
    exit();
}
?>
<head>
    <meta charset="utf-8">
    <title>Learnify - Learnify HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/Projet/views/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/Projet/views/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/Projet/views/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/Projet/views/css/style.css" rel="stylesheet">
    
</head>

<body>



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
                <a href="../../views/front/listpoint.php" class="nav-item nav-link ">Notes </a>
                <a href="../../views/front/listQuizz.php" class="nav-item nav-link">Quizz</a>
                <a href="../../views/front/course_front.php" class="nav-item nav-link  ">Courses</a>
                <a href="formations.php" class="nav-item nav-link active ">Training</a>
            </div>
            <!-- User Info Section -->
            <div class="dropdown">
                <button class="btn btn-primary py-2 px-4 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="../Controller/UserController.php?action=logout">Logout</a></li>
                    <li><a class="dropdown-item" href="../../View/LearnifyFront/Learnify-html-template/profil.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container text-center">
            <h1 class="text-white">Search Formations</h1>
        </div>
    </div>

    <!-- Search Form -->
    <div class="container">
        <form method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a formation..."
                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Results Section -->
        <div class="row">
            <?php
            if ($formations && count($formations) > 0) {
                foreach ($formations as $formation) {
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <a href="formation-details.php?id=<?php echo $formation['id_formation']; ?>" class="course-item d-block bg-light text-center rounded p-3 text-decoration-none">
                            <div class="icon mb-3">
                                <i class="fa fa-code fa-3x text-primary"></i>
                            </div>
                            <h5 class="course-title"><?php echo htmlspecialchars($formation['nom_formation']); ?></h5>
                            <span>Duration: <?php echo htmlspecialchars($formation['duration_formation']); ?></span>
                            <div class="mt-2">
                                <strong>Desc: <?php echo htmlspecialchars($formation['description_formation']); ?></strong>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>No formations found.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light footer mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white">Quick Links</h4>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
