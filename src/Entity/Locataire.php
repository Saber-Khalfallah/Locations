<?php

namespace App\Entity;

use App\Repository\LocataireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'locataire')]
#[ORM\Entity(repositoryClass: LocataireRepository::class)]
class Locataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $IdLoc = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    

    public function getIdLoc(): ?string
    {
        return $this->IdLoc;
    }

    public function setIdLoc(string $IdLoc): static
    {
        $this->IdLoc = $IdLoc;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }
    public function __toString()
    {
        // Return a string that represents the Locataire object.
        // For example, if Locataire has a 'name' property, you might return it.
        return $this->getIdLoc() ;// Adjust according to your entity's properties
    }
}
