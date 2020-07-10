<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageCompetenceRepository")
 */
class PersonnageCompetence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $niveau;

    /**
     * @ORM\Column(type="smallint")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Competence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_competence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getIdPersonnage(): ?Personnage
    {
        return $this->id_personnage;
    }

    public function setIdPersonnage(?Personnage $id_personnage): self
    {
        $this->id_personnage = $id_personnage;

        return $this;
    }

    public function getIdCompetence(): ?Competence
    {
        return $this->id_competence;
    }

    public function setIdCompetence(?Competence $id_competence): self
    {
        $this->id_competence = $id_competence;

        return $this;
    }
}
