<?php

namespace App\Controller;

use App\Entity\Sneakers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Criteria;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


final class SneakersController extends AbstractController
{
    #[Route('/sneakers', name: 'app_sneakers')]
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator,
Request $request): Response
    {
$sneaker = $em->getRepository(Sneakers::class)->findAll();

$sneaker = $paginator->paginate(
 $sneaker,
 $request->query->getInt('page', 1),
 5
 );

        
        return $this->render('sneakers/sneakers.html.twig', [
            'controller_name' => 'SneakersController',

            'sneakers' => $sneaker,
        ]);
    }
}