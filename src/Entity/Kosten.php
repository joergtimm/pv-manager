<?php

namespace App\Entity;

use App\Repository\KostenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KostenRepository::class)]
class Kosten
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'kostens')]
    private ?Wirtschaftlichkeiten $wirtschaftlichkeit = null;

    #[ORM\Column(length: 255)]
    private ?string $bezeichnung = null;

    #[ORM\Column(nullable: true)]
    private ?int $betrag = null;

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
    private ?float $aenderung_je_intervall = null;

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

    public function getAenderungJeIntervall(): ?float
    {
        return $this->aenderung_je_intervall;
    }

    public function setAenderungJeIntervall(?float $aenderung_je_intervall): self
    {
        $this->aenderung_je_intervall = $aenderung_je_intervall;

        return $this;
    }
}
