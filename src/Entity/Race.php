<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RaceRepository")
 */
class Race
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $modificateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Univers", mappedBy="id_race")
     */
    private $id_univers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnage", mappedBy="id_race")
     */
    private $id_personnage;

    public function __construct()
    {
        $this->id_univers = new ArrayCollection();
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

    public function getModificateur(): ?string
    {
        return $this->modificateur;
    }

    public function setModificateur(?string $modificateur): self
    {
        $this->modificateur = $modificateur;

        return $this;
    }

    /**
     * @return Collection|Univers[]
     */
    public function getIdUnivers(): Collection
    {
        return $this->id_univers;
    }

    public function addIdUniver(Univers $idUniver): self
    {
        if (!$this->id_univers->contains($idUniver)) {
            $this->id_univers[] = $idUniver;
            $idUniver->addIdRace($this);
        }

        return $this;
    }

    public function removeIdUniver(Univers $idUniver): self
    {
        if ($this->id_univers->contains($idUniver)) {
            $this->id_univers->removeElement($idUniver);
            $idUniver->removeIdRace($this);
        }

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
            $idPersonnage->setIdRace($this);
        }

        return $this;
    }

    public function removeIdPersonnage(Personnage $idPersonnage): self
    {
        if ($this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage->removeElement($idPersonnage);
            // set the owning side to null (unless already changed)
            if ($idPersonnage->getIdRace() === $this) {
                $idPersonnage->setIdRace(null);
            }
        }

        return $this;
    }
}
