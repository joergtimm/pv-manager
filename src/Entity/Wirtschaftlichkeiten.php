<?php

namespace App\Entity;

use App\Repository\WirtschaftlichkeitenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column]
    private ?int $gesamt_leistung = null;

    #[ORM\Column]
    private ?int $strom_kwh_kwp = null;

    #[ORM\Column]
    private ?int $gesamt_netto = null;

    #[ORM\Column]
    private ?int $kwp_netto = null;

    #[ORM\Column(nullable: true)]
    private ?int $inbetriebnahme_jahr = null;

    #[ORM\Column(nullable: true)]
    private ?int $inbetriebnahme_monat = null;

    #[ORM\Column(nullable: true)]
    private ?int $kwh_einspeisung = null;

    #[ORM\Column(nullable: true)]
    private ?int $einspeiseverguetung = null;

    #[ORM\OneToMany(mappedBy: 'wirtschaftlichkeit', targetEntity: Einnahmen::class)]
    private Collection $einnahmens;

    #[ORM\OneToMany(mappedBy: 'wirtschaftlichkeit', targetEntity: Kosten::class)]
    private Collection $kostens;

    #[ORM\OneToMany(mappedBy: 'wirtschaftlichkeit', targetEntity: Fremdkapital::class)]
    private Collection $fremdkapitals;

    public function __construct()
    {
        $this->einnahmens = new ArrayCollection();
        $this->kostens = new ArrayCollection();
        $this->fremdkapitals = new ArrayCollection();
    }

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

    public function getGesamtLeistung(): ?int
    {
        return $this->gesamt_leistung;
    }

    public function setGesamtLeistung(int $gesamt_leistung): self
    {
        $this->gesamt_leistung = $gesamt_leistung;

        return $this;
    }

    public function getStromKwhKwp(): ?int
    {
        return $this->strom_kwh_kwp;
    }

    public function setStromKwhKwp(int $strom_kwh_kwp): self
    {
        $this->strom_kwh_kwp = $strom_kwh_kwp;

        return $this;
    }

    public function getGesamtNetto(): ?int
    {
        return $this->gesamt_netto;
    }

    public function setGesamtNetto(int $gesamt_netto): self
    {
        $this->gesamt_netto = $gesamt_netto;

        return $this;
    }

    public function getKwpNetto(): ?int
    {
        return $this->kwp_netto;
    }

    public function setKwpNetto(int $kwp_netto): self
    {
        $this->kwp_netto = $kwp_netto;

        return $this;
    }

    public function getInbetriebnahmeJahr(): ?int
    {
        return $this->inbetriebnahme_jahr;
    }

    public function setInbetriebnahmeJahr(?int $inbetriebnahme_jahr): self
    {
        $this->inbetriebnahme_jahr = $inbetriebnahme_jahr;

        return $this;
    }

    public function getInbetriebnahmeMonat(): ?int
    {
        return $this->inbetriebnahme_monat;
    }

    public function setInbetriebnahmeMonat(?int $inbetriebnahme_monat): self
    {
        $this->inbetriebnahme_monat = $inbetriebnahme_monat;

        return $this;
    }

    public function getKwhEinspeisung(): ?int
    {
        return $this->kwh_einspeisung;
    }

    public function setKwhEinspeisung(?int $kwh_einspeisung): self
    {
        $this->kwh_einspeisung = $kwh_einspeisung;

        return $this;
    }

    public function getEinspeiseverguetung(): ?int
    {
        return $this->einspeiseverguetung;
    }

    public function setEinspeiseverguetung(?int $einspeiseverguetung): self
    {
        $this->einspeiseverguetung = $einspeiseverguetung;

        return $this;
    }

    /**
     * @return Collection<int, Einnahmen>
     */
    public function getEinnahmens(): Collection
    {
        return $this->einnahmens;
    }

    public function addEinnahmen(Einnahmen $einnahmen): self
    {
        if (!$this->einnahmens->contains($einnahmen)) {
            $this->einnahmens->add($einnahmen);
            $einnahmen->setWirtschaftlichkeit($this);
        }

        return $this;
    }

    public function removeEinnahmen(Einnahmen $einnahmen): self
    {
        if ($this->einnahmens->removeElement($einnahmen)) {
            // set the owning side to null (unless already changed)
            if ($einnahmen->getWirtschaftlichkeit() === $this) {
                $einnahmen->setWirtschaftlichkeit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Kosten>
     */
    public function getKostens(): Collection
    {
        return $this->kostens;
    }

    public function addKosten(Kosten $kosten): self
    {
        if (!$this->kostens->contains($kosten)) {
            $this->kostens->add($kosten);
            $kosten->setWirtschaftlichkeit($this);
        }

        return $this;
    }

    public function removeKosten(Kosten $kosten): self
    {
        if ($this->kostens->removeElement($kosten)) {
            // set the owning side to null (unless already changed)
            if ($kosten->getWirtschaftlichkeit() === $this) {
                $kosten->setWirtschaftlichkeit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Fremdkapital>
     */
    public function getFremdkapitals(): Collection
    {
        return $this->fremdkapitals;
    }

    public function addFremdkapital(Fremdkapital $fremdkapital): self
    {
        if (!$this->fremdkapitals->contains($fremdkapital)) {
            $this->fremdkapitals->add($fremdkapital);
            $fremdkapital->setWirtschaftlichkeit($this);
        }

        return $this;
    }

    public function removeFremdkapital(Fremdkapital $fremdkapital): self
    {
        if ($this->fremdkapitals->removeElement($fremdkapital)) {
            // set the owning side to null (unless already changed)
            if ($fremdkapital->getWirtschaftlichkeit() === $this) {
                $fremdkapital->setWirtschaftlichkeit(null);
            }
        }

        return $this;
    }
}
