<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescription
 *
 * @ORM\Table(name="prescription", uniqueConstraints={@ORM\UniqueConstraint(name="fk_constraint_name", columns={"nom_medic"})})
 * @ORM\Entity
 */
class Prescription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_medic", type="string", length=30, nullable=false)
     */
    private $nomMedic;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dosage", type="integer", nullable=true)
     */
    private $dosage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="signature", type="string", length=30, nullable=true)
     */
    private $signature;

    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedic(): ?string
    {
        return $this->nomMedic;
    }

    public function setNomMedic(string $nomMedic): self
    {
        $this->nomMedic = $nomMedic;

        return $this;
    }

    public function getDosage(): ?int
    {
        return $this->dosage;
    }

    public function setDosage(?int $dosage): self
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
