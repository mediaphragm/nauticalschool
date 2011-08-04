<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SchoolType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('fulltitle')
        ;
    }

    public function getName()
    {
        return 'stcw_studentbundle_schooltype';
    }
}
