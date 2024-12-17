<?php
require_once 'C:/xampp/htdocs/projet/config.php';

class PointP
{
    public function listPoints()
    {
        $db = config::getConnexion();
        try {
            $query = $db->query(
                'SELECT p.id_point, p.points, p.date_points, q.nom_quizz 
                 FROM point p
                 JOIN quizz q ON p.id_pointquizz = q.id_quizz'
            );
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
    
    public function addPoint($point)
    {
        $sql = "INSERT INTO point (points, date_points, id_pointquizz) VALUES (:points, :date_points, :id_pointquizz)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'points' => $point->getPoints(),
                'date_points' => $point->getDatePoints(),
                'id_pointquizz' => $point->getIdPointQuizz()
            ]);
            self::logAction('Add', null, 'Points: ' . $point->getPoints() . ', Quizz ID: ' . $point->getIdPointQuizz());

            return true;
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public function updatePoint($id_point, $points, $date_points, $id_pointquizz)
    {
        $sql = "UPDATE point SET points = :points, date_points = :date_points, id_pointquizz = :id_pointquizz WHERE id_point = :id_point";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_point' => $id_point,
                'points' => $points,
                'date_points' => $date_points,
                'id_pointquizz' => $id_pointquizz
            ]);
            self::logAction('Update', $id_point, 'Points: ' . $points . ', Quizz ID: ' . $id_pointquizz);

        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public function deletePoint($id_point)
{
    $sql = "DELETE FROM point WHERE id_point = :id_point";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['id_point' => $id_point]);

        if ($query->rowCount() > 0) {
            // Log l'action de suppression
            self::logAction('Delete', $id_point, 'Point supprimé');
            return true; // Suppression réussie
        }

        return false; // Aucun point supprimé
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

    public function listQuizzes()
    {
        $sql = "SELECT id_quizz, nom_quizz FROM quizz";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll();
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public function getPointById($id_point)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM point WHERE id_point = :id_point";
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_point' => $id_point]);
            return $query->fetch();
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
    
///////histo
    public static function logAction($action, $id_point = null, $additional_info = '')
    {
        $logFile = '../../historiquepoint/point_history.txt'; // Chemin du fichier de log
        $date = new DateTime();
        $formattedDate = $date->format('Y-m-d H:i:s');

        // Construction du message à ajouter
        $logMessage = "[$formattedDate] - Action: $action";
        if ($id_point !== null) {
            $logMessage .= " - ID Point: $id_point";
        }
        if ($additional_info) {
            $logMessage .= " - Info: $additional_info";
        }
        $logMessage .= "\n";

        // Écriture du log dans le fichier
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
    public function chercher($recherche)
{
    $sql = "SELECT p.id_point, p.points, p.date_points, q.nom_quizz 
            FROM point p 
            JOIN quizz q ON p.id_pointquizz = q.id_quizz
            WHERE p.points = :recherche";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindValue(":recherche", $recherche);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return [];
    }
}

public function trier($order)
{
    $sql = "SELECT p.id_point, p.points, p.date_points, q.nom_quizz 
            FROM point p 
            JOIN quizz q ON p.id_pointquizz = q.id_quizz
            ORDER BY p.points $order";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        return $query->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return [];
    }
}




}
?>
