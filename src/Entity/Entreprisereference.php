<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprisereference
 *
 * @ORM\Table(name="entreprisereference", indexes={@ORM\Index(name="AK_Identifiant_2", columns={"referenceId"}), @ORM\Index(name="FK_association6", columns={"Reference"}), @ORM\Index(name="AK_Identifiant_1", columns={"referenceId"})})
 * @ORM\Entity
 */
class Entreprisereference
{
    /**
     * @var int
     *
     * @ORM\Column(name="referenceId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $referenceid;

    /**
     * @var int
     *
     * @ORM\Column(name="Reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Libelle", type="string", length=254, nullable=true)
     */
    private $libelle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="File", type="string", length=254, nullable=true)
     */
    private $file;

    public function getReferenceid(): ?int
    {
        return $this->referenceid;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

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

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }


}
