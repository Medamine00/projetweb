<?php
include 'C:/xampp/htdocs/Learnify web site/controller/coursesC.php';
include 'C:/xampp/htdocs/Learnify web site/models/courses.php';

$error = "";
$errorCourseTitle = $errorTutorName = $errorSubject = $errorDuration = $errorPrice = $errorStatus = "";
$errorEtudiantName = $errorEtudiantEmail = $errorEtudiantPhone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // Validate course title
    if (empty($_POST["course_title"])) {
        $errorCourseTitle = "Course title is required.";
        $isValid = false;
    }

    // Validate tutor name
    if (empty($_POST["tutor_name"])) {
        $errorTutorName = "Tutor name is required.";
        $isValid = false;
    }

    // Validate subject
    if (empty($_POST["subject"])) {
        $errorSubject = "Subject is required.";
        $isValid = false;
    }

    // Validate duration
    if (empty($_POST["duration"])) {
        $errorDuration = "Duration is required.";
        $isValid = false;
    }

    // Validate price
    if (empty($_POST["price"])) {
        $errorPrice = "Price is required.";
        $isValid = false;
    }

    // Validate status
    if (empty($_POST["status"])) {
        $errorStatus = "Status is required.";
        $isValid = false;
    }

    // Validate student name
    if (empty($_POST["etudiant_name"])) {
        $errorEtudiantName = "Student name is required.";
        $isValid = false;
    }

    // Validate email
    if (empty($_POST["etudiant_email"])) {
        $errorEtudiantEmail = "Student email is required.";
        $isValid = false;
    } elseif (!filter_var($_POST["etudiant_email"], FILTER_VALIDATE_EMAIL)) {
        $errorEtudiantEmail = "Invalid email format. Must contain '@' and '.'";
        $isValid = false;
    }

    // Validate phone number
    if (empty($_POST["etudiant_phone"])) {
        $errorEtudiantPhone = "Student phone is required.";
        $isValid = false;
    } elseif (!preg_match('/^\d{8}$/', $_POST["etudiant_phone"])) {
        $errorEtudiantPhone = "Phone number must be exactly 8 digits.";
        $isValid = false;
    }

    // If all validations pass
    if ($isValid) {
        $coursesC = new CoursesC();
        $course = new Course(
            null,
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

        try {
            $coursesC->addcourses($course);
            header('Location: listcourses.php');
            exit;
        } catch (Exception $e) {
            $error = "Error adding course: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>

<body>
    <a href="listcourses.php">Back to list</a>
    <hr>

    <div id="error" style="color: red;">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="course_title">Course Title:</label></td>
                <td>
                    <input type="text" id="course_title" name="course_title" value="<?php echo htmlspecialchars($_POST['course_title'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorCourseTitle; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="tutor_name">Tutor Name:</label></td>
                <td>
                    <input type="text" id="tutor_name" name="tutor_name" value="<?php echo htmlspecialchars($_POST['tutor_name'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorTutorName; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="subject">Subject:</label></td>
                <td>
                    <input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorSubject; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="duration">Duration (Hours):</label></td>
                <td>
                    <input type="text" id="duration" name="duration" value="<?php echo htmlspecialchars($_POST['duration'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorDuration; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td>
                    <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($_POST['price'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorPrice; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="status">Status:</label></td>
                <td>
                    <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($_POST['status'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorStatus; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="etudiant_name">Student Name:</label></td>
                <td>
                    <input type="text" id="etudiant_name" name="etudiant_name" value="<?php echo htmlspecialchars($_POST['etudiant_name'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorEtudiantName; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="etudiant_email">Student Email:</label></td>
                <td>
                    <input type="text" id="etudiant_email" name="etudiant_email" value="<?php echo htmlspecialchars($_POST['etudiant_email'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorEtudiantEmail; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="etudiant_phone">Student Phone:</label></td>
                <td>
                    <input type="text" id="etudiant_phone" name="etudiant_phone" value="<?php echo htmlspecialchars($_POST['etudiant_phone'] ?? ''); ?>" />
                    <span style="color: red;"><?php echo $errorEtudiantPhone; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Save">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
