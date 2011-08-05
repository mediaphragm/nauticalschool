<?php

namespace Stcw\ResultBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ResultReportType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('examinator')
            ->add('course')
            ->add('results','collection',array(
                'type' => new ResultType(),
                'prototype' => true,
                //'allow_empty' => true,
                'allow_add' => true,
                'allow_delete' => true,
                //'type_options' => array()
            ))
        ;
    }
    
        public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Stcw\ResultBundle\Entity\ResultReport'
        );
    }

    public function getName()
    {
        return 'stcw_resultbundle_resultreporttype';
    }
}
