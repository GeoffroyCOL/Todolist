<?php

namespace App\Form\Task;

use App\Entity\Task;
use App\Entity\Element;
use App\Form\Task\TaskAddType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TaskEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'multiple' => false,
                'expanded' => false,
                'choices'  => $this->getStatus()
            ])
            ->add('note', TextareaType::class, [
                'required'  => false,
                'label'     => 'Note Complémentaire',
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'attr' => [
                    'rows' => 6
                ],
                'help' => 'Optionel'
            ])
        ;
    }
    
    /**
     * @return string
     */
    public function getParent(): string
    {
        return TaskAddType::class;
    }

    /**
     * getChoices - Permet de retourner les différents roles pour le choix dans le formulaire
     *
     * @return array
     */
    private function getStatus(): array
    {
        $choices = Element::STATUS;
        $output = [];
        foreach ($choices as $key => $value) {
            $output[$value] = $value;
        }

        return $output;
    }
}
