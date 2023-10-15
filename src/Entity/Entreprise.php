<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise", indexes={@ORM\Index(name="FK_association4", columns={"SousSecteurReference"}), @ORM\Index(name="FK_association7", columns={"ChiffreAffaireReference"}), @ORM\Index(name="FK_association3", columns={"paysReference"}), @ORM\Index(name="FK_association5", columns={"NombreEmployeReference"}), @ORM\Index(name="FK_association8", columns={"ServiceReference"})})
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="Reference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reference;

    /**
     * @var int
     *
     * @ORM\Column(name="NombreEmployeReference", type="integer", nullable=false)
     */
    private $nombreemployereference;

    /**
     * @var int
     *
     * @ORM\Column(name="SousSecteurReference", type="integer", nullable=false)
     */
    private $soussecteurreference;

    /**
     * @var int
     *
     * @ORM\Column(name="ChiffreAffaireReference", type="integer", nullable=false)
     */
    private $chiffreaffairereference;

    /**
     * @var int
     *
     * @ORM\Column(name="paysReference", type="integer", nullable=false)
     */
    private $paysreference;

    /**
     * @var int
     *
     * @ORM\Column(name="ServiceReference", type="integer", nullable=false)
     */
    private $servicereference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Denomination", type="string", length=254, nullable=true)
     */
    private $denomination;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Logo", type="string", length=254, nullable=true)
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SiteWeb", type="string", length=254, nullable=true)
     */
    private $siteweb;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NombreClient", type="integer", nullable=true)
     */
    private $nombreclient;

    /**
     * @var float|null
     *
     * @ORM\Column(name="PourcentageCA", type="float", precision=10, scale=0, nullable=true)
     */
    private $pourcentageca;

    /**
     * @var float|null
     *
     * @ORM\Column(name="PrixInnovation", type="float", precision=10, scale=0, nullable=true)
     */
    private $prixinnovation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Cellulaire", type="integer", nullable=true)
     */
    private $cellulaire;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Telephone1", type="integer", nullable=true)
     */
    private $telephone1;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Telephone2", type="integer", nullable=true)
     */
    private $telephone2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Fax", type="integer", nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TransferExport", type="string", length=254, nullable=true)
     */
    private $transferexport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Export", type="string", length=254, nullable=true)
     */
    private $export;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Client", type="string", length=254, nullable=true)
     */
    private $client;

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function getNombreemployereference(): ?int
    {
        return $this->nombreemployereference;
    }

    public function setNombreemployereference(int $nombreemployereference): self
    {
        $this->nombreemployereference = $nombreemployereference;

        return $this;
    }

    public function getSoussecteurreference(): ?int
    {
        return $this->soussecteurreference;
    }

    public function setSoussecteurreference(int $soussecteurreference): self
    {
        $this->soussecteurreference = $soussecteurreference;

        return $this;
    }

    public function getChiffreaffairereference(): ?int
    {
        return $this->chiffreaffairereference;
    }

    public function setChiffreaffairereference(int $chiffreaffairereference): self
    {
        $this->chiffreaffairereference = $chiffreaffairereference;

        return $this;
    }

    public function getPaysreference(): ?int
    {
        return $this->paysreference;
    }

    public function setPaysreference(int $paysreference): self
    {
        $this->paysreference = $paysreference;

        return $this;
    }

    public function getServicereference(): ?int
    {
        return $this->servicereference;
    }

    public function setServicereference(int $servicereference): self
    {
        $this->servicereference = $servicereference;

        return $this;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(?string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSiteweb(): ?string
    {
        return $this->siteweb;
    }

    public function setSiteweb(?string $siteweb): self
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    public function getNombreclient(): ?int
    {
        return $this->nombreclient;
    }

    public function setNombreclient(?int $nombreclient): self
    {
        $this->nombreclient = $nombreclient;

        return $this;
    }

    public function getPourcentageca(): ?float
    {
        return $this->pourcentageca;
    }

    public function setPourcentageca(?float $pourcentageca): self
    {
        $this->pourcentageca = $pourcentageca;

        return $this;
    }

    public function getPrixinnovation(): ?float
    {
        return $this->prixinnovation;
    }

    public function setPrixinnovation(?float $prixinnovation): self
    {
        $this->prixinnovation = $prixinnovation;

        return $this;
    }

    public function getCellulaire(): ?int
    {
        return $this->cellulaire;
    }

    public function setCellulaire(?int $cellulaire): self
    {
        $this->cellulaire = $cellulaire;

        return $this;
    }

    public function getTelephone1(): ?int
    {
        return $this->telephone1;
    }

    public function setTelephone1(?int $telephone1): self
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    public function getTelephone2(): ?int
    {
        return $this->telephone2;
    }

    public function setTelephone2(?int $telephone2): self
    {
        $this->telephone2 = $telephone2;

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

    public function getTransferexport(): ?string
    {
        return $this->transferexport;
    }

    public function setTransferexport(?string $transferexport): self
    {
        $this->transferexport = $transferexport;

        return $this;
    }

    public function getExport(): ?string
    {
        return $this->export;
    }

    public function setExport(?string $export): self
    {
        $this->export = $export;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }


}
