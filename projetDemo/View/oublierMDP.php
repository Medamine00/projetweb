

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Mot de Passe Oublié</title>
<style>
  /* Global Styles */
  body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #333a59, #181d38);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
  }

  /* Container */
  .container {
    width: 360px;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  .container:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
  }

  .container img {
    width: 100px;
    margin-bottom: 1.5rem;
    transition: transform 0.4s ease;
  }

  .container img:hover {
    transform: rotate(360deg);
  }

  h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 1rem;
    font-weight: 600;
  }

  /* Form */
  form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: stretch;
    width: 100%;
  }

  label {
    font-weight: bold;
    color: #666;
    text-align: left;
    font-size: 0.9rem;
  }

  input[type="email"] {
    padding: 0.8rem;
    border-radius: 6px;
    border: 1px solid #ddd;
    font-size: 1rem;
    width: 100%;
    transition: box-shadow 0.3s ease;
  }

  input[type="email"]:focus {
    border-color: #333a59;
    box-shadow: 0 0 8px rgba(51, 58, 89, 0.3);
    outline: none;
  }

  button {
    width: 100%;
    padding: 0.8rem;
    background-color: #181d38;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  button:hover {
    background-color: #333a59;
    transform: scale(1.05);
  }

  /* Back to Login Link */
  .back-to-login {
    margin-top: 1rem;
    font-size: 0.875rem;
    color: #333a59;
  }

  .back-to-login a {
    color: #333a59;
    text-decoration: underline;
    transition: color 0.3s ease;
  }

  .back-to-login a:hover {
    color: #181d38;
  }
</style>
</head>
<body>
<div class="container">
  <img src="../images/logo.png" alt="Logo">
  <h1>Réinitialiser le mot de passe</h1>
  <p>Veuillez entrer votre adresse email pour réinitialiser votre mot de passe.</p>
  <!-- Success or Error Messages -->
  <?php
  if (isset($_GET['success']) && $_GET['success'] === 'email_sent') {
      echo '<p style="color: green; font-weight: bold;">Un email de réinitialisation a été envoyé à votre adresse.</p>';
  } elseif (isset($_GET['error'])) {
      if ($_GET['error'] === 'email_not_found') {
          echo '<p style="color: red; font-weight: bold;">Aucun utilisateur trouvé avec cet email.</p>';
      } elseif ($_GET['error'] === 'missing_email') {
          echo '<p style="color: red; font-weight: bold;">Veuillez entrer une adresse email.</p>';
      } elseif ($_GET['error'] === 'server_error') {
          echo '<p style="color: red; font-weight: bold;">Une erreur serveur est survenue. Veuillez réessayer plus tard.</p>';
      }
  }
  ?>
  <form action="../Controller/UserController.php?action=passwordReset" method="POST">
    <label for="email">Adresse Email:</label>
    <input type="email" id="email" name="email" required placeholder="Entrez votre email">
    <button type="submit">Envoyer le lien de réinitialisation</button>
  </form>

  <!-- Back to Login Link -->
  <div class="back-to-login">
    <a href="login.php">Retour à la connexion</a>
  </div>
</div>
</body>
</html>
