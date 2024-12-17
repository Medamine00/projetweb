<?php

class Quizz
{
    // Propriétés correspondant aux colonnes de la table quizz
    private $id_quizz;
    private $nom_quizz;
    private $description_quizz;
    private $duration_quizz;

    // Constructeur
    public function __construct(
        $nom_quizz = null,
        $description_quizz = null,
        $duration_quizz = null
    ) {
        $this->nom_quizz = $nom_quizz;
        $this->description_quizz = $description_quizz;
        $this->duration_quizz = $duration_quizz;
    }

    // Méthode pour afficher un quizz sous forme de tableau
    public function show()
    {
        echo '<table border=1 width="100%">
            <tr align="center">
                <td>ID Quizz</td>
                <td>Nom Quizz</td>
                <td>Description Quizz</td>
                <td>Durée Quizz (minutes)</td>
            </tr>
            <tr>
                <td>' . $this->id_quizz . '</td>
                <td>' . $this->nom_quizz . '</td>
                <td>' . $this->description_quizz . '</td>
                <td>' . $this->duration_quizz . '</td>
            </tr>
        </table>';
    }

    // Getters
    public function getIdQuizz()
    {
        return $this->id_quizz;
    }

    public function getNomQuizz()
    {
        return $this->nom_quizz;
    }

    public function getDescriptionQuizz()
    {
        return $this->description_quizz;
    }

    public function getDurationQuizz()
    {
        return $this->duration_quizz;
    }

    // Setters
    public function setNomQuizz($nom_quizz)
    {
        $this->nom_quizz = $nom_quizz;
    }

    public function setDescriptionQuizz($description_quizz)
    {
        $this->description_quizz = $description_quizz;
    }

    public function setDurationQuizz($duration_quizz)
    {
        $this->duration_quizz = $duration_quizz;
    }
}

?>
