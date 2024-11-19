<?php
include 'C:/xampp/htdocs/Learnify web site/controller/coursesC.php';

// Créer une instance de la classe CoursesC (et non courses)
$c = new CoursesC();
$tab = $c->listcourses();
?>

<center>
    <h1>Manage Courses</h1>
    <h2>
        <a href="addcourses.php">Add Course</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Course</th>
        <th>Course Title</th>
        <th>Tutor Name</th>
        <th>Subject</th>
        <th>Duration (Hours)</th>
        <th>Price</th>
        <th>Status</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Phone</th>
        <th>Actions</th>
    </tr>

    <?php
    foreach ($tab as $course) {
    ?>

        <tr>
            <td><?= $course['id']; ?></td>
            <td><?= $course['course_title']; ?></td>
            <td><?= $course['tutor_name']; ?></td>
            <td><?= $course['subject']; ?></td>
            <td><?= $course['duration']; ?></td>
            <td><?= $course['price']; ?></td>
            <td><?= $course['status']; ?></td>
            <td><?= $course['etudiant_name']; ?></td>
            <td><?= $course['etudiant_email']; ?></td>
            <td><?= $course['etudiant_phone']; ?></td>
            <td align="center">
                <form method="POST" action="updatecourses.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $course['id']; ?> name="idCourse">
                </form>
                <a href="deletecourses.php?id=<?php echo $course['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
