<?php

namespace App\Form;

use App\Entity\Gerant;
use App\Entity\Role;
use App\Repository\RoleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GerantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('prenom', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('username', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('password', PasswordType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('contact', TextType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'label' => 'Type de compte ',
                'attr' => ['class' => 'form-control'],
                'choice_label' => 'nom_role',
                'query_builder' => function (RoleRepository $roleRepository) {
                    return $roleRepository->createQueryBuilder('r')
                        ->where('r.nom_role IN (:roles)')
                        ->setParameter('roles', ['Responsable', 'Client', 'Gerant', 'Comptable']);
                },
            ]);
            // ->add('roles')
            // ->add('creer_le')
            // ->add('creer_par')
            // ->add('modifie_le')
            // ->add('modifie_par')
            // ->add('role')
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gerant::class,
        ]);
    }
}
