<?php
// Inclure les fichiers nécessaires
require_once 'C:/xampp/htdocs/projet/config.php';
require_once 'C:/xampp/htdocs/projet//models/Quizz.php';

class QuizzQ
{
    // Liste les quizz triés par date (ASC ou DESC)
    public function listQuizz($order = 'ASC', $recherche = null)
    {
        $sql = "SELECT * FROM quizz";
        if ($recherche) {
            $sql .= " WHERE nom_quizz LIKE :recherche";
        }
        $sql .= " ORDER BY date_quizz " . $order;
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            if ($recherche) {
                $query->bindValue(":recherche", '%' . $recherche . '%');
            }
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    

    // Supprime un quizz par ID
    public function deleteQuizz($id_quizz)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare('DELETE FROM quizz WHERE id_quizz = :id_quizz');
            $query->execute(['id_quizz' => $id_quizz]);
    
            if ($query->rowCount() > 0) {
                // Log l'action si une ligne a été supprimée
                self::logAction('Delete', $id_quizz, 'Quizz supprimé');
                return true; // Suppression réussie
            }
    
            return false; // Aucun quizz supprimé
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; // En cas d'erreur
        }
    }
    

    // Ajoute un nouveau quizz
    public function addQuizz($quizz)
    {
        $sql = "INSERT INTO quizz (nom_quizz, description_quizz, date_quizz) VALUES (:nom_quizz, :description_quizz, :date_quizz)";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);

            // Convertir l'objet DateTime en chaîne (format 'Y-m-d')
            $dateQuizzFormatted = $quizz->getDateQuizz();
            if ($dateQuizzFormatted instanceof DateTime) {
                $dateQuizzFormatted = $dateQuizzFormatted->format('Y-m-d');
            }

            $query->execute([
                'nom_quizz' => $quizz->getNomQuizz(),
                'description_quizz' => $quizz->getDescriptionQuizz(),
                'date_quizz' => $dateQuizzFormatted
            ]);
            self::logAction('Add', null, 'Quizz: ' . $quizz->getNomQuizz());

            return true; // Retourne vrai si tout s'est bien passé
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false; // Retourne faux en cas d'erreur
        }
    }

    // Met à jour un quizz existant
    public function updateQuizz($id_quizz, $nom_quizz, $description_quizz, $date_quizz)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'UPDATE quizz SET nom_quizz = :nom_quizz, description_quizz = :description_quizz, date_quizz = :date_quizz WHERE id_quizz = :id_quizz'
            );

            $query->execute([
                'id_quizz' => $id_quizz,
                'nom_quizz' => $nom_quizz,
                'description_quizz' => $description_quizz,
                'date_quizz' => $date_quizz
            ]);
            self::logAction('Update', $id_quizz, 'Quizz: ' . $nom_quizz);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Affiche les détails d'un quizz spécifique
    public function afficherQuizz($id_quizz)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'SELECT * FROM quizz WHERE id_quizz = :id_quizz'
            );
            $query->execute(['id_quizz' => $id_quizz]);
            $result = $query->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // Récupère un quizz par ID
    public function getQuizzById($id_quizz)
    {
        $db = config::getConnexion();
        try {
            $query = $db->prepare("SELECT * FROM quizz WHERE id_quizz = :id_quizz");
            $query->execute(['id_quizz' => $id_quizz]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false;
        }
    }

    // Recherche des quizz par nom
    public function chercher($recherche)
{
    $sql = "SELECT * FROM quizz WHERE nom_quizz LIKE :recherche";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(":recherche", '%' . $recherche . '%');
        $query->execute();
        $liste = $query->fetchAll();
        return $liste;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}




    public static function logAction($action, $id_quizz = null, $additional_info = '')
{
    $logFile = '../../historiquequizz/quizz_history.txt'; // Chemin du fichier de log
    $date = new DateTime();
    $formattedDate = $date->format('Y-m-d H:i:s');
    
    // Construction du message à ajouter
    $logMessage = "[$formattedDate] - Action: $action";
    if ($id_quizz) {
        $logMessage .= " - ID Quizz: $id_quizz";
    }
    if ($additional_info) {
        $logMessage .= " - Info: $additional_info";
    }
    $logMessage .= "\n";
    
    // Écriture du log dans le fichier
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}



}
?>
