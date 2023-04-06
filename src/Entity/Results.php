<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Results
 *
 * @ORM\Table(name="results", uniqueConstraints={@ORM\UniqueConstraint(name="unique_refTest", columns={"refTest"})})
 * @ORM\Entity
 */
class Results
{
    /**
     * @var int
     *
     * @ORM\Column(name="rslt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rsltId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rsltTest", type="string", length=255, nullable=true)
     */
    private $rslttest;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \Test
     *
     * @ORM\ManyToOne(targetEntity="Test")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="refTest", referencedColumnName="Réference")
     * })
     */
    private $reftest;

    public function getRsltId(): ?int
    {
        return $this->rsltId;
    }

    public function getRslttest(): ?string
    {
        return $this->rslttest;
    }

    public function setRslttest(?string $rslttest): self
    {
        $this->rslttest = $rslttest;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getReftest(): ?Test
    {
        return $this->reftest;
    }

    public function setReftest(?Test $reftest): self
    {
        $this->reftest = $reftest;

        return $this;
    }


}
