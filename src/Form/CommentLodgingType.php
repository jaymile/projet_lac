<?php

namespace App\Form;

use App\Entity\CommentLodging;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentLodgingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('contenu', CKEditorType::class, [
                'label' => "Votre Commentaire"
            ])
            ->add('publication_date')
            ->add('lodging')
            ->add('created_by');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommentLodging::class,
        ]);
    }
}
