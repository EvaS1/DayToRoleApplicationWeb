<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UniversRepository")
 */
class Univers
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
     * @ORM\Column(type="string", length=50)
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Campagne", mappedBy="id_univers")
     */
    private $id_campagne;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Action", inversedBy="id_univers")
     */
    private $id_action;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Statistiques", mappedBy="id_univers")
     */
    private $id_statistique;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Objet", mappedBy="id_univers")
     */
    private $id_objet;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classe", inversedBy="id_univers")
     */
    private $id_classe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Arme", mappedBy="id_univers")
     */
    private $id_arme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TypeArme", mappedBy="id_univers")
     */
    private $id_type_arme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Race", inversedBy="id_univers")
     */
    private $id_race;

    public function __construct()
    {
        $this->id_campagne = new ArrayCollection();
        $this->id_action = new ArrayCollection();
        $this->id_statistique = new ArrayCollection();
        $this->id_objet = new ArrayCollection();
        $this->id_classe = new ArrayCollection();
        $this->id_arme = new ArrayCollection();
        $this->id_type_arme = new ArrayCollection();
        $this->id_race = new ArrayCollection();
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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return Collection|Campagne[]
     */
    public function getIdCampagne(): Collection
    {
        return $this->id_campagne;
    }

    public function addIdCampagne(Campagne $idCampagne): self
    {
        if (!$this->id_campagne->contains($idCampagne)) {
            $this->id_campagne[] = $idCampagne;
            $idCampagne->setIdUnivers($this);
        }

        return $this;
    }

    public function removeIdCampagne(Campagne $idCampagne): self
    {
        if ($this->id_campagne->contains($idCampagne)) {
            $this->id_campagne->removeElement($idCampagne);
            // set the owning side to null (unless already changed)
            if ($idCampagne->getIdUnivers() === $this) {
                $idCampagne->setIdUnivers(null);
            }
        }

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
        }

        return $this;
    }

    public function removeIdAction(Action $idAction): self
    {
        if ($this->id_action->contains($idAction)) {
            $this->id_action->removeElement($idAction);
        }

        return $this;
    }

    /**
     * @return Collection|Statistiques[]
     */
    public function getIdStatistique(): Collection
    {
        return $this->id_statistique;
    }

    public function addIdStatistique(Statistiques $idStatistique): self
    {
        if (!$this->id_statistique->contains($idStatistique)) {
            $this->id_statistique[] = $idStatistique;
            $idStatistique->setIdUnivers($this);
        }

        return $this;
    }

    public function removeIdStatistique(Statistiques $idStatistique): self
    {
        if ($this->id_statistique->contains($idStatistique)) {
            $this->id_statistique->removeElement($idStatistique);
            // set the owning side to null (unless already changed)
            if ($idStatistique->getIdUnivers() === $this) {
                $idStatistique->setIdUnivers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Objet[]
     */
    public function getIdObjet(): Collection
    {
        return $this->id_objet;
    }

    public function addIdObjet(Objet $idObjet): self
    {
        if (!$this->id_objet->contains($idObjet)) {
            $this->id_objet[] = $idObjet;
            $idObjet->setIdUnivers($this);
        }

        return $this;
    }

    public function removeIdObjet(Objet $idObjet): self
    {
        if ($this->id_objet->contains($idObjet)) {
            $this->id_objet->removeElement($idObjet);
            // set the owning side to null (unless already changed)
            if ($idObjet->getIdUnivers() === $this) {
                $idObjet->setIdUnivers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Classe[]
     */
    public function getIdClasse(): Collection
    {
        return $this->id_classe;
    }

    public function addIdClasse(Classe $idClasse): self
    {
        if (!$this->id_classe->contains($idClasse)) {
            $this->id_classe[] = $idClasse;
        }

        return $this;
    }

    public function removeIdClasse(Classe $idClasse): self
    {
        if ($this->id_classe->contains($idClasse)) {
            $this->id_classe->removeElement($idClasse);
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
            $idArme->setIdUnivers($this);
        }

        return $this;
    }

    public function removeIdArme(Arme $idArme): self
    {
        if ($this->id_arme->contains($idArme)) {
            $this->id_arme->removeElement($idArme);
            // set the owning side to null (unless already changed)
            if ($idArme->getIdUnivers() === $this) {
                $idArme->setIdUnivers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TypeArme[]
     */
    public function getIdTypeArme(): Collection
    {
        return $this->id_type_arme;
    }

    public function addIdTypeArme(TypeArme $idTypeArme): self
    {
        if (!$this->id_type_arme->contains($idTypeArme)) {
            $this->id_type_arme[] = $idTypeArme;
            $idTypeArme->setIdUnivers($this);
        }

        return $this;
    }

    public function removeIdTypeArme(TypeArme $idTypeArme): self
    {
        if ($this->id_type_arme->contains($idTypeArme)) {
            $this->id_type_arme->removeElement($idTypeArme);
            // set the owning side to null (unless already changed)
            if ($idTypeArme->getIdUnivers() === $this) {
                $idTypeArme->setIdUnivers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Race[]
     */
    public function getIdRace(): Collection
    {
        return $this->id_race;
    }

    public function addIdRace(Race $idRace): self
    {
        if (!$this->id_race->contains($idRace)) {
            $this->id_race[] = $idRace;
        }

        return $this;
    }

    public function removeIdRace(Race $idRace): self
    {
        if ($this->id_race->contains($idRace)) {
            $this->id_race->removeElement($idRace);
        }

        return $this;
    }
}
