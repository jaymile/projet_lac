<?php

namespace App\Controller;

use App\Entity\Lodging;
use App\Form\LodgingType;
use App\Repository\LodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lodging')]
class LodgingController extends AbstractController
{
    #[Route('/', name: 'lodging_index', methods: ['GET'])]
    public function index(LodgingRepository $lodgingRepository): Response
    {
        return $this->render('lodging/index.html.twig', [
            'lodgings' => $lodgingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'lodging_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $lodging = new Lodging();
        $form = $this->createForm(LodgingType::class, $lodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($lodging);
            $entityManager->flush();

            return $this->redirectToRoute('lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lodging/new.html.twig', [
            'lodging' => $lodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'lodging_show', methods: ['GET'])]
    public function show(Lodging $lodging): Response
    {
        return $this->render('lodging/show.html.twig', [
            'lodging' => $lodging,
        ]);
    }

    #[Route('/{id}/edit', name: 'lodging_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lodging $lodging, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LodgingType::class, $lodging);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('lodging_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lodging/edit.html.twig', [
            'lodging' => $lodging,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'lodging_delete', methods: ['POST'])]
    public function delete(Request $request, Lodging $lodging, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lodging->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lodging);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lodging_index', [], Response::HTTP_SEE_OTHER);
    }
}
