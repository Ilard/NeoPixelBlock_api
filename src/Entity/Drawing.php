<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DrawingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"drawing:read"}},
 *      denormalizationContext={"groups"={"drawing:write"}}
 * )
 * @ORM\Entity(repositoryClass=DrawingRepository::class)
 */
class Drawing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups("drawing:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"drawing:read", "drawing:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups("drawing:read")
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     * @Groups({"drawing:read", "drawing:write"})
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"drawing:read", "drawing:write"})
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups("drawing:read")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups("drawing:read")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups("drawing:read")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     *
     * @Groups("drawing:read")
     */
    private $createdAt;

    public function __construct()
    {
        $this->isPublished = false;
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
