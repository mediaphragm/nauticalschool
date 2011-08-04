<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('lastname');
        $builder->add('firstname');
        $builder->add('milid');

        $builder->add('profile', new ProfileType());
        $builder->add('category', 'entity',array(
            'class' => 'Stcw\\StudentBundle\\Entity\\Category',
            'required' => false
        ));
        
        $builder->add('promotion', 'entity', array(
            'class' => 'Stcw\\StudentBundle\\Entity\\Promotion',
            'required' => false
        ));
        
        $builder->add('classe', 'entity', array(
            'class' => 'Stcw\\StudentBundle\\Entity\\Classe',
            'required' => false
        ));
    }
    
    public function getName()
    {
        return 'student';
    }
}
