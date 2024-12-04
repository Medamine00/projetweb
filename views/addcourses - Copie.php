<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subscribe For New Course</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Subscribe For New Course</h1>
            <div>
                <a href="" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="course_title" placeholder="Course title:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="tutor_name" placeholder="Tutor name:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="id_categorie" placeholder="ID Category:" required>
            </div>
            <div class="form-element my-4">
                <select name="type" class="form-control" required>
                    <option value="">Select course duration (Hours)</option>
                    <option value="2h">2h</option>
                    <option value="6h">6h</option>
                    <option value="12h">12h</option>
                    <option value="24h">24h</option>
                </select>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="price" placeholder="Price:" required>
            </div>
            <div class="form-element my-4">
                <input type="text" class="form-control" name="description" placeholder="Course description:" required>
            </div>
            <div class="form-element my-4">
                <input type="submit" class="btn btn-success" name="subscribe" value="Subscribe">
            </div>
        </form>
    </div>

    <?php
include("C:/xampp2/htdocs/Learnify web site/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["subscribe"])) {
    // Sanitize and retrieve form inputs only if they exist
    $course_title = isset($_POST["course_title"]) ? mysqli_real_escape_string($conn, $_POST["course_title"]) : '';
    $tutor_name = isset($_POST["tutor_name"]) ? mysqli_real_escape_string($conn, $_POST["tutor_name"]) : '';
    $id_categorie = isset($_POST["id_categorie"]) ? mysqli_real_escape_string($conn, $_POST["id_categorie"]) : '';
    $duration = isset($_POST["type"]) ? mysqli_real_escape_string($conn, $_POST["type"]) : '';
    $price = isset($_POST["price"]) ? mysqli_real_escape_string($conn, $_POST["price"]) : '';
    $description = isset($_POST["description"]) ? mysqli_real_escape_string($conn, $_POST["description"]) : '';

    // Ensure all required fields are filled
    if ($course_title && $tutor_name && $id_categorie && $duration && $price && $description) {
        // Insert into database
        $sql = "INSERT INTO courses (course_title, tutor_name, id_categorie, duration, price, description) 
                VALUES ('$course_title', '$tutor_name', '$id_categorie', '$duration', '$price', '$description')";

        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Record Inserted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Please fill all the required fields.</div>";
    }
}
?>
