<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dossierpatient
 *
 * @ORM\Table(name="dossierpatient")
 * @ORM\Entity
 */
class Dossierpatient
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="medicaments", type="string", length=255, nullable=true)
     */
    private $medicaments;

    /**
     * @var string|null
     *
     * @ORM\Column(name="consultations", type="string", length=255, nullable=true)
     */
    private $consultations;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phobies", type="string", length=255, nullable=true)
     */
    private $phobies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resultats", type="string", length=255, nullable=true)
     */
    private $resultats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMedicaments(): ?string
    {
        return $this->medicaments;
    }

    public function setMedicaments(?string $medicaments): self
    {
        $this->medicaments = $medicaments;

        return $this;
    }

    public function getConsultations(): ?string
    {
        return $this->consultations;
    }

    public function setConsultations(?string $consultations): self
    {
        $this->consultations = $consultations;

        return $this;
    }

    public function getPhobies(): ?string
    {
        return $this->phobies;
    }

    public function setPhobies(?string $phobies): self
    {
        $this->phobies = $phobies;

        return $this;
    }

    public function getResultats(): ?string
    {
        return $this->resultats;
    }

    public function setResultats(?string $resultats): self
    {
        $this->resultats = $resultats;

        return $this;
    }


}
