<?php

namespace App\Controller\Admin;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class UsuarioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usuario::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nickname'),
            TextField::new('nombre'),
            TextField::new('direccion'),
            TelephoneField::new('telefono'),
            EmailField::new('email'),
            TextField::new('password')->hideonIndex()
        ];
    }
}
