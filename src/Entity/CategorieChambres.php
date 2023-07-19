<?php

namespace App\Entity;

use App\Repository\CategorieChambresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieChambresRepository::class)]
class CategorieChambres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCategorieChambre = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Chambres::class)]
    private Collection $chambres;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorieChambre(): ?string
    {
        return $this->nomCategorieChambre;
    }

    public function setNomCategorieChambre(string $nomCategorieChambre): static
    {
        $this->nomCategorieChambre = $nomCategorieChambre;

        return $this;
    }

    /**
     * @return Collection<int, Chambres>
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambres $chambre): static
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres->add($chambre);
            $chambre->setCategorie($this);
        }

        return $this;
    }

    public function removeChambre(Chambres $chambre): static
    {
        if ($this->chambres->removeElement($chambre)) {
            // set the owning side to null (unless already changed)
            if ($chambre->getCategorie() === $this) {
                $chambre->setCategorie(null);
            }
        }

        return $this;
    }
}
