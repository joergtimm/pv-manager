<?php

namespace App\Entity;

use App\Repository\IconsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IconsRepository::class)]
class Icons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pre_class = null;

    #[ORM\OneToMany(mappedBy: 'icon', targetEntity: IconList::class)]
    private Collection $iconLists;

    public function __construct()
    {
        $this->iconLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPreClass(): ?string
    {
        return $this->pre_class;
    }

    public function setPreClass(?string $pre_class): self
    {
        $this->pre_class = $pre_class;

        return $this;
    }

    /**
     * @return Collection<int, IconList>
     */
    public function getIconLists(): Collection
    {
        return $this->iconLists;
    }

    public function addIconList(IconList $iconList): self
    {
        if (!$this->iconLists->contains($iconList)) {
            $this->iconLists->add($iconList);
            $iconList->setIcon($this);
        }

        return $this;
    }

    public function removeIconList(IconList $iconList): self
    {
        if ($this->iconLists->removeElement($iconList)) {
            // set the owning side to null (unless already changed)
            if ($iconList->getIcon() === $this) {
                $iconList->setIcon(null);
            }
        }

        return $this;
    }

}
