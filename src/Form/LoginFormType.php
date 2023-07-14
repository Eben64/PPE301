<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('creer_le')
            // ->add('creer_par')
            // ->add('modifie_le')
            // ->add('modifie_par')
            // ->add('nom')
            // ->add('prenom')
            // ->add('contact')
            // ->add('role')
            // ->add('roles')
            ->add('username', TextType::class, [
                'attr' => ['class' => 'au-input au-input--full'],
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'au-input au-input--full'],
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
