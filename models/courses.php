<?php
class Course {
    private $id;
    private $courseTitle;
    private $tutorName;
    private $id_categorie;
    private $duration;
    private $price;
    private $description;
    private $conn;

    // Constructor accepts a database connection
    public function __construct($conn, $id = null, $courseTitle = null, $tutorName = null, $id_categorie = null, $duration = null, $price = null, $description = null) {
        $this->conn = $conn;
        if ($id) {
            $this->id = $id;
            $this->courseTitle = $courseTitle;
            $this->tutorName = $tutorName;
            $this->id_categorie = $id_categorie;
            $this->duration = $duration;
            $this->price = $price;
            $this->description = $description;
        }
    }

    // Getter methods
    public function getCourseTitle() { return $this->courseTitle; }
    public function getTutorName() { return $this->tutorName; }
    public function getIdCategorie() { return $this->id_categorie; }
    public function getDuration() { return $this->duration; }
    public function getPrice() { return $this->price; }
    public function getDescription() { return $this->description; }

    // Create a new course
    public function create() {
        try {
            $sql = "INSERT INTO courses (course_title, tutor_name, id_categorie, duration, price, description) 
                    VALUES (:courseTitle, :tutorName, :id_categorie, :duration, :price, :description)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':courseTitle', $this->courseTitle);
            $stmt->bindParam(':tutorName', $this->tutorName);
            $stmt->bindParam(':id_categorie', $this->id_categorie);
            $stmt->bindParam(':duration', $this->duration);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':description', $this->description);
            return $stmt->execute() ? "Record Inserted Successfully" : "Error: Could not insert record.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Read a course by ID
    public function read() {
        try {
            $sql = "SELECT * FROM courses WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $course = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($course) {
                $this->courseTitle = $course['course_title'];
                $this->tutorName = $course['tutor_name'];
                $this->id_categorie = $course['id_categorie'];
                $this->duration = $course['duration'];
                $this->price = $course['price'];
                $this->description = $course['description'];
                return $course;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Update course details
    public function update() {
        try {
            $sql = "UPDATE courses SET course_title = :courseTitle, tutor_name = :tutorName, 
                    id_categorie = :id_categorie, duration = :duration, price = :price, description = :description
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':courseTitle', $this->courseTitle);
            $stmt->bindParam(':tutorName', $this->tutorName);
            $stmt->bindParam(':id_categorie', $this->id_categorie);
            $stmt->bindParam(':duration', $this->duration);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute() ? "Update Successful" : "Error: Could not update record.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Delete a course
    public function delete() {
        try {
            $sql = "DELETE FROM courses WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute() ? "Record Deleted Successfully" : "Error: Could not delete record.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Method to get all courses by category
    public function getCoursesByCategory($id_categorie) {
        try {
            $sql = "SELECT * FROM courses WHERE id_categorie = :id_categorie";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Method to get all categories
    public function getCategories() {
        try {
            $sql = "SELECT * FROM categorie";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
