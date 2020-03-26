<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnagePersonnageRepository")
 */
class PersonnagePersonnage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getIdPersonnage2(): ?Personnage
    {
        return $this->id_personnage2;
    }

    public function setIdPersonnage2(?Personnage $id_personnage2): self
    {
        $this->id_personnage2 = $id_personnage2;

        return $this;
    }
}
