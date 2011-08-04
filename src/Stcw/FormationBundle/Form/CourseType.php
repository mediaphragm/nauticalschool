<?php

namespace Stcw\FormationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CourseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('code');
        $builder->add('title');
        $builder->add('credit');
        $builder->add('si');
        $builder->add('exam');
    }
    
    public function getName()
    {
        return 'course';
    }
}