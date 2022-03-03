<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Titre:',

            ])
            ->add('contents', TextareaType::class, [
                'label' => 'Contenue:',
            ])
            ->add(
                'imageFile',
                VichImageType::class,
                [
                    'required' => false,
                    //'allow_extra_fields' => true,
                    'allow_delete' => true,
                    'download_uri' => true,
                    'image_uri' => true,
                    'label' => 'Choisissez une image'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
