<?php

namespace App\Controller;

use App\Entity\Libro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NovedadesController extends AbstractController
{
    #[Route('/novedades', name: 'app_novedades')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $novedades = $entityManager
        ->getRepository(Libro::class)
        ->findBy(
            array(),
            array('updatedAt' => 'DESC'),
            4
        );
        
        return $this->render('novedades/index.html.twig', [
            'libros' => $novedades,
        ]);
    }
}
