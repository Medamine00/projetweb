<?php
// Include the database connection
include 'index.php'; 

// Include PHPMailer and FPDF classes
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
require './PHPMailer/Exception.php';
require './FPDF/fpdf.php'; // Ensure FPDF is correctly included

// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate a PDF certificate
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ensure the certificates directory exists
// Function to generate the certificate PDF
function generateCertificate($user, $formationName) {
    // Create PDF using FPDF library
    $pdf = new FPDF();
    $pdf->AddPage();

    // Path to the background image (replace with the actual path)
    $backgroundImage = 'C:\xampp\htdocs\projetDemo\view\certificates\certificate_background.png'; // Adjust the background image path

    // Check if the background image exists
    if (file_exists($backgroundImage)) {
        $pdf->Image($backgroundImage, 0, 0, 210, 297); // Full-page background (adjust size and position)
    } else {
        echo "Background image not found at: $backgroundImage<br>";
    }

    // Logo (adjust position and size)
    $logoPath = 'C:\xampp\htdocs\elearning\backoffice\assets\images\logos\logo.png'; // Adjust the path to the logo
    if (file_exists($logoPath)) {
        $pdf->Image($logoPath, 70, 30, 70); // Adjust the position of the logo
    } else {
        echo "Logo image not found at: $logoPath<br>";
    }

    // Title
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->SetXY(0, 100); // Position title near the top of the certificate
    $pdf->Cell(0, 10, 'Certificate of Completion', 0, 1, 'C');
    
    // Description
    $pdf->SetFont('Arial', '', 16);
    $pdf->Ln(10);  // Line break
    $pdf->Cell(0, 10, "This is to certify that", 0, 1, 'C');
    $pdf->Cell(0, 10, "{$user['prenom']} {$user['nom']}", 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->Cell(0, 10, "has successfully completed the course:", 0, 1, 'C');
    $pdf->Cell(0, 10, "'{$formationName}'", 0, 1, 'C');
    
    // Output the certificate file
    $certificatePath = "./certificates/certificate_{$user['id']}.pdf"; 
    $pdf->Output('F', $certificatePath);  // Save to file
    return $certificatePath;
}

// Function to send the certificate via email
function sendCertificate($user, $formationName) {
    $mail = new PHPMailer(true);  // Create an instance of PHPMailer

    try {
        // SMTP Configuration for Gmail (adjust if using another provider)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'medamine52522@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'igph zuqu lenm fbnw'; // Replace with your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set email content
        $mail->setFrom('your_email@gmail.com', 'Learnify');  // Replace with your email
        $mail->addAddress($user['email'], $user['prenom'] . ' ' . $user['nom']);  // User's email and full name
        $mail->Subject = 'Votre Certification de Formation';  // Subject of the email
        $mail->Body = "Bonjour {$user['prenom']} {$user['nom']},\n\nFélicitations ! Vous avez complété la formation '{$formationName}'. Votre certificat est en pièce jointe.";  // Body content of the email

        // Enable debugging before sending the email
        $mail->SMTPDebug = 0;  // Debug output level (can be 0, 1, or 2)

        // Generate the certificate PDF
        $certificatePath = generateCertificate($user, $formationName);  // Generate certificate PDF

        // Attach the generated certificate to the email
        $mail->addAttachment($certificatePath); 

        // Send the email
        $mail->send();
        echo "Certificate sent to: {$user['email']}<br>";  // Success message after sending

        // Update the database to mark the certificate as sent
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET certificate_sent = 1 WHERE id = ?");
        $stmt->execute([$user['id']]);  // Update the 'certificate_sent' column in the database

    } catch (Exception $e) {
        // Output the error if something goes wrong
        echo "Error sending email: {$mail->ErrorInfo}";  // Catch any errors
    }
}

// Fetch users who have completed the course and haven't received a certificate
$stmt = $conn->prepare("SELECT u.*, f.nom_formation FROM users u JOIN formation f ON u.id_formation = f.id_formation WHERE u.statut = 'completed' AND u.certificate_sent = 0");
$stmt->execute();
$users = $stmt->fetchAll();  // Fetch users who need certificates

// Send certificates to users
foreach ($users as $user) {
    sendCertificate($user, $user['nom_formation']);  // Send email with certificate
}

?>
