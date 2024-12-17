<?php
// Utilisez include_once pour éviter des inclusions multiples
include_once("C:/xampp/htdocs/projetDemo/models/courses.php");

if (!class_exists('CourseController')) {
    class CourseController {
        private $courseModel;

        // Constructeur : initialiser le modèle avec la connexion à la base de données
        public function __construct($db_conn) {
            $this->courseModel = new CourseModel($db_conn);
        }

        // Ajouter un cours
        public function handleAddCourse() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["subscribe"])) {
                // Récupérer et nettoyer les données
                $course_title = htmlspecialchars(trim($_POST["course_title"]));
                $tutor_name = htmlspecialchars(trim($_POST["tutor_name"]));
                $id_categorie = isset($_POST["id_categorie"]) ? intval($_POST["id_categorie"]) : 0;
                $description = htmlspecialchars(trim($_POST["description"]));
                $duration = htmlspecialchars(trim($_POST["duration"]));
                $price = isset($_POST["price"]) ? floatval($_POST["price"]) : 0;
                $linkmeeting = isset($_POST["linkmeeting"]) ? htmlspecialchars(trim($_POST["linkmeeting"])) : null;

                // Vérification des données
                if (!empty($course_title) && !empty($tutor_name) && $id_categorie > 0 && !empty($description) && !empty($duration) && $price > 0) {
                    $result = $this->courseModel->addCourse($course_title, $tutor_name, $id_categorie, $description, $duration, $price, $linkmeeting);

                    // Vérification du résultat de l'ajout
                    if ($result === true) {
                        return "<div class='alert alert-success'>Course successfully added!</div>";
                    } else {
                        return "<div class='alert alert-danger'>{$result}</div>";
                    }
                } else {
                    return "<div class='alert alert-warning'>All fields are required and must be valid.</div>";
                }
            }
            return ''; // Retourner une chaîne vide si aucune action n'a eu lieu
        }

        // Obtenir les catégories
        public function getCategories() {
            return $this->courseModel->getCategories();
        }

        // Lister les cours avec tri dynamique
        public function listCourses() {
            // Définir les colonnes et ordres de tri par défaut
            $sort_column = isset($_GET['sort_column']) ? $_GET['sort_column'] : 'id';
            $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC';

            // Vérifier que les colonnes de tri sont valides
            $valid_columns = ['id', 'course_title', 'tutor_name', 'id_categorie', 'duration', 'price', 'description', 'linkmeeting'];
            $valid_orders = ['ASC', 'DESC'];

            if (!in_array($sort_column, $valid_columns)) {
                $sort_column = 'id'; // Valeur par défaut pour la colonne de tri
            }

            if (!in_array($sort_order, $valid_orders)) {
                $sort_order = 'ASC'; // Valeur par défaut pour l'ordre de tri
            }

            // Récupérer les cours triés
            $courses = $this->courseModel->getCourses($sort_column, $sort_order);

            // Vérifier si les cours ont été récupérés
            if ($courses === false) {
                die("Error: No courses found or unable to fetch data.");
            }

            return $courses;
        }
          // Méthode pour mettre à jour un cours
    public function updateCourse($courseId, $courseTitle, $tutorName, $idCategorie, $duration, $price, $description, $linkmeeting) {
        $sql = "UPDATE courses SET 
            course_title = :course_title, 
            tutor_name = :tutor_name, 
            id_categorie = :id_categorie, 
            duration = :duration, 
            price = :price, 
            description = :description, 
            linkmeeting = :linkmeeting
            WHERE id = :course_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_title', $courseTitle);
        $stmt->bindParam(':tutor_name', $tutorName);
        $stmt->bindParam(':id_categorie', $idCategorie);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':linkmeeting', $linkmeeting);
        $stmt->bindParam(':course_id', $courseId);

        return $stmt->execute();
    }

    public function deleteCourse($courseId) {
        try {
            $query = "DELETE FROM courses WHERE id = :course_id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':course_id', $courseId);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    }
}
?>
