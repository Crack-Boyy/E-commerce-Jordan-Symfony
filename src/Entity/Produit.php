<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imageDuProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEtModèle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?bool $boutonAjouterAuPanier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageDuProduit(): ?string
    {
        return $this->imageDuProduit;
    }

    public function setImageDuProduit(string $imageDuProduit): static
    {
        $this->imageDuProduit = $imageDuProduit;

        return $this;
    }

    public function getNomEtModèle(): ?string
    {
        return $this->nomEtModèle;
    }

    public function setNomEtModèle(string $nomEtModèle): static
    {
        $this->nomEtModèle = $nomEtModèle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isBoutonAjouterAuPanier(): ?bool
    {
        return $this->boutonAjouterAuPanier;
    }

    public function setBoutonAjouterAuPanier(bool $boutonAjouterAuPanier): static
    {
        $this->boutonAjouterAuPanier = $boutonAjouterAuPanier;

        return $this;
    }
}
