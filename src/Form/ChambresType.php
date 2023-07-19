<?php

namespace App\Form;

use App\Entity\CategorieChambres;
use App\Entity\Chambres;
use App\Entity\Motel;
use App\Entity\Responsable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class ChambresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroChambre', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('libelle', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('prixHoraire', TextType::class, [
                'label' => 'Prix horaire En FCFA',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('motel',EntityType::class, [ 
                "attr" => ["class" => "form-control "],
                'class'=>Motel::class,
                'choice_label'=> function(Motel $motel){
                    return $motel->getNom() ;
                }])
            ->add('categorie',EntityType::class, [ 
                "attr" => ["class" => "form-control "],
                'class'=>CategorieChambres::class,
                'choice_label'=> function(CategorieChambres $categorieChambres){
                    return $categorieChambres->getNomCategorieChambre() ;
                }])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambres::class,
        ]);
    }
}
