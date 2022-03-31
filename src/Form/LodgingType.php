<?php

namespace App\Form;

use App\Entity\Lodging;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class LodgingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom:',

            ])
            ->add('Selectlodging', choiceType::class, [
                'label' => 'Hébergement:',
                'choices' => [
                    'Auberge' => 'Auberge',
                    'Airbnb' =>  'Airbnb',
                    'Gîte' =>  'Gîte',
                    'Autre' =>  'Autre'
                ]
            ])

            ->add('Hygiene', choiceType::class, [
                'label' => 'Hygiene:',
                'choices' => [
                    'tres bien' => 'tres bien',
                    'bien' =>  'bien',
                    'moyenne' =>  'moyenne',
                    'sale' =>  'sale'
                ]
            ])
            ->add('price', choiceType::class, [
                'label' => 'prix',
                'choices' => [
                    'coût €€€' => 'coût €€€',
                    'coût €€' =>  'coût €€',
                    'coût €' =>  'coût €'
                ]
            ])
            ->add('noise', TextType::class, [
                'label' => 'Insonorité:',
            ])
            ->add('custumerbase', TextType::class, [
                'label' => 'Clientèle:',
            ])
            ->add('atmosphere', TextType::class, [
                'label' => 'Ambiance:',
            ])
            ->add('convenience', TextType::class, [
                'label' => 'commodité:',
            ])
            ->add('Demonstration', TextType::class, [
                'label' => 'Démonstration:',
            ])
            ->add('partnership', TextType::class, [
                'label' => 'Partenariat:',
            ])
            ->add('hostbehavior', TextType::class, [
                'label' => 'Comportement:',
            ])
            ->add('coworkingspace', TextType::class, [
                'label' => 'Espace travaille:',
            ])
            ->add('Description', CKEditorType::class, [
                'label' => 'Description:',
            ])

            ->add(
                'images',
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
            'data_class' => Lodging::class,
        ]);
    }
}
