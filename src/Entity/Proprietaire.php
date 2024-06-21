<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table('Proprietaire')]
#[ORM\Entity(repositoryClass: ProprietaireRepository::class)]
class Proprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:'integer')]
    private ?int $IdProp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prénom = null;


    public function getIdProp(): ?int
    {
        return $this->IdProp;
    }

    public function setIdProp(?int $IdProp): static
    {
        $this->IdProp = $IdProp;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prénom;
    }

    public function setPrenom(?string $Prénom): static
    {
        $this->Prénom = $Prénom;

        return $this;
    }
    public function __toString()
    {
        // Return a string that represents the Locataire object.
        // For example, if Locataire has a 'name' property, you might return it.
        return $this->getIdProp() ;// Adjust according to your entity's properties
    }
}
