<?php

namespace App\Entity;

use App\Repository\LodgingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LodgingRepository::class)
 */
class Lodging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hostel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $airbnb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $guesthouse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $other;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Hygiene;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $custumerbase;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $atmosphere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $convenience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Demonstration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $partnership;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hostbehavior;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coworkingspace;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHostel(): ?string
    {
        return $this->hostel;
    }

    public function setHostel(?string $hostel): self
    {
        $this->hostel = $hostel;

        return $this;
    }

    public function getAirbnb(): ?string
    {
        return $this->airbnb;
    }

    public function setAirbnb(?string $airbnb): self
    {
        $this->airbnb = $airbnb;

        return $this;
    }

    public function getGuesthouse(): ?string
    {
        return $this->guesthouse;
    }

    public function setGuesthouse(?string $guesthouse): self
    {
        $this->guesthouse = $guesthouse;

        return $this;
    }

    public function getOther(): ?string
    {
        return $this->other;
    }

    public function setOther(?string $other): self
    {
        $this->other = $other;

        return $this;
    }

    public function getHygiene(): ?string
    {
        return $this->Hygiene;
    }

    public function setHygiene(string $Hygiene): self
    {
        $this->Hygiene = $Hygiene;

        return $this;
    }

    public function getNoise(): ?string
    {
        return $this->noise;
    }

    public function setNoise(string $noise): self
    {
        $this->noise = $noise;

        return $this;
    }

    public function getCustumerbase(): ?string
    {
        return $this->custumerbase;
    }

    public function setCustumerbase(string $custumerbase): self
    {
        $this->custumerbase = $custumerbase;

        return $this;
    }

    public function getAtmosphere(): ?string
    {
        return $this->atmosphere;
    }

    public function setAtmosphere(string $atmosphere): self
    {
        $this->atmosphere = $atmosphere;

        return $this;
    }

    public function getConvenience(): ?string
    {
        return $this->convenience;
    }

    public function setConvenience(string $convenience): self
    {
        $this->convenience = $convenience;

        return $this;
    }

    public function getDemonstration(): ?string
    {
        return $this->Demonstration;
    }

    public function setDemonstration(string $Demonstration): self
    {
        $this->Demonstration = $Demonstration;

        return $this;
    }

    public function getPartnership(): ?string
    {
        return $this->partnership;
    }

    public function setPartnership(string $partnership): self
    {
        $this->partnership = $partnership;

        return $this;
    }

    public function getHostbehavior(): ?string
    {
        return $this->hostbehavior;
    }

    public function setHostbehavior(string $hostbehavior): self
    {
        $this->hostbehavior = $hostbehavior;

        return $this;
    }

    public function getCoworkingspace(): ?string
    {
        return $this->coworkingspace;
    }

    public function setCoworkingspace(string $coworkingspace): self
    {
        $this->coworkingspace = $coworkingspace;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
