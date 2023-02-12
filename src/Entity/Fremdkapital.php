<?php

namespace App\Entity;

use App\Repository\FremdkapitalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FremdkapitalRepository::class)]
class Fremdkapital
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'fremdkapitals')]
    private ?Wirtschaftlichkeiten $wirtschaftlichkeit = null;

    #[ORM\Column(length: 255)]
    private ?string $bezeichnung = null;

    #[ORM\Column(nullable: true)]
    private ?int $betrag = null;

    #[ORM\Column(nullable: true)]
    private ?int $tilgung_beginn_jahr = null;

    #[ORM\Column(nullable: true)]
    private ?int $tilgung_beginn_monat = null;

    #[ORM\Column(nullable: true)]
    private ?int $laufzeit_monate = null;

    #[ORM\Column(nullable: true)]
    private ?float $zins = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $art = null;

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

    public function setBezeichnung(string $bezeichnung): self
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getBetrag(): ?int
    {
        return $this->betrag;
    }

    public function setBetrag(?int $betrag): self
    {
        $this->betrag = $betrag;

        return $this;
    }

    public function getTilgungBeginnJahr(): ?int
    {
        return $this->tilgung_beginn_jahr;
    }

    public function setTilgungBeginnJahr(?int $tilgung_beginn_jahr): self
    {
        $this->tilgung_beginn_jahr = $tilgung_beginn_jahr;

        return $this;
    }

    public function getTilgungBeginnMonat(): ?int
    {
        return $this->tilgung_beginn_monat;
    }

    public function setTilgungBeginnMonat(?int $tilgung_beginn_monat): self
    {
        $this->tilgung_beginn_monat = $tilgung_beginn_monat;

        return $this;
    }

    public function getLaufzeitMonate(): ?int
    {
        return $this->laufzeit_monate;
    }

    public function setLaufzeitMonate(?int $laufzeit_monate): self
    {
        $this->laufzeit_monate = $laufzeit_monate;

        return $this;
    }

    public function getZins(): ?float
    {
        return $this->zins;
    }

    public function setZins(?float $zins): self
    {
        $this->zins = $zins;

        return $this;
    }

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(?string $art): self
    {
        $this->art = $art;

        return $this;
    }
}
