<?php
include 'index.php'; // Database connection

// Logic to add a new certification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre_certification = $_POST['titre_certification'];
    $description_certification = $_POST['description_certification'];
    $id_formation = $_POST['id_formation'];

    // Insert the data into the database (id_certification will be auto-incremented)
    $sql = "INSERT INTO certifications (titre_certification, description_certification, id_formation)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre_certification, $description_certification, $id_formation]);

    echo "<p class='success'>Certification ajoutée avec succès !</p>";
    header('location:./afficher_certification.php');

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Certification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            margin-bottom: 20px;
            color: #007BFF;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success {
            margin-top: 20px;
            color: green;
            font-weight: bold;
        }
    </style>
    <script>
        // Function to validate the title of the certification
        function validernom() {
            var nomInput = document.forms["certificationForm"]["titre_certification"].value;
            var regex = /\d/; // Regex to check if there is a number in the string
            
            // Check if the title contains any number
            if (regex.test(nomInput)) {
                alert("Le titre de la certification ne doit pas contenir de chiffres.");
                return false;
            }

            // Check if the title is empty
            if (nomInput == "") {
                alert("Le titre de la certification est obligatoire.");
                return false;
            }
            
            return true;
        }

        // Function to validate the description length
        function validerdescription() {
            var descriptionInput = document.forms["certificationForm"]["description_certification"].value;

            // Check if the description is less than or equal to 50 characters
            if (descriptionInput.length <= 50) {
                alert("La description doit contenir plus de 50 caractères.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter une Certification</h1>
        <form name="certificationForm" method="POST" onsubmit="return validernom() && validerdescription()">
            <label>Titre de la Certification :</label>
            <input type="text" name="titre_certification" >

            <label>Description :</label>
            <textarea name="description_certification" ></textarea>

            <label>ID de la Formation :</label>
            <input type="number" name="id_formation" >

            <button type="submit">Ajouter la Certification</button>
        </form>
    </div>
</body>
</html>
