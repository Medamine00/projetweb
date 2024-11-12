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
    background-color: #f4f4f9;
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
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease-in-out;
  }

  .login-container:hover {
    transform: scale(1.02);
  }

/* Logo Area */
.logo {
    margin-bottom: 2rem;
}

.logo img {
    width: 150px; /* Increased size */
    height: 150px; /* Increased size */
    border-radius: 50%;
    transition: all 0.3s ease-in-out;
}

.logo img:hover {
    transform: rotate(360deg);
}
    

  /* Form */
  .login-form {
    display: flex;
    flex-direction: column;
    gap: 1rem; /* Reduced space between inputs */
  }

  .login-form input[type="email"],
  .login-form input[type="password"] {
    padding: 0.8rem;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
    transition: all 0.3s ease-in-out;
  }

  .login-form input[type="email"]:focus,
  .login-form input[type="password"]:focus {
    border-color: #181d38;
    outline: none;
    box-shadow: 0 0 8px rgba(24, 29, 56, 0.3);
  }

  .login-form input[type="email"]::placeholder,
  .login-form input[type="password"]::placeholder {
    color: #a1a1a1;
  }

  /* Buttons */
  .login-form button,
  .signup-button {
    width: 100%;  /* Make buttons take up the full width */
    background-color: #181d38;
    color: #ffffff;
    padding: 0.8rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
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
    margin-top: 0.8rem; /* Reduced space between buttons */
  }

  /* Forgot Password */
  .forgot-password {
    margin-top: 0.5rem;
    color: #181d38;
    font-size: 0.875rem;
  }

  .forgot-password a {
    color: #181d38;
    text-decoration: underline;
    cursor: pointer;
  }

  /* Responsive Design */
  @media (max-width: 480px) {
    .login-container {
      padding: 1.5rem;
    }
    
    .login-form input[type="email"],
    .login-form input[type="password"] {
      padding: 0.75rem;
    }
    
    .login-form button,
    .signup-button {
      padding: 0.75rem;
    }
  }
</style>
</head>
<body>

<div class="login-container">
  <div class="logo">
    <img src="../images/logo.png" alt="Logo" />
  </div>
  <form class="login-form">
    <input type="email" placeholder="Adresse email" required>
    <input type="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
    <a href="singUp.php">
      <button type="button" class="signup-button">S'inscrire</button>
    </a>
  </form>
  <div class="forgot-password">
    <a href="oublierMDP.php">Oublier mot de passe?</a>
  </div>
</div>

</div>

</body>
</html>
