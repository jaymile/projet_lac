<?php

namespace App\Entity;

use App\Repository\UserLodgingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserLodgingRepository::class)
 */
class UserLodging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=user::class, mappedBy="userLodging")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Lodging::class, mappedBy="userLodging")
     */
    private $lodging;

    /**
     * @ORM\OneToOne(targetEntity=RefCritere::class, mappedBy="UserLodging", cascade={"persist", "remove"})
     */
    private $critere_hygiene;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->lodging = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setUserLodging($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserLodging() === $this) {
                $user->setUserLodging(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lodging[]
     */
    public function getLodging(): Collection
    {
        return $this->lodging;
    }

    public function addLodging(Lodging $lodging): self
    {
        if (!$this->lodging->contains($lodging)) {
            $this->lodging[] = $lodging;
            $lodging->setUserLodging($this);
        }

        return $this;
    }

    public function removeLodging(Lodging $lodging): self
    {
        if ($this->lodging->removeElement($lodging)) {
            // set the owning side to null (unless already changed)
            if ($lodging->getUserLodging() === $this) {
                $lodging->setUserLodging(null);
            }
        }

        return $this;
    }

    public function getCritereHygiene(): ?RefCritere
    {
        return $this->critere_hygiene;
    }

    public function setCritereHygiene(?RefCritere $critere_hygiene): self
    {
        // unset the owning side of the relation if necessary
        if ($critere_hygiene === null && $this->critere_hygiene !== null) {
            $this->critere_hygiene->setUserLodging(null);
        }

        // set the owning side of the relation if necessary
        //if ($critere_hygiene !== null && $critere_hygiene->getUserLodging() !== $this) {
        //   $critere_hygiene->setUserLodging($this);
        // }

        $this->critere_hygiene = $critere_hygiene;

        return $this;
    }
}
