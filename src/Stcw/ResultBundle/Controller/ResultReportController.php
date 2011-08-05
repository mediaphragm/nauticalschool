<?php

namespace Stcw\ResultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Stcw\ResultBundle\Entity\ResultReport;
use Stcw\ResultBundle\Form\ResultReportType;
use Stcw\ResultBundle\Entity\Result;

/**
 * ResultReport controller.
 *
 */
class ResultReportController extends Controller
{
    /**
     * Lists all ResultReport entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('StcwResultBundle:ResultReport')->findAll();

        return $this->render('StcwResultBundle:ResultReport:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a ResultReport entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('StcwResultBundle:ResultReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResultReport entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('StcwResultBundle:ResultReport:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new ResultReport entity.
     *
     */
    public function newAction()
    {
        $entity = new ResultReport();
        $entity->getResults()->add(new Result());
        $form   = $this->createForm(new ResultReportType(), $entity);

        return $this->render('StcwResultBundle:ResultReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new ResultReport entity.
     *
     */
    public function createAction()
    {
        $entity  = new ResultReport();
        $request = $this->getRequest();
        $form    = $this->createForm(new ResultReportType(), $entity);
        $form->bindRequest($request);
        

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('resultreport_show', array('id' => $entity->getId())));
            
        }

        return $this->render('StcwResultBundle:ResultReport:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing ResultReport entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('StcwResultBundle:ResultReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResultReport entity.');
        }

        $editForm = $this->createForm(new ResultReportType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('StcwResultBundle:ResultReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ResultReport entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('StcwResultBundle:ResultReport')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ResultReport entity.');
        }

        $editForm   = $this->createForm(new ResultReportType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('resultreport_edit', array('id' => $id)));
        }

        return $this->render('StcwResultBundle:ResultReport:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ResultReport entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('StcwResultBundle:ResultReport')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ResultReport entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('resultreport'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
