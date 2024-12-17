<?php
// Include database connection
include 'index.php';
require './PHPMailer/PHPMailer.php'; // Include PHPMailer
require './PHPMailer/SMTP.php';     // Include PHPMailer SMTP
require './FPDF/fpdf.php';          // Include FPDF (download from https://fpdf.org)

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateCertificate($user, $formationName) {
    $templatePath = "./certificates/certificate_template.pdf";
    $outputPath = "./certificates/certificate_{$user['id']}.pdf";

    // Use FPDF to overlay user details on the template
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    
    // Add background template
    $pdf->Image($templatePath, 0, 0, 210, 297); // Adjust size and position

    // Write User and Formation Details
    $pdf->SetXY(50, 100); // Adjust position
    $pdf->Cell(0, 10, "Certificate of Completion", 0, 1, 'C');
    $pdf->SetXY(50, 120);
    $pdf->Cell(0, 10, "Awarded to: {$user['prenom']} {$user['nom']}", 0, 1, 'C');
    $pdf->SetXY(50, 140);
    $pdf->Cell(0, 10, "For successfully completing the course:", 0, 1, 'C');
    $pdf->SetXY(50, 160);
    $pdf->Cell(0, 10, $formationName, 0, 1, 'C');

    $pdf->Output('F', $outputPath); // Save the generated certificate
    return $outputPath;
}

function sendCertificate($user, $formationName) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'your_password';       // Replace with Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email Content
        $mail->setFrom('your_email@gmail.com', 'Learnify');
        $mail->addAddress($user['email'], "{$user['prenom']} {$user['nom']}");
        $mail->Subject = 'Votre Certification de Formation';
        $mail->Body = "Bonjour {$user['prenom']} {$user['nom']},\n\nFélicitations ! Vous avez complété la formation '{$formationName}'. Votre certificat est en pièce jointe.";

        // Generate Certificate and Attach
        $certificatePath = generateCertificate($user, $formationName);
        $mail->addAttachment($certificatePath);

        // Send Email
        $mail->send();
        echo "Certificate sent to: " . $user['email'] . "<br>";

        // Mark as Sent in the Database
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET certificate_sent = 1 WHERE id = ?");
        $stmt->execute([$user['id']]);
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
}

// Fetch Completed Users
$stmt = $conn->prepare("
    SELECT u.*, f.nom_formation
    FROM users u
    JOIN formation f ON u.id_formation = f.id_formation
    WHERE u.statut = 'completed' AND u.certificate_sent = 0
");
$stmt->execute();
$users = $stmt->fetchAll();

foreach ($users as $user) {
    sendCertificate($user, $user['nom_formation']);
}
?>
