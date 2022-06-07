<?php

namespace App\Controller\Admin;

use App\Entity\Libro;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LibroCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Libro::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $imageFile = TextareaField::new('archivo_portada')->setFormType(VichImageType::class);
        $image = ImageField::new('portada')->setBasePath('uploads/files')->setUploadDir('public/uploads/files');
        $fields = [
            IdField::new('isbn'),
            TextField::new('titulo'),
            IntegerField::new('edicion'),
            IntegerField::new('paginas'),
            IntegerField::new('stock'),
            AssociationField::new('idAutor', 'Autor'),
            AssociationField::new('idTema', 'Tema'),
            AssociationField::new('idIdioma', 'Idioma'),
            TextEditorField::new('sinopsis')->onlyOnForms(),
            TextareaField::new('sinopsis')->renderAsHtml()->hideOnForm()
        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageFile;
        }
        $fields[] = DateTimeField::new('updatedAt');
        return $fields;
    }
}
