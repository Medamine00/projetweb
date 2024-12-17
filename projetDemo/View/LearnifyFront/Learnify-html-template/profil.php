<?php
// Include database connection and User model
require_once '../../../config.php';
require_once '../../../Model/User.php';

session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?error=unauthorized');
    exit();
}


// Fetch user data from the database
$pdo = config::getConnexion();
$stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: login.php?error=server_error');
    exit();
}

// Success/Error Message Handling
$success = isset($_GET['success']) && $_GET['success'] === 'true';
$error = isset($_GET['error']) ? $_GET['error'] : null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
            <a href="front.php" class="nav-item nav-link ">Acceuil</a>
            <a href="../../stageListUser.php" class="nav-item nav-link">Internships</a>
            <a href="../../../views/front/listpoint.php" class="nav-item nav-link ">Notes </a>
                <a href="../../../views/front/listQuizz.php" class="nav-item nav-link">Quizz</a>
                <a href="../../../views/front/course_front.php" class="nav-item nav-link ">Courses</a>
                <a href="../../../front office/elearning-html-template/formations.php" class="nav-item nav-link  ">Training</a>

            </div>
            <!-- User Info Section -->
            <div class="dropdown">
                <button class="btn btn-primary py-2 px-4 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="../../../Controller/UserController.php?action=logout">Logout</a></li>
                    <li><a class="dropdown-item" href="profil.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Profile Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="mb-4 text-center">Your Profile</h2>

                <!-- Success/Error Messages -->
                <?php if ($success): ?>
                    <div class="alert alert-success">Profile updated successfully!</div>
                <?php elseif ($error): ?>
                    <div class="alert alert-danger">Failed to update profile. Please try again.</div>
                <?php endif; ?>

                <!-- Profile Form -->
                <form action="../../../Controller/UserController.php?action=updateUser" method="POST">
                    <input type="hidden" name="editId" value="<?php echo htmlspecialchars($user['id']); ?>">
                    <input type="hidden" name="editEtat" value="<?php echo htmlspecialchars($user['etat']); ?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="editNom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="editPrenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="niveauUni" class="form-label">Niveau Universitaire</label>
                        <select id="niveauUni" name="editNiveauUni" class="form-select" required>
                            <option value="1ere" <?php if ($user['niveauUni'] === '1ere') echo 'selected'; ?>>1ère année</option>
                            <option value="2eme" <?php if ($user['niveauUni'] === '2eme') echo 'selected'; ?>>2ème année</option>
                            <option value="3eme" <?php if ($user['niveauUni'] === '3eme') echo 'selected'; ?>>3ème année</option>
                            <option value="4eme" <?php if ($user['niveauUni'] === '4eme') echo 'selected'; ?>>4ème année</option>
                            <option value="5eme" <?php if ($user['niveauUni'] === '5eme') echo 'selected'; ?>>5ème année</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="universite" class="form-label">Université</label>
                        <select id="universite" name="editUniversite" class="form-select" required>
                            <option value="Esprit" <?php if ($user['universite'] === 'Esprit') echo 'selected'; ?>>Esprit</option>
                            <option value="MedTech" <?php if ($user['universite'] === 'MedTech') echo 'selected'; ?>>MedTech</option>
                            <option value="Faculte des sciences" <?php if ($user['universite'] === 'Faculte des sciences') echo 'selected'; ?>>Faculté des sciences</option>
                            <option value="ENIT" <?php if ($user['universite'] === 'ENIT') echo 'selected'; ?>>ENIT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="editEmail" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="editPassword" value="<?php echo htmlspecialchars($user['password']); ?>" placeholder="Enter new password if you want to update">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Profile End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5">
        <div class="container py-5">
            <p class="text-center m-0">&copy; 2024 Learnify. All Rights Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
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
