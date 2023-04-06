<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity

 */
class Action
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
     * @ORM\Column(name="LieuAct", type="string", length=50, nullable=false)
     */
    private $lieuact;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Dteact", type="date", nullable=false)
     */
    private $dteact;

    /**
     * @var string
     *
     * @ORM\Column(name="HrAct", type="string", length=300, nullable=false)
     */
    private $hract;

    /**
     * @var string
     *
     * @ORM\Column(name="DescrAct", type="string", length=255, nullable=false)
     */
    private $descract;

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

    public function getLieuact(): ?string
    {
        return $this->lieuact;
    }

    public function setLieuact(string $lieuact): self
    {
        $this->lieuact = $lieuact;

        return $this;
    }

    public function getDteact(): ?\DateTimeInterface
    {
        return $this->dteact;
    }

    public function setDteact(\DateTimeInterface $dteact): self
    {
        $this->dteact = $dteact;

        return $this;
    }

    public function getHract(): ?string
    {
        return $this->hract;
    }

    public function setHract(string $hract): self
    {
        $this->hract = $hract;

        return $this;
    }

    public function getDescract(): ?string
    {
        return $this->descract;
    }

    public function setDescract(string $descract): self
    {
        $this->descract = $descract;

        return $this;
    }


}
