<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('longtitle', 'text', array(
                'required' => false
            ))
            ->add('modules', 'entity', array(
                'class' => 'Stcw\\FormationBundle\\Entity\\Module',
                'required' => false,
                'multiple' => true,
                'expanded' => true
            ))
        ;
    }
    
    public function getName()
    {
        return 'category';
    }
}