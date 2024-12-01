


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    width: 400px;
    padding: 30px;
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
    margin-bottom: 20px;
    transition: transform 0.4s ease;
  }

  .container img:hover {
    transform: rotate(360deg);
  }

  h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 30px;
    font-weight: 600;
  }

  /* Form */
  form {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    width: 100%;
  }

  label {
    font-weight: bold;
    color: #666;
    margin: 8px 0 4px;
    text-align: left;
    width: 100%;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"],
  select {
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    width: 100%;
    transition: box-shadow 0.3s ease;
  }

  input[type="text"]:focus,
  input[type="email"]:focus,
  input[type="password"]:focus,
  select:focus {
    border-color: #333a59;
    box-shadow: 0 0 8px rgba(51, 58, 89, 0.3);
    outline: none;
  }

  button {
    width: 100%;
    padding: 12px;
    background-color: #181d38;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  button:hover {
    background-color: #333a59;
    transform: scale(1.05);
  }
</style>

<style>
  .is-invalid {
    border-color: #dc3545;
    background-color: #f8d7da;
  }

  .is-valid {
    border-color: #28a745;
    background-color: #d4edda;
  }

  .invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
  }
</style>
</head>
<body>
<div class="container">
  <img src="../images/logo.png" alt="Logo">
  <h1>Créer un Compte</h1>
  <form action="../Controller/UserController.php?action=signUp" method="POST">


    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom"  placeholder="Entrez votre nom">

    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom"  placeholder="Entrez votre prénom">

    <label for="niveauUniversitaire">Niveau Universitaire:</label>
    <select name="niveauUniversitaire" id="niveauUniversitaire">
      <option value=""></option>
      <option value="1ere">1ère année</option>
      <option value="2eme">2ème année</option>
      <option value="3eme">3ème année</option>
      <option value="4eme">4ème année</option>
      <option value="5eme">5ème année</option>
    </select>
    <label for="universite">Université:</label>
    <select name="universite" id="universite" >
        <option value=""></option>
        <option value="Esprit">Esprit</option>
        <option value="MedTech">MedTech</option>
        <option value="Faculte des sciences">Faculté des sciences</option>
        <option value="enit">ENIT</option>
    </select>

    <label for="email">Adresse Email:</label>
    <input type="email" id="email" name="email"  placeholder="Entrez votre email">

    <label for="motDePasse">Mot de Passe:</label>
    <input type="password" id="motDePasse" name="motDePasse"  placeholder="Entrez votre mot de passe">
    <label for="confirmerMotDePasse">Confirmer Mot de Passe:</label>
    <input type="password" id="confirmerMotDePasse" name="confirmerMotDePasse"  placeholder="Confirmer le mot de passe">

    <button type="submit">S'inscrire</button>
  </form>
</div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
  const signUpForm = document.querySelector("form[action='../Controller/UserController.php?action=signUp']");

  signUpForm.addEventListener("submit", function (event) {
    if (!validateForm(signUpForm)) {
      event.preventDefault();
    }
  });

  function validateForm(form) {
    let isValid = true;

    // Clear previous feedback
    const inputs = form.querySelectorAll("input, select");
    inputs.forEach((input) => {
      const feedback = input.nextElementSibling;
      if (feedback && feedback.classList.contains("invalid-feedback")) {
        feedback.remove();
      }
      input.classList.remove("is-invalid", "is-valid");
    });

    // Validate each input field
    inputs.forEach((input) => {
      if (input.type === "text" && (input.id === "nom" || input.id === "prenom")) {
        if (!input.value.trim()) {
          isValid = false;
          showError(input, "Ce champ est requis.");
        } else if (/\d/.test(input.value)) {
          isValid = false;
          showError(input, "Ce champ ne peut pas contenir de chiffres.");
        } else {
          showSuccess(input);
        }
      }

      if (input.type === "email" && input.id === "email") {
        if (!validateEmail(input.value)) {
          isValid = false;
          showError(input, "Veuillez entrer une adresse email valide.");
        } else {
          showSuccess(input);
        }
      }

      if (input.type === "password" && input.id === "motDePasse") {
        if (!input.value.trim()) {
          isValid = false;
          showError(input, "Le mot de passe est requis.");
        } else if (input.value.length < 6) {
          isValid = false;
          showError(input, "Le mot de passe doit contenir au moins 6 caractères.");
        } else {
          showSuccess(input);
        }
      }

      if (input.type === "password" && input.id === "confirmerMotDePasse") {
        const password = form.querySelector("#motDePasse").value;
        if (input.value !== password) {
          isValid = false;
          showError(input, "Les mots de passe ne correspondent pas.");
        } else if (!input.value.trim()) {
          isValid = false;
          showError(input, "Veuillez confirmer votre mot de passe.");
        } else {
          showSuccess(input);
        }
      }

      
    });

    return isValid;
  }

  function showError(input, message) {
    input.classList.add("is-invalid");
    const errorFeedback = document.createElement("div");
    errorFeedback.className = "invalid-feedback";
    errorFeedback.textContent = message;
    input.insertAdjacentElement("afterend", errorFeedback);
  }

  function showSuccess(input) {
    input.classList.add("is-valid");
  }

  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
});

  </script>
</body>
</html>
