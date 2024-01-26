<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                "attr"=>["class"=>"form-control","id"=>"nomet"], 
                "label"=>"Nom de famille",
                "label_attr"=>["class"=>"mt-2 text-white"],
                ])
            ->add('prenom', TextType::class, [
                "attr"=>["class"=>"form-control","id"=>"nomet"], 
                "label"=>"Prénom",
                "label_attr"=>["class"=>"mt-2 text-white"],
                ])
            ->add('email', EmailType::class, [
                "attr"=>["class"=>"form-control","id"=>"nomet"], 
                "label"=>"Email",
                "label_attr"=>["class"=>"mt-2 text-white"],
                ])
            ->add('fichier', TextType::class, [
                "attr"=>["class"=>"form-control","id"=>"nomet"], 
                "label"=>"Fichier",
                "label_attr"=>["class"=>"mt-2 text-white"],
                ])
            ->add('save', SubmitType::class, [
                "attr"=>["class"=>"btn btn-primary mt-2 mb-3","id"=>"save"],
                "label"=>"Ajouter",
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
