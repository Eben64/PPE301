<?php

namespace App\Form;

use App\Entity\Motel;
use App\Entity\Responsable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class MotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('emplacement', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('responsable',EntityType::class, [ 
                "attr" => ["class" => "form-control "],
                'class'=>Responsable::class,
                'choice_label'=> function(Responsable $client){
                    return $client->getNom() .' '. $client->getPrenom(); 
                }])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Motel::class,
        ]);
    }
}
