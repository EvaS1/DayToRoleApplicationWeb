<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatRepository")
 */
class Etat
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", mappedBy="id_etat")
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
            $idPersonnage->addIdEtat($this);
        }

        return $this;
    }

    public function removeIdPersonnage(Personnage $idPersonnage): self
    {
        if ($this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage->removeElement($idPersonnage);
            $idPersonnage->removeIdEtat($this);
        }

        return $this;
    }
}
