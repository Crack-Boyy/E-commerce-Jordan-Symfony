<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Entity\Sneakers;
use App\Entity\Streetwear;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(SneakersCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ECommerceJordan');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour sur le site', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Sneakers', 'fa-solid  fa-shoe-prints', Sneakers::class);
        yield MenuItem::linkToCrud(label:'Sreetwear', icon: 'fa-solid fa-shirt', entityFqcn: Streetwear::class);
    }}