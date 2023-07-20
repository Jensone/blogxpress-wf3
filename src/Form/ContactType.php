<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Votre nom'],
                'label' => 'Quel est votre nom ?',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre nom',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères',
                        'max' => 50,
                        'maxMessage' => 'Votre nom doit contenir au maximum {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('Prenom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Votre prénom'],
                'label' => 'Quel est votre prénom ?',
            ])
            ->add('Sujet', ChoiceType::class, [
                'choices'  => [
                    'Informations' => 'Informations',
                    'Partenariat' => 'Partenariat',
                    'Autre' => 'Autre',
                ],
                'label' => 'À quel sujet vous nous contactez ?',
            ])
            ->add('Email', EmailType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Votre adresse email'],
                'label' => 'Saisissez votre adresse email',
            ])
            ->add('Telephone', TelType::class, [
                'required' => false,
                'attr' => ['placeholder' => 'Votre numéro de téléphone'],
                'label' => 'Avez-vous un numéro de téléphone ?',
            ])
            ->add('Message', TextareaType::class, [
                'required' => true,
                'attr' => [
                    'placeholder' => 'Rédigez votre message juste ici',
                    'rows' => 10
                ],
                'label' => 'Rédigez votre message',
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-success rounded-pill'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
