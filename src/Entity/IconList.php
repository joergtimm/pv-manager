<?php

namespace App\Entity;

use App\Repository\IconListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IconListRepository::class)]
class IconList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $class = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $glyph = null;

    #[ORM\ManyToOne(inversedBy: 'iconLists')]
    private ?Icons $icon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getGlyph(): ?string
    {
        return $this->glyph;
    }

    public function setGlyph(?string $glyph): self
    {
        $this->glyph = $glyph;

        return $this;
    }

    public function getIcon(): ?Icons
    {
        return $this->icon;
    }

    public function setIcon(?Icons $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

}
