<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Utilisateur</title>
</head>
<body>
    <h1>Mettre à jour un Utilisateur</h1>
    <form action="/addUser" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="niveauUniversitaire">Niveau Universitaire:</label>
        <select name="niveauUniversitaire" id="niveauUniversitaire" required>
            <option value=""></option>
            <option value="1ere">— 1ère année</option>
            <option value="2eme">— 2ème année</option>
            <option value="3eme">— 3ème année</option>
            <option value="4eme">— 4ème année</option>
            <option value="5eme">— 5ème année</option>
        </select><br><br>

        <label for="universite">Université:</label>
        <select name="universite" id="universite" required>
            <option value=""></option>
            <option value="Esprit">— Esprit</option>
            <option value="MedTech">— MedTech</option>
            <option value="Faculte des sciences">— Faculté des sciences</option>
            <option value="enit">— ENIT</option>
        </select><br><br>

        <label for="adresseMail">Adresse Mail:</label>
        <input type="email" id="adresseMail" name="adresseMail" required><br><br>

        <label for="role">Rôle:</label>
        <select name="role" id="role" required>
            <option value=""></option>
            <option value="etudiant">— Etudiant</option>
            <option value="gestionnaire_des_cours">— Gestionnaire des cours</option>
            <option value="gestionnaire_des_formations">— Gestionnaire des formations</option>
            <option value="gestionnaire_des_stages">— Gestionnaire des stages</option>
            <option value="gestionnaire_des_quizz">— Gestionnaire des Quizz</option>
        </select><br><br>

        <button type="submit">Ajouter Utilisateur</button>
    </form>
</body>
</html>
