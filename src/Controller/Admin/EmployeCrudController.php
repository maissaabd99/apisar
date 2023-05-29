<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Collection;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideWhenCreating(),
            TextField::new('prenom'),
            TextField::new('nom'),
            IntegerField::new('numcompte'),
            TextField::new('adresse'),
            TextField::new('grade'),
            TextField::new('suph'),
            CollectionField::new('taches')
                ->setRequired(false)->hideWhenCreating(),
           // ->setCrudController(TacheCrudController::class)
               // ->setFormTypeOption('choice_label', 'description')
               // ->renderAsEmbeddedForm()
        ];
    }

}
