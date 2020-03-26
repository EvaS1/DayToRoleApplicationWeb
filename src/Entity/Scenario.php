<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 */
class Scenario
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
     * @ORM\Column(type="time")
     */
    private $duree;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nb_joueur_min;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nb_joueur_max;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Partie", mappedBy="id_scenario")
     */
    private $id_partie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Difficulte", inversedBy="id_scenario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_difficulte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Lore", inversedBy="id_scenario", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_lore;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SupportVisuel", inversedBy="id_scenario")
     */
    private $id_support_visuel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Musique", inversedBy="id_scenario")
     */
    private $id_musique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campagne", inversedBy="id_scenario")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_campagne;

    public function __construct()
    {
        $this->id_partie = new ArrayCollection();
        $this->id_support_visuel = new ArrayCollection();
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

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNbJoueurMin(): ?int
    {
        return $this->nb_joueur_min;
    }

    public function setNbJoueurMin(int $nb_joueur_min): self
    {
        $this->nb_joueur_min = $nb_joueur_min;

        return $this;
    }

    public function getNbJoueurMax(): ?int
    {
        return $this->nb_joueur_max;
    }

    public function setNbJoueurMax(int $nb_joueur_max): self
    {
        $this->nb_joueur_max = $nb_joueur_max;

        return $this;
    }

    /**
     * @return Collection|Partie[]
     */
    public function getIdPartie(): Collection
    {
        return $this->id_partie;
    }

    public function addIdPartie(Partie $idPartie): self
    {
        if (!$this->id_partie->contains($idPartie)) {
            $this->id_partie[] = $idPartie;
            $idPartie->setIdScenario($this);
        }

        return $this;
    }

    public function removeIdPartie(Partie $idPartie): self
    {
        if ($this->id_partie->contains($idPartie)) {
            $this->id_partie->removeElement($idPartie);
            // set the owning side to null (unless already changed)
            if ($idPartie->getIdScenario() === $this) {
                $idPartie->setIdScenario(null);
            }
        }

        return $this;
    }

    public function getIdDifficulte(): ?Difficulte
    {
        return $this->id_difficulte;
    }

    public function setIdDifficulte(?Difficulte $id_difficulte): self
    {
        $this->id_difficulte = $id_difficulte;

        return $this;
    }

    public function getIdLore(): ?Lore
    {
        return $this->id_lore;
    }

    public function setIdLore(Lore $id_lore): self
    {
        $this->id_lore = $id_lore;

        return $this;
    }

    /**
     * @return Collection|SupportVisuel[]
     */
    public function getIdSupportVisuel(): Collection
    {
        return $this->id_support_visuel;
    }

    public function addIdSupportVisuel(SupportVisuel $idSupportVisuel): self
    {
        if (!$this->id_support_visuel->contains($idSupportVisuel)) {
            $this->id_support_visuel[] = $idSupportVisuel;
        }

        return $this;
    }

    public function removeIdSupportVisuel(SupportVisuel $idSupportVisuel): self
    {
        if ($this->id_support_visuel->contains($idSupportVisuel)) {
            $this->id_support_visuel->removeElement($idSupportVisuel);
        }

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
        }

        return $this;
    }

    public function removeIdMusique(Musique $idMusique): self
    {
        if ($this->id_musique->contains($idMusique)) {
            $this->id_musique->removeElement($idMusique);
        }

        return $this;
    }

    public function getIdCampagne(): ?Campagne
    {
        return $this->id_campagne;
    }

    public function setIdCampagne(?Campagne $id_campagne): self
    {
        $this->id_campagne = $id_campagne;

        return $this;
    }
}
