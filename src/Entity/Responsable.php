<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable extends Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'responsable', targetEntity: Motel::class)]
    private Collection $motel;

    public function __construct()
    {
        $this->motel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Motel>
     */
    public function getMotel(): Collection
    {
        return $this->motel;
    }

    public function addMotel(Motel $motel): static
    {
        if (!$this->motel->contains($motel)) {
            $this->motel->add($motel);
            $motel->setResponsable($this);
        }

        return $this;
    }

    public function removeMotel(Motel $motel): static
    {
        if ($this->motel->removeElement($motel)) {
            // set the owning side to null (unless already changed)
            if ($motel->getResponsable() === $this) {
                $motel->setResponsable(null);
            }
        }

        return $this;
    }
}
