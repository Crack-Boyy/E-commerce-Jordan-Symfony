<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StreetwearController extends AbstractController
{
    #[Route('/streetwear', name: 'app_streetwear')]
    public function index(): Response
    {
        return $this->render('streetwear/streetwear.html.twig', [
            'controller_name' => 'StreetwearController',
        ]);
    }
}