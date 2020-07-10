<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnageRepository")
 */
class Personnage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="smallint")
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_physique;

    /**
     * @ORM\Column(type="string", length=350, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Joueur", mappedBy="id_personnage")
     */
    private $id_joueur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Arme", mappedBy="id_personnage")
     */
    private $id_arme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Race", inversedBy="id_personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_race;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Etat", inversedBy="id_personnage")
     */
    private $id_etat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classe", inversedBy="id_personnage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_classe;

    public function __construct()
    {
        $this->id_joueur = new ArrayCollection();
        $this->id_arme = new ArrayCollection();
        $this->id_etat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre(): ?int
    {
        return $this->genre;
    }

    public function setGenre(int $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getDescriptionPhysique(): ?string
    {
        return $this->description_physique;
    }

    public function setDescriptionPhysique(?string $description_physique): self
    {
        $this->description_physique = $description_physique;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
            $idJoueur->addIdPersonnage($this);
        }

        return $this;
    }

    public function removeIdJoueur(Joueur $idJoueur): self
    {
        if ($this->id_joueur->contains($idJoueur)) {
            $this->id_joueur->removeElement($idJoueur);
            $idJoueur->removeIdPersonnage($this);
        }

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
            $idArme->addIdPersonnage($this);
        }

        return $this;
    }

    public function removeIdArme(Arme $idArme): self
    {
        if ($this->id_arme->contains($idArme)) {
            $this->id_arme->removeElement($idArme);
            $idArme->removeIdPersonnage($this);
        }

        return $this;
    }

    public function getIdRace(): ?Race
    {
        return $this->id_race;
    }

    public function setIdRace(?Race $id_race): self
    {
        $this->id_race = $id_race;

        return $this;
    }

    /**
     * @return Collection|Etat[]
     */
    public function getIdEtat(): Collection
    {
        return $this->id_etat;
    }

    public function addIdEtat(Etat $idEtat): self
    {
        if (!$this->id_etat->contains($idEtat)) {
            $this->id_etat[] = $idEtat;
        }

        return $this;
    }

    public function removeIdEtat(Etat $idEtat): self
    {
        if ($this->id_etat->contains($idEtat)) {
            $this->id_etat->removeElement($idEtat);
        }

        return $this;
    }

    public function getIdClasse(): ?Classe
    {
        return $this->id_classe;
    }

    public function setIdClasse(?Classe $id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
    }
}
