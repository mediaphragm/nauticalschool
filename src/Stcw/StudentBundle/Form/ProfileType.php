<?php

namespace Stcw\StudentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        
        $byears = range(date('Y')-60, date('Y')-15);
        
        $builder->add('language', 'choice',array(
            'choices' => array(
                'fr'=>'French',
                'nl'=>'Dutch',
                'en'=>'English',
                'de'=>'German',
            )));
        
        $builder->add('date_of_birth','birthday',array(
            'years' => $byears ,
            'empty_value' => '',
            'required' => false
        ));
        $builder->add('place_of_birth', 'text',array(
            'required' => false
        ));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Stcw\StudentBundle\Entity\Profile'
        );
    }
    
    public function getName()
    {
        return 'profile';
    }
}