<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Entity\Libro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/autores')]
class AutoresController extends AbstractController
{
    #[Route('/', name: 'app_autores', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $autores = $entityManager
        ->getRepository(Autor::class)
        ->findAll();
        
        return $this->render('autores/index.html.twig', [
            'autores' => $autores,
        ]);
    }

    #[Route('/{idAutor}', name: 'app_autores_libros')]
    public function libroAutor(EntityManagerInterface $entityManager, Request $request): Response
    {
        $id_autor=$request->attributes->get('idAutor');
        $libros = $entityManager
        ->getRepository(Libro::class)
        ->findBy(
            array('idAutor' => $id_autor)
        );
        return $this->render('colecciones/index.html.twig', [
            'libros' => $libros,
        ]);
    }
}
