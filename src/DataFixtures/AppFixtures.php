<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Produit;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 20; $i++) { 
            $produit = new Produit(); 
            $produit->setImageDuProduit('Produit ' . $i); 
            $produit->setNomEtModèle('SN-' . str_pad($i, 10, '0', STR_PAD_LEFT)); 
            $produit->setPrix(mt_rand(1000, 50000) / 100);
            $produit->setBoutonAjouterAuPanier(true);
            
$manager->persist($produit);
        $manager->flush();
    }
}}