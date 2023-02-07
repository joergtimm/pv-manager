<?php

namespace App\Entity;

use App\Repository\WirtschaftlichkeitenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WirtschaftlichkeitenRepository::class)]
class Wirtschaftlichkeiten
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'wirtschaftlichkeitens')]
    private ?Project $project = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $modulanzahl = null;

    #[ORM\Column(nullable: true)]
    private ?int $modulpreis_je = null;

    #[ORM\Column(nullable: true)]
    private ?int $wr_ep = null;

    #[ORM\Column(nullable: true)]
    private ?int $wr_anzahl = null;

    #[ORM\Column(nullable: true)]
    private ?int $gestell = null;

    #[ORM\Column(nullable: true)]
    private ?int $elektro = null;

    #[ORM\Column(nullable: true)]
    private ?int $sonstiges = null;

    #[ORM\Column(nullable: true)]
    private ?int $pacht_jahr = null;

    #[ORM\Column(nullable: true)]
    private ?int $pacht_gesamt = null;

    #[ORM\Column]
    private ?int $verguetung = null;

    #[ORM\Column(nullable: true)]
    private ?int $inflation = null;

    #[ORM\Column(nullable: true)]
    private ?int $strom_preis_steigerung = null;

    #[ORM\Column(nullable: true)]
    private ?int $ek = null;

    #[ORM\Column(nullable: true)]
    private ?int $fk = null;

    #[ORM\Column(nullable: true)]
    private ?int $zinssatz = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(?\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getModulanzahl(): ?int
    {
        return $this->modulanzahl;
    }

    public function setModulanzahl(?int $modulanzahl): self
    {
        $this->modulanzahl = $modulanzahl;

        return $this;
    }

    public function getModulpreisJe(): ?int
    {
        return $this->modulpreis_je;
    }

    public function setModulpreisJe(?int $modulpreis_je): self
    {
        $this->modulpreis_je = $modulpreis_je;

        return $this;
    }

    public function getWrEp(): ?int
    {
        return $this->wr_ep;
    }

    public function setWrEp(?int $wr_ep): self
    {
        $this->wr_ep = $wr_ep;

        return $this;
    }

    public function getWrAnzahl(): ?int
    {
        return $this->wr_anzahl;
    }

    public function setWrAnzahl(?int $wr_anzahl): self
    {
        $this->wr_anzahl = $wr_anzahl;

        return $this;
    }

    public function getGestell(): ?int
    {
        return $this->gestell;
    }

    public function setGestell(?int $gestell): self
    {
        $this->gestell = $gestell;

        return $this;
    }

    public function getElektro(): ?int
    {
        return $this->elektro;
    }

    public function setElektro(?int $elektro): self
    {
        $this->elektro = $elektro;

        return $this;
    }

    public function getSonstiges(): ?int
    {
        return $this->sonstiges;
    }

    public function setSonstiges(?int $sonstiges): self
    {
        $this->sonstiges = $sonstiges;

        return $this;
    }

    public function getPachtJahr(): ?int
    {
        return $this->pacht_jahr;
    }

    public function setPachtJahr(?int $pacht_jahr): self
    {
        $this->pacht_jahr = $pacht_jahr;

        return $this;
    }

    public function getPachtGesamt(): ?int
    {
        return $this->pacht_gesamt;
    }

    public function setPachtGesamt(?int $pacht_gesamt): self
    {
        $this->pacht_gesamt = $pacht_gesamt;

        return $this;
    }

    public function getVerguetung(): ?int
    {
        return $this->verguetung;
    }

    public function setVerguetung(int $verguetung): self
    {
        $this->verguetung = $verguetung;

        return $this;
    }

    public function getInflation(): ?int
    {
        return $this->inflation;
    }

    public function setInflation(?int $inflation): self
    {
        $this->inflation = $inflation;

        return $this;
    }

    public function getStromPreisSteigerung(): ?int
    {
        return $this->strom_preis_steigerung;
    }

    public function setStromPreisSteigerung(?int $strom_preis_steigerung): self
    {
        $this->strom_preis_steigerung = $strom_preis_steigerung;

        return $this;
    }

    public function getEk(): ?int
    {
        return $this->ek;
    }

    public function setEk(?int $ek): self
    {
        $this->ek = $ek;

        return $this;
    }

    public function getFk(): ?int
    {
        return $this->fk;
    }

    public function setFk(?int $fk): self
    {
        $this->fk = $fk;

        return $this;
    }

    public function getZinssatz(): ?int
    {
        return $this->zinssatz;
    }

    public function setZinssatz(?int $zinssatz): self
    {
        $this->zinssatz = $zinssatz;

        return $this;
    }
}
