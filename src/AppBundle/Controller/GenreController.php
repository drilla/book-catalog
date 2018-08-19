<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use AppBundle\Form\GenreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class GenreController extends Controller
{
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $genres = $em->getRepository(Genre::class)->findAll();

        return $this->render('genre/index.html.twig', [
            'genres' => $genres,
        ]);
    }

    public function newAction(Request $request) {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('genre_show', ['id' => $genre->getId()]);
        }

        return $this->render('genre/new.html.twig', [
            'genre' => $genre,
            'form'  => $form->createView(),
        ]);
    }

    public function showAction(Genre $genre) {
        $deleteForm = $this->createDeleteForm($genre);

        return $this->render('genre/show.html.twig', [
            'genre'       => $genre,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function editAction(Request $request, Genre $genre) {
        $deleteForm = $this->createDeleteForm($genre);
        $editForm = $this->createForm(GenreType::class, $genre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('genre_edit', ['id' => $genre->getId()]);
        }

        return $this->render('genre/edit.html.twig', [
            'genre'       => $genre,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    public function deleteAction(Request $request, Genre $genre) {

        $this->denyAccessUnlessGranted('delete', $genre);

        $form = $this->createDeleteForm($genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($genre);
            $em->flush();
        }

        return $this->redirectToRoute('genre_index');
    }

    private function createDeleteForm(Genre $genre) : FormInterface {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('genre_delete', ['id' => $genre->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }
}
