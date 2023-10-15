<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprisechiffreaffaire
 *
 * @ORM\Table(name="entreprisechiffreaffaire")
 * @ORM\Entity
 */
class Entreprisechiffreaffaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="ChiffreAffaireReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chiffreaffairereference;

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

    public function getChiffreaffairereference(): ?int
    {
        return $this->chiffreaffairereference;
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
