<?php

namespace App\Form;

use App\Entity\Lodging;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LodgingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hostel')
            ->add('airbnb')
            ->add('guesthouse')
            ->add('other')
            ->add('Hygiene')
            ->add('noise')
            ->add('custumerbase')
            ->add('atmosphere')
            ->add('convenience')
            ->add('Demonstration')
            ->add('partnership')
            ->add('hostbehavior')
            ->add('coworkingspace')
            ->add('Description')
            ->add('userLodging')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lodging::class,
        ]);
    }
}
