<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
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
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_fin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Session", mappedBy="id_partie")
     */
    private $id_session;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Joueur", mappedBy="id_partie")
     */
    private $id_joueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scenario", inversedBy="id_partie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_scenario;

    public function __construct()
    {
        $this->id_session = new ArrayCollection();
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

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->id_session;
    }

    public function addSession(Session $session): self
    {
        if (!$this->id_session->contains($session)) {
            $this->id_session[] = $session;
            $session->setIdPartie($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->id_session->contains($session)) {
            $this->id_session->removeElement($session);
            // set the owning side to null (unless already changed)
            if ($session->getIdPartie() === $this) {
                $session->setIdPartie(null);
            }
        }

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
            $idJoueur->addIdPartie($this);
        }

        return $this;
    }

    public function removeIdJoueur(Joueur $idJoueur): self
    {
        if ($this->id_joueur->contains($idJoueur)) {
            $this->id_joueur->removeElement($idJoueur);
            $idJoueur->removeIdPartie($this);
        }

        return $this;
    }

    public function getIdScenario(): ?Scenario
    {
        return $this->id_scenario;
    }

    public function setIdScenario(?Scenario $id_scenario): self
    {
        $this->id_scenario = $id_scenario;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getIdSession(): Collection
    {
        return $this->id_session;
    }

    public function addIdSession(Session $idSession): self
    {
        if (!$this->id_session->contains($idSession)) {
            $this->id_session[] = $idSession;
            $idSession->setIdPartie($this);
        }

        return $this;
    }

    public function removeIdSession(Session $idSession): self
    {
        if ($this->id_session->contains($idSession)) {
            $this->id_session->removeElement($idSession);
            // set the owning side to null (unless already changed)
            if ($idSession->getIdPartie() === $this) {
                $idSession->setIdPartie(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return  $this->libelle;
    }
}
