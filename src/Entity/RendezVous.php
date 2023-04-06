<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * RendezVous
 *
 * @ORM\Table(name="rendez_vous")
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_RV", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRv;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_medecin", type="integer", nullable=true)
     */
    private $idMedecin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heure_RV", type="string", length=10, nullable=true)
     */
    private $heureRv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_RV", type="date", nullable=true)
     */
    private $dateRv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    public function getIdRv(): ?int
    {
        return $this->idRv;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIdMedecin(): ?int
    {
        return $this->idMedecin;
    }

    public function setIdMedecin(?int $idMedecin): self
    {
        $this->idMedecin = $idMedecin;

        return $this;
    }

    public function getHeureRv(): ?string
    {
        return $this->heureRv;
    }

    public function setHeureRv(?string $heureRv): self
    {
        $this->heureRv = $heureRv;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDateRv(): ?\DateTimeInterface
    {
        return $this->dateRv;
    }

    public function setDateRv(?\DateTimeInterface $dateRv): self
    {
        $this->dateRv = $dateRv;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


}
