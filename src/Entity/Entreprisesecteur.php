<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprisesecteur
 *
 * @ORM\Table(name="entreprisesecteur", indexes={@ORM\Index(name="FK_association1", columns={"SecteurPincipalReference"})})
 * @ORM\Entity
 */
class Entreprisesecteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="SecteurReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $secteurreference;

    /**
     * @var int
     *
     * @ORM\Column(name="SecteurPincipalReference", type="integer", nullable=false)
     */
    private $secteurpincipalreference;

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

    public function getSecteurreference(): ?int
    {
        return $this->secteurreference;
    }

    public function getSecteurpincipalreference(): ?int
    {
        return $this->secteurpincipalreference;
    }

    public function setSecteurpincipalreference(int $secteurpincipalreference): self
    {
        $this->secteurpincipalreference = $secteurpincipalreference;

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
