<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Funcionario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Funcionario controller.
 *
 */
class FuncionarioController extends Controller
{
    /**
     * Lists all funcionario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $funcionarios = $em->getRepository('AppBundle:Funcionario')->findAll();

        return $this->render('funcionario/index.html.twig', array(
            'funcionarios' => $funcionarios,
        ));
    }

    /**
     * Creates a new funcionario entity.
     *
     */
    public function newAction(Request $request)
    {
        $tiposDocumentosOptions = $this->getDoctrine()
            ->getRepository('AppBundle:Parametro')
            ->getParametrosForOptions('TIPO_DOCUMENTO');

        $funcionario = new Funcionario();
        $form = $this->createForm('AppBundle\Form\FuncionarioType', $funcionario, array(
            'tiposDocumentosOptions' => $tiposDocumentosOptions
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**
             * @var UploadedFile $file
             */
            $file = $funcionario->getCurriculum();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            $file->move(
                $this->getParameter('curriculumns_directory'),
                $fileName
            );

            $funcionario->setCurriculum($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($funcionario);
            $em->flush($funcionario);

            $this->addFlash('success',
                $this->get('translator')->trans('funcionario.creado')
            );

            return $this->redirectToRoute('funcionarios_show', array('id' => $funcionario->getId()));
        }

        return $this->render('funcionario/new.html.twig', array(
            'funcionario' => $funcionario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a funcionario entity.
     *
     */
    public function showAction(Funcionario $funcionario)
    {
        $deleteForm = $this->createDeleteForm($funcionario);

        return $this->render('funcionario/show.html.twig', array(
            'funcionario' => $funcionario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing funcionario entity.
     *
     */
    public function editAction(Request $request, Funcionario $funcionario)
    {
        $tiposDocumentosOptions = $this->getDoctrine()
            ->getRepository('AppBundle:Parametro')
            ->getParametrosForOptions('TIPO_DOCUMENTO');

        $funcionario->setCurriculum(
            new File($this->getParameter('curriculumns_directory') . $funcionario->getCurriculum())
        );

        $deleteForm = $this->createDeleteForm($funcionario);
        $editForm = $this->createForm('AppBundle\Form\FuncionarioType', $funcionario, array(
            'tiposDocumentosOptions' => $tiposDocumentosOptions
        ));
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('funcionarios_edit', array('id' => $funcionario->getId()));
        }

        return $this->render('funcionario/edit.html.twig', array(
            'funcionario' => $funcionario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a funcionario entity.
     *
     */
    public function deleteAction(Request $request, Funcionario $funcionario)
    {
        $form = $this->createDeleteForm($funcionario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($funcionario);
            $em->flush($funcionario);
        }

        return $this->redirectToRoute('funcionarios_index');
    }

    /**
     * Creates a form to delete a funcionario entity.
     *
     * @param Funcionario $funcionario The funcionario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Funcionario $funcionario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('funcionarios_delete', array('id' => $funcionario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
