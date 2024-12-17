<?php
require_once 'C:/xampp/htdocs/projetDemo/config.php';
require_once 'C:/xampp/htdocs/projetDemo/controller/PointP.php';

require_once 'C:/xampp/htdocs/projetDemo/tcpdf/tcpdf.php'; // Assurez-vous que TCPDF est correctement inclus

class PDFGenerator
{
    public function generatePDF()
    {
        // Connexion à la base de données pour récupérer les points
        $db = config::getConnexion();
        $sql = "SELECT p.id_point, p.points, p.date_points, q.nom_quizz 
                FROM point p
                JOIN quizz q ON p.id_pointquizz = q.id_quizz";
        $points = $db->query($sql)->fetchAll();

        // Créer un nouveau PDF
        $pdf = new TCPDF();

        // Configurer les propriétés du document PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Votre Nom');
        $pdf->SetTitle('Liste des Notes');
        $pdf->SetSubject('PDF des Points');
        $pdf->SetKeywords('TCPDF, PDF, Points');

        // Ajouter une page
        $pdf->AddPage();

        // Définir la police
        $pdf->SetFont('helvetica', '', 12);

        // Ajouter un titre
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'Liste des Points', 0, 1, 'C');

        // Saut de ligne
        $pdf->Ln(10);

        // Créer un tableau pour afficher les points
        $pdf->SetFillColor(224, 235, 255); // Couleur de fond des cellules
        $pdf->SetTextColor(0); // Couleur du texte
        $pdf->SetFont('', 'B'); // Police en gras pour l'en-tête

        // En-tête du tableau
        $pdf->Cell(40, 10, 'Points', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Date', 1, 0, 'C', 1);
        $pdf->Cell(50, 10, 'Nom Quizz', 1, 1, 'C', 1);

        // Revenir à la police normale pour les données
        $pdf->SetFont('', '');

        // Ajouter les données dans le tableau
        foreach ($points as $point) {
            $pdf->Cell(40, 10, htmlspecialchars($point['points']), 1, 0, 'C');
            $pdf->Cell(60, 10, htmlspecialchars($point['date_points']), 1, 0, 'C');
            $pdf->Cell(50, 10, htmlspecialchars($point['nom_quizz']), 1, 1, 'L');
        }

        // Sortie du PDF
        $pdf->Output('liste_points.pdf', 'D'); // Force le téléchargement
    }
}
?>
