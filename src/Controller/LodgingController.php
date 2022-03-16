<?php

namespace App\Controller;

use DateTime;
use App\Entity\Image;
use App\Entity\Lodging;
use App\Form\LodgingType;
use App\Repository\LodgingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/lodging')]
class LodgingController extends AbstractController
{
    #[Route('/hebergement', name: 'lodging_index', methods: ['GET'])]
    public function index(LodgingRepository $lodgingRepository, Request $request): Response
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
            //on recupere les images transmises
            $images = $form->get('images')->getData();
            //on boucle sur les images car on peut en avoir plusieur
            foreach ($images as $image) {
                //on genere un nouveau nom de fichier aleatoir
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                //on copie le fichier dans le dossier imagres en utilisant la methode 'move()'
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // on stock le nom de limage dans la bse de donné
                $img = new Image();
                $img->setName($fichier);
                $lodging->addImage($img);
            }

            $date = new DateTime();
            $lodging->setCreatedAt($date);
            $lodging->setUpdatedAt($date);
            $lodging->setCreatedBy($this->getUser());

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
            //on recupere les images transmises
            $images = $form->get('images')->getData();
            //on boucle sur les images car on peut en avoir plusieur
            foreach ($images as $image) {
                //on genere un nouveau nom de fichier aleatoir
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                //on copie le fichier dans le dossier imagres en utilisant la methode 'move()'
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // on stock le nom de limage dans la bse de donné
                $img = new Image();
                $img->setName($fichier);
                $lodging->addImage($img);
            }

            $entityManager->persist($lodging);
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
        if ($this->isCsrfTokenValid('delete' . $lodging->getId(), $request->request->get('_token'))) {
            $entityManager->remove($lodging);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lodging_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{supprime/image{id}}', name: 'lodging_delete_image', methods: ['DELETE'])]
    public function deleteImage(Image $image, Request $request)
    {
        $data = json_decode($request->getContent(), true);

        //on verifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $image->getId(), $data['_token'])) {
            //on recupere le nom du fichier
            $nom = $image->getName();
            //et on supprime le fichier
            unlink($this->getParameter('images_directory') . '/' . $nom);
            //on supprime lentré de la base de donné
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($image);
            $entityManager->flush();

            //on repond un success en json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
}
