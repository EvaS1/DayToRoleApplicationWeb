<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComplexiteRepository")
 */
class Complexite
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
     * @ORM\Column(type="smallint")
     */
    private $points;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Action", mappedBy="id_complexite")
     */
    private $id_action;

    public function __construct()
    {
        $this->id_action = new ArrayCollection();
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

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return Collection|Action[]
     */
    public function getIdAction(): Collection
    {
        return $this->id_action;
    }

    public function addIdAction(Action $idAction): self
    {
        if (!$this->id_action->contains($idAction)) {
            $this->id_action[] = $idAction;
            $idAction->setIdComplexite($this);
        }

        return $this;
    }

    public function removeIdAction(Action $idAction): self
    {
        if ($this->id_action->contains($idAction)) {
            $this->id_action->removeElement($idAction);
            // set the owning side to null (unless already changed)
            if ($idAction->getIdComplexite() === $this) {
                $idAction->setIdComplexite(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return  $this->libelle;
    }
}
