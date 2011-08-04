<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
        ;
    }
    
    public function getName()
    {
        return 'promotion';
    }
}