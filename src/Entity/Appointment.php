<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment", indexes={@ORM\Index(name="idPatient", columns={"idPatient"}), @ORM\Index(name="idMedecin", columns={"idMedecin"})})
 * @ORM\Entity

 */
class Appointment
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idap;

    /**
     * @var string
     *
     * @ORM\Column(name="dateAp", type="string", length=250, nullable=false)
     */
    private $dateap;

    /**
     * @var string
     *
     * @ORM\Column(name="hour", type="string", length=250, nullable=false)
     */
    private $hour;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPatient", referencedColumnName="idUser")
     * })
     */
    private $idpatient;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMedecin", referencedColumnName="idUser")
     * })
     */
    private $idmedecin;

    public function getIdap(): ?int
    {
        return $this->idap;
    }

    public function getDateap(): ?string
    {
        return $this->dateap;
    }

    public function setDateap(string $dateap): self
    {
        $this->dateap = $dateap;

        return $this;
    }

    public function getHour(): ?string
    {
        return $this->hour;
    }

    public function setHour(string $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdpatient(): ?User
    {
        return $this->idpatient;
    }

    public function setIdpatient(?User $idpatient): self
    {
        $this->idpatient = $idpatient;

        return $this;
    }

    public function getIdmedecin(): ?User
    {
        return $this->idmedecin;
    }

    public function setIdmedecin(?User $idmedecin): self
    {
        $this->idmedecin = $idmedecin;

        return $this;
    }


}
