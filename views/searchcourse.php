<?php
require_once "C:/xampp2/htdocs/Learnify web site/config.php";  // Connexion à la base de données
require_once "C:/xampp2/htdocs/Learnify web site/models/courses.php";

if (isset($_POST['search'])) {
    $id_categorie = $_POST['categorie'];

    // Création d'une instance de la classe Course
    $coursesC = new Course($conn);

    // Récupérer les cours en fonction de la catégorie sélectionnée
    $list = $coursesC->getCoursesByCategory($id_categorie);
}

if (isset($list) && !empty($list)) {
    echo "<h2>Courses in selected category:</h2><ul>";
    foreach ($list as $course) {
        echo "<li>" . $course['course_title'] . " - " . $course['price'] . " dt</li>";
    }
    echo "</ul>";
} elseif (isset($list) && empty($list)) {
    echo "<p>No courses found in this category.</p>";
}
?>
<h1>Search courses by category</h1>
<form action="searchcourse.php" method="POST">
    <label for="categorie">Select a category:</label>
    <select name="categorie" id="id_categorie">
        <?php
        $coursesC = new Course($conn);
        $categories = $coursesC->getCategories();
        foreach ($categories as $category) {
            echo '<option value="' . $category['id_categorie'] . '">' . $category['nom'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Search" name="search">
</form>
