<?php

namespace App\Form\Project;

use App\Entity\Element;
use App\Form\Project\ProjectAddType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProjectEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, [
                'label_attr' => [
                    'class' => 'fw-bold'
                ],
                'multiple' => false,
                'expanded' => false,
                'choices'  => $this->getStatus()
            ])
        ;
    }

    public function getParent()
    {
        return ProjectAddType::class;
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
