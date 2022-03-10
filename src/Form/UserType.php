<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('roles')

            ->add('lastname', TextType::class, [
                'label' => 'Nom :',
                'attr' => ['placeholder' => 'Saisissez votre nom']
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
                'attr' => ['placeholder' => 'Saisissez votre prénom']
            ])
            ->add(
                'image',
                FileType::class,
                [
                    'multiple' => true,
                    'mapped' => false,
                    'required' => false,
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
