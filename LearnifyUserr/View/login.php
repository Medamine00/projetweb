<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
  /* Global Styles */
  body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #333a59, #181d38);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    color: #181d38;
  }

  /* Container */
  .login-container {
    background-color: #ffffff;
    padding: 2rem;
    border-radius: 12px;
    width: 100%;
    max-width: 380px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  .login-container:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
  }

  /* Logo Area */
  .logo {
    margin-bottom: 2rem;
  }

  .logo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    transition: transform 0.4s ease;
  }

  .logo img:hover {
    transform: rotate(360deg);
  }

  /* Form */
  .login-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .login-form input[type="email"],
  .login-form input[type="password"] {
    padding: 0.8rem;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 1rem;
    transition: box-shadow 0.3s ease;
  }

  .login-form input[type="email"]:focus,
  .login-form input[type="password"]:focus {
    border-color: #333a59;
    box-shadow: 0 0 8px rgba(51, 58, 89, 0.3);
    outline: none;
  }

  /* Buttons */
  .login-form button,
  .signup-button {
    width: 100%;
    background-color: #181d38;
    color: #ffffff;
    padding: 0.8rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .login-form button:hover,
  .signup-button:hover {
    background-color: #ffffff;
    color: #181d38;
    border: 1px solid #181d38;
    transform: scale(1.05);
  }

  .signup-button {
    background-color: #ffffff;
    color: #181d38;
    border: 1px solid #181d38;
    margin-top: 0.8rem;
  }

  /* Forgot Password */
  .forgot-password {
    margin-top: 0.5rem;
    color: #333a59;
    font-size: 0.875rem;
  }

  .forgot-password a {
    color: #333a59;
    text-decoration: underline;
  }

  /* Continue as Guest Button */
  .guest-button {
    width: 100%;
    background-color: #f0f0f0;
    color: #333a59;
    padding: 0.8rem;
    border: 1px solid #181d38;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 1rem;
  }

  .guest-button:hover {
    background-color: #333a59;
    color: #ffffff;
  }

  /* Error and Success Messages */
  .message {
    margin-bottom: 1rem;
    font-size: 1rem;
    font-weight: bold;
  }

  .message.error {
    color: red;
  }

  .message.success {
    color: green;
  }
</style>
</head>
<body>

<div class="login-container">
  <div class="logo">
    <img src="../images/logo.png" alt="Logo">
  </div>

  <!-- Display Error or Success Messages -->
  <?php if (isset($_GET['error'])): ?>
    <p class="message error">
        <?php
        switch ($_GET['error']) {
            case 'missing_credentials':
                echo 'Please fill in all fields.';
                break;
            case 'invalid_credentials':
                echo 'Invalid email or password.';
                break;
            case 'server_error':
                echo 'Server error. Please try again later.';
                break;
            case 'unauthorized':
                echo 'Please log in to access this page.';
                break;
        }
        ?>
    </p>
  <?php endif; ?>

  <?php if (isset($_GET['logout'])): ?>
    <p class="message success">You have been logged out successfully.</p>
  <?php endif; ?>

  <!-- Login Form -->
  <form class="login-form" action="../Controller/UserController.php?action=login" method="POST">
    <input type="email" name="email" placeholder="Adresse email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
    <a href="signup.php">
      <button type="button" class="signup-button">S'inscrire</button>
    </a>
  </form>

  <!-- Continue as Guest Button -->
  <button class="guest-button" onclick="location.href='http://localhost/LearnifyUser/View/Learnify%20web%20site/Learnify-html-template/'">Continuer en tant qu'invité</button>

  <!-- Forgot Password Link -->
  <div class="forgot-password">
    <a href="oublierMDP.php">Oublier mot de passe?</a>
  </div>
</div>

</body>
</html>
