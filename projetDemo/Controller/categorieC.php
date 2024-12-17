<?php
// Inclure le modèle de la catégorie
include('C:/xampp/htdocs/projet/models/categorie.php');

// Inclure la classe de configuration pour la connexion à la base de données
include_once("C:/xampp/htdocs/projet/config.php");

// Vérification de l'action (ajouter, modifier, supprimer)
if (isset($_POST['nom_categorie']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification si l'id de la catégorie est présent, sinon on fait un ajout
    if (isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])) {
        // Modification d'une catégorie
        $id_categorie = $_POST['id_categorie'];
        $nom_categorie = $_POST['nom_categorie'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];

        // Créer une instance de la classe Categorie et utiliser les setters
        $categorie = new Categorie();
        $categorie->setNomCategorie($nom_categorie);
        $categorie->setDescription($description);
        $categorie->setDateCreation($date_creation);

        // Appeler la méthode pour mettre à jour la catégorie existante
        $categorie->updateCategory(config::getConnexion(), $id_categorie);

        // Rediriger après la mise à jour
        header("Location:../views/back/ui-Courses.php?message=CategoryUpdated");
        exit;
    } else {
        // Ajouter une nouvelle catégorie
        $nom_categorie = $_POST['nom_categorie'];
        $description = $_POST['description'];
        $date_creation = $_POST['date_creation'];

        // Créer une instance de la classe Categorie et utiliser les setters
        $categorie = new Categorie();
        $categorie->setNomCategorie($nom_categorie);
        $categorie->setDescription($description);
        $categorie->setDateCreation($date_creation);

        // Appeler la méthode pour ajouter une catégorie
        $categorie->addCategory(config::getConnexion());

        // Rediriger après l'ajout ou afficher un message de succès
        header("Location: ../views/back/ui-Courses.php?message=CategoryAdded");
        exit;
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    // Supprimer une catégorie
    $id_categorie = $_GET['id'];
    $categorie = new Categorie();
    $categorie->deleteCategory(config::getConnexion(), $id_categorie);

    // Rediriger après la suppression
    header("Location: ../views/back/ui-Courses.php?message=CategoryDeleted");
    exit;
} elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    // Modifier une catégorie
    $id_categorie = $_GET['id'];
    $categorie = new Categorie();
    $existingCategory = $categorie->getCategory(config::getConnexion(), $id_categorie); // Récupérer les données de la catégorie

    // Vérifier si la catégorie existe
    if ($existingCategory) {
        // Pré-remplir le formulaire avec les valeurs existantes
        $categorie->setNomCategorie($existingCategory['nom_categorie']);
        $categorie->setDescription($existingCategory['description']);
        $categorie->setDateCreation($existingCategory['date_creation']);
        
        // Vérifier si le formulaire est soumis pour mettre à jour la catégorie
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Utiliser les setters pour mettre à jour les propriétés de la catégorie
            $categorie->setNomCategorie($_POST['nom_categorie']);
            $categorie->setDescription($_POST['description']);
            $categorie->setDateCreation($_POST['date_creation']);

            // Appeler la méthode pour mettre à jour la catégorie
            $categorie->updateCategory(config::getConnexion(), $id_categorie);

            // Rediriger après la mise à jour
            header("Location: ../views/back/ui-Courses.php?message=CategoryUpdated");
            exit;
        }
    } else {
        // Si la catégorie n'existe pas, afficher une erreur ou rediriger
        echo "Category not found.";
    }
}
?>
