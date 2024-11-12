<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de Passe Oublié</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .container img {
            width: 120px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .container img:hover {
            transform: rotate(360deg);
        }

        h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        h1:hover {
            color: #007bff;
        }

        .instruction {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

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

        input[type="email"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

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
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #333a59; /* Slightly darker shade on hover */
            transform: scale(1.05);
        }

        .back-link {
            margin-top: 20px;
            font-size: 14px;
            color: #181d38; /* Updated back link color */
            transition: color 0.3s ease;
        }

        .back-link a {
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
            color: #333a59; /* Slightly darker shade on hover */
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            
            h1 {
                font-size: 22px;
            }

            input[type="email"] {
                padding: 10px;
                font-size: 14px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="../images/logo.png" alt="Logo">
        <h1>Mot de Passe Oublié</h1>
        <p class="instruction">Veuillez entrer votre adresse e-mail pour réinitialiser votre mot de passe.</p>
        <form action="/resetPassword" method="POST">
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required placeholder="Entrez votre adresse e-mail">

            <button type="submit">Réinitialiser le mot de passe</button>
        </form>
        <div class="back-link">
            <p><a href="login.php">Retour à la page de connexion</a></p>
        </div>
    </div>

</body>
</html>
