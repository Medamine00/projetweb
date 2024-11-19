<?php
include 'C:/xampp/htdocs/Learnify web site/controller/coursesC.php';
$clientC = new coursesC();
$clientC->deletecourses($_GET["id"]);
header('Location:listcourses.php');
