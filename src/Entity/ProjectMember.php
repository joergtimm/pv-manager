<?php

namespace App\Entity;

use App\Repository\ProjectMemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectMemberRepository::class)]
class ProjectMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'projectMembers')]
    private ?Project $projekt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $joinAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rolle = null;

    #[ORM\Column(nullable: true)]
    private ?int $position = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private array $rights = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $last_action = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjekt(): ?Project
    {
        return $this->projekt;
    }

    public function setProjekt(?Project $projekt): self
    {
        $this->projekt = $projekt;

        return $this;
    }

    public function getJoinAt(): ?\DateTimeImmutable
    {
        return $this->joinAt;
    }

    public function setJoinAt(?\DateTimeImmutable $joinAt): self
    {
        $this->joinAt = $joinAt;

        return $this;
    }

    public function getRolle(): ?string
    {
        return $this->rolle;
    }

    public function setRolle(?string $rolle): self
    {
        $this->rolle = $rolle;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRights(): array
    {
        return $this->rights;
    }

    public function setRights(?array $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getLastAction(): ?\DateTimeInterface
    {
        return $this->last_action;
    }

    public function setLastAction(?\DateTimeInterface $last_action): self
    {
        $this->last_action = $last_action;

        return $this;
    }
}
