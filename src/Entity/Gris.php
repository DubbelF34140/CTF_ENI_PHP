<?php

namespace App\Entity;

use App\Repository\GrisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrisRepository::class)]
class Gris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $nuance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuance(): ?string
    {
        return $this->nuance;
    }

    public function setNuance(?string $nuance): static
    {
        $this->nuance = $nuance;

        return $this;
    }
}
