<?php

namespace App\Controller\Admin;

use App\Entity\Autor;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AutorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Autor::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // return [
        //     TextField::new('nombre'),
        //     TextField::new('foto'),
        //     TextEditorField::new('descripcion'),
        // ];
        $imageFile = TextareaField::new('archivo_foto')->setFormType(VichImageType::class);
        $image = ImageField::new('foto')->setBasePath('uploads/fotos_autores')->setUploadDir('public/uploads/fotos_autores');
        $fields = [
            TextField::new('nombre'),
            TextEditorField::new('descripcion'),
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
