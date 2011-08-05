<?php

namespace Stcw\ResultBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ResultType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('score')
            ->add('student')
                //->$builder->add('report')
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Stcw\ResultBundle\Entity\Result'
        );
    }

    public function getName()
    {
        return 'resulttype';
    }
}
