<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    public function indexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $query = $em->getRepository(Book::class)
            ->createQueryBuilder('book')
            ->orderBy('book.id', 'DESC')
        ;

        $paginationService = $this->get('knp_paginator');

        $pagination = $paginationService->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('book/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    public function newAction(Request $request) {
        $book = new Book();
        $form = $this->createForm('AppBundle\Form\BookType', $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('book_show', ['id' => $book->getId()]);
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }

    public function showAction(Book $book) {
        $deleteForm = $this->createDeleteForm($book);

        return $this->render('book/show.html.twig', [
            'book'        => $book,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function editAction(Request $request, Book $book) {
        $deleteForm = $this->createDeleteForm($book);
        $editForm = $this->createForm('AppBundle\Form\BookType', $book);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_edit', ['id' => $book->getId()]);
        }

        return $this->render('book/edit.html.twig', [
            'book'        => $book,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function deleteAction(Request $request, Book $book) {
        $form = $this->createDeleteForm($book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($book);
            $em->flush();
        }

        return $this->redirectToRoute('book_index');
    }

    private function createDeleteForm(Book $book): FormInterface {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('book_delete', ['id' => $book->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
