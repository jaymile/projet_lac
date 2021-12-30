<?php

namespace App\Controller;

use App\Entity\CommentLodging;
use App\Form\CommentLodgingType;
use App\Repository\CommentLodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/comment/lodging')]
class CommentLodgingController extends AbstractController
{
    #[Route('/', name: 'comment_lodging_index', methods: ['GET'])]
    public function index(CommentLodgingRepository $commentLodgingRepository): Response
    {
        return $this->render('comment_lodging/index.html.twig', [
            'comment_lodgings' => $commentLodgingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'comment_lodging_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentLodging = new CommentLodging();
        $form = $this->createForm(CommentLodgingType::class, $commentLodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentLodging);
            $entityManager->flush();

            return $this->redirectToRoute('comment_lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comment_lodging/new.html.twig', [
            'comment_lodging' => $commentLodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'comment_lodging_show', methods: ['GET'])]
    public function show(CommentLodging $commentLodging): Response
    {
        return $this->render('comment_lodging/show.html.twig', [
            'comment_lodging' => $commentLodging,
        ]);
    }

    #[Route('/{id}/edit', name: 'comment_lodging_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommentLodging $commentLodging, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommentLodgingType::class, $commentLodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('comment_lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comment_lodging/edit.html.twig', [
            'comment_lodging' => $commentLodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'comment_lodging_delete', methods: ['POST'])]
    public function delete(Request $request, CommentLodging $commentLodging, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentLodging->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commentLodging);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comment_lodging_index', [], Response::HTTP_SEE_OTHER);
    }
}
