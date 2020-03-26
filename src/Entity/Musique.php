<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MusiqueRepository")
 */
class Musique
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
     * @ORM\Column(type="string", length=350)
     */
    private $lien;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Scenario", mappedBy="id_musique")
     */
    private $id_scenario;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TypeMusique", inversedBy="id_musique")
     */
    private $id_type_musique;

    public function __construct()
    {
        $this->id_scenario = new ArrayCollection();
        $this->id_type_musique = new ArrayCollection();
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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getIdScenario(): Collection
    {
        return $this->id_scenario;
    }

    public function addIdScenario(Scenario $idScenario): self
    {
        if (!$this->id_scenario->contains($idScenario)) {
            $this->id_scenario[] = $idScenario;
            $idScenario->addIdMusique($this);
        }

        return $this;
    }

    public function removeIdScenario(Scenario $idScenario): self
    {
        if ($this->id_scenario->contains($idScenario)) {
            $this->id_scenario->removeElement($idScenario);
            $idScenario->removeIdMusique($this);
        }

        return $this;
    }

    /**
     * @return Collection|TypeMusique[]
     */
    public function getIdTypeMusique(): Collection
    {
        return $this->id_type_musique;
    }

    public function addIdTypeMusique(TypeMusique $idTypeMusique): self
    {
        if (!$this->id_type_musique->contains($idTypeMusique)) {
            $this->id_type_musique[] = $idTypeMusique;
        }

        return $this;
    }

    public function removeIdTypeMusique(TypeMusique $idTypeMusique): self
    {
        if ($this->id_type_musique->contains($idTypeMusique)) {
            $this->id_type_musique->removeElement($idTypeMusique);
        }

        return $this;
    }
}
