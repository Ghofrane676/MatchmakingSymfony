<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salonsalle
 *
 * @ORM\Table(name="salonsalle", indexes={@ORM\Index(name="FK_association11", columns={"EditionRefrence"})})
 * @ORM\Entity
 */
class Salonsalle
{
    /**
     * @var int
     *
     * @ORM\Column(name="SalleReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sallereference;

    /**
     * @var int
     *
     * @ORM\Column(name="EditionRefrence", type="integer", nullable=false)
     */
    private $editionrefrence;

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

    public function getSallereference(): ?int
    {
        return $this->sallereference;
    }

    public function getEditionrefrence(): ?int
    {
        return $this->editionrefrence;
    }

    public function setEditionrefrence(int $editionrefrence): self
    {
        $this->editionrefrence = $editionrefrence;

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
