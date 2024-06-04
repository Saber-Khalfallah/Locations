<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Table('appartement')]
#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(nullable: true)]
    private ?int $NumApp = null;
    #[ORM\ManyToOne(targetEntity:Proprietaire::class)]
    #[ORM\JoinColumn(name:'IdProp',referencedColumnName:'id_prop',nullable:true,onDelete:'CASCADE')]
    private ?Proprietaire $IdProp = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $localite = null;

    #[ORM\Column(nullable: true)]
    private ?int $NbrPiéces = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $Valeur = null;

    public function getNumApp(): ?int
    {
        return $this->NumApp;
    }
    public function setNumApp(?int $NumApp): static
    {
        $this->NumApp = $NumApp;

        return $this;
    }

    public function getIdProp(): ?int
    {
        return $this->IdProp;
    }

    public function setIdProp(?int $IdProp): static
    {
        $this->IdProp = $IdProp;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(?string $localite): static
    {
        $this->localite = $localite;

        return $this;
    }

    public function getNbrPiéces(): ?int
    {
        return $this->NbrPiéces;
    }

    public function setNbrPiéces(?int $NbrPiéces): static
    {
        $this->NbrPiéces = $NbrPiéces;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->Valeur;
    }

    public function setValeur(?string $Valeur): static
    {
        $this->Valeur = $Valeur;

        return $this;
    }
}
