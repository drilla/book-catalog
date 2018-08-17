<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $authors = $em->getRepository(Author::class)->findAll();

        return $this->render('author/index.html.twig', [
            'authors' => $authors,
        ]);
    }

    public function newAction(Request $request) {
        $author = new Author();
        $form = $this->createForm('AppBundle\Form\AuthorType', $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            return $this->redirectToRoute('author_show', ['id' => $author->getId()]);
        }

        return $this->render('author/new.html.twig', [
            'author' => $author,
            'form'   => $form->createView(),
        ]);
    }

    public function showAction(Author $author) {
        $deleteForm = $this->createDeleteForm($author);

        return $this->render('author/show.html.twig', [
            'author'      => $author,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function editAction(Request $request, Author $author) {
        $deleteForm = $this->createDeleteForm($author);
        $editForm = $this->createForm('AppBundle\Form\AuthorType', $author);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('author_edit', ['id' => $author->getId()]);
        }

        return $this->render('author/edit.html.twig', [
            'author'      => $author,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function deleteAction(Request $request, Author $author) {
        $form = $this->createDeleteForm($author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($author);
            $em->flush();
        }

        return $this->redirectToRoute('author_index');
    }

    private function createDeleteForm(Author $author) : FormInterface {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('author_delete', ['id' => $author->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}