<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salonedition
 *
 * @ORM\Table(name="salonedition", indexes={@ORM\Index(name="FK_association10", columns={"salonReference"})})
 * @ORM\Entity
 */
class Salonedition
{
    /**
     * @var int
     *
     * @ORM\Column(name="EditionRefrence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $editionrefrence;

    /**
     * @var int
     *
     * @ORM\Column(name="salonReference", type="integer", nullable=false)
     */
    private $salonreference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateDebut", type="datetime", nullable=true)
     */
    private $datedebut;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NombreJour", type="integer", nullable=true)
     */
    private $nombrejour;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateFin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HeureDebutParJour", type="datetime", nullable=true)
     */
    private $heuredebutparjour;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="HeureFinParJour", type="datetime", nullable=true)
     */
    private $heurefinparjour;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DureeRencontre", type="integer", nullable=true)
     */
    private $dureerencontre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DebutRepas", type="datetime", nullable=true)
     */
    private $debutrepas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DureeRepas", type="integer", nullable=true)
     */
    private $dureerepas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FinRepas", type="datetime", nullable=true)
     */
    private $finrepas;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DebutPauseCafeAM", type="datetime", nullable=true)
     */
    private $debutpausecafeam;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DureePauseCAfeAM", type="integer", nullable=true)
     */
    private $dureepausecafeam;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FinPauseCafeAM", type="datetime", nullable=true)
     */
    private $finpausecafeam;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DebutPauseCafePM", type="datetime", nullable=true)
     */
    private $debutpausecafepm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DureePauseCAfePM", type="integer", nullable=true)
     */
    private $dureepausecafepm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FinPauseCafePM", type="datetime", nullable=true)
     */
    private $finpausecafepm;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateLimiteInscription", type="datetime", nullable=true)
     */
    private $datelimiteinscription;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateLimiteRencontre", type="datetime", nullable=true)
     */
    private $datelimiterencontre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="MaxRencontre", type="integer", nullable=true)
     */
    private $maxrencontre;

    public function getEditionrefrence(): ?int
    {
        return $this->editionrefrence;
    }

    public function getSalonreference(): ?int
    {
        return $this->salonreference;
    }

    public function setSalonreference(int $salonreference): self
    {
        $this->salonreference = $salonreference;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(?\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getNombrejour(): ?int
    {
        return $this->nombrejour;
    }

    public function setNombrejour(?int $nombrejour): self
    {
        $this->nombrejour = $nombrejour;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(?\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getHeuredebutparjour(): ?\DateTimeInterface
    {
        return $this->heuredebutparjour;
    }

    public function setHeuredebutparjour(?\DateTimeInterface $heuredebutparjour): self
    {
        $this->heuredebutparjour = $heuredebutparjour;

        return $this;
    }

    public function getHeurefinparjour(): ?\DateTimeInterface
    {
        return $this->heurefinparjour;
    }

    public function setHeurefinparjour(?\DateTimeInterface $heurefinparjour): self
    {
        $this->heurefinparjour = $heurefinparjour;

        return $this;
    }

    public function getDureerencontre(): ?int
    {
        return $this->dureerencontre;
    }

    public function setDureerencontre(?int $dureerencontre): self
    {
        $this->dureerencontre = $dureerencontre;

        return $this;
    }

    public function getDebutrepas(): ?\DateTimeInterface
    {
        return $this->debutrepas;
    }

    public function setDebutrepas(?\DateTimeInterface $debutrepas): self
    {
        $this->debutrepas = $debutrepas;

        return $this;
    }

    public function getDureerepas(): ?int
    {
        return $this->dureerepas;
    }

    public function setDureerepas(?int $dureerepas): self
    {
        $this->dureerepas = $dureerepas;

        return $this;
    }

    public function getFinrepas(): ?\DateTimeInterface
    {
        return $this->finrepas;
    }

    public function setFinrepas(?\DateTimeInterface $finrepas): self
    {
        $this->finrepas = $finrepas;

        return $this;
    }

    public function getDebutpausecafeam(): ?\DateTimeInterface
    {
        return $this->debutpausecafeam;
    }

    public function setDebutpausecafeam(?\DateTimeInterface $debutpausecafeam): self
    {
        $this->debutpausecafeam = $debutpausecafeam;

        return $this;
    }

    public function getDureepausecafeam(): ?int
    {
        return $this->dureepausecafeam;
    }

    public function setDureepausecafeam(?int $dureepausecafeam): self
    {
        $this->dureepausecafeam = $dureepausecafeam;

        return $this;
    }

    public function getFinpausecafeam(): ?\DateTimeInterface
    {
        return $this->finpausecafeam;
    }

    public function setFinpausecafeam(?\DateTimeInterface $finpausecafeam): self
    {
        $this->finpausecafeam = $finpausecafeam;

        return $this;
    }

    public function getDebutpausecafepm(): ?\DateTimeInterface
    {
        return $this->debutpausecafepm;
    }

    public function setDebutpausecafepm(?\DateTimeInterface $debutpausecafepm): self
    {
        $this->debutpausecafepm = $debutpausecafepm;

        return $this;
    }

    public function getDureepausecafepm(): ?int
    {
        return $this->dureepausecafepm;
    }

    public function setDureepausecafepm(?int $dureepausecafepm): self
    {
        $this->dureepausecafepm = $dureepausecafepm;

        return $this;
    }

    public function getFinpausecafepm(): ?\DateTimeInterface
    {
        return $this->finpausecafepm;
    }

    public function setFinpausecafepm(?\DateTimeInterface $finpausecafepm): self
    {
        $this->finpausecafepm = $finpausecafepm;

        return $this;
    }

    public function getDatelimiteinscription(): ?\DateTimeInterface
    {
        return $this->datelimiteinscription;
    }

    public function setDatelimiteinscription(?\DateTimeInterface $datelimiteinscription): self
    {
        $this->datelimiteinscription = $datelimiteinscription;

        return $this;
    }

    public function getDatelimiterencontre(): ?\DateTimeInterface
    {
        return $this->datelimiterencontre;
    }

    public function setDatelimiterencontre(?\DateTimeInterface $datelimiterencontre): self
    {
        $this->datelimiterencontre = $datelimiterencontre;

        return $this;
    }

    public function getMaxrencontre(): ?int
    {
        return $this->maxrencontre;
    }

    public function setMaxrencontre(?int $maxrencontre): self
    {
        $this->maxrencontre = $maxrencontre;

        return $this;
    }


}
