<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprisesoussecteur
 *
 * @ORM\Table(name="entreprisesoussecteur", indexes={@ORM\Index(name="FK_association2", columns={"SecteurReference"})})
 * @ORM\Entity
 */
class Entreprisesoussecteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="SsSecteurReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sssecteurreference;

    /**
     * @var int
     *
     * @ORM\Column(name="SecteurReference", type="integer", nullable=false)
     */
    private $secteurreference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Libelle", type="string", length=254, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=254, nullable=true)
     */
    private $description;

    public function getSssecteurreference(): ?int
    {
        return $this->sssecteurreference;
    }

    public function getSecteurreference(): ?int
    {
        return $this->secteurreference;
    }

    public function setSecteurreference(int $secteurreference): self
    {
        $this->secteurreference = $secteurreference;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
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


}
