<?php

namespace App\Entity;

use App\Repository\EinnahmenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EinnahmenRepository::class)]
class Einnahmen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'einnahmens')]
    private ?Wirtschaftlichkeiten $wirtschaftlichkeit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bezeichnung = null;

    #[ORM\Column(nullable: true)]
    private ?int $intervall = null;

    #[ORM\Column(nullable: true)]
    private ?int $beginn_jahr = null;

    #[ORM\Column(nullable: true)]
    private ?int $end_jahr = null;

    #[ORM\Column(nullable: true)]
    private ?int $beginn_monat = null;

    #[ORM\Column(nullable: true)]
    private ?int $end_monat = null;

    #[ORM\Column(nullable: true)]
    private ?float $linesare_aenderung_je_intervall = null;

    #[ORM\Column(nullable: true)]
    private ?int $position = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWirtschaftlichkeit(): ?Wirtschaftlichkeiten
    {
        return $this->wirtschaftlichkeit;
    }

    public function setWirtschaftlichkeit(?Wirtschaftlichkeiten $wirtschaftlichkeit): self
    {
        $this->wirtschaftlichkeit = $wirtschaftlichkeit;

        return $this;
    }

    public function getBezeichnung(): ?string
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung(?string $bezeichnung): self
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getIntervall(): ?int
    {
        return $this->intervall;
    }

    public function setIntervall(?int $intervall): self
    {
        $this->intervall = $intervall;

        return $this;
    }

    public function getBeginnJahr(): ?int
    {
        return $this->beginn_jahr;
    }

    public function setBeginnJahr(?int $beginn_jahr): self
    {
        $this->beginn_jahr = $beginn_jahr;

        return $this;
    }

    public function getEndJahr(): ?int
    {
        return $this->end_jahr;
    }

    public function setEndJahr(?int $end_jahr): self
    {
        $this->end_jahr = $end_jahr;

        return $this;
    }

    public function getBeginnMonat(): ?int
    {
        return $this->beginn_monat;
    }

    public function setBeginnMonat(?int $beginn_monat): self
    {
        $this->beginn_monat = $beginn_monat;

        return $this;
    }

    public function getEndMonat(): ?int
    {
        return $this->end_monat;
    }

    public function setEndMonat(?int $end_monat): self
    {
        $this->end_monat = $end_monat;

        return $this;
    }

    public function getLinesareAenderungJeIntervall(): ?float
    {
        return $this->linesare_aenderung_je_intervall;
    }

    public function setLinesareAenderungJeIntervall(?float $linesare_aenderung_je_intervall): self
    {
        $this->linesare_aenderung_je_intervall = $linesare_aenderung_je_intervall;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
