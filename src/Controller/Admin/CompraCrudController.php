<?php

namespace App\Controller\Admin;

use App\Entity\Compra;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class CompraCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compra::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('fechaCompra'),
            IntegerField::new('cantidad'),
            TextField::new('direccionEnvio'),
            AssociationField::new('isbn'),
            AssociationField::new('uuid')
        ];
    }
}
