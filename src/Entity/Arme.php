<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArmeRepository")
 */
class Arme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $degats_base;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $degats_de;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univers", inversedBy="id_arme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_univers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeArme", inversedBy="id_arme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type_arme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", inversedBy="id_arme")
     */
    private $id_personnage;

    public function __construct()
    {
        $this->id_personnage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDegatsBase(): ?int
    {
        return $this->degats_base;
    }

    public function setDegatsBase(?int $degats_base): self
    {
        $this->degats_base = $degats_base;

        return $this;
    }

    public function getDegatsDe(): ?int
    {
        return $this->degats_de;
    }

    public function setDegatsDe(?int $degats_de): self
    {
        $this->degats_de = $degats_de;

        return $this;
    }

    public function getIdUnivers(): ?Univers
    {
        return $this->id_univers;
    }

    public function setIdUnivers(?Univers $id_univers): self
    {
        $this->id_univers = $id_univers;

        return $this;
    }

    public function getIdTypeArme(): ?TypeArme
    {
        return $this->id_type_arme;
    }

    public function setIdTypeArme(?TypeArme $id_type_arme): self
    {
        $this->id_type_arme = $id_type_arme;

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getIdPersonnage(): Collection
    {
        return $this->id_personnage;
    }

    public function addIdPersonnage(Personnage $idPersonnage): self
    {
        if (!$this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage[] = $idPersonnage;
        }

        return $this;
    }

    public function removeIdPersonnage(Personnage $idPersonnage): self
    {
        if ($this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage->removeElement($idPersonnage);
        }

        return $this;
    }
}
