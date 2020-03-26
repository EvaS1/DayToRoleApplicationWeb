<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageGroupeRepository")
 */
class PersonnageGroupe
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
    private $rang;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_groupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

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

    public function getIdGroupe(): ?Groupe
    {
        return $this->id_groupe;
    }

    public function setIdGroupe(?Groupe $id_groupe): self
    {
        $this->id_groupe = $id_groupe;

        return $this;
    }
}
