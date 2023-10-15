<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participantcooperationsouhaite
 *
 * @ORM\Table(name="participantcooperationsouhaite", indexes={@ORM\Index(name="AK_Identifiant_1", columns={"CoopSouhaiteReference"})})
 * @ORM\Entity
 */
class Participantcooperationsouhaite
{
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

    /**
     * @var int
     *
     * @ORM\Column(name="CoopSouhaiteReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coopsouhaitereference;

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

    public function getCoopsouhaitereference(): ?int
    {
        return $this->coopsouhaitereference;
    }


}
