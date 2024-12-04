<?php
// download_pdf.php

include("C:/xampp2/htdocs/Learnify web site/config.php");  // Ensure the path is correct

// Get the course ID from the query string
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Fetch the course details from the database
    $sql = "SELECT * FROM courses WHERE id = :course_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':course_id', $course_id);
    $stmt->execute();
    $course = $stmt->fetch();

    // Check if the course exists
    if ($course) {
        // Generate PDF content
        require('C:/xampp2/htdocs/Learnify web site/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        
        // Add course details to the PDF
        $pdf->Cell(200, 10, 'Course Details', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(200, 10, 'Course Title: ' . $course['course_title'], 0, 1);
        $pdf->Cell(200, 10, 'Tutor: ' . $course['tutor_name'], 0, 1);
        $pdf->Cell(200, 10, 'Price: ' . $course['price'] . ' DT', 0, 1);
        $pdf->Cell(200, 10, 'Description: ' . $course['description'], 0, 1);

        // Output the PDF
        $pdf->Output('D', $course['course_title'] . '.pdf');  // Force download the PDF
    } else {
        echo 'Course not found';
    }
} else {
    echo 'Course ID not provided';
}
?>
