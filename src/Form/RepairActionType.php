<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepairActionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $works = $options['works'];

        $builder
            ->add('comment', TextType::class, array('label' => 'Aprašymas'))
            ->add('date', DateType::class, array('label' => 'Data'))
            ->add('work', ChoiceType::class, array(
                'choices' => $works,
                'choice_label' => function ($work, $key, $value) {
                    return $work->getDescription();
                },
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                'works' => array(),
            )
        );
    }
}