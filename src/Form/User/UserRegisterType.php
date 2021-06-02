<?php

namespace App\Form\User;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Pseudo',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'help' => 'Votre pseudo doit contenir au minimun 6 caractères.'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'help' => 'Votre mot d epasse doit contenir une majuscule, un nombre et 6 caractères minimum.'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'label_attr' => [
                    'class' => 'fw-bold'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
