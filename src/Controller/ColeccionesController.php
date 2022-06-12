<?php

namespace App\Controller;

use App\Entity\Libro;
use App\Entity\Tema;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColeccionesController extends AbstractController
{
    #[Route('/colecciones', name: 'app_colecciones')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $tema=$request->query->get('tema');
        $id_tema = $entityManager
        ->getRepository(Tema::class)
        ->findBy(array('nombre' => $tema))[0]
        ->getIdTema();
        
        $libros = $entityManager
        ->getRepository(Libro::class)
        ->findBy(
            array('idTema' => $id_tema),
            array('updatedAt' => 'DESC'),
            4
        );
        return $this->render('colecciones/index.html.twig', [
            'libros' => $libros,
        ]);
    }
}
