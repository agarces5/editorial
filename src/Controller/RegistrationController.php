<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UsuarioType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function index(Request $request, EntityManagerInterface $entityManager,)
    {
        $usuario = new Usuario();
        
        $form = $this->createForm(UsuarioType::class, $usuario);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            dump($usuario);
            $usuario->setPassword($this->passwordEncoder->hashPassword($usuario, $usuario->getPassword()));
            
            // Set their role - ya lo hacemos en constructor
            // $usuario->setRoles(['ROLE_USER']);
            
            // Save
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
