<?php

namespace App\Form\Task;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Titre de la tâche',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
            ])
            ->add('description', TextareaType::class, [
                'required'  => false,
                'label'     => 'Description',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'attr' => [
                    'rows' => 6
                ],
            ])
            ->add('limitedAt', DateType::class, [
                'required'  => false,
                'label'     => 'Date limite de réalisation',
                'help'      => 'Optionel',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
