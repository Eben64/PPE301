<?php

namespace App\Entity;

use App\Repository\CategorieChambresRepository;
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
}
