<?php

namespace Stcw\FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Stcw\FormationBundle\Entity\Course;
use Stcw\FormationBundle\Form\CourseType;


class CourseController extends Controller
{
    /**
     *
     * @Route("/", name="course_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

        /**
     * @Template()
     * @Route("/new", name="course_new")
     */
    public function newAction()
    {
        $course = new Course();
        $form = $this->createForm(new CourseType(), $course);

        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($course);
                $em->flush();

                $t = $this->get('translator')->trans('The course has been successfully created');
                $this->get('session')->setFlash('notice',$t);

                return $this->redirect($this->generateUrl('course_new'));
            }
        }

        return array('form'=>$form->createView());
    }

       /**
     * @Template()
     * @Route("/newmodule", name="module_new")
     */
    public function newfAction()
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
