<?php

require 'C:/xampp/htdocs/Learnify web site/config.php';

class CoursesC
{

    public function listcourses()
    {
        $sql = "SELECT * FROM courses";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecourses($ide)
    {
        $sql = "DELETE FROM courses WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addcourses($course)
    {    if ($course === null) {
        throw new Exception("Course object is null. Cannot proceed with saving data.");
    }
        $pdo = new PDO('mysql:host=localhost;dbname=courses_db', 'root', '');  // Update with your DB details
        $stmt = $pdo->prepare("INSERT INTO courses (course_title, tutor_name, subject, duration, price, status, etudiant_name, etudiant_email, etudiant_phone) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $course->getCourseTitle(),
            $course->getTutorName(),
            $course->getSubject(),
            $course->getDuration(),
            $course->getPrice(),
            $course->getStatus(),
            $course->getEtudiantName(),
            $course->getEtudiantEmail(),
            $course->getEtudiantPhone()
        ]);
    }


    function showcourses($id)
    {
        $sql = "SELECT * from courses where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $joueur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatecourses($course, $id)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE courses SET 
                    course_title = :course_title,
                    tutor_name = :tutor_name,
                    subject = :subject,
                    duration = :duration,
                    price = :price,
                    status = :status,
                    etudiant_name = :etudiant_name,
                    etudiant_email = :etudiant_email,
                    etudiant_phone = :etudiant_phone
                WHERE id= :idcourses'
            );
            
            $query->execute([
                'idcourses' => $id,
                'course_title' => $_POST['course_title'],
                'tutor_name' => $_POST['tutor_name'],
                'subject' => $_POST['subject'],
                'duration' => $_POST['duration'],
                'price' => $_POST['price'],
                'status' => $_POST['status'],
                'etudiant_name' => $_POST['etudiant_name'],
                'etudiant_email' => $_POST['etudiant_email'],
                'etudiant_phone' => $_POST['etudiant_phone'],
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
