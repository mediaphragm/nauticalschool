<?php

namespace Stcw\StudentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Stcw\StudentBundle\Entity\Student;
use Stcw\StudentBundle\Entity\Profile;
use Stcw\StudentBundle\Form\StudentType;


class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", name="student_index")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Template()
     * @Route("/new", name="student_new")
     */
    public function newAction()
    {
        $student = new Student();
        $form = $this->createForm(new StudentType(), $student);

        $request = $this->get('request');
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);

            if($form->isValid())
            {
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($student);
                $em->flush();

                $t = $this->get('translator')->trans('The student has been successfully created');
                $this->get('session')->setFlash('notice',$t);

                return $this->redirect($this->generateUrl('desk_index'));
            }
        }

        return array('form'=>$form->createView());
    }

    /**
     * @Route("/show/{id}", name="student_show", requirements={"id"="\d+"})
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $student = $em->getRepository('StcwStudentBundle:Student')
                ->findRelated($id);

        if(!$student)
        {
            throw $this->createNotFoundException('No student found for id '.$id);
        }

        return array('student'=>$student);
    }

    /**
     * @Route("list/{order}", name="student_list", defaults={"order"="lastname"})
     * @Template()
     */
    public function listAction($order = null)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $students = $em->getRepository('StcwStudentBundle:Student')
            ->findAllSort($order);

        return array('students'=> $students);
    }
}
