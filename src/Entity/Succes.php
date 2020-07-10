<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuccesRepository")
 */
class Succes
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Joueur", mappedBy="id_succes")
     */
    private $id_joueur;

    public function __construct()
    {
        $this->id_joueur = new ArrayCollection();
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
     * @return Collection|Joueur[]
     */
    public function getIdJoueur(): Collection
    {
        return $this->id_joueur;
    }

    public function addIdJoueur(Joueur $idJoueur): self
    {
        if (!$this->id_joueur->contains($idJoueur)) {
            $this->id_joueur[] = $idJoueur;
            $idJoueur->addIdSucce($this);
        }

        return $this;
    }

    public function removeIdJoueur(Joueur $idJoueur): self
    {
        if ($this->id_joueur->contains($idJoueur)) {
            $this->id_joueur->removeElement($idJoueur);
            $idJoueur->removeIdSucce($this);
        }

        return $this;
    }
}
