<?php
class Categorie {
    private $id_categorie;
    private $nom_categorie;
    private $description;
    private $date_creation;
    private $conn;

    // Constructor accepts a database connection
    public function __construct($conn, $nom_categorie = null, $description = null, $date_creation = null) {
        $this->conn = $conn;
        $this->nom_categorie = $nom_categorie;
        $this->description = $description;
        $this->date_creation = $date_creation;
    }

    // Getter methods
    public function getIdCategorie() { return $this->id_categorie; }
    public function getNomCategorie() { return $this->nom_categorie; }
    public function getDescription() { return $this->description; }
    public function getDateCreation() { return $this->date_creation; }

    // Create a new category
    public function create() {
        try {
            $sql = "INSERT INTO categorie (nom_categorie, description, date_creation) 
                    VALUES (:nom_categorie, :description, :date_creation)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nom_categorie', $this->nom_categorie);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':date_creation', $this->date_creation);
            if ($stmt->execute()) {
                $this->id_categorie = $this->conn->lastInsertId(); // Get the last inserted ID
                return "Category Created Successfully with ID: " . $this->id_categorie;
            } else {
                return "Error: Could not create category.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Read a category by ID
    public function read() {
        try {
            $sql = "SELECT * FROM categorie WHERE id_categorie = :id_categorie";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_categorie', $this->id_categorie);
            $stmt->execute();
            $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($categorie) {
                $this->nom_categorie = $categorie['nom_categorie'];
                $this->description = $categorie['description'];
                $this->date_creation = $categorie['date_creation'];
                return $categorie;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Update category details
    public function update() {
        try {
            $sql = "UPDATE categorie SET nom_categorie = :nom_categorie, description = :description, 
                    date_creation = :date_creation WHERE id_categorie = :id_categorie";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nom_categorie', $this->nom_categorie);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':date_creation', $this->date_creation);
            $stmt->bindParam(':id_categorie', $this->id_categorie);
            return $stmt->execute() ? "Category Updated Successfully" : "Error: Could not update category.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Delete a category
    public function delete() {
        try {
            $sql = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_categorie', $this->id_categorie);
            return $stmt->execute() ? "Category Deleted Successfully" : "Error: Could not delete category.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    // Method to get all categories
    public function getAllCategories() {
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
