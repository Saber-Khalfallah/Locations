<?php
namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'Location')]
#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Locataire::class)]
    #[ORM\JoinColumn(name: 'IdLoc', referencedColumnName: 'id_loc', nullable: true, onDelete: 'CASCADE')]
    private ?Locataire $IdLoc = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Appartement::class)]
    #[ORM\JoinColumn(name: 'NumApp', referencedColumnName: 'num_app', nullable: true, onDelete: 'CASCADE')]
    private ?Appartement $NumApp = null;

    #[ORM\Id]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DatLoc = null;

    #[ORM\Column]
    private ?int $NbrMois = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Montant = null;

    public function getIdLoc(): ?Locataire
    {
        return $this->IdLoc;
    }

    public function setIdLoc(?Locataire $IdLoc): static
    {
        $this->IdLoc = $IdLoc;
        return $this;
    }

    public function getNumApp(): ?Appartement
    {
        return $this->NumApp;
    }

    public function setNumApp(?Appartement $NumApp): static
    {
        $this->NumApp = $NumApp;
        return $this;
    }

    public function getDatLoc(): ?\DateTimeInterface
{
    return $this->DatLoc;
}

    public function setDatLoc(\DateTimeInterface $DatLoc): static
    {
        $this->DatLoc = $DatLoc;
        return $this;
    }

    public function getNbrMois(): ?int
    {
        return $this->NbrMois;
    }

    public function setNbrMois(int $NbrMois): static
    {
        $this->NbrMois = $NbrMois;
        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant): static
    {
        $this->Montant = $Montant;
        return $this;
    }
}