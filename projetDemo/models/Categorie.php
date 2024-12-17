<?php
class Categorie {
    private $id_categorie;
    private $nom_categorie;
    private $description;
    private $date_creation;

    // Constructeur pour initialiser la catégorie
    public function __construct($nom_categorie = "", $description = "", $date_creation = "") {
        $this->nom_categorie = $nom_categorie;
        $this->description = $description;
        $this->date_creation = $date_creation;
    }

    // Getter pour nom_categorie
    public function getNomCategorie() {
        return $this->nom_categorie;
    }

    // Setter pour nom_categorie
    public function setNomCategorie($nom_categorie) {
        $this->nom_categorie = $nom_categorie;
    }

    // Getter pour description
    public function getDescription() {
        return $this->description;
    }

    // Setter pour description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter pour date_creation
    public function getDateCreation() {
        return $this->date_creation;
    }

    // Setter pour date_creation
    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }

    // Autres méthodes pour l'ajout, la mise à jour et la suppression des catégories
    public function addCategory($conn) {
        $sql = "INSERT INTO categorie (nom_categorie, description, date_creation) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->nom_categorie, $this->description, $this->date_creation]);
    }

    public function updateCategory($conn, $id_categorie) {
        $sql = "UPDATE categorie SET nom_categorie = ?, description = ?, date_creation = ? WHERE id_categorie = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->nom_categorie, $this->description, $this->date_creation, $id_categorie]);
    }

    public function deleteCategory($conn, $id_categorie) {
        $sql = "DELETE FROM categorie WHERE id_categorie = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_categorie]);
    }

    public function getCategory($conn, $id_categorie) {
        $sql = "SELECT * FROM categorie WHERE id_categorie = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_categorie]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
