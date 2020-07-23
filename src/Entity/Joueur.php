<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JoueurRepository")
 */
class Joueur implements userInterface,\Serializable
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
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_inscription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numero_portable;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Session", mappedBy="id_joueur")
     */
    private $id_session;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Succes", inversedBy="id_joueur")
     */
    private $id_succes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Partie", inversedBy="id_joueur")
     */
    private $id_partie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnage", inversedBy="id_joueur")
     */
    private $id_personnage;

    public function __construct()
    {
        $this->id_session = new ArrayCollection();
        $this->id_succes = new ArrayCollection();
        $this->id_partie = new ArrayCollection();
        $this->id_personnage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getNumeroPortable(): ?string
    {
        return $this->numero_portable;
    }

    public function setNumeroPortable(?string $numero_portable): self
    {
        $this->numero_portable = $numero_portable;

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
            $idSession->addIdJoueur($this);
        }

        return $this;
    }

    public function removeIdSession(Session $idSession): self
    {
        if ($this->id_session->contains($idSession)) {
            $this->id_session->removeElement($idSession);
            $idSession->removeIdJoueur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Succes[]
     */
    public function getIdSucces(): Collection
    {
        return $this->id_succes;
    }

    public function addIdSucce(Succes $idSucce): self
    {
        if (!$this->id_succes->contains($idSucce)) {
            $this->id_succes[] = $idSucce;
        }

        return $this;
    }

    public function removeIdSucce(Succes $idSucce): self
    {
        if ($this->id_succes->contains($idSucce)) {
            $this->id_succes->removeElement($idSucce);
        }

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
        }

        return $this;
    }

    public function removeIdPartie(Partie $idPartie): self
    {
        if ($this->id_partie->contains($idPartie)) {
            $this->id_partie->removeElement($idPartie);
        }

        return $this;
    }

    /**
     * @return Collection|Personnage[]
     */
    public function getIdPersonnage(): Collection
    {
        return $this->id_personnage;
    }

    public function addIdPersonnage(Personnage $idPersonnage): self
    {
        if (!$this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage[] = $idPersonnage;
        }

        return $this;
    }

    public function removeIdPersonnage(Personnage $idPersonnage): self
    {
        if ($this->id_personnage->contains($idPersonnage)) {
            $this->id_personnage->removeElement($idPersonnage);
        }

        return $this;
    }

    public function getRoles()
    {
        return['ROLE_ADMIN'];
    }



    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    public function eraseCredentials()
    {

    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->email,
            $this->password,
            $this->pseudo,
            $this->date_inscription,
            $this->notes,
            $this->numero_portable

        ]);
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->email,
            $this->password
            ) = unserialize($serialized,['allowed_classes'=>false]);
    }

    public function __toString()
    {
        return $this->pseudo;
    }
}
