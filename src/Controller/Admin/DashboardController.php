<?php

namespace App\Controller\Admin;

use App\Entity\Autor;
use App\Entity\Compra;
use App\Entity\Idioma;
use App\Entity\Libro;
use App\Entity\Tema;
use App\Entity\Usuario;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(LibroCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Almeria Libros');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Autor', 'fas fa-list', Autor::class);
        yield MenuItem::linkToCrud('Compra', 'fas fa-list', Compra::class);
        yield MenuItem::linkToCrud('Idioma', 'fas fa-list', Idioma::class);
        yield MenuItem::linkToCrud('Libro', 'fas fa-list', Libro::class);
        yield MenuItem::linkToCrud('Tema', 'fas fa-list', Tema::class);
        yield MenuItem::linkToCrud('Usuario', 'fas fa-list', Usuario::class);
    }
    public function configureActions(): Actions
    {
        return parent::configureActions()
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action)
        {
            return $action->setIcon('fa fa-user')->addCssClass('btn btn-success');
        })
        ->update(Crud::PAGE_INDEX, Action::EDIT, function(Action $action)
        {
            return $action->setIcon('fa fa-edit')->addCssClass('btn btn-warning');
        })
        ->update(Crud::PAGE_INDEX, Action::DETAIL, function(Action $action)
        {
            return $action->setIcon('fa fa-eye')->addCssClass('btn btn-info');
        })
        ->update(Crud::PAGE_INDEX, Action::DELETE, function(Action $action)
        {
            return $action->setIcon('fa fa-trash')->addCssClass('btn btn-danger');
        });

    }
}
