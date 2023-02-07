<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $kwp = null;

    #[ORM\Column]
    private ?int $einstrahlung = null;

    #[ORM\Column(nullable: true)]
    private ?float $lat = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $inbetriebnahme = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $beschreibung = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Wirtschaftlichkeiten::class)]
    private Collection $wirtschaftlichkeitens;

    #[ORM\Column(nullable: true)]
    private ?float $lon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $priority = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $deadline = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Dach::class)]
    private Collection $daches;

    public function __construct()
    {
        $this->wirtschaftlichkeitens = new ArrayCollection();
        $this->daches = new ArrayCollection();
    }

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

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getKwp(): ?int
    {
        return $this->kwp;
    }

    public function setKwp(?int $kwp): self
    {
        $this->kwp = $kwp;

        return $this;
    }

    public function getEinstrahlung(): ?int
    {
        return $this->einstrahlung;
    }

    public function setEinstrahlung(int $einstrahlung): self
    {
        $this->einstrahlung = $einstrahlung;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getInbetriebnahme(): ?int
    {
        return $this->inbetriebnahme;
    }

    public function setInbetriebnahme(?int $inbetriebnahme): self
    {
        $this->inbetriebnahme = $inbetriebnahme;

        return $this;
    }

    public function getBeschreibung(): ?string
    {
        return $this->beschreibung;
    }

    public function setBeschreibung(?string $beschreibung): self
    {
        $this->beschreibung = $beschreibung;

        return $this;
    }

    /**
     * @return Collection<int, Wirtschaftlichkeiten>
     */
    public function getWirtschaftlichkeitens(): Collection
    {
        return $this->wirtschaftlichkeitens;
    }

    public function addWirtschaftlichkeiten(Wirtschaftlichkeiten $wirtschaftlichkeiten): self
    {
        if (!$this->wirtschaftlichkeitens->contains($wirtschaftlichkeiten)) {
            $this->wirtschaftlichkeitens->add($wirtschaftlichkeiten);
            $wirtschaftlichkeiten->setProject($this);
        }

        return $this;
    }

    public function removeWirtschaftlichkeiten(Wirtschaftlichkeiten $wirtschaftlichkeiten): self
    {
        if ($this->wirtschaftlichkeitens->removeElement($wirtschaftlichkeiten)) {
            // set the owning side to null (unless already changed)
            if ($wirtschaftlichkeiten->getProject() === $this) {
                $wirtschaftlichkeiten->setProject(null);
            }
        }

        return $this;
    }

    public function getLon(): ?float
    {
        return $this->lon;
    }

    public function setLon(?float $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getThumb(): ?string
    {
        return $this->thumb;
    }

    public function setThumb(?string $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(?string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    public function setDeadline(?\DateTimeInterface $deadline): self
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * @return Collection<int, Dach>
     */
    public function getDaches(): Collection
    {
        return $this->daches;
    }

    public function addDach(Dach $dach): self
    {
        if (!$this->daches->contains($dach)) {
            $this->daches->add($dach);
            $dach->setProject($this);
        }

        return $this;
    }

    public function removeDach(Dach $dach): self
    {
        if ($this->daches->removeElement($dach)) {
            // set the owning side to null (unless already changed)
            if ($dach->getProject() === $this) {
                $dach->setProject(null);
            }
        }

        return $this;
    }
}
