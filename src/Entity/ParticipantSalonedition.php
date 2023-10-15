<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParticipantSalonedition
 *
 * @ORM\Table(name="participant_salonedition", indexes={@ORM\Index(name="FK_association16", columns={"EditionRefrence"})})
 * @ORM\Entity
 */
class ParticipantSalonedition
{
    /**
     * @var int
     *
     * @ORM\Column(name="participantReference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $participantreference;

    /**
     * @var int
     *
     * @ORM\Column(name="EditionRefrence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $editionrefrence;

    public function getParticipantreference(): ?int
    {
        return $this->participantreference;
    }

    public function getEditionrefrence(): ?int
    {
        return $this->editionrefrence;
    }


}
