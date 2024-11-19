<?php

include 'C:/xampp/htdocs/Learnify web site/controller/coursesC.php';
include 'C:/xampp/htdocs/Learnify web site/models/courses.php'; 
include_once 'C:/xampp/htdocs/Learnify web site/config.php';

$error = "";

// Créer une instance du contrôleur
$coursesC = new CoursesC();  // Le nom de la classe doit être identique à celui du fichier contrôleur
$error = "";

// Créer une instance du contrôleur
$coursesC = new CoursesC();  // Le nom de la classe doit être identique à celui du fichier contrôleur

if (
    isset($_POST["course_title"]) &&
    isset($_POST["tutor_name"]) &&
    isset($_POST["subject"]) &&
    isset($_POST["duration"]) &&
    isset($_POST["price"]) &&
    isset($_POST["status"]) &&
    isset($_POST["etudiant_name"]) &&
    isset($_POST["etudiant_email"]) &&
    isset($_POST["etudiant_phone"]) &&
    isset($_POST["idCourse"])
) {
    if (
        !empty($_POST['course_title']) &&
        !empty($_POST["tutor_name"]) &&
        !empty($_POST["subject"]) &&
        !empty($_POST["duration"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["status"]) &&
        !empty($_POST["etudiant_name"]) &&
        !empty($_POST["etudiant_email"]) &&
        !empty($_POST["etudiant_phone"]) &&
        !empty($_POST["idCourse"])
    ) {
        // Créez l'objet Course en utilisant les valeurs fournies
        $course = new Course(
            $_POST['idCourse'],
            $_POST['course_title'],
            $_POST['tutor_name'],
            $_POST['subject'],
            $_POST['duration'],
            $_POST['price'],
            $_POST['status'],
            $_POST['etudiant_name'],
            $_POST['etudiant_email'],
            $_POST['etudiant_phone']
        );

        // Utiliser le contrôleur pour mettre à jour le cours
        $coursesC->updatecourses($course, $_POST['idCourse']);

        // Redirection après mise à jour
        header('Location: listcourses.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Display</title>
</head>

<body>
    <button><a href="listcourses.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['idCourse'])) {
    // Obtenir les détails du cours à partir du contrôleur
    $courseData = $coursesC->showcourses($_POST['idCourse']);
    if ($courseData) {
            // Utiliser les données retournées pour pré-remplir le formulaire
        
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="idCourse">IdCourse :</label></td>
                    <td>
                        <input type="text" id="idCourse" name="idCourse" value="<?php echo $courseData['id'] ?>" readonly />
                        <span id="erreurIdCourse" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="course_title">Course Title :</label></td>
                    <td>
                        <input type="text" id="course_title" name="course_title" value="<?php echo $courseData['course_title'] ?>" />
                        <span id="erreurCourseTitle" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="tutor_name">Tutor Name :</label></td>
                    <td>
                        <input type="text" id="tutor_name" name="tutor_name" value="<?php echo $courseData['tutor_name'] ?>" />
                        <span id="erreurTutorName" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="subject">Subject :</label></td>
                    <td>
                        <input type="text" id="subject" name="subject" value="<?php echo $courseData['subject'] ?>" />
                        <span id="erreurSubject" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="duration">Duration (Hours) :</label></td>
                    <td>
                        <input type="text" id="duration" name="duration" value="<?php echo $courseData['duration'] ?>" />
                        <span id="erreurDuration" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="price">Price :</label></td>
                    <td>
                        <input type="text" id="price" name="price" value="<?php echo $courseData['price'] ?>" />
                        <span id="erreurPrice" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="status">Status :</label></td>
                    <td>
                        <input type="text" id="status" name="status" value="<?php echo $courseData['status'] ?>" />
                        <span id="erreurStatus" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="etudiant_name">Student Name :</label></td>
                    <td>
                        <input type="text" id="etudiant_name" name="etudiant_name" value="<?php echo $courseData['etudiant_name'] ?>" />
                        <span id="erreurEtudiantName" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="etudiant_email">Student Email :</label></td>
                    <td>
                        <input type="text" id="etudiant_email" name="etudiant_email" value="<?php echo $courseData['etudiant_email'] ?>" />
                        <span id="erreurEtudiantEmail" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="etudiant_phone">Student Phone :</label></td>
                    <td>
                        <input type="text" id="etudiant_phone" name="etudiant_phone" value="<?php echo $courseData['etudiant_phone'] ?>" />
                        <span id="erreurEtudiantPhone" style="color: red"></span>
                    </td>
                </tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
        } else {
            echo "Course not found.";
        }
    }
    ?>
</body>

</html>
