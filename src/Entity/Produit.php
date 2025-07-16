<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sneakers $sneakers = null;

    /**
     * @var Collection<int, Streetwear>
     */
    #[ORM\OneToMany(targetEntity: Streetwear::class, mappedBy: 'produit')]
    private Collection $streetwears;

    public function __construct()
    {
        $this->streetwears = new ArrayCollection();
    }

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

    public function getSneakers(): ?Sneakers
    {
        return $this->sneakers;
    }

    public function setSneakers(?Sneakers $sneakers): static
    {
        $this->sneakers = $sneakers;

        return $this;
    }

    /**
     * @return Collection<int, Streetwear>
     */
    public function getStreetwears(): Collection
    {
        return $this->streetwears;
    }

    public function addStreetwear(Streetwear $streetwear): static
    {
        if (!$this->streetwears->contains($streetwear)) {
            $this->streetwears->add($streetwear);
            $streetwear->setProduit($this);
        }

        return $this;
    }

    public function removeStreetwear(Streetwear $streetwear): static
    {
        if ($this->streetwears->removeElement($streetwear)) {
            
            if ($streetwear->getProduit() === $this) {
                $streetwear->setProduit(null);
            }
        }

        return $this;
    }
}