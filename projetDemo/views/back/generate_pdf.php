<?php
// Inclure la classe PDFGenerator
require_once('C:/xampp/htdocs/projetDemo/models/PDFGenerator.php'); // Chemin vers le fichier PDFGenerator.php

// Créer une instance de PDFGenerator et générer le PDF
$pdfGenerator = new PDFGenerator();
$pdfGenerator->generatePDF();
?>