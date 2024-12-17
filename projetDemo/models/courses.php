<?php
// Inclure la configuration pour la connexion à la base de données
include_once("C:/xampp/htdocs/projetDemo/config.php");

if (!class_exists('CourseModel')) {
    class CourseModel {
        private $db;

        // Constructeur pour initialiser la connexion à la base de données
        public function __construct($db_conn) {
            $this->db = $db_conn;
        }

        // Méthode pour ajouter un cours
        public function addCourse($course_title, $tutor_name, $id_categorie, $description, $duration, $price, $linkmeeting = null) {
            $query = "INSERT INTO courses (course_title, tutor_name, id_categorie, description, duration, price, linkmeeting) 
                      VALUES (:course_title, :tutor_name, :id_categorie, :description, :duration, :price, :linkmeeting)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':course_title', $course_title);
            $stmt->bindParam(':tutor_name', $tutor_name);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':linkmeeting', $linkmeeting); 

            if ($stmt->execute()) {
                return true;
            } else {
                return "Error: " . implode(", ", $stmt->errorInfo());
            }
        }

        // Méthode pour récupérer tous les cours avec un tri dynamique
        public function getCourses($sort_column = 'id', $sort_order = 'ASC') {
            $query = "SELECT * FROM courses ORDER BY $sort_column $sort_order";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Méthode pour récupérer toutes les catégories
        public function getCategories() {
            $query = "SELECT * FROM categorie";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Méthode pour récupérer un cours par son ID
        public function getCourseById($id) {
            $query = "SELECT * FROM courses WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Méthode pour mettre à jour un cours
        public function updateCourse($id, $course_title, $tutor_name, $id_categorie, $description, $duration, $price, $linkmeeting = null) {
            $query = "UPDATE courses 
                      SET course_title = :course_title, tutor_name = :tutor_name, id_categorie = :id_categorie, 
                          description = :description, duration = :duration, price = :price, linkmeeting = :linkmeeting 
                      WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':course_title', $course_title);
            $stmt->bindParam(':tutor_name', $tutor_name);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':linkmeeting', $linkmeeting);

            return $stmt->execute();
        }

        // Méthode pour supprimer un cours
        public function deleteCourse($courseId) {
            $sql = "DELETE FROM courses WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $courseId, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
}
?>
