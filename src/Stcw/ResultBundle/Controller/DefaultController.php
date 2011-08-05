<?php

namespace Stcw\ResultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('StcwResultBundle:Default:index.html.twig', array('name' => $name));
    }
}
