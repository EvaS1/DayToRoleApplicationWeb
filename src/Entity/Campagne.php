<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampagneRepository")
 */
class Campagne
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
     * @ORM\OneToMany(targetEntity="App\Entity\Scenario", mappedBy="id_campagne")
     */
    private $id_scenario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Univers", inversedBy="id_campagne")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_univers;

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
            $idScenario->setIdCampagne($this);
        }

        return $this;
    }

    public function removeIdScenario(Scenario $idScenario): self
    {
        if ($this->id_scenario->contains($idScenario)) {
            $this->id_scenario->removeElement($idScenario);
            // set the owning side to null (unless already changed)
            if ($idScenario->getIdCampagne() === $this) {
                $idScenario->setIdCampagne(null);
            }
        }

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
}
