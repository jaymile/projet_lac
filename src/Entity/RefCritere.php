<?php

namespace App\Entity;

use App\Repository\RefCritereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RefCritereRepository::class)
 */
class RefCritere
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
     * @ORM\Column(type="integer")
     */
    private $ponderation;

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

    public function getPonderation(): ?int
    {
        return $this->ponderation;
    }

    public function setPonderation(int $ponderation): self
    {
        $this->ponderation = $ponderation;

        return $this;
    }
}
