<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 */
class Action
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Univers", mappedBy="id_action")
     */
    private $id_univers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Complexite", inversedBy="id_action")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_complexite;

    public function __construct()
    {
        $this->id_univers = new ArrayCollection();
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
            $idUniver->addIdAction($this);
        }

        return $this;
    }

    public function removeIdUniver(Univers $idUniver): self
    {
        if ($this->id_univers->contains($idUniver)) {
            $this->id_univers->removeElement($idUniver);
            $idUniver->removeIdAction($this);
        }

        return $this;
    }

    public function getIdComplexite(): ?Complexite
    {
        return $this->id_complexite;
    }

    public function setIdComplexite(?Complexite $id_complexite): self
    {
        $this->id_complexite = $id_complexite;

        return $this;
    }
}
