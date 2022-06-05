<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NovedadesController extends AbstractController
{
    #[Route('/novedades', name: 'app_novedades')]
    public function index(): Response
    {
        return $this->render('novedades/index.html.twig', [
            'controller_name' => 'NovedadesController',
        ]);
    }
}
