<?php
class Course {
    private $id;
    private $courseTitle;
    private $tutorName;
    private $subject;
    private $duration;
    private $price;
    private $status;
    private $etudiantName;
    private $etudiantEmail;
    private $etudiantPhone;

    public function __construct($id, $courseTitle, $tutorName, $subject, $duration, $price, $status, $etudiantName, $etudiantEmail, $etudiantPhone) {
        $this->id = $id;
        $this->courseTitle = $courseTitle;
        $this->tutorName = $tutorName;
        $this->subject = $subject;
        $this->duration = $duration;
        $this->price = $price;
        $this->status = $status;
        $this->etudiantName = $etudiantName;
        $this->etudiantEmail = $etudiantEmail;
        $this->etudiantPhone = $etudiantPhone;
    }


    // Getter methods
    public function getCourseTitle() { return $this->courseTitle; }
    public function getTutorName() { return $this->tutorName; }
    public function getSubject() { return $this->subject; }
    public function getDuration() { return $this->duration; }
    public function getPrice() { return $this->price; }
    public function getStatus() { return $this->status; }
    public function getEtudiantName() { return $this->etudiantName; }
    public function getEtudiantEmail() { return $this->etudiantEmail; }
    public function getEtudiantPhone() { return $this->etudiantPhone; }
    }

    
