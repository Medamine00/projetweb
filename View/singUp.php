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
            background-color: #f4f4f9;
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
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);  /* Subtle scaling effect on hover */
        }

        /* Logo */
        .container img {
            width: 120px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .container img:hover {
            transform: rotate(360deg);  /* Rotate logo on hover */
        }

        /* Header */
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* Form Layout */
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

        /* Inputs and Selects */
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
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #999;
        }

        /* Button */
        button {
            width: 100%;
            padding: 12px;
            background-color: #181d38; /* Updated button color */
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #333a59; /* Slightly darker shade on hover */
            transform: scale(1.05);  /* Slight scaling effect on hover */
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 100%;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            select,
            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="../images/logo.png" alt="Logo">
        <h1>Créer un Compte</h1>
        <form action="/signUp" method="POST">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required placeholder="Entrez votre nom">

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required placeholder="Entrez votre prénom">

            <label for="niveauUniversitaire">Niveau Universitaire:</label>
            <select name="niveauUniversitaire" id="niveauUniversitaire" required>
                <option value=""></option>
                <option value="1ere">1ère année</option>
                <option value="2eme">2ème année</option>
                <option value="3eme">3ème année</option>
                <option value="4eme">4ème année</option>
                <option value="5eme">5ème année</option>
            </select>

            <label for="universite">Université:</label>
            <select name="universite" id="universite" required>
                <option value=""></option>
                <option value="Esprit">Esprit</option>
                <option value="MedTech">MedTech</option>
                <option value="Faculte des sciences">Faculté des sciences</option>
                <option value="enit">ENIT</option>
            </select>

            <label for="adresseMail">Adresse Mail:</label>
            <input type="email" id="adresseMail" name="adresseMail" required placeholder="Entrez votre adresse mail">

            <label for="motDePasse">Mot de Passe:</label>
            <input type="password" id="motDePasse" name="motDePasse" required placeholder="Entrez un mot de passe">

            <label for="confirmerMotDePasse">Confirmer Mot de Passe:</label>
            <input type="password" id="confirmerMotDePasse" name="confirmerMotDePasse" required placeholder="Confirmer le mot de passe">

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
