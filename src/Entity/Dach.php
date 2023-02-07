<?php

namespace App\Entity;

use App\Repository\DachRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DachRepository::class)]
class Dach
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $laenge1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $laenge2 = null;

    #[ORM\Column]
    private ?int $laenge3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $yes = null;

    #[ORM\Column(nullable: true)]
    private ?int $neigung = null;

    #[ORM\Column(nullable: true)]
    private ?int $azemut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eindeckung = null;

    #[ORM\Column(nullable: true)]
    private ?int $baujahr = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $besonderheiten = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\ManyToOne(inversedBy: 'daches')]
    private ?Project $project = null;

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

    public function getLaenge1(): ?int
    {
        return $this->laenge1;
    }

    public function setLaenge1(?int $laenge1): self
    {
        $this->laenge1 = $laenge1;

        return $this;
    }

    public function getLaenge2(): ?int
    {
        return $this->laenge2;
    }

    public function setLaenge2(?int $laenge2): self
    {
        $this->laenge2 = $laenge2;

        return $this;
    }

    public function getLaenge3(): ?int
    {
        return $this->laenge3;
    }

    public function setLaenge3(int $laenge3): self
    {
        $this->laenge3 = $laenge3;

        return $this;
    }

    public function getYes(): ?int
    {
        return $this->yes;
    }

    public function setYes(?int $yes): self
    {
        $this->yes = $yes;

        return $this;
    }

    public function getNeigung(): ?int
    {
        return $this->neigung;
    }

    public function setNeigung(?int $neigung): self
    {
        $this->neigung = $neigung;

        return $this;
    }

    public function getAzemut(): ?int
    {
        return $this->azemut;
    }

    public function setAzemut(?int $azemut): self
    {
        $this->azemut = $azemut;

        return $this;
    }

    public function getEindeckung(): ?string
    {
        return $this->eindeckung;
    }

    public function setEindeckung(?string $eindeckung): self
    {
        $this->eindeckung = $eindeckung;

        return $this;
    }

    public function getBaujahr(): ?int
    {
        return $this->baujahr;
    }

    public function setBaujahr(?int $baujahr): self
    {
        $this->baujahr = $baujahr;

        return $this;
    }

    public function getBesonderheiten(): ?string
    {
        return $this->besonderheiten;
    }

    public function setBesonderheiten(?string $besonderheiten): self
    {
        $this->besonderheiten = $besonderheiten;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
