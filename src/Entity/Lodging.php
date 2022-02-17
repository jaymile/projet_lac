<?php

namespace App\Entity;

use App\Repository\LodgingRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $selectlodging;

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

    /**
     * @ORM\OneToMany(targetEntity=CommentLodging::class, mappedBy="lodging")
     */
    private $commentLodgings;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lodgings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $created_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;


    public function __construct()
    {

        $this->commentLodgings = new ArrayCollection();
        $this->User = new ArrayCollection();
    }

    public function __toString()
    {

        $this->created_by->$this->getUser()->getFirstname();
        $this->created_by->$this->getUser()->getLastname();
        $this->LodgingRepository;
        return (string) $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|CommentLodging[]
     */
    public function getCommentLodgings(): Collection
    {
        return $this->commentLodgings;
    }

    public function addCommentLodging(CommentLodging $commentLodging): self
    {
        if (!$this->commentLodgings->contains($commentLodging)) {
            $this->commentLodgings[] = $commentLodging;
            $commentLodging->setLodging($this);
        }

        return $this;
    }

    public function removeCommentLodging(CommentLodging $commentLodging): self
    {
        if ($this->commentLodgings->removeElement($commentLodging)) {
            // set the owning side to null (unless already changed)
            if ($commentLodging->getLodging() === $this) {
                $commentLodging->setLodging(null);
            }
        }

        return $this;
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

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getSelectlodging(): ?string
    {
        return $this->selectlodging;
    }

    public function setSelectlodging(string $selectlodging): self
    {
        $this->selectlodging = $selectlodging;

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
}
