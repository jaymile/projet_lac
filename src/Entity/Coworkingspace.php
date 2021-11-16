<?php

namespace App\Entity;

use App\Repository\CoworkingspaceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoworkingspaceRepository::class)
 */
class Coworkingspace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $internet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desk;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Security;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Atmosphere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Hostbehavior;

    /**
     * @ORM\Column(type="text")
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getInternet(): ?string
    {
        return $this->internet;
    }

    public function setInternet(string $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

    public function getDesk(): ?string
    {
        return $this->desk;
    }

    public function setDesk(string $desk): self
    {
        $this->desk = $desk;

        return $this;
    }

    public function getSecurity(): ?string
    {
        return $this->Security;
    }

    public function setSecurity(string $Security): self
    {
        $this->Security = $Security;

        return $this;
    }

    public function getRule(): ?string
    {
        return $this->rule;
    }

    public function setRule(string $rule): self
    {
        $this->rule = $rule;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAtmosphere(): ?string
    {
        return $this->Atmosphere;
    }

    public function setAtmosphere(string $Atmosphere): self
    {
        $this->Atmosphere = $Atmosphere;

        return $this;
    }

    public function getHostbehavior(): ?string
    {
        return $this->Hostbehavior;
    }

    public function setHostbehavior(string $Hostbehavior): self
    {
        $this->Hostbehavior = $Hostbehavior;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
