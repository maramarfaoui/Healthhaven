<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=11, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=11, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DteEve", type="date", nullable=false)
     */
    private $dteeve;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuEve", type="string", length=11, nullable=false)
     */
    private $lieueve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HrEve", type="time", nullable=false)
     */
    private $hreve;

    /**
     * @var string
     *
     * @ORM\Column(name="DescrEve", type="string", length=255, nullable=false)
     */
    private $descreve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDteeve(): ?\DateTimeInterface
    {
        return $this->dteeve;
    }

    public function setDteeve(\DateTimeInterface $dteeve): self
    {
        $this->dteeve = $dteeve;

        return $this;
    }

    public function getLieueve(): ?string
    {
        return $this->lieueve;
    }

    public function setLieueve(string $lieueve): self
    {
        $this->lieueve = $lieueve;

        return $this;
    }

    public function getHreve(): ?\DateTimeInterface
    {
        return $this->hreve;
    }

    public function setHreve(\DateTimeInterface $hreve): self
    {
        $this->hreve = $hreve;

        return $this;
    }

    public function getDescreve(): ?string
    {
        return $this->descreve;
    }

    public function setDescreve(string $descreve): self
    {
        $this->descreve = $descreve;

        return $this;
    }


}
