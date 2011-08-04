<?php

namespace Stcw\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Stcw\FormationBundle\Entity\Module;
use Stcw\FormationBundle\Form\ModuleType;


class ModuleController extends Controller
{
    /**
     *
     * @Route("/", name="module_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

        /**
     * @Template()
     * @Route("/new", name="module_new")
     */

       /**
     * @Template()
     * @Route("/newmodule", name="module_new")
     */
    public function newAction()
    {
        $module = new Module();
        $form = $this->createForm(new ModuleType(), $module);

        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($module);
                $em->flush();

                $t = $this->get('translator')->trans('The module has been successfully created');
                $this->get('session')->setFlash('notice',$t);

                return $this->redirect($this->generateUrl('module_new'));
            }
        }

        return array('form'=>$form->createView());
    }
}
