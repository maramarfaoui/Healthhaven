<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicaments
 *
 * @ORM\Table(name="medicaments")
 * @ORM\Entity
 */
class Medicaments
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
     * @var string|null
     *
     * @ORM\Column(name="dci", type="string", length=255, nullable=true)
     */
    private $dci;

    /**
     * @var int|null
     *
     * @ORM\Column(name="disponibilite", type="integer", nullable=true)
     */
    private $disponibilite;

    /**
     * @var float|null
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=true)
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDci(): ?string
    {
        return $this->dci;
    }

    public function setDci(?string $dci): self
    {
        $this->dci = $dci;

        return $this;
    }

    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?int $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


}
