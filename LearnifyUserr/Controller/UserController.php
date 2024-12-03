<?php
require_once '../config.php';
require_once '../Model/User.php';
class UserController{

    private PDO $pdo;

    public function __construct() {
        $this->pdo = config::getConnexion();
    }

    // Method to handle adding a new document
    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $niveauUni = $_POST['niveauUni'];
            $universite = $_POST['universite'];
            $role = $_POST['role'];
            $etat = isset($_POST['etat']) ? (int) $_POST['etat'] : 0;
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User($id, $nom, $prenom, $niveauUni, $universite, $role,$etat,$email,$password, $this->pdo);

            if ($user->addUser() == true ) {
                header('Location: ../View/userDetails.php?success=true');
                exit;
            } else {
                header('Location: ../View/userDetails.php?error=true');
                exit;
            }
        }
    }

    // Method to handle editing a document
    public function editUser() {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $user = User::searchUser($this->pdo, $id);
    
            if ($user && count($user) > 0) {
                $user = $user[0];  // Get the first (and only) document
                require '../View/userDetails.php';  // Pass the document to the view
            } else {
                echo "user not found!";
                exit;
            }
        } else {
            echo "Invalid user ID!";
            exit;
        }
    }
    
    

    // Method to handle updating a user
public function updateUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Safely retrieve form values with defaults
        $id = isset($_POST['editId']) ? (int)$_POST['editId'] : 0;
        $nom = $_POST['editNom'] ?? '';
        $prenom = $_POST['editPrenom'] ?? '';
        $niveauUni = $_POST['editNiveauUni'] ?? '';
        $universite = $_POST['editUniversite'] ?? '';
        $role = $_POST['editRole'] ?? '';
        $etat = isset($_POST['editEtat']) ? (int) $_POST['editEtat'] : 0;
        $email = $_POST['editEmail'] ?? '';
        $password = $_POST['editPassword'] ?? '';

        // Validate required fields
        if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
            header('Location: ../View/userDetails.php?error=missing_data');
            exit;
        }

        // Create User object
        $user = new User($id, $nom, $prenom, $niveauUni, $universite, $role, $etat, $email, $password, $this->pdo);

        // Update logic
        if ($user->updateUser()) {
            header('Location: ../View/userDetails.php?success=true');
        } else {
            header('Location: ../View/userDetails.php?error=true');
        }
        exit;
    }
}   

public function restrictUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Safely retrieve the user ID
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $etat = isset($_POST['etat']) ? (int) $_POST['etat'] : 0;
        // Check if ID is valid
        if ($id <= 0) {
            header('Location: ../View/userDetails.php?error=invalid_id');
            exit;
        }
        if ($etat == 0) {
            // Call the model method to delete the user
            $user = new User($id, '', '', '', '', '', $etat, '', '', $this->pdo);
            if ($user->restrictUser($id,1)) {
                header('Location: ../View/userDetails.php?success=restrected');
            } else {
                header('Location: ../View/userDetails.php?error=drestrict_failed');
            }
            exit;
        }
        else {
            // Call the model method to delete the user
            $user = new User($id, '', '', '', '', '', $etat, '', '', $this->pdo);
            if ($user->restrictUser($id,0)) {
                header('Location: ../View/userDetails.php?success=restrected');
            } else {
                header('Location: ../View/userDetails.php?error=drestrict_failed');
            }
            exit;
        }

        
    }
}   
    


    // Method to handle deleting a user
    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Safely retrieve the user ID
            $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

            // Check if ID is valid
            if ($id <= 0) {
                header('Location: ../View/userDetails.php?error=invalid_id');
                exit;
            }

            // Call the model method to delete the user
            $user = new User($id, '', '', '', '', '', 0, '', '', $this->pdo);
            if ($user->deleteUser()) {
                header('Location: ../View/userDetails.php?success=deleted');
            } else {
                header('Location: ../View/userDetails.php?error=delete_failed');
            }
            exit;
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../View/login.php?logout=success');
        exit();
    }
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            if (empty($email) || empty($password)) {
                header('Location: ../View/login.php?error=missing_credentials');
                exit();
            }
    
            try {
                // Fetch user by email
                $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch();
    
                if ($user && $password === $user['password']) { // Plain-text comparison
                    if ($user['etat'] == 0) {
                        # code...
                    
                        // Start session and set session variables
                        session_start();
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['nom'] . ' ' . $user['prenom'];
                        $_SESSION['role'] = $user['role'];
        
                        // Redirect based on user role
                        if ($user['role'] === 'manager_des_stages' || $user['role'] === 'admin') {
                            header('Location: ../View/userDetails.php');
                        } else {
                            header('Location: ../View/LearnifyFront/Learnify-html-template/front.php');
                        }
                        exit();
                    }
                    else {
                        header('Location: ../View/login.php?error=user_blocked');
                        exit();
                    }
                } else {
                    header('Location: ../View/login.php?error=invalid_credentials');
                    exit();
                }
            } catch (Exception $e) {
                error_log('Login Error: ' . $e->getMessage());
                header('Location: ../View/login.php?error=server_error');
                exit();
            }
        }
    }
    
    
    

    public function signUp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $niveauUniversitaire = $_POST['niveauUniversitaire'] ?? '';
            $universite = $_POST['universite'] ?? '';
            $email = $_POST['email'] ?? '';
            $motDePasse = $_POST['motDePasse'] ?? '';
            $confirmerMotDePasse = $_POST['confirmerMotDePasse'] ?? '';
    
            // Validate required fields
            if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse) || empty($confirmerMotDePasse)) {
                header('Location: ../View/signup.php?error=missing_fields');
                exit;
            }
    
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../View/signup.php?error=invalid_email');
                exit;
            }
    
            // Check if passwords match
            if ($motDePasse !== $confirmerMotDePasse) {
                header('Location: ../View/signup.php?error=password_mismatch');
                exit;
            }
    
            // Save user to the database
            try {
                $user = new User(0, $nom, $prenom, $niveauUniversitaire, $universite, 'etudiant', 0, $email, $motDePasse, $this->pdo);
                if ($user->save()) {
                    header('Location: ../View/login.php?success=true');
                } else {
                    header('Location: ../View/signup.php?error=save_failed');
                }
            } catch (Exception $e) {
                error_log('Signup Error: ' . $e->getMessage());
                header('Location: ../View/signup.php?error=server_error');
            }
            exit();
        }
    }
    
    public function searchAndSortUsers() {
        $search = $_GET['search'] ?? '';
        $sortBy = $_GET['sortBy'] ?? 'id';
        $order = $_GET['order'] ?? 'ASC';
    
        try {
            // Call the model function
            $users = User::searchAndSortUsers($this->pdo, $search, $sortBy, $order);
            require '../View/userDetails.php'; // Pass the users to the view
        } catch (Exception $e) {
            error_log('Search and Sort Error: ' . $e->getMessage());
            header('Location: ../View/userDetails.php?error=search_failed');
        }
    }
    
    public function getUserStatistics() {
        try {
            // Fetch statistics from the model
            $stats = User::getUserStatistics($this->pdo);
    
            // Calculate the percentages
            $totalUsers = $stats['total_users'];
            $percentageUsers = ($totalUsers > 0) ? round(($totalUsers / $totalUsers) * 100) : 0;
            $percentageAdmins = ($totalUsers > 0) ? round(($stats['total_admins'] / $totalUsers) * 100) : 0;
            $percentageManagers = ($totalUsers > 0) ? round(($stats['total_managers'] / $totalUsers) * 100) : 0;
            $percentageActive = ($totalUsers > 0) ? round(($stats['active_users'] / $totalUsers) * 100) : 0;
    
            // Add data for charts
            $chartData = [
                'total_users' => $totalUsers,
                'total_admins' => $stats['total_admins'],
                'total_managers' => $stats['total_managers'],
                'active_users' => $stats['active_users'],
                'percentage_users' => $percentageUsers,
                'percentage_admins' => $percentageAdmins,
                'percentage_managers' => $percentageManagers,
                'percentage_active' => $percentageActive
            ];
    
            // Extract array values into individual variables
            extract($chartData);
    
            // Include the view (userDetails.php)
            include('../View/userDetails.php'); // Now the variables are available in the view
    
        } catch (Exception $e) {
            throw new Exception('Error fetching statistics: ' . $e->getMessage());
        }
    }
    
    public function passwordReset() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
    
            // Validate email
            if (empty($email)) {
                header('Location: ../View/oublierMDP.php?error=missing_email');
                exit();
            }
    
            try {
                // Check if the email exists
                $stmt = $this->pdo->prepare("SELECT id FROM user WHERE email = :email");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch();
    
                if ($user) {
                    // Generate reset token and expiration
                    $resetToken = bin2hex(random_bytes(16));
                    $expiresAt = date("Y-m-d H:i:s", strtotime('+1 hour'));
    
                    // Store the reset token in the database
                    $updateStmt = $this->pdo->prepare("
                        UPDATE user SET reset_token = :token, token_expiry = :expiry WHERE email = :email
                    ");
                    $updateStmt->execute([
                        'token' => $resetToken,
                        'expiry' => $expiresAt,
                        'email' => $email
                    ]);
    
                    // Generate reset link
                    $resetLink = "http://localhost/LearnifyUser/View/resetPassword.php?token=$resetToken";

    
                    // Send email
                    mail(
                        $email,
                        "Password Reset Request",
                        "Click the following link to reset your password: $resetLink",
                        "From: adembennour3@gmail.com"
                    );
    
                    header('Location: ../View/oublierMDP.php?success=email_sent');
                    exit();
                } else {
                    header('Location: ../View/oublierMDP.php?error=email_not_found');
                    exit();
                }
            } catch (Exception $e) {
                error_log('Password Reset Error: ' . $e->getMessage());
                header('Location: ../View/oublierMDP.php?error=server_error');
                exit();
            }
        }
    }
    

   

}

// Instantiate the controller
$controller = new UserController();

// Determine the action to take based on the URL parameter 'action'
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'addUser':
            $controller->addUser();
            break;
        case 'updateUser':
            $controller->updateUser();
            break;
        case 'deleteUser':
            $controller->deleteUser();
            break;
        case 'restrictUser':
            $controller->restrictUser();
            break;
        case 'signUp': 
            $controller->signUp();
            break;
        case 'login':
            $controller->login();
            break;
        case 'logout':
            $controller->logout();
            break;
        case 'searchAndSortUsers':
            $controller->searchAndSortUsers();
            break;
        case 'passwordReset':
            $controller->passwordReset();
            break;
            
        default:
            header('Location: ../View/userDetails.php?error=unknown_action');
    }
    
}


?>