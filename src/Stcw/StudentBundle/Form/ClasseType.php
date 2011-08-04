<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('school')
        ;
    }

    public function getName()
    {
        return 'stcw_studentbundle_classetype';
    }
}
