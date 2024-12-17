<?php
// Include database connection
include 'index.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_certification = $_GET['id'];

    // Check if the certification is referenced in the formation table
    $checkSql = "SELECT COUNT(*) FROM formation WHERE id_certification = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->execute([$id_certification]);
    $isReferenced = $checkStmt->fetchColumn();

    if ($isReferenced > 0) {
        // Redirect with an error message
        header('Location: afficher_certification.php?status=foreign_key_violation');
        exit;
    }

    // Proceed with deletion if not referenced
    $sql = "DELETE FROM certifications WHERE id_certification = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$id_certification])) {
        header('Location: afficher_certification.php?status=success');
        exit;
    } else {
        header('Location: afficher_certification.php?status=error');
        exit;
    }
} else {
    header('Location: afficher_certification.php?status=missing_id');
    exit;
}
?>
