<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
#[ApiResource (formats: ['json'],normalizationContext: ['groups' => ['employe']],
    denormalizationContext: ['groups' => ['employe']],
    //,normalizationContext: ['groups' => ['Employe']]
)]
class Employe
{
    #[Groups(['employe'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['employe','read','write'])]
    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[Groups(['employe','read','write'])]
    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[Groups(['employe','read','write'])]
    #[ORM\Column(length: 100)]
    private ?string $adresse = null;

    #[Groups(['employe'])]
    #[ORM\Column]
    private ?int $numcompte = null;

    #[Groups(['employe'])]
    #[ORM\Column(length: 20)]
    private ?string $grade = null;

    #[Groups(['employe'])]
    #[ORM\Column(length: 50)]
    private ?string $suph = null;

  //  #[Groups(['employe','read','write'])]
    #[ORM\OneToMany(mappedBy: 'idemploye', targetEntity: Tache::class, orphanRemoval: true)]
    private Collection $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumcompte(): ?int
    {
        return $this->numcompte;
    }

    public function setNumcompte(int $numcompte): self
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getSuph(): ?string
    {
        return $this->suph;
    }

    public function setSuph(string $suph): self
    {
        $this->suph = $suph;

        return $this;
    }

    /**
     * @return Collection<int, Tache>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Tache $tach): self
    {
        if (!$this->taches->contains($tach)) {
            $this->taches->add($tach);
            $tach->setIdemploye($this);
        }

        return $this;
    }

    public function removeTach(Tache $tach): self
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getIdemploye() === $this) {
                $tach->setIdemploye(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom.' '.$this->prenom;
    }
}
