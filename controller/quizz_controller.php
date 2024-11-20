<?php
include_once "config.php";

class QuizzController
{
    // Méthode pour afficher un tableau HTML des quizz
    public function show($quizz)
    {
        echo '<table border=1 width="100%">
            <tr align="center">
                <td>ID Quizz</td>
                <td>Nom Quizz</td>
                <td>Description Quizz</td>
                <td>Durée Quizz (minutes)</td>
            </tr>
            <tr>
                <td>' . $quizz["id_quizz"] . '</td>
                <td>' . $quizz["nom_quizz"] . '</td>
                <td>' . $quizz["description_quizz"] . '</td>
                <td>' . $quizz["duration_quizz"] . '</td>
            </tr>
        </table>';
    }

    // Méthode pour récupérer tous les quizz
    public function listQuizz()
    {
        $pdo = config::getConnexion();
        $query = $pdo->query("SELECT * FROM quizz");
        return $query->fetchAll();
    }

    // Méthode pour ajouter un nouveau quizz
    public function addQuizz($quizz)
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("INSERT INTO quizz (nom_quizz, description_quizz, duration_quizz) 
                                VALUES (:nom_quizz, :description_quizz, :duration_quizz)");
        $query->execute([
            'nom_quizz' => $quizz['nom_quizz'],
            'description_quizz' => $quizz['description_quizz'],
            'duration_quizz' => $quizz['duration_quizz'],
        ]);
    }

    // Méthode pour supprimer un quizz par son ID
    public function deleteQuizz($id_quizz)
    {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("DELETE FROM quizz WHERE id_quizz = :id_quizz");
        $query->execute(['id_quizz' => $id_quizz]);
    }
}
?>
