<?php

namespace Stcw\CertificateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="certificate")
     */
    public function indexAction($name = "cert")
    {
        return $this->render('StcwCertificateBundle:Default:index.html.twig', array('name' => $name));
    }
}
