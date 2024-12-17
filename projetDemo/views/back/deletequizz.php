<?php
include 'C:/xampp/htdocs/projetDemo/controller/QuizzQ.php';

if (isset($_GET['id_quizz']) && !empty($_GET['id_quizz'])) {
    $id_quizz = $_GET['id_quizz'];
    $quizzQ = new QuizzQ();

    // Appel de la méthode pour supprimer le quizz
    if ($quizzQ->deleteQuizz($id_quizz)) {
        header('Location: listQuizz.php'); // Redirige vers la liste des quizz en cas de succès
        exit();
    } else {
        echo 'Erreur lors de la suppression du quizz. Le quizz avec ID ' . htmlspecialchars($id_quizz) . ' n\'a pas été trouvé ou une erreur SQL s\'est produite.';
    }
} else {
    echo 'ID invalide spécifié pour la suppression.';
}
?>
