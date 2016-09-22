<?php

namespace Sm\Study\UarsymfonyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sm\Study\UarsymfonyBundle\Entity\Issue;
use Sm\Study\UarsymfonyBundle\Form\IssueType;

/**
 * Issue controller.
 *
 * @Route("/issue")
 */
class IssueController extends Controller
{
    /**
     * Lists all Issue entities.
     *
     * @Route("/", name="issue_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $issues = $em->getRepository('SmStudyUarsymfonyBundle:Issue')->findAll();

        return $this->render('SmStudyUarsymfonyBundle::issue/index.html.twig', array(
            'issues' => $issues,
        ));
    }

    /**
     * Creates a new Issue entity.
     *
     * @Route("/new", name="issue_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $issue = new Issue();
        $form = $this->createForm('Sm\Study\UarsymfonyBundle\Form\IssueType', $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $issue->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();

            return $this->redirectToRoute('issue_show', array('id' => $issue->getId()));
        }

        return $this->render('SmStudyUarsymfonyBundle::issue/new.html.twig', array(
            'issue' => $issue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Issue entity.
     *
     * @Route("/{id}", name="issue_show")
     * @Method("GET")
     */
    public function showAction(Issue $issue)
    {
        $deleteForm = $this->createDeleteForm($issue);

        return $this->render('SmStudyUarsymfonyBundle::issue/show.html.twig', array(
            'issue' => $issue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Issue entity.
     *
     * @Route("/{id}/edit", name="issue_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Issue $issue)
    {
        $deleteForm = $this->createDeleteForm($issue);
        $editForm = $this->createForm('Sm\Study\UarsymfonyBundle\Form\IssueType', $issue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $issue->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();

            return $this->redirectToRoute('issue_edit', array('id' => $issue->getId()));
        }

        return $this->render('SmStudyUarsymfonyBundle::issue/edit.html.twig', array(
            'issue' => $issue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Issue entity.
     *
     * @Route("/{id}", name="issue_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Issue $issue)
    {
        $form = $this->createDeleteForm($issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($issue);
            $em->flush();
        }

        return $this->redirectToRoute('issue_index');
    }

    /**
     * Creates a form to delete a Issue entity.
     *
     * @param Issue $issue The Issue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Issue $issue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('issue_delete', array('id' => $issue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
