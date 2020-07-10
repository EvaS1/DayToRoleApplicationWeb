<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatistiquesRepository")
 */
class Statistiques
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Univers", inversedBy="id_statistique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_univers;

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
