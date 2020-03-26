<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DifficulteRepository")
 */
class Difficulte
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
     * @ORM\OneToMany(targetEntity="App\Entity\Scenario", mappedBy="id_difficulte")
     */
    private $id_scenario;

    public function __construct()
    {
        $this->id_scenario = new ArrayCollection();
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
            $idScenario->setIdDifficulte($this);
        }

        return $this;
    }

    public function removeIdScenario(Scenario $idScenario): self
    {
        if ($this->id_scenario->contains($idScenario)) {
            $this->id_scenario->removeElement($idScenario);
            // set the owning side to null (unless already changed)
            if ($idScenario->getIdDifficulte() === $this) {
                $idScenario->setIdDifficulte(null);
            }
        }

        return $this;
    }
}
