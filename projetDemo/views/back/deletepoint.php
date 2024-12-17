<?php
include 'C:/xampp/htdocs/projetDemo/controller/PointP.php';
$pointP = new PointP();

if (!isset($_GET['id'])) {
    die("ID du point manquant.");
}

$id = $_GET['id'];
$pointP->deletePoint($id);
header('Location: listpoint.php');
exit();
?>
