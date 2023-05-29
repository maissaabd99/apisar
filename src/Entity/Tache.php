<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
#[ApiResource (formats: ['json'],
    //,normalizationContext: ['groups' => ['employe']],
//    denormalizationContext: ['groups' => ['employe']],
)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['employe'])]
    private ?int $id = null;

    //#[Groups('tache')]
    #[Groups(['employe','read','write'])]

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    //#[Groups('tache')]
    #[ORM\ManyToOne(inversedBy: 'taches')]
    //#[Groups(['employe','read','write'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $idemploye = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdemploye(): ?Employe
    {
        return $this->idemploye;
    }

    public function setIdemploye(?Employe $idemploye): self
    {
        $this->idemploye = $idemploye;

        return $this;
    }

    public function __toString(): string
    {
        return $this->description;
    }
}
