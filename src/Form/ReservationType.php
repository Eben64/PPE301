<?php

namespace App\Form;

use App\Entity\Chambres;
use App\Entity\Client;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateReservation',DateType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('heureDebut',TimeType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('heureFin',TimeType::class, [ "attr" => ["class" => "form-control"] ])
            ->add('chambre',EntityType::class, [ 
                "attr" => ["class" => "form-control "],
                'class'=>Chambres::class,
                'choice_label'=> function(Chambres $chambres){
                    return $chambres->getNumeroChambre() .' '. $chambres->getLibelle();
                }])
            ->add('client',EntityType::class, [ 
                "attr" => ["class" => "form-control "],
                'class'=>Client::class,
                'choice_label'=> function(Client $client){
                    return $client->getNom() .' '. $client->getPrenom();
                }])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
