<?php

namespace App\Entity;

use App\Repository\ChambresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChambresRepository::class)]
class Chambres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroChambre = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $prixHoraire = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'chambres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Motel $motel = null;

    #[ORM\ManyToOne(inversedBy: 'chambres')]
    private ?CategorieChambres $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroChambre(): ?int
    {
        return $this->numeroChambre;
    }

    public function setNumeroChambre(int $numeroChambre): static
    {
        $this->numeroChambre = $numeroChambre;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrixHoraire(): ?int
    {
        return $this->prixHoraire;
    }

    public function setPrixHoraire(int $prixHoraire): static
    {
        $this->prixHoraire = $prixHoraire;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMotel(): ?Motel
    {
        return $this->motel;
    }

    public function setMotel(?Motel $motel): static
    {
        $this->motel = $motel;

        return $this;
    }

    public function getCategorie(): ?CategorieChambres
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieChambres $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
