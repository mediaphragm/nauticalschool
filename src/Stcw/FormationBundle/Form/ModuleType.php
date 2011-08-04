<?php

namespace Stcw\FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ModuleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('title');
        $builder->add('credit','text',array(
            'required' => false
        ));
        $builder->add('si', 'text', array(
            'required' => false
        ));
        $builder->add('level');
        $builder->add('courses','entity',array(
            'class'=>'Stcw\\FormationBundle\\Entity\\Course',
            'multiple'=> true,
            'expanded'=> true
        ));
    }
    
    public function getName()
    {
        return 'module';
    }
}