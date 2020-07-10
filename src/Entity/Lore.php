<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LoreRepository")
 */
class Lore
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=350, nullable=true)
     */
    private $fichier;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Scenario", mappedBy="id_lore", cascade={"persist", "remove"})
     */
    private $id_scenario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }

    public function getIdScenario(): ?Scenario
    {
        return $this->id_scenario;
    }

    public function setIdScenario(?Scenario $id_scenario): self
    {
        $this->id_scenario = $id_scenario;

        // set (or unset) the owning side of the relation if necessary
        $newId_lore = null === $id_scenario ? null : $this;
        if ($id_scenario->getIdLore() !== $newId_lore) {
            $id_scenario->setIdLore($newId_lore);
        }

        return $this;
    }
}
