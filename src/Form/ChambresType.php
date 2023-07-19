<?php

namespace App\Form;

use App\Entity\Chambres;

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
            ->add('motel', ChoiceType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('categorie',ChoiceType::class, [ "attr" => ["class" => "form-control"] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chambres::class,
        ]);
    }
}
