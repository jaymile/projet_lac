<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // picture tres important a jouter 
            ->add('picture', TextType::class, [
                'label' => 'image :',
                'attr' => ['placeholder' => 'Saisissez votre image: a faire version teste']
            ])

            ->add('lastname', TextType::class, [
                'label' => 'Nom :',
                'attr' => ['placeholder' => 'Saisissez votre nom']
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom :',
                'attr' => ['placeholder' => 'Saisissez votre prénom']
            ])
            ->add('email', TextType::class, [
                'label' => 'Email :',
                'attr' => ['placeholder' => 'Saisissez votre email']
            ])
            ->add('sexe', TextType::class, [
                'label' => 'Sexe :',
                'attr' => ['placeholder' => 'Saisissez votre sexe']
            ])
            ->add('originalCountry', TextType::class, [
                'label' => 'pays :',
                'attr' => ['placeholder' => 'Saisissez votre pays']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les champs mot de passe et confirmation doivent être identique',
                'options' => ['attr' => ['class' => 'password-field', 'placeholder' => 'Votre mot de passe']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe :',],
                'second_options' => ['label' => 'Confirmer mot de passe :'],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        // 'max' => 20,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
