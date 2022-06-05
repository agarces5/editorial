<?php

namespace App\Controller\Admin;

use App\Entity\Tema;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TemaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tema::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
