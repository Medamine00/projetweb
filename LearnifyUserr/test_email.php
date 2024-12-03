<?php
$to = "bennour.adamz@gmail.com";
$subject = "Test Email";
$message = "Ceci est un email de test envoyé depuis localhost.";
$headers = "From: benamoraziz282003@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email envoyé avec succès !";
} else {
    echo "Échec de l'envoi de l'email.";
}
?>