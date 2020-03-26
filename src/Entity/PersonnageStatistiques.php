<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageStatistiquesRepository")
 */
class PersonnageStatistiques
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
    private $montant_actuel;

    /**
     * @ORM\Column(type="smallint")
     */
    private $montant_max;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Statistiques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_statistique;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantActuel(): ?int
    {
        return $this->montant_actuel;
    }

    public function setMontantActuel(int $montant_actuel): self
    {
        $this->montant_actuel = $montant_actuel;

        return $this;
    }

    public function getMontantMax(): ?int
    {
        return $this->montant_max;
    }

    public function setMontantMax(int $montant_max): self
    {
        $this->montant_max = $montant_max;

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

    public function getIdStatistique(): ?Statistiques
    {
        return $this->id_statistique;
    }

    public function setIdStatistique(?Statistiques $id_statistique): self
    {
        $this->id_statistique = $id_statistique;

        return $this;
    }
}
