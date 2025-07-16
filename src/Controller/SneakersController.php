<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SneakersController extends AbstractController
{
    #[Route('/sneakers', name: 'app_sneakers')]
    public function index(): Response
    {
        return $this->render('sneakers/sneakers.html.twig', [
            'controller_name' => 'SneakersController',
        ]);
    }
}