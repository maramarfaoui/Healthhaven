<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", uniqueConstraints={@ORM\UniqueConstraint(name="uc_Réference", columns={"Réference"}), @ORM\UniqueConstraint(name="uc_Reference", columns={"Réference"})})
 * @ORM\Entity
 */
class Test
{
    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="Réference", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $réference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DteTest", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dtetest = 'CURRENT_TIMESTAMP';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Résultat", type="string", length=255, nullable=true)
     */
    private $résultat;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRéference(): ?string
    {
        return $this->réference;
    }

    public function getDtetest(): ?\DateTimeInterface
    {
        return $this->dtetest;
    }

    public function setDtetest(\DateTimeInterface $dtetest): self
    {
        $this->dtetest = $dtetest;

        return $this;
    }

    public function getRésultat(): ?string
    {
        return $this->résultat;
    }

    public function setRésultat(?string $résultat): self
    {
        $this->résultat = $résultat;

        return $this;
    }


}
