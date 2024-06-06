<?php

namespace App\Entity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\AppartementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

#[Vich\Uploadable]
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
    private ?int $NbrPieces = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $Valeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;
   
    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $createdAt = null;
    
    #[Vich\UploadableField(mapping: 'appartementImage', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;
    
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

    public function getNbrPieces(): ?int
    {
        return $this->NbrPieces;
    }

    public function setNbrPieces(?int $NbrPieces): static
    {
        $this->NbrPieces = $NbrPieces;

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

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    public function getImageFile(): ?File
    {
	return $this->imageFile;
    }
    public function setImageFile(File $image = null)
    {
	$this->imageFile = $image;
	if ($image){
         	$this->updatedAt = new \DateTime('now');
         	}

}

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): static
    {
        $this->imageSize = $imageSize;

        return $this;
    }

}
