<?php

namespace App\Entity;

use App\Repository\VaporiserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaporiserRepository::class)]
class Vaporiser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private ?string $email = null;

    // Getter for id
    public function getId(): ?int
    {
        return $this->id;
    }

    // Setter for id
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    // Getter for email
    public function getEmail(): ?string
    {
        return $this->email;
    }

    // Setter for email
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
