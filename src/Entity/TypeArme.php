<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeArmeRepository")
 */
class TypeArme
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Univers", inversedBy="id_type_arme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_univers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Arme", mappedBy="id_type_arme")
     */
    private $id_arme;

    public function __construct()
    {
        $this->id_arme = new ArrayCollection();
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

    public function getIdUnivers(): ?Univers
    {
        return $this->id_univers;
    }

    public function setIdUnivers(?Univers $id_univers): self
    {
        $this->id_univers = $id_univers;

        return $this;
    }

    /**
     * @return Collection|Arme[]
     */
    public function getIdArme(): Collection
    {
        return $this->id_arme;
    }

    public function addIdArme(Arme $idArme): self
    {
        if (!$this->id_arme->contains($idArme)) {
            $this->id_arme[] = $idArme;
            $idArme->setIdTypeArme($this);
        }

        return $this;
    }

    public function removeIdArme(Arme $idArme): self
    {
        if ($this->id_arme->contains($idArme)) {
            $this->id_arme->removeElement($idArme);
            // set the owning side to null (unless already changed)
            if ($idArme->getIdTypeArme() === $this) {
                $idArme->setIdTypeArme(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return  $this->libelle;
    }
}
