<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Validator\EmailInList;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private array $badEmails = [
        'test@test.com',
        'emmanuelle.boinot2023@campus-eni.fr',
        'julian.montagne2023@campus-eni.fr',
        'sandie.guerin2023@campus-eni.fr',
        'marion.pougnard2023@campus-eni.fr',
        'melissa.cochet2023@campus-eni.fr',
    ];

    private array $goodEmails = [
        'sebastien.bodin2022@campus-eni.fr',
        'gabin.brochard2023@campus-eni.fr',
        'ludovic.proux2023@campus-eni.fr',
        'lucas.soaresmoenner2023@campus-eni.fr',
        'hugo.cirette2023@campus-eni.fr',
        'nicolas.pinotcardona2023@campus-eni.fr',
        'romain.roland2023@campus-eni.fr',
        'william.lamothe2023@campus-eni.fr',
        'arthur.bouchaud2023@campus-eni.fr',
        'rick.bouyaghi2023@campus-eni.fr',
        'ylan.woelffle2023@campus-eni.fr',
        'mathis.deschamps2023@campus-eni.fr',
        'alexis.draud2023@campus-eni.fr',
        'theo.pohin2023@campus-eni.fr',
        'guillaume.tournan2023@campus-eni.fr',
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Le mail ne doit pas être vide')]
    #[ORM\Column(length: 180)]
    #[EmailInList]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    // #[Assert\NotBlank(message: 'Le mot de passe ne doit pas être vide')]
    #[ORM\Column]
    private ?string $password = null;

    #[Assert\NotBlank(message: 'Le nom ne doit pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[Assert\NotBlank(message: 'Le prénom ne doit pas être vide')]
    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Anniversaire $anniversaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        if (in_array($this->email, $this->badEmails, true)) {
            $roles[] = 'ROLE_BAD';
        }

        if (in_array($this->email, $this->goodEmails, true)) {
            $roles[] = 'ROLE_GOOD';
        }

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAnniversaire(): ?Anniversaire
    {
        return $this->anniversaire;
    }

    public function setAnniversaire(?Anniversaire $anniversaire): static
    {
        $this->anniversaire = $anniversaire;

        return $this;
    }
}
