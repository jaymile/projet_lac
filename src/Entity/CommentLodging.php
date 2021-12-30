<?php

namespace App\Entity;

use App\Repository\CommentLodgingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentLodgingRepository::class)
 */
class CommentLodging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="date")
     */
    private $publication_date;

    /**
     * @ORM\ManyToOne(targetEntity=Lodging::class, inversedBy="commentLodgings")
     */
    private $lodging;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="commentLodgings")
     */
    private $creted_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publication_date;
    }

    public function setPublicationDate(\DateTimeInterface $publication_date): self
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    public function getLodging(): ?Lodging
    {
        return $this->lodging;
    }

    public function setLodging(?Lodging $lodging): self
    {
        $this->lodging = $lodging;

        return $this;
    }

    public function getCretedBy(): ?user
    {
        return $this->creted_by;
    }

    public function setCretedBy(?user $creted_by): self
    {
        $this->creted_by = $creted_by;

        return $this;
    }
}
