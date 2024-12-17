<?php
// download_pdf.php

// download_pdf.php

include("C:/xampp/htdocs/projetDemo/config.php");  // Assurez-vous que le chemin est correct

// Récupérer la connexion à la base de données
$conn = config::getConnexion();  // Cette méthode retourne un objet PDO

// Vérifier si le paramètre 'course_id' est passé via l'URL
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch les détails du cours depuis la base de données
    $sql = "SELECT * FROM courses WHERE id = :course_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':course_id', $course_id);
    $stmt->execute();
    $course = $stmt->fetch();

    // Vérifier si le cours existe
    if ($course) {
        // Générer le PDF
        require('C:/xampp/htdocs/projetDemo/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Ajouter les détails du cours dans le PDF
        $pdf->Cell(200, 10, 'Course Details', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(200, 10, 'Course Title: ' . $course['course_title'], 0, 1);
        $pdf->Cell(200, 10, 'Tutor: ' . $course['tutor_name'], 0, 1);
        $pdf->Cell(200, 10, 'Price: ' . $course['price'] . ' DT', 0, 1);
        $pdf->Cell(200, 10, 'Description: ' . $course['description'], 0, 1);

        // Sortir le PDF pour forcer son téléchargement
        $pdf->Output('D', $course['course_title'] . '.pdf');  // Force download the PDF
    } else {
        echo 'Course not found';
    }
} else {
    echo 'Course ID not provided';
}

?>
