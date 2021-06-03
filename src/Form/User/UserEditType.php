<?php

namespace App\Form\User;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newPassword', PasswordType::class, [
                'required' => false,
                'label' => 'Nouveau mot de passe',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'help' => 'Votre mot d epasse doit contenir une majuscule, un nombre et 6 caractères minimum.'
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'Adresse email',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
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
