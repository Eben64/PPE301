<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [ "attr" => ["class" => "form-control"] ])
        ->add('prenom', TextType::class, [ "attr" => ["class" => "form-control"] ])
        ->add('username', TextType::class, [ "attr" => ["class" => "form-control"] ])
        ->add('password', PasswordType::class, [ "attr" => ["class" => "form-control"] ])
        ->add('contact', TextType::class, [ "attr" => ["class" => "form-control"] ])
            // ->add('roles')
            // ->add('creer_le')
            // ->add('creer_par')
            // ->add('modifie_le')
            // ->add('modifie_par')
            // ->add('role')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
