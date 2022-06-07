<?php

namespace App\Controller\Admin;

use App\Entity\Tema;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TemaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tema::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre'),
        ];
    }
}
