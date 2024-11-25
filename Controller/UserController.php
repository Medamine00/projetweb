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
                $user = new User(0, $nom, $prenom, $niveauUniversitaire, $universite, 'etudiant', 1, $email, $motDePasse, $this->pdo);
                if ($user->save()) {
                    header('Location: ../View/LearnifyFront/Learnify-html-template/front.php?success=true');
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
    
    

    /*public function search() {
        $pdo = config::getConnexion();
    
        // Retrieve search and sort parameters
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $author = isset($_GET['author']) ? $_GET['author'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $date = isset($_GET['date']) ? $_GET['date'] : ''; // Added date filter
        $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'id_document';
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
    
        // Base query
        $query = "SELECT * FROM document WHERE 1=1";
    
        // Add filtering conditions
        if (!empty($title)) {
            $query .= " AND titre LIKE :title";
        }
        if (!empty($author)) {
            $query .= " AND auteur LIKE :author";
        }
        if (!empty($category)) {
            $query .= " AND categorie LIKE :category";
        }
        if (!empty($date)) {
            $query .= " AND date_publication = :date";
        }
    
        // Add sorting
        $query .= " ORDER BY $sortBy $order";
    
        // Prepare the statement
        $stmt = $pdo->prepare($query);
    
        // Bind values for filtering
        if (!empty($title)) {
            $stmt->bindValue(':title', "%$title%");
        }
        if (!empty($author)) {
            $stmt->bindValue(':author', "%$author%");
        }
        if (!empty($category)) {
            $stmt->bindValue(':category', "%$category%");
        }
        if (!empty($date)) {
            $stmt->bindValue(':date', $date);
        }
    
        // Execute the query
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Output the results as HTML table rows
        foreach ($documents as $document) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($document['titre']) . "</td>";
            echo "<td>" . htmlspecialchars($document['auteur']) . "</td>";
            echo "<td>" . htmlspecialchars($document['date_publication']) . "</td>";
            echo "<td>" . htmlspecialchars($document['categorie']) . "</td>";
            echo "<td>" . htmlspecialchars($document['description']) . "</td>";
            echo "<td>
                    <form action='../Controller/EmpruntController.php?action=addEmpruntFront' method='POST'>
                        <input type='hidden' name='id_document' value='" . htmlspecialchars($document['id_document']) . "'>
                        <button type='submit' class='borrow-button'>Borrow</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
    }
    
    
    public function searchB()
    {
        $pdo = config::getConnexion();
    
        // Retrieve search and sort parameters
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $author = isset($_GET['author']) ? $_GET['author'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'id_document';
        $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
    
        // Base query
        $query = "SELECT * FROM document WHERE 1=1";
    
        // Add filtering conditions
        if (!empty($title)) {
            $query .= " AND titre LIKE :title";
        }
        if (!empty($author)) {
            $query .= " AND auteur LIKE :author";
        }
        if (!empty($category)) {
            $query .= " AND categorie LIKE :category";
        }
    
        // Add sorting
        $query .= " ORDER BY $sortBy $order";
    
        // Prepare the statement
        $stmt = $pdo->prepare($query);
    
        // Bind values for filtering
        if (!empty($title)) {
            $stmt->bindValue(':title', "%$title%");
        }
        if (!empty($author)) {
            $stmt->bindValue(':author', "%$author%");
        }
        if (!empty($category)) {
            $stmt->bindValue(':category', "%$category%");
        }
    
        // Execute the query
        $stmt->execute();
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Output the results as HTML table rows
        foreach ($documents as $document) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($document['id_document']) . "</td>";
            echo "<td>" . htmlspecialchars($document['titre']) . "</td>";
            echo "<td>" . htmlspecialchars($document['auteur']) . "</td>";
            echo "<td>" . htmlspecialchars($document['date_publication']) . "</td>";
            echo "<td>" . htmlspecialchars($document['categorie']) . "</td>";
            echo "<td>" . htmlspecialchars($document['description']) . "</td>";
            echo "<td>
                    <button class='btn btn-danger' onclick='deleteDocument(" . $document['id_document'] . ")'><i class='fas fa-trash-alt'></i></button>
                    <button class='btn btn-primary' onclick='redirectToUpdateForm(" . $document['id_document'] . ")'><i class='fas fa-edit'></i></button>
                  </td>";
            echo "</tr>";
        }
    }
    */

   

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
        case 'signUp': 
            $controller->signUp();
            break;
        case 'login':
            $controller->login();
            break;
        case 'logout':
            $controller->logout();
            break;
        default:
            header('Location: ../View/userDetails.php?error=unknown_action');
    }
    
}


?>