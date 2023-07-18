<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Votre nom'],
            ])
            ->add('Prenom', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Votre prénom'],
            ])
            ->add('Sujet', ChoiceType::class, [
                'choices'  => [
                    'Informations' => 'Informations',
                    'Partenariat' => 'Partenariat',
                    'Autre' => 'Autre',
                ],
            ])
            ->add('Email', EmailType::class, [])
            ->add('Telephone', TelType::class, [])
            ->add('Message', TextareaType::class, [])
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
