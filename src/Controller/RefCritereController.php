<?php

namespace App\Controller;

use App\Entity\RefCritere;
use App\Form\RefCritereType;
use App\Repository\RefCritereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ref/critere')]
class RefCritereController extends AbstractController
{
    #[Route('/', name: 'ref_critere_index', methods: ['GET'])]
    public function index(RefCritereRepository $refCritereRepository): Response
    {
        return $this->render('ref_critere/index.html.twig', [
            'ref_criteres' => $refCritereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'ref_critere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $refCritere = new RefCritere();
        $form = $this->createForm(RefCritereType::class, $refCritere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($refCritere);
            $entityManager->flush();

            return $this->redirectToRoute('ref_critere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ref_critere/new.html.twig', [
            'ref_critere' => $refCritere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'ref_critere_show', methods: ['GET'])]
    public function show(RefCritere $refCritere): Response
    {
        return $this->render('ref_critere/show.html.twig', [
            'ref_critere' => $refCritere,
        ]);
    }

    #[Route('/{id}/edit', name: 'ref_critere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RefCritere $refCritere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RefCritereType::class, $refCritere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('ref_critere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ref_critere/edit.html.twig', [
            'ref_critere' => $refCritere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'ref_critere_delete', methods: ['POST'])]
    public function delete(Request $request, RefCritere $refCritere, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$refCritere->getId(), $request->request->get('_token'))) {
            $entityManager->remove($refCritere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ref_critere_index', [], Response::HTTP_SEE_OTHER);
    }
}
