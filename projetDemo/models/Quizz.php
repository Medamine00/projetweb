<?php
// Déclarer les attributs
class Quizz
{
    private ?int $id_quizz = null;
    private ?string $nom_quizz = null;
    private ?string $description_quizz = null;
    private ?DateTime $date_quizz = null;

    public function __construct($id_quizz = null, $nom_quizz, $description_quizz, $date_quizz)
    {
        $this->id_quizz = $id_quizz;
        $this->nom_quizz = $nom_quizz;
        $this->description_quizz = $description_quizz;

        // Vérifiez si $date_quizz est une instance de DateTime avant d'assigner
        if ($date_quizz instanceof DateTime) {
            $this->date_quizz = $date_quizz;
        } else {
            $this->date_quizz = new DateTime($date_quizz);
        }
    }

    // Getter pour $id_quizz
    public function getIdQuizz(): ?int
    {
        return $this->id_quizz;
    }

    // Setter pour $id_quizz
    public function setIdQuizz(?int $id_quizz): void
    {
        $this->id_quizz = $id_quizz;
    }

    // Getter pour $nom_quizz
    public function getNomQuizz(): ?string
    {
        return $this->nom_quizz;
    }

    // Setter pour $nom_quizz
    public function setNomQuizz(?string $nom_quizz): void
    {
        $this->nom_quizz = $nom_quizz;
    }

    // Getter pour $description_quizz
    public function getDescriptionQuizz(): ?string
    {
        return $this->description_quizz;
    }

    // Setter pour $description_quizz
    public function setDescriptionQuizz(?string $description_quizz): void
    {
        $this->description_quizz = $description_quizz;
    }

    // Getter pour $date_quizz
    public function getDateQuizz(): ?DateTime
    {
        return $this->date_quizz;
    }

    // Setter pour $date_quizz
    public function setDateQuizz(?DateTime $date_quizz): void
    {
        $this->date_quizz = $date_quizz;
    }
}
?>
