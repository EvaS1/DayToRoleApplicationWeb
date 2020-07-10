<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageObjetRepository")
 */
class PersonnageObjet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_personnage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Objet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_objet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getIdPersonnage(): ?Personnage
    {
        return $this->id_personnage;
    }

    public function setIdPersonnage(?Personnage $id_personnage): self
    {
        $this->id_personnage = $id_personnage;

        return $this;
    }

    public function getIdObjet(): ?Objet
    {
        return $this->id_objet;
    }

    public function setIdObjet(?Objet $id_objet): self
    {
        $this->id_objet = $id_objet;

        return $this;
    }
}
