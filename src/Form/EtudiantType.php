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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

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
            ->add('fichier', FileType::class, [
                    'label' => 'Photo de la personne',
                    'mapped' => false,
                    'required' => false,
                    'constraints' => [
                        new File([
                            'maxSize' => '1024k',
                            'mimeTypes' => [
                                'image/gif',
                                'image/jpeg',
                                'image/png',
                                'image/jpg',
                                'application/pdf',
                            ],
                            'mimeTypesMessage' => 'Please upload a valid img document',
                        ])
                    ],
                ])
            ->add('save', SubmitType::class, [
                "attr"=>["class"=>"btn btn-primary mt-2 mb-3","id"=>"save"],
                "label"=>"Sauvegarder",
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
