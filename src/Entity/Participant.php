<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant", indexes={@ORM\Index(name="FK_association9", columns={"entrepriseReference"}), @ORM\Index(name="FK_association13", columns={"participantFonctionReference"}), @ORM\Index(name="FK_association14", columns={"participantServiceReference"}), @ORM\Index(name="AK_Identifiant_1", columns={"ParticipantReference"})})
 * @ORM\Entity
 */
class Participant
{
    /**
     * @var int
     *
     * @ORM\Column(name="ParticipantReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $participantreference;

    /**
     * @var int
     *
     * @ORM\Column(name="entrepriseReference", type="integer", nullable=false)
     */
    private $entreprisereference;

    /**
     * @var int
     *
     * @ORM\Column(name="participantFonctionReference", type="integer", nullable=false)
     */
    private $participantfonctionreference;

    /**
     * @var int
     *
     * @ORM\Column(name="participantServiceReference", type="integer", nullable=false)
     */
    private $participantservicereference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prenom", type="string", length=254, nullable=true)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PhotoProfil", type="string", length=254, nullable=true)
     */
    private $photoprofil;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Civilite", type="string", length=254, nullable=true)
     */
    private $civilite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Fax", type="integer", nullable=true)
     */
    private $fax;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Gsm", type="integer", nullable=true)
     */
    private $gsm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Linkedin", type="string", length=254, nullable=true)
     */
    private $linkedin;

    public function getParticipantreference(): ?int
    {
        return $this->participantreference;
    }

    public function getEntreprisereference(): ?int
    {
        return $this->entreprisereference;
    }

    public function setEntreprisereference(int $entreprisereference): self
    {
        $this->entreprisereference = $entreprisereference;

        return $this;
    }

    public function getParticipantfonctionreference(): ?int
    {
        return $this->participantfonctionreference;
    }

    public function setParticipantfonctionreference(int $participantfonctionreference): self
    {
        $this->participantfonctionreference = $participantfonctionreference;

        return $this;
    }

    public function getParticipantservicereference(): ?int
    {
        return $this->participantservicereference;
    }

    public function setParticipantservicereference(int $participantservicereference): self
    {
        $this->participantservicereference = $participantservicereference;

        return $this;
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

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhotoprofil(): ?string
    {
        return $this->photoprofil;
    }

    public function setPhotoprofil(?string $photoprofil): self
    {
        $this->photoprofil = $photoprofil;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?int
    {
        return $this->fax;
    }

    public function setFax(?int $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getGsm(): ?int
    {
        return $this->gsm;
    }

    public function setGsm(?int $gsm): self
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }


}
