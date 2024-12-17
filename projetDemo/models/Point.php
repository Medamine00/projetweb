<?php

class Point
{
    private $id_point;
    private $points;
    private $date_points;
    private $id_pointquizz;

    public function __construct($id_point, $points, $date_points, $id_pointquizz)
    {
        $this->id_point = $id_point;
        $this->points = $points;
        $this->date_points = $date_points;
        $this->id_pointquizz = $id_pointquizz;
    }

    public function getIdPoint()
    {
        return $this->id_point;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getDatePoints()
    {
        return $this->date_points;
    }

    public function getIdPointQuizz()
    {
        return $this->id_pointquizz;
    }
}
?>
