<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColeccionesController extends AbstractController
{
    #[Route('/colecciones', name: 'app_colecciones')]
    public function index(): Response
    {
        return $this->render('colecciones/index.html.twig', [
            'controller_name' => 'ColeccionesController',
        ]);
    }
}
