<?php

namespace App\Entity;

use App\Repository\ChoixRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoixRepository::class)]
class Choix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Multiple::class, mappedBy: 'choix')]
    private Collection $multiples;

    public function __construct()
    {
        $this->multiples = new ArrayCollection();
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

    /**
     * @return Collection<int, Multiple>
     */
    public function getMultiples(): Collection
    {
        return $this->multiples;
    }

    public function addMultiple(Multiple $multiple): self
    {
        if (!$this->multiples->contains($multiple)) {
            $this->multiples->add($multiple);
            $multiple->addChoix($this);
        }

        return $this;
    }

    public function removeMultiple(Multiple $multiple): self
    {
        if ($this->multiples->removeElement($multiple)) {
            $multiple->removeChoix($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}