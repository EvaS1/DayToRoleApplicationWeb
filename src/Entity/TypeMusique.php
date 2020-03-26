<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeMusiqueRepository")
 */
class TypeMusique
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Musique", mappedBy="id_type_musique")
     */
    private $id_musique;

    public function __construct()
    {
        $this->id_musique = new ArrayCollection();
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
     * @return Collection|Musique[]
     */
    public function getIdMusique(): Collection
    {
        return $this->id_musique;
    }

    public function addIdMusique(Musique $idMusique): self
    {
        if (!$this->id_musique->contains($idMusique)) {
            $this->id_musique[] = $idMusique;
            $idMusique->addIdTypeMusique($this);
        }

        return $this;
    }

    public function removeIdMusique(Musique $idMusique): self
    {
        if ($this->id_musique->contains($idMusique)) {
            $this->id_musique->removeElement($idMusique);
            $idMusique->removeIdTypeMusique($this);
        }

        return $this;
    }
}
