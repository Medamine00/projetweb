<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course Information</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-between my-4">
        <h1>Edit Course Information</h1>
        <div>
            <a href="ui-Courses.php" class="btn btn-primary">Back</a>
        </div>
    </header>

    <?php
    include("C:/xampp2/htdocs/Learnify web site/config.php");

    if (isset($_GET["id"])) {
        $id = intval($_GET["id"]);

        try {
            $sql = "SELECT * FROM courses WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["save"])) {
                    $course_title = htmlspecialchars($_POST["course_title"]);
                    $tutor_name = htmlspecialchars($_POST["tutor_name"]);
                    $id_categorie = intval($_POST["id_categorie"]);
                    $duration = htmlspecialchars($_POST["duration"]);
                    $price = htmlspecialchars($_POST["price"]);
                    $description = htmlspecialchars($_POST["description"]);

                    if (empty($course_title) || empty($tutor_name) || empty($id_categorie) || 
                        empty($duration) || empty($price) || empty($description)) {
                        echo "<div class='alert alert-danger'>Please fill all the required fields!</div>";
                    } else {
                        try {
                            $update_course_sql = "UPDATE courses SET 
                                                  course_title = :course_title, 
                                                  tutor_name = :tutor_name, 
                                                  id_categorie = :id_categorie, 
                                                  duration = :duration, 
                                                  price = :price, 
                                                  description = :description 
                                                  WHERE id = :id";
                            $update_course_stmt = $conn->prepare($update_course_sql);
                            $update_course_stmt->bindParam(':course_title', $course_title, PDO::PARAM_STR);
                            $update_course_stmt->bindParam(':tutor_name', $tutor_name, PDO::PARAM_STR);
                            $update_course_stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
                            $update_course_stmt->bindParam(':duration', $duration, PDO::PARAM_STR);
                            $update_course_stmt->bindParam(':price', $price, PDO::PARAM_STR);
                            $update_course_stmt->bindParam(':description', $description, PDO::PARAM_STR);
                            $update_course_stmt->bindParam(':id', $id, PDO::PARAM_INT);

                            if ($update_course_stmt->execute()) {
                                echo "<div class='alert alert-success'>Course updated successfully!</div>";
                            } else {
                                echo "<div class='alert alert-danger'>Error updating the course!</div>";
                            }
                        } catch (PDOException $e) {
                            echo "<div class='alert alert-danger'>Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
                        }
                    }
                }
    ?>

                <form action="" method="post">
                    <div class="form-element my-4">
                        <label for="course_title">Course Title:</label>
                        <input type="text" id="course_title" class="form-control" name="course_title" 
                               value="<?php echo htmlspecialchars($row['course_title']); ?>" 
                               placeholder="Course title:">
                    </div>
                    <div class="form-element my-4">
                        <label for="tutor_name">Tutor Name:</label>
                        <input type="text" id="tutor_name" class="form-control" name="tutor_name" 
                               value="<?php echo htmlspecialchars($row['tutor_name']); ?>" 
                               placeholder="Tutor name:">
                    </div>
                    <div class="form-element my-4">
                        <label for="id_categorie">Category:</label>
                        <select name="id_categorie" class="form-control" id="id_categorie">
                            <option value="">Select category</option>
                            <?php
                            $categories = $conn->query("SELECT id_categorie, nom_categorie FROM categorie");
                            while ($cat = $categories->fetch(PDO::FETCH_ASSOC)) {
                                $selected = ($row['id_categorie'] == $cat['id_categorie']) ? "selected" : "";
                                echo "<option value='{$cat['id_categorie']}' $selected>{$cat['nom_categorie']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-element my-4">
                        <label for="duration">Course Duration (Hours):</label>
                        <input type="text" id="duration" class="form-control" name="duration" 
                               value="<?php echo htmlspecialchars($row['duration']); ?>" 
                               placeholder="Enter duration (e.g., 2h, 6h, 12h, 24h)">
                        <small class="text-muted">Accepted values: 2h, 6h, 12h, 24h</small>
                    </div>
                    <div class="form-element my-4">
                        <label for="price">Price:</label>
                        <input type="text" id="price" class="form-control" name="price" 
                               value="<?php echo htmlspecialchars($row['price']); ?>" 
                               placeholder="Price:">
                    </div>
                    <div class="form-element my-4">
                        <label for="description">Description:</label>
                        <textarea id="description" class="form-control" name="description" 
                                  placeholder="Course description:"><?php echo htmlspecialchars($row['description']); ?></textarea>
                    </div>
                    <div class="form-element my-4">
                        <input type="submit" class="btn btn-success" name="save" value="Save">
                    </div>
                </form>

    <?php
            } else {
                echo "<div class='alert alert-danger'>Course not found!</div>";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid ID!</div>";
    }
    ?>
</div>

<script>
document.querySelector("form").addEventListener("submit", function(event) {
    const durationInput = document.getElementById("duration");
    const durationValue = durationInput.value.trim();
    const acceptedDurations = ["2h", "6h", "12h", "24h"];

    if (!acceptedDurations.includes(durationValue)) {
        event.preventDefault();
        alert("Please enter a valid duration (e.g., 2h, 6h, 12h, 24h).");
        durationInput.focus();
    }
});
</script>

</body>
</html>
