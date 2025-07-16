<?php

namespace App\DataFixtures;

use App\Entity\Sneakers;
use App\Entity\Streetwear;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sneakers = [];
        for ($i=0; $i <5 ; $i++) { 
            $sneaker = new Sneakers() ;
            $sneaker->setName("name");
            $sneaker->setColor("color");
            $sneaker->setSize("40");
            $manager->persist($sneaker);
            $sneakers[] = $sneaker;
        }

        $produits = [];
        for ($i=0; $i < 20; $i++) { 
            $produit = new Produit(); 
            $produit->setImageDuProduit('Produit ' . $i); 
            $produit->setNomEtModèle('SN-' . str_pad($i, 10, '0', STR_PAD_LEFT)); 
            $produit->setPrix(mt_rand(1000, 50000) / 100);
            $produit->setBoutonAjouterAuPanier(true);
            $produit->setSneakers($sneakers[$i % 5]);
            $manager->persist($produit);
            $produits[] = $produit;
        }

        for ($i=0; $i <5 ; $i++) { 
            $streetwear = new Streetwear() ;
            $streetwear->setName("name");
            $streetwear->setColor("color");
            $streetwear->setSize("40");
            $manager->persist($streetwear);
            $streetwear->setProduit($produits[$i % 20]);    
            }
        
        $manager->flush();
}}