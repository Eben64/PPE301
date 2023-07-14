<?php

namespace App\Entity;

use App\Repository\GerantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GerantRepository::class)]
class Gerant extends Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
