<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participantfonction
 *
 * @ORM\Table(name="participantfonction")
 * @ORM\Entity
 */
class Participantfonction
{
    /**
     * @var int
     *
     * @ORM\Column(name="FonctionReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fonctionreference;

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

    public function getFonctionreference(): ?int
    {
        return $this->fonctionreference;
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
