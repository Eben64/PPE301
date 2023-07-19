<?php

namespace App\Entity;


use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass()]
Abstract class EntityMere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $creer_le = null;


    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $creer_par = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    protected ?\DateTimeInterface $modifie_le = null;

    #[ORM\Column(length: 255)]
    protected ?string $modifie_par = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreerLe(): ?\DateTimeInterface
    {
        return $this->creer_le;
    }

    public function setCreerLe(\DateTimeInterface $creer_le): static
    {
        $this->creer_le = $creer_le;

        return $this;
    }

    public function getCreerPar(): ?string
    {
        return $this->creer_par;
    }

    public function setCreerPar(string $creer_par): static
    {
        $this->creer_par = $creer_par;

        return $this;
    }

    public function getModifieLe(): ?\DateTimeInterface
    {
        return $this->modifie_le;
    }

    public function setModifieLe(\DateTimeInterface $modifie_le): static
    {
        $this->modifie_le = $modifie_le;

        return $this;
    }

    public function getModifiePar(): ?string
    {
        return $this->modifie_par;
    }

    public function setModifiePar(string $modifie_par): static
    {
        $this->modifie_par = $modifie_par;

        return $this;
    }
}
