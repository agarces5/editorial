<?php

namespace App\Controller\Admin;

use App\Entity\Idioma;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IdiomaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Idioma::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('iniciales'),
            TextField::new('idioma'),
        ];
    }
}
